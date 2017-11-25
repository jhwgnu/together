<?php if(!defined("__XE__"))exit;?>
<?php if($__Context->not_permitted){ ?>
<?php Context::addJsFile("modules/beluxe/ruleset/checkPassword.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="pid_ajax-form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="checkPassword" />
<?php if($__Context->is_modal){ ?><input type="hidden" name="is_modal" value="2" /><?php } ?>
<input type="hidden" name="success_return_url" value="<?php echo getUrl('is_modal',$__Context->is_modal?2:'') ?>" />
<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
<input type="hidden" name="act" value="procBoardVerificationPassword" />
	<div>
		<span class="scBtn black"><input type="password" name="password" placeholder="<?php echo $__Context->lang->password ?>" /></span>
		<span class="scBtn black"><input type="submit" value="<?php echo $__Context->lang->cmd_input ?>" /></span>
		<span class="scBtn"><a href="<?php echo getUrl('act','') ?>"<?php if($__Context->is_modal&&!$__Context->us_vmodal){ ?> data-modal-hide<?php } ?>><?php echo $__Context->lang->cmd_back ?></a></span>
	</div>
</form>
<?php }else{ ?>
<?php Context::addJsFile("modules/beluxe/ruleset/deleteDocument.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="pid_ajax-form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="deleteDocument" />
<?php if($__Context->is_modal){ ?><input type="hidden" name="success_return_url" value="<?php echo getUrl('','mid',$__Context->mid,'category_srl',$__Context->category_srl,'is_modal','1') ?>" /><?php } ?>
<?php if($__Context->is_modal){ ?><input type="hidden" name="is_modal" value="<?php echo $__Context->us_vmodal?2:1 ?>" /><?php } ?>
<input type="hidden" name="module_srl" value="<?php echo $__Context->mi->module_srl ?>" />
<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
<input type="hidden" name="act" value="procBoardDeleteDocument" />
	<?php 
		$__Context->ds_nick = $__Context->ci['nick_name']->display == 'Y';
		$__Context->ds_user =	$__Context->ci['user_name']->display == 'Y';
		$__Context->un_extra = $__Context->ds_mtlng?$__Context->oDocument->get('extra_vars'):null;
		$__Context->un_extra = is_string($__Context->un_extra)?unserialize($__Context->un_extra):$__Context->un_extra;
	 ?>
	<input type="hidden" name="category_srl" value="<?php echo $__Context->category_srl ?>" />
	<div id="siWrt">
		<div class="scCpar clearBar">
			<div class="author">
				<?php if(($__Context->mi->display_profile!='N'&&$__Context->mi->display_profile!='D')){ ?>
					<?php if($__Context->oDocument->getProfileImage()){ ?><img src="<?php echo $__Context->oDocument->getProfileImage() ?>" alt="Profile" class="profile" /><?php } ?>
					<?php if(!$__Context->oDocument->getProfileImage()){ ?><span class="profile"></span><?php } ?>
				<?php } ?>
				<h3>
					<?php 
						$__Context->mbsl = $__Context->oDocument->get('member_srl');
						$__Context->home = $__Context->oDocument->get('homepage');
						$__Context->nick = (!$__Context->mbsl||$__Context->ds_nick||!$__Context->ds_user)?$__Context->oDocument->getNickName():'';
						$__Context->nick .= ($__Context->mbsl&&$__Context->ds_user)?($__Context->nick?' (':'').$__Context->oDocument->getUserName().($__Context->nick?')':''):'';
					 ?>
					<?php if(!$__Context->mbsl && !$__Context->home){ ?><i><?php echo $__Context->nick ?></i><?php } ?>
					<?php if($__Context->mbsl){ ?><span class="scHLink member_<?php echo $__Context->mbsl ?>"><?php echo $__Context->nick ?></span><?php } ?>
					<?php if(!$__Context->mbsl && $__Context->home){ ?><i class="scHLink" data-href="<?php echo $__Context->home ?>"><?php echo $__Context->nick ?></i><?php } ?>
				</h3>
				<p class="time"><?php echo $__Context->oDocument->getRegdate('Y.m.d H:i') ?></p>
			</div>
			<div class="scPvCon clearBar">
				<h4 style="margin-top:0"><?php echo $__Context->oDocument->getTitle() ?></h4>
				<?php echo preg_replace(array('!(<[A-Za-z]+\s+[^>]*)name\s*=\s*(\"|\')?([^>\"\']+)(\"|\')?!is','!<(iframe|embed|object)([^>]*)>(.*?)<\/(iframe|embed|object)>!is'), array('$1','<div class="message"><p>$1 $2</p></div>'), $__Context->oDocument->getContent(false)) ?>
			</div>
		</div>
		<div class="btnArea"<?php if($__Context->is_modal){ ?> style="margin-bottom:0"<?php } ?>>
			<span class="scBtn"><a href="<?php echo getUrl('act','') ?>"<?php if($__Context->is_modal&&!$__Context->us_vmodal){ ?> data-modal-hide<?php } ?>>
				<?php echo $__Context->is_modal&&!$__Context->us_vmodal?$__Context->lang->cmd_close:$__Context->lang->cmd_back ?>
			</a></span>
			<?php if($__Context->ds_mtlng&&count($__Context->un_extra->beluxe->langs)){ ?><span class="scBtn blue"><button type="submit" name="multilingual" value="Y"><?php echo $__Context->lang->cmd_current_lang_delete ?></button></span><?php } ?>
			<span class="scBtn black"><button type="submit" accesskey="s"><?php echo $__Context->lang->document ?> <?php echo $__Context->lang->cmd_delete ?></button></span>
		</div>
	</div>
</form>
<?php } ?>