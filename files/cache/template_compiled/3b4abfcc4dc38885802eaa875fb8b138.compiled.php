<?php if(!defined("__XE__"))exit;?><div class="sec_category">
	<h4 class="cate_title">
			<a href="<?php echo getUrl('category_srl','') ?>" class="cate_title"><?php echo $__Context->lang->total_articles ?></a> 
			<?php if($__Context->parent_category_info){ ?>
				> <a href="<?php echo getUrl('category_srl',$__Context->parent_category_info->category_srl,'parent_srl',$__Context->parent_category_info->parent_srl) ?>" class="cate_title"><?php echo $__Context->parent_category_info->title ?></a>
			<?php } ?>
			<?php if($__Context->category_child_list && !$__Context->parent_category_info){ ?>
				<em>&nbsp;&gt;&nbsp; </em> <a href="<?php echo getUrl('category_srl',$__Context->category_info->category_srl,'parent_srl','') ?>" class="cate_title"><?php echo $__Context->category_info->title ?></a>
			<?php } ?>
	</h4>
	<div class="category">
	<?php  $__Context->category_index = 0; ?>
	<ul  class="gCate_ul">
		<?php if($__Context->categories&&count($__Context->categories))foreach($__Context->categories as $__Context->key=>$__Context->val){;
if($__Context->val->parent_srl == 0 && !$__Context->category_child_list){ ?><li class="gCate<?php if($__Context->category_srl == $__Context->val->category_srl){ ?> selected<?php } ?>" id="gCate_idx_<?php echo $__Context->key ?>">
			<a href="<?php echo getUrl('category_srl',$__Context->val->category_srl,'parent_srl','') ?>"><?php echo $__Context->val->title ?></a> <span>(<?php echo number_format($__Context->val->document_count) ?>)</span>
			<?php  $__Context->category_index++; ?>
		</li><?php }} ?>
		<?php if($__Context->category_child_list&&count($__Context->category_child_list))foreach($__Context->category_child_list as $__Context->key=>$__Context->val){;
if($__Context->val->parent_srl != 0 && $__Context->category_child_list){ ?><li class="gCate<?php if($__Context->category_srl == $__Context->val->category_srl){ ?> selected<?php } ?>" id="gCate_idx_<?php echo $__Context->key ?>">
			<a href="<?php echo getUrl('parent_srl',$__Context->val->parent_srl, 'category_srl', $__Context->val->category_srl) ?>"><?php echo $__Context->val->title ?></a> <span>(<?php echo number_format($__Context->val->document_count) ?>)</span>
			<?php  $__Context->category_index++; ?>
		</li><?php }} ?>
		<?php  $__Context->remainder = 4 - $__Context->category_index%4; ?>
		<?php for($__Context->i=0;$__Context->i<$__Context->remainder;$__Context->i++){;
if($__Context->remainder != 4){ ?><li>
		</li><?php }} ?>
	</ul>
	</div>
</div>
