{extends file='customer/page.tpl'}

{block name='page_content'}

	<h1>{l s='Order summary' mod='poco_paypal'}</h1>

	{assign var='current_step' value='payment'}

	<h3>{l s='PayPal payment' mod='paypal'}</h3>
	<form action="{$form_action}" method="post" data-ajax="false">
		<p>
			{l s='You have chosen to pay with PayPal.' mod='poco_paypal'}
			<br/><br />
		{l s='Here is a short summary of your order:' mod='poco_paypal'}
		</p>
		<p style="margin-top:20px;">
			- {l s='The total amount of your order is' mod='poco_paypal'}
			<span id="amount" class="price"><strong>{$total}</strong></span>
		</p>
		<p>
			- {l s='We accept the following currency to be sent by PayPal:' mod='poco_paypal'}&nbsp;<b>{$currency.name}</b>
		</p>
		<p>
			<b>{l s='Please confirm your order by clicking \'I confirm my order\'' mod='poco_paypal'}.</b>
		</p>
		<p class="cart_navigation">
			<input type="submit" name="confirmation" value="{l s='I confirm my order' mod='poco_paypal'}" class="btn btn-primary" />
		</p>
	</form>
{/block}
