<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/importer/tpl','header.html') ?>
<!--#Meta:modules/importer/tpl/js/importer_admin.js--><?php $__tmp=array('modules/importer/tpl/js/importer_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/importer/tpl/index/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<form class="section" action="./" method="get" onsubmit="return doPreProcessing(this, 'documentForm')" id="documentForm"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="act" value="" />
	<input type="hidden" name="type" value="module" />
	<input type="hidden" name="unit_count" value="10" />
	<input type="hidden" name="xe_validator_id" value="modules/importer/tpl/index/1" />
	<h2><?php echo $__Context->lang->type_module ?></h2>
	<div class="x_control-group checkxml">
		<span class="x_input-append">
			<label><?php echo $__Context->lang->xml_path ?></label>
			<input type="text" name="xml_file" value="./" style="width:280px;font:11px Tahoma, Geneva, sans-serif" />
			<button type="button" class="x_btn"><?php echo $__Context->lang->cmd_check_path ?></button>
		</span>
		<p class="x_help-inline" style="line-height:26px"></p>
	</div>
	<div class="x_control-group xml ttxml">
		<label><?php echo $__Context->lang->data_destination ?></label>
		<input type="text" name="target_module" class="module_search" />
	</div>
	<div class="x_control-group ttxml">
		<label><?php echo $__Context->lang->guestbook_destination ?></label>
		<input type="text" name="guestbook_target_module" class="module_search" />
	</div>
	<div class="ttxml x_control-group">
		<label><?php echo $__Context->lang->about_ttxml_user_id ?></label>
		<input type="text" name="user_id" value="<?php echo $__Context->logged_info->user_id ?>" />
	</div>
	<div class="syncmember x_control-group">
		<label><input type="checkbox" name="isSync" value="Y" /> <?php echo $__Context->lang->type_syncmember ?></label>
		<p class="x_help-block"><?php echo $__Context->lang->import_step_desc[3] ?></p>
	</div>
	<div class="btnArea">
		<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->importer ?></button>
	</div>
</form>
<form class="section" action="./" method="get" onsubmit="return doPreProcessing(this, 'memberForm')" id="memberForm"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="type" value="member" />
	<input type="hidden" name="unit_count" value="100" />
	<input type="hidden" name="xe_validator_id" value="modules/importer/tpl/index/1" />
	<h2><?php echo $__Context->lang->type_member ?></h2>
	<div class="x_control-group checkxml">
		<span class="x_input-append">
			<label><?php echo $__Context->lang->xml_path ?></label>
			<input type="text" name="xml_file" value="./" style="width:280px;font:11px Tahoma, Geneva, sans-serif" />
			<button type="button" class="x_btn"><?php echo $__Context->lang->cmd_check_path ?></button>
		</span>
		<p class="x_help-inline" style="line-height:26px"><?php echo $__Context->lang->msg_no_xml_file ?></p>
	</div>
	<div class="x_control-group syncmember">
		<label><input type="checkbox" name="isSync" value="Y" /> <?php echo $__Context->lang->type_syncmember ?></label>
		<p class="x_help-block"><?php echo $__Context->lang->import_step_desc[3] ?></p>
	</div>
	<div class="btnArea">
		<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->importer ?></button>
	</div>
</form>
<form class="section" action="./" method="get" onsubmit="return doPreProcessing(this)" id="fo_import"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="type" value="message" />
	<input type="hidden" name="unit_count" value="100" />
	<input type="hidden" name="xe_validator_id" value="modules/importer/tpl/index/1" />
	<h2><?php echo $__Context->lang->type_message ?></h2>
	<div class="x_control-group checkxml">
		<span class="x_input-append">
			<label><?php echo $__Context->lang->xml_path ?></label>
			<input type="text" name="xml_file" value="./" style="width:280px;font:11px Tahoma, Geneva, sans-serif" />
			<button type="button" class="x_btn"><?php echo $__Context->lang->cmd_check_path ?></button>
		</span>
		<p class="x_help-inline" style="line-height:26px"></p>
	</div>
	<div class="btnArea">
		<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->importer ?></button>
	</div>
</form>
<a href="#process" class="modalAnchor"></a>
<div class="x_modal" id="process">
    <form action="./" method="get" onsubmit="return doImport()" id="fo_process"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
        <input type="hidden" name="type" value="" />
        <input type="hidden" name="total" value="" />
        <input type="hidden" name="cur" value="" />
        <input type="hidden" name="key" value="" />
        <input type="hidden" name="target_module" value="" />
        <input type="hidden" name="guestbook_target_module" value="" />
        <input type="hidden" name="unit_count" value="100" />
        <input type="hidden" name="user_id" value="" />
		<div class="x_modal-header">
			<h1 id="preProgressMsg"><?php echo $__Context->lang->preprocessing ?></h1>
			<h1 id="progressMsg" hidden><?php echo $__Context->lang->import_step_desc[99] ?></h1>
		</div>
		<div class="x_modal-body">
			<div class="x_progress x_progress-striped x_active">
				<div class="x_bar" id="progressBar" style="width: 0%"></div>
			</div>
			<strong id="progressPercent">0%</strong>
			(<span id="completeCount">0</span>/<span id="totalCount">0</span>)
		</div>
    </form>
</div>
<script>
jQuery('a.modalAnchor')
	.bind('before-close.mw', function(event){
	return false;
});
</script>
