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
{if isset($params.type)}
    {if $params.type == 'text'}
        {if isset($params.lang) && $params.lang}
            {if $psv >= 1.6}
                {foreach from=$languages item=language name=helper_lang_foreach}
                    <div class="translatable-field row lang-{$language.id_lang|intval}" {if !$smarty.foreach.helper_lang_foreach.first}style="display: none;"{/if}>
                        <div class="col-lg-9">
                            <input type="text"
                                   id="{if isset($params.id)}{$params.id|escape:'html':'UTF-8'}{/if}_{$language.id_lang|intval}"
                                   class="form-control {if isset($params.class)}{$params.class|escape:'html':'UTF-8'}{/if}"
                                   name="{if isset($params.name)}{$params.name|escape:'html':'UTF-8'}{/if}_{$language.id_lang|intval}"
                                   value="{if isset($params.values) && isset($params.values[$language.id_lang])}{$params.values[$language.id_lang]|escape:'html':'UTF-8'}{/if}"
                            />
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
                                {$language.iso_code|escape:'html':'UTF-8'}
                                <i class="icon-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                {foreach from=$languages item=lang}
                                    <li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                {/foreach}
            {elseif $psv == 1.5}
                <div class="translatable">
                    {foreach from=$languages item=language name=helper_lang_foreach}
                        <div class="lang_{$language.id_lang|intval}" style="{if !$smarty.foreach.helper_lang_foreach.first}display: none;{/if} float: left;">
                            <input type="text"
                                   name="{if isset($params.name)}{$params.name|escape:'html':'UTF-8'}{/if}_{$language.id_lang|intval}"
                                   id="{if isset($params.id)}{$params.id|escape:'html':'UTF-8'}{/if}_{$language.id_lang|intval}"
                                   value="{if isset($params.values) && isset($params.values[$language.id_lang])}{$params.values[$language.id_lang]|escape:'html':'UTF-8'}{/if}"
                                   class="{if isset($params.class)}{$params.class|escape:'html':'UTF-8'}{/if}"
                            >
                        </div>
                    {/foreach}
                </div>
                <script type="text/javascript">
                    $(function () {
                        var pspc_languages = new Array();
                        {foreach from=$languages item=language key=k}
                        pspc_languages[{$k|escape:'quotes':'UTF-8'}] = {
                            id_lang: {$language.id_lang|intval},
                            iso_code: '{$language.iso_code|escape:'quotes':'UTF-8'}',
                            name: '{$language.name|escape:'quotes':'UTF-8'}'
                        };
                        {/foreach}
                        displayFlags(pspc_languages, {$id_lang_default|intval});
                    });
                </script>
            {/if}
        {/if}
    {/if}
{/if}