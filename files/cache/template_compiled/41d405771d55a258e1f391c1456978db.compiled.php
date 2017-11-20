<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/admin/tpl/js/config.js--><?php $__tmp=array('modules/admin/tpl/js/config.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php Context::loadLang(''); ?>
<!--#Meta:modules/session/tpl/js/session.js--><?php $__tmp=array('modules/session/tpl/js/session.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1><?php echo $__Context->lang->menu_gnb_sub['adminConfigurationFtp'] ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_config_ftp" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_ftp/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<p class="x_help-block"><?php echo $__Context->lang->detail_about_ftp_info ?></p>
<?php Context::addJsFile("modules/admin/ruleset/installFtpInfo.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" id="ftp_form" method="post" enctype="multipart/form-data" class="x_form-horizontal" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="installFtpInfo" />
	<input type="hidden" name="module" value="install" />
	<input type="hidden" name="act" value="procInstallAdminSaveFTPInfo" />
	<input type="hidden" name="success_return_url" value="<?php echo base64_decode($__Context->success_return_url) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_ftp/1" />
	<section class="section">
		<h1><?php echo $__Context->lang->subtitle_primary ?></h1>
		<div class="x_control-group">
			<label class="x_control-label" for="ftp_user"><?php echo $__Context->lang->user_id ?></label>
			<div class="x_controls">
				<input type="text" name="ftp_user" id="ftp_user" value="<?php echo $__Context->ftp_info->ftp_user ?>" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="ftp_password"><?php echo $__Context->lang->password ?></label>
			<div class="x_controls">
				<input type="password" name="ftp_password" id="ftp_password" value="" />
				<p class="x_help-block"><?php echo $__Context->lang->about_ftp_password ?></p>
			</div>
		</div>
		<div id="__xe_path" class="x_control-group" hidden>
			<label class="x_control-label" for="ftp_root_path"><?php echo $__Context->lang->msg_ftp_installed_ftp_realpath ?></label>
			<div class="x_controls">
				<span class="x_input-append">
					<input type="text" name="ftp_root_path" id="ftp_root_path" value="<?php echo $__Context->ftp_info->ftp_root_path ?>" />
					<a href="#ftpSuggestion" onclick="getFTPList(); return false;" class="x_btn tgAnchor"><?php echo $__Context->lang->ftp_get_list ?></a>
				</span>
				<div id="ftpSuggestion" class="x_thumbnail">
				</div>
				<p class="x_help-block" style="margin-top:10px"><?php echo $__Context->lang->msg_ftp_installed_realpath ?> : <?php echo _XE_PATH_ ?></p>
			</div>
		</div>
	</section>
	<section class="section collapsed" style="margin-bottom:0">
		<h1><?php echo $__Context->lang->subtitle_advanced ?></h1>
		<div class="x_control-group">
			<label class="x_control-label" for="ftp_host"><?php echo $__Context->lang->ftp_host ?></label>
			<div class="x_controls">
				<input type="text" name="ftp_host" id="ftp_host" value="<?php echo $__Context->ftp_info->ftp_host ? $__Context->ftp_info->ftp_host : '127.0.0.1' ?>" /> Default : 127.0.0.1
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="ftp_port"><?php echo $__Context->lang->ftp_port ?></label>
			<div class="x_controls">
				<input type="number" name="ftp_port" id="ftp_port" value="<?php echo $__Context->ftp_info->ftp_port ? $__Context->ftp_info->ftp_port : '21' ?>" /> Default : 21
			</div>
		</div>
		<div class="x_control-group">
			<div class="x_control-label"><?php echo $__Context->lang->use_ftp_passive_mode ?></div>
			<div class="x_controls">
				<label class="x_inline" for="ftp_passive_y">
					<input type="radio" name="ftp_pasv" id="ftp_passive_y" value="Y"<?php if($__Context->ftp_info->ftp_pasv == 'Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->cmd_yes ?>
				</label>
				<label class="x_inline" for="ftp_passive_n">
					<input type="radio" name="ftp_pasv" id="ftp_passive_n" value="N"<?php if($__Context->ftp_info->ftp_pasv != 'Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->cmd_no ?>
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="sftp_n"><?php echo $__Context->lang->use_sftp_support ?></label>
			<div class="x_controls">
				<label class="x_inline" for="sftp_y"><input type="radio" name="sftp" id="sftp_y" value="Y"<?php if($__Context->ftp_info->sftp == 'Y'){ ?> checked="checked"<?php };
if(!$__Context->sftp_support){ ?> disabled<?php } ?> /><?php echo $__Context->lang->cmd_yes ?></label>
				<label class="x_inline" for="sftp_n"><input type="radio" name="sftp" id="sftp_n" value="N"<?php if($__Context->ftp_info->sftp != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_no ?></label>
				<?php if(!$__Context->sftp_support){ ?><p class="x_help-black"><?php echo $__Context->lang->disable_sftp_support ?></p><?php } ?>
			</div>
		</div>
	</section>
	<div class="btnArea" style="margin-top:0">
		<input type="submit" value="<?php echo $__Context->lang->cmd_save ?>" class="x_btn x_btn-primary x_pull-right" />
	</div>
	</form>
<style>
#ftpSuggestion{padding:8px 15px;margin:2px 0;position:absolute;background:#fff;box-shadow:1px 1px 1px #eee;width:188px;z-index:99}
#ftpSuggestion ul{margin:0;padding:0;list-style:none}
#ftpSuggestion button{overflow:visible;padding:0;background:none;border:0;display:block;width:100%;text-align:left}
#ftpSuggestion button:hover,
#ftpSuggestion button:focus{font-weight:bold}
</style>
<script>
jQuery(function($){
	$('#ftp_form').submit(function(){
		if($(this).data('found')){
			return true;
		}
		$('input[name="ftp_root_path"]').val('');
		param = {
			'ftp_user': $('#ftp_user').val(),
			'ftp_password': $('#ftp_password').val(),
			'ftp_host': $('#ftp_host').val(),
			'ftp_port': $('#ftp_port').val(),
			'ftp_pasv': $('input:radio[name="ftp_pasv"]:checked').val(),
			'sftp': $('input:radio[name="sftp"]:checked').val()
		}
		$.exec_json('admin.getAdminFTPPath', param, function(data){
			if(data.error) return;
			if(!data.found_path){
				alert('<?php echo $__Context->lang->msg_find_xe_path_fail ?>');
				$('#__xe_path').show();
				$('#ftp_form').data('found', true);
				return;
			}
			$('input[name="ftp_root_path"]').val(data.found_path);
			$('#ftp_form').data('found', true).submit();
		});
		return false;
	});
});
</script>
