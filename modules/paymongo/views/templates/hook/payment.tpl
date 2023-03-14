
<style>
	.card_form {
		border: 1px solid #d6d4d4;
    	padding: 30px;
		border-radius: 4px;
	}
	.card_form > p{
		font-size: 17px;
		line-height: 23px;
		color: #333333;
		font-weight: bold;
	}
</style>

{if $grabpay_active}
<div class="row">
	<div class="col-xs-12 col-md-6">
		<p class="payment_module" id="paymongo_grabpay">
			<a href={$grabpay_link} style="background: url({$asset_path}grabpay.png) 15px 30px no-repeat #fbfbfb;">GrabPay via PayMongo</a>
		</p>
	</div>
</div>
{/if}

{if $gcash_active}
<div class="row">
	<div class="col-xs-12 col-md-6">
		<p class="payment_module" id="paymongo_gcash">
			<a href={$gcash_link} style="background: url({$asset_path}gcash.png) 15px 30px no-repeat #fbfbfb;">Gcash via PayMongo</a>
		</p>
	</div>
</div>
{/if}
	
{if $card_active}
<div class="row">
	<div class="col-xs-12 col-md-6">
		<form action="{$card_action}" id="payment-form" class="payment_module card_form" method="post">
			<p class="payment_module">
				Credit and Debit Card via PayMongo
				<img src="{$asset_path}cards.png"/>
			</p>
			<input type="hidden" name="option" value="embedded">
			{if isset($error)}
				<label class="alert alert-warning"> {$error} </label>
			{/if}
			<div class="form-group">
				<label class="form-control-label" for="cardNumber">{l s='Card number' mod='paymongo'}</label>
				<input type="text" name="cardNumber" id="cardNumber" class="form-control" autocomplete="cc-number" required>
			</div>

			<div class="form-group">
				<label class="form-control-label" for="cardHolder">{l s='Card holder' mod='paymongo'}</label>
				<input type="text" name="cardHolder" id="cardHolder" class="form-control" placeholder="{l s='Full name' mod='paymongo'}" autocomplete="cc-name" required>
			</div>

			<div class="row">
				<div class="form-group col-xs-4">
				<label class="form-control-label" for="cardCVC">{l s='CVC' mod='paymongo'}</label>
				<input type="text" name="cardCVC" id="cardCVC" class="form-control" autocomplete="cc-csc" required>
				</div>

				<div class="form-group col-xs-4">
				<label class="form-control-label" for="cardExpirationMonth">{l s='Expiration Month' mod='paymongo'}</label>
				<input type="number" name="cardExpirationMonth" id="cardExpirationMonth" class="form-control" placeholder="MM" autocomplete="cc-exp-month" required>
				</div>

				<div class="form-group col-xs-4">
				<label class="form-control-label" for="cardExpirationYear">{l s='Expiration Year' mod='paymongo'}</label>
				<input type="number" name="cardExpirationYear" id="cardExpirationYear" class="form-control" placeholder="YYYY" autocomplete="cc-exp-year" required>
				</div>
			</div>
			<input type="submit"/>
		</form>
	</div>
</div>
{/if}
