<?php
/* Smarty version 3.1.33, created on 2022-03-19 10:57:55
  from 'C:\wamp64\www\prestashop\adminbslts\themes\default\template\controllers\tracking\helpers\list\list_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_623546b3228405_47618482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d534be3c02018ac497104e1c6b309057c096738' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\adminbslts\\themes\\default\\template\\controllers\\tracking\\helpers\\list\\list_header.tpl',
      1 => 1605521391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_623546b3228405_47618482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1962193037623546b321dda1_69087057', "preTable");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/list/list_header.tpl");
}
/* {block "preTable"} */
class Block_1962193037623546b321dda1_69087057 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'preTable' => 
  array (
    0 => 'Block_1962193037623546b321dda1_69087057',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['list_id']->value == 'empty_categories') {?>
		<div class="alert alert-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'An empty category is a category that has no product directly associated to it. An empty category may however contain products through its subcategories.','d'=>'Admin.Catalog.Help'),$_smarty_tpl ) );?>
</div>
	<?php }
}
}
/* {/block "preTable"} */
}
