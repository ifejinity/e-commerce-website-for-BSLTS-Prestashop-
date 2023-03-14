<div id="left_menu">

    <!-- Secondary menu - not all top menus have this option -->
    <div id="secondary_menu">
        <!-- Secondary menu - connected to First top menu item -->
        <div id="secondary_0" class="menu">

            <!-- Submenu with header -->
            <div id="secondary_0_0">
                <!-- Submenu header -->
                <div class="menu_header">
                    <span class="menu_header_text">{l s='Module Settings' mod='poco_paypal'}</span>
                    <!-- Arrow - will allow to show / hide the submenu items -->
                    <!-- If you need a left menu item always visible just remove the span arrow -->
                    <span id="left_menu_arrow" class="arrow_up"></span>
                </div>
                <!-- END - Submenu header -->
                <!-- Submenu -->
                <div class="secondary_submenu">
                    <!-- Submenu without instructions -->
                    <!-- END Submenu without instructions -->
                    <div id="secondary_menu_item_0_0_2" class="secondary_menu_item" data-instructions="instructions-basic-settings" data-content="settings">
                        {l s='Settings' mod='poco_paypal'}
                    </div>
                </div>
                <!-- END - Submenu -->
            </div>
            <!-- END Submenu with header -->
            <!--<div id="secondary_0_1">    
                <div class="menu_header">
                    {l s='Copy Attributes' mod='poco_paypal'}  
                    <span class="arrow_up"></span>
                </div>
                <div class="secondary_submenu">
                    <div id="secondary_menu_item_0_1_1" class="secondary_menu_item">
                        {l s='Basic Settings 1' mod='poco_paypal'}
                    </div>
                    <div id="secondary_menu_item_0_1_2" class="secondary_menu_item">
                        {l s='Basic Settings 2' mod='poco_paypal'}
                    </div>
                </div>
            </div>
            <div id="secondary_0_3">
                <div class="menu_header secondary_menu_item" id="secondary_menu_item_0_3_0">
                    {l s='Single Menu' mod='poco_paypal'}               
                </div>            
            </div>       
            -->
        </div>
        <!-- END Secondary menu - connected to First top menu item -->
        <!--
        <div id="secondary_1" class="menu">
            <div id="secondary_1_0">
                <div class="menu_header">
                    {l s='Secondary 1' mod='poco_paypal'}
                    <span class="arrow_up"></span>
                </div>
                <div class="secondary_submenu">
                    <div id="secondary_menu_item_1_0_1" class="secondary_menu_item">
                        {l s='Basic Settings 1' mod='poco_paypal'}
                    </div>
                    <div id="secondary_menu_item_1_0_2" class="secondary_menu_item">
                        {l s='Basic Settings 2' mod='poco_paypal'}
                    </div>
                </div>
            </div>
            <div id="secondary_1_1">
                <div class="menu_header secondary_menu_item" id="secondary_menu_item_1_1_1">
                    {l s='Single Menu' mod='poco_paypal'}               
                </div>            
            </div>   
        </div>
        -->
    </div>
    <!-- END  Secondary menu - not all top menus have this option -->
    <!-- Instructions Block - connected to left submenu items (only some submenus have this instructions) -->
    <div class="instructions">
        <div class="instructions_block" id="instructions-basic-settings">
            <div class="instructions_title">
                <span class="icon"> </span>
                {l s='Tips' mod='poco_paypal'}
            </div>
            <div class="instructions_content">
                <div class="instructions_line">
                    <span class="icon"> </span>
                    <a href="https://www.paypal.com/ch/smarthelp/article/how-do-i-request-api-signature-or-certificate-credentials-faq3196" target="_blank">{l s='Click here to learn how to generate your API username, password and signature.' mod='poco_paypal'}</a>
                </div>
            </div>
        </div>
        <!--
        <div class="instructions_block" id="instructions-">
             <div class="instructions_title">
                <span class="icon"> </span>
                {l s='Tips' mod='poco_paypal'}
            </div>
            <div class="instructions_content">
                <div class="instructions_line">
                    <span class="icon"> </span>
                    {l s='Set each group display type (radio, dropdown, checkbox, etc...), select the number of attributes to display in each row..' mod='poco_paypal'}
                </div>
                <div class="instructions_line">
                    <span class="icon"> </span>
                    {l s='Select a layout ("Vertical" is better with multiple items per row, or "Horizontal") as well as image related settings.' mod='poco_paypal'}
                </div>
                <div class="instructions_line">
                    <span class="icon"> </span>
                    {l s='Select an attribute type for each group, each type will open additional settings below it.' mod='poco_paypal'}
                </div>
                <div class="instructions_line instructions_important">
                    <span class="icon"> </span>
                    {l s='You MUST click "Update" after changing the text, do not try to drag any groups.' mod='poco_paypal'}
                </div>
            </div>
        </div>
        -->
    </div>   
    <!-- END Instructions Block - connected to left submenu items (only some submenus have this instructions) -->

    <!-- Required only for some menu items -->      
    {if $contactUsLinkPrestoChangeo != ''}
    <div class="contact_form_left_menu">
        <div class="contact_form_text">{l s='For any technical questions, or problems with the module, please contact us using our' mod='poco_paypal'}</div>
        <a class="contact_button" href="{$contactUsLinkPrestoChangeo}">{l s='Contact form' mod='poco_paypal'}</a>
    </div>
    {/if}

    <!-- END Required only for some menu items -->   
    <!-- Module Recommandations block -->
    <div id="module_recommandations" class="module_recommandations_top">
       {$getModuleRecommendations nofilter}
    </div>
    <!-- END Module Recommandations block -->
</div>