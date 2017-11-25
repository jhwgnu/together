<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default/mobile','___setting.html') ?>
<div class="bd" id="<?php echo $__Context->is_doc?'read':'list' ?>">
	<?php if($__Context->is_cts||$__Context->pt_vtype=='A'){ ?><div class="sd">
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default/mobile','category.html') ?>
	</div><?php } ?>
	<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div id="xe_message" class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<section class="st">
	<h2 class="gn cb">
		<?php if($__Context->is_cts||$__Context->pt_vtype=='A'){ ?>
			<a href="#categoryOpen">
				<?php  $__Context->pcatlst = array() ?>
				<?php if($__Context->category_srl){ ?>
					<?php  $__Context->psrl = $__Context->cts[$__Context->category_srl]->parent_srl ?>
					<?php for($__Context->i=0;$__Context->i<999;$__Context->i++){ ?>
						<?php if(!$__Context->psrl){;
break;
} ?>
						<?php 
							$__Context->pcatlst[] = $__Context->cts[$__Context->psrl]->title;
							$__Context->psrl = $__Context->cts[$__Context->psrl]->parent_srl;
						 ?>
					<?php } ?>
				<?php } ?>
				<?php if(count($__Context->pcatlst)){ ?>
					<?php  $__Context->pcatlst = array_reverse($__Context->pcatlst) ?>
					<?php if($__Context->pcatlst&&count($__Context->pcatlst))foreach($__Context->pcatlst as $__Context->key=>$__Context->val){ ?><span> <?php echo $__Context->key>0?'..':$__Context->val ?> &rsaquo;</span><?php } ?>
				<?php } ?>
				<span class="ca">
					<?php echo $__Context->category_srl?$__Context->cts[$__Context->category_srl]->title:$__Context->mi->browser_title ?>
				</span>
			</a>
		<?php } ?>
		<?php if(!$__Context->is_cts&&$__Context->pt_vtype!='A'){ ?><a href="#noCategory" onclick="return false"><span><?php echo $__Context->mi->browser_title ?></span></a><?php } ?>
		<?php if(($__Context->sedt_wbtn||!$__Context->is_sedt)&&$__Context->grant->write_document){ ?><a href="<?php echo getUrl('act','dispBoardWrite','document_srl','','page',$__Context->page) ?>" title="<?php echo $__Context->lang->new_document ?>" class="wt"><?php echo $__Context->lang->cmd_write ?></a><?php } ?>
	</h2>
	<?php if($__Context->is_doc||$__Context->mi->title||$__Context->mi->sub_title||$__Context->mi->board_desc){ ?><div class="pn cb ts">
	<?php if($__Context->is_doc){ ?>
		<?php 
			$__Context->ds_nick = $__Context->ci['nick_name']->display == 'Y';
			$__Context->ds_user =  $__Context->ci['user_name']->display == 'Y';
			$__Context->dmb_srl = $__Context->oDocument->get('member_srl');
			$__Context->is_scrap = $__Context->ds_scrap?$__Context->oThis->isScrap($__Context->oDocument->document_srl):0;
			$__Context->nick = (!$__Context->dmb_srl||$__Context->ds_nick||!$__Context->ds_user)?$__Context->oDocument->getNickName():$__Context->oDocument->getUserName();
		 ?>
		<h3 title="<?php echo $__Context->oDocument->getPermanentUrl() ?>"><?php echo $__Context->oDocument->getTitle() ?></h3>
		<p>
			<?php if($__Context->is_scrap){ ?><img src="/modules/beluxe/skins/default/img/common/blank.gif" class="ise scrap" alt="Scrap" title="Scrap" /><?php } ?>
			<span class="<?php echo $__Context->dmb_srl?'member_'.$__Context->dmb_srl:'fsi' ?> ex"><?php echo cut_str($__Context->nick, $__Context->mi->nickname_length) ?></span>
			<time class="ex fr"><?php echo $__Context->oDocument->getRegdate('Y.m.d H:i') ?></time>
		</p>
	<?php }else{ ?>
		<?php if($__Context->mi->title||$__Context->mi->sub_title){ ?><h3><?php echo $__Context->mi->title ?> <span class="sbt"><?php echo $__Context->mi->sub_title ?></span></h3><?php } ?>
		<?php if($__Context->mi->board_desc){ ?><p><?php echo $__Context->mi->board_desc ?></p><?php } ?>
	<?php } ?>
	</div><?php } ?>
	<?php if($__Context->mi->use_first_page==='Y' && $__Context->first_page){ ?><div class="cb" style="padding:0 10px">
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default/mobile','_firstpage.html') ?>
	</div><?php } ?>
	<?php if($__Context->is_sedt=='T'||$__Context->is_sedt=='C'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default/mobile','_simplewrite.html');
} ?>
	<?php if($__Context->grant->manager || $__Context->is_sedt != 'C'){ ?>
	<?php if($__Context->is_doc){ ?>
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/beluxe/skins/default/mobile','_read.html') ?>
	<?php }else{ ?>
		<div class="bls cb">
		<?php 
			($__Context->ci['thumbnail']->display=='Y'||$__Context->lsttp!='list')?$__Context->lsttp='webzine':0;
			$__Context->oTemplate = &TemplateHandler::getInstance();
			print $__Context->oTemplate->compile($__Context->tpl_path, '_lst.'.$__Context->lsttp.'.html');
		 ?>
		</div>
	<?php if($__Context->mi->use_first_page==='Y' && $__Context->first_page){ ?>
		<div class="pn cb">
			<a href="<?php echo getUrl('page','1') ?>" accesskey="n" class="next bn white"><?php echo $__Context->lang->first_page ?></a>
		</div>
	<?php }else{ ?>
		<?php if($__Context->page_navigation){ ?><div class="pn cb">
			<?php if($__Context->page != 1){ ?><a href="<?php echo getUrl('document_srl','','comment_srl','','page',$__Context->page-1,'division',$__Context->division,'last_division',$__Context->last_division) ?>" accesskey="b" class="prev bn white"><?php echo $__Context->lang->cmd_prev ?></a><?php } ?>
			<strong><?php echo $__Context->page ?> / <?php echo $__Context->page_navigation->last_page ?></strong>
			<?php if($__Context->page != $__Context->page_navigation->last_page){ ?><a href="<?php echo getUrl('document_srl','','comment_srl','','page',$__Context->page+1,'division',$__Context->division,'last_division',$__Context->last_division) ?>" accesskey="n" class="next bn white"><?php echo $__Context->lang->cmd_next ?></a><?php } ?>
			<?php  $__Context->copyright_text = $__Context->mi->copyright_text ? explode(',', $__Context->mi->copyright_text):'' ?>
			<a <?php if($__Context->copyright_text){ ?>href="<?php echo $__Context->copyright_text[1] ?>" target="_blank"<?php }else{ ?>href="#beluxe"<?php } ?> class="lic fr"><?php echo $__Context->copyright_text[0] ?></a>
		</div><?php } ?>
	<?php } ?>
		<div class="sh cb">
			<form action="<?php echo getUrl() ?>" method="get"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
				<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
				<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
				<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
				<select name="search_target">
					<?php if(($__Context->ci['title']&&$__Context->ci['title']->search=='Y')&&($__Context->ci['content']&&$__Context->ci['content']->search=='Y')){ ?><option value="title_content"><?php echo Context::getLang('title_content') ?></option><?php } ?>
					<?php if($__Context->ci&&count($__Context->ci))foreach($__Context->ci as $__Context->key=>$__Context->val){;
if($__Context->val->search=='Y'){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->key==$__Context->search_target){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->name ?></option><?php }} ?>
					<?php if($__Context->search_target&&$__Context->ci[$__Context->search_target]->search!='Y'){ ?><option value="<?php echo $__Context->search_target ?>" selected="selected"><?php echo Context::getLang($__Context->search_target) ?></option><?php } ?>
				</select>
				<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" title="<?php echo $__Context->lang->cmd_search ?>" />
				<button type="submit" class="sb" title="<?php echo $__Context->lang->cmd_search ?>">Search</button>
			</form>
		</div>
	<?php } ?>
	<?php } ?>
	</section>
</div>