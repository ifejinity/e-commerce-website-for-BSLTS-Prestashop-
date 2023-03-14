<?php
/* Smarty version 3.1.33, created on 2022-02-25 12:04:08
  from 'C:\wamp64\www\prestashop\modules\bestkit_log\views\templates\admin\status_renderer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_621855382ed294_12425655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f7541b86e527fd38ce17bdcd384f7e7737856e5' => 
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
function content_621855382ed294_12425655 (Smarty_Internal_Template $_smarty_tpl) {
?><span class="label color_field" style="background-color:<?php echo $_smarty_tpl->tpl_vars['bestkit_points']->value['status']['color'];?>
;color:white">
	<?php echo $_smarty_tpl->tpl_vars['bestkit_points']->value['status']['name'];?>

</span><?php }
}
