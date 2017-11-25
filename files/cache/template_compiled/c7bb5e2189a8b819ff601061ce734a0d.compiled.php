<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/board/skins/ena_board_set_mellow/style.default.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.default.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/ena_board_set_mellow/js.default.js--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/js.default.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
 
<?php if($__Context->module_info->default_style=='diary'){ ?> 
	<!--#Meta:modules/board/skins/ena_board_set_mellow/style.diary.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.diary.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php }elseif($__Context->module_info->default_style=='memo'){ ?> 
	<!--#Meta:modules/board/skins/ena_board_set_mellow/style.memo.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.memo.css','','','');Context::loadFile($__tmp);unset($__tmp); ?> 
<?php }elseif($__Context->module_info->default_style=='1line_memo'){ ?> 
	<!--#Meta:modules/board/skins/ena_board_set_mellow/style.1line.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.1line.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php }elseif($__Context->module_info->default_style=='guestbook'){ ?> 
	<!--#Meta:modules/board/skins/ena_board_set_mellow/style.guestbook.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.guestbook.css','','','');Context::loadFile($__tmp);unset($__tmp); ?> 
<?php }elseif($__Context->module_info->default_style=='gallery'){ ?> 
	<!--#Meta:modules/board/skins/ena_board_set_mellow/style.gallery.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.gallery.css','','','');Context::loadFile($__tmp);unset($__tmp); ?> 
<?php }elseif($__Context->module_info->default_style=='link'){ ?> 
	<!--#Meta:modules/board/skins/ena_board_set_mellow/style.link.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.link.css','','','');Context::loadFile($__tmp);unset($__tmp); ?> 
<?php }else{ ?> 
	<!--#Meta:modules/board/skins/ena_board_set_mellow/style.normal.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.normal.css','','','');Context::loadFile($__tmp);unset($__tmp); ?> 
<?php } ?> 
<?php if(!$__Context->module_info->duration_new = (int)$__Context->module_info->duration_new){;
$__Context->module_info->duration_new = 12;
} ?>
<?php if($__Context->order_type == "desc"){ ?>
    <?php  $__Context->order_type = "asc";  ?>
<?php }else{ ?>
    <?php  $__Context->order_type = "desc";  ?>
<?php } ?>
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
<?php 
	$__Context->oDB = &DB::getInstance();
	$__Context->query = $__Context->oDB->_query('select count(*) as total from xe_documents where module_srl = '.$__Context->module_info->module_srl.'');
	$__Context->result = $__Context->oDB->_fetch($__Context->query);
 ?>
<?php if($__Context->module_info->point_color){ ?>
<?php if($__Context->module_info->point_color){ ?><style type="text/css">
.board_content a:hover, .board_content a:active, 
.board_list tr>.no:not(th) i, .board_list td.title .plus i, .board_list .check input[type="checkbox"]:checked+label, .board_content .pagination strong, .list_footer .board_search button i, 
.gallery_list input[type="checkbox"]:checked+label, .gallery_list input[type="checkbox"]:hover, .gallery_list input[type="checkbox"]:active,
.read_header h1>.category i, .read_header .sum .read i, .read_body .secret_document .secret_mark, .read_body .plus, .read_footer .fnt i, .read_footer .sign .sign_header i, 
 .updown button>span, .updown button:hover,  .updown button:active,  
.feedback .fbItem>i, .write_comment h3>i, .write_comment .write_item input[type="checkbox"]:checked+label, .write_comment .write_item button[type="submit"]:hover, .write_comment .write_item button[type="submit"]:active, .feedback .comment_body .fileList .toggleFile i, .feedback .secret_comment i, .feedback .secret_comment button[type="submit"]:hover, .feedback .secret_comment button[type="submit"]:active, 
.write_check input[type="checkbox"]:checked+label:before, .exForm i, .board_write .exForm>table input[type="radio"]:checked+label:before, .board_write .exForm>table input[type="checkbox"]:checked+label:before, .board_write .btnArea button[type="submit"]:hover, .board_write .btnArea button[type="submit"]:active, .board_write .btnArea button:hover, .board_write .btnArea button:active, 
.context_message h1,
.tag_list .rank2:link, .tag_list .rank2:visited{
color:<?php echo $__Context->module_info->point_color ?>;
}
.board_header .board_category .category_list>ul a:hover, .board_header .board_category .category_list>ul a:active,
.tag_list .rank1{
background:<?php echo $__Context->module_info->point_color ?>;
}
</style><?php } ?>
<?php if($__Context->module_info->point_color && $__Context->module_info->default_style=='1line_memo'){ ?><style type="text/css">
.board_read .no i, .read_body .secret i, .secretMark i, .board_read .iCheck input[type="checkbox"]:checked+label{color:<?php echo $__Context->module_info->point_color ?>;}
.read_body .secret button[type="submit"] i{color:#ccc;}
.read_body .secret button[type="submit"] i:hover, .read_body .secret button[type="submit"] i:active, .feedback .no i{color:<?php echo $__Context->module_info->point_color ?>;}
</style><?php } ?>
<?php if($__Context->module_info->point_color && $__Context->module_info->default_style=='guestbook'){ ?><style type="text/css"></style><?php } ?>
<?php if($__Context->module_info->point_color && $__Context->module_info->default_style=='diary'){ ?><style type="text/css">
.read_header .time{color:<?php echo $__Context->module_info->point_color ?>;}
</style><?php } ?>
<?php if($__Context->module_info->point_color && $__Context->module_info->default_style=='link'){ ?><style type="text/css">
.category_title,.category_title a:link, .category_title a:visited{color:<?php echo $__Context->module_info->point_color ?>;}
</style><?php } ?>
<?php } ?>
<?php if($__Context->module_info->default_style=='diary' || $__Context->module_info->default_style=='memo' || $__Context->module_info->default_style=='1line_memo' || $__Context->module_info->default_style=='guestbook' || $__Context->module_info->default_style=='link'){ ?><script type="text/javascript">
//create and delete action
function completeDocumentInserted(ret_obj)
{
    var error = ret_obj.error;
    var message = ret_obj.message;
    var mid = ret_obj.mid;
    var document_srl = ret_obj.document_srl;
    var category_srl = ret_obj.category_srl;
    var url = request_uri+mid;
    location.href = url;
}
function completeDocumentInserted(ret_obj)
{
    var error = ret_obj.error;
    var message = ret_obj.message;
    var mid = ret_obj.mid;
    var document_srl = ret_obj.document_srl;
    var category_srl = ret_obj.category_srl;
    var url = request_uri+mid;
    location.href = url;
}
function completeInsertComment(ret_obj) {
    var error = ret_obj.error;
    var message = ret_obj.message;
    var mid = ret_obj.mid;
    var document_srl = ret_obj.document_srl;
    var comment_srl = ret_obj.comment_srl;
    var url = request_uri+mid;
    location.href = url;
}
function completeDeleteDocument(ret_obj) {
    var error = ret_obj.error;
    var message = ret_obj.message;
    var mid = ret_obj.mid;
    var page = ret_obj.page;
    var url = request_uri+mid;
    location.href = url;
  }
function completeDeleteComment(ret_obj) {
    var error = ret_obj.error;
    var message = ret_obj.message;
    var mid = ret_obj.mid;
    var document_srl = ret_obj.document_srl;
    var page = ret_obj.page;
    var url = request_uri+mid;
    location.href = url;
  }
</script><?php } ?>
<!-- skin title : 이나 통합 게시판 - mellow, ver : 1.0.0, by 이나( http://starlight01.tistory.com/ ) - 이 주석은 지우지 마세요 -->
<div class="board_content">
	<div class="board_header">
		<?php if($__Context->grant->write_document || $__Context->grant->manager){ ?><div class="top_btn">
			<?php if($__Context->grant->write_document){ ?><a href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>"><?php echo $__Context->lang->cmd_write ?></a><?php } ?>
			<?php if($__Context->grant->manager){ ?><a class="setup" href="<?php echo getUrl('act','dispBoardAdminBoardInfo') ?>" title="<?php echo $__Context->lang->cmd_setup ?>"><?php echo $__Context->lang->cmd_setup ?></a><?php } ?>
		</div><?php } ?>
		<?php if($__Context->module_info->use_category=='Y' && $__Context->act == ''){ ?><div class="board_category"<?php if($__Context->module_info->default_style=='link'){ ?> style="display:none;"<?php } ?>>
			<script type="text/javascript">
				jQuery(function($) {
				var current = $("#current_category").text();
				$("#current").prepend(current);
				var category_width = $(".category_list>ul").width();
				$("#current").css("width", category_width+3);
				var category_width2 = Math.floor($(".category_list>ul").width());
				$(".category_list>ul").css("width", category_width2+17);
				$("#current").click(function(){
					$(".category_list>ul").slideToggle("fast");
				});
				$("#current").toggle(function(){
					$("#current").css("border", "1px solid #eee");
					$("#current").css("border-bottom", "0");
				}, function(){
					$("#current").css("border", "1px solid transparent");
				});
				});
			</script>
			<div class="category_mark">Category<i class="xi-angle-right"></i></div>
			<ul class="category_list">
				<li id="current"><i class="xi-angle-down"></i></li>
				<ul>
					<li<?php if(!$__Context->category){ ?> id="current_category"<?php } ?>><a href="<?php echo getUrl('category','','page','') ?>">all<?php if($__Context->result->total != 0){ ?><span>(<?php echo $__Context->result->total ?>)</span><?php } ?></a></li>
					<?php if($__Context->cate_list&&count($__Context->cate_list))foreach($__Context->cate_list as $__Context->key=>$__Context->val){ ?><li>
						<span<?php if($__Context->category==$__Context->val->category_srl){ ?> id="current_category"<?php } ?>><a href="<?php echo getUrl(category,$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title;
if($__Context->val->document_count){ ?><span>(<?php echo $__Context->val->document_count ?>)</span><?php } ?></a></span>
						<?php if(count($__Context->val->children)){ ?><ul>
							<?php if($__Context->val->children&&count($__Context->val->children))foreach($__Context->val->children as $__Context->idx=>$__Context->item){ ?><li<?php if($__Context->category==$__Context->item->category_srl){ ?> id="current_category"<?php } ?>><a href="<?php echo getUrl(category,$__Context->item->category_srl,'document_srl','', 'page', '') ?>">- <?php echo $__Context->item->title;
if($__Context->item->document_count){ ?><span>(<?php echo $__Context->item->document_count ?>)</span><?php } ?></a></li><?php } ?>
						</ul><?php } ?>
					</li><?php } ?>
				</ul>
			</ul>
		</div><?php } ?>
	</div>
