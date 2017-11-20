<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/guestbook/tpl/css/guestbook_admin.css--><?php $__tmp=array('modules/guestbook/tpl/css/guestbook_admin.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1>
		<?php echo $__Context->lang->guestbook_management ?>
		<?php if($__Context->module_info->mid){ ?><span class="path">&gt; <a href="<?php echo getSiteUrl($__Context->module_info->domain,'','mid',$__Context->module_info->mid) ?>"<?php if($__Context->module=='admin'){ ?> target="_blank"<?php } ?>><?php echo $__Context->module_info->mid ?></a><?php if($__Context->module_info->is_default=='Y'){ ?><span>(<?php echo $__Context->lang->is_default ?>)</span><?php } ?></span><?php } ?>
		<a href="#about_guestbook" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
	</h1>
</div>
<p class="x_alert x_alert-info" id="about_guestbook" hidden><?php echo nl2br($__Context->lang->about_guestbook) ?></p>
<?php if($__Context->module_info && $__Context->act != 'dispGuestbookAdminDeleteGuestbook'){ ?><ul class="x_nav x_nav-tabs">
	<?php if($__Context->module=='admin'){ ?><li<?php if($__Context->act=='dispGuestbookAdminContent'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispGuestbookAdminContent','module_srl','') ?>"><?php echo $__Context->lang->cmd_guestbook_list ?></a></li><?php } ?>
	<?php if($__Context->module!='admin'){ ?><li><a href="<?php echo getUrl('act','') ?>"><?php echo $__Context->lang->cmd_back ?></a></li><?php } ?>
	<?php if($__Context->module_srl){ ?><li<?php if($__Context->act=='dispGuestbookAdminGuestbookInfo'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispGuestbookAdminGuestbookInfo','type','') ?>"><?php echo $__Context->lang->cmd_guestbook_info ?></a></li><?php } ?>
	<?php if($__Context->module_srl){ ?><li<?php if($__Context->act=='dispGuestbookAdminGrantInfo'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispGuestbookAdminGrantInfo') ?>"><?php echo $__Context->lang->cmd_manage_grant ?></a></li><?php } ?>
</ul><?php } ?>
