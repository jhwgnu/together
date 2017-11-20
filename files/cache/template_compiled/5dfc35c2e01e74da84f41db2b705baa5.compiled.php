<?php if(!defined("__XE__"))exit;
if($__Context->module_info->default_style == 'vertical'){ ?><div class="content_bottom">
	<div class="topPeriodPoint">
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="listBox">
			<thead>
				<tr>
					<th colspan="2"><?php echo $__Context->lang->popular_questions ?><span><a href="<?php echo getUrl('act','','page',1,'type','popular','q_target','') ?>"  class="h_more">more</a></span></th>
				</tr>
			</thead>
			<tbody>
				<?php if($__Context->popular_list&&count($__Context->popular_list))foreach($__Context->popular_list as $__Context->key=>$__Context->val){ ?><tr>
					<td><a href="<?php echo getUrl('','document_srl',$__Context->val->document_srl) ?>"><?php echo cut_str($__Context->val->get('title'),30,'...') ?></a></td>
				</tr><?php } ?>
				<?php if(!$__Context->popular_list){ ?><tr><td><a href="" onclick="return false;">No popular questions information</a></td></tr><?php } ?>
			</tbody>
		</table>
	</div>
	<div class="MonthTopPoint">
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="listBox">
			<thead>
				<tr>
					<th colspan="2"><?php echo $__Context->lang->topLastWeek ?><span><a href="<?php echo getUrl('page',1,'act','dispKinPointRank','rtarget','week','type','') ?>"  class="h_more">more</a></span></th>
				</tr>
			</thead>
			<tbody>
				<?php if($__Context->document_top['lastWeek']&&count($__Context->document_top['lastWeek']))foreach($__Context->document_top['lastWeek'] as $__Context->row){ ?><tr>
					<td width="50%" class="ln23">&nbsp;<?php echo $__Context->row['nick_name'] ?></td>
					<td width="50%" align="right" class="ln23"><?php echo number_format($__Context->row['point']) ?>&nbsp;&nbsp;</td>
				</tr><?php } ?>
				<?php if(!$__Context->document_top['lastWeek']){ ?><tr><td>No weekly points rank information</td></tr><?php } ?>
			</tbody>
		</table>
	</div>
	<div class="topPoint">
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="listBox">
			<thead>
				<tr>
					<th colspan="2"><?php echo $__Context->lang->totalPointTop ?><span><a href="<?php echo getUrl('page',1,'act','dispKinPointRank','rtarget','total','type','') ?>"  class="h_more">more</a></span></th>
				</tr>
			</thead>
			<tbody>
				<?php if($__Context->document_top['totalPoint']&&count($__Context->document_top['totalPoint']))foreach($__Context->document_top['totalPoint'] as $__Context->row){ ?><tr>
					<td width="50%" class="ln23">&nbsp;<?php echo $__Context->row['nick_name'] ?></td>
					<td width="50%" align="right" class="ln23"><?php echo number_format($__Context->row['point']) ?>&nbsp;&nbsp;</td>
				</tr><?php } ?>	
				<?php if(!$__Context->document_top['totalPoint']){ ?><tr><td>No total points rank information</td></tr><?php } ?>
			</tbody>
		</table>
	</div>
</div><?php } ?>
<?php if($__Context->module_info->default_style == 'horizontal' || !$__Context->module_info->default_style){ ?><div class="aside">
<span class="bg_h"></span>
	<?php if($__Context->logged_info){ ?><div class="mb_box">
		<span class="mb_bg_h"></span>
		<ul class="lst_mbinfo">
			<li><span class="l"><?php echo $__Context->lang->user_name ?></span><span class="r"><?php echo $__Context->logged_info->nick_name ?></span></li>
			<li><span class="l"><?php echo $__Context->lang->point ?></span><span class="r blue"><?php echo number_format(intval($__Context->document_top['userPoint']['point'])) ?></span></li>
		</ul>
		<div class="btns clearfix">
			<a href="<?php echo getUrl('act','','page',1,'type','my_questions','q_target','') ?>" class="btn_gray pull-left"><span><?php echo $__Context->lang->kin_main_tabs[5] ?></span></a>
			<a href="<?php echo getUrl('act','','page',1,'type','my_replies','q_target','') ?>" class="btn_gray pull-right"><span><?php echo $__Context->lang->kin_main_tabs[6] ?></span></a>
		</div>
		<span class="mb_bg_b"></span>
	</div><?php } ?><!-- //mb_box -->
	<div class="w_box">
		<h3 class="w_title"><?php echo $__Context->lang->popular_questions ?></h3>
		<div class="w_body">
			<ul class="lst_title">
				<?php if($__Context->popular_list&&count($__Context->popular_list))foreach($__Context->popular_list as $__Context->key=>$__Context->val){ ?><li>
					<a href="<?php echo getUrl('','document_srl',$__Context->val->document_srl) ?>"><?php echo $__Context->val->get('title') ?></a>
				</li><?php } ?>
				<?php if(!$__Context->popular_list){ ?><li><a href="" onclick="return false;">No popular questions information</a></li><?php } ?>
			</ul>
		</div>
		<a href="<?php echo getUrl('act','','page',1,'type','popular','q_target','') ?>" class="w_more"><span>more</span></a>
	</div>
	<div class="w_box">
		<h3 class="w_title"><?php echo $__Context->lang->topLastWeek ?></h3>
		<div class="w_body">
			<ul class="point_rank">
				<?php  $__Context->rank_index = 1; ?>
				<?php if($__Context->document_top['lastWeek']&&count($__Context->document_top['lastWeek']))foreach($__Context->document_top['lastWeek'] as $__Context->row){ ?><li<?php if($__Context->rank_index==1){ ?> class="r1"<?php } ?>>
					<span class="idx"><?php echo $__Context->rank_index ?></span>
					<span class="name"><a href=""><?php echo $__Context->row['nick_name'] ?></a></span>
					<span class="int"><em><?php echo number_format($__Context->row['point']) ?></em></span>
					<?php  $__Context->rank_index++; ?>
				</li><?php } ?>
				<?php if(!$__Context->document_top['lastWeek']){ ?><li><span>No weekly points rank information<span></li><?php } ?>
			</ul>
		</div>
		<a href="<?php echo getUrl('page',1,'act','dispKinPointRank','rtarget','week','type','') ?>" class="w_more"><span>more</span></a>
	</div>
	<div class="w_box">
		<h3 class="w_title"><?php echo $__Context->lang->totalPointTop ?></h3>
		<div class="w_body">
			<ul class="point_rank">
				<?php  $__Context->rank_index = 1; ?>
				<?php if($__Context->document_top['totalPoint']&&count($__Context->document_top['totalPoint']))foreach($__Context->document_top['totalPoint'] as $__Context->row){ ?><li<?php if($__Context->rank_index==1){ ?> class="r1"<?php } ?>>
					<span class="idx"><?php echo $__Context->rank_index ?></span>
					<span class="name"><a href=""><?php echo $__Context->row['nick_name'] ?></a></span>
					<span class="int"><em><?php echo number_format($__Context->row['point']) ?></em></span>
					<?php  $__Context->rank_index++; ?>
				</li><?php } ?>
				<?php if(!$__Context->document_top['totalPoint']){ ?><li><span>No total points rank information<span></li><?php } ?>
			</ul>
		</div>
		<a  href="<?php echo getUrl('page',1,'act','dispKinPointRank','rtarget','total','type','') ?>" class="w_more"><span>more</span></a>
	</div>
	<span class="bg_b"></span>
</div><?php } ?>