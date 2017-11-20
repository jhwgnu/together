<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/kin/skins/xe_kin_official/css/style.css--><?php $__tmp=array('modules/kin/skins/xe_kin_official/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/kin/skins/xe_kin_official/js/kin.js--><?php $__tmp=array('modules/kin/skins/xe_kin_official/js/kin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div id="tmp">
<div class="kinHeader">
    <div class="kinTitle">
        <h1 class="mod_title">
			<?php if($__Context->type != 'my_questions' && $__Context->type != 'my_replies' && $__Context->type != 'popular' && $__Context->type != 'popular_answers'){ ?>
				<a href="<?php echo getUrl('','mid',$__Context->mid,'listStyle',$__Context->listStyle) ?>"><?php if($__Context->module_info->qa_title){;
echo $__Context->module_info->qa_title;
}else{ ?>Q & A System<?php } ?></a>
			<?php } ?>
			<?php if($__Context->type == 'my_questions' || $__Context->type == 'my_replies'){ ?>
				<?php echo $__Context->lang->my_question_answer ?>
			<?php } ?>
			<?php if($__Context->type == 'popular' || $__Context->type == 'popular_answers'){ ?>
				<?php echo $__Context->lang->popolar_question_answer ?>
			<?php } ?>
		</h1>
		<?php if($__Context->type == 'my_questions' || $__Context->type == 'my_replies' || $__Context->type == 'popular' || $__Context->type == 'popular_answers' || ($__Context->oDocument && $__Context->act != dispKinReply)){ ?>
			<div class="breadcrumb">
				<ul>
				<li><a href="<?php echo getUrl('','mid',$__Context->mid,'listStyle',$__Context->listStyle) ?>"><?php if($__Context->module_info->qa_title){;
echo $__Context->module_info->qa_title;
}else{ ?>Q & A System<?php } ?></a><em> &gt;&nbsp; </em></li>
				<?php if($__Context->type == 'my_questions' || $__Context->type == 'my_replies'){ ?><li class="current"><a href=""><?php echo $__Context->lang->my_question_answer ?></a></li><?php } ?>
				<?php if($__Context->type == 'popular' || $__Context->type == 'popular_answers'){ ?><li class="current"><a href=""><?php echo $__Context->lang->popolar_question_answer ?></a></li><?php } ?>
				<?php if($__Context->oDocument){ ?><li class="current"><a href="">Question Information</a></li><?php } ?>
				</ul>
			</div>
		<?php } ?>
		<?php if($__Context->type != 'my_questions' && $__Context->type != 'my_replies' && $__Context->type != 'popular' && $__Context->type != 'popular_answers' && !$__Context->oDocument){ ?>
			<?php if($__Context->is_logged && $__Context->logged_info->is_admin == 'Y'){ ?><a class="setup" href="<?php echo getUrl('act','dispKinAdminInsert','mid',$__Context->module_info->mid,'module_srl', $__Context->module_info->module_srl) ?>"><?php echo $__Context->lang->cmd_setup ?></a><?php } ?>
		<?php } ?>
    </div>
</div>
