<div class="panel po_main_content" id="settings">
    <form action="{$request_uri}#settings" method="post">
        <div class="panel_header">
            <div class="panel_title">{l s='Settings' mod='poco_paypal'}</div>
            <div class="panel_info_text">
                <span class="simple_alert"> </span>
                {l s='You must click on Update for a change to take effect' mod='poco_paypal'}
            </div>
            <div class="clear"></div>
        </div>
        <div class="two_columns">
            <div class="columns">
                <div class="left_column">
                    {l s='Sandbox mode (tests)' mod='poco_paypal'}
                </div>
                <div class="right_column">
                    <input type="radio" style="margin:-5px 0 0 0;padding:0;border:none" name="sandbox_mode" value="1" style="vertical-align: middle;" {if $sandbox_mode == 1}checked="checked"{/if} />
                    <span style="">{l s='Active' mod='poco_paypal'}</span>&nbsp;&nbsp;&nbsp;
                    <br/><br/>
                    <input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="sandbox_mode" value="0" style="vertical-align: middle;" {if $sandbox_mode == 0}checked="checked"{/if} />
                    <span style="">{l s='Inactive' mod='poco_paypal'}</span>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <div class="columns">
                <div class="left_column">
                    {l s='Payment type' mod='poco_paypal'}
                </div>
                <div class="right_column">
                    <input type="radio" style="margin:-5px 0 0 0;padding:0;border:none" name="paypal_capture" value="0" style="vertical-align: middle;" {if $paypal_capture == 0}checked="checked"{/if} />
                    <span style="">{l s='Authorize + Capture' mod='poco_paypal'}</span>&nbsp;&nbsp;&nbsp;
                    <br/><br/>
                    <input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="paypal_capture" value="1" style="vertical-align: middle;" {if $paypal_capture == 1}checked="checked"{/if} />
                    <span style="">{l s='Authorize Only (Capture later from the orders page)' mod='poco_paypal'}</span>&nbsp;&nbsp;&nbsp;

                    <a class="info_alert" href="#capture"></a>
                    <div id="capture" class="hideADN info_popup">
                        <div class="panel">
                            <h3>
                                {l s='Capture' mod='authorizedotnet'}
                                <span class="info_icon"> </span>
                            </h3>
                            <div class="upgrade_check_content">
                                {l s='Capture block in backoffice order page' mod='authorizedotnet'}
                                <br/><br/>
                                <img src="{$module_basedir}views/img/capture.png" style="max-width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="left_column">
                    {l s='Option' mod='poco_paypal'}
                </div>
                <div class="right_column">
                    <input type="checkbox" value="1" id="paypal_express" name="paypal_express" {if $paypal_express}checked="checked"{/if} />&nbsp;
                    {l s='PayPal Express : payment in 2 clicks with PayPal account directly from cart page' mod='poco_paypal'}
                    <br><br>
                </div>
            </div>
            <div class="columns">
                <div class="left_column">
                    {l s='PayPal account e-mail' mod='poco_paypal'}
                </div>
                <div class="right_column">
                    <input type="text" id="email_paypal" name="email_paypal" value="{$email_paypal}" />
                </div>
            </div>
            <div class="columns">
                <div class="left_column">
                    {l s='API Username' mod='poco_paypal'}
                </div>
                <div class="right_column">
                    <input type="text" id="api_username" name="api_username" value="{$api_username}" />
                </div>
            </div>
            <div class="columns">
                <div class="left_column">
                    {l s='API Password' mod='poco_paypal'}
                </div>
                <div class="right_column">
                    <input type="text" id="api_password" name="api_password" value="{$api_password}" />
                    <span>{l s='Leave blank if the password has not changed' mod='poco_paypal'}</span>
                </div>
            </div>
            <div class="columns">
                <div class="left_column">
                    {l s='API Signature' mod='poco_paypal'}
                </div>
                <div class="right_column">
                    <input type="text" id="api_signature" name="api_signature" value="{$api_signature}" />
                </div>
            </div>
            <div class="columns">
                <div class="left_column">
                     <input type="submit" value="{l s='Update' mod='poco_paypal'}" name="submitSettings" class="submit_button" />
                </div>
                <div class="right_column">
                    
                </div>
            </div>
                
                
        </div>
        <div class="clear"></div>
        
    </form>
</div>