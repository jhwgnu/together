<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/communication/skins/default/css/communication.css--><?php $__tmp=array('modules/communication/skins/default/css/communication.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/communication/skins/default/js/communication.js--><?php $__tmp=array('modules/communication/skins/default/js/communication.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="xc">
	<h1 style="border-bottom:1px solid #ccc">
		<?php if($__Context->friend_group->friend_group_srl){ ?>
			<?php echo $__Context->lang->cmd_rename_friend_group ?>
		<?php }else{ ?>
			<?php echo $__Context->lang->cmd_add_friend_group ?>
		<?php } ?>
	</h1>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/communication/skins/default/add_friend_group/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("modules/communication/ruleset/addFriendGroup.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="addFriendGroup" />
		<input type="hidden" name="module" value="communication" />
		<input type="hidden" name="act" value="procCommunicationAddFriendGroup" />
		<input type="hidden" name="friend_group_srl" value="<?php echo $__Context->friend_group->friend_group_srl ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/communication/skins/default/add_friend_group/1" />
		<div class="control-group">
			<label for="title" class="control-label"><?php echo $__Context->lang->msg_insert_group_name ?></label>
			<div class="controls"><input name="title" id="title" type="text" value="<?php echo htmlspecialchars($__Context->friend_group->title, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>"/></div>
		</div>
		<div class="btnArea">
			<?php if($__Context->friend_group->friend_group_srl){ ?><input type="submit" value="<?php echo $__Context->lang->cmd_modify ?>" class="btn btn-inverse" /><?php } ?>
			<?php if(!$__Context->friend_group->friend_group_srl){ ?><input type="submit" value="<?php echo $__Context->lang->cmd_insert ?>" class="btn btn-inverse" /><?php } ?>
		</div>
	</form>
</div>
