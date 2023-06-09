<?php
/*
 * 2007-2013 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2013 PrestaShop SA
 *  @version  Release: $Revision: 13573 $
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

/**
 * @since 1.5.0
 */

class PoCo_PayPalSubmitModuleFrontController extends ModuleFrontController
{
	public $display_column_left = false;

	public function initContent()
	{
		parent::initContent();

		$this->paypal = $this->module;
		$this->context = Context::getContext();

		$this->id_module = (int)Tools::getValue('id_module');
		$this->id_order = (int)Tools::getValue('id_order');
		$order = new Order($this->id_order);
		$order_state = new OrderState($order->current_state);
		$paypal_order = PoCoPayPalOrder::getOrderById($this->id_order);
		
		if ($order_state->template[$this->context->language->id] == 'payment_error')
		{
			$this->context->smarty->assign(
				array(
					'message' => $order_state->name[$this->context->language->id],
					'logs' => array(
						$this->paypal->l('An error occurred while processing payment.')
					),
					'order' => $paypal_order,
					'price' => Tools::displayPrice($paypal_order['total_paid'], $this->context->currency),
				)
			);
			
			return $this->setTemplate('module:'.$this->module->name.'/views/templates/front/error.tpl');
		}
		
		$order_currency = new Currency((int)$order->id_currency);
		$display_currency = new Currency((int)$this->context->currency->id);

		$price = Tools::convertPriceFull($paypal_order['total_paid'], $order_currency, $display_currency);

		$customer = new Customer((int)($order->id_customer));

		$this->id_cart = (int)Tools::getValue('id_cart');
		$this->key = (int)Tools::getValue('key');

		Tools::redirectLink('index.php?controller=order-confirmation&key=' . $customer->secure_key . '&id_cart=' . (int)$this->id_cart . '&id_module=' . (int)$this->module->id . '&id_order=' . (int)$this->id_order);
	}

	private function displayHook()
	{
		if (Validate::isUnsignedId($this->id_order) && Validate::isUnsignedId($this->id_module))
		{
			$order = new Order((int)$this->id_order);
			$currency = new Currency((int)$order->id_currency);

			if (Validate::isLoadedObject($order))
			{
				$params['objOrder'] = $order;
				$params['currencyObj'] = $currency;
				$params['currency'] = $currency->sign;
				$params['total_to_pay'] = $order->getOrdersTotalPaid();

				return $params;
			}
		}

		return false;
	}

	/**
	 * Execute the hook displayPaymentReturn
	 */
	public function displayPaymentReturn()
	{
		$params = $this->displayHook();

		if ($params && is_array($params))
			return Hook::exec('displayPaymentReturn', $params, (int)$this->id_module);
		return false;
	}

	/**
	 * Execute the hook displayOrderConfirmation
	 */
	public function displayOrderConfirmation()
	{
		$params = $this->displayHook();

		if ($params && is_array($params))
			return Hook::exec('displayOrderConfirmation', $params);
		return false;
	}
}
