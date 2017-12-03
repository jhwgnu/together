<?php if(!defined("__XE__"))exit;?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_guestbook','header.html') ?>
    
    <?php if(!$__Context->oDocument->isExists()){ ?>
        <div class="listWrite">
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_guestbook','write_form.html') ?>
        </div>
    <?php } ?>
    <?php if($__Context->grant->list){ ?>
        
        <?php if($__Context->notice_list){ ?>
            <?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no => $__Context->oDocument){ ?>
                <div class="viewDocument">
                <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_guestbook','view_document.html') ?>
                
                </div>
            <?php } ?>
        <?php } ?>
        
        <?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no => $__Context->oDocument){ ?>
            <div class="viewDocument">
            <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_guestbook','view_document.html') ?>
            
            </div>
        <?php } ?>
    <?php } ?>
    <div class="boardBottom">
    <!-- page navigation -->
        <div class="pagination a1">
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
    <!-- search -->
        <div class="boardSearch">
            <form action="<?php echo getUrl() ?>" method="get" onsubmit="return procFilter(this, search)" id="fo_search" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
                <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
                <input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
                <select name="search_target">
                    <?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key => $__Context->val){ ?>
                    <option value="<?php echo $__Context->key ?>" <?php if($__Context->search_target==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" class="iText"/>
                <?php if($__Context->last_division){ ?>
                <a class="btn" href="<?php echo getUrl('page',1,'document_srl','','division',$__Context->last_division,'last_division','') ?>"><?php echo $__Context->lang->cmd_search_next ?></a>
                <?php } ?>
                <input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_search ?>" />
                <a class="btn" href="<?php echo getUrl('','mid',$__Context->mid,'listStyle',$__Context->listStyle) ?>"><?php echo $__Context->lang->cmd_cancel ?></a>
            </form>
        </div>
    </div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_guestbook','footer.html') ?>
