<?php if(!defined("__XE__"))exit;?>
<?php echo Context::addHtmlHeader('<meta name="viewport" content="width=1240">') ?>
<!--#Meta:modules/message/skins/xedition/css/message.css--><?php $__tmp=array('modules/message/skins/xedition/css/message.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div id="access">
	<div class="login-header">
		<p>OOPS!</p>
		<h1><?php echo $__Context->system_message ?></h1>
	</div>
	<div class="login-body">
		<p><a href="<?php echo getUrl('', 'act', 'dispMemberLoginForm') ?>"><?php echo $__Context->lang->cmd_login ?></a></p>
	</div>
	<div class="login-footer">
		<a href="<?php echo getUrl('', 'act', 'dispMemberFindAccount') ?>"><?php echo $__Context->lang->cmd_find_member_account ?></a>
		<span class="bar">|</span>
		<a href="<?php echo getUrl('', 'act', 'dispMemberSignUpForm') ?>"><?php echo $__Context->lang->cmd_signup ?></a>
	</div>
</div>
