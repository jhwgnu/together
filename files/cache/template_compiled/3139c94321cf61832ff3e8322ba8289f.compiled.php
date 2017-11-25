<?php if(!defined("__XE__"))exit;
$__Context->sclms = array();
	$__Context->ds_readed = $__Context->ci['readed_count']->display == 'Y';
	$__Context->ds_voted = $__Context->ci['voted_count']->display == 'Y';
	$__Context->ds_update = $__Context->ci['last_update']->display == 'Y';
	$__Context->ds_updater = $__Context->ci['last_updater']->display == 'Y';
	$__Context->ds_update && $__Context->ds_updater ? $__Context->ci['last_update']->display = 'N' : 0;
	$__Context->ci['content']->display = 'N';
	$__Context->ci['tag']->display = 'N';
	$__Context->mi->star_style!='N' ? $__Context->ci['blamed_count']->display = 'N' : 0;
	$__Context->mi->star_style!='N' && $__Context->ds_voted ? $__Context->ci['readed_count']->display = 'N' : 0;
	$__Context->is_notice_widget = !$__Context->is_doc;
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
<?php if($__Context->mi->display_list_header != 'N'){ ?><table id="siLst" class="widg" width="100%" border="0" cellspacing="0" summary="List of document" style="border:0">
<thead class="scOneCol">
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
</thead>
</table><?php } ?>
<?php  $__Context->md_optstr = $__Context->us_vmodal?'type="example/modal" data-footer="__PID_MODAL_FOOTER__" data-header="__PID_MODAL_HEADER__"':'type="text/html"' ?>
<?php if(count($__Context->document_list)){ ?><div id="siDoc" class="widg">
	<?php 
		$__Context->ds_nick = $__Context->ci['nick_name']->display == 'Y';
		$__Context->ds_user =	$__Context->ci['user_name']->display == 'Y';
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
	<div class="doct clearBar" <?php echo $__Context->us_hottrack?'data-hottrack="widg"':'' ?>>
		<strong class="scRibbon">
			<dl class="regdate">
				<dd class="y"><?php echo $__Context->document->getRegdate('Y') ?></dd>
				<dd class="caption m"><?php echo $__Context->document->getRegdate('F') ?></dd>
				<dd class="caption d"><?php echo $__Context->document->getRegdate('D (d)') ?></dd>
			</dl>
		</strong>
		<ul class="scFrm">
			<li>
				<div class="title scElps"<?php if($__Context->is_elips){ ?> data-active="true"<?php } ?>>
					<a href="<?php echo $__Context->purl ?>" <?php echo $__Context->md_optstr ?>><?php echo $__Context->is_blind?$__Context->lang->msg_is_blind:$__Context->document->getTitle($__Context->mi->title_length) ?></a>
					<span>
						<?php if($__Context->ao_ppang&&$__Context->un_extra->ppang&&$__Context->un_extra->ppang->d->p>0){ ?>
							<?php $__Context->ao_pppt = sprintf($__Context->lang->bonus_pang_pang, $__Context->un_extra->ppang->d->p) ?>
							<img class="scIcoSet coin" src="/modules/beluxe/skins/default/img/common/blank.gif" title="<?php echo $__Context->ao_pppt ?>" alt="<?php echo $__Context->ao_pppt ?>" />
						<?php } ?>
						<?php echo $__Context->document->printExtraImages($__Context->mi->duration_new);
if($__Context->ds_mtlng&&count($__Context->un_extra->beluxe->langs)){ ?><img class="scIcoSet world" src="/modules/beluxe/skins/default/img/common/blank.gif" alt="multilingual" title="multilingual" /><?php };
if($__Context->is_scrap){ ?><img class="scIcoSet scrap" src="/modules/beluxe/skins/default/img/common/blank.gif" alt="Scrap" title="Scrap" /><?php } ?>
						<?php 
							$__Context->t_cmtn = $__Context->document->getCommentCount();
							$__Context->t_tbkn = $__Context->document->getTrackbackCount();
						 ?>
						<?php if($__Context->t_cmtn){ ?><em class="reply" title="Replies">+<?php echo $__Context->t_cmtn ?></em><?php };
if($__Context->t_tbkn){ ?><em class="trackback" title="Trackbacks">.<?php echo $__Context->t_tbkn ?></em><?php } ?>
					</span>
				</div>
				<div class="nick_name clearBar">
					<span class="fl">
					<?php if($__Context->ds_nick||$__Context->ds_user){ ?>
					<?php 
						$__Context->mbsl = $__Context->document->get('member_srl');
						$__Context->home = $__Context->document->get('homepage');
						$__Context->nick = cut_str((!$__Context->mbsl||$__Context->ds_nick||!$__Context->ds_user)?$__Context->document->getNickName():$__Context->document->getUserName(), $__Context->mi->nickname_length);
					 ?>
					<?php if(!$__Context->mbsl && !$__Context->home){ ?><i><?php echo $__Context->nick ?></i><?php } ?>
					<?php if($__Context->mbsl){ ?><span class="scHLink member_<?php echo $__Context->mbsl ?>"><?php echo $__Context->nick ?></span><?php } ?>
					<?php if(!$__Context->mbsl && $__Context->home){ ?><i class="scHLink" data-href="<?php echo $__Context->home ?>"><?php echo $__Context->nick ?></i><?php } ?>
					<?php }else{ ?>
					<span><?php echo $__Context->lang->readed_count ?>: <?php echo $__Context->document->get('readed_count') ?></span>
					<?php } ?>
					</span>
					<span><?php echo $__Context->document->getRegdate('A h:i:s') ?></span>
					<?php if($__Context->is_cts){ ?>
						<?php  $__Context->cate = $__Context->cts[$__Context->document->get('category_srl')] ?>
						[<?php if(!$__Context->cate){ ?><span><?php echo $__Context->lang->none_category ?></span><?php };
if($__Context->cate){ ?><a href="<?php echo getUrl('','mid',$__Context->mid,'category_srl',$__Context->cate->category_srl) ?>" title="<?php echo htmlspecialchars($__Context->cate->description) ?>"<?php if($__Context->cate->color){ ?> style="color:<?php echo $__Context->cate->color ?>"<?php } ?>><?php echo $__Context->cate->title ?></a><?php } ?>]
					<?php } ?>
				</div>
			</li>
		</ul>
	</div>
	<?php } ?>
</div><?php } ?>
<?php if(!count($__Context->document_list)){ ?><div class="scNoDocs"><div><?php echo $__Context->lang->no_documents ?></div></div><?php } ?>
<!-- /LIST -->
