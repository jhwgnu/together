<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','header.html') ?>
<table cellspacing="0" border="1" summary="List of Articles" class="wkList">
    <thead>
        <tr>
            <th scope="col" class="title"><?php echo $__Context->lang->title ?></th>
            <th scope="col"><?php echo $__Context->lang->author ?></th>
            <th scope="col"><?php echo $__Context->lang->date ?></th>
        </tr>
    </thead>
    <tbody>
    <?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->val){ ?>
        <tr>
            <td class="title">
                <a href="<?php echo urldecode(getUrl('','mid',$__Context->mid,'entry',$__Context->val->get('alias'), 'document_srl', '')) ?>"><?php echo $__Context->val->getTitle() ?></a>
            </td>
            <td class="author"><a href="#" onclick="return false;" class="member_<?php echo $__Context->val->member_srl ?>"><?php echo $__Context->val->getNickName() ?></a></td>
            <td class="date"><?php echo $__Context->val->getRegdate("Y.m.d H:i") ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<form action="<?php echo getUrl() ?>" method="get" class="wkSearch wkSearchFooter" >
    <fieldset>
        <legend><?php echo $__Context->lang->wiki_search_title ?></legend>
        <input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
        <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
        <input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
        <input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
        <input type="hidden" name="search_target" value="title_content" />
        <select name="search_target">
            <?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key => $__Context->val){ ?>
            <option value="<?php echo $__Context->key ?>" <?php if($__Context->search_target==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
            <?php } ?>
        </select>
        <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" class="iText" title="<?php echo $__Context->lang->cmd_search ?>" />
        <?php if($__Context->last_division){ ?>
            <a href="<?php echo getUrl('page',1,'document_srl','','division',$__Context->last_division,'last_division','') ?>" class="btn"><?php echo $__Context->lang->cmd_search_next ?></a>
        <?php } ?>
        <button class="btn" type="submit"><?php echo $__Context->lang->cmd_search ?></button>
    </fieldset>
</form>
<div class="pagination">
    <a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="prevEnd">&lsaquo; <?php echo $__Context->lang->first_page ?></a> 
    <?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
        <?php if($__Context->page == $__Context->page_no){ ?>
            <strong><?php echo $__Context->page_no ?></strong> 
        <?php }else{ ?>
            <a href="<?php echo getUrl('page',$__Context->page_no,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>"><?php echo $__Context->page_no ?></a>
        <?php } ?>
    <?php } ?>
    <a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?> &rsaquo;</a>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','footer.html') ?>
