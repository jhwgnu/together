<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/kin/skins/xe_kin_official','header.include.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<div class="section clearfix">
        <h2 class="sec_title"><?php echo $__Context->lang->cmd_add_question ?></h2>       
 </div><!-- //section -->
<div class="section compose_question clearfix ">
	<?php Context::addJsFile("modules/kin/ruleset/insertQuestion.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post"  id="fo_kin_write_question" class="compose_q"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertQuestion" />
		<input type="hidden" name="act" value="procKinInsert" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
		<input type="hidden" name="content" value="<?php echo $__Context->oDocument->getContentText() ?>" />
		<input type="hidden" name="enable_category" value="N" />
		<fieldset>
			<legend class="blind"></legend>
			<?php if($__Context->module_info->use_category=='Y'){ ?><div class="form_s_row" >
				<label for="cate" class="left"><?php echo $__Context->lang->ask_category ?></label>
				<select name="category_srl" class="right fe_sel">
					<option value=""><?php echo $__Context->lang->category ?></option>
					<?php if($__Context->categories&&count($__Context->categories))foreach($__Context->categories as $__Context->val){ ?><option value="<?php echo $__Context->val->category_srl ?>"<?php if($__Context->val->selected||$__Context->val->category_srl==$__Context->oDocument->get('category_srl')){ ?> selected="selected"<?php } ?>>
						<?php echo str_repeat("&nbsp;&nbsp;",$__Context->val->depth) ?> <?php echo $__Context->val->title ?> (<?php echo $__Context->val->document_count ?>)
					</option><?php } ?>
				</select>
			</div><?php } ?>
		<div class="form_s_row">
			<label for="" class="left"><?php echo $__Context->lang->title ?></label>
			<input type="text" class="right fe_ipt"  name="title" value="<?php echo htmlspecialchars($__Context->oDocument->get('title')) ?>">
		</div>
		<div class="editor">
			<?php echo $__Context->oDocument->getEditor() ?>
		</div>
		<div class="form_m_row">
			<label for="" class="left"><?php echo $__Context->lang->give_point ?></label>
			<?php if($__Context->oDocument->isExists()){ ?><strong><?php echo number_format(intval($__Context->oDocument->get('point'))) ?> <?php echo $__Context->point_name ?></strong><?php } ?>
			<?php if(!$__Context->oDocument->isExists()){ ?><input type="text" name="give_point" value="<?php echo $__Context->max_point ?>" class="right" /><?php } ?><span class="right"> /<?php echo number_format(intval($__Context->limit_point)) ?> <?php echo $__Context->point_name ?></span>
			<span class="desc"><?php echo sprintf($__Context->lang->about_give_point, $__Context->min_point, $__Context->limit_point) ?>.</span>
		</div>
		<a href="" onclick="location.href='<?php echo getUrl('act','','title','') ?>';return false;" class="btn_back"><span><?php echo $__Context->lang->back ?></span></a>
		<span class="btn_sbmt"><input type="submit" class="kin_submit" value="<?php echo $__Context->lang->cmd_registration ?>"></span>
		</fieldset>
	</form>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/kin/skins/xe_kin_official','footer.include.html') ?>