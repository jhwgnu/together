<?php if(!defined("__XE__"))exit;?>
<!--#Meta:modules/krzip/tpl/js/admin.js--><?php $__tmp=array('modules/krzip/tpl/js/admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1>
		<?php echo $__Context->lang->krzip ?>
		<a href="#descModule" class="x_icon-question-sign" data-toggle="#descModule"><?php echo $__Context->lang->help ?></a>
	</h1>
</div>
<p id="descModule" class="x_alert x_alert-info" hidden="hidden"><?php echo $__Context->lang->about_krzip ?></p>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/krzip/tpl/config/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<section class="section">
	<?php Context::addJsFile("modules/krzip/ruleset/krzipConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  class="x_form-horizontal" action="<?php echo getUrl('') ?>" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="krzipConfig" />
		<input type="hidden" name="module" value="krzip" />
		<input type="hidden" name="act" value="procKrzipAdminInsertConfig" />
		<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/krzip/tpl/config/1" />
		<section class="section">
			<h1><?php echo $__Context->lang->subtitle_primary ?></h1>
			<div class="x_control-group">
				<label class="x_control-label" for="api_handler"><?php echo $__Context->lang->cmd_krzip_api_type ?></label>
				<div class="x_controls">
					<select name="api_handler" id="api_handler">
						<option value="0"><?php echo $__Context->lang->cmd_krzip_daumapi ?></option>
						<option value="1"<?php if($__Context->module_config->api_handler == 1){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->cmd_krzip_epostapi ?></option>
					</select>
					<a href="#about_api_handler" class="x_icon-question-sign" data-toggle="#about_api_handler"><?php echo $__Context->lang->help ?></a>
					<p id="about_api_handler" class="x_help-block" hidden="hidden"><?php echo $__Context->lang->about_krzip_api_handler ?></p>
				</div>
			</div>
			<div class="x_control-group">
				<label class="x_control-label" for="epostapi_regkey"><?php echo $__Context->lang->cmd_krzip_regkey ?></label>
				<div class="x_controls">
					<input type="text" name="epostapi_regkey" id="epostapi_regkey" value="<?php echo htmlspecialchars($__Context->module_config->epostapi_regkey, ENT_COMPAT | ENT_HTML401, 'UTF-8', FALSE) ?>"<?php if($__Context->module_config->api_handler != 1){ ?> disabled="disabled"<?php } ?> />
					<a href="#about_epostapi_regkey" class="x_icon-question-sign" data-toggle="#about_epostapi_regkey"><?php echo $__Context->lang->help ?></a>
					<p id="about_epostapi_regkey" class="x_help-block" hidden="hidden"><?php echo $__Context->lang->about_krzip_epostapi_regkey ?></p>
				</div>
			</div>
		</section>
		<div class="btnArea">
			<button type="submit" class="x_btn x_btn-primary x_pull-right"><?php echo $__Context->lang->cmd_registration ?></button>
		</div>
	</form>
</section>
