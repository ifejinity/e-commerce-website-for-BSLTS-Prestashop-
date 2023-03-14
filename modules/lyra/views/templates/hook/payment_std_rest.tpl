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

<section id="lyra_standard_rest_wrapper" style="margin-bottom: 2rem;">
  <div class="lyra kr-embedded"
      {if $lyra_std_card_data_mode == '6'} kr-popin {/if}
      kr-form-token="{$lyra_rest_identifier_token|escape:'html':'UTF-8'}"
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
     <button type="button" class="kr-payment-button" {if $lyra_std_card_data_mode != '6'}style="display: none;"{/if}></button>
     <div class="kr-field processing" style="display: none; border: none !important;">
       <div style="background-image: url('{$smarty.const._MODULE_DIR_|escape:'html':'UTF-8'}lyra/views/img/loading_big.gif');
                   margin: 0 auto; display: block; height: 35px; background-color: #ffffff; background-position: center;
                   background-repeat: no-repeat; background-size: 35px;">
       </div>
     </div>

     <div class="kr-form-error"></div>
  </div>
</section>

<script type="text/javascript">
  var lyraSubmit = function(e) {
    e.preventDefault();

    if (!$('#lyra_standard').data('submitted')) {
      var isPopin = document.getElementsByClassName('kr-popin-button');

      {if $lyra_is_valid_std_identifier}
        if (isPopin.length === 0) {
          $('#lyra_oneclick_payment_description').hide();
        }
      {/if}

      if (isPopin.length > 0) {
        KR.openPopin();
        $('#payment-confirmation button').removeAttr('disabled');
      } else {
        $('#lyra_standard').data('submitted', true);
        $('.lyra .processing').css('display', 'block');
        $('#payment-confirmation button').attr('disabled', 'disabled');
        KR.submit();
      }
    }

    return false;
  };
</script>