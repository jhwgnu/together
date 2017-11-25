<?php if(!defined("__XE__"))exit;
if($__Context->skin_info->colorset&&count($__Context->skin_info->colorset))foreach($__Context->skin_info->colorset as $__Context->key=>$__Context->val){ ?><div style="padding:3px 0 0 0;display:inline-block;*display:inline;zoom:1;min-width:220px;vertical-align:top">
	<?php if($__Context->type == 'P'){ ?><label for="colorset_<?php echo $__Context->key ?>"><input type="radio" name="colorset" value="<?php echo $__Context->val->name ?>" id="colorset_<?php echo $__Context->key ?>"<?php if($__Context->communication_config->colorset==$__Context->val->name){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->val->title ?></label><?php } ?>
	<?php if($__Context->type == 'M'){ ?><label for="mcolorset_<?php echo $__Context->key ?>"><input type="radio" name="mcolorset" value="<?php echo $__Context->val->name ?>" id="mcolorset_<?php echo $__Context->key ?>"<?php if($__Context->communication_config->mcolorset==$__Context->val->name){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->val->title ?></label><?php } ?>
	<?php if($__Context->val->screenshot){ ?><div class="x_thumbnail" style="display:inline-block;*display:inline;zoom:1;min-width:200px">
		<img src="<?php echo $__Context->val->screenshot ?>" alt="<?php echo $__Context->val->title ?>" style="min-width:200px" />
	</div><?php } ?>
</div><?php } ?>
