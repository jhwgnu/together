<?php if(!defined("__XE__"))exit;
if(__DEBUG__){ ?><!--#Meta:modules/importer/tpl/js/importer_admin.js--><?php $__tmp=array('modules/importer/tpl/js/importer_admin.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<?php if(!__DEBUG__){ ?><!--#Meta:modules/importer/tpl/js/importer_admin.min.js--><?php $__tmp=array('modules/importer/tpl/js/importer_admin.min.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<?php  $__Context->type_list = array('module'=>$__Context->lang->type_module, 'ttxml'=>$__Context->lang->type_ttxml, 'member'=>$__Context->lang->type_member, 'sync'=>$__Context->lang->type_syncmember, 'message'=>$__Context->lang->type_message)  ?>
<div class="x_page-header">
	<h1><?php echo $__Context->lang->importer ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_content_importer" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<p><?php echo nl2br($__Context->lang->about_importer) ?></p>
