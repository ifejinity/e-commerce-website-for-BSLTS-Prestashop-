<?php

class AdminConfigurePayMongoController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->className = 'Configuration';
        $this->table = 'configuration';

        parent::__construct();

        if (empty(Currency::checkPaymentCurrencies($this->module->id))) {
            $this->warnings[] = $this->l('No currency has been set for this module.');
        }

        $this->fields_options = [
            $this->module->name => [
                'fields' => [
                    PayMongo::CONFIG_PAYMONGO_TEST_MODE => [
                        'type' => 'bool',
                        'title' => $this->l('Enable test mode'),
                        'validation' => 'isBool',
                        'cast' => 'intval',
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PO_GCASH_ENABLED => [
                        'type' => 'bool',
                        'title' => $this->l('Accept GCash Payments'),
                        'validation' => 'isBool',
                        'cast' => 'intval',
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PO_CREDIT_CARD_ENABLED => [
                        'type' => 'bool',
                        'title' => $this->l('Accept Credit Card Payments'),
                        'validation' => 'isBool',
                        'cast' => 'intval',
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PO_GRABPAY_ENABLED => [
                        'type' => 'bool',
                        'title' => $this->l('Accept GrabPay Payments'),
                        'validation' => 'isBool',
                        'cast' => 'intval',
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PAYMONGO_TEST_API_PUBLIC_KEY => [
                        'type' => 'text',
                        'title' => $this->l('PayMongo Test API Public Key'),
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PAYMONGO_TEST_API_SECRET_KEY => [
                        'type' => 'text',
                        'title' => $this->l('PayMongo Test API Secret Key'),
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PAYMONGO_LIVE_API_PUBLIC_KEY => [
                        'type' => 'text',
                        'title' => $this->l('PayMongo Live API Public Key'),
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PAYMONGO_LIVE_API_SECRET_KEY => [
                        'type' => 'text',
                        'title' => $this->l('PayMongo Live API Secret Key'),
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PAYMONGO_WEBHOOK_SECRET_LIVE => [
                        'type' => 'text',
                        'title' => $this->l('PayMongo Live Webhook Secret'),
                        'required' => false,
                    ],
                    PayMongo::CONFIG_PAYMONGO_WEBHOOK_SECRET_TEST => [
                        'type' => 'text',
                        'title' => $this->l('PayMongo Test Webhook Secret'),
                        'required' => false,
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];
    }
}
