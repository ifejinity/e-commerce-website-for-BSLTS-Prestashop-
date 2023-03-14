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
<select name="{$tree_name|escape:'html':'UTF-8'}{if $tree_multiple}[]{/if}" {if isset($tree_id)}{$tree_id|escape:'html':'UTF-8'}{/if} {if $tree_multiple}multiple{/if}>
    {if !$tree_multiple}<option value=""></option>{/if}
    {foreach from=$tree_categories item=category}
        {include file="$pspc_admin_tpl_dir/_tree_item15.tpl" category=$category level=0}
    {/foreach}
</select>