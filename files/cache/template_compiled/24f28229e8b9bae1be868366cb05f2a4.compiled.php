<?php if(!defined("__XE__"))exit;?><div class="leftBox">
    <div class="categoryBox">
        <h3><a href="<?php echo getSiteUrl($__Context->site_module_info->domain,'','mid',$__Context->module_info->mid) ?>"><?php echo $__Context->lang->package_category ?></a> <span>(<?php echo number_format($__Context->package_categories[0]->count) ?>)</span></h3>
        <?php  $__Context->_pDepth = 0; ?>
        <ul class="category">
            <?php if($__Context->categories&&count($__Context->categories))foreach($__Context->categories as $__Context->key => $__Context->val){ ?>
            <?php if($__Context->_pDepth > $__Context->val->depth){ ?>
            <?php for($__Context->i=$__Context->val->depth; $__Context->i<$__Context->_pDepth; $__Context->i++){ ?>
        </ul>
        </li>
            <?php } ?>
            <?php  $__Context->_pDepth = $__Context->val->depth ?>
            <?php } ?>
            <li>
                <?php if($__Context->val->child_count){ ?>
                <a href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid', $__Context->module_info->mid, 'category_srl',$__Context->val->category_srl,'childs', implode(',',$__Context->val->childs)) ?>"<?php if($__Context->val->category_srl == $__Context->category_srl){ ?> class="selected"<?php } ?>><?php echo $__Context->val->text ?></a>
                <?php }else{ ?>
                <a href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid', $__Context->module_info->mid, 'category_srl',$__Context->val->category_srl) ?>"<?php if($__Context->val->category_srl == $__Context->category_srl){ ?> class="selected"<?php } ?>><?php echo $__Context->val->text ?></a>
                <?php } ?>
                <?php if($__Context->package_categories[$__Context->val->category_srl]){ ?>
                <span>(<?php echo $__Context->package_categories[$__Context->val->category_srl]->count ?>)</span>
                <?php } ?>
            <?php if($__Context->val->child_count){ ?>
            <?php $__Context->_pDepth++ ?>
        <ul class="category">
            <?php }else{ ?>
            </li>
            <?php } ?>
            <?php } ?>
            <?php for($__Context->i=0;$__Context->i<$__Context->_pDepth;$__Context->i++){ ?>
        </ul>
        <?php } ?>
        </li>
        </ul>
        <ul class="resourceManage">
            <li><a href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid,'act','dispResourcePackageList') ?>"><?php echo $__Context->lang->cmd_list_my_package ?></a></li>
            <?php if($__Context->grant->manager){ ?>
            <li><a href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid,'act','dispResourceManage') ?>"><?php echo $__Context->lang->cmd_manage_package ?></a></li>
            <?php } ?>
            <li class="insertPackage"><a href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid,'act','dispResourceInsertPackage') ?>"><?php echo $__Context->lang->cmd_insert_package ?></a></li>
            <?php if($__Context->grant->manager){ ?>
            <li><a href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid,'act','dispResourceAdminInsert') ?>"><?php echo $__Context->lang->cmd_setup ?></a></li>
            <?php } ?>
        </ul>
        <div class="searchBox">
            <form action="./" method="get" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
                <input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
                <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
                <input type="hidden" name="category_srl" value="<?php echo $__Context->category_srl ?>" />
                <input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" class="input" />
                <input type="image" src="/modules/resource/skins/xe_official/img/btn_search.gif" class="submit" />
            </form>
        </div>
    </div>
</div>
