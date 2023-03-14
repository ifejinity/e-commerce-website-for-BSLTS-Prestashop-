<?php
/* Smarty version 3.1.33, created on 2022-03-04 16:03:43
  from 'C:\wamp64\www\prestashop\pdf\invoice.summary-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6221c7dfdac619_26673650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e5beab5da0f98f09ee960f83713a3a5dcd4d628' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\pdf\\invoice.summary-tab.tpl',
      1 => 1605521391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6221c7dfdac619_26673650 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="summary-tab" width="100%">
	<tr>
		<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice Number','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice Date','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order Reference','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order date','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<?php if ($_smarty_tpl->tpl_vars['addresses']->value['invoice']->vat_number) {?>
			<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'VAT Number','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<?php }?>
	</tr>
	<tr>
		<td class="center small white"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' ));?>
</td>
		<td class="center small white"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['order']->value->invoice_date,'full'=>0),$_smarty_tpl ) );?>
</td>
		<td class="center small white"><?php echo $_smarty_tpl->tpl_vars['order']->value->getUniqReference();?>
</td>
		<td class="center small white"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>0),$_smarty_tpl ) );?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['addresses']->value['invoice']->vat_number) {?>
			<td class="center small white">
				<?php echo $_smarty_tpl->tpl_vars['addresses']->value['invoice']->vat_number;?>

			</td>
		<?php }?>
	</tr>
</table>
<?php }
}
