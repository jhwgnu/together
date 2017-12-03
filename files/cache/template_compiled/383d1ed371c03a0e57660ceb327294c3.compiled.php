<?php if(!defined("__XE__"))exit;?>
    <?php if(!$__Context->module_info->colorset){ ?>
        <?php $__Context->module_info->colorset = "white" ?>
    <?php } ?>
    <!--#Meta:modules/board/skins/xe_guestbook/css/common.css--><?php $__tmp=array('modules/board/skins/xe_guestbook/css/common.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
    <?php if($__Context->module_info->colorset == "cyan"){ ?> <!--#Meta:modules/board/skins/xe_guestbook/css/cyan.css--><?php $__tmp=array('modules/board/skins/xe_guestbook/css/cyan.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
    <?php }elseif($__Context->module_info->colorset == "red"){ ?> <!--#Meta:modules/board/skins/xe_guestbook/css/red.css--><?php $__tmp=array('modules/board/skins/xe_guestbook/css/red.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
    <?php }elseif($__Context->module_info->colorset == "green"){ ?> <!--#Meta:modules/board/skins/xe_guestbook/css/green.css--><?php $__tmp=array('modules/board/skins/xe_guestbook/css/green.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
    <?php }elseif($__Context->module_info->colorset == "purple"){ ?> <!--#Meta:modules/board/skins/xe_guestbook/css/purple.css--><?php $__tmp=array('modules/board/skins/xe_guestbook/css/purple.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
    <?php }elseif($__Context->module_info->colorset == "black"){ ?> <!--#Meta:modules/board/skins/xe_guestbook/css/black.css--><?php $__tmp=array('modules/board/skins/xe_guestbook/css/black.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
    <?php }else{ ?> <!--#Meta:modules/board/skins/xe_guestbook/css/white.css--><?php $__tmp=array('modules/board/skins/xe_guestbook/css/white.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
    <?php } ?>
<div class="board">
    <?php echo $__Context->module_info->header_text ?>
<!-- display skin title/description -->
    <?php if($__Context->module_info->title){ ?>
    <div class="boardHeader">
        <div class="boardHeaderBorder">
            <h3><?php echo $__Context->module_info->title;
if($__Context->module_info->sub_title){ ?> - <?php echo $__Context->module_info->sub_title;
} ?></h3>
        </div>
    </div>
    <?php } ?>
<!-- skin details-->
    <?php if($__Context->module_info->comment){ ?>
    <div class="boardDescription"><?php echo $__Context->module_info->comment ?></div>
    <?php } ?>
<!-- board information -->
    <div class="boardInformation">
        <!-- number of documents -->
        <?php if($__Context->total_count){ ?>
        <div class="articleNum"><?php echo $__Context->lang->document_count ?> <strong><?php echo number_format($__Context->total_count) ?></strong></div>
        <?php } ?>
        <!-- login infomation -->
        <ul class="accountNavigation">
        
        <?php if($__Context->is_logged){ ?>
            
            <?php if($__Context->grant->manager){ ?>
            <li class="setup"><a href="<?php echo getUrl('act','dispBoardAdminBoardInfo') ?>"><?php echo $__Context->lang->cmd_setup ?></a></li>
            <?php } ?>
            
            <?php if($__Context->logged_info->is_admin == 'Y'){ ?>
            <li class="admin"><a href="<?php echo getUrl('','module','admin','act','dispBoardAdminContent') ?>"><?php echo $__Context->lang->cmd_management ?></a></li>
            <?php } ?>
            
            <?php if(!$__Context->module_info->layout_srl){ ?>
            <li class="myInfo"><a href="<?php echo getUrl('act','dispMemberInfo') ?>"><?php echo $__Context->lang->cmd_view_member_info ?></a></li>
            <li class="loginAndLogout"><a href="<?php echo getUrl('act','dispMemberLogout') ?>"><?php echo $__Context->lang->cmd_logout ?></a></li>
            <?php } ?>
        
        <?php }elseif(!$__Context->is_logged && !$__Context->module_info->layout_srl){ ?>
            <li class="join"><a href="<?php echo getUrl('act','dispMemberSignUpForm') ?>"><?php echo $__Context->lang->cmd_signup ?></a></li>
            <li class="loginAndLogout"><a href="<?php echo getUrl('act','dispMemberLoginForm') ?>"><?php echo $__Context->lang->cmd_login ?></a></li>
        <?php } ?>
            <li class="skin_info"><a href="<?php echo getUrl('','module','module','act','dispModuleSkinInfo','selected_module',$__Context->module_info->module, 'skin', $__Context->module_info->skin) ?>" onclick="popopen(this.href,'skinInfo'); return false;"><img src="/modules/board/skins/xe_guestbook/images/common/buttonHelp.gif" alt="Skin Info" width="13" height="13"/></a></li>
        </ul>
    </div>
