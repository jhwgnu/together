<?php if(!defined("__XE__"))exit;?><div class="scSchArea clearBar">
	<div class="scSch fl">
		<?php Context::addJsFile("modules/beluxe/ruleset/searchBeluxe.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="<?php echo getUrl('') ?>" method="get" id="searchFo" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="searchBeluxe" />
			<input type="hidden" name="category_srl" value="<?php echo $__Context->category_srl ?>" />
			<span class="scBtn black"><a href="<?php echo getUrl('act','dispBoardTagList') ?>" class="tagBtn" title="<?php echo $__Context->lang->tag ?>" accesskey="t"><em><?php echo $__Context->lang->tag ?></em></a></span>
			<select name="search_target" class="scSchTarget">
				<?php if(($__Context->ci['title']&&$__Context->ci['title']->search=='Y')&&($__Context->ci['content']&&$__Context->ci['content']->search=='Y')){ ?><option value="title_content"><?php echo Context::getLang('title_content') ?></option><?php } ?>
				<?php if($__Context->ci&&count($__Context->ci))foreach($__Context->ci as $__Context->key=>$__Context->val){;
if($__Context->val->search=='Y'){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->key==$__Context->search_target){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->name ?></option><?php }} ?>
				<?php if($__Context->search_target&&$__Context->ci[$__Context->search_target]->search!='Y'){ ?><option value="<?php echo $__Context->search_target ?>" selected="selected"><?php echo Context::getLang($__Context->search_target) ?></option><?php } ?>
			</select>
			<span class="scBtn"><input class="keyword" type="search" name="search_keyword" value="<?php echo $__Context->search_keyword ?>" /></span>
			<?php if(!$__Context->search_keyword||!$__Context->last_division){ ?><span class="scBtn"><button type="submit"><?php echo $__Context->lang->cmd_search ?></button></span><?php } ?>
			<?php if($__Context->search_keyword&&$__Context->last_division){ ?><span class="scBtn"><a href="<?php echo getUrl('page',1,'document_srl','','division',$__Context->last_division,'last_division','') ?>"><?php echo $__Context->lang->cmd_search_next ?></a></span><?php } ?>
			<?php if($__Context->search_keyword){ ?><span class="scBtn"><a href="<?php echo getUrl('','mid', $__Context->mid,'category_srl', $__Context->category_srl) ?>"><?php echo $__Context->lang->cmd_cancel ?></a></span><?php } ?>
		</form>
	</div>
	<div class="scBtnArea fr">
		<?php if($__Context->category_srl){ ?><span class="scBtn"><a href="<?php echo getUrl('','mid',$__Context->mid) ?>"><?php echo $__Context->lang->cmd_all_list ?></a></span><?php } ?>
		<?php if(!$__Context->category_srl&&$__Context->document_srl){ ?><span class="scBtn"><a href="<?php echo getUrl('act', '','document_srl','','page',$__Context->page,'npage','','cpage','') ?>"><?php echo $__Context->lang->cmd_list ?></a></span><?php } ?>
		<?php if((!$__Context->sedt_wbtn&&$__Context->is_sedt)||!$__Context->grant->write_document){ ?><span class="scBtn black"><?php if(!$__Context->is_logged){ ?><a href="<?php echo getUrl('act','dispMemberLoginForm') ?>"><?php echo $__Context->lang->cmd_login ?></a><?php };
if($__Context->is_logged){ ?><a href="#" onclick="location.reload();return false"><?php echo $__Context->lang->reload ?></a><?php } ?></span><?php } ?>
		<?php if($__Context->grant->write_document&&($__Context->sedt_wbtn||!$__Context->is_sedt)){ ?><span class="scBtn black">
		<a href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>"<?php if($__Context->us_modal){ ?> type="example/modal"<?php } ?> title="<?php echo $__Context->lang->new_document ?>" accesskey="w"><?php echo $__Context->lang->document_write ?></a>
		</span><?php } ?>
	</div>
</div>