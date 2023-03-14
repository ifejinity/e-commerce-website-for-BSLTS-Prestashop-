{**
* NOTICE OF LICENSE
*
* This file is licenced under the Software License Agreement.
* With the purchase or the installation of the software in your application
* you accept the licence agreement.
*
* @author    Presta.Site
* @copyright 2015 Presta.Site
* @license   LICENSE.txt
*}

{extends file="helpers/form/form.tpl"}

{block name="label"}
	{if $psv == 1.5}
		<div class="form-group {if isset($input.form_group_class)} {$input.form_group_class|escape:'html':'UTF-8'}{/if}">
		{$smarty.block.parent}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}
{block name="field"}
	{if $psv == 1.5}
		{if $input.type == 'html'}
			<div class="html_content15">
				{if isset($input.html_content)}{$input.html_content nofilter}{/if}
			</div>
		{else}
            {$smarty.block.parent}
		{/if}
		</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}

{block name="field"}
	{if $input.type == 'theme'}
		<div class="col-lg-{if isset($input.col)}{$input.col|intval}{else}9{/if}{if !isset($input.label)} col-lg-offset-3{/if} pspc-themes-wrp themes-wrp-{$psvd|escape:'html':'UTF-8'}">
			<div class="row">
                {foreach $input.values as $value}
                    {strip}
						<div class="col-lg-3 col-md-4 col-xs-6 theme-item {if isset($input.class)}{$input.class|escape:'html':'UTF-8'}{/if}">
							<label>
								<input type="radio"	name="{$input.name|escape:'html':'UTF-8'}" id="theme-{$value.label|escape:'html':'UTF-8'}" value="{$value.value|escape:'html':'UTF-8'}" data-theme="{rtrim($value.value, '.css')|escape:'quotes':'UTF-8'}" {if $fields_value[$input.name] == $value.value} checked="checked"{/if}{if isset($input.disabled) && $input.disabled} disabled="disabled"{/if}/>
								<img class="theme-img" src="{$value.img|escape:'html':'UTF-8'}" alt="{$value.label|escape:'html':'UTF-8'}">
							</label>
						</div>
                    {/strip}
                    {if isset($value.p) && $value.p}<p class="help-block">{$value.p|escape:'html':'UTF-8'}</p>{/if}
                {/foreach}
			</div>
		</div>
    {elseif $input.type == 'product_sources'}
		<div class="pspc-sources-wrp col-lg-9 ps{$psvd|intval}">
			<div class="checkbox">
				<label for="pspc_source_all_{$pspc_block->id|intval}">
					<input type="checkbox" id="pspc_source_all_{$pspc_block->id|intval}" name="sources[]" value="source_all" class="pspc_source_all" {if $pspc_block->source_all}checked{/if}>
					{l s='All with timers' mod='psproductcountdown'}
				</label>
				<span class="btn btn-default pspc-toggle-children-sources">{if $pspc_block->source_all}+{else}-{/if}</span>

				<div class="pspc-children-sources" {if $pspc_block->source_all}style="display: none;" {/if}>
					<div>
						<label for="pspc_source_sp_{$pspc_block->id|intval}">
							<input type="checkbox" id="pspc_source_sp_{$pspc_block->id|intval}" name="sources[]"
								   value="source_specific_prices" class="pspc_source_sp pspc_source_checkbox" {if $pspc_block->source_specific_prices || $pspc_block->source_all}checked{/if}>
							{l s='Specific prices' mod='psproductcountdown'}
						</label>
					</div>
					<div>
						<label for="pspc_source_pspc_{$pspc_block->id|intval}">
							<input type="checkbox" id="pspc_source_pspc_{$pspc_block->id|intval}" name="sources[]"
								   value="source_pspc" class="pspc_source_pspc" {if $pspc_block->source_pspc || $pspc_block->source_all}checked{/if}>
							{l s='Countdown timers' mod='psproductcountdown'}
						</label>

						{if count($pspc_all_timers)}
							<span class="btn btn-default pspc-toggle-children-sources">{if $pspc_block->source_pspc || $pspc_block->source_all}+{else}-{/if}</span>
							<div class="pspc-children-sources" {if $pspc_block->source_pspc || $pspc_block->source_all}style="display: none;" {/if}>
								{foreach from=$pspc_all_timers item="pspc"}
									<div>
										<label for="pspc_source_pspc_{$pspc_block->id|intval}_{$pspc->id|intval}">
											<input type="checkbox" id="pspc_source_pspc_{$pspc_block->id|intval}_{$pspc->id|intval}" name="sources[pspc][]"
												   value="{$pspc->id|intval}" class="pspc_source_pspc_item pspc_source_checkbox"
												   {if !$pspc_block->id || $pspc_block->source_all || $pspc_block->source_pspc || in_array($pspc->id, $pspc_selected_timers)}checked{/if}>
										</label>
									</div>
								{/foreach}
							</div>
                        {/if}
					</div>

				</div>
			</div>
		</div>
    {elseif $input.type == 'list_position'}
        <div class="col-lg-9 pspc-list-position-group">
            {if isset($input.options.query) && !$input.options.query && isset($input.empty_message)}
                {$input.empty_message|escape:'html':'UTF-8'}
                {$input.required = false}
                {$input.desc = null}
            {else}
				<select name="{$input.name|escape:'html':'utf-8'}"
						class="{if isset($input.class)}{$input.class|escape:'html':'utf-8'}{/if} fixed-width-xl"
						id="{if isset($input.id)}{$input.id|escape:'html':'utf-8'}{else}{$input.name|escape:'html':'utf-8'}{/if}"
                        {if isset($input.multiple) && $input.multiple} multiple="multiple"{/if}
                        {if isset($input.size)} size="{$input.size|escape:'html':'utf-8'}"{/if}
                        {if isset($input.onchange)} onchange="{$input.onchange|escape:'html':'utf-8'}"{/if}
                        {if isset($input.disabled) && $input.disabled} disabled="disabled"{/if}>
                    {if isset($input.options.default)}
						<option value="{$input.options.default.value|escape:'html':'utf-8'}">{$input.options.default.label|escape:'html':'utf-8'}</option>
                    {/if}
                    {if isset($input.options.optiongroup)}
                        {foreach $input.options.optiongroup.query AS $optiongroup}
							<optgroup label="{$optiongroup[$input.options.optiongroup.label]|escape:'html':'UTF-8'}">
                                {foreach $optiongroup[$input.options.options.query] as $option}
									<option value="{$option[$input.options.options.id]|escape:'html':'UTF-8'}"
                                            {if isset($input.multiple)}
                                                {foreach $fields_value[$input.name] as $field_value}
                                                    {if $field_value == $option[$input.options.options.id]}selected="selected"{/if}
                                                {/foreach}
                                            {else}
                                                {if $fields_value[$input.name] == $option[$input.options.options.id]}selected="selected"{/if}
                                            {/if}
									>{$option[$input.options.options.name]|escape:'html':'UTF-8'}</option>
                                {/foreach}
							</optgroup>
                        {/foreach}
                    {else}
                        {foreach $input.options.query AS $option}
                            {if is_object($option)}
								<option value="{$option->$input.options.id|escape:'html':'UTF-8'}"
                                        {if isset($input.multiple)}
                                            {foreach $fields_value[$input.name] as $field_value}
                                                {if $field_value == $option->$input.options.id}
													selected="selected"
                                                {/if}
                                            {/foreach}
                                        {else}
                                            {if $fields_value[$input.name] == $option->$input.options.id}
												selected="selected"
                                            {/if}
                                        {/if}
								>{$option->$input.options.name|escape:'html':'UTF-8'}</option>
                            {elseif $option == "-"}
								<option value="">-</option>
                            {else}
								<option value="{$option[$input.options.id]|escape:'html':'UTF-8'}"
                                        {if isset($input.multiple)}
                                            {foreach $fields_value[$input.name] as $field_value}
                                                {if $field_value == $option[$input.options.id]}
													selected="selected"
                                                {/if}
                                            {/foreach}
                                        {else}
                                            {if $fields_value[$input.name] == $option[$input.options.id]}
												selected="selected"
                                            {/if}
                                        {/if}
								>{$option[$input.options.name]|escape:'html':'UTF-8'}</option>

                            {/if}
                        {/foreach}
                    {/if}
				</select>
            {/if}
            {if isset($input.addon) && is_array($input.addon)}
				<select name="{$input.addon.name|escape:'html':'UTF-8'}" class="pspc-select-addon">
					{foreach from=$input.addon.options.query item='option'}
						<option value="{$option[$input.addon.options.id]|escape:'html':'UTF-8'}" {if $fields_value[$input.addon.name] == $option[$input.addon.options.id]}selected="selected"{/if}>
							{$option[$input.addon.options.name]|escape:'html':'UTF-8'}
						</option>
					{/foreach}
				</select>
            {/if}
		</div>
    {elseif $input.type == 'custom_switch'}
		<div class="col-lg-9">
			<span class="switch prestashop-switch fixed-width-lg">
				{foreach $input.values as $value}
					<input type="radio" name="{$input.name|escape:'html':'UTF-8'}" id="{$value.id|escape:'html':'UTF-8'}" value="{$value.value|escape:'html':'UTF-8'}" {if $fields_value[$input.name] == $value.value} checked="checked"{/if}{if (isset($input.disabled) && $input.disabled) or (isset($value.disabled) && $value.disabled)} disabled="disabled"{/if}/>
					{strip}
						<label for="{$value.id|escape:'html':'UTF-8'}">
							{$value.label|escape:'html':'UTF-8'}
						</label>
					{/strip}
				{/foreach}
				<a class="slide-button btn"></a>
			</span>
		</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}
