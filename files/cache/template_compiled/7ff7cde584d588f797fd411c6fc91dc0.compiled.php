<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/guestbook/skins/xe_guestbook_official/css/guestbook.css--><?php $__tmp=array('modules/guestbook/skins/xe_guestbook_official/css/guestbook.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="guestbook">
	<?php echo $__Context->module_info->header_text ?>
    <div class="guestbookHeader">
		<?php if($__Context->module_info->mid){ ?><div class="guestbookTitle">
			<h2 class="guestbookTitleText">Guestbook</h2>
				<?php if($__Context->grant->manager){ ?><a class="setup" href="<?php echo getUrl('act','dispGuestbookAdminGuestbookInfo') ?>"><?php echo $__Context->lang->cmd_setup ?></a><?php } ?>
		</div><?php } ?>
    </div>
