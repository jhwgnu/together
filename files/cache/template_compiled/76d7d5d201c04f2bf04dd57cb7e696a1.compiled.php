<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default','___setting.html') ?>
<?php if($__Context->mi->header_text){ ?><div id="siMaHtxt" class="clearBar">
	<?php echo $__Context->mi->header_text ?>
</div><?php } ?>
<?php if($__Context->mi->title||$__Context->mi->sub_title){ ?><div id="siMaTitle" class="clearBar">
	<?php if($__Context->mi->title){ ?><h1 class="mai"><a href="<?php echo getUrl('','mid',$__Context->mid) ?>"><?php echo $__Context->mi->title ?></a></h1><?php } ?>
	<?php if($__Context->mi->sub_title){ ?><h4 class="sub"><?php echo $__Context->mi->sub_title ?></h4><?php } ?>
</div><?php } ?>
<?php if($__Context->mi->board_desc){ ?><div id="siMaDesc" class="clearBar">
	<?php echo $__Context->mi->board_desc ?>
</div><?php } ?>