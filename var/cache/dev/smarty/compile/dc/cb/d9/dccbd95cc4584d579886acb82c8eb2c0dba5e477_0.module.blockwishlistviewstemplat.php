<?php
/* Smarty version 3.1.33, created on 2022-02-26 09:46:31
  from 'module:blockwishlistviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_62198677e69331_48217931',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dccbd95cc4584d579886acb82c8eb2c0dba5e477' => 
    array (
      0 => 'module:blockwishlistviewstemplat',
      1 => 1645457926,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62198677e69331_48217931 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin C:\wamp64\www\prestashop/modules/blockwishlist/views/templates/hook/displayAdminCustomers.tpl -->
<?php if ($_smarty_tpl->tpl_vars['isPrestaShopVersionLessThan176']->value) {?>
  <div class="col-lg-12">
    <div class="panel">
      <div class="panel-heading">
        <i class="icon-file"></i>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blockwishlist']->value,'html','UTF-8' ));?>

        <span class="badge">0</span>
      </div>
      <div class="panel-body">
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blockwishlist']->value,'html','UTF-8' ));?>

      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="col">
    <div class="card">
      <h3 class="card-header">
        <i class="material-icons">remove_red_eye</i>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blockwishlist']->value,'html','UTF-8' ));?>

        <span class="badge badge-primary rounded">0</span>
      </h3>
      <div class="card-body">
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blockwishlist']->value,'html','UTF-8' ));?>

      </div>
    </div>
  </div>
<?php }?>
<!-- end C:\wamp64\www\prestashop/modules/blockwishlist/views/templates/hook/displayAdminCustomers.tpl --><?php }
}
