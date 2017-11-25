<?php if(!defined("__XE__"))exit;
if(in_array('custom_sidebar_top',$__Context->li->custom)){;
} ?>
<?php if($__Context->main_menu->list&&count($__Context->main_menu->list))foreach($__Context->main_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->li->sb_menu == 'Y' && ($__Context->val1['selected'] && $__Context->val1['list'])){ ?><div class="panel panel-default">
	<?php 
		$__Context->_val1_link = explode('|fa-', $__Context->val1['link']);
	 ?>
	<?php if($__Context->val1['selected']){ ?><div class="panel-heading"><h3 class="panel-title"><?php if($__Context->_val1_link[1]){ ?><i class="fa fa-<?php echo $__Context->_val1_link[1] ?>"></i><?php } ?> <?php echo $__Context->_val1_link[0] ?></h3></div><?php } ?>
	<ul class="list-group">
		<?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){ ?>
			<?php 
				$__Context->_val2_link = explode('|fa-', $__Context->val2['link']);
			 ?>
			<?php if($__Context->val2['link']!="----"){ ?>
				<li class="list-group-item<?php if($__Context->val2['selected']){ ?> active<?php } ?>">
					<a href="<?php echo $__Context->val2['href'] ?>"<?php if($__Context->val2['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php if($__Context->_val2_link[1]){ ?><i class="fa fa-<?php echo $__Context->_val2_link[1] ?>"></i><?php } ?> <?php echo $__Context->_val2_link[0] ?></a>
				</li>
			<?php }else{ ?>
				<li class="divider"></li>
			<?php } ?>
		<?php } ?>
	</ul>
</div><?php }} ?>
<?php if($__Context->li->sb_post!='N'){ ?><div class="panel panel-default">
	<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-file-o" area-hidden="true"></i> <?php echo $__Context->lang->ss_recent_posts ?></h3></div>
	<img class="zbxe_widget_output" widget="content" skin="simplestrap_sb" content_type="document" module_srls="<?php echo $__Context->li->sb_post_module ?>" list_type="normal" markup_type="list" page_count="1" option_view="title,nickname" show_browser_title="Y" show_comment_count="Y" show_trackback_count="Y" order_type="desc" subject_cut_size="27" list_count="<?php echo $__Context->li->sb_post_count ?>" />
</div><?php } ?>
<?php if($__Context->li->sb_comm!='N'){ ?><div class="panel panel-default">
	<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-comments-o" area-hidden="true"></i>  <?php echo $__Context->lang->ss_recent_comments ?></h3></div>
	<img class="zbxe_widget_output" widget="content" skin="simplestrap_sb" content_type="comment" module_srls="<?php echo $__Context->li->sb_comm_module ?>" list_type="normal" markup_type="list" page_count="1" option_view="title,nickname" show_browser_title="Y" show_comment_count="Y" show_trackback_count="Y" order_type="desc" subject_cut_size="27" list_count="<?php echo $__Context->li->sb_comm_count ?>" />
</div><?php } ?>
<?php if($__Context->li->sb_widget1){ ?><div class="panel panel-default"><div class="panel-body"><?php echo $__Context->li->sb_widget1 ?></div></div><?php } ?>
<?php if($__Context->li->sb_widget2){ ?><div class="panel panel-default"><div class="panel-body"><?php echo $__Context->li->sb_widget2 ?></div></div><?php } ?>
<?php if($__Context->li->sb_widget3){ ?><div class="panel panel-default"><div class="panel-body"><?php echo $__Context->li->sb_widget3 ?></div></div><?php } ?>
<?php if($__Context->li->sb_widget3){ ?><div class="panel panel-default"><div class="panel-body"><?php echo $__Context->li->sb_widget4 ?></div></div><?php } ?>
<?php if($__Context->li->sb_widget3){ ?><div class="panel panel-default"><div class="panel-body"><?php echo $__Context->li->sb_widget5 ?></div></div><?php } ?>
<?php if(in_array('custom_sidebar_bottom',$__Context->li->custom)){;
} ?>