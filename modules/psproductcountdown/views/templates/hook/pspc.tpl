{**
* NOTICE OF LICENSE
*
* This file is licenced under the Software License Agreement.
* With the purchase or the installation of the software in your application
* you accept the licence agreement.
*
* @author    Presta.Site
* @copyright 2018 Presta.Site
* @license   LICENSE.txt
*}
<div class="pspc-wrp {if $pspc_hook}pspc_{$pspc_hook|escape:'html':'UTF-8'}{/if} {if strpos($pspc_product_list_position, 'over_img') !== false}pspc-wrp-over-img{/if} pspc-valign-{$pspc_vertical_align|escape:'quotes':'UTF-8'}">
    <div class="psproductcountdown pspc-inactive pspc{$pspc_psv|escape:'html':'UTF-8'} {$pspc_id|escape:'html':'UTF-8'}
        {if $pspc_ipa}pspc-combi-wrp pspc-cw-{$pspc_ipa|intval}{/if}
        {if strpos($pspc_product_list_position, 'over_img') !== false}pspc-over-img{/if}
        {if $pspc_compact_view}compact_view{/if}
        {if $pspc_show_promo_text}pspc-show-promo-text{else}pspc-hide-promo-text{/if}
        pspc-{$pspc_theme|escape:'quotes':'UTF-8'}
        pspc-highlight-{$pspc_highlight|escape:'html':'UTF-8'}"
         data-to="{$pspc->to_time|escape:'html':'UTF-8'}"
         data-name="{if $pspc->name}{$pspc->name|escape:'html':'UTF-8'}{else}{l s='Offer ends in:' mod='psproductcountdown'}{/if}"
         data-id-countdown="{$pspc->id|intval}"
    >
        <div class="pspc-main days-diff-{$pspc_days_diff|intval} {if $pspc_days_diff >= 100}pspc-diff-m100{/if}">
            <div class="pspc-offer-ends">
                {if $pspc->name}
                    {$pspc->name|escape:'html':'UTF-8'}
                {else}
                    {l s='Offer ends in:' mod='psproductcountdown'}
                {/if}
            </div>
        </div>
    </div>
</div>
<script>
    if (typeof pspc_initCountdown === 'function') {
        pspc_initCountdown('.{$pspc_id|escape:'html':'UTF-8'}');
    }
</script>
