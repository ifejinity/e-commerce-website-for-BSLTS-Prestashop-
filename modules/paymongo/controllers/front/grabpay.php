<?php
 

/**
 * This Controller simulate an external payment gateway
 */
class PayMongoGrabPayModuleFrontController extends ModuleFrontController
{

    /**
     * {@inheritdoc}
     */
    public function initContent()
    {
        parent::initContent();

        $baseURL = Context::getContext()->shop->getBaseURL(true);

        // Check if the get request is a redirect, and if the status is paid, otherwise, create new source
        if (isset($_GET['status'])){
            // For customer communication - if the customer leaves the page, the order will be validated later anyways
            if ($_GET['status']=='paid') {

                PrestaShopLogger::addLog("[PayMongo, GrabPay] Non-authoritative status paid received for Cart#". $_GET['cartId'], 1);

                $cart = new Cart($_GET['cartId']);
                $customer = new Customer($_GET['customerId']);
                $this->module->validateOrder(
                    (int) $_GET['cartId'],
                    Configuration::get(PayMongo::CONFIG_OS_PROCESSING),
                    (float) $cart->getOrderTotal(true, Cart::BOTH),
                    $this->module->displayName,
                    null,
                    null,
                    (int) $cart->id_currency,
                    false,
                    $customer->secure_key
                );

                PrestaShopLogger::addLog("[PayMongo, GrabPay] Cart#". $_GET['cartId'].' set to processing, pending confirmation by PayMongo', 1);

                Tools::redirect($this->context->link->getPageLink(
                    'order-confirmation',
                    true,
                    (int) $this->context->language->id,
                    [
                        'id_cart' => (int) $this->context->cart->id,
                        'id_module' => (int) $this->module->id,
                        'id_order' => (int) $this->module->currentOrder,
                        'key' => $customer->secure_key,
                    ]
                ));    
            } else {

                PrestaShopLogger::addLog("[PayMongo, GrabPay] Non-authoritative unsuccessful status received for Cart#". $_GET['cartId'].' returning to payment step, no order created', 1);

                Tools::redirect($this->context->link->getPageLink(
                    'order',
                    true,
                    (int) $this->context->language->id,
                    [
                          'step' => 3,
                    ]
                ));
            }

        }
        else {
            $cart = $this->context->cart;

            $address = new Address($this->context->cart->id_address_invoice);
            $customer = new Customer($this->context->cart->id_customer);

            if((int)(round(($cart->getOrderTotal(true, Cart::BOTH) * 100),0))<10000){
                PrestaShopLogger::addLog("[PayMongo, GrabPay] Cart#".$cart->id." under minimum PHP 100 amount", 2);
                Tools::redirect($this->context->link->getPageLink(
                    'order',
                    true,
                    (int) $this->context->language->id,
                    [
                          'step' => 3,
                    ]
                ));   
            }
   

            $postData = array(
                'data' => array(
                    'attributes' => array(
                        'type' => 'grab_pay',
                        'amount' => (int)(round(($cart->getOrderTotal(true, Cart::BOTH) * 100),0)),
                        'currency' => $this->context->currency->iso_code,
                        'redirect' => array(
                            'success' => $this->context->link->getModuleLink(
                                $this->module->name,
                                'grabpay', 
                                array(
                                    'status' => 'paid',
                                    'cartId' => $cart->id,
                                    'customerId' => $cart->id_customer,
                                    'agent' => 'paymongo_prestashop',
                                    'version' => $this->module->version
                                )
                            , true),
                            'failed' => $this->context->link->getModuleLink(
                                $this->module->name,
                                'grabpay', 
                                array(
                                    'status' => 'failed',
                                    'cartId' => $cart->id,
                                    'customerId' => $cart->id_customer,
                                    'agent' => 'paymongo_prestashop',
                                    'version' => $this->module->version
                                )
                            , true)
                        ),
                        "billing" => array(
                            "address" => array(
                                "city" => $address->city,
                                "country" => $address->country,
                                "line1" => $address->address1,
                                "line2" => $address->address2,
                                "postal_code" => $address->postcode,
                                "country" => Country::getIsoById($address->id_country)
                            ),
                            "email" => $customer->email,
                            "name" => $customer->firstname.' '.$customer->lastname,
                            "phone" => $customer->phone, 
                        ) 
                    )
                )
            );
    
    
            $curl = curl_init();
    
            if(Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_MODE)){
                $public_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_API_PUBLIC_KEY);
            } else {
                $public_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_LIVE_API_PUBLIC_KEY);
            }

            curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paymongo.com/v1/sources",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FAILONERROR => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Authorization: Basic ".base64_encode($public_key.':'),
                "Content-Type: application/json"
            ],
            ]);
    
            $response = json_decode(curl_exec($curl));
            $err = curl_error($curl);
            
            if($err!=''){
                PrestaShopLogger::addLog("[PayMongo, GrabPay] Error creating source for Cart#".$cart->id." - ".$err, 3);
            }

            curl_close($curl);
    
            Tools::redirect($response->data->attributes->redirect->checkout_url);
        }
    }

    /**
     * Check if the context is valid
     *
     * @return bool
     */
    private function checkIfContextIsValid()
    {
        return true === Validate::isLoadedObject($this->context->cart)
            && true === Validate::isUnsignedInt($this->context->cart->id_customer)
            && true === Validate::isUnsignedInt($this->context->cart->id_address_delivery)
            && true === Validate::isUnsignedInt($this->context->cart->id_address_invoice);
    }

    /**
     * Check that this payment option is still available in case the customer changed
     * his address just before the end of the checkout process
     *
     * @return bool
     */
    private function checkIfPaymentOptionIsAvailable()
    {
        if (!Configuration::get(PayMongo::CONFIG_PO_GCASH_ENABLED)) {
            return false;
        }

        $modules = Module::getPaymentModules();

        if (empty($modules)) {
            return false;
        }

        foreach ($modules as $module) {
            if (isset($module['name']) && $this->module->name === $module['name']) {
                return true;
            }
        }

        return false;
    }
}
