<?php if(!defined("__XE__"))exit;
if($__Context->mi->addon_socialxe=='Y'){ ?>
	<?php  $__Context->ao_sxeop = $__Context->mi->addon_socialxe_option?$__Context->mi->addon_socialxe_option:'list_count="20"' ?>
	<div id="siFbk" class="cmt sns clearBar"<?php if($__Context->is_modal){ ?> style="margin:0"<?php } ?>><a name="comment"<?php if($__Context->comment_srl){ ?> data-modal-scrollinto="true"<?php } ?>></a>
	<img class="zbxe_widget_output" widget="socialxe_comment" skin="default" colorset="white" document_srl="<?php echo $__Context->doc_srl ?>" content_link="<?php echo getFullUrl('', 'document_srl', $__Context->doc_srl, 'dummy', '1') ?>" content_title="<?php echo htmlspecialchars($__Context->oDocument->getTitleText()) ?>" <?php echo $__Context->ao_sxeop ?> />
	</div>
<?php }else{ ?>
	<?php 
		$__Context->is_wcmt = $__Context->grant->write_comment && $__Context->oDocument->isEnableComment() && $__Context->oDocument->allowComment();
		$__Context->ds_nick = $__Context->ci['nick_name']->display == 'Y';
		$__Context->ds_user =	$__Context->ci['user_name']->display == 'Y';
		$__Context->ds_cvoteup = $__Context->is_logged&&strpos($__Context->mi->use_c_vote, 'up')!==false;
		$__Context->ds_cvotedown = $__Context->is_logged&&strpos($__Context->mi->use_c_vote, 'down')!==false;
		$__Context->ds_cdeclare = $__Context->is_logged&&strpos($__Context->mi->use_c_vote, 'declare')!==false;
		$__Context->adm_id = $__Context->ds_cdeclare ? $__Context->oThis->getAdminId() : array();
		$__Context->cmts = $__Context->comment_list?$__Context->comment_list:$__Context->oThis->getCommentList($__Context->doc_srl, $__Context->cpage, $__Context->cmt_lstcnt);
		$__Context->bscmts = $__Context->mi->use_c_best=='Y' ? $__Context->oThis->getBestCommentList($__Context->doc_srl) : array();
		$__Context->a_clsttp = array('best'=>&$__Context->bscmts,''=>&$__Context->cmts->data);
		$__Context->adopt_grade = explode(',', $__Context->lang->adopt_grade);
	 ?>
	<?php if($__Context->mi->display_recommender != 'N'){ ?>
		<?php  $__Context->voted_lst = $__Context->oThis->getDocumentVotedLogs($__Context->doc_srl, 1) ?>
	<?php } ?>
	<div id="siFbk" class="cmt clearBar"<?php if($__Context->is_modal){ ?> style="margin:0"<?php } ?>><a name="comment"<?php if($__Context->comment_srl){ ?> data-modal-scrollinto="true"<?php } ?>></a>
		<div class="scFbH scToggle" data-target="#siFbk .scClst.d<?php echo $__Context->doc_srl ?>">
			<h2>
				<?php echo $__Context->lang->comment ?> <em><?php echo $__Context->oDocument->getCommentcount() ?></em>
				<?php if(count($__Context->voted_lst)){ ?><span class="fr">
					<?php 
						$__Context->_tmp2 = 0;
						$__Context->cmMember = &getModel('member');
					 ?>
					<?php if($__Context->voted_lst&&count($__Context->voted_lst))foreach($__Context->voted_lst as $__Context->mb){ ?>
						<?php 
							$__Context->_tmp2++;
							$__Context->_tmp = $__Context->cmMember->getMemberInfoByMemberSrl($__Context->mb->member_srl);
						 ?>
						<?php if($__Context->_tmp->profile_image){ ?><img src="<?php echo $__Context->_tmp->profile_image->src ?>" class="profile" title="<?php echo htmlspecialchars($__Context->_tmp->nick_name) ?>" /><?php } ?>
						<?php if(!$__Context->_tmp->profile_image){ ?><span class="profile" title="<?php echo htmlspecialchars($__Context->_tmp->nick_name) ?>"></span><?php } ?>
						<?php if($__Context->_tmp2 > 9){;
break;
} ?>
					<?php } ?>
				</span><?php } ?>
				<?php if(!count($__Context->voted_lst) || count($__Context->voted_lst)>10){ ?><span class="fr <?php if(count($__Context->voted_lst)){ ?>recommender_count<?php } ?>"><?php echo count($__Context->voted_lst)?sprintf($__Context->lang->e_recommender_count, count($__Context->voted_lst)-10):'...' ?></span><?php } ?>
			</h2>
		</div>
		<?php if(count($__Context->cmts->data)){ ?><div class="scClst d<?php echo $__Context->doc_srl ?>"<?php if($__Context->us_modal||$__Context->is_modal){ ?> data-flash-fix="true"<?php } ?>>
			<?php if($__Context->a_clsttp&&count($__Context->a_clsttp))foreach($__Context->a_clsttp as $__Context->tlk=>$__Context->p_list){;
if(count($__Context->p_list)){ ?><ul class="scFrm <?php echo $__Context->tlk ?>">
			<?php if($__Context->p_list&&count($__Context->p_list))foreach($__Context->p_list as $__Context->key=>$__Context->comment){ ?>
				<?php 
					$__Context->cmt_srl = $__Context->comment->comment_srl;
					$__Context->cmb_srl = $__Context->comment->get('member_srl');
					$__Context->depth = $__Context->comment->get('depth');
					$__Context->depth = $__Context->depth > 10 ? 10 : $__Context->depth;
				 ?>
				<li class="<?php echo $__Context->depth?'indent':'' ?> <?php echo ($__Context->mi->display_profile!='N'&&$__Context->mi->display_profile!='D')?'':'noPfile' ?> clearBar"<?php if($__Context->depth){ ?> style="padding-left:<?php echo ((int)$__Context->depth*17+3) ?>px;background-position:<?php echo ((int)$__Context->depth*17-10) ?>px -375px"<?php } ?>><a name="comment_<?php echo $__Context->cmt_srl ?>"<?php if($__Context->comment_srl&&$__Context->comment_srl==$__Context->cmt_srl){ ?> data-modal-scrollinto="true"<?php } ?>></a>
					<?php 
						$__Context->isc_locked = $__Context->is_ckclok?$__Context->oThis->isLocked($__Context->cmt_srl, 'cmt'):0;
						$__Context->isc_granted = $__Context->grant->view && $__Context->comment->isGranted();
						$__Context->isc_secret = $__Context->comment->isSecret();
						$__Context->isc_blind = $__Context->mi->use_c_blind=='Y'?$__Context->oThis->isBlind($__Context->cmt_srl, 'cmt'):0;
						$__Context->show_btnAdopt = $__Context->pt_vtype=='A'&&!$__Context->isc_blind&&(!$__Context->cmb_srl||$__Context->cmb_srl!=$__Context->dmb_srl)&&($__Context->grant->manager||$__Context->is_doc_owner||$__Context->adopt_srl==$__Context->cmt_srl);
					 ?>
					<div class="scFbt">
						<?php if($__Context->tlk=='best'){ ?><img src="/modules/beluxe/skins/default/img/common/label_best.gif" /><?php } ?>
						<?php if(($__Context->mi->display_profile!='N'&&$__Context->mi->display_profile!='D')){ ?>
							<?php if($__Context->comment->getProfileImage()){ ?><img src="<?php echo $__Context->comment->getProfileImage() ?>" alt="Profile" class="profile" /><?php } ?>
							<?php if(!$__Context->comment->getProfileImage()){ ?><span class="profile"></span><?php } ?>
						<?php } ?>
						<h3 class="author">
							<?php 
								$__Context->home = $__Context->comment->get('homepage');
								$__Context->nick = cut_str((!$__Context->cmb_srl||$__Context->ds_nick||!$__Context->ds_user)?$__Context->comment->getNickName():$__Context->comment->getUserName(), $__Context->mi->nickname_length);
							 ?>
							<?php if(!$__Context->cmb_srl && !$__Context->home){ ?><i><?php echo $__Context->nick ?></i><?php } ?>
							<?php if($__Context->cmb_srl){ ?><span class="scHLink member_<?php echo $__Context->cmb_srl ?>"><?php echo $__Context->nick ?></span><?php } ?>
							<?php if(!$__Context->cmb_srl && $__Context->home){ ?><i class="scHLink" data-href="<?php echo $__Context->home ?>"><?php echo $__Context->nick ?></i><?php } ?>
						</h3>
						<?php 
							$__Context->_tmp2 = $__Context->pt_vtype=='A'&&$__Context->cmb_srl?$__Context->oThis->getCommentCountByAdopted($__Context->cmb_srl):0;
							$__Context->_tmp = $__Context->_tmp2?round(sqrt($__Context->_tmp2 / 10), 2):0;
						 ?>
						<p class="time"><?php if($__Context->_tmp){ ?><strong class="author" title="<?php echo $__Context->lang->adopt ?>: <?php echo $__Context->_tmp2 ?>"><?php echo $__Context->adopt_grade[$__Context->_tmp>10?10:floor($__Context->_tmp)] ?></strong> <span>(<?php echo $__Context->_tmp2 ?>)</span><br /><?php };
echo $__Context->comment->getRegdate('Y.m.d H:i');
if($__Context->ds_ipaddr){ ?><br /><span class="ipAddress">(IP: <?php echo $__Context->comment->getIpaddress() ?>)</span><?php } ?></p>
						<?php if($__Context->mi->addon_pang_pang == 'Y' && $__Context->un_extra->ppang && $__Context->un_extra->ppang->c[$__Context->cmt_srl]->p > 0){ ?><span class="scIcoArea">
							<?php $__Context->ao_pppt = sprintf($__Context->lang->bonus_pang_pang, $__Context->un_extra->ppang->c[$__Context->cmt_srl]->p) ?>
							<img class="scIcoSet coin" src="/modules/beluxe/skins/default/img/common/blank.gif" title="<?php echo $__Context->ao_pppt ?>" alt="<?php echo $__Context->ao_pppt ?>">
						</span><?php } ?>
					</div>
					<div class="scCmtCon clearBar <?php echo $__Context->isc_blind?'blind':($__Context->isc_secret?'secret':($__Context->show_btnAdopt?'adopt':'')) ?>"<?php if($__Context->is_modal){ ?> data-link-fix="true"<?php } ?>>
						<?php if($__Context->isc_secret && !$__Context->isc_granted){ ?>
							<?php Context::addJsFile("modules/beluxe/ruleset/checkPassword.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="conSecret"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="checkPassword" />
								<input type="hidden" name="comment_srl" value="<?php echo $__Context->cmt_srl ?>" />
								<input type="hidden" name="act" value="procBoardVerificationPassword" />
								<div class="btnArea">
									<span class="scBtn black"><input type="password" name="password" placeholder="<?php echo $__Context->lang->password ?>" /></span>
									<span class="scBtn black"><input type="submit" value="<?php echo $__Context->lang->cmd_input ?>" /></span>
								</div>
							</form>
						<?php }elseif($__Context->show_btnAdopt){ ?>
							<div class="btnArea btnAdopt">
								<?php if(!$__Context->adopt_srl){ ?>
								<span class="scBtn"><button type="button" data-adopt-srl="<?php echo $__Context->cmt_srl ?>" data-adopt-name="<?php echo $__Context->comment->get('nick_name') ?>"><?php echo $__Context->lang->cmd_adopt ?></button></span>
								<?php }elseif($__Context->adopt_srl==$__Context->cmt_srl){ ?>
								<span class="scBtn blue"><button type="button" onclick="return false"><?php echo $__Context->lang->adopted_comment ?></button></span>
								<?php }else{ ?>
									<?php  $__Context->show_btnAdopt = 0 ?>
								<?php } ?>
							</div>
						<?php } ?>
						<?php echo $__Context->isc_blind&&!$__Context->grant->manager?$__Context->lang->msg_is_blind:$__Context->comment->getContent(false) ?>
					</div>
					<?php 
						$__Context->votedp = (int)$__Context->comment->get('voted_count');
						$__Context->blamedp = (int)$__Context->comment->get('blamed_count');
					 ?>
					<?php if($__Context->ds_cvoteup||$__Context->ds_cvotedown||$__Context->ds_cdeclare){ ?>
					<div class="scVoteArea clearBar">
						<?php if($__Context->ds_cvoteup||$__Context->ds_cvotedown){ ?><span class="scBtn small group"><?php if($__Context->ds_cvoteup){ ?><a href="#recommend" data-type="comment" data-srl="<?php echo $__Context->cmt_srl ?>" title="<?php echo $__Context->lang->cmd_like ?>"><em class="vote cnt"><?php echo $__Context->votedp ?></em></a><?php };
if($__Context->ds_cvotedown){ ?><a href="#not_recommend" data-type="comment" data-srl="<?php echo $__Context->cmt_srl ?>" title="<?php echo $__Context->lang->cmd_dislike ?>"><em class="blame cnt"><?php echo $__Context->blamedp ?></em></a><?php } ?></span><?php } ?>
						<?php if($__Context->ds_cdeclare){ ?><span class="scBtn small group"><a href="#declare" data-type="comment" data-srl="<?php echo $__Context->cmt_srl ?>" data-rec="<?php echo count($__Context->adm_id)?$__Context->adm_id[0]->member_srl:$__Context->cmb_srl ?>" title="<?php echo $__Context->lang->cmd_declare ?>"><em class="declare">*</em></a></span><?php } ?>
					</div>
					<?php }elseif($__Context->votedp || $__Context->blamedp){ ?>
					<div class="scVoteArea clearBar">
						<span class="vote"><?php echo $__Context->lang->cmd_vote ?>: <?php echo $__Context->votedp ?> / <?php echo $__Context->blamedp ?></span>
					</div>
					<?php } ?>
					<?php if(!$__Context->isc_blind&&$__Context->comment->hasUploadedFiles()){ ?><div class="scFiles c<?php echo $__Context->cmt_srl ?>">
						<button type="button" class="scToggle" data-target="#siFbk .scFiles.c<?php echo $__Context->cmt_srl ?> ul"><?php echo $__Context->lang->uploaded_file ?> <strong>[<?php echo $__Context->comment->get('uploaded_count') ?>]</strong></button>
						<ul>
							<?php if($__Context->comment->getUploadedFiles()&&count($__Context->comment->getUploadedFiles()))foreach($__Context->comment->getUploadedFiles() as $__Context->key=>$__Context->file){ ?><li><a href="<?php echo $__Context->file->isvalid=='Y'?getUrl('').$__Context->file->download_url:'#' ?>"><?php echo $__Context->file->source_filename ?><span class="fsize">(<?php echo FileHandler::filesize($__Context->file->file_size) ?>/<?php echo number_format($__Context->file->download_count) ?>)</span></a></li><?php } ?>
						</ul>
					</div><?php } ?>
					<div class="action">
						<?php if($__Context->is_logged&&$__Context->mi->display_document_do!='N'){ ?><a class="comment_<?php echo $__Context->cmt_srl ?> this" href="#popup_menu_area" onclick="return false"><?php echo $__Context->lang->cmd_comment_do ?></a><?php } ?>
						<?php if($__Context->is_wcmt){ ?>
							<a href="<?php echo getUrl('act','dispBoardWriteComment','comment_srl','','parent_srl',$__Context->cmt_srl,'document_srl',$__Context->doc_srl) ?>"<?php if($__Context->us_modal&&!$__Context->is_modal){ ?> type="example/modal"<?php } ?> title="<?php echo $__Context->lang->new_comment ?>" class="reply"><?php echo $__Context->lang->cmd_reply ?></a>
						<?php } ?>
						<?php if($__Context->grant->manager||(!$__Context->isc_locked&&!$__Context->isc_blind&&$__Context->comment->isEditable()&&!($__Context->show_btnAdopt&&$__Context->adopt_srl==$__Context->cmt_srl))){ ?>
							<a href="<?php echo getUrl('act','dispBoardWriteComment','comment_srl',$__Context->cmt_srl,'document_srl',$__Context->doc_srl) ?>"<?php if($__Context->us_modal&&!$__Context->is_modal){ ?> type="example/modal"<?php } ?> title="<?php echo $__Context->lang->modify_comment ?>" class="modify"><?php echo $__Context->lang->cmd_modify ?></a>
							<a href="<?php echo getUrl('act','dispBoardDeleteComment','comment_srl',$__Context->cmt_srl,'document_srl',$__Context->doc_srl) ?>"<?php if($__Context->us_modal&&!$__Context->is_modal){ ?> type="example/modal"<?php } ?> title="<?php echo $__Context->lang->delete_comment ?>" class="delete"><?php echo $__Context->lang->cmd_delete ?></a>
						<?php } ?>
					</div>
				</li>
			<?php } ?>
			</ul><?php }} ?>
			<?php if($__Context->cmts->total_page > 1){ ?><div class="scPageArea">
				<span class="scPage">
					<a href="<?php echo getUrl('comment_srl','','cpage','1') ?>#comment" class="direction prev"><span></span><span></span> <?php echo $__Context->lang->first_page ?></a>
					<?php while($__Context->page_no=$__Context->cmts->page_navigation->getNextPage()){ ?>
						<?php if($__Context->cpage==$__Context->page_no){ ?><strong><?php echo $__Context->page_no ?></strong><?php } ?>
						<?php if($__Context->cpage!=$__Context->page_no){ ?><a href="<?php echo getUrl('comment_srl','','cpage',$__Context->page_no) ?>#comment"><?php echo $__Context->page_no ?></a><?php } ?>
					<?php } ?>
					<a href="<?php echo getUrl('comment_srl','','cpage',$__Context->cmts->page_navigation->last_page) ?>#comment" class="direction next"><?php echo $__Context->lang->last_page ?> <span></span><span></span></a>
				</span>
			</div><?php } ?>
		</div><?php } ?>
<?php if($__Context->is_wcmt && $__Context->mi->use_input_comment_writer != 'N'){ ?>
		<div id="pidModalTarget" class="scFbWt">
			<?php Context::addJsFile("modules/beluxe/ruleset/insertComment.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertComment" />
				<?php if($__Context->is_modal){ ?><input type="hidden" name="is_modal" value="<?php echo $__Context->us_vmodal?2:1 ?>" /><?php } ?>
				<?php if($__Context->is_modal&&$__Context->us_vmodal){ ?><input type="hidden" name="success_return_act" value="dispBoardContentCommentList" /><?php } ?>
				<input type="hidden" name="module_srl" value="<?php echo $__Context->mi->module_srl ?>" />
				<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
				<input type="hidden" name="act" value="procBoardInsertComment" />
				<input type="hidden" name="text_editor" value="Y" />
				<?php 
					$__Context->t_dstus = explode(',', $__Context->mi->use_c_status);
					$__Context->status = 'PUBLIC';
				 ?>
				<?php if(count($__Context->t_dstus) === 1 && $__Context->t_dstus[0]){ ?><input type="hidden" name="status" value="<?php echo $__Context->t_dstus[0] ?>" /><?php } ?>
				<div class="scWopts clearBar">
					<label class="wrtTxt fl" for="siComContent">
						<em>Text Editor</em>
					</label>
					<?php if($__Context->mi->use_input_comment_writer != 'T'){ ?><label> <input type="checkbox" name="use_html" value="Y" /> HTML </label><?php } ?>
					<?php if($__Context->is_logged){ ?><label>
						<input type="checkbox" name="notify_message" value="Y" />
						<?php echo $__Context->lang->notify ?>
					</label><?php } ?>
					<?php if($__Context->mi->use_anonymous=='S'){ ?><label>
						<input type="checkbox" name="anonymous" value="Y" />
						<?php echo $__Context->lang->anonymous ?>
					</label><?php } ?>
					<?php if(count($__Context->t_dstus) > 1){ ?><select name="status" style="margin-left:8px">
						<?php if($__Context->t_dstus&&count($__Context->t_dstus))foreach($__Context->t_dstus as $__Context->value){ ?><option value="<?php echo $__Context->value ?>"<?php if($__Context->status == $__Context->value){ ?> selected="selected"<?php } ?>><?php echo Context::getLang(strtolower($__Context->value)) ?></option><?php } ?>
					</select><?php } ?>
				</div>
				<div class="scWcont clearBar">
					<textarea name="content" id="siComContent"></textarea>
					<span class="cmtbtns fr">
						<?php if($__Context->mi->use_input_comment_writer != 'T'){ ?><span class="scBtn small">
							<a href="<?php echo getUrl('act','dispBoardWriteComment','comment_srl','','parent_srl','','document_srl', $__Context->doc_srl) ?>"<?php if($__Context->us_modal&&!$__Context->is_modal){ ?> type="example/modal/pidModalTarget"<?php } ?> title="<?php echo $__Context->lang->new_document ?>" accesskey="y" tabindex="-1"><?php echo $__Context->lang->use_wysiwyg ?></a>
						</span><?php } ?>
						<span class="scBtn blue big"><button type="submit"><?php echo $__Context->lang->comment_write ?></button></span>
					</span>
				</div>
				<?php if(!$__Context->is_logged){ ?>
					<div class="scWusr clearBar">
						<?php  $__Context->is_guestinfo = $__Context->mi->use_input_guest_info == 'N' ? $__Context->oThis->getIpaddress(1) : '' ?>
						<label class="scLaEt">
							<span>Name</span>
							<input type="text" name="nick_name" maxlength="80" value="<?php echo $__Context->is_guestinfo?$__Context->is_guestinfo:'' ?>"<?php if($__Context->is_guestinfo){ ?> readonly="readonly"<?php } ?> />
						</label>
						<label class="scLaEt">
							<span>Pass</span>
							<input type="password" name="password" />
						</label>
						<?php if($__Context->mi->use_input_guest_info != 'N' && $__Context->mi->use_input_guest_info != 'S'){ ?>
							<label class="scLaEt">
								<span>Mail</span>
								<input type="text" name="email_address" maxlength="250" />
							</label>
							<label class="scLaEt">
								<span>Home</span>
								<input type="text" name="homepage" maxlength="250" />
							</label>
						<?php } ?>
					</div>
				<?php }else{ ?>
					<input type="hidden" name="nick_name" value="0" />
					<input type="hidden" name="password" value="0" />
				<?php } ?>
			</form>
		</div>
<?php }else{ ?>
		<?php if(!$__Context->is_modal){ ?><div class="scFbWt nowrt"><?php echo $__Context->oDocument->getPermanentUrl() ?></div><?php } ?>
<?php } ?>
	</div>
<?php } ?>