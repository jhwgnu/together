<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1>
		<?php echo $__Context->lang->resource_manager ?>
		<?php if($__Context->module_info->mid){ ?><span class="path">&gt; <a href="<?php echo getSiteUrl($__Context->module_info->domain,'','mid',$__Context->module_info->mid) ?>"<?php if($__Context->module=='admin'){ ?> target="_blank"<?php } ?>><?php echo $__Context->module_info->mid ?></a></span><?php } ?>
		<a href="#about_resource_manager" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
	</h1>
</div>
<p class="x_alert x_alert-info" id="about_resource_manager" hidden><?php echo nl2br($__Context->lang->about_resource_manager) ?></p>
<?php if($__Context->module_info && $__Context->act != 'dispResourceAdminList' && $__Context->act != 'dispResourceAdminDelete'){ ?><ul class="x_nav x_nav-tabs">
	<?php if($__Context->module=='admin'){ ?><li<?php if($__Context->act=='dispResourceAdminList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispResourceAdminList','module_srl','') ?>"><?php echo $__Context->lang->cmd_list ?></a></li><?php } ?>
	<?php if($__Context->module!='admin'){ ?><li><a href="<?php echo getUrl('act','') ?>"><?php echo $__Context->lang->cmd_back ?></a></li><?php } ?>
	<?php if(!$__Context->module_srl){ ?><li<?php if($__Context->act=='dispResourceAdminInsert'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispResourceAdminInsert') ?>"><?php echo $__Context->lang->cmd_make ?></a></li><?php } ?>
	<?php if($__Context->module_srl){ ?><li<?php if($__Context->act=='dispResourceAdminInsert'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispResourceAdminInsert') ?>"><?php echo $__Context->lang->cmd_setup ?></a></li><?php } ?>
	<?php if($__Context->module_srl){ ?><li<?php if($__Context->act=='dispResourceAdminCategory'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispResourceAdminCategory') ?>"><?php echo $__Context->lang->cmd_manage_category ?></a></li><?php } ?>
	<?php if($__Context->module_srl){ ?><li<?php if($__Context->act=='dispResourceAdminGrant'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispResourceAdminGrant') ?>"><?php echo $__Context->lang->cmd_manage_grant ?></a></li><?php } ?>
	<?php if($__Context->module_srl){ ?><li<?php if($__Context->act=='dispResourceAdminAdditions'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispResourceAdminAdditions') ?>"><?php echo $__Context->lang->cmd_addition_setup ?></a></li><?php } ?>
	<?php if($__Context->module_srl){ ?><li<?php if($__Context->act=='dispResourceAdminSkin'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispResourceAdminSkin') ?>"><?php echo $__Context->lang->cmd_manage_skin ?></a></li><?php } ?>
	<?php if($__Context->module_srl){ ?><li<?php if($__Context->act=='dispResourceAdminMobileSkin'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispResourceAdminMobileSkin') ?>"><?php echo $__Context->lang->cmd_manage_mobile_skin ?></a></li><?php } ?>
</ul><?php } ?>