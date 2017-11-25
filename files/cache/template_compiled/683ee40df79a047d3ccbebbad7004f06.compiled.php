<?php if(!defined("__XE__"))exit;?><!-- DOCUMENT -->
<?php 
$__Context->lg = $__Context->logged_info ? $__Context->logged_info : array();
$__Context->ds_status = $__Context->ci['custom_status']->display == 'Y';
$__Context->ds_readed = $__Context->ci['readed_count']->display == 'Y';
$__Context->ds_voted = $__Context->ci['voted_count']->display == 'Y';
$__Context->ds_blamed = $__Context->ci['blamed_count']->display == 'Y';
$__Context->ds_update = $__Context->ci['last_update']->display == 'Y';
$__Context->ds_nick = $__Context->ci['nick_name']->display == 'Y';
$__Context->ds_user =	$__Context->ci['user_name']->display == 'Y';
$__Context->doc_srl = $__Context->oDocument->document_srl;
$__Context->is_granted = $__Context->grant->view && $__Context->oDocument->isGranted();
$__Context->is_secret = $__Context->oDocument->isSecret();
$__Context->is_locked = $__Context->is_cklok?$__Context->oThis->isLocked($__Context->doc_srl):0;
$__Context->is_blind = $__Context->us_blind?$__Context->oThis->isBlind($__Context->doc_srl):0;
$__Context->is_scrap = $__Context->ds_scrap?$__Context->oThis->isScrap($__Context->doc_srl):0;
$__Context->exks = ((!$__Context->is_secret || $__Context->is_granted) && $__Context->oDocument->isExtraVarsExists()) ? $__Context->oDocument->getExtraVars() : array();
$__Context->tags = (!$__Context->is_secret || $__Context->is_granted) ? $__Context->oDocument->get('tag_list') : array();
$__Context->ufls = ((!$__Context->is_secret || $__Context->is_granted) && $__Context->oDocument->hasUploadedFiles()) ? $__Context->oDocument->getUploadedFiles() : array();
$__Context->un_extra = ($__Context->pt_vtype!='N'||$__Context->pt_dtype!='N'||$__Context->ao_ppang||$__Context->ds_mtlng)?$__Context->oDocument->get('extra_vars'):null;
$__Context->un_extra = is_string($__Context->un_extra)?unserialize($__Context->un_extra):$__Context->un_extra;
$__Context->use_point = $__Context->un_extra?(int)$__Context->un_extra->beluxe->use_point:0;
$__Context->adopt_srl = $__Context->un_extra?(int)$__Context->un_extra->beluxe->adopt_srl:0;
$__Context->is_restrict = !$__Context->is_granted&&!$__Context->is_secret&&($__Context->pt_vtype=='Y'&&!$__Context->oThis->isWrote($__Context->doc_srl, true, 'cmt')||$__Context->pt_vtype=='P'&&!$__Context->oThis->isRead($__Context->doc_srl));
$__Context->is_restrict = $__Context->is_restrict && $__Context->use_point;
$__Context->allow_trb = $__Context->oDocument->allowTrackback();
$__Context->allow_cmt = $__Context->oDocument->allowComment();
$__Context->cate = $__Context->is_cts?$__Context->cts[$__Context->oDocument->get('category_srl')]:0;
$__Context->dmb_srl = $__Context->oDocument->get('member_srl');
$__Context->is_doc_owner = $__Context->lg->member_srl && $__Context->dmb_srl == $__Context->lg->member_srl;
 ?>
<?php if($__Context->is_modal){ ?>
<div id="__PID_MODAL_HEADER__" style="display:none"><?php echo $__Context->oDocument->getTitle($__Context->mi->title_length) ?></div>
<div id="__PID_MODAL_FOOTER__" style="display:none">
	<span class="fl">
		<?php 
			$__Context->nav_list = $__Context->oThis->getNavigationList($__Context->doc_srl, 1);
			$__Context->nav_key = 'prev';
		 ?>
		<?php if($__Context->nav_list&&count($__Context->nav_list))foreach($__Context->nav_list as $__Context->key=>$__Context->nav){ ?>
			<?php  $__Context->nav->selected?$__Context->nav_key='next':0 ?>
			<?php if(!$__Context->nav->selected){ ?><a class="<?php echo $__Context->nav_key ?>" href="<?php echo getUrl('','mid',$__Context->mid,'document_srl',$__Context->nav->document_srl,'category_srl',$__Context->category_srl,'is_modal','1','cate_trace','N','sort_index',$__Context->sort_index,'order_type',$__Context->order_type,'search_target',$__Context->search_target,'search_keyword',$__Context->search_keyword) ?>" target="pid_oi_frame" title="<?php echo htmlspecialchars($__Context->nav->getTitleText(55), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>"><span><?php echo $__Context->nav_key==='prev'?$__Context->lang->cmd_prev:$__Context->lang->cmd_next ?></span></a><?php } ?>
		<?php } ?>
	</span>
	<span><?php echo $__Context->oDocument->getPermanentUrl() ?></span>
</div>
<div id="siCat" class="text">
	<ul class="scFrm clearBar">
		<li class="active"><a href="<?php echo getUrl('document_srl',$__Context->doc_srl,'act','','is_trackbacks','','clist_count','') ?>"><span>Document</span></a></li>
		<?php if($__Context->allow_trb){ ?><li><a href="<?php echo getUrl('document_srl',$__Context->doc_srl,'act','dispBoardContentCommentList','is_trackbacks','1','clist_count','1') ?>"><span>Trackbacks</span> <em><?php echo $__Context->oDocument->getTrackbackCount() ?></em></a></li><?php } ?>
		<?php if($__Context->allow_cmt){ ?><li><a href="<?php echo getUrl('document_srl',$__Context->doc_srl,'act','dispBoardContentCommentList','is_trackbacks','','clist_count','') ?>"><span>Comments</span> <em><?php echo $__Context->oDocument->getCommentcount() ?></em></a></li><?php } ?>
		<?php if($__Context->cate){ ?><li class="fr">
			<a href="<?php echo getUrl('','mid',$__Context->mid,'category_srl',$__Context->cate->category_srl) ?>" target="_parent" title="<?php echo htmlspecialchars($__Context->cate->description) ?>"<?php if($__Context->cate->color){ ?> style="color:<?php echo $__Context->cate->color ?>"<?php } ?>><?php echo $__Context->cate->title ?></a>
		</li><?php } ?>
	</ul>
</div>
<?php }else{ ?>
<div id="siHrm"><a name="document"></a>
	<ul class="scFrm">
		<li class="scElps"<?php if($__Context->is_elips){ ?> data-active="true"<?php } ?>>
			<strong class="scClipboard fl" data-get="text" data-attr="title" title="<?php echo $__Context->oDocument->getPermanentUrl() ?>"><?php echo $__Context->oDocument->getTitle($__Context->mi->title_length) ?></strong>
			<?php if($__Context->cate){ ?><strong class="fr" title="<?php echo htmlspecialchars($__Context->cate->description) ?>"<?php if($__Context->cate->color){ ?> style="color:<?php echo $__Context->cate->color ?>"<?php } ?>>[<?php echo $__Context->cate->title ?>]</strong><?php } ?>
		</li>
	</ul>
</div>
<?php } ?>
<div id="siDoc"><a name="document_<?php echo $__Context->doc_srl ?>"></a>
	<ul class="scFrm mbAfrm">
		<li class="clearBar">
			<div class="fl">
				<?php if($__Context->is_scrap){ ?><img class="scIcoSet scrap" src="/modules/beluxe/skins/default/img/common/blank.gif" alt="Scrap" title="Scrap" /><?php } ?>
				<?php 
				$__Context->home = $__Context->oDocument->get('homepage');
				$__Context->nick = (!$__Context->dmb_srl||$__Context->ds_nick||!$__Context->ds_user)?cut_str($__Context->oDocument->getNickName(), $__Context->mi->nickname_length):'';
				$__Context->nick .= ($__Context->dmb_srl&&$__Context->ds_user)?($__Context->nick?' (':'').cut_str($__Context->oDocument->getUserName(), $__Context->mi->nickname_length).($__Context->nick?')':''):'';
				 ?>
				<strong>
				<?php if(!$__Context->dmb_srl && !$__Context->home){ ?><i><?php echo $__Context->nick ?></i><?php } ?>
				<?php if($__Context->dmb_srl){ ?><span class="scHLink member_<?php echo $__Context->dmb_srl ?>"><?php echo $__Context->nick ?></span><?php } ?>
				<?php if(!$__Context->dmb_srl && $__Context->home){ ?><i class="scHLink" data-href="<?php echo $__Context->home ?>"><?php echo $__Context->nick ?></i><?php } ?>
				</strong>
				<?php if($__Context->ds_ipaddr){ ?><span class="ipAddress">(IP: <?php echo $__Context->oDocument->getIpaddress() ?>)</span><?php } ?>
			</div>
			<div class="fr">
				<?php 
				$__Context->votedp = (int)$__Context->oDocument->get('voted_count');
				$__Context->blamedp = (int)$__Context->oDocument->get('blamed_count');
				 ?>
				<?php if($__Context->mi->star_style=='N'){ ?>
					<?php if($__Context->ds_readed){ ?>
					<span><?php echo $__Context->lang->readed_count ?>:</span>
					<span><?php echo $__Context->oDocument->get('readed_count') ?>,</span>
					<?php } ?>
					<?php if(($__Context->ds_voted || $__Context->ds_blamed) && ($__Context->votedp || $__Context->blamedp)){ ?>
					<span><?php echo $__Context->lang->voted_count ?>:</span>
					<span><?php echo $__Context->votedp.' / '.$__Context->blamedp ?>,</span>
					<?php } ?>
				<?php } ?>
				<?php if($__Context->ds_update){ ?><span title="<?php echo $__Context->lang->last_update ?>"><?php echo zdate($__Context->oDocument->get('last_update')) ?></span><span title="<?php echo $__Context->lang->regdate ?>">(<?php echo $__Context->oDocument->getRegdate('Y.m.d') ?>)</span><?php } ?>
				<?php if(!$__Context->ds_update){ ?><span title="<?php echo $__Context->lang->regdate ?>"><?php echo $__Context->oDocument->getRegdate() ?></span><?php } ?>
				<?php if($__Context->ds_status){ ?><span>[<?php echo $__Context->cstus[(int)$__Context->oDocument->get('is_notice')] ?>]</span><?php } ?>
				<?php if($__Context->mi->star_style!='N' && ($__Context->ds_voted || $__Context->ds_blamed || $__Context->ds_readed)){ ?><span>
				<?php  $__Context->totalp = $__Context->votedp?(($__Context->votedp / ($__Context->votedp + abs($__Context->blamedp)) * 100) * 0.5):0 ?>
				<?php if($__Context->ds_readed){ ?><span class="scRdStar color<?php echo $__Context->mi->star_style ?>" title="<?php echo $__Context->lang->readed_count ?>"><?php echo $__Context->oDocument->get('readed_count') ?></span><?php } ?>
				<?php if($__Context->ds_voted || $__Context->ds_blamed){ ?><span class="scVtStar color<?php echo $__Context->mi->star_style ?>" title="<?php echo $__Context->lang->voted_count ?>: <?php echo $__Context->votedp.'/'.$__Context->blamedp ?>"><em style="width:<?php echo $__Context->totalp ?>px"></em></span><?php } ?>
				</span><?php } ?>
			</div>
		</li>
	</ul>
	<?php if($__Context->grant->view){ ?><ul class="scFrm">
		<li>
			<?php if(count($__Context->exks)){ ?><ul class="scVext clearBar">
				<?php if($__Context->exks&&count($__Context->exks))foreach($__Context->exks as $__Context->key=>$__Context->val){ ?><li>
					<label><?php echo $__Context->val->name ?></label>
					<?php echo $__Context->val->getValueHTML() ?>
				</li><?php } ?>
			</ul><?php } ?>
			<div class="scDocCon clearBar <?php echo $__Context->is_blind?'blind':($__Context->is_secret?'secret':'') ?>"<?php if($__Context->us_modal||$__Context->is_modal){ ?> data-flash-fix="true"<?php };
if($__Context->is_modal){ ?> data-link-fix="true"<?php } ?>>
				<?php if($__Context->ds_mtlng&&count($__Context->un_extra->beluxe->langs)){ ?><div class="scVlng clearBar">
					<?php if($__Context->un_extra->beluxe->langs&&count($__Context->un_extra->beluxe->langs))foreach($__Context->un_extra->beluxe->langs as $__Context->vlnc){ ?><a href="#" onclick="doChangeLangType('<?php echo $__Context->vlnc ?>');return false;" class="<?php echo $__Context->vlnc ?>"><strong><?php echo $__Context->lang_supported[$__Context->vlnc] ?></strong></a><?php } ?>
				</div><?php } ?>
				<?php if($__Context->is_secret && !$__Context->is_granted){;
Context::addJsFile("modules/beluxe/ruleset/checkPassword.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="conSecret"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="checkPassword" />
					<input type="hidden" name="document_srl" value="<?php echo $__Context->doc_srl ?>" />
					<input type="hidden" name="act" value="procBoardVerificationPassword" />
					<div class="btnArea">
						<span class="scBtn black"><input type="password" name="password" placeholder="<?php echo $__Context->lang->password ?>" /></span>
						<span class="scBtn black"><input type="submit" value="<?php echo $__Context->lang->cmd_input ?>" /></span>
					</div>
				</form><?php } ?>
				<?php if($__Context->is_restrict){ ?>
				<div id="restricted_view">
					<div class="msgArea">
						<?php echo sprintf(Context::getLang('msg_restricted_view'), 100) ?>
						<br />
						<?php echo Context::getLang($__Context->pt_vtype== 'P' ? 'msg_required_point' : 'msg_required_comment') ?>
					</div>
					<?php echo $__Context->oDocument->getSummary(100) ?>
					<?php if($__Context->pt_vtype== 'P'){ ?><div class="btnArea">
						<span class="btn">
						<a href="#" onclick="doCallModuleAction('beluxe','procBeluxePayPoint','<?php echo $__Context->doc_srl ?>');return false">
						<?php echo sprintf(Context::getLang('msg_point_is_used'), $__Context->use_point) ?>
						</a>
						</span>
					</div><?php } ?>
				</div>
				<?php }else{ ?>
				<?php echo $__Context->oDocument->getContent(false) ?>
				<?php } ?>
			</div>
			<?php if(!$__Context->is_secret&&!$__Context->is_blind&&!$__Context->is_restrict&&$__Context->mi->use_history&&$__Context->mi->use_history!='N'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.histories.html');
} ?>
			<?php if(!$__Context->us_vmodal&&$__Context->is_doc&&!$__Context->is_blind&&($__Context->mi->navigation_bottom_list_count>0)){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.navigation.html');
} ?>
			<?php if($__Context->pt_vtype=='A'&&$__Context->dmb_srl){ ?><div class="sign clearBar">
				<strong class="fl">!</strong>
				<?php 
					$__Context->_tmp = $__Context->oThis->getDocumentCountByAdopt(true, $__Context->dmb_srl);
					$__Context->_tmp2 = $__Context->oThis->getDocumentCountByAdopt(false, $__Context->dmb_srl) - 1;
				 ?>
				<div class="tx" style="height:auto">
				<?php echo sprintf($__Context->lang->about_author_adopt_info, $__Context->nick, ($__Context->_tmp2<1)?'100%':(round($__Context->_tmp/($__Context->_tmp+$__Context->_tmp2),2)*100).'%', round(($__Context->use_point * (int)$__Context->mi->use_point_percent) / 100)) ?>
				</div>
			</div><?php } ?>
			<?php if(($__Context->mi->display_profile!='N'&&$__Context->mi->display_profile!='C')&&($__Context->oDocument->getProfileImage()||$__Context->oDocument->getSignature())){ ?><div class="sign clearBar">
				<?php if($__Context->oDocument->getProfileImage()){ ?><img src="<?php echo $__Context->oDocument->getProfileImage() ?>" alt="Profile" class="pf" /><?php } ?>
				<?php if($__Context->oDocument->getSignature()){ ?><div class="tx"><?php echo $__Context->oDocument->getSignature() ?></div><?php } ?>
			</div><?php } ?>
			<?php if($__Context->mi->document_bottom_text){ ?><div class="scMbtTxt clearBar">
				<?php echo $__Context->mi->document_bottom_text ?>
			</div><?php } ?>
			<?php if($__Context->tag_cnt = count($__Context->tags)){ ?><div class="tags">
				<?php for($__Context->i=0;$__Context->i<$__Context->tag_cnt;$__Context->i++){ ?> <?php  $__Context->tag = $__Context->tags[$__Context->i] ?>
				<?php if($__Context->i){ ?><span>, </span><?php } ?><a href="<?php echo getUrl('','mid',$__Context->mid,'search_target','tag','search_keyword',$__Context->tag,'document_srl','') ?>" class="tag"<?php if($__Context->is_modal){ ?> target="_parent"<?php } ?>><?php echo htmlspecialchars($__Context->tag) ?></a>
				<?php } ?>
			</div><?php } ?>
			<?php if($__Context->is_logged||$__Context->mi->display_document_do!='N'||$__Context->mi->display_button_sns!='N'){ ?><div class="actBtns clearBar">
				<?php if($__Context->is_logged){ ?>
				<?php 
				$__Context->ds_voteup = strpos($__Context->mi->use_d_vote, 'up')!==false;
				$__Context->ds_votedown = strpos($__Context->mi->use_d_vote, 'down')!==false;
				$__Context->ds_declare = strpos($__Context->mi->use_d_vote, 'declare')!==false;
				$__Context->adm_id = $__Context->ds_declare ? $__Context->oThis->getAdminId() : array();
				 ?>
				<?php if($__Context->ds_voteup||$__Context->ds_votedown||$__Context->ds_declare){ ?><span class="scVoteArea fl">
					<?php if($__Context->mi->view_comment_style!='webzine'){ ?>
						<?php if($__Context->ds_voteup||$__Context->ds_votedown){ ?><span class="scBtn small group"><?php if($__Context->ds_voteup){ ?><a href="#recommend" data-type="document" data-srl="<?php echo $__Context->doc_srl ?>" accesskey="z"><em class="vote"><?php echo $__Context->lang->cmd_like ?></em><em class="cnt"><?php echo $__Context->oDocument->get('voted_count') ?></em></a><?php };
if($__Context->ds_votedown){ ?><a href="#not_recommend" data-type="document" data-srl="<?php echo $__Context->doc_srl ?>" accesskey="x"><em class="blame"><?php echo $__Context->lang->cmd_dislike ?></em><em class="cnt"><?php echo $__Context->oDocument->get('blamed_count') ?></em></a><?php } ?></span><?php } ?>
					<?php } ?>
					<?php if($__Context->ds_declare){ ?><span class="scBtn small group"><a href="#declare" data-type="document" data-srl="<?php echo $__Context->doc_srl ?>" data-rec="<?php echo count($__Context->adm_id)?$__Context->adm_id[0]->member_srl:$__Context->dmb_srl ?>"><em class="declare"><?php echo $__Context->lang->cmd_declare ?></em></a></span><?php } ?>
				</span><?php } ?>
				<?php } ?>
				<?php if($__Context->mi->display_document_do!='N'){ ?><a class="document_<?php echo $__Context->doc_srl ?>" href="#popup_menu_area" onclick="return false"><?php echo $__Context->lang->cmd_document_do ?></a><?php } ?>
				<?php if($__Context->mi->display_button_sns!='N'||($__Context->ds_scrap&&!$__Context->is_scrap)){ ?><ul class="scSns">
					<?php if($__Context->ds_scrap&&!$__Context->is_scrap){ ?><li class="scrap link"><a href="#scrap" onclick="doCallModuleAction('member','procMemberScrapDocument','<?php echo $__Context->doc_srl ?>');return false" title="<?php echo $__Context->lang->cmd_scrap ?>">Scrap</a></li><?php } ?>
					<?php if($__Context->mi->display_button_sns!='N'){ ?>
					<li class="twitter link"><a href="http://twitter.com/" target="_blank" data-type="tw" title="Twitter">Twitter</a></li>
					<li class="facebook link"><a href="http://facebook.com/" target="_blank" data-type="fa" title="Facebook">Facebook</a></li>
					<li class="delicious link"><a href="http://delicious.com/" target="_blank" data-type="de" title="Delicious">Delicious</a></li>
					<?php } ?>
				</ul><?php } ?>
			</div><?php } ?>
			<?php if(count($__Context->ufls)){ ?>
				<?php 
					$__Context->ds_file = array();
					$__Context->us_ahfile = strpos($__Context->mi->display_files, 'auto')!==false;
				 ?>
				<?php if($__Context->ufls&&count($__Context->ufls))foreach($__Context->ufls as $__Context->file){ ?>
					<?php 
						$__Context->_tmp = $__Context->file->direct_download!='Y'?'general':'media';
						$__Context->_tmp = $__Context->_tmp=='media'&&preg_match("/\.(?:(jpe?g|png|gif|bmp|ico))$/i", $__Context->file->source_filename)?'image':$__Context->_tmp;
						$__Context->ds_file[$__Context->_tmp][] = $__Context->file;
					 ?>
				<?php } ?>
				<?php if(array('media','image','general')&&count(array('media','image','general')))foreach(array('media','image','general') as $__Context->_tmp2){ ?>
					<?php if(strpos($__Context->mi->display_files, $__Context->_tmp2)!==false&&count($__Context->ds_file[$__Context->_tmp2])){ ?><ul<?php if($__Context->us_ahfile){ ?> data-autohide="true"<?php } ?> class="scFiles">
						<?php if($__Context->ds_file[$__Context->_tmp2]&&count($__Context->ds_file[$__Context->_tmp2]))foreach($__Context->ds_file[$__Context->_tmp2] as $__Context->file){ ?><li class="<?php echo $__Context->_tmp2;
echo $__Context->file->isvalid=='Y'?'':' notvalid' ?>">
							<?php 
								$__Context->t_down_cm = $__Context->pt_dtype != 'N' && (!$__Context->lg || $__Context->lg->member_srl != $__Context->file->member_srl);
								$__Context->t_down_pt = $__Context->t_down_cm && $__Context->pt_dtype == 'P' && !$__Context->oThis->isDownloaded($__Context->file->file_srl) ? $__Context->use_point : 0;
								$__Context->t_down_cm = !$__Context->t_down_pt && $__Context->t_down_cm && !$__Context->oThis->isWrote($__Context->doc_srl, true, 'cmt');
							 ?>
							<?php if(!$__Context->file->file_size){ ?><a href="<?php echo $__Context->file->isvalid=='Y'?$__Context->file->uploaded_filename:'#' ?>"<?php if($__Context->file->isvalid=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->file->source_filename ?><span class="fsize">(link)</span></a><?php } ?>
							<?php if($__Context->file->file_size){ ?><a href="<?php echo $__Context->file->isvalid=='Y'?getUrl('').$__Context->file->download_url:'#' ?>"<?php if($__Context->t_down_pt&&$__Context->lg){ ?> onclick="return confirm(_DXS_MSGS_.use_d_point.replace('%s','<?php echo $__Context->t_down_pt ?>'))"<?php };
if($__Context->t_down_pt){ ?> class="isdownpt"<?php };
if($__Context->t_down_cm&&$__Context->lg){ ?> onclick="return alert('<?php echo $__Context->lang->msg_required_comment ?>') || false"<?php };
if(($__Context->t_down_pt||$__Context->t_down_cm)&&!$__Context->lg){ ?> onclick="return alert('<?php echo $__Context->lang->msg_not_permitted ?>') || false"<?php } ?>><?php echo $__Context->file->source_filename ?><span class="fsize">(<?php echo FileHandler::filesize($__Context->file->file_size) ?>/<?php echo number_format($__Context->file->download_count) ?>)</span></a><?php } ?>
						</li><?php } ?>
					</ul><?php } ?>
				<?php } ?>
			<?php } ?>
		</li>
	</ul><?php } ?>
</div>
<!-- /DOCUMENT -->
<div class="btnArea"<?php if($__Context->is_modal){ ?> style="margin-bottom:0"<?php } ?>>
	<?php  $__Context->_tmp = $__Context->grant->write_document&&$__Context->btm_lstcnt&&($__Context->sedt_wbtn||!$__Context->is_sedt) ?>
	<?php if(!$__Context->is_modal||$__Context->_tmp){ ?><div class="fl">
		<?php if($__Context->_tmp){ ?><span class="scBtn black">
			<a href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>"<?php if($__Context->us_modal&&!$__Context->is_modal){ ?> type="example/modal"<?php } ?> title="<?php echo $__Context->lang->new_document ?>" accesskey="w"><?php echo $__Context->lang->document_write ?></a>
		</span><?php } ?>
		<?php if(!$__Context->is_modal&&$__Context->category_srl){ ?><span class="scBtn"><a href="<?php echo getUrl('','mid',$__Context->mid) ?>"><?php echo $__Context->lang->cmd_all_list ?></a></span><?php } ?>
	</div><?php } ?>
	<span class="scBtn"><?php if(!$__Context->is_modal){ ?><a href="<?php echo getUrl('act', '','document_srl','','category_srl',$__Context->category_srl,'page',$__Context->page,'npage','','cpage','') ?>" accesskey="l"><?php echo $__Context->lang->cmd_list ?></a><?php };
if($__Context->is_modal){ ?><a href="<?php echo getUrl('act','','is_modal','') ?>" data-modal-hide><?php echo $__Context->lang->cmd_close ?></a><?php } ?></span>
	<?php if(!$__Context->is_locked && $__Context->oDocument->isEditable() && !($__Context->pt_vtype=='A'&&!$__Context->grant->manager&&$__Context->oDocument->get('comment_count')>0)){ ?>
		<span class="scBtn black">
			<a href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->doc_srl) ?>"<?php if($__Context->us_modal&&!$__Context->is_modal){ ?> type="example/modal"<?php } ?> title="<?php echo $__Context->lang->modify_document ?>"><?php echo $__Context->lang->cmd_modify ?></a>
		</span>
		<span class="scBtn black">
			<a href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->doc_srl) ?>"<?php if($__Context->us_modal&&!$__Context->is_modal){ ?> type="example/modal"<?php } ?> title="<?php echo $__Context->lang->delete_document ?>"><?php echo $__Context->lang->cmd_delete ?></a>
		</span>
	<?php } ?>
</div>
<?php if(!$__Context->is_modal){ ?>
	<!-- TRACKBACK -->
	<?php if($__Context->allow_trb || $__Context->oDocument->getTrackbackcount()){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_viw.trackback.html');
} ?>
	<!-- /TRACKBACK -->
	<!-- COMMENT -->
	<?php if($__Context->mi->view_comment_style == 'webzine' && ($__Context->allow_cmt || $__Context->oDocument->getCommentcount())){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_viw.c.webzine.html');
} ?>
	<?php if($__Context->mi->view_comment_style != 'webzine' && ($__Context->allow_cmt || $__Context->oDocument->getCommentcount())){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_viw.comment.html');
} ?>
	<!-- /COMMENT -->
<?php } ?>