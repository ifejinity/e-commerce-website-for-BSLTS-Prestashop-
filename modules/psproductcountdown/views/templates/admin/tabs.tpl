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

<div class="pstg-tabs row {if $psv == 1.5}pspc15{/if}">
    <div class="col-lg-12">
        <div class="pst-tabs-list list-group">
            {foreach from=$pspc_tabs item="tab" name="tab_names" key='key'}
                <a class="list-group-item col-lg-2 col-md-3 col-sm-4 {if $smarty.foreach.tab_names.first}active{/if}" href="#psttab-{$key|escape:'html':'UTF-8'}" data-hash="#tab-{$key|escape:'html':'UTF-8'}" id="psttn-{$key|escape:'html':'UTF-8'}">{$tab.name|escape:'html':'UTF-8'}</a>
            {/foreach}
        </div>
    </div>
    <div class="col-lg-12 pst-tab-content-wrp">
        {foreach from=$pspc_tabs item="tab" name="tab_contents" key='key'}
            <div class="pst-tab-content" id="psttab-{$key|escape:'html':'UTF-8'}" {if !$smarty.foreach.tab_contents.first}style="display: none;" {/if}>
                {if is_array($tab.content)}
                    {foreach from=$tab.content item='content' key='tab_wrp_id'}
                        <div id="{$tab_wrp_id|escape:'html':'UTF-8'}">
                            {$content nofilter} {* html *}
                        </div>
                    {/foreach}
                {else}
                    {$tab.content nofilter} {* html *}
                {/if}
            </div>
        {/foreach}
    </div>
</div>