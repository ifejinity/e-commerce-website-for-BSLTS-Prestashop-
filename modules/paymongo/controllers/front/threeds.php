<?php
 


class PayMongoThreeDSModuleFrontController extends ModuleFrontController
{
    public function initContent(){
        parent::initContent();

        $cart = new Cart($_GET['cartId']);
        $customer = new Customer($cart->id_customer);

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

        $status_curl = curl_init();

        curl_setopt_array($status_curl, [
            CURLOPT_URL => "https://api.paymongo.com/v1/payment_intents/".$_GET['paymentIntentId'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FAILONERROR => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Authorization: Basic ".base64_encode($secret_key.':'),
                "Content-Type: application/json"
            ],
        ]);

        $intent = json_decode(curl_exec($status_curl));
        $err = curl_error($status_curl);
        curl_close($status_curl);            

        if($err!=''){

            PrestaShopLogger::addLog("[PayMongo, Cards] Error retrieving Payment Method for Cart#".$cart->id." - ".$err, 3);

            $this->appendErrorsToSession('Something went wrong with your card 3DS verification');
            Tools::redirect($this->context->link->getPageLink(
                'order',
                true,
                (int) $this->context->language->id,
                [
                      'step' => 3,
                ]
            )); 
        }
        else {

            // add checks for status of PI
            $pi_id = $intent->data->id;
            $pi_status = $intent->data->attributes->status;
            $pi_metadata = $intent->data->attributes->metadata;
            $payment_id = $intent->data->attributes->payments[0]->id;

            if(
                $pi_status == 'processing' && 
                $pi_metadata->store_url == Context::getContext()->shop->getBaseURL(true) &&
                $pi_metadata->cart_id == (string) $_GET['cartId']
                ){
                
                PrestaShopLogger::addLog("[PayMongo, Cards] Payment Method ". $pi_id." for Cart#".$cart->id." confirmed to be in processing. Order is created.", 1);
                $this->module->validateOrder(
                    (int) $_GET['cartId'],
                    Configuration::get(PayMongo::CONFIG_OS_PROCESSING),
                    (float) $cart->getOrderTotal(true, Cart::BOTH),
                    $this->module->displayName,
                    null,
                    [
                        'transaction_id' => $payment_id,
                    ],
                    (int) $cart->id_currency,
                    false,
                    $customer->secure_key
                );
        
                Tools::redirect($this->context->link->getPageLink(
                    'order-confirmation',
                    true,
                    (int) $this->context->language->id,
                    [
                        'id_cart' => (int) $cart->id,
                        'id_module' => (int) $this->module->id,
                        'id_order' => (int) $this->module->currentOrder,
                        'key' => $customer->secure_key,
                    ]
                ));
            } elseif(
                $pi_status=='succeeded' && 
                $pi_metadata->store_url == Context::getContext()->shop->getBaseURL(true) &&
                $pi_metadata->cart_id == (string) $_GET['cartId']
            ){

                PrestaShopLogger::addLog("[PayMongo, Cards] Payment Method ". $pi_id." for Cart#".$cart->id." is already succeeded. Order is marked as paid.", 2);
                $this->module->validateOrder(
                    (int) $_GET['cartId'],
                    Configuration::get('PS_OS_PAYMENT'),
                    (float) $cart->getOrderTotal(true, Cart::BOTH),
                    $this->module->displayName,
                    null,
                    [
                        'transaction_id' => $payment_id,
                    ],
                    (int) $cart->id_currency,
                    false,
                    $customer->secure_key
                );
        
                Tools::redirect($this->context->link->getPageLink(
                    'order-confirmation',
                    true,
                    (int) $this->context->language->id,
                    [
                        'id_cart' => (int) $cart->id,
                        'id_module' => (int) $this->module->id,
                        'id_order' => (int) $this->module->currentOrder,
                        'key' => $customer->secure_key,
                    ]
                ));
            } else {
                PrestaShopLogger::addLog("[PayMongo, Cards] Payment Intent ". $pi_id." for Cart#".$cart->id." is ".$pi_status." - order not created.", 2);
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
