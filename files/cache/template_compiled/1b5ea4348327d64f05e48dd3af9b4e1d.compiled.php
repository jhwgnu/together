<?php if(!defined("__XE__"))exit;?>
<?php 
	$__Context->t_pagec = $__Context->is_doc?($__Context->npage?$__Context->npage:'1'):($__Context->page?$__Context->page:'1');
	$__Context->t_pagep = $__Context->t_pagec - 1;
	$__Context->t_pagen = $__Context->t_pagec + 1;
	$__Context->t_pagei = $__Context->is_doc?'npage':'page';
 ?>
<div class="scPageArea">
	<?php if($__Context->mi->use_first_page==='Y' && $__Context->first_page){ ?>
	<div class="scPage">
		<a href="<?php echo getUrl('page','1') ?>" class="direction next" style="padding-left:0"><?php echo $__Context->lang->first_page ?> <span></span><span></span></a>
	</div>
	<?php }else{ ?>
	<?php if($__Context->page_navigation&&$__Context->page_navigation->total_page){ ?><div class="scPage">
		<a href="<?php echo getUrl('comment_srl','',$__Context->t_pagei,'1','division',$__Context->division,'last_division',$__Context->last_division);
echo $__Context->is_doc?'#navigation':'' ?>" class="direction prev"><span></span><span></span> <?php echo $__Context->lang->first_page ?></a>
		<?php while($__Context->page_no=$__Context->page_navigation->getNextPage()){ ?>
			<?php if($__Context->t_pagec==$__Context->page_no){ ?><strong><?php echo $__Context->page_no ?></strong><?php } ?>
			<?php if($__Context->t_pagec!=$__Context->page_no){ ?><a href="<?php echo getUrl('comment_srl','',$__Context->t_pagei,$__Context->page_no,'division',$__Context->division,'last_division',$__Context->last_division);
echo $__Context->is_doc?'#navigation':'' ?>"<?php if($__Context->t_pagep===$__Context->page_no){ ?> accesskey="b"<?php };
if($__Context->t_pagen===$__Context->page_no){ ?> accesskey="n"<?php } ?>><?php echo $__Context->page_no ?></a><?php } ?>
		<?php } ?>
		<a href="<?php echo getUrl('comment_srl','',$__Context->t_pagei,$__Context->page_navigation->last_page,'division',$__Context->division,'last_division',$__Context->last_division);
echo $__Context->is_doc?'#navigation':'' ?>" class="direction next"><?php echo $__Context->lang->last_page ?> <span></span><span></span></a>
	</div><?php } ?>
	<?php } ?>
	<?php if($__Context->is_doc || $__Context->pt_vtype!='A'){ ?>
	<div class="scAdmActs">
		<?php  $__Context->copyright_text = $__Context->mi->copyright_text ? explode(',', $__Context->mi->copyright_text):'' ?>
		<a <?php if($__Context->copyright_text){ ?>href="<?php echo $__Context->copyright_text[1] ?>" target="_blank"<?php }else{ ?>href="#beluxe"<?php } ?>><?php echo $__Context->copyright_text[0] ?></a>
		<?php if(!$__Context->is_poped && $__Context->grant->manager){ ?>
			<a href="#siManageBtn"><?php echo $__Context->lang->cmd_management ?></a>
			<span style="display:none">
				[<a href="#" data-type="admin"><?php echo $__Context->lang->cmd_setup ?></a>] [<a href="#" data-type="manage"><?php echo $__Context->lang->cmd_manage_document ?></a>]
				<?php if(count($__Context->cstus)){ ?>[<select style="border:0;padding:0;margin:0"><option value=""><?php echo $__Context->lang->status ?></option><?php if($__Context->cstus&&count($__Context->cstus))foreach($__Context->cstus as $__Context->key=>$__Context->value){ ?><option value="<?php echo $__Context->key ?>"><?php echo $__Context->value ?></option><?php } ?></select>]<?php } ?>
			</span>
		<?php } ?>
	</div>
	<?php }else{ ?>
	<div id="siCat" class="scAdmActs text">
		<ul>
			<li<?php if($__Context->search_target == 'is_adopted'&&$__Context->search_keyword=='Y'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('','mid', $__Context->mid, 'search_target', 'is_adopted','search_keyword', 'Y') ?>"><span><?php echo $__Context->lang->adopt ?></span></a></li>
			<li<?php if($__Context->search_target == 'is_adopted'&&$__Context->search_keyword=='N'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('','mid', $__Context->mid, 'search_target', 'is_adopted','search_keyword', 'N') ?>"><span><?php echo $__Context->lang->not_adopt ?></span></a></li>
			<?php if($__Context->logged_info){ ?>
				<?php  $__Context->_tmp = $__Context->logged_info->member_srl ?>
				<li<?php if($__Context->search_target == 'member_srl'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('','mid', $__Context->mid, 'search_target', 'member_srl','search_keyword', $__Context->_tmp) ?>"><span><?php echo $__Context->lang->search_my_document ?></span></a></li>
				<li<?php if($__Context->search_target == 't_comment_member_srl'){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('','mid', $__Context->mid, 'search_target', 't_comment_member_srl','search_keyword', $__Context->_tmp) ?>"><span><?php echo $__Context->lang->search_my_comment ?></span></a></li>
			<?php } ?>
			<?php if($__Context->grant->manager){ ?><li>
				<a href="#siManageBtn"><?php echo $__Context->lang->cmd_management ?></a>
				<span style="display:none">
				[<a href="#" data-type="admin"><?php echo $__Context->lang->cmd_setup ?></a>] [<a href="#" data-type="manage"><?php echo $__Context->lang->cmd_manage_document ?></a>]
				<?php if(count($__Context->cstus)){ ?>[<select style="border:0;padding:0;margin:0"><option value=""><?php echo $__Context->lang->status ?></option><?php if($__Context->cstus&&count($__Context->cstus))foreach($__Context->cstus as $__Context->key=>$__Context->value){ ?><option value="<?php echo $__Context->key ?>"><?php echo $__Context->value ?></option><?php } ?></select>]<?php } ?>
				</span>
			</li><?php } ?>
		</ul>
	</div>
	<?php } ?>
</div>