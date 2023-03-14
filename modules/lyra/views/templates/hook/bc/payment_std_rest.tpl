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
  <a class="unclickable"
    {if $lyra_is_valid_std_identifier}
        title="{l s='Choose pay with registred means of payment or enter payment information and click « Pay » button' mod='lyra'}"
    {else}
        {if $lyra_std_card_data_mode == '6'}
            title="{l s='Click on « Pay » button to enter payment information in a popin mode' mod='lyra'}"
        {else}
            title="{l s='Enter payment information and click « Pay » button' mod='lyra'}"
        {/if}
    {/if}
  >
    <img class="logo" src="{$lyra_logo|escape:'html':'UTF-8'}" />{$lyra_title|escape:'html':'UTF-8'}

    <div id="lyra_standard_rest_wrapper" style="padding-top: 10px; padding-left: 40px;">
      <div class="kr-embedded"
          {if $lyra_std_card_data_mode == '6'} kr-popin{/if}
          kr-public-key="{$lyra_std_rest_kr_public_key|escape:'html':'UTF-8'}"
          kr-post-url-success="{$lyra_std_rest_return_url|escape:'html':'UTF-8'}"
          kr-post-url-refused="{$lyra_std_rest_return_url|escape:'html':'UTF-8'}"
          kr-language="{$lyra_std_rest_kr_language|escape:'html':'UTF-8'}"
          kr-label-do-register="{$lyra_std_rest_kr_label_do_register|escape:'html':'UTF-8'}"
          {if isset($lyra_std_rest_kr_placeholder_pan)}
              kr-placeholder-pan="{$lyra_std_rest_kr_placeholder_pan|escape:'html':'UTF-8'}"
          {/if}
          {if isset($lyra_std_rest_kr_placeholder_expiry)}
              kr-placeholder-expiry="{$lyra_std_rest_kr_placeholder_expiry|escape:'html':'UTF-8'}"
          {/if}
          {if isset($lyra_std_rest_kr_placeholder_security_code)}
              kr-placeholder-security-code="{$lyra_std_rest_kr_placeholder_security_code|escape:'html':'UTF-8'}"
          {/if}
      >
        <div class="kr-pan"></div>
        <div class="kr-expiry"></div>
        <div class="kr-security-code"></div>
        <button type="button" class="kr-payment-button"></button>

        <div class="kr-form-error"></div>
      </div>
    </div>

    <script type="text/javascript">
      $('#lyra_standard_rest_wrapper').ready(function() {
        KR.removeForms();
        KR.setFormConfig({ formToken: "{$lyra_rest_identifier_token|escape:'html':'UTF-8'}", language: LYRA_LANGUAGE });
      });
    </script>

    {if $lyra_is_valid_std_identifier}
      {include file="./payment_std_oneclick.tpl"}
      <input id="lyra_payment_by_identifier" type="hidden" name="lyra_payment_by_identifier" value="1" />
    {/if}

    {if $lyra_std_card_data_mode == '6'}
        {if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
            <input id="lyra_standard_link" value="{l s='Pay' mod='lyra'}" class="button" />
        {else}
            <button id="lyra_standard_link" class="button btn btn-default standard-checkout button-medium">
              <span>{l s='Pay' mod='lyra'}</span>
            </button>
        {/if}
        <script type="text/javascript">
            $('#lyra_standard_link').click(function() {
                KR.openPopin();
            });
        </script>
    {/if}
  </a>
</div>

{if version_compare($smarty.const._PS_VERSION_, '1.6', '>=')}
  </div></div>
{/if}