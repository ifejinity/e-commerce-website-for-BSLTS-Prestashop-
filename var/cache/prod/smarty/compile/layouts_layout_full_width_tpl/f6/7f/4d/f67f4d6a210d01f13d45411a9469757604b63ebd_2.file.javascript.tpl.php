<?php
/* Smarty version 3.1.33, created on 2022-11-16 19:56:42
  from 'C:\wamp64\www\prestashop\themes\classic\templates\_partials\javascript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6374cffa2033b2_63128778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f67f4d6a210d01f13d45411a9469757604b63ebd' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\themes\\classic\\templates\\_partials\\javascript.tpl',
      1 => 1605521391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6374cffa2033b2_63128778 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['javascript']->value['external'], 'js');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['js']->value) {
?>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js']->value['attribute'], ENT_QUOTES, 'UTF-8');?>
><?php echo '</script'; ?>
>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['javascript']->value['inline'], 'js');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['js']->value) {
?>
  <?php echo '<script'; ?>
 type="text/javascript">
    <?php echo $_smarty_tpl->tpl_vars['js']->value['content'];?>

  <?php echo '</script'; ?>
>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php if (isset($_smarty_tpl->tpl_vars['vars']->value) && count($_smarty_tpl->tpl_vars['vars']->value)) {?>
  <?php echo '<script'; ?>
 type="text/javascript">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vars']->value, 'var_value', false, 'var_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['var_name']->value => $_smarty_tpl->tpl_vars['var_value']->value) {
?>
    var <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
 = <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['var_value']->value ));?>
;
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php echo '</script'; ?>
>
<?php }
}
}
