<?php

include(__DIR__.'/../../config/config.inc.php');
include(__DIR__.'/../../header.php');
include(__DIR__.'/../../init.php');

$context = Context::getContext();
$cart = $context->cart;
$custompayment = Module::getInstanceByName('custompayment');

if ($cart->id_customer == 0 OR $cart->id_address_delivery == 0 OR $cart->id_address_invoice == 0 OR !$custompayment->active)
	Tools::redirect('index.php?controller=order&step=1');

// Check that this payment option is still available in case the customer changed his address just before the end of the checkout process
$authorized = false;
foreach (Module::getPaymentModules() as $module)
	if ($module['name'] == 'custompayment')
	{
		$authorized = true;
		break;
	}
if (!$authorized)
	die($custompayment->getTranslator()->trans('This payment method is not available.', array(), 'Modules.Custompayment.Shop'));

$customer = new Customer((int)$cart->id_customer);

if (!Validate::isLoadedObject($customer))
	Tools::redirect('index.php?controller=order&step=1');

$currency = $context->currency;
$total = (float)($cart->getOrderTotal(true, Cart::BOTH));

$custompayment->validateOrder($cart->id, Configuration::get('CUSTOM_ORDER_STATUS'), $total, Configuration::get('CUSTOM_PAYMENT_NAME'), NULL, array(), (int)$currency->id, false, $customer->secure_key);

$order = new Order($custompayment->currentOrder);
Tools::redirect('index.php?controller=order-confirmation&id_cart='.$cart->id.'&id_module='.$custompayment->id.'&id_order='.$custompayment->currentOrder.'&key='.$customer->secure_key);
