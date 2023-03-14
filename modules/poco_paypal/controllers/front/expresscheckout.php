<?php

include_once(_PS_MODULE_DIR_.'poco_paypal/express_checkout/process.php');

class PoCo_PayPalExpressCheckoutModuleFrontController extends ModuleFrontController
{
	public function __construct()
    {
        parent::__construct();
    }

	public function initContent()
    {
        parent::initContent();
    }

	public function init()
    {
        parent::init();
    }

    public function postProcess()
    {
    	$id_cart = Tools::getValue('id_cart');
        $id_order = Tools::getValue('id_order');
        $id_module = Tools::getValue('id_module');
        $paypal_key = Tools::getValue('key');

        $request_type = Tools::getValue('express_checkout');
        $ppec = new PoCoPaypalExpressCheckout($request_type);

        $token = Tools::getValue('token');
        $payer_id = Tools::getValue('PayerID');

        if ($request_type && $ppec->type)
        {
            $id_product = (int)Tools::getValue('id_product');
            $product_quantity = (int)Tools::getValue('quantity');
            $id_product_attribute = Tools::getValue('id_p_attr');

            if (($id_product > 0) && $id_product_attribute !== false && ($product_quantity > 0))
            {
                setContextData($ppec);

                if (!$ppec->context->cart->add())
                {
                    $ppec->logs[] = $ppec->l('Cannot create new cart');
                        
                    $ppec->context->smarty->assign(array(
                        'logs' => $ppec->logs,
                        'message' => $ppec->l('Error occurred:')
                    ));
                    
                    $template = 'error.tpl';
                } else {
                    $ppec->context->cookie->id_cart = (int)$ppec->context->cart->id;
                }

                $ppec->context->cart->updateQty((int)$product_quantity, (int)$id_product, (int)$id_product_attribute);
                $ppec->context->cart->update();
            }

            // Set details for a payment
            $ppec->setExpressCheckout();

            if ($ppec->hasSucceedRequest() && !empty($ppec->token)){
                $ppec->redirectToAPI();
            }
            // Display Error and die with this method
            else
                $ppec->displayPayPalAPIError($this, $ppec->l('Error during the preparation of the Express Checkout payment'), $ppec->logs);
        }
        // If a token exist with payer_id, then we are back from the PayPal API
        elseif (!empty($ppec->token) && ($ppec->token == $token) && ($ppec->payer_id = $payer_id))
        {
            // Get payment infos from paypal
            $ppec->getExpressCheckout();

            if ($ppec->hasSucceedRequest() && !empty($ppec->token))
            {
                $address = $customer = null;
                $email = $ppec->result['EMAIL'];

                // Create Customer if not exist with address etc
                if ($ppec->context->cookie->logged)
                {
                    $id_customer = PoCo_Paypal::getPayPalCustomerIdByEmail($email);
                    if (!$id_customer){
                        PoCo_PayPal::addPayPalCustomer($ppec->context->customer->id, $email);
                    }
                    $customer = $ppec->context->customer;
                }
                elseif ($id_customer = Customer::customerExists($email, true))
                    $customer = new Customer($id_customer);
                else
                {
                    $customer = $this->setCustomerInformation($ppec, $email);
                    $customer->add();
                    
                    PoCo_PayPal::addPayPalCustomer($customer->id, $email);
                }

                if (!$customer->id)
                    $ppec->logs[] = $ppec->l('Cannot create customer');

                if (!isset($ppec->result['PAYMENTREQUEST_0_SHIPTOSTREET']) || !isset($ppec->result['PAYMENTREQUEST_0_SHIPTOCITY'])
                || !isset($ppec->result['SHIPTOZIP']) || !isset($ppec->result['COUNTRYCODE']))
                    $ppec->redirectToCheckout($customer, ($ppec->type != 'payment_cart'));
                
                $addresses = $customer->getAddresses($ppec->context->language->id);
                foreach ($addresses as $address)
                    if ($address['alias'] == 'Paypal_Address')
                    {
                        $address = new Address($address['id_address']);
                        break;
                    }

                // Create address
                if (is_array($address) && isset($address['id_address']))
                    $address = new Address($address['id_address']);

                if ((!$address || !$address->id) && $customer->id)
                {
                    $address = $this->setCustomerAddress($ppec, $customer);
                    $address->add();
                }

                if ($customer->id && !$address->id)
                    $ppec->logs[] = $ppec->l('Cannot create Address');

                // Create Order
                if ($customer->id && $address->id)
                {
                    $ppec->context->cart->id_customer = $customer->id;
                    $ppec->context->cart->id_guest = $ppec->context->cookie->id_guest;

                    if (!$ppec->context->cart->update())
                        $ppec->logs[] = $ppec->l('Cannot update existing cart');
                    else
                    {
                        $payment_cart = (bool)($ppec->type != 'payment_cart');
                        $ppec->redirectToCheckout($customer, $payment_cart);
                    }
                }
            }
        }

        // If Previous steps succeed, ready (means 'ready to pay') will be set to true
        if ($ppec->ready && !empty($ppec->token) && (Tools::isSubmit('confirmation') || $ppec->type == 'payment_cart'))
        {
            // Check modification on the product cart / quantity
            if ($ppec->isProductsListStillRight())
            {
                $cart = $ppec->context->cart;
                $customer = new Customer((int)$cart->id_customer);

                // When all information are checked before, we can validate the payment to paypal
                // and create the prestashop order
                $ppec->doExpressCheckout();

                $this->validateOrder($customer, $cart, $ppec);

                unset($ppec->context->cookie->{PoCoPaypalExpressCheckout::$COOKIE_NAME});

                if (!$ppec->currentOrder)
                    $ppec->logs[] = $ppec->l('Cannot create order');
                else
                {
                    $id_order = (int)$ppec->currentOrder;
                    $order = new Order($id_order);
                }

                // Check payment details to display the appropriate content
                if (isset($order) && ($ppec->result['ACK'] != "Failure"))
                {
                    $values = array(
                        'key' => $customer->secure_key,
                        'id_module' => (int)$ppec->id,
                        'id_cart' => (int)$cart->id,
                        'id_order'  => (int)$ppec->currentOrder
                    );

                    $link = $ppec->context->link->getModuleLink('poco_paypal', 'submit', $values);
                    Tools::redirect($link);
                }
                elseif ($ppec->result['ACK'] != "Failure")
                {
                    $ppec->context->smarty->assign(array(
                        'logs' => $ppec->logs,
                        'message' => $ppec->l('Error occurred:'),
                    ));
                    
                    $template = 'error.tpl';
                }
            }
            else
            {
                // If Cart changed, no need to keep the paypal data
                unset($ppec->context->cookie->{PoCoPaypalExpressCheckout::$COOKIE_NAME});
                $ppec->logs[] = $ppec->l('Cart changed since the last checkout express, please make a new Paypal checkout payment');
            }
        }

        $payment_confirmation = Tools::getValue('get_confirmation');

        // Display payment confirmation
        if ($ppec->ready && $payment_confirmation)
        {

        }
        // Display result if error occurred
        else
        {
            if (!$ppec->context->cart->id)
            {
                $ppec->context->cart->delete();
                $ppec->logs[] = $ppec->l('Your cart is empty.');
            }
            $ppec->context->smarty->assign(array(
                'logs' => $ppec->logs,
                'message' => $ppec->l('Error occurred:'),
            ));
            
            $template = 'error.tpl';
        }

        $this->setTemplate('module:'.$ppec->name.'/views/templates/front/'.$template);
	}

    /**
     * Check payment return
     */
    function validateOrder($customer, $cart, $ppec)
    {
        $amount_match = $ppec->rightPaymentProcess();
        $order_total = (float)$cart->getOrderTotal(true, Cart::BOTH);

        // Payment succeed
        if ($ppec->hasSucceedRequest() && !empty($ppec->token) && $amount_match)
        {
            if ((bool)Configuration::get('POCO_PAYPAL_CAPTURE'))
            {
                $payment_type = (int)Configuration::get('PS_OS_WS_PAYMENT');
                $payment_status = 'Pending_capture';
                $message = $ppec->l('Pending payment capture.').'<br />';
            }
            else
            {
                if (isset($ppec->result['PAYMENTINFO_0_PAYMENTSTATUS']))
                    $payment_status = $ppec->result['PAYMENTINFO_0_PAYMENTSTATUS'];
                else
                    $payment_status = 'Error';
                
                if (strcmp($payment_status, 'Completed') === 0)
                {
                    $payment_type = (int)Configuration::get('PS_OS_PAYMENT');
                    $message = $ppec->l('Payment accepted.').'<br />';
                }
                elseif (strcmp($payment_status, 'Pending') === 0)
                {
                    $payment_type = (int)Configuration::get('PS_OS_PAYPAL');
                    $message = $ppec->l('Pending payment confirmation.').'<br />';
                }
            }
        }
        // Payment error
        else
        {
            $payment_status = $ppec->result['PAYMENTINFO_0_PAYMENTSTATUS'];
            $payment_type = (int)Configuration::get('PS_OS_ERROR');

            if ($amount_match)
                $message = implode('<br />', $ppec->logs).'<br />';
            else
                $message = $ppec->l('Price paid on paypal is not the same that on PrestaShop.').'<br />';
        }
            
        $transaction = PoCoPayPalOrder::getTransactionDetails($ppec, $payment_status);
        $ppec->context->cookie->id_cart = $cart->id;

        $ppec->validateOrder((int)$cart->id, $payment_type, $order_total, $ppec->displayName, $message, $transaction,
            (int)$cart->id_currency, false, $customer->secure_key, $ppec->context->shop);
    }

}

/**
 * Set customer information
 * Used to create user account with PayPal account information
 */
function setCustomerInformation($ppec, $email)
{
    $customer = new Customer();
    $customer->email = $email;
    $customer->lastname = $ppec->result['LASTNAME'];
    $customer->firstname = $ppec->result['FIRSTNAME'];
    $customer->passwd = Tools::encrypt(Tools::passwdGen());
    return $customer;
}

/**
 * Set customer address (when not logged in)
 * Used to create user address with PayPal account information
 */
function setCustomerAddress($ppec, $customer)
{
    $address = new Address();
    $address->id_country = Country::getByIso($ppec->result['COUNTRYCODE']);
    $address->alias = 'Paypal_Address';
    $address->lastname = $customer->lastname;
    $address->firstname = $customer->firstname;
    $address->address1 = $ppec->result['PAYMENTREQUEST_0_SHIPTOSTREET'];
    if (isset($ppec->result['PAYMENTREQUEST_0_SHIPTOSTREET2']))
        $address->address2 = $ppec->result['PAYMENTREQUEST_0_SHIPTOSTREET2'];
    $address->city = $ppec->result['PAYMENTREQUEST_0_SHIPTOCITY'];
    $address->id_state = (int)State::getIdByIso($ppec->result['SHIPTOSTATE'], $address->id_country);
    $address->postcode = $ppec->result['SHIPTOZIP'];
    $address->id_customer = $customer->id;
    return $address;
}

function setContextData($ppec)
{
    // Create new Cart to avoid any refresh or other bad manipulations
    $ppec->context->cart = new Cart();
    $ppec->context->cart->id_currency = (int)$ppec->context->currency->id;
    $ppec->context->cart->id_lang = (int)$ppec->context->language->id;
    
    // Customer settings
    $ppec->context->cart->id_guest = (int)$ppec->context->cookie->id_guest;
    $ppec->context->cart->id_customer = (int)$ppec->context->customer->id;
    
    // Secure key information
    $secure_key = isset($ppec->context->customer) ? $ppec->context->customer->secure_key : null;
    $ppec->context->cart->secure_key = $secure_key;
}