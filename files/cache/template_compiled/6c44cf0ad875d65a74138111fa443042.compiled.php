<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/autoinstall/tpl','header.html') ?>
<!--#Meta:modules/autoinstall/tpl/js/waiting.js--><?php $__tmp=array('modules/autoinstall/tpl/js/waiting.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<h2><?php echo $__Context->package->title ?> ver. <?php echo $__Context->package->version ?></h2>
<?php if(version_compare(PHP_VERSION, __XE_MIN_PHP_VERSION__, '<')){ ?><div class="message error">
	<h2>안전하지 않은 PHP 버전 경고</h2>
	<p>이 서버는 안전하지 않은 PHP 버전을 사용하고 있으며, PHP를 최신 안정 버전으로의 업그레이드를 권장합니다.</p>
	<p>이 서버의 PHP 버전 : <strong><?php echo phpversion() ?></strong></p>
	<p><a href="http://php.net/downloads.php" target="_blank">PHP 최신 안정버전 확인하기</a></p>
	<ul>
		<li>매우 심각한 PHP 보안 문제 및 공격에 노출될 수 있습니다.</li>
		<li>XE 최신 버전을 사용할 수 없습니다.</li>
		<li>XE 최신 버전 이상을 지원하는 확장 기능을 사용할 수 없습니다.</li>
		<li>일부 확장 기능이 동작하지 않거나, 이로 인해 장애가 발생할 수 있습니다.</li>
	</ul>
</div><?php } ?>
<?php if($__Context->contain_core){ ?><div class="x_alert x_alert-block">
	<h4><?php echo $__Context->lang->msg_update_core_title ?></h4>
	<p><?php echo $__Context->lang->msg_update_core ?></p>
</div><?php } ?>
<?php if($__Context->package->installed){ ?><div class="x_well">
	<p><?php echo $__Context->lang->current_version ?>: <?php echo $__Context->package->cur_version ?> <?php if($__Context->package->need_update){ ?>(<?php echo $__Context->lang->require_update ?>)<?php } ?></p>
</div><?php } ?>
<?php if($__Context->package->depends && (!$__Context->package->installed || $__Context->package->need_update)){ ?><div class="x_well">
	<p><?php echo $__Context->lang->about_depending_programs ?></p>
	<p><?php echo $__Context->lang->description_install ?></p>
	<ul>
		<?php if($__Context->package->depends&&count($__Context->package->depends))foreach($__Context->package->depends as $__Context->dep){ ?><li>
			<?php echo $__Context->dep->title ?> ver. <?php echo $__Context->dep->version ?> -
			<?php if($__Context->dep->installed){;
echo $__Context->lang->current_version ?>: <?php echo $__Context->dep->cur_version ?> <?php if($__Context->dep->need_update){ ?>(<?php echo $__Context->lang->require_update ?>)<?php };
} ?>
			<?php if(!$__Context->dep->installed){;
echo $__Context->lang->require_installation;
} ?>
			<?php if($__Context->show_ftp_note && ($__Context->dep->need_update || !$__Context->dep->installed)){ ?>
				<a href="<?php echo _XE_DOWNLOAD_SERVER_ ?>?module=resourceapi&act=procResourceapiDownload&package_srl=<?php echo $__Context->dep->package_srl ?>"><?php echo $__Context->lang->cmd_download ?></a> (<?php echo $__Context->lang->path ?>: <?php echo $__Context->dep->path ?>)
			<?php } ?>
		</li><?php } ?>
	</ul>
</div><?php } ?>
<?php if(!$__Context->package->installed || $__Context->package->need_update){ ?>
	<?php if(!$__Context->directModuleInstall->toBool() || $__Context->show_ftp_note){ ?><div class="x_well x_clearfix">
		<?php if(!$__Context->directModuleInstall->toBool()){ ?>
			<p><?php echo $__Context->lang->msg_direct_install_not_supported ?></p>
			<ul>
				<?php if($__Context->directModuleInstall->get('path')&&count($__Context->directModuleInstall->get('path')))foreach($__Context->directModuleInstall->get('path') as $__Context->path){ ?><li><?php echo $__Context->path ?></li><?php } ?>
			</ul>
		<?php } ?>
		<?php if($__Context->show_ftp_note){ ?>
			<p><?php echo $__Context->lang->description_download ?>. (<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdminConfigFtp') ?>">FTP Setup</a>)</p>
			<p><?php echo $__Context->lang->path ?>: <?php echo $__Context->package->path ?></p>
			<p><a class="x_btn x_btn-primary x_pull-right" href="<?php echo _XE_DOWNLOAD_SERVER_ ?>?module=resourceapi&act=procResourceapiDownload&package_srl=<?php echo $__Context->package->package_srl ?>"><?php echo $__Context->lang->cmd_download ?></a>
		<?php } ?>
	</div><?php } ?>
	<?php if(!$__Context->show_ftp_note){ ?><div>
		<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/autoinstall/tpl/install/1'){ ?><div class="message error">
			<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
		</div><?php } ?>
		<?php Context::addJsFile("modules/autoinstall/ruleset/ftp.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="x_form-horizontal" method="post" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="ftp" />
			<input type="hidden" name="module" value="autoinstall" />
			<input type="hidden" name="act" value="procAutoinstallAdminPackageinstall" />
			<input type="hidden" name="package_srl" value="<?php echo $__Context->package->package_srl ?>" />
			<input type="hidden" name="return_url" value="<?php echo $__Context->return_url ?>" />
			<?php if(!$__Context->need_password || $__Context->directModuleInstall->toBool()){ ?><input type="hidden" name="ftp_password" value="dummy" /><?php } ?>
			<input type="hidden" name="xe_validator_id" value="modules/autoinstall/tpl/install/1" />
			<?php if($__Context->need_password && !$__Context->directModuleInstall->toBool()){ ?>
				<div class="x_control-group">
					<label class="x_control-label" for="ftp_password">FTP <?php echo $__Context->lang->password ?></label>
					<div class="x_controls">
						<input type="password" name="ftp_password" id="ftp_password" value="" />
						<p class="x_help-inline"><?php echo $__Context->lang->about_ftp_password ?></p>
					</div>
				</div>
			<?php } ?>
			<div class="x_clearfix btnArea">
				<div class="x_pull-right">
					<input class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->package->installed?$__Context->lang->update:$__Context->lang->install ?>" />
				</div>
			</div>
		</form>
	</div><?php } ?>
<?php } ?>
