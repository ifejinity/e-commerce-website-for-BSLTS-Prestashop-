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
    pspc_initTypeWatch();

    // select products/categories/manufacturers block on adding/modifying a countdown
    $(document).on('click', '.pspc-select-obj', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var type = $(this).data('type');
        var $parent = $(this).parents('.countdown-form:first');

        $(this).toggleClass('active');
        $parent.find('.pspc-select-obj').not(this).removeClass('active');

        $parent.find('.pspc-select-wrp-' + type).fadeToggle(150);
        $parent.find('.pspc-select-wrp').not('.pspc-select-wrp-' + type).hide();
    });

    // Add selected products
    $(document).on('click', '.pspc_multiple_select_add', function (e) {
        e.preventDefault();

        var $parent = $(this).parents('.pspc-prodselects-wrp:first');
        pspc_addCountdownProducts($parent);
    });
    $(document).on('dblclick', '.pspc_prod_select', 'option', function(){
        var $parent = $(this).parents('.pspc-prodselects-wrp:first');
        pspc_addCountdownProducts($parent);
    });

    // Remove selected products
    $(document).on('click', '.pspc_multiple_select_del', function (e) {
        e.preventDefault();

        var $parent = $(this).parents('.pspc-prodselects-wrp:first');
        pspc_removeCountdownProducts($parent);
    });
    $(document).on('dblclick', '.pspc_prod_selected', 'option', function(){
        var $parent = $(this).parents('.pspc-prodselects-wrp:first');
        pspc_removeCountdownProducts($parent);
    });

    // Show / hide category filter
    $(document).on('click', '.pspc-toggle-category-filter', function () {
        $(this).siblings('.pspc-category-wrp').slideToggle(200);
    });
    // Show / hide manufacturer filter
    $(document).on('click', '.pspc-toggle-manufacturer-filter', function () {
        $(this).siblings('.pspc-manufacturer-wrp').slideToggle(200);
    });

    // Category filter
    $(document).on('change', '.pspc-filter-wrp [name="itemsCategoryFilter"]', function () {
        var $parent = $(this).parents('.pspc-prodselects-wrp:first');
        $parent.find('.pspc-product-search:first').val('');

        pspc_searchProducts($parent, null);
    });

    // Manufacturer filter
    $(document).on('change', '.pspc-filter-wrp .pspc-manufacturer-select', function () {
        var $parent = $(this).parents('.pspc-prodselects-wrp:first');
        $parent.find('.pspc-product-search:first').val('');

        pspc_searchProducts($parent, null);
    });

    // Search combinations checkbox
    $(document).on('change', '.pspc-search-combinations', function () {
        var $parent = $(this).parents('.pspc-prodselects-wrp:first');
        var categories = pspc_getChosenCategories($parent);
        var id_manufacturer = $parent.find('.pspc-manufacturer-select').val();
        var query = $parent.find('.pspc-product-search:first').val();

        if (query || categories.length || id_manufacturer) {
            pspc_searchProducts($parent, query);
        }
    });

    // Select categories
    $(document).on('change', '.countdown-form [name="categories[]"]', function () {
        var $parent = $(this).parents('.countdown-form:first');
        var count = $('.countdown-form [name="categories[]"]:checked').length;
        $parent.find('.pspc-number-categories').text(count);
    });

    // Swap add
    $(document).on('click', '.pspc-add-swap', function (e) {
        e.preventDefault();

        var $parent = $(this).parents('.pspc-swap-wrp:first');
        pspc_swapAdd($parent);
    });
    $(document).on('dblclick', '.pspc-swap-left', 'option', function(){
        var $parent = $(this).parents('.pspc-swap-wrp:first');
        pspc_swapAdd($parent);
    });

    // Swap remove
    $(document).on('click', '.pspc-remove-swap', function (e) {
        e.preventDefault();

        var $parent = $(this).parents('.pspc-swap-wrp:first');
        pspc_swapRemove($parent);
    });
    $(document).on('dblclick', '.pspc-swap-right', 'option', function(){
        var $parent = $(this).parents('.pspc-swap-wrp:first');
        pspc_swapRemove($parent);
    });
});

function pspc_swapAdd($parent) {
    var $left = $parent.find('.pspc-swap-left');
    var $right = $parent.find('.pspc-swap-right');

    $left.find('option:selected').each(function () {
        $(this).detach().appendTo($right);
    });

    var count = $right.find('option').length;
    $parent.parents('.countdown-form:first').find('.pspc-number-manufacturers').text(count);
}
function pspc_swapRemove($parent) {
    var $left = $parent.find('.pspc-swap-left');
    var $right = $parent.find('.pspc-swap-right');

    $right.find('option:selected').each(function () {
        $(this).detach().appendTo($left);
    });

    var count = $right.find('option').length;
    $parent.parents('.countdown-form:first').find('.pspc-number-manufacturers').text(count);
}

function pspc_searchProducts($parent, query) {
    var categories = pspc_getChosenCategories($parent);
    var id_manufacturer = $parent.find('.pspc-manufacturer-select').val();
    var $select = $parent.find('.pspc_prod_select');
    var $input = $parent.find('.pspc-product-search:first');
    var search_combinations = +$parent.find('.pspc-search-combinations:first').is(':checked');
    query = (query ? query : '');

    if (categories.length) {
        $('.pspc-toggle-category-filter').addClass('chosen');
    } else {
        $('.pspc-toggle-category-filter').removeClass('chosen');
    }
    if (id_manufacturer) {
        $('.pspc-toggle-manufacturer-filter').addClass('chosen');
    } else {
        $('.pspc-toggle-manufacturer-filter').removeClass('chosen');
    }

    $.ajax(pspc_ajax_url, {
        data: {ajax: 1, action: 'getProducts', query: query, categories: categories, id_manufacturer: id_manufacturer, search_combinations: search_combinations},
        type: "POST",
        method: "POST",
        dataType: 'json',
        beforeSend: function () {
            $input.addClass('loading');
        },
        success: function (data) {
            var options_html = '';
            if (data) {
                var chosen_products = pspc_getChosenProducts($parent);
                $.each(data, function (index, value) {
                    var added = (chosen_products.indexOf(value.id_product) !== -1);
                    options_html += '<option ' + (added ? 'disabled' : '') + ' value="' + value.id_product + '">' + value.name + '</option>';
                });
                $select.html(options_html);
            }
        },
        complete: function () {
            $input.removeClass('loading');
        }
    });
}

function pspc_getChosenCategories($parent) {
    var categories = [];

    if (pspc_psv === 1.5) {
        $parent.find('[name="itemsCategoryFilter"] :selected').each(function () {
            categories.push($(this).val());
        });
    } else {
        $parent.find('[name="itemsCategoryFilter"]:checked').each(function () {
            categories.push($(this).val());
        });
    }

    return categories;
}

function pspc_addCountdownProducts($parent) {
    var $options = $parent.find('.pspc_prod_select option:selected');

    var html = '';
    $options.each(function () {
        var id = $(this).val();
        var name = $(this).text();
        html += '<option value="' + id + '">' + name + '</option>';
        $(this).prop('disabled', true);
    });

    var $select = $parent.find('.pspc_prod_selected');
    $select.append(html);
    pspc_sortTagProductsTable($select);

    var count = $select.find('option').length;
    $parent.parents('.countdown-form:first').find('.pspc-number-products').text(count);
}

function pspc_removeCountdownProducts($parent) {
    var $options = $parent.find('.pspc_prod_selected option:selected');

    $options.each(function () {
        var val = $(this).val();
        $(this).remove();
        $parent.find('.pspc_prod_select option[value="' + val + '"]').prop('disabled', false)
    });

    var $select = $parent.find('.pspc_prod_selected');
    var count = $select.find('option').length;
    $parent.parents('.countdown-form:first').find('.pspc-number-products').text(count);
}

function pspc_sortTagProductsTable($select) {
    var sorted = $select.find('option').sort(function(a, b) {
        return parseInt($(a).val()) - parseInt($(b).val());
    });
    $select.html(sorted);
}

function pspc_getChosenProducts($parent) {
    var products = [];

    $parent.find('[name="products[]"] option').each(function() {
        products.push(parseInt($(this).val()));
    });

    return products;
}

function pspc_initTypeWatch($elem) {
    if (!$elem) {
        $elem = $('.pspc-product-search');
    }
    // Product search
    $elem.typeWatch({
        captureLength: 0,
        highlight: false,
        wait: 100,
        callback: function(text){
            var $this = $($(this)[0].el);
            var $parent = $this.parents('.pspc-prodselects-wrp:first');

            pspc_searchProducts($parent, text);
        }
    });
}
