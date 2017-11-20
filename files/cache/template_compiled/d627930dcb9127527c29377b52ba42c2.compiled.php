<?php if(!defined("__XE__"))exit;?><div class="board_read">
	<!-- READ HEADER -->
	<div class="read_header">
		<h1>
			<?php if($__Context->module_info->use_category=='Y' && $__Context->oDocument->get('category_srl')){ ?><a href="<?php echo getUrl('category',$__Context->oDocument->get('category_srl'), 'document_srl', '') ?>" class="category"><?php echo $__Context->category_list[$__Context->oDocument->get('category_srl')]->title ?></a><?php } ?>
			<a href="<?php echo $__Context->oDocument->getPermanentUrl() ?>"><?php echo $__Context->oDocument->getTitle() ?></a>
		</h1>
		<p class="meta">
			<span class="author">
				<i class="xi-user"></i><?php if($__Context->module_info->display_author!='N' && !$__Context->oDocument->getMemberSrl() && $__Context->oDocument->isExistsHomepage()){ ?><a href="<?php echo $__Context->oDocument->getHomepageUrl() ?>" target="_blank" rel="noopener" class="author"><?php echo $__Context->oDocument->getNickName() ?></a><?php } ?>
				<?php if($__Context->module_info->display_author!='N' && !$__Context->oDocument->getMemberSrl() && !$__Context->oDocument->isExistsHomepage()){;
echo $__Context->oDocument->getNickName();
} ?>
				<?php if($__Context->module_info->display_author!='N' && $__Context->oDocument->getMemberSrl()){ ?><a href="#popup_menu_area" class="member_<?php echo $__Context->oDocument->get('member_srl') ?> author" onclick="return false"><?php echo $__Context->oDocument->getNickName() ?></a><?php } ?>
			</span>
			<span class="time">
				<i class="xi-time"></i> <?php echo $__Context->oDocument->getRegdate('Y.m.d H:i') ?>
			</span>
			<span class="read_count">
				<i class="xi-eye"></i> <?php echo $__Context->lang->readed_count ?> : <?php echo $__Context->oDocument->get('readed_count') ?>
			</span>
			<?php if($__Context->oDocument->get('voted_count')!=0){ ?><span class="vote_count">
				<i class="xi-thumbs-up"></i><?php echo $__Context->lang->cmd_vote ?>:<?php echo $__Context->oDocument->get('voted_count') ?>
			</span><?php } ?>
		</p>
	</div>
	<!-- /READ HEADER -->
	<!-- Extra Output -->
	<?php if($__Context->oDocument->isExtraVarsExists() && (!$__Context->oDocument->isSecret() || $__Context->oDocument->isGranted())){ ?><div class="exOut">
		<table border="1" cellspacing="0" summary="Extra Form Output">
			<?php if($__Context->oDocument->getExtraVars()&&count($__Context->oDocument->getExtraVars()))foreach($__Context->oDocument->getExtraVars() as $__Context->key=>$__Context->val){ ?><tr>
				<th scope="row"><?php echo $__Context->val->name ?></th>
				<td><?php echo $__Context->val->getValueHTML() ?>&nbsp;</td>
			</tr><?php } ?>
		</table>
	</div><?php } ?>
	<!-- /Extra Output -->
	<!-- READ BODY -->
	<div class="read_body">
		<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
		<form action="./" method="get" onsubmit="return procFilter(this, input_password)" class="secretForm"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
			<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
			<p><label for="cpw"><?php echo $__Context->lang->msg_is_secret ?> <?php echo $__Context->lang->msg_input_password ?></label></p>
			<p><input type="password" name="password" id="cpw" class="iText" /><input type="submit" value="<?php echo $__Context->lang->cmd_input ?>" class="btn" />
			</p>
		</form>
		<?php }else{ ?>
		<?php echo $__Context->oDocument->getContent(false) ?>
		<?php } ?>
	</div>
	<!-- /READ BODY -->
	<!-- READ FOOTER -->
	<div class="read_footer">
		<div class="sns">
		    <ul>
		    <li>
		        <a href="http://facebook.com/" class="facebook tooltip"><i class="xi-facebook"></i></a>
		    </li>
		    <li>
		        <a href="#" class="google"><i class="xi-google-plus"></i></a>
		    </li>
		    <li>
		        <a href="http://twitter.com/" class="twitter"> <i class="xi-twitter"></i></a>
		    </li>
		    </ul>
			<script>
				var sTitle = '<?php echo str_ireplace(array('<script', '</script'), array("<scr'+'ipt", "</scr'+'ipt"), addslashes($__Context->oDocument->getTitleText())) ?>';
				jQuery(function($){
					$('.twitter').snspost({
						type : 'twitter',
						content : sTitle + ' <?php echo $__Context->oDocument->getPermanentUrl() ?>'
					});
					$('.facebook').snspost({
						type : 'facebook',
						content : sTitle
					});
					$('.google').snspost({
						type : 'google',
						content : sTitle
					});
				});
			</script>		    
		</div>
		<?php if($__Context->oDocument->hasUploadedFiles()){ ?><div class="fileList">
			<button type="button" class="toggleFile" onclick="jQuery(this).next('ul.files').toggle();"><i class="xi-diskette"></i> <?php echo $__Context->lang->uploaded_file ?> [<strong><?php echo $__Context->oDocument->get('uploaded_count') ?></strong>]</button>
			<ul class="files">
				<?php if($__Context->oDocument->getUploadedFiles()&&count($__Context->oDocument->getUploadedFiles()))foreach($__Context->oDocument->getUploadedFiles() as $__Context->key=>$__Context->file){ ?><li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> <span class="fileSize">[File Size:<?php echo FileHandler::filesize($__Context->file->file_size) ?>/Download:<?php echo number_format($__Context->file->download_count) ?>]</span></a></li><?php } ?>
			</ul>
		</div><?php } ?>
		<div class="tns">
			<?php  $__Context->tag_list = $__Context->oDocument->get('tag_list')  ?>
			<?php if(count($__Context->tag_list)){ ?><span class="tags">
				<i class="xi-tags"></i>
				<?php for($__Context->i=0;$__Context->i<count($__Context->tag_list);$__Context->i++){ ?>
					<?php  $__Context->tag = $__Context->tag_list[$__Context->i];  ?>
					<a href="<?php echo getUrl('search_target','tag','search_keyword',$__Context->tag,'document_srl','') ?>" class="tag" rel="tag"><?php echo htmlspecialchars($__Context->tag) ?></a><span>,</span>
				<?php } ?>
			</span><?php } ?>
			<a class="document_<?php echo $__Context->oDocument->document_srl ?> action" href="#popup_menu_area" onclick="return false"><?php echo $__Context->lang->cmd_document_do ?></a>
		</div>
		<?php if($__Context->module_info->display_sign!='N'&&($__Context->oDocument->getProfileImage()||$__Context->oDocument->getSignature())){ ?><div class="sign">
			<?php if($__Context->oDocument->getProfileImage()){ ?><img src="<?php echo $__Context->oDocument->getProfileImage() ?>" alt="Profile" class="pf" /><?php } ?>
			<?php if($__Context->oDocument->getSignature()){ ?><div class="tx"><?php echo $__Context->oDocument->getSignature() ?></div><?php } ?>
		</div><?php } ?>
		<div class="btnArea"> 
			<?php if($__Context->oDocument->isEditable()){ ?><a class="btn" href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>"><i class="xi-eraser"></i><?php echo $__Context->lang->cmd_modify ?></a><?php } ?>
			<?php if($__Context->oDocument->isEditable()){ ?><a class="btn" href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>"><i class="xi-trash"></i><?php echo $__Context->lang->cmd_delete ?></a><?php } ?>
			<span class="etc">
				<a href="<?php echo getUrl('document_srl','') ?>" class="btn"><i class="xi-list-ul-l"></i><?php echo $__Context->lang->cmd_list ?></a>
			</span>
		</div>
	</div>
	<!-- /READ FOOTER -->
</div>
<?php if($__Context->oDocument->allowTrackback()){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_trackback.html') ?>
<?php } ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_comment.html') ?>
