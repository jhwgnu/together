<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.header.html') ?>
<div class="list">
    <h3><?php echo $__Context->lang->cmd_manage_package ?></h3>
    <p class="information">
        <?php echo $__Context->lang->about_manage_package ?>
        <form action="./" method="get" class="statusSelect"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
            <input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
            <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
            <input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
            <input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
            <select name="category_srl" onchange="location.href=location.href.setQuery('category_srl',this.options[this.selectedIndex].value);return false;">
                <option value=""><?php echo $__Context->lang->package_category ?></option>
            <?php  $__Context->_curDepth = 0;  ?>
            <?php if($__Context->categories&&count($__Context->categories))foreach($__Context->categories as $__Context->key => $__Context->val){ ?>
                <?php if($__Context->val->depth<$__Context->_curDepth){ ?>
                </optgroup>
                <?php } ?>
                <?php if($__Context->val->depth<1){ ?>
                <?php if($__Context->val->child_count>0){ ?>
                <optgroup label="<?php echo $__Context->val->title ?>">
                <?php }else{ ?>
                <option value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->category_srl == $__Context->val->category_srl){ ?>selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option>
                <?php } ?>
                <?php } ?>
                <?php if($__Context->val->depth>0){ ?>
                    <option value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->category_srl == $__Context->val->category_srl){ ?>selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option>
                <?php } ?>
                <?php  $__Context->_curDepth = $__Context->val->depth ?>
            <?php } ?>
            <?php for($__Context->i=0;$__Context->i<$__Context->_curDepth;$__Context->i++){ ?></optgroup><?php } ?>
            </select>
            <select name="status" onchange="location.href=location.href.setQuery('status',this.options[this.selectedIndex].value);return false;">
                <option value="" <?php if(!$__Context->status){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->package_status ?></option>
                <option value="waiting" <?php if($__Context->status=='waiting'){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->package_waiting ?></option>
                <option value="accepted" <?php if($__Context->status=='accepted'){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->package_accepted ?></option>
                <option value="reservation" <?php if($__Context->status=='reservation'){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->package_reservation ?></option>
            </select>
        </form>
    </p>
    <?php if($__Context->package_list&&count($__Context->package_list))foreach($__Context->package_list as $__Context->key => $__Context->val){ ?>
    <table width="100%" cellspacing="0" cellpadding="0" class="view_type1">
    <colgroup>
    <col width="100" /><col /><col width="100" /><col /><col width="100" /><col />
    </colgroup>
    <tr>
        <th scope="row"><?php echo $__Context->lang->package_title ?></th>
        <td><?php echo $__Context->val->title ?></td>
        <th scope="row"><?php echo $__Context->lang->package_category ?></th>
        <td><?php echo $__Context->categories[$__Context->val->category_srl]->title ?></td>
        <th scope="row"><?php echo $__Context->lang->regdate ?></th>
        <td class="date"><?php echo zdate($__Context->val->regdate, "Y-m-d H:i") ?></td>
    </tr>
    <tr>
        <?php if($__Context->module_info->resource_use_path=='Y'){ ?>
        <th scope="row"><?php echo $__Context->lang->package_path ?></th>
        <td colspan="3"><?php echo $__Context->val->path ?></td>
        <td colspan="2" class="left"><?php if($__Context->val->homepage){ ?><a href="<?php echo $__Context->val->homepage ?>"><?php echo $__Context->val->homepage ?></a><?php }else{ ?>&nbsp;<?php } ?></td>
        <?php }else{ ?>
        <th scope="row"><?php echo $__Context->lang->homepage ?></th>
        <td colspan="5" class="left"><?php if($__Context->val->homepage){ ?><a href="<?php echo $__Context->val->homepage ?>"><?php echo $__Context->val->homepage ?></a><?php }else{ ?>&nbsp;<?php } ?></td>
        <?php } ?>
    </tr>
    <tr>
        <th scope="row"><?php echo $__Context->lang->package_description ?></th>
        <td colspan="3"><?php echo nl2br($__Context->val->description) ?></td>
        <td colspan="2" class="left"><a href="#" class="member_<?php echo $__Context->val->member_srl ?>" onclick="return false;"><?php echo $__Context->val->nick_name ?></a></td>
    </tr>
    <tr>
        <td scope="row" colspan="6">
            <form action="./" method="get" onsubmit="return procFilter(this,change_status);" style="text-align:right"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
                <input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
                <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
                <input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
                <input type="hidden" name="package_srl" value="<?php echo $__Context->val->package_srl ?>" />
                <select name="status" style="height:26px">
                    <option value="waiting" <?php if($__Context->val->status=='waiting'){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->package_waiting ?></option>
                    <option value="accepted" <?php if($__Context->val->status=='accepted'){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->package_accepted ?></option>
                    <option value="reservation" <?php if($__Context->val->status=='reservation'){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->package_reservation ?></option>
                </select>
                <input type="submit" value="<?php echo $__Context->lang->cmd_apply ?>" class="btn btn-inverse" />
                <input type="button" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) doDeletePackage(<?php echo $__Context->val->package_srl ?>)" value="<?php echo $__Context->lang->cmd_delete ?>" class="btn" />
            </form>
        </th>
    </table>
    <?php } ?>
    <div class="btnArea">
        <a href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid) ?>" class="btn" style="float:left"><?php echo $__Context->lang->cmd_back ?></a>
    </div>
    <div class="pagination">
        <a href="<?php echo getUrl('page','') ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a> 
        <?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
            <?php if($__Context->page == $__Context->page_no){ ?>
                <strong><?php echo $__Context->page_no ?></strong> 
            <?php }else{ ?>
                <a href="<?php echo getUrl('page',$__Context->page_no) ?>"><?php echo $__Context->page_no ?></a>
            <?php } ?>
        <?php } ?>
        <a href="<?php echo getUrl('page',$__Context->page_navigation->last_page) ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
    </div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.footer.html') ?>
