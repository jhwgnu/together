<?php if(!defined("__XE__"))exit;?><div class="bd">
	<div class="hx h2">
		<h2>
			<a href="<?php echo getUrl('','vid',$__Context->vid,'mid',$__Context->mid) ?>"><?php echo $__Context->module_info->browser_title ?></a>
			<a href="<?php echo getUrl('page','','act','dispResourceCategory','') ?>" class="ca"><?php echo $__Context->lang->category ?></a>
		</h2>
	</div>
	<div class="ln">
		<ul>
			<?php if($__Context->order_target=='newest'){ ?>
				<?php if($__Context->order_type == 'desc'){;
$__Context->_order_type = 'asc';
}else{;
$__Context->_order_type = 'desc';
} ?>
			<?php }else{ ?>
				<?php $__Context->_order_type = 'desc' ?>
			<?php } ?>
			<li <?php if($__Context->order_target=='newest'){ ?>class="active"<?php } ?>><a href="<?php echo getUrl('order_target','newest','order_type',$__Context->_order_type) ?>"><?php echo $__Context->lang->order_newest ?></a></li>
			<?php if($__Context->order_target=='download'){ ?>
				<?php if($__Context->order_type == 'desc'){;
$__Context->_order_type = 'asc';
}else{;
$__Context->_order_type = 'desc';
} ?>
			<?php }else{ ?>
				<?php $__Context->_order_type = 'desc' ?>
			<?php } ?>
			<li <?php if($__Context->order_target=='download'){ ?>class="active"<?php } ?>><a href="<?php echo getUrl('order_target','download','order_type',$__Context->_order_type) ?>"><?php echo $__Context->lang->order_download ?></a></li>
			<?php if($__Context->order_target=='popular'){ ?>
				<?php if($__Context->order_type == 'desc'){;
$__Context->_order_type = 'asc';
}else{;
$__Context->_order_type = 'desc';
} ?>
			<?php }else{ ?>
				<?php $__Context->_order_type = 'desc' ?>
			<?php } ?>
			<li <?php if($__Context->order_target=='popular'){ ?>class="active"<?php } ?>><a href="<?php echo getUrl('order_target','popular','order_type',$__Context->_order_type) ?>"><?php echo $__Context->lang->order_popular ?></a></li>
		</ul>
	</div>
	<ul class="lt">
		<?php if($__Context->item_list&&count($__Context->item_list))foreach($__Context->item_list as $__Context->key => $__Context->val){ ?>
		<li>
			<a href="<?php echo getUrl('package_srl', $__Context->val->package_srl) ?>">
				<img src="<?php echo $__Context->val->item_screenshot_url ?>" alt="" class="th" /> 
				<span class="title">
					<?php if($__Context->val->category_srl){;
echo $__Context->categories[$__Context->val->category_srl]->title ?> &rsaquo; <?php } ?>
					<strong><?php echo htmlspecialchars($__Context->val->title) ?> ver. <?php echo htmlspecialchars($__Context->val->item_version) ?></strong>
				</span>
				<span class="auth"><strong><?php echo $__Context->val->nick_name ?></strong> <span class="time"><?php echo zdate($__Context->val->item_regdate, "Y-m-d H:i") ?></span></span>
				<span class="meta">
					<span class="star"><?php for($__Context->i=0;$__Context->i<5;$__Context->i++){;
if($__Context->i<$__Context->val->package_star){ ?><i class="t">★</i><?php }else{ ?><i class="f">★</i><?php };
} ?></span>
					<span class="point">
						<?php if($__Context->val->package_voter){ ?>
						<?php echo sprintf("%0.1f",$__Context->val->package_voted/$__Context->val->package_voter*2) ?> /<?php echo number_format($__Context->val->package_voter) ?>
						<?php }else{ ?>
						0 / 0
						<?php } ?>
					</span>
					<span class="down"><?php echo $__Context->lang->package_downloaded_count ?> : <?php echo number_format($__Context->val->package_downloaded) ?> </span>
				</span>
				<span class="summary"><?php echo cut_str(htmlspecialchars($__Context->val->package_description),200) ?></span>
			</a>
		</li>
		<?php } ?>
	</ul>
	<div class="pn">
        <?php if($__Context->page != 1){ ?>
		<a href="<?php echo getUrl('page',$__Context->page-1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="prev"><?php echo $__Context->lang->cmd_prev ?></a> 
        <?php } ?>
        <strong><?php echo $__Context->page ?> / <?php echo $__Context->page_navigation->last_page ?></strong>
        <?php if($__Context->page != $__Context->page_navigation->last_page){ ?>
		<a href="<?php echo getUrl('page',$__Context->page+1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="next"><?php echo $__Context->lang->cmd_next ?></a>
        <?php } ?>
	</div>
</div>
<script>
//<![CDATA[
jQuery(function($){
	var lnb = $('.ln>ul');
	if($('.ln').width() > lnb.width()){
		$('.ln>button').hide();
	}
	$('.ln>button').click(function(){
		var t = $(this);
		if (t.hasClass('next')) {
			lnb.animate({left:"-100%"},100);
			$(this).removeClass('next').addClass('prev');
		} else {
			lnb.animate({left:"0"},100);
			$(this).removeClass('prev').addClass('next');
		}
	});
});
//]]>
</script>
