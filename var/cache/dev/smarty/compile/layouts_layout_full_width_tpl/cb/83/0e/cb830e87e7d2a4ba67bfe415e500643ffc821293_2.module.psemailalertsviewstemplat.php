<?php
/* Smarty version 3.1.33, created on 2022-02-28 21:50:13
  from 'module:psemailalertsviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_621cd315e47e91_11609807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb830e87e7d2a4ba67bfe415e500643ffc821293' => 
    array (
      0 => 'module:psemailalertsviewstemplat',
      1 => 1645457497,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621cd315e47e91_11609807 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin C:\wamp64\www\prestashop/modules/ps_emailalerts/views/templates/front/mailalerts-account-line.tpl -->
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mailAlert']->value['link'], ENT_QUOTES, 'UTF-8');?>
">
  <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mailAlert']->value['cover_url'], ENT_QUOTES, 'UTF-8');?>
" alt=""/>
  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mailAlert']->value['name'], ENT_QUOTES, 'UTF-8');?>

  <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mailAlert']->value['attributes_small'], ENT_QUOTES, 'UTF-8');?>
</span>
  <a href="#"
     title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove mail alert','d'=>'Modules.Mailalerts.Shop'),$_smarty_tpl ) );?>
"
     class="js-remove-email-alert btn btn-link"
     rel="js-id-emailalerts-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['mailAlert']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['mailAlert']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8');?>
"
     data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'module','name'=>'ps_emailalerts','controller'=>'actions','params'=>array('process'=>'remove')),$_smarty_tpl ) );?>
">
    <i class="material-icons">delete</i>
  </a>
</a>
<!-- end C:\wamp64\www\prestashop/modules/ps_emailalerts/views/templates/front/mailalerts-account-line.tpl --><?php }
}
