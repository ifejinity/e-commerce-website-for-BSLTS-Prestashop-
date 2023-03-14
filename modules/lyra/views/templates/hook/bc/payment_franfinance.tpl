{**
 * Copyright © Lyra Network.
 * This file is part of Lyra Collect plugin for PrestaShop. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   https://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 *}

{if version_compare($smarty.const._PS_VERSION_, '1.6', '>=')}
  <div class="row"><div class="col-xs-12{if version_compare($smarty.const._PS_VERSION_, '1.6.0.11', '<')} col-md-6{/if}">
{/if}

{if {$lyra_ffin_options|@count} == 0}
  <div class="payment_module lyra {$lyra_tag|escape:'html':'UTF-8'}">
    <a href="javascript: $('#lyra_franfinance').submit();" title="{l s='Click here to pay with FullCB' mod='lyra'}">
      <img class="logo" src="{$lyra_logo|escape:'html':'UTF-8'}" />{$lyra_title|escape:'html':'UTF-8'}

      <form action="{$link->getModuleLink('lyra', 'redirect', array(), true)|escape:'html':'UTF-8'}" method="post" id="lyra_franfinance">
        <input type="hidden" name="lyra_payment_type" value="franfinance" />
      </form>
    </a>
  </div>
{else}
  <div class="payment_module lyra {$lyra_tag|escape:'html':'UTF-8'}">
    <a class="unclickable" title="{l s='Choose a payment option and click « Pay » button' mod='lyra'}" href="javascript: void(0);">
      <img class="logo" src="{$lyra_logo|escape:'html':'UTF-8'}" />{$lyra_title|escape:'html':'UTF-8'}

      <form action="{$link->getModuleLink('lyra', 'redirect', array(), true)|escape:'html':'UTF-8'}" method="post" id="lyra_franfinance">
        <input type="hidden" name="lyra_payment_type" value="franfinance" />

        <br />
        {assign var=first value=true}
        {foreach from=$lyra_ffin_options key="key" item="option"}
          <div style="padding-bottom: 5px;">
            {if $lyra_ffin_options|@count == 1}
              <input type="hidden" id="lyra_ffin_option_{$key|escape:'html':'UTF-8'}" name="lyra_ffin_option" value="{$key|escape:'html':'UTF-8'}" >
            {else}
              <input type="radio"
                     id="lyra_ffin_option_{$key|escape:'html':'UTF-8'}"
                     name="lyra_ffin_option"
                     value="{$key|escape:'html':'UTF-8'}"
                     style="vertical-align: middle;"
                     {if $first == true} checked="checked"{/if}>
            {/if}

            <label for="lyra_ffin_option_{$key|escape:'html':'UTF-8'}" style="display: inline;">
              <span style="vertical-align: middle;">{$option.localized_label|escape:'html':'UTF-8'}</span>
            </label>

          {assign var=first value=false}
          </div>
        {/foreach}

        {if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
          <input type="submit" name="submit" value="{l s='Pay' mod='lyra'}" class="button" />
        {else}
          <button type="submit" name="submit" class="button btn btn-default standard-checkout button-medium" >
            <span>{l s='Pay' mod='lyra'}</span>
          </button>
        {/if}
      </form>
    </a>
  </div>
{/if}

{if version_compare($smarty.const._PS_VERSION_, '1.6', '>=')}
  </div></div>
{/if}