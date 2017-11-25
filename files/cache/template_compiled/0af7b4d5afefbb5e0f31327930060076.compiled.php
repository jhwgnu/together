<?php if(!defined("__XE__"))exit;
$__Context->module = $__Context->module_info->module; ?>
<header id="jumbotron" class="jumbotron jumbotron-<?php echo $__Context->colorset ?> text-<?php echo $__Context->li->jumbotron_align ?> <?php if($__Context->_COOKIE['simplestrap_jumbotron']=='hide'){ ?> jumbotron-hide<?php } ?>">
	<?php if($__Context->is_member_menu!='Y'){ ?>
	<div class="container">
		<button type="button" id="jumbotron-hide" class="close" data-toggle="tooltip" data-title="<?php echo $__Context->lang->ss_hide_show ?>" data-placement="left"><i class="fa fa-angle-up" area-hidden="true"></i></button>
		<div class="jumbotron-title-wrap">
			<h1><a href="<?php echo getUrl('','mid',$__Context->mid) ?>"><?php echo $__Context->module_info->browser_title ?></a></h1>
			<?php if($__Context->main_menu->list&&count($__Context->main_menu->list))foreach($__Context->main_menu->list as $__Context->key1=>$__Context->val1){ ?>
				<?php if($__Context->val1['selected'] && !$__Context->val1['list']){ ?><p><?php echo $__Context->val1['desc'];
break;  ?></p><?php } ?>
				<?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){ ?>
					<?php if($__Context->val1['selected'] && !$__Context->val2['selected']){ ?><p><?php echo $__Context->val1['desc'];
break;  ?></p><?php } ?>
					<?php if($__Context->val2['selected']){ ?><p><?php echo $__Context->val2['desc'] ?></p><?php } ?>
				<?php } ?>
			<?php } ?>
			<?php if($__Context->jumbotron_lead_auto_p=='Y'){ ?><p><?php echo $__Context->jumbotron_lead ?></p><?php } ?>
			<?php if($__Context->jumbotron_lead_auto_p!='Y'){;
echo $__Context->jumbotron_lead;
} ?>
			<?php if($__Context->jumbotron_icon){ ?><i class="fa <?php echo $__Context->jumbotron_icon ?> icon-jumbotron-<?php if($__Context->li->jumbotron_align=='right'){ ?>left<?php }else{ ?>right<?php } ?>"></i><?php } ?>
		</div>
		<?php if($__Context->module=='board'){ ?><p class="btn-area">
			<a<?php if($__Context->act!='dispBoardWrite'){ ?> href="<?php echo getURL('','mid',$__Context->mid,'act','dispBoardWrite') ?>"<?php };
if($__Context->act=='dispBoardWrite'){ ?> href="<?php echo getUrl('','mid',$__Context->mid) ?>"<?php } ?> class="btn btn-default btn-lg tooltip-show-auto<?php if($__Context->act=='dispBoardWrite'){ ?> active<?php };
if(!$__Context->grant->write_document){ ?> disabled<?php } ?>"<?php if($__Context->grant->write_document && $__Context->act=='dispBoardWrite'){ ?> data-trigger="manual" data-placement="bottom" data-html="true" data-title="<i class='fa fa-pencil' area-hidden='true'></i> <?php if($__Context->document_srl){;
echo $__Context->lang->ss_editing_document;
}else{;
echo $__Context->lang->ss_writing_document;
} ?>"<?php } ?>><i class="fa fa-pencil" area-hidden="true"></i> <?php echo $__Context->lang->cmd_write ?></a>
			<button type="button" id="jumbotron-search-popover"<?php if($__Context->act=='dispBoardWrite'){ ?> disabled<?php } ?> class="btn btn-lg btn-default tooltip-show-auto<?php if($__Context->search_keyword){ ?> active<?php } ?>"<?php if($__Context->search_keyword){ ?> onclick="location.replace('<?php echo getUrl('','mid',$__Context->mid) ?>')" data-trigger="manual" data-placement="bottom" data-html="true" data-title="<i class='fa fa-check' area-hidden='true'></i> '<?php echo htmlspecialchars($__Context->search_keyword) ?>' <?php echo $__Context->lang->search_result ?>"<?php } ?>><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->board ?> <?php echo $__Context->lang->cmd_search ?></button>
			<?php if($__Context->grant->manager){ ?>
			<br class="hide visible-xs" />
			<a href="<?php echo getUrl('','module','document','act','dispDocumentManageDocument') ?>" onclick="popopen(this.href,'manageDocument'); return false;" class="btn btn-lg btn-default"<?php if($__Context->act && $__Context->act!='dispBoardList'){ ?> disabled<?php } ?>><i class="fa fa-check" area-hidden="true"></i> <?php echo $__Context->lang->cmd_manage_document ?></a>
			<a href="<?php echo getUrl('act','dispBoardAdminInsertBoard') ?>" class="btn btn-lg btn-default"><i class="fa fa-cog" area-hidden="true"></i> <?php echo $__Context->lang->cmd_setup ?></a>
			<?php } ?>
		</p><?php } ?>
		<?php if($__Context->module=='kin'){ ?><p class="btn-area">
			<a<?php if($__Context->act!='dispKinWrite'){ ?> href="<?php echo getURL('search_keyword','','act','dispKinWrite') ?>"<?php };
if($__Context->act=='dispKinWrite'){ ?> href="<?php echo getUrl('','mid',$__Context->mid) ?>"<?php } ?> class="btn btn-default btn-lg tooltip-show-auto<?php if($__Context->act=='dispKinWrite'){ ?> active<?php };
if(!$__Context->grant->write_document){ ?> disabled<?php } ?>"<?php if($__Context->act=='dispKinWrite'){ ?> data-trigger="manual" data-placement="bottom" data-html="true" title="<i class='fa fa-pencil' area-hidden='true'></i> <?php echo $__Context->lang->ss_writing_question ?>"<?php } ?>><i class="fa fa-pencil" area-hidden="true"></i> <?php echo $__Context->lang->cmd_ask ?></a>
			<button type="button" id="jumbotron-search-popover" class="btn btn-lg btn-default tooltip-show-auto<?php if($__Context->search_keyword){ ?> active<?php } ?>"<?php if($__Context->search_keyword){ ?>onclick="location.replace('<?php echo getUrl('','mid',$__Context->mid) ?>')" data-trigger="manual" data-placement="bottom" data-html="true" title="<i class='fa fa-check' area-hidden='true'></i> '<?php echo htmlspecialchars($__Context->search_keyword) ?>' <?php echo $__Context->lang->search_result ?>"<?php };
if($__Context->act=='dispKinWrite'){ ?> disabled<?php } ?>><i class="fa fa-search"  area-hidden="true"></i> <?php echo $__Context->lang->cmd_search ?></button>
		</p><?php } ?>
		<?php if($__Context->module=='wiki'){ ?><p class="btn-area">
			<a class="btn btn-default btn-lg" href="<?php echo getUrl('','act','dispWikiEditPage','entry','','document_srl','','mid',$__Context->mid,'vid',$__Context->vid) ?>"><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->new_document ?></a>
			<a class="btn btn-default btn-lg" href="<?php echo getUrl('act','dispWikiTitleIndex','entry','','document_srl','') ?>"><i class="fa fa-file" area-hidden="true"></i> <?php echo $__Context->lang->cmd_view_document_list ?></a>
			
			<button type="button" id="jumbotron-search-popover" class="btn btn-lg btn-default tooltip-show-auto<?php if($__Context->search_keyword){ ?> active<?php } ?>"<?php if($__Context->search_keyword){ ?>onclick="location.replace('<?php echo getUrl('','mid',$__Context->mid) ?>')" data-trigger="manual" data-placement="bottom" data-html="true" title="<i class='fa fa-check' area-hidden='true'></i> '<?php echo htmlspecialchars($__Context->search_keyword) ?>' <?php echo $__Context->lang->search_result ?>"<?php };
if($__Context->act=='dispKinWrite'){ ?> disabled<?php } ?>><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->cmd_search ?></button>
			<?php if($__Context->grant->manager){ ?><a class="btn btn-default btn-lg" href="<?php echo getUrl('act','dispWikiAdminInsertWiki') ?>"><i class="fa fa-cog" area-hidden="true"></i> <?php echo $__Context->lang->cmd_setup ?></a><?php } ?>
		</p><?php } ?>
		<?php if($__Context->module=='resource'){ ?><p class="btn-area">
			<button type="button" id="jumbotron-search-popover" class="btn btn-lg btn-default tooltip-show-auto<?php if($__Context->search_keyword){ ?> active<?php } ?>"<?php if($__Context->search_keyword){ ?>onclick="location.replace('<?php echo getUrl('','mid',$__Context->mid) ?>')" data-trigger="manual" data-placement="bottom" data-html="true" title="<i class='fa fa-check' area-hidden='true'></i> '<?php echo htmlspecialchars($__Context->search_keyword) ?>' <?php echo $__Context->lang->search_result ?>"<?php } ?>""><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->cmd_search ?></button>
			<a class="btn btn-default btn-lg<?php if($__Context->act=='dispResourcePackageList' || $__Context->act=='dispResourcePackage'){ ?> active<?php } ?>" href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid,'act','dispResourcePackageList') ?>"><i class="fa fa-file" area-hidden="true"></i> <?php echo $__Context->lang->cmd_list_my_package ?></a>
			<a class="btn btn-default btn-lg<?php if($__Context->act=='dispResourceInsertPackage'){ ?> active<?php } ?>" href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid,'act','dispResourceInsertPackage') ?>"><i class="fa fa-plus" area-hidden="true"></i> <?php echo $__Context->lang->cmd_insert_package ?></a>
			<?php if($__Context->grant->manager){ ?>
         <a class="btn btn-default btn-lg<?php if($__Context->act=='dispResourceManage'){ ?> active<?php } ?>" href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid,'act','dispResourceManage') ?>"><i class="fa fa-filter" area-hidden="true"></i> <?php echo $__Context->lang->cmd_manage_package ?></a>
         <a class="btn btn-default btn-lg<?php if($__Context->act=='dispResourceAdminInsert'){ ?> active<?php } ?>" href="<?php echo getSiteUrl($__Context->site_module_info->domain, '', 'mid',$__Context->module_info->mid,'act','dispResourceAdminInsert') ?>"><i class="fa fa-cog" area-hidden="true"></i> <?php echo $__Context->lang->cmd_setup ?></a>
			<?php } ?>
		</p><?php } ?>
	</div>
	<div id="jumbotron-search-popover-content" class="hide">
		<?php if($__Context->module!='wiki'){ ?><form action="<?php echo getUrl() ?>" method="get" onsubmit="return procFilter(this, search)" <?php if($__Context->act=='dispBoardWrite'){ ?> target="_blank"<?php } ?>>
			<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
			<input type="hidden" name="act" value="" />
			<div class="form-group">
				<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" placeholder="<?php echo $__Context->lang->ss_search_input ?>" class="form-control" />
			</div>
			<div class="form-group">
				<?php if($__Context->module!='wiki' && $__Context->module!='resource'){ ?>
				<div class="row">
					<div class="col-sm-6">
						<select name="search_target" class="form-control">
							<?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
						</select>					
					</div>
					<div class="col-sm-6">
				<?php } ?>
						<button type="submit" class="btn btn-<?php echo $__Context->colorset ?> btn-block"><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->cmd_search ?></button>
				<?php if($__Context->module!='wiki' && $__Context->module!='resource'){ ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php if($__Context->last_division){ ?><div class="form-group">
			    <a href="<?php echo getUrl('page',1,'document_srl','','division',$__Context->last_division,'last_division','') ?>" class="btn btn-default"><?php echo $__Context->lang->cmd_search_next ?></a>
			</div><?php } ?>
		</form><?php } ?>
		<?php if($__Context->module=='wiki'){ ?><form action="<?php echo getUrl() ?>" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="act" value="dispWikiContent" />
			<div class="form-group">
				<input type="text" name="entry" placeholder="<?php echo $__Context->lang->cmd_move ?>" class="form-control" />
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-<?php echo $__Context->colorset ?> btn-block btn-sm"><i class="fa fa-link" area-hidden="true"></i> <?php echo $__Context->lang->cmd_move ?></button></div>
			</div>
		</form><?php } ?>
	</div>
	<?php } ?>
	<?php if($__Context->is_member_menu=='Y'){ ?><div class="container">
		<button type="button" id="jumbotron-hide" class="close" data-toggle="tooltip" data-title="<?php echo $__Context->lang->ss_hide_show ?>" data-placement="left"><i class="fa fa-angle-up" area-hidden="true"></i></button>
		<h1>
			<?php if($__Context->logged_info->menu_list&&count($__Context->logged_info->menu_list))foreach($__Context->logged_info->menu_list as $__Context->key=>$__Context->val){;
if($__Context->key==$__Context->act){ ?>
				<a href="<?php echo getUrl('', 'act',$__Context->key, 'mid', $__Context->mid, 'vid', $__Context->vid) ?>"><?php echo Context::getLang($__Context->val) ?></a>
			<?php }} ?>	
		</h1>
	</div><?php } ?>
</header>
<?php  unset($__Context->module);  ?>