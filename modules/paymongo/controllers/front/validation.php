<?php
 

/**
 * This Controller receive customer after approval on bank payment page
 */
class PayMongoValidationModuleFrontController extends ModuleFrontController
{

    /**
     * {@inheritdoc}
     */
    public function postProcess()
    {

        if(Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_MODE)){
            $public_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_API_PUBLIC_KEY);
        } else {
            $public_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_LIVE_API_PUBLIC_KEY);
        }

        if(Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_MODE)){
            $secret_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_API_SECRET_KEY);
        } else {
            $secret_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_LIVE_API_SECRET_KEY);
        }

        $cart = $this->context->cart;
        $customer = new Customer($this->context->cart->id_customer);

        if (false === Validate::isLoadedObject($customer)) {

            PrestaShopLogger::addLog("[PayMongo, Cards] Customer is not a loaded object", 2);
            Tools::redirect($this->context->link->getPageLink(
                 'order',
                 true,
                 (int) $this->context->language->id,
                 [
                     'step' => 3,
                 ]
             ));
        }

        if((int)(round(($cart->getOrderTotal(true, Cart::BOTH) * 100),0))<10000){

            PrestaShopLogger::addLog("[PayMongo, Cards] Cart#".$cart->id." under minimum PHP 100 amount", 2);
            Tools::redirect($this->context->link->getPageLink(
                'order',
                true,
                (int) $this->context->language->id,
                [
                    'step' => 3,
                ]
            ));   
        }


        $address = new Address($this->context->cart->id_address_invoice);

        // Load credit card form data into array
        $paymentMethodCurlData = array(
            "data" => array(
                "attributes" => array(
                    "details" => array(
                        "card_number" => trim($_POST['cardNumber']),
                        "exp_month" => (int) trim($_POST['cardExpirationMonth']),
                        "exp_year" => (int) trim($_POST['cardExpirationYear']),
                        "cvc" => trim($_POST['cardCVC'])
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
                    ),
                    "type" => "card",
                )
            )
        );

        // Create the payment method
        $paymentMethodCurl = curl_init();

        curl_setopt_array($paymentMethodCurl, [
        CURLOPT_URL => "https://api.paymongo.com/v1/payment_methods",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FAILONERROR => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($paymentMethodCurlData),
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Basic ".base64_encode($public_key.':'),
            "Content-Type: application/json"
        ],
        ]);

        $source_details = json_decode(curl_exec($curl));
        $err = curl_error($curl);
        curl_close($curl);

        $raw_response = curl_exec($paymentMethodCurl);
        $paymentMethodCurlResponse = json_decode($raw_response);
        $paymentMethodCurlErr = curl_error($paymentMethodCurl);


        if($paymentMethodCurlErr!='') {
            PrestaShopLogger::addLog("[PayMongo, Cards] Error creating Payment Method for Cart#".$cart->id." - ".$paymentMethodCurlErr, 3);
            $this->appendErrorsToSession('There was a problem with your card payment, please check your card details. If the issue persists, please contact the merchant.');
            curl_close($paymentMethodCurl);
            Tools::redirect($this->context->link->getPageLink(
                'order',
                true,
                (int) $this->context->language->id,
                [
                    'step' => 3,
                ]
            ));
        }

        $payment_method_id = $paymentMethodCurlResponse->data->id;
        curl_close($paymentMethodCurl);


        // Create the Payment Intent
        $paymentIntentCurlData = array(
            "data" => array(
                "attributes" => array(
                    "amount" =>  (int)(round(($cart->getOrderTotal(true, Cart::BOTH) * 100),0)),
                    "payment_method_allowed" => array('card'),
                    "currency" => $this->context->currency->iso_code,
                    "metadata" => array(
                        "store_url" => Context::getContext()->shop->getBaseURL(true),
                        "cart_id" => (string) $this->context->cart->id,
                        'agent' => 'paymongo_prestashop',
                        'version' => $this->module->version
                    ),
                    "description" => 'Payment from '.Configuration::get('PS_SHOP_NAME').' for cart #'.$this->context->cart->id,
                )
            )
        );
    
        $paymentIntentCurl = curl_init();
    
        curl_setopt_array($paymentIntentCurl, [
        CURLOPT_URL => "https://api.paymongo.com/v1/payment_intents",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_FAILONERROR => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($paymentIntentCurlData),
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Basic ".base64_encode($secret_key.':'),
            "Content-Type: application/json"
        ],
        ]);


        $paymentIntentCurlResponse = json_decode(curl_exec($paymentIntentCurl));
        $paymentIntentCurlErr = curl_error($paymentIntentCurl);

        if($paymentIntentCurlErr!=''){
            PrestaShopLogger::addLog("[PayMongo, Cards] Error creating Payment Intent for Cart#".$cart->id." - ".$paymentIntentCurlErr, 3);
            $this->appendErrorsToSession('There was a problem with your card payment, please check your card details. If the issue persists, please contact the merchant.');
            curl_close($paymentIntentCurl);
            Tools::redirect($this->context->link->getPageLink(
                'order',
                true,
                (int) $this->context->language->id,
                [
                    'step' => 3,
                ]
            ));
        }

        $payment_intent_id = $paymentIntentCurlResponse->data->id;
        $payment_intent_client_id = $paymentIntentCurlResponse->data->attributes->client_key;

        curl_close($paymentIntentCurl);        

        // Attach Payment Method to Intent
        $paymentAttachCurlData = array(
            "data" => array(
                "attributes" => array(
                    "payment_method" => $payment_method_id,
                    "client_key" => $payment_intent_client_id,
                    "return_url" => $this->context->link->getModuleLink(
                        $this->module->name,
                        'threeds', 
                        array(
                            'paymentIntentId' => $payment_intent_id,
                            'cartId' => $this->context->cart->id,
                            'agent' => 'paymongo_prestashop',
                            'version' => $this->module->version
                        ))
                )
            )
        );

        $paymentAttachCurl = curl_init();
    
        curl_setopt_array($paymentAttachCurl, [
        CURLOPT_URL => "https://api.paymongo.com/v1/payment_intents/".$payment_intent_id."/attach",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_FAILONERROR => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($paymentAttachCurlData),
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Basic ".base64_encode($public_key.':'),
            "Content-Type: application/json"
        ],
        ]);

        $paymentAttachCurlResponse = json_decode(curl_exec($paymentAttachCurl));
        $paymentAttachCurlErr = curl_error($paymentAttachCurl);

        if($paymentAttachCurlErr!=''){
            PrestaShopLogger::addLog("[PayMongo, Cards] Error attaching Payment Intent for Cart#".$cart->id." - ".$paymentAttachCurlErr, 3);
            $this->appendErrorsToSession('There was a problem with your card payment, please check your card details. If the issue persists, please contact the merchant.');
            curl_close($paymentAttachCurl);
            Tools::redirect($this->context->link->getPageLink(
                'order',
                true,
                (int) $this->context->language->id,
                [
                    'step' => 3,
                ]
            ));
        }

        $payment_intent_id = $paymentAttachCurlResponse->data->id;

        curl_close($paymentAttachCurl);


        if(!$paymentAttachCurlResponse->data->attributes->next_action){
            // Completes the Order
            PrestaShopLogger::addLog("[PayMongo, Cards] Order created, set to processing", 1);
            $this->module->validateOrder(
                (int) $this->context->cart->id,
                (int) Configuration::get(PayMongo::CONFIG_OS_PROCESSING),
                (float) $this->context->cart->getOrderTotal(true, Cart::BOTH),
                $this->module->displayName,
                null,
                [
                    'transaction_id' => $paymentAttachCurlResponse->data->id
                ],
                (int) $this->context->currency->id,
                false,
                $customer->secure_key
            );

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
        }
        else{
            PrestaShopLogger::addLog("[PayMongo, Cards] Navigating to 3DS page for verification", 1);
            Tools::redirect($paymentAttachCurlResponse->data->attributes->next_action->redirect->url);
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

    private function appendErrorsToSession($error)
    {

        if (session_status() == PHP_SESSION_ACTIVE) {
            $_SESSION['paymongo_messages_card'] = $error;
        } elseif (session_status() == PHP_SESSION_NONE) {
            session_start();
            $_SESSION['paymongo_messages_card'] = $error;
        } else {
            setcookie('paymongo_messages_card', $error);
        }
    }

}
