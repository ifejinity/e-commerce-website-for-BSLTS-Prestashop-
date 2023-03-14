<?php

class PoCo_PayPalConfirmModuleFrontController extends ModuleFrontController
{
	public $display_column_left = false;

	public function initContent()
	{
		if (!$this->context->customer->isLogged() || empty($this->context->cart))
			Tools::redirect('index.php');

		parent::initContent();

		$this->paypal = $this->module;
		$this->context = Context::getContext();
		$this->id_module = (int)Tools::getValue('id_module');

		$currency = new Currency((int)$this->context->cart->id_currency);

		$this->context->smarty->assign(array(
			'form_action' => $this->context->link->getModuleLink($this->module->name, 'expresscheckout'),
			'total' => Tools::displayPrice($this->context->cart->getOrderTotal(true), $currency),
			'logos' => $this->paypal->paypal_logos->getLogos()
		));

		$this->setTemplate('module:'.$this->module->name.'/views/templates/front/order-summary.tpl');
	}
}
