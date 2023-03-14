<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licenced under the Software License Agreement.
 * With the purchase or the installation of the software in your application
 * you accept the licence agreement.
 *
 * @author    Presta.Site
 * @copyright 2019 Presta.Site
 * @license   LICENSE.txt
 */

class PSPCFUpgrade
{
    // Migrate module data from v1 to v2
    public static function migrateTo20($module)
    {
        if (!Configuration::get($module->settings_prefix.'UPDATED20FREE') && self::checkTableExists('psproductcountdown')) {
            $product_timers =
                Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'psproductcountdown`');
            $timers = array_merge($product_timers);

            foreach ($timers as $timer) {
                $pspc = new PSPCF();

                // common fields
                $pspc->from = $timer['from'];
                $pspc->to = $timer['to'];
                // if free version convert dates to utc
                if (!self::checkTableExists('psproductcountdown_category')) {
                    $tz = Configuration::get('PS_TIMEZONE');
                    $dt_to = new DateTime($timer['to'], new DateTimeZone($tz));
                    $dt_to->setTimezone(new DateTimeZone('UTC'));
                    $dt_from = new DateTime($timer['from'], new DateTimeZone($tz));
                    $dt_from->setTimezone(new DateTimeZone('UTC'));
                    $pspc->from = $dt_from->format('Y-m-d H:i:s');
                    $pspc->to = $dt_to->format('Y-m-d H:i:s');
                }
                $pspc->active = $timer['active'];

                if (isset($timer['id_countdown']) && $timer['id_countdown']) {
                    $id_countdown = $timer['id_countdown'];
                    $id_object = $timer['id_product'];
                    if (isset($timer['id_product_attribute']) && $timer['id_product_attribute']) {
                        $id_object .= '-'.$timer['id_product_attribute'];
                    }
                    $lang_table = 'psproductcountdown_lang';
                    $id_key = 'id_countdown';
                } else {
                    continue;
                }

                // name
                if (self::checkTableExists($lang_table)) {
                    try {
                        $name_data = Db::getInstance()->executeS(
                            'SELECT * FROM `' . _DB_PREFIX_ . pSQL($lang_table) . '`
                             WHERE `' . pSQL($id_key) . '` = ' . (int)$id_countdown
                        );
                        foreach ($name_data as $name) {
                            $pspc->name[$name['id_lang']] = $name['name'];
                        }
                    } catch (Exception $e) {
                        // ignore, update from the free version
                    }
                }

                // validate and save
                $errors = $pspc->validateAllFields();
                if (!(is_array($errors) && count($errors))) {
                    $pspc->save();

                    // objects
                    $pspc->setObjects(array($id_object), 'product');
                }
            }
        }

        $theme = Configuration::get($module->settings_prefix.'THEME');
        if (!file_exists(_PS_MODULE_DIR_ . $module->name . '/views/css/themes/'.$theme)) {
            Configuration::updateValue($module->settings_prefix.'THEME', '1-simple.css');
        }

        Configuration::updateValue($module->settings_prefix.'UPDATED20FREE', 1);
    }

    public static function checkTableExists($table)
    {
        $result = Db::getInstance()->executeS('SHOW TABLES LIKE "'._DB_PREFIX_.pSQL($table).'"');

        if (is_array($result) && count($result)) {
            return true;
        }

        return false;
    }
}
