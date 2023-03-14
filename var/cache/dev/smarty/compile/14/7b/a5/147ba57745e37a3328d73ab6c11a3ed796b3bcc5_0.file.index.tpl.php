<?php
/* Smarty version 3.1.33, created on 2022-02-28 10:39:50
  from 'C:\wamp64\www\prestashop\modules\tidiolivechat\views\templates\admin\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_621c35f6749f28_98101144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '147ba57745e37a3328d73ab6c11a3ed796b3bcc5' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\tidiolivechat\\views\\templates\\admin\\index.tpl',
      1 => 1645524146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621c35f6749f28_98101144 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    const apiUrl = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['apiUrl']->value,'javascript','UTF-8' ));?>
";
    const panelUrl = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['panelUrl']->value,'javascript','UTF-8' ));?>
";
    const moduleStatus = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleStatus']->value,'javascript','UTF-8' ));?>
"; // values: nonintegrated, integrated
    const validationErrorMessages = {
        canNotBeEmpty: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Can’t be empty!','mod'=>'tidiolivechat','js'=>1),$_smarty_tpl ) );?>
",
        emailCanNotBeEmpty: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email can’t be empty!','mod'=>'tidiolivechat','js'=>1),$_smarty_tpl ) );?>
",
        passwordCanNotBeEmpty: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password can’t be empty!','mod'=>'tidiolivechat','js'=>1),$_smarty_tpl ) );?>
",
        emailIsInvalid: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email is invalid!','mod'=>'tidiolivechat','js'=>1),$_smarty_tpl ) );?>
",
    };
    const buttonTexts = {
        integrateWithTidio: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Integrate with Tidio','mod'=>'tidiolivechat','js'=>1),$_smarty_tpl ) );?>
",
        loading: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Loading...','mod'=>'tidiolivechat','js'=>1),$_smarty_tpl ) );?>
",
        letsGo: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Let’s go','mod'=>'tidiolivechat','js'=>1),$_smarty_tpl ) );?>
",
    };
<?php echo '</script'; ?>
>

<div id="tidio-wrapper">
    <div class="tidio-box-wrapper">
        <div class="tidio-box tidio-box-actions">
            <div class="logos">
                <div class="logo logo-tidio"></div>
                <div class="logo logo-prestashop"></div>
            </div>

            <form novalidate id="tidio-start">
                <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Start using Tidio','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</h1>
                <input type="email" id="email" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email address','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
" required/>
                <div class="helper"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For example','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
 tidius@tidio.com</div>
                <div class="error"></div>
                <button><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Let’s go','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</button>
            </form>

            <form novalidate id="tidio-login">
                <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Log into your account','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</h1>
                <input type="email" id="email" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email address','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
" required/>
                <div class="helper"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For example','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
 tidius@tidio.com</div>
                <input type="password" id="password" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
" required/>
                <div class="helper"></div>
                <div class="error"></div>
                <button><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Integrate with Tidio','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</button>
                <a href="" id="forgot-password-link" class="button btn-link" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Forgot password?','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</a>
            </form>

            <form novalidate id="tidio-project">
                <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose your project','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</h1>
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please choose the project you’d like to use in your store.','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</p>
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Some of your existing projects may already be connected with other platforms (e.g. Shopify, WordPress) and cannot be used in PrestaShop.','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</p>
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'However, if you wish to use an account you have already used on another platform, please contact our support.','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</p>
                <div class="custom-select" id="tidio-custom-select">
                    <select name="select-tidio-project" id="select-tidio-project">
                        <option selected="selected" disabled><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pick one from the list','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
&hellip;</option>
                    </select>
                </div>
                <div class="error"></div>
                <button disabled><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Integrate with Tidio','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</button>
                <button type="button" id="start-over" class="btn-link"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Start all over again','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</button>
            </form>

            <form novalidate id="tidio-new-email">
                <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Start using Tidio','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</h1>
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'We have detected that the email address provided has already been used to install Tidio on another platform (e.g. Shopify, WordPress).','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</p>
                <p>
                    <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In order to ensure correct operation, please enter a new email address.','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</strong>
                </p>
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'However, if you wish to use an account you have already used on another platform, please contact our support.','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</p>
                <input type="email" id="email" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email address','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
" required/>
                <div class="helper"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For example','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
 tidius@tidio.com</div>
                <div class="error"></div>
                <button><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Let’s go','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</button>
            </form>

            <form id="after-install-text">
                <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Start using Tidio','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</h1>
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tidio Live Chat wigdet is now installed and visible on your website.','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</p>
                <p>
                    <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Open the Tidio panel to talk to your visitors, create and run chatbots, customize the widget and many more...','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</strong>
                </p>
                <a href="" id="open-panel-link" class="button" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Open Tidio Panel','mod'=>'tidiolivechat'),$_smarty_tpl ) );?>
</a>
            </form>
        </div>
        <div class="tidio-box tidio-box-chat">
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customer service is great, but it’s [1]even better[/1] when it’s combined with higher sales','mod'=>'tidiolivechat','tags'=>array('<strong>')),$_smarty_tpl ) );?>
</h2>
            <div class="tidio-box-chat-image"/>
        </div>
    </div>
</div>
<?php }
}
