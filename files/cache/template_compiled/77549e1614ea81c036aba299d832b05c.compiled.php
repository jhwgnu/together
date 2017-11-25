<?php if(!defined("__XE__"))exit;
$__Context->ds_readed = $__Context->ci['readed_count']->display == 'Y';
	$__Context->ds_voted = $__Context->ci['voted_count']->display == 'Y';
	$__Context->ds_update = $__Context->ci['last_update']->display == 'Y';
	$__Context->ds_updater = $__Context->ci['last_updater']->display == 'Y';
	$__Context->ds_update && $__Context->ds_updater ? $__Context->ci['last_update']->display = 'N' : 0;
	$__Context->ci['content']->display = 'N';
	$__Context->ci['comment']->display = 'N';
	$__Context->ci['thumbnail']->display = 'N';
	$__Context->ci['tag']->display = 'N';
	$__Context->mi->star_style!='N' ? $__Context->ci['blamed_count']->display = 'N' : 0;
	$__Context->mi->star_style!='N' && $__Context->ds_voted ? $__Context->ci['readed_count']->display = 'N' : 0;
	$__Context->colcnt = $__Context->sotcnt = 0;
	$__Context->sclms = array();
	$__Context->is_notice_widget = !$__Context->document_srl && $__Context->mi->use_notice_widget=='widget';
	$__Context->a_lsttp = array('notice'=>&$__Context->notice_list,'best'=>&$__Context->best_list);
 ?>
<?php if($__Context->ci&&count($__Context->ci))foreach($__Context->ci as $__Context->key=>$__Context->val){;
if($__Context->val->display=='Y'){ ?>
	<?php 
		$__Context->colcnt += $__Context->val->idx<0?1:0;
		$__Context->sclms[$__Context->key] = clone $__Context->val;
		$__Context->_tmp = Context::getLang('short_'.$__Context->val->eid);
		$__Context->_tmp !== 'short_'.$__Context->val->eid ? $__Context->sclms[$__Context->key]->name = $__Context->_tmp: 0;
	 ?>
<?php }} ?>
<?php  $__Context->mi->star_style!='N' ? $__Context->sclms['voted_count']->name = $__Context->lang->star_column : 0 ?>
<!-- LIST -->
<?php if($__Context->is_notice_widget && (count($__Context->notice_list) || count($__Context->best_list))){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.noticewidget.html');
} ?>
<table id="siLst" class="gall<?php echo $__Context->mi->display_list_header=='N'?' noheader':'' ?>" width="100%" border="0" cellspacing="0" summary="List of document">
<?php if($__Context->mi->display_list_header != 'N'){ ?><thead class="scOneCol">
	<tr>
		<th scope="row" colspan="<?php echo $__Context->colcnt ?>">
		<div>&nbsp;
			<?php if($__Context->mi->display_document_count!='N'){ ?>
			<?php if($__Context->mi->display_document_count!='N'&&!$__Context->sotcnt){ ?><span class="scHaDCnts">
				<em>Today</em> <strong><?php echo $__Context->oThis->getDocumentCountByDate(date("Ymd")) ?></strong>,
				<em>Yesterday</em> <strong><?php echo $__Context->oThis->getDocumentCountByDate(date("Ymd",strtotime("-1 day", time()))) ?></strong>,
				<em>Total</em> <strong><?php echo $__Context->oThis->getDocumentCountByDate() ?></strong>
			</span><?php } ?>
			<?php }else{ ?>
			<?php if($__Context->sclms&&count($__Context->sclms))foreach($__Context->sclms as $__Context->key=>$__Context->val){;
if($__Context->val->sort == 'Y'){ ?><span class="sort"> <?php  $__Context->sotcnt++ ?>
				<a href="<?php echo getUrl('sort_index',$__Context->key,'order_type',($__Context->order_type!='asc'?'asc':'desc')) ?>"><?php echo $__Context->val->name ?><em<?php if($__Context->sort_index==$__Context->key&&$__Context->order_type=='asc'){ ?> class="asc"<?php } ?>>&nbsp;</em></a>
			</span><?php }} ?>
			<?php } ?>
		</div>
		</th>
		<?php if($__Context->grant->manager){ ?><td class="scCheck sort"><div><input type="checkbox" onclick="XE.checkboxToggleAll({ doClick:true }); return false;" /></div></td><?php } ?>
	</tr>
</thead><?php } ?>
<?php  $__Context->md_optstr = $__Context->us_vmodal?'type="example/modal" data-footer="__PID_MODAL_FOOTER__" data-header="__PID_MODAL_HEADER__"':'type="text/html"' ?>
<?php if(!$__Context->is_notice_widget){ ?>
	<?php if($__Context->a_lsttp&&count($__Context->a_lsttp))foreach($__Context->a_lsttp as $__Context->tlk=>$__Context->p_list){;
if($__Context->tlk && count($__Context->p_list)){ ?><tbody class="<?php echo $__Context->tlk ?>">
		<?php if($__Context->p_list&&count($__Context->p_list))foreach($__Context->p_list as $__Context->no=>$__Context->document){ ?>
		<?php 
			$__Context->is_blind = ($__Context->tlk!='notice'&&$__Context->us_blind)?$__Context->oThis->isBlind($__Context->document->document_srl):0;
			$__Context->is_scrap = $__Context->ds_scrap?$__Context->oThis->isScrap($__Context->document->document_srl):0;
			$__Context->purl = getUrl('','mid',$__Context->mid,'document_srl',$__Context->document->document_srl,'category_srl',$__Context->category_srl,'sort_index',$__Context->sort_index,'order_type',$__Context->order_type,'search_target',$__Context->search_target,'search_keyword',$__Context->search_keyword,'page',$__Context->spage);
		 ?>
		<tr <?php echo $__Context->us_hottrack?'data-hottrack="list"':'' ?>>
			<?php if($__Context->sclms&&count($__Context->sclms))foreach($__Context->sclms as $__Context->key=>$__Context->val){;
if($__Context->val->idx<0){ ?><td scope="col" class="<?php echo $__Context->key ?>"<?php if($__Context->val->color){ ?> style="color:<?php echo $__Context->val->color ?>"<?php } ?>>
				<?php switch($__Context->key){;
case 'no': ?>
						<?php  $__Context->no = $__Context->tlk?'<img src="/modules/beluxe/skins/default/img/common/label_'.$__Context->tlk.'.gif" alt="'.$__Context->tlk.'" />':$__Context->no ?>
						<?php echo ($__Context->document->document_srl==$__Context->document_srl)?'<strong class="sCkChr">&radic;</strong>':$__Context->no ?>
					<?php break;
case 'category_srl': ?>
						<?php  $__Context->cate = $__Context->is_cts?$__Context->cts[$__Context->document->get('category_srl')]:0  ?>
						<?php if($__Context->cate){ ?><a href="<?php echo getUrl('','mid',$__Context->mid,'category_srl',$__Context->cate->category_srl) ?>" title="<?php echo htmlspecialchars($__Context->cate->description) ?>"<?php if($__Context->cate->color){ ?> style="color:<?php echo $__Context->cate->color ?>"<?php } ?>><?php echo $__Context->cate->title ?></a><?php } ?>
						<?php if(!$__Context->cate){ ?><span><?php echo $__Context->lang->none_category ?></span><?php } ?>
					<?php break;
case 'title': ?>
						<div class="scElps"<?php if($__Context->is_elips){ ?> data-active="true"<?php } ?>>
							<a href="<?php echo $__Context->purl ?>" <?php echo $__Context->md_optstr ?>><?php echo $__Context->is_blind?$__Context->lang->msg_is_blind:$__Context->document->getTitle($__Context->mi->title_length) ?></a>
							<span>
								<?php 
									$__Context->t_cmtn = $__Context->document->getCommentCount();
									$__Context->t_tbkn = $__Context->document->getTrackbackCount();
								 ?>
								<?php if($__Context->t_cmtn){ ?><em class="reply" title="Replies">+<?php echo $__Context->t_cmtn ?></em><?php };
if($__Context->t_tbkn){ ?><em class="trackback" title="Trackbacks">.<?php echo $__Context->t_tbkn ?></em><?php } ?>
								<?php if(!$__Context->t_cmtn&&!$__Context->t_tbkn){ ?><em>&nbsp;</em><?php } ?>
								<?php echo $__Context->document->printExtraImages($__Context->mi->duration_new);
if($__Context->ds_mtlng&&count($__Context->un_extra->beluxe->langs)){ ?><img class="scIcoSet world" src="/modules/beluxe/skins/default/img/common/blank.gif" alt="multilingual" title="multilingual" /><?php };
if($__Context->is_scrap){ ?><img class="scIcoSet scrap" src="/modules/beluxe/skins/default/img/common/blank.gif" alt="Scrap" title="Scrap" /><?php } ?>
							</span>
						</div>
					<?php break;
case 'nick_name': ?>
					<?php case 'user_name': ?>
						<?php 
							$__Context->mbsl = $__Context->document->get('member_srl');
							$__Context->home = $__Context->document->get('homepage');
							$__Context->nick = cut_str((!$__Context->mbsl||$__Context->key=='nick_name')?$__Context->document->getNickName():$__Context->document->getUserName(), $__Context->mi->nickname_length);
						 ?>
						<?php if(!$__Context->mbsl && !$__Context->home){ ?><i><?php echo $__Context->nick ?></i><?php } ?>
						<?php if($__Context->mbsl){ ?><span class="scHLink member_<?php echo $__Context->mbsl ?>"><?php echo $__Context->nick ?></span><?php } ?>
						<?php if(!$__Context->mbsl && $__Context->home){ ?><i class="scHLink" data-href="<?php echo $__Context->home ?>"><?php echo $__Context->nick ?></i><?php } ?>
					<?php break;
case 'custom_status': ?>
						<span<?php if($__Context->tlk!='notice'){ ?> class="custom_status_<?php echo (int)$__Context->document->get('is_notice') ?>"<?php } ?>><?php echo $__Context->tlk&&$__Context->tlk=='notice'?$__Context->lang->notice:$__Context->cstus[(int)$__Context->document->get('is_notice')] ?></span>
					<?php break;
case 'voted_count': ?>
					<?php case 'blamed_count': ?>
						<?php if($__Context->mi->star_style!='N'){ ?>
							<?php 
								$__Context->votedp = (int)$__Context->document->get('voted_count');
								$__Context->blamedp = (int)$__Context->document->get('blamed_count');
								$__Context->totalp = $__Context->votedp?(($__Context->votedp / ($__Context->votedp + abs($__Context->blamedp)) * 100) * 0.5):0;
							 ?>
							<?php if($__Context->ds_readed){ ?><span class="scRdStar color<?php echo $__Context->mi->star_style ?>" title="<?php echo $__Context->lang->readed_count ?>"><?php echo $__Context->document->get('readed_count') ?></span><?php } ?>
							<span class="scVtStar color<?php echo $__Context->mi->star_style ?>" title="<?php echo $__Context->lang->voted_count ?>: <?php echo $__Context->votedp.' / '.$__Context->blamedp ?>"><em style="width:<?php echo $__Context->totalp ?>px"></em></span>
						<?php }else{ ?>
							<?php echo $__Context->document->get($__Context->key) ?>
						<?php } ?>
					<?php break;
case 'regdate': ?>
					<?php case 'last_update': ?>
						<?php echo ($__Context->key=='regdate')?$__Context->document->getRegdate('Y.m.d'):zdate($__Context->document->get('last_update')) ?>
					<?php break;
case 'last_updater': ?>
						<?php if($__Context->ds_update && $__Context->ds_updater){ ?>
							<?php if($__Context->document->get('last_updater')){ ?><span title="<?php echo $__Context->lang->last_updater ?>"><?php echo zdate($__Context->document->get('last_update'),'y-m-d') ?> : <em><?php echo cut_str($__Context->document->get('last_updater'), $__Context->mi->nickname_length) ?></em></span><?php } ?>
						<?php }else{ ?>
							<?php echo cut_str($__Context->document->get($__Context->key), $__Context->mi->nickname_length) ?>
						<?php } ?>
					<?php break;
default : ?>
						<?php echo ($__Context->ci[$__Context->key]->idx > 0)?$__Context->document->getExtraValueHTML($__Context->ci[$__Context->key]->idx):$__Context->document->get($__Context->key) ?>
				<?php } ?>
			</td><?php }} ?>
			<?php if($__Context->grant->manager){ ?><td class="scCheck"><input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" onclick="doAddDocumentCart(this)"<?php if($__Context->document->isCarted()){ ?> checked="checked"<?php } ?> /></td><?php } ?>
		</tr>
		<?php } ?>
	</tbody><?php }} ?>
<?php } ?>
<?php if(count($__Context->document_list)){ ?><tbody>
	<tr>
		<td scope="col" colspan="<?php echo $__Context->colcnt+2 ?>" class="scBox clearBar">
		<?php 
			$__Context->ds_title = $__Context->sclms['title'];
			$__Context->ds_cate = $__Context->sclms['category_srl'];
			$__Context->ds_nick = $__Context->sclms['nick_name'];
			$__Context->ds_user = $__Context->sclms['user_name'];
			$__Context->ds_regdate = $__Context->sclms['regdate'];
			unset($__Context->sclms['no']);
			unset($__Context->sclms['title']);
			unset($__Context->sclms['category_srl']);
			unset($__Context->sclms['nick_name']);
			unset($__Context->sclms['user_name']);
			unset($__Context->sclms['regdate']);
			unset($__Context->sclms['last_update']);
			unset($__Context->sclms['last_updater']);
			unset($__Context->sclms['readed_count']);
			unset($__Context->sclms['voted_count']);
			unset($__Context->sclms['blamed_count']);
		 ?>
		<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){ ?>
		<?php 
			$__Context->is_grant = $__Context->grant->view && (!$__Context->document->isSecret() || $__Context->document->isGranted());
			$__Context->is_blind = $__Context->us_blind?$__Context->oThis->isBlind($__Context->document->document_srl):0;
			$__Context->is_scrap = $__Context->ds_scrap?$__Context->oThis->isScrap($__Context->document->document_srl):0;
			$__Context->purl = getUrl('','mid',$__Context->mid,'document_srl',$__Context->document->document_srl,'category_srl',$__Context->category_srl,'sort_index',$__Context->sort_index,'order_type',$__Context->order_type,'search_target',$__Context->search_target,'search_keyword',$__Context->search_keyword,'page',$__Context->spage);
			$__Context->un_extra = ($__Context->pt_vtype!='N'||$__Context->pt_dtype!='N'||$__Context->ao_ppang||$__Context->ds_mtlng)?$__Context->document->get('extra_vars'):null;
			$__Context->un_extra = is_string($__Context->un_extra)?unserialize($__Context->un_extra):$__Context->un_extra;
		 ?>
			<div class="scItem <?php echo $__Context->mi->display_thumbnail_info!='N'?'scIfHide':'' ?>" <?php echo $__Context->us_hottrack?'data-hottrack="gall"':'' ?>>
				<?php if($__Context->grant->manager){ ?><span class="scCheck"><input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" onclick="doAddDocumentCart(this)"<?php if($__Context->document->isCarted()){ ?> checked="checked"<?php } ?> /></span><?php } ?>
					<a href="<?php echo $__Context->purl ?>" <?php if($__Context->us_slide){ ?>data-slide="<?php echo $__Context->is_grant&&!$__Context->is_blind?$__Context->document->document_srl:'Not permitted.' ?>"<?php }else{;
echo $__Context->md_optstr;
} ?>>
					<?php if($__Context->is_blind || !$__Context->is_grant){ ?>
						<img class="thum" src="/modules/beluxe/skins/default/img/common/thum_<?php echo $__Context->is_blind?'blind':'secret' ?>.png" alt="<?php echo $__Context->is_blind?'blind':'secret' ?>" title="<?php echo $__Context->is_blind?'blind':'secret' ?>" height="<?php echo (int)$__Context->mi->thumbnail_height ?>" width="<?php echo (int)$__Context->mi->thumbnail_width ?>" />
					<?php }else{ ?>
						<?php if($__Context->document->thumbnailExists($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, $__Context->mi->thumbnail_type)){ ?>
							<img class="thum" src="<?php echo $__Context->document->getThumbnail($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, $__Context->mi->thumbnail_type) ?>"<?php if($__Context->mi->thumbnail_type!='ratio'){ ?> width="<?php echo (int)$__Context->mi->thumbnail_width ?>"<?php } ?> border="0" alt="" />
						<?php }else{ ?>
							<img class="thum" src="/modules/beluxe/skins/default/img/common/thum_no.png" alt="no image" title="no image" height="<?php echo (int)$__Context->mi->thumbnail_height ?>" width="<?php echo (int)$__Context->mi->thumbnail_width ?>" />
						<?php } ?>
					<?php } ?>
					</a>
					<div class="scInfo" <?php if($__Context->mi->display_thumbnail_info!='N'){ ?>style="display:none" data-autohide="true"<?php }else{;
} ?>>
						<ul<?php if($__Context->mi->display_thumbnail_info=='N'||$__Context->mi->thumbnail_type!='ratio'){ ?> style="width:<?php echo (int)$__Context->mi->thumbnail_width ?>px;"<?php } ?>>
							<?php if($__Context->mi->display_thumbnail_info != 'N'){ ?><li class="scNbsp">&nbsp;</li><?php } ?>
							<?php if($__Context->ds_title){ ?><li class="title">
								<a href="<?php echo $__Context->purl ?>" <?php echo $__Context->md_optstr ?>><strong><?php echo $__Context->is_blind?$__Context->lang->msg_is_blind:$__Context->document->getTitle($__Context->mi->title_length) ?></strong></a>
							</li><?php } ?>
							<?php if($__Context->ds_cate){ ?><li class="category_srl">
								<?php  $__Context->cate = $__Context->is_cts?$__Context->cts[$__Context->document->get('category_srl')]:0  ?>
								<?php if($__Context->cate){ ?><span title="<?php echo htmlspecialchars($__Context->cate->description) ?>"<?php if($__Context->cate->color){ ?> style="color:<?php echo $__Context->cate->color ?>"<?php } ?>><?php echo $__Context->cate->title ?></span><?php } ?>
								<?php if(!$__Context->cate){ ?><span><?php echo $__Context->lang->none_category ?></span><?php } ?>
							</li><?php } ?>
							<?php if($__Context->ds_readed){ ?><li class="readed_count">
								<span><?php echo context::getLang('readed_count') ?>:</span> <span><?php echo $__Context->document->get('readed_count') ?></span>
							</li><?php } ?>
							<?php if($__Context->ds_voted){ ?><li class="voted_count">
								<span><?php echo context::getLang('voted_count') ?>:</span> <span><?php echo $__Context->document->get('voted_count') ?> / <?php echo $__Context->document->get('blamed_count') ?></span>
							</li><?php } ?>
							<?php if($__Context->sclms&&count($__Context->sclms))foreach($__Context->sclms as $__Context->key=>$__Context->val){;
if($__Context->key){ ?><li class="<?php echo $__Context->key ?>"<?php if($__Context->val->color){ ?> style="color:<?php echo $__Context->val->color ?>"<?php } ?>>
								<?php switch($__Context->key){;
case 'custom_status': ?>
										<span><?php echo $__Context->lang->short_custom_status ?>:</span> <span class="custom_status_<?php echo (int)$__Context->document->get('is_notice') ?>"><?php echo $__Context->cstus[(int)$__Context->document->get('is_notice')] ?></span>
									<?php break;
default : ?>
										<span><?php echo ($__Context->ci[$__Context->key]->idx > 0)?strip_tags($__Context->document->getExtraValueHTML($__Context->ci[$__Context->key]->idx)):$__Context->document->get($__Context->key) ?></span>
								<?php } ?>
							</li><?php }} ?>
							<?php if($__Context->ds_nick || $__Context->ds_user){ ?><li class="nick_name"<?php if($__Context->mi->display_thumbnail_info=='N'){ ?> style="text-align:left"<?php } ?>>
								<?php 
									$__Context->mbsl = $__Context->document->get('member_srl');
									$__Context->home = $__Context->document->get('homepage');
									$__Context->nick = cut_str((!$__Context->mbsl||$__Context->ds_nick)?$__Context->document->getNickName():$__Context->document->getUserName(), $__Context->mi->nickname_length);
								 ?>
								by <?php if(!$__Context->mbsl){ ?><i><?php echo $__Context->nick ?></i><?php }else{ ?><span><?php echo $__Context->nick ?></span><?php } ?>
							</li><?php } ?>
						</ul>
					</div>
					<span class="prtImg"<?php if($__Context->mi->display_thumbnail_info=='N'){ ?> style="bottom:1px;right:3px"<?php } ?>>
						<?php 
							$__Context->t_cmtn = $__Context->document->getCommentCount();
							$__Context->t_tbkn = $__Context->document->getTrackbackCount();
						 ?>
						<?php if($__Context->ao_ppang&&$__Context->un_extra->ppang&&$__Context->un_extra->ppang->d->p>0){ ?>
							<?php $__Context->ao_pppt = sprintf($__Context->lang->bonus_pang_pang, $__Context->un_extra->ppang->d->p) ?>
							<img class="scIcoSet coin" src="/modules/beluxe/skins/default/img/common/blank.gif" title="<?php echo $__Context->ao_pppt ?>" alt="<?php echo $__Context->ao_pppt ?>" />
						<?php } ?>
						<?php echo $__Context->document->printExtraImages($__Context->mi->duration_new);
if($__Context->ds_mtlng&&count($__Context->un_extra->beluxe->langs)){ ?><img class="scIcoSet world" src="/modules/beluxe/skins/default/img/common/blank.gif" alt="multilingual" title="multilingual" /><?php };
if($__Context->is_scrap){ ?><img class="scIcoSet scrap" src="/modules/beluxe/skins/default/img/common/blank.gif" alt="Scrap" title="Scrap" /><?php } ?>
						<?php if($__Context->t_cmtn || $__Context->t_tbkn){ ?><em class="reply" title="Replies">+<?php echo (int)$__Context->t_cmtn;
if($__Context->t_tbkn){ ?>.<?php echo $__Context->t_tbkn;
} ?></em><?php } ?>
						<?php if($__Context->pt_vtype!='N'||$__Context->pt_dtype!='N'){ ?><em class="usept <?php echo $__Context->un_extra->beluxe->adopt_srl?'colBgBlue':'' ?>" title="Point">
							<?php echo abs((int)$__Context->un_extra->beluxe->use_point) ?>
						</em><?php } ?>
					</span>
					<?php if($__Context->ds_regdate || $__Context->ds_update){ ?><strong class="scRibbon <?php echo ($__Context->document->document_srl==$__Context->document_srl)?'active':'' ?>"><span class="caption"><?php echo $__Context->ds_regdate ? $__Context->document->getRegdate('M.d') : zdate($__Context->document->get('last_update'),'M.d') ?></span></strong><?php } ?>
			</div><?php } ?></td>
	</tr>
</tbody><?php } ?>
<?php if(!count($__Context->document_list)){ ?><tbody><tr><td colspan="<?php echo $__Context->colcnt+2 ?>"><?php echo $__Context->lang->no_documents ?></td></tr></tbody><?php } ?>
</table>
<!-- /LIST -->
