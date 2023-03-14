<?php
/* Smarty version 3.1.33, created on 2022-02-25 11:25:11
  from 'module:paymongoviewstemplateshoo' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_62184c17f3e646_20875475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31cba409304fbb9a9d917d3a63898110fdab388e' => 
    array (
      0 => 'module:paymongoviewstemplateshoo',
      1 => 1645672797,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62184c17f3e646_20875475 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin C:\wamp64\www\prestashop/modules/paymongo/views/templates/hook/displayCustomerAccount.tpl -->  

<a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="paymongo-displayCustomerAccount-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['transactionsLink']->value, ENT_QUOTES, 'UTF-8');?>
">
  <span class="link-item">
    <i class="material-icons">&#xe065;</i>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['moduleDisplayName']->value, ENT_QUOTES, 'UTF-8');?>
 - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Transactions','mod'=>'paymongo'),$_smarty_tpl ) );?>

  </span>
</a>
<!-- end C:\wamp64\www\prestashop/modules/paymongo/views/templates/hook/displayCustomerAccount.tpl --><?php }
}
