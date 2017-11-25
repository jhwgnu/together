<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/editor/tpl/js/editor_module_config.js--><?php $__tmp=array('modules/editor/tpl/js/editor_module_config.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1><?php echo $__Context->lang->editor ?> <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_advanced_editor" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/editor/tpl/admin_index/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<!-- Editor Preview -->
<section class="section">
	<h1><?php echo $__Context->lang->editor_now ?></h1>
	<div class="x_tabbable _preview">
		<ul class="x_nav x_nav-tabs" style="margin-bottom:0;border-bottom:0">
			<li class="x_active"><a href="#pre_document"><?php echo $__Context->lang->main_editor ?></a></li>
			<li><a href="#pre_comment"><?php echo $__Context->lang->comment_editor ?></a></li>
		</ul>
		<div class="x_tab-content x_thumbnail">
			<div class="x_tab-pane x_active" id="pre_document">
				<iframe src="<?php echo getUrl('','act', 'dispEditorConfigPreview','mode','main') ?>" id="pre_document_frame" frameborder="0" style="border:0"></iframe>
			</div>
			<div class="x_tab-pane" id="pre_comment">
				<iframe src="<?php echo getUrl('','act', 'dispEditorConfigPreview','mode','comment') ?>" id="pre_comment_frame" frameborder="0" style="border:0"></iframe> 
			</div>
		</div>
	</div>
</section>
<!-- Editor Option -->
<section class="section">
	<h1><?php echo $__Context->lang->editor_option ?></h1>
	<?php Context::addJsFile("modules/editor/ruleset/generalConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post"  class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="generalConfig" />
		<input type="hidden" name="module" value="editor" />
		<input type="hidden" name="act" value="procEditorAdminGeneralConfig" />
		<input type="hidden" name="xe_validator_id" value="modules/editor/tpl/admin_index/1" />
		<div class="x_control-group">
			<label for="change_lang_type" class="x_control-label"><?php echo $__Context->lang->guide_choose_main_editor ?></label>
			<div class="x_controls">
				<?php if($__Context->editor_skin_list&&count($__Context->editor_skin_list))foreach($__Context->editor_skin_list as $__Context->editor){ ?>
				<label class="x_inline" id="label_doc_<?php echo $__Context->editor ?>">
					<input type="radio" name="editor_skin" value="<?php echo $__Context->editor ?>" id="doc_<?php echo $__Context->editor ?>" onClick="getEditorSkinColorList(this.value, null, 'document','label_doc_<?php echo $__Context->editor ?>')"<?php if($__Context->editor==$__Context->editor_config->editor_skin){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->editor ?>
				</label>
				<label class="x_inline">
					<select name="sel_editor_colorset"<?php if($__Context->editor!=$__Context->editor_config->editor_skin){ ?> style="display:none"<?php } ?>>
						<?php if($__Context->editor==$__Context->editor_config->editor_skin){;
if($__Context->editor_colorset_list&&count($__Context->editor_colorset_list))foreach($__Context->editor_colorset_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->name ?>"<?php if($__Context->editor_config->sel_editor_colorset == $__Context->val->name){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php }} ?>
					</select>
				</label>
				<br />
				<?php } ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="editor_height" class="x_control-label"><?php echo $__Context->lang->guide_set_height_main_editor ?></label>
			<div class="x_controls">
				<input type="number" name="editor_height" id="editor_height"<?php if($__Context->editor_config->editor_height){ ?> value="<?php echo $__Context->editor_config->editor_height ?>"<?php };
if(!$__Context->editor_config->editor_height){ ?> value="<?php echo $__Context->editor_config_default['editor_height'] ?>"<?php } ?> /> px
			</div>
		</div>
		<div class="x_control-group">
			<label for="sel_comment_editor_colorset" class="x_control-label"><?php echo $__Context->lang->guide_choose_comment_editor ?></label>
			<div class="x_controls">
				<?php if($__Context->editor_skin_list&&count($__Context->editor_skin_list))foreach($__Context->editor_skin_list as $__Context->editor){ ?>
				<label class="x_inline" id="label_com_<?php echo $__Context->editor ?>">
					<input type="radio" name="comment_editor_skin" value="<?php echo $__Context->editor ?>" id="com_<?php echo $__Context->editor ?>"  onclick="getEditorSkinColorList(this.value, null, 'reply','label_com_<?php echo $__Context->editor ?>')"<?php if($__Context->editor == $__Context->editor_config->comment_editor_skin){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->editor ?>
				</label>
				<label class="x_inline">
					<select name="sel_comment_editor_colorset"<?php if($__Context->editor!=$__Context->editor_config->comment_editor_skin){ ?> style="display:none"<?php } ?>>
						<?php if($__Context->editor==$__Context->editor_config->comment_editor_skin){;
if($__Context->editor_colorset_list&&count($__Context->editor_colorset_list))foreach($__Context->editor_colorset_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->name ?>"<?php if($__Context->editor_config->sel_comment_editor_colorset == $__Context->val->name){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php }} ?>
					</select>
				</label>
				<br />
				<?php } ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="comment_editor_height" class="x_control-label"><?php echo $__Context->lang->guide_set_height_comment_editor ?></label>
			<div class="x_controls">
				<input type="number" name="comment_editor_height" id="comment_editor_height"<?php if($__Context->editor_config->comment_editor_height){ ?> value="<?php echo $__Context->editor_config->comment_editor_height ?>"<?php };
if(!$__Context->editor_config->comment_editor_height){ ?> value="<?php echo $__Context->editor_config_default['comment_editor_height'] ?>"<?php } ?> /> px
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->guide_choose_text_formatting ?></label>
			<div class="x_controls">
					<?php if($__Context->content_style_list&&count($__Context->content_style_list))foreach($__Context->content_style_list as $__Context->key => $__Context->val){ ?>
					<label class="x_inline">
						<input type="radio" name="content_style" value="<?php echo $__Context->key ?>" id="style_<?php echo $__Context->key ?>"<?php if($__Context->key==$__Context->editor_config->content_style||!$__Context->editor_config->content_style && $__Context->key=='default'){ ?> checked="checked"<?php } ?>> <?php echo $__Context->val->title ?>
					</label>
					<?php } ?>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->guide_choose_font_body ?></label>
			<div class="x_controls">
				<?php  
					if($__Context->editor_config->content_font_size) $__Context->fontSize = str_replace('px','',$__Context->editor_config->content_font_size);
					else $__Context->fontSize = str_replace('px','',$__Context->editor_config_default['content_font_size']);
				 ?>
				<div style="margin-right:14px">
					<textarea rows="4" cols="42" class="fontPreview" style="font-family:<?php echo $__Context->editor_config->content_font ?>;font-size:<?php echo $__Context->fontSize ?>px;width:100%" title="Font Preview"><?php echo $__Context->lang->font_preview ?></textarea>
				</div>
				<label style="font-family:''" class="fontSelector">
					<input type="radio" name="content_font" id="font_noFont" value=""<?php if(!$__Context->editor_config->content_font && $__Context->editor_config->font_defined!= 'Y'){ ?> checked="checked"<?php } ?> />none(inherit)
				</label>
				<?php if($__Context->lang->edit->fontlist&&count($__Context->lang->edit->fontlist))foreach($__Context->lang->edit->fontlist as $__Context->name=>$__Context->detail){ ?><label style="font-family:<?php echo $__Context->detail ?>" class="fontSelector">
					<input type="radio" name="content_font" id="font_<?php echo $__Context->name ?>" value="<?php echo $__Context->detail ?>"<?php if(stripcslashes($__Context->editor_config->content_font)==$__Context->detail && $__Context->editor_config->font_defined!= 'Y'){ ?> checked="checked"<?php } ?> /><?php echo $__Context->detail ?>
				</label><?php } ?>
				<label>
					<input type="radio" name="font_defined" id="font_defined" value="Y"<?php if($__Context->editor_config->font_defined== 'Y'){ ?> checked="checked"<?php } ?> /><?php echo $__Context->lang->by_you ?> : 
					<input type="text" name="content_font_defined"<?php if($__Context->editor_config->font_defined == 'Y'){ ?> value="<?php echo stripcslashes($__Context->editor_config->content_font) ?>"<?php } ?> />
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="fontSize"><?php echo $__Context->lang->guide_choose_font_size_body ?></label>
			<div class="x_controls">
				<input type="number" id="fontSize" name="content_font_size" value="<?php echo $__Context->fontSize ?>" /> px
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
<!-- Editor Preview -->
<section class="section">
	<h1><?php echo $__Context->lang->editor_component ?></h1>
	<?php Context::addJsFile("modules/editor/ruleset/componentOrderAndUse.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="componentOrderAndUse" />
		<input type="hidden" name="module" value="editor" />
		<input type="hidden" name="act" value="procEditorAdminCheckUseListOrder" />
		<input type="hidden" name="xe_validator_id" value="modules/editor/tpl/admin_index/1" />
		<table class="x_table x_table-striped x_table-hover sortable">
			<caption><strong><?php echo $__Context->lang->total_count ?>(<?php echo $__Context->component_count ?>)</strong></caption>
			<thead>
				<tr>
					<th class="nowr"><?php echo $__Context->lang->cmd_move ?></th>
					<th><?php echo $__Context->lang->component_name ?></th>
					<th class="nowr"><?php echo $__Context->lang->version ?></th>
					<th class="nowr"><?php echo $__Context->lang->author ?></th>
					<th class="nowr"><?php echo $__Context->lang->path ?></th>
					<th class="nowr"><?php echo $__Context->lang->use ?></th>
					<th class="nowr"><?php echo $__Context->lang->cmd_delete ?></th>
				</tr>
			</thead>
			<tbody class="uDrag">
				<?php if($__Context->component_list&&count($__Context->component_list))foreach($__Context->component_list as $__Context->component_name => $__Context->xml_info){ ?>
				<tr>
					<td><div class="wrap" style="height:70px"><button type="button" class="dragBtn">Move to</button></div></td>
					<td class="title">
						<input type="hidden" name="component_names[]" value="<?php echo $__Context->xml_info->component_name ?>" />
						<p><b><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispEditorAdminSetupComponent', 'component_name', $__Context->xml_info->component_name) ?>"><?php echo $__Context->xml_info->title ?></a></b></p>
						<p><?php echo nl2br($__Context->xml_info->description) ?></p>
						<?php if($__Context->xml_info->version && $__Context->xml_info->need_update == 'Y'){ ?>
						<p class="update"><?php echo $__Context->lang->msg_avail_easy_update ?><a href="<?php echo getUrl('act','dispAutoinstallAdminInstall','package_srl',$__Context->xml_info->package_srl) ?>"><?php echo $__Context->lang->msg_do_you_like_update ?></a></p>
						<?php } ?>
					</td>
					<td><?php echo $__Context->xml_info->version ?></td>
					<td class="nowr">
						<?php if($__Context->xml_info->author&&count($__Context->xml_info->author))foreach($__Context->xml_info->author as $__Context->author){ ?><a href="<?php echo $__Context->author->homepage ?>" target="_blank"><?php echo $__Context->author->name ?></a><?php } ?>
					</td>
					<td><?php echo $__Context->xml_info->path ?></td>
					<td><input type="checkbox" name="enables[]" id="enable" value="<?php echo $__Context->xml_info->component_name ?>" title="Use this component " <?php if($__Context->xml_info->enabled=='Y'){ ?> checked="checked"<?php } ?> /></td>
					<td>
						<?php if($__Context->xml_info->version && $__Context->xml_info->delete_url){ ?>
						<a href="<?php echo $__Context->xml_info->delete_url ?>"><?php echo $__Context->lang->cmd_delete ?></a>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="x_clearfix">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
<script>
jQuery(function($){
// Editor Preview
	function preview(){
		$('._preview iframe').css({
			width	: "100%",
			height	: "450px"
		});
	}
	preview();
	$('._preview li>a').click(preview);
	
//init
	var fontPreview = $('.fontPreview');
	var fontSelector = $('.fontSelector');
	var checkedFont = fontSelector.filter(':checked').css('fontFamily');
	var changedSize = $('#fontSize').val();
//change event
	fontSelector.change(function(){
		var myFont = $(this).css('fontFamily');
		fontPreview.css('fontFamily',myFont);
	});
	$('#fontSize').keyup(function(){
		var mySize = $(this).val();
		fontPreview.css('fontSize',mySize+'px');
	}).change(function(){$(this).keyup()});
	$('input[name=font_defined]').click(function(){
		$('input[name=content_font]').removeAttr('checked');
	});
	$('input[name=content_font]').click(function(){
		$('input[name=font_defined]').removeAttr('checked');
	});
});
</script>
