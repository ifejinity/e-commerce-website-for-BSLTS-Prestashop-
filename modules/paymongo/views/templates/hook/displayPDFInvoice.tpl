  

{if $transaction}
  <p>{l s='Your transaction reference is %transaction%.' mod='paymongo' sprintf=['%transaction%' => $transaction]}</p>
{/if}
