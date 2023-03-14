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
    pspc_loadLocalTime();
    pspc_loadDatetimepicker();

    // open last opened tab
    var tab_id = localStorage.getItem('pspc_tab_id');
    if (tab_id) {
        var id = tab_id.replace('#psttab-', '');
        pst_openTab($('#psttn-' + id), tab_id);
    }

    // Tab switching
    $('.pst-tabs-list a').on('click', function(e) {
        e.preventDefault();

        var tab_id = $(this).attr('href');
        var hash = $(this).data('hash');

        pst_openTab($(this), tab_id);
    });

    $(document).on('click', '.add-pspc', function (e) {
        e.preventDefault();
        $(this).siblings('.countdown-form').slideToggle(150);
    });
    $(document).on('click', '.close-countdown-form', function (e) {
        e.preventDefault();

        var $edit_row = $(this).parents('.pspc_edit_row:first');
        // it's either edit form or new form
        if ($edit_row.length) {
            var $edit_row_content = $edit_row.find('.pspc_edit_row_content');
            $edit_row.fadeOut(150);
            $edit_row_content.html('');
        } else {
            var $new_row = $(this).parents('.add-countdown-wrp:first').find('.countdown-form');
            $new_row.fadeOut(150);
        }
    });

    // Add/edit countdown
    $(document).on('click', '.btn-pspc-submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $parent = $(this).parents('.countdown-form:first');
        $parent.find('.add-pspc-error').fadeOut(100).html('');
        $parent.find('.btn-pspc-submit').addClass('loading');
        $parent.find('.pspc_prod_selected option').prop('selected', true);
        $parent.find('.pspc-swap-right option').prop('selected', true);
        var data = $parent.find(':input').serialize();

        $.ajax({
            url: pspc_ajax_url,
            data: data,
            method: 'post',
            success: function (result) {
                if (result === '1') {
                    pspc_reloadCountdownList();
                    pspc_reloadBlocks();
                } else {
                    $parent.find('.add-pspc-error').fadeIn(100).html(result);
                }
            },
            complete: function () {
                $parent.find('.btn-pspc-submit').removeClass('loading');
            }
        });
    });

    // Delete countdown from the list
    var del_selector = '.pspc-countdown-list .delete';
    $(document).on('click', del_selector, function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        $.ajax({
            url: url,
            method: 'post',
            beforeSend: function () {
                $('#pspc-countdown-list').addClass('pspc-list-loading');
            },
            complete: function () {
                pspc_reloadCountdownList();
            }
        });
    });

    // Bulk delete timers
    $(document).on('submit', '.pspc-countdown-list form:first', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var action = $(this).attr('action');
        if (action.indexOf('submitBulkdeletepspc') !== -1) {
            var ids = [];
            $('[name="pspcfBox[]"]:checked').each(function () {
                ids.push($(this).val());
            });
            $.ajax({
                url: pspc_ajax_url,
                data: {ajax: true, action: 'bulkDeletePSPC', ids: ids},
                method: 'post',
                beforeSend: function () {
                    $('#pspc-countdown-list').addClass('pspc-list-loading');
                },
                success: function () {
                    pspc_reloadCountdownList();
                }
            });
        }
        // todo can't submit form, pagination doesn't work

        return false;
    });
    // ps1.5
    $(document).on('click', '.pspc15 [name=submitBulkdeletepspcf]', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var ids = [];
        $('[name="pspcfBox[]"]:checked').each(function () {
            ids.push($(this).val());
        });
        $.ajax({
            url: pspc_ajax_url,
            data: {ajax: true, action: 'bulkDeletePSPC', ids: ids},
            method: 'post',
            beforeSend: function () {
                $('#pspc-countdown-list').addClass('pspc-list-loading');
            },
            success: function () {
                pspc_reloadCountdownList();
            }
        });
        // todo can't submit form, pagination doesn't work

        return false;
    });

    // Toggle countdown status
    $(document).on('click', '.pspc_active_toggle', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var id_pspc = $(this).data('id-pspc');

        if (id_pspc) {
            $(this).parents('td:first').css('opacity', 0.4);
            $.ajax({
                url: pspc_ajax_url,
                data: {ajax: true, action: 'changeCountdownStatus', id_pspc: id_pspc},
                method: 'post',
                success: function () {
                    pspc_reloadCountdownList();
                }
            });
        }
    });

    // "edit" button in the list of timers
    $(document).on('click', '.pspc-countdown-list .edit, .pspc-countdown-list td.pointer', function (e) {
        e.preventDefault();

        if (!$(this).hasClass('pspc-td-items-toggle')) {
            var $edit_row = $(this).parents('tr:first').next('.pspc_edit_row');
            var $edit_row_content = $edit_row.find('.pspc_edit_row_content');
            var id_pspc = $edit_row.data('id-pspc');

            if (!$edit_row.is(':visible')) {
                $edit_row_content.html('<div class="pst_loader"></div>');
                $edit_row.fadeToggle(150);

                $.ajax({
                    url: pspc_ajax_url,
                    data: {ajax: true, action: 'getCountdownForm', id_pspc: id_pspc},
                    method: 'post',
                    success: function (html) {
                        $edit_row_content.html(html);
                        pspc_loadDatetimepicker();
                        pspc_initTypeWatch($edit_row.find('.pspc-product-search'));
                    }
                });
            } else {
                $edit_row.fadeOut(150);
                $edit_row_content.html('');
            }
        }
    });

    // Click on an item link should simply open the link
    $(document).on('click', '.pspc-item-link-wrp a', function (e) {
        e.stopPropagation();
    });

    // Toggle items list display
    $(document).on('click', '.pspc-items-toggle', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $(this).find('i').toggleClass('icon-caret-down icon-caret-up');
        $(this).parents('.pspc-td-items-toggle').find('.pspc-items-wrp').slideToggle(100);
    });

    // Toggle items list display
    $(document).on('click', '.pspc-td-items-toggle', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $(this).find('.pspc-items-toggle i').toggleClass('icon-caret-down icon-caret-up');
        $(this).find('.pspc-items-text-1').slideToggle(100);
        $(this).find('.pspc-items-wrp').slideToggle(100);
    });

    $(document).on('change', '.pspc-cg-all', function (e) {
        var $parent = $(this).parents('.pspc-options-row:first');
        if ($(this).is(':checked')) {
            $parent.find('.pspc-cg-wrp').slideUp(150);
        } else {
            $parent.find('.pspc-cg-wrp').slideDown(150);
        }
    });

    $('#pspc_show_pro').on('click', function (e) {
        $('#pspc_pro_features_content').slideDown();
        $(this).remove();

        e.preventDefault();
    });
});

function pspc_reloadCountdownList() {
    var $list_container = $('#pspc-countdown-list');
    $list_container.addClass('pspc-list-loading');

    $.ajax({
        url: pspc_ajax_url,
        data: {ajax: 1, action: 'renderCountdownList'},
        method: 'post',
        success: function (result) {
            $list_container.html(result);
            pspc_loadLocalTime();
            pspc_loadDatetimepicker();
            pspc_initTypeWatch();
       },
        complete: function () {
            $list_container.removeClass('pspc-list-loading');
        }
    });
}

function pst_openTab($elem, tab_id) {
    $('.pst-tabs-list a').removeClass('active');
    $elem.addClass('active');
    $('.pst-tab-content').hide();
    $(tab_id).fadeIn(200);

    localStorage.setItem('pspc_tab_id', tab_id);
}

function pspc_loadLocalTime() {
    $('.pspc-datetime-utc').each(function () {
        var text = $.trim($(this).text());
        if (text) {
            var date = moment.utc(text).format('YYYY-MM-DD HH:mm:ss');
            var stillUtc = moment.utc(date).toDate();
            var date_string = moment(stillUtc).local().format('YYYY-MM-DD HH:mm:ss');
            $(this).text(date_string);
            $(this).removeClass('pspc-datetime-utc');
        }
    });
}