  

{if $transaction}
  <section id="{$moduleName}-displayOrderDetail" class="box">
    <p>{l s='Your transaction reference is %transaction%.' mod='paymongo' sprintf=['%transaction%' => $transaction]}</p>
  </section>
{/if}
