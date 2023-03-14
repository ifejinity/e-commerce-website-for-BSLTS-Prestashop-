<div class="panel card">
	<div class="panel-heading card-header">
		<img src="{$base_url}modules/{$module_name}/logo.gif" alt="" />{l s='PayPal Capture' mod='poco_paypal'}
	</div>
    <div class="card-body">
		<p><b>{l s='Information:' mod='paypal'}</b> {l s='Funds ready to be captured before shipping' mod='paypal'}</p>
		<form method="post" action="{$smarty.server.REQUEST_URI|escape:htmlall}">
			<input type="hidden" name="id_order" value="{$params.id_order}" />
			<input type="submit" class="btn btn-default" name="submitPayPalCapture" value="{l s='Get the money' mod='poco_paypal'}" />
		</form>
	</div>
</div>
