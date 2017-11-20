<?php if(!defined("__XE__"))exit;?>
<!--#Meta:modules/xewall/tpl/js/spectrum/spectrum.js--><?php $__tmp=array('modules/xewall/tpl/js/spectrum/spectrum.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/xewall/tpl/js/spectrum/spectrum.css--><?php $__tmp=array('modules/xewall/tpl/js/spectrum/spectrum.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/xewall/tpl/js/module_insert.js--><?php $__tmp=array('modules/xewall/tpl/js/module_insert.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/xewall/tpl/css/module_insert.css--><?php $__tmp=array('modules/xewall/tpl/css/module_insert.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/xewall/tpl','header.html') ?>
<div id="module_config_dialog_box">
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/xewall/ruleset/insertXewallModule.xml", FALSE, "", 0, "body", TRUE, "") ?><form  class="x_form-horizontal" action="./" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertXewallModule" />
	<input type="hidden" name="module" value="xewall" />
	<input type="hidden" name="act" value="procXewallAdminInsertModule" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
	<?php if($__Context->mid || $__Context->module_srl){ ?><input type="hidden" name="success_return_url" value="<?php echo getNotEncodedUrl('', 'module', 'admin', 'act', 'dispXewallAdminModuleList') ?>" /><?php } ?>
	<section class="section">
		<h1><?php echo $__Context->lang->subtitle_primary ?></h1>
		<?php if($__Context->logged_info->is_admin == 'Y'){ ?><div class="x_control-group">
			<label class="x_control-label" for="module_mid"><?php echo $__Context->lang->mid ?></label>
			<div class="x_controls">
				<input type="text" name="module_mid" id="module_mid" value="<?php echo $__Context->module_info->mid ?>" />
				<a href="#module_name_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="module_name_help" class="x_help-block" hidden><?php echo $__Context->lang->about_mid ?></p>
			</div>
		</div><?php } ?>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->browser_title ?></label>
			<div class="x_controls">
				<input type="text" name="browser_title" id="browser_title" value="<?php if(strpos($__Context->module_info->browser_title, '$user_lang->') === false){;
echo $__Context->module_info->browser_title;
}else{;
echo htmlspecialchars($__Context->module_info->browser_title);
} ?>" class="lang_code" />
				<a href="#browser_title_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="browser_title_help" class="x_help-block" hidden><?php echo $__Context->lang->about_browser_title ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="layout_srl"><?php echo $__Context->lang->layout ?></label>
			<div class="x_controls">
				<select name="layout_srl" id="layout_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->layout_list&&count($__Context->layout_list))foreach($__Context->layout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->layout_srl== $__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
				</select>
				<a href="#layout_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="layout_help" class="x_help-block" hidden><?php echo $__Context->lang->about_layout ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="skin"><?php echo $__Context->lang->skin ?></label>
			<div class="x_controls">
				<select name="skin" id="skin" style="width:auto">
					<?php if($__Context->skin_list&&count($__Context->skin_list))foreach($__Context->skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->skin== $__Context->key || (!$__Context->module_info->skin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_header_text"><?php echo $__Context->lang->header_text ?></label>
			<div class="x_controls">
				<textarea name="header_text" id="header_text" class="lang_code" rows="8" cols="42" placeholder="<?php echo $__Context->lang->about_header_text ?>"><?php if(strpos($__Context->module_info->header_text, '$user_lang->') === false){;
echo $__Context->module_info->header_text;
}else{;
echo htmlspecialchars($__Context->module_info->header_text);
} ?></textarea>
				<a href="#header_text_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="header_text_help" class="x_help-block" hidden><?php echo $__Context->lang->about_header_text ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_footer_text"><?php echo $__Context->lang->footer_text ?></label>
			<div class="x_controls">
				<textarea name="footer_text" id="footer_text" class="lang_code" rows="8" cols="42" placeholder="<?php echo $__Context->lang->about_footer_text ?>"><?php if(strpos($__Context->module_info->footer_text, '$user_lang->') === false){;
echo $__Context->module_info->footer_text;
}else{;
echo htmlspecialchars($__Context->module_info->footer_text);
} ?></textarea>
				<a href="#footer_text_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="footer_text_help" class="x_help-block" hidden><?php echo $__Context->lang->about_footer_text ?></p>
			</div>
		</div>
	</section>
	<section class="section">
		<h1><?php echo $__Context->lang->mobile_settings ?></h1>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->mobile_view ?></label>
			<div class="x_controls">
				<label class="x_inline" for="use_mobile"><input type="checkbox" name="use_mobile" id="use_mobile" value="Y"<?php if($__Context->module_info->use_mobile == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->about_mobile_view ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mlayout_srl"><?php echo $__Context->lang->mobile_layout ?></label>
			<div class="x_controls">
				<select name="mlayout_srl" id="mlayout_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->mlayout_list&&count($__Context->mlayout_list))foreach($__Context->mlayout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->mlayout_srl== $__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
				</select>
				<a href="#mobile_layout_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="mobile_layout_help" class="x_help-block" hidden><?php echo $__Context->lang->about_layout ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mskin"><?php echo $__Context->lang->mobile_skin ?></label>
			<div class="x_controls">
				<select name="mskin" id="mskin">
					<?php if($__Context->mskin_list&&count($__Context->mskin_list))foreach($__Context->mskin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->mskin== $__Context->key || (!$__Context->module_info->skin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
				<a href="#mobile_skin_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="mobile_skin_help" class="x_help-block" hidden><?php echo $__Context->lang->about_skin ?></p>
			</div>
		</div>
	</section>
	
	<section clsss="section">
		<h1><?php echo $__Context->lang->feed_configuration ?></h1>
		<input type="hidden" id="str_available_module_list" name="str_available_module_list" value="<?php echo $__Context->module_info->str_available_module_list ?>" />
		<input type="hidden" id="str_available_module_list_color_code" name="str_available_module_list_color_code" value="<?php echo $__Context->module_info->str_available_module_list_color_code ?>" />
		<input type="hidden" id="str_default_module_list" name="str_default_module_list" value="<?php echo $__Context->module_info->str_default_module_list ?>" />
		<input type="hidden" id="str_default_module_list_color_code" name="str_default_module_list_color_code" value="<?php echo $__Context->module_info->str_default_module_list_color_code ?>" />
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->feed_configuration ?></label>
			<div class="x_controls">
				<?php echo $__Context->lang->feed_configuration_help ?>
				<div class="module_select_box" align="center">
					<table>
						<tr>
							<th><b><?php echo $__Context->lang->no_use_boards ?></b></th>
							<th><b><?php echo $__Context->lang->available_boards ?></b></th>
							<th><b><?php echo $__Context->lang->default_boards ?></b></th>
						</tr>
						<tr>
							<td><?php echo $__Context->lang->no_use_boards_desc ?></td>
							<td><?php echo $__Context->lang->available_boards_desc ?></td>
							<td><?php echo $__Context->lang->default_boards_desc ?></td>
						</tr>
						<tr>
							<td>
								<ul id="sortable1" class="connectedSortable">
									<?php if($__Context->module_list&&count($__Context->module_list))foreach($__Context->module_list as $__Context->module){ ?><li
										class="items item_<?php echo $__Context->module->module_srl ?>"
									<?php if($__Context->xewall_color_config[$__Context->module->module_srl]){ ?>	color-code="<?php echo $__Context->xewall_color_config[$__Context->module->module_srl] ?>"<?php } ?>
									<?php if(!$__Context->xewall_color_config[$__Context->module->module_srl]){ ?>	color-code="F5F7F7"<?php } ?>
										module_srl="<?php echo $__Context->module->module_srl ?>"><?php echo $__Context->module->browser_title ?> (<?php echo $__Context->module->mid ?>) </li><?php } ?>
								</ul>
							</td>
							<td>
								<ul id="sortable2" class="connectedSortable">
									<?php if($__Context->available_module_list&&count($__Context->available_module_list))foreach($__Context->available_module_list as $__Context->module){ ?><li
										class="items item_<?php echo $__Context->module->module_srl ?>"
									<?php if($__Context->xewall_color_config[$__Context->module->module_srl]){ ?>	color-code="<?php echo $__Context->xewall_color_config[$__Context->module->module_srl] ?>"<?php } ?>
									<?php if(!$__Context->xewall_color_config[$__Context->module->module_srl]){ ?>	color-code="F5F7F7"<?php } ?>
										module_srl="<?php echo $__Context->module->module_srl ?>"><?php echo $__Context->module->browser_title ?> (<?php echo $__Context->module->mid ?>) </li><?php } ?>
								</ul>
							</td>
							<td>
								<ul id="sortable3" class="connectedSortable">
									<?php if($__Context->default_module_list&&count($__Context->default_module_list))foreach($__Context->default_module_list as $__Context->module){ ?><li
										class="items item_<?php echo $__Context->module->module_srl ?>"
									<?php if($__Context->xewall_color_config[$__Context->module->module_srl]){ ?>	color-code="<?php echo $__Context->xewall_color_config[$__Context->module->module_srl] ?>"<?php } ?>
									<?php if(!$__Context->xewall_color_config[$__Context->module->module_srl]){ ?>	color-code="F5F7F7"<?php } ?>
										module_srl="<?php echo $__Context->module->module_srl ?>"><?php echo $__Context->module->browser_title ?> (<?php echo $__Context->module->mid ?>) </li><?php } ?>
								</ul>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section">
		<h1><?php echo $__Context->lang->navigation_configuration ?></h1>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->sorting_configuration ?></label>
			<div class="x_controls">
				<p class="x_help-inline"><?php echo $__Context->lang->sorting_configuration_help ?></p>
				<label for="document_srl"><input type="radio" name="doc_sort_index" id="document_srl" value="document_srl"<?php if(!$__Context->module_info->doc_sort_index||$__Context->module_info->doc_sort_index=='document_srl'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->sort_by_document_srl ?></label>
				<label for="regdate"><input type="radio" name="doc_sort_index" id="regdate" value="regdate"<?php if($__Context->module_info->doc_sort_index=='regdate'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->sort_by_regdate ?></label>
				<label for="last_update"><input type="radio" name="doc_sort_index" id="last_update" value="last_update"<?php if($__Context->module_info->doc_sort_index=='last_update'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->sort_by_update ?></label>
				<label for="list_order"><input type="radio" name="doc_sort_index" id="list_order" value="list_order"<?php if($__Context->module_info->doc_sort_index=='list_order'){ ?> checked="checked"<?php } ?> /> list_order</label>
				<label for="update_order"><input type="radio" name="doc_sort_index" id="update_order" value="update_order"<?php if($__Context->module_info->doc_sort_index=='update_order'){ ?> checked="checked"<?php } ?> /> update_order</label>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->sort_order ?></label>
			<div class="x_controls">
				<p class="x_help-inline"><?php echo $__Context->lang->sort_order_help ?></p>
				<label for="doc_order_type_asc"><input type="radio" name="doc_order_type" id="doc_order_type_asc" value="asc"<?php if(!$__Context->module_info->doc_order_type||$__Context->module_info->doc_order_type=='asc'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->ascending ?></label>
				<label for="doc_order_type_desc"><input type="radio" name="doc_order_type" id="doc_order_type_desc" value="desc"<?php if($__Context->module_info->doc_order_type=='desc'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->decending ?></label>
			</div>
		</div>
		
		<div class="x_control-group">
			<label for="doc_list_count" class="x_control-label"><?php echo $__Context->lang->list_count ?></label>
			<div class="x_controls">
				<p class="x_help-inline"><?php echo $__Context->lang->list_count_help ?></p>
				<input type="text" name="doc_list_count" id="doc_list_count" value="<?php echo $__Context->module_info->doc_list_count?$__Context->module_info->doc_list_count:20 ?>" style="width:30px" />
			</div>
		</div>
	</section>
	
	
	<section class="section">
		<h1><?php echo $__Context->lang->editor_configuration ?></h1>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->file_upload ?></label>
			<div class="x_controls">
				<label for="allow_fileupload_Y"><input type="radio" id="allow_fileupload_Y" name="allow_fileupload" value="Y"<?php if($__Context->module_info->allow_fileupload=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->allow ?></label>
				<label for="allow_fileupload_N"><input type="radio" id="allow_fileupload_N" name="allow_fileupload" value="N"<?php if($__Context->module_info->allow_fileupload=='N'||!$__Context->module_info->allow_fileupload){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->not_allow ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->auto_save ?></label>
			<div class="x_controls">
				<label for="enable_autosave_Y"><input type="radio" id="enable_autosave_Y" name="enable_autosave" value="Y"<?php if($__Context->module_info->enable_autosave=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->allow ?></label>
				<label for="enable_autosave_N"><input type="radio" id="enable_autosave_N" name="enable_autosave" value="N"<?php if($__Context->module_info->enable_autosave=='N'||!$__Context->module_info->enable_autosave){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->not_allow ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->default_component ?></label>
			<div class="x_controls">
				<label for="enable_default_component_Y"><input type="radio" id="enable_default_component_Y" name="enable_default_component" value="Y"<?php if($__Context->module_info->enable_default_component=='Y'||!$__Context->module_info->enable_default_component){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->allow ?></label>
				<label for="enable_default_component_N"><input type="radio" id="enable_default_component_N" name="enable_default_component" value="N"<?php if($__Context->module_info->enable_default_component=='N'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->not_allow ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->extended_component ?></label>
			<div class="x_controls">
				<label for="enable_component_Y"><input type="radio" id="enable_component_Y" name="enable_component" value="Y"<?php if($__Context->module_info->enable_component=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->allow ?></label>
				<label for="enable_component_N"><input type="radio" id="enable_component_N" name="enable_component" value="N"<?php if($__Context->module_info->enable_component=='N'||!$__Context->module_info->enable_component){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->not_allow ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->editor_size_change ?></label>
			<div class="x_controls">
				<label for="resizable_Y"><input type="radio" id="resizable_Y" name="resizable" value="Y"<?php if($__Context->module_info->resizable=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->allow ?></label>
				<label for="resizable_N"><input type="radio" id="resizable_N" name="resizable" value="N"<?php if($__Context->module_info->resizable=='N'||!$__Context->module_info->resizable){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->not_allow ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->html_disable ?></label>
			<div class="x_controls">
				<label for="disable_html_Y"><input type="radio" id="disable_html_Y" name="disable_html" value="Y"<?php if($__Context->module_info->disable_html=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->allow ?></label>
				<label for="disable_html_N"><input type="radio" id="disable_html_N" name="disable_html" value="N"<?php if($__Context->module_info->disable_html=='N'||!$__Context->module_info->disable_html){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->not_allow ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="height"><?php echo $__Context->lang->height ?></label>
			<div class="x_controls">
				<input type="text" id="height" name="height"<?php if(!$__Context->module_info->height){ ?> value="95"<?php };
if($__Context->module_info->height){ ?> value="<?php echo $__Context->module_info->height ?>"<?php } ?> style="width:30px" /> <span>px</span>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="editor_skin"><?php echo $__Context->lang->skin ?></label>
			<div class="x_controls">
				<select type="checkbox" id="editor_skin" name="editor_skin">
					<?php if($__Context->module_info->editor_skin){ ?>
						<?php if($__Context->editor_skin_list&&count($__Context->editor_skin_list))foreach($__Context->editor_skin_list as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->editor_skin==$__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
					<?php } ?>
					<?php if(!$__Context->module_info->editor_skin){ ?>
						<?php if($__Context->editor_skin_list&&count($__Context->editor_skin_list))foreach($__Context->editor_skin_list as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->val=='xpresseditor'){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
					<?php } ?>
				</select>
			</div>
		</div>
	</section>
	
	
	
	<section class="section">
		<h1><?php echo $__Context->lang->action_configuration ?></h1>
		<div class="x_control-group">
			<label class="x_control-label" for="refresh_rate"><?php echo $__Context->lang->timer_frequency ?></label>
			<div class="x_controls">
				<input type="text" id="refresh_rate" name="refresh_rate"<?php if($__Context->module_info->refresh_rate){ ?> value="<?php echo $__Context->module_info->refresh_rate ?>"<?php };
if(!$__Context->module_info->refresh_rate){ ?> value="60"<?php } ?> style="width:30px" /> <span><?php echo $__Context->lang->sec ?></span>
				<p><?php echo $__Context->lang->sec_desc ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="doc_summary"><?php echo $__Context->lang->document_summary ?></label>
			<div class="x_controls">
				<input type="text" id="doc_summary" name="doc_summary"<?php if($__Context->module_info->doc_summary){ ?> value="<?php echo $__Context->module_info->doc_summary ?>"<?php };
if(!$__Context->module_info->doc_summary){ ?> value="500"<?php } ?> style="width:30px" /> <span><?php echo $__Context->lang->letter_amount ?></span>
				<p><?php echo $__Context->lang->document_summary_desc ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="doc_more"><?php echo $__Context->lang->document_see_more_content ?></label>
			<div class="x_controls">
				<input type="text" id="doc_more" name="doc_more"<?php if($__Context->module_info->doc_more){ ?> value="<?php echo $__Context->module_info->doc_more ?>"<?php };
if(!$__Context->module_info->doc_more){ ?> value="(more...)"<?php } ?> /></span>
				<p><?php echo $__Context->lang->document_see_more_content_desc ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="com_summary"><?php echo $__Context->lang->comment_summary ?></label>
			<div class="x_controls">
				<input type="text" id="com_summary" name="com_summary"<?php if($__Context->module_info->com_summary){ ?> value="<?php echo $__Context->module_info->com_summary ?>"<?php };
if(!$__Context->module_info->com_summary){ ?> value="500"<?php } ?> style="width:30px" /> <span><?php echo $__Context->lang->letter_amount ?></span>
				<p><?php echo $__Context->lang->comment_summary_desc ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="com_more"><?php echo $__Context->lang->comment_see_more_content ?></label>
			<div class="x_controls">
				<input type="text" id="com_more" name="com_more"<?php if($__Context->module_info->com_more){ ?> value="<?php echo $__Context->module_info->com_more ?>"<?php };
if(!$__Context->module_info->com_more){ ?> value="(more...)"<?php } ?> />
				<p><?php echo $__Context->lang->comment_see_more_content_desc ?></p>
			</div>
		</div>
	</section>
	<div class="x_clearfix btnArea">
		<div class="x_pull-left">
			<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispXewallAdminModuleList') ?>" type="button" class="x_btn"><?php echo $__Context->lang->cmd_cancel ?></a>
		</div>
		<div class="x_pull-right">
			<button class="x_btn x_btn-primary" type="submit"><?php echo $__Context->lang->cmd_registration ?></button>
		</div>
	</div>
</form>
<style>.g11n{vertical-align:top !important}</style>
