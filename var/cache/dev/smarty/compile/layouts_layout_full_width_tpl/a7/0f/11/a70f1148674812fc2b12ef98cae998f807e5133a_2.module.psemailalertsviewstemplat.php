<?php
/* Smarty version 3.1.33, created on 2022-02-28 21:50:13
  from 'module:psemailalertsviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_621cd315d0d9d9_76943217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a70f1148674812fc2b12ef98cae998f807e5133a' => 
    array (
      0 => 'module:psemailalertsviewstemplat',
      1 => 1645457497,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'module:ps_emailalerts/views/templates/front/mailalerts-account-line.tpl' => 1,
  ),
),false)) {
function content_621cd315d0d9d9_76943217 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!-- begin C:\wamp64\www\prestashop/modules/ps_emailalerts/views/templates/front/mailalerts-account.tpl -->

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1469028006621cd315cf2979_05646809', 'page_title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1025302315621cd315cf9a21_20435852', 'page_content');
?>

<!-- end C:\wamp64\www\prestashop/modules/ps_emailalerts/views/templates/front/mailalerts-account.tpl --><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'customer/page.tpl');
}
/* {block 'page_title'} */
class Block_1469028006621cd315cf2979_05646809 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_1469028006621cd315cf2979_05646809',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My alerts','d'=>'Modules.Emailalerts.Shop'),$_smarty_tpl ) );?>

<?php
}
}
/* {/block 'page_title'} */
/* {block 'page_content'} */
class Block_1025302315621cd315cf9a21_20435852 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_1025302315621cd315cf9a21_20435852',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php if ($_smarty_tpl->tpl_vars['mailAlerts']->value) {?>
    <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mailAlerts']->value, 'mailAlert');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mailAlert']->value) {
?>
        <li><?php $_smarty_tpl->_subTemplateRender('module:ps_emailalerts/views/templates/front/mailalerts-account-line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('mailAlert'=>$_smarty_tpl->tpl_vars['mailAlert']->value), 0, true);
?></li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
  <?php } else { ?>
    <div class="alert alert-info" role="alert" data-alert="info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No mail alerts yet.','d'=>'Modules.Emailalerts.Shop'),$_smarty_tpl ) );?>
</div>
  <?php }
}
}
/* {/block 'page_content'} */
}
