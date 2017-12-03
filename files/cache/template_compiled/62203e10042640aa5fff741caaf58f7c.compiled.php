<?php if(!defined("__XE__"))exit;
$__Context->oDocumentModel = getModel('document');
  $__Context->oModuleModel = &getModel('module');
  $__Context->module_srl = $__Context->oDocument->get('module_srl');
  $__Context->document_config = $__Context->oModuleModel->getModulePartConfig('document',$__Context->module_srl);
 ?>
<?php if($__Context->module_info->default_style=='link'){ ?><!--#Meta:modules/board/skins/ena_board_set_mellow/style.link.read.css--><?php $__tmp=array('modules/board/skins/ena_board_set_mellow/style.link.read.css','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<div class="board_read">
	<!-- READ HEADER -->
	<div class="read_header">
		<h1 class="title">
			<a href="<?php echo $__Context->oDocument->getPermanentUrl() ?>"<?php if($__Context->oDocument->get('title_color')){ ?> style="color:<?php echo $__Context->oDocument->get('title_color') ?>"<?php };
if($__Context->oDocument->get('title_bold')=='Y'){ ?> style="font-weight:bold;"<?php } ?>><?php echo $__Context->oDocument->getTitle() ?></a>
			<?php if($__Context->module_info->use_category=='Y' && $__Context->oDocument->get('category_srl')){ ?><span class="category">
				<i class="xi-tagged-book xi-fw"></i>
				<a href="<?php echo getUrl('category',$__Context->oDocument->get('category_srl'), 'document_srl', '') ?>"><?php echo $__Context->category_list[$__Context->oDocument->get('category_srl')]->title ?></a>
			</span><?php } ?>
		</h1>
		<p class="meta">
			<?php if($__Context->module_info->display_author!='N' && !$__Context->oDocument->getMemberSrl() && $__Context->oDocument->isExistsHomepage()){ ?><a href="<?php echo $__Context->oDocument->getHomepageUrl() ?>" onclick="window.open(this.href);return false;" class="author"><?php echo $__Context->oDocument->getNickName() ?></a><?php } ?>
			<?php if($__Context->module_info->display_author!='N' && !$__Context->oDocument->getMemberSrl() && !$__Context->oDocument->isExistsHomepage()){ ?><span><?php echo $__Context->oDocument->getNickName() ?></span><?php } ?>
			<?php if($__Context->module_info->display_author!='N' && $__Context->oDocument->getMemberSrl()){ ?><a href="#popup_menu_area" class="member_<?php echo $__Context->oDocument->get('member_srl') ?> author" onclick="return false"><?php echo $__Context->oDocument->getNickName() ?></a><?php } ?>
			<span class="sum">
				<span class="read"><i class="xi-eye xi-fw"></i> <span class="num"><?php echo $__Context->oDocument->get('readed_count') ?></span></span>
				<?php if($__Context->document_config->use_vote_up!='N' && $__Context->oDocument->get('voted_count')!=0){ ?><span class="vote"><i class="xi-thumbs-up xi-fw"></i> <span class="num"><?php echo $__Context->oDocument->get('voted_count') ?></span></span><?php } ?>
				<?php if($__Context->document_config->use_vote_down!='N' && $__Context->oDocument->get('blamed_count')!=0){ ?><span class="blame"><i class="xi-thumbs-down xi-fw"></i> <span class="num"><?php echo str_replace("-", "", $__Context->oDocument->get('blamed_count')) ?></span></span><?php } ?>
				<span class="time"><?php echo $__Context->oDocument->getRegdate('Y.m.d H:i') ?></span>
			</span>
		</p>
	</div>
	<!-- /READ HEADER -->
	<!-- Extra Output -->
	<?php if($__Context->oDocument->isExtraVarsExists() && (!$__Context->oDocument->isSecret() || $__Context->oDocument->isGranted())){ ?><div class="extra_value">
		<table border="1" cellspacing="0" summary="Extra Form Output">
			<?php if($__Context->oDocument->getExtraVars()&&count($__Context->oDocument->getExtraVars()))foreach($__Context->oDocument->getExtraVars() as $__Context->key=>$__Context->val){;
if($__Context->val->getValueHTML()){ ?><tr>
				<th scope="row"><?php echo $__Context->val->name ?></th>
				<td><?php echo $__Context->val->getValueHTML() ?></td>
			</tr><?php }} ?>
		</table>
	</div><?php } ?>
	<!-- /Extra Output -->
	<!-- READ BODY -->
	<div class="read_body">
		<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
			<?php if(!$__Context->oDocument->get('member_srl')){ ?>
			<form action="./" method="get" onsubmit="return procFilter(this, input_password)" class="secret_document"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
				<i class="xi-lock xi-fw secret_mark"></i>
				<p>
					<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
					<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
					<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
					<input type="password" name="password" id="cpw" class="iText" placeholder="<?php echo $__Context->lang->password ?>" />
				</p>
			</form>
			<?php }else{ ?>
			<div class="secret_document"><i class="xi-lock xi-fw secret_mark"></i></div>
			<?php } ?>
		<?php }else{ ?>
		<?php echo $__Context->oDocument->getContent(false) ?>
		<?php } ?>
	</div>
	<?php if($__Context->document_config->use_vote_up=='S' || $__Context->document_config->use_vote_down=='S'){ ?><div class="updown" >
		<?php if($__Context->document_config->use_vote_up=='S'){ ?><button<?php if($__Context->is_logged){ ?> onclick="doCallModuleAction('document','procDocumentVoteUp','<?php echo $__Context->document_srl ?>');return false;"<?php } ?>><span><?php echo $__Context->oDocument->get('voted_count') ?></span><?php echo $__Context->lang->cmd_vote ?></button><?php } ?>
		<?php if($__Context->document_config->use_vote_down=='S'){ ?><button<?php if($__Context->is_logged){ ?> onclick="doCallModuleAction('document','procDocumentVoteDown','<?php echo $__Context->document_srl ?>');return false;"<?php } ?>><span><?php echo str_replace("-", "", $__Context->oDocument->get('blamed_count')) ?></span><?php echo $__Context->lang->cmd_vote_down ?></button><?php } ?>
	</div><?php } ?>
	<!-- /READ BODY -->
	<!-- READ FOOTER -->
	<div class="read_footer">
		<?php if($__Context->oDocument->hasUploadedFiles() || $__Context->oDocument->get('tag_list')){ ?><div class="fnt">
			<?php if($__Context->oDocument->hasUploadedFiles()){ ?><div class="fileList">
				<?php if($__Context->oDocument->get('tag_list')){ ?><style type="text/css">
				.read_footer .fileList .files li{padding:10px 0;border-bottom:1px solid #eee;}
				</style><?php } ?>
				<button type="button" class="toggleFile" onclick="jQuery(this).next('ul.files').slideToggle('fast');"><i class="xi-clip xi-fw"></i> <?php echo $__Context->lang->uploaded_file ?> <?php echo $__Context->oDocument->get('uploaded_count') ?></button>
				<ul class="files">
					<?php if($__Context->oDocument->getUploadedFiles()&&count($__Context->oDocument->getUploadedFiles()))foreach($__Context->oDocument->getUploadedFiles() as $__Context->key=>$__Context->file){ ?><li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> <span class="fileSize"><?php echo FileHandler::filesize($__Context->file->file_size) ?>/<?php echo number_format($__Context->file->download_count) ?>hit</span></a></li><?php } ?>
				</ul>
			</div><?php } ?>
			<?php if($__Context->oDocument->get('tag_list')){ ?><div class="tag">
				<span class="tag_mark"><i class="xi-tags xi-fw xi-flip-vertical"></i> <?php echo $__Context->lang->tag ?></span>
				<?php  $__Context->tag_list = $__Context->oDocument->get('tag_list')  ?>
				<?php if(count($__Context->tag_list)){ ?><span>
					<?php for($__Context->i=0;$__Context->i<count($__Context->tag_list);$__Context->i++){ ?>
						<?php  $__Context->tag = $__Context->tag_list[$__Context->i];  ?>
						<a href="<?php echo getUrl('search_target','tag','search_keyword',$__Context->tag,'document_srl','') ?>" class="tag" rel="tag">#<?php echo htmlspecialchars($__Context->tag) ?></a><span> </span>
					<?php } ?>
				</span><?php } ?>
			</div><?php } ?>
		</div><?php } ?>
		<?php if($__Context->module_info->display_sign!='N' && $__Context->oDocument->getSignature()){ ?><div class="sign">
			<div class="sign_header"><i class="xi-pen xi-fw"></i> 글쓴이의 말</div>
			<div class="sign_body"><?php echo $__Context->oDocument->getSignature() ?></div>
		</div><?php } ?>
		<div class="btnArea">
		  <a class="document_<?php echo $__Context->oDocument->document_srl ?> action" href="#popup_menu_area" onclick="return false"><?php echo $__Context->lang->cmd_document_do ?>…</a>
			<?php if($__Context->oDocument->isEditable()){ ?><a href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>"><?php echo $__Context->lang->cmd_modify ?></a><?php } ?>
			<?php if($__Context->oDocument->isEditable()){ ?><a href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>"><?php echo $__Context->lang->cmd_delete ?></a><?php } ?>
			<a href="<?php echo getUrl('document_srl','') ?>"><?php echo $__Context->lang->cmd_list ?></a>
		</div>
	</div>
	<!-- /READ FOOTER -->
</div>
<?php if($__Context->oDocument->allowComment()){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_comment.html');
} ?>
