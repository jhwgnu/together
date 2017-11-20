<?php if(!defined("__XE__"))exit;?>
<?php 
	$__Context->ci = &$__Context->column_info;
	$__Context->mi = &$__Context->module_info;
	$__Context->cts = ($__Context->ci['category_srl']&&$__Context->ci['category_srl']->display == 'Y')?$__Context->oThis->getCategoryList():array();
	$__Context->cstus = $__Context->mi->custom_status?explode(',',$__Context->oThis->getDefinedLang($__Context->mi->custom_status)):array();
	$__Context->is_doc = $__Context->oDocument&&$__Context->oDocument->isExists();
	$__Context->is_cts = count($__Context->cts);
	$__Context->lsttp = $__Context->category_srl&&$__Context->cts[$__Context->category_srl]->type?$__Context->cts[$__Context->category_srl]->type:$__Context->mi->default_type;
	$__Context->lsttp = in_array($__Context->lsttp, array('gallery','webzine','widget'))?$__Context->lsttp:'list';
	$__Context->viwtp = in_array($__Context->mi->view_style, array('webzine','list'))?$__Context->mi->view_style:(in_array($__Context->lsttp,array('webzine'))?'webzine':'list');
	$__Context->mi->category_style?0:$__Context->mi->category_style = 'Y';
	$__Context->mi->star_style?0:$__Context->mi->star_style = 'N';
	$__Context->mi->thumbnail_type?0:$__Context->mi->thumbnail_type = 'crop';
	$__Context->mi->thumbnail_width?0:$__Context->mi->thumbnail_width = '100';
	$__Context->mi->thumbnail_height?0:$__Context->mi->thumbnail_height = '100';
	$__Context->mi->summary_length?0:$__Context->mi->summary_length = '300';
	$__Context->mi->bottom_list_style?0:$__Context->mi->bottom_list_style = 'default';
	$__Context->mi->duration_new = 60*60*((int)$__Context->mi->duration_new?$__Context->mi->duration_new:12);
	$__Context->mi->display_files?0:$__Context->mi->display_files='general,media,image,auto';
	$__Context->sedt_wbtn = strpos($__Context->mi->simple_editor_option, 'wrtbtn')!==false;
	$__Context->mi->consultation == 'Y' ? $__Context->mi->use_input_simple_editor = 'C' : 0;
	$__Context->is_sedt = $__Context->mi->use_input_simple_editor != 'N'&&(!$__Context->is_doc || ($__Context->is_doc&&strpos($__Context->mi->simple_editor_option, 'dochide')===false)) ? $__Context->mi->use_input_simple_editor : 'N';
	$__Context->is_sedt = $__Context->is_sedt == 'C' && $__Context->grant->manager ? '' : ($__Context->is_sedt != 'N' ? $__Context->is_sedt : '');
	$__Context->is_sedt = $__Context->is_sedt == 'C' && $__Context->mi->consultation == 'Y' ? 'T' : $__Context->is_sedt;
	$__Context->browser = $__Context->oThis->getBrowserInfo();
	$__Context->lte_ie9 = $__Context->browser['unknown']||($__Context->browser['trident']&&$__Context->browser['trident'] < 6);
	$__Context->us_modal = !$__Context->lte_ie9 && ($__Context->mi->use_modal_window==='Y'||strpos($__Context->mi->use_modal_window, '"write"')!==false);
	$__Context->us_vmodal = !$__Context->lte_ie9 && strpos($__Context->mi->use_modal_window, '"view"')!==false;
	$__Context->us_hottrack = !$__Context->lte_ie9 && $__Context->mi->hot_track == 'Y';
	$__Context->us_blind = $__Context->mi->use_blind=='Y';
	$__Context->us_slide = $__Context->mi->thumbnail_slide=='Y';
	$__Context->ao_ppang = $__Context->mi->addon_pang_pang == 'Y';
	$__Context->ds_mtlng = $__Context->mi->display_lang_code == 'Y';
	$__Context->ds_scrap = $__Context->mi->display_scrap_button == 'Y';
	$__Context->ds_ipaddr = $__Context->mi->display_ip_address=='Y'||($__Context->mi->display_ip_address=='A'&&$__Context->grant->manager);
	$__Context->is_elips = !$__Context->mi->title_length;
	$__Context->is_cklok = !$__Context->grant->manager && $__Context->mi->use_lock_document && $__Context->mi->use_lock_document != 'N';
	$__Context->is_ckclok = !$__Context->grant->manager && $__Context->mi->use_lock_comment && $__Context->mi->use_lock_comment != 'N';
	$__Context->cmt_lstcnt = $__Context->is_cts?$__Context->cts[(int)$__Context->category_srl]->navigation->clist_count:$__Context->mi->default_clist_count;
	$__Context->btm_lstcnt = $__Context->is_cts?$__Context->cts[(int)$__Context->category_srl]->navigation->dlist_count:$__Context->mi->default_dlist_count;
	$__Context->pt_vtype = $__Context->mi->use_point_type == 'A' ? 'A' : ($__Context->mi->use_restrict_view == 'P' ? 'P' : ($__Context->mi->use_restrict_view == 'Y' ? 'Y' : 'N'));
	$__Context->pt_dtype = ($__Context->pt_vtype != 'A' && $__Context->mi->use_restrict_down == 'P') ? 'P' : ($__Context->pt_vtype != 'A' && $__Context->mi->use_restrict_down == 'Y' ? 'Y' : 'N');
	$__Context->_tmp1 = array('/%MID%/','/%LOGIN%/','/%URL%/','/%TITLE%/','/%NAME%/','/%SRL%/');
	$__Context->_tmp2 = array($__Context->mid,($__Context->logged_info?$__Context->logged_info->nick_name:'Guest'),$__Context->is_doc?$__Context->oDocument->getPermanentUrl():'',$__Context->is_doc?$__Context->oDocument->getTitle():'',$__Context->is_doc?$__Context->oDocument->getNickName():'',$__Context->is_doc?$__Context->oDocument->document_srl:'');
	$__Context->mi->sub_title = $__Context->mi->sub_title ? preg_replace($__Context->_tmp1,$__Context->_tmp2,$__Context->mi->sub_title) : '';
	$__Context->mi->board_desc = $__Context->mi->board_desc ? preg_replace($__Context->_tmp1,$__Context->_tmp2,$__Context->mi->board_desc) : '';
	$__Context->mi->document_default_title = $__Context->mi->document_default_title ? preg_replace($__Context->_tmp1,$__Context->_tmp2,$__Context->mi->document_default_title) : '';
	$__Context->mi->document_default_content = $__Context->mi->document_default_content ? preg_replace($__Context->_tmp1,$__Context->_tmp2,$__Context->mi->document_default_content) : '';
	$__Context->mi->document_bottom_text = $__Context->mi->document_bottom_text ? preg_replace($__Context->_tmp1,$__Context->_tmp2,$__Context->mi->document_bottom_text) : '';
 ?>
<?php if(__DEBUG__){ ?>
	<?php if($__Context->us_modal||$__Context->us_vmodal){ ?><!--#Meta:modules/beluxe/tpl/js/modal.win.js--><?php $__tmp=array('modules/beluxe/tpl/js/modal.win.js','body','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
	<?php if($__Context->us_slide){ ?>
		<?php echo Context::loadJavascriptPlugin('ui') ?>
		<!--#Meta:modules/beluxe/tpl/js/gallery.slide.js--><?php $__tmp=array('modules/beluxe/tpl/js/gallery.slide.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<?php } ?>
	<!--#Meta:modules/beluxe/skins/default/css/board.css--><?php $__tmp=array('modules/beluxe/skins/default/css/board.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<!--#Meta:modules/beluxe/tpl/css/modal.win.css--><?php $__tmp=array('modules/beluxe/tpl/css/modal.win.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<!--#Meta:modules/beluxe/skins/default/js/board.js--><?php $__tmp=array('modules/beluxe/skins/default/js/board.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php }else{ ?>
	<?php if($__Context->us_modal||$__Context->us_vmodal){ ?><!--#Meta:modules/beluxe/tpl/js/modal.min.js--><?php $__tmp=array('modules/beluxe/tpl/js/modal.min.js','body','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
	<?php if($__Context->us_slide){ ?>
		<?php echo Context::loadJavascriptPlugin('ui') ?>
		<!--#Meta:modules/beluxe/tpl/js/gallery.min.js--><?php $__tmp=array('modules/beluxe/tpl/js/gallery.min.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<?php } ?>
	<!--#Meta:modules/beluxe/skins/default/css/board.min.css--><?php $__tmp=array('modules/beluxe/skins/default/css/board.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<!--#Meta:modules/beluxe/skins/default/js/board.min.js--><?php $__tmp=array('modules/beluxe/skins/default/js/board.min.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<?php if($__Context->browser['trident']&&$__Context->browser['trident'] < 7){ ?>
	<!--#Meta:modules/beluxe/skins/default/iefix/iefix.css--><?php $__tmp=array('modules/beluxe/skins/default/iefix/iefix.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	<!--#Meta:modules/beluxe/skins/default/iefix/iefix.js--><?php $__tmp=array('modules/beluxe/skins/default/iefix/iefix.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<?php if($__Context->mi->custom_css){ ?><style type="text/css"> <?php echo $__Context->mi->custom_css ?> </style><?php } ?>
<?php if($__Context->is_doc){ ?><script>
//<![CDATA[
	var _DXS_MSGS_ = {
		canceled: ''
		<?php if($__Context->pt_dtype=='P'){ ?>,use_d_point: '<?php echo $__Context->lang->confirm_download_point ?>'<?php } ?>
		<?php if($__Context->is_logged&&(strpos($__Context->mi->use_d_vote, 'declare')!==false||strpos($__Context->mi->use_c_vote, 'declare')!==false)){ ?>
			,declare: '<?php echo sprintf($__Context->lang->confirm_declare, $__Context->oThis->getAdminId()?$__Context->lang->manager:$__Context->lang->author) ?>'
			,declare_msg: '<?php echo $__Context->lang->msg_declare_received ?>'
		<?php } ?>
	};
//]]>
</script><?php } ?>