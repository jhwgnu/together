<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','header.html') ?>
    <div class="wikiRead">
        <div class="wkReadHeader">
			<div class="authorArea"></div>
		</div>
		<div class="wkReadBody">
			<div class="xe_content">
			<?php echo $__Context->oDocument->get('content') ?>
			<div class="command">
				<a class="btn" href="<?php echo getUrl('act','dispWikiEditPage','entry',$__Context->oDocument->get('title'), 'document_srl', '') ?>"><?php echo $__Context->lang->cmd_create ?></a>
			</div>
			</div>
		</div>
	</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','footer.html') ?>
