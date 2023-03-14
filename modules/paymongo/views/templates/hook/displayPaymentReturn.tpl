  

<section id="{$moduleName}-displayPaymentReturn">
  {if $transaction}
    <p>{l s='Your transaction reference is %transaction%.' mod='paymongo' sprintf=['%transaction%' => $transaction]}</p>
  {/if}
  {if $customer.is_logged && !$customer.is_guest}
    <p><a href="{$transactionsLink}">{l s='See all previous transactions in your account.' mod='paymongo'}</a></p>
  {/if}
</section>

