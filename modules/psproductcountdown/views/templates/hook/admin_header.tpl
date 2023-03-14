{**
* NOTICE OF LICENSE
*
* This file is licenced under the Software License Agreement.
* With the purchase or the installation of the software in your application
* you accept the licence agreement.
*
* @author    Presta.Site
* @copyright 2017 Presta.Site
* @license   LICENSE.txt
*}
<script type="text/javascript">
    var pspc_psv = {$psv|floatval};
    var pspc_ajax_url = "{$ajax_url|escape:'quotes':'UTF-8'}";
    var pspc_remove_confirm_txt = "{l s='Are you sure you want to delete this countdown?' mod='psproductcountdown'}";
    var pspc_basic_confirm_txt = "{l s='Are you sure?' mod='psproductcountdown'}";
    var pspc_flatpickr = false;

    $(document).on('focus', '.pspc-datepicker', function () {
        if (!$(this).hasClass('flatpickr-input')) {
            pspc_loadDatetimepicker();
        }
    });

    function pspc_loadDatetimepicker() {
        if (typeof pspc_flatpickr === 'object' && typeof pspc_flatpickr.destroy === 'function') {
            pspc_flatpickr.destroy();
        }

        {literal}
        pspc_flatpickr = flatpickr('.pspc-datepicker', {
            enableTime: true,
            time_24hr: true,
            dateFormat: 'Z',
            altInput: true,
            altFormat: 'Y-m-d H:i',
            disableMobile: true,
            locale: {
                weekdays: {
                    {/literal}shorthand: ['{l s='Su.' mod='psproductcountdown'}', '{l s='Mo.' mod='psproductcountdown'}', '{l s='Tu.' mod='psproductcountdown'}', '{l s='We.' mod='psproductcountdown'}', '{l s='Th.' mod='psproductcountdown'}', '{l s='Fr.' mod='psproductcountdown'}', '{l s='Sa.' mod='psproductcountdown'}'],
                    longhand: ['{l s='Sunday' mod='psproductcountdown'}', '{l s='Monday' mod='psproductcountdown'}', '{l s='Tuesday' mod='psproductcountdown'}', '{l s='Wednesday' mod='psproductcountdown'}', '{l s='Thursday' mod='psproductcountdown'}', '{l s='Friday' mod='psproductcountdown'}', '{l s='Saturday' mod='psproductcountdown'}']{literal}
                },
                months: {
                    {/literal}shorthand: ['{l s='Jan' mod='psproductcountdown'}', '{l s='Feb' mod='psproductcountdown'}', '{l s='Mar' mod='psproductcountdown'}', '{l s='Apr' mod='psproductcountdown'}', '{l s='May' mod='psproductcountdown'}', '{l s='Jun' mod='psproductcountdown'}', '{l s='Jul' mod='psproductcountdown'}', '{l s='Aug' mod='psproductcountdown'}', '{l s='Sep' mod='psproductcountdown'}', '{l s='Oct' mod='psproductcountdown'}', '{l s='Nov' mod='psproductcountdown'}', '{l s='Dec' mod='psproductcountdown'}'],
                    longhand: ['{l s='January' mod='psproductcountdown'}', '{l s='February' mod='psproductcountdown'}', '{l s='March' mod='psproductcountdown'}', '{l s='April' mod='psproductcountdown'}', '{l s='May' mod='psproductcountdown'}', '{l s='June' mod='psproductcountdown'}', '{l s='July' mod='psproductcountdown'}', '{l s='August' mod='psproductcountdown'}', '{l s='September' mod='psproductcountdown'}', '{l s='October' mod='psproductcountdown'}', '{l s='November' mod='psproductcountdown'}', '{l s='December' mod='psproductcountdown'}']{literal}
                },
                firstDayOfWeek: 1
            }
        });
        {/literal}
    }
</script>