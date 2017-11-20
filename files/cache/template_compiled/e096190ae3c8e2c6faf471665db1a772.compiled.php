<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/member/tpl/js/config.js--><?php $__tmp=array('modules/member/tpl/js/config.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1><?php echo $__Context->lang->cmd_member_config ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_member_config" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/tpl/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act == 'dispMemberAdminConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminConfig') ?>"><?php echo $__Context->lang->member_default_info ?></a></li>
	<li id="signupTab"<?php if($__Context->act == 'dispMemberAdminSignUpConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminSignUpConfig') ?>"><?php echo $__Context->lang->cmd_signup ?></a></li>
	<li<?php if($__Context->act == 'dispMemberAdminLoginConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminLoginConfig') ?>"><?php echo $__Context->lang->cmd_login ?></a></li>
	<li<?php if($__Context->act == 'dispMemberAdminDesignConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminDesignConfig') ?>"><?php echo $__Context->lang->cmd_set_design_info ?></a></li>
</ul>
<script>
	enableSignUpTab(<?php echo $__Context->config->enable_join == 'Y' ? 'true' : 'false' ?>);
</script>
