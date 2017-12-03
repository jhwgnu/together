<?php if(!defined("__XE__"))exit;
if($__Context->oDocument->getCommentCount()){ ?>
<div class="replyBox">
	<a name="<?php echo $__Context->oDocument->get('document_srl') ?>_comment"></a>
    <?php  $__Context->_comment_list = $__Context->oDocument->getComments()  ?>
    <?php if($__Context->_comment_list&&count($__Context->_comment_list))foreach($__Context->_comment_list as $__Context->key => $__Context->comment){ ?>
		<a name="comment<?php if($__Context->comment->comment_srl){ ?>_<?php echo $__Context->comment->comment_srl;
} ?>"></a>
        <div class="replyItem <?php if($__Context->comment->get('depth')){ ?>reply<?php } ?>">
            <?php if($__Context->comment->get('depth')){ ?>
            <div style="margin-left:<?php echo ($__Context->comment->get('depth')-1)*20 ?>px" class="replyIndent">
            <?php } ?>
            <div class="author">
            <?php if(!$__Context->comment->member_srl){ ?>
                <?php if($__Context->comment->homepage){ ?>
                    <a href="<?php echo $__Context->comment->getHomepageUrl() ?>" onclick="window.open(this.href);return false;"><?php echo $__Context->comment->getNickName() ?></a>
                <?php }else{ ?>
                    <?php echo $__Context->comment->getNickName() ?>
                <?php } ?>
            <?php }else{ ?>
                <div class="member_<?php echo $__Context->comment->member_srl ?>"><?php echo $__Context->comment->getNickName() ?></div>
            <?php } ?>
            </div>
            <div class="replyOption">
                <?php if($__Context->comment->isGranted() || !$__Context->comment->get('member_srl')){ ?>
                    <a href="<?php echo getUrl('act','dispBoardDeleteComment','document_srl',$__Context->oDocument->document_srl, 'comment_srl',$__Context->comment->comment_srl) ?>"><img src="/modules/board/skins/xe_guestbook/images/common/buttonDeleteX.gif" alt="<?php echo $__Context->lang->cmd_delete ?>" width="12" height="13" /></a>
                    <a href="<?php echo getUrl('act','dispBoardModifyComment','document_srl',$__Context->oDocument->document_srl, 'comment_srl',$__Context->comment->comment_srl) ?>"><img src="/modules/board/skins/xe_guestbook/images/<?php echo $__Context->module_info->colorset ?>/buttonModifyE.gif" alt="<?php echo $__Context->lang->cmd_modify ?>" width="20" height="17" /></a> 
                <?php } ?>
                    <?php if($__Context->oDocument->allowComment()){ ?><a href="<?php echo getUrl('act','dispBoardReplyComment','document_srl',$__Context->oDocument->document_srl, 'comment_srl',$__Context->comment->comment_srl) ?>"><img src="/modules/board/skins/xe_guestbook/images/<?php echo $__Context->module_info->colorset ?>/buttonReply.gif" alt="<?php echo $__Context->lang->cmd_reply ?>" width="20" height="17" /></a><?php } ?> 
            </div>
            <div class="date">
                <strong><?php echo $__Context->comment->getRegdate('Y.m.d') ?></strong> <?php echo $__Context->comment->getRegdate('H:i:s') ?>
                <?php if($__Context->grant->manager){ ?>
                    (<?php echo $__Context->comment->get('ipaddress') ?>)
                <?php } ?>
            </div>
            <?php if($__Context->comment->get('voted_count')!=0){ ?>
            <div class="voted">
                (<?php echo $__Context->lang->voted_count ?>:
                <strong><?php echo $__Context->comment->get('voted_count') ?></strong>)
            </div>
            <?php } ?>
            
            <div class="replyContent">
                <?php if(!$__Context->comment->isAccessible()){ ?>
                    <div class="secretContent">
                        <form action="./" method="get" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
                        <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
                        <input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
                        <input type="hidden" name="document_srl" value="<?php echo $__Context->comment->get('document_srl') ?>" />
                        <input type="hidden" name="comment_srl" value="<?php echo $__Context->comment->get('comment_srl') ?>" />
                            <div class="title"><?php echo $__Context->lang->msg_is_secret ?></div>
                            <div class="content"><input type="password" name="password" class="iText" /><input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_input ?>" /></div>
                        </form>
                    </div>
                <?php }else{ ?>
                    <?php echo $__Context->comment->getContent(false,false) ?>
                <?php } ?>
            </div>
            <?php if($__Context->comment->hasUploadedFIles()){ ?>
                <div class="fileAttached">
                    <ul>
                        <?php  $__Context->_uploaded_files = $__Context->comment->getUploadedFiles()  ?>
                        <?php if($__Context->_uploaded_files&&count($__Context->_uploaded_files))foreach($__Context->_uploaded_files as $__Context->key => $__Context->file){ ?>
                        <li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> (<?php echo FileHandler::filesize($__Context->file->file_size) ?>)(<?php echo number_format($__Context->file->download_count) ?>)</a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <?php if($__Context->comment->get('depth')){ ?>
            </div>
            <?php } ?>
        </div>
    <?php } ?>
    <!-- comment page navigation -->
    <?php if($__Context->oDocument->comment_page_navigation){ ?>
	<?php 
		$__Context->cpageStr = sprintf('%d_cpage', $__Context->oDocument->get('document_srl'));
		$__Context->cpage = Context::get($__Context->cpageStr);
	 ?>
    <div class="pagination a1">
        <a href="<?php echo getUrl($__Context->cpageStr,1) ?>#<?php echo $__Context->oDocument->get('document_srl') ?>_comment" class="prevEnd"><?php echo $__Context->lang->first_page ?></a> 
        <?php while($__Context->page_no = $__Context->oDocument->comment_page_navigation->getNextPage()){ ?>
            <?php if($__Context->cpage == $__Context->page_no){ ?>
                <strong><?php echo $__Context->page_no ?></strong> 
            <?php }else{ ?>
                <a href="<?php echo getUrl($__Context->cpageStr,$__Context->page_no) ?>#<?php echo $__Context->oDocument->get('document_srl') ?>_comment"><?php echo $__Context->page_no ?></a>
            <?php } ?>
        <?php } ?>
        <a href="<?php echo getUrl($__Context->cpageStr,$__Context->oDocument->comment_page_navigation->last_page) ?>#<?php echo $__Context->oDocument->get('document_srl') ?>_comment" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
    </div>
    <?php } ?>
</div>
<?php } ?>
