<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/beluxe/tpl/css/admin.css--><?php $__tmp=array('modules/beluxe/tpl/css/admin.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/beluxe/tpl/js/admin.js--><?php $__tmp=array('modules/beluxe/tpl/js/admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->module=='admin'){ ?><div class="<?php echo $__Context->is_poped?'x_modal-header':'x_page-header' ?>">
	<h1>
		<?php echo $__Context->lang->this_module ?>
		<?php if(!$__Context->is_poped&&$__Context->module == 'admin'&&$__Context->module_info->mid){ ?> -
			<a href="<?php echo getSiteUrl($__Context->module_info->domain, '', 'mid', $__Context->module_info->mid,'m_target','','m_targets','') ?>" target="_blank">
				<?php echo cut_str($__Context->module_info->mid, 24) ?>
			</a>
		<?php } ?>
	</h1>
</div><?php } ?>
<?php if(!$__Context->is_poped){ ?><div>
	<ul class="x_nav x_nav-tabs">
<?php if($__Context->module_srl){ ?>
		<?php if($__Context->module=='admin'){ ?><li><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispBeluxeAdminList') ?>"><?php echo $__Context->lang->cmd_module_default_menus['dispBeluxeAdminList'] ?></a></li><?php } ?>
		<?php if($__Context->module!='admin'){ ?><li><a href="<?php echo urldecode(getUrl('mid',$__Context->module_info->mid,'act','','module','','module_srl','','m_target','','m_targets','')) ?>"><?php echo $__Context->lang->cmd_back ?></a></li><?php } ?>
		<?php if($__Context->lang->cmd_module_menus&&count($__Context->lang->cmd_module_menus))foreach($__Context->lang->cmd_module_menus as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->act == $__Context->key){ ?> class="x_active"<?php } ?>><a href="<?php echo urldecode(getUrl('','module',$__Context->module,'module_srl',$__Context->module_srl,'mid',($__Context->module=='admin'?'':$__Context->module_info->mid),'act',$__Context->key)) ?>"><?php echo $__Context->val ?></a></li><?php } ?>
<?php }else{ ?>
		<li<?php if(($__Context->act == 'dispBeluxeAdminList') || ($__Context->act == 'dispBeluxeAdminContent')){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispBeluxeAdminList') ?>"><?php echo $__Context->lang->cmd_module_default_menus['dispBeluxeAdminList'] ?></a></li>
		<li<?php if($__Context->act == 'dispBeluxeAdminInsert'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispBeluxeAdminInsert') ?>"><?php echo $__Context->lang->module ?> <?php echo $__Context->lang->cmd_make ?></a></li>
<?php } ?>
	</ul>
</div><?php } ?>
<?php if($__Context->module=='admin'&&$__Context->lang->desc_module_menus[$__Context->act]){ ?><p>
	<?php echo nl2br($__Context->lang->desc_module_menus[$__Context->act]) ?>
</p><?php } ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
