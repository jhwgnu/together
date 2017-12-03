<?php if(!defined("__XE__"))exit;
$__Context->mi = $__Context->module_info;
	if (!$__Context->mi->thumbnail_width)  $__Context->mi->thumbnail_width  = 130;
	if (!$__Context->mi->thumbnail_height) $__Context->mi->thumbnail_height = 100;
	if (!$__Context->mi->content_cut_size) $__Context->mi->content_cut_size = 200;
	$__Context->list_idx = 1;
 ?>
<!--#Meta:modules/board/skins/xe_2010_gallery/js/jquery.easing.1.3.js--><?php $__tmp=array('modules/board/skins/xe_2010_gallery/js/jquery.easing.1.3.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/xe_2010_gallery/js/list.xe.js--><?php $__tmp=array('modules/board/skins/xe_2010_gallery/js/list.xe.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="list">
	<form action="./" method="get" class="list-body"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<fieldset>
			<legend>List of Articles</legend>
	
			<div class="list-container hide">
			<ul>
				<li class="fbox article">
					<a href="#" class="title"><span class="iefix"></span></a>
					<span class="thumb">
						<img src="/modules/board/skins/xe_2010_gallery/img/noimage.gif" width="<?php echo $__Context->mi->thumbnail_width ?>" height="<?php echo $__Context->mi->thumbnail_height ?>" alt="" /></a>
					</span>
	
					<ul class="flat meta">
						<li class="reply"></li>
						<li class="author"><a href="#popup_menu_area" class="member_0" onclick="return false"></a></li>
						<li class="date"></li>
						<li class="summary"></li>
					</ul>
				</li>
			</ul>
			</div>
	
			<div class="list-container">
			<ul>
				<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->doc){ ?><li class="fbox article <?php echo ($__Context->list_idx++%2)?'odd':'even' ?>">
					<?php 
						$__Context->post_link     = getUrl('document_srl',$__Context->doc->document_srl);
						$__Context->perm_link     = $__Context->doc->getPermanentUrl();
						$__Context->comment_count = $__Context->doc->getCommentCount();
						$__Context->has_thumbnail = $__Context->doc->thumbnailExists($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, $__Context->mi->thumbnail_type);
					 ?>
					<a href="<?php echo $__Context->post_link ?>" class="title"><?php echo $__Context->doc->getTitle($__Context->mi->subject_cut_size) ?> <?php echo $__Context->doc->printExtraImages(60*60*$__Context->module_info->duration_new) ?><span class="iefix"></span></a>
					<span class="thumb">
					<?php if($__Context->has_thumbnail){ ?>
						<img src="<?php echo $__Context->doc->getThumbnail($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, $__Context->mi->thumbnail_type) ?>" width="<?php echo $__Context->mi->thumbnail_width ?>" height="<?php echo $__Context->mi->thumbnail_height ?>" alt="" />
					<?php }else{ ?>
						<img src="/modules/board/skins/xe_2010_gallery/img/noimage.gif" width="<?php echo $__Context->mi->thumbnail_width ?>" height="<?php echo $__Context->mi->thumbnail_height ?>" alt="" />
					<?php } ?>
					</span>
					<ul class="flat meta">
						<li class="reply"><?php echo $__Context->comment_count ?></li>
						<li class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->doc->get('member_srl') ?>" onclick="return false"><?php echo $__Context->doc->getNickName() ?></a></li>
						<li class="date"><?php echo $__Context->doc->getRegdate('Y.m.d') ?></li>
						<li class="summary"><?php echo $__Context->doc->getSummary($__Context->mi->content_cut_size) ?></li>
					</ul>
				</li><?php } ?>
			</ul>
			</div>
		</fieldset>
	</form>
	<div class="fbox list-foot">
		<form action="./" method="get" class="pagination"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<fieldset>
			<legend>Board Pagination</legend>
			<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
			<input type="hidden" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" />
			<input type="hidden" name="search_target" value="<?php echo $__Context->search_target ?>" />
			<?php  $__Context->prev_page = max($__Context->page-1, 1) ?>
			<?php  $__Context->next_page = min($__Context->page+1, $__Context->page_navigation->last_page) ?>
			<ul>
				<li class="first"><a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"<?php if($__Context->page!=1){ ?> class="active"<?php } ?>><span><?php echo $__Context->lang->first_page ?></span></a></li>
				<li class="prev"><a href="<?php echo getUrl('page',$__Context->prev_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"<?php if($__Context->prev_page<$__Context->page){ ?> class="active"<?php } ?>><span>PREV <?php echo $__Context->mi->list_count ?></span></a></li>
				<li class="pages"><span><input type="text" name="page" value="<?php echo $__Context->page ?>" /> of <em><?php echo $__Context->total_page ?></em></span></li>
				<li class="next"><a href="<?php echo getUrl('page',$__Context->next_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"<?php if($__Context->next_page>$__Context->page){ ?> class="active"<?php } ?>><span>NEXT <?php echo $__Context->mi->list_count ?></span></a></li>
				<li class="last"><a href="<?php echo getUrl('page',$__Context->total_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"<?php if($__Context->total_page>$__Context->page){ ?> class="active"<?php } ?>><span><?php echo $__Context->lang->last_page ?></span></a></li>
			</ul>
		</fieldset>
		</form>
	</div>
	<div class="list_footer">
		<div class="btnArea">
			<a class="btn" href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>"><?php echo $__Context->lang->cmd_write ?></a>
		</div>
		<button type="button" class="bsToggle" title="<?php echo $__Context->lang->cmd_search ?>"><?php echo $__Context->lang->cmd_search ?></button>
		<?php if($__Context->grant->view){ ?><form action="<?php echo getUrl() ?>" method="get" onsubmit="return procFilter(this, search)" id="board_search" class="board_search" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
			<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
			<input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" title="<?php echo $__Context->lang->cmd_search ?>" class="iText" />
			<select name="search_target">
				<?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
			</select>
			<button class="btn" type="submit"><?php echo $__Context->lang->cmd_search ?></button>
			<?php if($__Context->last_division){ ?><a class="btn" href="<?php echo getUrl('page',1,'document_srl','','division',$__Context->last_division,'last_division','') ?>"><?php echo $__Context->lang->cmd_search_next ?></a><?php } ?>
		</form><?php } ?>
		<a href="<?php echo getUrl('act','dispBoardTagList') ?>" class="tagSearch" title="<?php echo $__Context->lang->tag ?>"><?php echo $__Context->lang->tag ?></a>
	</div>
</div>
<script>
if (typeof window.xe_v3 == 'undefined') window.xe_v3 = {};
jQuery.extend(xe_v3, {
	page : '<?php echo $__Context->page ?>',
	list_count : '<?php echo $__Context->mi->list_count ?>',
	last_page  : '<?php echo $__Context->total_page ?>',
	content_cut_size : '<?php echo $__Context->mi->content_cut_size ?>',
	thumbnail_width  : '<?php echo $__Context->mi->thumbnail_width ?>',
	thumbnail_height : '<?php echo $__Context->mi->thumbnail_height ?>',
	thumbnail_type   : '<?php echo $__Context->mi->thumbnail_type ?>',
	search_keyword   : '<?php echo addslashes($__Context->search_keyword) ?>',
	search_target    : '<?php echo $__Context->search_target ?>'
});
</script>
