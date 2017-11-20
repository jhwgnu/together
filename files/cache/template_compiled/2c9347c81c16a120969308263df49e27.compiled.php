<?php if(!defined("__XE__"))exit;
if($__Context->is_modal){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','___setting.html');
} ?>
<?php if(!$__Context->is_modal){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','__header.html');
} ?>
<div id="siBody">
	<?php if($__Context->mi->use_first_page==='Y' && $__Context->first_page){ ?><div class="clearBar">
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.firstpage.html') ?>
	</div><?php } ?>
	<?php if(!$__Context->is_modal&&($__Context->is_sedt=='T'||$__Context->is_sedt=='C')){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.simplewrite.html');
} ?>
	<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div id="BELUXE_MESSAGE" class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>"<?php if($__Context->XE_VALIDATOR_ID){ ?> data-valid-id="<?php echo $__Context->XE_VALIDATOR_ID ?>"<?php } ?>>
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php if($__Context->grant->manager || $__Context->is_sedt != 'C'){ ?>
		<?php if(!$__Context->is_modal&&$__Context->is_cts){ ?><div class="scHeader clearBar">
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.category.html') ?>
		</div><?php } ?>
		<div class="scContent clearBar">
<?php 
	$__Context->notice_list = !$__Context->is_doc&&($__Context->mi->notice_category!='Y'||!$__Context->is_cts||$__Context->category_srl)?$__Context->oThis->getNoticeList():array();
	$__Context->best_list = !$__Context->is_doc&&($__Context->mi->use_best=='Y'&&($__Context->mi->best_category!='Y'||!$__Context->is_cts||$__Context->category_srl))?$__Context->oThis->getBestList():array();
	$__Context->oTemplate = &TemplateHandler::getInstance();
 ?>
		<?php if($__Context->is_doc){ ?>
<?php echo $__Context->oTemplate->compile($__Context->tpl_path, '_viw.'.($__Context->oDocument->isNotice()?'list':$__Context->viwtp).'.html') ?>
		<?php } ?>
<?php if(!$__Context->is_doc||($__Context->is_doc&&$__Context->btm_lstcnt)){ ?>
		 <?php if($__Context->is_doc){ ?><a name="navigation"></a><?php } ?>
		<?php if(!$__Context->is_modal){ ?>
<?php  $__Context->btm_style = $__Context->is_doc&&$__Context->mi->bottom_list_style!='default'?$__Context->mi->bottom_list_style:'' ?>
<?php echo $__Context->oTemplate->compile($__Context->tpl_path, '_lst.'.($__Context->btm_style?$__Context->btm_style:$__Context->lsttp).'.html') ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.pagination.html') ?>
		 <?php } ?>
<?php } ?>
		</div>
		<?php if(!$__Context->is_modal){ ?><div class="scFooter clearBar">
			 <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.search.html') ?>
		</div><?php } ?>
	<?php } ?>
	<?php if($__Context->is_sedt == 'B'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','_etc.simplewrite.html');
} ?>
</div>
<?php if(!$__Context->is_modal){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','__footer.html');
} ?>