<?php if(!defined("__XE__"))exit;?> 
<?php if($__Context->module_info->default_style=='diary'){ ?> 
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_read_diary.html') ?>
<?php }elseif($__Context->module_info->default_style=='memo'){ ?> 
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_read_memo.html') ?> 
<?php }elseif($__Context->module_info->default_style=='1line_memo'){ ?> 
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_read_1line.html') ?>
<?php }elseif($__Context->module_info->default_style=='guestbook'){ ?> 
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_read_guestbook.html') ?> 
<?php }elseif($__Context->module_info->default_style=='gallery'){ ?> 
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_read_normal.html') ?> 
<?php }elseif($__Context->module_info->default_style=='link'){ ?> 
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_read_normal.html') ?> 
<?php }else{ ?> 
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_read_normal.html') ?> 
<?php } ?> 
