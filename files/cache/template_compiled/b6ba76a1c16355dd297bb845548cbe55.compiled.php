<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<!--#Meta:modules/resource/m.skins/default/css/mresource.css--><?php $__tmp=array('modules/resource/m.skins/default/css/mresource.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->package){ ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/m.skins/default','view.html') ?>
<?php }else{ ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/m.skins/default','list.html') ?>
<?php } ?>
