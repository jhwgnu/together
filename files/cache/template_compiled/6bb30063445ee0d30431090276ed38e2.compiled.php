<?php if(!defined("__XE__"))exit;
if($__Context->act=="dispBoardWrite"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_guestbook','header.html') ?>
<?php } ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/board/skins/xe_guestbook/filter','insert.xml');$__xmlFilter->compile(); ?>
<form action="./" method="post" onsubmit="return procFilter(this, window.insert)" id="fo_write"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
<input type="hidden" name="content" value="<?php echo $__Context->oDocument->getContentText() ?>" />
<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
    <div class="boardWrite">
        <?php if(!$__Context->is_logged){ ?>
        <div class="authorInfo">
          <div class="inputItem">
              <label for="userName"><?php echo $__Context->lang->writer ?></label>
              <input type="text" name="nick_name" value="<?php echo $__Context->oDocument->getNickName() ?>" class="userName iText" id="userName"/>
          </div>
          <div class="inputItem">
              <label for="userPw"><?php echo $__Context->lang->password ?></label>
              <input type="password" name="password" value="" id="userPw" class="userPw iText" />
          </div>
          <div class="inputItem">
              <label for="emailAddress"><?php echo $__Context->lang->email_address ?></label>
              <input type="text" name="email_address" value="<?php echo htmlspecialchars($__Context->oDocument->get('email_address')) ?>" id="emailAddress" class="emailAddress iText"/>
          </div>
          <div class="inputItem">
              <label for="homePage"><?php echo $__Context->lang->homepage ?></label>
              <input type="text" name="homepage" value="<?php echo htmlspecialchars($__Context->oDocument->get('homepage')) ?>" id="homePage" class="homePage iText"/>
          </div>
          
        </div>
        <?php } ?>
        <div class="option">
            <?php if($__Context->grant->manager){ ?>
            <?php  $__Context->_color = array('555555','222288','226622','2266EE','8866CC','88AA66','EE2222','EE6622','EEAA22','EEEE22')  ?>
            <select name="title_color" id="title_color" <?php if($__Context->oDocument->get('title_color')){ ?>style="background-color:#<?php echo $__Context->oDocument->get('title_color') ?>;"<?php } ?> onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor;">
				<option value="" style="background-color:#FFFFFF;"><?php echo $__Context->lang->title_color ?></option>
				<?php if($__Context->_color&&count($__Context->_color))foreach($__Context->_color as $__Context->_col){ ?>
				<option value="<?php echo $__Context->_col ?>" style="background-color:#<?php echo $__Context->_col ?>" <?php if($__Context->oDocument->get('title_color')==$__Context->_col){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->title_color ?></option>
				<?php } ?>
			</select>
			<input type="checkbox" name="title_bold" id="title_bold" value="Y" <?php if($__Context->oDocument->get('title_bold')=='Y'){ ?>checked="checked"<?php } ?> />
			<label for="title_bold"><?php echo $__Context->lang->title_bold ?></label>
			<input type="checkbox" name="is_notice" value="Y" <?php if($__Context->oDocument->isNotice()){ ?>checked="checked"<?php } ?> id="is_notice" />
			<label for="is_notice"><?php echo $__Context->lang->notice ?></label>
			<?php } ?>
			<input type="checkbox" name="comment_status" value="ALLOW" <?php if($__Context->oDocument->allowComment()){ ?>checked="checked"<?php } ?> id="comment_status" />
			<label for="comment_status"><?php echo $__Context->lang->allow_comment ?></label>
			<?php if($__Context->is_logged){ ?>
			<input type="checkbox" name="notify_message" value="Y" <?php if($__Context->oDocument->useNotify()){ ?>checked="checked"<?php } ?> id="notify_message" />
			<label for="notify_message"><?php echo $__Context->lang->notify ?></label>
			<?php } ?>
			<?php if(is_array($__Context->status_list)){ ?>
				<?php if($__Context->status_list&&count($__Context->status_list))foreach($__Context->status_list AS $__Context->key=>$__Context->value){ ?>
				<input type="radio" name="status" value="<?php echo $__Context->key ?>" id="<?php echo $__Context->key ?>" <?php if($__Context->oDocument->get('status') == $__Context->key || ($__Context->key == 'PUBLIC' && !$__Context->document_srl)){ ?>checked="checked"<?php } ?> /> 
				<label for="<?php echo $__Context->key ?>"><?php echo $__Context->value ?></label>
				<?php } ?>
			<?php } ?>
        </div>
        <?php if($__Context->extra_keys){ ?>
        <table cellspacing="0" summary="" class="extraVarsList">
        <col width="150" />
        <col />
        <?php if($__Context->extra_keys&&count($__Context->extra_keys))foreach($__Context->extra_keys as $__Context->key => $__Context->val){ ?>
        <tr>
            <th scope="row"><?php echo $__Context->val->name ?> <?php if($__Context->val->is_required=='Y'){ ?>*<?php } ?></th>
            <td><?php echo $__Context->val->getFormHTML() ?></td>
        </tr>
        <?php } ?>
        </table>
        <?php } ?>
        <div class="editor"><?php echo $__Context->oDocument->getEditor() ?></div>
        <div class="btnArea">
            <input class="btn" type="button" value="<?php echo $__Context->lang->cmd_preview ?>" onclick="doDocumentPreview(this)" />
            <input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" />
			<span class="etc">
				<?php if($__Context->is_logged){ ?>
				<?php if(!$__Context->oDocument->isExists() || $__Context->oDocument->get('status') == 'TEMP'){ ?>
				<input class="btn" type="button" value="<?php echo $__Context->lang->cmd_temp_save ?>"  onclick="doDocumentSave(this)" />
				<input class="btn" type="button" value="<?php echo $__Context->lang->cmd_load ?>"  onclick="doDocumentLoad(this)" />
				<?php } ?>
				<?php } ?>
			</span>
        </div>
    </div>
</form>
<?php if($__Context->act=="dispBoardWrite"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xe_guestbook','footer.html') ?>
<?php } ?>
