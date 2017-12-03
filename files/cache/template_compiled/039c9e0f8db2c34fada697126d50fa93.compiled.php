<?php if(!defined("__XE__"))exit;
if(!$__Context->module_info->colorset){ ?>
    <?php $__Context->module_info->colorset = "white" ?>
<?php } ?>
	
<!--#Meta:modules/board/skins/xe_2008/css/board.css--><?php $__tmp=array('modules/board/skins/xe_2008/css/board.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->module_info->colorset == "black"){ ?>
	<!--#Meta:modules/board/skins/xe_2008/css/black.css--><?php $__tmp=array('modules/board/skins/xe_2008/css/black.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php }else{ ?>
	<!--#Meta:modules/board/skins/xe_2008/css/white.css--><?php $__tmp=array('modules/board/skins/xe_2008/css/white.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
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
<?php if($__Context->module_info->default_style != 'forum' && $__Context->module_info->default_style != 'blog'){ ?>
    <?php if($__Context->listStyle=='gallery'){ ?>
        <?php  $__Context->module_info->default_style = 'gallery' ?>
    <?php }elseif($__Context->listStyle=='webzine'){ ?>
        <?php  $__Context->module_info->default_style = 'webzine' ?>
    <?php }elseif($__Context->listStyle=='list'){ ?>
        <?php  $__Context->module_info->default_style = 'list' ?>
    <?php } ?>
<?php } ?>
<div class="board">
	<?php echo $__Context->module_info->header_text ?>
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
<?php if($__Context->module_info->display_login_info != 'N' || $__Context->module_info->display_setup_button != 'N'){ ?>
    <div class="boardInformation">
        <?php if($__Context->total_count && $__Context->module_info->default_style != 'blog'){ ?>
        <div class="infoLeft"><?php echo $__Context->lang->document_count ?> <strong><?php echo number_format($__Context->total_count) ?></strong></div>
        <?php } ?>
		
		<div class="infoRight">
			<ul>
			<?php if($__Context->is_logged){ ?>
				<?php if($__Context->grant->manager && $__Context->module_info->display_setup_button != 'N'){ ?>
				<li class="setup"><a href="<?php echo getUrl('act','dispBoardAdminBoardInfo') ?>"><?php echo $__Context->lang->cmd_setup ?></a></li>
				<?php } ?>
				<?php if($__Context->module_info->display_login_info != 'N'){ ?>
				<li class="myInfo"><a href="<?php echo getUrl('act','dispMemberInfo') ?>"><?php echo $__Context->lang->cmd_view_member_info ?></a></li>
				<li class="loginAndLogout"><a href="<?php echo getUrl('act','dispMemberLogout') ?>"><?php echo $__Context->lang->cmd_logout ?></a></li>
				<?php } ?>
				<?php }elseif(!$__Context->is_logged && $__Context->module_info->display_login_info != 'N'){ ?>
					<li class="join"><a href="<?php echo getUrl('act','dispMemberSignUpForm') ?>"><?php echo $__Context->lang->cmd_signup ?></a></li>
					<li class="loginAndLogout"><a href="<?php echo getUrl('act','dispMemberLoginForm') ?>"><?php echo $__Context->lang->cmd_login ?></a></li>
				<?php } ?>
				<?php if($__Context->rss_url){ ?>
					<li class="rss icon"><a href="<?php echo $__Context->rss_url ?>" title="RSS"><span>RSS</span></a></li>
				<?php } ?>
				<li class="tag_info icon"><a href="<?php echo getUrl('act','dispBoardTagList') ?>" title="Tag List"><span>Tag List</span></a></li>
				<?php if($__Context->module_info->default_style != 'forum' && $__Context->module_info->default_style != 'blog'){ ?>
				<li class="listTypeClassic icon"><a href="<?php echo getUrl('listStyle','list','act','','document_srl','') ?>" title="Classic Board"><span>Classic Board</span></a></li>
				<li class="listTypeZine icon"><a href="<?php echo getUrl('listStyle','webzine','act','','document_srl','') ?>" title="Web Zine"><span>Web Zine</span></a></li>
				<li class="listTypeGallery icon"><a href="<?php echo getUrl('listStyle','gallery','act','','document_srl','') ?>" title="Gallery"><span>Gallery</span></a></li>
				<?php } ?>
				<li class="contributors icon"><a href="<?php echo getUrl('','module','module','act','dispModuleSkinInfo','selected_module',$__Context->module_info->module, 'skin', $__Context->module_info->skin) ?>" onclick="popopen(this.href,'skinInfo'); return false;" title="Contributors"><span>Contributors</span></a></li>
			</ul>
		</div>
    </div>
<?php } ?>
