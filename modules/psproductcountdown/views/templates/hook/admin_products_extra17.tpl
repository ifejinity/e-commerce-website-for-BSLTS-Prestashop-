{**
* NOTICE OF LICENSE
*
* This file is licenced under the Software License Agreement.
* With the purchase or the installation of the software in your application
* you accept the licence agreement.
*
* @author    Presta.Site
* @copyright 2017 Presta.Site
* @license   LICENSE.txt
*}
<div id="module_psproductcountdown" class="">
    <input type="hidden" name="submitted_tabs[]" value="{$module_name|escape:'html':'UTF-8'}" />
    <input type="hidden" name="{$module_name|escape:'html':'UTF-8'}-submit" value="1" />

    <div class="row">
        <div class="col-lg-12 col-xl-4">
            <fieldset class="form-group">
                <label class="form-control-label">{l s='Enabled:' mod='psproductcountdown'}</label>
                <div id="pspc_active">
                    <div class="radio">
                        <label class="">
                            <input type="radio" id="pspc_active_1" name="pspc_active" value="1" {if !isset($countdown_data.active) || (isset($countdown_data.active) && $countdown_data.active)}checked{/if}>
                            {l s='Yes' mod='psproductcountdown'}
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="">
                            <input type="radio" id="pspc_active_0" name="pspc_active" value="0" {if (isset($countdown_data.active) && !$countdown_data.active)}checked{/if}>
                            {l s='No' mod='psproductcountdown'}
                        </label>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-lg-12 col-xl-4">
            <fieldset class="form-group">
                <label class="form-control-label">{l s='Promo text:' mod='psproductcountdown'}</label>
                <div class="translations tabbable" id="pspc_name_wrp">
                    <div class="translationsFields tab-content ">
                        {foreach from=$languages item=language name=pspc_lang_foreach}
                            <div class="translationsFields-pspc_name tab-pane translation-field translation-label-{$language.iso_code|escape:'html':'UTF-8'} {if $smarty.foreach.pspc_lang_foreach.first}active{/if}">
                                <input type="text"
                                       id="pspc_name_{$language.id_lang|intval}"
                                       name="pspc_name_{$language.id_lang|intval}"
                                       class="form-control"
                                       value="{if isset($countdown_data['name'][$language.id_lang])}{$countdown_data['name'][$language.id_lang]|escape:'html':'UTF-8'}{/if}"
                                />
                            </div>
                        {/foreach}
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-4">
            <fieldset class="form-group">
                <label class="form-control-label">{l s='Display:' mod='psproductcountdown'}</label>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">{l s='from' mod='psproductcountdown'}</span></div>
                            <input type="text" name="pspc_from" class="pspc-datepicker form-control pspc-datetime-utc" value="{if isset($countdown_data.from_tz)}{$countdown_data.from_tz|escape:'html':'UTF-8'}{/if}" style="text-align: center;" id="pspc_from">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">{l s='to' mod='psproductcountdown'}</span></div>
                            <input type="text" name="pspc_to" class="pspc-datepicker form-control pspc-datetime-utc" value="{if isset($countdown_data.to_tz)}{$countdown_data.to_tz|escape:'html':'UTF-8'}{/if}" style="text-align: center;" id="pspc_to">
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-lg-12 col-xl-4">
            <fieldset class="form-group">
                <label class="form-control-label">{l s='Use dates from specific prices:' mod='psproductcountdown'}</label>
                <div id="pspc_specific_price_wrp">
                    <select name="pspc_specific_price" id="pspc_specific_price" class="form-control">
                        <option value="">--</option>
                        {foreach from=$specific_prices item=specific_price}
                            <option value="{$specific_price.id_specific_price|intval}"
                                    data-from="{$specific_price.from|escape:'html':'UTF-8'}"
                                    data-to="{$specific_price.to|escape:'html':'UTF-8'}">
                                {l s='from' mod='psproductcountdown'}: {$specific_price.from|escape:'html':'UTF-8'}&nbsp;&nbsp;&nbsp;
                                {l s='to' mod='psproductcountdown'}: {$specific_price.to|escape:'html':'UTF-8'}
                            </option>
                        {/foreach}
                    </select>
                </div>
            </fieldset>
        </div>
    </div>

    {if isset($countdown_data.id_pspcf)}
        <input type="hidden" name="id_pspc" id="id_pspc" value="{$countdown_data.id_pspcf|intval}">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-12 col-xl-4">
                    <fieldset class="form-group">
                        <div>
                            <button type="button" id="pspc-reset-countdown" class="btn btn-default" data-id-countdown="{$countdown_data.id_pspcf|intval}">{l s='Reset & remove' mod='psproductcountdown'}</button>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    {else}
        <input type="hidden" name="id_pspc" id="id_pspc" value="0">
    {/if}

    <div class="form-group">
        <div id="pspc_error" class="alert alert-danger" style="display: none;"></div>
        <div id="pspc_saved" class="alert alert-success" style="display: none;">{l s='Saved' mod='psproductcountdown'}</div>
        <input type="hidden" name="id_product" value="{$id_product|intval}">
        <button class="btn btn-primary" id="pspc_save_product_countdown">{l s='Save countdown' mod='psproductcountdown'}</button>
    </div>
</div>
