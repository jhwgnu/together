<?php if(!defined("__XE__"))exit;?><ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act == 'dispAutoinstallAdminIndex'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAutoinstallAdminIndex') ?>">All(<?php echo $__Context->tCount ?>)</a></li>
	<li<?php if($__Context->act == 'dispAutoinstallAdminInstalledPackages'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAutoinstallAdminInstalledPackages') ?>">Installed(<?php echo $__Context->iCount ?>)</a></li>
</ul>
<?php if($__Context->act == 'dispAutoinstallAdminIndex'){ ?><nav class="x_thumbnail x_clearfix category">
	<?php if($__Context->categories&&count($__Context->categories))foreach($__Context->categories as $__Context->category){;
if($__Context->category->depth == 0){ ?><div>
		<h2><?php echo $__Context->category->title ?></h2>
		<ul>
			<?php if($__Context->category->children&&count($__Context->category->children))foreach($__Context->category->children as $__Context->children){ ?><li<?php if($__Context->children->category_srl == $__Context->category_srl){ ?> class="active"<?php } ?>>
				<a href="<?php echo getUrl('','module','admin','act','dispAutoinstallAdminIndex','category_srl',$__Context->children->category_srl,'childrenList','') ?>"><?php echo $__Context->children->title ?>(<?php echo $__Context->children->nPackages ?>)</a>
			</li><?php } ?>
		</ul>
	</div><?php }} ?>
</nav><?php } ?>
