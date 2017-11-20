<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/kin/skins/xe_kin_official','header.include.html') ?>
<div<?php if($__Context->module_info->default_style == 'horizontal' || !$__Context->module_info->default_style){ ?> class="column_left"<?php };
if($__Context->module_info->default_style == 'vertical'){ ?> class="column_single"<?php } ?>>
	<form class="search_form corner05 clearfix" action="<?php echo getUrl() ?>" method="get" id="fo_kin_search"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<?php if($__Context->vid){ ?><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><?php } ?>
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
		<fieldset>
			<legend class="blind">search</legend>
			<div class="ipt_box">
				<span class="bullet"></span>
				<span class="ipt_inner"><input type="text" class="ipt_txt" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>"/></span>
				<input type="image" src="/modules/kin/skins/xe_kin_official/img/btn_srch_sbmt.png" width="67" height="32" class="btn_sbmt_srch" onclick="xGetElementById('fo_kin_search').submit();return false;"/>
			</div>
		
			<!-- border-round elements -->
			<span class="corn l"></span><span class="corn r"></span>
		</fieldset>
	</form>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/kin/skins/xe_kin_official','category.include.html') ?>
	<?php if($__Context->is_logged && $__Context->module_info->default_style == 'vertical'){ ?><table class='pointFont'>
		<thead>
			<tr>
				<td class="pointFont titleName"><?php echo $__Context->lang->user ?>:</td><td><?php echo $__Context->logged_info->nick_name ?></td>
				<td class="pointFont titleName" style="padding-left:5px"><?php echo $__Context->lang->point ?>:</td><td class="pointNumFont"><?php echo number_format(intval($__Context->document_top['userPoint']['point'])) ?></td>
				<td class="btns clearfix">
					<a href="<?php echo getUrl('act','','page',1,'type','my_questions','q_target','') ?>" class="btn_gray pull-left"><span><?php echo $__Context->lang->kin_main_tabs[5] ?></span></a>
					<a href="<?php echo getUrl('act','','page',1,'type','my_replies','q_target','') ?>" class="btn_gray pull-right"><span><?php echo $__Context->lang->kin_main_tabs[6] ?></span></a>
				</td>
			</tr>
		</thead>
	</table><?php } ?>
	<div class="sec_list">
		<div<?php if($__Context->module_info->default_style == 'horizontal' || !$__Context->module_info->default_style){ ?> class="tab_header"<?php };
if($__Context->module_info->default_style == 'vertical'){ ?> class="tab_header tab_horizontal"<?php } ?>>
			<?php if($__Context->type != 'my_questions' && $__Context->type != 'my_replies' && $__Context->type != 'popular' && $__Context->type != 'popular_answers'){ ?><ul class="tabgroup">
				<li<?php if($__Context->type=='questions'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',1,'type','questions') ?>"><span><?php echo $__Context->lang->kin_main_tabs[2] ?></span></a></li>
				<li<?php if($__Context->type=='selected'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',1,'type','selected') ?>"><span><?php echo $__Context->lang->kin_main_tabs[4] ?></span></a></li>
				<li<?php if($__Context->type=='score'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',1,'type','score') ?>"><span><?php echo $__Context->lang->kin_main_tabs[7] ?></span></a></li>
				<li <?php if($__Context->type=='replies'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',1,'type','replies') ?>"><span><?php echo $__Context->lang->kin_main_tabs[3] ?></span></a></li>
			</ul><?php } ?>
			<?php if($__Context->type == 'my_questions' || $__Context->type == 'my_replies'){ ?><ul class="tabgroup">
				<li<?php if($__Context->type=='my_questions'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',1,'type','my_questions') ?>"><span><?php echo $__Context->lang->kin_main_tabs[5] ?></span></a></li>
				<li<?php if($__Context->type=='my_replies'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',1,'type','my_replies') ?>"><span><?php echo $__Context->lang->kin_main_tabs[6] ?></span></a></li>
			</ul><?php } ?>
			<?php if($__Context->type == 'popular' || $__Context->type == 'popular_answers'){ ?><ul class="tabgroup">
				<li<?php if($__Context->type=='popular'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',1,'type','popular') ?>"><span><?php echo $__Context->lang->kin_main_tabs[8] ?></span></a></li>
				<li<?php if($__Context->type=='popular_answers'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',1,'type','popular_answers') ?>"><span><?php echo $__Context->lang->kin_main_tabs[9] ?></span></a></li>
			</ul><?php } ?>
			<div class="sum">
				<em>	<?php echo number_format($__Context->page_navigation->total_count) ?>, <?php echo $__Context->page ?>/<?php echo number_format($__Context->page_navigation->total_page) ?> pages</em>
			</div>
			<?php if($__Context->type == 'my_questions' || $__Context->type == 'popular'){ ?><div class="form_s_row">
                <select name="" id="q_select_target" class="right fe_sel">
                    <option value="all" <?php if($__Context->q_target=='all'){ ?>selected<?php } ?>><?php echo $__Context->lang->all_questions ?></option>
                    <option value="unsolved" <?php if($__Context->q_target=='unsolved'){ ?>selected<?php } ?>><?php echo $__Context->lang->kin_main_tabs[2] ?></option>
					<option value="solved" <?php if($__Context->q_target=='solved'){ ?>selected<?php } ?>><?php echo $__Context->lang->kin_main_tabs[4] ?></option>
                </select>
            </div><?php } ?>
		</div><!-- /header -->
		<div class="board_lst">
			<table cellspacing="0" class="articles">
				<caption class="blind">Question List</caption>
				<thead>
					<tr>
						<?php if($__Context->module_info->use_category == 'Y'){ ?><th scope="col" class="frst"><?php echo $__Context->lang->ask_category ?></th><?php } ?>
						<th scope="col" class="col2"><?php echo $__Context->lang->title ?></th>
						<?php if($__Context->type!='replies' && $__Context->type!='my_replies'){ ?><th scope="col" class="col3">
							<?php if($__Context->type!='popular' && $__Context->type!='popular_answers'){;
echo $__Context->lang->answers;
} ?>
							<?php if($__Context->type=='popular' || $__Context->type=='popular_answers'){;
echo $__Context->lang->voted_count;
} ?>
						</th><?php } ?>
						<th scope="col" class="col4" >
							<?php if($__Context->type!='my_questions' && $__Context->type!='my_replies'){;
echo $__Context->lang->writer;
} ?>
							<?php if($__Context->type=='my_questions' || $__Context->type=='my_replies'){;
echo $__Context->lang->status;
} ?>
						</th>
						<th scope="col" class="last"><?php echo $__Context->lang->regdate ?></th>
					</tr>
				</thead>
				<tbody class="document_list">
				<?php if(count($__Context->document_list) || count($__Context->reply_list)){ ?>
					<?php if($__Context->document_list){ ?>
						<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->oDocument){ ?><tr>
							<?php if($__Context->module_info->use_category == 'Y'){ ?><td class="frst">
								<?php if($__Context->oDocument->get('category_srl')){ ?><a href="<?php echo getUrl('category_srl',$__Context->oDocument->get('category_srl')) ?>"><?php echo $__Context->categories[$__Context->oDocument->get('category_srl')]->title ?></a><?php } ?>
								<?php if(!$__Context->oDocument->get('category_srl')){ ?>
									&nbsp;
								<?php } ?>
							</td><?php } ?>
							<td class="col2">
								<div><span class="point"><?php echo number_format($__Context->document_kins[$__Context->oDocument->document_srl]) ?></span>
								<a class="kin_document_title" href="<?php echo getUrl('','document_srl',$__Context->oDocument->document_srl,'search_keyword',$__Context->search_keyword) ?>"><?php echo $__Context->oDocument->getTitle() ?></a></div>
							</td>
							<?php if($__Context->type!='replies'){ ?><td class="col3">
								<?php if($__Context->type != 'popular'){;
echo $__Context->oDocument->getCommentCount();
} ?>
								<?php if($__Context->type == 'popular'){;
echo $__Context->oDocument->get('voted_count');
} ?>
							</td><?php } ?>
							<td class="col4">
								<?php if($__Context->type!='my_questions' && $__Context->type!='my_replies'){ ?><a href="#" onclick="return false;" class="member_<?php echo $__Context->oDocument->get('member_srl') ?> kin_document_author"><?php echo $__Context->oDocument->getNickname() ?></a><?php } ?>
								<?php if($__Context->type=='my_questions' || $__Context->type=='my_replies'){ ?>
									<?php if($__Context->oDocument->get('selected')){ ?>
										<?php echo $__Context->lang->solved ?>
									<?php }else{ ?>
										<?php echo $__Context->lang->unsolved ?>
									<?php } ?>
								<?php } ?>
							</td>
							<td class="date"><?php echo $__Context->oDocument->getRegdate("y.m.d") ?></td>
						</tr><?php } ?>
					<?php }elseif($__Context->reply_list){ ?>
						<?php if($__Context->reply_list&&count($__Context->reply_list))foreach($__Context->reply_list as $__Context->oReply){ ?><tr>
							<?php if($__Context->module_info->use_category == 'Y'){ ?><td class="frst">
								<?php if($__Context->oReply->get('category_srl')){ ?><a href="<?php echo getUrl('category_srl',$__Context->oReply->get('category_srl')) ?>"><?php echo $__Context->categories[$__Context->oReply->get('category_srl')]->title ?></a><?php } ?>
								<?php if(!$__Context->oReply->get('category_srl')){ ?>
									&nbsp;
								<?php } ?>
							</td><?php } ?>
							<td class="col2">
								<div><span class="point"><?php echo number_format($__Context->document_kins[$__Context->oReply->get('document_srl')]) ?></span>
								<a href="<?php echo getUrl('','document_srl',$__Context->oReply->get('document_srl')) ?>#comment_<?php echo $__Context->oReply->get('comment_srl') ?>"><?php echo $__Context->oReply->getSummary(70) ?></a></div>
							</td>
							<?php if($__Context->type == 'popular_answers'){ ?><td class="col3"><?php echo $__Context->oReply->get('voted_count') ?></td><?php } ?>
							<td class="col4">
								<?php if($__Context->type!='my_questions' && $__Context->type!='my_replies'){ ?><a href="#" onclick="return false;" class="member_<?php echo $__Context->oReply->get('member_srl') ?>"><?php echo $__Context->oReply->getNickName() ?></a><?php } ?>
								<?php if($__Context->type=='my_questions' || $__Context->type=='my_replies'){ ?>
									<?php if($__Context->oReply->get('selected')){ ?>
										<?php echo $__Context->lang->accepted ?>
									<?php }else{ ?>
										<?php echo $__Context->lang->unaccepted ?>
									<?php } ?>
								<?php } ?>
							</td>
							<td class="date"><?php echo $__Context->oReply->getRegdate("y.m.d") ?></td>
						</tr><?php } ?>
					<?php } ?>
				<?php }else{ ?>
					<tr><td colspan="5">
						<p class="none">							
							<?php if($__Context->category_info){ ?>
								<strong><span><?php echo $__Context->lang->category ?> :</span></strong>
								<?php echo $__Context->category_info->title ?>,
							<?php } ?>
							<strong><span><?php echo $__Context->lang->type ?> :</span></strong>
							<?php if(!$__Context->type){;
echo $__Context->lang->kin_all_questions;
} ?>
							<?php if($__Context->type=='questions'){;
echo $__Context->lang->kin_main_tabs[2];
} ?>
							<?php if($__Context->type=='replies'){;
echo $__Context->lang->kin_main_tabs[3];
} ?>
							<?php if($__Context->type=='selected'){;
echo $__Context->lang->kin_main_tabs[4];
} ?>
							<?php if($__Context->type=='score'){;
echo $__Context->lang->kin_main_tabs[7];
} ?>
							<?php if($__Context->type=='my_questions' && $__Context->is_logged){;
echo $__Context->lang->kin_main_tabs[5];
} ?>
							<?php if($__Context->type=='my_replies' && $__Context->is_logged){;
echo $__Context->lang->kin_main_tabs[6];
} ?>
							<?php if($__Context->type=='popular'){;
echo $__Context->lang->kin_main_tabs[8];
} ?>
							<?php if($__Context->type=='popular_answers'){;
echo $__Context->lang->kin_main_tabs[9];
} ?>
							<?php if($__Context->search_keyword){ ?>
								<strong><span>, <?php echo $__Context->lang->search_keyword ?> :</span></strong>
								<?php echo $__Context->search_keyword ?>
							<?php } ?>
							, <?php echo $__Context->lang->msg_no_article ?>
						</p>
					</td></tr>
				<?php } ?>
				</tbody>
			</table>
			<?php if($__Context->page_navigation){ ?><div class="pagination">
				<a class="prevEnd" href="<?php echo getUrl('page','') ?>"><i class="ico_prev"></i><?php echo $__Context->lang->first_page ?></a>
				<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
					<?php if($__Context->page == $__Context->page_no){ ?>
						<strong><?php echo $__Context->page_no ?></strong>
					<?php }else{ ?>
						<a href="<?php echo getUrl('page',$__Context->page_no) ?>"><?php echo $__Context->page_no ?></a>
					<?php } ?>
				<?php } ?>
				<a class="nextEnd" href=""><?php echo $__Context->lang->last_page ?><i class="ico_next"></i></a>
			</div><?php } ?>
			<a href="<?php echo getUrl('act','dispKinWrite','document_srl','') ?>" class="btn_ask"><span><?php echo $__Context->lang->cmd_ask ?></span></a>
		</div>
	</div><!-- //sec_list -->
</div><!-- //column_left -->
<script type="text/javascript">
	jQuery(function($){
		$('#q_select_target').change(function(){
			var url = "<?php echo getUrl('page',1,'type',$__Context->type) ?>"+"&amp;q_target="+$(this).val();
			url = url.replace(/&amp;/g,"&");
			window.location = url;
		});
	});
</script>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/kin/skins/xe_kin_official','widget.inlcude.html') ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/kin/skins/xe_kin_official','footer.include.html') ?>
