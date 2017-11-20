<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/module/tpl','header.html') ?>
<!-- 카테고리 수정 -->
<?php if($__Context->selected_category){ ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/module/tpl/category_update_form/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<section class="section">
<?php Context::addJsFile("modules/module/ruleset/updateCategory.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="updateCategory" />
	<input type="hidden" name="module" value="module" />
	<input type="hidden" name="act" value="procModuleAdminUpdateCategory" />
	<input type="hidden" name="module_category_srl" value="<?php echo $__Context->selected_category->module_category_srl ?>" />
	<input type="hidden" name="mode" value="update" />
	<input type="hidden" name="xe_validator_id" value="modules/module/tpl/category_update_form/1" />
	<label for="category_title" style="display:inline-block;padding:4px 0 0 0"><strong><?php echo $__Context->lang->category_title ?></strong>: </label>
	<span class="x_input-append">
		<input type="text" name="title" id="category_title" value="<?php echo $__Context->selected_category->title ?>" />
		<input type="submit" class="x_btn x_btn-primary" value="<?php echo $__Context->lang->cmd_registration ?>">
	</span>
</form>
</section>
<?php } ?>
