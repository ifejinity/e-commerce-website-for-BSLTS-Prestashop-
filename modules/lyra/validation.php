<?php
/**
 * Copyright © Lyra Network.
 * This file is part of Lyra Collect plugin for PrestaShop. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   https://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 */

/**
 * Instant payment notification file. Wait for payment gateway confirmation, then validate order.
 */

require_once dirname(dirname(dirname(__FILE__))) . '/config/config.inc.php';
require_once dirname(__FILE__) . '/lyra.php';

// Module logger object.
$logger = LyraTools::getLogger();

$save_on_failure = true;

if (LyraTools::checkRestIpnValidity()) {
    // Use direct post content to avoid stipslashes from json data.
    $data = $_POST;

    $answer = json_decode($data['kr-answer'], true);
    if (! is_array($answer)) {
        $logger->logError('Invalid REST IPN request received. Content of kr-answer: ' . $data['kr-answer']);
        die('<span style="display:none">KO-Invalid IPN request received.' . "\n" . '</span>');
    }

    $save_on_failure &= isset($answer['orderCycle']) && ($answer['orderCycle'] === 'CLOSED');

    // Wrap payment result to use traditional order creation tunnel.
    $data = LyraTools::convertRestResult($answer);

    $cart_id = (int) $data['vads_order_id'];

    $logger->logInfo("Server call process starts for cart #$cart_id.");

    // Shopping cart object.
    $cart = new Cart($cart_id);

    // Rebuild context.
    try {
        LyraTools::rebuildContext($cart);
    } catch (Exception $e) {
        $logger->logError($e->getMessage() . ' Cart ID: #' . $cart->id);
        die('<span style="display:none">KO-' . $e->getMessage(). "\n" . '</span>');
    }

    $test_mode = Configuration::get('LYRA_MODE') === 'TEST';
    $sha_key = $test_mode ? Configuration::get('LYRA_PRIVKEY_TEST') : Configuration::get('LYRA_PRIVKEY_PROD');

    if (! LyraTools::checkHash($_POST, $sha_key)) {
        $ip = Tools::getRemoteAddr();
        $logger->logError("{$ip} tries to access validation.php page without valid signature with data: " . print_r($_POST, true));
        die('<span style="display:none">KO-An error occurred while computing the signature.' . "\n" . '</span>');
    }

    /** @var LyraResponse $response */
    $response = new LyraResponse($data, null, null, null);
} elseif (LyraTools::checkFormIpnValidity()) {
    $cart_id = (int) Tools::getValue('vads_order_id');

    $logger->logInfo("Server call process starts for cart #$cart_id.");

    // Shopping cart object.
    $cart = new Cart($cart_id);

    // Rebuild context.
    try {
        LyraTools::rebuildContext($cart);
    } catch (Exception $e) {
        $logger->logError($e->getMessage() . " Cart ID: #{$cart->id}.");
        die('<span style="display:none">KO-' . $e->getMessage(). "\n" . '</span>');
    }

    /** @var LyraResponse $response */
    $response = new LyraResponse(
        $_POST,
        Configuration::get('LYRA_MODE'),
        Configuration::get('LYRA_KEY_TEST'),
        Configuration::get('LYRA_KEY_PROD'),
        Configuration::get('LYRA_SIGN_ALGO')
    );

    // Check the authenticity of the request.
    if (! $response->isAuthentified()) {
        $ip = Tools::getRemoteAddr();
        $logger->logError("{$ip} tries to access validation.php page without valid signature with data: " . print_r($_POST, true));
        $logger->logError('Signature algorithm selected in module settings must be the same as one selected in gateway Back Office.');

        die($response->getOutputForGateway('auth_fail'));
    }
} else {
    $logger->logError('Invalid IPN request received. Content: ' . print_r($_POST, true));
    die('<span style="display:none">KO-Invalid IPN request received.' . "\n" . '</span>');
}

// Module main object.
$lyra = new Lyra();

// Search order in db.
$order_id = Order::getOrderByCartId($cart_id);

if (! $order_id) {
    // Order has not been processed yet.
    $new_state = (int) Lyra::nextOrderState($response);

    if ($response->isAcceptedPayment()) {
        $logger->logInfo("Payment accepted for cart #$cart_id. New order state is $new_state.");

        $order = $lyra->saveOrder($cart, $new_state, $response);

        if (Lyra::hasAmountError($order)) {
            // Amount paid not equals initial amount.
            $msg = "Error: amount paid {$order->total_paid_real} is not equal to initial amount {$order->total_paid}.";
            $msg .= " Order is in a failed state, cart #$cart_id.";
            $logger->logWarning($msg);

            die($response->getOutputForGateway('ko', 'Total paid is different from order amount.'));
        } else {
            // Response to server.
            die($response->getOutputForGateway('payment_ok'));
        }
    } else {
        // Payment KO.
        $logger->logInfo("Payment failed for cart #$cart_id.");

        $save_on_failure &= (Configuration::get('LYRA_FAILURE_MANAGEMENT') === LyraTools::ON_FAILURE_SAVE);
        if ($save_on_failure || Lyra::isOney($response)) {
            // Save on failure option is selected or Oney payment.
            $msg = Lyra::isOney($response) ? 'Oney payment' : 'Save on failure option is selected';
            $logger->logInfo("$msg: save failed order for cart #$cart_id. New order state is $new_state.");
            $order = $lyra->saveOrder($cart, $new_state, $response);

            die($response->getOutputForGateway('payment_ko'));
        } else {
            die($response->getOutputForGateway('payment_ko_bis'));
        }
    }
} else {
    // Order already registered.
    $logger->logInfo("Order #$order_id already registered for cart #$cart_id.");

    $order = new Order((int) $order_id);
    $old_state = (int) $order->getCurrentState();

    $logger->logInfo("The current state for order corresponding to cart #$cart_id is ($old_state).");

    // Check if  it is a partial payment.
    $is_partial_payment = false;

    $currency = LyraApi::findCurrency($response->get('currency'));
    $decimals = $currency->getDecimals();
    $paid_total = $currency->convertAmountToFloat($response->get('amount'));

    // Check if this is a partial payment.
    if (number_format($order->total_paid_real, $decimals) !== number_format($paid_total, $decimals)) {
        $is_partial_payment = true;
    }

    $outofstock = Lyra::isOutOfStock($order);
    $new_state = (int) Lyra::nextOrderState($response, $outofstock, $old_state, $is_partial_payment);

    // Final states.
    $consistent_states = array(
        'PS_OS_OUTOFSTOCK_PAID', // Override paid state since PrestaShop 1.6.1.
        'LYRA_OS_PAYMENT_OUTOFSTOCK', // Paid state for PrestaShop < 1.6.1.
        'PS_OS_PAYMENT',
        'LYRA_OS_TRANS_PENDING',
        'LYRA_OS_REFUNDED',
        'PS_OS_CANCELED'
    );

    // If the payment is not the first in sequence, do not update order state.
    $first_payment = ($response->get('sequence_number') === '1')
        || Lyra::isFirstSequenceInOrderPayments($order, $response->get('trans_id'), $response->get('sequence_number'));

    if (($old_state === $new_state) || ! $first_payment) {
        // No changes, just display a confirmation message.
        $logger->logInfo("No state change for order associated with cart #$cart_id, order remains in state ({$old_state}).");

        // Do not create payment if it is cancelled partial debit payment OR order is in final status LYRA_OS_REFUNDED.
        $force_stop_payment_creation = (Configuration::get('LYRA_OS_REFUNDED') == $old_state) ||
                                       (($response->isCancelledPayment() || ($response->getTransStatus() === 'CANCELLED'))
                                       && ($response->get('operation_type') === 'DEBIT') && $is_partial_payment);

        $lyra->savePayment($order, $response, $force_stop_payment_creation);
        $lyra->createMessage($order, $response);

        if ($response->isAcceptedPayment()) {
            $msg = 'payment_ok_already_done';
        } else {
            $msg = 'payment_ko_already_done';
        }

        die($response->getOutputForGateway($msg));
    } elseif (Lyra::isPaidOrder($order) &&
        (! Lyra::isStateInArray($new_state, $consistent_states) || ($response->get('url_check_src') === 'PAY'))) {
        // Order cannot move from final paid state to not completed states.
        $logger->logInfo("Order is successfully registered for cart #$cart_id but platform returns a payment error, transaction status is {$response->getTransStatus()}.");
        die($response->getOutputForGateway('payment_ko_on_order_ok'));
    } elseif (! $old_state || Lyra::isStateInArray($old_state, Lyra::getManagedStates())) {
        if (($old_state === Configuration::get('PS_OS_ERROR')) && $response->isAcceptedPayment() &&
            Lyra::hasAmountError($order)) {
            // Amount paid not equals amount.
            $msg = "Error: amount paid {$order->total_paid_real} is not equal to initial amount {$order->total_paid}.";
            $msg .= " Order is in a failed state, cart #$cart_id.";
            $logger->logWarning($msg);
            die($response->getOutputForGateway('ko', 'Total paid is different from order amount.'));
        }

        if (! $old_state) {
            $logger->logWarning("Current order state for cart #$cart_id is empty! Something went wrong. Try to set it anyway.");
        }

        $lyra->setOrderState($order, $new_state, $response);

        $logger->logInfo("Order is successfully updated for cart #$cart_id.");
        die($response->getOutputForGateway($response->isAcceptedPayment() ? 'payment_ok' : 'payment_ko'));
    } else {
        $logger->logWarning("Unknown order state ID ($old_state) for cart #$cart_id. Managed by merchant.");
        die($response->getOutputForGateway('ok', 'Unknown order status.'));
    }
}
