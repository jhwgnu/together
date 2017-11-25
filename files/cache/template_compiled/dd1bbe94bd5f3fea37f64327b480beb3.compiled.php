<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/tpl','header.html') ?>
<?php 
	$__Context->dis_sort = array('comment'=>true,'thumbnail'=>true,'tag'=>true);
	$__Context->dis_search = array('no'=>true,'thumbnail'=>true,'category_srl'=>true,'last_updater'=>true,'custom_status'=>true);
 ?>
<form id="dxiColumnFrm" class="x_form-horizontal" action="./" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module=='admin'?'admin':$__Context->module_info->module ?>" />
	<input type="hidden" name="act" value="procBeluxeAdminColumnSetting" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
	<div id="column_list" class="table even">
		<table width="100%" border="1" cellspacing="0" class="sortable">
			<tbody class="uDrag">
				<?php if($__Context->column_info&&count($__Context->column_info))foreach($__Context->column_info as $__Context->key=>$__Context->val){ ?><tr>
					<td><div class="wrap clearBar" style="height:22px"><button type="button" class="dragBtn fl">Move to</button>
							<span class="name x_pull-left"><?php echo $__Context->val->name ?></span>
							<span class="side x_pull-right">
								<input type="hidden" name="column_key[]" value="<?php echo $__Context->key ?>" />
								<input type="hidden" id="column_option" name="column_option[]" value="<?php echo implode('|@|',array($__Context->val->display,$__Context->val->sort,$__Context->val->search)) ?>" />
								<input type="text" name="column_color[]" value="<?php echo htmlspecialchars($__Context->val->color) ?>" class="color-indicator" />
								<label class="x_inline" style="margin-left:15px" for="column_o1_<?php echo $__Context->key ?>"><input type="checkbox" id="column_o1_<?php echo $__Context->key ?>" value="Y" class="column_option column_display"<?php if($__Context->val->display == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->display ?> </label>
								<label class="x_inline"<?php if($__Context->dis_sort[$__Context->key]){ ?> style="text-decoration:line-through"<?php } ?> for="column_o2_<?php echo $__Context->key ?>"><input type="checkbox" id="column_o2_<?php echo $__Context->key ?>" value="Y" class="column_option column_sort"<?php if($__Context->dis_sort[$__Context->key]){ ?> disabled="true"<?php };
if($__Context->val->sort == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->sort ?> </label>
								<label class="x_inline"<?php if($__Context->dis_search[$__Context->key]){ ?> style="text-decoration:line-through"<?php } ?> for="column_o3_<?php echo $__Context->key ?>"><input type="checkbox" id="column_o3_<?php echo $__Context->key ?>" value="Y" class="column_option column_search"<?php if($__Context->dis_search[$__Context->key]){ ?> disabled="true"<?php };
if($__Context->val->search == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_search ?> </label>
							</span>
						</div>
					</td>
				</tr><?php } ?>
			</tbody>
		</table>
	</div>
	<div class="x_clearfix btnArea">
		<a class="x_pull-left x_btn x_btn-warning" href="#remakeCache" data-type="column"><?php echo $__Context->lang->cmd_remake_cache ?></a>
		<span class="x_pull-right">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->cmd_save ?></button>
		</span>
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/tpl','footer.html') ?>
