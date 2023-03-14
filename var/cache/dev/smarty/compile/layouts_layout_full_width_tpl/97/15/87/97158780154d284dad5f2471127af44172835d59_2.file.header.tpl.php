<?php
/* Smarty version 3.1.33, created on 2022-02-25 11:55:03
  from 'C:\wamp64\www\prestashop\themes\classic\templates\checkout\_partials\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_62185317618db2_20114904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97158780154d284dad5f2471127af44172835d59' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\themes\\classic\\templates\\checkout\\_partials\\header.tpl',
      1 => 1605521391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62185317618db2_20114904 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_168101992962185317600e20_86124116', 'header');
?>

<?php }
/* {block 'header_nav'} */
class Block_1954825852621853176025c8_05906955 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <nav class="header-nav">
      <div class="container">
        <div class="row">
          <div class="col-md-6 hidden-sm-down" id="_desktop_logo">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
">
              <img class="logo img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'logo','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
">
            </a>
          </div>
          <div class="col-md-6 text-xs-right hidden-sm-down">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav1'),$_smarty_tpl ) );?>

          </div>
          <div class="hidden-md-up text-sm-center mobile">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav2'),$_smarty_tpl ) );?>

            <div class="float-xs-left" id="menu-icon">
              <i class="material-icons">&#xE5D2;</i>
            </div>
            <div class="float-xs-right" id="_mobile_cart"></div>
            <div class="float-xs-right" id="_mobile_user_info"></div>
            <div class="top-logo" id="_mobile_logo"></div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </nav>
  <?php
}
}
/* {/block 'header_nav'} */
/* {block 'header_top'} */
class Block_1656073155621853176131f0_32206879 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="header-top hidden-md-up">
      <div class="container">
         <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTop'),$_smarty_tpl ) );?>

              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div id="mobile_top_menu_wrapper" class="row hidden-md-up" style="display:none;">
          <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
          <div class="js-top-menu-bottom">
            <div id="_mobile_currency_selector"></div>
            <div id="_mobile_language_selector"></div>
            <div id="_mobile_contact_link"></div>
          </div>
        </div>
      </div>
    </div>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNavFullWidth'),$_smarty_tpl ) );?>

  <?php
}
}
/* {/block 'header_top'} */
/* {block 'header'} */
class Block_168101992962185317600e20_86124116 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_168101992962185317600e20_86124116',
  ),
  'header_nav' => 
  array (
    0 => 'Block_1954825852621853176025c8_05906955',
  ),
  'header_top' => 
  array (
    0 => 'Block_1656073155621853176131f0_32206879',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1954825852621853176025c8_05906955', 'header_nav', $this->tplIndex);
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1656073155621853176131f0_32206879', 'header_top', $this->tplIndex);
?>

<?php
}
}
/* {/block 'header'} */
}
