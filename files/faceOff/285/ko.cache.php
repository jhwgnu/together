<?php if(!defined("__XE__")) exit(); $layout_info = new stdClass;
$layout_info->site_srl = "0";
$layout_info->layout = "simplestrap";
$layout_info->type = "";
$layout_info->path = "./layouts/simplestrap/";
$layout_info->title = "Simplestrap";
$layout_info->description = "";
$layout_info->version = "2.2.3";
$layout_info->date = "20170927";
$layout_info->homepage = "";
$layout_info->layout_srl = $layout_srl;
$layout_info->layout_title = $layout_title;
$layout_info->license = "";
$layout_info->license_link = "";
$layout_info->layout_type = "P";
$layout_info->author = array();
$layout_info->author[0] = new stdClass;
$layout_info->author[0]->name = "윈컴이";
$layout_info->author[0]->email_address = "admin@wincomi.com";
$layout_info->author[0]->homepage = "https://www.wincomi.com/";
$layout_info->extra_var = new stdClass;
$layout_info->extra_var->colorset = new stdClass;
$layout_info->extra_var->colorset->group = "일반";
$layout_info->extra_var->colorset->title = "컬러셋";
$layout_info->extra_var->colorset->type = "select";
$layout_info->extra_var->colorset->value = $vars->colorset;
$layout_info->extra_var->colorset->description = "레이아웃에서 주로 사용할 색상을 선택하세요.";
$layout_info->extra_var->colorset->options = array();
$layout_info->extra_var->colorset->options["info"] = new stdClass;
$layout_info->extra_var->colorset->options["info"]->val = "하늘색 (info)";
$layout_info->extra_var->colorset->options["primary"] = new stdClass;
$layout_info->extra_var->colorset->options["primary"]->val = "파랑색 (primary)";
$layout_info->extra_var->colorset->options["success"] = new stdClass;
$layout_info->extra_var->colorset->options["success"]->val = "초록색 (success)";
$layout_info->extra_var->colorset->options["warning"] = new stdClass;
$layout_info->extra_var->colorset->options["warning"]->val = "노란색 (warning)";
$layout_info->extra_var->colorset->options["danger"] = new stdClass;
$layout_info->extra_var->colorset->options["danger"]->val = "빨간색 (danger)";
$layout_info->extra_var->logo_title = new stdClass;
$layout_info->extra_var->logo_title->group = "일반";
$layout_info->extra_var->logo_title->title = "홈페이지 이름";
$layout_info->extra_var->logo_title->type = "text";
$layout_info->extra_var->logo_title->value = $vars->logo_title;
$layout_info->extra_var->logo_title->description = "상단바에 표시될 홈페이지 이름을 입력하세요.";
$layout_info->extra_var->index_url = new stdClass;
$layout_info->extra_var->index_url->group = "일반";
$layout_info->extra_var->index_url->title = "홈페이지 주소";
$layout_info->extra_var->index_url->type = "text";
$layout_info->extra_var->index_url->value = $vars->index_url;
$layout_info->extra_var->index_url->description = "홈페이지 이름을 클릭 시 이동 할 URL을 입력하세요.";
$layout_info->extra_var->logo_img = new stdClass;
$layout_info->extra_var->logo_img->group = "일반";
$layout_info->extra_var->logo_img->title = "로고 이미지";
$layout_info->extra_var->logo_img->type = "image";
$layout_info->extra_var->logo_img->value = $vars->logo_img;
$layout_info->extra_var->logo_img->description = "(선택 사항) 홈페이지 이름 대신 표시될 이미지를 올려주세요. (권장 높이 50px)";
$layout_info->extra_var->site_frame = new stdClass;
$layout_info->extra_var->site_frame->group = "프레임";
$layout_info->extra_var->site_frame->title = "프레임 형태";
$layout_info->extra_var->site_frame->type = "select";
$layout_info->extra_var->site_frame->value = $vars->site_frame;
$layout_info->extra_var->site_frame->description = "[TIP] 서브 사이드바를 사용할 경우 './layouts/simplestrap/custom/custom_sub_sidebar.html' 경로에 서브 사이드바에 추가할 내용을 업로드 해야 합니다.";
$layout_info->extra_var->site_frame->options = array();
$layout_info->extra_var->site_frame->options["sidebar_content"] = new stdClass;
$layout_info->extra_var->site_frame->options["sidebar_content"]->val = "사이드바 + 컨텐츠";
$layout_info->extra_var->site_frame->options["content_sidebar"] = new stdClass;
$layout_info->extra_var->site_frame->options["content_sidebar"]->val = "컨텐츠 + 사이드바";
$layout_info->extra_var->site_frame->options["content"] = new stdClass;
$layout_info->extra_var->site_frame->options["content"]->val = "컨텐츠";
$layout_info->extra_var->site_frame->options["sidebar_content_sidebar"] = new stdClass;
$layout_info->extra_var->site_frame->options["sidebar_content_sidebar"]->val = "사이드바 + 컨텐츠 + 서브 사이드바";
$layout_info->extra_var->sb_col = new stdClass;
$layout_info->extra_var->sb_col->group = "프레임";
$layout_info->extra_var->sb_col->title = "프레임 비율";
$layout_info->extra_var->sb_col->type = "select";
$layout_info->extra_var->sb_col->value = $vars->sb_col;
$layout_info->extra_var->sb_col->description = "사이드바 : 컨텐츠 (프레임 형태가 '컨텐츠' 혹은 '서브 사이드바'가 포함될 경우에 작동하지 않습니다.)";
$layout_info->extra_var->sb_col->options = array();
$layout_info->extra_var->sb_col->options["2"] = new stdClass;
$layout_info->extra_var->sb_col->options["2"]->val = "[1:5] 16% : 84%";
$layout_info->extra_var->sb_col->options["3"] = new stdClass;
$layout_info->extra_var->sb_col->options["3"]->val = "[1:3] 25% : 75%";
$layout_info->extra_var->sb_col->options["4"] = new stdClass;
$layout_info->extra_var->sb_col->options["4"]->val = "[1:2] 33% : 67%";
$layout_info->extra_var->sb_col->options["5"] = new stdClass;
$layout_info->extra_var->sb_col->options["5"]->val = "[5:7] 42% : 58%";
$layout_info->extra_var->sb_col->options["6"] = new stdClass;
$layout_info->extra_var->sb_col->options["6"]->val = "[1:1] 50% : 50%";
$layout_info->extra_var->site_frame_content = new stdClass;
$layout_info->extra_var->site_frame_content->group = "프레임";
$layout_info->extra_var->site_frame_content->title = "프레임 고정 모듈";
$layout_info->extra_var->site_frame_content->type = "text";
$layout_info->extra_var->site_frame_content->value = $vars->site_frame_content;
$layout_info->extra_var->site_frame_content->description = "'프레임 형태' 설정과 관계없이 강제로 '컨텐츠' 프레임으로 고정할 모듈 ID를 입력하세요. 쉼표로 구분합니다. 예) home, main, content";
$layout_info->extra_var->navbar_fixed = new stdClass;
$layout_info->extra_var->navbar_fixed->group = "상단바";
$layout_info->extra_var->navbar_fixed->title = "상단바 고정";
$layout_info->extra_var->navbar_fixed->type = "select";
$layout_info->extra_var->navbar_fixed->value = $vars->navbar_fixed;
$layout_info->extra_var->navbar_fixed->description = "상단바를 항상 브라우저 상단에 고정합니다.";
$layout_info->extra_var->navbar_fixed->options = array();
$layout_info->extra_var->navbar_fixed->options["Y"] = new stdClass;
$layout_info->extra_var->navbar_fixed->options["Y"]->val = "예";
$layout_info->extra_var->navbar_fixed->options["N"] = new stdClass;
$layout_info->extra_var->navbar_fixed->options["N"]->val = "아니요";
$layout_info->extra_var->navbar_color = new stdClass;
$layout_info->extra_var->navbar_color->group = "상단바";
$layout_info->extra_var->navbar_color->title = "상단바 색상";
$layout_info->extra_var->navbar_color->type = "select";
$layout_info->extra_var->navbar_color->value = $vars->navbar_color;
$layout_info->extra_var->navbar_color->description = "상단바의 배경 색상을 선택하세요.";
$layout_info->extra_var->navbar_color->options = array();
$layout_info->extra_var->navbar_color->options[""] = new stdClass;
$layout_info->extra_var->navbar_color->options[""]->val = "흰색";
$layout_info->extra_var->navbar_color->options["inverse"] = new stdClass;
$layout_info->extra_var->navbar_color->options["inverse"]->val = "검정";
$layout_info->extra_var->navbar_border_bottom = new stdClass;
$layout_info->extra_var->navbar_border_bottom->group = "상단바";
$layout_info->extra_var->navbar_border_bottom->title = "상단바 하단 테두리";
$layout_info->extra_var->navbar_border_bottom->type = "select";
$layout_info->extra_var->navbar_border_bottom->value = $vars->navbar_border_bottom;
$layout_info->extra_var->navbar_border_bottom->description = "상단바에 컬러셋에서 지정한 색상으로 하단 테두리를 표시합니다.";
$layout_info->extra_var->navbar_border_bottom->options = array();
$layout_info->extra_var->navbar_border_bottom->options["Y"] = new stdClass;
$layout_info->extra_var->navbar_border_bottom->options["Y"]->val = "사용";
$layout_info->extra_var->navbar_border_bottom->options["N"] = new stdClass;
$layout_info->extra_var->navbar_border_bottom->options["N"]->val = "사용 안 함";
$layout_info->extra_var->navbar_login = new stdClass;
$layout_info->extra_var->navbar_login->group = "상단바";
$layout_info->extra_var->navbar_login->title = "로그인 버튼";
$layout_info->extra_var->navbar_login->type = "select";
$layout_info->extra_var->navbar_login->value = $vars->navbar_login;
$layout_info->extra_var->navbar_login->description = "* 주의: 사용하지 않을 경우 레이아웃 내에서 로그인을 할 수 없으며 관리자는 /admin 등 으로 접근하여야 합니다. (사이트 로그인이 차단되지는 않습니다.)";
$layout_info->extra_var->navbar_login->options = array();
$layout_info->extra_var->navbar_login->options["Y"] = new stdClass;
$layout_info->extra_var->navbar_login->options["Y"]->val = "사용";
$layout_info->extra_var->navbar_login->options["N"] = new stdClass;
$layout_info->extra_var->navbar_login->options["N"]->val = "사용 안 함";
$layout_info->extra_var->navbar_search = new stdClass;
$layout_info->extra_var->navbar_search->group = "상단바";
$layout_info->extra_var->navbar_search->title = "통합 검색";
$layout_info->extra_var->navbar_search->type = "select";
$layout_info->extra_var->navbar_search->value = $vars->navbar_search;
$layout_info->extra_var->navbar_search->description = "상단바에 통합 검색 기능을 추가합니다.";
$layout_info->extra_var->navbar_search->options = array();
$layout_info->extra_var->navbar_search->options["Y"] = new stdClass;
$layout_info->extra_var->navbar_search->options["Y"]->val = "예, 버튼으로 표시합니다.";
$layout_info->extra_var->navbar_search->options["Y2"] = new stdClass;
$layout_info->extra_var->navbar_search->options["Y2"]->val = "예, 상단바에 폼으로 표시합니다.";
$layout_info->extra_var->navbar_search->options["N"] = new stdClass;
$layout_info->extra_var->navbar_search->options["N"]->val = "사용 안 함";
$layout_info->extra_var->socialxe_login = new stdClass;
$layout_info->extra_var->socialxe_login->group = "상단바";
$layout_info->extra_var->socialxe_login->title = "소셜 로그인";
$layout_info->extra_var->socialxe_login->type = "select";
$layout_info->extra_var->socialxe_login->value = $vars->socialxe_login;
$layout_info->extra_var->socialxe_login->description = "로그인 모달에 소셜 로그인 버튼을 추가합니다. 소셜XE 모듈을 사용하지 않는 경우 이 설정을 활성화하지 마세요. (* CONORY님의 소셜XE 모듈이 필요합니다. 표시되는 설정은 소셜XE 모듈을 따라갑니다.)";
$layout_info->extra_var->socialxe_login->options = array();
$layout_info->extra_var->socialxe_login->options["N"] = new stdClass;
$layout_info->extra_var->socialxe_login->options["N"]->val = "사용 안 함";
$layout_info->extra_var->socialxe_login->options["Y"] = new stdClass;
$layout_info->extra_var->socialxe_login->options["Y"]->val = "사용";
$layout_info->extra_var->navbar_member_point = new stdClass;
$layout_info->extra_var->navbar_member_point->group = "상단바";
$layout_info->extra_var->navbar_member_point->title = "회원 포인트";
$layout_info->extra_var->navbar_member_point->type = "select";
$layout_info->extra_var->navbar_member_point->value = $vars->navbar_member_point;
$layout_info->extra_var->navbar_member_point->description = "(* 캐쉬를 표시하기 위해서는 CONORY님의 캐쉬 시스템 모듈이 필요합니다.)";
$layout_info->extra_var->navbar_member_point->options = array();
$layout_info->extra_var->navbar_member_point->options["N"] = new stdClass;
$layout_info->extra_var->navbar_member_point->options["N"]->val = "표시 안함";
$layout_info->extra_var->navbar_member_point->options["Y"] = new stdClass;
$layout_info->extra_var->navbar_member_point->options["Y"]->val = "포인트만 표시";
$layout_info->extra_var->navbar_member_point->options["Y2"] = new stdClass;
$layout_info->extra_var->navbar_member_point->options["Y2"]->val = "포인트, 캐쉬 표시";
$layout_info->extra_var->sb_desc = new stdClass;
$layout_info->extra_var->sb_desc->group = "사이드바";
$layout_info->extra_var->sb_desc->title = "";
$layout_info->extra_var->sb_desc->type = "";
$layout_info->extra_var->sb_desc->value = $vars->sb_desc;
$layout_info->extra_var->sb_desc->description = "프레임 형태를 '사이드바 + 컨텐츠' 혹은 '컨텐츠 + 사이드바'로 설정 후 사용 가능합니다.";
$layout_info->extra_var->sb_menu = new stdClass;
$layout_info->extra_var->sb_menu->group = "사이드바";
$layout_info->extra_var->sb_menu->title = "하위 메뉴 출력";
$layout_info->extra_var->sb_menu->type = "select";
$layout_info->extra_var->sb_menu->value = $vars->sb_menu;
$layout_info->extra_var->sb_menu->description = "사이드바에 하위 메뉴를 표시합니다.";
$layout_info->extra_var->sb_menu->options = array();
$layout_info->extra_var->sb_menu->options["N"] = new stdClass;
$layout_info->extra_var->sb_menu->options["N"]->val = "아니요";
$layout_info->extra_var->sb_menu->options["Y"] = new stdClass;
$layout_info->extra_var->sb_menu->options["Y"]->val = "예";
$layout_info->extra_var->sb_post = new stdClass;
$layout_info->extra_var->sb_post->group = "사이드바";
$layout_info->extra_var->sb_post->title = "최신 글 출력";
$layout_info->extra_var->sb_post->type = "select";
$layout_info->extra_var->sb_post->value = $vars->sb_post;
$layout_info->extra_var->sb_post->description = "사이드바에 최신 글 위젯을 표시합니다. (* Content 위젯 스킨이 필요합니다.)";
$layout_info->extra_var->sb_post->options = array();
$layout_info->extra_var->sb_post->options["Y"] = new stdClass;
$layout_info->extra_var->sb_post->options["Y"]->val = "예";
$layout_info->extra_var->sb_post->options["N"] = new stdClass;
$layout_info->extra_var->sb_post->options["N"]->val = "아니요";
$layout_info->extra_var->sb_post_count = new stdClass;
$layout_info->extra_var->sb_post_count->group = "사이드바";
$layout_info->extra_var->sb_post_count->title = "최신 글 출력 갯수";
$layout_info->extra_var->sb_post_count->type = "text";
$layout_info->extra_var->sb_post_count->value = $vars->sb_post_count;
$layout_info->extra_var->sb_post_count->description = "최신 글 리스트를 출력할 갯수를 정해주세요. (기본 5개)";
$layout_info->extra_var->sb_post_module = new stdClass;
$layout_info->extra_var->sb_post_module->group = "사이드바";
$layout_info->extra_var->sb_post_module->title = "최신 글 출력 모듈 번호";
$layout_info->extra_var->sb_post_module->type = "text";
$layout_info->extra_var->sb_post_module->value = $vars->sb_post_module;
$layout_info->extra_var->sb_post_module->description = "최신 글을 출력할 모듈 번호를 입력합니다. 비워둘 경우 모든 게시물이 출력됩니다. (쉼표로 구분합니다.)";
$layout_info->extra_var->sb_comm = new stdClass;
$layout_info->extra_var->sb_comm->group = "사이드바";
$layout_info->extra_var->sb_comm->title = "최신 댓글 출력";
$layout_info->extra_var->sb_comm->type = "select";
$layout_info->extra_var->sb_comm->value = $vars->sb_comm;
$layout_info->extra_var->sb_comm->description = "사이드바에 최신 댓글 위젯을 표시합니다. (* Content 위젯 스킨이 필요합니다.)";
$layout_info->extra_var->sb_comm->options = array();
$layout_info->extra_var->sb_comm->options["Y"] = new stdClass;
$layout_info->extra_var->sb_comm->options["Y"]->val = "예";
$layout_info->extra_var->sb_comm->options["N"] = new stdClass;
$layout_info->extra_var->sb_comm->options["N"]->val = "아니요";
$layout_info->extra_var->sb_comm_count = new stdClass;
$layout_info->extra_var->sb_comm_count->group = "사이드바";
$layout_info->extra_var->sb_comm_count->title = "최신 댓글 출력 갯수";
$layout_info->extra_var->sb_comm_count->type = "text";
$layout_info->extra_var->sb_comm_count->value = $vars->sb_comm_count;
$layout_info->extra_var->sb_comm_count->description = "최신 댓글 리스트를 출력할 갯수를 정해주세요. (기본 5개)";
$layout_info->extra_var->sb_comm_module = new stdClass;
$layout_info->extra_var->sb_comm_module->group = "사이드바";
$layout_info->extra_var->sb_comm_module->title = "최신 댓글 출력 모듈 번호";
$layout_info->extra_var->sb_comm_module->type = "text";
$layout_info->extra_var->sb_comm_module->value = $vars->sb_comm_module;
$layout_info->extra_var->sb_comm_module->description = "최신 댓글을 출력할 모듈 번호를 입력합니다. 비워둘 경우 모든 댓글이 출력됩니다. (쉼표로 구분합니다.)";
$layout_info->extra_var->sb_title_icon = new stdClass;
$layout_info->extra_var->sb_title_icon->group = "사이드바";
$layout_info->extra_var->sb_title_icon->title = "제목 아이콘 표시";
$layout_info->extra_var->sb_title_icon->type = "select";
$layout_info->extra_var->sb_title_icon->value = $vars->sb_title_icon;
$layout_info->extra_var->sb_title_icon->description = "최신 글 및 최신 댓글 제목 앞에 아이콘을 표시합니다.";
$layout_info->extra_var->sb_title_icon->options = array();
$layout_info->extra_var->sb_title_icon->options["Y"] = new stdClass;
$layout_info->extra_var->sb_title_icon->options["Y"]->val = "예";
$layout_info->extra_var->sb_title_icon->options["N"] = new stdClass;
$layout_info->extra_var->sb_title_icon->options["N"]->val = "아니요";
$layout_info->extra_var->sb_widget1 = new stdClass;
$layout_info->extra_var->sb_widget1->group = "사이드바";
$layout_info->extra_var->sb_widget1->title = "사용자 지정 위젯 1";
$layout_info->extra_var->sb_widget1->type = "textarea";
$layout_info->extra_var->sb_widget1->value = $vars->sb_widget1;
$layout_info->extra_var->sb_widget1->description = "사이드바에 표시될 사용자 지정 위젯 혹은 기타 HTML을 입력하세요.";
$layout_info->extra_var->sb_widget2 = new stdClass;
$layout_info->extra_var->sb_widget2->group = "사이드바";
$layout_info->extra_var->sb_widget2->title = "사용자 지정 위젯 2";
$layout_info->extra_var->sb_widget2->type = "textarea";
$layout_info->extra_var->sb_widget2->value = $vars->sb_widget2;
$layout_info->extra_var->sb_widget2->description = "";
$layout_info->extra_var->sb_widget3 = new stdClass;
$layout_info->extra_var->sb_widget3->group = "사이드바";
$layout_info->extra_var->sb_widget3->title = "사용자 지정 위젯 3";
$layout_info->extra_var->sb_widget3->type = "textarea";
$layout_info->extra_var->sb_widget3->value = $vars->sb_widget3;
$layout_info->extra_var->sb_widget3->description = "";
$layout_info->extra_var->sb_widget4 = new stdClass;
$layout_info->extra_var->sb_widget4->group = "사이드바";
$layout_info->extra_var->sb_widget4->title = "사용자 지정 위젯 4";
$layout_info->extra_var->sb_widget4->type = "textarea";
$layout_info->extra_var->sb_widget4->value = $vars->sb_widget4;
$layout_info->extra_var->sb_widget4->description = "";
$layout_info->extra_var->sb_widget5 = new stdClass;
$layout_info->extra_var->sb_widget5->group = "사이드바";
$layout_info->extra_var->sb_widget5->title = "사용자 지정 위젯 5";
$layout_info->extra_var->sb_widget5->type = "textarea";
$layout_info->extra_var->sb_widget5->value = $vars->sb_widget5;
$layout_info->extra_var->sb_widget5->description = "";
$layout_info->extra_var->jumbotron = new stdClass;
$layout_info->extra_var->jumbotron->group = "점보트론";
$layout_info->extra_var->jumbotron->title = "점보트론 사용";
$layout_info->extra_var->jumbotron->type = "select";
$layout_info->extra_var->jumbotron->value = $vars->jumbotron;
$layout_info->extra_var->jumbotron->description = "[TIP] '메인 페이지에서만 사용하지 않음' 속성은 슬라이더와 같이 사용하실 수 있습니다.";
$layout_info->extra_var->jumbotron->options = array();
$layout_info->extra_var->jumbotron->options["no_main"] = new stdClass;
$layout_info->extra_var->jumbotron->options["no_main"]->val = "메인 페이지에서만 사용하지 않음";
$layout_info->extra_var->jumbotron->options["only_main"] = new stdClass;
$layout_info->extra_var->jumbotron->options["only_main"]->val = "메인 페이지에서만 사용";
$layout_info->extra_var->jumbotron->options["Y"] = new stdClass;
$layout_info->extra_var->jumbotron->options["Y"]->val = "예";
$layout_info->extra_var->jumbotron->options["N"] = new stdClass;
$layout_info->extra_var->jumbotron->options["N"]->val = "아니요";
$layout_info->extra_var->jumbotron_align = new stdClass;
$layout_info->extra_var->jumbotron_align->group = "점보트론";
$layout_info->extra_var->jumbotron_align->title = "점보트론 글자 정렬";
$layout_info->extra_var->jumbotron_align->type = "select";
$layout_info->extra_var->jumbotron_align->value = $vars->jumbotron_align;
$layout_info->extra_var->jumbotron_align->description = "";
$layout_info->extra_var->jumbotron_align->options = array();
$layout_info->extra_var->jumbotron_align->options["center"] = new stdClass;
$layout_info->extra_var->jumbotron_align->options["center"]->val = "가운데 정렬";
$layout_info->extra_var->jumbotron_align->options["left"] = new stdClass;
$layout_info->extra_var->jumbotron_align->options["left"]->val = "왼쪽 정렬";
$layout_info->extra_var->jumbotron_align->options["right"] = new stdClass;
$layout_info->extra_var->jumbotron_align->options["right"]->val = "오른쪽 정렬";
$layout_info->extra_var->jumbotron_hide_mid = new stdClass;
$layout_info->extra_var->jumbotron_hide_mid->group = "점보트론";
$layout_info->extra_var->jumbotron_hide_mid->title = "점보트론 숨기기 모듈";
$layout_info->extra_var->jumbotron_hide_mid->type = "text";
$layout_info->extra_var->jumbotron_hide_mid->value = $vars->jumbotron_hide_mid;
$layout_info->extra_var->jumbotron_hide_mid->description = "'점보트론 사용' 설정과 관계없이 점보트론을 특정 페이지에서 숨길 모듈 ID를 입력하세요. 쉼표로 구분합니다. 예) home, main, no_jumbotron";
$layout_info->extra_var->slide_use = new stdClass;
$layout_info->extra_var->slide_use->group = "슬라이더";
$layout_info->extra_var->slide_use->title = "슬라이더 사용";
$layout_info->extra_var->slide_use->type = "select";
$layout_info->extra_var->slide_use->value = $vars->slide_use;
$layout_info->extra_var->slide_use->description = "[TIP] 슬라이더를 사용하는 모듈일 경우, 점보트론을 사용하지 않는 것을 추천합니다.";
$layout_info->extra_var->slide_use->options = array();
$layout_info->extra_var->slide_use->options["only_main"] = new stdClass;
$layout_info->extra_var->slide_use->options["only_main"]->val = "메인 페이지에서만";
$layout_info->extra_var->slide_use->options["N"] = new stdClass;
$layout_info->extra_var->slide_use->options["N"]->val = "아니요";
$layout_info->extra_var->slide_use->options["Y"] = new stdClass;
$layout_info->extra_var->slide_use->options["Y"]->val = "예";
$layout_info->extra_var->slide_module = new stdClass;
$layout_info->extra_var->slide_module->group = "슬라이더";
$layout_info->extra_var->slide_module->title = "슬라이더 표시 모듈";
$layout_info->extra_var->slide_module->type = "text";
$layout_info->extra_var->slide_module->value = $vars->slide_module;
$layout_info->extra_var->slide_module->description = "'슬라이더 사용' 설정과 관계없이 슬라이더를 특정 페이지에서만 표시할 모듈 ID를 입력하세요. 쉼표로 구분합니다. 예) home, main, slider";
$layout_info->extra_var->slide_img_height = new stdClass;
$layout_info->extra_var->slide_img_height->group = "슬라이더";
$layout_info->extra_var->slide_img_height->title = "슬라이더 이미지 높이";
$layout_info->extra_var->slide_img_height->type = "text";
$layout_info->extra_var->slide_img_height->value = $vars->slide_img_height;
$layout_info->extra_var->slide_img_height->description = "입력하신 값에 따라 이미지의 하단이 잘립니다. 입력하지 않으면 업로드된 이미지의 기본 높이로 지정됩니다. (px는 생략합니다.)";
$layout_info->extra_var->slide_c1_img = new stdClass;
$layout_info->extra_var->slide_c1_img->group = "슬라이더";
$layout_info->extra_var->slide_c1_img->title = "슬라이더 1 이미지";
$layout_info->extra_var->slide_c1_img->type = "image";
$layout_info->extra_var->slide_c1_img->value = $vars->slide_c1_img;
$layout_info->extra_var->slide_c1_img->description = "슬라이더 첫번째 이미지를 업로드해주세요.";
$layout_info->extra_var->slide_c1_url = new stdClass;
$layout_info->extra_var->slide_c1_url->group = "슬라이더";
$layout_info->extra_var->slide_c1_url->title = "슬라이더 1 URL";
$layout_info->extra_var->slide_c1_url->type = "text";
$layout_info->extra_var->slide_c1_url->value = $vars->slide_c1_url;
$layout_info->extra_var->slide_c1_url->description = "슬라이더 첫번째 이미지를 클릭하면 이동할 URL를 입력해주세요.";
$layout_info->extra_var->slide_c1_text = new stdClass;
$layout_info->extra_var->slide_c1_text->group = "슬라이더";
$layout_info->extra_var->slide_c1_text->title = "슬라이더 1 제목";
$layout_info->extra_var->slide_c1_text->type = "text";
$layout_info->extra_var->slide_c1_text->value = $vars->slide_c1_text;
$layout_info->extra_var->slide_c1_text->description = "슬라이더 첫번째 이미지 하단에 나올 제목을 입력하세요.";
$layout_info->extra_var->slide_c1_desc = new stdClass;
$layout_info->extra_var->slide_c1_desc->group = "슬라이더";
$layout_info->extra_var->slide_c1_desc->title = "슬라이더 1 설명";
$layout_info->extra_var->slide_c1_desc->type = "textarea";
$layout_info->extra_var->slide_c1_desc->value = $vars->slide_c1_desc;
$layout_info->extra_var->slide_c1_desc->description = "슬라이더 첫번째 이미지 하단에 나올 설명을 입력하세요. (HTML 태그 사용 가능)";
$layout_info->extra_var->slide_c2_img = new stdClass;
$layout_info->extra_var->slide_c2_img->group = "슬라이더";
$layout_info->extra_var->slide_c2_img->title = "슬라이더 2 이미지";
$layout_info->extra_var->slide_c2_img->type = "image";
$layout_info->extra_var->slide_c2_img->value = $vars->slide_c2_img;
$layout_info->extra_var->slide_c2_img->description = "";
$layout_info->extra_var->slide_c2_url = new stdClass;
$layout_info->extra_var->slide_c2_url->group = "슬라이더";
$layout_info->extra_var->slide_c2_url->title = "슬라이더 2 URL";
$layout_info->extra_var->slide_c2_url->type = "text";
$layout_info->extra_var->slide_c2_url->value = $vars->slide_c2_url;
$layout_info->extra_var->slide_c2_url->description = "";
$layout_info->extra_var->slide_c2_text = new stdClass;
$layout_info->extra_var->slide_c2_text->group = "슬라이더";
$layout_info->extra_var->slide_c2_text->title = "슬라이더 2 제목";
$layout_info->extra_var->slide_c2_text->type = "text";
$layout_info->extra_var->slide_c2_text->value = $vars->slide_c2_text;
$layout_info->extra_var->slide_c2_text->description = "";
$layout_info->extra_var->slide_c2_desc = new stdClass;
$layout_info->extra_var->slide_c2_desc->group = "슬라이더";
$layout_info->extra_var->slide_c2_desc->title = "슬라이더 2 설명";
$layout_info->extra_var->slide_c2_desc->type = "textarea";
$layout_info->extra_var->slide_c2_desc->value = $vars->slide_c2_desc;
$layout_info->extra_var->slide_c2_desc->description = "";
$layout_info->extra_var->slide_c3_img = new stdClass;
$layout_info->extra_var->slide_c3_img->group = "슬라이더";
$layout_info->extra_var->slide_c3_img->title = "슬라이더 3 이미지";
$layout_info->extra_var->slide_c3_img->type = "image";
$layout_info->extra_var->slide_c3_img->value = $vars->slide_c3_img;
$layout_info->extra_var->slide_c3_img->description = "";
$layout_info->extra_var->slide_c3_url = new stdClass;
$layout_info->extra_var->slide_c3_url->group = "슬라이더";
$layout_info->extra_var->slide_c3_url->title = "슬라이더 3 URL";
$layout_info->extra_var->slide_c3_url->type = "text";
$layout_info->extra_var->slide_c3_url->value = $vars->slide_c3_url;
$layout_info->extra_var->slide_c3_url->description = "";
$layout_info->extra_var->slide_c3_text = new stdClass;
$layout_info->extra_var->slide_c3_text->group = "슬라이더";
$layout_info->extra_var->slide_c3_text->title = "슬라이더 3 제목";
$layout_info->extra_var->slide_c3_text->type = "text";
$layout_info->extra_var->slide_c3_text->value = $vars->slide_c3_text;
$layout_info->extra_var->slide_c3_text->description = "";
$layout_info->extra_var->slide_c3_desc = new stdClass;
$layout_info->extra_var->slide_c3_desc->group = "슬라이더";
$layout_info->extra_var->slide_c3_desc->title = "슬라이더 3 설명";
$layout_info->extra_var->slide_c3_desc->type = "textarea";
$layout_info->extra_var->slide_c3_desc->value = $vars->slide_c3_desc;
$layout_info->extra_var->slide_c3_desc->description = "";
$layout_info->extra_var->slide_c4_img = new stdClass;
$layout_info->extra_var->slide_c4_img->group = "슬라이더";
$layout_info->extra_var->slide_c4_img->title = "슬라이더 4 이미지";
$layout_info->extra_var->slide_c4_img->type = "image";
$layout_info->extra_var->slide_c4_img->value = $vars->slide_c4_img;
$layout_info->extra_var->slide_c4_img->description = "";
$layout_info->extra_var->slide_c4_url = new stdClass;
$layout_info->extra_var->slide_c4_url->group = "슬라이더";
$layout_info->extra_var->slide_c4_url->title = "슬라이더 4 URL";
$layout_info->extra_var->slide_c4_url->type = "text";
$layout_info->extra_var->slide_c4_url->value = $vars->slide_c4_url;
$layout_info->extra_var->slide_c4_url->description = "";
$layout_info->extra_var->slide_c4_text = new stdClass;
$layout_info->extra_var->slide_c4_text->group = "슬라이더";
$layout_info->extra_var->slide_c4_text->title = "슬라이더 4 제목";
$layout_info->extra_var->slide_c4_text->type = "text";
$layout_info->extra_var->slide_c4_text->value = $vars->slide_c4_text;
$layout_info->extra_var->slide_c4_text->description = "";
$layout_info->extra_var->slide_c4_desc = new stdClass;
$layout_info->extra_var->slide_c4_desc->group = "슬라이더";
$layout_info->extra_var->slide_c4_desc->title = "슬라이더 4 설명";
$layout_info->extra_var->slide_c4_desc->type = "textarea";
$layout_info->extra_var->slide_c4_desc->value = $vars->slide_c4_desc;
$layout_info->extra_var->slide_c4_desc->description = "";
$layout_info->extra_var->slide_c5_img = new stdClass;
$layout_info->extra_var->slide_c5_img->group = "슬라이더";
$layout_info->extra_var->slide_c5_img->title = "슬라이더 5 이미지";
$layout_info->extra_var->slide_c5_img->type = "image";
$layout_info->extra_var->slide_c5_img->value = $vars->slide_c5_img;
$layout_info->extra_var->slide_c5_img->description = "";
$layout_info->extra_var->slide_c5_url = new stdClass;
$layout_info->extra_var->slide_c5_url->group = "슬라이더";
$layout_info->extra_var->slide_c5_url->title = "슬라이더 5 URL";
$layout_info->extra_var->slide_c5_url->type = "text";
$layout_info->extra_var->slide_c5_url->value = $vars->slide_c5_url;
$layout_info->extra_var->slide_c5_url->description = "";
$layout_info->extra_var->slide_c5_text = new stdClass;
$layout_info->extra_var->slide_c5_text->group = "슬라이더";
$layout_info->extra_var->slide_c5_text->title = "슬라이더 5 제목";
$layout_info->extra_var->slide_c5_text->type = "text";
$layout_info->extra_var->slide_c5_text->value = $vars->slide_c5_text;
$layout_info->extra_var->slide_c5_text->description = "";
$layout_info->extra_var->slide_c5_desc = new stdClass;
$layout_info->extra_var->slide_c5_desc->group = "슬라이더";
$layout_info->extra_var->slide_c5_desc->title = "슬라이더 5 설명";
$layout_info->extra_var->slide_c5_desc->type = "textarea";
$layout_info->extra_var->slide_c5_desc->value = $vars->slide_c5_desc;
$layout_info->extra_var->slide_c5_desc->description = "";
$layout_info->extra_var->footer_copyright = new stdClass;
$layout_info->extra_var->footer_copyright->group = "푸터";
$layout_info->extra_var->footer_copyright->title = "푸터 상단";
$layout_info->extra_var->footer_copyright->type = "textarea";
$layout_info->extra_var->footer_copyright->value = $vars->footer_copyright;
$layout_info->extra_var->footer_copyright->description = "푸터 상단에 표시할 저작권 내용 등을 적어주세요. (HTML 사용 가능)";
$layout_info->extra_var->footer_bottom_menu = new stdClass;
$layout_info->extra_var->footer_bottom_menu->group = "푸터";
$layout_info->extra_var->footer_bottom_menu->title = "하단 메뉴";
$layout_info->extra_var->footer_bottom_menu->type = "select";
$layout_info->extra_var->footer_bottom_menu->value = $vars->footer_bottom_menu;
$layout_info->extra_var->footer_bottom_menu->description = "하단 메뉴를 사용합니다. 아래 '하단 메뉴'에서 사이트맵을 선택하세요.";
$layout_info->extra_var->footer_bottom_menu->options = array();
$layout_info->extra_var->footer_bottom_menu->options["N"] = new stdClass;
$layout_info->extra_var->footer_bottom_menu->options["N"]->val = "아니요";
$layout_info->extra_var->footer_bottom_menu->options["Y"] = new stdClass;
$layout_info->extra_var->footer_bottom_menu->options["Y"]->val = "예";
$layout_info->extra_var->footer_lang = new stdClass;
$layout_info->extra_var->footer_lang->group = "푸터";
$layout_info->extra_var->footer_lang->title = "언어 변경 표시";
$layout_info->extra_var->footer_lang->type = "select";
$layout_info->extra_var->footer_lang->value = $vars->footer_lang;
$layout_info->extra_var->footer_lang->description = "푸터에 언어 변경 버튼을 보여줍니다.";
$layout_info->extra_var->footer_lang->options = array();
$layout_info->extra_var->footer_lang->options["N"] = new stdClass;
$layout_info->extra_var->footer_lang->options["N"]->val = "아니요";
$layout_info->extra_var->footer_lang->options["Y"] = new stdClass;
$layout_info->extra_var->footer_lang->options["Y"]->val = "예";
$layout_info->extra_var->footer_bottom = new stdClass;
$layout_info->extra_var->footer_bottom->group = "푸터";
$layout_info->extra_var->footer_bottom->title = "푸터 하단";
$layout_info->extra_var->footer_bottom->type = "textarea";
$layout_info->extra_var->footer_bottom->value = $vars->footer_bottom;
$layout_info->extra_var->footer_bottom->description = "푸터의 최하단에 나올 내용을 적어주세요. (HTML 사용 가능)";
$layout_info->extra_var->premium = new stdClass;
$layout_info->extra_var->premium->group = "커스텀 / 고급";
$layout_info->extra_var->premium->title = "라이센스 제거";
$layout_info->extra_var->premium->type = "select";
$layout_info->extra_var->premium->value = $vars->premium;
$layout_info->extra_var->premium->description = "Premium Pack을 구입하신 분만 라이센스 제거가 가능합니다. 구입하지 않은 사이트에서 이 기능을 적용시 법적인 책임을 물을 수 있습니다.";
$layout_info->extra_var->premium->options = array();
$layout_info->extra_var->premium->options["N"] = new stdClass;
$layout_info->extra_var->premium->options["N"]->val = "아니요";
$layout_info->extra_var->premium->options["Y"] = new stdClass;
$layout_info->extra_var->premium->options["Y"]->val = "예";
$layout_info->extra_var->custom = new stdClass;
$layout_info->extra_var->custom->group = "커스텀 / 고급";
$layout_info->extra_var->custom->title = "커스텀 파일";
$layout_info->extra_var->custom->type = "checkbox";
$layout_info->extra_var->custom->value = $vars->custom;
$layout_info->extra_var->custom->description = "원하는 파일(위치)를 체크한 후 './layouts/simplestrap/custom/' 경로에 커스텀 파일을 업로드하여 커스텀 파일을 불러옵니다.";
$layout_info->extra_var->custom->options = array();
$layout_info->extra_var->custom->options["custom_style"] = new stdClass;
$layout_info->extra_var->custom->options["custom_style"]->val = "custom_style.css (CSS)";
$layout_info->extra_var->custom->options["custom_js"] = new stdClass;
$layout_info->extra_var->custom->options["custom_js"]->val = "custom_js.js (Javascript)";
$layout_info->extra_var->custom->options["custom_top"] = new stdClass;
$layout_info->extra_var->custom->options["custom_top"]->val = "custom_top.html (페이지 상단/컨테이너 상단)";
$layout_info->extra_var->custom->options["custom_bottom"] = new stdClass;
$layout_info->extra_var->custom->options["custom_bottom"]->val = "custom_bottom.html (페이지 최하단)";
$layout_info->extra_var->custom->options["custom_content_top"] = new stdClass;
$layout_info->extra_var->custom->options["custom_content_top"]->val = "custom_content_top.html (컨텐츠 상단)";
$layout_info->extra_var->custom->options["custom_content_bottom"] = new stdClass;
$layout_info->extra_var->custom->options["custom_content_bottom"]->val = "custom_content_bottom.html (컨텐츠 하단)";
$layout_info->extra_var->custom->options["custom_sidebar_top"] = new stdClass;
$layout_info->extra_var->custom->options["custom_sidebar_top"]->val = "custom_sidebar_top.html (사이드바 상단)";
$layout_info->extra_var->custom->options["custom_sidebar_bottom"] = new stdClass;
$layout_info->extra_var->custom->options["custom_sidebar_bottom"]->val = "custom_sidebar_bottom.html (사이드바 하단)";
$layout_info->extra_var->custom->options["custom_jumbotron"] = new stdClass;
$layout_info->extra_var->custom->options["custom_jumbotron"]->val = "custom_jumbotron.html (점보트론 교체)";
$layout_info->extra_var->custom->options["custom_setting"] = new stdClass;
$layout_info->extra_var->custom->options["custom_setting"]->val = "custom_setting.html";
$layout_info->extra_var->use_breadcrumb = new stdClass;
$layout_info->extra_var->use_breadcrumb->group = "커스텀 / 고급";
$layout_info->extra_var->use_breadcrumb->title = "빵 메뉴";
$layout_info->extra_var->use_breadcrumb->type = "select";
$layout_info->extra_var->use_breadcrumb->value = $vars->use_breadcrumb;
$layout_info->extra_var->use_breadcrumb->description = "메뉴 위치를 알려주는 빵 메뉴를 사용합니다.";
$layout_info->extra_var->use_breadcrumb->options = array();
$layout_info->extra_var->use_breadcrumb->options["N"] = new stdClass;
$layout_info->extra_var->use_breadcrumb->options["N"]->val = "사용 안 함";
$layout_info->extra_var->use_breadcrumb->options["Y"] = new stdClass;
$layout_info->extra_var->use_breadcrumb->options["Y"]->val = "사용";
$layout_info->extra_var->navbar_sm_dropdown = new stdClass;
$layout_info->extra_var->navbar_sm_dropdown->group = "커스텀 / 고급";
$layout_info->extra_var->navbar_sm_dropdown->title = "[모바일] 모든 메뉴 표시";
$layout_info->extra_var->navbar_sm_dropdown->type = "select";
$layout_info->extra_var->navbar_sm_dropdown->value = $vars->navbar_sm_dropdown;
$layout_info->extra_var->navbar_sm_dropdown->description = "모바일에서 상단바의 2차 메뉴를 터치없이 보여줍니다.";
$layout_info->extra_var->navbar_sm_dropdown->options = array();
$layout_info->extra_var->navbar_sm_dropdown->options["N"] = new stdClass;
$layout_info->extra_var->navbar_sm_dropdown->options["N"]->val = "아니요";
$layout_info->extra_var->navbar_sm_dropdown->options["Y"] = new stdClass;
$layout_info->extra_var->navbar_sm_dropdown->options["Y"]->val = "예";
$layout_info->extra_var->content_panel_heading = new stdClass;
$layout_info->extra_var->content_panel_heading->group = "커스텀 / 고급";
$layout_info->extra_var->content_panel_heading->title = "전체화면 모드 숨기기";
$layout_info->extra_var->content_panel_heading->type = "select";
$layout_info->extra_var->content_panel_heading->value = $vars->content_panel_heading;
$layout_info->extra_var->content_panel_heading->description = "프레임 형태 설정과 상관없이 전체화면 모드 아이콘을 숨깁니다.";
$layout_info->extra_var->content_panel_heading->options = array();
$layout_info->extra_var->content_panel_heading->options["Y"] = new stdClass;
$layout_info->extra_var->content_panel_heading->options["Y"]->val = "프레임 형태 설정에 따름";
$layout_info->extra_var->content_panel_heading->options["N"] = new stdClass;
$layout_info->extra_var->content_panel_heading->options["N"]->val = "숨기기";
$layout_info->extra_var->xe_validator_message = new stdClass;
$layout_info->extra_var->xe_validator_message->group = "커스텀 / 고급";
$layout_info->extra_var->xe_validator_message->title = "XE Validator Message";
$layout_info->extra_var->xe_validator_message->type = "select";
$layout_info->extra_var->xe_validator_message->value = $vars->xe_validator_message;
$layout_info->extra_var->xe_validator_message->description = "레이아웃에서 자체적으로 지원하는 안내 메시지 (XE_VALIDATOR_MESSAGE)를 숨깁니다.";
$layout_info->extra_var->xe_validator_message->options = array();
$layout_info->extra_var->xe_validator_message->options["Y"] = new stdClass;
$layout_info->extra_var->xe_validator_message->options["Y"]->val = "숨기지 않음";
$layout_info->extra_var->xe_validator_message->options["N"] = new stdClass;
$layout_info->extra_var->xe_validator_message->options["N"]->val = "숨기기";
$layout_info->extra_var->xe_css_remove = new stdClass;
$layout_info->extra_var->xe_css_remove->group = "커스텀 / 고급";
$layout_info->extra_var->xe_css_remove->title = "XE CSS 제거";
$layout_info->extra_var->xe_css_remove->type = "select";
$layout_info->extra_var->xe_css_remove->value = $vars->xe_css_remove;
$layout_info->extra_var->xe_css_remove->description = "xe.min.css (xe.css)를 제거하는 방식을 선택하세요. 제거하지 않으면 레이아웃 디자인에 문제가 발생할 수 있습니다.";
$layout_info->extra_var->xe_css_remove->options = array();
$layout_info->extra_var->xe_css_remove->options["script"] = new stdClass;
$layout_info->extra_var->xe_css_remove->options["script"]->val = "Javascript";
$layout_info->extra_var->xe_css_remove->options["N"] = new stdClass;
$layout_info->extra_var->xe_css_remove->options["N"]->val = "제거하지 않음";
$layout_info->extra_var->css3pie = new stdClass;
$layout_info->extra_var->css3pie->group = "커스텀 / 고급";
$layout_info->extra_var->css3pie->title = "CSS3PIE";
$layout_info->extra_var->css3pie->type = "select";
$layout_info->extra_var->css3pie->value = $vars->css3pie;
$layout_info->extra_var->css3pie->description = "Internet Explorer 하위 버전에서 둥근 모서리 등을 사용할 수 있는 CSS3PIE를 사용합니다. (* 참고: css3pie.com)";
$layout_info->extra_var->css3pie->options = array();
$layout_info->extra_var->css3pie->options["N"] = new stdClass;
$layout_info->extra_var->css3pie->options["N"]->val = "아니요";
$layout_info->extra_var->css3pie->options["Y"] = new stdClass;
$layout_info->extra_var->css3pie->options["Y"]->val = "예";
$layout_info->extra_var_count = "66";
$layout_info->menu_count = "2";
$layout_info->menu = new stdClass;
$layout_info->default_menu = "main_menu";
$layout_info->menu->main_menu = new stdClass;
$layout_info->menu->main_menu->name = "main_menu";
$layout_info->menu->main_menu->title = "메인 메뉴";
$layout_info->menu->main_menu->maxdepth = "3";
$layout_info->menu->main_menu->menu_srl = $vars->main_menu;
$layout_info->menu->main_menu->xml_file = "./files/cache/menu/".$vars->main_menu.".xml.php";
$layout_info->menu->main_menu->php_file = "./files/cache/menu/".$vars->main_menu.".php";
$layout_info->menu->footer_menu = new stdClass;
$layout_info->menu->footer_menu->name = "footer_menu";
$layout_info->menu->footer_menu->title = "하단 메뉴";
$layout_info->menu->footer_menu->maxdepth = "1";
$layout_info->menu->footer_menu->menu_srl = $vars->footer_menu;
$layout_info->menu->footer_menu->xml_file = "./files/cache/menu/".$vars->footer_menu.".xml.php";
$layout_info->menu->footer_menu->php_file = "./files/cache/menu/".$vars->footer_menu.".php";