<?php
 

/**
 * This Controller simulate an external payment gateway
 */
class PayMongoWebhooksModuleFrontController extends ModuleFrontController
{
    /**
     * {@inheritdoc}
     */
    public function postProcess()
    {

        $payload = file_get_contents('php://input');
        $webhook_call = json_decode($payload);
        $call_type = $webhook_call->data->attributes->type;
        $call_body = $webhook_call->data->attributes->data->attributes;
        $resource_id = $webhook_call->data->attributes->data->id;

        // Load appropriate keys based on live/test status
        if(Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_MODE)){
            $public_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_API_PUBLIC_KEY);
            $secret_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_API_SECRET_KEY);
            $webhook_secret = Configuration::get(PayMongo::CONFIG_PAYMONGO_WEBHOOK_SECRET_TEST);

        } else {
            $public_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_LIVE_API_PUBLIC_KEY);
            $webhook_secret = Configuration::get(PayMongo::CONFIG_PAYMONGO_WEBHOOK_SECRET_LIVE);
            $secret_key = Configuration::get(PayMongo::CONFIG_PAYMONGO_LIVE_API_SECRET_KEY);
        }

        // Verify that the webhook was sent by PayMongo
        $segments = explode(',', getallheaders()['Paymongo-Signature']);
        $hash = hash_hmac('sha256', substr($segments[0],2).'.'.$payload, $webhook_secret);

        if(Configuration::get(PayMongo::CONFIG_PAYMONGO_TEST_MODE)){          
            if(substr($segments[1],3)!=$hash){
                PrestaShopLogger::addLog("[PayMongo, Webhook] Webhook received - failed PayMongo verification", 3);
                $this->ajaxDie(Tools::jsonEncode(array('Warning' => "Not a PayMongo Webhook Call")));
            }
        } else {
            if(substr($segments[2],3)!=$hash){
                PrestaShopLogger::addLog("[PayMongo, Webhook] Webhook received - failed PayMongo verification", 3);
                $this->ajaxDie(Tools::jsonEncode(array('Warning' => "Not a PayMongo Webhook Call")));
            }
        }

        PrestaShopLogger::addLog("[PayMongo, Webhook] Webhook received, passed PayMongo verification", 1);

        switch($call_type){
            case 'payment.paid': {
                // Verify the payment with paymongo
                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.paymongo.com/v1/payments/".$resource_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FAILONERROR => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Basic ".base64_encode($secret_key.':'),
                    "Content-Type: application/json"
                ],
                ]);

                $payment_details = json_decode(curl_exec($curl));
                $err = curl_error($curl);

                if($err!=''){
                    PrestaShopLogger::addLog("[PayMongo, Webhook] payment.paid event - Failed to retrieve payment object - ".$err, 3);
                    curl_close($curl);
                    $this->ajaxDie(Tools::jsonEncode(array('Error' => "Error retrieving payment")));
                }

                curl_close($curl);

                $intent_curl = curl_init();

                curl_setopt_array($intent_curl, [
                CURLOPT_URL => "https://api.paymongo.com/v1/payment_intents/".$payment_details->data->attributes->payment_intent_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FAILONERROR => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Basic ".base64_encode($secret_key.':'),
                    "Content-Type: application/json"
                ],
                ]);

                $payment_intent_details = json_decode(curl_exec($intent_curl));
                $err = curl_error($curl);

                if($err!=''){
                    PrestaShopLogger::addLog("[PayMongo, Webhook] payment.paid event - Failed to retrieve payment intent ".$err, 3);
                    curl_close($intent_curl);
                    $this->ajaxDie(Tools::jsonEncode(array('Error' => "Error retrieving payment intent")));
                }

                curl_close($intent_curl);
                
                if(
                    $pi_metadata->store_url == Context::getContext()->shop->getBaseURL(true)
                ){
                    $pi_metadata = $payment_intent_details->data->attributes->metadata;                
                    $id_order = new Order(Order::getOrderByCartId($pi_metadata->cart_id));
                    if($id_order){
                        $history = new OrderHistory();
                        $history->id_order = (int)$id_order->id;
                        # PS_OS_PAYMENT/PAYMONGO_OS_PROCESSING -> PS_OS_PAYMENT
                        $history->changeIdOrderState((int)Configuration::get('PS_OS_PAYMENT'), (int)($id_order->id));
                        PrestaShopLogger::addLog("[PayMongo, Webhook] payment.paid event - Updated order state to paid for order number".$id_order->id, 1);
                        $this->ajaxDie(Tools::jsonEncode($params));
                    } else {
                        PrestaShopLogger::addLog("[PayMongo, Webhook] payment.paid event - Created new order for cart number".$cart_id, 1);
                        $this->module->validateOrder(
                            (int) $pi_metadata->cart_id,
                            Configuration::get('PS_OS_PAYMENT'),
                            (float) $cart->getOrderTotal(true, Cart::BOTH),
                            $this->module->displayName,
                            null,
                            [
                                'transaction_id' => $payment_id
                            ],
                            (int) $cart->id_currency,
                            false,
                            $customer->secure_key
                        );
                    }
                } else {
                    PrestaShopLogger::addLog("[PayMongo, Webhook] Webhook call not for this site", 1);
                    $this->ajaxDie(Tools::jsonEncode(array('Notification' => "Event not for this site")));
                }
            }
            case 'payment.failed': {
                // Verify the payment with paymongo
                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.paymongo.com/v1/payments/".$resource_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FAILONERROR => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Basic ".base64_encode($secret_key.':'),
                    "Content-Type: application/json"
                ],
                ]);

                $payment_details = json_decode(curl_exec($curl));
                $err = curl_error($curl);

                if($err!=''){
                    PrestaShopLogger::addLog("[PayMongo, Webhook] payment.failed event - Failed to retrieve payment object - ".$err, 3);
                    curl_close($curl);
                    $this->ajaxDie(Tools::jsonEncode(array('Error' => "Error retrieving payment")));
                }

                curl_close($curl);

                $intent_curl = curl_init();

                curl_setopt_array($intent_curl, [
                CURLOPT_URL => "https://api.paymongo.com/v1/payment_intents/".$payment_details->data->attributes->payment_intent_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FAILONERROR => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Basic ".base64_encode($secret_key.':'),
                    "Content-Type: application/json"
                ],
                ]);

                $payment_intent_details = json_decode(curl_exec($intent_curl));
                $err = curl_error($curl);

                if($err!=''){
                    PrestaShopLogger::addLog("[PayMongo, Webhook] payment.failed event - Failed to retrieve payment intent - ".$err, 3);
                    curl_close($intent_curl);
                    $this->ajaxDie(Tools::jsonEncode(array('Error' => "Error retrieving payment intent")));
                }

                curl_close($intent_curl);
                
                if(
                $pi_metadata->store_url == Context::getContext()->shop->getBaseURL(true)
                ){
                    $pi_metadata = $payment_intent_details->data->attributes->metadata;                
                    $id_order = new Order(Order::getOrderByCartId($pi_metadata->cart_id));
                    if($id_order){
                        $history = new OrderHistory();
                        $history->id_order = (int)$id_order->id;
                        $history->changeIdOrderState((int)Configuration::get('PS_OS_ERROR'), (int)($id_order->id));
                        PrestaShopLogger::addLog("[PayMongo, Webhook] payment.failed event - Payment failed for Order #".$id_order->id.". Order status changed to error.", 3);
                        $this->ajaxDie(Tools::jsonEncode($params));
                    } else {
                        PrestaShopLogger::addLog("[PayMongo, Webhook] payment.failed event - Payment for Cart #".$pi_metadata->cart_id." failed, order not created.", 3);  
                    } 
                } else {
                    PrestaShopLogger::addLog("[PayMongo, Webhook] payment.failed event - Webhook call not for this site", 1);
                    $this->ajaxDie(Tools::jsonEncode(array('Notification' => "Event not for this site")));
                }
            }
            case 'source.chargeable': {

                // Verify the source existence
                $curl = curl_init();
    
                curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.paymongo.com/v1/sources/".$resource_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FAILONERROR => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Basic ".base64_encode($public_key.':'),
                    "Content-Type: application/json"
                ],
                ]);
        
                $source_details = json_decode(curl_exec($curl));
                $err = curl_error($curl);

                if($err!=''){
                    PrestaShopLogger::addLog("[PayMongo, Webhook] source.chargeable event - Failed to retrieve source - ".$err, 3);
                    curl_close($curl);
                    $this->ajaxDie(Tools::jsonEncode(array('Error' => "Error retrieving source")));
                }

                curl_close($curl);

                // Prevent double charging - if the status of the source is not chargeable, webhook ends 
                if($source_details->data->attributes->status != 'chargeable'){
                    PrestaShopLogger::addLog("[PayMongo, Webhook] source.chargeable event - Source ".$source_details->data->id." has status ".$source_details->data->attributes->status."- not chargeable", 3);
                    throw new PrestaShopException('Source of status '.$source_details->data->attributes->status.' is not chargeable');
                }

                // Extract cart and customer data from source
                parse_str(parse_url($source_details->data->attributes->redirect->success)["query"], $params);
                $cart = new Cart($params['cartId']);
                $customer = new Customer($params['customerId']);

                // Prepare data to charge source
                $postData = array(
                    'data' => array(
                        'attributes' => array(
                            'amount' => (int)(round(($cart->getOrderTotal(true, Cart::BOTH) * 100),0)),
                            'currency' => $this->context->currency->iso_code,
                            'source' => array(
                                'id' => $source_details->data->id,
                                'type' => 'source'
                            ),
                            'description' => 'Payment from '.Configuration::get('PS_SHOP_NAME').' for cart #'.$params['cartId']
                        )
                    )
                );
        
                // Create payment for source
                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.paymongo.com/v1/payments",
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
                    "Authorization: Basic ".base64_encode($secret_key.':'),
                    "Content-Type: application/json"
                ],
                ]);
        
                $response = json_decode(curl_exec($curl));
                $payment_id = $response->id;
                $err = curl_error($curl);
                
                if($err!=''){
                    PrestaShopLogger::addLog("[PayMongo, Webhook] source.chargeable event - Source ".$source_details->data->id." has status ".$source_details->data->attributes->status."- not chargeable", 3);
                    curl_close($curl);
                    $this->ajaxDie(Tools::jsonEncode(array('Error' => "Error retrieving source")));
                }

                curl_close($curl);

                // Fetch order from cart, if exists
                $id_order = new Order(Order::getOrderByCartId($params['cartId']));

                // If order ID exists, update status, else validate cart and create order with paid status
                if($id_order){
                    $history = new OrderHistory();
                    $history->id_order = (int)$id_order->id;
                    # PS_OS_PAYMENT/PAYMONGO_OS_PROCESSING -> PS_OS_PAYMENT
                    $history->changeIdOrderState((int)Configuration::get('PS_OS_PAYMENT'), (int)($id_order->id));
                    $this->ajaxDie(Tools::jsonEncode($params));
                } else {
                    $this->module->validateOrder(
                        (int) $_GET['cartId'],
                        Configuration::get('PS_OS_PAYMENT'),
                        (float) $cart->getOrderTotal(true, Cart::BOTH),
                        $this->module->displayName,
                        null,
                        [
                            'transaction_id' => $payment_id
                        ],
                        (int) $cart->id_currency,
                        false,
                        $customer->secure_key
                    );
                }
            }
            default: {
                $this->ajaxDie(Tools::jsonEncode(array('Warning' => "Event unsupported")));
            }
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
}
