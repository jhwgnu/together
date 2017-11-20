<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/tpl','_header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/resource/tpl/insert/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/resource/ruleset/insertResource.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" class="x_form-horizontal" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertResource" />
	<input type="hidden" name="module" value="resource" />
	<input type="hidden" name="act" value="procResourceAdminInsert" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/resource/tpl/insert/1" />
	<?php if($__Context->mid || $__Context->module_srl){ ?><input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" /><?php } ?>
	<?php if($__Context->logged_info->is_admin=='Y'){ ?><div class="x_control-group">
		<label class="x_control-label" for="mid"><?php echo $__Context->lang->mid ?></label>
		<div class="x_controls">
			<input type="text" name="resource_name" id="mid" value="<?php echo $__Context->module_info->mid ?>" />
			<a href="#about_mid" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_mid" hidden><?php echo $__Context->lang->about_mid ?></p>
		</div>
	</div><?php } ?>
	<div class="x_control-group">
		<label class="x_control-label" for="module_category_srl"><?php echo $__Context->lang->module_category ?></label>
		<div class="x_controls">
			<select name="module_category_srl" id="module_category_srl">
				<option value="0"><?php echo $__Context->lang->notuse ?></option>
				<?php if($__Context->module_category&&count($__Context->module_category))foreach($__Context->module_category as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->module_category_srl==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<a href="#about_module_category" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_module_category" hidden><?php echo $__Context->lang->about_module_category ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->browser_title ?></label>
		<div class="x_controls">
			<input type="text" name="browser_title" id="browser_title" class="lang_code" value="<?php if(strpos($__Context->module_info->browser_title, '$user_lang->') === false){;
echo $__Context->module_info->browser_title;
}else{;
echo htmlspecialchars($__Context->module_info->browser_title);
} ?>" />
			<a href="#about_browser_title" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_browser_title" hidden><?php echo $__Context->lang->about_browser_title ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="layout_srl"><?php echo $__Context->lang->layout ?></label>
		<div class="x_controls">
			<select name="layout_srl" id="layout_srl">
				<option value="0"><?php echo $__Context->lang->notuse ?></option>
				<?php if($__Context->layout_list&&count($__Context->layout_list))foreach($__Context->layout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->layout_srl==$__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?>(<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
			<a href="#about_layout" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_layout" hidden><?php echo $__Context->lang->about_layout ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="skin"><?php echo $__Context->lang->skin ?></label>
		<div class="x_controls">
			<select name="skin" id="skin">
				<?php if($__Context->skin_list&&count($__Context->skin_list))foreach($__Context->skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->skin==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<a href="#about_skin" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_skin" hidden><?php echo $__Context->lang->about_skin ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="use_mobile"><?php echo $__Context->lang->mobile_view ?></label>
		<div class="x_controls">
			<label for="use_mobile" class="x_inline">
				<input type="checkbox" name="use_mobile" id="use_mobile" value="Y"<?php if($__Context->module_info->use_mobile == 'Y'){ ?> checked="checked"<?php } ?> />
				<?php echo $__Context->lang->about_mobile_view ?>
			</label>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mlayout_srl"><?php echo $__Context->lang->mobile_layout ?></label>
		<div class="x_controls">
			<select name="mlayout_srl" id="mlayout_srl">
				<option value="0"><?php echo $__Context->lang->notuse ?></option>
				<?php if($__Context->mlayout_list&&count($__Context->mlayout_list))foreach($__Context->mlayout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->mlayout_srl==$__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?>(<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
			<a href="#about_mobile_layout" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_mobile_layout" hidden><?php echo $__Context->lang->about_layout ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mskin"><?php echo $__Context->lang->mobile_skin ?></label>
		<div class="x_controls">
			<select name="mskin" id="mskin">
				<?php if($__Context->mskin_list&&count($__Context->mskin_list))foreach($__Context->mskin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->mskin==$__Context->key ||(!$__Context->module_info->mskin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<a href="#about_mobile_skin" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_mobile_skin" hidden><?php echo $__Context->lang->about_skin ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="resource_use_path"><?php echo $__Context->lang->resource_use_path ?></label>
		<div class="x_controls">
			<label for="resource_use_path" class="x_inline">
				<input type="checkbox" name="resource_use_path" id="resource_use_path" value="Y"<?php if($__Context->module_info->resource_use_path=='Y'){ ?> checked="checked"<?php } ?> />
				<?php echo $__Context->lang->about_resource_use_path ?>
			</label>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="list_count"><?php echo $__Context->lang->list_count ?></label>
		<div class="x_controls">
			<input type="number" name="list_count" id="list_count" value="<?php echo $__Context->module_info->list_count?$__Context->module_info->list_count:20 ?>"   />
			<a href="#about_list_count" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_list_count" hidden><?php echo $__Context->lang->about_list_count ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="resource_notify_mail"><?php echo $__Context->lang->resource_notify_mail ?></label>
		<div class="x_controls">
			<input type="email" name="resource_notify_mail" id="resource_notify_mail" value="<?php echo htmlspecialchars($__Context->module_info->resource_notify_mail) ?>" />
			<a href="#about_resource_notify_mail" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_resource_notify_mail" hidden><?php echo $__Context->lang->about_resource_notify_mail ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="description"><?php echo $__Context->lang->description ?></label>
		<div class="x_controls">
			<textarea name="description" id="description" rows="4" cols="42" style="vertical-align:top"><?php echo htmlspecialchars($__Context->module_info->description) ?></textarea>
			<a href="#about_description" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_description" hidden><?php echo $__Context->lang->about_description ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="lang_header_text"><?php echo $__Context->lang->header_text ?></label>
		<div class="x_controls">
			<textarea name="header_text" id="header_text" rows="4" cols="42" class="lang_code"><?php if(strpos($__Context->module_info->header_text, '$user_lang->') === false){;
echo $__Context->module_info->header_text;
}else{;
echo htmlspecialchars($__Context->module_info->header_text);
} ?></textarea>
			<a href="#about_header_text" class="x_icon-question-sign" data-toggle style="vertical-align:top;margin-top:5px"><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_header_text" hidden><?php echo $__Context->lang->about_header_text ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="lang_footer_text"><?php echo $__Context->lang->footer_text ?></label>
		<div class="x_controls">
			<textarea name="footer_text" id="footer_text" rows="4" cols="42" class="lang_code"><?php if(strpos($__Context->module_info->footer_text, '$user_lang->') === false){;
echo $__Context->module_info->footer_text;
}else{;
echo htmlspecialchars($__Context->module_info->footer_text);
} ?></textarea>
			<a href="#about_footer_text" class="x_icon-question-sign" data-toggle style="vertical-align:top;margin-top:5px"><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_footer_text" hidden><?php echo $__Context->lang->about_footer_text ?></p>
		</div>
	</div>
	<div class="btnArea">
		<?php if($__Context->module == 'admin'){ ?><a class="x_btn x_pull-left" href="<?php echo getUrl('act', 'dispResourceAdminList', 'module_srl', '') ?>"><?php echo $__Context->lang->cmd_back ?></a><?php } ?>
		<?php if(!$__Context->module){ ?><a class="x_btn x_pull-left" href="<?php echo getUrl('act', '') ?>"><?php echo $__Context->lang->cmd_back ?></a><?php } ?>
		<input class="x_btn  x_btn-primary" type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" />
	</div>
</form>
