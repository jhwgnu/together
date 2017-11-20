var documentList = new Array();

jQuery(function($) {
	/**
	 * 외부 리소스 합치기
	 */
	$xw.eventHandler = XewallEventHandler;
	$xw.functions =  XewallFunctions;
	$xw.comFunc = XewallCommonFunctions;
	
	/**
	 * 페이지 로딩 완료시
	 * 최근 문서 목록을 불러온다. (xewall.model.php로 요청)
	 */
	$(document).ready(function() {
		
		// 전역변수 초기화
		$xw.default_listen = $('div.xewall').attr('default_listen');
		$xw.default_listen_init = $xw.default_listen;
		$xw.page = 1;
		$('div.xewall').removeAttr('default_listen');
		
		// 새로 고침 주기를 할당한다. 매 초마다 카운트 가감하고 0이 되면 새로고침 => 카운트 원위치
		setInterval(function() {
			// 카운트 가감하고 카운트가 0이 아니라면 아무것도 안한다.
			if (--xewall.refresh_freq_1 !== 0) {
				return false;
			}
			// 새로고침하고 카운터를 다시 세팅
			$xw.functions.refreshDocumentList($xw.default_listen, 1, $xw.page * xewall.list_count_doc);
			xewall.refresh_freq_1 = xewall.refresh_freq_0;
		}, 1000);
		
		
		
		// 최초 로딩시 게시판 버튼들의 색깔도 관리자가 맞춰놓은 색으로 바꿔주기
		$('li.default_listen_array, li.my_module_list').each(function() {
			var module_srl = $(this).attr('value');
			var moduleColor = xewall.colors[module_srl];
			// 게시판 색깔이 기본 정의 되지 않았다면 기본 색을 맞춰준다.
			if (xewall.colors[module_srl] === undefined) {
				if ($(this).attr('class') === 'default_listen_array') {
					xewall.colors[module_srl] = 'FFFAEC';
				} else {
					xewall.colors[module_srl] = 'E9FFD2';
				}
			}
			$(this).css('background-color', '#' + xewall.colors[module_srl]);
		});
		
		
		
		// 이벤트 할당
		// 새로고침을 눌렀을 때
		$('div.xewall .refresh').click(function() {
			$xw.functions.refreshDocumentList($xw.default_listen, 1, $xw.page * xewall.list_count_doc);
		});
		
		
		// 간단히 글쓰기를 클릭했을 때 간단한 에디터를 불러와 출력
		$('div.xewall .write_form .txt_area').click($xw.eventHandler.onSimpleFormFocus);
		
		// 행여나 제목 쓰다가 엔터 눌렀을 때 submit 안되도록 한다.
		$('div.xewall form').submit(function() {return false;});
		
		// 에디터 사용 글쓰기를 클릭했을 때 에디터를 불러와 출력(기존의 간단 에디터 제거)
		$('div.xewall .write_form .use_editor').click($xw.eventHandler.onEditorClick);
		
		// 게시판이 선택이 될 때마다 해당 게시판의 category들을 로드해 와서 출력시킨다.
		$('#default_listen_array').change($xw.eventHandler.onDefaultListenChange);
		
		// "간단히 글쓰기" 를 클릭했을 때 간단한 에디터를 불러와서 출력
		$('div.xewall .write_form .simple_form').click($xw.eventHandler.onSimpleFormClick);
		
		// 에디터에서 글을 다 쓰고 "게시" 버튼을 클릭했을 때 정보를 서버에 보내기
		$('div.xewall .write_form .btn_submit').click($xw.eventHandler.onSubmitClick);
		
		// 타이틀을, 또는 thumbnail을 눌렀을 때 summary와 thumbnail을 가리고 content를 보여주자.
		$('.document_ori .title .title').click($xw.eventHandler.onSummaryClick);
		$('.document_ori .middle .thumbnail').click($xw.eventHandler.onSummaryClick);
		$('.document_ori .middle .summary').click($xw.eventHandler.onSummaryClick);
		$('.document_ori .middle .see_simple').click($xw.eventHandler.onSummaryClick);
		
		// 타이틀을 우클릭 했을 때 서브메뉴 띄우기 => 게시물로 이동 기능
		$('.document_ori .title .title').bind('contextmenu', $xw.eventHandler.onTitleRightClick);
		
		// 브라우저 제목(타이틀)을 눌렀을 때 눌러진 게시판을 기준으로 재정렬 하도록 한다.
		$('.document_ori .browser_title').click($xw.eventHandler.onBoardListClick);
		
		// 추천을 눌렀을 때
		$('.document_ori .right .bottom .voted_count').click($xw.eventHandler.onVoteClick);
		
		// 비추를 눌렀을 때
		$('.document_ori .right .bottom .blamed_count').click($xw.eventHandler.onBlameClick);
		
		// 삭제를 눌렀을 때 - 일단 "삭제하시겠습니까?
		$('.document_ori .right .top .delete').click($xw.eventHandler.onDeleteClick);
		
		// "수정" 버튼을 눌렀을 때 - content 가리고 modify_form을 보여준 다음 여기에 에디터 불러와서 수정 내용 넣기
		$('.document_ori .right .top .modify').click($xw.eventHandler.onModifyClick);
		
		// 글 수정시 게시판 선택을 해서 게시판을 변경했을 때 게시판의 카테고리를 출력시키도록 한다.
		$('.document_ori .right .middle .board_list').change($xw.eventHandler.onModifyBoardChange);
		
		// 진짜 "수정" (go_modify)를 눌렀을 때 실제로 수정하기
		$('.document_ori .right .middle .go_modify').click($xw.eventHandler.onGoModifyClick);
		
		// 수정 "취소" 버튼을 눌렀을 때 에디터 없애고 summary, thumbnail등 보이기
		$('.document_ori .right .middle .cancel_modify').click($xw.eventHandler.onCancelModifyClick);
		
		// 수정시 "에디터 사용하기" 버튼을 눌렀을 때 (토글로 에디터를 보였다가 간단히 글쓰기를 보였다가 한다.)
		//$('.document_ori .right .middle .use_editor').click($xw.eventHandler.onUseEditorToggle);
		
		// 댓글을 눌렀을 때 댓글 리스트 불러오기(토글)
		$('.document_ori .right .bottom .toggle_comment').click($xw.eventHandler.onToggleCommentClick);
		
		// 댓글 더 불러오기를 눌렀을 때 댓글 더 불러오기
		$('.document_ori .right .more_page').click($xw.eventHandler.onMorePageClick);
		
		// 댓글의 summary를 눌렀을 때 summary는 가리고 content를 보인다.
		$('.comment_ori .comm_summary').click($xw.eventHandler.onCommContentClick);
		
		// 댓글 내용 "간단히 보기"를 클릭했을 경우 내용을 가리고 요약을 보여준다.
		$('.comment_ori .comm_see_summary').click($xw.eventHandler.onCommSeeSummaryClick);
		
		// 댓글 등록 버튼을 클릭했을 때 댓글의 내용을 서버에 전송해서 댓글을 달고 삽입된 내용을 반영한다.
		$('.document_ori .right .comment_write_form .comment_submit').click($xw.eventHandler.onCommentSubmitClick);
		
		// 댓글 쓰기에서 "에디터 사용"을 클릭했을 때 에디터를 불러와 배치하기
		$('.document_ori .right .comment_write_form .comment_use_editor').click($xw.eventHandler.onCommentUseEditorClick);
		
		// 댓글의 "삭제"을 클릭했을 때 삭제 확인 창을 띄우기
		$('.comment_ori .comm_right .comm_bottom .comm_delete').click($xw.eventHandler.onCommentDeleteClick);
		
		// 댓글의 추천을 눌렀을 때 추천을 실행한다.
		$('.comment_ori .comm_right .comm_bottom .comm_voted_count').click($xw.eventHandler.onCommentVoteUp);
		
		// 댓글의 비추를 눌렀을 때 비추를 실행한다.
		$('.comment_ori .comm_right .comm_bottom .comm_blamed_count').click($xw.eventHandler.onCommentVoteDown);
		
		// 댓글의 수정을 눌렀을 때 수정 창을 보여준다.
		$('.comment_ori .comm_right .comm_bottom .comm_modify').click($xw.eventHandler.onCommentModify);
		
		// 댓글 수정창에서 "수정"을 눌렀을 경우 에디터의 내용을 서버에 보내어 댓글을 수정시킨다.
		$('.comment_ori .comm_right .comm_middle .editor .go_modify').click($xw.eventHandler.onCommentGoModify);
		
		// 댓글 수정창에서 "에디터 사용"을 눌렀을 경우 에디터를 FULL 에디터로 불러온다.
		//$('.comment_ori .comm_right .comm_middle .editor .use_editor').click($xw.eventHandler.onComentUseEditor);
		
		// 댓글 수정창에서 취소를 눌렀을 경우 에디터를 숨기고 summary와 content를 보이도록 한다.
		$('.comment_ori .comm_right .comm_middle .editor .cancel_modify').click($xw.eventHandler.onComentCancelModify);
		
		// 댓글에 "댓글달기" 버튼을 눌렀을 때 댓글 달기 창을 보여주도록 한다.
		$('.comment_ori .comm_right .comm_bottom .comm_reply').click($xw.eventHandler.onComentReply);
		
		// 대댓글 달기 창에서 "취소"를 눌렀을 때 에디터를 가린다.
		$('.comment_ori .comm_right .comm_reply_box .editor .cancel_modify').click($xw.eventHandler.onComentReplyCancelModify);
		
		// 대댓글 달기 창에서 "에디터 사용"을 눌렀을 때 에디터를 보여준다.
		$('.comment_ori .comm_right .comm_reply_box .editor .use_editor').click($xw.eventHandler.onCommentReplyUseEditor);
		
		// 대댓글 달기 창에서 "전송" 을 눌렀을 때 에디터의 내용을 서버에 전송시키고 댓글 창 리프레쉬 시킨다.
		$('.comment_ori .comm_right .comm_reply_box .editor .go_modify').click($xw.eventHandler.onCommentReplyGoModify);
		
		// browser_title 을 클릭했을 때 자바스크립트로 막아주고 마우스 가운데 버튼으로 클릭하면 창이 뜨도록 하기.
		$('.document_ori .right .top .browser_title').click(function() {return false;});
		
		// 게시판을 선택했을 때
		$('div.xewall .board_list_box .board_list_ul li').click($xw.eventHandler.onBoardListClick);
		
		// 문서 목록 불러오기
		$xw.functions.refreshDocumentList($xw.default_listen_init, $xw.page, xewall.list_count_doc);
	});
});