<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.header.html') ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.leftbox.html') ?>
<div class="resourceContent">
    <?php if($__Context->items){ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.itemlist.html') ?>
    <?php }elseif(!$__Context->package){ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.list.html') ?>
    <?php }else{ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.package.html') ?>
    <?php } ?>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.footer.html') ?>
