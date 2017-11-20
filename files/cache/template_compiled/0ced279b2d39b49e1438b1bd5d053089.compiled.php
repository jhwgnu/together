<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/kin/skins/xe_kin_official','header.include.html') ?>
<div class="section clearfix">
	<h2 class="sec_title"><?php if($__Context->selected_reply){ ?><span class="red"><?php echo $__Context->lang->solved_question ?></span><?php };
if(!$__Context->selected_reply){ ?><span class="green"><?php echo $__Context->lang->open_question ?></span><?php } ?></h2>
    <div class="corner01">
		<div class="question">
			<div class="pf_img">
				<?php  
					$__Context->oMemberModel = &getModel('member');
					$__Context->memberImage = $__Context->oMemberModel->getProfileImage($__Context->oDocument->get('member_srl'));
				 ?>
				<?php if($__Context->memberImage){ ?><img border="0" src="<?php echo $__Context->memberImage->src ?>" width="90" height="90"><?php } ?>
				<?php if(!$__Context->memberImage){ ?><img src="/modules/kin/skins/xe_kin_official/img/default_profile_pic90.png" width="90" height="90" alt=""><?php } ?>
			</div>
            <div class="pg">    
				<div class="kin_header">
					<h3 class="pg_title"><?php echo $__Context->oDocument->getTitle() ?></h3>
					<div class="meta">
						<?php if($__Context->module_info->use_category == 'Y' && $__Context->oDocument->get('category_srl')){ ?><span class="cate" ><?php echo $__Context->categories[$__Context->oDocument->get('category_srl')]->title ?></span><?php } ?>
						<span class="author"><?php echo $__Context->oDocument->getNickName() ?></span>
						<span class="date"><?php echo $__Context->oDocument->getRegdate('Y.m.d') ?> <?php echo $__Context->oDocument->getRegdate('H:i') ?></span>
						<span class="point status"><strong class="red">Given Points  <?php echo $__Context->oDocument->get('point') ?></strong></span>
					</div>
                    <a href="#" class="kin_btn" data="<?php echo $__Context->oDocument->get('voted_count') ?>" onclick="voteQuestion(<?php echo $__Context->oDocument->document_srl ?>); return false;"><span><?php echo $__Context->lang->voted_count ?> ( <strong id="q_voteno_<?php echo $__Context->oDocument->document_srl ?>"><?php echo $__Context->oDocument->get('voted_count') ?></strong> )</span></a>
				</div><!-- //header -->
				<div class="pg_txt">
					 <?php echo $__Context->oDocument->getContent(false) ?>
				</div><!-- //pg_txt -->
				<?php if($__Context->oDocument->hasUploadedFiles()){ ?><div class="attach" >
					<h4 class="attach_title"><?php echo $__Context->lang->uploaded_file ?> (<?php echo $__Context->oDocument->get('uploaded_count') ?>)</h4>
					<ul class="files">
						 <?php  $__Context->uploaded_list = $__Context->oDocument->getUploadedFiles()  ?>
						<?php if($__Context->uploaded_list&&count($__Context->uploaded_list))foreach($__Context->uploaded_list as $__Context->key=>$__Context->file){ ?><li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> <span class="bubble">[File Size:<?php echo FileHandler::filesize($__Context->file->file_size) ?>/Download:<?php echo number_format($__Context->file->download_count) ?>]</span></a></li><?php } ?>
					</ul>
				</div><?php } ?>
			</div><!-- //pg -->
			<div class="comments corner02">
				<h5 class="cm_title"><a href="#replies_<?php echo $__Context->oDocument->document_srl ?>" onclick="doGetComments(<?php echo $__Context->oDocument->document_srl ?>,<?php echo $__Context->oDocument->document_srl ?>); return false;" id="replies_<?php echo $__Context->oDocument->document_srl ?>" class="replies_link"><span><?php echo $__Context->lang->short_replies ?> (<?php echo number_format($__Context->replies_count[$__Context->oDocument->document_srl]) ?>)</span></a></h5>
				<div id="replies_content_<?php echo $__Context->oDocument->document_srl ?>" style="display:none;"></div>
				<!-- border-round elements -->
				<span class="corn tl"></span><span class="corn tr"></span><span class="corn bl"></span><span class="corn br"></span>        
			</div>
            <a href="<?php echo getUrl('act','dispKinReply') ?>" class="btn_answer"><span><?php echo $__Context->lang->cmd_reply ?></span></a>
			 <p class="buttonArea">
				<?php if($__Context->selected_reply){ ?><a href="#comment_<?php echo $__Context->selected_reply ?>" class="btn_accepted btn_left"><span><?php echo $__Context->lang->cmd_move_selected_reply ?></span></a><?php } ?>
				<?php if(!$__Context->selected_reply && $__Context->oDocument->isGranted()){ ?><a href="<?php echo getUrl('act','dispKinWrite') ?>" class="btn"><span><?php echo $__Context->lang->cmd_modify ?></span></a><?php } ?>
				<?php if($__Context->oDocument->getCommentCount()<1 && $__Context->oDocument->isGranted()){ ?><a href="#" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) doDeleteDocument('<?php echo $__Context->oDocument->document_srl ?>'); return false;" class="btn red"><span><?php echo $__Context->lang->cmd_delete ?></span></a><?php } ?>
			</p>
		</div><!-- //question -->
            <!-- border-round elements -->
            <span class="corn tl"></span><span class="corn tr"></span><span class="corn bl"></span><span class="corn br"></span>
        </div><!-- //corner01 -->
    </div><!-- //section -->
    <div class="section clearfix">
        <h2 class="sec_title answer_title"><?php echo $__Context->lang->answers ?> (<?php echo $__Context->oDocument->getCommentCount() ?>)</h2>
        <div class="pull-right options">
            <label for="" class="answer_show"><?php echo $__Context->lang->show ?> : </label>
			<select name="" id="a_select_target" class="right fe_sel">
				<option value="all" <?php if($__Context->a_target=='all'){ ?>selected<?php } ?>><?php echo $__Context->lang->all_answers ?></option>
				<option value="accepted" <?php if($__Context->a_target=='accepted'){ ?>selected<?php } ?>><?php echo $__Context->lang->accepted_answer ?></option>
				<option value="vote" <?php if($__Context->a_target=='vote'){ ?>selected<?php } ?>><?php echo $__Context->lang->rated_sort ?></option>
            </select>
        </div>
		<div class="corner03 clearfix">
			<?php if($__Context->answer_list&&count($__Context->answer_list))foreach($__Context->answer_list as $__Context->reply){ ?><div class="roundBox" id="comment_<?php echo $__Context->reply->comment_srl ?>">	
				<div<?php if($__Context->selected_reply != $__Context->reply->comment_srl){ ?> class="answer"<?php };
if($__Context->selected_reply == $__Context->reply->comment_srl){ ?> class="answer choose"<?php } ?>>
					<div class="pf_img">
						<?php  
							$__Context->oMemberModel = &getModel('member');
							$__Context->memberImage = $__Context->oMemberModel->getProfileImage($__Context->reply->get('member_srl'));
						 ?>
						<?php if($__Context->memberImage){ ?><img border="0" src="<?php echo $__Context->memberImage->src ?>" width="70" height="70"><?php } ?>
						<?php if(!$__Context->memberImage){ ?><img src="/modules/kin/skins/xe_kin_official/img/default_profile_pic90.png" width="70" height="70" alt=""><?php } ?>
					</div>
					<div class="pg">    
						<div class="kin_header">
							<div class="meta">
								<span class="author"><?php echo $__Context->reply->getNickName() ?></span>
								<span class="date"><?php echo $__Context->reply->getRegdate('Y.m.d') ?> <?php echo $__Context->reply->getRegdate('H:i') ?></span>
								<?php if(($__Context->oDocument->isGranted() && !$__Context->selected_reply) && $__Context->logged_info->user_id == $__Context->oDocument->get('user_id') && $__Context->oDocument->get('user_id') != $__Context->reply->user_id){ ?><a href="#" onclick="if(confirm('<?php echo $__Context->lang->msg_select_reply ?>')) doSelectReply('<?php echo $__Context->reply->comment_srl ?>'); return false;" class="btn_accepted"><?php echo $__Context->lang->cmd_select_reply ?></a><?php } ?>
							</div>
							<?php if($__Context->selected_reply == $__Context->reply->comment_srl){ ?><div class="accepted"><span><?php echo $__Context->lang->msg_selected_reply ?></span></div><?php } ?>
						</div><!-- //header -->
						<div class="pg_txt">
								<?php echo $__Context->reply->getContent(false) ?>
						</div>
						<?php if($__Context->reply->hasUploadedFiles()){ ?><div class="attach" >
							<h4 class="attach_title"><?php echo $__Context->lang->uploaded_file ?> (<?php echo $__Context->reply->get('uploaded_count') ?>)</h4>
							<ul class="files">
								 <?php  $__Context->uploaded_list = $__Context->reply->getUploadedFiles()  ?>
								<?php if($__Context->uploaded_list&&count($__Context->uploaded_list))foreach($__Context->uploaded_list as $__Context->key=>$__Context->file){ ?><li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> <span class="bubble">[File Size:<?php echo FileHandler::filesize($__Context->file->file_size) ?>/Download:<?php echo number_format($__Context->file->download_count) ?>]</span></a></li><?php } ?>
							</ul>
						</div><?php } ?>
					</div><!-- //pg -->
					<div<?php if($__Context->selected_reply != $__Context->reply->comment_srl){ ?> class="comments corner04"<?php };
if($__Context->selected_reply == $__Context->reply->comment_srl){ ?> class="comments corner02"<?php } ?>>
						<h5 class="cm_title"><a href="#replies_<?php echo $__Context->reply->comment_srl ?>" onclick="doGetComments(<?php echo $__Context->oDocument->document_srl ?>,<?php echo $__Context->reply->comment_srl ?>); return false;" id="replies_<?php echo $__Context->reply->comment_srl ?>" class="replies_link"><span><?php echo $__Context->lang->short_replies ?> (<?php echo number_format($__Context->replies_count[$__Context->reply->comment_srl]) ?>)</span></a></h5>
						<div id="replies_content_<?php echo $__Context->reply->comment_srl ?>" style="display:none;"></div>
						<!-- border-round elements -->
						<span class="corn tl"></span><span class="corn tr"></span><span class="corn bl"></span><span class="corn br"></span>        
					</div>
					<?php if(!$__Context->selected_reply && $__Context->reply->isGranted()){ ?>
					<div class="kin_buttonArea">
						<a href="<?php echo getUrl('act','dispKinModifyReply','comment_srl', $__Context->reply->comment_srl) ?>" class="btn"><span><?php echo $__Context->lang->cmd_modify ?></span></a>
						<a href="#" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) doDeleteReply('<?php echo $__Context->reply->comment_srl ?>'); return false;" class="btn"><span><?php echo $__Context->lang->cmd_delete ?></span></a>
					</div>
					<?php }elseif($__Context->logged_info->is_admin == 'Y' && $__Context->selected_reply != $__Context->reply->comment_srl){ ?>
					<div class="kin_buttonArea">
						<a href="#" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) doDeleteReply('<?php echo $__Context->reply->comment_srl ?>'); return false;" class="btn"><span><?php echo $__Context->lang->cmd_delete ?></span></a>
					</div>
					<?php } ?>
					<a class="btn_rate" href="#" data="<?php echo $__Context->oDocument->get('voted_count') ?>" onclick="voteAnswer(<?php echo $__Context->reply->comment_srl ?>); return false;"><span><i class="ico_rate_up"></i><strong id="c_voteno_<?php echo $__Context->reply->comment_srl ?>"><?php echo $__Context->reply->get('voted_count') ?></strong> person rated this as good</span></a>
				</div>
			</div><?php } ?>
			<!-- border-round elements -->
            <span class="corn tl"></span><span class="corn tr"></span><span class="corn bl"></span><span class="corn br"></span>
		</div>
		<?php if(!$__Context->answer_list){ ?><div class="no_answer">
			There is not a answer for this question
		</div><?php } ?>
    </div>
<script type="text/javascript">
	jQuery(function($){
		$('#a_select_target').change(function(){
			var url = "<?php echo getUrl('','document_srl', $__Context->oDocument->document_srl) ?>"+"?a_target="+$(this).val();
			url = url.replace(/&amp;/g,"&");
			window.location = url;
		});
	});
</script>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/kin/skins/xe_kin_official','footer.include.html') ?>