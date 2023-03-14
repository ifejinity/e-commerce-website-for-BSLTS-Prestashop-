{**
 * Copyright © Lyra Network.
 * This file is part of Lyra Collect plugin for PrestaShop. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   https://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 *}

<script>
    // Add refund checkboxes for PrestaShop < 1.7.7.
    $(function() {
        var lyraRefund = "{l s='Refund the buyer by Web Services with %s' sprintf='Lyra Collect' mod='lyra'}";

        // Create Lyra Collect partial refund checkbox.
        if ($('#doPartialRefundLyra').length === 0) {
            var newCheckbox = '<p class="checkbox lyra-partial-refund">\
                                   <label for="doPartialRefundLyra">\
                                       <input type="checkbox" id="doPartialRefundLyra" name="doPartialRefundLyra" value="1">' +
                                           lyraRefund + '\
                                   </label>\
                               </p>';

            $(newCheckbox).insertAfter($('#generateDiscountRefund').parent().parent());
        }

        // Create Lyra Collect standard refund checkbox.
        if ($('#doStandardRefundLyra').length === 0) {
            var newCheckbox = '<p class="checkbox lyra-standard-refund" style="display: none;">\
                                   <label for="doStandardRefundLyra">\
                                       <input type="checkbox" id="doStandardRefundLyra" name="doStandardRefundLyra" value="1">' +
                                           lyraRefund + '\
                                   </label>\
                                </p>';
            $(newCheckbox).insertAfter($('#generateDiscount').parent().parent());
        }
    });

    // Click on credit slip creation checkbox, standard payment.
    $(document).on('click', '#generateCreditSlip', function() {
        toggleStandardCheckboxDisplay();
    });

    // Click on voucher creation checkbox, standard payment.
    $(document).on('click', '#generateDiscount', function() {
        toggleStandardCheckboxDisplay();
    });

    // Click on voucher creation checkbox, partial payment.
    $(document).on('click', '#generateDiscountRefund', function() {
        if ($('#generateDiscountRefund').is(':checked')) {
            $('.lyra-partial-refund input').attr('disabled', 'disabled');
            $('.lyra-partial-refund').hide();
        } else {
            $('.lyra-partial-refund input').removeAttr('disabled');
            $('.lyra-partial-refund').show();
        }
    });

    // Do not allow refund if no credit slip is generated or if a voucher is generated.
    function toggleStandardCheckboxDisplay() {
        if ($('#generateCreditSlip').is(':checked')
            && ! $('#generateDiscount').is(':checked')) {
            $('#doStandardRefundLyra').removeAttr('disabled');
            $('.lyra-standard-refund').show();
        } else {
            $('#doStandardRefundLyra').attr('disabled', 'disabled');
            $('.lyra-standard-refund').hide();
        }
    }
</script>