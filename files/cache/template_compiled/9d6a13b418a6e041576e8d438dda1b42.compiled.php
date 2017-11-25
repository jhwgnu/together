<?php if(!defined("__XE__"))exit;?><!-- COMMENT -->
<?php if($__Context->oDocument->getCommentcount() || $__Context->oDocument->isEnableComment()){ ?><div class="feedback" id="comment">
	<?php if($__Context->oDocument->getCommentcount() && (!$__Context->oDocument->isSecret() || $__Context->oDocument->isGranted())){ ?><div class="fbHeader" >
		<h2><?php echo $__Context->lang->comment ?> <span><?php echo $__Context->oDocument->getCommentcount() ?></span></h2>
	</div><?php } ?>
	<?php if($__Context->oDocument->getCommentcount()){ ?><ul class="fbList">
		<?php if($__Context->oDocument->getComments()&&count($__Context->oDocument->getComments()))foreach($__Context->oDocument->getComments() as $__Context->key=>$__Context->comment){ ?><li<?php if(!$__Context->comment->get('depth')){ ?> class="fbItem"<?php };
if($__Context->comment->get('depth')){ ?> class="fbItem indent indent<?php echo ($__Context->comment->get('depth')) ?>"<?php };
if($__Context->comment->get('depth')){ ?> style="padding-left:<?php echo (($__Context->comment->get('depth'))-1)*15 ?>px"<?php } ?> id="comment_<?php echo $__Context->comment->comment_srl ?>">
		<?php if($__Context->comment->get('depth')){ ?><i class="xi-reply-l xi-fw xi-rotate-180"></i><?php } ?>
		<div class="commentWrap">
			<div class="comment_header">
			  <p class="meta">
					<?php if((!$__Context->comment->member_srl && $__Context->comment->homepage) && $__Context->module_info->hide_comment_writer==''){ ?><a class="author" href="<?php echo $__Context->comment->getHomepageUrl() ?>"><?php echo $__Context->comment->getNickName() ?></a><?php } ?>
					<?php if((!$__Context->comment->member_srl && !$__Context->comment->homepage) && $__Context->module_info->hide_comment_writer==''){ ?><span class="author"><?php echo $__Context->comment->getNickName() ?></span><?php } ?>
					<?php if($__Context->comment->member_srl && $__Context->module_info->hide_comment_writer==''){ ?><a class="author member_<?php echo $__Context->comment->member_srl ?>" href="#popup_menu_area" onclick="return false"><?php echo $__Context->comment->getNickName() ?></a><?php } ?>
					<span class="time"><?php echo $__Context->comment->getRegdate('Y.m.d H:i') ?></span>
					<?php if($__Context->module_info->use_comment_up=='yes' || $__Context->module_info->use_comment_down=='yes'){ ?><span class="updown">
						<?php if($__Context->module_info->use_comment_up=='yes'){ ?><button<?php if($__Context->is_logged){ ?> onclick="doCallModuleAction('comment','procCommentVoteUp','<?php echo $__Context->comment->comment_srl ?>');return false;"<?php } ?>><i class="xi-thumbs-up xi-fw"></i><span><?php echo $__Context->comment->get('voted_count') ?></span></button><?php } ?> 
						<?php if($__Context->module_info->use_comment_down=='yes'){ ?><button<?php if($__Context->is_logged){ ?> onclick="doCallModuleAction('comment','procCommentVoteDown','<?php echo $__Context->comment->comment_srl ?>');return false;"<?php } ?>><i class="xi-thumbs-down xi-fw"></i><span><?php echo str_replace("-", "", $__Context->comment->get('blamed_count')) ?></span></button><?php } ?>
					</span><?php } ?>
					<span class="action">
						<a class="board_btn" href="<?php echo getUrl('act','dispBoardReplyComment','comment_srl',$__Context->comment->comment_srl) ?>'" onclick="jQuery('#write_comment_<?php echo $__Context->comment->get('comment_srl') ?>').slideToggle('fast'); return false;"><?php echo $__Context->lang->cmd_reply ?></a>
						<?php if($__Context->comment->isGranted()||!$__Context->comment->get('member_srl')){ ?><a href="<?php echo getUrl('act','dispBoardModifyComment','comment_srl',$__Context->comment->comment_srl) ?>"><?php echo $__Context->lang->cmd_modify ?></a><?php } ?>
						<?php if($__Context->comment->isGranted()||!$__Context->comment->get('member_srl')){ ?><a href="<?php echo getUrl('act','dispBoardDeleteComment','comment_srl',$__Context->comment->comment_srl) ?>"><?php echo $__Context->lang->cmd_delete ?></a><?php } ?>
					</span>
			  </p>
			</div>
			<div class="comment_body">
			  <?php if(!$__Context->comment->isAccessible()){ ?>
				<?php if(!$__Context->comment->get('member_srl')){ ?>
				<form action="./" method="get" class="secret_comment" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
					<p class="desc"><label for="cpw_<?php echo $__Context->comment->comment_srl ?>"><i class="xi-lock xi-fw"></i> <?php echo $__Context->lang->msg_is_secret ?></label></p>
					<p>
						<input type="password" name="password" id="cpw_<?php echo $__Context->comment->comment_srl ?>"  placeholder="<?php echo $__Context->lang->password ?>" class="iText" />
						<button type="submit"><i class="xi-check xi-fw"></i></button>
					</p>
					<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
					<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
					<input type="hidden" name="document_srl" value="<?php echo $__Context->comment->get('document_srl') ?>" />
					<input type="hidden" name="comment_srl" value="<?php echo $__Context->comment->get('comment_srl') ?>" />
				</form>
				<?php }else{ ?>
				<p class="secret_comment desc"><i class="xi-lock xi-fw"></i> <?php echo $__Context->lang->msg_is_secret ?></p>
				<?php } ?>
			  <?php }else{ ?>
			    <?php echo nl2br($__Context->comment->getContent(false)) ?>
			    <?php if($__Context->comment->hasUploadedFiles()){ ?><div class="fileList">
					<button type="button" class="toggleFile" onclick="jQuery(this).next('ul.files').slideToggle('fast');"><i class="xi-clip xi-fw"></i> <?php echo $__Context->lang->uploaded_file ?> <?php echo $__Context->comment->get('uploaded_count') ?></button>
				    <ul class="files">
					    <?php if($__Context->comment->getUploadedFiles()&&count($__Context->comment->getUploadedFiles()))foreach($__Context->comment->getUploadedFiles() as $__Context->key=>$__Context->file){ ?><li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> <span class="fileSize"><?php echo FileHandler::filesize($__Context->file->file_size) ?>/<?php echo number_format($__Context->file->download_count) ?>hit</span></a></li><?php } ?>
				    </ul>
			    </div><?php } ?>
			  <?php } ?>
			</div>
		</div>
		
		<?php if($__Context->grant->write_comment && $__Context->oDocument->isEnableComment()){ ?><form action="./" method="post" onsubmit="return procFilter(this, insert_comment)" class="write_comment" id="write_comment_<?php echo $__Context->comment->get('comment_srl') ?>" style="display:none;border-top:1px solid #eee;border-bottom:1px solid #eee;"><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<h3><i class="xi-paper-plane xi-fw"></i> <?php echo $__Context->lang->comment ?> <?php echo $__Context->lang->cmd_write ?></h3>
	<input type="hidden" name="error_return_url" value="/<?php echo $__Context->comment->get('document_srl') ?>">
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->comment->get('document_srl') ?>" />
	<input type="hidden" name="parent_srl" value="<?php echo $__Context->comment->get('comment_srl') ?>" />
    <input type="hidden" name="content" value="" />
      <?php echo $__Context->comment->getEditor() ?>
		<div class="write_item">
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="text" name="nick_name" id="userName" placeholder="<?php echo $__Context->lang->writer ?>" class="iText userName" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="password" name="password" id="userPw" placeholder="<?php echo $__Context->lang->password ?>" class="iText userPw" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="text" name="homepage" id="homePage" placeholder="<?php echo $__Context->lang->homepage ?>" class="iText homePage" />
			</span><?php } ?>
			<?php if($__Context->is_logged){ ?><input type="checkbox" name="notify_message" value="Y" id="notify_message" class="iCheck" /><?php } ?>
			<?php if($__Context->is_logged){ ?><label for="notify_message"><i class="xi-bell xi-fw"></i></label><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><input type="checkbox" name="is_secret" value="Y" id="is_secret" class="iCheck" /><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><label for="is_secret"><i class="xi-lock xi-fw"></i></label><?php } ?>
			<button type="submit"><i class="xi-check xi-fw"></i></button>
		</div>
	</form><?php } ?>
		
		</li><?php } ?>
	</ul><?php } ?>
  <?php if($__Context->oDocument->comment_page_navigation){ ?><div class="pagination">
    <?php if($__Context->cpage != $__Context->oDocument->comment_page_navigation->first_page){ ?><a href="<?php echo getUrl('cpage',1) ?>#comment" class="prevEnd"><i class="xi-angle-double-left xi-fw"></i></a><?php } ?>
	<?php if($__Context->cpage != $__Context->oDocument->comment_page_navigation->first_page){ ?><a href="<?php echo getUrl('cpage',$__Context->cpage-1) ?>#comment" class="direction prev"><i class="xi-angle-left xi-fw"></i></a><?php } ?>
    <?php while($__Context->page_no=$__Context->oDocument->comment_page_navigation->getNextPage()){ ?>
			<?php if($__Context->cpage==$__Context->page_no){ ?><strong class="num"><?php echo $__Context->page_no ?></strong><?php } ?> 
			<?php if($__Context->cpage!=$__Context->page_no){ ?><a class="num" href="<?php echo getUrl('cpage',$__Context->page_no) ?>#comment"><?php echo $__Context->page_no ?></a><?php } ?>
    <?php } ?>
	<?php if($__Context->cpage != $__Context->oDocument->comment_page_navigation->last_page){ ?><a href="<?php echo getUrl('cpage',$__Context->cpage+1) ?>#comment" class="direction next"><i class="xi-angle-right xi-fw"></i></a><?php } ?>
    <?php if($__Context->cpage != $__Context->oDocument->comment_page_navigation->last_page){ ?><a href="<?php echo getUrl('cpage',$__Context->oDocument->comment_page_navigation->last_page) ?>#comment" class="nextEnd"><i class="xi-angle-double-right xi-fw"></i></a><?php } ?>
  </div><?php } ?>
  <?php if($__Context->grant->write_comment && $__Context->oDocument->isEnableComment()){ ?><form action="./" method="post" onsubmit="return procFilter(this, insert_comment)" class="write_comment" id="write_comment"<?php if(!$__Context->oDocument->getCommentcount()){ ?> style="border-top:0;"<?php } ?>><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<h3><i class="xi-paper-plane xi-fw"></i> <?php echo $__Context->lang->comment ?> <?php echo $__Context->lang->cmd_write ?></h3>
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
	<input type="hidden" name="comment_srl" value="" />
    <input type="hidden" name="content" value="" />
      <?php echo $__Context->oDocument->getCommentEditor() ?>
		<div class="write_item">
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="text" name="nick_name" id="userName" placeholder="<?php echo $__Context->lang->writer ?>" class="iText userName" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="password" name="password" id="userPw" placeholder="<?php echo $__Context->lang->password ?>" class="iText userPw" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="text" name="homepage" id="homePage" placeholder="<?php echo $__Context->lang->homepage ?>" class="iText homePage" />
			</span><?php } ?>
			<?php if($__Context->is_logged){ ?><input type="checkbox" name="notify_message" value="Y" id="notify_message" class="iCheck" /><?php } ?>
			<?php if($__Context->is_logged){ ?><label for="notify_message"><i class="xi-bell xi-fw"></i></label><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><input type="checkbox" name="is_secret" value="Y" id="is_secret" class="iCheck" /><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><label for="is_secret"><i class="xi-lock xi-fw"></i></label><?php } ?>
			<button type="submit"><i class="xi-check xi-fw"></i></button>
		</div>
	</form><?php } ?>
</div><?php } ?>
<!-- /COMMENT -->
