<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/communication/skins/default/css/communication.css--><?php $__tmp=array('modules/communication/skins/default/css/communication.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/communication/skins/default/js/communication.js--><?php $__tmp=array('modules/communication/skins/default/js/communication.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="xc">
	<h1><?php echo $__Context->lang->cmd_send_message ?></h1>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/communication/skins/default/send_message/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("modules/communication/ruleset/sendMessage.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="sendMessage" />
		<input type="hidden" name="module" value="communication" />
		<input type="hidden" name="act" value="procCommunicationSendMessage" />
		<input type="hidden" name="content" value="<?php echo htmlspecialchars($__Context->source_message->content, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
		<input type="hidden" name="receiver_srl" value="<?php echo $__Context->receiver_info->member_srl ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/communication/skins/default/send_message/1" />
		<table class="table table-striped table-hover">
			<tr>
				<th scope="row"><label for="textfield1"><?php echo $__Context->lang->receiver ?></label></th>
				<td><a href="#popup_menu_area" class="member_<?php echo $__Context->receiver_info->member_srl ?>"><?php echo $__Context->receiver_info->nick_name ?></a></td>
			</tr>
			<tr>
				<th scope="row"><?php echo $__Context->lang->title ?></th>
				<td><input type="text" name="title" id="message_title" value="<?php echo $__Context->source_message->title ?>" style="width:90%" /></td>
			</tr>
			<tr>
				<th scope="row"><?php echo $__Context->lang->cmd_option ?></th>
				<td><input type="checkbox" value="Y" name="send_mail" /> <?php echo $__Context->lang->cmd_send_mail ?></td>
			</tr>
		</table>
		<?php echo $__Context->editor ?>
		<div class="btnArea">
			<input type="submit" value="<?php echo $__Context->lang->cmd_send_message ?>" class="btn btn-inverse" />
		</div>
	</form>
</div>
