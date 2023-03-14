<?php
/* Smarty version 3.1.33, created on 2022-02-25 11:55:01
  from 'module:blockreassuranceviewstemp' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_621853155df630_26149524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ffc009d1b66ea89054a8e253403b7d3a67d8150' => 
    array (
      0 => 'module:blockreassuranceviewstemp',
      1 => 1605521391,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621853155df630_26149524 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1634084282621853155d2b12_14916700';
?>
<!-- begin C:\wamp64\www\prestashop/themes/classic/modules/blockreassurance/views/templates/hook/blockreassurance.tpl --><?php if ($_smarty_tpl->tpl_vars['elements']->value) {?>
  <div id="block-reassurance">
    <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['elements']->value, 'element');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['element']->value) {
?>
        <li>
          <div class="block-reassurance-item">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['image'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['text'], ENT_QUOTES, 'UTF-8');?>
">
            <span class="h6"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['text'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
        </li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
  </div>
<?php }?>
<!-- end C:\wamp64\www\prestashop/themes/classic/modules/blockreassurance/views/templates/hook/blockreassurance.tpl --><?php }
}
