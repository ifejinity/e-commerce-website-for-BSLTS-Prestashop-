<?php
/* Smarty version 3.1.33, created on 2022-02-26 18:08:43
  from 'module:blockwishlistviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6219fc2b458ed4_28946772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1229469a269d7c4131830285bfb2a20a0216b61' => 
    array (
      0 => 'module:blockwishlistviewstemplat',
      1 => 1645457926,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'module:blockwishlist/views/templates/components/modals/create.tpl' => 1,
    'module:blockwishlist/views/templates/components/modals/delete.tpl' => 1,
    'module:blockwishlist/views/templates/components/modals/share.tpl' => 1,
    'module:blockwishlist/views/templates/components/modals/rename.tpl' => 1,
    'module:blockwishlist/views/templates/components/toast.tpl' => 1,
  ),
),false)) {
function content_6219fc2b458ed4_28946772 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!-- begin C:\wamp64\www\prestashop/modules/blockwishlist/views/templates/pages/lists.tpl -->

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16822995866219fc2b421557_31860608', 'page_header_container');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_762094716219fc2b4246f9_33781040', 'page_content_container');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1183454696219fc2b444ef2_82339596', 'page_footer_container');
?>

<!-- end C:\wamp64\www\prestashop/modules/blockwishlist/views/templates/pages/lists.tpl --><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_header_container'} */
class Block_16822995866219fc2b421557_31860608 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_header_container' => 
  array (
    0 => 'Block_16822995866219fc2b421557_31860608',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_container'} */
class Block_762094716219fc2b4246f9_33781040 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_762094716219fc2b4246f9_33781040',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div
    class="wishlist-container"
    data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8');?>
"
    data-title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlistsTitlePage']->value, ENT_QUOTES, 'UTF-8');?>
"
    data-empty-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No wishlist found.','d'=>'Modules.Blockwishlist.Shop'),$_smarty_tpl ) );?>
"
    data-rename-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Rename','d'=>'Modules.Blockwishlist.Shop'),$_smarty_tpl ) );?>
"
    data-share-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Share','d'=>'Modules.Blockwishlist.Shop'),$_smarty_tpl ) );?>
"
    data-add-text="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newWishlistCTA']->value, ENT_QUOTES, 'UTF-8');?>
"
  ></div>

  <?php $_smarty_tpl->_subTemplateRender("module:blockwishlist/views/templates/components/modals/create.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>$_smarty_tpl->tpl_vars['createUrl']->value), 0, false);
?>
  <?php $_smarty_tpl->_subTemplateRender("module:blockwishlist/views/templates/components/modals/delete.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listUrl'=>$_smarty_tpl->tpl_vars['deleteListUrl']->value,'productUrl'=>$_smarty_tpl->tpl_vars['deleteProductUrl']->value), 0, false);
?>
  <?php $_smarty_tpl->_subTemplateRender("module:blockwishlist/views/templates/components/modals/share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>$_smarty_tpl->tpl_vars['shareUrl']->value), 0, false);
?>
  <?php $_smarty_tpl->_subTemplateRender("module:blockwishlist/views/templates/components/modals/rename.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>$_smarty_tpl->tpl_vars['renameUrl']->value), 0, false);
?>
  <?php $_smarty_tpl->_subTemplateRender("module:blockwishlist/views/templates/components/toast.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer_container'} */
class Block_1183454696219fc2b444ef2_82339596 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_footer_container' => 
  array (
    0 => 'Block_1183454696219fc2b444ef2_82339596',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="wishlist-footer-links">
    <a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true),'html' )), ENT_QUOTES, 'UTF-8');?>
"><i class="material-icons">chevron_left</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return to your account','d'=>'Modules.Blockwishlist.Shop'),$_smarty_tpl ) );?>
</a>
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
"><i class="material-icons">home</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Home','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</a>
  </div>
<?php
}
}
/* {/block 'page_footer_container'} */
}
