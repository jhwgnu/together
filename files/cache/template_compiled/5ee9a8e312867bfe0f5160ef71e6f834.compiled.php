<?php if(!defined("__XE__"))exit;?><script>
xe.lang.msg_empty_search_target = '<?php echo $__Context->lang->msg_empty_search_target ?>';
xe.lang.msg_empty_search_keyword = '<?php echo $__Context->lang->msg_empty_search_keyword ?>';
xe.lang.msg_select_poll = '<?php echo $__Context->lang->msg_poll_is_null ?>';
xe.lang.confirm_poll_delete = '<?php echo $__Context->lang->confirm_poll_delete ?>';
</script>
<!--#Meta:modules/poll/tpl/js/poll_admin.js--><?php $__tmp=array('modules/poll/tpl/js/poll_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1><?php echo $__Context->lang->poll ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_content_poll" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/poll/tpl/poll_list/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/poll/ruleset/deleteChecked.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" id="pollList"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="deleteChecked" />
	<input type="hidden" name="act" value="procPollAdminDeleteChecked" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="module" value="poll" />
	<input type="hidden" name="xe_validator_id" value="modules/poll/tpl/poll_list/1" />
	<table class="x_table x_table-striped x_table-hover" id="pollListTable">
		<caption>
			<strong><?php echo $__Context->lang->all ?>(<?php echo number_format($__Context->total_count) ?>)</strong>
			<span class="x_pull-right">
				<input type="submit" class="x_btn _allowFreqSubmit" value="<?php echo $__Context->lang->delete ?>" />
			</span>
		</caption>
		<thead>
			<tr>
				<th scope="col" class="text"><?php echo $__Context->lang->title ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->poll_checkcount ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->poll_join_count ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->author ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->regdate ?></th>
				<th scope="col" class="nowr"><?php echo $__Context->lang->poll_stop_date ?></th>
				<th scope="col"><input type="checkbox" title="Check All" /></th>
			</tr>
		</thead>
		<tbody>
			<?php if($__Context->poll_list&&count($__Context->poll_list))foreach($__Context->poll_list as $__Context->no=>$__Context->val){ ?><tr>
				<td class="title"><a href="<?php if($__Context->val->document_srl){;
echo getUrl('') ?>?document_srl=<?php echo $__Context->val->document_srl;
};
if($__Context->val->comment_srl){ ?>#comment_<?php echo $__Context->val->comment_srl;
} ?>" target="_blank"><?php echo $__Context->val->title ?></a></td>
				<td class="nowr"><?php if($__Context->val->checkcount == 1){;
echo $__Context->lang->single_check;
}else{;
echo $__Context->lang->multi_check;
} ?></td>
				<td class="nowr"><?php echo $__Context->val->poll_count ?></td>
				<td class="nowr"><a href="#popup_menu_area" class="member_<?php echo $__Context->val->member_srl ?>"><?php echo $__Context->val->nick_name ?></a></td>
				<td class="nowr"><?php echo zdate($__Context->val->poll_regdate,"Y-m-d H:i") ?></td>
				<td class="nowr"><?php echo zdate($__Context->val->poll_stop_date,"Y-m-d") ?></td>
				<td>
					<input type="checkbox" name="cart[]" value="<?php echo $__Context->val->poll_index_srl ?>" />
				</td>
			</tr><?php } ?>
			<?php if(!$__Context->poll_list){ ?><tr>
				<td colspan="7" style="text-align:center"><?php echo $__Context->lang->no_data ?></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<span class="x_pull-right">
		<input type="submit" class="x_btn _allowFreqSubmit" value="<?php echo $__Context->lang->delete ?>" />
	</span>
</form>
<form action="./" class="x_pagination x_pull-left" style="margin:0" ><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
	<?php if($__Context->search_keyword){ ?><input type="hidden" name="search_keyword" value="<?php echo $__Context->search_keyword ?>" /><?php } ?>
	<?php if($__Context->search_target){ ?><input type="hidden" name="search_target" value="<?php echo $__Context->search_target ?>" /><?php } ?>
	<ul>
		<li<?php if(!$__Context->page || $__Context->page == 1){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', '') ?>">&laquo; <?php echo $__Context->lang->first_page ?></a></li>
		<?php if($__Context->page_navigation->first_page != 1 && $__Context->page_navigation->first_page + $__Context->page_navigation->page_count > $__Context->page_navigation->last_page - 1 && $__Context->page_navigation->page_count != $__Context->page_navigation->total_page){ ?>
		<?php $__Context->isGoTo = true ?>
		<li>
			<a href="#goTo" data-toggle title="<?php echo $__Context->lang->cmd_go_to_page ?>">&hellip;</a>
			<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
				<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $__Context->lang->cmd_go_to_page ?>" />
				<button type="submit" class="x_add-on">Go</button>
			</span><?php } ?>
		</li>
		<?php } ?>
		<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
		<?php $__Context->last_page = $__Context->page_no ?>
		<li<?php if($__Context->page_no == $__Context->page){ ?> class="x_active"<?php } ?>><a  href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
		<?php } ?>
		<?php if($__Context->last_page != $__Context->page_navigation->last_page && $__Context->last_page + 1 != $__Context->page_navigation->last_page){ ?>
		<?php $__Context->isGoTo = true ?>
		<li>
			<a href="#goTo" data-toggle title="<?php echo $__Context->lang->cmd_go_to_page ?>">&hellip;</a>
			<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
				<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $__Context->lang->cmd_go_to_page ?>" />
				<button type="submit" class="x_add-on">Go</button>
			</span><?php } ?>
		</li>
		<?php } ?>
		<li<?php if($__Context->page == $__Context->page_navigation->last_page){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>" title="<?php echo $__Context->page_navigation->last_page ?>"><?php echo $__Context->lang->last_page ?> &raquo;</a></li>
	</ul>
</form>
<form action="./" method="get" class="search center x_input-append" style="clear:both;padding:10px 0 0 0;margin:0" ><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
	<select name="search_target" title="<?php echo $__Context->lang->search_target ?>" style="margin-right:4px">
		<?php if($__Context->lang->search_poll_target_list&&count($__Context->lang->search_poll_target_list))foreach($__Context->lang->search_poll_target_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
	</select>
	<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
	<button class="x_btn x_btn-inverse" type="submit"><?php echo $__Context->lang->cmd_search ?></button>
	<a class="x_btn" href="<?php echo getUrl('','module',$__Context->module,'act',$__Context->act) ?>"><?php echo $__Context->lang->cmd_cancel ?></a>
</form>
<script>
jQuery(function($){
	// Modal anchor activation
	var $docTable = $('#pollListTable');
	var $submit = $('#pollList [type="submit"]');
	$docTable.find(':checkbox').change(function(){
		if($docTable.find('tbody :checked').length == 0){
			$submit.addClass('x_disabled');
		} else {
			$submit.removeClass('x_disabled');
		}
	}).change();
	// Button action
	$submit.click(function(){
		if($docTable.find('tbody :checked').length == 0){
			alert(xe.lang.msg_select_poll);
			return false;
		}
	});
});
</script>
