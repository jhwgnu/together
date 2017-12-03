<?php if(!defined("__XE__"))exit;?><a href="#content" class="sr-only ss-skip"><?php echo $__Context->lang->ss_skip_to_content ?></a>
<nav id="navbar" class="navbar <?php if($__Context->li->navbar_color=='inverse'){ ?>navbar-inverse<?php }else{ ?>navbar-default<?php };
if($__Context->li->navbar_fixed!='N'){ ?> navbar-fixed-top<?php }else{ ?> navbar-static-top<?php } ?>" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<span class="sr-only"><?php echo $__Context->lang->ss_toggle_navigation ?></span>
			<button type="button" class="navbar-toggle navbar-toggle-left" data-toggle="collapse" data-target="#main-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			<?php if(!$__Context->is_logged && $__Context->li->navbar_login != 'N'){ ?><button type="button" class="navbar-toggle" data-toggle="modal" data-target="#modal-login"><i class="fa fa-sign-in" area-hidden="true"></i> <?php echo $__Context->lang->cmd_login ?></button><?php } ?>
			<?php if($__Context->is_logged && $__Context->li->navbar_login != 'N'){ ?><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sub-navbar"><i class="fa fa-ellipsis-h" area-hidden="true"></i></button><?php } ?>
			<?php if(!$__Context->is_logged && $__Context->li->navbar_search != 'N'){ ?><button type="button" class="navbar-toggle" data-toggle="modal" data-target="#modal-search"><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->cmd_search ?></button><?php } ?>
				<a class="navbar-brand<?php if($__Context->li->logo_img){ ?> navbar-logo-img<?php } ?>" href="<?php if(!$__Context->li->index_url){ ?>http://jhwgnu.cafe24.com<?php }else{;
echo $__Context->li->index_url;
} ?>">
					<?php if($__Context->li->logo_img){ ?><img src="<?php echo $__Context->li->logo_img ?>" alt="<?php echo $__Context->li->logo_title ?>" />
					<?php }else{ ?>
					<?php if($__Context->li->logo_title){;
echo $__Context->li->logo_title;
}else{ ?>OtherSelf<?php } ?>
					<?php } ?>
				</a>
		</div>
		<div class="collapse navbar-collapse navbar-right" id="sub-navbar">
			<?php if($__Context->li->navbar_search=='Y2'){ ?><form class="navbar-form navbar-left" action="<?php echo getUrl() ?>" method="get"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
				<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
				<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
				<input type="hidden" name="act" value="IS" />
				<input type="text" name="is_keyword" value="<?php echo $__Context->is_keyword ?>" placeholder="<?php echo $__Context->lang->ss_enter_to_search ?>" class="form-control" style="max-width:150px" />
				<button type="submit" class="sr-only btn btn-<?php echo $__Context->colorset ?> btn-block"><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->cmd_search ?></button>
			</form><?php } ?>
			<ul class="navbar-nav nav">
				<?php if($__Context->li->navbar_search!='N' && $__Context->li->navbar_search!='Y2'){ ?><li class="dropdown" id="dropdown-toggle-search">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search" area-hidden="true"></i><span class="visible-xs-inline-block"> <?php echo $__Context->lang->cmd_search ?></span></a>
					<div class="dropdown-menu dropdown-form" role="search">
						<form action="<?php echo getUrl() ?>" method="get"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
							<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
							<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
							<input type="hidden" name="act" value="IS" />
							<input type="text" name="is_keyword" value="<?php echo $__Context->is_keyword ?>" placeholder="<?php echo $__Context->lang->ss_enter_to_search ?>" class="form-control" />
							<button type="submit" class="sr-only btn btn-<?php echo $__Context->colorset ?> btn-block"><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->cmd_search ?></button>
						</form>
					</div>
				</li><?php } ?>
				<?php if(!$__Context->is_logged && $__Context->li->navbar_login != 'N'){ ?><li class="dropdown" id="dropdown-toggle-login">
					<a href="#" data-toggle="modal" data-target="#modal-login"><i class="fa fa-sign-in" area-hidden="true"></i> <?php echo $__Context->lang->cmd_login ?></a>
				</li><?php } ?>
				<?php if($__Context->is_logged && $__Context->li->navbar_login != 'N'){ ?><li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($__Context->logged_info->profile_image->src){ ?><img src="<?php echo $__Context->logged_info->profile_image->src ?>" alt="" class="img-circle" /><?php }else{ ?><i class="fa fa-user" area-hidden="true"></i><?php } ?> <?php echo $__Context->logged_info->nick_name ?></a>
					<ul class="dropdown-menu">
						<?php if($__Context->logged_info->profile_image->src){ ?><li id="profile-in-navbar">
							<a href="<?php echo getURL('act','dispMemberInfo') ?>">
								<?php if($__Context->logged_info->profile_image->src){ ?><img src="<?php echo $__Context->logged_info->profile_image->src ?>" class="img-circle" alt="Profile Image" /><?php } ?> <strong><?php echo $__Context->logged_info->nick_name ?></strong>
							</a>
						</li><?php } ?>
						<?php if($__Context->li->navbar_member_point=='Y'){ ?>
							<?php 
								$__Context->member_srl = $__Context->logged_info->member_srl;
								$__Context->oPointModel = getModel('point');
								$__Context->member_point = $__Context->oPointModel->getPoint($__Context->member_srl);
							 ?>
							<?php if($__Context->li->navbar_member_point=='Y2'){ ?>
							<?php 
								$__Context->oCashModel = getModel('cash');
								$__Context->member_cash = $__Context->oCashModel->getCash($__Context->member_srl);
							 ?>
							<?php } ?>
							<li class="dropdown-header text-center"><?php echo $__Context->member_point ?> <?php echo $__Context->lang->point ?></li>
							<?php if($__Context->li->navbar_member_point=='Y2'){ ?><li class="dropdown-header text-center"><?php echo $__Context->member_cash ?> 캐쉬</li><?php } ?>
							<li role="separator" class="divider"></li>
						<?php } ?>
						<?php if($__Context->logged_info->menu_list&&count($__Context->logged_info->menu_list))foreach($__Context->logged_info->menu_list as $__Context->key=>$__Context->val){ ?><li><a href="<?php echo getUrl('act',$__Context->key,'member_srl','') ?>"><?php echo Context::getLang($__Context->val) ?></a></li><?php } ?>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo getUrl('act','dispMemberLogout') ?>"><i class="fa fa-sign-out" area-hidden="true"></i> <?php echo $__Context->lang->cmd_logout ?></a></li>
						<?php if($__Context->logged_info->is_admin=='Y'){ ?><li><a href="<?php echo getUrl('','module','admin') ?>" target="_blank"><i class="fa fa-cog" area-hidden="true"></i> <?php echo $__Context->lang->cmd_management ?></a></li><?php } ?>
					</ul>
				</li><?php } ?>
			</ul>
		</div>
	</div>
</nav>
<?php if($__Context->li->slide_use != 'N'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/simplestrap','_carousel.html');
} ?>
<?php if($__Context->li->jumbotron!='N' && !in_array('custom_jumbotron',$__Context->li->custom)){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/simplestrap','_jumbotron.html');
} ?>
<?php if($__Context->li->jumbotron!='N' && in_array('custom_jumbotron',$__Context->li->custom)){;
} ?>
<?php if(in_array('custom_top',$__Context->li->custom)){;
} ?>
<div class="container" id="main-container">
	<div class="row <?php if($__Context->li->site_frame!='sidebar_content_sidebar'){ ?>row-offcanvas<?php if($__Context->li->site_frame=='sidebar_content'){ ?> row-offcanvas-left<?php }elseif($__Context->li->site_frame=='content_sidebar'){ ?> row-offcanvas-left<?php };
} ?>" id="main-row">
		<div id="content" class="col<?php if($__Context->li->site_frame=='sidebar_content_sidebar'){ ?> col-sm-8 col-sm-push-2<?php }elseif($__Context->li->site_frame!='content'){ ?> col-sm-<?php echo 12-$__Context->li->sb_col;
}else{ ?> col-sm-12<?php };
if($__Context->li->site_frame=='sidebar_content'){ ?> col-sm-push-<?php echo $__Context->li->sb_col;
} ?>">
			<article class="content panel panel-default" itemscope itemtype="http://schema.org/Article">
				<?php if($__Context->li->site_frame != 'content' && $__Context->li->site_frame != 'sidebar_content_sidebar' && $__Context->li->content_panel_heading != 'N'){ ?><div class="panel-heading">
					<button id="sidebar-toggle-button"<?php if($__Context->li->site_frame=='sidebar_content'){ ?> class="hidden-xs pull-left close"<?php };
if($__Context->li->site_frame=='content_sidebar' || !$__Context->li->site_frame){ ?> class="hidden-xs pull-right close"<?php } ?> data-toggle="tooltip" data-title="<?php echo $__Context->lang->ss_fullscreen_desc ?>"><i<?php if($__Context->li->site_frame=='sidebar_content'){ ?> class="fa fa-angle-left"<?php };
if($__Context->li->site_frame=='content_sidebar' || !$__Context->li->site_frame){ ?> class="fa fa-angle-right"<?php } ?> area-hidden="true"></i></button>
					<?php if($__Context->li->site_frame!='content'){ ?><button data-toggle="offcanvas" class="<?php if($__Context->li->site_frame=='sidebar_content'){ ?> pull-left<?php }elseif($__Context->li->site_frame=='content_sidebar'){ ?> pull-left<?php } ?> close hidden-sm hidden-md hidden-lg"><i<?php if($__Context->li->site_frame=='sidebar_content'){ ?> class="fa fa-angle-right"<?php };
if($__Context->li->site_frame=='content_sidebar'){ ?> class="fa fa-angle-left"<?php } ?> area-hidden="true"></i></button><?php } ?>
					<?php if(in_array('custom_content_heading',$__Context->li->custom)){;
} ?>
					<div class="clearfix"></div>
				</div><?php } ?>
				<div class="panel-body">
					<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->li->xe_validator_message != 'N'){ ?><div class="alert<?php if("{$__Context->XE_VALIDATOR_MESSAGE_TYPE}"=="info"){ ?> alert-info<?php }elseif("{$__Context->XE_VALIDATOR_MESSAGE_TYPE}"=="error"){ ?> alert-danger<?php } ?>">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php if("{$__Context->XE_VALIDATOR_MESSAGE_TYPE}"=="info"){ ?><i class="fa fa-info-circle" area-hidden="true"></i> <?php }elseif("{$__Context->XE_VALIDATOR_MESSAGE_TYPE}"=="error"){ ?><i class="fa fa-exclamation-circle" area-hidden="true"></i> <?php };
echo $__Context->XE_VALIDATOR_MESSAGE ?>
					</div><?php } ?>
					<?php if(in_array('custom_content_top',$__Context->li->custom)){;
} ?>
					<?php if($__Context->li->use_breadcrumb == 'Y'){;
if($__Context->main_menu->list&&count($__Context->main_menu->list))foreach($__Context->main_menu->list as $__Context->key1=>$__Context->val1){;
if($__Context->val1['selected']){ ?><ol class="breadcrumb">
						<li class="active">
							<?php 
								$__Context->_val1_link = explode('|fa-', $__Context->val1['link']);
							 ?>
							<a href="<?php echo $__Context->val1['href'] ?>">
								<?php if($__Context->_val1_link[1]){ ?><i class="fa fa-<?php echo $__Context->_val1_link[1] ?>"></i><?php } ?> <?php echo $__Context->_val1_link[0] ?>
							</a>
						</li>
						<?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){;
if($__Context->val2['selected']){ ?>
							<li>
								<?php 
									$__Context->_val2_link = explode('|fa-', $__Context->val2['link']);
								 ?>
								<a href="<?php echo $__Context->val2['href'] ?>">
									<?php if($__Context->_val2_link[1]){ ?><i class="fa fa-<?php echo $__Context->_val2_link[1] ?>"></i><?php } ?> <?php echo $__Context->_val2_link[0] ?>
								</a>
							</li>
							<?php if($__Context->val2['list']&&count($__Context->val2['list']))foreach($__Context->val2['list'] as $__Context->key3=>$__Context->val3){;
if($__Context->val3['selected']){ ?>
								<li>
									<?php 
										$__Context->_val3_link = explode('|fa-', $__Context->val3['link']);
									 ?>
									<a href="<?php echo $__Context->val3['href'] ?>">
										<?php if($__Context->_val3_link[1]){ ?><i class="fa fa-<?php echo $__Context->_val3_link[1] ?>"></i><?php } ?> <?php echo $__Context->_val2_link[0] ?>
									</a>
								</li>
							<?php }} ?>
						<?php }} ?>
					</ol><?php }}} ?>
					<?php echo $__Context->content ?>
					<div class="clearfix"></div>
					<?php if(in_array('custom_content_bottom',$__Context->li->custom)){;
} ?>
				</div>
			</article>
		</div>
		<?php if($__Context->li->site_frame!='content'){ ?><aside id="sidebar" class="sidebar col<?php if($__Context->li->site_frame=='sidebar_content_sidebar'){ ?> col-sm-2 col-sm-pull-8<?php }else{ ?> col-sm-<?php echo $__Context->li->sb_col;
if($__Context->li->site_frame=='sidebar_content'){ ?> col-sm-pull-<?php echo 12-$__Context->li->sb_col;
};
} ?>">
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('layouts/simplestrap','_sidebar.html') ?>
			<div class="clearfix"></div>
		</aside><?php } ?>
		<?php if($__Context->li->site_frame=='sidebar_content_sidebar'){ ?><aside id="sub-sidebar" class="sidebar col col-sm-2">
			
			<div class="clearfix"></div>
		</aside><?php } ?>
	</div>
</div>
<?php if(!$__Context->is_logged){ ?><div id="modal-search" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $__Context->lang->cmd_search ?></h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo getUrl() ?>" method="get"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
					<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
					<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
					<input type="hidden" name="act" value="IS" />
					<div class="form-group">
						<input type="text" name="is_keyword" value="<?php echo $__Context->is_keyword ?>" placeholder="" class="form-control" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-<?php echo $__Context->colorset ?> btn-block"><i class="fa fa-search" area-hidden="true"></i> <?php echo $__Context->lang->cmd_search ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><?php } ?>
<?php if(!$__Context->is_logged && $__Context->li->navbar_login != 'N'){ ?><div id="modal-login" class="modal fade">
	<?php if(in_array('custom_login_modal',$__Context->li->custom)){;
} ?>
	<?php if(!in_array('custom_login_modal',$__Context->li->custom)){ ?><div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $__Context->lang->cmd_login ?></h4>
			</div>
			<div class="modal-body">
				<?php if($__Context->li->socialxe_login == 'Y'){ ?><div class="form-group socialxe-login">
					<?php 
						$__Context->oSocialxeModel = &getModel('socialxe');
					 ?>
					<?php if($__Context->oSocialxeModel->config->sns_services&&count($__Context->oSocialxeModel->config->sns_services))foreach($__Context->oSocialxeModel->config->sns_services as $__Context->key=>$__Context->val){ ?>
						<?php 
							$__Context->color = 'default';
							if($__Context->val == 'twitter') $__Context->color = 'info';
							if($__Context->val == 'facebook') $__Context->color = 'primary';
							if($__Context->val == 'google') $__Context->color = 'danger';
							if($__Context->val == 'naver') $__Context->color = 'success';
							if($__Context->val == 'kakao') $__Context->color = 'warning';
							$__Context->icon = $__Context->val;
							if($__Context->icon == 'facebook') $__Context->icon = 'facebook-official';
							if($__Context->icon == 'naver') $__Context->icon = 'graduation-cap';
							if($__Context->icon == 'kakao') $__Context->icon = 'comment';
						 ?>
						<a href="<?php echo $__Context->oSocialxeModel->snsAuthUrl($__Context->val, 'login') ?>" class="btn btn-<?php echo $__Context->color ?> btn-block">
							<i class="fa fa-<?php echo $__Context->icon ?>" area-hidden="true"></i>
							<span><?php echo ucwords($__Context->val) ?></span>
						</a>
					<?php } ?>
				</div><?php } ?>
				<?php if(($__Context->li->socialxe_login == 'Y' && $__Context->oSocialxeModel->config->default_login == 'Y') || $__Context->li->socialxe_login != 'Y'){;
Context::addJsFile("./files/ruleset/login.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="@login" />
					<?php if($__Context->li->socialxe_login == 'Y'){ ?><p class="login-hr"><span><?php echo $__Context->lang->ss_or ?></span></p><?php } ?>
					<?php $__Context->member_config=MemberModel::getMemberConfig();$__Context->identifierForm->name=$__Context->member_config->identifier; ?>
					<input type="hidden" name="act" value="procMemberLogin" />
					<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
					<div class="form-group"><input type="<?php if($__Context->identifierForm->name=='email_address'){ ?>email<?php }else{ ?>text<?php } ?>" name="user_id" id="uid" value=""  placeholder="<?php if($__Context->identifierForm->name=='email_address'){;
echo $__Context->lang->email;
}else{;
echo $__Context->lang->user_id;
} ?>" class="form-control" required /></div>
					<div class="form-group"><input type="password" name="password" id="upw" value="" placeholder="<?php echo $__Context->lang->password ?>" class="form-control" required /></div>
					<div class="form-group">
						<input type="checkbox" name="keep_signed" value="Y" onclick="if(this.checked) return confirm('<?php echo $__Context->lang->about_keep_signed ?>');" />
						<label for="keep_signed" onclick="jQuery('#modal-login input[name=\'keep_signed\']').click();" style="font-weight: normal">
							<?php echo $__Context->lang->keep_signed ?>
						</label>
					</div>
					<button type="submit" class="btn btn-<?php echo $__Context->colorset ?> btn-block"><i class="fa fa-sign-in" area-hidden="true"></i> <?php echo $__Context->lang->cmd_login ?></button>
				</form><?php } ?>
			</div>
			<?php if(($__Context->li->socialxe_login == 'Y' && $__Context->oSocialxeModel->config->default_signup == 'Y') || $__Context->li->socialxe_login != 'Y'){ ?><div class="modal-footer">
				<div class="btn-group btn-group-justified">
					<?php if($__Context->li->signup_on_login_modal!='Y'){ ?><a href="<?php echo getUrl('act','dispMemberSignUpForm') ?>" class="btn btn-default btn-sm"><i class="fa fa-user-plus" area-hidden="true"></i> <?php echo $__Context->lang->cmd_signup ?></a><?php } ?>
					<a href="<?php echo getUrl('act','dispMemberFindAccount') ?>" class="btn btn-default btn-sm"><i class="fa fa-question-circle" area-hidden="true"></i> <?php echo $__Context->lang->cmd_find_member_account ?></a>
					
				</div>
			</div><?php } ?>
		</div>
	</div><?php } ?>
</div><?php } ?>
<footer id="footer" class="footer">
	<div class="container">
		<?php echo $__Context->li->footer_copyright ?>
		<?php if($__Context->li->footer_bottom_menu=='Y'){ ?><ul class="footer-list list-inline">
			<?php if($__Context->footer_menu->list&&count($__Context->footer_menu->list))foreach($__Context->footer_menu->list as $__Context->key1=>$__Context->val1){ ?><li<?php if($__Context->val1['selected']){ ?> class="active"<?php } ?>>
				<a href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>>
					<?php 
						$__Context->_val1_link = explode('|fa-', $__Context->val1['link']);
					 ?>
					<?php if($__Context->_val1_link[1]){ ?><i class="fa fa-<?php echo $__Context->_val1_link[1] ?>"></i><?php } ?> <?php echo $__Context->_val1_link[0] ?>
				</a>
			</li><?php } ?>
		</ul><?php } ?>
		<ul class="footer-list list-inline">
			<?php if($__Context->li->footer_lang=='Y'){ ?><li id="footer-lang"class="dropdown dropup" style="position:relative">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" area-hidden="true"></i> Language</a>
				<ul class="dropdown-menu" style="min-width:100px">
					<li class="active"><a href="#" onclick="return false"><?php echo $__Context->lang_supported[$__Context->lang_type] ?></a></li>
					<?php if($__Context->lang_supported&&count($__Context->lang_supported))foreach($__Context->lang_supported as $__Context->key => $__Context->val){;
if($__Context->key!= $__Context->lang_type){ ?>
					<li><a href="#" onclick="doChangeLangType('<?php echo $__Context->key ?>');return false;"><?php echo $__Context->val ?></a></li>
					<?php };
} ?>
	   			</ul>
			</li><?php } ?>
			<?php if($__Context->li->premium != 'Y'){ ?><li><i class="fa fa-user-o" area-hidden="true"></i> 창의융합프로젝트 2017 </br>훈지태</li><?php } ?>
		</ul>
	</div>
	<?php if($__Context->li->footer_bottom){ ?><div class="footer_bottom"><?php echo $__Context->li->footer_bottom ?></div><?php } ?>
	<div id="hidden-xs" class="hidden-xs"></div>
</footer>
<?php if(in_array('custom_bottom',$__Context->li->custom)){;
} ?>
<?php if($__Context->li->premium != 'Y'){ ?><!-- Simplestrap v<?php echo $__Context->li->version ?> by Wincomi (https://www.wincomi.com) --><?php } ?>