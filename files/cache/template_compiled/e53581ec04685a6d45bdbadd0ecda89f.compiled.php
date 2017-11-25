<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/tpl','header.html') ?>
<?php  $__Context->mod_info_arr = (array) $__Context->module_info ?>
<form action="./" method="post" enctype="multipart/form-data" class="x_form-horizontal dx_skininfo"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module=='admin'?'admin':$__Context->module_info->module ?>" />
	<input type="hidden" name="act" value="procBeluxeAdminUpdateSkinInfo" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
	<input type="hidden" name="_mode" value="<?php echo $__Context->act == 'dispBeluxeAdminMobileSkinInfo' ? 'M' : 'P' ?>" />
	<section class="section collapsed">
	<h1><?php echo $__Context->skin_info->title ?></h1>
		<div class="x_control-group">
			<label class="x_control-label">Version</label>
			<div class="x_controls"><?php echo $__Context->skin_info->version ?> (<?php echo zdate($__Context->skin_info->date, 'Y-m-d') ?>)</div>
		</div>
		<div class="x_control-group">
			<div class="x_controls">
				<?php if($__Context->skin_info->author&&count($__Context->skin_info->author))foreach($__Context->skin_info->author as $__Context->author){ ?>
					<?php echo $__Context->author->name ?>
					<?php if($__Context->author->homepage || $__Context->author->email_address){ ?>
						(<?php if($__Context->author->homepage){ ?><a href="<?php echo $__Context->author->homepage ?>" target="_blank"><?php echo $__Context->author->homepage ?></a><?php } ?>
						<?php if($__Context->author->homepage && $__Context->author->email_address){ ?>, <?php } ?>
						<?php if($__Context->author->email_address){ ?><a href="mailto:<?php echo $__Context->author->email_address ?>"><?php echo $__Context->author->email_address ?></a><?php } ?>)
					<?php } ?><br />
				<?php } ?>
			</div>
		</div>
		<?php if($__Context->skin_info->license || $__Context->skin_info->license_link){ ?><div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->skin_license ?></label>
			<div class="x_controls"><?php echo nl2br(trim($__Context->skin_info->license)) ?>
				<?php if($__Context->skin_info->license_link){ ?><p><a href="<?php echo $__Context->skin_info->license_link ?>" onclick="window.close(); return false;"><?php echo $__Context->skin_info->license_link ?></a></p><?php } ?>
			</div>
		</div><?php } ?>
		<?php if($__Context->skin_info->description){ ?><div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->description ?></label>
			<div class="x_controls"><?php echo nl2br(trim($__Context->skin_info->description)) ?></div>
		</div><?php } ?>
	<?php if($__Context->skin_info->colorset){ ?>
	</section>
	<section class="section">
		<h1><?php echo $__Context->lang->colorset ?></h1>
			<div class="x_control-group">
				<?php  $__Context->skin_vars['colorset']->value ? 0 : $__Context->skin_vars['colorset']->value = $__Context->skin_info->colorset[0]->name ?>
				<div class="x_controls">
					<?php if($__Context->skin_info->colorset&&count($__Context->skin_info->colorset))foreach($__Context->skin_info->colorset as $__Context->key=>$__Context->val){ ?>
						<?php if($__Context->val->screenshot){ ?>
						<?php  $__Context->_img_info = getImageSize($__Context->val->screenshot); $__Context->_height = $__Context->_img_info[1]+40; $__Context->_width = $__Context->_img_info[0]+20; $__Context->_talign = "center";  ?>
						<?php }else{ ?>
						<?php  $__Context->_width = 200; $__Context->_height = 20; $__Context->_talign = "left";  ?>
						<?php } ?>
						<div style="display:inline-block;text-align:<?php echo $__Context->_talign ?>;margin-bottom:1em;width:<?php echo $__Context->_width ?>px;height:<?php echo $__Context->_height ?>px;margin-right:10px;">
							<input type="radio" name="colorset" value="<?php echo $__Context->val->name ?>" id="colorset_<?php echo $__Context->key ?>"<?php if($__Context->skin_vars['colorset']->value==$__Context->val->name){ ?> checked="checked"<?php } ?> />
							<label for="colorset_<?php echo $__Context->key ?>"><?php echo $__Context->val->title ?></label>
							<?php if($__Context->val->screenshot){ ?>
								<br />
								<img src="/<?php echo $__Context->val->screenshot ?>" alt="<?php echo $__Context->val->title ?>" style="border:1px solid #888888;padding:2px;margin:2px;"/>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
	<?php } ?>
	<?php if($__Context->skin_info->extra_vars&&count($__Context->skin_info->extra_vars))foreach($__Context->skin_info->extra_vars as $__Context->key=>$__Context->val){ ?>
		<?php if($__Context->val->group && ((!$__Context->group) || $__Context->group != $__Context->val->group)){ ?>
			<?php $__Context->group = $__Context->val->group ?>
			</section>
			<section class="section"<?php if($__Context->group == '/_HIDDEN_/'){ ?> style="display:none"<?php } ?>>
			<h1><?php echo $__Context->group ?></h1>
		<?php } ?>
		<?php 
			$__Context->target = strpos($__Context->val->default, '/_TARGET_/')!==false ? explode('/_TARGET_/', $__Context->val->default) : array();
			$__Context->val->default = count($__Context->target) ? $__Context->target[0] : $__Context->val->default;
			$__Context->value = $__Context->skin_vars[$__Context->val->name] ? $__Context->skin_vars[$__Context->val->name]->value : '';
			$__Context->value = empty($__Context->value) ? ($__Context->val->type === 'checkbox' ? explode(',', $__Context->val->default) : $__Context->val->default) : $__Context->value;
		 ?>
		<?php if($__Context->val->type == '_SET_SYNC_OPTIONS_'){ ?>
			<input type="hidden" name="_SET_SYNC_OPTIONS_[]" value="<?php echo $__Context->val->name ?>" checked="checked" />
		<?php }elseif($__Context->val->type == '_REQUEST_SYNC_OPTIONS_'){ ?>
			<input type="hidden" name="<?php echo $__Context->val->name ?>" value="<?php echo $__Context->value ?>" />
		<?php }else{ ?>
			<div class="x_control-group" <?php if(count($__Context->target)){ ?>style="display:none" data-info-target="<?php echo $__Context->target[1] ?>"<?php } ?>>
				<label class="x_control-label" for="lang_<?php echo $__Context->val->name ?>"><?php echo $__Context->val->title ?></label>
				<div class="x_controls">
					<?php if($__Context->val->type == 'number'){ ?>
						<input type="text" name="<?php echo $__Context->val->name ?>" id="lang_<?php echo $__Context->val->name ?>" value="<?php echo htmlspecialchars($__Context->value, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
					<?php } ?>
					<?php if($__Context->val->type == 'text'){ ?>
						<input type="text" name="<?php echo $__Context->val->name ?>" id="<?php echo $__Context->val->name ?>" class="lang_code" value="<?php echo htmlspecialchars($__Context->value, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
					<?php } ?>
					<?php if($__Context->val->type == 'textarea'){ ?>
						<textarea name="<?php echo $__Context->val->name ?>" class="lang_code" id="<?php echo $__Context->val->name ?>" rows="8" cols="42"><?php echo htmlspecialchars($__Context->value, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?></textarea>
					<?php } ?>
					<?php if($__Context->val->type == 'select'){ ?>
						<select name="<?php echo $__Context->val->name ?>" id="lang_<?php echo $__Context->val->name ?>">
							<?php if($__Context->val->options&&count($__Context->val->options))foreach($__Context->val->options as $__Context->k=>$__Context->v){ ?><option value="<?php echo $__Context->v->value ?>"<?php if($__Context->v->value == $__Context->value){ ?> selected="selected"<?php } ?>><?php echo $__Context->v->title ?></option><?php } ?>
						</select>
					<?php } ?>
					<?php if($__Context->val->type == 'checkbox'){ ?>
						<?php if($__Context->val->options&&count($__Context->val->options))foreach($__Context->val->options as $__Context->k=>$__Context->v){ ?><label class="x_inline"<?php if($__Context->v->title==='/_HIDDEN_/'){ ?> style="display:none"<?php } ?>>
							<?php 
								$__Context->value = is_string($__Context->value) ? unserialize($__Context->value) : $__Context->value;
								$__Context->is_check = in_array($__Context->v->value, $__Context->value) || $__Context->v->title==='/_HIDDEN_/';
							 ?>
							<input type="checkbox" name="<?php echo $__Context->val->name ?>[]" value="<?php echo $__Context->v->value ?>" id="ch_<?php echo $__Context->key ?>_<?php echo $__Context->k ?>"<?php if($__Context->is_check){ ?> checked="checked"<?php } ?> class="checkbox" />
							<?php echo $__Context->v->title ?>
						</label><?php } ?>
					<?php } ?>
					<?php if($__Context->val->type == 'radio'){ ?>
						<?php if($__Context->val->options&&count($__Context->val->options))foreach($__Context->val->options as $__Context->k=>$__Context->v){ ?><label class="x_inline">
							
							<?php if(strpos($__Context->v->value, '|_TARGET_|')!==false){ ?>
							<?php 
								$__Context->a = explode('|_TARGET_|', $__Context->v->value);
								$__Context->v->value = $__Context->a[0];
							 ?>
							<?php } ?>
							<input type="radio" name="<?php echo $__Context->val->name ?>" value="<?php echo $__Context->v->value ?>"<?php if($__Context->v->value==$__Context->value){ ?> checked="checked"<?php } ?> />
							<?php echo $__Context->v->title ?>
						</label><?php } ?>
					<?php } ?>
					<?php if($__Context->val->type == 'image'){ ?>
						<?php if($__Context->value){ ?><div>
							<img src="<?php echo $__Context->value ?>" /><br />
							<input type="checkbox" name="del_<?php echo $__Context->val->name ?>" value="Y" id="del_<?php echo $__Context->val->name ?>" class="checkbox" />
							<label for="del_<?php echo $__Context->val->name ?>"><?php echo $__Context->lang->cmd_delete ?></label>
						</div><?php } ?>
						<input type="file" name="<?php echo $__Context->val->name ?>" value="" />
					<?php } ?>
					<?php  $__Context->val->description = preg_replace('/\[help\](.*)\|\|(.*)\[\/help\]/i', '<a href="#popup_help" data-text="$2">$1</a>', $__Context->val->description) ?>
					<?php if($__Context->val->description){ ?><a href="#about_<?php echo $__Context->val->name ?>" data-toggle class="x_icon-question-sign"<?php if($__Context->val->type == 'textarea'){ ?> style="vertical-align:top;margin-top:5px"<?php } ?>><?php echo $__Context->lang->help ?></a><?php } ?>
					<?php if($__Context->val->description){ ?><p class="x_help-block" id="about_<?php echo $__Context->val->name ?>" hidden><?php echo nl2br(trim($__Context->val->description)) ?></p><?php } ?>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
	</section>
	<div class="x_clearfix btnArea">
		<span class="x_pull-right">
			<input class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->lang->cmd_update ?>" />
		</span>
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/tpl','footer.html') ?>
