<?php if(!defined("__XE__"))exit;
$__Context->li = $__Context->layout_info;
$__Context->is_mobile = Mobile::isMobileCheckByAgent() && !$__Context->_COOKIE['fakeM'];
$__Context->is_index_module = ($__Context->site_module_info->module_srl === $__Context->current_module_info->module_srl);
if(!$__Context->li->custom) $__Context->li->custom = array();
Context::addHtmlHeader('<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->');
if(!$__Context->_COOKIE['fakeM']) Context::addHtmlHeader('<meta name="viewport" content="width=device-width, initial-scale=1">');
Context::set("admin_bar","false");
 ?>
<?php if(in_array('custom_setting',$__Context->li->custom)){;
} ?>
<?php 
$__Context->colorset = $__Context->li->colorset;
if(!$__Context->colorset) $__Context->colorset = 'info';
if(!$__Context->li->sb_col) $__Context->li->sb_col = "2";
// Context::addBodyClass($__Context->colorset);
switch($__Context->colorset):
	case 'primary':$__Context->colorset_cc = "#428bca";break;
	case 'success':$__Context->colorset_cc = "#5cb85c";break;
	case 'warning':$__Context->colorset_cc = "#f0ad4e";break;
	case 'danger':$__Context->colorset_cc = "#d9534f";break;
	default:$__Context->colorset_cc = "#5bc0de";break;
endswitch;
if(strpos($__Context->act,'dispMember')!== false || strpos($__Context->act,'dispCommunication') !== false || $__Context->act == 'dispNcenterliteNotifyList' || $__Context->act == 'dispNcenterliteUserConfig' || $__Context->act == 'dispSocialxeSnsManage') $__Context->is_member_menu = 'Y';
if(!$__Context->li->jumbotron_align) $__Context->li->jumbotron_align = "center";
if($__Context->is_index_module && ($__Context->li->slide_use == 'only_main' || !$__Context->li->slide_use)) $__Context->li->slide_use = 'Y';
if(!$__Context->is_index_module && ($__Context->li->slide_use == 'only_main' || !$__Context->li->slide_use)) $__Context->li->slide_use = 'N';
if($__Context->li->slide_module):
	if(in_array($__Context->mid, explode(',',$__Context->li->slide_module))) $__Context->li->slide_use = 'Y';
	else $__Context->li->slide_use = 'N';
endif;
if($__Context->is_index_module && ($__Context->li->jumbotron == 'no_main' || !$__Context->li->jumbotron)) $__Context->li->jumbotron = 'N';
if($__Context->is_index_module && $__Context->li->jumbotron == 'only_main') $__Context->li->jumbotron = 'Y';
if(!$__Context->is_index_module && ($__Context->li->jumbotron == 'no_main' || !$__Context->li->jumbotron)) $__Context->li->jumbotron = 'Y';
if(!$__Context->li->site_frame) $__Context->li->site_frame = 'sidebar_content';
if($__Context->li->site_frame_content):
	$__Context->li->site_frame_content = explode(',',$__Context->li->site_frame_content);
	if(in_array($__Context->mid,$__Context->li->site_frame_content)/* || $__Context->_COOKIE['simplestrap_full_frame']*/) $__Context->li->site_frame='content';
endif;
if($__Context->li->jumbotron_hide_mid):
	$__Context->li->jumbotron_hide_mid = explode(',',$__Context->li->jumbotron_hide_mid);
	if(in_array($__Context->mid,$__Context->li->jumbotron_hide_mid)) $__Context->li->jumbotron = 'N';
endif;
 ?>
<?php Context::loadLang('layouts/simplestrap/lang'); ?>
<?php if(__DEBUG__){ ?>
<!--#Meta:layouts/simplestrap/css/bootstrap.css--><?php $__tmp=array('layouts/simplestrap/css/bootstrap.css','','','-5');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/css/font-awesome.css--><?php $__tmp=array('layouts/simplestrap/css/font-awesome.css','','','-4');Context::loadFile($__tmp);unset($__tmp); ?> 
<!--#Meta:layouts/simplestrap/css/simplestrap.css--><?php $__tmp=array('layouts/simplestrap/css/simplestrap.css','','','-3');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/js/bootstrap.js--><?php $__tmp=array('layouts/simplestrap/js/bootstrap.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/js/jquery.placeholder.js--><?php $__tmp=array('layouts/simplestrap/js/jquery.placeholder.js','body','lt IE 10','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<?php if(!__DEBUG__){ ?>
<!--#Meta:layouts/simplestrap/css/bootstrap.min.css--><?php $__tmp=array('layouts/simplestrap/css/bootstrap.min.css','','','-5');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/css/font-awesome.min.css--><?php $__tmp=array('layouts/simplestrap/css/font-awesome.min.css','','','-4');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/css/simplestrap.min.css--><?php $__tmp=array('layouts/simplestrap/css/simplestrap.min.css','','','-3');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/js/bootstrap.min.js--><?php $__tmp=array('layouts/simplestrap/js/bootstrap.min.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/js/jquery.placeholder.min.js--><?php $__tmp=array('layouts/simplestrap/js/jquery.placeholder.min.js','body','lt IE 10','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<!--#Meta:layouts/simplestrap/css/bootstrap-ie7.css--><?php $__tmp=array('layouts/simplestrap/css/bootstrap-ie7.css','','ie 7','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/js/jquery.cookie.min.js--><?php $__tmp=array('layouts/simplestrap/js/jquery.cookie.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/simplestrap/js/respond.min.js--><?php $__tmp=array('layouts/simplestrap/js/respond.min.js','body','lt IE 9','-2');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if(in_array('custom_style',$__Context->li->custom)){ ?><!--#Meta:/custom_style.css--><?php $__tmp=array('/custom_style.css','','','-2');Context::loadFile($__tmp);unset($__tmp);
} ?>
<?php if(in_array('custom_js',$__Context->li->custom)){ ?><!--#Meta:/custom_js.js--><?php $__tmp=array('/custom_js.js','body','','-1');Context::loadFile($__tmp);unset($__tmp);
} ?>
<script><?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/simplestrap/js','simplestrap.cond.js') ?></script>
<style><?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/simplestrap/css','simplestrap.cond.css') ?></style>
<?php if($__Context->li->css3pie=='Y'){ ?>
	<!--#Meta:layouts/simplestrap/js/PIE.js--><?php $__tmp=array('layouts/simplestrap/js/PIE.js','body','lt IE 9','0');Context::loadFile($__tmp);unset($__tmp); ?>
	<!--[if lt IE 9]>
		<style scoped>.btn,.badge,.nav-pills>li>a,.panel{z-index:2;position:relative}</style>
		<script>
			jQuery(function($){
				$(".btn,.badge,.nav-pills>li>a,.panel").each(function(){PIE.attach(this);});
			});
		</script>
	<![endif]-->
<?php } ?>
<!--[if lt IE 10]>
<script>jQuery(function($){$('input,textarea').placeholder();});</script>
<![endif]-->