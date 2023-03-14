<div class="panel card">
	<div class="panel-heading card-header">
		<img src="{$base_url}modules/{$module_name}/logo.gif"> {l s='PayPal Validation' mod='poco_paypal'}
	</div>
	<div class="card-body">
		<p><b>{l s='Information:' mod='poco_paypal'}</b> {if $order_state->id == $authorization}{l s='Pending Capture - No shipping' mod='poco_paypal'}{else}{l s='Pending Payment - No shipping' mod='poco_paypal'}{/if}</p>
		<form method="post" action="{$smarty.server.REQUEST_URI|escape:htmlall}">
			<input type="hidden" name="id_order" value="{$params.id_order}">
			<input type="submit" class="btn btn-default" name="submitPayPalValidation"
				   value="{l s='Get payment status' mod='poco_paypal'}">
		</form>
	</div>
</div>
