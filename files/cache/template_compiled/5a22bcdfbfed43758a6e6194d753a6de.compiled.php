<?php if(!defined("__XE__"))exit;?>
<?php if($__Context->not_permitted){ ?>
<?php Context::addJsFile("modules/beluxe/ruleset/checkPassword.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="pid_ajax-form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="checkPassword" />
<?php if($__Context->is_modal){ ?><input type="hidden" name="is_modal" value="2" /><?php } ?>
<input type="hidden" name="success_return_url" value="<?php echo getUrl('is_modal',$__Context->is_modal?2:'') ?>" />
<input type="hidden" name="comment_srl" value="<?php echo $__Context->comment_srl ?>" />
<input type="hidden" name="act" value="procBoardVerificationPassword" />
	<div>
		<span class="scBtn black"><input type="password" name="password" placeholder="<?php echo $__Context->lang->password ?>" /></span>
		<span class="scBtn black"><input type="submit" value="<?php echo $__Context->lang->cmd_input ?>" /></span>
		<span class="scBtn"><a href="<?php echo getUrl('act',!$__Context->is_modal||($__Context->is_modal&&!$__Context->us_vmodal)?'':'dispBoardContentCommentList') ?>"<?php if($__Context->is_modal&&!$__Context->us_vmodal){ ?> data-modal-hide<?php } ?>><?php echo $__Context->lang->cmd_back ?></a></span>
	</div>
</form>
<?php }else{ ?>
<?php Context::addJsFile("modules/beluxe/ruleset/insertComment.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="pid_ajax-form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertComment" />
<?php if($__Context->is_modal){ ?><input type="hidden" name="is_modal" value="<?php echo $__Context->us_vmodal?2:1 ?>" /><?php } ?>
<?php if($__Context->is_modal&&$__Context->us_vmodal){ ?><input type="hidden" name="success_return_act" value="dispBoardContentCommentList" /><?php } ?>
<input type="hidden" name="module_srl" value="<?php echo $__Context->mi->module_srl ?>" />
<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
<input type="hidden" name="comment_srl" value="<?php echo $__Context->comment_srl ?>" />
<input type="hidden" name="act" value="procBoardInsertComment" />
<input type="hidden" name="cpage" value="<?php echo $__Context->cpage ?>" />
	<?php 
		$__Context->ds_nick = $__Context->ci['nick_name']->display == 'Y';
		$__Context->ds_user =	$__Context->ci['user_name']->display == 'Y';
	 ?>
	<div id="siWrt">
		<input type="hidden" name="parent_srl" value="<?php echo $__Context->oSourceComment->comment_srl ?>" />
		<input type="hidden" name="content" value="<?php echo $__Context->oComment->getContentText() ?>" />
		<?php if(!$__Context->is_modal&&!$__Context->is_cmt&&!$__Context->is_par&&$__Context->document_srl){ ?>
		<?php 
			$__Context->cmDoc = &getModel('document');
			$__Context->oSourceComment = $__Context->cmDoc->getDocument($__Context->document_srl, FALSE, FALSE);
			$__Context->is_par = $__Context->oSourceComment && $__Context->oSourceComment->isExists();
		 ?>
		<?php } ?>
		<?php if($__Context->is_par){ ?><div class="scCpar clearBar">
			<div class="author">
				<?php if(($__Context->mi->display_profile!='N'&&$__Context->mi->display_profile!='D')){ ?>
					<?php if($__Context->oSourceComment->getProfileImage()){ ?><img src="<?php echo $__Context->oSourceComment->getProfileImage() ?>" alt="Profile" class="profile" /><?php } ?>
					<?php if(!$__Context->oSourceComment->getProfileImage()){ ?><span class="profile"></span><?php } ?>
				<?php } ?>
				<h3>
					<?php 
						$__Context->mbsl = $__Context->oSourceComment->get('member_srl');
						$__Context->home = $__Context->oSourceComment->get('homepage');
						$__Context->nick = (!$__Context->mbsl||$__Context->ds_nick||!$__Context->ds_user)?$__Context->oSourceComment->getNickName():'';
						$__Context->nick .= ($__Context->mbsl&&$__Context->ds_user)?($__Context->nick?' (':'').$__Context->oSourceComment->getUserName().($__Context->nick?')':''):'';
					 ?>
					<?php if(!$__Context->mbsl && !$__Context->home){ ?><i><?php echo $__Context->nick ?></i><?php } ?>
					<?php if($__Context->mbsl){ ?><span class="scHLink member_<?php echo $__Context->mbsl ?>"><?php echo $__Context->nick ?></span><?php } ?>
					<?php if(!$__Context->mbsl && $__Context->home){ ?><i class="scHLink" data-href="<?php echo $__Context->home ?>"><?php echo $__Context->nick ?></i><?php } ?>
				</h3>
				<p class="time"><?php echo $__Context->oSourceComment->getRegdate('Y.m.d H:i') ?></p>
			</div>
			<div class="scPvCon clearBar">
				<?php echo preg_replace(array('!(<[A-Za-z]+\s+[^>]*)name\s*=\s*(\"|\')?([^>\"\']+)(\"|\')?!is','!<(iframe|embed|object)([^>]*)>(.*?)<\/(iframe|embed|object)>!is'), array('$1','<div class="message"><p>$1 $2</p></div>'), $__Context->oSourceComment->getContent(false)) ?>
			</div>
		</div><?php } ?>
		<?php 
			$__Context->t_dstus = explode(',', $__Context->mi->use_c_status);
			$__Context->status = $__Context->oComment->get('is_secret') == 'Y'?'SECRET':'PUBLIC';
		 ?>
		<?php if(count($__Context->t_dstus) === 1 && $__Context->t_dstus[0]){ ?><input type="hidden" name="status" value="<?php echo $__Context->t_dstus[0] ?>" /><?php } ?>
		<?php if($__Context->is_topic_vote || $__Context->is_logged || count($__Context->t_dstus) > 1 || $__Context->mi->use_anonymous=='S'){ ?><div class="scWul clearBar">
			<?php if($__Context->is_topic_vote){ ?>
				<label>
					<input type="radio" name="vote_point" value="1"<?php if($__Context->is_topic_vote!='disagree'){ ?> checked="checked"<?php } ?> />
					<span class="colBlue"><?php echo $__Context->lang->cmd_agree ?></span>
				</label>
				<label>
					<input type="radio" name="vote_point" value="-1"<?php if($__Context->is_topic_vote=='disagree'){ ?> checked="checked"<?php } ?> />
					<span class="colRed"><?php echo $__Context->lang->cmd_disagree ?></span>
				</label>
			<?php }else{ ?>
				<label class="wrtTxt">
					<em>WYSIWYG Editor</em>
				</label>
			<?php } ?>
			<div class="fr">
				<?php if($__Context->is_logged){ ?><label>
					<input type="checkbox" name="notify_message" value="Y"<?php if($__Context->oComment->useNotify()){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->notify ?>
				</label><?php } ?>
				<?php if($__Context->mi->use_anonymous=='S'){ ?><label>
					<input type="checkbox" name="anonymous" value="Y"<?php if(($__Context->oComment->get('member_srl')<0)&&(($__Context->oComment->get('nick_name').$__Context->oComment->get('user_name')) == 'anonymousanonymous')){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->anonymous ?>
				</label><?php } ?>
				<?php if(count($__Context->t_dstus) > 1){ ?><select name="status" style="margin-left:8px">
					<?php if($__Context->t_dstus&&count($__Context->t_dstus))foreach($__Context->t_dstus as $__Context->value){ ?><option value="<?php echo $__Context->value ?>"<?php if($__Context->status == $__Context->value){ ?> selected="selected"<?php } ?>><?php echo Context::getLang(strtolower($__Context->value)) ?></option><?php } ?>
				</select><?php } ?>
			</div>
		</div><?php } ?>
		<?php if(!$__Context->is_logged){ ?><div class="scWusr clearBar">
			<?php  $__Context->is_guestinfo = $__Context->mi->use_input_guest_info == 'N' ? $__Context->oThis->getIpaddress(1) : '' ?>
			<label class="scLaEt">
				<span>Name</span>
				<input type="text" name="nick_name" maxlength="80" value="<?php echo $__Context->is_guestinfo?$__Context->is_guestinfo:htmlspecialchars($__Context->oComment->get('nick_name')) ?>"<?php if($__Context->is_guestinfo){ ?> readonly="readonly"<?php } ?> />
			</label>
			<label class="scLaEt">
				<span>Pass</span>
				<input type="password" name="password" />
			</label>
			<?php if($__Context->mi->use_input_guest_info != 'N' && $__Context->mi->use_input_guest_info != 'S'){ ?>
				<label class="scLaEt">
					<span>Mail</span>
					<input type="email" name="email_address" maxlength="250" value="<?php echo htmlspecialchars($__Context->oComment->get('email_address')) ?>" />
				</label>
				<label class="scLaEt">
					<span>Home</span>
					<input type="url" name="homepage" maxlength="250" value="<?php echo htmlspecialchars($__Context->oComment->get('homepage')) ?>" />
				</label>
			<?php } ?>
		</div><?php } ?>
		<?php if($__Context->is_logged){ ?>
			<input type="hidden" name="nick_name" value="1" />
			<input type="hidden" name="password" value="1" />
		<?php } ?>
		<div class="editor"><?php echo $__Context->oComment->getEditor() ?></div>
		<div class="btnArea"<?php if($__Context->is_modal){ ?> style="margin-bottom:0"<?php } ?>>
			<span class="fl">
				<span class="scBtn blue"><button type="button" onclick="doDocumentPreview(this); return false;"><?php echo $__Context->lang->cmd_preview ?></button></span>
			</span>
			<?php if($__Context->is_modal!=='3'&&($__Context->is_modal||$__Context->is_cmt||$__Context->is_par)){ ?><span class="scBtn"><a href="<?php echo getUrl('act',!$__Context->is_modal||($__Context->is_modal&&!$__Context->us_vmodal)?'':'dispBoardContentCommentList') ?>"<?php if($__Context->is_modal&&!$__Context->us_vmodal){ ?> data-modal-hide<?php } ?>>
				<?php echo $__Context->is_modal&&!$__Context->us_vmodal?$__Context->lang->cmd_close:$__Context->lang->cmd_back ?>
			</a></span><?php } ?>
			<span class="scBtn black"><button type="submit" accesskey="s"><?php echo $__Context->lang->comment ?> <?php echo Context::getLang('cmd_'.($__Context->is_cmt?'update':'registration')) ?></button></span>
		</div>
	</div>
</form>
<?php } ?>