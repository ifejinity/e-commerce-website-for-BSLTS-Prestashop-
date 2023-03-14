<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licenced under the Software License Agreement.
 * With the purchase or the installation of the software in your application
 * you accept the licence agreement.
 *
 * @author    Presta.Site
 * @copyright 2017 Presta.Site
 * @license   LICENSE.txt
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(_PS_MODULE_DIR_ . 'psproductcountdown/classes/PSPCF.php');

class PSProductCountdown extends Module
{
    protected $html;
    protected $errors = array();
    public $settings_prefix = 'PSPC_';

    public $theme;
    public $product_list_position;
    public $product_position;
    public $compact_view;
    public $activate_all_special;
    public $hide_after_end = true;
    public $hide_expired = true;
    public $show_promo_text;
    public $adjust_positions = true;
    public $custom_css;

    public function __construct()
    {
        $this->name = 'psproductcountdown';
        $this->tab = 'front_office_features';
        $this->version = '2.0.1';
        $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.7.99.99');
        $this->author = 'PrestaSite';
        $this->bootstrap = true;
        $this->confirmUninstall = 'Are you sure? All module data will be PERMANENTLY DELETED.';

        parent::__construct();
        $this->loadSettings();

        $this->displayName = $this->l('Product countdown');
        $this->description = $this->l('Countdown timer for products.');
    }

    public function install()
    {
        if (!parent::install()) {
            return false;
        }

        // Hooks
        $this->installHooks();

        // Create tables
        $this->installDB();

        //default values:
        $this->installDefaultSettings();

        // Update from v1 to v2 and migrate all data
        $this->migrateTo20(true);

        return true;
    }

    protected function installHooks()
    {
        $hooks = array(
            'pspc',
            'PSProductCountdown',
            'displayProductButtons',
            'displayProductPriceBlock',
            'displayProductListReviews',
            'displayBackOfficeHeader',
            'actionAdminControllerSetMedia',
            'header',
            'displayAdminProductsExtra',
        );

        foreach ($hooks as $hook) {
            $this->registerHook($hook);
        }

        return true;
    }

    protected function installDB()
    {
        $install_queries = $this->getDbTablesData();

        foreach ($install_queries as $query) {
            if (!Db::getInstance()->execute($query)) {
                return false;
            }
        }

        return true;
    }

    protected function getDbTablesData()
    {
        return array(
            'pspcf' => 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'pspcf` (
                `id_pspcf` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                `from` DATETIME,
                `to` DATETIME,
                PRIMARY KEY (`id_pspcf`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8',
            'pspcf_lang' => 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'pspcf_lang` (
                `id_pspcf` INT(11) NOT NULL,
                `id_lang` INT(11) NOT NULL,
                `name` VARCHAR(255) NOT NULL,
                UNIQUE (`id_pspcf`, `id_lang`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8',
            'pspcf_shop' => 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'pspcf_shop` (
                `id_pspcf` INT(11) NOT NULL,
                `id_shop` INT(11) NOT NULL,
                `active` TINYINT(1) DEFAULT 1,
                UNIQUE (`id_pspcf`, `id_shop`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8',
            'pspcf_object' => 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'pspcf_object` (
                `id_pspcf_object` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_pspcf` INT(11) NOT NULL,
                `type` VARCHAR(64) NOT NULL,
                `id_object` INT(11) UNSIGNED NOT NULL,
                `id_product_attribute` INT(11) UNSIGNED NOT NULL DEFAULT 0,
                PRIMARY KEY (`id_pspcf_object`),
                UNIQUE (`id_pspcf`, `type`, `id_object`, `id_product_attribute`),
                INDEX (`id_pspcf`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8',
        );
    }

    protected function installDefaultSettings()
    {
        foreach ($this->getSettings() as $item) {
            if ($item['type'] == 'html') {
                continue;
            }
            $item_name = Tools::strtoupper($item['name']);
            if (isset($item['default']) && (Configuration::get($this->settings_prefix . $item_name) === false)) {
                if (isset($item['lang']) && $item['lang']) {
                    $lang_value = array();
                    $set = false;
                    foreach (Language::getLanguages() as $lang) {
                        $lang_value[$lang['id_lang']] = $item['default'];
                        if (Configuration::get($this->settings_prefix . $item_name, $lang['id_lang']) !== false) {
                            $set = true;
                        }
                    }
                    if (!$set && sizeof($lang_value)) {
                        Configuration::updateValue($this->settings_prefix . $item_name, $lang_value, true);
                    }
                } else {
                    Configuration::updateValue($this->settings_prefix . $item_name, $item['default']);
                }
            }
        }
        Configuration::updateValue($this->settings_prefix . 'VERTICAL_ALIGN', 'bottom');
    }

    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }

        foreach ($this->getDbTablesData() as $table => $query) {
            Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . pSQL($table) . '`;');
        }
        Db::getInstance()->execute(
            'DELETE FROM `' . _DB_PREFIX_ . 'configuration` WHERE `name` LIKE "'.pSQL($this->settings_prefix).'%";'
        );

        return true;
    }

    protected function loadSettings()
    {
        foreach ($this->getSettings() as $item) {
            if ($item['type'] == 'html') {
                continue;
            }

            $name = Tools::strtolower($item['name']);
            $conf_name = Tools::strtoupper($item['name']);
            if (isset($item['lang']) && $item['lang']) {
                $this->$name = array();
                foreach (Language::getLanguages() as $language) {
                    $this->{$name}[$language['id_lang']] = Configuration::get(
                        $this->settings_prefix . $conf_name,
                        $language['id_lang']
                    );
                }
            } else {
                $this->$name = Configuration::get(
                    $this->settings_prefix .
                    $conf_name
                );
            }
        }
    }

    public function getSettings($render_html = false)
    {
        $settings = array(
            array(
                'type' => 'select',
                'name' => 'PRODUCT_POSITION',
                'label' => $this->l('Position at the product page:'),
                'class' => 't',
                'options' => array(
                    'query' => $this->getProductPageSelectOptions(),
                    'id' => 'id_option',
                    'name' => 'name',
                ),
                'default' => 'displayProductPriceBlock',
                'validate' => 'isString',
            ),
            array(
                'type' => 'list_position',
                'name' => 'PRODUCT_LIST_POSITION',
                'label' => $this->l('Position in the product list:'),
                'class' => 't',
                'options' => array(
                    'query' => $this->getProductListSelectOptions(),
                    'id' => 'id_option',
                    'name' => 'name',
                ),
                'default' => 'over_img',
                'validate' => 'isString',
                'hint' => $this->l('Please use a custom hook if your theme does not support standard hooks OR if you want to place a countdown in the non-standard place. See the "Additional Instructions" block for the reference.'),
            ),
            array(
                'type' => $this->getPSVersion() == 1.5 ? 'radio' : 'switch',
                'name' => 'ACTIVATE_ALL_SPECIAL',
                'label' => $this->l('Show countdown for all products with specific prices:'),
                'class' => 't',
                'values' => array(
                    array(
                        'id' => 'activate_all_special_on',
                        'value' => 1,
                        'label' => $this->l('Yes'),
                    ),
                    array(
                        'id' => 'activate_all_special_off',
                        'value' => 0,
                        'label' => $this->l('No'),
                    ),
                ),
                'hint' => $this->l('Activate this module for all products with specific prices OR activate it manually for chosen products. Specific prices will be used only if they have appropriate availability dates.'),
                'default' => 1,
                'validate' => 'isInt',
            ),
            array(
                'type' => $this->getPSVersion() == 1.5 ? 'radio' : 'switch',
                'name' => 'SHOW_PROMO_TEXT',
                'label' => $this->l('Show promo text'),
                'class' => 't',
                'values' => array(
                    array(
                        'id' => 'show_promo_text_on',
                        'value' => 1,
                        'label' => $this->l('Yes'),
                    ),
                    array(
                        'id' => 'show_promo_text_off',
                        'value' => 0,
                        'label' => $this->l('No'),
                    ),
                ),
                'hint' => $this->l('"Offer ends in"'),
                'default' => 1,
                'validate' => 'isInt',
            ),
            array(
                'type' => 'theme',
                'name' => 'THEME',
                'label' => $this->l('Theme:'),
                'hint' => $this->l('Here you can choose a theme that best suits your shop'),
                'class' => 't',
                'values' => $this->getThemesOptions(),
                'default' => '1-simple.css',
                'col' => 9,
                'validate' => 'isString',
            ),
            array(
                'type' => $this->getPSVersion() == 1.5 ? 'radio' : 'switch',
                'name' => 'COMPACT_VIEW',
                'label' => $this->l('Compact view:'),
                'class' => 't',
                'values' => array(
                    array(
                        'id' => 'compact_view_on',
                        'value' => 1,
                        'label' => $this->l('Yes'),
                    ),
                    array(
                        'id' => 'compact_view_off',
                        'value' => 0,
                        'label' => $this->l('No'),
                    ),
                ),
                'hint' => $this->l('More compact view.'),
                'default' => 0,
                'validate' => 'isInt',
            ),
            array(
                'type' => 'textarea',
                'name' => 'CUSTOM_CSS',
                'label' => $this->l('Custom CSS:'),
                'hint' => $this->l('Add your styles directly in this field without editing files'),
                'desc' => $this->l('Example: .psproductcountdown { font-style: italic; }'),
                'validate' => 'isCleanHtml',
                'resize' => true,
                'cols' => '',
                'rows' => '',
            ),
        );

        if ($this->getPSVersion() < 1.6) {
            foreach ($settings as &$item) {
                $desc = isset($item['desc']) ? $item['desc'] : '';
                $hint = isset($item['hint']) ? $item['hint'] . '<br/>' : '';
                $item['desc'] = $hint . $desc;
                $item['hint'] = '';
            }
        }

        return $settings;
    }

    public function getContent()
    {
        $this->html = '';
        $this->html .= $this->renderDevInfo();
        $this->html .= $this->postProcess();

        if (!$this->active) {
            return $this->displayError($this->l('The module is deactivated'));
        }

        $tabs = array(
            array(
                'name' => $this->l('Countdown timers'),
                'content' => array(
                    'pspc-countdown-list' => $this->renderCountdownList()
                ),
            ),
            array(
                'name' => $this->l('Settings'),
                'content' => $this->renderForm(),
            ),
            array(
                'name' => $this->l('Additional instructions'),
                'content' => $this->renderAdditionalInstructions(),
            ),
        );

        $this->context->smarty->assign(array(
            'pspc_tabs' => $tabs,
        ));
        $this->html .= $this->context->smarty->fetch(
            $this->local_path . 'views/templates/admin/tabs.tpl'
        );

        $this->html .= $this->renderProFeatures();

        return $this->html;
    }

    protected function postProcess()
    {
        $html = '';
        $this->errors = array();
        $settings_updated = false;
        $confirmation = 6;
        
        // Check if this is an ajax call / PS1.5
        if ($this->getPSVersion() < 1.6 && Tools::getIsset('ajax')
            && Tools::getValue('ajax') && Tools::getValue('action')) {
            if (is_callable(array($this, 'ajaxProcess'.Tools::getValue('action')))) {
                call_user_func(array($this, 'ajaxProcess' . Tools::getValue('action')));
            }
            die();
        }

        if (Tools::isSubmit('submitModule')) {
            //saving settings:
            $settings = $this->getSettings();

            foreach ($settings as $item) {
                if ($item['type'] == 'html'
                    || (isset($item['lang']) && $item['lang'] == true)
                    || $item['type'] == 'colors') {
                    continue;
                }

                if (Tools::isSubmit($item['name'])) {
                    $validated = true;
                    $val_method = $item['validate'];
                    if (Tools::strlen(Tools::getValue($item['name']))) {
                        // Validation:
                        if (Tools::strlen($val_method) && is_callable(array('Validate', $val_method))) {
                            $validated =
                                call_user_func(array('Validate', $val_method), Tools::getValue($item['name']));
                        }
                    }
                    if ($validated) {
                        Configuration::updateValue(
                            $this->settings_prefix . $item['name'],
                            Tools::getValue($item['name']),
                            true
                        );
                        $settings_updated = true;
                    } else {
                        $label = trim($item['label'], ':');
                        $this->errors[] = sprintf($this->l('The "%s" field is invalid'), $label);
                    }
                }
                if (isset($item['addon']) && is_array($item['addon'])
                    && isset($item['addon']['name']) && $item['addon']['name']) {
                    $addon_name = $item['addon']['name'];
                    Configuration::updateValue(
                        $this->settings_prefix . $addon_name,
                        Tools::getValue($addon_name),
                        true
                    );
                }
            }

            //update lang fields:
            $languages = Language::getLanguages();
            foreach ($settings as $item) {
                if (!(isset($item['lang']) && $item['lang'])) {
                    continue;
                }
                $val_method = (isset($item['validate']) ? $item['validate'] : '');
                $lang_value = array();
                foreach ($languages as $lang) {
                    if (Tools::isSubmit($item['name'] . '_' . $lang['id_lang'])) {
                        // Check if it's required but empty
                        if (isset($item['required']) && $item['required']
                            && !Tools::getValue($item['name'] . '_' . $lang['id_lang'])
                        ) {
                            $label = trim($item['label'], ':');
                            $this->errors[] = sprintf(
                                $this->l('The "%s" field is required and cannot be empty (%s)'),
                                $label,
                                $lang['name']
                            );
                            continue;
                        }
                        $validated = true;
                        if (Tools::strlen(Tools::getValue($item['name'] . '_' . $lang['id_lang']))) {
                            // Validation:
                            if (Tools::strlen($val_method) && is_callable(array('Validate', $val_method))) {
                                $validated = call_user_func(
                                    array('Validate', $val_method),
                                    Tools::getValue($item['name'] . '_' . $lang['id_lang'])
                                );
                            }
                        }
                        if ($validated) {
                            $lang_value[$lang['id_lang']] = Tools::getValue($item['name'] . '_' . $lang['id_lang']);
                            $settings_updated = true;
                        } else {
                            $label = trim($item['label'], ':');
                            $this->errors[] = sprintf($this->l('The "%s" field is invalid'), $label);
                        }
                    }
                }
                if (sizeof($lang_value)) {
                    Configuration::updateValue($this->settings_prefix . $item['name'], $lang_value, true);
                }
            }
        }

        // Delete pspcf
        if (Tools::isSubmit('deletepspcf')) {
            $id_pspc = Tools::getValue('id_pspcf');
            if ($id_pspc) {
                $pspc = new PSPCF($id_pspc);
                $pspc->delete();
                $this->clearSmartyCache();
            }
        }

        $this->loadSettings();

        if ($settings_updated && !sizeof($this->errors)) {
            // Clear smarty cache
            $this->clearSmartyCache();
            // redirect after save
            $token = Tools::getAdminTokenLite('AdminModules');
            $redirect_url = 'index.php?controller=AdminModules&configure=' .
                $this->name . '&token=' . $token . '&conf='.$confirmation;
            Tools::redirectAdmin($redirect_url);
        } elseif (sizeof($this->errors)) {
            foreach ($this->errors as $err) {
                $html .= $this->displayError($err);
            }
        }

        return $html;
    }

    protected function renderCountdownList()
    {
        $table = 'pspcf';
        $helper = $this->createListHelper($table, 'id_pspcf');
        $helper->actions = array('edit', 'delete');
        $helper->title = $this->l('Countdown timers');
        $fields_list = array(
            'id_pspcf' => array(
                'title' => $this->l('ID'),
                'type' => 'text',
                'search' => true,
                'orderby' => true,
                'remove_onclick' => true,
            ),
            'items' => array(
                'title' => $this->l('Items'),
                'type' => 'text',
                'search' => true,
                'orderby' => true,
                'remove_onclick' => true,
                'show_item_list' => true,
                'width' => '300',
                'class' => 'pspc-td-items-toggle',
            ),
            'name' => array(
                'title' => $this->l('Promo text'),
                'type' => 'text',
                'search' => true,
                'orderby' => true,
                'remove_onclick' => true,
            ),
            'from' => array(
                'title' => $this->l('From'),
                'type' => 'text',
                'search' => false,
                'orderby' => true,
                'value_class' => 'pspc-datetime-utc',
                'remove_onclick' => true,
            ),
            'to' => array(
                'title' => $this->l('To'),
                'type' => 'text',
                'search' => false,
                'orderby' => true,
                'value_class' => 'pspc-datetime-utc',
                'remove_onclick' => true,
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'type' => 'pspc_status',
                'search' => false,
                'orderby' => true,
                'remove_onclick' => true,
            ),
        );

        // if multishop
        if (Shop::isFeatureActive()) {
            $fields_list['shops'] = array(
                'title' => $this->l('Shops'),
                'type' => 'text',
                'search' => false,
                'orderby' => false,
            );
        }

        $content =
            $this->getItemsBO(false, $helper->orderBy, $helper->orderWay, $helper->page, $helper->n, $fields_list, $table);
        $helper->listTotal =
            $this->getItemsBO(true, $helper->orderBy, $helper->orderWay, $helper->page, $helper->n, $fields_list, $table);

        $types = array(
            'product' => array($this->l('%s product'), $this->l('%s products')),
        );
        foreach ($content as &$row) {
            $objects = array();
            $items_count = 0;
            foreach ($types as $type => $text) {
                $count = PSPCF::getObjectsCount($row['id_pspcf'], $type);
                $items_count += $count;
                if ($count) {
                    $objects[] = ($count == 1 ? sprintf($text[0], $count) : sprintf($text[1], $count));
                }
            }
            $row['items_count'] = $items_count;
            $row['items'] = implode(', ', $objects);

            if (strpos($row['to'], '0000-00-00') !== false) {
                $row['to'] = '';
            }
            if (strpos($row['from'], '0000-00-00') !== false) {
                $row['from'] = '';
            }

            $row['form'] = true;

            if (Shop::isFeatureActive()) {
                $shops = PSPCF::getShopsStatic($row['id_pspcf'], false);
                $shops_names = array();
                foreach ($shops as $id_shop) {
                    $shops_names[] = $this->getShopName($id_shop);
                }
                $row['shops'] = implode(', ', $shops_names);
            }
        }

        if (Tools::getValue('submitFilter'.$table) == 0) {
            $this->context->smarty->assign(array(
                'filters_has_value' => false,
            ));
        }

        $this->context->smarty->assign(array(
            'psv' => $this->getPSVersion(),
            'psvd' => $this->getPSVersion(true),
            'link' => $this->context->link,
            'form_id' => $table,
            'preTable' => $this->renderCountdownForm(),
            'icon' => 'icon-cogs',
            'pspc_list_class' => 'pspc-countdown-list',
            'pspc_colspan' => (count($content) > 1 ? count($fields_list) + 2 : count($fields_list) + 1),
            'pspc_module' => $this,
        ));

        return $helper->generateList($content, $fields_list);
    }

    protected function renderAdditionalInstructions()
    {
        $this->context->smarty->assign(array(
            'psv' => $this->getPSVersion(),
            'pspc_ps_theme' => _THEME_NAME_,
            'img_path' => $this->_path.'views/img/',
        ));

        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/instructions.tpl');
    }

    protected function renderForm()
    {
        $settings = $this->getSettings(true);
        $field_forms = array(
            array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Settings'),
                        'icon' => 'icon-cogs'
                    ),
                    'input' => $settings,
                    'submit' => array(
                        'title' => $this->l('Save'),
                    )
                ),
            ),
        );

        $helper = $this->createFormHelper($field_forms, 'Module');

        foreach ($settings as $item) {
            if ($item['type'] == 'html' || $item['type'] == 'hidden') {
                continue;
            }
            $name = Tools::strtoupper($item['name']);
            if (isset($item['lang']) && $item['lang']) {
                foreach (Language::getLanguages() as $language) {
                    $helper->tpl_vars['fields_value'][$item['name']][$language['id_lang']] = Configuration::get(
                        $this->settings_prefix . $name,
                        $language['id_lang']
                    );
                }
            } else {
                $helper->tpl_vars['fields_value'][$item['name']] = Configuration::get(
                    $this->settings_prefix .
                    $name
                );
            }
            if (isset($item['addon']) && is_array($item['addon'])
                && isset($item['addon']['name']) && $item['addon']['name']) {
                $addon_name = $item['addon']['name'];
                $helper->tpl_vars['fields_value'][$addon_name] = html_entity_decode(
                    Configuration::get($this->settings_prefix . Tools::strtoupper($addon_name))
                );
            }
            if ($item['name'] == 'CUSTOM_CSS') {
                $helper->tpl_vars['fields_value'][$item['name']] = html_entity_decode(
                    Configuration::get($this->settings_prefix . $name)
                );
            }
        }

        return $helper->generateForm($field_forms);
    }

    protected function createFormHelper(&$form_settings, $table, $item = null)
    {
        if ($this->getPSVersion() == 1.5) {
            foreach ($form_settings as &$form) {
                $form['form']['submit']['class'] = 'button';
            }
        }

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang =
            Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ?
                Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') :
                0;
        $this->fields_form = array();

        $helper->identifier = 'id_'.$table;
        $helper->submit_action = 'submit'.$table;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false) .
            '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => array(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'psvd' => $this->getPSVersion(true),
            'psv' => $this->getPSVersion(),
            'PS_ALLOW_ACCENTED_CHARS_URL' => Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
        );
        $helper->module = $this;
        if (Validate::isLoadedObject($item) && $item->id) {
            $helper->id = $item->id;
        }

        $languages = Language::getLanguages();
        foreach ($form_settings as $form) {
            foreach ($form['form']['input'] as $row) {
                if ($row['type'] != 'html' && $row['type'] != 'hidden') {
                    if (Validate::isLoadedObject($item)) {
                        if (property_exists($item, $row['name'])) {
                            $helper->tpl_vars['fields_value'][$row['name']] = $item->{$row['name']};
                        }
                        if (Tools::isSubmit($row['name'])) {
                            $helper->tpl_vars['fields_value'][$row['name']] = Tools::getValue($row['name']);
                        }
                    } else {
                        if (isset($row['lang']) && $row['lang']) {
                            foreach ($languages as $language) {
                                $helper->tpl_vars['fields_value'][$row['name']][$language['id_lang']] =
                                    Tools::getValue($row['name'] . '_' . $language['id_lang']);
                            }
                        } else {
                            $helper->tpl_vars['fields_value'][$row['name']] = Tools::getValue($row['name']);
                        }
                    }
                }
            }
        }

        $iso = $this->context->language->iso_code;
        $helper->tpl_vars['iso'] = file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en';
        $helper->tpl_vars['path_css'] = _THEME_CSS_DIR_;
        $helper->tpl_vars['ad'] = __PS_BASE_URI__.basename(_PS_ADMIN_DIR_);
        $helper->tpl_vars['tinymce'] = true;

        return $helper;
    }

    protected function getPSVersion($without_dots = false)
    {
        $ps_version = _PS_VERSION_;
        $ps_version = Tools::substr($ps_version, 0, 3);

        if ($without_dots) {
            $ps_version = str_replace('.', '', $ps_version);
        }

        return (float)$ps_version;
    }

    public function hookDisplayBackOfficeHeader($params)
    {
        $html = '';
        // check whether it's a product page or the module's page
        if (Tools::getValue('configure') == $this->name
            || $this->context->controller->controller_name == 'AdminProducts') {
            $token = Tools::getAdminTokenLite('AdminModules');
            $ajax_url = 'index.php?controller=AdminModules&configure=' . $this->name . '&token=' . $token;

            $this->context->smarty->assign(array(
                'psv' => $this->getPSVersion(),
                'ajax_url' => $ajax_url,
            ));

            $html = $this->context->smarty->fetch($this->local_path . 'views/templates/hook/admin_header.tpl');
        }

        // init countdown if it's a preview page
        if (Tools::getValue('controller') == 'AdminLayerSlider') {
            $html .= $this->hookHeader();
        }

        return $html;
    }

    public function hookActionAdminControllerSetMedia($params)
    {
        if (Tools::getValue('configure') == $this->name
            || $this->context->controller->controller_name == 'AdminProducts') {
            $this->context->controller->addCSS(array(
                $this->_path . 'views/css/flatpickr.min.css',
                $this->_path . 'views/css/admin2.css',
            ));
            if ($this->getPSVersion() == 1.5) {
                $this->context->controller->addCSS(array(
                    $this->_path . 'views/css/admin15.css',
                    $this->_path . 'views/css/grid15.css',
                ));
            }
            if ($this->context->controller->controller_name == 'AdminModules') {
                $this->context->controller->addJquery();
                $this->context->controller->addJqueryUI('ui.slider');
                $this->context->controller->addJqueryPlugin(array('typewatch'));
            }
            $this->context->controller->addJS(array(
                $this->_path . 'views/js/moment.min.js',
                $this->_path . 'views/js/flatpickr.min.js',
                $this->_path . 'views/js/jquery.autocomplete.min.js',
            ));

            if ($this->context->controller->controller_name == 'AdminProducts') {
                $this->context->controller->addJS(array(
                    $this->_path . 'views/js/admin-product.js',
                ));
            } else {
                $this->context->controller->addJS(array(
                    $this->_path . 'views/js/admin2.js',
                    $this->_path . 'views/js/admin-options.js',
                    $this->_path . 'views/js/admin-select.js',
                ));
            }
        }
    }

    protected function getProductListSelectOptions()
    {
        $results = array(
            array(
                'id_option' => 'no',
                'name' => '-- '.$this->l('(custom hook only)'),
            ),
            array(
                'id_option' => 'custom_over_img',
                'name' => '-- '.$this->l('(custom hook overlay)'),
            ),
            array(
                'id_option' => 'over_img',
                'name' => $this->l('Over product image'),
            ),
            array(
                'id_option' => 'displayProductListReviews',
                'name' => $this->l('After product name'),
            ),
        );

        return $results;
    }

    protected function getProductPageSelectOptions()
    {
        $results = array(
            array(
                'id_option' => 'no',
                'name' => '-- '.$this->l('(custom hook only)'),
            ),
            array(
                'id_option' => 'displayProductPriceBlock',
                'name' => $this->l('After price'),
            ),
            array(
                'id_option' => 'displayProductButtons',
                'name' => $this->l('Product buttons'),
            ),
        );

        return $results;
    }

    protected function getThemesOptions()
    {
        $options = array();

        foreach ($this->getThemes() as $theme) {
            $options[] = array(
                'id' => $theme['file'],
                'value' => $theme['file'],
                'label' => $theme['name'],
                'img' => $this->_path.'views/img/themes/'.$theme['name'].'.png',
            );
        }

        return $options;
    }

    protected function getThemes()
    {
        $themes = array();

        if (file_exists(_PS_MODULE_DIR_ . $this->name . '/views/css/themes/')) {
            $themes_files = scandir(_PS_MODULE_DIR_ . $this->name . '/views/css/themes/');
            natsort($themes_files);
            foreach ($themes_files as $file) {
                if (strpos($file, '.css') !== false) {
                    $pos = strpos($file, '.css');
                    $themes[] = array('file' => $file, 'name' => Tools::substr($file, 0, $pos),);
                }
            }
        }

        return $themes;
    }

    protected function renderSettingsDivider($render = true)
    {
        if (!$render) {
            return '';
        }

        return $this->context->smarty->fetch(
            $this->local_path . 'views/templates/admin/divider.tpl'
        );
    }

    protected function createListHelper($table, $identifier = null)
    {
        if ($identifier === null) {
            $identifier = 'id_'.$table;
        }

        $this->context->cookie->{$table.'_pagination'} =
            Tools::getValue($table.'_pagination', $this->context->cookie->{$table.'_pagination'});
        if (!$this->context->cookie->{$table.'_pagination'}) {
            $this->context->cookie->{$table.'_pagination'} = 20;
        }
        $this->context->cookie->{$table.'_pagination'} = 1000; // todo del, pagination doesn't work

        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->identifier = $identifier;
        $helper->actions = array();
        $helper->show_toolbar = false;
        $helper->_defaultOrderBy = 'id_pspcf';
        $helper->list_id = $table;
        $helper->table_id = $table;
        $helper->actions = array('edit', 'delete');
        $helper->table = $table;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        $helper->currentIndex = str_replace('adminmodules', 'AdminModules', $helper->currentIndex);
        $helper->no_link = false;
        $helper->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'confirm' => $this->l('Delete selected items?'),
                'icon' => 'icon-trash'
            )
        );

        if (version_compare(_PS_VERSION_, '1.6.1.0', '>=')) {
            if (isset($this->context->cookie->{$helper->table . '_pagination'})
                && $this->context->cookie->{$helper->table . '_pagination'}) {
                $helper->_default_pagination = $this->context->cookie->{$helper->table . '_pagination'};
            } elseif ($this->getPSVersion() > 1.5) {
                $helper->_default_pagination = $helper->_pagination[0];
            } else {
                $helper->_default_pagination = 20;
            }
        }
        $helper->module = $this;

        $order_way = Tools::strtolower(Tools::getValue($table.'Orderway'));
        $order_way = ($order_way == 'desc' ? 'desc' : 'asc');
        $order_by = Tools::getValue($table.'Orderby', 'pspcf.`id_pspcf`');
        $helper->orderBy = $order_by;
        $helper->orderWay = $order_way;
        $p = (int)Tools::getValue('submitFilter'.$table, Tools::getValue('page', 1));
        if ($p < 1) {
            $p = 1;
        }
        $helper->page = $p;

        $helper->n = Tools::getValue(
            $table.'_pagination',
            isset($this->context->cookie->{$table.'_pagination'}) ?
                $this->context->cookie->{$table.'_pagination'} :
                $helper->_default_pagination
        );

        return $helper;
    }

    public function getItemsBO($only_count = false, $order_by = null, $order_way = null, $page = 1, $n = 20, $fields_list = array(), $table = '')
    {
        $filters = $this->getFilters($fields_list, $table);
        $filters_query = $this->getFiltersQuery($filters);

        $order_by_replace = array(
            'from' => '`from`',
            'to' => '`to`',
        );
        if (isset($order_by_replace[$order_by])) {
            $order_by = $order_by_replace[$order_by];
        }

        $select = 'SELECT *,
                   IF(pspcf.`from` > UTC_TIMESTAMP(), "-1", IF(pspcf.`to` < UTC_TIMESTAMP(), "-2", pspcfs.`active`)) as `active`,
                   pspcfs.`active` as `active_orig`';
        $limit = 'LIMIT '.(((int)$page - 1) * (int)$n).', '.(int)$n;

        if ($only_count) {
            $select = 'SELECT DISTINCT COUNT(pspcf.`id_pspcf`)';
            $limit = '';
        }

        $query = $select.'
             FROM `' . _DB_PREFIX_ . 'pspcf` pspcf
             LEFT JOIN  `' . _DB_PREFIX_ . 'pspcf_lang` pspcfl
              ON pspcf.`id_pspcf` = pspcfl.`id_pspcf` AND pspcfl.`id_lang` = '.(int)$this->context->language->id.'
             LEFT JOIN  `' . _DB_PREFIX_ . 'pspcf_shop` pspcfs
              ON pspcf.`id_pspcf` = pspcfs.`id_pspcf`
             WHERE 1
             '.($filters_query ? $filters_query : '').'
              AND pspcfs.`id_shop` IN (' . implode(',', array_map('intval', Shop::getContextListShopID())) . ')
             '.($only_count ? '' : ' GROUP BY pspcf.`id_pspcf` ').'
             ORDER BY
              '.($order_by && $order_way ? pSQL($order_by).' '.pSQL($order_way) : '').'
             '.$limit;

        if ($only_count) {
            $count = Db::getInstance()->getValue($query);
            if ($count > 0) { // todo delete, pagination doesn't work
                return 1;
            }
            return $count;
        }

        return Db::getInstance()->executeS($query);
    }

    protected function getFilters($fields_list, $table)
    {
        if (!Tools::getValue('submitFilter'.$table)) {
            return array();
        }

        $filters = array();
        foreach ($fields_list as $key => $field) {
            $val = Tools::getValue($table.'Filter_'.$key);
            if ($val || $val === 0 || $val === '0') {
                $filters[$key] = $val;
            }
            if (isset($field['filter_key']) && $field['filter_key']) {
                $val = Tools::getValue($table . 'Filter_' . $field['filter_key']);
                if ($val || $val === 0 || $val === '0') {
                    $key = str_replace('!', '.', $field['filter_key']);
                    $filters[$key] = $val;
                }
            }
        }

        return $filters;
    }

    protected function getFiltersQuery($filters)
    {
        $filters_query = '';
        if (is_array($filters) && count($filters)) {
            foreach ($filters as $key => $value) {
                $filters_query .= ' AND '.pSQL($key).' = "'.pSQL($value).'" ';
            }
        }

        return $filters_query;
    }

    protected function renderCountdownForm($id_pspc = 0)
    {
        $pspc = new PSPCF($id_pspc);

        $chosen_products = $pspc->getObjects('product');

        // category filter for product search
        $product_filter_category_tree =
            $this->renderCategoryTree('itemsCategoryFilter', $id_pspc, $this->l('Category filter'));

        $token = Tools::getAdminTokenLite('AdminPerformance');
        $performance_url = 'index.php?controller=AdminPerformance&token=' . $token;

        $this->context->smarty->assign(array(
            'pspc' => $pspc,
            'pspc_module' => $this,
            'pspc_default_currency' => $this->context->currency,
            'product_category_tree' => $product_filter_category_tree,
            'pspc_tpl_dir' => _PS_MODULE_DIR_.$this->name.'/views/templates/admin',
            'pspc_manufacturers' => Manufacturer::getManufacturers(),
            'pspc_chosen_products' => $chosen_products,
            'pspc_perf_url' => $performance_url,
        ));

        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/pspc_form.tpl');
    }

    public function getProductReference($id_product, $id_product_attribute)
    {
        $reference = '';
        if ($id_product_attribute) {
            $combination = new Combination($id_product_attribute);
            $reference = $combination->reference;
        }
        if (!$reference && $id_product) {
            $product = new Product($id_product);
            $reference = $product->reference;
        }

        return $reference;
    }

    public function generateInput($params)
    {
        if ($params) {
            $this->context->smarty->assign(array(
                'params' => $params,
                'psv' => $this->getPSVersion(),
                'languages' => Language::getLanguages(),
                'id_lang_default' => Configuration::get(
                    'PS_LANG_DEFAULT',
                    null,
                    $this->context->shop->id_shop_group,
                    $this->context->shop->id
                ),
            ));

            return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/input.tpl');
        }
    }

    /**
     * Ajax get products for autocomplete
     */
    public function ajaxProcessGetProducts()
    {
        $context = Context::getContext();
        $query = Tools::getValue('query', false);
        $search_combinations = Tools::getValue('search_combinations');
        $categories = Tools::getValue('categories');
        if (is_array($categories)) {
            $categories = array_filter($categories);
        }
        $id_manufacturer = Tools::getValue('id_manufacturer');
        if (!$query && !$categories && !$id_manufacturer) {
            die();
        }

        /*
         * In the SQL request the "q" param is used entirely to match result in database.
         * In this way if string:"(ref : #ref_pattern#)" is displayed on the return list,
         * they are no return values just because string:"(ref : #ref_pattern#)"
         * is not write in the name field of the product.
         * So the ref pattern will be cut for the search request.
         */
        if ($pos = strpos($query, ' (ref:')) {
            $query = Tools::substr($query, 0, $pos);
        }

        $sql =
            'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, p.`cache_default_attribute`
             FROM `'._DB_PREFIX_.'product` p
             '.Shop::addSqlAssociation('product', 'p').'
             LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON
              (pl.id_product = p.id_product
              AND pl.id_lang = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl').')
             '.($categories ?
                ' LEFT JOIN `'._DB_PREFIX_.'category_product` cp ON p.`id_product` = cp.`id_product` ' : '').'
             WHERE 1
              '.($categories ? ' AND cp.`id_category` IN ('.implode(',', array_map('intval', $categories)).')' : '').'
              '.($query ? ' AND (pl.name LIKE "%'.pSQL($query).'%" OR p.reference LIKE "%'.pSQL($query).'%"
                OR p.`id_product` = '.(int)$query.')' : '').'
              '.($id_manufacturer ? ' AND p.id_manufacturer = '.(int)$id_manufacturer : '').'
             GROUP BY p.id_product';
        $products = Db::getInstance()->executeS($sql);

        $result = array();
        if ($products) {
            foreach ($products as $product) {
                $result[] = array(
                    'name' =>
                        '#'.$product['id_product'].' '.
                        trim($product['name']) .
                        (!empty($product['reference']) ? ' (ref: ' . $product['reference'] . ')' : ''),
                    'id_product' => (int)$product['id_product'],
                );

                // add combinations
                if ($search_combinations) {
                    $obj = new Product($product['id_product']);
                    $attributes = $obj->getAttributesGroups($this->context->language->id);
                    if (count($attributes)) {
                        $combinations = array();
                        foreach ($attributes as $attribute) {
                            $ipa = $attribute['id_product_attribute'];
                            $combinations[$ipa]['id_product_attribute'] = $ipa;
                            $combinations[$ipa]['reference'] = $attribute['reference'];
                            if (!isset($combinations[$ipa]['attributes'])) {
                                $combinations[$ipa]['attributes'] = '';
                            }
                            $combinations[$ipa]['attributes'] .= $attribute['attribute_name'].' - ';
                        }
                        foreach ($combinations as &$combination) {
                            $combination['attributes'] = rtrim($combination['attributes'], ' - ');

                            $result[] = array(
                                'name' =>
                                    '  --- '.
                                    trim($product['name']).
                                    ' ('.$combination['attributes'].')'.
                                    (!empty($combination['reference']) ? ' (ref: '.$combination['reference'].')'
                                      : (!empty($product['reference']) ? ' (ref: ' . $product['reference'] . ')' : '')),
                                'id_product' => $product['id_product'].'-'.$combination['id_product_attribute']
                            );
                        }
                    }
                }
            }
        }

        die(Tools::jsonEncode($result));
    }

    public function ajaxProcessSaveCountdown()
    {
        $save_result = $this->saveCountdown();

        // Display errors if any
        if ($save_result !== true) {
            die($save_result);
        }

        die('1');
    }

    public function ajaxProcessBulkDeletePSPC()
    {
        $ids = Tools::getValue('ids');

        foreach ($ids as $id) {
            $pspc = new PSPCF($id);
            $pspc->delete();
        }

        die('1');
    }

    public function saveCountdown()
    {
        $html = '';
        $id_pspc = Tools::getValue('id_pspc');

        // products
        $products = Tools::getValue('products');

        $save_success = true;
        $pspc = new PSPCF($id_pspc);
        foreach (PSPCF::$definition['fields'] as $field_name => $field_data) {
            if (isset($field_data['lang']) && $field_data['lang']
                && !(isset($field_data['file']) && $field_data['file'])
            ) {
                $pspc->$field_name = array();
                foreach (Language::getLanguages() as $lang) {
                    $pspc->{$field_name}[$lang['id_lang']] =
                        trim(Tools::getValue($field_name . '_' . $lang['id_lang']));
                }
            } elseif (Tools::isSubmit($field_name)) {
                $pspc->{$field_name} = trim(Tools::getValue($field_name));
            }
        }
        if (!$pspc->from) {
            $from_time = time() - (24 * 60 * 60); // now - 24h
            $pspc->from = date('Y-m-d H:i:s', $from_time);
        }

        // Check for errors
        $field_errors = $pspc->validateAllFields();

        if (!(is_array($field_errors) && count($field_errors))) {
            if ($pspc->save(false, true, false)) {
                $pspc->setObjects($products, 'product');
                $this->clearSmartyCache();
            } else {
                $field_errors[] = $this->l('Unable to save the countdown');
            }
        }

        if (is_array($field_errors) && count($field_errors)) {
            $html .= implode('', $field_errors);
            $save_success = false;
        }

        return ($save_success ? true : $html);
    }

    public function ajaxProcessRenderCountdownList()
    {
        die($this->renderCountdownList());
    }

    public function ajaxProcessChangeCountdownStatus()
    {
        $id_pspc = Tools::getValue('id_pspc');
        $pspc = new PSPCF($id_pspc);
        if (Validate::isLoadedObject($pspc)) {
            $pspc->active = !$pspc->active;
            $pspc->save(false, true, false);
            $this->clearSmartyCache();
        }
    }

    public function clearSmartyCache()
    {
        $directory = _PS_MODULE_DIR_.$this->name.'/views/templates/hook/';
        $templates = array_diff(scandir($directory), array('..', '.'));
        foreach ($templates as $key => &$template) {
            if (strpos($template, '.tpl') === false) {
                continue;
            }
            $template = basename($template, '.tpl');

            if (method_exists($this, '_clearCache')) {
                $this->_clearCache($template);
            }

            if ($this->getPSVersion() == 1.7 && method_exists($this, '_deferedClearCache')) {
                $this->_deferedClearCache($this->getTemplatePath($template), null, null);
            }
        }
    }

    public function hookHeader()
    {
        // Add JQuery
        $this->context->controller->addJquery();

        // Register JS
        $this->context->controller->addJS(
            array(
                $this->_path . 'views/js/underscore.min.js',
                $this->_path . 'views/js/jquery.countdown.min.js',
                $this->_path . 'views/js/front.js',
                $this->_path . 'views/js/custom.js',
            )
        );

        // Register CSS
        $this->context->controller->addCSS(array(
            $this->_path . 'views/css/front.css',
            $this->_path . 'views/css/settings.css',
        ));

        // Register theme CSS
        if ($this->theme) {
            $this->context->controller->addCSS(
                $this->_path . 'views/css/themes/' . $this->theme
            );
        }

        $this->context->smarty->assign(array(
            'pspc_theme' => rtrim($this->theme, '.css'),
            'pspc_highlight' => 'seconds',
            'pspc_hide_after_end' => $this->hide_after_end,
            'pspc_hide_expired' => $this->hide_expired,
            'pspc_custom_css' => html_entity_decode($this->custom_css),
            'pspc_position_product' => $this->product_position,
            'pspc_position_list' => $this->product_list_position,
            'pspc_adjust_positions' => $this->adjust_positions,
            'psv' => $this->getPSVersion(),
            'pspc_module' => $this,
        ));

        return $this->display(__FILE__, 'header.tpl');
    }

    public function hookPSPC($params)
    {
        $return = null;
        $id_product = null;

        // Get id_product
        if (isset($params['id_product']) && $params['id_product'] > 0) {
            $id_product = $params['id_product'];
        } elseif (isset($params['product']) && $params['product']) {
            $product = $params['product'];
            if (is_array($product) && isset($product['id_product'])) {
                $id_product = $product['id_product'];
            } elseif (is_object($product)) {
                $id_product = $product->id;
            } else {
                return false;
            }
        } else {
            $id_product = Tools::getValue('id_product');
        }

        // Get id_product_attribute
        $id_product_attribute = null;
        if (isset($params['id_product_attribute'])) {
            $id_product_attribute = $params['id_product_attribute'];
        } elseif (Tools::getValue('group')) {
            $groups = Tools::getValue('group');

            if (!empty($groups) && method_exists('Product', 'getIdProductAttributesByIdAttributes')) {
                $id_product_attribute = (int) Product::getIdProductAttributesByIdAttributes(
                    $id_product,
                    $groups
                );
            }
        }
        if ($id_product_attribute === null) {
            $id_product_attribute = Tools::getValue('id_product_attribute');
        }
        $has_attributes = $this->checkProductHasAttributes($id_product);
        if (!$id_product_attribute && $has_attributes) {
            $id_product_attribute = $this->getDefaultIdProductAttribute($id_product);
        }

        $hook = (isset($params['hook']) ? $params['hook'] : '');

        // render timers for all combinations at once at the product page in PS1.6
        if ($has_attributes && $this->getPSVersion() < 1.7 && $this->context->controller->php_self == 'product') {
            $ipas = Product::getProductAttributesIds($id_product, true);
            foreach ($ipas as $ipa) {
                $return .= $this->renderCountdown($id_product, $ipa['id_product_attribute'], $hook);
            }
        } else {
            $return = $this->renderCountdown($id_product, $id_product_attribute, $hook);
        }

        return $return;
    }

    public function hookPSProductCountdown($params)
    {
        return $this->hookPSPC($params);
    }

    public function hookDisplayProductListReviews($params)
    {
        if ($this->product_list_position == 'displayProductListReviews') {
            $params['hook'] = 'displayProductListReviews';
            return $this->hookPSPC($params);
        }
    }

    public function hookDisplayProductPriceBlock($params)
    {
        if (isset($params['type']) && $params['type'] == 'weight' &&
            ($this->product_position == 'displayProductPriceBlock'
            || $this->product_list_position == 'over_img'
            || $this->product_list_position == 'displayProductPriceBlock')
        ) {
            $params['hook'] = 'displayProductPriceBlock';
            return $this->hookPSPC($params);
        }
    }

    public function hookDisplayProductButtons($params)
    {
        if ($this->product_position == 'displayProductButtons') {
            $params['hook'] = 'displayProductButtons';
            return $this->hookPSPC($params);
        }
    }

    protected function getDefaultIdProductAttribute($id_product)
    {
        if (!Combination::isFeatureActive()) {
            return 0;
        }

        return (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue(
            'SELECT pa.`id_product_attribute`
			 FROM `'._DB_PREFIX_.'product_attribute` pa
			 '.Shop::addSqlAssociation('product_attribute', 'pa').'
			 WHERE pa.`id_product` = '.(int)$id_product.'
			 AND product_attribute_shop.default_on = 1'
        );
    }

    protected function checkProductHasAttributes($id_product)
    {
        $attrs = Product::getAttributesInformationsByProduct($id_product);
        return !empty($attrs);
    }

    protected function renderCountdown($id_product, $id_product_attribute = 0, $hook = '')
    {
        $html = '';

        if ($id_product) {
            $pspc = $this->getCountdown($id_product, $id_product_attribute);

            if ($pspc) {
                $datetime_current = new DateTime('now', new DateTimeZone('UTC'));
                $datetime_to = new DateTime($pspc->to, new DateTimeZone('UTC'));
                $days_diff = abs($datetime_to->getTimestamp() - $datetime_current->getTimestamp()) / 60 / 60 / 24;
                
                $this->context->smarty->assign(array(
                    'pspc' => $pspc,
                    'pspc_days_diff' => $days_diff,
                    'pspc_theme' => str_replace('.css', '', $this->theme),
                    'pspc_product_position' => $this->product_position,
                    'pspc_product_list_position' => $this->product_list_position,
                    'pspc_compact_view' => $this->compact_view,
                    'pspc_show_promo_text' => $this->show_promo_text,
                    'pspc_psv' => $this->getPSVersion(true),
                    'pspc_ipa' => $id_product_attribute,
                    'pspc_vertical_align' => Configuration::get($this->settings_prefix.'VERTICAL_ALIGN'),
                    'pspc_hook' => $hook,
                    'pspc_id' =>
                        'pspcf-'.$pspc->id.'-'.$id_product.'-'.(int)$id_product_attribute.'-'.$this->genRandomString(),
                ));

                $html = $this->display(
                    __FILE__,
                    'pspc.tpl',
                    $this->getCacheId($id_product.'-'.$id_product_attribute.'-'.$pspc->to_time.'-'.$hook)
                );
            }
        }
        
        return $html;
    }

    /**
     * @param $id_product
     * @param int $id_product_attribute
     * @return PSPCF | null
     * For Front Office
     * Get a pre-configured countdown or generate a countdown from specific prices
     */
    public function getCountdown($id_product, $id_product_attribute = 0)
    {
        $product = new Product($id_product);

        // Search for product countdown
        $pspc = PSPCF::findPSPC('product', $id_product, $id_product_attribute, $this);

        // if countdown is disabled then return false and don't search another timers
        if ($pspc && !$pspc->active) {
            return null;
        }

        // If countdown not found and countdowns activated for all products with specific prices:
        if (!$pspc && $this->activate_all_special) {
            $qty = max((int)$product->minimal_quantity, 1);
            $specific_price = SpecificPrice::getSpecificPrice(
                $id_product,
                $this->context->shop->id,
                $this->context->currency->id,
                $this->context->country->id,
                $this->context->customer->id_default_group,
                $qty,
                $id_product_attribute,
                $this->context->customer->id,
                $this->context->cart->id,
                $qty
            );
            if ($specific_price && is_array($specific_price) && isset($specific_price['to'])) {
                $tz = Configuration::get('PS_TIMEZONE');
                $dt_to = new DateTime($specific_price['to'], new DateTimeZone($tz));
                $dt_to->setTimezone(new DateTimeZone('UTC'));
                $dt_from = new DateTime($specific_price['from'], new DateTimeZone($tz));
                $dt_from->setTimezone(new DateTimeZone('UTC'));
                $dt_current = new DateTime('now', new DateTimeZone('UTC'));
                if ($dt_from > $dt_current || $dt_to <= $dt_current) {
                    return null;
                }

                $pspc = new PSPCF();
                $pspc->id = $specific_price['id_specific_price'];
                $pspc->id_object = $id_product;
                $pspc->name = '';
                $pspc->from = $dt_from->format('Y-m-d H:i:s');
                $pspc->to = $dt_to->format('Y-m-d H:i:s');
                $pspc->loadTz();
                $pspc->active = 1;
                $pspc->type = 'specific_price';
            }
        }

        if ($pspc) {
            return $pspc;
        }

        return null;
    }

    protected function renderCategoryTree($name, $id_pspc, $display_name, $checkbox = false, $selected_cats = array())
    {
        if (class_exists('HelperTreeCategories')) {
            $root = Category::getRootCategory();
            $tree = new HelperTreeCategories($name.$id_pspc, $display_name);
            $tree->setRootCategory((int)$root->id)
                ->setUseCheckBox($checkbox)
                ->setInputName($name)
                ->setSelectedCategories($selected_cats)
                ->setUseSearch(true);
            if (count($selected_cats)) {
                $reset = new TreeToolbarLink('Reset', '#');
                $reset->setAttribute('id', $name.'-reset');
                $tree->addAction($reset);
            }
            $product_tree_html = $tree->render();
        } else {
            $category = Category::getRootCategory();
            $categories = $category->recurseLiteCategTree(100);
            $this->context->smarty->assign(array(
                'tree_id_root' => $category->id,
                'tree_categories' => $categories['children'],
                'tree_name' => $name,
                'tree_multiple' => $checkbox,
                'tree_selected' => $selected_cats,
                'pspc_admin_tpl_dir' => _PS_MODULE_DIR_.$this->name.'/views/templates/admin',
            ));
            $product_tree_html =
                $this->context->smarty->fetch($this->local_path . 'views/templates/admin/category_tree15.tpl');
        }

        return $product_tree_html;
    }

    protected function renderAjaxFormParams($action)
    {
        $this->context->smarty->assign(array(
            'pspc_action' => $action
        ));

        return $this->context->smarty->fetch(
            $this->local_path . 'views/templates/admin/_ajax_form_params.tpl'
        );
    }

    public function getCategoryName($id_category)
    {
        $name = Db::getInstance()->getValue(
            'SELECT `name`
             FROM `'._DB_PREFIX_.'category_lang`
             WHERE `id_category` = '.(int)$id_category.'
             AND `id_lang` = '.(int)$this->context->language->id
        );

        return $name;
    }

    public function migrateTo20($skip_install = false)
    {
        if (!Configuration::get($this->settings_prefix.'UPDATED20FREE')) {
            // Create new tables
            $this->installDB();
            // New hooks
            $this->installHooks();

            if (!$skip_install) {
                // Default values
                $this->installDefaultSettings();
            }

            require_once(_PS_MODULE_DIR_ . 'psproductcountdown/classes/PSPCFUpgrade.php');
            PSPCFUpgrade::migrateTo20($this);

            // Generate settings CSS
            $this->loadSettings();
        }
    }

    public function ajaxProcessGetCountdownForm()
    {
        $id_pspc = Tools::getValue('id_pspc');

        die($this->renderCountdownForm($id_pspc));
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        if (isset($params['id_product']) && $params['id_product']) {
            $id_product = $params['id_product'];
        } else {
            $id_product = (int)Tools::getValue('id_product');
        }

        if (!$id_product) {
            return $this->adminDisplayWarning($this->l('You must save this product before using this module.'));
        }

        $token = Tools::getAdminTokenLite('AdminModules');
        $ajax_url = 'index.php?controller=AdminModules&configure=' . $this->name . '&token=' . $token;

        if (Validate::isLoadedObject($product = new Product($id_product))) {
            $this->context->smarty->assign(array(
                'psv' => $this->getPSVersion(),
                'module_name' => $this->name,
                'languages' => Language::getLanguages(),
                'specific_prices' => $this->getProductSpecificPrices($id_product),
                'countdown_data' => $this->getCountdownBOData($id_product),
                'link' => $this->context->link,
                'ajax_url' => $ajax_url,
                'id_product' => $id_product,
            ));

            return $this->display(__FILE__, 'admin_products_extra'.$this->getPSVersion(true).'.tpl');
        }
    }

    /**
     * @param $id_product
     * @return array
     * returns specific prices where 'from' and 'to' dates are set
     */
    public function getProductSpecificPrices($id_product)
    {
        $prices = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT *
            FROM `' . _DB_PREFIX_ . 'specific_price`
            WHERE `id_product` = ' . (int)$id_product . ' AND `from` > 0 AND `to` > 0
             AND (`id_shop` = ' . (int)$this->context->shop->id . ' OR `id_shop` = 0)');

        return $prices;
    }

    /**
     * @param $id_product
     * @return array
     * For Back Office
     */
    public function getCountdownBOData($id_product)
    {
        $pspc = PSPCF::findPSPC('product', $id_product, 0, null, false);
        if (!Validate::isLoadedObject($pspc)) {
            return array();
        }

        $countdown = Db::getInstance()->getRow(
            'SELECT *
             FROM `' . _DB_PREFIX_ . 'pspcf`
             WHERE `id_pspcf` = ' . (int)$pspc->id
        );

        $names = array();
        foreach (Language::getLanguages(true, false, true) as $id_lang) {
            if (is_array($id_lang) && isset($id_lang['id_lang'])) {
                $id_lang = $id_lang['id_lang'];
            }
            $names[$id_lang] = Db::getInstance()->getValue(
                'SELECT `name`
                 FROM `' . _DB_PREFIX_ . 'pspcf_lang` pspcfl
                 WHERE `id_pspcf` = ' . (int)$pspc->id . ' AND `id_lang` = ' . (int)$id_lang
            );
        }

        if (!$countdown || !is_array($countdown)) {
            $countdown = array();
        } else {
            if ($countdown['from'] == '0000-00-00 00:00:00') {
                $countdown['from'] = '';
            } else {
                $countdown['from_tz'] = date('Y-m-d\TH:i:s\Z', strtotime($countdown['from']));
            }
            if ($countdown['to'] == '0000-00-00 00:00:00') {
                $countdown['to'] = '';
            } else {
                $countdown['to_tz'] = date('Y-m-d\TH:i:s\Z', strtotime($countdown['to']));
            }
        }
        
        $countdown['name'] = $names;
        $countdown['active'] = $pspc->isActive();

        return $countdown;
    }

    /**
     * Ajax remove product countdown
     */
    public function ajaxProcessRemoveProductCountdown()
    {
        $id_countdown = Tools::getValue('id_countdown');

        if ($id_countdown) {
            $pspc = new PSPCF($id_countdown);
            $pspc->delete();
            $this->clearSmartyCache();

            die('1');
        }

        die('0');
    }

    public function ajaxProcessProductUpdate()
    {
        $id_product = Tools::getValue('id_product');
        if (!$id_product) {
            die(json_encode(array('success' => 0, 'error' => $this->l('Unable to save the countdown'))));
        }

        $id_pspc = null;
        $success = false;
        //process only if it's a product page
        if (Tools::isSubmit($this->name . '-submit')) {
            $from = Tools::getValue('pspc_from');
            $to = Tools::getValue('pspc_to');
            $active = Tools::getValue('pspc_active');
            $id_pspc = Tools::getValue('id_pspc');

            // save / add
            $pspc = new PSPCF($id_pspc);
            $pspc->from = $from;
            $pspc->to = $to;
            $pspc->active = $active;
            foreach (Language::getLanguages() as $language) {
                $id_lang = $language['id_lang'];
                $pspc->name[$id_lang] = Tools::getValue('pspc_name_'.$id_lang);
            }

            $filtered_name = array_filter($pspc->name);
            if (!$from && !$to && !$filtered_name && $active) {
                if ($id_pspc) {
                    // If 'from' and 'to' are not submitted and 'active' set to true, then just delete the countdown
                    $pspc = new PSPCF($id_pspc);
                    $pspc->delete();
                    $this->clearSmartyCache();
                }
                // If 'from' and 'to' are not submitted, countdown doesn't exist yet and 'active' set to true, then just ignore the countdown
                die(json_encode(array('success' => 1, 'id_pspc' => (int)$id_pspc)));
            }

            if (!$pspc->from) {
                $from_time = time() - (24 * 60 * 60); // now - 24h
                $pspc->from = date('Y-m-d H:i:s', $from_time);
            }

            // Check for errors
            $field_errors = $pspc->validateAllFields();
            if (is_array($field_errors) && count($field_errors)) {
                $this->errors += $field_errors;
            } else {
                if ($pspc->save(false, true, false)) {
                    $pspc->setObjects(array($id_product), 'product');
                    $id_pspc = $pspc->id;
                    $success = true;
                } else {
                    $this->errors[] = $this->l('Unable to save the countdown');
                }
            }

            // clear cache
            $this->clearSmartyCache();
        }

        if ($success) {
            die(json_encode(array('success' => 1, 'id_pspc' => $id_pspc)));
        } else {
            if (!$this->errors) {
                $this->errors[] = $this->l('Unable to save the countdown');
            }

            $errors = implode("/n", $this->errors);
            die(json_encode(array('success' => 0, 'error' => $errors)));
        }
    }
    
    public function getShopName($id_shop)
    {
        $shop = new Shop($id_shop, $this->context->language->id);
        
        return $shop->name;
    }

    public function genRandomString($length = 10)
    {
        $string = '';

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Generation
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, Tools::strlen($characters) - 1)];
        }

        return $string;
    }

    protected function renderDevInfo()
    {
        $this->context->smarty->assign(array(
            'img_dir' => $this->_path.'views/img/',
        ));

        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/devby.tpl');
    }

    public function renderProFeatures()
    {
        $this->context->smarty->assign(array(
            'img_path' => $this->_path.'views/img/',
        ));
        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/pro_features.tpl');
    }
}
