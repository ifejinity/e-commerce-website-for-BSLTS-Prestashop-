{**
 * Copyright © Lyra Network.
 * This file is part of Lyra Collect plugin for PrestaShop. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   https://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 *}

<div style="padding-left: 40px;" id="lyra_sepa_oneclick_payment_description">
  <ul id="lyra_sepa_oneclick_payment_description_1">
    <li>
      <span class="lyra_span">{l s='You will pay with your registered means of payment' mod='lyra'}<b> {$lyra_sepa_saved_payment_mean|escape:'html':'UTF-8'}. </b>{l s='No data entry is needed.' mod='lyra'}</span>
    </li>

    <li style="margin: 8px 0px 8px;">
      <span class="lyra_span">{l s='OR' mod='lyra'}</span>
    </li>

    <li>
      <p class="lyra_link" onclick="lyraSepaOneclickPaymentSelect(0)">{l s='Click here to update the IBAN associated with the SEPA mandate.' mod='lyra'}</p>
    </li>
  </ul>
  <ul id="lyra_sepa_oneclick_payment_description_2" style="display: none;">
    <li>{l s='You will enter payment data after order confirmation.' mod='lyra'}</li>
    <li style="margin: 8px 0px 8px;">
      <span class="lyra_span">{l s='OR' mod='lyra'}</span>
    </li>
    <li>
      <p class="lyra_link" onclick="lyraSepaOneclickPaymentSelect(1)">{l s='Click here to pay with your registered means of payment.' mod='lyra'}</p>
    </li>
  </ul>

  <script type="text/javascript">
    function lyraSepaOneclickPaymentSelect(paymentByIdentifier) {
      if (paymentByIdentifier) {
        $('#lyra_sepa_oneclick_payment_description_1').show();
        $('#lyra_sepa_oneclick_payment_description_2').hide()
        $('#lyra_sepa_payment_by_identifier').val('1');
      } else {
        $('#lyra_sepa_oneclick_payment_description_1').hide();
        $('#lyra_sepa_oneclick_payment_description_2').show();
        $('#lyra_sepa_payment_by_identifier').val('0');
      }
    }
  </script>
</div>