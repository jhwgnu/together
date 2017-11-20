<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/guestbook/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/guestbook/tpl/index/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/guestbook/ruleset/insertGuestbook.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post"  enctype="multipart/form-data" id="fo_insert_guestbook" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertGuestbook" />
	<input type="hidden" name="act" value="procGuestbookAdminInsertGuestbook" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
	<?php if($__Context->logged_info->is_admin!='Y'){ ?><input type="hidden" name="guestbook_name" value="<?php echo $__Context->module_info->mid ?>" /><?php } ?>
	<input type="hidden" name="xe_validator_id" value="modules/guestbook/tpl/index/1" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	<?php if($__Context->logged_info->is_admin=='Y'){ ?><div class="x_control-group">
		<label for="guestbook_name" class="x_control-label"><?php echo $__Context->lang->mid ?></label>
		<div class="x_controls">
			<input type="text" name="guestbook_name" id="guestbook_name" value="<?php echo $__Context->module_info->mid ?>" />
			<a href="#about_mid" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_mid" hidden><?php echo $__Context->lang->about_mid ?></p>
		</div>
	</div><?php } ?>
	<div class="x_control-group">
		<label for="module_category_srl" class="x_control-label"><?php echo $__Context->lang->module_category ?></label>
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
		<label for="lang_browser_title" class="x_control-label"><?php echo $__Context->lang->browser_title ?></label>
		<div class="x_controls">
			<input type="text" name="browser_title" value="<?php if(strpos($__Context->module_info->browser_title, '$user_lang->') === false){;
echo $__Context->module_info->browser_title;
}else{;
echo htmlspecialchars($__Context->module_info->browser_title);
} ?>" class="lang_code" id="browser_title" />
			<a href="#about_browser_title" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_browser_title" hidden><?php echo $__Context->lang->about_browser_title ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="layout_srl" class="x_control-label"><?php echo $__Context->lang->layout ?></label>
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
		<label for="skin" class="x_control-label"><?php echo $__Context->lang->skin ?></label>
		<div class="x_controls">
			<select name="skin" id="skin">
				<?php if($__Context->skin_list&&count($__Context->skin_list))foreach($__Context->skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->skin==$__Context->key || (!$__Context->module_info->skin && $__Context->key=='xe_guestbook_official')){ ?> selected="selected"<?php } ?> ><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<a href="#about_skin" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_skin" hidden><?php echo $__Context->lang->about_skin ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="use_mobile" class="x_control-label"><?php echo $__Context->lang->mobile_view ?></label>
		<div class="x_controls">
			<label for="use_mobile">
				<input type="checkbox" name="use_mobile" id="use_mobile" value="Y"<?php if($__Context->module_info->use_mobile == 'Y'){ ?> checked="checked"<?php } ?> /> 
				<?php echo $__Context->lang->about_mobile_view ?>
			</label>
		</div>
	</div>
	<div class="x_control-group">
		<label for="mlayout_srl" class="x_control-label"><?php echo $__Context->lang->mobile_layout ?></label>
		<div class="x_controls">
			<select name="mlayout_srl" id="mlayout_srl">
				<option value="0"><?php echo $__Context->lang->notuse ?></option>
				<?php if($__Context->mlayout_list&&count($__Context->mlayout_list))foreach($__Context->mlayout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->mlayout_srl== $__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?>(<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
			<a href="#about_mobile_layout" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_mobile_layout" hidden><?php echo $__Context->lang->about_layout ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="mskin" class="x_control-label"><?php echo $__Context->lang->mobile_skin ?></label>
		<div class="x_controls">
			<select name="mskin" id="mskin">
				<?php if($__Context->mskin_list&&count($__Context->mskin_list))foreach($__Context->mskin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->mskin== $__Context->key || (!$__Context->module_info->skin && $__Context->key=='xe_faq')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<a href="#about_mobile_skin" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_mobile_skin" hidden><?php echo $__Context->lang->about_skin ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="order_target" class="x_control-label"><?php echo $__Context->lang->order_target ?></label>
		<div class="x_controls">
			<select name="order_target" id="order_target">
				<?php if($__Context->order_target&&count($__Context->order_target))foreach($__Context->order_target as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->order_target == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label for="order_type" class="x_control-label"><?php echo $__Context->lang->order_type ?></label>
		<div class="x_controls">
			<select name="order_type" id="order_type">
				<option value="asc"<?php if($__Context->module_info->order_type != 'desc'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->order_asc ?>(ex: 1, 2, 3)</option>
				<option value="desc"<?php if($__Context->module_info->order_type == 'desc'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->order_desc ?>(ex: 3, 2, 1)</option>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label for="list_count" class="x_control-label"><?php echo $__Context->lang->list_count ?></label>
		<div class="x_controls">
			<input type="number" name="list_count" id="list_count" value="<?php echo $__Context->module_info->list_count?$__Context->module_info->list_count:20 ?>" />
			<a href="#about_list_count" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_list_count" hidden><?php echo $__Context->lang->about_list_count ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="page_count" class="x_control-label"><?php echo $__Context->lang->page_count ?></label>
		<div class="x_controls">
			<input type="number" name="page_count" id="page_count" value="<?php echo $__Context->module_info->page_count?$__Context->module_info->page_count:10 ?>" />
			<a href="#about_page_count" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_page_count" hidden><?php echo $__Context->lang->about_page_count ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="lang_header_text" class="x_control-label"><?php echo $__Context->lang->header_text ?></label>
		<div class="x_controls">
			<?php $__Context->use_multilang_textarea = true ?>
			<textarea name="header_text" id="header_text" class="lang_code" rows="4" cols="42"><?php if(strpos($__Context->module_info->header_text, '$user_lang->') === false){;
echo $__Context->module_info->header_text;
}else{;
echo htmlspecialchars($__Context->module_info->header_text);
} ?></textarea>
			<a href="#about_header_text" class="x_icon-question-sign" data-toggle style="vertical-align:top;margin-top:5px"><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_header_text" hidden><?php echo $__Context->lang->about_header_text ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="lang_footer_text" class="x_control-label"><?php echo $__Context->lang->footer_text ?></label>
		<div class="x_controls">
			<textarea name="footer_text" id="footer_text" class="lang_code" rows="4" cols="42"><?php if(strpos($__Context->module_info->footer_text, '$user_lang->') === false){;
echo $__Context->module_info->footer_text;
}else{;
echo htmlspecialchars($__Context->module_info->footer_text);
} ?></textarea>
			<a href="#about_footer_text" class="x_icon-question-sign" data-toggle style="vertical-align:top;margin-top:5px"><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_footer_text" hidden><?php echo $__Context->lang->about_footer_text ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="description" class="x_control-label"><?php echo $__Context->lang->description ?></label>
		<div class="x_controls">
			<textarea name="description" id="description" style="vertical-align:top"><?php echo $__Context->module_info->description ?></textarea>
			<a href="#about_description" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
			<p class="x_help-block" id="about_description" hidden><?php echo $__Context->lang->about_description ?></p>
		</div>
	</div>
	<div class="btnArea">
		<?php if($__Context->module === 'admin'){ ?><a href="<?php echo getUrl('act','dispGuestbookAdminContent','module_srl','') ?>" class="x_btn x_pull-left"><?php echo $__Context->lang->cmd_back ?></a><?php } ?>
		<span class="x_pull-right">
			<input type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" class="x_btn x_btn-primary" />
		</span>
	</div>
</form>
