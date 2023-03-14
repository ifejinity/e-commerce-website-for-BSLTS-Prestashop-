{extends file='customer/page.tpl'}

{block name='page_content'}

<h2>{$message}</h2>
{if isset($logs) && $logs}
	<div class="error">
		<p><b>{l s='Please try to contact the merchant:' mod='poco_paypal'}</b></p>
		
		<ol>
		{foreach from=$logs key=key item=log}
			<li>{$log}</li>
		{/foreach}
		</ol>
		
		<br>
		
		{if isset($order)}
			<p>
				{l s='Total of the transaction (taxes incl.) :' mod='poco_paypal'} <span class="bold">{$price}</span><br>
				{l s='Your order ID is :' mod='poco_paypal'} <span class="bold">{$order.id_order}</span><br>
			</p>
		{/if}
	</div>

{/if}

{/block}
