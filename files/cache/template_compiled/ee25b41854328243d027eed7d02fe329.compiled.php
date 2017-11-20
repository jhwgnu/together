<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/resource/skins/xe_official/css/resource.css--><?php $__tmp=array('modules/resource/skins/xe_official/css/resource.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="resource">
	<?php echo $__Context->module_info->header_text ?>
	<?php if($__Context->module_info->title){ ?><div class="resourceHeader">
		<div class="resourceTitle">
			<h2 class="resourceTitleText"><a href="<?php echo getUrl('','mid',$__Context->mid,'listStyle',$__Context->listStyle) ?>"><?php echo $__Context->module_info->title;
if($__Context->module_info->sub_title){ ?> : <em><?php echo $__Context->module_info->sub_title ?></em><?php } ?></a></h2>
		</div>
		<?php if($__Context->module_info->comment){ ?><p class="resourceDescription"><?php echo nl2br($__Context->module_info->comment) ?></p><?php } ?>
	</div><?php } ?>