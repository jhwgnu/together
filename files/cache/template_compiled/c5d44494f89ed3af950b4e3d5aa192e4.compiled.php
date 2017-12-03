<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_header.html') ?>
<?php if($__Context->oDocument->isExists()){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_read.html');
} ?>
<?php 
	$__Context->notice_length = count($__Context->notice_list);
 ?>
<?php if($__Context->module_info->notice_color){ ?>
<p id="notice_color" style="display:none;"><?php echo $__Context->module_info->notice_color ?></p>
<script type="text/javascript"> 
jQuery(function($) {
function hexToRgb(h)
{
    var r = parseInt((cutHex(h)).substring(0,2),16), g = parseInt((cutHex(h)).substring(2,4),16), b = parseInt((cutHex(h)).substring(4,6),16)
    return r+','+g+','+b+',0.015';
}
function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}
	var color = $("#notice_color").text()
	if (color.indexOf("#") == 0){
		var result = "rgba("+hexToRgb(color)+ ")";
		$(".board_list tr.notice").css("background",  result);
	} else{
	var result = color+",0.015";
	var result2 = "rgba("+ result + ")";
	$(".board_list tr.notice").css("background", result2);
	}
});
</script>
<?php } ?>
<style type="text/css">
.board_list tr.notice:nth-of-type(<?php echo $__Context->notice_length ?>)>td{border-bottom:1px solid #eee}
</style>
<?php if($__Context->module_info->list_line=='yes'){ ?><style type="text/css">
.board_list td{border-bottom:1px solid #eee}
</style><?php } ?>
<style type="text/css">
.gallery_list .item .info{width:100%;height:100%;max-width:100%;max-height:100%;min-width:100%;min-height:100%;}
</style>
<?php if($__Context->module_info->gallery_thumbwidth){ ?><style type="text/css">
.gallery_list .item, .gallery_list .item .thumbnail{width:<?php echo $__Context->module_info->gallery_thumbwidth ?>px;}
</style><?php } ?>
<?php if(!$__Context->module_info->gallery_thumbwidth){ ?><style type="text/css">
.gallery_list .item, .gallery_list .item .thumbnail, .gallery_list .item .info{width:150px;}
</style><?php } ?>
<?php if($__Context->module_info->gallery_thumbheight){ ?><style type="text/css">
.gallery_list .item, .gallery_list .item .thumbnail, .gallery_list .item .info{height:<?php echo $__Context->module_info->gallery_thumbheight ?>px;}
</style><?php } ?>
<?php if(!$__Context->module_info->gallery_thumbheight){ ?><style type="text/css">
.gallery_list .item, .gallery_list .item .thumbnail, .gallery_list .item .info{height:150px;}
</style><?php } ?>
<?php if(!$__Context->document_list && !$__Context->notice_list){ ?><p class="no_document"><?php echo $__Context->lang->no_documents ?></p><?php } ?>
<?php if($__Context->document_list || $__Context->notice_list){ ?><table summary="List of Articles" id="board_list" class="board_list"<?php if($__Context->oDocument->isExists()){ ?> style="margin-top:50px;"<?php } ?>>
	<thead>
		<!-- LIST HEADER -->
		<?php if($__Context->notice_list){ ?><tr>
			<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){ ?>
			<?php if($__Context->val->type=='no'){ ?><th class="no" scope="col"><i class="xi-archive xi-fw"></i></th><?php } ?>
			<?php if($__Context->val->type=='title' && $__Context->val->idx==-1){ ?>
			<?php if($__Context->module_info->use_category=='Y' && $__Context->module_info->list_category=='td'){ ?><th class="category"><i class="xi-tagged-book xi-fw"></i></th><?php } ?>
			<th class="title" scope="col" class="title"><i class="xi-file-text xi-fw"></i></th>
			<?php } ?>
			<?php if($__Context->val->type=='nick_name'){ ?><th class="author" scope="col"><i class="xi-user xi-fw"></i></th><?php } ?>
			<?php if($__Context->val->type=='user_id'){ ?><th class="author" scope="col"><i class="xi-user-info xi-fw"></i></th><?php } ?>
			<?php if($__Context->val->type=='user_name'){ ?><th class="author" scope="col"><i class="xi-user xi-fw"></i></th><?php } ?>
			<?php if($__Context->val->type=='regdate'){ ?><th class="time" scope="col"><a href="<?php echo getUrl('sort_index','regdate','order_type',$__Context->order_type) ?>"><i class="xi-calendar xi-fw"></i></a></th><?php } ?>
			<?php if($__Context->val->type=='last_update'){ ?><th class="time" scope="col"><a href="<?php echo getUrl('sort_index','last_update','order_type',$__Context->order_type) ?>"><i class="xi-refresh-l xi-fw"></i></a></th><?php } ?>
			<?php if($__Context->val->type=='last_post'){ ?><th class="lastReply" scope="col"><a href="<?php echo getUrl('sort_index','last_update','order_type',$__Context->order_type) ?>"><i class="xi-file-add xi-fw"></i></a></a></th><?php } ?>
			<?php if($__Context->val->type=='readed_count'){ ?><th class="readNum" class="readNum"scope="col"><a href="<?php echo getUrl('sort_index','readed_count','order_type',$__Context->order_type) ?>"><i class="xi-eye xi-fw"></i></a></a></th><?php } ?>
			<?php if($__Context->val->type=='voted_count'){ ?><th class="voteNum" class="voteNum" scope="col"><a href="<?php echo getUrl('sort_index','voted_count','order_type',$__Context->order_type) ?>"><i class="xi-thumbs-up xi-fw"></i></a></th><?php } ?>
			<?php if($__Context->val->type=='blamed_count' && $__Context->val->idx==-1){ ?><th class="voteNum" scope="col"><a href="<?php echo getUrl('sort_index','blamed_count','order_type',$__Context->order_type) ?>"><i class="xi-thumbs-down xi-fw"></i></a></th><?php } ?>
			<?php if($__Context->val->idx!=-1){ ?><th scope="col"><a href="<?php echo getUrl('sort_index', $__Context->val->eid, 'order_type', $__Context->order_type) ?>" style="font-size:11px;"><?php echo $__Context->val->name ?></a></th><?php } ?>
			<?php } ?>
			<?php if($__Context->grant->manager){ ?><th class="check" scope="col"><i class="xi-check xi-fw" onclick="XE.checkboxToggleAll({ doClick:true });"></i></th><?php } ?>
		</tr><?php } ?>
		<!-- /LIST HEADER -->
	</thead>
	<tbody>
		<!-- NOTICE -->
		<?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no=>$__Context->document){ ?><tr class="notice">
			<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){ ?>
			<?php if($__Context->val->type=='no'){ ?><td class="no">
				<?php if($__Context->document_srl==$__Context->document->document_srl){ ?><i class="xi-check xi-fw"></i><?php } ?>
				<?php if($__Context->document_srl!=$__Context->document->document_srl){ ?><i class="xi-notice xi-fw"></i><?php } ?>
			</td><?php } ?>
			<?php if($__Context->val->type=='title' && $__Context->val->idx==-1){ ?>
			<?php if($__Context->module_info->use_category=='Y' && $__Context->module_info->list_category=='td'){ ?><td class="category">
				<?php echo $__Context->cate_list[$__Context->document->get('category_srl')]->title ?>
				<?php if(!$__Context->document->get('category_srl')){ ?>-<?php } ?>
			</td><?php } ?>
			<td class="title">
				<?php if($__Context->module_info->use_category=='Y' && $__Context->module_info->list_category=='seperate' && $__Context->document->get('category_srl')){ ?><span class="category"><?php echo $__Context->cate_list[$__Context->document->get('category_srl')]->title ?></span><?php } ?>
				<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>">
					<?php echo $__Context->document->getTitle() ?>
				</a>
				<?php if($__Context->document->getCommentCount()){ ?><a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#comment" class="replyNum plus" title="Replies">
					<?php echo $__Context->document->getCommentCount() ?>
				</a><?php } ?>
				<?php if($__Context->document->hasUploadedFiles()){ ?><span class="file plus"><i class="xi-clip xi-fw"></i></span><?php } ?>
				<?php if($__Context->document->thumbnailExists()){ ?><span class="file plus"><i class="xi-image xi-fw"></i></span><?php } ?>
				<?php if($__Context->document->variables[status]=='SECRET'){ ?><span class="secret plus"><i class="xi-lock xi-fw"></i></span><?php } ?>
				<?php if((int)($__Context->document->getRegdate('YmdHis')>date("YmdHis", time()-$__Context->module_info->duration_new*60*60))){ ?><span class="new plus"><i class="xi-star xi-fw"></i></span><?php } ?>
			</td>
			<?php } ?>
			<?php if($__Context->val->type=='nick_name'){ ?><td class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getNickName() ?></a></td><?php } ?>
			<?php if($__Context->val->type=='user_id'){ ?><td class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getUserID() ?></a></td><?php } ?>
			<?php if($__Context->val->type=='user_name'){ ?><td class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getUserName() ?></a></td><?php } ?>
			<?php if($__Context->val->type=='regdate'){ ?><td class="time"><?php echo $__Context->document->getRegdate('Y.m.d') ?></td><?php } ?>
			<?php if($__Context->val->type=='last_update'){ ?><td class="time"><?php echo zdate($__Context->document->get('last_update'),'Y.m.d') ?></td><?php } ?>
			<?php if($__Context->val->type=='last_post'){ ?><td class="lastReply">
				<?php if((int)($__Context->document->get('comment_count'))>0){ ?>
					<a href="<?php echo $__Context->document->getPermanentUrl() ?>#comment" title="Last Reply">
						<?php echo zdate($__Context->document->get('last_update'),'Y.m.d') ?>
					</a>
					<?php if($__Context->document->get('last_updater')){ ?><span>
						<sub>by</sub>
						<?php echo htmlspecialchars($__Context->document->get('last_updater')) ?>
					</span><?php } ?>
				<?php } ?>
				<?php if((int)($__Context->document->get('comment_count'))==0){ ?>&nbsp;<?php } ?>
			</td><?php } ?>
			<?php if($__Context->val->type=='readed_count'){ ?><td class="readNum"><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></td><?php } ?>
			<?php if($__Context->val->type=='voted_count'){ ?><td class="voteNum"><?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'0' ?></td><?php } ?>
			<?php if($__Context->val->type=='blamed_count' && $__Context->val->idx==-1){ ?><td class="voteNum"><?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'0' ?></td><?php } ?>
			<?php if($__Context->val->idx!=-1){ ?><td><?php echo $__Context->document->getExtraValueHTML($__Context->val->idx) ?></td><?php } ?>
			<?php } ?>
			<?php if($__Context->grant->manager){ ?><td class="check">
				<input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" id="<?php echo $__Context->document->document_srl ?>" name="<?php echo $__Context->document->document_srl ?>" class="iCheck" title="Check This Article" onclick="doAddDocumentCart(this)"<?php if($__Context->document->isCarted()){ ?> checked="checked"<?php } ?> />
				<label for="<?php echo $__Context->document->document_srl ?>"><i class="xi-check xi-fw"></i></label>
			</td><?php } ?>
		</tr><?php } ?>
		<!-- /NOTICE -->
	</tbody>
</table><?php } ?>
	<ul class="gallery_list">
		<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){ ?><li class="item">
			<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>">
				<?php if($__Context->module_info->gallery_thumbwidth && $__Context->module_info->gallery_thumbheight){ ?>
				<?php if($__Context->document->thumbnailExists() && (!$__Context->document->isSecret() || $__Context->document->isGranted())){ ?><img class="thumbnail" src="<?php echo $__Context->document->getThumbnail($__Context->module_info->gallery_thumbwidth, $__Context->module_info->gallery_thumbheight, $__Context->module_info->thumbnail_type) ?>" alt="<?php echo $__Context->document->getTitle() ?>" /><?php } ?>
				<?php }else{ ?>
				<?php if($__Context->document->thumbnailExists() && (!$__Context->document->isSecret() || $__Context->document->isGranted())){ ?><img class="thumbnail" src="<?php echo $__Context->document->getThumbnail(150, 150, $__Context->module_info->thumbnail_type) ?>" alt="<?php echo $__Context->document->getTitle() ?>" /><?php } ?>
				<?php } ?>
				<?php if(!$__Context->document->thumbnailExists()){ ?><img class="thumbnail"<?php if(!$__Context->oDocument->isExists()){ ?> src="<?php echo $__Context->tpl_path ?>noimage.png"<?php };
if($__Context->oDocument->isExists()){ ?> src="/modules/board/skins/ena_board_set_mellow/noimage.png"<?php } ?> alt="<?php echo $__Context->document->getTitle() ?>" /><?php } ?>
				<?php if($__Context->document->thumbnailExists() && ($__Context->document->isSecret() && !$__Context->document->isGranted())){ ?><img class="thumbnail"<?php if($__Context->oDocument->isExists()){ ?> src="<?php echo $__Context->tpl_path ?>secret_image.png"<?php };
if(!$__Context->oDocument->isExists()){ ?> src="/modules/board/skins/ena_board_set_mellow/secret_image.png"<?php } ?> alt="<?php echo $__Context->document->getTitle() ?>" /><?php } ?>
				<div class="info">
					<div class="info_content">
						<p class="title"><?php if($__Context->document->get('category_srl')){ ?><span class="category"><?php echo $__Context->cate_list[$__Context->document->get('category_srl')]->title ?> </span><?php } ?> <?php echo $__Context->document->getTitle() ?></p>
						<?php if($__Context->document->getNickName()){ ?><p class="nickname">by <?php echo $__Context->document->getNickName() ?></p><?php } ?>
						<p class="date"><?php echo $__Context->document->getRegdate('Y.m.d') ?></p>
					</div>
				</div>
			</a>
			<?php if($__Context->grant->manager){ ?><input type="checkbox" id="ic_<?php echo $__Context->document->document_srl ?>" name="cart" value="<?php echo $__Context->document->document_srl ?>" class="iCheck" title="Check This Article" onclick="doAddDocumentCart(this)"<?php if($__Context->oDocument->isCarted()){ ?> checked="checked"<?php } ?> /><?php };
if($__Context->grant->manager){ ?><label for="ic_<?php echo $__Context->document->document_srl ?>"><i class="xi-check xi-fw"></i></label><?php } ?>
		</li><?php } ?>
	</ul>
<div class="list_footer">
    <?php if($__Context->document_list || $__Context->notice_list){ ?><div class="pagination">
        <?php if($__Context->page != $__Context->page_navigation->first_page){ ?><a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="prevEnd"><i class="xi-angle-double-left xi-fw"></i></a><?php } ?>
		<?php if($__Context->page != $__Context->page_navigation->first_page){ ?><a href="<?php echo getUrl('page',$__Context->page-1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="direction prev"><i class="xi-angle-left xi-fw"></i></a><?php } ?>
        <?php while($__Context->page_no=$__Context->page_navigation->getNextPage()){ ?>
			<?php if($__Context->page==$__Context->page_no){ ?><strong class="num"><?php echo $__Context->page_no ?></strong><?php } ?>
			<?php if($__Context->page!=$__Context->page_no){ ?><a class="num" href="<?php echo getUrl('page',$__Context->page_no,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"><?php echo $__Context->page_no ?></a><?php } ?>
        <?php } ?>
		<?php if($__Context->page != $__Context->page_navigation->last_page){ ?><a href="<?php echo getUrl('page',$__Context->page+1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="direction next"><i class="xi-angle-right xi-fw"></i></a><?php } ?>
        <?php if($__Context->page != $__Context->page_navigation->last_page){ ?><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="nextEnd"><i class="xi-angle-double-right xi-fw"></i></a><?php } ?>
    </div><?php } ?>
	<div class="btnArea">
		<button type="button" id="search_open" onclick="jQuery(this).next('#board_search').slideToggle('fast'); return false;"><?php echo $__Context->lang->cmd_search ?></button>
		<?php if($__Context->grant->view){ ?><form action="<?php echo getUrl() ?>" method="get" onsubmit="return procFilter(this, search)" id="board_search" class="board_search"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
			<select name="search_target">
				<?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
			</select>
			<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
			<input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" accesskey="S" title="<?php echo $__Context->lang->cmd_search ?>" class="iText" />
			<button type="submit" onclick="xGetElementById('board_search').submit();return false;"><i class="xi-magnifier xi-fw"></i></button>
		</form><?php } ?>
		<?php if($__Context->module_info->use_taglist=='yes'){ ?><a href="<?php echo getUrl('act','dispBoardTagList') ?>" class="tagSearch" title="<?php echo $__Context->lang->tag ?>"><?php echo $__Context->lang->tag ?></a><?php } ?>
		<!-- <?php if($__Context->grant->write_document){ ?><a href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>"><?php echo $__Context->lang->cmd_write ?></a><?php } ?> -->
		<?php if($__Context->grant->manager){ ?><a href="<?php echo getUrl('','module','document','act','dispDocumentManageDocument') ?>"  onclick="popopen(this.href,'manageDocument'); return false;"><?php echo $__Context->lang->cmd_manage_document ?></a><?php } ?>
	</div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_footer.html') ?>
