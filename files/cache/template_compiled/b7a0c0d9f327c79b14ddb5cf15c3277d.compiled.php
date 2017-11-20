<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/board/skins/xedition/board.default.css--><?php $__tmp=array('modules/board/skins/xedition/board.default.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/xedition/board.default.js--><?php $__tmp=array('modules/board/skins/xedition/board.default.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:common/xeicon/xeicon.min.css--><?php $__tmp=array('common/xeicon/xeicon.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->order_type == "desc"){ ?>
    <?php  $__Context->order_type = "asc";  ?>
<?php }else{ ?>
    <?php  $__Context->order_type = "desc";  ?>
<?php } ?>
<?php if(!$__Context->module_info->duration_new = (int)$__Context->module_info->duration_new){;
$__Context->module_info->duration_new = 12;
} ?>
<?php  $__Context->cate_list = array(); $__Context->current_key = null;  ?>
<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->key=>$__Context->val){ ?>
	<?php if(!$__Context->val->depth){ ?>
		<?php 
			$__Context->cate_list[$__Context->key] = $__Context->val;
			$__Context->cate_list[$__Context->key]->children = array();
			$__Context->current_key = $__Context->key;
		 ?>
	<?php }elseif($__Context->current_key){ ?>
		<?php  $__Context->cate_list[$__Context->current_key]->children[] = $__Context->val  ?>
	<?php } ?>
<?php } ?>
<div class="board">
	<?php echo $__Context->module_info->header_text ?>
