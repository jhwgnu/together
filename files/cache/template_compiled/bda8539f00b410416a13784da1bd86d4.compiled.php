<?php if(!defined("__XE__"))exit;
require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/module/tpl/filter','update_category.xml');$__xmlFilter->compile(); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/module/tpl','header.html') ?>
<?php 
	$__Context->validator_ids = array(
		'modules/module/tpl/category_list/1' => 1,
		'modules/module/tpl/category_list/2' => 1,
		'modules/module/tpl/category_update_form/1' => 1
	);
 ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && isset($__Context->validator_ids[$__Context->XE_VALIDATOR_ID])){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<!-- 카테고리의 위/아래, 삭제와 관련된 form -->
<form id="fo_category_info" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="module" />
	<input type="hidden" name="act" value="procModuleAdminDeleteCategory" />
    <input type="hidden" name="module_category_srl" value="" />
	<input type="hidden" name="xe_validator_id" value="modules/module/tpl/category_list/1" />
</form>
<table class="x_table x_table-striped x_table-hover">
	<thead>
		<tr>
			<th><?php echo $__Context->lang->category_title ?></th>
			<th><?php echo $__Context->lang->regdate ?></th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php if(!count($__Context->category_list)){ ?>
		<tr>
			<td colspan="3"><?php echo $__Context->lang->msg_category_is_null ?></td>
		</tr>
		<?php } ?>
		<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->key => $__Context->val){ ?>
		<tr>
			<td><?php echo $__Context->val->title ?></td>
			<td><?php echo zdate($__Context->val->regdate,"Y-m-d") ?></td>
			<td>
				<a class="x_btn x_btn-link" href="<?php echo getUrl('module_category_srl',$__Context->val->module_category_srl) ?>"><?php echo $__Context->lang->cmd_modify ?></a> 
				<i>|</i> 
				<button type="button" class="x_btn x_btn-link" onclick="doUpdateCategory('<?php echo $__Context->val->module_category_srl ?>','<?php echo $__Context->lang->confirm_delete ?>');return false;"><?php echo $__Context->lang->cmd_delete ?></button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<!-- 카테고리 추가 -->
<?php Context::addJsFile("modules/module/ruleset/insertCategory.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_clearfix"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertCategory" />
	<input type="hidden" name="module" value="module" />
	<input type="hidden" name="act" value="procModuleAdminInsertCategory" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="module_category_srl" value="" />
	<input type="hidden" name="xe_validator_id" value="modules/module/tpl/category_list/2" />
	<div class="x_pull-right x_input-append">
		<input type="text" name="title" title="<?php echo $__Context->lang->category_title ?>" placeholder="<?php echo $__Context->lang->category_title ?>" required />
		<input type="submit" class="x_btn x_btn-primary" value="<?php echo $__Context->lang->cmd_registration ?>">
	</div>
</form>
