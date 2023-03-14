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

<div class="{if !$pspc->id}add-countdown-wrp{else}edit-countdown-wrp{/if}">
    {if !$pspc->id}
    <button class="btn btn-primary add-pspc">
        <i class="icon-plus-square"></i>
        {l s='Add new countdown' mod='psproductcountdown'}
    </button>
    {/if}

    <div class="countdown-form">
        <div class="row">
            <div class="col-lg-{if $pspc->id}11{else}12{/if}">
                <div class="form-group row pspc-items-form-group">
                    <label class="control-label col-lg-2">
                        <span class="label-tooltip" data-toggle="tooltip" data-placement="bottom" data-html="true" title="{l s='Select products for using with this countdown' mod='psproductcountdown'}">
                            {l s='Items:' mod='psproductcountdown'} <sup>*</sup>
                        </span>
                    </label>
                    <div class="col-lg-10 col-xs-12 pspc-prodselects-wrp">
                        <button class="btn btn-default pspc-select-obj pspc-select-products" data-type="products"><i class="icon-plus"></i> {l s='Select products' mod='psproductcountdown'} <span class="badge badge-info pspc-number-products">{count($pspc_chosen_products)|intval}</span></button>

                        <div class="pspc-select-wrp pspc-select-wrp-products">
                            <div class="row">
                                <div class="col-lg-6 pspc-col-filters">
                                    <span class="btn btn-default btn-xs pspc-toggle-category-filter"><i class="icon-filter"></i> {l s='Filter by category' mod='psproductcountdown'}</span>
                                    <span class="btn btn-default btn-xs pspc-toggle-manufacturer-filter"><i class="icon-filter"></i> {l s='Filter by manufacturer' mod='psproductcountdown'}</span>
                                    <label class="pspc-search-combinations-label" for="pspc-search-combinations-{$pspc->id|intval}"><input type="checkbox" class="pspc-search-combinations" id="pspc-search-combinations-{$pspc->id|intval}"> {l s='Search combinations' mod='psproductcountdown'}</label>
                                    <div class="pspc-manufacturer-wrp pspc-filter-wrp">
                                        <select class="pspc-manufacturer-select">
                                            <option value="">--</option>
                                            {foreach from=$pspc_manufacturers item='manufacturer'}
                                                <option value="{$manufacturer.id_manufacturer|intval}">{$manufacturer.name|escape:'html':'UTF-8'}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="pspc-category-wrp pspc-filter-wrp">
                                        {$product_category_tree nofilter} {*rendered html*}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control pspc-product-search" placeholder="{l s='Search products' mod='psproductcountdown'}">
                                </div>
                                <div class="col-lg-6"><h4>{l s='Selected products:' mod='psproductcountdown'}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select multiple class="pspc_prod_select">
                                        <option disabled value="" class="pspc-default-option">{l s='Search products or use filters to get results' mod='psproductcountdown'}</option>
                                    </select>
                                    <a href="#" class="btn btn-default btn-block pspc_multiple_select_add">
                                        {l s='Add' mod='psproductcountdown'} <i class="icon-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <select multiple class="pspc_prod_selected" name="products[]">
                                        {foreach from=$pspc_chosen_products item='chosen_product'}
                                            {assign var='ref' value=$pspc_module->getProductReference($chosen_product.id_object, $chosen_product.id_product_attribute)}
                                            <option value="{$chosen_product.id_object|intval}{if $chosen_product.id_product_attribute}-{$chosen_product.id_product_attribute|intval}{/if}">#{$chosen_product.id_object|intval} {Product::getProductName($chosen_product.id_object, $chosen_product.id_product_attribute)|escape:'html':'UTF-8'} {if $ref}({l s='ref:' mod='psproductcountdown'} {$ref|escape:'html':'UTF-8'}){/if}</option>
                                        {/foreach}
                                    </select>
                                    <a href="#" class="btn btn-default btn-block pspc_multiple_select_del">
                                        {l s='Remove' mod='psproductcountdown'} <i class="icon-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="control-label col-lg-2">
                        <span class="label-tooltip" data-toggle="tooltip" data-placement="bottom" data-html="true" title="{l s='A text displayed alongside the countdown.' mod='psproductcountdown'}">
                            {l s='Promo text:' mod='psproductcountdown'}
                        </span>
                    </label>
                    <div class="col-lg-5">
                        {assign var='name_id' value="pspc-add-name`$pspc->id`"}
                        {$pspc_module->generateInput(['type' => 'text', 'lang' => true, 'name' => 'name', 'class' => 'pspc-add-name', 'id' => $name_id, 'values' => $pspc->name]) nofilter}
                    </div>
                </div>

                <div class="form-group row datepicker-row">
                    <label class="control-label col-lg-2">
                        <span class="label-tooltip" data-toggle="tooltip" data-placement="bottom" data-html="true" title="{l s='Select time interval for this countdown.' mod='psproductcountdown'}">
                            {l s='Display:' mod='psproductcountdown'} <sup>*</sup>
                        </span>
                    </label>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">{l s='from' mod='psproductcountdown'}</span>
                                    <input type="text" name="from" class="pspc-datepicker" value="{$pspc->from_tz|escape:'html':'UTF-8'}" style="text-align: center;">
                                    <span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">{l s='to' mod='psproductcountdown'}</span>
                                    <input type="text" name="to" class="pspc-datepicker" value="{$pspc->to_tz|escape:'html':'UTF-8'}" style="text-align: center;">
                                    <span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {if !$pspc->id}
                <div class="form-group row ">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4 col-xs-12">
                        <div class="alert alert-danger add-pspc-error" style="display: none;"></div>
                        <div class="pspc-form-btns-add">
                            <button class="btn btn-primary btn-pspc-submit">{l s='Add' mod='psproductcountdown'}</button>
                        </div>
                    </div>
                </div>
                {else}
                    <div class="alert alert-danger add-pspc-error" style="display: none;"></div>
                {/if}
            </div>
            {if $pspc->id}
                <div class="col-lg-1">
                    <div class="pspc-form-btns-edit">
                        <button class="btn btn-primary pull-right btn-pspc-submit"><i class="icon-save"></i> {l s='Save' mod='psproductcountdown'}</button>
                        <input type="hidden" name="id_pspc" value="{$pspc->id|intval}">
                    </div>
                </div>
            {/if}
            <input type="hidden" name="action" value="saveCountdown">
            <input type="hidden" name="ajax" value="1">
        </div>

        <div class="close-countdown-form close-product-countdown-form">&#10006;</div>
    </div>
</div>
