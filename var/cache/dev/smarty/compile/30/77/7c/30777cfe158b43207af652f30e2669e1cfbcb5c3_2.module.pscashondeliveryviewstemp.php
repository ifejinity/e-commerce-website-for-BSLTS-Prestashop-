<?php
/* Smarty version 3.1.33, created on 2022-03-04 16:03:46
  from 'module:pscashondeliveryviewstemp' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6221c7e232ee03_01111192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30777cfe158b43207af652f30e2669e1cfbcb5c3' => 
    array (
      0 => 'module:pscashondeliveryviewstemp',
      1 => 1645457229,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6221c7e232ee03_01111192 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin C:\wamp64\www\prestashop/modules/ps_cashondelivery/views/templates/hook/payment_return.tpl -->
<p>
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your order on %s is complete.','sprintf'=>array($_smarty_tpl->tpl_vars['shop_name']->value),'d'=>'Modules.Cashondelivery.Shop'),$_smarty_tpl ) );?>

  <br><br>
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You have chosen the cash on delivery method.','d'=>'Modules.Cashondelivery.Shop'),$_smarty_tpl ) );?>

  <br><br><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your order will be sent very soon.','d'=>'Modules.Cashondelivery.Shop'),$_smarty_tpl ) );?>
</span>
  <br><br><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For any questions or for further information, please contact our','d'=>'Modules.Cashondelivery.Shop'),$_smarty_tpl ) );?>
 <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_url']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'customer support','d'=>'Modules.Cashondelivery.Shop'),$_smarty_tpl ) );?>
</a>.
</p>
<!-- end C:\wamp64\www\prestashop/modules/ps_cashondelivery/views/templates/hook/payment_return.tpl --><?php }
}
