/**
 * NOTICE OF LICENSE
 *
 * This file is licenced under the Software License Agreement.
 * With the purchase or the installation of the software in your application
 * you accept the licence agreement.
 *
 * @author    Presta.Site
 * @copyright 2019 Presta.Site
 * @license   LICENSE.txt
 */
$(function () {
    pspc_updateDisplayCustomThemeOptions();
    pspc_updateDisplayListPositionOptions();
    pspc_afterEndChange();

    // Update options display
    $('[name=THEME]').on('change', function(){
        pspc_updateDisplayCustomThemeOptions();
    });

    // Update options display
    $('[name=HIDE_AFTER_END]').on('change', function () {
        pspc_afterEndChange();
    });

    // Update product list position options display
    $('#PRODUCT_LIST_POSITION').on('change', function () {
        pspc_updateDisplayListPositionOptions();
    });

    // "More options" btn
    $('.pspc-more-options').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var text = $(this).data('text');
        var alt_text = $(this).data('alt-text');
        var group = $(this).data('group');

        if (!$(this).hasClass('active')) {
            $(this).addClass('active');
            $(this).removeClass('btn-primary');
            $('.' + group).fadeIn(100);
            $(this).text(alt_text);

            pspc_updateDisplayCustomThemeOptions();
            pspc_afterEndChange();
        } else {
            $(this).removeClass('active');
            $(this).addClass('btn-primary');
            $('.' + group).fadeOut(100);
            $(this).text(text);
        }
    });

    // Toggle countdown additional options
    $(document).on('click', '.pspc-toggle-options', function (e) {
        e.stopPropagation();
        e.preventDefault();

        var $parent = $(this).parents('.countdown-form');

        if ($(this).hasClass('expanded')) {
            $parent.find('.pspc-options-row').fadeOut(300);
        } else {
            $parent.find('.pspc-options-row').fadeIn(300);
        }

        $(this).find('.pspc-toggle-sign').toggle();
        $(this).toggleClass('expanded');
    });

    // Slider inputs for font-size
    $(".pspc-fz-slider").slider({
        step: 0.01,
        min: 0,
        max: 2,
        slide: function(event, ui) {
            var $parent = $(this).parents('.form-group:first');
            $parent.find('.pspc-fz-input').val(ui.value);
            var val = parseInt(parseFloat(ui.value) * 100);
            $parent.find('.pspc-br-text').text(val + '%');
        },
        create: function() {
            var val = $(this).parents('.form-group:first').find('.pspc-fz-input').val();
            $(this).slider("value", val);
        }
    });

    if (pspc_psv === 1.5) {
        $(document).on('mouseenter', '.label-tooltip', function () {
            var title = $(this).attr('title');
            $(this).data('title', title);
            $(this).append('<div class="tooltiptext">' + title + '</div>');
        });
        $(document).on('mouseleave', '.label-tooltip', function () {
            $(this).find('.tooltiptext').remove();
            var title = $(this).data('title');
            $(this).attr('title', title);
        });
    }
});

function pspc_updateDisplayCustomThemeOptions() {
    var $theme_radio = $('[name=THEME]:checked');
    var theme_name = $theme_radio.data('theme');
    $('.pspc_color_wrp').addClass('hidden');
    $('.color-theme-' + theme_name).removeClass('hidden');

    // display the promo side option
    var themes = {
        '7-minimal': '.pspc_options_promo_side',
        '10-minimal-1': '.pspc_options_promo_side',
        '11-minimal-2': '.pspc_options_promo_side',
        '12-minimal-3': '.pspc_options_promo_side'
    };
    if (themes[theme_name]) {
        var options_selector = themes[theme_name];
        $(options_selector).show();
    } else {
        $('.pspc_options_promo_side').hide();
    }

    // if custom options block is visible
    if ($('.pspc_more_app_options').hasClass('active')) {
        themes = {
            '1-simple': '.pspc_options_highlight, .pspc_options_compact, .pspc_options_radius, .pspc_options_bg, .pspc_options_colon',
            '2-dark': '.pspc_options_highlight, .pspc_options_compact, .pspc_options_radius, .pspc_options_bg',
        };

        options_selector = themes[theme_name];
        $('.pspc_custom_option').hide();
        $(options_selector).show();
    }
}

// indexOf for IE8 and below
if(!Array.prototype.indexOf) {
    Array.prototype.indexOf = function(what, i) {
        i = i || 0;
        var L = this.length;
        while (i < L) {
            if(this[i] === what) return i;
            ++i;
        }
        return -1;
    };
}

function pspc_afterEndChange()
{
    if (pspc_psv >= 1.6) {
        if ($('#HIDE_AFTER_END_on').prop('checked')) {
            $('#HIDE_EXPIRED_on').prop('checked', true);
            $('#HIDE_EXPIRED_on').prop('disabled', true);
            $('#HIDE_EXPIRED_off').prop('disabled', true);
        }
        else {
            $('#HIDE_EXPIRED_on').prop('disabled', false);
            $('#HIDE_EXPIRED_off').prop('disabled', false);
        }
    } else {
        if ($('#hide_after_end_on').prop('checked')) {
            $('#hide_expired_on').prop('checked', true);
            $('#hide_expired_on').prop('disabled', true);
            $('#hide_expired_off').prop('disabled', true);
        }
        else {
            $('#hide_expired_on').prop('disabled', false);
            $('#hide_expired_off').prop('disabled', false);
        }
    }
}

function pspc_updateDisplayListPositionOptions() {
    var $pos_select = $('#PRODUCT_LIST_POSITION');
    var val = $pos_select.val();

    if (val === 'custom_over_img' || val === 'over_img') {
        $pos_select.parents('.pspc-list-position-group:first').find('.pspc-select-addon').fadeIn(150);
    } else {
        $pos_select.parents('.pspc-list-position-group:first').find('.pspc-select-addon').hide();
    }
}