<?php
/* Smarty version 3.1.33, created on 2022-02-28 11:36:26
  from 'module:paymongoviewstemplatesfro' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_621c433a4009a1_78850587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c2bef11f3bd8ec2c4ee4c5f6684846e456290a6' => 
    array (
      0 => 'module:paymongoviewstemplatesfro',
      1 => 1645672797,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621c433a4009a1_78850587 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!-- begin C:\wamp64\www\prestashop/modules/paymongo/views/templates/front/account.tpl -->  



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_762983041621c433a3cecb5_07912746', 'page_title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1070565430621c433a3d9ec8_04408676', 'page_content');
?>

<!-- end C:\wamp64\www\prestashop/modules/paymongo/views/templates/front/account.tpl --><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'customer/page.tpl');
}
/* {block 'page_title'} */
class Block_762983041621c433a3cecb5_07912746 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_762983041621c433a3cecb5_07912746',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h1 class="h1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['moduleDisplayName']->value, ENT_QUOTES, 'UTF-8');?>
 - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Transactions','mod'=>'paymongo'),$_smarty_tpl ) );?>
</h1>
<?php
}
}
/* {/block 'page_title'} */
/* {block 'page_content'} */
class Block_1070565430621c433a3d9ec8_04408676 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_1070565430621c433a3d9ec8_04408676',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php if ($_smarty_tpl->tpl_vars['orderPayments']->value) {?>
    <table class="table table-striped table-bordered hidden-sm-down">
      <thead class="thead-default">
      <tr>
        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order reference','mod'=>'paymongo'),$_smarty_tpl ) );?>
</th>
        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Payment method','mod'=>'paymongo'),$_smarty_tpl ) );?>
</th>
        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Transaction reference','mod'=>'paymongo'),$_smarty_tpl ) );?>
</th>
        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amount','mod'=>'paymongo'),$_smarty_tpl ) );?>
</th>
        <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date','mod'=>'paymongo'),$_smarty_tpl ) );?>
</th>
      </tr>
      </thead>
      <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderPayments']->value, 'orderPayment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['orderPayment']->value) {
?>
        <tr>
          <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderPayment']->value['order_reference'], ENT_QUOTES, 'UTF-8');?>
</td>
          <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderPayment']->value['payment_method'], ENT_QUOTES, 'UTF-8');?>
</td>
          <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderPayment']->value['transaction_id'], ENT_QUOTES, 'UTF-8');?>
</td>
          <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderPayment']->value['amount_formatted'], ENT_QUOTES, 'UTF-8');?>
</td>
          <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderPayment']->value['date_formatted'], ENT_QUOTES, 'UTF-8');?>
</td>
        </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
  <?php } else { ?>
    <div class="alert alert-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No transaction','mod'=>'paymongo'),$_smarty_tpl ) );?>
</div>
  <?php }
}
}
/* {/block 'page_content'} */
}
