<div class="panel card">
	<div class="panel-heading card-header">
		<img src="{$base_url}modules/{$module_name}/logo.gif"> {l s='PayPal Refund' mod='poco_paypal'}
	</div>
	<div class="card-body">
		<p><b>{l s='Information:' mod='paypal'}</b> {l s='Payment accepted' mod='poco_paypal'}</p>
		<p><b>{l s='Information:' mod='paypal'}</b> {l s='When you refund a product, a partial refund is made unless you select "Generate a voucher".' mod='poco_paypal'}</p>
		<form method="post" action="{$smarty.server.REQUEST_URI|escape:htmlall}">
			<input type="hidden" name="id_order" value="{$params.id_order}" />
			<input type="submit" class="btn btn-default" name="submitPayPalRefund" value="{l s='Refund total transaction' mod='poco_paypal'}" onclick="if (!confirm('{l s='Are you sure?' mod='poco_paypal'}'))return false;" />
		</form>
	</div>
</div>
