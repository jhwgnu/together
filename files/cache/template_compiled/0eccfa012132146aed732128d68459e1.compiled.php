<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/communication/tpl/js/communication_admin.js--><?php $__tmp=array('modules/communication/tpl/js/communication_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/module/tpl/js/module_admin.js--><?php $__tmp=array('modules/module/tpl/js/module_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/editor/tpl/js/editor_module_config.js--><?php $__tmp=array('modules/editor/tpl/js/editor_module_config.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1>
		<?php echo $__Context->lang->communication ?> <?php echo $__Context->lang->cmd_management ?>
		<a href="#aboutCommunication" class="x_pull-right x_icon-question-sign" data-toggle style="margin-top:13px"><?php echo $__Context->lang->help ?></a>
	</h1>
</div>
<p class="x_alert x_alert-info" id="aboutCommunication" hidden><?php echo nl2br($__Context->lang->about_communication) ?></p>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/communication/tpl/index/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/communication/ruleset/insertConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertConfig" />
	<input type="hidden" name="module" value="communication" />
	<input type="hidden" name="act" value="procCommunicationAdminInsertConfig">
	<input type="hidden" name="xe_validator_id" value="modules/communication/tpl/index/1" />
	<div class="x_control-group">
		<label class="x_control-label" for="editor_skin"><?php echo $__Context->lang->editor_skin ?></label>
		<div class="x_controls">
			<select name="editor_skin" id="editor_skin" onchange="getEditorSkinColorList(this.value)">
				<?php if($__Context->editor_skin_list&&count($__Context->editor_skin_list))foreach($__Context->editor_skin_list as $__Context->editor_skin){ ?><option value="<?php echo $__Context->editor_skin ?>"<?php if($__Context->editor_skin==$__Context->communication_config->editor_skin){ ?> selected="selected"<?php } ?>><?php echo $__Context->editor_skin ?></option><?php } ?>
			</select>
			<select name="sel_editor_colorset" style="display:none">
			</select>
			<script>
			//<![CDATA[
				getEditorSkinColorList('<?php echo $__Context->communication_config->editor_skin ?>','<?php echo $__Context->communication_config->editor_colorset ?>');
			//]]>
			</script>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="layout"><?php echo $__Context->lang->layout ?></label>
		<div class="x_controls">
			<select id="layout" name="layout_srl" style="width:auto">
				<option value="0"><?php echo $__Context->lang->notuse ?></option>
				<?php if($__Context->layout_list&&count($__Context->layout_list))foreach($__Context->layout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->val->layout_srl == $__Context->communication_config->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="skin"><?php echo $__Context->lang->skin ?></label>
		<div class="x_controls">
			<select name="skin" id="skin" style="width:auto" onchange="doGetSkinColorset(this.options[this.selectedIndex].value, 'P')">
				<?php if($__Context->communication_skin_list&&count($__Context->communication_skin_list))foreach($__Context->communication_skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->key==$__Context->communication_config->skin){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group" id="__skin_colorset">
		<label class="x_control-label"><?php echo $__Context->lang->colorset ?></label>
		<div class="x_controls">
			<div id="communication_colorset"></div>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mlayout_srl"><?php echo $__Context->lang->mobile_layout ?></label>
		<div class="x_controls">
			<select id="mlayout_srl" name="mlayout_srl" style="width:auto">
				<option value="0"><?php echo $__Context->lang->notuse ?></option>
				<?php if($__Context->mlayout_list&&count($__Context->mlayout_list))foreach($__Context->mlayout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->val->layout_srl == $__Context->communication_config->mlayout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mskin"><?php echo $__Context->lang->mobile_skin ?></label>
		<div class="x_controls">
			<select name="mskin" id="mskin" style="width:auto" onchange="doGetSkinColorset(this.options[this.selectedIndex].value, 'M')">
				<?php if($__Context->communication_mobile_skin_list&&count($__Context->communication_mobile_skin_list))foreach($__Context->communication_mobile_skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->key==$__Context->communication_config->mskin){ ?> selected="selected"<?php } ?> ><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group" id="__mskin_colorset">
		<label class="x_control-label"><?php echo $__Context->lang->colorset ?></label>
		<div class="x_controls">
			<div id="communication_mcolorset"></div>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mlayout_srl"><?php echo $__Context->lang->cmd_write_communication ?></label>
		<div class="x_controls">
			<select name="grant_write_default" class="grant_default">
				<option value="-1"<?php if($__Context->communication_config->grant_write['default_grant']=='member'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->grant_to_login_user ?></option>
				<option value="-2"<?php if($__Context->communication_config->grant_write['default_grant']=='site'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->grant_to_site_user ?></option>
				<option value="-3"<?php if($__Context->communication_config->grant_write['default_grant']=='manager'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->grant_to_admin ?></option>
				<option value=""<?php if($__Context->communication_config->grant_write['default_grant']==''){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->grant_to_group ?></option>
			</select>
			<div id="zone_grant_write" hidden style="margin:8px 0 0 0">
				<?php if($__Context->group_list&&count($__Context->group_list))foreach($__Context->group_list as $__Context->group_srl=>$__Context->group_item){ ?><label for="grant_write_group_<?php echo $__Context->group_srl ?>">
					<input type="checkbox" class="checkbox" name="grant_write_group[]" value="<?php echo $__Context->group_item->group_srl ?>" id="grant_write_group_<?php echo $__Context->group_item->group_srl ?>"<?php if(isset($__Context->communication_config->grant_write['group_grant'][$__Context->group_srl])&&$__Context->communication_config->grant_write['group_grant'][$__Context->group_srl]==$__Context->group_item->title){ ?> checked="checked"<?php } ?>/>
					<?php echo $__Context->group_item->title ?>
				</label><?php } ?>
			</div>
		</div>
	</div>
	<div class="btnArea">
		<button class="x_btn x_btn-primary" type="submit"><?php echo $__Context->lang->cmd_registration ?></button>
	</div>
</form>
<script>
    jQuery(function() { 
		doGetSkinColorset("<?php echo $__Context->communication_config->skin ?>", 'P'); 
		doGetSkinColorset("<?php echo $__Context->communication_config->mskin ?>", 'M'); 
		jQuery('.grant_default').change( function(event) { doShowGrantZone(); } ); 
		doShowGrantZone()
	});
</script>
