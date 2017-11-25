<?php if(!defined("__XE__"))exit;?><ul class="list-group list-group-flush">
<?php if($__Context->widget_info->content_items&&count($__Context->widget_info->content_items))foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
	<li class="list-group-item">
		<?php if($__Context->widget_info->option_view_arr&&count($__Context->widget_info->option_view_arr))foreach($__Context->widget_info->option_view_arr as $__Context->k => $__Context->v){ ?>
			<?php if($__Context->v=='title'){ ?>
				<a href="<?php echo $__Context->item->getLink() ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php };
if(!Mobile::isMobileCheckByAgent()){ ?> data-html="true" data-container="body" data-toggle="tooltip" data-trigger="hover" data-placement="<?php if($__Context->layout_info->site_frame=='content_sidebar'){ ?>left<?php }else{ ?>right<?php } ?>"<?php } ?> title="<?php if($__Context->widget_info->show_browser_title=='Y' && $__Context->item->getBrowserTitle()){;
echo $__Context->item->getBrowserTitle() ?><br /><?php };
if($__Context->widget_info->show_category=='Y' && $__Context->item->get('category_srl') ){;
echo $__Context->item->getCategory() ?><br /><?php } ?><i class='fa fa-user' area-hidden='true'></i> <?php echo strip_tags($__Context->item->getNickName());
if($__Context->widget_info->show_comment_count=='Y' && $__Context->item->getCommentCount()){ ?> / <i class='fa fa-comment' area-hidden='true'></i> <?php echo $__Context->item->getCommentCount();
} ?> <?php if($__Context->widget_info->show_trackback_count=='Y' && $__Context->item->getTrackbackCount()){ ?> / <i class='fa fa-random' area-hidden='true'></i> <?php echo $__Context->item->getTrackbackCount();
} ?>">
					<?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?>
				</a>
			<?php } ?>
		<?php } ?>	
	</li>
<?php } ?>
</ul>
