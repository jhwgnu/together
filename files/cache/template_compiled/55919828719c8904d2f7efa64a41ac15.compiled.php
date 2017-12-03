<?php if(!defined("__XE__"))exit;
echo $__Context->module_info->browser_title ?>
<?php if(!$__Context->module_info->colorset){ ?>
    <?php $__Context->module_info->colorset = "white" ?>
<?php } ?>
<!--#Meta:modules/board/skins/xe_2009/css/board.css--><?php $__tmp=array('modules/board/skins/xe_2009/css/board.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->module_info->colorset == "black"){ ?>
	<!--#Meta:modules/board/skins/xe_2009/css/black.css--><?php $__tmp=array('modules/board/skins/xe_2009/css/black.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php }else{ ?>
	<!--#Meta:modules/board/skins/xe_2009/css/white.css--><?php $__tmp=array('modules/board/skins/xe_2009/css/white.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<?php if(!$__Context->module_info->duration_new = (int)$__Context->module_info->duration_new){;
$__Context->module_info->duration_new = 12;
} ?>
<?php if(!$__Context->module_info->content_cut_size = (int)$__Context->module_info->content_cut_size){;
$__Context->module_info->content_cut_size= 240;
} ?>
<?php if(!$__Context->module_info->thumbnail_type){;
$__Context->module_info->thumbnail_type = 'crop';
} ?>
<?php if(!$__Context->module_info->thumbnail_width){;
$__Context->module_info->thumbnail_width = 100;
} ?>
<?php if(!$__Context->module_info->thumbnail_height){;
$__Context->module_info->thumbnail_height = 100;
} ?>
<?php if($__Context->order_type == "desc"){ ?>
    <?php  $__Context->order_icon = "buttonDescending.gif"  ?>
    <?php  $__Context->order_type = "asc";  ?>
<?php }else{ ?>
    <?php  $__Context->order_icon = "buttonAscending.gif"  ?>
    <?php  $__Context->order_type = "desc";  ?>
<?php } ?>
<?php if($__Context->listStyle=='gallery'){ ?>
    <?php  $__Context->module_info->default_style = 'gallery' ?>
<?php }elseif($__Context->listStyle=='webzine'){ ?>
    <?php  $__Context->module_info->default_style = 'webzine' ?>
<?php }elseif($__Context->listStyle=='list'){ ?>
    <?php  $__Context->module_info->default_style = 'list' ?>
<?php }elseif(!in_array($__Context->module_info->default_style,array('list','webzine','gallery','blog'))){ ?>
    <?php  $__Context->module_info->default_style = 'list' ?>
<?php } ?>
<?php echo $__Context->module_info->header_text ?>
<div class="board">
    <div class="boardHeader">
		<?php if($__Context->module_info->title){ ?>
		<div class="boardTitle">
			<h2 class="boardTitleText"><a href="<?php echo getUrl('','mid',$__Context->mid,'listStyle',$__Context->listStyle) ?>"><?php echo $__Context->module_info->title;
if($__Context->module_info->sub_title){ ?> : <em><?php echo $__Context->module_info->sub_title ?></em><?php } ?></a></h2>
		</div>
		<?php } ?>
		<?php if($__Context->module_info->comment){ ?>
		<p class="boardDescription"><?php echo $__Context->module_info->comment ?></p>
		<?php } ?>
    </div>
    <?php if($__Context->module_info->display_setup_button != 'N'){ ?>
    <div class="boardInformation">
        <?php if($__Context->total_count && $__Context->module_info->default_style != 'blog'){ ?>
        <div class="infoSum"><?php echo $__Context->lang->document_count ?> <strong><?php echo number_format($__Context->total_count) ?></strong></div>
        <?php } ?>
		
		<div class="infoView">
			<ul>
				<?php if($__Context->grant->manager && $__Context->module_info->display_setup_button != 'N'){ ?>
				<li class="setup"><a href="<?php echo getUrl('act','dispBoardAdminBoardInfo') ?>" title="<?php echo $__Context->lang->cmd_setup ?>"><span><?php echo $__Context->lang->cmd_setup ?></span></a></li>
				<?php } ?>
				<li class="listTypeClassic icon<?php if($__Context->module_info->default_style=='list'){ ?> active<?php } ?>"><a href="<?php echo getUrl('listStyle','list','act','','document_srl','') ?>" title="Classic Style"><span>Classic Style</span></a></li>
				<li class="listTypeZine icon<?php if($__Context->module_info->default_style=='webzine'){ ?> active<?php } ?>"><a href="<?php echo getUrl('listStyle','webzine','act','','document_srl','') ?>" title="Zine Style"><span>Zine Style</span></a></li>
				<li class="listTypeGallery icon<?php if($__Context->module_info->default_style=='gallery'){ ?> active<?php } ?>"><a href="<?php echo getUrl('listStyle','gallery','act','','document_srl','') ?>" title="Gallery Style"><span>Gallery Style</span></a></li>
			</ul>
		</div>
    </div>
<?php } ?>
