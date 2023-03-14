<?php
class ObjectModel extends ObjectModelCore
{
    /*
    * module: bestkit_log
    * date: 2022-02-21 22:53:34
    * version: 1.7.2
    */
    public function __construct($id = null, $id_lang = null, $id_shop = null, $translator = null)
    {
        $result = parent::__construct($id, $id_lang, $id_shop, $translator);
            require_once _PS_MODULE_DIR_ . 'bestkit_log/includer.php';
            BestkitLog::putToRegistry(BestkitLog::getRegistryName($this), $this);
        return $result;
    }
}