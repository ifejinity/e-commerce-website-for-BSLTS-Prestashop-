{**
* NOTICE OF LICENSE
*
* This file is licenced under the Software License Agreement.
* With the purchase or the installation of the software in your application
* you accept the licence agreement.
*
* @author    Presta.Site
* @copyright 2018 Presta.Site
* @license   LICENSE.txt
*}
<option value="{$category.id|intval}" {if isset($tree_selected) && is_array($tree_selected) && in_array($category.id, $tree_selected)}selected{/if}>
    {str_repeat('--', $level)|escape:'html':'UTF-8'} {$category.name|escape:'html':'UTF-8'}
</option>
{if isset($category.children) && is_array($category.children) && count($category.children)}
    {foreach from=$category.children item=sub_category}
        {include file="$pspc_admin_tpl_dir/_tree_item15.tpl" category=$sub_category level=$level+1}
    {/foreach}
{/if}