<div id="container_express_checkout" style="float:right; margin: 10px 40px 0 0">

	<img id="payment_paypal_express_checkout" src="https://www.paypal.com/{$PayPal_lang_code}/i/btn/btn_xpressCheckout.gif" alt="" />
	
	{if isset($include_form) && $include_form}
		{include file="$template_dir./express_checkout_shortcut_form.tpl"}
	{/if}
</div>
<div class="clearfix"></div>
