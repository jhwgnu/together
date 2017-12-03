<?php if(!defined("__XE__"))exit;?><div id="main-carousel" class="carousel slide hidden-print" data-ride="carousel">
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<?php if($__Context->li->slide_c1_url){ ?><a href="<?php echo $__Context->li->slide_c1_url ?>"><?php } ?>
				<img<?php if($__Context->li->slide_c1_img){ ?> src="<?php echo $__Context->li->slide_c1_img ?>"<?php };
if(!$__Context->li->slide_c1_img){ ?> src="<?php echo $__Context->li->path ?>img/demo3.jpg"<?php } ?> alt="" />
			<?php if($__Context->li->slide_c1_url){ ?></a><?php } ?>
			<div class="carousel-caption">
				<?php if(!$__Context->li->slide_c1_img && !$__Context->li->slide_c1_text){ ?><h1>Welcome!</h1><?php } ?>
				<?php if($__Context->li->slide_c1_text){ ?><h1><?php echo $__Context->li->slide_c1_text ?></h1><?php } ?>
				<?php if(!$__Context->li->slide_c1_img && !$__Context->li->slide_c1_desc){ ?><p>교내 행사에 대한 정보를 교환해요:) </br>자신이 참석한 행사에 대한 정보를 공유하고,</br> 가고 싶었으나 가지 못했던 행사에 대한 정보를 요청해보세요!</p><?php } ?>
				<?php if($__Context->li->slide_c1_desc){ ?><p><?php echo $__Context->li->slide_c1_desc ?></p><?php } ?>
			</div>
		</div>
		<?php if($__Context->li->slide_c2_img){ ?><div class="item">
			<?php if($__Context->li->slide_c2_url){ ?><a href="<?php echo $__Context->li->slide_c2_url ?>"><?php } ?>
				<img src="<?php echo $__Context->li->slide_c2_img ?>" alt="" />
			<?php if($__Context->li->slide_c2_url){ ?></a><?php } ?>
			<div class="carousel-caption">
				<?php if($__Context->li->slide_c2_text){ ?><h1><?php echo $__Context->li->slide_c2_text ?></h1><?php } ?>
				<?php if($__Context->li->slide_c2_desc){ ?><p><?php echo $__Context->li->slide_c2_desc ?></p><?php } ?>
			</div>
		</div><?php } ?>
		<?php if($__Context->li->slide_c3_img){ ?><div class="item">
			<?php if($__Context->li->slide_c3_url){ ?><a href="<?php echo $__Context->li->slide_c3_url ?>"><?php } ?>
				<img src="<?php echo $__Context->li->slide_c3_img ?>" alt="" />
			<?php if($__Context->li->slide_c3_url){ ?></a><?php } ?>
			<div class="carousel-caption">
				<?php if($__Context->li->slide_c3_text){ ?><h1><?php echo $__Context->li->slide_c3_text ?></h1><?php } ?>
				<?php if($__Context->li->slide_c3_desc){ ?><p><?php echo $__Context->li->slide_c3_desc ?></p><?php } ?>
			</div>
		</div><?php } ?>
		<?php if($__Context->li->slide_c4_img){ ?><div class="item">
			<?php if($__Context->li->slide_c4_url){ ?><a href="<?php echo $__Context->li->slide_c4_url ?>"><?php } ?>
				<img src="<?php echo $__Context->li->slide_c4_img ?>" alt="" />
			<?php if($__Context->li->slide_c4_url){ ?></a><?php } ?>
			<div class="carousel-caption">
				<?php if($__Context->li->slide_c4_text){ ?><h1><?php echo $__Context->li->slide_c4_text ?></h1><?php } ?>
				<?php if($__Context->li->slide_c4_desc){ ?><p><?php echo $__Context->li->slide_c4_desc ?></p><?php } ?>
			</div>
		</div><?php } ?>
		<?php if($__Context->li->slide_c5_img){ ?><div class="item">
			<?php if($__Context->li->slide_c5_url){ ?><a href="<?php echo $__Context->li->slide_c5_url ?>"><?php } ?>
				<img src="<?php echo $__Context->li->slide_c5_img ?>" alt="" />
			<?php if($__Context->li->slide_c5_url){ ?></a><?php } ?>
			<div class="carousel-caption">
				<?php if($__Context->li->slide_c5_text){ ?><h1><?php echo $__Context->li->slide_c5_text ?></h1><?php } ?>
				<?php if($__Context->li->slide_c5_desc){ ?><p><?php echo $__Context->li->slide_c5_desc ?></p><?php } ?>
			</div>
		</div><?php } ?>
	</div>
	<?php if(!($__Context->li->slide_c1_img && !$__Context->li->slide_c2_img && !$__Context->li->slide_c3_img && !$__Context->li->slide_c4_img && !$__Context->li->slide_c5_img)){ ?><a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
		<span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
		<span class="sr-only"><?php echo $__Context->lang->cmd_prev ?></span>
	</a><?php } ?>
	<?php if(!($__Context->li->slide_c1_img && !$__Context->li->slide_c2_img && !$__Context->li->slide_c3_img && !$__Context->li->slide_c4_img && !$__Context->li->slide_c5_img)){ ?><a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
		<span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
		<span class="sr-only"><?php echo $__Context->lang-cmd_next ?></span>
	</a><?php } ?>
</div>