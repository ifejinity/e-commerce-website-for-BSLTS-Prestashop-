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
<div id="module_psproductcountdown" class="panel product-tab">
    <input type="hidden" name="submitted_tabs[]" value="{$module_name|escape:'html':'UTF-8'}" />
    <input type="hidden" name="{$module_name|escape:'html':'UTF-8'}-submit" value="1" />
    <h3>{l s='Countdown' mod='psproductcountdown'}</h3>

    <div class="form-group">
        <div class="col-lg-1"><span class="pull-right"></span></div>
        <label class="control-label col-lg-2">
            <span class="label-tooltip" data-toggle="tooltip" title="" data-original-title='{l s='Set to NO if you want to completely disable countdown for this product.' mod='psproductcountdown'}'>
				 {l s='Enabled:' mod='psproductcountdown'}
			</span>
        </label>
        <div class="col-lg-5">
            <span class="switch prestashop-switch fixed-width-lg">
				<input onclick="toggleDraftWarning(false);showOptions(true);showRedirectProductOptions(false);" type="radio" name="pspc_active" id="pspc_active_on" value="1" {if !isset($countdown_data.active) || (isset($countdown_data.active) && $countdown_data.active)}checked{/if}>
				<label for="pspc_active_on" class="radioCheck">
                    {l s='Yes' mod='psproductcountdown'}
                </label>
				<input onclick="toggleDraftWarning(true);showOptions(false);showRedirectProductOptions(true);" type="radio" name="pspc_active" id="pspc_active_off" value="0"{if (isset($countdown_data.active) && !$countdown_data.active)}checked{/if}>
				<label for="pspc_active_off" class="radioCheck">
                    {l s='No' mod='psproductcountdown'}
                </label>
				<a class="slide-button btn"></a>
			</span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-1"><span class="pull-right"></span></div>
        <label class="control-label col-lg-2">
            {l s='Promo text:' mod='psproductcountdown'}
        </label>
        <div class="col-lg-5">
            {foreach from=$languages item=language name=pspc_lang_foreach}
                {if $languages|count > 1}
                    <div class="translatable-field row lang-{$language.id_lang|intval}" {if !$smarty.foreach.pspc_lang_foreach.first}style="display: none;" {/if}>
                    <div class="col-lg-9">
                {/if}
                <input type="text"
                       id="pspc_name_{$language.id_lang|intval}"
                       class="form-control"
                       name="pspc_name_{$language.id_lang|intval}"
                       value="{if isset($countdown_data['name'][$language.id_lang])}{$countdown_data['name'][$language.id_lang]|escape:'html':'UTF-8'}{/if}"
                       />
                {if $languages|count > 1}
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                            {$language.iso_code|escape:'html':'UTF-8'}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            {foreach from=$languages item=lang}
                                <li>
                                    <a href="javascript:tabs_manager.allow_hide_other_languages = false;hideOtherLanguage({$lang.id_lang|intval});">{$lang.name|escape:'html':'UTF-8'}</a>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                    </div>
                {/if}
            {/foreach}
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-1"><span class="pull-right"></span></div>

        <label class="control-label col-lg-2">
             {l s='Display:' mod='psproductcountdown'}
        </label>
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">{l s='from' mod='psproductcountdown'}</span>
                        <input type="text" name="pspc_from" class="pspc-datepicker test pspc-datetime-utc" value="{if isset($countdown_data.from_tz)}{$countdown_data.from_tz|escape:'html':'UTF-8'}{/if}" style="text-align: center;" id="pspc_from">
                        <span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">{l s='to' mod='psproductcountdown'}</span>
                        <input type="text" name="pspc_to" class="pspc-datepicker pspc-datetime-utc" value="{if isset($countdown_data.to_tz)}{$countdown_data.to_tz|escape:'html':'UTF-8'}{/if}" style="text-align: center;" id="pspc_to">
                        <span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-1"><span class="pull-right"></span></div>
        <label class="control-label col-lg-2">
            {l s='Use dates from specific prices:' mod='psproductcountdown'}
        </label>
        <div class="col-lg-5">
            <select name="pspc_specific_price" id="pspc_specific_price">
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
    </div>

    {if isset($countdown_data.id_pspcf)}
        <input type="hidden" name="id_pspc" id="id_pspc" value="{$countdown_data.id_pspcf|intval}">
        <div class="form-group">
            <div class="col-lg-1"><span class="pull-right"></span></div>
            <div class="control-label col-lg-2"></div>
            <div class="col-lg-5">
                <button type="button" id="pspc-reset-countdown" class="btn btn-default" data-id-countdown="{$countdown_data.id_pspcf|intval}">{l s='Reset & remove' mod='psproductcountdown'}</button>
            </div>
        </div>
    {else}
        <input type="hidden" name="id_pspc" id="id_pspc" value="0">
    {/if}

    <div class="form-group">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
                <div id="pspc_error" class="alert alert-danger" style="display: none;"></div>
                <div id="pspc_saved" class="alert alert-success" style="display: none;">{l s='Saved' mod='psproductcountdown'}</div>
                <input type="hidden" name="id_product" value="{$id_product|intval}">
                <button class="btn btn-primary" id="pspc_save_product_countdown">{l s='Save countdown' mod='psproductcountdown'}</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var pspc_ajax_url = "{$ajax_url|escape:'quotes':'UTF-8'}";
    </script>
</div>
