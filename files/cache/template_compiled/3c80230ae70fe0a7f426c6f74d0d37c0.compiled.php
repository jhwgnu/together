<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/wiki/skins/xe_wiki/css/wiki.css--><?php $__tmp=array('modules/wiki/skins/xe_wiki/css/wiki.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/wiki/skins/xe_wiki/js/wiki.js--><?php $__tmp=array('modules/wiki/skins/xe_wiki/js/wiki.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->use_history != 'N' && $__Context->act == 'dispWikiHistory'){ ?><!--#Meta:modules/wiki/skins/xe_wiki/js/diff.js--><?php $__tmp=array('modules/wiki/skins/xe_wiki/js/diff.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<script>
	jQuery(document).ready(function($){
		$(".message.info").delay(1500).fadeOut('slow');
	});
</script>
<?php echo $__Context->module_info->header_text ?>
<div class="wiki">
    <div class="wkHeader">
		<?php if($__Context->module_info->title){ ?><div class="wkTitle">
			<h2 class="wkTitleText"><a href="<?php echo getUrl('','mid',$__Context->mid,'listStyle',$__Context->listStyle) ?>"><?php echo $__Context->module_info->title ?> <?php if($__Context->module_info->sub_title){ ?><em><?php echo $__Context->module_info->sub_title ?></em><?php } ?></a></h2>
		</div><?php } ?>
		<?php if($__Context->module_info->comment){ ?><p class="wkDesc"><?php echo $__Context->module_info->comment ?></p><?php } ?>
    </div>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/wiki/skins/xe_wiki'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
    <div class="wkInfo">
        <div class="infoView">
			<span class="btn-group">
				<a class="btn" href="<?php echo getUrl('act','dispWikiContent','entry','','document_srl','') ?>"><?php echo $__Context->lang->home_page ?></a>
				<a class="btn" href="<?php echo getUrl('act','dispWikiTitleIndex','entry','','document_srl','') ?>"><?php echo $__Context->lang->cmd_view_document_list ?></a>
				<a class="btn" href="<?php echo getUrl('act','dispWikiTreeIndex','entry','','document_srl','') ?>"><?php echo $__Context->lang->cmd_view_document_tree ?></a>
				<a class="btn" href="<?php echo getUrl('','act','dispWikiEditPage','entry','','document_srl','','mid',$__Context->mid,'vid',$__Context->vid) ?>"><?php echo $__Context->lang->new_document ?></a>
			</span>
        </div>
        <form action="<?php echo getUrl() ?>" method="post" class="wkSearch"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
            <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
            <input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="act" value="dispWikiContent" />
            <input type="text" class="iText" name="entry" />
            <input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_move ?>" />
            <?php if($__Context->grant->manager){ ?><a class="btn" href="<?php echo getUrl('act','dispWikiAdminInsertWiki') ?>"><?php echo $__Context->lang->cmd_setup ?></a><?php } ?>
        </form>
    </div>
    <?php if($__Context->oDocument && $__Context->oDocument->isExists()){ ?>
    <div class="wikiRead">
        <div class="wkReadHeader">
            <div class="titleArea">
                <h3 class="title"><a href="<?php echo $__Context->oDocument->getPermanentUrl() ?>"><?php echo $__Context->oDocument->getTitle() ?></a></h3>
                <span class="sum">
                    <span class="read"><?php echo $__Context->lang->readed_count ?> <span class="num"><?php echo $__Context->oDocument->get('readed_count') ?></span></span>
                    <span class="vote"><?php echo $__Context->lang->voted_count ?> <span class="num"><?php echo $__Context->oDocument->get('voted_count') ?></span></span>
                    <span class="date">
                        <?php if($__Context->history){ ?>
                        <strong><?php echo zdate($__Context->history->regdate, 'Y.m.d') ?></strong> <?php echo zdate($__Context->history->regdate, 'H:i:s') ?>
                        <?php }else{ ?>
                        <strong><?php echo $__Context->oDocument->getUpdate('Y.m.d') ?></strong> <?php echo $__Context->oDocument->getUpdate('H:i:s') ?> 
                        <?php } ?>
                    </span>
                </span>
            </div>
			<?php if($__Context->visit_log){ ?><div class="visitLog">
				<?php  $__Context->bFirst = true;  ?>
				<?php if($__Context->visit_log&&count($__Context->visit_log))foreach($__Context->visit_log as $__Context->_entry){ ?>
					<?php if(!$__Context->bFirst){ ?> > <?php }else{;
$__Context->bFirst = false;
} ?> 
					<a href="<?php echo getUrl('entry',$__Context->_entry,'document_srl','') ?>"><?php echo htmlspecialchars($__Context->_entry) ?></a>
				<?php } ?>
			</div><?php } ?>
            <div class="authorArea">
                <?php if($__Context->history){ ?>
                    <a href="#popup_menu_area" class="author member_<?php echo $__Context->history->member_srl ?>" onclick="return false"><?php echo $__Context->history->nick_name ?></a>
                <?php }else{ ?>
                    <?php if(!$__Context->oDocument->getMemberSrl()){ ?>
                        <?php if($__Context->oDocument->isExistsHomepage()){ ?>
                            <a href="<?php echo $__Context->oDocument->getHomepageUrl() ?>" target="_blank" class="author"><?php echo $__Context->oDocument->getNickName() ?></a>
                        <?php }else{ ?>
                            <strong class="author"><?php echo $__Context->oDocument->getNickName() ?></strong>
                        <?php } ?>
                    <?php }else{ ?>
                        <a href="#popup_menu_area" class="member_<?php echo $__Context->oDocument->get('member_srl') ?> author" onclick="return false"><?php echo $__Context->oDocument->getNickName() ?></a>
                    <?php } ?>
                <?php } ?>
                <?php if($__Context->grant->manager || $__Context->module_info->display_ip_address!='N'){ ?><span class="ipAddress"><?php echo $__Context->oDocument->getIpaddress() ?></span><?php } ?>
                <?php if(!$__Context->history && ($__Context->oDocument->isExists()||$__Context->use_history != 'N')){ ?>
                <div class="command">
					<span class="btn-group">
						<?php 
							$__Context->oDocumentModel = getModel('document');
							$__Context->entry = $__Context->oDocumentModel->getAlias($__Context->oDocument->get('document_srl'));
						 ?>
						<?php if($__Context->oDocument->isExists()&& $__Context->act!='dispWikiEditPage' && $__Context->grant->write_document){ ?><a class="btn" href="<?php echo getUrl('act','dispWikiEditPage','entry',$__Context->entry, 'document_srl', '') ?>"><?php echo $__Context->lang->cmd_edit ?></a><?php } ?>
						<?php if($__Context->oDocument->isExists() && $__Context->grant->delete_document){ ?><button type="button" class="btn" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) { doDeleteWiki('<?php echo $__Context->oDocument->document_srl ?>'); }"><?php echo $__Context->lang->cmd_delete ?></button><?php } ?>
						<?php if($__Context->use_history != 'N'){ ?><a href="<?php echo getUrl('act','dispWikiHistory','document_srl',$__Context->oDocument->document_srl,'history_srl','') ?>" class="btn"><?php echo $__Context->lang->histories ?></a><?php } ?>
					</span>
                </div>
                <?php }else{ ?>
                <div class="command">
                    <?php if($__Context->history){;
echo $__Context->lang->notice_old_revision;
} ?>
                    <a href="<?php echo getUrl('act','','history_srl','') ?>" class="btn"><?php echo $__Context->lang->cmd_back ?></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }elseif($__Context->oDocument) { ?>
    <div class="wikiRead">
        <div class="wkReadHeader">
            <div class="titleArea">
				<!-- Needs to acces title with get('title') instead of getTitle() because oDocument is seen as invalid when doc_srl is 0 -->
                <h3 class="title"><?php echo $__Context->oDocument->get('title') ?></h3>
            </div>
        </div>
    </div>
    <?php if($__Context->visit_log){ ?><div class="visitLog">
        <?php  $__Context->bFirst = true;  ?>
        <?php if($__Context->visit_log&&count($__Context->visit_log))foreach($__Context->visit_log as $__Context->_entry){ ?>
            <?php if(!$__Context->bFirst){ ?> > <?php }else{;
$__Context->bFirst = false;
} ?> <a href="<?php echo getUrl('entry',$__Context->_entry, 'document_srl', '') ?>"><?php echo $__Context->_entry ?></a>
        <?php } ?>
    </div><?php } ?>
    <?php } ?>
