<?php
/* Smarty version 3.1.33, created on 2022-02-28 11:09:50
  from 'module:pscustomeraccountlinkspsc' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_621c3cfe46d5c6_03444970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42f9461127ce7396a601c2484841253ea5ba658f' => 
    array (
      0 => 'module:pscustomeraccountlinkspsc',
      1 => 1605521391,
      2 => 'module',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_621c3cfe46d5c6_03444970 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
));
?><!-- begin C:\wamp64\www\prestashop/themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl -->
<div id="block_myaccount_infos" class="col-md-3 links wrapper">
  <p class="h3 myaccount-title hidden-sm-down">
    <a class="text-uppercase" href="http://localhost/prestashop/my-account" rel="nofollow">
      Your account
    </a>
  </p>
  <div class="title clearfix hidden-md-up" data-target="#footer_account_list" data-toggle="collapse">
    <span class="h3">Your account</span>
    <span class="float-xs-right">
      <span class="navbar-toggler collapse-icons">
        <i class="material-icons add">&#xE313;</i>
        <i class="material-icons remove">&#xE316;</i>
      </span>
    </span>
  </div>
  <ul class="account-list collapse" id="footer_account_list">
            <li>
          <a href="http://localhost/prestashop/identity" title="Personal info" rel="nofollow">
            Personal info
          </a>
        </li>
            <li>
          <a href="http://localhost/prestashop/order-follow" title="Merchandise returns" rel="nofollow">
            Merchandise returns
          </a>
        </li>
            <li>
          <a href="http://localhost/prestashop/order-history" title="Orders" rel="nofollow">
            Orders
          </a>
        </li>
            <li>
          <a href="http://localhost/prestashop/credit-slip" title="Credit slips" rel="nofollow">
            Credit slips
          </a>
        </li>
            <li>
          <a href="http://localhost/prestashop/addresses" title="Addresses" rel="nofollow">
            Addresses
          </a>
        </li>
            <li>
          <a href="http://localhost/prestashop/discount" title="Vouchers" rel="nofollow">
            Vouchers
          </a>
        </li>
        
<!-- begin C:\wamp64\www\prestashop/themes/classic/modules/ps_emailalerts/views/templates/hook/my-account-footer.tpl -->
<li>
  <a href="//localhost/prestashop/module/ps_emailalerts/account" title="My alerts">
    My alerts
  </a>
</li>

<!-- end C:\wamp64\www\prestashop/themes/classic/modules/ps_emailalerts/views/templates/hook/my-account-footer.tpl -->

<!-- begin module:blockwishlist/views/templates/hook/account/myaccount-block.tpl -->
<!-- begin C:\wamp64\www\prestashop/modules/blockwishlist/views/templates/hook/account/myaccount-block.tpl -->
<!-- end C:\wamp64\www\prestashop/modules/blockwishlist/views/templates/hook/account/myaccount-block.tpl -->
<!-- end module:blockwishlist/views/templates/hook/account/myaccount-block.tpl -->

	</ul>
</div>
<!-- end C:\wamp64\www\prestashop/themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl --><?php }
}
