{**
* Trustpilot Module
*
*  @author    Trustpilot
*  @copyright Trustpilot
*  @license   https://opensource.org/licenses/OSL-3.0
*}
{literal}<div tabindex="0" style="outline: none">
    <script type="text/javascript" data-keepinline="true">
        let trustpilot_integration_app_url = '{/literal}{$integration_app_url|escape:'hmtlall':'UTF-8'}{literal}';
        let user_id = '{/literal}{$user_id|escape:'htmall':'UTF-8'}{literal}';
        let trustpilot_ajax_url = urlWithoutProtocol();
        let context_scope = '{/literal}{$context_scope|escape:'htmall':'UTF-8'}{literal}';

        function urlWithoutProtocol() {
            let url = '{/literal}{$trustpilot_ajax_url|escape:'htmall':'UTF-8'}{literal}';
            url = url.replace(/(^\w+:|^)/, '');
            return url;
        }
    </script>
    <script type="text/javascript" src="{/literal}{$admin_js_dir|escape:'javascript':'UTF-8'}{literal}"></script>
    <script type="text/javascript" data-keepinline="true">
        function onTrustpilotIframeLoad() {
            if (typeof sendSettings === "function" && typeof sendPastOrdersInfo === "function") {
                sendSettings();
                sendPastOrdersInfo();
            } else {
                window.addEventListener('load', function () {
                    sendSettings();
                    sendPastOrdersInfo();
                });
            }
        }
    </script>
    <fieldset id="trustpilot_signup">
        <iframe
            src='{/literal}{$integration_app_url|escape:'htmall':'UTF-8'}{literal}'
            id='configuration_iframe'
            frameborder='0'
            scrolling='no'
            width='100%'
            height='1400px'
            data-source='Prestashop'
            data-plugin-version='{/literal}{$plugin_version|escape:'htmall':'UTF-8'}{literal}'
            data-version='{/literal}Prestashop-{$version|escape:'htmall':'UTF-8'}{literal}'
            data-page-urls='{/literal}{$page_urls|escape:'htmall':'UTF-8'}{literal}'
            data-custom-trustboxes='{/literal}{$custom_trustboxes|escape:'htmall':'UTF-8'}{literal}'
            data-transfer='{/literal}{$integration_app_url|escape:'htmall':'UTF-8'}{literal}'
            data-past-orders='{/literal}{$data_past_orders|escape:'htmall':'UTF-8'}{literal}'
            data-settings='{/literal}{$settings|escape:'htmall':'UTF-8'}{literal}'
            data-product-identification-options='{/literal}{$product_identification_options|escape:'htmall':'UTF-8'}{literal}'
            data-is-from-marketplace='{/literal}{$is_from_marketplace|escape:'htmall':'UTF-8'}{literal}'
            data-configuration-scope-tree='{/literal}{$configuration_scope_tree|escape:'htmall':'UTF-8'}{literal}'
            data-plugin-status='{/literal}{$plugin_status|escape:'htmall':'UTF-8'}{literal}'
            onload='onTrustpilotIframeLoad();'>
        </iframe>
        <div id='trustpilot-trustbox-preview'
            hidden='true'
            data-page-urls='{/literal}{$page_urls|escape:'htmall':'UTF-8'}{literal}'
            data-custom-trustboxes='{/literal}{$custom_trustboxes|escape:'htmall':'UTF-8'}{literal}'
            data-settings='{/literal}{$settings|escape:'htmall':'UTF-8'}{literal}'
            data-src='{/literal}{$starting_url|escape:'htmall':'UTF-8'}{literal}'
            data-source='Prestashop'
            data-sku='{/literal}{$sku|escape:'htmall':'UTF-8'}{literal}'
            data-name='{/literal}{$name|escape:'htmall':'UTF-8'}{literal}'>
        </div>
    </fieldset>
    <script src='{/literal}{$trustbox_preview_url|escape:'htmall':'UTF-8'}{literal}' id='TrustBoxPreviewComponent'></script>
</div>
{/literal}
