<?php if(!defined("__XE__"))exit;
require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/communication/skins/default/filter','add_friend.xml');$__xmlFilter->compile(); ?>
<!--#Meta:modules/communication/skins/default/css/communication.css--><?php $__tmp=array('modules/communication/skins/default/css/communication.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/communication/skins/default/js/communication.js--><?php $__tmp=array('modules/communication/skins/default/js/communication.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="xc">
	<h1><?php echo $__Context->lang->cmd_add_friend ?></h1>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/communication/skins/default/add_friend/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("modules/communication/ruleset/addFriend.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="addFriend" />
		<input type="hidden" name="module" value="communication" />
		<input type="hidden" name="act" value="procCommunicationAddFriend" />
		<input type="hidden" name="target_srl" value="<?php echo $__Context->target_info->member_srl ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/communication/skins/default/add_friend/1" />
		<table class="table table-striped table-hover">
			<tr>
				<th scope="row"><?php echo $__Context->lang->nick_name ?></th>
				<td><?php echo $__Context->target_info->nick_name ?></td>
			</tr>
			<tr>
				<th scope="row"><label for="friend_group_srl"><?php echo $__Context->lang->friend_group ?></label></th>
				<td>
					<select name="friend_group_srl" id="friend_group_srl">
						<option value=""><?php echo $__Context->lang->default_friend_group ?></option>
						<?php if($__Context->friend_group_list&&count($__Context->friend_group_list))foreach($__Context->friend_group_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->friend_group_srl ?>"><?php echo $__Context->val->title ?></option><?php } ?>
					</select> 
					<a href="<?php echo getUrl('act','dispCommunicationAddFriendGroup') ?>" class="btn" onclick="popopen(this.href);return false;"><?php echo $__Context->lang->cmd_add_friend_group ?></a>
				</td>
			</tr>
		</table>
		<div class="btnArea" style="border-top:0;padding:0">
			<input type="submit" value="<?php echo $__Context->lang->cmd_add_friend ?>" class="btn btn-inverse" />
		</div>
	</form>
</div>
