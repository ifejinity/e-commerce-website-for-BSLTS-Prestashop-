<?php
/* Smarty version 3.1.33, created on 2022-03-20 08:55:13
  from 'C:\wamp64\www\prestashop\modules\bestkit_log\views\templates\admin\status_renderer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_62367b71571682_81316260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7524c5abd7c7049ee058e069c517ca5faeb712ae' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\bestkit_log\\views\\templates\\admin\\status_renderer.tpl',
      1 => 1645455209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62367b71571682_81316260 (Smarty_Internal_Template $_smarty_tpl) {
?><span class="label color_field" style="background-color:<?php echo $_smarty_tpl->tpl_vars['bestkit_points']->value['status']['color'];?>
;color:white">
	<?php echo $_smarty_tpl->tpl_vars['bestkit_points']->value['status']['name'];?>

</span><?php }
}
