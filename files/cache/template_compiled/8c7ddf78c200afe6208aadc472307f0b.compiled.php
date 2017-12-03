<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2009','_header.html') ?>
<?php if($__Context->oDocument->isExists() && $__Context->module_info->default_style != 'blog'){ ?>
<div class="viewDocument">
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2009','view_document.html') ?>
</div>
<?php } ?>
<?php if($__Context->module_info->default_style == 'webzine'){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2009','_style.webzine.html') ?>
<?php }elseif($__Context->module_info->default_style == 'gallery'){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2009','_style.gallery.html') ?>
<?php }elseif($__Context->module_info->default_style == 'forum'){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2009','_style.forum.html') ?>
<?php }else{ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2009','_style.list.html') ?>
<?php } ?>
<div class="boardNavigation">
    <div class="btnArea">
		<a class="btn" href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>"><?php echo $__Context->lang->cmd_write ?></a>
		<?php if($__Context->grant->manager){ ?>
		<a class="btn" href="<?php echo getUrl('','module','document','act','dispDocumentManageDocument') ?>" onclick="popopen(this.href,'manageDocument'); return false;"><?php echo $__Context->lang->cmd_manage_document ?></a>
		<?php } ?>
		<span class="etc">
			<?php if($__Context->module_info->default_style != 'blog'){ ?>
			<a class="btn" href="<?php echo getUrl('','mid',$__Context->mid,'page',$__Context->page,'document_srl','','listStyle',$__Context->listStyle) ?>"><?php echo $__Context->lang->cmd_list ?></a>
			<?php } ?>
		</span>
    </div>
    <div class="pagination">
        <a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a> 
        <?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
            <?php if($__Context->page == $__Context->page_no){ ?>
                <strong><?php echo $__Context->page_no ?></strong> 
            <?php }else{ ?>
                <a href="<?php echo getUrl('page',$__Context->page_no,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"><?php echo $__Context->page_no ?></a>
            <?php } ?>
        <?php } ?>
        <a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
    </div>
</div>
<?php if($__Context->grant->view && $__Context->module_info->default_style != 'blog'){ ?>
<form action="<?php echo getUrl() ?>" method="get" onsubmit="return procFilter(this, search)" id="fo_search" class="boardSearchForm" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
    <fieldset>
        <legend>Board Search</legend>
        <input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
        <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
        <input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
        <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" class="iText" title="<?php echo $__Context->lang->cmd_search ?>" />
        <select name="search_target">
            <?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key => $__Context->val){ ?>
            <option value="<?php echo $__Context->key ?>" <?php if($__Context->search_target==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
            <?php } ?>
        </select>
        <?php if($__Context->last_division){ ?>
        <a class="btn" href="<?php echo getUrl('page',1,'document_srl','','division',$__Context->last_division,'last_division','') ?>"><?php echo $__Context->lang->cmd_search_next ?></a>
        <?php } ?>
        <button class="btn" type="submit"><?php echo $__Context->lang->cmd_search ?></button>
		<ul class="infoEtc">
			<li class="contributors"><a href="<?php echo getUrl('','module','module','act','dispModuleSkinInfo','selected_module',$__Context->module_info->module, 'skin', $__Context->module_info->skin) ?>" onclick="popopen(this.href,'skinInfo'); return false;" title="Contributors"><span>Contributors</span></a></li>
			<li class="tag"><a href="<?php echo getUrl('act','dispBoardTagList') ?>" title="Tag List"><span>Tag List</span></a></li>
		</ul>
    </fieldset>
</form>
<?php } ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2009','_footer.html') ?>
