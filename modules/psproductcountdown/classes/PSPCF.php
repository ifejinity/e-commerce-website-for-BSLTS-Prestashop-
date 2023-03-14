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

class PSPCF extends ObjectModel
{
    public $from;
    public $to;
    public $active;
    public $name;

    public $from_tz;
    public $to_tz;
    public $to_time;
    public $to_date;

    public static $definition = array(
        'table' => 'pspcf',
        'primary' => 'id_pspcf',
        'multilang' => true,
        'fields' => array(
            // Classic fields
            'from' => array('type' => self::TYPE_DATE, 'validate' => 'isPhpDateFormat'),
            'to' => array('type' => self::TYPE_DATE, 'validate' => 'isPhpDateFormat'),
            // Lang fields
            'name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
        ),
    );

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id, $id_lang, $id_shop);

        $this->active = $this->isActive();

        $this->loadTz();
    }

    public function isActive()
    {
        if (!$this->id) {
            return true;
        }

        $context = Context::getContext();
        $is_active = Db::getInstance()->getValue(
            'SELECT `active`
             FROM `'._DB_PREFIX_.'pspcf_shop`
             WHERE `id_pspcf` = '.(int)$this->id.'
              AND `id_shop` = '.(int)$context->shop->id
        );

        return $is_active;
    }

    public function loadTz()
    {
        $this->from_tz = ($this->from ? date('Y-m-d\TH:i:s\Z', strtotime($this->from)) : '');
        $this->to_tz = ($this->to ? date('Y-m-d\TH:i:s\Z', strtotime($this->to)) : '');
        $this->to_time = ($this->to ? strtotime($this->to.' UTC') * 1000 : 0);
        $this->to_date = ($this->to ? date('d/m/Y', strtotime($this->to.' UTC')) : '');
    }

    public function validateAllFields()
    {
        $errors = array();

        $valid = $this->validateFields(false, true);
        if ($valid !== true) {
            $errors[] = $valid . "\n";
        }
        $valid_lang = $this->validateFieldsLang(false, true);
        if ($valid_lang !== true) {
            $errors[] = $valid_lang . "\n";
        }

        if (!$this->to) {
            $module = Module::getInstanceByName('psproductcountdown');
            $errors[] = $module->l('The "to" field is required.');
        }

        return $errors;
    }

    public function validateField($field, $value, $id_lang = null, $skip = array(), $human_errors = true)
    {
        return parent::validateField($field, $value, $id_lang, $skip, $human_errors);
    }

    public static function displayFieldName($field, $class = __CLASS__, $htmlentities = true, Context $context = null)
    {
        return '"'.parent::displayFieldName($field, $class, $htmlentities, $context).'"';
    }

    public function save($null_values = false, $auto_date = true, $update_specific_prices = true)
    {
        // Convert dates from TZ to normal format if necessary
        $dt_from = new DateTime($this->from, new DateTimeZone('UTC'));
        $dt_to = new DateTime($this->to, new DateTimeZone('UTC'));
        $this->from = $dt_from->format('Y-m-d H:i:s');
        $this->to = $dt_to->format('Y-m-d H:i:s');

        // Saving
        $saved = parent::save($null_values, $auto_date);

        if ($saved) {
            // save shop data
            foreach (Shop::getContextListShopID() as $id_shop) {
                Db::getInstance()->execute(
                    'INSERT INTO `'._DB_PREFIX_.'pspcf_shop`
                     (`id_pspcf`, `id_shop`, `active`)
                     VALUES
                     ('.(int)$this->id.', '.(int)$id_shop.', '.(int)$this->active.')
                     ON DUPLICATE KEY UPDATE
                      `active` = '.(int)$this->active
                );
            }
        }

        $module = Module::getInstanceByName('psproductcountdown');
        $module->clearSmartyCache();

        return $saved;
    }

    public function getRelatedProducts()
    {
        $products = array();

        // By products
        $countdown_products = $this->getObjects('product');
        foreach ($countdown_products as $c_product) {
            $id = $c_product['id_object'];
            $ipa = $c_product['id_product_attribute'];
            $products[$id.'-'.$ipa] = array('id_product' => $id, 'id_product_attribute' => $ipa);
        }

        return $products;
    }

    public static function getRelatedProductsIDs($id_pspc)
    {
        $results = array();

        // from products
        $products = self::getObjectsStatic($id_pspc, 'product', true);
        $products = self::filterInactiveProducts($products);
        $results = array_merge($results, $products);
        $results = array_unique($results);

        return $results;
    }

    public function delete()
    {
        $result = parent::delete();

        if ($result) {
            Db::getInstance()->execute(
                'DELETE
                 FROM `' . _DB_PREFIX_ . 'pspcf_shop`
                 WHERE `id_pspcf` = ' . (int)$this->id
            );
        }

        return $result;
    }

    public static function findPSPC($type, $id_object, $id_product_attribute = 0, $pspc_module = null, $skip_expired = true)
    {
        $pspc_module = ($pspc_module ? $pspc_module : Module::getInstanceByName('psproductcountdown'));
        $context = Context::getContext();

        if (is_array($id_object)) {
            $id_object_str = implode(',', array_map('intval', $id_object));
        } else {
            $id_object_str = (int)$id_object;
        }

        $id_pspc = Db::getInstance()->getValue(
            'SELECT pspcfo.`id_pspcf`
             FROM `' . _DB_PREFIX_ . 'pspcf_object` pspcfo
             LEFT JOIN `'._DB_PREFIX_.'pspcf` pspcf USING (`id_pspcf`)
             LEFT JOIN `'._DB_PREFIX_.'pspcf_shop` pspcfs USING (`id_pspcf`)
             WHERE pspcfs.`id_shop` IN (' . implode(',', array_map('intval', Shop::getContextListShopID())) . ')
              AND pspcfo.`type` = "'.pSQL($type).'"
              AND pspcfo.`id_object` IN (' . pSQL($id_object_str) . ')
              AND pspcfo.`id_product_attribute` IN (0, ' . (int)$id_product_attribute.')
             ORDER BY pspcfo.`id_product_attribute` DESC, pspcf.`to` ASC, pspcfo.`id_object` DESC'
        );

        if ($id_pspc) {
            $pspc = new PSPCF($id_pspc, $context->language->id);

            $datetime_current = new DateTime('now', new DateTimeZone('UTC'));
            $datetime_from = new DateTime($pspc->from, new DateTimeZone('UTC'));
            $datetime_to = new DateTime($pspc->to, new DateTimeZone('UTC'));

            // Return false if countdown is expired or not started yet
            if ($skip_expired) {
                if ($datetime_from > $datetime_current ||
                    (($datetime_to < $datetime_current) && ($pspc_module->hide_expired || $pspc_module->hide_after_end))
                ) {
                    return false;
                }
            }

            if (Validate::isLoadedObject($pspc)) {
                return $pspc;
            }
        }

        return null;
    }

    public function setObjects($objects, $type)
    {
        // delete old values
        Db::getInstance()->delete('pspcf_object', '`id_pspcf` = ' . (int)$this->id.' AND `type` = "'.pSQL($type).'"');

        // insert new values
        if (is_array($objects)) {
            foreach ($objects as $id_object) {
                $id_product_attribute = 0;
                if (strpos($id_object, '-') !== false) {
                    $ids = explode('-', $id_object);
                    $id_object = $ids[0];
                    $id_product_attribute = $ids[1];
                }

                Db::getInstance()->insert('pspcf_object', array(
                    'id_object' => (int)$id_object,
                    'id_product_attribute' => (int)$id_product_attribute,
                    'id_pspcf' => (int)$this->id,
                    'type' => $type,
                ));
            }
        }
    }

    public function getObjects($type, $ids_only = false)
    {
        if (!$this->id) {
            return array();
        }

        $objects = self::getObjectsStatic($this->id, $type, $ids_only);

        return $objects;
    }

    public static function getObjectsStatic($id_pspc, $type, $ids_only = false)
    {
        $objects = Db::getInstance()->executeS(
            'SELECT *
             FROM `'._DB_PREFIX_.'pspcf_object`
             WHERE `id_pspcf` = '.(int)$id_pspc.'
              AND `type` = "'.pSQL($type).'"'
        );

        if ($ids_only) {
            $tmp = array();
            foreach ($objects as $object) {
                $tmp[] = $object['id_object'];
            }
            $objects = $tmp;
        }

        return $objects;
    }

    public static function getObjectsCount($id_pspc, $type = '')
    {
        return Db::getInstance()->getValue(
            'SELECT COUNT(`id_pspcf_object`)
             FROM `'._DB_PREFIX_.'pspcf_object`
             WHERE `id_pspcf` = '.(int)$id_pspc.'
              '.($type ? ' AND `type` = "'.pSQL($type).'" ' : '')
        );
    }

    public static function checkCountdownAppliedToProduct($id_pspc, $id_product)
    {
        // 1. If the countdown is applied directly to the product
        $as_product = Db::getInstance()->getValue(
            'SELECT `id_pspcf`
             FROM `'._DB_PREFIX_.'pspcf_object`
             WHERE `type` = "product"
              AND `id_pspcf` = '.(int)$id_pspc.'
              AND `id_object` = '.(int)$id_product
        );
        if ($as_product) {
            return true;
        }

        return false;
    }

    public static function getAll($active = true)
    {
        $timers = self::getCollection('PSPCF');

        $pspc_list = Db::getInstance()->executeS(
            'SELECT `id_pspcf`
             FROM `'._DB_PREFIX_.'pspcf_shop` 
             WHERE `id_shop` IN (' . implode(',', array_map('intval', Shop::getContextListShopID())) . ')'
        );
        $timers->where('id_pspcf', 'IN', self::sqlArrayToList($pspc_list, 'id_pspcf'));

        if ($active) {
            $pspc_list = Db::getInstance()->executeS(
                'SELECT `id_pspcf`
                 FROM `'._DB_PREFIX_.'pspcf_shop` 
                 WHERE `active` = 1
                  AND `id_shop` IN (' . implode(',', array_map('intval', Shop::getContextListShopID())) . ')'
            );
            $timers->where('id_pspcf', 'IN', self::sqlArrayToList($pspc_list, 'id_pspcf'));
        }

        return $timers;
    }

    public static function getCollection($class)
    {
        $context = Context::getContext();
        if (class_exists('PrestaShopCollection')) {
            $collection = new PrestaShopCollection($class, $context->language->id);
        } else {
            $collection = new Collection($class, $context->language->id);
        }

        return $collection;
    }

    /**
     * @param bool $active_only
     * @return array list of shop ids
     */
    public function getShops($active_only = true)
    {
        $result = array();

        $shops = Db::getInstance()->executeS(
            'SELECT `id_shop`
             FROM `'._DB_PREFIX_.'pspcf_shop`
             WHERE `id_pspcf` = '.(int)$this->id.
             ($active_only ? ' AND `active` = 1 ' : '')
        );

        foreach ($shops as $shop) {
            $result[] = $shop['id_shop'];
        }

        return $result;
    }

    public static function getShopsStatic($id_pspc, $active_only = true)
    {
        $pspc = new PSPCF($id_pspc);

        return $pspc->getShops($active_only);
    }

    public function checkCurrentShopDisplay()
    {
        $check = Db::getInstance()->getValue(
            'SELECT `id_pspcf`
             FROM `'._DB_PREFIX_.'pspcf_shop`
             WHERE `id_pspcf` = '.(int)$this->id.'
              `id_shop` IN (' . implode(',', array_map('intval', Shop::getContextListShopID())) . ')'
        );

        return $check;
    }

    public static function sqlArrayToList($array, $column)
    {
        $result = array();

        foreach ($array as $item) {
            $result[] = $item[$column];
        }

        if (!count($result)) {
            $result = array(0);
        }

        return $result;
    }

    public static function filterInactiveProducts($ids, $id_shop = null)
    {
        if (!$ids) {
            return $ids;
        }

        $result = array();
        $context = Context::getContext();
        $id_shop = ($id_shop ? $id_shop : $context->shop->id);

        $raw_data = Db::getInstance()->executeS(
            'SELECT `id_product`
             FROM `'._DB_PREFIX_.'product_shop`
             WHERE `id_shop` = '.(int)$id_shop.'
              AND `active` = 1
              AND `id_product` IN ('.implode(',', array_map('intval', $ids)).')'
        );

        foreach ($raw_data as $product) {
            $result[] = $product['id_product'];
        }

        return $result;
    }
}
