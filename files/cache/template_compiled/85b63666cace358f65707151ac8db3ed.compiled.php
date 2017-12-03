<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/document/tpl/js/document_admin.js--><?php $__tmp=array('modules/document/tpl/js/document_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<h1 class="h1"><?php echo $__Context->oDocument->getTitleText() ?></h1>
<a href="#popup_menu_area" class="member_<?php echo $__Context->oDocument->get('member_srl') ?>"><?php echo $__Context->oDocument->get('nick_name') ?></a>
<?php echo $__Context->oDocument->getRegdate() ?>
<?php if($__Context->oDocument->isExtraVarsExists() && (!$__Context->oDocument->isSecret() || $__Context->oDocument->isGranted()) ){ ?>
<?php if($__Context->oDocument->getExtraVars()&&count($__Context->oDocument->getExtraVars()))foreach($__Context->oDocument->getExtraVars() as $__Context->key => $__Context->val){ ?>    
<?php echo $__Context->val->name ?>: <?php echo $__Context->val->getValueHtml() ?>
<?php } ?>
<?php } ?>    
<?php echo $__Context->oDocument->getContent(false, false) ?> 
<script>
//<![CDATA[
    jQuery(window).load(function() { window.print(); } );
//]]>
</script>
