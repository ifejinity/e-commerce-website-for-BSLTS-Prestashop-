{if $status == 'ok'}
    <p>
      {l s='Your order on %s is complete.' sprintf=[$shop_name] d='Modules.Custompayment.Shop'}<br/>
    </p>
    <p>
        {$custompaymentReturnedText nofilter}
    </p>
    <p>
      {l s='If you have questions, comments or concerns, please contact our [1]expert customer support team[/1].' d='Modules.Custompayment.Shop' sprintf=['[1]' => "<a href='{$contact_url}'>", '[/1]' => '</a>']}
    </p>
{else}
    <p class="warning">
      {l s='We noticed a problem with your order. If you think this is an error, feel free to contact our [1]expert customer support team[/1].' d='Modules.Custompayment.Shop' sprintf=['[1]' => "<a href='{$contact_url}'>", '[/1]' => '</a>']}
    </p>
{/if}