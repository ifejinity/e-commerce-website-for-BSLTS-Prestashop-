/**
 * NOTICE OF LICENSE
 *
 * This file is licenced under the Software License Agreement.
 * With the purchase or the installation of the software in your application
 * you accept the licence agreement.
 *
 * @author    Presta.Site
 * @copyright 2017 Presta.Site
 * @license   LICENSE.txt
 */
$(function(){
    pspc_loadDatetimepicker();
    if (typeof tabs_manager !== 'undefined') {
        tabs_manager.onLoad('ModulePsproductcountdown', function () {
            pspc_loadDatetimepicker();
        });
    }

    $(document).on('change', '#pspc_specific_price', function () {
        if ($(this).val()) {
            var from = $(this).find('option:selected').data('from');
            var to = $(this).find('option:selected').data('to');
            $('#pspc_from').val(from);
            $('#pspc_from').next('.pspc-datepicker').val(from);
            $('#pspc_to').val(to);
            $('#pspc_to').next('.pspc-datepicker').val(to);
        }
    });

    $(document).on('click', '#pspc-reset-countdown',function(){
        var id_countdown = $(this).data('id-countdown');

        $('#psproductcountdown').find('input[type=text], select').val('');

        $.ajax({
            url: pspc_ajax_url,
            data: {ajax: true, action: 'removeProductCountdown', id_countdown: id_countdown},
            method: 'post',
            success: function () {
                location.reload();
            }
        });
    })

    $(document).on('click', '#pspc_save_product_countdown', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $this = $(this);

        var data = {ajax: true, action: 'productUpdate'};
        $('#module_psproductcountdown').find(':input').each(function () {
            var name = $(this).attr('name');
            var value = $(this).val();
            if ($(this).attr('type') === 'radio' && !$(this).is(':checked')) {
                return;
            }
            if (name) {
                data[name] = value;
            }
        });

        // clear errors
        $('#pspc_error').html('').hide();
        $('#pspc_saved').hide();
        $this.prop('disabled', true);

        $.ajax({
            url: pspc_ajax_url,
            data: data,
            method: 'post',
            dataType: 'json',
            success: function (result) {
                $this.prop('disabled', false);

                if (result.success) {
                    // If success
                    $('#pspc_saved').fadeIn(200);
                    setTimeout(function () {
                        $('#pspc_saved').fadeOut(500);
                    }, 5000);
                    $('#id_pspc').val(result.id_pspc);
                } else {
                    // If error
                    $('#pspc_error').html(result.error).fadeIn(200);
                }
            }
        });
    });
});
