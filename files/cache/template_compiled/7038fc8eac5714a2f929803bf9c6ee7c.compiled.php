<?php if(!defined("__XE__"))exit;?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2007','header.html') ?>
    <?php if($__Context->oDocument->isExists() && $__Context->module_info->default_style != 'blog'){ ?>
    <div class="viewDocument">
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2007','view_document.html') ?>
    </div>
    <?php } ?>
    <?php if($__Context->module_info->default_style == 'webzine'){ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2007','style.webzine.html') ?>
    <?php }elseif($__Context->module_info->default_style == 'gallery'){ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2007','style.gallery.html') ?>
    <?php }elseif($__Context->module_info->default_style == 'forum'){ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2007','style.forum.html') ?>
    <?php }elseif($__Context->module_info->default_style == 'blog'){ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2007','style.blog.html') ?>
    <?php }else{ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2007','style.list.html') ?>
    <?php } ?>
    <div class="boardBottom">
    <!-- write document, list button -->
        <div class="btnArea">
			<a class="btn" href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>"><?php echo $__Context->lang->cmd_write ?></a>
			<span class="etc">
				<?php if($__Context->grant->manager){ ?>
				<a class="btn" href="<?php echo getUrl('','module','document','act','dispDocumentManageDocument') ?>" onclick="popopen(this.href,'manageDocument'); return false;"><?php echo $__Context->lang->cmd_manage_document ?></a>
				<?php } ?>
				<?php if($__Context->module_info->default_style != 'blog'){ ?>
				<a class="btn" href="<?php echo getUrl('','mid',$__Context->mid,'page',$__Context->page,'document_srl','','listStyle',$__Context->listStyle) ?>"><?php echo $__Context->lang->cmd_list ?></a>
				<?php } ?>
			</span>
        </div>
    <!-- page navigation -->
        <div class="pagination a1">
            <a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a> 
            <?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
                <?php if($__Context->page == $__Context->page_no){ ?>
                    <strong><?php echo $__Context->page_no ?></strong> 
                <?php }else{ ?>
                    <a href="<?php echo getUrl('page',$__Context->page_no,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>"><?php echo $__Context->page_no ?></a>
                <?php } ?>
            <?php } ?>
            <a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
        </div>
    <!-- search -->
        <?php if($__Context->grant->view && $__Context->module_info->default_style != 'blog'){ ?>
        <div class="boardSearch">
            <form action="<?php echo getUrl() ?>" method="get" onsubmit="return procFilter(this, search)" id="fo_search" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
                <?php if($__Context->vid){ ?>
                <input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
                <?php } ?>
                <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
                <input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
                <select name="search_target">
                    <?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key => $__Context->val){ ?>
                    <option value="<?php echo $__Context->key ?>" <?php if($__Context->search_target==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" class="iText"/>
                <?php if($__Context->last_division){ ?>
                <a class="btn" href="<?php echo getUrl('page',1,'document_srl','','division',$__Context->last_division,'last_division','','entry','') ?>"><?php echo $__Context->lang->cmd_search_next ?></a>
                <?php } ?>
                <input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_search ?>" />
                <a class="btn" href="<?php echo getUrl('','mid',$__Context->mid,'listStyle',$__Context->listStyle) ?>"><?php echo $__Context->lang->cmd_cancel ?></a>
            </form>
        </div>
        <?php } ?>
    </div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_2007','footer.html') ?>
