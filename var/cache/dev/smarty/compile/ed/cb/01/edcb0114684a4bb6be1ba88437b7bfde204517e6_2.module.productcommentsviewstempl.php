<?php
/* Smarty version 3.1.33, created on 2022-02-25 11:54:51
  from 'module:productcommentsviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6218530bdd1c14_23912567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edcb0114684a4bb6be1ba88437b7bfde204517e6' => 
    array (
      0 => 'module:productcommentsviewstempl',
      1 => 1645457562,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6218530bdd1c14_23912567 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin C:\wamp64\www\prestashop/modules/productcomments/views/templates/hook/product-additional-info-quickview.tpl -->
<?php if ($_smarty_tpl->tpl_vars['nb_comments']->value != 0) {?>
  <?php echo '<script'; ?>
 type="text/javascript">
    const $ = jQuery;
    $('#product-quickview-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
').insertAfter($('.quickview #product-description-short'));
    $('#product-quickview-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
 .grade-stars').rating({ grade: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['average_grade']->value, ENT_QUOTES, 'UTF-8');?>
 });
    $('#product-quickview-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
 .comments-nb').html('(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nb_comments']->value, ENT_QUOTES, 'UTF-8');?>
)');
  <?php echo '</script'; ?>
>

  <div id="product-quickview-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="product-quickview-review">
    <div class="grade-stars"></div>
    <div class="comments-nb"></div>
  </div>
</div>
<?php }?>
<!-- end C:\wamp64\www\prestashop/modules/productcomments/views/templates/hook/product-additional-info-quickview.tpl --><?php }
}
