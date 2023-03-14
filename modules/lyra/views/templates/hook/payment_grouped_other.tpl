{**
 * Copyright © Lyra Network.
 * This file is part of Lyra Collect plugin for PrestaShop. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   https://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 *}

<!-- This meta tag is mandatory to avoid encoding problems caused by \PrestaShop\PrestaShop\Core\Payment\PaymentOptionFormDecorator -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<form action="{$link->getModuleLink('lyra', 'redirect', array(), true)|escape:'html':'UTF-8'}"
      method="post"
      style="margin-left: 2.875rem; margin-top: 1.25rem; margin-bottom: 1rem;">
  <input type="hidden" name="lyra_payment_type" value="grouped_other">

  {assign var=first value=true}
  {foreach from=$lyra_other_options key="key" item="option"}
    <div class="lyra-pm">
      <label>
        <input type="radio" name="lyra_card_type" value="{$key|escape:'html':'UTF-8'}" {if $first == true} checked="checked"{/if} />
        <img src="{$option['logo']}"
             alt="{$option['label']|escape:'html':'UTF-8'}"
             title="{$option['label']|escape:'html':'UTF-8'}" />
      </label>
    </div>

    {assign var=first value=false}
  {/foreach}
</form>