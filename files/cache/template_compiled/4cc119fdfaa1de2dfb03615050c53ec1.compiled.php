<?php if(!defined("__XE__"))exit;
$__Context->oThis->addExtraKeyJsFilter() ?>
<?php if($__Context->not_permitted){ ?>
<?php Context::addJsFile("modules/beluxe/ruleset/checkPassword.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="pid_ajax-form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="checkPassword" />
<?php if($__Context->is_modal){ ?><input type="hidden" name="is_modal" value="2" /><?php } ?>
<input type="hidden" name="success_return_url" value="<?php echo getUrl('is_modal',$__Context->is_modal?2:'') ?>" />
<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
<input type="hidden" name="act" value="procBoardVerificationPassword" />
	<div>
		<span class="scBtn black"><input type="password" name="password" placeholder="<?php echo $__Context->lang->password ?>" /></span>
		<span class="scBtn black"><input type="submit" value="<?php echo $__Context->lang->cmd_input ?>" /></span>
		<span class="scBtn"><a href="<?php echo getUrl('act','') ?>"<?php if($__Context->is_modal&&!$__Context->us_vmodal){ ?> data-modal-hide<?php } ?>><?php echo $__Context->lang->cmd_back ?></a></span>
	</div>
</form>
<?php }else{ ?>
<?php Context::addJsFile("modules/beluxe/ruleset/insertDocument.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="pid_ajax-form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertDocument" />
<?php if($__Context->is_modal){ ?><input type="hidden" name="is_modal" value="<?php echo $__Context->us_vmodal?2:1 ?>" /><?php } ?>
<input type="hidden" name="module_srl" value="<?php echo $__Context->mi->module_srl ?>" />
<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
<input type="hidden" name="act" value="procBoardInsertDocument" />
	<?php 
		$__Context->un_extra = ($__Context->pt_vtype!='N'||$__Context->pt_dtype!='N')?$__Context->oDocument->get('extra_vars'):null;
		$__Context->un_extra = is_string($__Context->un_extra)?unserialize($__Context->un_extra):$__Context->un_extra;
		$__Context->us_point = is_array($__Context->un_extra)?$__Context->un_extra->beluxe->use_point:0;
	 ?>
	<div id="siWrt">
		<input type="hidden" name="content" value="<?php echo $__Context->is_doc?$__Context->oDocument->getContentText():htmlspecialchars($__Context->mi->document_default_content) ?>" />
		<?php if(!$__Context->is_cts){ ?><input type="hidden" name="category_srl" value="0" /><?php } ?>
		<ul class="scWul">
			<?php if($__Context->is_cts){ ?><li class="clearBar">
				<label for="category_srl"><?php echo $__Context->lang->category ?></label>
				<?php 
					$__Context->t_ctsrl = (int)($__Context->category_srl?$__Context->category_srl:$__Context->oDocument->get('category_srl'));
					$__Context->cts[$__Context->t_ctsrl]->grant ? 0 : $__Context->t_ctsrl = 0;
				 ?>
				<?php if($__Context->mi->use_step_category!='N'){ ?>
				<input type="hidden" name="category_srl" value="<?php echo $__Context->t_ctsrl ?>" />
				<select class="scWcateList">
					<?php if(!$__Context->category_srl){ ?><option value=""><?php echo $__Context->lang->none_category ?></option><?php } ?>
					<?php  $__Context->sub_cate_list_1 = array() ?>
					<?php if($__Context->cts&&count($__Context->cts))foreach($__Context->cts as $__Context->val){;
if(!$__Context->val->depth&&$__Context->val->grant){ ?><option value="<?php echo $__Context->val->category_srl ?>">
						<?php  $__Context->sub_cate_list_1[$__Context->val->category_srl] = $__Context->val->childs ?>
						<?php echo $__Context->val->title.($__Context->val->total_document_count?'&nbsp;('.$__Context->val->total_document_count.')':'') ?>
					</option><?php }} ?>
				</select>
				<?php  $__Context->sub_cate_list_2 = array() ?>
				<?php if($__Context->sub_cate_list_1&&count($__Context->sub_cate_list_1))foreach($__Context->sub_cate_list_1 as $__Context->key=>$__Context->val_list){ ?>
					<?php if(count($__Context->val_list)){ ?><select class="scWcateList" data-key="<?php echo $__Context->key ?>" style="display:none">
						<?php if($__Context->val_list&&count($__Context->val_list))foreach($__Context->val_list as $__Context->val){ ?>
							<?php  $__Context->val = $__Context->cts[$__Context->val] ?>
							<?php if((int) $__Context->val->depth === 1&&$__Context->val->grant){ ?><option value="<?php echo $__Context->val->category_srl ?>">
								<?php  $__Context->sub_cate_list_2[$__Context->val->category_srl] = $__Context->val->childs ?>
								<?php echo $__Context->val->title.($__Context->val->total_document_count?'&nbsp;('.$__Context->val->total_document_count.')':'') ?>
							</option><?php } ?>
						<?php } ?>
					</select><?php } ?>
				<?php } ?>
				<?php if($__Context->sub_cate_list_2&&count($__Context->sub_cate_list_2))foreach($__Context->sub_cate_list_2 as $__Context->key=>$__Context->val_list){ ?>
					<?php if(count($__Context->val_list)){ ?><select class="scWcateList" data-key="<?php echo $__Context->key ?>" style="display:none">
						<?php if($__Context->val_list&&count($__Context->val_list))foreach($__Context->val_list as $__Context->val){ ?>
							<?php  $__Context->val = $__Context->cts[$__Context->val] ?>
							<?php if($__Context->val->grant){ ?><option value="<?php echo $__Context->val->category_srl ?>">
								<?php echo $__Context->val->title.($__Context->val->total_document_count?'&nbsp;('.$__Context->val->total_document_count.')':'') ?>
							</option><?php } ?>
						<?php } ?>
					</select><?php } ?>
				<?php } ?>
				<?php }else{ ?>
				<select name="category_srl" value="<?php echo $__Context->t_ctsrl ?>">
					<?php if(!$__Context->category_srl){ ?><option value=""><?php echo $__Context->lang->none_category ?></option><?php } ?>
					<?php if($__Context->cts&&count($__Context->cts))foreach($__Context->cts as $__Context->val){;
if($__Context->val->grant){ ?><option value="<?php echo $__Context->val->category_srl ?>"<?php if($__Context->val->category_srl==$__Context->t_ctsrl){ ?> selected="selected"<?php } ?>>
						<?php echo str_repeat('&nbsp;&nbsp;',$__Context->val->depth);
echo $__Context->val->title.($__Context->val->total_document_count?'&nbsp;('.$__Context->val->total_document_count.')':'') ?>
					</option><?php }} ?>
				</select>
				<?php } ?>
			</li><?php } ?>
			<li class="clearBar">
				<label for="title"><?php echo $__Context->lang->title ?></label>
				<input type="text" name="title" id="title" maxlength="250" value="<?php echo htmlspecialchars($__Context->is_doc?$__Context->oDocument->getTitleText():$__Context->mi->document_default_title) ?>" />
			</li>
		</ul>
		<div class="scWul clearBar">
			<span>
				<?php if($__Context->grant->manager||$__Context->mi->use_title_color=='Y'){ ?>
					<?php  $__Context->_color = array('555555','222288','226622','2266EE','8866CC','88AA66','EE2222','EE6622','EEAA22','EEEE22')  ?>
					<select name="title_color"<?php if($__Context->oDocument->get('title_color')){ ?> style="background-color:#<?php echo $__Context->oDocument->get('title_color') ?>;"<?php } ?> onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor;">
							<option value="" style="background-color:#FFFFFF;"><?php echo $__Context->lang->title_color ?></option>
							<?php if($__Context->_color&&count($__Context->_color))foreach($__Context->_color as $__Context->col){ ?><option value="<?php echo $__Context->col ?>" style="background-color:#<?php echo $__Context->col ?>"<?php if($__Context->oDocument->get('title_color')==$__Context->col){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->title_color ?></option><?php } ?>
					</select>
					<label>
						<input type="checkbox" name="title_bold" value="Y"<?php if($__Context->oDocument->get('title_bold')=='Y'){ ?> checked="checked"<?php } ?> />
						<?php echo $__Context->lang->title_bold ?>
					</label>
				<?php } ?>
				<?php if($__Context->grant->manager){ ?><label>
					<input type="checkbox" name="is_notice" value="Y"<?php if($__Context->oDocument->isNotice()){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->notice ?>
				</label><?php } ?>
				<?php if($__Context->is_logged){ ?><label>
					<input type="checkbox" name="notify_message" value="Y"<?php if($__Context->oDocument->useNotify()){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->notify ?>
				</label><?php } ?>
				<?php if($__Context->grant->manager || ($__Context->mi->allow_comment!='N' && $__Context->mi->allow_comment!='Y')){ ?><label>
					<input type="checkbox" name="allow_comment" value="Y"<?php if(!$__Context->is_doc&&(!$__Context->grant->manager||($__Context->grant->manager&&$__Context->mi->allow_comment!='N')) || $__Context->oDocument->allowComment()){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->allow_comment ?>
				</label><?php } ?>
				<?php if($__Context->grant->manager || ($__Context->mi->allow_trackback!='N' && $__Context->mi->allow_trackback!='Y')){ ?><label>
					<input type="checkbox" name="allow_trackback" value="Y"<?php if(!$__Context->is_doc&&(!$__Context->grant->manager||($__Context->grant->manager&&$__Context->mi->allow_trackback!='N')) || $__Context->oDocument->allowTrackback()){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->allow_trackback ?>
				</label><?php } ?>
				<?php if($__Context->mi->use_anonymous=='S'){ ?><label>
					<input type="checkbox" name="anonymous" value="Y"<?php if(($__Context->oDocument->get('member_srl')<0)&&(($__Context->oDocument->get('nick_name').$__Context->oDocument->get('user_name')) == 'anonymousanonymous')){ ?> checked="checked"<?php } ?> />
					<?php echo $__Context->lang->anonymous ?>
				</label><?php } ?>
			</span>
			<?php  $__Context->t_dstus = explode(',', $__Context->mi->use_status) ?>
			<?php if(count($__Context->t_dstus) > 1){ ?><label class="fr">
				<select name="status">
					<?php if($__Context->t_dstus&&count($__Context->t_dstus))foreach($__Context->t_dstus as $__Context->value){ ?><option value="<?php echo $__Context->value ?>"<?php if($__Context->oDocument->get('status') == $__Context->value){ ?> selected="selected"<?php } ?>><?php echo Context::getLang(strtolower($__Context->value)) ?></option><?php } ?>
				</select>
			</label><?php } ?>
			<?php if(count($__Context->t_dstus) === 1 && $__Context->t_dstus[0]){ ?><input type="hidden" name="status" value="<?php echo $__Context->t_dstus[0] ?>" /><?php } ?>
			<?php if($__Context->grant->manager && count($__Context->cstus)){ ?><label class="fr">
				<?php echo $__Context->lang->status ?>
				<select name="custom_status">
					<?php if($__Context->cstus&&count($__Context->cstus))foreach($__Context->cstus as $__Context->key=>$__Context->value){ ?><option value="<?php echo $__Context->key ?>"<?php if((int)$__Context->oDocument->get('is_notice') == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->value ?></option><?php } ?>
				</select>
			</label><?php } ?>
		</div>
		<?php if(!$__Context->is_logged){ ?><div class="scWusr clearBar">
			<?php  $__Context->is_guestinfo = $__Context->mi->use_input_guest_info == 'N' ? $__Context->oThis->getIpaddress(1) : '' ?>
			<label class="scLaEt">
				<span>Name</span>
				<input type="text" name="nick_name" maxlength="80" value="<?php echo $__Context->is_guestinfo?$__Context->is_guestinfo:htmlspecialchars($__Context->oDocument->get('nick_name')) ?>"<?php if($__Context->is_guestinfo){ ?> readonly="readonly"<?php } ?> />
			</label>
			<label class="scLaEt">
				<span>Pass</span>
				<input type="password" name="password" />
			</label>
			<?php if($__Context->mi->use_input_guest_info != 'N' && $__Context->mi->use_input_guest_info != 'S'){ ?>
				<label class="scLaEt">
					<span>Mail</span>
					<input type="email" name="email_address" maxlength="250" value="<?php echo htmlspecialchars($__Context->oDocument->get('email_address')) ?>" />
				</label>
				<label class="scLaEt">
					<span>Home</span>
					<input type="url" name="homepage" maxlength="250" value="<?php echo htmlspecialchars($__Context->oDocument->get('homepage')) ?>" />
				</label>
			<?php } ?>
		</div><?php } ?>
		<?php if($__Context->is_logged){ ?>
			<input type="hidden" name="nick_name" value="1" />
			<input type="hidden" name="password" value="1" />
		<?php } ?>
		<?php if($__Context->is_logged && ($__Context->pt_vtype!='N'||$__Context->pt_dtype!='N')){ ?><ul class="scWul">
			<li class="clearBar">
				<label><?php echo $__Context->lang->point ?></label>
				<?php 
					$__Context->my_point = $__Context->oThis->getPoint();
					$__Context->point_list = explode(',',$__Context->mi->use_point_list?$__Context->mi->use_point_list:'10,50,100,500,1000');
				 ?>
				<?php if(!$__Context->us_point||$__Context->us_point>0){ ?>
					<select name="use_point">
						<?php if($__Context->us_point){ ?><option value="<?php echo $__Context->us_point ?>"><?php echo $__Context->us_point ?></option><?php } ?>
						<?php if($__Context->point_list&&count($__Context->point_list))foreach($__Context->point_list as $__Context->value){;
if($__Context->value<=$__Context->my_point){ ?><option value="<?php echo $__Context->value ?>"><?php echo $__Context->value ?></option><?php }} ?>
					</select> <?php echo sprintf($__Context->lang->my_point,$__Context->my_point) ?>
				<?php } ?>
				<?php if($__Context->us_point<0){ ?><p style="margin-top:3px">
					<strong><?php echo abs($__Context->us_point) ?></strong> - <?php echo sprintf($__Context->lang->my_point,$__Context->my_point) ?>
				</p><?php } ?>
				<p><?php echo $__Context->pt_vtype=='A'?sprintf($__Context->lang->about_use_adopt,(100-$__Context->mi->use_point_percent).'%'):sprintf($__Context->lang->about_use_point,$__Context->mi->use_point_percent.'%') ?></p>
			</li>
		</ul><?php } ?>
		<?php if($__Context->is_logged&&!$__Context->is_doc&&$__Context->mi->schedule_document_register==='Y'){ ?><ul class="scWul">
			<li class="clearBar">
				<label><?php echo $__Context->lang->reserve ?></label>
				<input type="hidden" name="schedule_regdate" value="" />
				<input type="text" id="date_schedule_regdate" class="date" value="" style="margin-bottom:2px" placeholder="Date." />D&nbsp;&nbsp;&nbsp;
				<input type="text" id="date_schedule_regdate_hour" class="date" value="" placeholder="0~23" maxlength="2" style="width:35px!important" />H&nbsp;&nbsp;
				<input type="text" id="date_schedule_regdate_minute" class="date" value="" placeholder="0~59" maxlength="2" style="width:35px!important" />M&nbsp;&nbsp;
				<input type="button" value="<?php echo $__Context->lang->cmd_delete ?>" class="btn" id="dateRemover_schedule_regdate" />
				<p><?php echo $__Context->lang->about_schedule_document_register ?></p>
				<?php  Context::loadJavascriptPlugin('ui.datepicker') ?>
				<script>
				//<![CDATA[
				(function($){
				$(function(){
					var option = {
						 dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, gotoCurrent: true,yearRange:'-100:+10',
						onSelect:function(){
							$('#date_schedule_regdate_hour').change();
						}
					};
					$.extend(option, $.datepicker.regional["<?php echo Context::getLangType()?Context::getLangType():'ko' ?>"]);
					$('#date_schedule_regdate').datepicker(option);
					$("#dateRemover_schedule_regdate").click(function(){
						$(this).siblings("input").val("");
						$('#date_schedule_regdate_hour,#date_schedule_regdate_minute').val('');
						return false;
					});
					$('#date_schedule_regdate_hour, #date_schedule_regdate_minute').change(function(){
						var dd = $('#date_schedule_regdate')[0].value.replace(/[-:\s]/g,''),
							dh = $('#date_schedule_regdate_hour').val()||'0',
							dm = $('#date_schedule_regdate_minute').val()||'0';
						if(dh.length === 1) dh = '0' + dh;
						if(dm.length === 1) dm = '0' + dm;
						$('#date_schedule_regdate').prev('input[name=schedule_regdate]').val(dd+dh+dm);
					});
				});
				})(jQuery);
				//]]>
				</script>
			</li>
		</ul><?php } ?>
		<div class="scExTog" style="display:none"><button type="button" title="<?php echo $__Context->lang->extra_toggle ?>"><i></i></button></div>
		<?php  $__Context->extra_keys = $__Context->oThis->getDocumentExtraVars((int)$__Context->oDocument->document_srl) ?>
		<?php if(count($__Context->extra_keys)){ ?><ul class="scWul extraKeys">
			<?php if($__Context->extra_keys&&count($__Context->extra_keys))foreach($__Context->extra_keys as $__Context->key=>$__Context->val){ ?><li class="clearBar"<?php if($__Context->mi->use_auto_hide_extra_vars=='Y'&&$__Context->val->is_required!='Y'){ ?> style="display:none"<?php } ?>>
				<label><?php echo $__Context->val->name ?> <?php if($__Context->val->is_required=='Y'){ ?><span class="required">*</span><?php } ?></label>
				<?php echo $__Context->val->getFormHTML() ?>
			</li><?php } ?>
		</ul><?php } ?>
		<div class="editor clearBar">
			<?php echo $__Context->oDocument->getEditor() ?>
		</div>
		<div class="scWtag">
			<?php if($__Context->mi->use_input_link_file!='N'){ ?><label class="scLaEt clearBar" id="insert_filelink">
				<span>Link</span>
				<input type="text" id="upload_filelink" value="" style="width:80%" placeholder="<?php echo htmlspecialchars($__Context->lang->about_upload_filelink) ?>" />
				<storng class="scBtn blue small"><a href="#insert_filelink" data-seq="<?php echo $__Context->editor_sequence ?>" data-srl="<?php echo $__Context->document_srl ?>"><?php echo $__Context->lang->upload_filelink ?></a></storng>
			</label><?php } ?>
			<?php if($__Context->mi->use_input_tag!='N'){ ?><label class="scLaEt clearBar">
				<span>Tags</span>
				<input type="text" name="tags" id="doc_tags" value="<?php echo htmlspecialchars($__Context->oDocument->get('tags')) ?>" placeholder="<?php echo htmlspecialchars($__Context->lang->about_tag) ?>" />
			</label><?php } ?>
		</div>
		<div class="btnArea"<?php if($__Context->is_modal){ ?> style="margin-bottom:0"<?php } ?>>
			<span class="fl">
				<span class="scBtn blue"><button type="button" onclick="doDocumentPreview(this); return false;"><?php echo $__Context->lang->cmd_preview ?></button></span>
				<?php if($__Context->is_logged && (!$__Context->oDocument->isExists() || $__Context->oDocument->get('status') == 'TEMP')){ ?>
					<span class="scBtn blue"><button type="button" onclick="doDocumentSave(this); return false;"><?php echo $__Context->lang->cmd_temp_save ?></button></span>
					<span class="scBtn blue"><button type="button" onclick="doDocumentLoad(this); return false;"><?php echo $__Context->lang->cmd_load ?></button></span>
				<?php } ?>
			</span>
			<span>
				<span class="scBtn"><a href="<?php echo getUrl('act','') ?>"<?php if($__Context->is_modal&&(!$__Context->us_vmodal||$__Context->us_vmodal&&!$__Context->oDocument->isExists())){ ?> data-modal-hide<?php } ?>>
					<?php echo $__Context->is_modal&&(!$__Context->us_vmodal||$__Context->us_vmodal&&!$__Context->oDocument->isExists())?$__Context->lang->cmd_close:$__Context->lang->cmd_back ?>
				</a></span>
				<span class="scBtn black"><button type="submit" accesskey="s"><?php echo $__Context->lang->document ?> <?php echo Context::getLang('cmd_'.($__Context->is_doc?'update':'registration')) ?></button></span>
			</span>
		</div>
	</div>
</form>
<?php } ?>