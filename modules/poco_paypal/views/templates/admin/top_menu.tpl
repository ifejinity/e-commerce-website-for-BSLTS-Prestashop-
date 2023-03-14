

<script type="text/javascript" src="{$path}views/js/globalBack.js"></script>
<script type="text/javascript" src="{$path}views/js/specificBack.js"></script>

<script type="text/javascript" src="{$base_uri}js/jquery/ui/jquery.ui.sortable.min.js"></script>
{if $ps_pp_version < 10704}
    <style type="text/css">
        #content.bootstrap {
            padding: 100px 0px 0;
        }
    </style>
{/if}
<div id="module_top">
    <div id="module_header">
        <div class="module_name_presto">
            {$module_name}
            <span class="module_version">{$mod_version}</span>
            {if $contactUsLinkPrestoChangeo != ''}
                <div class="module_upgrade {if $upgradeCheck}showBlock{else}hideBlock{/if}">
                    {l s='A new version is available.' mod='poco_paypal'}
                    <a href="{$contactUsLinkPrestoChangeo}#upgrade">{l s='Upgrade now' mod='poco_paypal'}</a>
                </div>
            {/if}
        </div>
        {if $contactUsLinkPrestoChangeo != ''}   
        <div class="request_upgrade">
            <a href="{$contactUsLinkPrestoChangeo}#upgrade">{l s='Request an Upgrade' mod='poco_paypal'}</a>
        </div>
        <div class="contact_us">
            <a href="{$contactUsLinkPrestoChangeo}#customerservice">{l s='Contact us' mod='poco_paypal'}</a>
        </div>

        <div class="presto_logo"><a href="{$contactUsLinkPrestoChangeo}">{$logoPrestoChangeo nofilter}</a></div>
        <div class="clear"></div>
        {/if}
    </div>
    
    
    <!-- Module upgrade popup -->
    {if $displayUpgradeCheck != ''}
    <a id="open_module_upgrade" href="#module_upgrade"></a>
    <div id="module_upgrade">
        {$displayUpgradeCheck nofilter}
    </div>
    {/if}
    <!-- END - Module upgrade popup -->
    <div class="clear"></div>
    <!-- Main menu - each main menu is connected to a submenu with the data-left-menu value -->
    <div id="main_menu">
        <div id="menu_0" class="menu_item" data-left-menu="secondary_0" data-content="basic_settings">{l s='Configuration' mod='poco_paypal'}</div>
        <div class="clear"></div>
    </div>
    <!-- END Main menu - each main menu is connected to a submenu with the ALT value -->
</div>
<div class="clear"></div>