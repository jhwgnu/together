<?php if(!defined("__XE__"))exit;?>
 
<!--#Meta:layouts/undeviating/css/default.css--><?php $__tmp=array('layouts/undeviating/css/default.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1>
				<a href="#">
					<?php if($__Context->layout_info->logo_title){ ?>
						<?php echo $__Context->layout_info->logo_title ?>
					<?php }else{ ?>
						Undeviating
					<?php } ?>
				</a>
			</h1>
		</div>
		<div id="menu">
			<ul>
				<?php if($__Context->global_menu->list&&count($__Context->global_menu->list))foreach($__Context->global_menu->list as $__Context->key1=>$__Context->val1){ ?><li<?php if($__Context->val1['selected']){ ?> class="active"<?php } ?>>
					<a href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>>
						<?php echo $__Context->val1['link'] ?>
					</a>
				</li><?php } ?>
			</ul>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="container">
		<?php echo $__Context->content ?>
	</div>
</div>
<div id="copyright">
	<?php if($__Context->layout_info->login_link == 'Y2' || $__Context->logged_info->is_admin == 'Y'){ ?><p>
		<?php if($__Context->layout_info->login_link == 'Y2' ){ ?>
			<?php if(!$__Context->is_logged){ ?><a href="<?php echo getUrl('','act','dispMemberLoginForm') ?>">
				<i class="fa fa-sign-in" area-hidden="true"></i> <?php echo $__Context->lang->cmd_login ?>
			</a><?php } ?>
			<?php if($__Context->is_logged){ ?><a href="<?php echo getUrl('','act','dispMemberLogout') ?>">
				<i class="fa fa-sign-out" area-hidden="true"></i> <?php echo $__Context->lang->cmd_logout ?>
			</a><?php } ?>
		<?php } ?>
		<?php if($__Context->logged_info->is_admin == 'Y'){ ?><a href="<?php echo getUrl('','module','admin') ?>" target="_blank">
			<i class="fa fa-cog" area-hidden="true"></i> <?php echo $__Context->lang->cmd_management ?>
		</a><?php } ?>
	</p><?php } ?>
	<?php if($__Context->layout_info->copyright){ ?><p>
		<?php echo $__Context->layout_info->copyright ?>
	</p><?php } ?>
	<p>
		Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> | Converted by <a href="https://www.wincomi.com">Wincomi</a>
	</p>
</div>
