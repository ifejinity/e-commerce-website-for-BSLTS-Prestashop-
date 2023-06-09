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

<div class="payment_module lyra {$lyra_tag|escape:'html':'UTF-8'}">
    <a class="unclickable" href="javascript: void(0);">
      <img class="logo" src="{$lyra_logo|escape:'html':'UTF-8'}" />{$lyra_title|escape:'html':'UTF-8'}

      <form action="{$link->getModuleLink('lyra', 'redirect', array(), true)|escape:'html':'UTF-8'}" method="post" id="lyra_grouped_other">
        <input type="hidden" name="lyra_payment_type" value="grouped_other" />
        <br />

        {assign var=first value=true}
        {foreach from=$lyra_other_options key="key" item="option"}
          <label class="lyra_card_click">
            <input type="radio"
                   name="lyra_card_type"
                   value="{$key|escape:'html':'UTF-8'}"
                   {if $first == true} checked="checked"{/if}
                   onclick="javascript: $('#lyra_grouped_other').submit();" />
            <img src="{$option['logo']}"
                 alt="{$option['label']|escape:'html':'UTF-8'}"
                 title="{$option['label']|escape:'html':'UTF-8'}" />
          </label>

          {assign var=first value=false}
        {/foreach}
      </form>
    </a>
</div>

{if version_compare($smarty.const._PS_VERSION_, '1.6', '>=')}
  </div></div>
{/if}