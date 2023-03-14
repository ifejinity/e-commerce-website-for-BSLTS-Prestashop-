<?php

use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

if (!defined('_PS_VERSION_')) {
    exit;
}

include_once(_PS_MODULE_DIR_.'/poco_paypal/api/poco_paypal_lib.php');
include_once(_PS_MODULE_DIR_.'/poco_paypal/paypal_logos.php');
include_once(_PS_MODULE_DIR_.'/poco_paypal/paypal_orders.php');
include_once(_PS_MODULE_DIR_.'/poco_paypal/paypal_tools.php');

define('POCO_WPS', 1);
define('POCO_HSS', 2);
define('POCO_ECS', 4);

define('POCO_TRACKING_CODE', 'PrestoChangeo_SP');

define('_POCO_PAYPAL_LOGO_XML_', 'logos.xml');
define('_POCO_PAYPAL_MODULE_DIRNAME_', 'poco_paypal');

class Poco_PayPal extends PaymentModule
{
    private $html = '';
    private $_html = '';
    private $_postErrors = array();

    public $payment_method;
    public $paypal_express;

    public $paypal_sandbox;
    public $paypal_capture;
    public $email_paypal;
    public $api_username;
    public $api_password;
    public $api_signature;
    protected $full_version = 10000;

    const DEFAULT_COUNTRY_ISO = 'GB';

    const ONLY_PRODUCTS = 1;
    const ONLY_DISCOUNTS = 2;
    const BOTH = 3;
    const BOTH_WITHOUT_SHIPPING = 4;
    const ONLY_SHIPPING = 5;
    const ONLY_WRAPPING = 6;
    const ONLY_PRODUCTS_WITHOUT_SHIPPING = 7;

    public function __construct()
    {
        $this->name = 'poco_paypal';
        $this->tab = 'payments_gateways';
        $this->version = '2.0.0';
        $this->author = 'presto-changeo';

        $this->currencies = true;
        $this->currencies_mode = 'checkbox';

        $this->bootstrap = true;
        parent::__construct();

        $this->refreshProperties();

        $this->displayName = $this->trans('PayPal', array(), 'Modules.PoCoPayPal.Admin');
        $this->description = $this->trans('Accepts payments by credit cards (CB, Visa, MasterCard, Amex, Aurore, Cofinoga, 4 stars) with PayPal.', array(), 'Modules.PoCoPayPal.Admin');

        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);

        $this->loadDefaults();

        if (!count(Currency::checkPaymentCurrencies($this->id))) {
            $this->warning = $this->trans('No currency has been set for this module.', array(), 'Modules.PoCoPayPal.Admin');
        }
    }

    public function install()
    {
        /* Set database */
        if (!Db::getInstance()->Execute('
        CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'poco_paypal_order` (
            `id_order` int(10) unsigned NOT NULL,
            `id_transaction` varchar(255) NOT NULL,
            `id_invoice` varchar(255) DEFAULT NULL,
            `currency` varchar(10) NOT NULL,
            `total_paid` varchar(50) NOT NULL,
            `shipping` varchar(50) NOT NULL,
            `capture` int(2) NOT NULL,
            `payment_date` varchar(50) NOT NULL,
            `payment_method` int(2) unsigned NOT NULL,
            `payment_status` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id_order`)
        ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'))
            return false;

        /* Set database */
        if (!Db::getInstance()->Execute('
        CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'poco_paypal_customer` (
            `id_paypal_customer` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `id_customer` int(10) unsigned NOT NULL,
            `paypal_email` varchar(255) NOT NULL,
            PRIMARY KEY (`id_paypal_customer`)
        ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 AUTO_INCREMENT=1'))
            return false;

        Configuration::updateValue('POCO_PAYPAL_SANDBOX', 0);
        Configuration::updateValue('POCO_PAYPAL_BUSINESS_ACCOUNT', 'paypal@prestashop.com');
        Configuration::updateValue('POCO_PAYPAL_API_USER', '');
        Configuration::updateValue('POCO_PAYPAL_API_PASSWORD', '');
        Configuration::updateValue('POCO_PAYPAL_API_SIGNATURE', '');
        Configuration::updateValue('POCO_PAYPAL_EXPRESS_CHECKOUT', 0);
        Configuration::updateValue('POCO_PAYPAL_CAPTURE', 0);
        Configuration::updateValue('POCO_PAYPAL_PAYMENT_METHOD', POCO_WPS);
        Configuration::updateValue('POCO_PAYPAL_SHIPPING_COST', 20.00);
        Configuration::updateValue('POCO_PAYPAL_VERSION', $this->version);
        Configuration::updateValue('POCO_PAYPAL_COUNTRY_DEFAULT', (int)Configuration::get('PS_COUNTRY_DEFAULT'));
        $this->createOrderState('PAYPAL_OS_AUTHORIZATION', 'Authorization accepted from PayPal', 'Autorisation acceptée par PayPal',
            false, '#DDEEFF', false,false,true,false,true);
        $this->createOrderState('PS_OS_PAYPAL', 'Awaiting PayPal payment', 'Awaiting PayPal payment',
            false, '#4169E1', false,false,false,false,false);
        if( !parent::install()
            || !$this->registerHook('paymentOptions')
            || !$this->registerHook('paymentReturn')
            || !$this->registerHook('shoppingCartExtra')
            || !$this->registerHook('backBeforePayment')
            || !$this->registerHook('rightColumn')
            || !$this->registerHook('backOfficeHeader')
            || !$this->registerHook('cancelProduct')
            || !$this->registerHook('adminOrder')
            || !$this->registerHook('displayHeader')
            || !$this->registerHook('displayReassurance'))
        {
            return false;
        }
        return true;
    }

    public function createOrderState($title, $nameEn, $nameFr, $send_email, $color, $hidden, $delivery, $logable, $shipped, $invoice)
    {
        if (!Configuration::get($title))
        {
            $orderState = new OrderState();
            $orderState->name = array();

            foreach (Language::getLanguages() as $language)
            {
                if (strtolower($language['iso_code']) == 'fr')
                    $orderState->name[$language['id_lang']] = $nameFr;
                else
                    $orderState->name[$language['id_lang']] = $nameEn;
            }

            $orderState->send_email = $send_email;
            $orderState->color = $color;
            $orderState->hidden = $hidden;
            $orderState->delivery = $delivery;
            $orderState->logable = $logable;
            $orderState->shipped = $shipped;
            $orderState->invoice = $invoice;

            if ($orderState->add())
            {
                $source = dirname(__FILE__).'/../../img/os/'.Configuration::get('PS_OS_PAYPAL').'.gif';
                if(file_exists($source)){
                    $destination = dirname(__FILE__).'/../../img/os/'.(int)$orderState->id.'.gif';
                    copy($source, $destination);
                }
            }
            Configuration::updateValue('$title', (int)$orderState->id);
        }
    }
    public function uninstall()
    {
        return parent::uninstall();
    }

    public function getContent()
    {
        $this->postProcess();

        $this->html .= $this->displayForm();
        
        return $this->html;
    }

    private function postProcess()
    {
        // Settings
        if (Tools::isSubmit('submitSettings')) {
            if (!Tools::getValue('email_paypal') && !Tools::getValue('api_username') && !Tools::getValue('api_signature')) {
               $this->html .= $this->displayError($this->l('Indicate account information.'));
            } elseif (Tools::getValue('email_paypal') && !Validate::isEmail(Tools::getValue('email_paypal'))) {
               $this->html .= $this->displayError($this->l('E-mail invalid'));
            } elseif(Tools::getValue('paypal_capture') == 1  && (!Tools::getValue('api_username') || !Tools::getValue('api_signature'))) {
               $this->html .= $this->displayError($this->l('Cannot use Authorization / capture without API Credentials.'));
            } elseif(Tools::isSubmit('paypal_express') && (!Tools::getValue('api_username') || !Tools::getValue('api_signature'))) {
               $this->html .= $this->displayError($this->l('Cannot use PayPal Express without API Credentials.'));
            } else {
                Configuration::updateValue('POCO_PAYPAL_SANDBOX', (int)Tools::getValue('sandbox_mode'));
                Configuration::updateValue('POCO_PAYPAL_CAPTURE', (int)Tools::getValue('paypal_capture'));
                Configuration::updateValue('POCO_PAYPAL_BUSINESS_ACCOUNT', trim(Tools::getValue('email_paypal')));
                Configuration::updateValue('POCO_PAYPAL_API_USER', trim(Tools::getValue('api_username')));
                Configuration::updateValue('POCO_PAYPAL_API_PASSWORD', trim(Tools::getValue('api_password')));
                Configuration::updateValue('POCO_PAYPAL_API_SIGNATURE', trim(Tools::getValue('api_signature')));
                Configuration::updateValue('POCO_PAYPAL_EXPRESS_CHECKOUT', (int)Tools::getValue('paypal_express'));

                $this->html .= $this->displayConfirmation($this->l('Settings updated'));
            }
        }

        $this->refreshProperties();
    }

    protected function loadDefaults()
    {
        $this->loadLangDefault();
        $this->paypal_logos = new PoCoPayPalLogos($this->iso_code);

        if (Tools::getValue('paypal_ec_canceled') || $this->context->cart === false)
            unset($this->context->cookie->express_checkout);

        if (!defined('_PS_ADMIN_DIR_'))
        {
            if (isset($this->context->cookie->express_checkout)){
                $this->context->smarty->assign('paypal_authorization', true);
            }


            if ((bool)Tools::getValue('isPaymentStep') == true)
            {
                $shop_url = Tools::getShopDomainSsl(true, true);
                $values = array('fc' => 'module', 'module' => 'poco_paypal', 'controller' => 'confirm', 'get_confirmation' => true);
                $this->context->smarty->assign('paypal_confirmation', $shop_url.__PS_BASE_URI__.'?'.http_build_query($values));
            }
        }
    }

    private function loadLangDefault()
    {
        $paypal_country_default = (int)Configuration::get('POCO_PAYPAL_COUNTRY_DEFAULT');
        $this->default_country  = ($paypal_country_default ? (int)$paypal_country_default : (int)Configuration::get('PS_COUNTRY_DEFAULT'));
        $this->iso_code = $this->getCountryDependency(strtoupper($this->context->language->iso_code));
    }

    public function getCountryDependency($iso_code)
    {
        $localizations = array(
            'AU' => array('AU'), 'BE' => array('BE'), 'CN' => array('CN', 'MO'), 'CZ' => array('CZ'), 'DE' => array('DE'), 'ES' => array('ES'),
            'FR' => array('FR'), 'GB' => array('GB'), 'HK' => array('HK'), 'IL' => array('IL'), 'IN' => array('IN'), 'IT' => array('IT', 'VA'),
            'JP' => array('JP'), 'MY' => array('MY'), 'NL' => array('AN', 'NL'), 'NZ' => array('NZ'), 'PL' => array('PL'), 'PT' => array('PT', 'BR'),
            'RA' => array('AF', 'AS', 'BD', 'BN', 'BT', 'CC', 'CK', 'CX', 'FM', 'HM', 'ID', 'KH', 'KI', 'KN', 'KP', 'KR', 'KZ', 'LA', 'LK', 'MH',
                'MM', 'MN', 'MV', 'MX', 'NF', 'NP', 'NU', 'OM', 'PG', 'PH', 'PW', 'QA', 'SB', 'TJ', 'TK', 'TL', 'TM', 'TO', 'TV', 'TZ', 'UZ', 'VN',
                'VU', 'WF', 'WS'),
            'RE' => array('IE', 'ZA', 'GP', 'GG', 'JE', 'MC', 'MS', 'MP', 'PA', 'PY', 'PE', 'PN', 'PR', 'LC', 'SR', 'TT',
                'UY', 'VE', 'VI', 'AG', 'AR', 'CA', 'BO', 'BS', 'BB', 'BZ', 'CL', 'CO', 'CR', 'CU', 'SV', 'GD', 'GT', 'HN', 'JM', 'NI', 'AD', 'AE',
                'AI', 'AL', 'AM', 'AO', 'AQ', 'AT', 'AW', 'AX', 'AZ', 'BA', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BV', 'BW', 'BY', 'CD', 'CF', 'CG',
                'CH', 'CI', 'CM', 'CV', 'CY', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'EH', 'ER', 'ET', 'FI', 'FJ', 'FK', 'FO', 'GA', 'GE', 'GF',
                'GH', 'GI', 'GL', 'GM', 'GN', 'GQ', 'GR', 'GS', 'GU', 'GW', 'GY', 'HR', 'HT', 'HU', 'IM', 'IO', 'IQ', 'IR', 'IS', 'JO', 'KE', 'KM', 'KW',
                'KY', 'LB', 'LI', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MD', 'ME', 'MF', 'MG', 'MK', 'ML', 'MQ', 'MR', 'MT', 'MU', 'MW', 'MZ', 'NA',
                'NC', 'NE', 'NG', 'NO', 'NR', 'PF', 'PK', 'PM', 'PS', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SC', 'SD', 'SE', 'SI', 'SJ', 'SK', 'SL',
                'SM', 'SN', 'SO', 'ST', 'SY', 'SZ', 'TC', 'TD', 'TF', 'TG', 'TN', 'UA', 'UG', 'VC', 'VG', 'YE', 'YT', 'ZM', 'ZW'),
            'SG' => array('SG'), 'TH' => array('TH'), 'TR' => array('TR'), 'TW' => array('TW'), 'US' => array('US'));

        foreach ($localizations as $key => $value)
            if (in_array($iso_code, $value))
                return $key;

        return $this->getCountryDependency(self::DEFAULT_COUNTRY_ISO);
    }

    public function getPayPalURL()
    {
        return 'www'.(Configuration::get('POCO_PAYPAL_SANDBOX') ? '.sandbox' : '').'.paypal.com';
    }

    public function getPaypalIntegralEvolutionUrl()
    {
        if (Configuration::get('POCO_PAYPAL_SANDBOX'))
            return 'https://'.$this->getPayPalURL().'/cgi-bin/acquiringweb';
        return 'https://securepayments.paypal.com/acquiringweb?cmd=_hosted-payment';
    }

    public function getPaypalStandardUrl()
    {
        return 'https://'.$this->getPayPalURL().'/cgi-bin/webscr';
    }

    public function getAPIURL()
    {
        return 'api-3t'.(Configuration::get('POCO_PAYPAL_SANDBOX') ? '.sandbox' : '').'.paypal.com';
    }

    public function getAPIScript()
    {
        return '/nvp';
    }

    public function validateOrder($id_cart, $id_order_state, $amountPaid, $paymentMethod = 'Unknown', $message = null, $transaction = array(), $currency_special = null, $dont_touch_amount = false, $secure_key = false, Shop $shop = null)
    {
        if ($this->active)
        {
            // Set transaction details if pcc is defined in PaymentModule class_exists
            if (isset($this->pcc)){
                $this->pcc->transaction_id = (isset($transaction['transaction_id']) ? $transaction['transaction_id'] : '');
            }

            parent::validateOrder((int)$id_cart, (int)$id_order_state, (float)$amountPaid, $paymentMethod, $message, $transaction, $currency_special, $dont_touch_amount, $secure_key, $shop);

            if (count($transaction) > 0){
                PoCoPayPalOrder::saveOrder((int)$this->currentOrder, $transaction);
            }
        }
    }

    private function displayForm()
    {
        $this->prepareAdminVars();

        /* Include TinyMCE if necesarry */
        $this->prepareTinyMCE();
        $tinyMCEView = $this->display(__FILE__, 'views/templates/admin/tiny_mce.tpl');

        $topMenuDisplay = $this->display(__FILE__, 'views/templates/admin/top_menu.tpl');
        $leftMenuDisplay = $this->display(__FILE__, 'views/templates/admin/left_menu.tpl');

        $settings = $this->display(__FILE__, 'views/templates/admin/settings.tpl');

        $bottomSettingsDisplay = $this->display(__FILE__, 'views/templates/admin/bottom_menu.tpl');
        
        return $tinyMCEView . $topMenuDisplay . $leftMenuDisplay . $settings . $bottomSettingsDisplay;
    }

    private function prepareTinyMCE()
    {

        $iso = Language::getIsoById((int) ($this->context->cookie->id_lang));
        $isoTinyMCE = (file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en');
        $ad = dirname($_SERVER["PHP_SELF"]);
        $this->context->smarty->assign(array(
            'iso' => $iso,
            'isoTinyMCE' => $isoTinyMCE,
            'ad' => $ad
        ));

        $this->context->smarty->assign(array(
            'base_uri' => __PS_BASE_URI__,
            'theme_name' => _THEME_NAME_,
            'theme_css_dir' => _THEME_CSS_DIR_,
            'ps_root_dir' => _PS_ROOT_DIR_,
            'iso_1' => (file_exists(_PS_ROOT_DIR_ . '/js/tinymce/jscripts/tiny_mce/langs/' . $iso . '.js') ? $iso : 'en'),
        ));
    }

    private function prepareAdminVars()
    {

        $displayUpgradeCheck = '';
        if (file_exists(dirname(__FILE__) . '/PrestoChangeoClasses/PrestoChangeoUpgrade.php')) {
            if (!in_array('PrestoChangeoUpgrade', get_declared_classes()))
                require_once(dirname(__FILE__) . '/PrestoChangeoClasses/PrestoChangeoUpgrade.php');
            $initFile = new PrestoChangeoUpgrade($this, $this->_path, $this->full_version);

            $upgradeCheck = $initFile->displayUpgradeCheck('PPL');
            if (isset($upgradeCheck) && !empty($upgradeCheck))
                $displayUpgradeCheck = $upgradeCheck;
        }
        
        $getModuleRecommendations = '';
        if (file_exists(dirname(__FILE__) . '/PrestoChangeoClasses/PrestoChangeoUpgrade.php')) {

            if (!in_array('PrestoChangeoUpgrade', get_declared_classes()))
                require_once(dirname(__FILE__) . '/PrestoChangeoClasses/PrestoChangeoUpgrade.php');
            $initFile = new PrestoChangeoUpgrade($this, $this->_path, $this->full_version);

            $getModuleRecommendations = $initFile->getModuleRecommendations('PPL');
        }

        $logoPrestoChangeo = '';
        $contactUsLinkPrestoChangeo = '';
        if (file_exists(dirname(__FILE__) . '/PrestoChangeoClasses/PrestoChangeoUpgrade.php')) {
            if (!in_array('PrestoChangeoUpgrade', get_declared_classes()))
                require_once(dirname(__FILE__) . '/PrestoChangeoClasses/PrestoChangeoUpgrade.php');
            $initFile = new PrestoChangeoUpgrade($this, $this->_path, $this->full_version);


            $logoPrestoChangeo = $initFile->getPrestoChangeoLogo();
            $contactUsLinkPrestoChangeo = $initFile->getContactUsOnlyLink();
        }

        $states = OrderState::getOrderStates((int) ($this->context->cookie->id_lang));

        $ps_version_array = explode('.', _PS_VERSION_);
        $ps_version_id = 10000 * intval($ps_version_array[0]) + 100 * intval($ps_version_array[1]);
        if (count($ps_version_array) >= 3) {
            $ps_version_id += (int) ($ps_version_array[2]);
        }

        $this->context->smarty->assign(array(
            'paypal_random' => Tools::safeOutput($this->paypal_random),
            'states' => $states,
            'displayUpgradeCheck' => $displayUpgradeCheck,
            'getModuleRecommendations' => $getModuleRecommendations,
            'id_lang' => $this->context->cookie->id_lang,
            'id_employee' => $this->context->cookie->id_employee,
            'path' => $this->_path,
            'module_name' => $this->displayName,
            'module_dir' => _MODULE_DIR_,
            'module_basedir' => _MODULE_DIR_ . 'poco_paypal/',
            'request_uri' => $_SERVER['REQUEST_URI'],
            'mod_version' => $this->version,
            'upgradeCheck' => (isset($upgradeCheck) && !empty($upgradeCheck) ? true : false),
            'logoPrestoChangeo' => $logoPrestoChangeo,
            'contactUsLinkPrestoChangeo' => $contactUsLinkPrestoChangeo,
            'ps_pp_version' => $ps_version_id
        ));

        $this->prepareSettingsVars();
    }

    private function prepareSettingsVars()
    {
        $this->context->smarty->assign(array(
            'sandbox_mode' => $this->paypal_sandbox,
            'paypal_capture' => $this->paypal_capture,
            'email_paypal' => $this->email_paypal,
            'api_username' => $this->api_username,
            'api_password' => $this->api_password,
            'api_signature' => $this->api_signature,
            'paypal_express' => $this->paypal_express
        ));
    }

    private function refreshProperties()
    {
        $random = Configuration::get('POCO_PAYPAL_RANDOM');
        if ($random != '') {
            $this->paypal_random = $random;
        } else {
            $random = md5(mt_rand() . time());
            Configuration::updateValue('POCO_PAYPAL_RANDOM', $random);
            $this->paypal_random = $random;
        }

        $this->last_updated = Configuration::get('PRESTO_CHANGEO_UC');

        $this->payment_method = Configuration::get('POCO_PAYPAL_PAYMENT_METHOD');
        $this->paypal_express = Configuration::get('POCO_PAYPAL_EXPRESS_CHECKOUT');

        $this->paypal_sandbox = Configuration::get('POCO_PAYPAL_SANDBOX');
        $this->paypal_capture = Configuration::get('POCO_PAYPAL_CAPTURE');
        $this->email_paypal = Configuration::get('POCO_PAYPAL_BUSINESS_ACCOUNT');
        $this->api_username = Configuration::get('POCO_PAYPAL_API_USER');
        $this->api_password = Configuration::get('POCO_PAYPAL_API_PASSWORD');
        $this->api_signature = Configuration::get('POCO_PAYPAL_API_SIGNATURE');
    }

    /**
     * Add the CSS & JavaScript files you want to be loaded in the BO.
     */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('configure') == $this->name) {
            $this->context->controller->addCSS($this->_path . 'views/css/globalBack.css');
            $this->context->controller->addCSS($this->_path . 'views/css/specificBack.css');
        }
    }

    public function checkCurrency($cart)
    {
        $currency_order = new Currency($cart->id_currency);
        $currencies_module = $this->getCurrency($cart->id_currency);

        if (is_array($currencies_module)) {
            foreach ($currencies_module as $currency_module) {
                if ($currency_order->id == $currency_module['id_currency']) {
                    return true;
                }
            }
        }
        return false;
    }

    public function redirectToConfirmation()
    {
        $shop_url = Tools::getShopDomainSsl(true, true);

        // Check if user went through the payment preparation detail and completed it
        $detail = unserialize($this->context->cookie->express_checkout);

        if (!empty($detail['payer_id']) && !empty($detail['token']))
        {
            $values = array('get_confirmation' => true);
            $link = $shop_url._MODULE_DIR_.$this->name.'/express_checkout/payment.php';

            Tools::redirect(Context::getContext()->link->getModuleLink('poco_paypal', 'confirm', $values));
        }
    }

    public function getGiftWrappingPrice()
    {
        $wrapping_fees_tax_inc = $this->context->cart->getGiftWrappingPrice();

        return (float)Tools::convertPrice($wrapping_fees_tax_inc, $this->context->currency);
    }

    public function getTrackingCode()
    {
        return POCO_TRACKING_CODE;
    }

    public function getCurrentUrl()
    {
        $protocol_link = Tools::usingSecureMode() ? 'https://' : 'http://';
        $request = $_SERVER['REQUEST_URI'];
        $pos = strpos($request, '?');
        
        if (($pos !== false) && ($pos >= 0))
            $request = substr($request, 0, $pos);

        $params = urlencode($_SERVER['QUERY_STRING']);

        return $protocol_link.Tools::getShopDomainSsl().$request.'?'.$params;
    }

    public function displayPayPalAPIError($object, $message, $log = false)
    {
        $send = true;
        // Sanitize log
        foreach ($log as $key => $string)
        {
            if ($string == 'ACK -> Success')
                $send = false;
            elseif (substr($string, 0, 6) == 'METHOD')
            {
                $values = explode('&', $string);
                foreach ($values as $key2 => $value)
                {
                    $values2 = explode('=', $value);
                    foreach ($values2 as $key3 => $value2)
                        if ($value2 == 'PWD' || $value2 == 'SIGNATURE')
                            $values2[$key3 + 1] = '*********';
                    $values[$key2] = implode('=', $values2);
                }
                $log[$key] = implode('&', $values);
            }
        }

        $this->context->smarty->assign(array('message' => $message, 'logs' => $log));

        if ($send)
        {
            $id_lang = (int)$this->context->cookie->id_lang;
            $iso_lang = Language::getIsoById($id_lang);

            if (!is_dir(dirname(__FILE__).'/mails/'.strtolower($iso_lang)))
                $id_lang = Language::getIdByIso('en');

            Mail::Send($id_lang, 'error_reporting', Mail::l('Error reporting from your PayPal module',
            (int)$this->context->cookie->id_lang), array('{logs}' => implode('<br />', $log)), Configuration::get('PS_SHOP_EMAIL'),
            null, null, null, null, null, _PS_MODULE_DIR_.$this->name.'/mails/');
        }

        return $object->setTemplate('module:'.$this->name.'/views/templates/front/error.tpl');
    }

    public static function getPayPalCustomerIdByEmail($email)
    {
        return Db::getInstance()->getValue('
            SELECT `id_customer`
            FROM `'._DB_PREFIX_.'poco_paypal_customer`
            WHERE paypal_email = \''.pSQL($email).'\'');
    }

    public static function getPayPalEmailByIdCustomer($id_customer)
    {
        return Db::getInstance()->getValue('
            SELECT `paypal_email`
            FROM `'._DB_PREFIX_.'poco_paypal_customer`
            WHERE `id_customer` = '.(int)$id_customer);
    }

    public static function addPayPalCustomer($id_customer, $email)
    {
        if (!PoCo_PayPal::getPayPalEmailByIdCustomer($id_customer))
        {
            Db::getInstance()->Execute('
                INSERT INTO `'._DB_PREFIX_.'poco_paypal_customer` (`id_customer`, `paypal_email`)
                VALUES('.(int)$id_customer.', \''.pSQL($email).'\')');

            return Db::getInstance()->Insert_ID();
        }

        return false;
    }

    private function _doCapture($id_order)
    {
        $paypal_order = PoCoPayPalOrder::getOrderById((int)$id_order);
        if (!$this->isPayPalAPIAvailable() || !$paypal_order)
            return false;

        $order = new Order((int)$id_order);
        $currency = new Currency((int)$order->id_currency);

        $paypal_lib = new PoCoPaypalLib();
        $response = $paypal_lib->makeCall($this->getAPIURL(), $this->getAPIScript(), 'DoCapture',
            '&'.http_build_query(array('AMT' => (float)$order->total_paid, 'AUTHORIZATIONID' => $paypal_order['id_transaction'],
            'CURRENCYCODE' => $currency->iso_code, 'COMPLETETYPE' => 'Complete'), '', '&'));
        $message = $this->l('Capture operation result:').'<br>';

        foreach ($response as $key => $value)
            $message .= $key.': '.$value.'<br>';

        if ((array_key_exists('ACK', $response)) && ($response['ACK'] == 'Success') && ($response['PAYMENTSTATUS'] == 'Completed'))
        {
            $order_history = new OrderHistory();
            $order_history->id_order = (int)$id_order;

            $order_history->changeIdOrderState(Configuration::get('PS_OS_PAYMENT'), $order);
            $order_history->addWithemail();
            $message .= $this->l('Order finished with PayPal!');
        } elseif (isset($response['PAYMENTSTATUS'])) {
            $message .= $this->l('Transaction error!');
        }

        if (!Db::getInstance()->Execute('
            UPDATE `'._DB_PREFIX_.'poco_paypal_order`
            SET `capture` = 0, `payment_status` = \''.pSQL($response['PAYMENTSTATUS']).'\', `id_transaction` = \''.pSQL($response['TRANSACTIONID']).'\'
            WHERE `id_order` = '.(int)$id_order))
            die(Tools::displayError('Error when updating PayPal database'));

        $this->_addNewPrivateMessage((int)$id_order, $message);

        Tools::redirect($_SERVER['HTTP_REFERER']);
    }

    public function _addNewPrivateMessage($id_order, $message)
    {
        if (!(bool)$id_order)
            return false;

        $new_message = new Message();
        $message = strip_tags($message, '<br>');

        if (!Validate::isCleanHtml($message))
            $message = $this->l('Payment message is not valid, please check your module.');

        $new_message->message = $message;
        $new_message->id_order = (int)$id_order;
        $new_message->private = 1;

        return $new_message->add();
    }

    public function isPayPalAPIAvailable()
    {
        if (!is_null(Configuration::get('POCO_PAYPAL_API_USER')) &&
        !is_null(Configuration::get('POCO_PAYPAL_API_PASSWORD')) && !is_null(Configuration::get('POCO_PAYPAL_API_SIGNATURE'))){
            return true;
        }

        return false;
    }

    private function _doTotalRefund($id_order)
    {
        $paypal_order = PoCoPayPalOrder::getOrderById((int)$id_order);
        if (!$this->isPayPalAPIAvailable() || !$paypal_order)
            return false;

        $order = new Order((int)$id_order);
        if (!Validate::isLoadedObject($order))
            return false;

        $products = $order->getProducts();
        $currency = new Currency((int)$order->id_currency);
        if (!Validate::isLoadedObject($currency))
            $this->_errors[] = $this->l('Not a valid currency');

        if (count($this->_errors))
            return false;

        $decimals = (is_array($currency) ? (int)$currency['decimals'] : (int)$currency->decimals) * _PS_PRICE_DISPLAY_PRECISION_;

        // Amount for refund
        $amt = 0.00;

        foreach ($products as $product)
            $amt += (float)($product['product_price_wt']) * ($product['product_quantity'] - $product['product_quantity_refunded']);
        $amt += (float)($order->total_shipping) + (float)($order->total_wrapping) - (float)($order->total_discounts);

        // check if total or partial
        if (Tools::ps_round($order->total_paid_real, $decimals) == Tools::ps_round($amt, $decimals))
            $response = $this->_makeRefund($paypal_order['id_transaction'], $id_order);
        else
            $response = $this->_makeRefund($paypal_order['id_transaction'], $id_order, (float)($amt));

        $message = $this->l('Refund operation result:').'<br>';
        foreach ($response as $key => $value)
            $message .= $key.': '.$value.'<br>';

        if (array_key_exists('ACK', $response) && $response['ACK'] == 'Success' && $response['REFUNDTRANSACTIONID'] != '')
        {
            $message .= $this->l('PayPal refund successful!');
            if (!Db::getInstance()->Execute('UPDATE `'._DB_PREFIX_.'poco_paypal_order` SET `payment_status` = \'Refunded\' WHERE `id_order` = '.(int)$id_order))
                die(Tools::displayError('Error when updating PayPal database'));

            $history = new OrderHistory();
            $history->id_order = (int)$id_order;
            $history->changeIdOrderState((int)Configuration::get('PS_OS_REFUND'), $history->id_order);
            $history->addWithemail();
            $history->save();
        }
        else
            $message .= $this->l('Transaction error!');

        $this->_addNewPrivateMessage((int)$id_order, $message);

        Tools::redirect($_SERVER['HTTP_REFERER']);
    }

    private function _canRefund($id_order)
    {
        if (!(bool)$id_order)
            return false;

        $paypal_order = Db::getInstance()->getRow('
            SELECT `payment_status`, `capture`
            FROM `'._DB_PREFIX_.'poco_paypal_order`
            WHERE `id_order` = '.(int)$id_order);

        return $paypal_order && $paypal_order['payment_status'] == 'Completed' && $paypal_order['capture'] == 0;
    }

    private function _needValidation($id_order)
    {
        if (!(int)$id_order)
            return false;

        $order = Db::getInstance()->getRow('
            SELECT `payment_method`, `payment_status`
            FROM `'._DB_PREFIX_.'poco_paypal_order`
            WHERE `id_order` = '.(int)$id_order);

        return $order && $order['payment_method'] != POCO_HSS && $order['payment_status'] == 'Pending_validation';
    }

    private function _needCapture($id_order)
    {
        if (!(int)$id_order)
            return false;

        $result = Db::getInstance()->getRow('
            SELECT `payment_method`, `payment_status`
            FROM `'._DB_PREFIX_.'poco_paypal_order`
            WHERE `id_order` = '.(int)$id_order.' AND `capture` = 1');

        return $result && $result['payment_method'] != POCO_HSS && $result['payment_status'] == 'Pending_capture';
    }

    private function _makeRefund($id_transaction, $id_order, $amt = false)
    {
        if (!$this->isPayPalAPIAvailable())
            die(Tools::displayError('Fatal Error: no API Credentials are available'));
        elseif (!$id_transaction)
            die(Tools::displayError('Fatal Error: id_transaction is null'));

        if (!$amt)
            $params = array('TRANSACTIONID' => $id_transaction, 'REFUNDTYPE' => 'Full');
        else
        {
            $isoCurrency = Db::getInstance()->getValue('
                SELECT `iso_code`
                FROM `'._DB_PREFIX_.'orders` o
                LEFT JOIN `'._DB_PREFIX_.'currency` c ON (o.`id_currency` = c.`id_currency`)
                WHERE o.`id_order` = '.(int)$id_order);

            $params = array('TRANSACTIONID' => $id_transaction, 'REFUNDTYPE' => 'Partial', 'AMT' => (float)$amt, 'CURRENCYCODE' => Tools::strtoupper($isoCurrency));
        }

        $paypal_lib = new PoCoPaypalLib();

        return $paypal_lib->makeCall($this->getAPIURL(), $this->getAPIScript(), 'RefundTransaction', '&'.http_build_query($params, '', '&'));
    }

    public function getPaymentMethods()
    {
        // WPS -> Web Payment Standard
        // HSS -> Web Payment Pro / Integral Evolution
        // ECS -> Express Checkout Solution

        $paymentMethod = array('AU' => array(POCO_WPS, POCO_HSS, POCO_ECS), 'BE' => array(POCO_WPS, POCO_ECS), 'CN' => array(POCO_WPS, POCO_ECS), 'CZ' => array(), 'DE' => array(POCO_WPS),
        'ES' => array(POCO_WPS, POCO_HSS, POCO_ECS), 'FR' => array(POCO_WPS, POCO_HSS, POCO_ECS), 'GB' => array(POCO_WPS, POCO_HSS, POCO_ECS), 'HK' => array(POCO_WPS, POCO_HSS, POCO_ECS),
        'IL' => array(POCO_WPS, POCO_ECS), 'IN' => array(POCO_WPS, POCO_ECS), 'IT' => array(POCO_WPS, POCO_HSS, POCO_ECS), 'JP' => array(POCO_WPS, POCO_HSS, POCO_ECS), 'MY' => array(POCO_WPS, POCO_ECS),
        'NL' => array(POCO_WPS, POCO_ECS), 'NZ' => array(POCO_WPS, POCO_ECS), 'PL' => array(POCO_WPS, POCO_ECS), 'PT' => array(POCO_WPS, POCO_ECS), 'RA' => array(POCO_WPS, POCO_ECS), 'RE' => array(POCO_WPS, POCO_ECS),
        'SG' => array(POCO_WPS, POCO_ECS), 'TH' => array(POCO_WPS, POCO_ECS), 'TR' => array(POCO_WPS, POCO_ECS), 'TW' => array(POCO_WPS, POCO_ECS), 'US' => array(POCO_WPS, POCO_ECS),
        'ZA' => array(POCO_WPS, POCO_ECS));

        return isset($paymentMethod[$this->iso_code]) ? $paymentMethod[$this->iso_code] : $paymentMethod[self::DEFAULT_COUNTRY_ISO];
    }

    public function hookDisplayHeader(){
         $this->context->controller->registerJavascript(
            'poco_paypal',
            'modules/' . $this->name . '/views/js/front/poco_paypal.js'
        );
    }

    public function hookShoppingCartExtra()
    {
        // No active
        if (!$this->active || !Configuration::get('POCO_PAYPAL_EXPRESS_CHECKOUT') || isset($this->context->cookie->express_checkout))
            return null;

        $values = array('en' => 'en_US', 'fr' => 'fr_FR');
        $this->context->smarty->assign(array(
            'PayPal_payment_type' => 'cart',
            'PayPal_current_page' => $this->getCurrentUrl(),
            'PayPal_lang_code' => (isset($values[$this->context->language->iso_code]) ? $values[$this->context->language->iso_code] : 'en_US'),
            'PayPal_tracking_code' => $this->getTrackingCode(),
            'include_form' => true,
            'template_dir' => dirname(__FILE__).'/views/templates/hook/'));

        return $this->display(__FILE__, 'views/templates/hook/express_checkout_shortcut_button.tpl');
    }

    public function hookAdminOrder($params)
    {
        if (Tools::isSubmit('submitPayPalCapture'))
            $this->_doCapture($params['id_order']);
        elseif (Tools::isSubmit('submitPayPalRefund'))
            $this->_doTotalRefund($params['id_order']);

        $adminTemplates = array();
        if ($this->isPayPalAPIAvailable())
        {
            if ($this->_needValidation((int)$params['id_order']))
                $adminTemplates[] = 'validation';
            if ($this->_needCapture((int)$params['id_order']))
                $adminTemplates[] = 'capture';
            if ($this->_canRefund((int)$params['id_order']))
                $adminTemplates[] = 'refund';
        }

        if (count($adminTemplates) > 0)
        {
            $order = new Order((int)$params['id_order']);

            $order_state = OrderHistory::getLastOrderState($order->id);

            $this->context->smarty->assign(
                array(
                    'authorization' => (int)Configuration::get('PAYPAL_OS_AUTHORIZATION'),
                    'base_url' => _PS_BASE_URL_.__PS_BASE_URI__,
                    'module_name' => $this->name,
                    'order_state' => $order_state,
                    'params' => $params,
                    'ps_version' => _PS_VERSION_
                )
            );

            foreach ($adminTemplates as $adminTemplate)
            {
                $this->_html .= $this->display(__FILE__, 'views/templates/admin/admin_order/'.$adminTemplate.'.tpl');
            }
        }

        return $this->_html;
    }

    public function renderExpressCheckoutButton($type)
    {
        if (!Configuration::get('POCO_PAYPAL_EXPRESS_CHECKOUT'))
            return null;

        $iso_lang = array(
            'en' => 'en_US',
            'fr' => 'fr_FR'
        );

        $this->context->smarty->assign(array(
            'PayPal_payment_type' => $type,
            'PayPal_current_page' => $this->getCurrentUrl(),
            'PayPal_lang_code' => (isset($iso_lang[$this->context->language->iso_code])) ? $iso_lang[$this->context->language->iso_code] : 'en_US',
            'PayPal_tracking_code' => $this->getTrackingCode())
        );

        return $this->display(__FILE__, 'views/templates/hook/express_checkout_shortcut_button.tpl');
    }

    public function renderExpressCheckoutForm($type, $id_product_attribute = false)
    {
        if (!Configuration::get('POCO_PAYPAL_EXPRESS_CHECKOUT')){
            return;
        }

        $this->context->smarty->assign(array(
            'PayPal_payment_type' => $type,
            'PayPal_current_page' => $this->getCurrentUrl(),
            'PayPal_tracking_code' => $this->getTrackingCode(),
            'id_product_attribute' => $id_product_attribute)
        );

        return $this->display(__FILE__, 'views/templates/hook/express_checkout_shortcut_form.tpl');
    }

    public function hookDisplayReassurance($params)
    {
        $id_product_attribute = Tools::getValue('id_product_attribute', false);

        return $this->renderExpressCheckoutButton('product').$this->renderExpressCheckoutForm('product', $id_product_attribute);
    }

    public function hookPaymentOptions($params)
    {
        if (!$this->active) {
            return;
        }

        $paymentOption = new PaymentOption();

        if (isset($this->context->cookie->express_checkout)){
            $this->redirectToConfirmation();
        }

        $logos = $this->paypal_logos->getLogos();

        $logo = $logos['LocalPayPalLogoMedium'];

        $inputs = array(
            array(
                'type' => 'hidden',
                'name' => 'express_checkout',
                'value' => 'payment_cart',
            ),
            array(
                'type' => 'hidden',
                'name' => 'current_shop_url',
                'value' => $this->getCurrentUrl()
            )
        );
        $paymentOption->setCallToActionText($this->l('Pay with PayPal'))
            ->setAction($this->context->link->getModuleLink($this->name, 'expresscheckout'))
            ->setInputs($inputs)
            ->setLogo(Media::getMediaPath($logo))
            ->setModuleName($this->name);

        $payment_options = array(
            $paymentOption
        );

        return $payment_options;
    }
}
