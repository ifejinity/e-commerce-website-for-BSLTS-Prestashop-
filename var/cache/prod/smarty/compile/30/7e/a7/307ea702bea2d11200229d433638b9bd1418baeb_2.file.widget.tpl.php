<?php
/* Smarty version 3.1.33, created on 2022-11-16 19:56:41
  from 'C:\wamp64\www\prestashop\modules\tidiolivechat\views\templates\front\widget.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6374cff9065728_17462827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '307ea702bea2d11200229d433638b9bd1418baeb' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\tidiolivechat\\views\\templates\\front\\widget.tpl',
      1 => 1645524146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6374cff9065728_17462827 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['widgetUrl']->value) {?>
    <?php echo '<script'; ?>
 src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['widgetUrl']->value,'javascript','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" async><?php echo '</script'; ?>
>
<?php }
}
}
