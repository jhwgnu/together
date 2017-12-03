<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/admin/tpl/js/menu_setup.js--><?php $__tmp=array('modules/admin/tpl/js/menu_setup.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1><?php echo $__Context->lang->admin_setup ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_config_admin" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/admin_setup/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<section class="section">
	<h1><?php echo $__Context->lang->admin_title ?></h1>
	<form action="./" method="post" enctype="multipart/form-data" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procAdminUpdateConfig" />
		<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/admin_setup/1" />
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->admin_logo ?></label>
			<div class="x_controls">
				<?php if($__Context->config_object->adminLogo){ ?>
				<img src="<?php echo getUrl('').$__Context->config_object->adminLogo ?>" />
				<button type="submit" value="procAdminDeleteLogo" name="act" class="x_btn"><?php echo $__Context->lang->cmd_delete ?></button>
				<?php }else{ ?>
				<img src="<?php echo getUrl('');
echo $__Context->gnb_title_info->adminLogo ?>" />
				<?php } ?>
				<input type="file" name="adminLogo" id="adminLogo" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="adminTitle"><?php echo $__Context->lang->admin_title ?></label>
			<div class="x_controls">
				<input type="text" name="adminTitle" id="adminTitle" value="<?php echo $__Context->config_object->adminTitle ?>" placeholder="XE Admin" />
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->cmd_save ?></button>
			</div>
		</div>
	</fieldset>
	</form>
</section>
<section class="section">
	<h1><?php echo $__Context->lang->admin_menu_setup ?></h1>
	<form id="listForm" action="./" method="post" class="adminMap"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procMenuAdminDeleteItem" />
		<input type="hidden" name="menu_srl" value="<?php echo $__Context->menu_srl ?>" />
		<input type="hidden" name="title" value="<?php echo $__Context->menu_title ?>" />
		<input type="hidden" name="menu_item_srl" value="" />
		<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdminSetup') ?>" />
		<ul>
			<?php if($__Context->gnbUrlList&&count($__Context->gnbUrlList))foreach($__Context->gnbUrlList as $__Context->key=>$__Context->value){ ?><li class="parent">
				<input type="hidden" name="parent_key[]" value="<?php echo $__Context->value['parent_srl'] ?>" class="_parent_key" />
				<input type="hidden" name="item_key[]" value="<?php echo $__Context->value['node_srl'] ?>" class="_item_key" />
				<span><?php echo $__Context->value['text'] ?></span> <span class="side"><a href="#editMenu" class="modalAnchor _add"><?php echo $__Context->lang->add ?></a></span>
				<?php if(is_array($__Context->value['list']) && count($__Context->value['list'])>0){ ?><ul>
					<?php if($__Context->value['list']&&count($__Context->value['list']))foreach($__Context->value['list'] as $__Context->key2=>$__Context->value2){ ?><li>
					<input type="hidden" name="parent_key[]" value="<?php echo $__Context->value2['parent_srl'] ?>" class="_parent_key" />
					<input type="hidden" name="item_key[]" value="<?php echo $__Context->value2['node_srl'] ?>" class="_item_key" />
					<span><?php echo $__Context->value2['text'] ?></span><span class="side"><a href="#delete" class="_child_delete"><?php echo $__Context->lang->delete ?></a></span>
					</li><?php } ?>
				</ul><?php } ?>
			</li><?php } ?>
		</ul>
		<div class="x_clearfix btnArea">
			<div class="x_pull-left">
				<button value="procAdminMenuReset" name="act" type="submit" class="x_btn"><?php echo $__Context->lang->cmd_reset ?></button>
			</div>
			<div class="x_pull-right">
				<button type="submit" value="procMenuAdminArrangeItem" name="act" class="x_btn x_btn-primary"><?php echo $__Context->lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
<section class="x_modal" id="editMenu">
	<form id="editForm" action="./" class="x_form-horizontal" method="POST" style="margin:0"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<div class="x_modal-header">
		<h1><?php echo $__Context->lang->admin_menu_add ?></h1>
	</div>
	<div class="x_modal-body">
		<input type="hidden" name="module" value="menu" />
		<input type="hidden" name="act" value="procMenuAdminInsertItemForAdminMenu" />
		<input type="hidden" name="menu_srl" value="<?php echo $__Context->menu_srl ?>" />
		<input type="hidden" name="parent_srl" value="" />
		<div class="x_control-group">
			<label class="x_control-label" for="menuNameList"><?php echo $__Context->lang->module ?></label>
			<div class="x_controls">
				<select name="menu_name" id="menuNameList">
				</select>
			</div>
		</div>
	</div>
	<div class="x_modal-footer">
		<button type="button" class="x_btn x_pull-left" data-hide="#exModal-1">Close</button>
		<span class="x_btn-group x_pull-right">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->cmd_save ?></button>
		</span>
	</div>
	</form>
</section>
<style>
.adminMap ul{background:#eee;list-style:none;margin:0;position:relative;border-radius:5px}
.adminMap li{position:relative}
.adminMap li:first-child{border:0 !important} 
.adminMap li.parent{padding:0 15px 1px 15px;border-top:1px dotted #fff}
.adminMap li.parent>span{display:block;height:33px;line-height:33px;font-weight:bold}
.adminMap li>ul{background:#fff;border-radius:5px;margin:0 0 10px 0;box-shadow:0 0 4px #999 inset}
.adminMap li li{cursor:move;border-top:1px dotted #ddd}
.adminMap li *{vertical-align:middle}
.adminMap .moveTo{position:relative;z-index:2;width:22px;height:32px;padding:32px 0 0 0;margin:0 3px;_margin-top:-1px;overflow:hidden;background:url(<?php echo getUrl() ?>modules/admin/tpl/img/iconMoveTo.gif) no-repeat center 0;border:0;cursor:move}
.adminMap li.active{background-color:#f7f7f7;border-radius:3px;box-shadow:0 0 3px #666;border:0;padding:1px 0 0 0}
.adminMap li:first-child.active{padding:0}
.adminMap li.active .moveTo{background-position:center -32px}
.adminMap .side{position:absolute;top:0;right:15px;padding-top:0 !important;padding-bottom:0 !important;line-height:30px;background:transparent !important}
.adminMap .parent>.side{right:30px}
.adminMap .placeholder{background:#000;border-radius:5px}
</style>
