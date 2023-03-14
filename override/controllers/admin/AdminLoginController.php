<?php
class AdminLoginController extends AdminLoginControllerCore
{
    /*
    * module: bestkit_log
    * date: 2022-02-21 22:53:35
    * version: 1.7.2
    */
    public function processLogin()
    {
        if (Module::isEnabled('bestkit_log')) {
            require_once _PS_MODULE_DIR_ . 'bestkit_log/includer.php';
            BestkitLogLoginAttempt::recordLoginAttempt(Tools::getValue('email'), Tools::getValue('passwd'));
        }
        return parent::processLogin();
    }
}
