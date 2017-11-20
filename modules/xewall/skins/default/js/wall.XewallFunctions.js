/**
 * 기본 함수 목록들을 모아둔다. => common functions
 */
var XewallFunctions;

jQuery(function($) {
	XewallFunctions = {
		
		/**
		 * @param[int] document_srl
		 * @param[boolean] include_content = false: content도 함께 불러올 것인가 결정
		 * @brief document_srl에 해당하는 문서의 내용을 최신으로 업데이트 시킨다.
		 * (include_content == true)일 경우 content도 함께 불러온다.
		 * (include_content == false)일 경우 content는 불러오지 않는다. 
		 */
		refreshDocument: function(document_srl, include_content) {
			var myCall = new MyMethodCall('xewall', 'getXewallDocument');
			myCall.addElement('document_srl', document_srl).addElement('include_content', include_content);
			myCall.callAjax(
					XewallFunctions.refreshDocumentCallbackSuccess,
					XewallFunctions.refreshDocumentCallbackFail,
					true
			);
		},
		
		refreshDocumentCallbackSuccess : function(data) {
			// 에러 확인
			var error = parseInt($(data).find('error:first').text());
			var message = $(data).find('message:first').text();
			if (error) {
				XewallFunctions.showLogMsg(message);
				return;
			}
			var recvDocumentSrl = parseInt($(data).find('document_srl').text());
			var recvLastUpdate = $(data).find('last_update').text();
			XewallFunctions.upsertDocument(recvDocumentSrl, recvLastUpdate, $(data).find("document:first"));
			
			$('.loading').hide();
		},
		
		refreshDocumentCallbackFail : function() {
		},
		
		upsertDocument : function(recvDocumentSrl, recvLastUpdate, docInfo) {
			var $document;
			// 문서가 캐시에 존재하지 않는다면 새로 DOM 생성하여 삽입
			if ($xw.docCache[recvDocumentSrl] === undefined) {
				$document = $(".dummies:first .document_ori:first").clone(true);
				$document.removeClass('document_ori').addClass('document');
			}
			// 문서가 존재하고 업데이트 날짜가 다르면 DOM 객체 찾아서 업데이트
			else {
				$document = $(".document_srl_" + recvDocumentSrl);
			}
			
			// 서버에서 받은 내용 문서에 업데이트 또는 삽입
			var doc = new XewallDocument();
			doc.setDocumentObj(docInfo);
			doc.setInfoToDomObj($document);
			// 삽입동작이라면 새 DOM 객체를 body에 삽입
			if ($xw.docCache[recvDocumentSrl] === undefined) {
				XewallFunctions.insertDocument2DOM($document, "sort");
				$document.fadeIn();
			}
			
			// 캐쉬에 삽입 / 업데이트
			$xw.docCache[doc.document_srl] = recvLastUpdate;
			
			// summary 박스의 크기를 조정한다.
			if ($document.find('.summary').height() < 100 && ($document.find('.thumbnail').length)) {
				$document.find('.summary').height(100);
			}
		},
		
		/**
		 * 새로고침을 눌렀을 때
		 * 서버에서 각 문서의 document_srl, last_update 정보를 불러온다.
		 * 그리고 메모리(documentList)에 있는 해당하는 document_srl의 last_update를 비교해서 차이가 있다면
		 * 해당 문서에 대한 정보를 따로 받아와서 업데이트를 실행한다.
		 * sample_com = 문서에서 샘플로 들고 올 댓글들
		 */
		refreshDocumentList: function(listen, page, list_count, sample_com) {
			var myCall = new MyMethodCall('xewall', 'getXewallDocumentList');
			myCall.addElement('module_srl', listen);
			myCall.addElement('page', page);
			if (list_count) myCall.addElement('list_count', list_count);
			myCall.callAjax(
					XewallFunctions.refreshDocumentListCallbackSuccess,
					XewallFunctions.refreshDocumentListCallbackFail,
					false
			);
		},
		
		refreshDocumentListCallbackSuccess : function(data, textStatus, xhr) {
			// 서버에서 온 데이터를 javascript 데이터로 뽑아내기
			var recv_page = parseInt($(data).children('response').children('page').text());
			var $documentList = $(data).children('response').children('documentList').children();
			// 첫 페이지라면 목록을 reverse 시킨다.
			if (recv_page == 1)
				$documentList = $documentList.get().reverse();
			else
				$documentList = $documentList.get();
			// 각각의 리스트에 대하여 update 또는 insert시킨다.
			$($documentList).each(function() { // 서버에서 받아온 각각의 document에 대해 루프를 돈다.
				var recv_document_srl = parseInt($(this).children('document_srl').text());
				var recv_last_update = $(this).children('last_update').text();
				XewallFunctions.upsertDocument(recv_document_srl, recv_last_update, $(this));
			});
			
			$('div.xewall .loading').hide();
			
			// scroll 이벤트를 바인딩 시킨다.
			setTimeout(function() {
				$(window).bind("scroll", $xw.eventHandler.onScroll);
			}, 3000);
			
			
			// refresh_freq 초기화
			xewall.refresh_freq_1 = xewall.refresh_freq_0;
		},
		
		refreshDocumentListCallbackFail : function(xhr, textStatus) {
			// 에러 메시지 출력
			XewallFunctions.showLogMsg('Ajax Call Error : ' + textStatus);
			xewall.refresh_freq_1 = xewall.refresh_freq_0;
		},
		
		/**
		 * 서버에 댓글 정보 요청
		 * @param[int] document_srl
		 * @param[boolean] include_content = false : content도 함께 불러올 것인가 결정
		 */
		refreshComment: function(comment_srl, include_content) {
			var myCall = new MyMethodCall();
			myCall.setModule('xewall').setAct('getXewallComment');
			myCall.addElement('comment_srl', comment_srl);
			myCall.addElement('include_content', include_content);
			myCall.callAjax(
					XewallFunctions.refreshCommentCallbackSuccess,
					XewallFunctions.refreshCommentCallbackFail,
					false
			);
		},
		
		refreshCommentCallbackSuccess : function(data, textStatus, xhr) { // FIXME
			// 에러가 있는지 확인한다.
			var error = parseInt($(data).find("error:first").text());
			var message = $(data).find("message:first").text();
			if (error) {
				XewallFunctions.showLogMsg(message);
				return;
			}
			
			// 받은 데이터를 등록
			var comment = new XewallComment();
			
			// 받은 정보를 저장
			comment.setCommentObj($(data).find("comment"));
			
			// 사용자의 브라우저에 존재하지 않는 댓글이라면 댓글 삽입, 보이는 댓글이라면 업뎃
			if ($xw.comCache[comment.comment_srl]) {
				// 댓글 정보 업데이트
				var $comObj = $(".comment_srl_" + comment.comment_srl);
				comment.setInfoToDomObj($comObj);
				$comObj = null;
				
			} else {
				// 댓글 정보 삽입
				var $comObj = $(".dummies:first .comment_ori").clone(true);
				comment.setInfoToDomObj($comObj);
				XewallFunctions.insertComment2Document($comObj, comment.document_srl, "sort");
				$comObj = null;
			}
			
			// 캐시에 정보 업데이트
			$xw.comCache[comment.comment_srl] = comment.last_update;
		},
		
		refreshCommentCallbackFail : function(xhr, textStatux) {
			// 에러 메시지 띄우기
			XewallFunctions.showLogMsg("Ajax Call Error : " + textStatus);
		},
		
		/**
		 * @param[int] document_srl
		 * @param[int] count : 몇 개로 짤라서 불러올 것인가?
		 * @param[int] page : 페이지?
		 * @brief 해당하는 document_srl을 받아서 해당하는 문서의 댓글리스트들을 refresh 시킨다.
		 */
		refreshCommentList: function(document_srl, count, page) {
			// 서버에 댓글 리스트들 정보 요청
			var myCall = new MyMethodCall('xewall', 'getXewallCommentList');
			myCall.addElement('document_srl', document_srl);
			myCall.addElement('count', count);
			myCall.addElement('page', page);
			myCall.callAjax(
					XewallFunctions.refreshCommentListCallbackSuccess,
					XewallFunctions.refreshCommentListCallbackFail,
					false
			);
			myCall = null;
		},
		
		refreshCommentListCallbackSuccess : function(data, textStatus, xhr) {
			// 불러와진 댓글 수가 0이면 취소.
			if ($(data).find("comments").children().length == 0) return false;
			
			// 각각의 코멘트들에 대하여
			var $comments = $(data).find("comments").children();
			var document_srl = 0;
			$comments.each(function() {
				// XewallComment() 클래스를 이용해 처리한다.
				var comment = new XewallComment();
				comment.setCommentObj($(this));
				document_srl = parseInt(comment.document_srl);
				
				var $oriDOM;
				
				if ($xw.comCache[comment.comment_srl]) { // 존재한다면 업데이트만 하기
					// 최신 버전이면 아무 동작 하지 않고 나간다.
					if (comment.last_update == $xw.comCache[comment.comment_srl]) {
						return false;
					}
					// 최신버전이 아니라면 업데이트를 적용할 대상을 지정한다.
					$oriDOM = $("div.xewall .comment_srl_" + comment.comment_srl);
					comment.setInfoToDomObj($oriDOM);
				} else { // 존재하지 않는다면 새로 넣기
					$oriDOM = $(".dummies:first .comment_ori").clone(true);
					$oriDOM.removeClass("comment_ori").addClass("comment");
					comment.setInfoToDomObj($oriDOM);
					XewallFunctions.insertComment2Document($oriDOM, comment.document_srl, "top");
				}
				// cache에 last_update 갱신
				$xw.comCache[comment.comment_srl] = comment.last_update;
			});
			
			// page_navigation 정보갱신하고 더보기 버튼 보이거나 숨긴다.
			XewallFunctions.manipulateMorePage(document_srl, $(data).find("page_navigation"));
			
		},
		
		refreshCommentListCallbackFail : function(xhr, textStatus) {
		},
		
		/**
		 * 문서번호에 속한 댓글 수를 세어서 서버에서 받은 댓글 수와 틀리면 더보기 버튼을 보이도록 한다.
		 * @param[int] document_srl 댓글 수를 카운트 하려는 문서 번호
		 * @param[Object] pageNavigation 서버에서 받은 댓글의 네비게이션
		 */
		manipulateMorePage : function(document_srl, $pageNavigation) {
			// 이 문서에 속한 댓글의 수를 센다.
			var countedComments = $("div.xewall .document_srl_" + document_srl).find(".comment").length;
			var recvComments = parseInt($pageNavigation.find("total_count").text());
			
			// 더보기 버튼에 댓글 네비게이션 정보 기록하도록 한다.
			var $morePage = $("div.xewall .document_srl_" + document_srl).find(".more_page");
			$morePage.attr("total_count", recvComments);
			$morePage.attr("total_page", $pageNavigation.find("total_count").text());
			$morePage.attr("cur_page", $pageNavigation.find("cur_page").text());
			$morePage.attr("page_count", $pageNavigation.find("page_count").text());
			$morePage.attr("first_page", $pageNavigation.find("first_page").text());
			$morePage.attr("last_page", $pageNavigation.find("last_page").text());
			
			var nextPage = parseInt($morePage.attr("next_page"));
			var curPage = parseInt($pageNavigation.find("cur_page").text());
			if (curPage + 1 > nextPage) {
				$morePage.attr("next_page", curPage + 1);
			}
			if (countedComments !== recvComments) { // DOM에서 센 수와 서버에서 받은 수가 다르다면
				$morePage.show();
			} else {
				$morePage.hide();
			}
		},
		
		/**
		 * @param[DOM Object] editorDOM
		 * @param[Object] ref
		 * 
		 * @param[int] ref.upload_target_srl
		 * @param[int] ref.document_srl
		 * @param[int] ref.comment_srl
		 * @param[int] ref.parent_srl
		 * 
		 * @param[String] editor_type : FULL || SIMPLE
		 * @param[String] content : 글을 쓰다가 에디터로 바꿀 경우 글의 내용을 content에 보존해서 넘겨주세요.
		 * @param[CALL_TYPE] call_type : 에디터 부르는 종류 (상수 $xw.CALL_TYPE 참조)
		 * @brief 에디터를 불러와서 해당 HTML DOM 객체에 적용시킨다.
		 * editorDOM 변수는 "editor" 를 class로 가지는 <div> 태그여야 하고 <form> 태그를 내포하고 있어야만 합니다.
		 */
		call_editor: function($editorDOM, ref, editor_type, content, call_type) {
			// editorDOM의 유효성 검사
			if (typeof($editorDOM) == 'undefined') return;
			if ($editorDOM.find('form').length == 0) return;
			if ($editorDOM.attr('class') != 'editor') return;
			
			if (call_type === null) return;
			
			// upload_target_srl == null 이라면 0으로 바꿔준다.
			if (ref.upload_target_srl === null || !ref.upload_target_srl) {
				ref.upload_target_srl = 0;
			}
			
			// 에디터를 불러와서 적용시킨다.
			var myCall = new MyMethodCall();
			myCall.setModule('xewall').setAct('getXewallEditor');
			myCall.addElement('module_srl', xewall.module_srl);
			myCall.addElement('mid', xewall.mid);
			myCall.addElement('upload_target_srl', ref.upload_target_srl);
			myCall.addElement('editor_type', editor_type);
			myCall.addElement('call_type', call_type);
			myCall.addElement('editor_sequence', $editorDOM.children('form:first').attr('editor_sequence'));
			myCall.callAjax(function(data, textStatus, xhr) {
				//  받은 데이터를 HTML 에 적용
				var editor = $(data).find('editor').text();
				
				// <!-- 여기서 --> 찾아서 모조리 지우기
				var textCopy = '';
				var length = editor.length;
				var start = 0;
				var end = 0;
				do {
					end = editor.indexOf('<!--', start);
					textCopy += editor.slice(start, end);
					start = editor.indexOf('-->', end) + 3;
				} while(end > -1);
				//textCopy += '>';
				editor = textCopy;
				
				// 원래 에디터에 내용이 있었다면 내용 제거 TODO
				// document_srl과 comment_srl을 제외한 모든 자식 요소들 제거
				$editorDOM.find('form').children().each(function() {
					var will_remove = true;
					var inputName = $(this).attr('name');
					if (inputName === 'document_srl') will_remove = false;
					else if (inputName === 'comment_srl') will_remove = false;
					else if (inputName === 'content') will_remove = false;
					else if (inputName === 'parent_srl') will_remove = false;
					else will_remove = true;
					if (will_remove)
						$(this).remove();
				});
				
				// editor_sequence 따내기
				var editor_sequence = $(data).find('upload_target_srl').text();
				
				// $editorDOM 의 editor_sequence 초기화
				$editorDOM.find('form').removeAttr('editor_sequence');
				// call_type에 따라 다른 action 취한다.
				switch (call_type) {
				// 새 문서를 만드는 것이라면 document_srl = 새로 할당받은 srl
				case $xw.CALL_TYPE.NEW_DOC:
					$editorDOM.find('input[name="document_srl"]').val(editor_sequence);
					$editorDOM.find('input[name="comment_srl"]').val('0');
					$editorDOM.find('input[name="parent_srl"]').val('0');
					$editorDOM.find('input[name="upload_target_srl"]').val('0');
					break;
				// 문서를 수정하는 경우라면 document_srl = parameter로 받은 srl
				case $xw.CALL_TYPE.MOD_DOC:
					$editorDOM.find('input[name="document_srl"]').val(ref.document_srl);
					$editorDOM.find('input[name="comment_srl"]').val('0');
					$editorDOM.find('input[name="parent_srl"]').val('0');
					$editorDOM.find('input[name="upload_target_srl"]').val('0');
					break;
				// 새 댓글을 다는 경우라면 document_srl = parameter로 받은 srl
				// comment_srl = 새로 할당받은 srl
				case $xw.CALL_TYPE.NEW_COMM:
					$editorDOM.find('input[name="document_srl"]').val(ref.document_srl);
					$editorDOM.find('input[name="comment_srl"]').val(editor_sequence);
					$editorDOM.find('input[name="parent_srl"]').val('0');
					$editorDOM.find('input[name="upload_target_srl"]').val('0');
					break;
				// 댓글을 수정하는 경우라면 document_srl = parameter 로 받은 srl
				// comment_srl = parameter로 받은 srl
				case $xw.CALL_TYPE.MOD_COMM:
					$editorDOM.find('input[name="document_srl"]').val(ref.document_srl);
					$editorDOM.find('input[name="comment_srl"]').val(ref.comment_srl);
					$editorDOM.find('input[name="parent_srl"]').val('0');
					$editorDOM.find('input[name="upload_target_srl"]').val('0');
					break;
				// 새로운 대댓글을 다는 경우라면 document_srl = parameter로 받은 srl
				// comment_srl = 새로 할당받은 srl
				// parent_srl = parameter로 받은 srl
				case $xw.CALL_TYPE.NEW_CCOMM:
					$editorDOM.find('input[name="document_srl"]').val(ref.document_srl);
					$editorDOM.find('input[name="comment_srl"]').val(editor_sequence);
					$editorDOM.find('input[name="parent_srl"]').val(ref.parent_srl);
					$editorDOM.find('input[name="upload_target_srl"]').val('0');
					break;
				// 대댓글을 수정하는 경우라면 document_srl = parameter로 받은 srl
				// comment_srl = parameter 로 받은 srl
				// parent_srl = parameter 로 받은 srl
				case $xw.CALL_TYPE.MOD_CCOMM:
					$editorDOM.find('input[name="document_srl"]').val(ref.document_srl);
					$editorDOM.find('input[name="comment_srl"]').val(ref.comment_srl);
					$editorDOM.find('input[name="parent_srl"]').val(ref.parent_srl);
					$editorDOM.find('input[name="upload_target_srl"]').val('0');
					break;
				default:
					break;
				}
				
				// content 가 존재하면 에디터에 content 추가
				$editorDOM.find('form').find('input[name="content"]').val(content);
				var iframe_contents = $editorDOM.find('iframe:first').contents();
				iframe_contents.find('body:first').html(content);
				
				// 삽입
				$editorDOM.find('form').append(editor);
				
				// 포커스 주기
				editorFocus(ref.upload_target_srl);
			}, function(xhr, textStatus) {
			});
		},
		
		setCategoryListCalledFromDocumentModify : function(module_srl, document_srl, category_srl) {
			// XE에 해당 모듈의 cetegory list를 요청한다.
			var mc = new MyMethodCall('xewall', 'getXewallCategoryList');
			mc.addElement('module_srl', module_srl);
			mc.addElement('document_srl', document_srl);
			mc.addElement('category_srl', category_srl);
			mc.callAjax(
					XewallFunctions.setCategoryListCalledFromDocumentModifyCallbackSuccess,
					XewallFunctions.setCategoryListCalledFromDocumentModifyCallbackFail,
					false
			);
		},
		
		setCategoryListCalledFromDocumentModifyCallbackSuccess : function(data) {
			var $items = $(data).find('category_list').children();
			var category_srl = parseInt($(data).find('category_srl').text());
			var document_srl = parseInt($(data).find('document_srl').text());
			
			// 자식들 다 지우기
			var $category_list = $('.document_srl_' + document_srl).find('.editor:first').find('.category_list');
			$category_list.children().remove();
			
			// 카테고리가 없는 게시판이라면 가리기
			if (!$items.length) {
				$category_list.hide();
				return;
			}
			
			// 카테고리 선택 창을 보인다.
			$category_list.show();
			$items.each(function() {
				var recv_category_srl = parseInt($(this).find('category_srl').text());
				var checked = '';
				if (parseInt(category_srl) == parseInt(recv_category_srl)) {
					checked = ' selected="selected" ';
				}
				var string = '<option value="' + recv_category_srl + '"' + checked + '>' + $(this).find('title').text() + '</option>';
				$category_list.append(string);
			});
		},
		
		setCategoryListCalledFromDocumentModifyCallbackFail : function() {
			
		},
		
		/**
		 * @function setCategoryList
		 * @brief module_srl을 받아서 select -> #board_category 의 내용을 설정한다.
		 * @param module_srl 검색하고자 하는 게시판의 srl
		 * @param document_srl 글 수정에서 부르는 것이라면 수정할 글의 document_srl을 받는다.
		 * @param category_srl 글 수정에서 부르는 것이라면 수정할 글의 category_srl을 받는다.
		 */
		setCategoryList: function(module_srl, document_srl, category_srl) {
			// 글 수정에서 부르는 것이라면
			if (document_srl) {
				XewallFunctions.setCategoryListCalledFromDocumentModify(module_srl, document_srl, category_srl);
				return;
			}
			
			var $board_category = $('#board_category');
			
			// 먼저 자식들 다 지우기
			$board_category.children().remove();
			
			if (!module_srl) {
				$board_category.hide();
				return;
			}
			
			// XE에 해당 모듈의 category list 를 받기 요청하기
			var mc = new MyMethodCall('xewall', 'getXewallCategoryList');
			mc.addElement('module_srl', module_srl);
			mc.callAjax(
					XewallFunctions.setCategoryListCallbackSuccess,
					XewallFunctions.setCategoryListCallbackFail,
					false
			);
		},
		
		setCategoryListCallbackSuccess : function(data) {
			var $items = $(data).find('category_list').children();
			var $category = $('#board_category');
			if (!$items.length) {
				$category.hide();
				$category.children().remove();
				return;
			}
			// 카테고리 선택 창을 보인다.
			$category.show();
			$items.each(function() {
				$category.append('<option value="' + $(this).find('category_srl').text() + '">' + $(this).find('title').text() + '</option>');
			});
		},
		
		setCategoryListCallbackFail : function() {
			
		},
		
		
		/**
		 * @function setHeaderFooterText
		 * @brief module_srl을 받아서 게시판에 header_text 와 footer_text가 존재하는지 받아온다.
		 * 존재하면 머릿말, 꼬릿말 출력시키기
		 */
		setHeaderFooterText: function(module_srl) {
			if (!module_srl) {
				$('div.xewall .module_header_text').fadeOut();
				$('div.xewall .module_footer_text').fadeOut();
				return false;
			}
			
			var mc = new MyMethodCall('xewall', 'getXewallHeaderFooterText');
			mc.addElement('module_srl', module_srl);
			mc.callAjax(XewallFunctions.setHeaderFooterTextCallbackSuccess);
		},
		
		setHeaderFooterTextCallbackSuccess : function(data) {
			var header_text = $(data).find('header_text').text();
			var footer_text = $(data).find('footer_text').text();
			if (!header_text) {
				$('div.xewall .module_header_text').fadeOut();
			} else {
				$('div.xewall .module_header_text').html(header_text).fadeIn();
			}
			if (!footer_text) {
				$('div.xewall .module_footer_text').fadeOut();
			} else {
				$('div.xewall .module_footer_text').html(footer_text).fadeIn();
			}	
		},
		
		showLogMsg: function(message) {
			var $log = $('#xewallLog').clone(true);
			$log.id = '';
			$log.addClass('xewall_new_log');
			
			$log.text(message);
			
			// 위치 잡기
			var xewallWidth = $('div.xewall').width();
			var position = $('div.xewall').offset();
			var top = position.top;
			if ($(window).scrollTop() > position.top)
				top = $(window).scrollTop() + 10;
			$log.css('top', top).css('left', xewallWidth - 300 + position.left);
			
			// 문서에 삽입
			$log.show('highlight', null, 500, null);
			$('body').append($log);
			
			// 5초 뒤 사라지게 만들기
			window.setTimeout(function() {
				$log.hide('pulsate', null, 500, function() {
					$(this).remove();
				});
			}, 5000);
		},
		
		/**
		 * @function insertComment2Document
		 * @brief 해당 문서에 댓글을 삽입한다.
		 * @param opt: Object
		 * opt === "top" : 문서에 prepend() 시킨다.
		 * opt === "bottom" : 문서에 append() 시킨다.
		 * opt === "sort" || opt === "null" : 원래 정렬 정책대로 정렬한다.
		 * target_comment_srl : 존재하면 해당댓글의 상단, 또는 하단에 댓글을 삽입한다.
		 */
		insertComment2Document: function($domObj, document_srl, opt, target_comment_srl) {
			// 하단에 삽입
			if (opt === "bottom") {
				if (target_comment_srl === undefined) {
					$(".document_srl_" + document_srl + ":first").find(".comment_box").append($domObj);
				}
				else {
					$(".comment_srl_" + target_comment_srl + ":first").after($domObj);
				}
			}
			// 상단에 삽입
			else if (opt === "top") {
				if (target_comment_srl === undefined) {
					$(".document_srl_" + document_srl + ":first").find(".comment_box").prepend($domObj);
				} else {
					$(".comment_srl_" + target_comment_srl + ":first").before($domObj);
				}
			}
			
			// 정렬하여 삽입
			else {
				$xw.functions.insertComment2DocumentWithSort($domObj, document_srl, opt);
			}
		},
		
		insertComment2DocumentWithSort : function($domObj, document_srl, opt) {
			if (!opt || opt === 'sort') {
				sortBy = xewall.sortBy + '';
			}
			var inserted = false;
			var comparee = $domObj.attr(sortBy);
			var parent_srl = $domObj.attr('parent_srl');
			if (parent_srl == 0) {
				var $stack = $('.document_srl_' + document_srl + ':first').find('.comment_box');
				$stack.children().each(function() {
					var comparer = $(this).attr(sortBy);
					if (comparee < comparer) {
						$(this).before($domObj);
						inserted = true;
						return false;
					}
				});
				if (!inserted) {
					$stack.append($domObj);
				}
			}
			else {
				var $stack = $('.comment_srl_' + parent_srl);
				if (!$stack.length) {
					return;
				}
				var inserted = false;
				var parent_depth = $stack.attr('depth');
				var $last_compared = $stack;
				var $next = $stack.next('.comment');
				while ($next.length) {
					$last_compared = $next;
					var next_depth = $next.attr('depth');
					if (parent_depth >= next_depth || next_depth == 0) {
						$next.before($domObj);
						inserted = true;
						break;
					}
					$next = $next.next('.comment');
				}
				if (!inserted) {
					$last_compared.after($domObj);
				}
			}
		},
		
		/**
		 * @param $docObj 삽입하려는 DOM객체
		 * @param sortBy 정렬 기준. regdate(기본), document_srl, last_update
		 */
		insertDocument2DOMWithSort : function($docObj, sortBy) {
			if (!sortBy || sortBy === 'sort') {
				sortBy = xewall.sortBy + "";
			}
			var $stack = $(".xewall").children(".list:first");
			if (!$stack.children().length) { // list가 비어있으면 그냥 삽입
				$stack.prepend($docObj);
				return true;
			}
			var inserted = false;
			var comparee = $docObj.attr(sortBy);
			$stack.children().each(function() {
				var comparer = $(this).attr(sortBy);
				if (comparee > comparer) {
					$(this).before($docObj);
					inserted = true;
					return false;
				}
			});
			
			if (!inserted) {
				$stack.append($docObj);
			}
		},
		
		/**
		 * @function insertDocument2DOM
		 * @brief 문서를 삽입한다.
		 * @param [DOMObject] $docObj : 삽입한 HTML DOM 객체
		 * @param [Object] opt : 옵션
		 * opt == 'top' : 최상단에 추가 (prepend)
		 * opt == 'bottom' : 최하단에 추가 (append)
		 * opt == 'sort' : 정렬하여 삽입
		 */
		insertDocument2DOM: function($docObj, opt) {
			// 정렬하여 삽입 TODO 문제 개선 // document_srl로 정렬하여 삽입하는데 정렬은 관리자가 설정가능하다.
			if (!opt || opt == 'sort') {
				XewallFunctions.insertDocument2DOMWithSort($docObj);
			}
			
			// 하단에 삽입
			else if (opt == 'bottom') {
				$('.xewall').children('.list:first').append($docObj);
			}
			
			//상단에 삽입
			else if (opt == 'top') {
				$('.xewall').children('.list:first').prepend($docObj);
			}
		},
		
		/**
		 * 문서의 content 불러오기
		 */
		getTitleAndContentOfDocument : function(document_srl) {
			var myCall = new MyMethodCall('xewall', 'getXewallDocumentContent');
			var result = new ResultGetTitleAndContentOfDocument();
			myCall.addElement('document_srl', document_srl);
			myCall.callAjax(
					function(data, textStatus, xhr) {
						result.title = $(data).find('title').text();
						result.content = $(data).find('content').text();
						result.categorySrl = parseInt($(data).find('category_srl').text());
					},
					function(xhr, textStatus) {},
					true);
			return result;
		},
		
		/**
		 * PHP의 getObjectVars와 같다. Object를 받아서 Array로 돌려줌
		 */
		getObjectVars : function($object) {
			var result = new Array();
			for (var i in $object) {
				if (typeof($object[i]) !== 'function' && i !== 'prototype')
					result[i] = $object[i];
			}
			for (var i in $object.prototype) {
				if (typeof($object.prototype[i]) !== 'function')
					result[i] = $object.prototype[i];
			}
			return result;
		},
		
		/**
		 * 에디터 초기화
		 */
		initializeEditor : function($editorDOM) {
			var $form = $editorDOM.find('form:first');
			$form.removeAttr('editor_sequence');
			$form.children('input[type="hidden"]').val('');
			$form.children('.xpress-editor').remove();
		}
	};
});