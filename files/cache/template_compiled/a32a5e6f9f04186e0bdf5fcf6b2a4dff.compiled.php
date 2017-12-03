<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1><?php echo $__Context->lang->file_upload ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_config_fileupload" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/file/tpl/adminConfig/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/file/ruleset/insertConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_form-horizontal section"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertConfig" />
	<input type="hidden" name="module" value="file" />
	<input type="hidden" name="act" value="procFileAdminInsertConfig" />
	<input type="hidden" name="xe_validator_id" value="modules/file/tpl/adminConfig/1" />
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $__Context->lang->allow_outlink ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_config_file_outlink" target="_blank"><?php echo $__Context->lang->help ?></a></label>
		<div class="x_controls">
			<label class="x_inline"><input type="radio" name="allow_outlink" id="allow_outlink_y" value="Y"<?php if($__Context->config->allow_outlink == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_yes ?></label>
			<label class="x_inline"><input type="radio" name="allow_outlink" value="N"<?php if($__Context->config->allow_outlink == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="allow_outlink_format"><?php echo $__Context->lang->allow_outlink_format ?></label>
		<div class="x_controls">
			<input type="text" name="allow_outlink_format" id="allow_outlink_format" value="<?php echo $__Context->config->allow_outlink_format ?>" />
			<p class="x_help-inline"><?php echo $__Context->lang->about_allow_outlink_format ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="allow_outlink_site"><?php echo $__Context->lang->allow_outlink_site ?></label>
		<div class="x_controls">
			<textarea name="allow_outlink_site" id="allow_outlink_site" rows="4" cols="42" style="float:left;margin-right:10px"><?php echo $__Context->config->allow_outlink_site ?></textarea>
			<p class="x_help-block"><?php echo $__Context->lang->about_allow_outlink_site ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="filesize" class="x_control-label"><?php echo $__Context->lang->allowed_filesize ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_config_file_size" target="_blank"><?php echo $__Context->lang->help ?></a></label>
		<div class="x_controls">
			<input type="number" step="any" id="filesize" name="allowed_filesize" value="<?php echo $__Context->config->allowed_filesize ?>" /> MB / <?php echo $__Context->upload_max_filesize ?>
		</div>
	</div>
	<div class="x_control-group">
		<label for="attachSize" class="x_control-label"><?php echo $__Context->lang->allowed_attach_size ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_config_file_document_attach_limit" target="_blank"><?php echo $__Context->lang->help ?></a></label>
		<div class="x_controls">
			<input type="number" step="any" id="attachSize" name="allowed_attach_size" value="<?php echo $__Context->config->allowed_attach_size ?>" /> MB
		</div>
	</div>
	<div class="x_control-group">
		<label for="allowedFiletypes" class="x_control-label"><?php echo $__Context->lang->allowed_filetypes ?></label>
		<div class="x_controls">
			<input id="allowedFiletypes" type="text" name="allowed_filetypes" value="<?php echo $__Context->config->allowed_filetypes ?>" />
			<p class="x_help-inline"><?php echo $__Context->lang->about_allowed_filetypes ?></p>
		</div>
	</div>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->cmd_save ?></button>
		</div>
	</div>
</form>
