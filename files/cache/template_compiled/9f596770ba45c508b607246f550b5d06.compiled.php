<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_header.html') ?>
<?php if($__Context->oSourceComment->isExists()){ ?><div class="board context_data">
	<h3 class="comment_header">
		<?php if($__Context->oSourceComment->homepage){ ?><a href="<?php echo $__Context->oSourceComment->homepage ?>"><?php echo $__Context->oSourceComment->getNickName() ?></a><?php } ?>
		<?php if(!$__Context->oSourceComment->homepage){ ?><span><?php echo $__Context->oSourceComment->getNickName() ?></span><?php } ?>
		<span class="time"><?php echo $__Context->oSourceComment->getRegdate('Y.m.d H:i') ?></span>
	</h3>
	<?php echo $__Context->oSourceComment->getContent(false) ?>
</div><?php } ?>
<!-- WRITE COMMENT -->
<div>
	<form action="./" method="post" onsubmit="return procFilter(this, insert_comment)" class="feedback write_comment"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<h3><i class="xi-paper-plane xi-fw"></i> <?php echo $__Context->lang->comment ?> <?php echo $__Context->lang->cmd_write ?></h3>
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->oComment->get('document_srl') ?>" />
		<input type="hidden" name="comment_srl" value="<?php echo $__Context->oComment->get('comment_srl') ?>" />
		<input type="hidden" name="parent_srl" value="<?php echo $__Context->oComment->get('parent_srl') ?>" />
		<input type="hidden" name="content" value="<?php echo htmlspecialchars($__Context->oComment->get('content')) ?>" />
      <?php echo $__Context->oComment->getEditor() ?>
		<div class="write_item">
		  <?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="text" name="nick_name" id="userName" placeholder="<?php echo $__Context->lang->writer ?>" class="iText userName" value="<?php echo htmlspecialchars($__Context->oComment->get('nick_name')) ?>" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="password" name="password" id="userPw" placeholder="<?php echo $__Context->lang->password ?>" class="iText userPw" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<input type="text" name="homepage" id="homePage" placeholder="<?php echo $__Context->lang->homepage ?>" class="iText homePage" value="<?php echo htmlspecialchars($__Context->oComment->get('homepage')) ?>" />
			</span><?php } ?>
			<?php if($__Context->is_logged){ ?><input type="checkbox" name="notify_message" value="Y"<?php if($__Context->oComment->get('notify_message')=='Y'){ ?> checked="checked"<?php } ?> id="notify_message" class="iCheck" /><?php } ?>
			<?php if($__Context->is_logged){ ?><label for="notify_message"><i class="xi-bell xi-fw"></i></label><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><input type="checkbox" name="is_secret" value="Y" id="is_secret"<?php if($__Context->oComment->get('is_secret')=='Y'){ ?> checked="checked"<?php } ?> class="iCheck" /><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><label for="is_secret"><i class="xi-lock xi-fw"></i></label><?php } ?>
			<button type="submit"><i class="xi-check xi-fw"></i></button>
		</div>
	</form>
</div>
<!-- /WRITE COMMENT -->
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_footer.html') ?>