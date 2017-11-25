<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_header.html') ?>
<?php if($__Context->oDocument->isExists()){ ?><div class="board context_data">
	<h3 class="title"><?php echo $__Context->oDocument->getTitle() ?></h3>
	<p class="author"><?php echo $__Context->oDocument->getNickName() ?></p>
</div><?php } ?>
<form action="./" method="get" onsubmit="return procFilter(this, delete_document)" class="board context_message"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
	<h1><?php echo $__Context->lang->confirm_delete ?></h1>
	<button type="submit" class="board_btn" /><?php echo $__Context->lang->cmd_delete ?></button>
	<button type="button" onclick="history.back()" class="board_btn"><?php echo $__Context->lang->cmd_cancel ?></button>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/ena_board_set_mellow','_footer.html') ?>