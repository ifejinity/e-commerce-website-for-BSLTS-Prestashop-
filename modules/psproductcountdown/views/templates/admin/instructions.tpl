{**
* NOTICE OF LICENSE
*
* This file is licenced under the Software License Agreement.
* With the purchase or the installation of the software in your application
* you accept the licence agreement.
*
* @author    Presta.Site
* @copyright 2017 Presta.Site
* @license   LICENSE.txt
*}

<div id="pspc-support">
    {if $psv == 1.5}
        <br/><fieldset><legend>{l s='Support' mod='psproductcountdown'}</legend>
    {else}
        <div class="panel">
            <div class="panel-heading">
                <i class="icon-envelope"></i> {l s='Support' mod='psproductcountdown'}
            </div>
    {/if}

            <div>
                <p>{l s='Feel free to ask questions in our official thread on PrestaShop forum. Any feedback would be highly appreciated!' mod='psproductcountdown'}</p>
                <p><a target="_blank" href="https://www.prestashop.com/forums/topic/568613-free-module-product-countdown-ps-151617/">{l s='Link' mod='psproductcountdown'}</a></p>
            </div>

    {if $psv == 1.5}
        </fieldset><br/>
    {else}
        </div>
    {/if}
</div>

<div id="pspc-instructions">
    {if $psv == 1.5}
        <br/><fieldset><legend>{l s='Additional instructions' mod='psproductcountdown'}</legend>
    {else}
        <div class="panel">
        <div class="panel-heading">
            <i class="icon-cogs"></i> {l s='Additional instructions' mod='psproductcountdown'}
        </div>
    {/if}

        <h4>{l s='Custom hook' mod='psproductcountdown'}</h4>
        <p>
            {l s='Usually it is necessary only when you need to display a countdown in a non-standard place.' mod='psproductcountdown'}
            <br>
            {l s='You can use this custom hook to place a countdown anywhere in your template:' mod='psproductcountdown'}
            <b>{literal}<pre>{hook h='pspc' id_product='X'}</pre>{/literal}</b>
            ({l s='Replace X by some product ID' mod='psproductcountdown'})
        </p>

        <p>
            {l s='Here are examples for the most common cases:' mod='psproductcountdown'} <br>

            {if $psv <= 1.6}
                <ul>
                    <li>
                        {l s='In' mod='psproductcountdown'} <b>product.tpl</b> {l s='use' mod='psproductcountdown'}
                        {literal}<pre>{hook h='pspc' id_product=$product->id}</pre>{/literal}
                    </li>
                    <li>
                        {l s='In' mod='psproductcountdown'} <b>product-list.tpl</b> {l s='use' mod='psproductcountdown'}
                        {literal}<pre>{hook h='pspc' id_product=$product.id_product}</pre>{/literal}
                    </li>
                </ul>
            {else}
                <ul>
                    <li>
                        {l s='At the [1]product page[/1] you can use this code:' tags=['<b>'] mod='psproductcountdown'}
                        {literal}<pre>{hook h='pspc' id_product=$product.id_product}</pre>{/literal}
                        {l s='Product page main template:' mod='psproductcountdown'} /themes/{$pspc_ps_theme|escape:'html':'UTF-8'}/templates/catalog/product.tpl
                        <br>
                        {l s='Sub templates are located in this directory' mod='psproductcountdown'} /themes/{$pspc_ps_theme|escape:'html':'UTF-8'}/templates/catalog/_partials/
                        <br><br>
                    </li>
                    <li>
                        {l s='In the [1]product list[/1] you can use this code:' tags=['<b>'] mod='psproductcountdown'}
                        {literal}<pre>{hook h='pspc' id_product=$product.id_product}</pre>{/literal}
                        {l s='Product miniature template:' mod='psproductcountdown'} /themes/{$pspc_ps_theme|escape:'html':'UTF-8'}/templates/catalog/_partials/miniatures/product.tpl
                    </li>
                </ul>
            {/if}
        </p>

        <p>{l s='Simply paste that code to the necessary place in your template file.' mod='psproductcountdown'}</p>

    {if $psv == 1.5}
        </fieldset><br/>
    {else}
        </div>
    {/if}
</div>
