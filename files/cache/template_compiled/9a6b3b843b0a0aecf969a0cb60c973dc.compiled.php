<?php if(!defined("__XE__"))exit;?><!-- display the document contents-->
<div class="boardRead">
    <div class="originalContent">
        <div class="readHeader">
            <div class="contentInfo">
                <?php if($__Context->module_info->display_author!='N'){ ?>
                <div class="userInfo">
                    <?php if(!$__Context->oDocument->getMemberSrl()){ ?>
                        <div class="author">
                        <?php if($__Context->oDocument->isExistsHomepage()){ ?>
                            <a href="<?php echo $__Context->oDocument->getHomepageUrl() ?>" onclick="window.open(this.href);return false;"><?php echo $__Context->oDocument->getNickName() ?></a>
                        <?php }else{ ?>
                            <?php echo $__Context->oDocument->getNickName() ?>
                        <?php } ?>
                        </div>
                    <?php }else{ ?>
                        <div class="author"><span class="member_<?php echo $__Context->oDocument->get('member_srl') ?>"><?php echo $__Context->oDocument->getNickName() ?></span></div>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="replyOption">
                    <?php if($__Context->oDocument->isEditable()){ ?>
                    <a href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->oDocument->document_srl, 'comment_srl','') ?>"><img src="/modules/board/skins/xe_guestbook/images/common/buttonDeleteX.gif" alt="<?php echo $__Context->lang->cmd_delete ?>" width="12" height="13" /></a>
                    <a href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->oDocument->document_srl, 'comment_srl','') ?>"><img src="/modules/board/skins/xe_guestbook/images/<?php echo $__Context->module_info->colorset ?>/buttonModifyE.gif" alt="<?php echo $__Context->lang->cmd_modify ?>" width="20" height="17" /></a> 
                    <?php } ?>
                    <?php if($__Context->oDocument->allowComment()){ ?><a href="<?php echo getUrl('act','dispBoardWriteComment','document_srl',$__Context->oDocument->document_srl, 'comment_srl',0) ?>"><img src="/modules/board/skins/xe_guestbook/images/<?php echo $__Context->module_info->colorset ?>/buttonReply.gif" alt="<?php echo $__Context->lang->cmd_reply ?>" width="20" height="17" /></a><?php } ?> 
                </div>
                <div class="date" title="<?php echo $__Context->lang->regdate ?>">
                    <strong><?php echo $__Context->oDocument->getRegdate('Y.m.d') ?></strong> <?php echo $__Context->oDocument->getRegdate('H:i:s') ?>
                    <?php if($__Context->grant->manager){ ?>
                    (<?php echo $__Context->oDocument->get('ipaddress') ?>)
                    <?php } ?>
                </div>
                
            </div>
            
        </div>
        
        <?php if($__Context->oDocument->isExtraVarsExists() && (!$__Context->oDocument->isSecret() || $__Context->oDocument->isGranted()) ){ ?>
        <table cellspacing="0" summary="" class="extraVarsList">
        <col width="150" />
        <col />
        <?php if($__Context->oDocument->getExtraVars()&&count($__Context->oDocument->getExtraVars()))foreach($__Context->oDocument->getExtraVars() as $__Context->key => $__Context->val){ ?>
        <tr>
            <th><?php echo $__Context->val->name ?></th>
            <td><?php echo $__Context->val->getValueHTML() ?></td>
        </tr>
        <?php } ?>
        </table>
        <?php } ?>
        <div class="readBody">
            <div class="contentBody">
                <a name="document_<?php echo $__Context->oDocument->document_srl ?>"></a>
                <?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
                    <div class="secretContent">
                        <form action="./" method="get" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
                        <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
                        <input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
                        <input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
                            <div class="title"><?php echo $__Context->lang->msg_is_secret ?></div>
                            <div class="content"><input type="password" name="password" id="cpw" class="iText" /><input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_input ?>" /></div>
                        </form>
                    </div>
                <?php }else{ ?>
                    <?php echo $__Context->oDocument->getContent(false,false) ?>
                <?php } ?>
            </div>
        </div>
        <?php if($__Context->oDocument->hasUploadedFiles()){ ?>
        <div class="fileAttached">
            <?php  $__Context->uploaded_list = $__Context->oDocument->getUploadedFiles()  ?>
            <ul>
                <?php if($__Context->uploaded_list&&count($__Context->uploaded_list))foreach($__Context->uploaded_list as $__Context->key => $__Context->file){ ?>
                <li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> (<?php echo FileHandler::filesize($__Context->file->file_size) ?>)(<?php echo number_format($__Context->file->download_count) ?>)</a></li>
                <?php } ?>
            </ul>
            
        </div>
        <?php } ?>
    </div>
</div>
<!-- comments -->
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_guestbook','comment.html') ?>
