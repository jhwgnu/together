<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/layout/tpl','header.html') ?>
<!--#Meta:modules/layout/tpl/js/layout_modify.js--><?php $__tmp=array('modules/layout/tpl/js/layout_modify.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php echo $__Context->content ?>
