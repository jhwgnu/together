<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_header.html') ?>
<h1><?php echo $__Context->member_title = $__Context->lang->cmd_modify_member_password ?></h1>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/member/ruleset/modifyPassword.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_insert_member" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="modifyPassword" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberModifyPassword" />
    <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
    <input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
    <input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
    <input type="hidden" name="xe_validator_id" value="modules/member/skins/default/1" />
    <input type="hidden" name="success_return_url" value="<?php echo getUrl('act','dispMemberInfo') ?>" />
	<div>
		<input type="email" disabled="disabled" value="<?php echo $__Context->formValue ?>" id="uid" placeholder="<?php echo Context::getLang($__Context->identifier) ?>" title="<?php echo Context::getLang($__Context->identifier) ?>" />
	</div>
	<div>
		<input type="password" name="current_password" id="cpw" required placeholder="<?php echo $__Context->lang->current_password ?>" title="<?php echo $__Context->lang->current_password ?>" />
	</div>
	<div>
		<input type="password" name="password1" id="npw1" required placeholder="<?php echo $__Context->lang->password1 ?>" title="<?php echo $__Context->lang->password1 ?>" /> <span class="help-inline"><?php echo $__Context->lang->about_password_strength[$__Context->member_config->password_strength] ?></span>
	</div>
	<div>
		<input type="password" name="password2" id="npw2" required placeholder="<?php echo $__Context->lang->password2 ?>" title="<?php echo $__Context->lang->password2 ?>" />
	</div>
	<input type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" class="btn btn-inverse" style="min-width:220px" />
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_footer.html') ?>
