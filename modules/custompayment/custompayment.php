<?php

use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

if (!defined('_PS_VERSION_')) {
    exit;
}

class CustomPayment extends PaymentModule
{
    const FLAG_DISPLAY_PAYMENT_INVITE = 'BANK_WIRE_PAYMENT_INVITE';

    protected $_html = '';
    protected $_postErrors = array();

    public $custompaymentname;
    public $customorderstatus;
    public $extra_mail_vars;

    public function __construct()
    {
        $this->name = 'custompayment';
        $this->tab = 'payments_gateways';
        $this->version = '1.1.1';
        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);
        $this->author = 'Inform-All';
        $this->controllers = array('payment', 'validation');
        $this->is_eu_compatible = 1;

        $this->currencies = true;
        $this->currencies_mode = 'checkbox';

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Custom Payment', array(), 'Modules.Custompayment.Admin');
        $this->description = $this->trans('Configure your own payment method with custom order status and response message.', array(), 'Modules.Custompayment.Admin');
        $this->confirmUninstall = $this->trans('Are you sure about removing the module Custom Payment?', array(), 'Modules.Custompayment.Admin');

        if (!count(Currency::checkPaymentCurrencies($this->id))) {
            $this->warning = $this->trans('No currency has been set for this module.', array(), 'Modules.Custompayment.Admin');
        }

        $this->extra_mail_vars = array(
            '{custom_payment_name}' => Tools::nl2br(Configuration::get('CUSTOM_PAYMENT_NAME', $this->context->language->id)),
        );
    }

    public function install()
    {
        Configuration::updateValue(self::FLAG_DISPLAY_PAYMENT_INVITE, true);
        if (!parent::install() || !$this->registerHook('paymentReturn') || !$this->registerHook('paymentOptions')) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        $languages = Language::getLanguages(false);
        foreach ($languages as $lang) {
            if (!Configuration::deleteByName('CUSTOM_PAYMENT_CUSTOM_TEXT', $lang['id_lang'])) {
                return false;
            }
            if (!Configuration::deleteByName('CUSTOM_PAYMENT_NAME', $lang['id_lang'])) {
                return false;
            }
            if (!Configuration::deleteByName('CUSTOM_PAYMENT_RETURNED_TEXT', $lang['id_lang'])) {
                return false;
            }
        }

        if (!Configuration::deleteByName('CUSTOM_ORDER_STATUS')
            || !parent::uninstall()) {
            return false;
        }
        return true;
    }

    protected function _postValidation()
    {
        if (Tools::isSubmit('btnSubmit')) {
            Configuration::updateValue(self::FLAG_DISPLAY_PAYMENT_INVITE,
                Tools::getValue(self::FLAG_DISPLAY_PAYMENT_INVITE));

            if (!Tools::getValue('CUSTOM_ORDER_STATUS')) {
                $this->_postErrors[] = $this->trans('A custom order status has to be set.', array(), "Modules.Custompayment.Admin");
            }
        }
    }

    protected function _postProcess()
    {
        if (Tools::isSubmit('btnSubmit')) {
            Configuration::updateValue('CUSTOM_ORDER_STATUS', Tools::getValue('CUSTOM_ORDER_STATUS'));

            $custom_name = array();
            $custom_text = array();
            $custom_returned_text = array();
            $languages = Language::getLanguages(false);
            foreach ($languages as $lang) {
                if (Tools::getIsset('CUSTOM_PAYMENT_CUSTOM_TEXT_' . $lang['id_lang'])) {
                    $custom_text[$lang['id_lang']] = Tools::getValue('CUSTOM_PAYMENT_CUSTOM_TEXT_' . $lang['id_lang']);
                }
                if (Tools::getIsset('CUSTOM_PAYMENT_NAME_' . $lang['id_lang'])) {
                    $custom_name[$lang['id_lang']] = Tools::getValue('CUSTOM_PAYMENT_NAME_' . $lang['id_lang']);
                }
                if (Tools::getIsset('CUSTOM_PAYMENT_RETURNED_TEXT_' . $lang['id_lang'])) {
                    $custom_returned_text[$lang['id_lang']] = Tools::getValue('CUSTOM_PAYMENT_RETURNED_TEXT_' . $lang['id_lang']);
                }
            }
            Configuration::updateValue('CUSTOM_PAYMENT_CUSTOM_TEXT', $custom_text);
            Configuration::updateValue('CUSTOM_PAYMENT_NAME', $custom_name);
            Configuration::updateValue('CUSTOM_PAYMENT_RETURNED_TEXT', $custom_returned_text);
        }
        $this->_html .= $this->displayConfirmation($this->trans('Saved!', array(), 'Admin.Global'));
    }

    protected function _displayBankWire()
    {
        return $this->display(__FILE__, 'infos.tpl');
    }

    public function getContent()
    {
        if (Tools::isSubmit('btnSubmit')) {
            $this->_postValidation();
            if (!count($this->_postErrors)) {
                $this->_postProcess();
            } else {
                foreach ($this->_postErrors as $err) {
                    $this->_html .= $this->displayError($err);
                }
            }
        } else {
            $this->_html .= '<br />';
        }

        $this->_html .= $this->_displayBankWire();
        $this->_html .= $this->renderForm();

        return $this->_html;
    }

    public function hookPaymentOptions($params)
    {
        if (!$this->active) {
            return [];
        }

        if (!$this->checkCurrency($params['cart'])) {
            return [];
        }

        $this->smarty->assign(
            $this->getTemplateVarInfos()
        );

        $newOption = new PaymentOption();
        $newOption->setModuleName(Tools::nl2br(Configuration::get('CUSTOM_PAYMENT_NAME', $this->context->language->id)))
            ->setCallToActionText(Tools::nl2br(Configuration::get('CUSTOM_PAYMENT_NAME', $this->context->language->id)))
            ->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))
            ->setAdditionalInformation($this->fetch('module:custompayment/views/templates/hook/custompayment_start.tpl'));
        $payment_options = [
            $newOption,
        ];

        return $payment_options;
    }

    public function hookPaymentReturn($params)
    {


        $state = $params['order']->getCurrentState();
        if ($state === Tools::getValue('CUSTOM_ORDER_STATUS', Configuration::get('CUSTOM_ORDER_STATUS'))) {

            $custompaymentName = Tools::nl2br(Configuration::get('CUSTOM_PAYMENT_NAME', $this->context->language->id));
            if (!$custompaymentName) {
                $custompaymentName = 'Custom Payment';
            }

            $custompaymentReturnedText = Tools::nl2br(Configuration::get('CUSTOM_PAYMENT_RETURNED_TEXT', $this->context->language->id));
            if (!$custompaymentReturnedText) {
                $custompaymentReturnedText = 'Info will be send trough mail';
            }


            $totalToPaid = $params['order']->getOrdersTotalPaid() - $params['order']->getTotalPaid();
            $this->smarty->assign(array(
                'shop_name' => $this->context->shop->name,
                'total' => Tools::displayPrice(
                    $totalToPaid,
                    new Currency($params['order']->id_currency),
                    false
                ),
                'custompaymentName' => $custompaymentName,
                'custompaymentReturnedText' =>$custompaymentReturnedText,
                'status' => 'ok',
                'reference' => $params['order']->reference,
                'contact_url' => $this->context->link->getPageLink('contact', true),
            ));
        } else {
            $this->smarty->assign(
                array(
                    'status' => 'failed',
                    'contact_url' => $this->context->link->getPageLink('contact', true),
                )
            );
        }

        return $this->fetch('module:custompayment/views/templates/hook/payment_return.tpl');
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

    public function renderForm()
    {
        $state = new OrderState(1);
        $states = $state->getOrderStates(1);
        $states_list = array();
        foreach ($states as $state) {
            $states_list[] = array('id' => $state['id_order_state'], 'name' => $state['name']);
        }

        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->trans('Custom Payment info', array(), 'Modules.Custompayment.Admin'),
                    'icon' => 'icon-envelope'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Your custom payment name', array(), 'Modules.Custompayment.Admin'),
                        'name' => 'CUSTOM_PAYMENT_NAME',
                        'required' => true,
                        'lang' => true
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->trans('Customer order status', array(), 'Modules.Custompayment.Admin'),
                        'desc' => $this->trans('After a order is placed and payed with your custom payment method, the order will get this status', array(), 'Modules.Emailsubscription.Admin'),
                        'name' => 'CUSTOM_ORDER_STATUS',
                        'required' => true,
                        'default_value' => 2,
                        'options' => array(
                            'query' => $states_list,
                            'id' => 'id',
                            'name' => 'name',
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->trans('Save', array(), 'Admin.Actions'),
                )
            ),
        );
        $fields_form_customization = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->trans('Customization', array(), 'Modules.Custompayment.Admin'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'textarea',
                        'label' => $this->trans('Information to the customer', array(), 'Modules.Custompayment.Admin'),
                        'name' => 'CUSTOM_PAYMENT_CUSTOM_TEXT',
                        'desc' => $this->trans('Custom text to show to the customer when selecting the payment method', array(), 'Modules.Custompayment.Admin'),
                        'lang' => true
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->trans('Confirmation page text', array(), 'Modules.Custompayment.Admin'),
                        'name' => 'CUSTOM_PAYMENT_RETURNED_TEXT',
                        'desc' => $this->trans('Information to the customer AFTER the custom payment method is used, usually information what happens next', array(), 'Modules.Custompayment.Admin'),
                        'lang' => true
                    ),
                ),
            ),
            'submit' => array(
                'title' => $this->trans('Save', array(), 'Admin.Actions'),
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ?: 0;
        $this->fields_form = array();
        $helper->id = (int)Tools::getValue('id_carrier');
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false) . '&configure='
            . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        return $helper->generateForm(array($fields_form_customization, $fields_form));
    }

    public function getConfigFieldsValues()
    {
        $custom_text = array();
        $languages = Language::getLanguages(false);
        foreach ($languages as $lang) {
            $custom_text[$lang['id_lang']] = Tools::getValue(
                'CUSTOM_PAYMENT_CUSTOM_TEXT_' . $lang['id_lang'],
                Configuration::get('CUSTOM_PAYMENT_CUSTOM_TEXT', $lang['id_lang'])
            );
            $custom_name[$lang['id_lang']] = Tools::getValue(
                'CUSTOM_PAYMENT_NAME_' . $lang['id_lang'],
                Configuration::get('CUSTOM_PAYMENT_NAME', $lang['id_lang'])
            );
            $custom_returned_text[$lang['id_lang']] = Tools::getValue(
                'CUSTOM_PAYMENT_RETURNED_TEXT_' . $lang['id_lang'],
                Configuration::get('CUSTOM_PAYMENT_RETURNED_TEXT', $lang['id_lang'])
            );
        }

        return array(
            'CUSTOM_PAYMENT_NAME' => $custom_name,
            'CUSTOM_ORDER_STATUS' => Tools::getValue('CUSTOM_ORDER_STATUS', Configuration::get('CUSTOM_ORDER_STATUS')),
            'CUSTOM_PAYMENT_CUSTOM_TEXT' => $custom_text,
            'CUSTOM_PAYMENT_RETURNED_TEXT' => $custom_returned_text
        );
    }

    public function getTemplateVarInfos()
    {
        $cart = $this->context->cart;
        $total = sprintf(
            $this->trans('%1$s (tax incl.)', array(), 'Modules.Custompayment.Shop'),
            Tools::displayPrice($cart->getOrderTotal(true, Cart::BOTH))
        );

        $custompaymentName = Tools::nl2br(Configuration::get('CUSTOM_PAYMENT_NAME', $this->context->language->id));
        if (!$custompaymentName) {
            $custompaymentName = 'Custom payment';
        }
        $bankwireCustomText = Tools::nl2br(Configuration::get('CUSTOM_PAYMENT_CUSTOM_TEXT', $this->context->language->id));
        if (false === $bankwireCustomText) {
            $bankwireCustomText = '';
        }

        return array(
            'total' => $total,
            'custompaymentName' => $custompaymentName,
            'bankwireCustomText' => $bankwireCustomText,
        );
    }
}
