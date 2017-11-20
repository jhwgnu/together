<?php if(!defined("__XE__"))exit;
if($__Context->oDocument->getCommentCount()){ ?>
<hr class="hr" />
<div class="fbList" id="reply">
	<h3 class="fbHeader">
		<?php if($__Context->grant->write_comment && $__Context->oDocument->allowComment()) { ?>
			<?php echo $__Context->lang->comment ?> <em>'<?php echo $__Context->oDocument->getCommentcount() ?>'</em>
		<?php } ?>
	</h3>
	
	<div class="replyList">
		<?php  $__Context->_comment_list = $__Context->oDocument->getComments()  ?>
		<?php if($__Context->_comment_list&&count($__Context->_comment_list))foreach($__Context->_comment_list as $__Context->key => $__Context->comment){ ?>
				<div class="item <?php if($__Context->comment->get('depth')){ ?>itemReply<?php } ?>" id="comment_<?php echo $__Context->comment->comment_srl ?>">
					<div class="indent" <?php if($__Context->comment->get('depth')){ ?> style="margin-left:<?php echo ($__Context->comment->get('depth'))*15 ?>px" <?php } ?>>
					
					<div class="itemAside">
                        <?php if($__Context->comment->getProfileImage()){ ?>
                            <img src="<?php echo $__Context->comment->getProfileImage() ?>" alt="profile" class="profile" />
                        <?php } ?>
						<h4 class="author">
						<?php if(!$__Context->comment->member_srl){ ?>
							<?php if($__Context->comment->homepage){ ?>
								<a href="<?php echo $__Context->comment->homepage ?>" onclick="window.open(this.href);return false;"><?php echo $__Context->comment->getNickName() ?></a>
							<?php }else{ ?>
								<?php echo $__Context->comment->getNickName() ?>
							<?php } ?>
						<?php }else{ ?>
							<a href="#popup_menu_area" class="member_<?php echo $__Context->comment->member_srl ?>" onclick="return false"><?php echo $__Context->comment->getNickName() ?></a>
						<?php } ?>
						</h4>
	
						<p class="meta">
							<?php echo $__Context->comment->getRegdate('Y.m.d') ?>
							<?php echo $__Context->comment->getRegdate('H:i:s') ?>
						<?php if($__Context->grant->manager || $__Context->module_info->display_ip_address!='N'){ ?>
							<br /><?php echo $__Context->comment->getIpaddress() ?>
						<?php } ?>
						</p>
						
						<?php if($__Context->comment->get('voted_count')!=0 || $__Context->comment->get('blamed_count') != 0){ ?>
						<dl class="vote">
							<dt class="love"><span><?php echo $__Context->lang->cmd_vote ?></span></dt>
							<dd><?php echo $__Context->comment->get('voted_count')?$__Context->comment->get('voted_count'):0 ?></dd>
							<dt class="hate"><span><?php echo $__Context->lang->cmd_vote_down ?></span></dt>
							<dd><?php echo $__Context->comment->get('blamed_count')?$__Context->comment->get('blamed_count'):0 ?></dd>
						</dl>
						<?php } ?>
						
					</div>
	
                    <div class="iContent">
					<?php if(!$__Context->comment->isAccessible()){ ?>
						<?php Context::addJsFile("modules/wiki/ruleset/input_password.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="get"  class="secretMessage"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="input_password" />
							<input type="hidden" name="act" value="procWikiVerificationPassword" />
							<input type="hidden" name="success_return_url" value="<?php echo getUrl('act','dispWikiContent','mid',$__Context->mid,'entry',$__Context->entry, 'document_srl', '') ?>" />
							<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
							<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
							<input type="hidden" name="document_srl" value="<?php echo $__Context->comment->get('document_srl') ?>" />
							<input type="hidden" name="comment_srl" value="<?php echo $__Context->comment->get('comment_srl') ?>" />
							<input type="hidden" name="xe_validator_id" value="modules/wiki/skins/xe_wiki" />
							<p>&quot;<?php echo $__Context->lang->msg_is_secret ?>&quot;</p>
							<dl>
								<dt><label for="cpw"><?php echo $__Context->lang->password ?></label> :</dt>
								<dd><input type="password" id="cpw" name="password" class="iText" /><input type="submit" value="<?php echo $__Context->lang->cmd_input ?>" class="btn" /></dd>
							</dl>
						</form>
					<?php }else{ ?>
					<?php echo $__Context->comment->getContent(false) ?>
					<?php if($__Context->comment->hasUploadedFIles()){ ?>
					<dl class="attachedFile">
						<dt><img src="/modules/wiki/skins/xe_wiki/img/iconFiles.gif" width="27" height="11" alt="<?php echo $__Context->lang->uploaded_file ?>" /> <button type="button" class="fileToggle" onclick="jQuery(this).parents('dl.attachedFile').toggleClass('open');return false;"><?php echo $__Context->lang->uploaded_file ?> (<?php echo $__Context->comment->get('uploaded_count') ?>)</button></dt>
						<dd>
							<ul class="files">
								<?php  $__Context->_uploaded_files = $__Context->comment->getUploadedFiles()  ?>
								<?php if($__Context->_uploaded_files&&count($__Context->_uploaded_files))foreach($__Context->_uploaded_files as $__Context->key => $__Context->file){ ?>
								<li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> <span class="bubble">[File Size:<?php echo FileHandler::filesize($__Context->file->file_size) ?>/Download<?php echo number_format($__Context->file->download_count) ?>]</span></a></li>
								<?php } ?>
							</ul>
						</dd>
					</dl>
					<?php } ?>
					<ul class="option">
					<?php if($__Context->is_logged){ ?>
						<li class="wouldYou"><a href="#popup_menu_area" class="comment_<?php echo $__Context->comment->comment_srl ?>"><?php echo $__Context->lang->cmd_comment_do ?></a></li>
					<?php } ?>
						<li><a href="<?php echo getUrl('act','dispWikiReplyComment','comment_srl',$__Context->comment->comment_srl) ?>"><?php echo $__Context->lang->cmd_reply ?></a></li> 
					<?php if($__Context->comment->isGranted() || !$__Context->comment->get('member_srl')){ ?>
						<li><a href="<?php echo getUrl('act','dispWikiModifyComment','comment_srl',$__Context->comment->comment_srl) ?>"><?php echo $__Context->lang->cmd_modify ?></a></li> 
						<li><a href="<?php echo getUrl('act','dispWikiDeleteComment','comment_srl',$__Context->comment->comment_srl) ?>"><?php echo $__Context->lang->cmd_delete ?></a></li>
					<?php } ?>
					</ul>
					<?php } ?>
                    </div>
					
				</div>
				<?php if($__Context->comment->get('depth')){ ?>
			<?php } ?>
			
		</div>
		<?php } ?>
</div>
    <?php if($__Context->oDocument->comment_page_navigation){ ?>
    <div class="pagination">
        <a href="<?php echo getUrl('cpage',1) ?>#comment" class="prevEnd">&lsaquo; <?php echo $__Context->lang->first_page ?></a> 
        <?php while($__Context->page_no = $__Context->oDocument->comment_page_navigation->getNextPage()){ ?>
            <?php if($__Context->cpage == $__Context->page_no){ ?>
                <strong><?php echo $__Context->page_no ?></strong> 
            <?php }else{ ?>
                <a href="<?php echo getUrl('cpage',$__Context->page_no) ?>#comment"><?php echo $__Context->page_no ?></a>
            <?php } ?>
        <?php } ?>
        <a href="<?php echo getUrl('cpage',$__Context->oDocument->comment_page_navigation->last_page) ?>#comment" class="nextEnd"><?php echo $__Context->lang->last_page ?> &rsaquo;</a>
    </div>
    <?php } ?>
</div>
<?php } ?>
