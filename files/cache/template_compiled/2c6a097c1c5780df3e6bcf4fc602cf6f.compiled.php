<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/tpl','header.html') ?>
<div class="table even">
	<table width="100%" border="1" cellspacing="0">
		<caption><?php echo $__Context->module_category_srl>0?$__Context->module_category[$__Context->module_category_srl]->title:$__Context->lang->total ?> (<?php echo number_format($__Context->total_count) ?>), Page: <?php echo number_format($__Context->page) ?>/<?php echo number_format($__Context->total_page) ?></caption>
		<thead>
			<tr>
				<th scope="col" class="select_th" style="padding:0 5px;vertical-align:middle">
					<select class="changeLocation" name="module_category_srl" style="min-width:50px;width:auto;margin:0">
						<option value=""><?php echo $__Context->lang->category ?></option>
						<option value="0"<?php if($__Context->module_category_srl == '0'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->not_exists ?></option>
						<?php if($__Context->module_category&&count($__Context->module_category))foreach($__Context->module_category as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_category_srl==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
						<option value="">---------</option>
						<option value="-1"><?php echo $__Context->lang->cmd_management ?></option>
					</select>
				</th>
				<th scope="col"><?php echo $__Context->lang->cmd_setup ?></th>
				<th scope="col" class="wide"><?php echo $__Context->lang->browser_title ?></th>
				<th scope="col"><?php echo $__Context->lang->grant ?></th>
				<th scope="col"><?php echo $__Context->lang->mobile ?></th>
				<th scope="col"><?php echo $__Context->lang->regdate ?></th>
				<th scope="col"><?php echo $__Context->lang->cmd_delete ?> <?php echo $__Context->lang->cmd_copy ?></th>
				<th scope="col"><input type="checkbox" onclick="jQuery('input[name=cart]').attr('checked',jQuery(this).is(':checked'))" /></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="8">
					<a class="x_btn x_btn-inverse" href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispBeluxeAdminInsert') ?>"><?php echo $__Context->lang->module ?> <?php echo $__Context->lang->cmd_make ?></a>
					<div class="x_btn-group x_pull-right">
						<a class="x_btn" href="#dispBeluxeAdminInsert"><?php echo $__Context->lang->cmd_all_setting ?></a>
						<a class="x_btn" href="#dispModuleAdminModuleGrantSetup"><?php echo $__Context->lang->permission_setting ?></a>
					</div>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if($__Context->beluxe_list&&count($__Context->beluxe_list))foreach($__Context->beluxe_list as $__Context->key=>$__Context->val){ ?><tr>
				<td class="module_category nowrap">
					<?php if(!$__Context->val->module_category_srl){ ?>
						<?php if($__Context->val->site_srl){ ?>
						<?php echo $__Context->lang->virtual_site ?>
						<?php }else{ ?>
						<?php echo $__Context->lang->not_exists ?>
						<?php } ?>
					<?php }else{ ?>
						<?php echo $__Context->module_category[$__Context->val->module_category_srl]->title ?>
					<?php } ?>
				</td>
				<td class="nowrap"><a href="<?php echo getUrl('','module','admin', 'act','dispBeluxeAdminModuleInfo','module_srl',$__Context->val->module_srl) ?>"><strong><?php echo $__Context->val->mid ?></strong></a></td>
				<td class="module_title wide"><a href="<?php echo getSiteUrl($__Context->val->domain,'','mid',$__Context->val->mid) ?>" target="_blank"><span><?php echo htmlspecialchars($__Context->val->browser_title) ?></span></a></td>
				<td class="nowrap"><span><?php echo $__Context->val->grants['access']?$__Context->val->grants['access']:'A' ?>,</span><span><?php echo $__Context->val->grants['list']?$__Context->val->grants['list']:'A' ?>,</span><span><?php echo $__Context->val->grants['view']?$__Context->val->grants['view']:'A' ?>,</span><span><?php echo $__Context->val->grants['write_document']?$__Context->val->grants['write_document']:'A' ?>,</span><span><?php echo $__Context->val->grants['write_comment']?$__Context->val->grants['write_comment']:'A' ?>,</span><span><?php echo $__Context->val->grants['manager']?$__Context->val->grants['manager']:'N' ?></span></td>
				<td class="nowrap"><?php echo $__Context->val->use_mobile=='Y'?$__Context->lang->use:$__Context->lang->notuse ?></td>
				<td class="module_regdate nowrap"><?php echo zdate($__Context->val->regdate,"Y-m-d") ?></td>
				<td class="nowrap">
					<a href="#manageDeleteModule" title="<?php echo $__Context->lang->cmd_delete ?>" class="modalAnchor" data-val="<?php echo $__Context->val->mid ?>|@|<?php echo $__Context->val->module_srl ?>"><span><?php echo $__Context->lang->cmd_delete ?></span></a>
					<a href="#doBeluxeSettingCopy" title="<?php echo $__Context->lang->cmd_copy ?>" data-val="<?php echo $__Context->val->mid ?>|@|<?php echo $__Context->val->module_srl ?>"><span><?php echo $__Context->lang->cmd_copy ?></span></a>
				</td>
				<td><input type="checkbox" name="cart" value="<?php echo $__Context->val->mid ?>|@|<?php echo $__Context->val->module_srl ?>" /></td>
			</tr><?php } ?>
		</tbody>
	</table>
</div>
<div class="x_clearfix" style="margin-top:-10px">
	<?php if($__Context->page_navigation){ ?><form action="./" class="x_pagination x_pull-left" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<?php if($__Context->param&&count($__Context->param))foreach($__Context->param as $__Context->key=>$__Context->val){;
if(!in_array($__Context->key, array('mid', 'vid', 'act'))){ ?><input type="hidden" name="<?php echo $__Context->key ?>" value="<?php echo $__Context->val ?>" /><?php }} ?>
		<ul>
			<li<?php if(!$__Context->page || $__Context->page == 1){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', '') ?>">&laquo; <?php echo $__Context->lang->first_page ?></a></li>
			<?php if($__Context->page_navigation->first_page != 1 && $__Context->page_navigation->first_page + $__Context->page_navigation->page_count > $__Context->page_navigation->last_page - 1 && $__Context->page_navigation->page_count != $__Context->page_navigation->total_page){ ?>
			<?php $__Context->isGoTo = true ?>
			<li>
				<a href="#goTo" data-toggle title="<?php echo $__Context->lang->cmd_go_to_page ?>">&hellip;</a>
				<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
					<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $__Context->lang->cmd_go_to_page ?>" />
					<button type="submit" class="x_add-on">Go</button>
				</span><?php } ?>
			</li>
			<?php } ?>
			<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
			<?php $__Context->last_page = $__Context->page_no ?>
			<li<?php if($__Context->page_no == $__Context->page){ ?> class="x_active"<?php } ?>><a  href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
			<?php } ?>
			<?php if($__Context->last_page != $__Context->page_navigation->last_page && $__Context->last_page + 1 != $__Context->page_navigation->last_page){ ?>
			<?php $__Context->isGoTo = true ?>
			<li>
				<a href="#goTo" data-toggle title="<?php echo $__Context->lang->cmd_go_to_page ?>">&hellip;</a>
				<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
					<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $__Context->lang->cmd_go_to_page ?>" />
					<button type="submit" class="x_add-on">Go</button>
				</span><?php } ?>
			</li>
			<?php } ?>
		<li<?php if($__Context->page == $__Context->page_navigation->last_page){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>" title="<?php echo $__Context->page_navigation->last_page ?>"><?php echo $__Context->lang->last_page ?> &raquo;</a></li>
		</ul>
	</form><?php } ?>
	<form action="" class="search x_input-append x_pull-right" style="margin-bottom:-28px" method="get" onsubmit="return (this.search_keyword.value!='')" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<?php if($__Context->module=='admin'){ ?><input type="hidden" name="module" value="<?php echo $__Context->module ?>" /><?php } ?>
		<select name="search_target" title="<?php echo $__Context->lang->search_target ?>" style="margin-right:4px">
			<option value="mid"<?php if($__Context->search_target=='mid'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->mid ?></option>
			<option value="browser_title"<?php if($__Context->search_target=='browser_title'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->browser_title ?></option>
		</select>
		<input type="text" name="search_keyword" required value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" />
		<input class="x_btn x_btn-inverse" type="submit" value="<?php echo $__Context->lang->cmd_search ?>" />
		<?php if($__Context->search_keyword){ ?><a class="x_btn" href="<?php echo getUrl('search_target', '', 'search_keyword', '') ?>"><?php echo $__Context->lang->cmd_cancel ?></a><?php } ?>
	</form>
</div>
<section id="manageDeleteModule" class="x_modal x" style="display:none">
	<div class="x_modal-header">
		<h1><?php echo $__Context->lang->confirm_delete ?></h1>
	</div>
	<?php Context::addJsFile("modules/beluxe/ruleset/deleteBeluxe.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" id="deleteFo"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="deleteBeluxe" />
	<div class="x_modal-body">
		<?php if($__Context->module=='admin'){ ?><input type="hidden" name="module" value="<?php echo $__Context->module ?>" /><?php } ?>
		<input type="hidden" name="act" value="procBeluxeAdminDelete" />
		<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
		<input type="hidden" name="module_srl" value="" />
		<div class="table even">
			<table width="100%" border="1" cellspacing="0">
				<col width="200px" />
				<tr>
					<th scope="row"><?php echo $__Context->lang->module_category ?></th>
					<td class="module_category wide">&nbsp;</td>
				</tr>
				<tr>
					<th scope="row"><?php echo $__Context->lang->mid ?></th>
					<td class="module_mid wide">&nbsp;</td>
				</tr>
				<tr>
					<th scope="row"><?php echo $__Context->lang->browser_title ?></th>
					<td class="module_title">&nbsp;</td>
				</tr>
				<tr>
					<th scope="row"><?php echo $__Context->lang->regdate ?></th>
					<td class="module_regdate wide">&nbsp;</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="x_modal-footer">
		<span class="x_pull-left"><strong class="colRed">Warning! </strong> <?php echo $__Context->lang->msg_delete_this_module ?></span>
		<span class="x_pull-right">
			<input class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->lang->cmd_delete ?>" />
			<button type="button" class="x_btn" data-hide="#manageSelectedModule"><?php echo $__Context->lang->cmd_close ?></button>
		</span>
	</div>
	</form>
</section>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/tpl','footer.html') ?>
