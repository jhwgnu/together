<?php if(!defined("__XE__"))exit;?>    <ul class="listOrder <?php echo $__Context->order_type ?>">
        <?php if($__Context->order_target=='newest'){ ?>
            <?php if($__Context->order_type == 'desc'){;
$__Context->_order_type = 'asc';
}else{;
$__Context->_order_type = 'desc';
} ?>
        <?php }else{ ?>
            <?php $__Context->_order_type = 'desc' ?>
        <?php } ?>
        <li <?php if($__Context->order_target=='newest'){ ?>class="arrow"<?php } ?>><a href="<?php echo getUrl('order_target','newest','order_type',$__Context->_order_type) ?>"><?php echo $__Context->lang->order_newest ?></a></li>
        <?php if($__Context->order_target=='download'){ ?>
            <?php if($__Context->order_type == 'desc'){;
$__Context->_order_type = 'asc';
}else{;
$__Context->_order_type = 'desc';
} ?>
        <?php }else{ ?>
            <?php $__Context->_order_type = 'desc' ?>
        <?php } ?>
        <li <?php if($__Context->order_target=='download'){ ?>class="arrow"<?php } ?>><a href="<?php echo getUrl('order_target','download','order_type',$__Context->_order_type) ?>"><?php echo $__Context->lang->order_download ?></a></li>
        <?php if($__Context->order_target=='popular'){ ?>
            <?php if($__Context->order_type == 'desc'){;
$__Context->_order_type = 'asc';
}else{;
$__Context->_order_type = 'desc';
} ?>
        <?php }else{ ?>
            <?php $__Context->_order_type = 'desc' ?>
        <?php } ?>
        <li <?php if($__Context->order_target=='popular'){ ?>class="arrow"<?php } ?>><a href="<?php echo getUrl('order_target','popular','order_type',$__Context->_order_type) ?>"><?php echo $__Context->lang->order_popular ?></a></li>
    </ul>
    <?php if($__Context->item_list&&count($__Context->item_list))foreach($__Context->item_list as $__Context->key => $__Context->val){ ?>
    <table class="packageList">
    <colgroup>
    <col width="120" /><col width="*"/>
    </colgroup>
    <tr>
        <td rowspan="4" class="thumbnail"><a href="<?php echo getUrl('package_srl', $__Context->val->package_srl) ?>"><img src="<?php echo $__Context->val->item_screenshot_url ?>" width="100" height="100" alt="" /></a></td>
        <td class="title">
            <h3>
                <a href="<?php echo getUrl('package_srl', $__Context->val->package_srl) ?>"><?php echo htmlspecialchars($__Context->val->title) ?> ver. <?php echo htmlspecialchars($__Context->val->item_version) ?></a>
            </h3>
        </td>
    </tr>
    <tr>
        <td class="info">
            <ul>
                <?php if($__Context->val->category_srl){ ?><li class="category"><a href="<?php echo getUrl('category_srl', $__Context->val->category_srl) ?>"><?php echo $__Context->categories[$__Context->val->category_srl]->title ?></a></li><?php } ?>
                <li class="voted">
                    <?php for($__Context->i=0;$__Context->i<5;$__Context->i++){;
if($__Context->i<$__Context->val->package_star){ ?><img src="/modules/resource/skins/xe_official/img/starOn.gif" alt="" /><?php }else{ ?><img src="/modules/resource/skins/xe_official/img/starOff.gif" alt="" /><?php };
} ?>
					<?php if($__Context->val->package_voter){ ?>
                    <?php echo sprintf("%0.1f",$__Context->val->package_voted/$__Context->val->package_voter*2) ?> /<?php echo number_format($__Context->val->package_voter) ?>
					<?php }else{ ?>
					0 / 0
					<?php } ?>
                </li>
                <li class="author"><a href="#" onclick="return false;" class="member_<?php echo $__Context->val->member_srl ?>"><?php echo $__Context->val->nick_name ?></a></li>
            </li>
        </td>
    </tr>
    <tr>
        <td class="description"><?php echo cut_str(htmlspecialchars($__Context->val->package_description),200) ?></td>
    </tr>
    <tr>
        <td class="info">
            <ul>
                <li class="info">
                    <?php echo $__Context->lang->package_update ?> <?php echo zdate($__Context->val->item_regdate, "Y-m-d H:i") ?>
                    / <?php echo $__Context->lang->package_downloaded_count ?> : <?php echo number_format($__Context->val->package_downloaded) ?>
                    <?php if($__Context->grant->manager){ ?>
                    [<a href="<?php echo getUrl('act','dispResourcePackage','package_srl',$__Context->val->package_srl) ?>"><?php echo $__Context->lang->cmd_modify ?></a> | 
                    <a href="#" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) doDeleteItem(<?php echo $__Context->val->package_srl ?>,<?php echo $__Context->val->item_srl ?>); return false;"><?php echo $__Context->lang->cmd_delete ?></a>|
                    <?php } ?>
                </li>
            </ul>
        </td>
    </tr>
    </table>
    <?php } ?>
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
