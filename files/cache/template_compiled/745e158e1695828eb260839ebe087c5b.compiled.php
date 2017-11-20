<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','header.html') ?>
<?php if($__Context->module_info->markup_type != 'xe_wiki_markup'){ ?>
	<!--#Meta:modules/wiki/lib/google-code-prettify/prettify.css--><?php $__tmp=array('modules/wiki/lib/google-code-prettify/prettify.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<!--#Meta:modules/wiki/lib/google-code-prettify/prettify.js--><?php $__tmp=array('modules/wiki/lib/google-code-prettify/prettify.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<script>
		jQuery(document).ready(function($){
			prettyPrint();
		});
	</script>
<?php } ?>
<div class="wikiRead">
	<div class="wkReadBody">
		<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
			<?php Context::addJsFile("modules/wiki/ruleset/input_password.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="get"  class="secretMessage"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="input_password" />
				<input type="hidden" name="act" value="procWikiVerificationPassword" />
				<input type="hidden" name="success_return_url" value="<?php echo getUrl('act','dispWikiContent','mid',$__Context->mid,'entry',$__Context->entry, 'document_srl', '') ?>" />
				<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
				<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
				<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
				<input type="hidden" name="xe_validator_id" value="modules/wiki/skins/xe_wiki" />
				<p>&quot;<?php echo $__Context->lang->msg_is_secret ?>&quot;</p>
				<dl>
					<dt><label for="cpw"><?php echo $__Context->lang->password ?></label> :</dt>
					<dd><input type="password" name="password" id="cpw" class="iText" /><input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_input ?>" /></dd>
				</dl>
			</form>
		<?php }else{ ?>
            <?php if($__Context->history){ ?>
                <?php echo $__Context->history->content ?>
            <?php }else{ ?>
                <?php echo $__Context->oDocument->getContent() ?>
            <?php } ?>
		<?php } ?>
	</div>
	<div class="wkReadFooter">
        <?php if(!$__Context->oDocument->getTrackbackCount()){ ?>
		<dl class="tbURL">
			<dt><?php echo $__Context->lang->trackback ?> : </dt>
			<dd><a href="<?php echo $__Context->oDocument->getTrackbackUrl() ?>" onclick="return false;"><?php echo $__Context->oDocument->getTrackbackUrl() ?></a></dd>
		</dl>
        <?php } ?>
        <?php if($__Context->contributors){ ?>
		<dl class="contributors">
			<dt><?php echo $__Context->lang->contributors ?> : </dt>
			<dd><?php if($__Context->contributors&&count($__Context->contributors))foreach($__Context->contributors as $__Context->key => $__Context->val){ ?><a href="#" class="member_<?php echo $__Context->val->member_srl ?>" onclick="return false;"><?php echo $__Context->val->nick_name ?></a><?php if($__Context->key<count($__Context->contributors)-1){ ?>, <?php };
} ?></dd>
		</dl>
        <?php } ?>
		<?php if($__Context->oDocumentPrev||$__Context->oDocumentNext){ ?><div class="wkNav">
			<?php if($__Context->oDocumentPrev){ ?><a href="<?php echo $__Context->oDocumentPrev->getPermanentUrl() ?>" class="wikiPrev">&laquo; <?php echo $__Context->oDocumentPrev->getTitle() ?></a><?php } ?>
			<?php if($__Context->oDocumentNext){ ?><a href="<?php echo $__Context->oDocumentNext->getPermanentUrl() ?>" class="wikiNext"><?php echo $__Context->oDocumentNext->getTitle() ?> &raquo;</a><?php } ?>
		</div><?php } ?>
		<?php if($__Context->oDocument->hasUploadedFiles()){ ?>
        <dl class="attachedFile">
            <dt><img src="/modules/wiki/skins/xe_wiki/img/iconFiles.gif" width="27" height="11" alt="<?php echo $__Context->lang->uploaded_file ?>" /> <button type="button" class="fileToggle" onclick="jQuery(this).parents('dl.attachedFile').toggleClass('open');return false;"><?php echo $__Context->lang->uploaded_file ?> (<?php echo $__Context->oDocument->get('uploaded_count') ?>)</button></dt>
            <dd>
                <ul class="files">
                    <?php  $__Context->uploaded_list = $__Context->oDocument->getUploadedFiles()  ?>
                    <?php if($__Context->uploaded_list&&count($__Context->uploaded_list))foreach($__Context->uploaded_list as $__Context->key => $__Context->file){ ?>
                    <li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> <span class="bubble">[File Size:<?php echo FileHandler::filesize($__Context->file->file_size) ?>/Download:<?php echo number_format($__Context->file->download_count) ?>]</span></a></li>
                    <?php } ?>
                </ul>
            </dd>
        </dl>
		<?php } ?>
        
	</div>
</div>
<?php if($__Context->oDocument->allowTrackback()){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','trackback.html') ?>
<?php } ?>
<?php if($__Context->oDocument->allowComment()){ ?>
    <a name="comment"></a>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','comment.html') ?>
    <?php if($__Context->grant->write_comment && $__Context->oDocument->isEnableComment() ){ ?>
        <?php if(!$__Context->is_logged){ ?>
			<?php  $__Context->ruleset = "insert_comment_not_logged" ?>
			<?php  $__Context->act_insert = "procWikiInsertCommentNotLogged" ?>
		<?php }else{ ?>
			<?php  $__Context->ruleset = "insert_comment" ?>
			<?php  $__Context->act_insert = "procWikiInsertComment" ?>
		<?php } ?>
		<?php Context::addJsFile("modules/wiki/ruleset/<?php echo $__Context->ruleset ?>.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post"  class="wkEditor" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="<?php echo $__Context->ruleset ?>" />
			<input type="hidden" name="act" value="<?php echo $__Context->act_insert ?>" />
			<input type="hidden" name="success_return_url" value="<?php echo getUrl('act','dispWikiContent', 'module_srl', $__Context->module_info->module_srl,'document_srl',$__Context->oDocument->document_srl) ?>" />
			<input type="hidden" name="module" value="wiki" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
			<input type="hidden" name="comment_srl" value="" />
			<input type="hidden" name="content" value="" />
			<input type="hidden" name="xe_validator_id" value="modules/wiki/skins/xe_wiki" />
            <div class="wkWrite commentEditor">
                <div class="editor"><?php echo $__Context->oDocument->getCommentEditor() ?></div>
                <div class="editOption">
                <?php if(!$__Context->is_logged){ ?>
                   <input type="text" name="nick_name" class="iText userName" value="<?php echo $__Context->lang->writer ?>" onfocus="this.value=''" />
				   <input type="password" name="password" class="iText userPw" value="<?php echo $__Context->lang->password ?>" onfocus="this.value=''" />
				   <input type="text" name="email_address" class="iText emailAddress" value="<?php echo $__Context->lang->email_address ?>" onfocus="this.value=''" />
				   <input type="text" name="homepage" class="iText homePage" value="<?php echo $__Context->lang->homepage ?>" onfocus="this.value=''" />
                <?php } ?>
				<?php if($__Context->is_logged){ ?>
					<input type="checkbox" name="notify_message" value="Y" id="notify_message" class="inputCheck" />
					<label for="notify_message"><?php echo $__Context->lang->notify ?></label>
				<?php } ?>
					<input type="checkbox" name="is_secret" value="Y" id="is_secret" class="inputCheck" />
					<label for="is_secret"><?php echo $__Context->lang->secret ?></label>
                </div>
        
                <div class="wkNav">
                    <input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_comment_registration ?>" />
                </div>
            </div>
        </form>
    <?php } ?>
<?php } ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','footer.html') ?>
