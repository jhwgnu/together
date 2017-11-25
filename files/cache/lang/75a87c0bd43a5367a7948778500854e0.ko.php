<?php
$lang->cmd_all_setting='모두 설정';
if(!is_array($lang->cmd_module_default_menus)){
	$lang->cmd_module_default_menus = array();
}
$lang->cmd_module_default_menus['dispBeluxeAdminContent']='게시판 DX';
$lang->cmd_module_default_menus['dispBeluxeAdminList']='모듈 목록';
if(!is_array($lang->cmd_module_menus)){
	$lang->cmd_module_menus = array();
}
$lang->cmd_module_menus['dispBeluxeAdminModuleInfo']='모듈 정보';
$lang->cmd_module_menus['dispBeluxeAdminSkinInfo']='스킨 정보';
$lang->cmd_module_menus['dispBeluxeAdminMobileSkinInfo']='모바일 정보';
$lang->cmd_module_menus['dispBeluxeAdminAdditionSetting']='추가 정보';
$lang->cmd_module_menus['dispBeluxeAdminCategoryInfo']='분류 관리';
$lang->cmd_module_menus['dispBeluxeAdminExtraKeys']='확장 변수';
$lang->cmd_module_menus['dispBeluxeAdminColumnInfo']='컬럼 설정';
$lang->cmd_module_menus['dispBeluxeAdminGrantInfo']='권한 관리';
if(!is_array($lang->desc_module_menus)){
	$lang->desc_module_menus = array();
}
$lang->desc_module_menus['dispBeluxeAdminContent']='이 모듈은 게시판 모듈입니다.  새로운 모듈 생성은 "모듈 생성" 버튼을 눌러주세요.';
$lang->desc_module_menus['dispBeluxeAdminList']='게시판 생성은 하단의 "모듈 생성" 버튼을 눌러 주세요.';
$lang->desc_module_menus['dispBeluxeAdminColumnInfo']='항목 이동은 좌측 바를 잡고 위,아래로 이동하시면 됩니다.';
$lang->desc_module_menus['dispBeluxeAdminCategoryInfo']='분류를 표시하려면 컬럼 설정에서 분류 표시를 선택해주세요. 분류에 문제가 생기면 캐시 재생성 버튼을 눌러주세요.';
$lang->desc_module_menus['dispBeluxeAdminExtraKeys']='확장변수 ID는 "영문, 숫자, _" 조합에 첫 글자는 영문이어야 합니다. (기본값은 콤마(,)를 사용해 복수 등록이 가능합니다)';
$lang->display='표시';
$lang->sort='정렬';
$lang->mobile='모바일';
$lang->trash='휴지통';
$lang->function='기능';
$lang->skin_type='스킨 타입';
$lang->use_first_page='첫 페이지';
$lang->use_title_color='제목 색상';
$lang->use_anonymous='익명 사용';
$lang->use_mobile_uploader='파일 업로더 사용하기';
$lang->consultation='상담 기능';
$lang->schedule_document_register='예약 기능';
$lang->trace_only2='흔적만';
$lang->doc_bottom_list='본문 목록';
if(!is_array($lang->list_options)){
	$lang->list_options = array();
}
if(!is_array($lang->list_options['category'])){
	$lang->list_options['category'] = array();
}
$lang->list_options['category']['N']='모든 분류에서 출력';
$lang->list_options['category']['Y']='분류별로 따로 출력';
$lang->list_options['count']='1,2,3,5,10,20,30,50';
$lang->best='베스트';
if(!is_array($lang->best_options)){
	$lang->best_options = array();
}
$lang->best_options['index']='정렬';
$lang->best_options['date']='검색 날짜';
$lang->best_options['count']='목록 수';
$lang->best_options['date_list']='1,3,7,15,30,60,90,180,360';
$lang->best_options['more_list']='1,3,5,10,15,30,50,100,300,500,1000';
$lang->best_options['count_list']='1,2,3,4,5,6,7,8,9';
$lang->blind='블라인드';
if(!is_array($lang->blind_options)){
	$lang->blind_options = array();
}
$lang->blind_options['index']='검사';
$lang->blind_options['more_list']='1,3,5,10,15,20,30,50,100';
if(!is_array($lang->lock_options)){
	$lang->lock_options = array();
}
if(!is_array($lang->lock_options['lock'])){
	$lang->lock_options['lock'] = array();
}
$lang->lock_options['lock']['N']='사용 안함';
$lang->lock_options['lock']['Y']='작성 즉시';
$lang->lock_options['lock']['T']='날짜 (일)';
$lang->lock_options['lock']['C']='댓글 수';
$lang->lock_options['count']='1,3,5,7,10,15,30,60,90';
$lang->lock_options['owner']='소유자 댓글';
$lang->custom_colorset='사용자 지정';
$lang->declare_count='신고 수';
$lang->vote_down_count='비추천 수';
$lang->category_group_srls='그룹 제한';
$lang->category_trace='카테고리 추적';
$lang->use_trash='삭제시 휴지통';
$lang->extra_name='이름';
$lang->add_menu='메뉴 추가';
$lang->full_search='전부 검색';
$lang->use_robots_meta='검색 로봇 제한';
if(!is_array($lang->robots_meta_option)){
	$lang->robots_meta_option = array();
}
$lang->robots_meta_option['0']='기본값';
$lang->robots_meta_option['1']='문서 허용, 링크 허용';
$lang->robots_meta_option['2']='문서 허용, 링크 허용 안함';
$lang->robots_meta_option['3']='문서 허용 안함, 링크 허용';
$lang->robots_meta_option['4']='문서 허용 안함, 링크 허용 안함';
$lang->msg_delete_this_module='삭제하시면 해당 모듈과 관련된 모든 데이터가 지워집니다.';
$lang->msg_invalid_eid='확장변수 ID는 "영문, 숫자, _" 조합에 첫 글자는 영문이어야 합니다.';
$lang->msg_module_backup_options='이전 스킨에 강제 설정이 적용되어 있었습니다.<br />이전에 강제 설정된  옵션에 <span class="opt_bks">빨강</span> 테두리로 표시해 두었으니 설정을 확인해 주세요.';
$lang->about_download_skin='스킨이 하나 이상은 존재해야 합니다.';
$lang->about_category_list='분류의 이동은 해당 분류를 마우스로 잡고 이동하시면 됩니다.';
$lang->about_use_anonymous='글쓴이의 정보를 없애고 익명으로 게시판 사용을 할 수 있게 합니다.';
$lang->about_consultation='상담 기능은 관리자 외에는 자신이 쓴 글만 보이도록 하는 기능입니다. (회원 전용)';
$lang->about_admin_mail='글이나 댓글이 등록될때 등록된 메일주소로 메일이 발송됩니다. 콤마(,)로 연결시 다수의 메일주소로 발송할 수 있습니다.';
$lang->about_custom_status='사용자 지정 상태 목록을 추가하시려면 입력해주세요. (콤마(,)로 구분, 최대 9개, 컬럼에 사용자 지정 상태 표시 필요)';
$lang->about_use_best='선택한 설정 조건에 맞는 글을 목록 상단에 출력합니다.';
$lang->about_restriction='댓글: 댓글을 1개이상 등록해야만 사용 가능합니다.<br />포인트: 사용자는 포인트를 지불해야 사용 가능하며 소유자는 지정한 포인트의 퍼센트만큼 가집니다.';
$lang->about_restriction_download='다운로드 제한 기능을 사용하시려면 설치가 필요합니다. <a href="#" onclick="alert(\'설치법을 순서대로 따라해주세요.<br /><br />1. ./schemas/ 폴더로 이동합니다.<br />2. file_downloaded_log.xml.bk 뒤에 .bk 지워주세요.<br />3. 관리자 초기 화면에서 beluxe 설치를 눌러줍니다.\'); return false">다운로드 제한 설치법</a>';
$lang->about_use_title_color='관리자가 아니여도 제목의 색상 변경을 허용할지 설정합니다.';
$lang->about_doc_bottom_list='본문 하단에 표시되는 목록을 설정합니다.';
$lang->about_use_blind='선택한 옵션에 해당하는 글을 블라인드 처리합니다.';
$lang->about_use_lock_document='글 수정, 삭제를 막습니다.';
$lang->about_allow_comment='댓글을 허용할지 선택합니다.';
$lang->about_allow_trackback='엮인글을 허용할지 선택합니다.';
$lang->about_use_first_page='처음 목록에서 사용자 페이지를 같이 보여줄지 설정합니다. (본문 목록 수 사용)';
$lang->about_use_robots_meta='검색 로봇이 문서를 긁어가는것에 제한을 걸 수 있습니다. 단, 검색 사이트에 노출 빈도는 낮아집니다.';
$lang->about_use_trash='문서 삭제시 휴지통으로 이동하여 복구할 수 있습니다.';
$lang->about_mobile_uploader='파일 업로더를 사용하시면 모바일 모드에서도 첨부 파일을 추가할 수 있습니다.';
$lang->about_all_setting='선택하신 모든 모듈에 해당 설정을 적용합니다.';
$lang->about_setting_copy='선택하신 모듈의 설정을 복사하여 새로운 모듈을 생성합니다.';
$lang->about_setting_copy2='아래 설정은 대상 모듈이 가지고 있는 설정이며 필요한 부분만 설정 하시면 됩니다.<br />참고: 같이 복사되는 스킨 설정은 대상 모듈의 스킨 설정을 그대로 따릅니다.';
$lang->about_use_history2='히스토리 기능을 사용할 경우, 문서 수정 후 이전 수정판으로 복원할 수 있습니다.';
$lang->about_category_trace='문서 선택시 해당 문서의 분류를 자동으로 찾아 선택해 줍니다.';
$lang->about_skin_type='이 옵션은 모든 분류의 기본값이며 <a href="%s">분류 관리</a>에서 분류별로 따로 설정이 가능합니다.';
$lang->about_use_restrict_type='제한: 문서 보기나 다운로드를 옵션에 맞게 제한합니다.<br />채택: 포인트를 걸어 원하는 댓글의 멤버에게 포인트를 %만큼 지급합니다.';
$lang->about_mobile_list_count='모바일 목록 수를 따로 설정할 수 있습니다. (값이 0이면 PC 목록 수에 따릅니다)';
