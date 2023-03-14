{**
 * Copyright © Lyra Network.
 * This file is part of Lyra Collect plugin for PrestaShop. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   https://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 *}

<script>
    // Add refund checkboxes for PrestaShop >= 1.7.7.
    $(function() {
        var lyraRefund = "{l s='Refund the buyer by Web Services with %s' sprintf='Lyra Collect' mod='lyra'}";

        // Create Lyra Collect partial refund checkbox.
        if ($('#doPartialRefundLyra').length === 0) {
            var newCheckbox = '\
                    <div class="cancel-product-element lyra-refund lyra-partial-refund form-group" style="display: block;">\
                        <div class="checkbox">\
                            <div class="md-checkbox md-checkbox-inline">\
                                <label>\
                                    <input type="checkbox" id="doPartialRefundLyra" name="doPartialRefundLyra" material_design="material_design" value="1">\
                                      <i class="md-checkbox-control"></i>' +
                                        lyraRefund + '\
                                </label>\
                            </div>\
                        </div>\
                    </div>';

                $(newCheckbox).insertAfter('.refund-checkboxes-container .refund-voucher');
            }

            // Create Lyra Collect standard refund checkbox.
            if ($('#doStandardRefundLyra').length === 0) {
                var newCheckbox = '\
                    <div class="cancel-product-element lyra-refund lyra-standard-refund form-group" style="display: block;">\
                        <div class="checkbox">\
                            <div class="md-checkbox md-checkbox-inline">\
                                <label>\
                                    <input type="checkbox" id="doStandardRefundLyra" name="doStandardRefundLyra" material_design="material_design" value="1">\
                                      <i class="md-checkbox-control"></i>' +
                                        lyraRefund + '\
                                </label>\
                            </div>\
                        </div>\
                    </div>';

                $(newCheckbox).insertAfter('.refund-checkboxes-container .refund-voucher');
            }
        });

        $(document).on('click', '.partial-refund-display', function() {
            $('.lyra-standard-refund').hide();
        });

        $(document).on('click', '.standard-refund-display', function() {
            $('.lyra-partial-refund').hide();
        });

        // Click on credit slip creation checkbox.
        $(document).on('click', '#cancel_product_credit_slip', function() {
            toggleCheckboxDisplay();
        });

        // Click on voucher creation checkbox.
        $(document).on('click', '#cancel_product_voucher', function() {
            toggleCheckboxDisplay();
        });

        // Do not allow refund if no credit slip is generated or if a voucher is generated.
        function toggleCheckboxDisplay() {
            $('.lyra-refund input').attr('disabled', 'disabled');
            $('.lyra-refund').hide();

            if ($('#cancel_product_credit_slip').is(':checked')
                && ! $('#cancel_product_voucher').is(':checked')) {
                if ($('.shipping-refund').is(":visible") == true) {
                    $('#doStandardRefundLyra').removeAttr('disabled');
                    $('.lyra-standard-refund').show();
                } else {
                    $('#doPartialRefundLyra').removeAttr('disabled');
                    $('.lyra-partial-refund').show();
                }
            }
        }
</script>