<?php if(!defined("__XE__"))exit;
if($__Context->grant->write_reply){;
Context::addJsFile("modules/kin/ruleset/insertComment.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" id="fo_kin_insert_comment" method="post" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertComment" />
	<input type="hidden" name="act" value="procKinInsertComment"/>
    <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
    <input type="hidden" name="parent_srl" value="<?php echo $__Context->parent_srl ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
	<fieldset>
		<legend class="blind"></legend>
		<div class="ta_box"><textarea name="content" id="" cols="104" rows="3"></textarea></div>
		<span class="btn_sbmt"><input type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" class="kin_submit"></span>
	</fieldset>
</form><?php } ?>
<?php if(count($__Context->comment_list)){ ?>
<ul class="lst_comment">
	<?php if($__Context->comment_list&&count($__Context->comment_list))foreach($__Context->comment_list as $__Context->key=>$__Context->val){ ?><li>
		<div class="meta">
			<span class="author"><?php echo $__Context->val->nick_name ?></span>
			<span class="date"><?php echo zdate($__Context->val->regdate, "Y-m-d H:i") ?> 
			<?php if($__Context->grant->manager || $__Context->val->member_srl == $__Context->logged_info->member_srl){ ?><a href="#" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) doDeleteComment(<?php echo $__Context->parent_srl ?>,<?php echo $__Context->val->reply_srl ?>,<?php echo $__Context->page ?>); return false;">&nbsp;[<?php echo $__Context->lang->cmd_delete ?>]</a><?php } ?>
			</span>
		</div>
		<p class="comment"><?php echo htmlspecialchars($__Context->val->content) ?></p>
	</li><?php } ?>
 </ul>
<?php } ?>