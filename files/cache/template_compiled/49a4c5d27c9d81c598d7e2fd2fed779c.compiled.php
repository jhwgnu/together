<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_header.html') ?>
<form action="./" method="post" onsubmit="return procFilter(this, window.insert)" class="board_write"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="content" value="<?php echo $__Context->oDocument->getContentText() ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
	<input type="hidden" name="allow_comment" value="Y" />
	<input type="hidden" name="allow_trackback" value="Y" />
	<?php if(!$__Context->is_logged){ ?><div class="write_author">
		<span class="name">
			<label for="userName"><i class="xi-user"></i></label>
			<input type="text" placeholder="<?php echo $__Context->lang->writer ?>" name="nick_name" id="userName" class="iText userName" value="<?php echo htmlspecialchars($__Context->oDocument->get('nick_name')) ?>" />
		</span>
		<span class="pass">
			<label for="userPw"><i class="xi-key"></i></label>
			<input type="password" placeholder="<?php echo $__Context->lang->password ?>" name="password" id="userPw" class="iText userPw" /><br>
		</span>
		<span class="home">
			<label for="homePage"><i class="xi-home"></i></label>
			<input type="text" placeholder="<?php echo $__Context->lang->homepage ?>" name="homepage" id="homePage" class="iText homePage" value="<?php echo htmlspecialchars($__Context->oDocument->get('homepage')) ?>" />
		</span>
	</div><?php } ?>
	<div class="write_header">
		<?php if(($__Context->module_info->default_style=='1line_memo' || $__Context->module_info->default_style=='guestbook') || (($__Context->module_info->default_style=='memo' || $__Context->module_info->default_style=='diary') && $__Context->module_info->no_title=='yes')){ ?>
		<span class="title">
			<?php if($__Context->oDocument->getTitleText()){ ?><input type="hidden" name="title" class="iText" title="<?php echo $__Context->lang->title ?>" value="<?php echo htmlspecialchars($__Context->oDocument->getTitleText()) ?>" /><?php } ?>
			<?php if(!$__Context->oDocument->getTitleText()){ ?><input type="hidden" name="title" class="iText" title="<?php echo $__Context->lang->title ?>" value="memo" /><?php } ?>
		</span>
		<?php }else{ ?>
		<p class="write_title">
			<?php if($__Context->module_info->use_category=='Y'){ ?><span class="category">
				<i class="xi-archive"></i>
				<?php if($__Context->module_info->use_category=='Y'){ ?><select name="category_srl">
					<option value=""><?php echo $__Context->lang->category ?></option>
					<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->val){ ?><option<?php if(!$__Context->val->grant){ ?> disabled="disabled"<?php } ?> value="<?php echo $__Context->val->category_srl ?>"<?php if($__Context->val->grant&&$__Context->val->selected||$__Context->val->category_srl==$__Context->oDocument->get('category_srl')){ ?> selected="selected"<?php } ?>>
						<?php echo str_repeat("&nbsp;&nbsp;",$__Context->val->depth) ?> <?php echo $__Context->val->title ?> (<?php echo $__Context->val->document_count ?>)
					</option><?php } ?>
				</select><?php } ?>
			</span><?php } ?>
			<span class="title">
				<i class="xi-pen"></i>
				<?php if($__Context->oDocument->getTitleText()){ ?><input placeholder="<?php echo $__Context->lang->title ?>" type="text" name="title" class="iText" title="<?php echo $__Context->lang->title ?>" value="<?php echo htmlspecialchars($__Context->oDocument->getTitleText()) ?>" /><?php } ?>
				<?php if(!$__Context->oDocument->getTitleText()){ ?><input placeholder="<?php echo $__Context->lang->title ?>" type="text" name="title" class="iText" title="<?php echo $__Context->lang->title ?>" /><?php } ?>
			</span>
		</p>
		<?php } ?>
		<p class="write_check">
			<?php if($__Context->grant->manager){ ?><input type="checkbox" name="is_notice" value="Y" class="iCheck"<?php if($__Context->oDocument->isNotice()){ ?> checked="checked"<?php } ?> id="is_notice" /><?php } ?>
			<?php if($__Context->grant->manager){ ?><label for="is_notice"><?php echo $__Context->lang->notice ?></label><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><input type="checkbox" name="is_secret" class="iCheck" value="Y"<?php if($__Context->oDocument->isSecret()){ ?> checked="checked"<?php } ?> id="is_secret" /><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><label for="is_secret"><?php echo $__Context->lang->secret ?></label><?php } ?>
            <input type="checkbox" name="comment_status" class="iCheck" value="ALLOW"<?php if($__Context->oDocument->allowComment()){ ?> checked="checked"<?php } ?> id="comment_status" />
            <label for="comment_status"><?php echo $__Context->lang->allow_comment ?></label>
			<?php if($__Context->is_logged){ ?>
				<input type="checkbox" name="notify_message" class="iCheck" value="Y"<?php if($__Context->oDocument->useNotify()){ ?> checked="checked"<?php } ?> id="notify_message" />
				<label for="notify_message"><?php echo $__Context->lang->notify ?></label>
			<?php };
if($__Context->logged_info->is_admin){ ?>
			<input type="checkbox" name="title_bold" id="title_bold" value="Y"<?php if($__Context->oDocument->get('title_bold')=='Y'){ ?> checked="checked"<?php } ?> />
			<label for="title_bold"><?php echo $__Context->lang->title_bold ?></label>
			<label for="title_color"></label>
			<input placeholder="<?php echo $__Context->lang->title_color ?>" type="text" name="title_color" id="title_color" class="color-indicator"<?php if($__Context->oDocument->get('title_color')!='N'){ ?> value="<?php echo $__Context->oDocument->get('title_color') ?>"<?php } ?> /><?php } ?>
		</p>
	</div>
	<?php if(count($__Context->extra_keys)){ ?><div class="exForm">
		<script type="text/javascript">
			jQuery(function($) {
			$(".exForm input:button").attr("class", "board_btn");
			});
		</script>
		<?php if(count($__Context->extra_keys)){ ?><table border="1" cellspacing="0" summary="Extra Form">
			<caption><em>* : <?php echo $__Context->lang->is_required ?></em></caption>
			<thead>
				<tr>
					<th><i class="xi-cube"></i></th>
					<td><i class="xi-pen"></i></td>
				</tr>
			</thead>
			<tbody>
				<?php if($__Context->extra_keys&&count($__Context->extra_keys))foreach($__Context->extra_keys as $__Context->key=>$__Context->val){ ?><tr>
					<th scope="row"><?php if($__Context->val->is_required=='Y'){ ?><em>*</em><?php } ?> <?php echo $__Context->val->name ?></th>
					<td><?php echo $__Context->val->getFormHTML() ?></td>
				</tr><?php } ?>
			</tbody>
		</table><?php } ?>
	</div><?php } ?>
    <div class="write_editor">
		<?php echo $__Context->oDocument->getEditor() ?>
	</div>
	<?php if($__Context->module_info->default_style=='1line_memo' || $__Context->module_info->default_style=='guestbook' ||  $__Context->module_info->default_style=='link'){ ?>
	<?php }else{ ?>
	<p class="write_tag">
		<label for="tags" class="iLabel"><i class="xi-tags"></i></label>
		<input placeholder="<?php echo $__Context->lang->about_tag ?>" type="text" name="tags" id="tags" value="<?php echo htmlspecialchars($__Context->oDocument->get('tags')) ?>" class="iText" title="Tag" />
	</p>
	<?php } ?>
	<div class="btnArea">
		<a href="<?php echo getUrl('mid', $__Context->module_info->mid, act, '') ?>"><i class="xi-file-text xi-fw"></i></a>
		<?php if($__Context->is_logged){ ?><button class="board_btn" type="button" onclick="doDocumentSave(this);"><i class="xi-file-download xi-fw"></i></button><?php } ?>
		<?php if($__Context->is_logged){ ?><button class="board_btn" type="button" onclick="doDocumentLoad(this);"><i class="xi-file-upload xi-fw"></i></button><?php } ?>
		<button type="submit"><i class="xi-check xi-fw"></i></button>
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_footer.html') ?>
