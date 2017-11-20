<?php if(!defined("__XE__"))exit;
if($__Context->is_modal){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','___setting.html');
} ?>
<?php if(!$__Context->is_modal){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','__header.html');
} ?>
<div id="siBody"<?php if($__Context->act=='dispBoardWriteComment'){ ?> style="background-color:transparent!important"<?php } ?>>
	<div class="scContent clearBar">
<?php  $__Context->not_permitted = $__Context->XE_VALIDATOR_ERROR == '-1380' ?>
<?php if($__Context->act=='dispBoardWriteComment'){ ?>
	<?php 
		$__Context->is_cmt = $__Context->oComment && $__Context->oComment->isExists();
		$__Context->is_par = !$__Context->is_cmt && $__Context->oSourceComment && $__Context->oSourceComment->isExists();
	 ?>
<?php }else{ ?>
	<?php  $__Context->is_doc = $__Context->oDocument && $__Context->oDocument->isExists() ?>
<?php } ?>
		<div <?php if($__Context->is_modal){ ?>id="__PID_MODAL_HEADER__" style="display:none"<?php }else{ ?>class="pid_modal-head" style="margin-bottom:10px!important"<?php } ?>>
			<div><?php echo $__Context->not_permitted?$__Context->lang->msg_input_password:($__Context->act=='dispBoardWriteComment'?($__Context->is_cmt?$__Context->lang->modify_comment:$__Context->lang->new_comment):($__Context->is_doc?$__Context->lang->modify_document:$__Context->lang->new_document)) ?></div>
		</div>
		<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div id="BELUXE_MESSAGE" class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>"<?php if($__Context->XE_VALIDATOR_ID){ ?> data-valid-id="<?php echo $__Context->XE_VALIDATOR_ID ?>"<?php } ?>>
			<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
		</div><?php } ?>
		<?php 
			$__Context->oTemplate = &TemplateHandler::getInstance();
			print $__Context->oTemplate->compile($__Context->tpl_path, '_tpl.'.($__Context->act=='dispBoardWriteComment'?'c.insert':'insert').'.html');
		 ?>
	</div>
</div>
<?php if(!$__Context->is_modal){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','__footer.html');
} ?>
