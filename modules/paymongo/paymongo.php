<?php
 


if (!defined('_PS_VERSION_')) {
    exit;
}

class PayMongo extends PaymentModule
{
    const CONFIG_OS_PROCESSING = 'PAYMONGO_OS_PROCESSING';
    const CONFIG_PAYMONGO_TEST_MODE = 'PAYMONGO_PAYMONGO_TEST_MODE';
    const CONFIG_PO_GCASH_ENABLED = 'PAYMONGO_PO_GCASH_ENABLED';
    const CONFIG_PO_CREDIT_CARD_ENABLED = 'PAYMONGO_PO_CREDIT_CARD_ENABLED';
    const CONFIG_PO_GRABPAY_ENABLED = 'PAYMONGO_PO_GRABPAY_ENABLED';
    const CONFIG_PAYMONGO_TEST_API_PUBLIC_KEY = 'PAYMONGO_PAYMONGO_TEST_API_PUBLIC_KEY';
    const CONFIG_PAYMONGO_TEST_API_SECRET_KEY = 'PAYMONGO_PAYMONGO_TEST_API_SECRET_KEY';
    const CONFIG_PAYMONGO_LIVE_API_PUBLIC_KEY = 'PAYMONGO_PAYMONGO_LIVE_API_PUBLIC_KEY';
    const CONFIG_PAYMONGO_LIVE_API_SECRET_KEY = 'PAYMONGO_PAYMONGO_LIVE_API_SECRET_KEY';
    const CONFIG_PAYMONGO_WEBHOOK_SECRET_LIVE = 'PAYMONGO_PAYMONGO_WEBHOOK_SECRET_LIVE';
    const CONFIG_PAYMONGO_WEBHOOK_SECRET_TEST = 'PAYMONGO_PAYMONGO_WEBHOOK_SECRET_TEST';

    const MODULE_ADMIN_CONTROLLER = 'AdminConfigurePayMongo';
    const HOOKS = [
        'actionPaymentCCAdd',
        'actionObjectShopAddAfter',
        'payment', # Prestashop 1.6
        'paymentOptions', # Prestashop 1.7
        'displayAdminOrderLeft',
        'displayAdminOrderMainBottom',
        'displayCustomerAccount',
        'displayOrderConfirmation',
        'displayOrderDetail',
        'displayPaymentByBinaries',
        'displayPaymentReturn',
        'displayPDFInvoice',
    ];

    public function __construct()
    {
        $this->name = 'paymongo';
        $this->tab = 'payments_gateways';
        $this->version = '1.0.0';
        $this->author = 'PayMongo';
        $this->currencies = true;
        $this->currencies_mode = 'checkbox';
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_,
        ];
        $this->controllers = [
            'account',
            'webhooks',
            'grabpay',
            'gcash',
            'validation',
            'threeds'
        ];

        parent::__construct();

        $this->displayName = $this->l('PayMongo Payment Gateway');
        $this->description = $this->l('Accept debit & credit card, GCash and GrabPay payments securely with PayMongo.');
    }

    /**
     * @return bool
     */
    public function install()
    {
        return (bool) parent::install()
            && (bool) $this->registerHook(static::HOOKS)
            && $this->installOrderState()
            && $this->installConfiguration()
            && $this->installTabs();
    }


    /**
     * @return bool
     */
    public function uninstall()
    {
        return (bool) parent::uninstall()
            && $this->deleteOrderState()
            && $this->uninstallConfiguration()
            && $this->uninstallTabs();
    }

    /**
     * Module configuration page
     */
    public function getContent()
    {
        // Redirect to our ModuleAdminController when click on Configure button
        Tools::redirectAdmin($this->context->link->getAdminLink(static::MODULE_ADMIN_CONTROLLER));
    }

    /**
     * This hook is used to save additional information will be displayed on BO Order View, Payment block with "Details" button
     *
     * @param array $params
     */
    public function hookActionPaymentCCAdd(array $params)
    {
        if (empty($params['paymentCC'])) {
            return;
        }

        /** @var OrderPayment $orderPayment */
        $orderPayment = $params['paymentCC'];

        if (false === Validate::isLoadedObject($orderPayment) || empty($orderPayment->order_reference)) {
            return;
        }

        /** @var Order[] $orderCollection */
        $orderCollection = Order::getByReference($orderPayment->order_reference);

        foreach ($orderCollection as $order) {
            if ($this->name !== $order->module) {
                return;
            }
        }

        if ('embedded' !== Tools::getValue('option') || !Configuration::get(static::CONFIG_PO_CREDIT_CARD_ENABLED)) {
            return;
        }

        $cardNumber = Tools::getValue('cardNumber');
        $cardBrand = Tools::getValue('cardBrand');
        $cardHolder = Tools::getValue('cardHolder');
        $cardExpiration = Tools::getValue('cardExpiration');

        if (false === empty($cardNumber) && Validate::isGenericName($cardNumber)) {
            $orderPayment->card_number = $cardNumber;
        }

        if (false === empty($cardBrand) && Validate::isGenericName($cardBrand)) {
            $orderPayment->card_brand = $cardBrand;
        }

        if (false === empty($cardHolder) && Validate::isGenericName($cardHolder)) {
            $orderPayment->card_holder = $cardHolder;
        }

        if (false === empty($cardExpiration) && Validate::isGenericName($cardExpiration)) {
            $orderPayment->card_expiration = $cardExpiration;
        }

        $orderPayment->save();
    }

    /**
     * This hook called after a new Shop is created
     *
     * @param array $params
     */
    public function hookActionObjectShopAddAfter(array $params)
    {
        if (empty($params['object'])) {
            return;
        }

        /** @var Shop $shop */
        $shop = $params['object'];

        if (false === Validate::isLoadedObject($shop)) {
            return;
        }

        $this->addCheckboxCarrierRestrictionsForModule([(int) $shop->id]);
        $this->addCheckboxCountryRestrictionsForModule([(int) $shop->id]);

        if ($this->currencies_mode === 'checkbox') {
            $this->addCheckboxCurrencyRestrictionsForModule([(int) $shop->id]);
        } elseif ($this->currencies_mode === 'radio') {
            $this->addRadioCurrencyRestrictionsForModule([(int) $shop->id]);
        }
    }


    /**
     * This hook is used to display the payment form for 1.6
     *
     * @param array $params
     *
     * @return string
     */
    public function hookPayment($params)
    {
        $cart = $params['cart'];

        if (!$this->active){
            return;
        }

        if (!$this->checkCurrency($cart)){
            return;
        }

        if($this->context->currency->iso_code != 'PHP'){
            PrestaShopLogger::addLog("PayMongo Payment methods unavailable for non PHP currencies for now", 1);
            return [];
        }

        if($cart->getOrderTotal(true, Cart::BOTH)<100){
            PrestaShopLogger::addLog("PayMongo Payment methods unavailable for orders < PHP 100", 1);
            return [];
        }

        $error_msg =  (isset($_SESSION['paymongo_messages_card']) ? $_SESSION['paymongo_messages_card'] : null);

        $this->smarty->assign(array(
            'grabpay_link' => $this->context->link->getModuleLink($this->name, 'grabpay', [], true),
            'gcash_link' => $this->context->link->getModuleLink($this->name, 'gcash', [], true),
            'card_action' => $this->context->link->getModuleLink($this->name, 'validation', [], true),
            'gcash_active' => Configuration::get(static::CONFIG_PO_GCASH_ENABLED),
            'grabpay_active' => Configuration::get(static::CONFIG_PO_GRABPAY_ENABLED),
            'card_active' => Configuration::get(static::CONFIG_PO_CREDIT_CARD_ENABLED),
            'asset_path' => $this->_path.'views/img/option/',
            'error' => $error_msg,

        ));

        unset($_SESSION['paymongo_messages_card']);

        $payment_options = $this->display(__FILE__, 'payment.tpl');

        return $payment_options;
    }

    /**
     * @param array $params
     *
     * @return array Should always return an array
     */
    public function hookPaymentOptions(array $params)
    {
        /** @var Cart $cart */
        $cart = $params['cart'];

        if($this->context->currency->iso_code != 'PHP'){
            PrestaShopLogger::addLog("PayMongo Payment methods unavailable for non PHP currencies for now", 1);
            return [];
        }

        if($cart->getOrderTotal(true, Cart::BOTH)<100){
            PrestaShopLogger::addLog("PayMongo Payment methods unavailable for orders < PHP 100", 1);
            return [];
        }

        if (false === Validate::isLoadedObject($cart) || false === $this->checkCurrency($cart)) {
            return [];
        }

        $paymentOptions = [];

        if (Configuration::get(static::CONFIG_PO_CREDIT_CARD_ENABLED)) {
            $paymentOptions[] = $this->getCreditCardOption();
        }

        if (Configuration::get(static::CONFIG_PO_GCASH_ENABLED)) {
            $paymentOptions[] = $this->getGCashOption();
        }

        if (Configuration::get(static::CONFIG_PO_GRABPAY_ENABLED)) {
            $paymentOptions[] = $this->getGrabPayOption();
        }

        return $paymentOptions;
    }

    /**
     * This hook is used to display additional information on BO Order View, under Payment block
     *
     * @since PrestaShop 1.7.7 This hook is replaced by displayAdminOrderMainBottom on migrated BO Order View
     *
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayAdminOrderLeft(array $params)
    {
        if (empty($params['id_order'])) {
            return '';
        }

        $order = new Order((int) $params['id_order']);

        if (false === Validate::isLoadedObject($order) || $order->module !== $this->name) {
            return '';
        }

        $this->context->smarty->assign([
            'moduleName' => $this->name,
            'moduleDisplayName' => $this->displayName,
            'moduleLogoSrc' => $this->getPathUri() . 'logo.png',
        ]);

        return $this->context->smarty->fetch('module:paymongo/views/templates/hook/displayAdminOrderLeft.tpl');
    }

    /**
     * This hook is used to display additional information on BO Order View, under Payment block
     *
     * @since PrestaShop 1.7.7 This hook replace displayAdminOrderLeft on migrated BO Order View
     *
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayAdminOrderMainBottom(array $params)
    {
        if (empty($params['id_order'])) {
            return '';
        }

        $order = new Order((int) $params['id_order']);

        if (false === Validate::isLoadedObject($order) || $order->module !== $this->name) {
            return '';
        }

        $this->context->smarty->assign([
            'moduleName' => $this->name,
            'moduleDisplayName' => $this->displayName,
            'moduleLogoSrc' => $this->getPathUri() . 'logo.png',
        ]);

        return $this->context->smarty->fetch('module:paymongo/views/templates/hook/displayAdminOrderMainBottom.tpl');
    }

    /**
     * This hook is used to display information in customer account
     *
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayCustomerAccount(array $params)
    {
        $this->context->smarty->assign([
            'moduleDisplayName' => $this->displayName,
            'moduleLogoSrc' => $this->getPathUri() . 'logo.png',
            'transactionsLink' => $this->context->link->getModuleLink(
                $this->name,
                'account'
            ),
        ]);

        return $this->context->smarty->fetch('module:paymongo/views/templates/hook/displayCustomerAccount.tpl');
    }

    /**
     * This hook is used to display additional information on order confirmation page
     *
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayOrderConfirmation(array $params)
    {
        if (empty($params['order'])) {
            return '';
        }

        /** @var Order $order */
        $order = $params['order'];

        if (false === Validate::isLoadedObject($order) || $order->module !== $this->name) {
            return '';
        }

        $transaction = '';

        if ($order->getOrderPaymentCollection()->count()) {
            /** @var OrderPayment $orderPayment */
            $orderPayment = $order->getOrderPaymentCollection()->getFirst();
            $transaction = $orderPayment->transaction_id;
        }

        $this->context->smarty->assign([
            'moduleName' => $this->name,
            'transaction' => $transaction,
        ]);

        return $this->context->smarty->fetch('module:paymongo/views/templates/hook/displayOrderConfirmation.tpl');
    }

    /**
     * This hook is used to display additional information on FO (Guest Tracking and Account Orders)
     *
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayOrderDetail(array $params)
    {
        if (empty($params['order'])) {
            return '';
        }

        /** @var Order $order */
        $order = $params['order'];

        if (false === Validate::isLoadedObject($order) || $order->module !== $this->name) {
            return '';
        }

        $transaction = '';

        if ($order->getOrderPaymentCollection()->count()) {
            /** @var OrderPayment $orderPayment */
            $orderPayment = $order->getOrderPaymentCollection()->getFirst();
            $transaction = $orderPayment->transaction_id;
        }

        $this->context->smarty->assign([
            'moduleName' => $this->name,
            'transaction' => $transaction,
        ]);

        return $this->context->smarty->fetch('module:paymongo/views/templates/hook/displayOrderDetail.tpl');
    }

    /**
     * This hook is used to display additional information on bottom of order confirmation page
     *
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayPaymentReturn(array $params)
    {
        if (empty($params['order'])) {
            return '';
        }

        /** @var Order $order */
        $order = $params['order'];

        if (false === Validate::isLoadedObject($order) || $order->module !== $this->name) {
            return '';
        }

        $transaction = '';

        if ($order->getOrderPaymentCollection()->count()) {
            /** @var OrderPayment $orderPayment */
            $orderPayment = $order->getOrderPaymentCollection()->getFirst();
            $transaction = $orderPayment->transaction_id;
        }

        $this->context->smarty->assign([
            'moduleName' => $this->name,
            'transaction' => $transaction,
            'transactionsLink' => $this->context->link->getModuleLink(
                $this->name,
                'account'
            ),
        ]);

        return $this->context->smarty->fetch('module:paymongo/views/templates/hook/displayPaymentReturn.tpl');
    }


    /**
     * This hook is used to display additional information on bottom of order confirmation page
     * 1.6
     *
     * @param array $params
     *
     * @return string
     */

    public function hookPaymentReturn($params)
    {
        if (!version_compare(_PS_VERSION_, '1.7', '>=')) {
            
            if (!$this->active)
                return;


            if (empty($params['objOrder'])) {
                return '';
            }
    
            /** @var Order $order */
            $order = $params['objOrder'];
    
            if (false === Validate::isLoadedObject($order) || $order->module !== $this->name) {
                return '';
            }
    
            $transaction = '';
    
            if ($order->getOrderPaymentCollection()->count()) {
                /** @var OrderPayment $orderPayment */
                $orderPayment = $order->getOrderPaymentCollection()->getFirst();
                $transaction = $orderPayment->transaction_id;
            }

            $this->context->smarty->assign([
                'moduleName' => $this->name,
                'transaction' => $transaction,
                'transactionsLink' => $this->context->link->getModuleLink(
                    $this->name,
                    'account'
                ),
            ]);
               
            return $this->display(__FILE__, 'payment_return.tpl');
        }
    }

    /**
     * This hook is used to display additional information on Invoice PDF
     *
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayPDFInvoice(array $params)
    {
        if (empty($params['object'])) {
            return '';
        }

        /** @var OrderInvoice $orderInvoice */
        $orderInvoice = $params['object'];

        if (false === Validate::isLoadedObject($orderInvoice)) {
            return '';
        }

        if (!isset($orderInvoice->order)){
            $orderInvoice->order = new Order($orderInvoice->id_order);
        }
        
        $order = $orderInvoice->order;

        if (false === Validate::isLoadedObject($order) || $order->module !== $this->name) {
            return '';
        }

        $transaction = '';

        if ($order->getOrderPaymentCollection()->count()) {
            /** @var OrderPayment $orderPayment */
            $orderPayment = $order->getOrderPaymentCollection()->getFirst();
            $transaction = $orderPayment->transaction_id;
        }

        $this->context->smarty->assign([
            'moduleName' => $this->name,
            'transaction' => $transaction,
        ]);

        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            return $this->context->smarty->fetch('module:paymongo/views/templates/hook/displayPDFInvoice.tpl');
        }
        return $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->name.'/views/templates/hook/displayPDFInvoice.tpl');
    }

    /**
     * Check if currency is allowed in Payment Preferences
     *
     * @param Cart $cart
     *
     * @return bool
     */
    private function checkCurrency(Cart $cart)
    {
        $currency_order = new Currency($cart->id_currency);
        /** @var array $currencies_module */
        $currencies_module = $this->getCurrency($cart->id_currency);

        if (empty($currencies_module)) {
            return false;
        }

        foreach ($currencies_module as $currency_module) {
            if ($currency_order->id == $currency_module['id_currency']) {
                return true;
            }
        }

        return false;
    }

    /**
     * Factory of PaymentOption for External Payment
     *
     * @return PaymentOption
     */
    private function getGCashOption()
    {
        $gcashOption = new PrestaShop\PrestaShop\Core\Payment\PaymentOption();
        $gcashOption->setModuleName($this->name);
        $gcashOption->setCallToActionText($this->l('GCash via PayMongo'));
        $gcashOption->setAction($this->context->link->getModuleLink($this->name, 'gcash', [], true));
        $gcashOption->setInputs([
            'token' => [
                'name' => 'token',
                'type' => 'hidden',
                'value' => '[5cbfniD+(gEV<59lYbG/,3VmHiE<U46;#G9*#NP#X.FA§]sb%ZG?5Q{xQ4#VM|7',
            ],
        ]);
        $gcashOption->setAdditionalInformation($this->context->smarty->fetch('module:paymongo/views/templates/front/paymentOptionExternal.tpl'));
        $gcashOption->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/option/gcash.png'));

        return $gcashOption;
    }

    /**
     * Factory of PaymentOption for External Payment
     *
     * @return PaymentOption
     */
    private function getGrabPayOption()
    {
        $grabPayOption = new PrestaShop\PrestaShop\Core\Payment\PaymentOption();
        $grabPayOption->setModuleName($this->name);
        $grabPayOption->setCallToActionText($this->l('GrabPay via PayMongo'));
        $grabPayOption->setAction($this->context->link->getModuleLink($this->name, 'grabpay', [], true));
        $grabPayOption->setInputs([
            'token' => [
                'name' => 'token',
                'type' => 'hidden',
                'value' => '[5cbfniD+(gEV<59lYbG/,3VmHiE<U46;#G9*#NP#X.FA§]sb%ZG?5Q{xQ4#VM|8',
            ],
        ]);
        $grabPayOption->setAdditionalInformation($this->context->smarty->fetch('module:paymongo/views/templates/front/paymentOptionGrabPay.tpl'));
        $grabPayOption->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/option/grabpay.png'));

        return $grabPayOption;
    }

    /**
     * Factory of PaymentOption for Embedded Payment
     *
     * @return PaymentOption
     */
    private function getCreditCardOption()
    {
        $embeddedOption = new PrestaShop\PrestaShop\Core\Payment\PaymentOption();
        $embeddedOption->setModuleName($this->name);
        $embeddedOption->setCallToActionText($this->l('Credit and Debit Cards via PayMongo'));
        $embeddedOption->setForm($this->generateCardForm());
        $embeddedOption->setAdditionalInformation($this->context->smarty->fetch('module:paymongo/views/templates/front/paymentOptionEmbedded.tpl'));
        $embeddedOption->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/option/cards.png'));

        return $embeddedOption;
    }

    /**
     * Generate a form for Embedded Payment
     *
     * @return string
     */
    private function generateCardForm()
    {
        $error_msg =  (isset($_SESSION['paymongo_messages_card']) ? $_SESSION['paymongo_messages_card'] : null);
        unset($_SESSION['paymongo_messages_card']);
        $this->context->smarty->assign([
            'action' => $this->context->link->getModuleLink($this->name, 'validation', [], true),
            'error' => $error_msg
        ]);

        return $this->context->smarty->fetch('module:paymongo/views/templates/front/paymentOptionEmbeddedForm.tpl');
    }

    /**
     * @return bool
     */
    private function installOrderState()
    {
        return $this->createOrderState(
            static::CONFIG_OS_PROCESSING,
            [
                'en' => 'PayMongo is processing payment',
            ],
            '#008651',
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false
        );
    }

    /**
     * Create custom OrderState used for payment
     *
     * @param string $configurationKey Configuration key used to store OrderState identifier
     * @param array $nameByLangIsoCode An array of name for all languages, default is en
     * @param string $color Color of the label
     * @param bool $isLogable consider the associated order as validated
     * @param bool $isPaid set the order as paid
     * @param bool $isInvoice allow a customer to download and view PDF versions of his/her invoices
     * @param bool $isShipped set the order as shipped
     * @param bool $isDelivery show delivery PDF
     * @param bool $isPdfDelivery attach delivery slip PDF to email
     * @param bool $isPdfInvoice attach invoice PDF to email
     * @param bool $isSendEmail send an email to the customer when his/her order status has changed
     * @param string $template Only letters, numbers and underscores are allowed. Email template for both .html and .txt
     * @param bool $isHidden hide this status in all customer orders
     * @param bool $isUnremovable Disallow delete action for this OrderState
     * @param bool $isDeleted Set OrderState deleted
     *
     * @return bool
     */
    private function createOrderState(
        $configurationKey,
        array $nameByLangIsoCode,
        $color,
        $isLogable = false,
        $isPaid = false,
        $isInvoice = false,
        $isShipped = false,
        $isDelivery = false,
        $isPdfDelivery = false,
        $isPdfInvoice = false,
        $isSendEmail = false,
        $template = '',
        $isHidden = false,
        $isUnremovable = true,
        $isDeleted = false
    ) {
        $tabNameByLangId = [];

        foreach ($nameByLangIsoCode as $langIsoCode => $name) {
            foreach (Language::getLanguages(false) as $language) {
                if (Tools::strtolower($language['iso_code']) === $langIsoCode) {
                    $tabNameByLangId[(int) $language['id_lang']] = $name;
                } elseif (isset($nameByLangIsoCode['en'])) {
                    $tabNameByLangId[(int) $language['id_lang']] = $nameByLangIsoCode['en'];
                }
            }
        }

        $orderState = new OrderState();
        $orderState->module_name = $this->name;
        $orderState->name = $tabNameByLangId;
        $orderState->color = $color;
        $orderState->logable = $isLogable;
        $orderState->paid = $isPaid;
        $orderState->invoice = $isInvoice;
        $orderState->shipped = $isShipped;
        $orderState->delivery = $isDelivery;
        $orderState->pdf_delivery = $isPdfDelivery;
        $orderState->pdf_invoice = $isPdfInvoice;
        $orderState->send_email = $isSendEmail;
        $orderState->hidden = $isHidden;
        $orderState->unremovable = $isUnremovable;
        $orderState->template = $template;
        $orderState->deleted = $isDeleted;
        $result = (bool) $orderState->add();

        if (false === $result) {
            $this->_errors[] = sprintf(
                'Failed to create OrderState %s',
                $configurationKey
            );

            return false;
        }

        $result = (bool) Configuration::updateGlobalValue($configurationKey, (int) $orderState->id);

        if (false === $result) {
            $this->_errors[] = sprintf(
                'Failed to save OrderState %s to Configuration',
                $configurationKey
            );

            return false;
        }

        $orderStateImgPath = $this->getLocalPath() . 'views/img/orderstate/' . $configurationKey . '.png';

        if (false === (bool) Tools::file_exists_cache($orderStateImgPath)) {
            $this->_errors[] = sprintf(
                'Failed to find icon file of OrderState %s',
                $configurationKey
            );

            return false;
        }

        if (false === (bool) Tools::copy($orderStateImgPath, _PS_ORDER_STATE_IMG_DIR_ . $orderState->id . '.gif')) {
            $this->_errors[] = sprintf(
                'Failed to copy icon of OrderState %s',
                $configurationKey
            );

            return false;
        }

        return true;
    }

    /**
     * Delete custom OrderState used for payment
     * We mark them as deleted to not break passed Orders
     *
     * @return bool
     */
    private function deleteOrderState()
    {
        $result = true;

        $orderStateCollection = new PrestaShopCollection('OrderState');
        $orderStateCollection->where('module_name', '=', $this->name);
        /** @var OrderState[] $orderStates */
        $orderStates = $orderStateCollection->getAll();

        foreach ($orderStates as $orderState) {
            $orderState->deleted = true;
            $result = $result && (bool) $orderState->save();
        }

        return $result;
    }

    /**
     * Install default module configuration
     *
     * @return bool
     */
    private function installConfiguration()
    {
        return (bool) Configuration::updateGlobalValue(static::CONFIG_PO_GCASH_ENABLED, '1')
            && (bool) Configuration::updateGlobalValue(static::CONFIG_PO_CREDIT_CARD_ENABLED, '1')
            && (bool) Configuration::updateGlobalValue(static::CONFIG_PO_GRABPAY_ENABLED, '1');
    }

    /**
     * Uninstall module configuration
     *
     * @return bool
     */
    private function uninstallConfiguration()
    {
        return (bool) Configuration::deleteByName(static::CONFIG_PO_GCASH_ENABLED)
            && (bool) Configuration::deleteByName(static::CONFIG_PO_CREDIT_CARD_ENABLED)
            && (bool) Configuration::deleteByName(static::CONFIG_PO_GRABPAY_ENABLED);
    }

    /**
     * Install Tabs
     *
     * @return bool
     */
    public function installTabs()
    {
        if (Tab::getIdFromClassName(static::MODULE_ADMIN_CONTROLLER)) {
            return true;
        }

        $tab = new Tab();
        $tab->class_name = static::MODULE_ADMIN_CONTROLLER;
        $tab->module = $this->name;
        $tab->active = true;
        $tab->id_parent = -1;
        foreach(Language::getLanguages(false) as $lang){
            $tab->name[(int) $lang['id_lang']] = $this->displayName;
        }

        return (bool) $tab->add();
    }

    /**
     * Uninstall Tabs
     *
     * @return bool
     */
    public function uninstallTabs()
    {
        $id_tab = (int) Tab::getIdFromClassName(static::MODULE_ADMIN_CONTROLLER);

        if ($id_tab) {
            $tab = new Tab($id_tab);

            return (bool) $tab->delete();
        }

        return true;
    }
}
