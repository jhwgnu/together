<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/tpl','header.html') ?>
<?php if(($__Context->m_allset_targets||$__Context->m_copy_target)||count($__Context->module_backup_options)){ ?><div class="message update">
	<?php if($__Context->m_allset_targets||$__Context->m_copy_target){ ?><p><?php echo $__Context->m_copy_target ? $__Context->lang->about_setting_copy : $__Context->lang->about_all_setting ?><br /><?php echo $__Context->lang->target ?>: <?php echo $__Context->m_copy_target ? $__Context->m_copy_target : $__Context->m_allset_targets ?></p><?php } ?>
	<?php if(count($__Context->module_backup_options)){ ?><p><?php echo $__Context->lang->msg_module_backup_options ?></p><?php } ?>
</div><?php } ?>
<?php Context::addJsFile("modules/beluxe/ruleset/insertBeluxe.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" enctype="multipart/form-data" class="x_form-horizontal" id="dxiInsertFrm"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertBeluxe" />
<?php if(!$__Context->m_allset_targets&&!$__Context->m_copy_target){ ?><input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" /><?php } ?>
<input type="hidden" name="module" value="<?php echo $__Context->module=='admin'?'admin':$__Context->module_info->module ?>" />
<input type="hidden" name="act" value="procBeluxeAdminInsert" />
<input type="hidden" name="site_srl" value="<?php echo $__Context->module_info->site_srl ?>" />
<input type="hidden" name="use_update_vote_count" value="Y" />
<input type="hidden" name="use_vote_point_check" value="N" />
<input type="hidden" name="use_vote_point_recover" value="N" />
<input type="hidden" name="use_vote_point_range" value="N" />
<input type="hidden" name="use_lock_owner_comment" value="N" />
<input type="hidden" name="use_lock_comment_count" value="0" />
<?php if($__Context->is_poped){ ?><input type="hidden" name="is_poped" value="1" /><?php } ?>
<div class="<?php echo $__Context->is_poped?'x_modal-body':'' ?>">
	<?php if($__Context->m_copy_target){ ?><section class="section">
		<h1><?php echo $__Context->lang->module ?></h1>
		<div class="x_control-group">
			<label class="x_control-label" for="id_t_module_mid"><em style="color:red">*</em> <?php echo $__Context->lang->mid ?></label>
			<div class="x_controls opt_bks">
				<input id="id_t_module_mid" type="text" name="module_mid" value="" />
				<a href="#about_mid" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="about_mid" hidden><?php echo $__Context->lang->about_mid ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="id_t_module_category_srl"><?php echo $__Context->lang->module_category ?></label>
			<div class="x_controls opt_bks">
				<select id="id_t_module_category_srl" name="module_category_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->module_category&&count($__Context->module_category))foreach($__Context->module_category as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->module_category_srl == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
				<a href="#about_module_category" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="about_module_category" hidden><?php echo $__Context->lang->about_module_category ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_id_t_browser_title"><?php echo $__Context->lang->browser_title ?></label>
			<div class="x_controls opt_bks">
				<input id="id_t_browser_title" type="text" class="lang_code" name="browser_title" value="<?php echo htmlspecialchars($__Context->module_info->browser_title, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
				<a href="#about_browser_title" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="about_browser_title" hidden><?php echo $__Context->lang->about_browser_title ?></p>
			</div>
		</div>
		<input type="hidden" name="target_module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
		<input type="hidden" name="skin" value="<?php echo $__Context->module_info->skin ?>" />
		<input type="hidden" name="default_type" value="<?php echo $__Context->module_info->default_type ?>" />
		<input type="hidden" name="default_type_option" value="<?php echo $__Context->module_info->default_type_option ?>" />
		<div class="x_clearfix btnArea">
			<span class="x_pull-right">
				<input class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->lang->module ?> <?php echo $__Context->lang->cmd_copy ?>" accesskey="s" />
			</span>
		</div>
		<div class="message">
			<p><h4><?php echo $__Context->lang->about_setting_copy2 ?></h4></p>
		</div>
	</section><?php } ?>
	<?php if($__Context->module!='admin'){ ?>
		<input type="hidden" name="module_category_srl" value="<?php echo $__Context->module_info->module_category_srl ?>" />
		<input type="hidden" name="module_mid" value="<?php echo $__Context->module_info->mid ?>" />
	<?php } ?>
	<?php if($__Context->m_allset_targets){ ?>
		<input type="hidden" name="module_mid" value="target_module_mids" />
		<input type="hidden" name="target_module_mids" value="<?php echo $__Context->m_allset_targets ?>" />
	<?php } ?>
	<?php if(!$__Context->m_allset_targets&&!$__Context->m_copy_target){ ?><section class="section">
		<h1><?php echo $__Context->lang->module ?></h1>
		<?php if($__Context->module=='admin'){ ?>
			<div class="x_control-group">
				<label class="x_control-label" for="id_module_mid"><em style="color:red">*</em> <?php echo $__Context->lang->mid ?></label>
				<div class="x_controls">
					<input id="id_module_mid" type="text" name="module_mid" required value="<?php echo $__Context->module_info->mid ?>" />
					<a href="#about_mid" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
					<p class="x_help-block" id="about_mid" hidden><?php echo $__Context->lang->about_mid ?></p>
				</div>
			</div>
			<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
				<label class="x_control-label" for="id_module_category_srl"><?php echo $__Context->lang->module_category ?></label>
				<div class="x_controls">
					<select id="id_module_category_srl" name="module_category_srl">
						<option value="0"><?php echo $__Context->lang->notuse ?></option>
						<?php if($__Context->module_category&&count($__Context->module_category))foreach($__Context->module_category as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->module_category_srl == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
					</select>
					<a href="#about_module_category" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
					<p class="x_help-block" id="about_module_category" hidden><?php echo $__Context->lang->about_module_category ?></p>
				</div>
			</div>
		<?php } ?>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_id_browser_title"><?php echo $__Context->lang->browser_title ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['browser_title']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['browser_title']?'opt_bks':'' ?>">
				<input id="id_browser_title" type="text" class="lang_code" name="browser_title" value="<?php echo htmlspecialchars($__Context->module_info->browser_title, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
				<a href="#about_browser_title" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="about_browser_title" hidden><?php echo $__Context->lang->about_browser_title ?></p>
			</div>
		</div>
	</section><?php } ?>
	<section class="section <?php echo $__Context->m_copy_target?'collapsed':'' ?>">
		<h1><?php echo $__Context->lang->layout ?></h1>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="id_layout_srl"><?php echo $__Context->lang->layout ?></label>
			<div class="x_controls">
				<select id="id_layout_srl" name="layout_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->layout_list&&count($__Context->layout_list))foreach($__Context->layout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->layout_srl == $__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
				</select>
				<a href="#about_layout" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_layout" class="x_help-block" hidden><?php echo $__Context->lang->about_layout ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="id_mlayout_srl"><?php echo $__Context->lang->mobile_layout ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_mobile']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_mobile']?'opt_bks':'' ?>">
				<select id="id_mlayout_srl" name="mlayout_srl">
				<option value="0"><?php echo $__Context->lang->notuse ?></option>
				<?php if($__Context->mlayout_list&&count($__Context->mlayout_list))foreach($__Context->mlayout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->use_mobile=='Y'&&$__Context->module_info->mlayout_srl==$__Context->val->layout_srl){ ?> selected="selected"<?php } ?> ><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
				</select>
				<a href="#about_mobile_view" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_mobile_view" class="x_help-block" hidden><?php echo $__Context->lang->about_mobile_view ?></p>
				<label for="use_mobile_uploader">
					<input type="checkbox" name="use_mobile_uploader" id="use_mobile_uploader" value="Y"<?php if($__Context->module_info->use_mobile_uploader=='Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->use_mobile_uploader ?>
				</label>
				<p id="about_mobile_uploader" class="x_help-block"><?php echo $__Context->lang->about_mobile_uploader ?></p>
			</div>
		</div>
	</section>
	<?php if(!$__Context->m_allset_targets&&!$__Context->m_copy_target){ ?><section class="section">
		<h1><?php echo $__Context->lang->skin ?></h1>
		<div class="x_control-group">
			<label class="x_control-label" for="id_skin"><?php echo $__Context->lang->skin ?></label>
			<div class="x_controls">
				<select id="id_skin" name="skin" data-default="<?php echo $__Context->module_srl?$__Context->module_info->skin:'default' ?>">
					<?php if(!$__Context->skin_list || !count($__Context->skin_list)){ ?><option value=""><?php echo $__Context->lang->notuse ?></option><?php } ?>
					<?php if($__Context->skin_list&&count($__Context->skin_list))foreach($__Context->skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if(($__Context->module_srl && $__Context->module_info->skin == $__Context->key) || (!$__Context->module_srl && $__Context->key == 'default')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
				<a href="#about_skin" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_skin" class="x_help-block" hidden><?php echo (!$__Context->skin_list || !count($__Context->skin_list)) ? $__Context->lang->about_download_skin : $__Context->lang->about_skin ?></p>
			</div>
			<p class="x_controls msg_call_server" style="display:none"><strong style="color:blue"><?php echo $__Context->lang->msg_call_server ?></strong></p>
		</div>
		<?php if(count($__Context->skin_list)&&count($__Context->default_type_list)){ ?><div class="x_control-group <?php echo $__Context->module_info->module_srl&&!$__Context->module_info->default_type?'opt_bks':'' ?>">
			<label class="x_control-label" for="id_skin_type"><?php echo $__Context->lang->skin_type ?></label>
			<div class="x_controls">
				<?php  $__Context->t_dftype = $__Context->module_info->default_type ?>
				<?php if($__Context->default_type_list[$__Context->t_dftype] && $__Context->module_info->default_type_option){ ?>
				<?php 
					$__Context->df_navi = explode('|@|', $__Context->module_info->default_type_option);
					$__Context->default_type_list[$__Context->t_dftype]->sort_index = $__Context->df_navi[0];
					$__Context->default_type_list[$__Context->t_dftype]->order_type = $__Context->df_navi[1];
					$__Context->default_type_list[$__Context->t_dftype]->list_count = $__Context->df_navi[2];
					$__Context->default_type_list[$__Context->t_dftype]->page_count = $__Context->df_navi[3];
					$__Context->default_type_list[$__Context->t_dftype]->clist_count = $__Context->df_navi[4];
					$__Context->default_type_list[$__Context->t_dftype]->dlist_count = is_null($__Context->df_navi[5]) ? $__Context->df_navi[2] : $__Context->df_navi[5];
				 ?>
				<?php } ?>
				<select id="id_skin_type" name="default_type" data-skin="<?php echo $__Context->module_srl?$__Context->module_info->skin:'default' ?>" data-default="<?php echo $__Context->t_dftype ?>">
				<?php if($__Context->default_type_list&&count($__Context->default_type_list))foreach($__Context->default_type_list as $__Context->key=>$__Context->val){ ?>
					<?php  $__Context->tmp = array($__Context->val->sort_index,$__Context->val->order_type,$__Context->val->list_count,$__Context->val->page_count,$__Context->val->clist_count,$__Context->val->dlist_count) ?>
					<option value="<?php echo $__Context->key ?>" data-option="<?php echo implode('|@|', $__Context->tmp) ?>"<?php if($__Context->key==$__Context->module_info->default_type){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option>
				<?php } ?>
				</select>
				<p class="x_help-block"><?php echo sprintf($__Context->lang->about_skin_type,getUrl('', 'module', 'admin', 'module_srl', $__Context->module_srl, 'act', 'dispBeluxeAdminCategoryInfo')) ?></p>
			</div>
			<?php 
				reset($__Context->default_type_list);
				$__Context->t_dftype = $__Context->default_type_list[$__Context->t_dftype] ? $__Context->default_type_list[$__Context->t_dftype] : current($__Context->default_type_list);
			 ?>
			<div class="x_controls">
				<label>
					<select name="default_sort_index">
						<?php if($__Context->order_target&&count($__Context->order_target))foreach($__Context->order_target as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->t_dftype->sort_index == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
					</select>
					<?php echo $__Context->lang->order_target ?>
				</label>
				<label>
					<select name="default_order_type">
						<option value="asc"><?php echo $__Context->lang->order_asc ?></option>
						<option value="desc"<?php if($__Context->t_dftype->order_type == 'desc'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->order_desc ?></option>
					</select>
					<?php echo $__Context->lang->order_type ?>
				</label>
			</div>
			<div class="x_controls">
				<label class="x_inline" style="width:80px;margin-right:1px" for="id_default_list_count"><?php echo $__Context->lang->list_count ?>:</label>
				<label class="x_inline" style="width:80px;margin-right:1px" for="id_default_page_count"><?php echo $__Context->lang->page_count ?>:</label>
				<label class="x_inline" style="width:80px;margin-right:1px" for="id_default_clist_count"><?php echo $__Context->lang->comment_count ?>:</label>
				<label class="x_inline" style="width:80px;margin-right:1px" for="id_default_dlist_count"><?php echo $__Context->lang->doc_bottom_list ?>:</label>
				<br />
				<input name="default_list_count" id="id_default_list_count" type="number" value="<?php echo (int)$__Context->t_dftype->list_count ?>" maxlength="10" style="width:45px" />
				<input name="default_page_count" id="id_default_page_count" type="number" value="<?php echo (int)$__Context->t_dftype->page_count ?>" maxlength="10" style="width:45px;margin-left:22px" />
				<input name="default_clist_count" id="id_default_clist_count" type="number" value="<?php echo (int)$__Context->t_dftype->clist_count ?>" maxlength="10" style="width:45px;margin-left:22px" />
				<input name="default_dlist_count" id="id_default_dlist_count" type="number" value="<?php echo (int)$__Context->t_dftype->dlist_count ?>" maxlength="10" style="width:45px;margin-left:22px" />
			</div>
		</div><?php } ?>
		<?php if(count($__Context->skin_list)&&count($__Context->default_type_list)){ ?><div class="x_control-group <?php echo $__Context->module_info->module_srl&&!$__Context->module_info->default_type?'opt_bks':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->mobile ?></label>
			<div class="x_controls">
				<label class="x_inline" style="width:80px;margin-right:1px" for="id_default_mobile_list_count"><?php echo $__Context->lang->list_count ?>:</label>
				<label class="x_inline" style="width:80px;margin-right:1px" for="id_default_mobile_page_count"><?php echo $__Context->lang->page_count ?>:</label>
				<label class="x_inline" style="width:80px;margin-right:1px" for="id_default_mobile_clist_count"><?php echo $__Context->lang->comment_count ?>:</label>
				<label class="x_inline" style="width:80px;margin-right:1px" for="id_default_mobile_dlist_count"><?php echo $__Context->lang->doc_bottom_list ?>:</label>
				<br />
				<input name="mobile_list_count" id="id_default_mobile_list_count" type="number" value="<?php echo (int)$__Context->module_info->mobile_list_count ?>" maxlength="10" style="width:45px" />
				<input name="mobile_page_count" id="id_default_mobile_page_count" type="number" value="<?php echo (int)$__Context->module_info->mobile_page_count ?>" maxlength="10" style="width:45px;margin-left:22px" />
				<input name="mobile_clist_count" id="id_default_mobile_clist_count" type="number" value="<?php echo (int)$__Context->module_info->mobile_clist_count ?>" maxlength="10" style="width:45px;margin-left:22px" />
				<input name="mobile_dlist_count" id="id_default_mobile_dlist_count" type="number" value="<?php echo (int)$__Context->module_info->mobile_dlist_count ?>" maxlength="10" style="width:45px;margin-left:22px" />
				<a href="#about_mobile_list_count" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_mobile_list_count" class="x_help-block" hidden><?php echo $__Context->lang->about_mobile_list_count ?></p>
			</div>
		</div><?php } ?>
	</section><?php } ?>
	<section class="section <?php echo $__Context->m_copy_target?'collapsed':'' ?>">
		<h1><?php echo $__Context->lang->cmd_list ?></h1>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="id_notice_category"><?php echo $__Context->lang->notice ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['notice_category']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['notice_category']?'opt_bks':'' ?>">
				<select id="id_notice_category" name="notice_category">
					<option value="N"<?php if($__Context->module_info->notice_category != 'Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->list_options['category']['N'] ?></option>
					<option value="Y"<?php if($__Context->module_info->notice_category == 'Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->list_options['category']['Y'] ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="id_best_category"><?php echo $__Context->lang->best ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['best_category']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['best_category']?'opt_bks':'' ?>">
				<select id="id_best_category" name="best_category">
					<option value="N"<?php if($__Context->module_info->best_category != 'Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->list_options['category']['N'] ?></option>
					<option value="Y"<?php if($__Context->module_info->best_category == 'Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->list_options['category']['Y'] ?></option>
				</select>
				<p class="x_help-block"><?php echo $__Context->lang->about_use_best ?></p>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_best']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_best']?'opt_bks':'' ?>">
				<label for="use_best">
					<input type="checkbox" name="use_best" id="use_best" value="Y"<?php if($__Context->module_info->use_best=='Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->document ?> <?php echo $__Context->lang->cmd_list ?>
				</label>
				<label>
					<select name="best_index" style="min-width:122px;width:122px">
						<option value="voted_count"<?php if($__Context->module_info->best_index != 'readed_count'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->voted_count ?></option>
						<option value="readed_count"<?php if($__Context->module_info->best_index == 'readed_count'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->readed_count ?></option>
					</select>
					<select name="best_voted" style="min-width:20px;width:95px">
						<?php  $__Context->date_count = explode(',',$__Context->lang->best_options['more_list']) ?>
						<?php if($__Context->date_count&&count($__Context->date_count))foreach($__Context->date_count as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->best_voted == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?> more</option><?php } ?>
					</select>
					<?php echo $__Context->lang->best_options['index'] ?>
				</label>
				<label>
					<select name="best_date">
						<?php  $__Context->date_count = explode(',',$__Context->lang->best_options['date_list']) ?>
						<?php if($__Context->date_count&&count($__Context->date_count))foreach($__Context->date_count as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->best_date == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?> before</option><?php } ?>
					</select>
					<?php echo $__Context->lang->best_options['date'] ?>
				</label>
				<label>
					<select name="best_count">
						<?php  $__Context->date_count = explode(',',$__Context->lang->best_options['count_list']) ?>
						<?php if($__Context->date_count&&count($__Context->date_count))foreach($__Context->date_count as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->best_count == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
					</select>
					<?php echo $__Context->lang->best_options['count'] ?>
				</label>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_c_best']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_c_best']?'opt_bks':'' ?>">
				<label for="use_c_best">
					<input type="checkbox" name="use_c_best" id="use_c_best" value="Y"<?php if($__Context->module_info->use_c_best=='Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->comment ?> <?php echo $__Context->lang->cmd_list ?>
				</label>
				<label>
					<select style="min-width:122px;width:122px">
						<option><?php echo $__Context->lang->voted_count ?></option>
					</select>
					<select name="best_c_voted" style="min-width:20px;width:95px">
						<?php  $__Context->date_count = explode(',',$__Context->lang->best_options['more_list']) ?>
						<?php if($__Context->date_count&&count($__Context->date_count))foreach($__Context->date_count as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->best_c_voted == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?> more</option><?php } ?>
					</select>
					<?php echo $__Context->lang->best_options['index'] ?>
				</label>
				<label>
					<select name="best_c_date">
						<?php  $__Context->date_count = explode(',',$__Context->lang->best_options['date_list']) ?>
						<?php if($__Context->date_count&&count($__Context->date_count))foreach($__Context->date_count as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->best_c_date == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?> before</option><?php } ?>
						<option value="-1"<?php if($__Context->module_info->best_c_date == '-1'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->full_search ?></option>
					</select>
					<?php echo $__Context->lang->best_options['date'] ?>
				</label>
				<label>
					<select name="best_c_count">
						<?php  $__Context->date_count = explode(',',$__Context->lang->best_options['count_list']) ?>
						<?php if($__Context->date_count&&count($__Context->date_count))foreach($__Context->date_count as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->best_c_count == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
					</select>
					<?php echo $__Context->lang->best_options['count'] ?>
				</label>
			</div>
		</div>
	</section>
	<section class="section <?php echo $__Context->m_copy_target?'collapsed':'' ?>">
		<h1><?php echo $__Context->lang->function ?></h1>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->blind ?></label>
			<div class="x_controls">
				<p class="x_help-block"><?php echo $__Context->lang->about_use_blind ?></p>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_blind']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_blind']?'opt_bks':'' ?>">
				<label for="use_blind">
					<input type="checkbox" name="use_blind" id="use_blind" value="Y"<?php if($__Context->module_info->use_blind=='Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->document ?>
				</label>
				<div>
					<select name="blind_index" style="min-width:122px;width:122px">
						<option value="declare_count"<?php if($__Context->module_info->blind_index != 'vote_down_count'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->declare_count ?></option>
						<option value="vote_down_count"<?php if($__Context->module_info->blind_index == 'vote_down_count'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->vote_down_count ?></option>
					</select>
					<select name="blind_voted" style="min-width:20px;width:95px">
						<?php  $__Context->date_count = explode(',',$__Context->lang->blind_options['more_list']) ?>
						<?php if($__Context->date_count&&count($__Context->date_count))foreach($__Context->date_count as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->blind_voted == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?> more</option><?php } ?>
					</select>
				</div>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_c_blind']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_c_blind']?'opt_bks':'' ?>">
				<label for="use_c_blind">
					<input type="checkbox" name="use_c_blind" id="use_c_blind" value="Y"<?php if($__Context->module_info->use_c_blind=='Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->comment ?>
				</label>
				<div>
					<select name="blind_c_index" style="min-width:122px;width:122px">
						<option value="declare_count"<?php if($__Context->module_info->blind_c_index != 'vote_down_count'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->declare_count ?></option>
						<option value="vote_down_count"<?php if($__Context->module_info->blind_c_index == 'vote_down_count'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->vote_down_count ?></option>
					</select>
					<select name="blind_c_voted" style="min-width:20px;width:95px">
						<?php  $__Context->date_count = explode(',',$__Context->lang->blind_options['more_list']) ?>
						<?php if($__Context->date_count&&count($__Context->date_count))foreach($__Context->date_count as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->blind_c_voted == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?> more</option><?php } ?>
					</select>
				</div>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->cmd_lock ?></label>
			<div class="x_controls">
				<p class="x_help-block"><?php echo $__Context->lang->about_use_lock_document ?></p>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_lock_document']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_lock_document']?'opt_bks':'' ?>">
				<label for="tmp_lock_document">
					<input type="checkbox" name="tmp_lock_document" id="tmp_lock_document" value="Y"<?php if($__Context->module_info->use_lock_document=='Y'||$__Context->module_info->use_lock_document=='T'||$__Context->module_info->use_lock_document=='C'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->document ?>
				</label>
				<div>
					<select name="use_lock_document" style="min-width:122px;width:122px">
						<option value="Y"<?php if($__Context->module_info->use_lock_document == 'Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->lock_options['lock']['Y'] ?></option>
						<option value="T"<?php if($__Context->module_info->use_lock_document == 'T'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->lock_options['lock']['T'] ?></option>
						<option value="C"<?php if($__Context->module_info->use_lock_document != 'Y'&&$__Context->module_info->use_lock_document != 'T'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->lock_options['lock']['C'] ?></option>
					</select>
					<?php  $__Context->lock_count_list = explode(',', $__Context->lang->lock_options['count']) ?>
					<select name="use_lock_document_option" style="min-width:20px;width:95px">
						<?php if($__Context->lock_count_list&&count($__Context->lock_count_list))foreach($__Context->lock_count_list as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->use_lock_document_option == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?> more</option><?php } ?>
					</select>
				</div>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_lock_comment']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_lock_comment']?'opt_bks':'' ?>">
				<label for="tmp_lock_comment">
					<input type="checkbox" name="tmp_lock_comment" id="tmp_lock_comment" value="Y"<?php if($__Context->module_info->use_lock_comment=='Y'||$__Context->module_info->use_lock_comment=='T'||$__Context->module_info->use_lock_comment=='C'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->comment ?>
				</label>
				<div>
					<select name="use_lock_comment" style="min-width:122px;width:122px">
						<option value="Y"<?php if($__Context->module_info->use_lock_comment == 'Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->lock_options['lock']['Y'] ?></option>
						<option value="T"<?php if($__Context->module_info->use_lock_comment == 'T'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->lock_options['lock']['T'] ?></option>
						<option value="C"<?php if($__Context->module_info->use_lock_comment != 'Y'&&$__Context->module_info->use_lock_comment != 'T'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->lock_options['lock']['C'] ?></option>
					</select>
					<?php  $__Context->lock_count_list = explode(',', $__Context->lang->lock_options['count']) ?>
					<select name="use_lock_comment_option" style="min-width:20px;width:95px">
						<?php if($__Context->lock_count_list&&count($__Context->lock_count_list))foreach($__Context->lock_count_list as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->use_lock_comment_option == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?> more</option><?php } ?>
					</select>
				</div>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="id_use_point_percent"><?php echo $__Context->lang->point ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_point_type']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_point_type']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="use_point_type" value="R"<?php if($__Context->module_info->use_point_type!='A'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->restriction ?></label>
				<label class="x_inline"><input type="radio" name="use_point_type" value="A"<?php if($__Context->module_info->use_point_type=='A'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->adopt ?></label>
			</div>
			<div class="x_controls">
				<select id="id_use_point_percent" name="use_point_percent">
					<?php  $__Context->point_list = array('10','30','50','70','90','100') ?>
					<?php if($__Context->point_list&&count($__Context->point_list))foreach($__Context->point_list as $__Context->val){ ?><option value="<?php echo $__Context->val ?>"<?php if($__Context->module_info->use_point_percent == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?>% <?php echo $__Context->lang->point ?></option><?php } ?>
				</select>
				<p class="x_help-block"><?php echo $__Context->lang->about_use_restrict_type ?></p>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_restrict_view']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_restrict_view']?'opt_bks':'' ?>" style="margin-top:10px">
				<label for="tmp_restrict_view">
					<input type="checkbox" name="tmp_restrict_view" data-control-type="restrict"<?php if($__Context->module_info->use_point_type=='A'){ ?> disabled="disabled"<?php } ?> id="tmp_restrict_view" value="Y"<?php if($__Context->module_info->use_restrict_view=='Y'||$__Context->module_info->use_restrict_view=='P'){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->restriction ?> - <?php echo $__Context->lang->cmd_view ?>
				</label>
				<div>
					<select name="use_restrict_view" data-control-type="restrict"<?php if($__Context->module_info->use_point_type=='A'){ ?> disabled="disabled"<?php } ?>>
						<option value="Y"><?php echo $__Context->lang->comment ?></option>
						<option value="P"<?php if($__Context->module_info->use_restrict_view=='P'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->point ?></option>
					</select>
				</div>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_restrict_down']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_restrict_down']?'opt_bks':'' ?>">
				<label for="tmp_restrict_down">
					<input type="checkbox" name="tmp_restrict_down" data-control-type="restrict"<?php if($__Context->module_info->use_point_type=='A'){ ?> disabled="disabled"<?php } ?> id="tmp_restrict_down" value="Y"<?php if($__Context->module_info->use_restrict_down=='Y'||$__Context->module_info->use_restrict_down=='P'){ ?> checked="checked"<?php };
if(!file_exists(__XEFM_PATH__ . 'schemas/file_downloaded_log.xml')){ ?> onclick="alert('Please Install the db table for this feature.');return false"<?php } ?> />
					<?php echo $__Context->lang->restriction ?> - <?php echo $__Context->lang->cmd_download ?>
				</label>
				<select name="use_restrict_down" data-control-type="restrict"<?php if($__Context->module_info->use_point_type=='A'){ ?> disabled="disabled"<?php } ?>>
					<option value="Y"><?php echo $__Context->lang->comment ?></option>
					<option value="P"<?php if($__Context->module_info->use_restrict_down=='P'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->point ?></option>
				</select>
				<p class="x_help-block"><?php echo $__Context->lang->about_restriction ?></p>
				<p class="x_help-block"><?php echo $__Context->lang->about_restriction_download ?></p>
			</div>
		</div>
		<?php if(!$__Context->m_allset_targets){ ?><div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="lang_id_custom_status"><?php echo $__Context->lang->custom_status ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['custom_status']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['custom_status']?'opt_bks':'' ?>">
				<input id="id_custom_status" type="text" class="lang_code" name="custom_status" value="<?php echo htmlspecialchars($__Context->module_info->custom_status, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
				<a href="#about_custom_status" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_custom_status" class="x_help-block" hidden><?php echo $__Context->lang->about_custom_status ?></p>
			</div>
		</div><?php } ?>
	</section>
	<section class="section <?php echo $__Context->m_copy_target?'collapsed':'' ?>">
		<h1><?php echo $__Context->lang->cmd_option ?></h1>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->status ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_status']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_status']?'opt_bks':'' ?>">
				<label class="x_inline"><?php echo $__Context->lang->document ?>:</label>
				<?php  $__Context->use_status = explode(',', $__Context->module_info->use_status) ?>
				<?php if($__Context->document_status_list&&count($__Context->document_status_list))foreach($__Context->document_status_list as $__Context->key=>$__Context->val){;
if($__Context->key != 'PRIVATE' && $__Context->key != 'TEMP'){ ?><label class="x_inline">
					<input type="checkbox" name="use_status[]" value="<?php echo $__Context->key ?>"<?php if(in_array($__Context->key, $__Context->use_status)){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->val ?>
				</label><?php }} ?>
			</div>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_c_status']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_c_status']?'opt_bks':'' ?>">
				<label class="x_inline"><?php echo $__Context->lang->comment ?>:</label>
				<?php  $__Context->use_status = explode(',', $__Context->module_info->use_c_status) ?>
				<?php if($__Context->document_status_list&&count($__Context->document_status_list))foreach($__Context->document_status_list as $__Context->key=>$__Context->val){;
if($__Context->key != 'PRIVATE' && $__Context->key != 'TEMP'){ ?><label class="x_inline">
					<input type="checkbox" name="use_c_status[]" value="<?php echo $__Context->key ?>"<?php if(in_array($__Context->key, $__Context->use_status)){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->val ?>
				</label><?php }} ?>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->use_first_page ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_first_page']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_first_page']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="use_first_page" value="N"<?php if($__Context->module_info->use_first_page!='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="use_first_page" value="Y"<?php if($__Context->module_info->use_first_page=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<a href="#about_use_first_page" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_use_first_page" class="x_help-block" hidden><?php echo $__Context->lang->about_use_first_page ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->allow_comment ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['allow_comment']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['allow_comment']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="allow_comment" value="N"<?php if($__Context->module_info->allow_comment=='N'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="allow_comment" value="Y"<?php if($__Context->module_info->allow_comment=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<label class="x_inline"><input type="radio" name="allow_comment" value="S"<?php if($__Context->module_info->allow_comment!='N'&&$__Context->module_info->allow_comment!='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_select ?></label>
				<a href="#about_allow_comment" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_allow_comment" class="x_help-block" hidden><?php echo $__Context->lang->about_allow_comment ?></p>
			</div>
		</div>
		<?php 
			$__Context->tmp = $__Context->module_info->allow_trackback != 'N' ? 'Y' : 'N';
			$__Context->tmp = $__Context->module_info->allow_trackback&&($__Context->tmp!=$__Context->part_config->enable_trackback);
			$__Context->module_info->allow_trackback = $__Context->part_config->enable_trackback == 'N' ? 'N' : $__Context->module_info->allow_trackback;
			($__Context->tmp&&!$__Context->module_info->module_srl)||$__Context->m_copy_target ? $__Context->tmp = 0 : 0;
		 ?>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->allow_trackback ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['allow_trackback']?'opt_cps':'' ?> <?php echo $__Context->tmp||$__Context->module_backup_options['allow_trackback']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="allow_trackback" value="N"<?php if($__Context->module_info->allow_trackback=='N'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="allow_trackback" value="Y"<?php if($__Context->module_info->allow_trackback=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<label class="x_inline"><input type="radio" name="allow_trackback" value="S"<?php if($__Context->module_info->allow_trackback!='N'&&$__Context->module_info->allow_trackback!='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_select ?></label>
				<a href="#about_allow_trackback" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_allow_trackback" class="x_help-block" hidden><?php echo $__Context->tmp?'Warning : please save the new value.':$__Context->lang->about_allow_trackback ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->use_anonymous ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_anonymous']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_anonymous']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="use_anonymous" value="N"<?php if($__Context->module_info->use_anonymous!='Y'&&$__Context->module_info->use_anonymous!='S'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="use_anonymous" value="Y"<?php if($__Context->module_info->use_anonymous=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<label class="x_inline"><input type="radio" name="use_anonymous" value="S"<?php if($__Context->module_info->use_anonymous=='S'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_select ?></label>
				<a href="#about_use_anonymous" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_use_anonymous" class="x_help-block" hidden><?php echo $__Context->lang->about_use_anonymous ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->use_title_color ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_title_color']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_title_color']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="use_title_color" value="N"<?php if($__Context->module_info->use_title_color!='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="use_title_color" value="Y"<?php if($__Context->module_info->use_title_color=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<a href="#about_use_title_color" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_use_title_color" class="x_help-block" hidden><?php echo $__Context->lang->about_use_title_color ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->category_trace ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['category_trace']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['category_trace']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="category_trace" value="N"<?php if($__Context->module_info->category_trace!='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="category_trace" value="Y"<?php if($__Context->module_info->category_trace=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<a href="#about_category_trace" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_category_trace" class="x_help-block" hidden><?php echo $__Context->lang->about_category_trace ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->use_trash ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_trash']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['use_trash']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="use_trash" value="N"<?php if($__Context->module_info->use_trash!='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="use_trash" value="Y"<?php if($__Context->module_info->use_trash=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<a href="#about_use_trash" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_use_trash" class="x_help-block" hidden><?php echo $__Context->lang->about_use_trash ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->consultation ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['consultation']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['consultation']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="consultation" value="N"<?php if($__Context->module_info->consultation!='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="consultation" value="Y"<?php if($__Context->module_info->consultation=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<a href="#about_consultation" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_consultation" class="x_help-block" hidden><?php echo $__Context->lang->about_consultation ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->schedule_document_register ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['schedule_document_register']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['schedule_document_register']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="schedule_document_register" value="N"<?php if($__Context->module_info->schedule_document_register!='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="schedule_document_register" value="Y"<?php if($__Context->module_info->schedule_document_register=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<a href="#about_schedule_document_register" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_schedule_document_register" class="x_help-block" hidden><?php echo $__Context->lang->about_schedule_document_register ?></p>
			</div>
		</div>
		<?php 
			$__Context->tmp = $__Context->module_info->use_history&&($__Context->module_info->use_history!=$__Context->part_config->use_history);
			($__Context->tmp&&!$__Context->module_info->module_srl)||$__Context->m_copy_target ? $__Context->tmp = 0 : 0;
		 ?>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label"><?php echo $__Context->lang->history ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['use_history']?'opt_cps':'' ?> <?php echo $__Context->tmp||$__Context->module_backup_options['use_history']?'opt_bks':'' ?>">
				<label class="x_inline"><input type="radio" name="use_history" value="N"<?php if($__Context->module_info->use_history!='Y'&&$__Context->module_info->use_history!='Trace'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
				<label class="x_inline"><input type="radio" name="use_history" value="Y"<?php if($__Context->module_info->use_history=='Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
				<label class="x_inline"><input type="radio" name="use_history" value="Trace"<?php if($__Context->module_info->use_history=='Trace'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->trace_only2 ?></label>
				<a href="#about_use_history2" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_use_history2" class="x_help-block" hidden><?php echo $__Context->tmp?'Warning : please save the new value.':$__Context->lang->about_use_history2 ?></p>
			</div>
		</div>
	</section>
	<section class="section <?php echo $__Context->m_copy_target?'collapsed':'' ?>">
		<h1><?php echo $__Context->lang->etc ?></h1>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="lang_header_text"><?php echo $__Context->lang->header_text ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['header_text']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['header_text']?'opt_bks':'' ?>">
				<textarea class="lang_code" name="header_text" id="header_text"><?php echo htmlspecialchars($__Context->module_info->header_text, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?></textarea>
				<a href="#about_header_text" class="x_icon-question-sign" data-toggle style="vertical-align:top;margin-top:5px"><?php echo $__Context->lang->help ?></a>
				<p id="about_header_text" class="x_help-block" hidden><?php echo $__Context->lang->about_header_text ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="lang_footer_text"><?php echo $__Context->lang->footer_text ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['footer_text']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['footer_text']?'opt_bks':'' ?>">
				<textarea class="lang_code" name="footer_text" id="footer_text"><?php echo htmlspecialchars($__Context->module_info->footer_text, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?></textarea>
				<a href="#about_footer_text" class="x_icon-question-sign" data-toggle style="vertical-align:top;margin-top:5px"><?php echo $__Context->lang->help ?></a>
				<p id="about_footer_text" class="x_help-block" hidden><?php echo $__Context->lang->about_footer_text ?></p>
			</div>
		</div>
	</section>
	<section class="section <?php echo $__Context->m_copy_target?'collapsed':'' ?>">
		<h1><?php echo $__Context->lang->cmd_management ?></h1>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="id_robots_meta_option"><?php echo $__Context->lang->use_robots_meta ?></label>
			<div class="x_controls <?php echo $__Context->compulsory_options['robots_meta_option']?'opt_cps':'' ?> <?php echo $__Context->module_backup_options['robots_meta_option']?'opt_bks':'' ?>">
				<select id="id_robots_meta_option" name="robots_meta_option">
					<option value=""><?php echo $__Context->lang->robots_meta_option['0'] ?></option>
					<option value="index,follow"<?php if($__Context->module_info->robots_meta_option=='index,follow'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->robots_meta_option['1'] ?></option>
					<option value="index,nofollow"<?php if($__Context->module_info->robots_meta_option=='index,nofollow'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->robots_meta_option['2'] ?></option>
					<option value="noindex,follow"<?php if($__Context->module_info->robots_meta_option=='noindex,follow'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->robots_meta_option['3'] ?></option>
					<option value="noindex,nofollow"<?php if($__Context->module_info->robots_meta_option=='noindex,nofollow'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->robots_meta_option['4'] ?></option>
				</select>
				<a href="#about_use_robots_meta" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_use_robots_meta" class="x_help-block" hidden><?php echo $__Context->lang->about_use_robots_meta ?></p>
			</div>
		</div>
		<div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="id_admin_mail"><?php echo $__Context->lang->admin_email_address ?></label>
			<div class="x_controls">
				<input id="id_admin_mail" type="text" name="admin_mail" value="<?php echo htmlspecialchars($__Context->module_info->admin_mail) ?>"  />
				<a href="#about_admin_mail" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_admin_mail" class="x_help-block" hidden><?php echo $__Context->lang->about_admin_mail ?></p>
			</div>
		</div>
		<?php if(!$__Context->m_allset_targets){ ?><div class="x_control-group <?php echo $__Context->m_copy_target?'x_info':'' ?>">
			<label class="x_control-label" for="id_description"><?php echo $__Context->lang->description ?></label>
			<div class="x_controls">
				<textarea id="id_description" name="description"><?php echo htmlspecialchars($__Context->module_info->description) ?></textarea>
				<a href="#about_description" class="x_icon-question-sign" data-toggle style="vertical-align:top;margin-top:5px"><?php echo $__Context->lang->help ?></a>
				<p id="about_description" class="x_help-block" hidden><?php echo $__Context->lang->about_description ?></p>
			</div>
		</div><?php } ?>
	</section>
</div>
<div class="<?php echo $__Context->is_poped?'x_modal-footer':'x_clearfix' ?> btnArea">
	<span class="x_pull-right">
		<?php if($__Context->m_allset_targets){ ?><input class="x_btn x_btn-primary" type="submit" value="All <?php echo $__Context->lang->cmd_update ?>" accesskey="s" /><?php } ?>
		<?php if($__Context->m_copy_target){ ?><input class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->lang->module ?> <?php echo $__Context->lang->cmd_copy ?>" accesskey="s" /><?php } ?>
		<?php if(!$__Context->m_allset_targets&&!$__Context->m_copy_target){ ?><input class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->module_info->module_srl ? $__Context->lang->cmd_update : $__Context->lang->this_module.' '.$__Context->lang->cmd_registration ?>" accesskey="s" /><?php } ?>
	</span>
</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/tpl','footer.html') ?>
