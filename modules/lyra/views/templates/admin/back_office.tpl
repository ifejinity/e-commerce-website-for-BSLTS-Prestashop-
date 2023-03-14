{**
 * Copyright © Lyra Network.
 * This file is part of Lyra Collect plugin for PrestaShop. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   https://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 *}

<script type="text/javascript">
  $(function() {
    $('#accordion').accordion({
      active: false,
      collapsible: true,
      autoHeight: false,
      heightStyle: 'content',
      header: 'h4',
      animated: false
    });

    {if $lyra_plugin_features['support']}
      $('contact-support').on('sendmail', function(e){
        $.ajax({
          type: 'POST',
          url: "{$lyra_request_uri}",
          data: e.originalEvent.detail,
          success: function(res) {
            location.reload();
          },
          dataType: 'html'
        });
      });
    {/if}
  });
</script>

<script type="text/javascript">
  function lyraCardEntryChanged() {
    var cardDataMode = $('select#LYRA_STD_CARD_DATA_MODE option:selected').val();

    switch (cardDataMode) {
      case '4':
        if (! confirm('{l s='Warning, some payment means are not compatible with an integration by iframe. Please consult the documentation for more details.' mod='lyra'}')) {
          var oldCardDataMode = $('#LYRA_STD_CARD_DATA_MODE_OLD').val();
          $('select#LYRA_STD_CARD_DATA_MODE').val(oldCardDataMode).change()
        } else {
          $('#LYRA_REST_SETTINGS').hide();
          $('#LYRA_STD_CANCEL_IFRAME_MENU').show();
        }

        break;
      case '5':
      case '6':
        $('#LYRA_REST_SETTINGS').show();
        $('#LYRA_STD_CANCEL_IFRAME_MENU').hide();
        break;
      default:
        $('#LYRA_REST_SETTINGS').hide();
        $('#LYRA_STD_CANCEL_IFRAME_MENU').hide();
    }
  }
</script>

<form method="POST" action="{$lyra_request_uri|escape:'html':'UTF-8'}" class="defaultForm form-horizontal">
  <div style="width: 100%;">
    <fieldset>
      <legend>
        <img style="width: 20px; vertical-align: middle;" src="../modules/lyra/logo.png">Lyra Collect
      </legend>

      <div style="padding: 5px;">{l s='Developed by' mod='lyra'} <b><a href="https://www.lyra.com/" target="_blank">Lyra Network</a></b></div>
      <div style="padding: 5px;">{l s='Contact us' mod='lyra'} <span style="display: inline-table;"><b>{$lyra_formatted_support_email|unescape:'html':'UTF-8'}</b></span></div>
      <div style="padding: 5px;">{l s='Module version' mod='lyra'} <b>{if $smarty.const._PS_HOST_MODE_|defined}Cloud{/if}{$lyra_plugin_version|escape:'html':'UTF-8'}</b></div>
      <div style="padding: 5px;">{l s='Gateway version' mod='lyra'} <b>{$lyra_gateway_version|escape:'html':'UTF-8'}</b></div>

      {if !empty($lyra_doc_files)}
        <div style="padding: 5px;"><span style="color: red; font-weight: bold; text-transform: uppercase;">{l s='Click to view the module configuration documentation :' mod='lyra'}</span>
        {foreach from=$lyra_doc_files key="file" item="lang"}
          <a style="margin-left: 10px; font-weight: bold; text-transform: uppercase;" href="../modules/lyra/installation_doc/{$file|escape:'html':'UTF-8'}" target="_blank">{$lang|escape:'html':'UTF-8'}</a>
        {/foreach}
        </div>
      {/if}

      {if $lyra_plugin_features['support']}
        <div style="padding: 5px;"><contact-support
          shop-id="{$LYRA_SITE_ID|escape:'html':'UTF-8'}"
          context-mode="{$LYRA_MODE|escape:'html':'UTF-8'}"
          sign-algo="{$LYRA_SIGN_ALGO|escape:'html':'UTF-8'}"
          contrib="{$lyra_contrib|escape:'html':'UTF-8'}"
          integration-mode="{$lyra_card_data_entry_modes[$LYRA_STD_CARD_DATA_MODE]|escape:'html':'UTF-8'}"
          plugins="{$lyra_installed_modules|escape:'html':'UTF-8'}"
          title=""
          first-name="{$lyra_employee->firstname|escape:'html':'UTF-8'}"
          last-name="{$lyra_employee->lastname|escape:'html':'UTF-8'}"
          from-email="{$lyra_employee->email|escape:'html':'UTF-8'}"
          to-email="{$lyra_support_email|escape:'html':'UTF-8'}"
          cc-emails=""
          phone-number=""
          language="{$prestashop_lang.iso_code|escape:'html':'UTF-8'}">
        </contact-support></div>
      {/if}
    </fieldset>
  </div>

  <br /><br />

  <div id="accordion" style="width: 100%; float: none;">
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='GENERAL CONFIGURATION' mod='lyra'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='BASE SETTINGS' mod='lyra'}</legend>

        <label for="LYRA_ENABLE_LOGS">{l s='Logs' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_ENABLE_LOGS" name="LYRA_ENABLE_LOGS">
            {foreach from=$lyra_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_ENABLE_LOGS === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enable / disable module logs.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT GATEWAY ACCESS' mod='lyra'}</legend>

        <label for="LYRA_SITE_ID">{l s='Site ID' mod='lyra'}</label>
        <div class="margin-form">
          <input type="text" id="LYRA_SITE_ID" name="LYRA_SITE_ID" value="{$LYRA_SITE_ID|escape:'html':'UTF-8'}" autocomplete="off">
          <p>{l s='The identifier provided by your bank.' mod='lyra'}</p>
        </div>

        {if !$lyra_plugin_features['qualif']}
          <label for="LYRA_KEY_TEST">{l s='Key in test mode' mod='lyra'}</label>
          <div class="margin-form">
            <input type="text" id="LYRA_KEY_TEST" name="LYRA_KEY_TEST" value="{$LYRA_KEY_TEST|escape:'html':'UTF-8'}" autocomplete="off">
            <p>{l s='Key provided by your bank for test mode (available in your store Back Office).' mod='lyra'}</p>
          </div>
        {/if}

        <label for="LYRA_KEY_PROD">{l s='Key in production mode' mod='lyra'}</label>
        <div class="margin-form">
          <input type="text" id="LYRA_KEY_PROD" name="LYRA_KEY_PROD" value="{$LYRA_KEY_PROD|escape:'html':'UTF-8'}" autocomplete="off">
          <p>{l s='Key provided by your bank (available in your store Back Office after enabling production mode).' mod='lyra'}</p>
        </div>

        <label for="LYRA_MODE">{l s='Mode' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_MODE" name="LYRA_MODE" {if $lyra_plugin_features['qualif']} disabled="disabled"{/if}>
            {foreach from=$lyra_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_MODE === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='The context mode of this module.' mod='lyra'}</p>
        </div>

        <label for="LYRA_SIGN_ALGO">{l s='Signature algorithm' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_SIGN_ALGO" name="LYRA_SIGN_ALGO">
            <option value="SHA-1"{if $LYRA_SIGN_ALGO === 'SHA-1'} selected="selected"{/if}>SHA-1</option>
            <option value="SHA-256"{if $LYRA_SIGN_ALGO === 'SHA-256'} selected="selected"{/if}>HMAC-SHA-256</option>
          </select>
          <p>
            {l s='Algorithm used to compute the payment form signature. Selected algorithm must be the same as one configured in your store Back Office.' mod='lyra'}<br />
            {if !$lyra_plugin_features['shatwo']}
              <b>{l s='The HMAC-SHA-256 algorithm should not be activated if it is not yet available in your store Back Office, the feature will be available soon.' mod='lyra'}</b>
            {/if}
          </p>
        </div>

        <label>{l s='Instant Payment Notification URL' mod='lyra'}</label>
        <div class="margin-form">
          <span style="font-weight: bold;">{$LYRA_NOTIFY_URL|escape:'html':'UTF-8'}</span><br />
          <p>
            <img src="{$smarty.const._MODULE_DIR_|escape:'html':'UTF-8'}lyra/views/img/warn.png">
            <span style="color: red; display: inline-block;">
              {l s='URL to copy into your bank Back Office > Settings > Notification rules.' mod='lyra'}<br />
              {l s='In multistore mode, notification URL is the same for all the stores.' mod='lyra'}
            </span>
          </p>
        </div>

        <label for="LYRA_PLATFORM_URL">{l s='Payment page URL' mod='lyra'}</label>
        <div class="margin-form">
          <input type="text" id="LYRA_PLATFORM_URL" name="LYRA_PLATFORM_URL" value="{$LYRA_PLATFORM_URL|escape:'html':'UTF-8'}" style="width: 470px;">
          <p>{l s='Link to the payment page.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend onclick="javascript: lyraAdditionalOptionsToggle(this);" style="cursor: pointer;">
          <span class="ui-icon ui-icon-triangle-1-e" style="display: inline-block; vertical-align: middle;"></span>
          {l s='REST API KEYS' mod='lyra'}
        </legend>

        <p style="font-size: .85em; color: #7F7F7F;">
         {l s='REST API keys are available in your store Back Office (menu: Settings > Shops > REST API keys).' mod='lyra'}
        </p>

        <section style="display: none; padding-top: 15px;">
          <p style="font-size: .85em; color: #7F7F7F;">
           {l s='Configure this section if you are using order operations from Prestashop Back Office or if you are using embedded payment fields or popin modes.' mod='lyra'}
          </p>
          <label for="LYRA_PRIVKEY_TEST">{l s='Test password' mod='lyra'}</label>
          <div class="margin-form">
            <input type="password" id="LYRA_PRIVKEY_TEST" name="LYRA_PRIVKEY_TEST" value="{$LYRA_PRIVKEY_TEST|escape:'html':'UTF-8'}" style="width: 470px;" autocomplete="off" />
          </div>
          <p></p>

          <label for="LYRA_PRIVKEY_PROD">{l s='Production password' mod='lyra'}</label>
          <div style="border-bottom: 5px;" class="margin-form">
            <input type="password" id="LYRA_PRIVKEY_PROD" name="LYRA_PRIVKEY_PROD" value="{$LYRA_PRIVKEY_PROD|escape:'html':'UTF-8'}" style="width: 470px;" autocomplete="off">
          </div>
          <p></p>

          <label for="LYRA_REST_SERVER_URL">{l s='REST API server URL' mod='lyra'}</label>
          <div class="margin-form">
            <input type="text" id="LYRA_REST_SERVER_URL" name="LYRA_REST_SERVER_URL" value="{$LYRA_REST_SERVER_URL|escape:'html':'UTF-8'}" style="width: 470px;" autocomplete="off">
          </div>
          <p></p>

          <p style="font-size: .85em; color: #7F7F7F;">
           {l s='Configure this section only if you are using embedded payment fields or popin modes.' mod='lyra'}
          </p>
          <p></p>

          <label for="LYRA_PUBKEY_TEST">{l s='Public test key' mod='lyra'}</label>
          <div class="margin-form">
            <input type="text" id="LYRA_PUBKEY_TEST" name="LYRA_PUBKEY_TEST" value="{$LYRA_PUBKEY_TEST|escape:'html':'UTF-8'}" style="width: 470px;" autocomplete="off">
          </div>
          <p></p>

          <label for="LYRA_PUBKEY_PROD">{l s='Public production key' mod='lyra'}</label>
          <div class="margin-form">
            <input type="text" id="LYRA_PUBKEY_PROD" name="LYRA_PUBKEY_PROD" value="{$LYRA_PUBKEY_PROD|escape:'html':'UTF-8'}" style="width: 470px;" autocomplete="off">
          </div>
          <p></p>

          <label for="LYRA_RETKEY_TEST">{l s='HMAC-SHA-256 test key' mod='lyra'}</label>
          <div class="margin-form">
            <input type="password" id="LYRA_RETKEY_TEST" name="LYRA_RETKEY_TEST" value="{$LYRA_RETKEY_TEST|escape:'html':'UTF-8'}" style="width: 470px;" autocomplete="off">
          </div>
          <p></p>

          <label for="LYRA_RETKEY_PROD">{l s='HMAC-SHA-256 production key' mod='lyra'}</label>
          <div class="margin-form">
            <input type="password" id="LYRA_RETKEY_PROD" name="LYRA_RETKEY_PROD" value="{$LYRA_RETKEY_PROD|escape:'html':'UTF-8'}" style="width: 470px;" autocomplete="off">
          </div>
          <p></p>

          <label>{l s='API REST Notification URL' mod='lyra'}</label>
          <div class="margin-form">
            {$LYRA_REST_NOTIFY_URL|escape:'html':'UTF-8'}<br />
            <p>
              <img src="{$smarty.const._MODULE_DIR_|escape:'html':'UTF-8'}lyra/views/img/warn.png">
              <span style="color: red; display: inline-block;">
                {l s='URL to copy into your bank Back Office > Settings > Notification rules.' mod='lyra'}<br />
                {l s='In multistore mode, notification URL is the same for all the stores.' mod='lyra'}
              </span>
            </p>
          </div>

          <label for="LYRA_REST_JS_CLIENT_URL">{l s='JavaScript client URL' mod='lyra'}</label>
          <div class="margin-form">
            <input type="text" id="LYRA_REST_JS_CLIENT_URL" name="LYRA_REST_JS_CLIENT_URL" value="{$LYRA_REST_JS_CLIENT_URL|escape:'html':'UTF-8'}" style="width: 470px;" autocomplete="off">
          </div>
        </section>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='lyra'}</legend>

        <label for="LYRA_DEFAULT_LANGUAGE">{l s='Default language' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_DEFAULT_LANGUAGE" name="LYRA_DEFAULT_LANGUAGE">
            {foreach from=$lyra_language_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_DEFAULT_LANGUAGE === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Default language on the payment page.' mod='lyra'}</p>
        </div>

        <label for="LYRA_AVAILABLE_LANGUAGES">{l s='Available languages' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_AVAILABLE_LANGUAGES" name="LYRA_AVAILABLE_LANGUAGES[]" multiple="multiple" size="8">
            {foreach from=$lyra_language_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_AVAILABLE_LANGUAGES)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Languages available on the payment page. If you do not select any, all the supported languages will be available.' mod='lyra'}</p>
        </div>

        <label for="LYRA_DELAY">{l s='Capture delay' mod='lyra'}</label>
        <div class="margin-form">
          <input type="text" id="LYRA_DELAY" name="LYRA_DELAY" value="{$LYRA_DELAY|escape:'html':'UTF-8'}">
          <p>{l s='The number of days before the bank capture (adjustable in your store Back Office).' mod='lyra'}</p>
        </div>

        <label for="LYRA_VALIDATION_MODE">{l s='Validation mode' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_VALIDATION_MODE" name="LYRA_VALIDATION_MODE">
            {foreach from=$lyra_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_VALIDATION_MODE === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE CUSTOMIZE' mod='lyra'}</legend>

        <label>{l s='Theme configuration' mod='lyra'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_THEME_CONFIG"
              input_value=$LYRA_THEME_CONFIG
              style="width: 470px;"
           }
          <p>{l s='The theme configuration to customize the payment page.' mod='lyra'}</p>
        </div>

        <label for="LYRA_SHOP_NAME">{l s='Shop name' mod='lyra'}</label>
        <div class="margin-form">
          <input type="text" id="LYRA_SHOP_NAME" name="LYRA_SHOP_NAME" value="{$LYRA_SHOP_NAME|escape:'html':'UTF-8'}">
          <p>{l s='Shop name to display on the payment page. Leave blank to use gateway configuration.' mod='lyra'}</p>
        </div>

        <label for="LYRA_SHOP_URL">{l s='Shop URL' mod='lyra'}</label>
        <div class="margin-form">
          <input type="text" id="LYRA_SHOP_URL" name="LYRA_SHOP_URL" value="{$LYRA_SHOP_URL|escape:'html':'UTF-8'}" style="width: 470px;">
          <p>{l s='Shop URL to display on the payment page. Leave blank to use gateway configuration.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='CUSTOM 3DS' mod='lyra'}</legend>

        <label for="LYRA_3DS_MIN_AMOUNT">{l s='Manage 3DS by customer group' mod='lyra'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="LYRA_3DS_MIN_AMOUNT"
            input_value=$LYRA_3DS_MIN_AMOUNT
            min_only=true
          }
          <p>{l s='Amount by customer group below which customer could be exempt from strong authentication. Needs subscription to « Selective 3DS1 » or « Frictionless 3DS2 » options. For more information, refer to the module documentation.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='RETURN TO SHOP' mod='lyra'}</legend>

        <label for="LYRA_REDIRECT_ENABLED">{l s='Automatic redirection' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_REDIRECT_ENABLED" name="LYRA_REDIRECT_ENABLED" onchange="javascript: lyraRedirectChanged();">
            {foreach from=$lyra_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_REDIRECT_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If enabled, the buyer is automatically redirected to your site at the end of the payment.' mod='lyra'}</p>
        </div>

        <section id="lyra_redirect_settings">
          <label for="LYRA_REDIRECT_SUCCESS_T">{l s='Redirection timeout on success' mod='lyra'}</label>
          <div class="margin-form">
            <input type="text" id="LYRA_REDIRECT_SUCCESS_T" name="LYRA_REDIRECT_SUCCESS_T" value="{$LYRA_REDIRECT_SUCCESS_T|escape:'html':'UTF-8'}">
            <p>{l s='Time in seconds (0-300) before the buyer is automatically redirected to your website after a successful payment.' mod='lyra'}</p>
          </div>

          <label>{l s='Redirection message on success' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_REDIRECT_SUCCESS_M"
              input_value=$LYRA_REDIRECT_SUCCESS_M
              style="width: 470px;"
            }
            <p>{l s='Message displayed on the payment page prior to redirection after a successful payment.' mod='lyra'}</p>
          </div>

          <label for="LYRA_REDIRECT_ERROR_T">{l s='Redirection timeout on failure' mod='lyra'}</label>
          <div class="margin-form">
            <input type="text" id="LYRA_REDIRECT_ERROR_T" name="LYRA_REDIRECT_ERROR_T" value="{$LYRA_REDIRECT_ERROR_T|escape:'html':'UTF-8'}">
            <p>{l s='Time in seconds (0-300) before the buyer is automatically redirected to your website after a declined payment.' mod='lyra'}</p>
          </div>

          <label>{l s='Redirection message on failure' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_REDIRECT_ERROR_M"
              input_value=$LYRA_REDIRECT_ERROR_M
              style="width: 470px;"
            }
            <p>{l s='Message displayed on the payment page prior to redirection after a declined payment.' mod='lyra'}</p>
          </div>
        </section>

        <script type="text/javascript">
          lyraRedirectChanged();
        </script>

        <label for="LYRA_RETURN_MODE">{l s='Return mode' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_RETURN_MODE" name="LYRA_RETURN_MODE">
            <option value="GET"{if $LYRA_RETURN_MODE === 'GET'} selected="selected"{/if}>GET</option>
            <option value="POST"{if $LYRA_RETURN_MODE === 'POST'} selected="selected"{/if}>POST</option>
          </select>
          <p>{l s='Method that will be used for transmitting the payment result from the payment page to your shop.' mod='lyra'}</p>
        </div>

        <label for="LYRA_FAILURE_MANAGEMENT">{l s='Payment failed management' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_FAILURE_MANAGEMENT" name="LYRA_FAILURE_MANAGEMENT">
            {foreach from=$lyra_failure_management_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_FAILURE_MANAGEMENT === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='How to manage the buyer return to shop when the payment is failed.' mod='lyra'}</p>
        </div>

        <label for="LYRA_CART_MANAGEMENT">{l s='Cart management' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_CART_MANAGEMENT" name="LYRA_CART_MANAGEMENT">
            {foreach from=$lyra_cart_management_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_CART_MANAGEMENT === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='We recommend to choose the option « Empty cart » in order to avoid amount inconsistencies. In case of return back from the browser button the cart will be emptied. However in case of cancelled or refused payment, the cart will be recovered. If you do not want to have this behavior but the default PrestaShop one which is to keep the cart, choose the second option.' mod='lyra'}</p>
        </div>

        <label for="LYRA_ENABLE_CUST_MSG">{l s='Customer service messages' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_ENABLE_CUST_MSG" name="LYRA_ENABLE_CUST_MSG">
            {foreach from=$lyra_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_ENABLE_CUST_MSG === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enable / disable the customer service messages generated at the end of the payment (concerns PrestaShop 1.7.1.2 and above).' mod='lyra'}</p>
         </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend onclick="javascript: lyraAdditionalOptionsToggle(this);" style="cursor: pointer;">
          <span class="ui-icon ui-icon-triangle-1-e" style="display: inline-block; vertical-align: middle;"></span>
          {l s='ADDITIONAL OPTIONS' mod='lyra'}
        </legend>
        <p style="font-size: .85em; color: #7F7F7F;">{l s='Configure this section if you use advanced risk assessment module or if you have a Oney 3x/4x contract.' mod='lyra'}</p>

        <section style="display: none; padding-top: 15px;">
          <label for="LYRA_SEND_CART_DETAIL">{l s='Send shopping cart details' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_SEND_CART_DETAIL" name="LYRA_SEND_CART_DETAIL">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SEND_CART_DETAIL === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='If you disable this option, the shopping cart details will not be sent to the gateway. Attention, in some cases, this option has to be enabled. For more information, refer to the module documentation.' mod='lyra'}</p>
          </div>

          <label for="LYRA_COMMON_CATEGORY">{l s='Category mapping' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_COMMON_CATEGORY" name="LYRA_COMMON_CATEGORY" style="width: 220px;" onchange="javascript: lyraCategoryTableVisibility();">
              <option value="CUSTOM_MAPPING"{if $LYRA_COMMON_CATEGORY === 'CUSTOM_MAPPING'} selected="selected"{/if}>{l s='(Use category mapping below)' mod='lyra'}</option>
              {foreach from=$lyra_category_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_COMMON_CATEGORY === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Use the same category for all products.' mod='lyra'}</p>

            <table cellpadding="10" cellspacing="0" class="table lyra_category_mapping" style="margin-top: 15px;{if $LYRA_COMMON_CATEGORY != 'CUSTOM_MAPPING'} display: none;{/if}">
            <thead>
              <tr>
                <th>{l s='Product category' mod='lyra'}</th>
                <th>{l s='Bank product category' mod='lyra'}</th>
              </tr>
            </thead>
            <tbody>
              {foreach from=$prestashop_categories item="category"}
                {if $category.id_parent === 0}
                  {continue}
                {/if}

                {assign var="category_id" value=$category.id_category}

                {if isset($LYRA_CATEGORY_MAPPING[$category_id])}
                  {assign var="exists" value=true}
                {else}
                  {assign var="exists" value=false}
                {/if}

                {if $exists}
                  {assign var="lyra_category" value=$LYRA_CATEGORY_MAPPING[$category_id]}
                {else}
                  {assign var="lyra_category" value="FOOD_AND_GROCERY"}
                {/if}

                <tr id="lyra_category_mapping_{$category_id|escape:'html':'UTF-8'}">
                  <td>{$category.name|escape:'html':'UTF-8'}{if $exists === false}<span style="color: red;">*</span>{/if}</td>
                  <td>
                    <select id="LYRA_CATEGORY_MAPPING_{$category_id|escape:'html':'UTF-8'}" name="LYRA_CATEGORY_MAPPING[{$category_id|escape:'html':'UTF-8'}]"
                        style="width: 220px;"{if $LYRA_COMMON_CATEGORY != 'CUSTOM_MAPPING'} disabled="disabled"{/if}>
                      {foreach from=$lyra_category_options key="key" item="option"}
                        <option value="{$key|escape:'html':'UTF-8'}"{if $lyra_category === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                    </select>
                  </td>
                </tr>
              {/foreach}
            </tbody>
            </table>
            <p class="lyra_category_mapping"{if $LYRA_COMMON_CATEGORY != 'CUSTOM_MAPPING'} style="display: none;"{/if}>{l s='Match each product category with a bank product category.' mod='lyra'} <b>{l s='Entries marked with * are newly added and must be configured.' mod='lyra'}</b></p>
          </div>

          <label for="LYRA_SEND_SHIP_DATA">{l s='Always send advanced shipping data' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_SEND_SHIP_DATA" name="LYRA_SEND_SHIP_DATA">
              {foreach from=$lyra_yes_no_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SEND_SHIP_DATA === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Select « Yes » to send advanced shipping data for all payments (carrier name, delivery type and delivery rapidity).' mod='lyra'}</p>
          </div>

          <label>{l s='Shipping options' mod='lyra'}</label>
          <div class="margin-form">
            <table class="table" cellpadding="10" cellspacing="0">
            <thead>
              <tr>
                <th>{l s='Method title' mod='lyra'}</th>
                <th>{l s='Type' mod='lyra'}</th>
                <th>{l s='Rapidity' mod='lyra'}</th>
                <th>{l s='Delay' mod='lyra'}</th>
                <th style="width: 270px;" colspan="3">{l s='Address' mod='lyra'}</th>
              </tr>
            </thead>
            <tbody>
              {foreach from=$prestashop_carriers item="carrier"}
                {assign var="carrier_id" value=$carrier.id_carrier}

                {if isset($LYRA_ONEY_SHIP_OPTIONS[$carrier_id])}
                  {assign var="exists" value=true}
                {else}
                  {assign var="exists" value=false}
                {/if}

                {if $exists}
                  {assign var="ship_option" value=$LYRA_ONEY_SHIP_OPTIONS[$carrier_id]}
                {/if}

                <tr>
                  <td>{$carrier.name|escape:'html':'UTF-8'}{if $exists === false}<span style="color: red;">*</span>{/if}</td>
                  <td>
                    <select id="LYRA_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_type" name="LYRA_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][type]" onchange="javascript: lyraDeliveryTypeChanged({$carrier_id|escape:'html':'UTF-8'});" style="width: 150px;">
                      {foreach from=$lyra_delivery_type_options key="key" item="option"}
                        <option value="{$key|escape:'html':'UTF-8'}"{if (isset($ship_option) && $ship_option.type === $key) || ('PACKAGE_DELIVERY_COMPANY' === $key)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                    </select>
                  </td>
                  <td>
                    <select id="LYRA_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_speed" name="LYRA_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][speed]" onchange="javascript: lyraDeliverySpeedChanged({$carrier_id|escape:'html':'UTF-8'});">
                      {foreach from=$lyra_delivery_speed_options key="key" item="option"}
                        <option value="{$key|escape:'html':'UTF-8'}"{if (isset($ship_option) && $ship_option.speed === $key) || ('STANDARD' === $key)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                    </select>
                  </td>
                  <td>
                    <select
                        id="LYRA_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_delay"
                        name="LYRA_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][delay]"
                        style="{if !isset($ship_option) || ($ship_option.speed != 'PRIORITY')} display: none;{/if}">
                      {foreach from=$lyra_delivery_delay_options key="key" item="option"}
                        <option value="{$key|escape:'html':'UTF-8'}"{if (isset($ship_option) && isset($ship_option.delay) && ($ship_option.delay === $key)) || 'INFERIOR_EQUALS' === $key} selected="selected"{/if}>{$option|escape:'quotes':'UTF-8'}</option>
                      {/foreach}
                    </select>
                  </td>
                  <td>
                    <input
                        id="LYRA_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_address"
                        name="LYRA_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][address]"
                        placeholder="{l s='Address' mod='lyra'}"
                        value="{if isset($ship_option)}{$ship_option.address|escape:'html':'UTF-8'}{/if}"
                        style="width: 160px;{if !isset($ship_option) || $ship_option.type != 'RECLAIM_IN_SHOP'} display: none;{/if}"
                        type="text">
                  </td>
                  <td>
                    <input
                        id="LYRA_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_zip"
                        name="LYRA_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][zip]"
                        placeholder="{l s='Zip code' mod='lyra'}"
                        value="{if isset($ship_option)}{$ship_option.zip|escape:'html':'UTF-8'}{/if}"
                        style="width: 50px;{if !isset($ship_option) || $ship_option.type != 'RECLAIM_IN_SHOP'} display: none;{/if}"
                        type="text">
                  </td>
                  <td>
                    <input
                        id="LYRA_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_city"
                        name="LYRA_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][city]"
                        placeholder="{l s='City' mod='lyra'}"
                        value="{if isset($ship_option)}{$ship_option.city|escape:'html':'UTF-8'}{/if}"
                        style="width: 160px;{if !isset($ship_option) || $ship_option.type != 'RECLAIM_IN_SHOP'} display: none;{/if}"
                        type="text">
                  </td>
                </tr>
              {/foreach}
            </tbody>
            </table>
            <p>
              {l s='Define the information about all shipping methods.' mod='lyra'}<br />
              <b>{l s='Type' mod='lyra'} : </b>{l s='The delivery type of shipping method.' mod='lyra'}<br />
              <b>{l s='Rapidity' mod='lyra'} : </b>{l s='Select the delivery rapidity.' mod='lyra'}<br />
              <b>{l s='Delay' mod='lyra'} : </b>{l s='Select the delivery delay if speed is « Priority ».' mod='lyra'}<br />
              <b>{l s='Address' mod='lyra'} : </b>{l s='Enter address if it is a reclaim in shop.' mod='lyra'}<br />
              <b>{l s='Entries marked with * are newly added and must be configured.' mod='lyra'}</b>
            </p>
          </div>
        </section>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>

    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='STANDARD PAYMENT' mod='lyra'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

       <label for="LYRA_STD_ENABLED">{l s='Activation' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_STD_ENABLED" name="LYRA_STD_ENABLED">
            {foreach from=$lyra_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_STD_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
        </div>

        <label>{l s='Payment method title' mod='lyra'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="LYRA_STD_TITLE"
            input_value=$LYRA_STD_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

        <label for="LYRA_STD_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_STD_COUNTRY" name="LYRA_STD_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_STD_COUNTRY')">
            {foreach from=$lyra_countries_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_STD_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
        </div>

        <div id="LYRA_STD_COUNTRY_MENU" {if $LYRA_STD_COUNTRY === '1'} style="display: none;"{/if}>
          <label for="LYRA_STD_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_STD_COUNTRY_LST" name="LYRA_STD_COUNTRY_LST[]" multiple="multiple" size="7">
              {foreach from=$lyra_countries_list['ps_countries'] key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_STD_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
          </div>
        </div>

        <label>{l s='Customer group amount restriction' mod='lyra'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="LYRA_STD_AMOUNTS"
            input_value=$LYRA_STD_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='lyra'}</legend>

        <label for="LYRA_STD_DELAY">{l s='Capture delay' mod='lyra'}</label>
        <div class="margin-form">
          <input id="LYRA_STD_DELAY" name="LYRA_STD_DELAY" value="{$LYRA_STD_DELAY|escape:'html':'UTF-8'}" type="text">
          <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='lyra'}</p>
        </div>

        <label for="LYRA_STD_VALIDATION">{l s='Validation mode' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_STD_VALIDATION" name="LYRA_STD_VALIDATION">
            <option value="-1"{if $LYRA_STD_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='lyra'}</option>
            {foreach from=$lyra_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_STD_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='lyra'}</p>
        </div>

        <label for="LYRA_STD_PAYMENT_CARDS">{l s='Card Types' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_STD_PAYMENT_CARDS" name="LYRA_STD_PAYMENT_CARDS[]" multiple="multiple" size="7">
            {foreach from=$lyra_payment_cards_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_STD_PAYMENT_CARDS)} selected="selected"{/if}>{if $key !== ""} {$key|escape:'html':'UTF-8'} - {/if}{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='The card type(s) that can be used for the payment. Select none to use gateway configuration.' mod='lyra'}</p>
        </div>

        </fieldset>
        <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='ADVANCED OPTIONS' mod='lyra'}</legend>

        <label for="LYRA_STD_CARD_DATA_MODE">{l s='Card data entry mode' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_STD_CARD_DATA_MODE" name="LYRA_STD_CARD_DATA_MODE" onchange="javascript: lyraCardEntryChanged();">
            {foreach from=$lyra_card_data_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_STD_CARD_DATA_MODE === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <input type="hidden" id="LYRA_STD_CARD_DATA_MODE_OLD" name="LYRA_STD_CARD_DATA_MODE_OLD" value="{$LYRA_STD_CARD_DATA_MODE|escape:'html':'UTF-8'}"/>
          <p>{l s='Select how the card data will be entered. Attention, to use bank data acquisition on the merchant site, you must ensure that you have subscribed to this option with your bank.' mod='lyra'}</p>
        </div>

        <div id="LYRA_STD_CANCEL_IFRAME_MENU" {if $LYRA_STD_CARD_DATA_MODE !== '4'} style="display: none;"{/if}>
          <label for="LYRA_STD_CANCEL_IFRAME">{l s='Cancel payment in iframe mode' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_STD_CANCEL_IFRAME" name="LYRA_STD_CANCEL_IFRAME">
              {foreach from=$lyra_yes_no_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_STD_CANCEL_IFRAME === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Select « Yes » if you want to propose payment cancellation in iframe mode.' mod='lyra'}</p>
          </div>
        </div>

        <div id="LYRA_REST_SETTINGS" {if $LYRA_STD_CARD_DATA_MODE != '5' && $LYRA_STD_CARD_DATA_MODE != '6'} style="display: none;"{/if}>
          <label for="LYRA_STD_REST_THEME">{l s='Theme' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_STD_REST_THEME" name="LYRA_STD_REST_THEME">
              {foreach from=$lyra_std_rest_theme_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_STD_REST_THEME === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Select a theme to use to display embedded payment fields. For more customization, you can edit module template manually.' mod='lyra'}</p>
          </div>
          <p></p>

          <label for="LYRA_STD_REST_PLACEHLDR">{l s='Custom fields placeholders' mod='lyra'}</label>
          <div class="margin-form">
            <table class="table" cellspacing="0" cellpadding="10">
              <tbody>
                <tr>
                  <td>{l s='Card number' mod='lyra'}</td>
                  <td>
                    {include file="./input_text_lang.tpl"
                      languages=$prestashop_languages
                      current_lang=$prestashop_lang
                      input_name="LYRA_STD_REST_PLACEHLDR[pan]"
                      field_id="LYRA_STD_REST_PLACEHLDR_pan"
                      input_value=$LYRA_STD_REST_PLACEHLDR.pan
                      style="width: 150px;"
                    }
                  </td>
                </tr>

                <tr>
                  <td>{l s='Expiry date' mod='lyra'}</td>
                  <td>
                    {include file="./input_text_lang.tpl"
                      languages=$prestashop_languages
                      current_lang=$prestashop_lang
                      input_name="LYRA_STD_REST_PLACEHLDR[expiry]"
                      field_id="LYRA_STD_REST_PLACEHLDR_expiry"
                      input_value=$LYRA_STD_REST_PLACEHLDR.expiry
                      style="width: 150px;"
                    }
                  </td>
                </tr>

                <tr>
                  <td>{l s='CVV' mod='lyra'}</td>
                  <td>
                    {include file="./input_text_lang.tpl"
                      languages=$prestashop_languages
                      current_lang=$prestashop_lang
                      input_name="LYRA_STD_REST_PLACEHLDR[cvv]"
                      field_id="LYRA_STD_REST_PLACEHLDR_cvv"
                      input_value=$LYRA_STD_REST_PLACEHLDR.cvv
                      style="width: 150px;"
                    }
                  </td>
                </tr>

              </tbody>
            </table>
            <p>{l s='Texts to use as placeholders for embedded payment fields.' mod='lyra'}</p>
          </div>
          <p></p>

          <label>{l s='Register card label' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_STD_REST_LBL_REGIST"
              input_value=$LYRA_STD_REST_LBL_REGIST
              style="width: 330px;"
            }
            <p>{l s='Label displayed to invite buyers to register their card data.' mod='lyra'}</p>
          </div>
          <p></p>

          <label for="LYRA_STD_REST_ATTEMPTS">{l s='Payment attempts number' mod='lyra'}</label>
          <div class="margin-form">
            <input type="text" id="LYRA_STD_REST_ATTEMPTS" name="LYRA_STD_REST_ATTEMPTS" value="{$LYRA_STD_REST_ATTEMPTS|escape:'html':'UTF-8'}" style="width: 150px;" />
            <p>{l s='Maximum number of payment retries after a failed payment (between 0 and 9). If blank, the gateway default value is 3.' mod='lyra'}</p>
          </div>
          <p></p>

        </div>

        <div id="LYRA_STD_1_CLICK_PAYMENT_MENU">
          <label for="LYRA_STD_1_CLICK_PAYMENT">{l s='Payment by token' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_STD_1_CLICK_PAYMENT" name="LYRA_STD_1_CLICK_PAYMENT">
              {foreach from=$lyra_yes_no_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_STD_1_CLICK_PAYMENT === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='This option allows to pay orders without re-entering bank data at each payment. The "payment by token" option should be enabled on your %s store to use this feature.' sprintf='Lyra Collect' mod='lyra'}</p>
          </div>

        </div>

      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>

    {if $lyra_plugin_features['multi']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='PAYMENT IN INSTALLMENTS' mod='lyra'}</a>
      </h4>
      <div>
        {if $lyra_plugin_features['restrictmulti']}
          <p style="background: none repeat scroll 0 0 #FFFFE0; border: 1px solid #E6DB55; font-size: 13px; margin: 0 0 20px; padding: 10px;">
            {l s='ATTENTION: The payment in installments feature activation is subject to the prior agreement of Société Générale.' mod='lyra'}<br />
            {l s='If you enable this feature while you have not the associated option, an error 10000 – INSTALLMENTS_NOT_ALLOWED or 07 - PAYMENT_CONFIG will occur and the buyer will not be able to pay.' mod='lyra'}
          </p>
        {/if}

        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_MULTI_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_MULTI_ENABLED" name="LYRA_MULTI_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_MULTI_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_MULTI_TITLE"
              input_value=$LYRA_MULTI_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          <label for="LYRA_MULTI_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_MULTI_COUNTRY" name="LYRA_MULTI_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_MULTI_COUNTRY')">
              {foreach from=$lyra_countries_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_MULTI_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
          </div>

          <div id="LYRA_MULTI_COUNTRY_MENU" {if $LYRA_MULTI_COUNTRY === '1'} style="display: none;"{/if}>
            <label for="LYRA_MULTI_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_MULTI_COUNTRY_LST" name="LYRA_MULTI_COUNTRY_LST[]" multiple="multiple" size="7">
                {foreach from=$lyra_countries_list['ps_countries'] key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_MULTI_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
            </div>
          </div>

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_MULTI_AMOUNTS"
              input_value=$LYRA_MULTI_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT PAGE' mod='lyra'}</legend>

          <label for="LYRA_MULTI_DELAY">{l s='Capture delay' mod='lyra'}</label>
          <div class="margin-form">
            <input id="LYRA_MULTI_DELAY" name="LYRA_MULTI_DELAY" value="{$LYRA_MULTI_DELAY|escape:'html':'UTF-8'}" type="text">
            <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='lyra'}</p>
          </div>

          <label for="LYRA_MULTI_VALIDATION">{l s='Validation mode' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_MULTI_VALIDATION" name="LYRA_MULTI_VALIDATION">
              <option value="-1"{if $LYRA_MULTI_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='lyra'}</option>
              {foreach from=$lyra_validation_mode_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_MULTI_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='lyra'}</p>
          </div>

          <label for="LYRA_MULTI_PAYMENT_CARDS">{l s='Card Types' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_MULTI_PAYMENT_CARDS" name="LYRA_MULTI_PAYMENT_CARDS[]" multiple="multiple" size="7">
              {foreach from=$lyra_multi_payment_cards_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_MULTI_PAYMENT_CARDS)} selected="selected"{/if}>{if $key !== ""} {$key|escape:'html':'UTF-8'} - {/if}{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='The card type(s) that can be used for the payment. Select none to use gateway configuration.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='ADVANCED OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_MULTI_CARD_MODE">{l s='Card type selection' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_MULTI_CARD_MODE" name="LYRA_MULTI_CARD_MODE">
              {foreach from=$lyra_card_selection_mode_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_MULTI_CARD_MODE === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Select where the card type will be selected by the buyer.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT OPTIONS' mod='lyra'}</legend>

          <label>{l s='Payment options' mod='lyra'}</label>
          <div class="margin-form">
            <script type="text/html" id="lyra_multi_row_option">
              {include file="./row_multi_option.tpl"
                languages=$prestashop_languages
                current_lang=$prestashop_lang
                key="LYRA_MULTI_KEY"
                option=$lyra_default_multi_option
              }
            </script>

            <button type="button" id="lyra_multi_options_btn"{if !empty($LYRA_MULTI_OPTIONS)} style="display: none;"{/if} onclick="javascript: lyraAddMultiOption(true, '{l s='Delete' mod='lyra'}');">{l s='Add' mod='lyra'}</button>

            <table id="lyra_multi_options_table"{if empty($LYRA_MULTI_OPTIONS)} style="display: none;"{/if} class="table" cellpadding="10" cellspacing="0">
              <thead>
                <tr>
                  <th style="font-size: 10px;">{l s='Label' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Min amount' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Max amount' mod='lyra'}</th>
                  {if in_array('CB', $lyra_multi_payment_cards_options)}
                    <th style="font-size: 10px;">{l s='Contract' mod='lyra'}</th>
                  {/if}
                  <th style="font-size: 10px;">{l s='Count' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Period' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='1st payment' mod='lyra'}</th>
                  <th style="font-size: 10px;"></th>
                </tr>
              </thead>

              <tbody>
                {foreach from=$LYRA_MULTI_OPTIONS key="key" item="option"}
                  {include file="./row_multi_option.tpl"
                    languages=$prestashop_languages
                    current_lang=$prestashop_lang
                    key=$key
                    option=$option
                  }
                {/foreach}

                <tr id="lyra_multi_option_add">
                  <td colspan="{if in_array('CB', $lyra_multi_payment_cards_options)}7{else}6{/if}"></td>
                  <td>
                    <button type="button" onclick="javascript: lyraAddMultiOption(false, '{l s='Delete' mod='lyra'}');">{l s='Add' mod='lyra'}</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <p>
              {l s='Click on « Add » button to configure one or more payment options.' mod='lyra'}<br />
              <b>{l s='Label' mod='lyra'} : </b>{l s='The option label to display on the frontend.' mod='lyra'}<br />
              <b>{l s='Min amount' mod='lyra'} : </b>{l s='Minimum amount to enable the payment option.' mod='lyra'}<br />
              <b>{l s='Max amount' mod='lyra'} : </b>{l s='Maximum amount to enable the payment option.' mod='lyra'}<br />
              {if in_array('CB', $lyra_multi_payment_cards_options)}
                <b>{l s='Contract' mod='lyra'} : </b>{l s='ID of the contract to use with the option (Leave blank preferably).' mod='lyra'}<br />
              {/if}
              <b>{l s='Count' mod='lyra'} : </b>{l s='Total number of payments.' mod='lyra'}<br />
              <b>{l s='Period' mod='lyra'} : </b>{l s='Delay (in days) between payments.' mod='lyra'}<br />
              <b>{l s='1st payment' mod='lyra'} : </b>{l s='Amount of first payment, in percentage of total amount. If empty, all payments will have the same amount.' mod='lyra'}<br />
              <b>{l s='Do not forget to click on « Save » button to save your modifications.' mod='lyra'}</b>
            </p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    {if $lyra_plugin_features['choozeo']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='CHOOZEO PAYMENT' mod='lyra'}</a>
      </h4>
      <div>
        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_CHOOZEO_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_CHOOZEO_ENABLED" name="LYRA_CHOOZEO_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_CHOOZEO_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_CHOOZEO_TITLE"
              input_value=$LYRA_CHOOZEO_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          {if isset ($lyra_countries_list['CHOOZEO'])}
            <label for="LYRA_CHOOZEO_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_CHOOZEO_COUNTRY" name="LYRA_CHOOZEO_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_CHOOZEO_COUNTRY')">
                {foreach from=$lyra_countries_options key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_CHOOZEO_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
              <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
            </div>

            <div id="LYRA_CHOOZEO_COUNTRY_MENU" {if $LYRA_CHOOZEO_COUNTRY === '1'} style="display: none;"{/if}>
              <label for="LYRA_CHOOZEO_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
              <div class="margin-form">
                <select id="LYRA_CHOOZEO_COUNTRY_LST" name="LYRA_CHOOZEO_COUNTRY_LST[]" multiple="multiple" size="7">
                  {if isset ($lyra_countries_list['CHOOZEO'])}
                      {foreach from=$lyra_countries_list['CHOOZEO'] key="key" item="option"}
                          <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_CHOOZEO_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                  {/if}
                </select>
              </div>
            </div>
          {else}
            <input type="hidden" name="LYRA_CHOOZEO_COUNTRY" value="1">
            <input type="hidden" name="LYRA_CHOOZEO_COUNTRY_LST[]" value ="">
            <p style="background: none repeat scroll 0 0 #FFFFE0; border: 1px solid #E6DB55; font-size: 13px; margin: 0 0 20px; padding: 10px;">
                {l s='Payment method unavailable for the list of countries defined on your PrestaShop store.' mod='lyra'}
            </p>
          {/if}

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_CHOOZEO_AMOUNTS"
              input_value=$LYRA_CHOOZEO_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT PAGE' mod='lyra'}</legend>

          <label for="LYRA_CHOOZEO_DELAY">{l s='Capture delay' mod='lyra'}</label>
          <div class="margin-form">
            <input id="LYRA_CHOOZEO_DELAY" name="LYRA_CHOOZEO_DELAY" value="{$LYRA_CHOOZEO_DELAY|escape:'html':'UTF-8'}" type="text">
            <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT OPTIONS' mod='lyra'}</legend>

          <label>{l s='Payment options' mod='lyra'}</label>
          <div class="margin-form">
            <table class="table" cellpadding="10" cellspacing="0">
              <thead>
                <tr>
                  <th>{l s='Activation' mod='lyra'}</th>
                  <th>{l s='Label' mod='lyra'}</th>
                  <th>{l s='Min amount' mod='lyra'}</th>
                  <th>{l s='Max amount' mod='lyra'}</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>
                    <input name="LYRA_CHOOZEO_OPTIONS[EPNF_3X][enabled]"
                      style="width: 100%;"
                      type="checkbox"
                      value="True"
                      {if !isset($LYRA_CHOOZEO_OPTIONS.EPNF_3X.enabled) || ($LYRA_CHOOZEO_OPTIONS.EPNF_3X.enabled ==='True')}checked{/if}>
                  </td>
                  <td>Choozeo 3X CB</td>
                  <td>
                    <input name="LYRA_CHOOZEO_OPTIONS[EPNF_3X][min_amount]"
                      value="{if isset($LYRA_CHOOZEO_OPTIONS['EPNF_3X'])}{$LYRA_CHOOZEO_OPTIONS['EPNF_3X']['min_amount']|escape:'html':'UTF-8'}{/if}"
                      style="width: 200px;"
                      type="text">
                  </td>
                  <td>
                    <input name="LYRA_CHOOZEO_OPTIONS[EPNF_3X][max_amount]"
                      value="{if isset($LYRA_CHOOZEO_OPTIONS['EPNF_3X'])}{$LYRA_CHOOZEO_OPTIONS['EPNF_3X']['max_amount']|escape:'html':'UTF-8'}{/if}"
                      style="width: 200px;"
                      type="text">
                  </td>
                </tr>

                <tr>
                  <td>
                    <input name="LYRA_CHOOZEO_OPTIONS[EPNF_4X][enabled]"
                      style="width: 100%;"
                      type="checkbox"
                      value="True"
                      {if !isset($LYRA_CHOOZEO_OPTIONS.EPNF_4X.enabled) || ($LYRA_CHOOZEO_OPTIONS.EPNF_4X.enabled ==='True')}checked{/if}>
                  </td>
                  <td>Choozeo 4X CB</td>
                  <td>
                    <input name="LYRA_CHOOZEO_OPTIONS[EPNF_4X][min_amount]"
                      value="{if isset($LYRA_CHOOZEO_OPTIONS['EPNF_4X'])}{$LYRA_CHOOZEO_OPTIONS['EPNF_4X']['min_amount']|escape:'html':'UTF-8'}{/if}"
                      style="width: 200px;"
                      type="text">
                  </td>
                  <td>
                    <input name="LYRA_CHOOZEO_OPTIONS[EPNF_4X][max_amount]"
                      value="{if isset($LYRA_CHOOZEO_OPTIONS['EPNF_4X'])}{$LYRA_CHOOZEO_OPTIONS['EPNF_4X']['max_amount']|escape:'html':'UTF-8'}{/if}"
                      style="width: 200px;"
                      type="text">
                  </td>
                </tr>
              </tbody>
            </table>
            <p>{l s='Define amount restriction for each card.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    {if $lyra_plugin_features['oney']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='PAYMENT IN 3 OR 4 TIMES ONEY' mod='lyra'}</a>
      </h4>
      <div>
        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_ONEY34_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_ONEY34_ENABLED" name="LYRA_ONEY34_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_ONEY34_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_ONEY34_TITLE"
              input_value=$LYRA_ONEY34_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          {if isset ($lyra_countries_list['ONEY34'])}
            <label for="LYRA_ONEY34_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_ONEY34_COUNTRY" name="LYRA_ONEY34_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_ONEY34_COUNTRY')">
                {foreach from=$lyra_countries_options key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_ONEY34_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
              <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
            </div>

            <div id="LYRA_ONEY34_COUNTRY_MENU" {if $LYRA_ONEY34_COUNTRY === '1'} style="display: none;"{/if}>
              <label for="LYRA_ONEY34_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
              <div class="margin-form">
                <select id="LYRA_ONEY34_COUNTRY_LST" name="LYRA_ONEY34_COUNTRY_LST[]" multiple="multiple" size="7">
                  {if isset ($lyra_countries_list['ONEY34'])}
                      {foreach from=$lyra_countries_list['ONEY34'] key="key" item="option"}
                          <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_ONEY34_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                  {/if}
                </select>
              </div>
            </div>
          {else}
            <input type="hidden" name="LYRA_ONEY34_COUNTRY" value="1">
            <input type="hidden" name="LYRA_ONEY34_COUNTRY_LST[]" value ="">
            <p style="background: none repeat scroll 0 0 #FFFFE0; border: 1px solid #E6DB55; font-size: 13px; margin: 0 0 20px; padding: 10px;">
                {l s='Payment method unavailable for the list of countries defined on your PrestaShop store.' mod='lyra'}
            </p>
          {/if}

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_ONEY34_AMOUNTS"
              input_value=$LYRA_ONEY34_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT PAGE' mod='lyra'}</legend>

          <label for="LYRA_ONEY34_DELAY">{l s='Capture delay' mod='lyra'}</label>
          <div class="margin-form">
            <input id="LYRA_ONEY34_DELAY" name="LYRA_ONEY34_DELAY" value="{$LYRA_ONEY34_DELAY|escape:'html':'UTF-8'}" type="text">
            <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='lyra'}</p>
          </div>

          <label for="LYRA_ONEY34_VALIDATION">{l s='Validation mode' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_ONEY34_VALIDATION" name="LYRA_ONEY34_VALIDATION">
              <option value="-1"{if $LYRA_ONEY34_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='lyra'}</option>
              {foreach from=$lyra_validation_mode_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_ONEY34_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT OPTIONS' mod='lyra'}</legend>

          <label>{l s='Payment options' mod='lyra'}</label>
          <div class="margin-form">
            <script type="text/html" id="lyra_oney34_row_option">
              {include file="./row_oney_option.tpl"
                languages=$prestashop_languages
                current_lang=$prestashop_lang
                key="LYRA_ONEY34_KEY"
                option=$lyra_default_oney_option
                suffix='34'
              }
            </script>

            <button type="button" id="lyra_oney34_options_btn"{if !empty($LYRA_ONEY34_OPTIONS)} style="display: none;"{/if} onclick="javascript: lyraAddOneyOption(true, '34');">{l s='Add' mod='lyra'}</button>

            <table id="lyra_oney34_options_table"{if empty($LYRA_ONEY34_OPTIONS)} style="display: none;"{/if} class="table" cellpadding="10" cellspacing="0">
              <thead>
                <tr>
                  <th style="font-size: 10px;">{l s='Label' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Code' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Min amount' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Max amount' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Count' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Rate' mod='lyra'}</th>
                  <th style="font-size: 10px;"></th>
                </tr>
              </thead>

              <tbody>
                {foreach from=$LYRA_ONEY34_OPTIONS key="key" item="option"}
                  {include file="./row_oney_option.tpl"
                    languages=$prestashop_languages
                    current_lang=$prestashop_lang
                    key=$key
                    option=$option
                    suffix='34'
                  }
                {/foreach}

                <tr id="lyra_oney34_option_add">
                  <td colspan="6"></td>
                  <td>
                    <button type="button" onclick="javascript: lyraAddOneyOption(false, '34');">{l s='Add' mod='lyra'}</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <p>
              {l s='Click on « Add » button to configure one or more payment options.' mod='lyra'}<br />
              <b>{l s='Label' mod='lyra'} : </b>{l s='The option label to display on the frontend (the %c and %r patterns will be respectively replaced by payments count and option rate).' mod='lyra'}<br />
              <b>{l s='Code' mod='lyra'} : </b>{l s='The option code as defined in your Oney contract.' mod='lyra'}<br />
              <b>{l s='Min amount' mod='lyra'} : </b>{l s='Minimum amount to enable the payment option.' mod='lyra'}<br />
              <b>{l s='Max amount' mod='lyra'} : </b>{l s='Maximum amount to enable the payment option.' mod='lyra'}<br />
              <b>{l s='Count' mod='lyra'} : </b>{l s='Total number of payments.' mod='lyra'}<br />
              <b>{l s='Rate' mod='lyra'} : </b>{l s='The interest rate in percentage.' mod='lyra'}<br />
              <b>{l s='Do not forget to click on « Save » button to save your modifications.' mod='lyra'}</b>
            </p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    {if $lyra_plugin_features['franfinance']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='FRANFINANCE PAYMENT' mod='lyra'}</a>
      </h4>
      <div>
        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_FFIN_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_FFIN_ENABLED" name="LYRA_FFIN_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_FFIN_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_FFIN_TITLE"
              input_value=$LYRA_FFIN_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          {if isset ($lyra_countries_list['FFIN'])}
            <label for="LYRA_FFIN_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_FFIN_COUNTRY" name="LYRA_FFIN_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_FFIN_COUNTRY')">
                {foreach from=$lyra_countries_options key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_FFIN_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
              <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
            </div>

            <div id="LYRA_FFIN_COUNTRY_MENU" {if $LYRA_FFIN_COUNTRY === '1'} style="display: none;"{/if}>
              <label for="LYRA_FFIN_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
              <div class="margin-form">
                <select id="LYRA_FFIN_COUNTRY_LST" name="LYRA_FFIN_COUNTRY_LST[]" multiple="multiple" size="7">
                  {if isset ($lyra_countries_list['FFIN'])}
                      {foreach from=$lyra_countries_list['FFIN'] key="key" item="option"}
                          <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_FFIN_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                  {/if}
                </select>
              </div>
            </div>
          {else}
            <input type="hidden" name="LYRA_FFIN_COUNTRY" value="1">
            <input type="hidden" name="LYRA_FFIN_COUNTRY_LST[]" value ="">
            <p style="background: none repeat scroll 0 0 #FFFFE0; border: 1px solid #E6DB55; font-size: 13px; margin: 0 0 20px; padding: 10px;">
                {l s='Payment method unavailable for the list of countries defined on your PrestaShop store.' mod='lyra'}
            </p>
          {/if}

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_FFIN_AMOUNTS"
              input_value=$LYRA_FFIN_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT OPTIONS' mod='lyra'}</legend>

          <label>{l s='Payment options' mod='lyra'}</label>
          <div class="margin-form">
            <script type="text/html" id="lyra_ffin_row_option">
              {include file="./row_franfinance_option.tpl"
                languages=$prestashop_languages
                current_lang=$prestashop_lang
                key="LYRA_FFIN_KEY"
                option=$lyra_default_franfinance_option
              }
            </script>

            <button type="button" id="lyra_ffin_options_btn"{if !empty($LYRA_FFIN_OPTIONS)} style="display: none;"{/if} onclick="javascript: lyraAddFranfinanceOption(true, '{l s='Delete' mod='lyra'}');">{l s='Add' mod='lyra'}</button>

            <table id="lyra_ffin_options_table"{if empty($LYRA_FFIN_OPTIONS)} style="display: none;"{/if} class="table" cellpadding="10" cellspacing="0">
              <thead>
                <tr>
                  <th style="font-size: 10px;">{l s='Label' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Count' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Fees' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Min amount' mod='lyra'}</th>
                  <th style="font-size: 10px;">{l s='Max amount' mod='lyra'}</th>
                  <th style="font-size: 10px;"></th>
                </tr>
              </thead>

              <tbody>
                {foreach from=$LYRA_FFIN_OPTIONS key="key" item="option"}
                  {include file="./row_franfinance_option.tpl"
                    languages=$prestashop_languages
                    current_lang=$prestashop_lang
                    key=$key
                    option=$option
                  }
                {/foreach}

                <tr id="lyra_ffin_option_add">
                  <td colspan="7"></td>
                  <td>
                    <button type="button" onclick="javascript: lyraAddFranfinanceOption(false, '{l s='Delete' mod='lyra'}');">{l s='Add' mod='lyra'}</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <p>
              {l s='Click on « Add » button to configure one or more payment options.' mod='lyra'}<br />
              <b>{l s='Label' mod='lyra'} : </b>{l s='The option label to display on the frontend (the %c pattern will be replaced by payments count).' mod='lyra'}<br />
              <b>{l s='Count' mod='lyra'} : </b>{l s='Total number of payments.' mod='lyra'}<br />
              <b>{l s='Fees' mod='lyra'} : </b>{l s='Enable or disables fees application.' mod='lyra'}<br />
              <b>{l s='Min amount' mod='lyra'} : </b>{l s='Minimum amount to enable the payment option.' mod='lyra'}<br />
              <b>{l s='Max amount' mod='lyra'} : </b>{l s='Maximum amount to enable the payment option.' mod='lyra'}<br />
              <b>{l s='Do not forget to click on « Save » button to save your modifications.' mod='lyra'}</b>
            </p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    {if $lyra_plugin_features['fullcb']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='FULLCB PAYMENT' mod='lyra'}</a>
      </h4>
      <div>
        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_FULLCB_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_FULLCB_ENABLED" name="LYRA_FULLCB_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_FULLCB_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_FULLCB_TITLE"
              input_value=$LYRA_FULLCB_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          <div id="LYRA_FULLCB_COUNTRY_MENU">
            <input type="hidden" name="LYRA_FULLCB_COUNTRY" value="1">
            <input type="hidden" name="LYRA_FULLCB_COUNTRY_LST[]" value ="FR">
            <label for="LYRA_FULLCB_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
            <div class="margin-form">
              <span style="font-size: 13px; padding-top: 5px; vertical-align: middle;"><b>{$lyra_countries_list['FULLCB']['FR']|escape:'html':'UTF-8'}</b></span>
            </div>
          </div>

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_FULLCB_AMOUNTS"
              input_value=$LYRA_FULLCB_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_FULLCB_ENABLE_OPTS">{l s='Enable options selection' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_FULLCB_ENABLE_OPTS" name="LYRA_FULLCB_ENABLE_OPTS" onchange="javascript: lyraFullcbEnableOptionsChanged();">
              {foreach from=$lyra_yes_no_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_FULLCB_ENABLE_OPTS === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enable payment options selection on merchant site.' mod='lyra'}</p>
          </div>

          <section id="lyra_fullcb_options_settings">
            <label>{l s='Payment options' mod='lyra'}</label>
            <div class="margin-form">
              <table class="table" cellpadding="10" cellspacing="0">
                <thead>
                  <tr>
                    <th style="font-size: 10px;">{l s='Activation' mod='lyra'}</th>
                    <th style="font-size: 10px;">{l s='Label' mod='lyra'}</th>
                    <th style="font-size: 10px;">{l s='Min amount' mod='lyra'}</th>
                    <th style="font-size: 10px;">{l s='Max amount' mod='lyra'}</th>
                    <th style="font-size: 10px;">{l s='Rate' mod='lyra'}</th>
                    <th style="font-size: 10px;">{l s='Cap' mod='lyra'}</th>
                  </tr>
                </thead>

                <tbody>
                  {foreach from=$LYRA_FULLCB_OPTIONS key="key" item="option"}
                  <tr>
                    <td>
                      <input name="LYRA_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][enabled]"
                        style="width: 100%;"
                        type="checkbox"
                        value="True"
                        {if !isset($option.enabled) || ($option.enabled === 'True')}checked{/if}>
                    </td>
                    <td>
                      {include file="./input_text_lang.tpl"
                        languages=$prestashop_languages
                        current_lang=$prestashop_lang
                        input_name="LYRA_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][label]"
                        field_id="LYRA_FULLCB_OPTIONS_{$key|escape:'html':'UTF-8'}_label"
                        input_value=$option['label']
                        style="width: 140px;"
                      }
                      <input name="LYRA_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][count]" value="{$option['count']|escape:'html':'UTF-8'}" type="text" style="display: none; width: 0px;">
                    </td>
                    <td>
                      <input name="LYRA_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][min_amount]"
                        value="{if isset($option)}{$option['min_amount']|escape:'html':'UTF-8'}{/if}"
                        style="width: 75px;"
                        type="text">
                    </td>
                    <td>
                      <input name="LYRA_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][max_amount]"
                        value="{if isset($option)}{$option['max_amount']|escape:'html':'UTF-8'}{/if}"
                        style="width: 75px;"
                        type="text">
                    </td>
                    <td>
                      <input name="LYRA_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][rate]"
                        value="{if isset($option)}{$option['rate']|escape:'html':'UTF-8'}{/if}"
                        style="width: 70px;"
                        type="text">
                    </td>
                    <td>
                      <input name="LYRA_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][cap]"
                        value="{if isset($option)}{$option['cap']|escape:'html':'UTF-8'}{/if}"
                        style="width: 70px;"
                        type="text">
                    </td>
                  </tr>
                  {/foreach}
                </tbody>
              </table>
              <p>
                {l s='Configure FullCB payment options.' mod='lyra'}<br />
                <b>{l s='Activation' mod='lyra'} : </b>{l s='Enable / disable the payment option.' mod='lyra'}<br />
                <b>{l s='Min amount' mod='lyra'} : </b>{l s='Minimum amount to enable the payment option.' mod='lyra'}<br />
                <b>{l s='Max amount' mod='lyra'} : </b>{l s='Maximum amount to enable the payment option.' mod='lyra'}<br />
                <b>{l s='Rate' mod='lyra'} : </b>{l s='The interest rate in percentage.' mod='lyra'}<br />
                <b>{l s='Cap' mod='lyra'} : </b>{l s='Maximum fees amount of payment option.' mod='lyra'}<br />
                <b>{l s='Do not forget to click on « Save » button to save your modifications.' mod='lyra'}</b>
              </p>
            </div>
          </section>

          <script type="text/javascript">
            lyraFullcbEnableOptionsChanged();
          </script>
         </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    {if $lyra_plugin_features['ancv']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='ANCV PAYMENT' mod='lyra'}</a>
      </h4>
      <div>
        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_ANCV_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_ANCV_ENABLED" name="LYRA_ANCV_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_ANCV_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_ANCV_TITLE"
              input_value=$LYRA_ANCV_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          <label for="LYRA_ANCV_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_ANCV_COUNTRY" name="LYRA_ANCV_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_ANCV_COUNTRY')">
              {foreach from=$lyra_countries_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_ANCV_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
          </div>

          <div id="LYRA_ANCV_COUNTRY_MENU" {if $LYRA_ANCV_COUNTRY === '1'} style="display: none;"{/if}>
            <label for="LYRA_ANCV_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_ANCV_COUNTRY_LST" name="LYRA_ANCV_COUNTRY_LST[]" multiple="multiple" size="7">
                {foreach from=$lyra_countries_list['ps_countries'] key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_ANCV_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
            </div>
          </div>

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_ANCV_AMOUNTS"
              input_value=$LYRA_ANCV_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT PAGE' mod='lyra'}</legend>

          <label for="LYRA_ANCV_DELAY">{l s='Capture delay' mod='lyra'}</label>
          <div class="margin-form">
            <input id="LYRA_ANCV_DELAY" name="LYRA_ANCV_DELAY" value="{$LYRA_ANCV_DELAY|escape:'html':'UTF-8'}" type="text">
            <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='lyra'}</p>
          </div>

          <label for="LYRA_ANCV_VALIDATION">{l s='Validation mode' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_ANCV_VALIDATION" name="LYRA_ANCV_VALIDATION">
              <option value="-1"{if $LYRA_ANCV_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='lyra'}</option>
              {foreach from=$lyra_validation_mode_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_ANCV_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    {if $lyra_plugin_features['sepa']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='SEPA PAYMENT' mod='lyra'}</a>
      </h4>
      <div>
        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_SEPA_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_SEPA_ENABLED" name="LYRA_SEPA_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SEPA_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_SEPA_TITLE"
              input_value=$LYRA_SEPA_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          {if isset ($lyra_countries_list['SEPA'])}
            <label for="LYRA_SEPA_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_SEPA_COUNTRY" name="LYRA_SEPA_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_SEPA_COUNTRY')">
                {foreach from=$lyra_countries_options key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SEPA_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
              <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
            </div>

            <div id="LYRA_SEPA_COUNTRY_MENU" {if $LYRA_SEPA_COUNTRY === '1'} style="display: none;"{/if}>
              <label for="LYRA_SEPA_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
              <div class="margin-form">
                <select id="LYRA_SEPA_COUNTRY_LST" name="LYRA_SEPA_COUNTRY_LST[]" multiple="multiple" size="7">
                  {if isset ($lyra_countries_list['SEPA'])}
                      {foreach from=$lyra_countries_list['SEPA'] key="key" item="option"}
                          <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_SEPA_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                  {/if}
                </select>
              </div>
            </div>
          {else}
            <input type="hidden" name="LYRA_SEPA_COUNTRY" value="1">
            <input type="hidden" name="LYRA_SEPA_COUNTRY_LST[]" value ="">
            <p style="background: none repeat scroll 0 0 #FFFFE0; border: 1px solid #E6DB55; font-size: 13px; margin: 0 0 20px; padding: 10px;">
                {l s='Payment method unavailable for the list of countries defined on your PrestaShop store.' mod='lyra'}
            </p>
          {/if}

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_SEPA_AMOUNTS"
              input_value=$LYRA_SEPA_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
         </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT PAGE' mod='lyra'}</legend>

          <label for="LYRA_SEPA_DELAY">{l s='Capture delay' mod='lyra'}</label>
          <div class="margin-form">
            <input id="LYRA_SEPA_DELAY" name="LYRA_SEPA_DELAY" value="{$LYRA_SEPA_DELAY|escape:'html':'UTF-8'}" type="text">
            <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='lyra'}</p>
          </div>

          <label for="LYRA_SEPA_VALIDATION">{l s='Validation mode' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_SEPA_VALIDATION" name="LYRA_SEPA_VALIDATION">
              <option value="-1"{if $LYRA_SEPA_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='lyra'}</option>
              {foreach from=$lyra_validation_mode_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SEPA_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_SEPA_MANDATE_MODE">{l s='SEPA direct debit mode' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_SEPA_MANDATE_MODE" name="LYRA_SEPA_MANDATE_MODE" onchange="javascript: lyraSepa1clickPaymentMenuDisplay('LYRA_SEPA_MANDATE_MODE')">
              {foreach from=$lyra_sepa_mandate_mode_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SEPA_MANDATE_MODE === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Select SEPA direct debit mode. Attention, the two last choices require the payment by token option on %s.' sprintf='Lyra Collect' mod='lyra'}</p>
          </div>

          <div id="LYRA_SEPA_1_CLICK_PAYMNT_MENU"  {if $LYRA_SEPA_MANDATE_MODE !== 'REGISTER_PAY'} style="display: none;"{/if}>
            <label for="LYRA_SEPA_1_CLICK_PAYMNT">{l s='1-Click payment' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_SEPA_1_CLICK_PAYMNT" name="LYRA_SEPA_1_CLICK_PAYMNT">
                {foreach from=$lyra_yes_no_options key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SEPA_1_CLICK_PAYMNT === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
              <p>{l s='This option allows to pay orders without re-entering bank data at each payment. The "payment by token" option should be enabled on your %s store to use this feature.' sprintf='Lyra Collect' mod='lyra'}</p>
            </div>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    {if $lyra_plugin_features['paypal']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='PAYPAL PAYMENT' mod='lyra'}</a>
      </h4>
      <div>
        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_PAYPAL_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_PAYPAL_ENABLED" name="LYRA_PAYPAL_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_PAYPAL_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_PAYPAL_TITLE"
              input_value=$LYRA_PAYPAL_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          <label for="LYRA_PAYPAL_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_PAYPAL_COUNTRY" name="LYRA_PAYPAL_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_PAYPAL_COUNTRY')">
              {foreach from=$lyra_countries_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_PAYPAL_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
          </div>

          <div id="LYRA_PAYPAL_COUNTRY_MENU" {if $LYRA_PAYPAL_COUNTRY === '1'} style="display: none;"{/if}>
            <label for="LYRA_PAYPAL_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_PAYPAL_COUNTRY_LST" name="LYRA_PAYPAL_COUNTRY_LST[]" multiple="multiple" size="7">
                {foreach from=$lyra_countries_list['ps_countries'] key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_PAYPAL_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
            </div>
          </div>

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_PAYPAL_AMOUNTS"
              input_value=$LYRA_PAYPAL_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='PAYMENT PAGE' mod='lyra'}</legend>

          <label for="LYRA_PAYPAL_DELAY">{l s='Capture delay' mod='lyra'}</label>
          <div class="margin-form">
            <input id="LYRA_PAYPAL_DELAY" name="LYRA_PAYPAL_DELAY" value="{$LYRA_PAYPAL_DELAY|escape:'html':'UTF-8'}" type="text">
            <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='lyra'}</p>
          </div>

          <label for="LYRA_PAYPAL_VALIDATION">{l s='Validation mode' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_PAYPAL_VALIDATION" name="LYRA_PAYPAL_VALIDATION">
              <option value="-1"{if $LYRA_PAYPAL_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='lyra'}</option>
              {foreach from=$lyra_validation_mode_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_PAYPAL_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    {if $lyra_plugin_features['sofort']}
      <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
        <a href="#">{l s='SOFORT BANKING PAYMENT' mod='lyra'}</a>
      </h4>
      <div>
        <fieldset>
          <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

          <label for="LYRA_SOFORT_ENABLED">{l s='Activation' mod='lyra'}</label>
          <div class="margin-form">
            <select id="LYRA_SOFORT_ENABLED" name="LYRA_SOFORT_ENABLED">
              {foreach from=$lyra_enable_disable_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SOFORT_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
          </div>

          <label>{l s='Payment method title' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="LYRA_SOFORT_TITLE"
              input_value=$LYRA_SOFORT_TITLE
              style="width: 330px;"
            }
            <p>{l s='Method title to display on payment means page.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>

        <fieldset>
          <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

          {if isset ($lyra_countries_list['SOFORT'])}
            <label for="LYRA_SOFORT_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
            <div class="margin-form">
              <select id="LYRA_SOFORT_COUNTRY" name="LYRA_SOFORT_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_SOFORT_COUNTRY')">
                {foreach from=$lyra_countries_options key="key" item="option"}
                  <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_SOFORT_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                {/foreach}
              </select>
              <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
            </div>

            <div id="LYRA_SOFORT_COUNTRY_MENU" {if $LYRA_SOFORT_COUNTRY === '1'} style="display: none;"{/if}>
              <label for="LYRA_SOFORT_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
              <div class="margin-form">
                <select id="LYRA_SOFORT_COUNTRY_LST" name="LYRA_SOFORT_COUNTRY_LST[]" multiple="multiple" size="7">
                  {if isset ($lyra_countries_list['SOFORT'])}
                      {foreach from=$lyra_countries_list['SOFORT'] key="key" item="option"}
                          <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_SOFORT_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                  {/if}
                </select>
              </div>
            </div>
          {else}
            <input type="hidden" name="LYRA_SOFORT_COUNTRY" value="1">
            <input type="hidden" name="LYRA_SOFORT_COUNTRY_LST[]" value ="">
            <p style="background: none repeat scroll 0 0 #FFFFE0; border: 1px solid #E6DB55; font-size: 13px; margin: 0 0 20px; padding: 10px;">
                {l s='Payment method unavailable for the list of countries defined on your PrestaShop store.' mod='lyra'}
            </p>
          {/if}

          <label>{l s='Customer group amount restriction' mod='lyra'}</label>
          <div class="margin-form">
            {include file="./table_amount_group.tpl"
              groups=$prestashop_groups
              input_name="LYRA_SOFORT_AMOUNTS"
              input_value=$LYRA_SOFORT_AMOUNTS
            }
            <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
          </div>
        </fieldset>
        <div class="clear">&nbsp;</div>
      </div>
    {/if}

    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='OTHER PAYMENT MEANS' mod='lyra'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='lyra'}</legend>

        <label for="LYRA_OTHER_ENABLED">{l s='Activation' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_OTHER_ENABLED" name="LYRA_OTHER_ENABLED">
            {foreach from=$lyra_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_OTHER_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables this payment method.' mod='lyra'}</p>
        </div>

        <label>{l s='Payment method title' mod='lyra'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="LYRA_OTHER_TITLE"
            input_value=$LYRA_OTHER_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page. Used only if « Regroup payment means » option is enabled.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='RESTRICTIONS' mod='lyra'}</legend>

        <label for="LYRA_OTHER_COUNTRY">{l s='Restrict to some countries' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_OTHER_COUNTRY" name="LYRA_OTHER_COUNTRY" onchange="javascript: lyraCountriesRestrictMenuDisplay('LYRA_OTHER_COUNTRY')">
            {foreach from=$lyra_countries_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_OTHER_COUNTRY === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Buyer\'s billing countries in which this payment method is available.' mod='lyra'}</p>
        </div>

        <div id="LYRA_OTHER_COUNTRY_MENU" {if $LYRA_OTHER_COUNTRY === '1'} style="display: none;"{/if}>
        <label for="LYRA_OTHER_COUNTRY_LST">{l s='Authorized countries' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_OTHER_COUNTRY_LST" name="LYRA_OTHER_COUNTRY_LST[]" multiple="multiple" size="7">
            {foreach from=$lyra_countries_list['ps_countries'] key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $LYRA_OTHER_COUNTRY_LST)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
        </div>
        </div>

        <label>{l s='Customer group amount restriction' mod='lyra'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="LYRA_OTHER_AMOUNTS"
            input_value=$LYRA_OTHER_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='lyra'}</p>
        </div>
      </fieldset>
      <div class="clear lyra-grouped">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT OPTIONS' mod='lyra'}</legend>

        <label for="LYRA_OTHER_GROUPED_VIEW">{l s='Regroup payment means ' mod='lyra'}</label>
        <div class="margin-form">
          <select id="LYRA_OTHER_GROUPED_VIEW" name="LYRA_OTHER_GROUPED_VIEW" onchange="javascript: lyraGroupedViewChanged();">
            {foreach from=$lyra_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $LYRA_OTHER_GROUPED_VIEW === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If this option is enabled, all the payment means added in this section will be displayed within the same payment submodule.' mod='lyra'}</p>
        </div>

        <label>{l s='Payment means' mod='lyra'}</label>
        <div class="margin-form">
          {assign var=merged_array_cards value=$lyra_payment_cards_options}
          {assign var=VALID_LYRA_EXTRA_PAYMENT_MEANS value=[]}
          {foreach from=$LYRA_EXTRA_PAYMENT_MEANS key="key_card" item="option_card"}
              {if ! isset($merged_array_cards[$option_card.code])}
                  {append var='merged_array_cards' value=$option_card.title index=$option_card.code}
                  {$VALID_LYRA_EXTRA_PAYMENT_MEANS.$key_card = $option_card}
              {/if}
          {/foreach}

          <script type="text/html" id="lyra_other_payment_means_row_option">
            {include file="./row_other_payment_means_option.tpl"
              payment_means_cards=$merged_array_cards
              countries_list=$lyra_countries_list['ps_countries']
              validation_mode_options=$lyra_validation_mode_options
              enable_disable_options=$lyra_enable_disable_options
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              key="LYRA_OTHER_PAYMENT_SCRIPT_MEANS_KEY"
              option=$lyra_default_other_payment_means_option
            }
          </script>

          <button type="button" id="lyra_other_payment_means_options_btn"{if !empty($LYRA_OTHER_PAYMENT_MEANS)} style="display: none;"{/if} onclick="javascript: lyraAddOtherPaymentMeansOption(true, '{l s='Delete' mod='lyra'}');">{l s='Add' mod='lyra'}</button>

          <table id="lyra_other_payment_means_options_table"{if empty($LYRA_OTHER_PAYMENT_MEANS)} style="display: none;"{/if} class="table" cellpadding="10" cellspacing="0">
          <thead>
            <tr>
              <th style="font-size: 10px;">{l s='Label' mod='lyra'}</th>
              <th style="font-size: 10px;">{l s='Means of payment' mod='lyra'}</th>
              <th style="font-size: 10px;">{l s='Countries' mod='lyra'}</th>
              <th style="font-size: 10px;">{l s='Min amount' mod='lyra'}</th>
              <th style="font-size: 10px;">{l s='Max amount' mod='lyra'}</th>
              <th style="font-size: 10px;">{l s='Capture' mod='lyra'}</th>
              <th style="font-size: 10px;">{l s='Validation mode' mod='lyra'}</th>
              <th style="font-size: 10px;">{l s='Cart data' mod='lyra'}</th>
              <th style="font-size: 10px;"></th>
            </tr>
          </thead>

          <tbody>
            {foreach from=$LYRA_OTHER_PAYMENT_MEANS key="key" item="option"}
              {include file="./row_other_payment_means_option.tpl"
                payment_means_cards=$merged_array_cards
                countries_list=$lyra_countries_list['ps_countries']
                validation_mode_options=$lyra_validation_mode_options
                enable_disable_options=$lyra_enable_disable_options
                languages=$prestashop_languages
                current_lang=$prestashop_lang
                key=$key
                option=$option
              }
            {/foreach}

            <tr id="lyra_other_payment_means_option_add">
              <td colspan="8"></td>
              <td>
                <button type="button" onclick="javascript: lyraAddOtherPaymentMeansOption(false, '{l s='Delete' mod='lyra'}');">{l s='Add' mod='lyra'}</button>
              </td>
            </tr>
          </tbody>
          </table>

          {if empty($LYRA_OTHER_PAYMENT_MEANS)}
            <input type="hidden" id="LYRA_OTHER_PAYMENT_MEANS" name="LYRA_OTHER_PAYMENT_MEANS" value="">
          {/if}

          <p>
            {l s='Click on « Add » button to configure one or more payment means.' mod='lyra'}<br />
            <b>{l s='Label' mod='lyra'} : </b>{l s='The label of the means of payment to display on your site.' mod='lyra'}<br />
            <b>{l s='Means of payment' mod='lyra'} : </b>{l s='Choose the means of payment you want to propose.' mod='lyra'}<br />
            <b>{l s='Countries' mod='lyra'} : </b>{l s='Countries where the means of payment will be available. Keep blank to authorize all countries.' mod='lyra'}<br />
            <b>{l s='Min amount' mod='lyra'} : </b>{l s='Minimum amount to enable the means of payment.' mod='lyra'}<br />
            <b>{l s='Max amount' mod='lyra'} : </b>{l s='Maximum amount to enable the means of payment.' mod='lyra'}<br />
            <b>{l s='Capture' mod='lyra'} : </b>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='lyra'}<br />
            <b>{l s='Validation mode' mod='lyra'} : </b>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='lyra'}<br />
            <b>{l s='Cart data' mod='lyra'} : </b>{l s='If you disable this option, the shopping cart details will not be sent to the gateway. Attention, in some cases, this option has to be enabled. For more information, refer to the module documentation.' mod='lyra'}<br />
            <b>{l s='Do not forget to click on « Save » button to save your modifications.' mod='lyra'}</b>
          </p>
        </div>

        <label>{l s='Add payment means' mod='lyra'}</label>
        <div class="margin-form">
          <script type="text/html" id="lyra_add_payment_means_row_option">
            {include file="./row_extra_means_of_payment.tpl"
              key="LYRA_EXTRA_PAYMENT_MEANS_SCRIPT_KEY"
              option=$lyra_default_extra_payment_means_option
            }
          </script>

          <button type="button" id="lyra_extra_payment_means_options_btn"{if !empty($VALID_LYRA_EXTRA_PAYMENT_MEANS)} style="display: none;"{/if} onclick="javascript: lyraAddExtraPaymentMeansOption(true, '{l s='Delete' mod='lyra'}');">{l s='Add' mod='lyra'}</button>

          <table id="lyra_extra_payment_means_options_table"{if empty($VALID_LYRA_EXTRA_PAYMENT_MEANS)} style="display: none;"{/if} class="table" cellpadding="10" cellspacing="0">
          <thead>
            <tr>
              <th style="font-size: 10px;">{l s='Code' mod='lyra'}</th>
              <th style="font-size: 10px; width: 350px;">{l s='Label' mod='lyra'}</th>
              <th style="font-size: 10px;">{l s='Action' mod='lyra'}</th>
            </tr>
          </thead>

          <tbody>
            {foreach from=$VALID_LYRA_EXTRA_PAYMENT_MEANS key="key" item="option"}
                {include file="./row_extra_means_of_payment.tpl"
                    key=$key
                    option=$option
                }
            {/foreach}

            <tr id="lyra_extra_payment_means_option_add">
              <td colspan="2"></td>
              <td>
                <button type="button" onclick="javascript: lyraAddExtraPaymentMeansOption(false, '{l s='Delete' mod='lyra'}');">{l s='Add' mod='lyra'}</button>
              </td>
            </tr>
          </tbody>
          </table>

          {if empty($VALID_LYRA_EXTRA_PAYMENT_MEANS)}
            <input type="hidden" id="LYRA_EXTRA_PAYMENT_MEANS" name="LYRA_EXTRA_PAYMENT_MEANS" value="">
          {/if}

          <p>
            {l s='Click on « Add » button to add one or more new payment means.' mod='lyra'}<br />
            <b>{l s='Code' mod='lyra'} : </b>{l s='The code of the means of payment as expected by %s gateway.' sprintf='Lyra Collect' mod='lyra'}<br />
            <b>{l s='Label' mod='lyra'} : </b>{l s='The default label of the means of payment.' mod='lyra'}<br />
            <b>{l s='Do not forget to click on « Save » button to save your modifications.' mod='lyra'}</b>
          </p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>

   </div>

  {if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
    <div class="clear" style="width: 100%;">
      <input type="submit" class="button" name="lyra_submit_admin_form" value="{l s='Save' mod='lyra'}" style="float: right;">
    </div>
  {else}
    <div class="panel-footer" style="width: 100%;">
      <button type="submit" value="1" name="lyra_submit_admin_form" class="btn btn-default pull-right" style="float: right !important;">
        <i class="process-icon-save"></i>
        {l s='Save' mod='lyra'}
      </button>
    </div>
  {/if}
</form>

<br />
<br />