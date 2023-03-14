  

<form action="{$action}" id="payment-form" class="form-horizontal" method="post">
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
    <div class="form-group col-xs-6">
      <label class="form-control-label" for="cardCVC">{l s='CVC' mod='paymongo'}</label>
      <input type="text" name="cardCVC" id="cardCVC" class="form-control" autocomplete="cc-csc" required>
    </div>

    <div class="form-group col-xs-3">
      <label class="form-control-label" for="cardExpirationMonth">{l s='Expiration Month' mod='paymongo'}</label>
      <input type="number" name="cardExpirationMonth" id="cardExpirationMonth" class="form-control" placeholder="MM" autocomplete="cc-exp-month" required>
    </div>
    <div class="form-group col-xs-3">
      <label class="form-control-label" for="cardExpirationYear">{l s='Expiration Year' mod='paymongo'}</label>
      <input type="number" name="cardExpirationYear" id="cardExpirationYear" class="form-control" placeholder="YYYY" autocomplete="cc-exp-year" required>
    </div>
  </div>
</form>
