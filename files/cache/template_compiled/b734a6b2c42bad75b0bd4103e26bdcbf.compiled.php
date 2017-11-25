<?php if(!defined("__XE__"))exit;
$__Context->ds_nick = $__Context->ci['nick_name']->display == 'Y';
	$__Context->ds_user =	$__Context->ci['user_name']->display == 'Y';
	$__Context->ds_regdate = $__Context->ci['regdate']->display == 'Y';
	$__Context->ds_update = $__Context->ci['last_update']->display == 'Y';
	$__Context->ds_cstus = $__Context->ci['custom_status']->display == 'Y'?1:0;
	$__Context->ds_readed = $__Context->ci['readed_count']->display == 'Y';
	$__Context->ds_voted = $__Context->ci['voted_count']->display == 'Y';
	$__Context->ds_blamed = $__Context->ci['blamed_count']->display == 'Y';
	$__Context->ds_summary = $__Context->mi->summary_length != '-1';
	$__Context->notice_list = $__Context->oThis->getNoticeList();
	$__Context->best_list = $__Context->mi->use_best=='Y'?$__Context->oThis->getBestList():array();
	$__Context->a_lsttp = array('notice'=>&$__Context->notice_list,'best'=>&$__Context->best_list);
 ?>
<?php if($__Context->a_lsttp&&count($__Context->a_lsttp))foreach($__Context->a_lsttp as $__Context->tlk=>$__Context->p_list){;
if(count($__Context->p_list)){ ?><ul class="lt wz">
	<?php if($__Context->p_list&&count($__Context->p_list))foreach($__Context->p_list as $__Context->no=>$__Context->document){ ?><li class="cb">
	<?php 
		$__Context->is_blind = ($__Context->tlk!='notice'&&$__Context->us_blind)?$__Context->oThis->isBlind($__Context->document->document_srl):0;
		$__Context->is_scrap = $__Context->ds_scrap?$__Context->oThis->isScrap($__Context->document->document_srl):0;
		$__Context->un_extra = ($__Context->pt_vtype!='N'||$__Context->pt_dtype!='N'||$__Context->ao_ppang||$__Context->ds_mtlng)?$__Context->document->get('extra_vars'):null;
		$__Context->un_extra = is_string($__Context->un_extra)?unserialize($__Context->un_extra):$__Context->un_extra;
	 ?>
		<a href="<?php echo getUrl('','mid',$__Context->mid,'document_srl',$__Context->document->document_srl,'category_srl',$__Context->category_srl,'sort_index',$__Context->sort_index,'order_type',$__Context->order_type,'search_target',$__Context->search_target,'search_keyword',$__Context->search_keyword,'page',$__Context->spage) ?>">
			<div class="title"><?php if($__Context->tlk){ ?><span class="<?php echo $__Context->tlk ?>"><?php echo $__Context->tlk=='best'?'Best':'Notice' ?></span><?php } ?>
				<strong><?php echo $__Context->is_blind?$__Context->lang->msg_is_blind:$__Context->document->getTitle($__Context->mi->title_length) ?></strong>
				<?php echo $__Context->document->printExtraImages($__Context->mi->duration_new);
if($__Context->ds_mtlng&&count($__Context->un_extra->beluxe->langs)){ ?><img src="/modules/beluxe/skins/default/img/common/blank.gif" class="ise world" alt="multilingual" title="multilingual" /><?php };
if($__Context->is_scrap){ ?><img src="/modules/beluxe/skins/default/img/common/blank.gif" class="ise scrap" alt="Scrap" title="Scrap" /><?php } ?>
				<?php 
					$__Context->t_cmtn = $__Context->document->getCommentCount();
					$__Context->t_tbkn = $__Context->document->getTrackbackCount();
				 ?>
				<?php if($__Context->t_cmtn){ ?><em>+<?php echo $__Context->t_cmtn ?></em><?php };
if($__Context->t_tbkn){ ?><em>.<?php echo $__Context->t_tbkn ?></em><?php } ?>
			</div>
			<div class="auth cb">
				<div class="fl">&nbsp;</div>
				<div class="nick">
					<?php if($__Context->ds_nick||$__Context->ds_user){ ?><span<?php if(!$__Context->document->get('member_srl')){ ?> class="fsi"<?php } ?>><?php echo cut_str((!$__Context->document->get('member_srl')||$__Context->ds_nick)?$__Context->document->getNickName():$__Context->document->getUserName(), $__Context->mi->nickname_length) ?></span><?php } ?>
					&rsaquo; <time><?php echo !$__Context->ds_regdate&&$__Context->ds_update ? zdate($__Context->document->get('last_update')) : $__Context->document->getRegDate("Y.m.d") ?></time>
				</div>
			</div>
		</a>
	</li><?php } ?>
</ul><?php }} ?>
<ul class="lt wz">
	<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){ ?><li class="cb">
	<?php 
		$__Context->is_grant = $__Context->grant->view && (!$__Context->document->isSecret() || $__Context->document->isGranted());
		$__Context->is_blind = $__Context->us_blind?$__Context->oThis->isBlind($__Context->document->document_srl):0;
		$__Context->is_scrap = $__Context->ds_scrap?$__Context->oThis->isScrap($__Context->document->document_srl):0;
		$__Context->un_extra = ($__Context->pt_vtype!='N'||$__Context->pt_dtype!='N'||$__Context->ao_ppang||$__Context->ds_mtlng)?$__Context->document->get('extra_vars'):null;
		$__Context->un_extra = is_string($__Context->un_extra)?unserialize($__Context->un_extra):$__Context->un_extra;
	 ?>
		<a href="<?php echo getUrl('','mid',$__Context->mid,'document_srl',$__Context->document->document_srl,'category_srl',$__Context->category_srl,'sort_index',$__Context->sort_index,'order_type',$__Context->order_type,'search_target',$__Context->search_target,'search_keyword',$__Context->search_keyword,'page',$__Context->spage) ?>"<?php if($__Context->us_slide){ ?> data-slide="<?php echo $__Context->is_grant&&!$__Context->is_blind?$__Context->document->document_srl:'Not permitted.' ?>"<?php } ?>>
			<span class="fl thum">
				<?php if($__Context->is_blind || !$__Context->is_grant){ ?>
					<img src="/modules/beluxe/skins/default/img/common/thum_<?php echo $__Context->is_blind?'blind':'secret' ?>.png" alt="<?php echo $__Context->is_blind?'blind':'secret' ?>" title="<?php echo $__Context->is_blind?'blind':'secret' ?>" height="<?php echo $__Context->mi->thumbnail_height ?>" width="<?php echo $__Context->mi->thumbnail_width ?>"/>
				<?php }else{ ?>
					<?php if($__Context->document->thumbnailExists($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, $__Context->mi->thumbnail_type)){ ?>
						<img src="<?php echo $__Context->document->getThumbnail($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, $__Context->mi->thumbnail_type) ?>" border="0" alt=""/>
					<?php }else{ ?>
						<img src="/modules/beluxe/skins/default/img/common/thum_no.png" alt="no image" title="no image" height="<?php echo $__Context->mi->thumbnail_height ?>" width="<?php echo $__Context->mi->thumbnail_width ?>"/>
					<?php } ?>
				<?php } ?>
			</span>
			<ul class="ifo" style="margin-left:<?php echo (int)$__Context->mi->thumbnail_width+18 ?>px;">
				<li>
					<div class="title">
						<?php if($__Context->pt_vtype!='N'||$__Context->pt_dtype!='N'){ ?><span class="usept <?php echo $__Context->un_extra->beluxe->adopt_srl?'blue':'' ?>"><?php echo abs((int)$__Context->un_extra->beluxe->use_point) ?></span><?php } ?>
						<strong><?php echo $__Context->is_blind?$__Context->lang->msg_is_blind:$__Context->document->getTitle($__Context->mi->title_length) ?></strong>
						<?php if($__Context->ao_ppang&&$__Context->un_extra->ppang&&$__Context->un_extra->ppang->d->p>0){ ?>
							<?php $__Context->ao_pppt = sprintf($__Context->lang->bonus_pang_pang, $__Context->un_extra->ppang->d->p) ?>
							<img src="/modules/beluxe/skins/default/img/common/blank.gif" class="ise coin" title="<?php echo $__Context->ao_pppt ?>" alt="<?php echo $__Context->ao_pppt ?>" />
						<?php } ?>
						<?php echo $__Context->document->printExtraImages($__Context->mi->duration_new);
if($__Context->ds_mtlng&&count($__Context->un_extra->beluxe->langs)){ ?><img src="/modules/beluxe/skins/default/img/common/blank.gif" class="ise world" alt="multilingual" title="multilingual" /><?php };
if($__Context->is_scrap){ ?><img src="/modules/beluxe/skins/default/img/common/blank.gif" class="ise scrap" alt="Scrap" title="Scrap" /><?php } ?>
						<?php 
							$__Context->t_cmtn = $__Context->document->getCommentCount();
							$__Context->t_tbkn = $__Context->document->getTrackbackCount();
						 ?>
						<?php if($__Context->t_cmtn){ ?><em>+<?php echo $__Context->t_cmtn ?></em><?php };
if($__Context->t_tbkn){ ?><em>.<?php echo $__Context->t_tbkn ?></em><?php } ?>
					</div>
				</li>
				<?php if($__Context->is_cts||$__Context->ds_cstus||$__Context->ds_voted||$__Context->ds_blamed){ ?><li class="auth" style="text-align:right">
					<span class="fl">
						<?php if($__Context->ds_voted||$__Context->ds_blamed){ ?>
							<em class="ent vote <?php echo $__Context->ds_voted?'':'dis' ?>like"><?php echo $__Context->ds_voted&&$__Context->ds_blamed?'&hearts;':($__Context->ds_voted?'Like':'Hate') ?></em> <?php echo $__Context->ds_voted?$__Context->document->get('voted_count'):'';
echo $__Context->ds_voted&&$__Context->ds_blamed?' / ':'';
echo $__Context->ds_blamed?$__Context->document->get('blamed_count'):'' ?>
						<?php } ?>
						&nbsp;
					</span>
					<?php if($__Context->is_cts && $__Context->document->get('category_srl')){ ?><span><?php echo $__Context->cts[$__Context->document->get('category_srl')]->title ?></span><?php } ?>
					<?php if($__Context->ds_cstus){ ?><span>:<?php echo $__Context->cstus[(int)$__Context->document->get('is_notice')] ?></span><?php } ?>
				</li><?php } ?>
				<?php if($__Context->ci&&count($__Context->ci))foreach($__Context->ci as $__Context->key=>$__Context->val){;
if($__Context->val->display=='Y'&&$__Context->val->idx>0){ ?><li class="auth">
					<span><?php echo $__Context->val->name ?>:</span>
					<span><?php echo $__Context->document->getExtraValue($__Context->ci[$__Context->key]->idx) ?></span>
				</li><?php }} ?>
				<?php if($__Context->ds_summary){ ?><li><span class="summary">&deg; <?php echo (!$__Context->is_grant||$__Context->is_blind)?($__Context->is_blind?$__Context->lang->msg_is_blind:$__Context->lang->msg_not_permitted):$__Context->document->getSummary($__Context->mi->summary_length) ?></span></li><?php } ?>
				<li class="auth cb">
					<div class="nick">
						<?php if($__Context->ds_nick||$__Context->ds_user){ ?>
						<span<?php if(!$__Context->document->get('member_srl')){ ?> class="fsi"<?php } ?>><?php echo cut_str((!$__Context->document->get('member_srl')||$__Context->ds_nick)?$__Context->document->getNickName():$__Context->document->getUserName(), $__Context->mi->nickname_length) ?></span>
						<?php } ?>
						&rsaquo; <time><?php echo !$__Context->ds_regdate&&$__Context->ds_update ? zdate($__Context->document->get('last_update')) : $__Context->document->getRegDate("Y.m.d") ?></time>
					</div>
				</li>
			</ul>
		</a>
	</li><?php } ?>
</ul>
