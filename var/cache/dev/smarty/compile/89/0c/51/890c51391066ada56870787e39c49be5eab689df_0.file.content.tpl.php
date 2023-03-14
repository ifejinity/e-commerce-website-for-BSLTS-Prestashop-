<?php
/* Smarty version 3.1.33, created on 2022-02-28 21:47:21
  from 'C:\wamp64\www\prestashop\adminbslts\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_621cd269d52bc0_11549604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '890c51391066ada56870787e39c49be5eab689df' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\adminbslts\\themes\\default\\template\\content.tpl',
      1 => 1605521391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621cd269d52bc0_11549604 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
