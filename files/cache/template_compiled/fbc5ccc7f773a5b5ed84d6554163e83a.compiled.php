<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1>RSS <a class="x_icon-question-sign" href="./admin/help/index.html#UMAN_content_rss" target="_blank"><?php echo $__Context->lang->help ?></a></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/rss/tpl/rss_admin_index/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<section class="section">
	<h1><?php echo $__Context->lang->total_feed ?> <?php echo $__Context->lang->cmd_management ?></h1>
	<?php Context::addJsFile("modules/rss/ruleset/insertRssConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" enctype="multipart/form-data" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertRssConfig" />
		<input type="hidden" name="module" value="rss" />
		<input type="hidden" name="act" value="procRssAdminInsertConfig" />
		<input type="hidden" name="xe_validator_id" value="modules/rss/tpl/rss_admin_index/1" />
		<div class="x_control-group">
			<div class="x_control-label"><?php echo $__Context->lang->url ?></div>
			<div class="x_controls" style="padding-top:5px"><a href="<?php echo $__Context->total_config->url ?>" target="_blank"><?php echo $__Context->total_config->url ?></a></div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->total_feed ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" name="use_total_feed" value="Y" id="use_total_feed_yes"<?php if(!$__Context->total_config->use_total_feed || $__Context->total_config->use_total_feed == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?>
				</label>
				<label class="x_inline">
					<input type="radio" name="use_total_feed" value="N" id="use_total_feed_no"<?php if($__Context->total_config->use_total_feed == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?>
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="feed_title"><?php echo $__Context->lang->title ?></label>
			<div class="x_controls">
				<input type="text" name="feed_title" value="<?php echo htmlspecialchars($__Context->total_config->feed_title, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" id="feed_title" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="feed_description"><?php echo $__Context->lang->description ?></label>
			<div class="x_controls">
				<textarea name="feed_description" id="feed_description" rows="4" cols="42" style="float:left;margin-right:8px"><?php echo $__Context->total_config->feed_description ?></textarea>
				<p class="x_help-block"><?php echo $__Context->lang->about_feed_description ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="image"><?php echo $__Context->lang->feed_image ?></label>
			<div class="x_controls">
			
			<?php if($__Context->total_config->image){ ?>
			<div class="_rss_image_container">
				<?php if($__Context->total_config->image){ ?><div class="x_thumbnail" style="display:inline-block;margin:0 0 5px 0"> 
					<img src="/<?php echo $__Context->total_config->image ?>" alt="image" style="max-width:210px;max-height:150px" />
					<input type="button" class="_delete_rss_image x_icon-remove" value="<?php echo $__Context->lang->cmd_delete ?>" style="width:14px" />
				</div><?php } ?>
				
			</div>
			<?php } ?>
				<p><input type="file" name="image" value="" id="image" /></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="feed_copyright"><?php echo $__Context->lang->feed_copyright ?></label>
			<div class="x_controls">
				<input type="text" name="feed_copyright" value="<?php echo htmlspecialchars($__Context->total_config->feed_copyright, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" id="feed_copyright" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="feed_document_count"><?php echo $__Context->lang->feed_document_count ?></label>
			<div class="x_controls">
				<input type="number" min="1" max="100" name="feed_document_count" value="<?php echo $__Context->total_config->feed_document_count ?>" id="feed_document_count" />
			</div>
		</div>
		<div class="btnArea x_clearfix">
			<button type="submit" class="x_btn x_btn-primary x_pull-right"><?php echo $__Context->lang->cmd_save ?></button>
		</div>
	</form>
</section>
<section class="section">
	<h1 style="margin-bottom:0"><?php echo $__Context->lang->feed ?> <?php echo $__Context->lang->cmd_management ?></h1>
	<form action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="act" value="procRssAdminInsertModuleConfig" />
		<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', $__Context->module, 'act', 'dispRssAdminIndex') ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/rss/tpl/rss_admin_index/1" />
		<table class="x_table x_table-striped x_table-hover" style="border-top:0;margin-top:0">
			<thead>
				<tr>
					<th><?php echo $__Context->lang->mid ?></th>
					<th><?php echo $__Context->lang->description ?></th>
					<th><?php echo $__Context->lang->open_rss ?></th>
					<th><?php echo $__Context->lang->open_feed_to_total ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if($__Context->feed_config&&count($__Context->feed_config))foreach($__Context->feed_config as $__Context->key=>$__Context->value){ ?><tr>
					<?php if(!$__Context->value['url']){ ?><th>
						<?php echo $__Context->value['mid'] ?>
					</th><?php } ?>
					<?php if($__Context->value['url']){ ?><th>
						<a href="<?php echo $__Context->value['url'] ?>" target="_blank"><?php echo $__Context->value['mid'] ?></a>
					</th><?php } ?>
					<td class="title"><?php echo $__Context->value['feed_description'] ?><textarea name="feed_description[<?php echo $__Context->key ?>]" hidden><?php echo $__Context->value['feed_description'] ?></textarea></td>
					<td>
						<?php if($__Context->lang->open_rss_types&&count($__Context->lang->open_rss_types))foreach($__Context->lang->open_rss_types as $__Context->key2=>$__Context->value2){ ?><label class="x_inline"><input type="radio" name="open_rss[<?php echo $__Context->key ?>]" value="<?php echo $__Context->key2 ?>"<?php if($__Context->key2 == $__Context->value['open_feed']){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->value2 ?></label><?php } ?>
					</td>
					<td>
						<label class="x_inline"><input type="radio" name="open_total_feed[<?php echo $__Context->key ?>]" value="N"<?php if($__Context->value['open_total_feed'] != 'T_N'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->use ?></label>
						<label class="x_inline"><input type="radio" name="open_total_feed[<?php echo $__Context->key ?>]" value="T_N"<?php if($__Context->value['open_total_feed'] == 'T_N'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->notuse ?></label>
					</td>
				</tr><?php } ?>
				<?php if(!$__Context->feed_config){ ?><tr>
					<td style="text-align:center"><?php echo $__Context->lang->no_data ?></td>
				</tr><?php } ?>
			</tbody>
		</table>
		<div class="x_clearfix">
			<button type="submit" class="x_btn x_btn-primary x_pull-right"><?php echo $__Context->lang->cmd_save ?></button>
		</div>
	</form>
</section>
<script>
jQuery(function($){
	$("._delete_rss_image").click(function(){
		$.exec_json('rss.procRssAdminDeleteFeedImage', {del_image:'Y'}, function(){
			$("._rss_image_container").hide();
		});
	});
});
</script>
