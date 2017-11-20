<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','header.html') ?>
<div class="treeList">
<?php  $__Context->_pDepth = 0; ?>
		<ul>
			<?php if($__Context->document_tree&&count($__Context->document_tree))foreach($__Context->document_tree as $__Context->key => $__Context->val){ ?>
			<?php if($__Context->_pDepth > $__Context->val->depth){ ?>
			<?php for($__Context->i=$__Context->val->depth; $__Context->i<$__Context->_pDepth; $__Context->i++){ ?>
		</ul>
		</li>
		<?php } ?>
		<?php  $__Context->_pDepth = $__Context->val->depth ?>
		<?php } ?>
		<li>
		<?php if($__Context->val->childs){ ?>
		<?php } ?>
            <a href="<?php echo getSiteUrl($__Context->site_module_info->domain, '','mid',$__Context->mid,'document_srl',$__Context->val->document_srl) ?>"><?php echo $__Context->val->title ?></a>
		<?php if($__Context->val->childs){ ?>
		<?php $__Context->_pDepth++ ?>
		<ul>
			<?php }else{ ?>
			</li>
			<?php } ?>
			<?php } ?>
			<?php for($__Context->i=0;$__Context->i<$__Context->_pDepth;$__Context->i++){ ?>
		</ul>
		<?php } ?>
		</li>
		</ul>
    <?php if($__Context->grant->write_document){ ?>
    <div class="treeUI">
        <a href="<?php echo getUrl('act','dispWikiModifyTree') ?>" class="btn"><?php echo $__Context->lang->cmd_modify ?></a>
        <button type="button" onclick="doRecompileTree()" class="btn"><?php echo $__Context->lang->cmd_remake_cache ?></button>
    </div>
    <?php } ?>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','footer.html') ?>
