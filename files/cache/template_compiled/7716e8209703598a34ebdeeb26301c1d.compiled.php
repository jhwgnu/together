<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/guestbook/skins/xe_guestbook_official','_header.html') ?>
<div id="search">
	<form action="./" method="get" id="fo_search" class="search_box" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
	<?php if($__Context->vid){ ?><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><?php } ?>
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="category" value="<?php echo htmlspecialchars($__Context->category) ?>" />
	<input id="searchkey" type="text"  name="search_keyword" value="<?php echo $__Context->search_keyword ?>" class="inputText" accesskey="S" title="<?php echo $__Context->lang->cmd_search ?>">
		<button type="submit" class="btn_search"><?php echo $__Context->lang->cmd_search ?></button>
	</form>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/guestbook/skins/xe_guestbook_official/guestbook/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php if($__Context->grant->write && !$__Context->modify && !$__Context->reply){ ?><div class="replyForm">
	<?php Context::addJsFile("modules/guestbook/ruleset/insertGuestbookitem.xml", FALSE, "", 0, "body", TRUE, "") ?><form method="post" action="./"  id="fo_guestbookitem_insert"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertGuestbookitem" />
		<input type="hidden" name="act" value="procGuestbookInsertGuestbookItem" />
		<input name="mid" type="hidden" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/guestbook/skins/xe_guestbook_official/guestbook/1" />
		
		<div class='guestbook_form'>
			<label for="edit-message">Message: <span title="This field is required." class="form-required">*</span></label>
			<fieldset>
				<textarea class="inputTextarea" name="content" rows="5" cols="50"></textarea>
		    </fieldset>
			<?php if($__Context->is_logged){ ?>
				<input name="member_srl" type="hidden" value="<?php echo $__Context->logged_info->member_srl ?>" />
				<span class="member_<?php echo $__Context->logged_info->member_srl ?> gb_name"><strong class="name"><?php echo $__Context->logged_info->nick_name ?></strong></span> <span class="email"><?php echo $__Context->logged_info->email_address ?></span> <span class="url"><?php echo $__Context->logged_info->homepage ?></span>
				<div class="input_submit">
					<input name="submit" type="submit" value="Submit" class="inputSubmit" />
				</div>
			<?php }else{ ?>
				<input name="user_name" type="text" class="inputText name" value="Username" title="Username"/>
				<input name="email_address" type="text" class="inputText name" value="Email" title="Email"/>
				<input name="password" type="password" class="inputText pw" value="Password" title="Password" />
				<div class="input_submit2">
					<input name="submit" type="submit" value="submit" class="inputSubmit2" />
				</div>
			<?php } ?>
		</div>
	</form>
</div><?php } ?>
<div class="feedback reply">
	<?php if($__Context->guestbook_list){ ?><ol class="feedbackOrder">
		<?php if($__Context->guestbook_list&&count($__Context->guestbook_list))foreach($__Context->guestbook_list as $__Context->key=>$__Context->val){ ?>
			<?php if($__Context->modify == $__Context->val->guestbook_item_srl){ ?><li id="guestbook_<?php echo $__Context->val->guestbook_item_srl ?>" class="item replyForm">
				<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/guestbook/skins/xe_guestbook_official/guestbook/2'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
					<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
				</div><?php } ?>
				<?php Context::addJsFile("modules/guestbook/ruleset/insertGuestbookitem.xml", FALSE, "", 0, "body", TRUE, "") ?><form method="post"  action="./" id="fo_guestbookitem_modify"><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertGuestbookitem" />
					<input type="hidden" name="act" value="procGuestbookInsertGuestbookItem" />
					<input name="mid" type="hidden" value="<?php echo $__Context->mid ?>" />
					<input type="hidden" name="guestbook_item_srl" value="<?php echo $__Context->val->guestbook_item_srl ?>" />
					<input type="hidden" name="xe_validator_id" value="modules/guestbook/skins/xe_guestbook_official/guestbook/2" />
					<input type="hidden" name="error_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>#guestbook_<?php echo $__Context->val->guestbook_item_srl ?>" />
					<fieldset>
						<textarea class="inputTextarea" name="content" rows="5" cols="50"><?php  $__Context->guestbook_content = strip_tags($__Context->val->content);
echo $__Context->guestbook_content ?></textarea>
					</fieldset>
					<?php if($__Context->is_logged){ ?>
						<input name="member_srl" type="hidden" value="<?php echo $__Context->logged_info->member_srl ?>" />
						<span class="member_<?php echo $__Context->logged_info->member_srl ?>"><strong class="name"><?php echo $__Context->logged_info->nick_name ?></strong></span> <span class="email"><?php echo $__Context->logged_info->email_address ?></span> <span class="url"><?php echo $__Context->logged_info->homepage ?></span>
						<div class="input_submit2">
							<input name="submit" type="submit" value="Modify" class="inputSubmit2" />
						</div>
					<?php } ?>
					<?php if(!($__Context->is_logged)){ ?>
						<input name="user_name" type="text" class="inputText name" value="<?php echo $__Context->val->user_name ? $__Context->val->user_name : 'Username' ?>" title="Username"/>
						<input name="email_address" type="text" class="inputText name" value="<?php echo $__Context->val->user_name ? $__Context->val->email_address : 'Email' ?>" title="Email"/>
						<input name="password" type="password" class="inputText pw" value="Password" title="Password" />
						<div class="input_submit2">
							<input name="submit" type="submit" value="Modify" class="inputSubmit2" />
							<input name="submit" type="button" value="Cancel" class="inputSubmit2" onclick="document.location.href=current_url.setQuery('modify', '')" />
						</div>
					<?php } ?>
				</form>							
			</li><?php } ?>
			<?php if($__Context->modify != $__Context->val->guestbook_item_srl){ ?><li<?php if($__Context->val->parent_srl <= 0){ ?> class="item"<?php };
if($__Context->val->parent_srl>0){ ?> class="item indent indent1"<?php } ?>>
				<?php  
					$__Context->oMemberModel = &getModel('member');
					$__Context->memberConfig = $__Context->oMemberModel->getMemberConfig();
				 ?>
				<div class="item2">
					<?php if($__Context->memberConfig->profile_image == 'Y'){ ?><div class="img">
						<?php  $__Context->memberImage = $__Context->oMemberModel->getProfileImage($__Context->val->member_srl); ?>
						<?php if($__Context->memberImage){ ?><img border="0" src="<?php echo $__Context->memberImage->src ?>" width="69" height="68"><?php } ?>
						<?php if(!($__Context->memberImage)){ ?><img border="0" src="/modules/guestbook/skins/xe_guestbook_official/img/default_member.gif" width="69" height="68"><?php } ?>
					</div><?php } ?>
					<div class="meta">
						<h4 class="author">
							<?php if($__Context->val->homepage){ ?><a href="<?php echo $__Context->val->homepage ?>" onclick="window.open(this.href);return false;" class="member_<?php echo $__Context->val->member_srl ?>"><?php echo $__Context->val->nick_name ?></a><?php } ?>
							<?php if(!$__Context->val->homepage){ ?><a href="#popup_menu_area" class="member_<?php echo $__Context->val->member_srl ?>">
								<?php if($__Context->val->nick_name){;
echo $__Context->val->nick_name;
} ?>
								<?php if(!$__Context->val->nick_name){;
echo $__Context->val->email_address;
} ?>
							</a><?php } ?>
						</h4>
						<?php if($__Context->grant->manager){ ?><span class="ip">(<?php echo $__Context->val->ipaddress ?>)</span><?php } ?>
						<span class="date"><?php echo zdate($__Context->val->regdate,'Y.m.d') ?> <span class="hhmm"><?php echo zdate($__Context->val->regdate,'H:i') ?></span></span>
						<ul class="reAction" id="<?php echo $__Context->val->guestbook_item_srl ?>_re">
							<li>
								<?php if($__Context->val->parent_srl==0 && $__Context->grant->write_reply){ ?><a href="<?php echo getUrl('modify','','reply',$__Context->val->guestbook_item_srl) ?>#guestbook_<?php echo $__Context->val->guestbook_item_srl ?>"><?php echo $__Context->lang->cmd_reply ?></a><?php } ?>
								<?php if($__Context->val->member_srl == 0 || $__Context->grant->manager || ($__Context->val->member_srl && $__Context->logged_info->member_srl == $__Context->val->member_srl)){ ?><a href="<?php echo getUrl('reply','','modify',$__Context->val->guestbook_item_srl) ?>#guestbook_<?php echo $__Context->val->guestbook_item_srl ?>"><?php echo $__Context->lang->cmd_modify ?></a><?php } ?>
								<?php if($__Context->grant->manager || $__Context->logged_info->member_srl == $__Context->val->member_srl || $__Context->val->member_srl === '0'){ ?>
								<?php if($__Context->val->member_srl !== '0' || $__Context->grant->manager){ ?>
								<a onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) deleteGuestbookItem(<?php echo $__Context->val->guestbook_item_srl ?>);"><?php echo $__Context->lang->cmd_delete ?></a>
								<?php }else{ ?>
								<span>
									<span style="display:none" class="input_password">
										* 암호를 입력하세요 : <input name="password" type="password" class="inputText name" />
										<a onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) deleteGuestbookItem(<?php echo $__Context->val->guestbook_item_srl ?>,jQuery(this).prev().val());"><?php echo $__Context->lang->cmd_delete ?></a>
									</span>
									<a onclick="jQuery(this).css('display','none').prev().css('display','');"><?php echo $__Context->lang->cmd_delete ?></a>
								</span>
								<?php } ?>
								<?php } ?>
							</li>
						</ul>
						<script>
							jQuery(function($){
								var ul_id = '#<?php echo $__Context->val->guestbook_item_srl ?>_re';
								$(ul_id).find('li').last().attr('class', 'last');
							});
						</script>
					</div>
					<div class="data">
						<?php echo $__Context->val->content ?>
					</div>
				</div>
			</li><?php } ?>
			<?php if($__Context->reply == $__Context->val->guestbook_item_srl && $__Context->grant->write_reply){ ?><li id="guestbook_<?php echo $__Context->val->guestbook_item_srl ?>" class="item replyForm">
				<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/guestbook/skins/xe_guestbook_official/guestbook/3'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
					<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
				</div><?php } ?>
				<?php Context::addJsFile("modules/guestbook/ruleset/insertGuestbookitem.xml", FALSE, "", 0, "body", TRUE, "") ?><form method="post"   action="./"  id="fo_guestbookitem_reply"><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertGuestbookitem" />
					<input type="hidden" name="act" value="procGuestbookInsertGuestbookItem" />
					<input name="mid" type="hidden" value="<?php echo $__Context->mid ?>" />
					<input type="hidden" name="parent_srl" value="<?php echo $__Context->val->guestbook_item_srl ?>" />
					<input type="hidden" name="xe_validator_id" value="modules/guestbook/skins/xe_guestbook_official/guestbook/3" />
					<input type="hidden" name="error_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>#guestbook_<?php echo $__Context->val->guestbook_item_srl ?>" />
					<fieldset>
						<textarea class="inputTextarea" name="content" rows="5" cols="50"></textarea>
					</fieldset>
					<?php if($__Context->is_logged){ ?>
						<input name="member_srl" type="hidden" value="<?php echo $__Context->logged_info->member_srl ?>" />
						<span class="member_<?php echo $__Context->logged_info->member_srl ?> gb_name"><strong class="name"><?php echo $__Context->logged_info->nick_name ?></strong></span> <span class="email"><?php echo $__Context->logged_info->email_address ?></span> <span class="url"><?php echo $__Context->logged_info->homepage ?></span>
						<div class="input_submit">
							<input name="submit" type="submit" value="Reply" class="inputSubmit" />
						</div>
					<?php } ?>
					<?php if(!($__Context->is_logged)){ ?>
						<input name="user_name" type="text" class="inputText name" value="Username" title="Username"/>
						<input name="email_address" type="text" class="inputText name" value="Email" title="Email"/>
						<input name="password" type="password" class="inputText pw" value="Password" title="Password" />
						<div class="input_submit2">
							<input name="submit" type="submit" value="Reply" class="inputSubmit2" />
							<input name="submit" type="button" value="Cancel" class="inputSubmit2" onclick="document.location.href=current_url.setQuery('reply', '')" />
						</div>
					<?php } ?>
				</form>
			</li><?php } ?>
		<?php } ?>
	</ol><?php } ?>
</div>
<?php if($__Context->page_navigation){ ?><div class="pagination">
	<a href="<?php echo getUrl('page','','guestbook_item_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a> 
	 
	<?php while($__Context->page_no=$__Context->page_navigation->getNextPage()){ ?>
		<?php if($__Context->page == $__Context->page_no){ ?><strong><?php echo $__Context->page_no ?></strong><?php } ?> 
		<?php if($__Context->page != $__Context->page_no){ ?><a href="<?php echo getUrl('page',$__Context->page_no,'question_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"><?php echo $__Context->page_no ?></a><?php } ?>
	<?php } ?>
	
	<a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'question_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
</div><?php } ?>
<script>
jQuery(function(){
		jQuery('input:text,input:password')
		.focus(function(e){
			var jthis = jQuery(this);
			if(jthis.attr('title') && jthis.val()== jthis.attr('title')) jthis.val('');
			}).blur(function(e){
				var jthis = jQuery(this);
				if(jthis.attr('title') && !jthis.val()) jthis.val(jthis.attr('title'));	
				});
		});
</script>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/guestbook/skins/xe_guestbook_official','_footer.html') ?>
