  

{if $transaction}
  <section id="{$moduleName}-displayOrderConfirmation">
    <p>{l s='Your transaction reference is %transaction%.' mod='paymongo' sprintf=['%transaction%' => $transaction]}</p>
  </section>
{/if}
