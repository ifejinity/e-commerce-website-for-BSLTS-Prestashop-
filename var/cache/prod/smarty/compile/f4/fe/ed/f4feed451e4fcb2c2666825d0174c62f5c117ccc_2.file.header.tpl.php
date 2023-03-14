<?php
/* Smarty version 3.1.33, created on 2022-11-16 19:56:41
  from 'C:\wamp64\www\prestashop\modules\psproductcountdown\views\templates\hook\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6374cff9145389_08472322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4feed451e4fcb2c2666825d0174c62f5c117ccc' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\psproductcountdown\\views\\templates\\hook\\header.tpl',
      1 => 1652777842,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6374cff9145389_08472322 (Smarty_Internal_Template $_smarty_tpl) {
?><style type="text/css">
        <?php if ($_smarty_tpl->tpl_vars['pspc_module']->value->product_position != 'displayProductPriceBlock' && ($_smarty_tpl->tpl_vars['pspc_module']->value->product_list_position == 'over_img' || $_smarty_tpl->tpl_vars['pspc_module']->value->product_list_position == 'displayProductPriceBlock')) {?>
    #product .pspc-wrp.pspc_displayProductPriceBlock {
        display: none !important;
    }
    #product .ajax_block_product .pspc-wrp.pspc_displayProductPriceBlock,
    #product .product_list .pspc-wrp.pspc_displayProductPriceBlock,
    #product #product_list .pspc-wrp.pspc_displayProductPriceBlock,
    #product .product-miniature .pspc-wrp.pspc_displayProductPriceBlock {
        display: block !important;
    }
    <?php } elseif ($_smarty_tpl->tpl_vars['pspc_module']->value->product_position == 'displayProductPriceBlock' && $_smarty_tpl->tpl_vars['pspc_module']->value->product_list_position != 'over_img' && $_smarty_tpl->tpl_vars['pspc_module']->value->product_list_position != 'displayProductPriceBlock') {?>
    #product .pspc-wrp.pspc_displayProductPriceBlock {
        display: block !important;
    }
    .ajax_block_product .pspc-wrp.pspc_displayProductPriceBlock,
    .product_list .pspc-wrp.pspc_displayProductPriceBlock,
    #product_list .pspc-wrp.pspc_displayProductPriceBlock,
    .product-miniature .pspc-wrp.pspc_displayProductPriceBlock {
        display: none !important;
    }
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['pspc_custom_css']->value) {?>
        <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pspc_custom_css']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

    <?php }?>
</style>

<?php echo '<script'; ?>
 type="text/javascript">
    var pspc_labels = ['days', 'hours', 'minutes', 'seconds'];
    var pspc_labels_lang = {
        'days': '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'days','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
',
        'hours': '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'hours','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
',
        'minutes': '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'min.','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
',
        'seconds': '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'sec.','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
'
    };
    var pspc_labels_lang_1 = {
        'days': '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'day','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
',
        'hours': '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'hour','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
',
        'minutes': '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'min.','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
',
        'seconds': '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'sec.','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
'
    };
    var pspc_offer_txt = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Offer ends in:','mod'=>'psproductcountdown'),$_smarty_tpl ) );?>
";
    var pspc_theme = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pspc_theme']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    var pspc_psv = <?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['psv']->value), ENT_QUOTES, 'UTF-8');?>
;
    var pspc_hide_after_end = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['pspc_hide_after_end']->value), ENT_QUOTES, 'UTF-8');?>
;
    var pspc_hide_expired = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['pspc_hide_expired']->value), ENT_QUOTES, 'UTF-8');?>
;
    var pspc_highlight = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pspc_highlight']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    var pspc_position_product = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pspc_position_product']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    var pspc_position_list = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pspc_position_list']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    var pspc_adjust_positions = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['pspc_adjust_positions']->value), ENT_QUOTES, 'UTF-8');?>
;
    var pspc_token = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Tools::getToken(false),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
<?php echo '</script'; ?>
><?php }
}
