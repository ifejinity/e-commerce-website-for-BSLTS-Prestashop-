{**
* NOTICE OF LICENSE
*
* This file is licenced under the Software License Agreement.
* With the purchase or the installation of the software in your application
* you accept the licence agreement.
*
* @author    Presta.Site
* @copyright 2019 Presta.Site
* @license   LICENSE.txt
*}
<style type="text/css">
    {* both positions can be in the hook displayProductPriceBlock, so we have to hide duplicates via css *}
    {if $pspc_module->product_position != 'displayProductPriceBlock' && ($pspc_module->product_list_position == 'over_img' || $pspc_module->product_list_position == 'displayProductPriceBlock')}
    #product .pspc-wrp.pspc_displayProductPriceBlock {ldelim}
        display: none !important;
    {rdelim}
    #product .ajax_block_product .pspc-wrp.pspc_displayProductPriceBlock,
    #product .product_list .pspc-wrp.pspc_displayProductPriceBlock,
    #product #product_list .pspc-wrp.pspc_displayProductPriceBlock,
    #product .product-miniature .pspc-wrp.pspc_displayProductPriceBlock {ldelim}
        display: block !important;
    {rdelim}
    {elseif $pspc_module->product_position == 'displayProductPriceBlock' && $pspc_module->product_list_position != 'over_img' && $pspc_module->product_list_position != 'displayProductPriceBlock'}
    #product .pspc-wrp.pspc_displayProductPriceBlock {ldelim}
        display: block !important;
    {rdelim}
    .ajax_block_product .pspc-wrp.pspc_displayProductPriceBlock,
    .product_list .pspc-wrp.pspc_displayProductPriceBlock,
    #product_list .pspc-wrp.pspc_displayProductPriceBlock,
    .product-miniature .pspc-wrp.pspc_displayProductPriceBlock {ldelim}
        display: none !important;
    {rdelim}
    {/if}

    {if $pspc_custom_css}
        {$pspc_custom_css|escape:'quotes':'UTF-8'}
    {/if}
</style>

<script type="text/javascript">
    var pspc_labels = ['days', 'hours', 'minutes', 'seconds'];
    var pspc_labels_lang = {
        'days': '{l s='days' mod='psproductcountdown'}',
        'hours': '{l s='hours' mod='psproductcountdown'}',
        'minutes': '{l s='min.' mod='psproductcountdown'}',
        'seconds': '{l s='sec.' mod='psproductcountdown'}'
    };
    var pspc_labels_lang_1 = {
        'days': '{l s='day' mod='psproductcountdown'}',
        'hours': '{l s='hour' mod='psproductcountdown'}',
        'minutes': '{l s='min.' mod='psproductcountdown'}',
        'seconds': '{l s='sec.' mod='psproductcountdown'}'
    };
    var pspc_offer_txt = "{l s='Offer ends in:' mod='psproductcountdown'}";
    var pspc_theme = "{$pspc_theme|escape:'html':'UTF-8'}";
    var pspc_psv = {$psv|floatval};
    var pspc_hide_after_end = {$pspc_hide_after_end|intval};
    var pspc_hide_expired = {$pspc_hide_expired|intval};
    var pspc_highlight = "{$pspc_highlight|escape:'html':'UTF-8'}";
    var pspc_position_product = "{$pspc_position_product|escape:'html':'UTF-8'}";
    var pspc_position_list = "{$pspc_position_list|escape:'html':'UTF-8'}";
    var pspc_adjust_positions = {$pspc_adjust_positions|intval};
    var pspc_token = "{Tools::getToken(false)|escape:'html':'UTF-8'}";
</script>