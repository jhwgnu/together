<?php
$lang->kin='지식인 XE';
$lang->about_kin='질문과 답변을 하고 답변을 채택할 수 있는 XE 지식인 모듈입니다.';
$lang->cmd_management='관리';
$lang->total_articles='전체';
if(!is_array($lang->kin_main_tabs)){
	$lang->kin_main_tabs = array();
}
$lang->kin_main_tabs['0']='질문하기';
$lang->kin_main_tabs['1']='질문찾기';
$lang->kin_main_tabs['2']='답변을 기다리는 질문';
$lang->kin_main_tabs['3']='최근답변';
$lang->kin_main_tabs['4']='해결된 질문';
$lang->kin_main_tabs['5']='나의 질문';
$lang->kin_main_tabs['6']='나의 답변';
$lang->kin_main_tabs['7']='포인트 많은순으로 ';
$lang->kin_main_tabs['8']='인기 질문';
$lang->kin_main_tabs['9']='인기 답변';
$lang->kin_all_questions='모든 질문';
$lang->cmd_ask='질문하기';
$lang->cmd_reply='답변등록';
$lang->cmd_add_question='질문하기';
$lang->cmd_modify_reply='답변 수정하기';
$lang->about_ask='질문의 제목을 입력해주세요.';
$lang->cmd_find_ask='질문찾기';
$lang->about_find_ask='찾고 싶은 질문 또는 답변을 검색할 수 있습니다.';
$lang->go_more='더보기';
$lang->replies='답변';
$lang->msg_no_questions='질문이 없습니다.';
$lang->msg_no_replies='답변이 없습니다.';
$lang->msg_no_my_questions='내 질문이 없습니다.';
$lang->msg_no_article='글이 없습니다.';
$lang->notify_message='답변알림';
$lang->about_notify_message='답변이 추가되면 쪽지 또는 메일로 알려드립니다';
$lang->ask_category='질문분류';
$lang->cmd_load_saved_document='임시저장된 질문 불러오기';
$lang->give_point='포인트 선물';
$lang->about_give_point='답변 선택시 답변자에게 입력하신 포인트의 절반을 선물합니다.<br/>그리고 나머지 절반을 다시 돌려받게 됩니다. (최저 : %d, 최고 %d)';
$lang->limit_write='질문 제한';
$lang->about_limit_write='사용자의 포인트가 글쓰기 포인트보다 적으면 글을 쓸 수 없도록 합니다';
$lang->msg_limit_write='보유하고 계신 포인트가 부족하여 질문을 하실 수 없습니다';
$lang->limit_give_point='포인트 제한';
$lang->about_limit_give_point='질문자가 선물할 수 있는 최대 점수를 입력하여 제한할 수 있습니다 (기본 100)';
$lang->msg_title_is_null='제목을 입력해 주세요';
$lang->msg_content_is_null='내용을 입력해 주세요';
$lang->msg_point_is_null='답변자에게 선물 할 포인트를 입력하여 주세요';
$lang->msg_point_is_over='선물할 포인트가 보유한 포인트(%d) 보다 많습니다.';
$lang->msg_point_shortage='답변자에게 선물 할 포인트가 적습니다 (%d 포인트 이상 입력해주세요)';
$lang->msg_point_limited='답변자에게 선물 할 포인트가 많습니다 (%d 포인트 이하로 입력해주세요)';
$lang->msg_document_is_null='글을 찾을 수 없습니다';
$lang->rank_of_this_doc='이 지식이 받은 추천';
$lang->current_replies='현재 답변들';
$lang->cmd_do_comment='의견 쓰기';
$lang->msg_reply_message='답변 채택시 포인트';
$lang->cmd_select_reply='답변 채택';
$lang->msg_select_reply='선택하신 답변을 채택하시겠습니까?';
$lang->msg_selected_reply='질문자로부터 선택받은 답변입니다';
$lang->cmd_move_selected_reply='질문자 선택 답변 보기';
$lang->cmd_go_kin_index='처음으로 돌아가기';
$lang->kin_ing='진행중';
$lang->kin_complete='완료';
$lang->search_result='검색결과';
$lang->short_replies='의견';
$lang->kin_manage_list='회원 포인트 관리';
$lang->about_point_signup='등록하기';
$lang->topToltal='연간 포인트 순위';
$lang->topLastWeek='주간 포인트 순위';
$lang->topLastMonth='월간 포인트 순위';
$lang->totalPointTop='전체 포인트 순위';
$lang->cmd_new='새 지식인 모듈 생성';
$lang->user='사용자';
$lang->point='포인트';
$lang->regdate='등록 날짜';
$lang->comment_count_kin='답변 수';
$lang->about_comment_count_kin='한페이지에 보여지는 답변 수';
$lang->point_insert_comment_kin='질문 추가';
$lang->qa_title='모듈 타이틀';
$lang->about_qa_title='모듈의 이름을 입력해 주세요.';
$lang->answers='답변';
$lang->type='유형';
$lang->solved='해결됨';
$lang->unsolved='해결안됨';
$lang->accepted='채택됨';
$lang->unaccepted='채택안됨';
$lang->point_insert_question_kin='질문 추가';
$lang->about_kin_list_count='한 페이지에 표시될 글 수를 지정하실 수 있습니다. (기본 10개)';
$lang->popular_questions='인기질문';
$lang->back='돌아가기';
$lang->question='질문';
$lang->open_question='해결 안된 질문';
$lang->solved_question='해결된 질문';
$lang->all_questions='모든 질문';
$lang->show='보여주기';
$lang->all_answers='모든 답변';
$lang->accepted_answer='채택된 답변';
$lang->rated_sort='추천수 내림순';
$lang->my_question_answer='내 질문과 답변';
$lang->popolar_question_answer='인기질문과 답변';
$lang->total_point='전체 포인트';
$lang->weekly_point='주간 포인트 순위';
$lang->monthly_point='월간 포인트 순위';
$lang->annually_point='연간 포인트 순위';
