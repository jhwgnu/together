/**
 * 이벤트 핸들러들을 모두 여기에다가 모아둔다.
 */
var XewallEventHandler;

jQuery(function($) {
	XewallEventHandler = {
		/**
		 * 타이틀에 마우스 오른쪽을 클릭했으면 내가 정의한 메뉴 불러오기
		 */
		onTitleRightClick: function(event) {
			
			// 어떤 문서인지 확인
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			// 팝업메뉴 띄우기
			// #popup_menu_area 를 body에 추가시키기
			$('#popup_menu_area').remove();
			$('body').append("<div id='popup_menu_area' style='display:none;z-index:999;'></div>");
			
			// dummy 얻어서 적절한 document_srl 정보를 기록한다.
			var $popDummy = $('.dummies:first .move_to').clone(true);
			$popDummy.find('.move_to').attr('document_srl', document_srl);
			$popDummy.find('.move_new').attr('document_srl', document_srl);
			
			// popup을 띄운다.
			var params = new Array();
			var ret_obj = new Array();
			ret_obj['menus'] = null;
			params['menu_id'] = 'xewall';
			params['page_x'] = event.pageX;
			params['page_y'] = event.pageY;
			XE.loaded_popup_menus['xewall'] = $popDummy.html();
			XE.displayPopupMenu(ret_obj, null, params);
			
			// 이벤트 추가
			$('#popup_menu_area .move_to').unbind('click');
			$('#popup_menu_area .move_to').click(function() {
				// 이동하기
				window.location = xewall.def_url + 'index.php?document_srl=' + document_srl;
			});
			$('#popup_menu_area .move_new').unbind('click');
			$('#popup_menu_area .move_new').click(function() {
				// 새 창으로 이동하기
				window.open(xewall.def_url + 'index.php?document_srl=' + document_srl, "_blank");
			});
			return false;
			
		},
		
		
		/**
		 * 요약을 클릭했을 때 문서 내용을 불러온다.
		 */
		onSummaryClick: function(event) {
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			// 마우스 가운데 버튼이 눌러졌다면 해당 문서 페이지로 바로 이동
			if ((event.which == 2 || event.shiftKey || event.ctrlKey || event.metaKey) && $(this).hasClass('title')) {
				// 새 창 이동하기
				window.open(xewall.def_url + 'index.php?document_srl=' + document_srl, "_blank");
				return false;
			}
			
			// content가 열려있으면 숨기기. (툴팁 내용도 바꾸기)
			if ($(this).parent().parent().find('.content').css('display') != 'none') {
				$(this).parent().parent().find('.summary').show('clip', {}, 500, null);
				$(this).parent().parent().find('.thumbnail').show('clip', {}, 500, null);
				$(this).parent().parent().find('.content').hide('clip', {}, 500, null);
				$(this).parent().parent().find('.see_simple').hide();
				
				// 스크롤 자동으로 이동시키기
				var position = $(this).parent().parent().find('.title').offset()
				$('html, body').animate({scrollTop:position.top - 100}, 400);
				return;
			}
			
			// 문서 불러오고
			$xw.functions.refreshDocument(document_srl, true);
			
			// 요약 가리고 내용 보이고 툴팁 바꾸기
			var $content = $(this).parent().parent().find('.content:first');
			var $see_simple = $(this).parent().parent().find('.see_simple');
			$(this).parent().parent().find('.summary').hide('clip', {}, 200, function() {
				$content.show('slide', {}, 500, function() {
					$see_simple.fadeIn();
					
					// 문서 내의 이미지를 본문의 크기에 맞게 리사이징 하기.
					var contentWidth = $content.width();
					$content.find('img').each(function() {
						var imgWidth = $(this).width();
						var imgHeight = $(this).height();
						if (imgWidth > contentWidth) {
							$(this).width(contentWidth);
							$(this).height(parseInt(imgHeight * contentWidth / imgWidth));
						}
					});
				});
			});
			$(this).parent().parent().find('.thumbnail').hide('clip', {}, 200, null);
		},
		
		/**
		 * 스크롤을 했을 때 일어나는 이벤트
		 * 페이지의 마지막 부분까지 도달하면 다음 페이지를 불러온다.
		 */
		onScroll: function(event) {
			// 페이지의 마지막으로 스크롤 되면.
			if ($(window).scrollTop() + 10 >= $(document).height() - $(window).height()){
				// 중복으로 로딩이 되지 않도록 이벤트 언바인드 시키기
				$(window).unbind("scroll");
				$("div.xewall .loading").show();
				$xw.functions.refreshDocumentList($xw.default_listen, ++$xw.page, xewall.list_count_doc);
			} else {
				return false;
			}
		},
		
		/**
		 * 간단히 글쓰기를 클릭했거나 최초 txt_area를 클릭했을 때
		 * txt_area가 존재하면 제거하고 editor_simple이 존재하면 제거하고
		 * editor_full 을 불러와서 삽입한다.
		 * 클래스 적용시키기
		 */
		onSimpleFormFocus: function(event) {
			var $editorDOM = $(this).parent().parent();
			var editor_type = 'SIMPLE';
			var content = $editorDOM.children('form:first').children('input[name="content"]').val();
			
			var document_srl = parseInt($editorDOM.find('input[name="document_srl"]').val());
			if (!document_srl || !isNaN(document_srl)) document_srl = 0;
			
			// 에디터 불러와서 출력하기
			// 새 글 쓰기: upload_target_srl, document_srl, comment_srl, parent_srl = 0
			var ref = {
					upload_target_srl:document_srl,
					document_srl:document_srl,
					comment_srl:0,
					parent_srl:0
			};
			$xw.functions.call_editor($editorDOM, ref, editor_type, content, $xw.CALL_TYPE.NEW_DOC);
			
			// 숨어있던 버튼들 보이기
			$editorDOM.siblings('.hidden_by_editor').show('slide', {direction:'up'}, 500);
			$editorDOM.siblings('.hidden_by_editor').find('.simple_form').removeClass('unselected').addClass('selected');
			$editorDOM.siblings('.hidden_by_editor').find('.use_editor').removeClass('selected').addClass('unselected');
			
			// 선택된 게시판의 카테고리 추가시킨다.
			var module_srl = $('#default_listen_array:selected').val();
			if (!module_srl) module_srl = $('#default_listen_array:first').val();
			
			// 카테고리 정보를 얻어서 출력
			$xw.functions.setCategoryList(module_srl);
			
		},
		
		
		/**
		 * 게시판이 선택이 될 때마다 해당 게시판의 category들을 로드해 와서 출력시킨다.
		 */
		onDefaultListenChange: function() {
			var module_srl = $(this).val();
			
			$('#board_category').children().remove();
			$('#board_category').hide();
			
			// 카테고리 정보를 얻어서 출력
			$xw.functions.setCategoryList(module_srl);
		},
		
		/**
		 * 에디터 사용하기를 클릭했을 때
		 * editor_full이 존재하면 제거하고
		 * editor_simple을 불러와서 삽입한다.
		 * 클래스 적용시키기
		 */
		onEditorClick: function(event) {
			// 클래스 적용시키기
			$(this).removeClass('unselected').addClass('selected');
			$(this).siblings('.simple_form').removeClass('selected').addClass('unselected');
			
			// 에디터 불러와서 적용
			var $editorDOM = $(this).parent().siblings('.editor:first');
			var editor_type = 'FULL';
			
			/*
			var $content = $editorDOM.find('iframe:first').contents();
			var content = $content.find('body:first').html();
			*/
			var editorSeq = $editorDOM.children('form:first').attr('editor_sequence');
			var content = editorGetContent(editorSeq);
			
			var document_srl = parseInt($editorDOM.find('input[name="document_srl"]').val());
			if (!document_srl) document_srl = 0;
			
			// 새 글 쓰기: document_srl, upload_target_srl, comment_srl, parent_srl = 0
			var ref = {
					upload_target_srl:document_srl,
					document_srl:document_srl,
					comment_srl:0,
					parent_srl:0
			};
			$xw.functions.call_editor($editorDOM, ref, editor_type, content, $xw.CALL_TYPE.NEW_DOC);
		},
		
		/**
		 * 간단히 글쓰기를 클릭했을 때
		 * 간단한 에디터를 불러와서 적용시킨다.
		 */
		onSimpleFormClick: function(event) {
			// 클래스 적용시키기
			$(this).removeClass('unselected').addClass('selected');
			$(this).siblings('.use_editor').removeClass('selected').addClass('unselected');
			
			// 에디터 불러와서 적용
			var $editorDOM = $(this).parent().siblings('.editor');
			var editor_type = 'SIMPLE';
			var $content = $editorDOM.find('iframe:first').contents();
			var content = $content.find('body:first').html();
			
			var document_srl = parseInt($editorDOM.find('input[name="document_srl"]').val());
			if (!document_srl) document_srl = 0;
			
			// 새 글 쓰기: upload_target_srl, document_srl, comment_srl, parent_srl = 0
			var ref = {
					upload_target_srl:document_srl,
					document_srl:document_srl,
					comment_srl:0,
					parent_srl:0
			};
			$xw.functions.call_editor($editorDOM, ref, editor_type, content, $xw.CALL_TYPE.NEW_DOC);
			
		},
		
		/**
		 * 게시 버튼을 클릭했을 때
		 */
		onSubmitClick: function(event) {
			// module_srl 이 없으면 취소
			var module_srl = $('div.xewall div.write_form select.default_listen_array').val();
			if (!module_srl) return;
			
			// title 얻기
			var title = $('div.xewall div.write_form input.doc_title').val();
			
			// Content 얻기
			var editorSeq = parseInt($(this).siblings('.editor').children('form:first').attr('editor_sequence'));
			var content = window.editorGetContent(editorSeq);
			
			// title 과 content 둘 다 없으면 글쓰기 취소로 알고 창 닫기
			if (!title && !content) {
				// 에디터 박스 지우기, 원래의 텍스트 박스 보이기
				$('div.xewall .write_form .editor form').children().each(function() {
					var will_remove = true;
					var inputName = $(this).attr('name');
					if (inputName == 'document_srl') will_remove = false;
					else if (inputName == 'comment_srl') will_remove = false;
					else if (inputName == 'content') will_remove = false;
					else if ($(this).attr('class') == 'txt_area') will_remove = false;
					else will_remove = true;
					if (will_remove) {
						// 에니메이션 효과와 같이 지우기
						var $that  = $(this);
						$(this).hide('slide', {direction:'up'}, 500, function() {
							$that.remove();
						});
					}
				});
				// 에디터 폼의 document_srl 과 comment_srl 등 모두 초기화
				var $editor_form = $('div.xewall .write_form .editor form');
				$editor_form.children('input[name="document_srl"]').val('');
				$editor_form.children('input[name="comment_srl"]').val('');
				$editor_form.children('input[name="content"]').val('');
				
				// content 값을 빈 값으로 만들어 주기
				$('div.xewall .write_form .hidden_by_editor').hide();
				$('div.xewall .write_form .hidden_by_editor .doc_title').val('');
				var txt_area = $('div.xewall .write_form .txt_area').clone(true);
				txt_area.css('display', 'block');
				$('div.xewall .write_form .editor form').append(txt_area);
				
				txt_area = null;
			}
			
			// title이 없으면 취소
			if (!title) {
				$('div.xewall div.write_form input.doc_title').focus();
				return;
			}
			
			// Content 얻은게 없으면 취소
			if (!content) {
				return;
			}
			
			// 게시 버튼 비활성화
			$(this).unbind('click');
			
			// 기다려 주세요... 로 변경
			$(this).text(xewall_lang.please_wait);
			
			// CSS를 기다림으로 변경
			$(this).removeClass('btn_submit_enabled');
			$(this).addClass('btn_submit_disabled');
			
			var category_srl = $('#board_category').val();
			var document_srl = $(this).siblings('.editor:first').children('form:first').attr('editor_sequence');
			
			$('div.xewall .loading').show();
			var $that = $(this);
			
			var myCall = new MyMethodCall('xewall', 'procXewallInsertDocument');
			myCall.addElement('xe_mid', xewall.mid);
			myCall.addElement('module_srl', module_srl);
			myCall.addElement('title', title);
			myCall.addCDATAElement('content', content);
			myCall.addElement('document_srl', document_srl);
			myCall.addElement('category_srl', category_srl);
			
			myCall.callAjax(function(data){
				// 에러 (게시판에 권한이 없거나 등등...) 라면 취소
				if (parseInt($(data).find('error').text())) {
					alert($(data).find('message').text());
					return;
				}
				// 에디터 박스 지우기, 원래의 텍스트 박스 보이기
				$('div.xewall .write_form .editor form').children().each(function() {
					var will_remove = true;
					var inputName = $(this).attr('name');
					if (inputName == 'document_srl') will_remove = false;
					else if (inputName == 'comment_srl') will_remove = false;
					else if (inputName == 'content') will_remove = false;
					else if ($(this).attr('class') == 'txt_area') will_remove = false;
					else will_remove = true;
					if (will_remove) {
						// 에니메이션 효과와 같이 지우기
						var $that  = $(this);
						$(this).hide('slide', {direction:'up'}, 500, function() {
							$that.remove();
						});
					}
				});
				// 에디터 폼의 document_srl 과 comment_srl 등 모두 초기화
				var $editor_form = $('div.xewall .write_form .editor form');
				$editor_form.attr('editor_sequence', null);
				$editor_form.children('input[name="document_srl"]').val('');
				$editor_form.children('input[name="comment_srl"]').val('');
				$editor_form.children('input[name="content"]').val('');
				
				
				// content 값을 빈 값으로 만들어 주기
				$('div.xewall .write_form .hidden_by_editor').hide();
				$('div.xewall .write_form .hidden_by_editor .doc_title').val('');
				var txt_area = $('div.xewall .write_form .txt_area').clone(true);
				txt_area.css('display', 'block');
				$('div.xewall .write_form .editor form').append(txt_area);
				
				txt_area = null;
				
				$('div.xewall .loading').hide();
				
				// 게시 버튼 활성화
				$that.bind('click', XewallEventHandler.onSubmitClick);
				
				// "게시" 로 변경
				$that.text(xewall_lang.write);
				
				// CSS를 기다림으로 변경
				$that.removeClass('btn_submit_disabled');
				$that.addClass('btn_submit_enabled');
				
				// 새로고침
				$xw.functions.refreshDocumentList($xw.default_listen, 1, xewall.list_count_doc);
				
			}, function(a, b, c){
				$('div.xewall .loading').hide();
				
				// 게시 버튼 활성화
				$that.bind('click', XewallEventHandler.onSubmitClick);
				
				// "게시" 로 변경
				$that.text(xewall_lang.write);
				
				// CSS를 기다림으로 변경
				$that.removeClass('btn_submit_disabled');
				$that.addClass('btn_submit_enabled');
				
			}, true);
			myCall = null;
		},
		
		/**
		 * 추천 클릭했을 경우
		 * 만약에 내가 이 게시물에 추천을 했으면 추천 취소기능까지 구현하도록
		 */
		onVoteClick: function(event) {
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			var myCall = new MyMethodCall();
			myCall.setModule('xewall').setAct('procXewallDocumentVoteUp').addElement('target_srl', document_srl);
			myCall.callAjax(function(data){
				// 반환된 데이터를 DOM과 Array에 업데이트 시킨다.
				$xw.functions.refreshDocument(document_srl, false);
			}, function(){
				alert('failed!');
			}, true);
		},
		
		/**
		 * 비추천을 클릭했을 경우
		 * 만약에 내가 이 게시물에 비추천을 했으면 비추천 취소기능까지 구현하도록 한다.
		 */
		onBlameClick: function(event) {
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			var that = $(this);
			var myCall = new MyMethodCall();
			myCall.setModule('xewall').setAct('procXewallDocumentVoteDown').addElement('target_srl', document_srl);
			myCall.callAjax(function(data){
				// 반환된 데이터를 DOM과 Array에 업데이트 시킨다.
				$xw.functions.refreshDocument(document_srl, false);
			}, function(){
				alert('failed!');
			}, true);
		},
		
		
		/**
		 * "삭제" 를 눌렀을 때 - "삭제하시겠습니까?" 보이기
		 */
		onDeleteClick: function(event) {
			// #popup_menu_area 를 body에 추가시키기
			$('#popup_menu_area').remove();
			$('body').append("<div id='popup_menu_area' style='display:none;z-index:999;'></div>");
			
			// document_srl 얻기
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			
			// dummy 얻어서 적절한 document_srl 정보를 기록한다.
			var $popDummy = $('.dummies:first .delete_confirm').clone(true);
			$popDummy.find('.delete_confirm_yes').attr('document_srl', document_srl);
			
			// popup을 띄운다.
			var params = new Array();
			var ret_obj = new Array();
			ret_obj['menus'] = null;
			params['menu_id'] = 'xewall';
			params['page_x'] = event.pageX;
			params['page_y'] = event.pageY;
			XE.loaded_popup_menus['xewall'] = $popDummy.html();
			XE.displayPopupMenu(ret_obj, null, params);
			// 이벤트 추가 => 진짜로 삭제 누르면 서버에 삭제 요청을 보낼 수 있도록 이벤트 추가시킨다.
			$('#popup_menu_area .delete_confirm_yes').unbind('click');
			$('#popup_menu_area .delete_confirm_yes').click(XewallEventHandler.onDeleteConfirmYesClick);
			return false;
		},
		
		
		/**
		 * "삭제하시겠습니까?" 에서 "예"를 클릭했을 때 삭제 실행
		 */
		onDeleteConfirmYesClick: function() {
			var document_srl = $(this).attr('document_srl');
			
			var myCall = new MyMethodCall('xewall', 'procXewallDeleteDocument');
			myCall.addElement('document_srl', document_srl);
			myCall.callAjax(function(data, textStatus, xhr) {
				// 실패시 취소
				if (parseInt($(data).find('error'))) return;
				// 성공시 documentList에서 문서 제거, 그리고 HTML 요소 제거
				documentList[document_srl] = null;
				
				// 사라지는 효과 적용
				$('.document_srl_' + document_srl).hide('slide', {direction:'up'}, 1000, function() {
					$('.document_srl_' + document_srl).remove();
				})					
			}, function(xhr, textStatus) {
				
			}, false);
		},
		
		
		/**
		 * "수정" 버튼을 눌렀을 때 - content 가리고
		 * modify_form을 보여준 다음 여기에 에디터 불러와서 수정 내용 넣기
		 * 그리고 화면 자동으로 스크롤 해주기
		 */
		onModifyClick: function(event) {
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			var module_srl = $xw.comFunc.getModuleSrlOfDocument($(this));
			var $modify_form = $('div.xewall .document_srl_' + document_srl + ' .right .middle .modify_form');
			if (!document_srl || !module_srl) return;
			var titleAndContent = $xw.functions.getTitleAndContentOfDocument(document_srl); // 수정 전의 content 불러오기
			// 해당 문서들이 어느 게시판에 속해 있는지 확인.
			$modify_form.find('.board_list').children().each(function() {
				if ($(this).val() == module_srl) {
					$(this).attr('selected', 'selected');
				} else {
					$(this).removeAttr('selected');
				}
			});
			// 게시판에 카테고리가 있다면 카테고리들을 출력시킨다.
			$xw.functions.setCategoryList(module_srl, document_srl, titleAndContent.categorySrl);
			// 에디터 불러와서 출력
			var $editorDOM = $modify_form.find('.editor:first');
			var editor_type = 'FULL';
			// 문서 수정: document_srl, upload_target_srl 필요 (document_srl = upload_target_srl)
			var ref = {
					document_srl: document_srl,
					upload_target_srl: document_srl,
					comment_srl: 0,
					parent_srl:0
			};
			$xw.functions.call_editor($editorDOM, ref, editor_type, titleAndContent.content, $xw.CALL_TYPE.MOD_COMM);
			$modify_form.fadeIn();
			// content, summary, thumbnail 가리기
			$modify_form.siblings('.thumbnail').hide();
			$modify_form.siblings('.summary').hide();
			$modify_form.siblings('.content').hide();
			$modify_form.siblings('.clear').hide();
			
			// title의 내용을 옮겨 적기
			$modify_form.parent().siblings('.title').hide();
			$modify_form.find('.modify_title').val(titleAndContent.title);
			
			
			// 스크롤 자동으로 이동시키기
			var position = $('.document_srl_' + document_srl).offset();
			$('html, body').animate({scrollTop:position.top - 10}, 400);
			return;
		},
		
		
		/**
		 * 글 수정시 게시판 선택을 해서 게시판을 변경했을 때 게시판의 카테고리를 출력시키도록 한다.
		 */
		onModifyBoardChange: function() {
			var module_srl = $(this).val();
			var document_srl = $(this).parents('.document:first').attr('document_srl');
			$xw.functions.setCategoryList(module_srl, document_srl, 0);
		},
		
		
		/**
		 * 진짜 "수정" (go_modify)를 눌렀을 때 실제로 수정하기
		 */
		onGoModifyClick: function() {
			// content 얻기
			var editor_seq = $(this).siblings('form').attr('editor_sequence');
			var content = window.editorGetContent(editor_seq);
			
			// 얻어진 content가 없으면 취소
			if (!content) return;
			
			var title = $(this).siblings('.modify_title').val();
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			
			// module_srl 과 category_srl은 선택된 녀석을 불러온다.
			var module_srl = $(this).siblings('.board_list:first').val();
			var category_srl = $(this).siblings('.category_list:first').val();
			
			// 서버에 변경된 내용 보내기
			var myCall = new MyMethodCall('xewall', 'procXewallInsertDocument');
			myCall.addElement('xe_mid', xewall.mid);
			myCall.addElement('category_srl', category_srl);
			myCall.addElement('document_srl', document_srl).addElement('module_srl', module_srl).addCDATAElement('content', content).addElement('title', title);
			myCall.callAjax(function(data, textStatus, xhr) {
				// 그냥 해당 문서 정보 업데이트 시킨다.
				$xw.functions.refreshDocument(document_srl, true);
			}, function(xhr, textStatus) {
				
			}, false);
			
			// 필요한 엘리먼트들을 보이고 가리고...
			var $docObj = $('.document_srl_' + document_srl);
			$docObj.find('.thumbnail').show();
			$docObj.find('.summary').show();
			$docObj.find('.content').hide();
			$docObj.find('.see_simple').hide();
			$docObj.find('.title').show();
			$docObj.find('.clear').show();
			$docObj.find('.modify_form').hide('slide', {direction:'up'}, 300);
			
			// 스크롤
			var position = $('.document_srl_' + document_srl).offset();
			$('html, body').animate({scrollTop:position.top - 100}, 400);
			
			$(this).parent().removeAttr('editor_sequence');
			$(this).siblings('input[name="document_srl"]').val('');
			$(this).siblings('input[name="content"]').val('');
			$(this).siblings('.editor').children().remove();
		},
		
		
		/**
		 * 수정 "취소" 버튼을 눌렀을 때 에디터 없애고 summary, thumbnail등 보이기
		 */
		onCancelModifyClick: function() {
			// 확인창 띄우기
			if (!confirm(xewall_lang.confirm_cancel)) return;
			
			$(this).parent().parent().siblings('.thumbnail').show();
			$(this).parent().parent().siblings('.summary').show();
			$(this).parent().parent().siblings('.content').hide();
			$(this).parent().parent().siblings('.see_simple').hide();
			$(this).parent().parent().parent().siblings('.title').show();
			$(this).parent().parent().siblings('.clear').show();
			
			// 애니메이션 효과 주기
			$(this).parent().parent().hide('slide', {direction:'up'}, 300);
			
			// 스크롤 자동으로 이동시키기
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			var position = $('.document_srl_' + document_srl).offset();
			$('html, body').animate({scrollTop:position.top - 100}, 400);
			return;
		},
		
		
		/**
		 * 댓글 버튼을 눌렀을 때 댓글들의 리스트들을 불러와서 보이든지 가리든지 토글시킨다
		 */
		onToggleCommentClick: function(event) {
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			
			// 댓글 창이 토글링 된다.
			var $comment_box = $(".document_srl_" + document_srl).find(".comment_box");
			if ($xw.comFunc.isCommentBoxNotVisible(document_srl)) { // 보이는 상태라면 숨기기
				$xw.functions.refreshCommentList(document_srl, 10, 1);
				$xw.comFunc.showCommentBox(document_srl);
				var total_comment_cnt = $comment_box.find(".comment").length;
				var real_total = parseInt($comment_box.prev().attr("total_count"));
				if (total_comment_cnt < real_total) // 댓글이 너무 많아 잘려서 나오면 morePage 보이기
					$xw.comFunc.showMorePage(document_srl);
			} else { // 댓글 새로고침
				$xw.comFunc.hideCommentBox(document_srl);
				$xw.comFunc.hideMorePage(document_srl);
			}
			return;
		},
		
		
		/**
		 * 댓글 더 불러오기를 클릭했을 때 이전 페이지의 댓글들을 불러온다.
		 */
		onMorePageClick: function() {
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			var count = 10; // FIXME
			var page = $(this).attr("next_page");
			$xw.functions.refreshCommentList(document_srl, count, page);
		},
		
		
		/**
		 * 댓글의 summary를 클릭하면 댓글의 content를 불러오고 summary를 가린다.
		 */
		onCommContentClick: function() {
			var comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
			var document_srl = $xw.comFunc.getDocumentSrlOfComment($(this));
			
			var myCall = new MyMethodCall('xewall', 'getXewallComment');
			myCall.addElement('comment_srl', comment_srl).addElement('include_content', true);
			myCall.addElement('include_content', true);
			myCall.callAjax(function(data, textStatus, xhr) {
				// 새로운 객체를 생성해서 댓글 업데이트
				var commObj = new XewallComment();
				commObj.setCommentObj($(data).find('comment'));
				
				// 캐시에 저장
				$xw.comCache[commObj.comment_srl] = commObj.last_update;
				
				// HTML DOM 에 내역 반영
				var $commentDOM = $('.comment_srl_' + comment_srl);
				commObj.setInfoToDomObj($commentDOM);
				
				// summary 가리고 content 보이기
				// 에니메이션 효과 적용
				var $comm = $('.comment_srl_' + comment_srl);
				var $summary = $comm.find('.comm_summary');
				var $content = $comm.find('.comm_content');
				var $see_summary = $comm.find('.comm_see_summary');
				
				$summary.hide('slide', {direction:'up'}, 500, function() {
					$content.show('slide', {direction:'down'}, 500, null);
					$see_summary.show('slide', {direction:'down'}, 500, null);
				});
				
			}, function(xhr, textStatus) {
				
			});
		},
		
		/**
		 * 댓글 내용 자세히 보기 했을 때 "간단히 보기"를 클릭했을 경우 내용을 가리고 요약과 "더 보기"을 보여준다.
		 */
		onCommSeeSummaryClick: function() {
			var $see_simple = $(this);
			var $content = $(this).siblings('.comm_content');
			var $summary = $(this).siblings('.comm_summary');
			
			$see_simple.hide();
			$content.hide('slide', {direction:'up'}, 500, function() {
				$summary.show('slide', {direction:'down'}, 500);
			});	
		},
		
		/**
		 * 댓글 쓰기(전송)을 눌렀을 때 댓글의 내용을 서버로 전송시키고 댓글이 숨겨져 있으면 불러오기
		 */
		onCommentSubmitClick: function() {
			// 게시버튼 비활성화
			$(this).unbind('click');
			var $that = $(this);
			var content = null;
			var document_srl = $xw.comFunc.getDocumentSrlOfDocument($(this));
			var module_srl = $xw.comFunc.getModuleSrlOfDocument($(this));
			var comment_srl = 0;
			
			// 먼저 .class_write 텍스트 박스가 활성화 되어있는지 확인해서 텍스트 박스에서 데이터를 들고오느냐, 에디터에서 들고오느냐 결정
			if ($(this).siblings('.editor').find('.comment_write').length) {
				// 텍스트박스에서 불러오기
				content = $(this).siblings('.editor:first').find('.comment_write').val();
				var tmp = content.split('\n');
				content = tmp.join('<br/>');
				
				// 원래 텍스트 박스 안에 있던 내용 지우기
				$(this).siblings('.editor:first').find('.comment_write').val('');
			} else {
				// 에디터에서 불러오기
				var editorSeq = $(this).siblings('.editor').children('form:first').attr('editor_sequence');
				content = editorGetContent(editorSeq);
				comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
//				comment_srl = $(this).siblings('.editor:first').find('input[name="comment_srl"]:first').val();
			}
			console.log(comment_srl);
			var $comment_write = $(this).siblings('.editor:first').children('form:first').children('input.comment_write');
			// 만약 보내는 데이터가 없으면 텍스트 박스에 포커스를 주고 취소시켜서 서버와 통신 취소
			if (!content.length) {
				
				$(this).bind('click', XewallEventHandler.onCommentSubmitClick);
				return false;
			}
			// 댓글 내용을 서버에 전송한다.
			var myCall = new MyMethodCall('xewall', 'procXewallInsertComment');
			myCall.addElement('xe_mid', xewall.mid);
			myCall.addElement('is_new', 'true');
			myCall.addElement('comment_srl', comment_srl);
			myCall.addElement('document_srl', document_srl);
			myCall.addElement('module_srl', module_srl);
			myCall.addCDATAElement('content', content);
			myCall.callAjax(function(data) {
				// 이벤트 재활성화
				$that.bind('click', XewallEventHandler.onCommentSubmitClick);
				
				// 에러일 경우 취소
				var error = parseInt($(data).find('error:first').text());
				var message = $(data).find('message:first').text();
				if (error) {
					// 메시지 창 띄우기
					$xw.functions.showLogMsg(message);
					return;
				}
				// 댓글 창이 가려져 있으면 보이기
				if ($xw.comFunc.isCommentBoxNotVisible(document_srl)) {
					$xw.functions.refreshCommentList(document_srl, 10, 1);
					$xw.comFunc.showCommentBox(document_srl, true);
					return;
				}
				// 새로 삽입된 댓글 문서에 추가하기 (밑에서 refresh 동작하니까 상관없을듯? 확인하기 TODO)
				var comment = new XewallComment();
				comment.setCommentObj($(data).find('comment:first'));
				var $newComDOM = $('.dummies:first').children('.comment_ori').clone(true);
				comment.setInfoToDomObj($newComDOM);
				// sorting 하면서 삽입하기
				$xw.functions.insertComment2Document($newComDOM, document_srl, 'sort');
			}, function(xhr, textStatus) {
				// 메시지 창 띄우기
				$xw.functions.showLogMsg('Ajax Call Error' + textStatus);
				
				// 이벤트 재활성화
				$that.bind('click', XewallEventHandler.onCommentSubmitClick);
				
			}, false);
			
			// 댓글 창 원위치
			$(this).siblings('.editor').find('.comment_write').val($(this).siblings('.comment_write').attr('default_value'));
			
			// "에디터 사용" 버튼 다시 활성화
			$(this).siblings('.comment_use_editor').show();
			
			// 그리고 에디터 창 닫기 (에니매이션 효과)
			var $that = $(this).siblings('.editor');
			$that.hide('slide', {direction:'up'}, 500, function() {
				$that.remove();
			});
			
			// 에디터 기본 폼 추가
			var $newEditor = $('.document_ori .right .comment_write_form .editor').clone(true);
			$(this).parent().prepend($newEditor);
			
			// 문서정보 새로고침하기
			$xw.functions.refreshDocument(document_srl, false);
		},
		
		/**
		 * 댓글의 "에디터 사용"을 클릭했을 때
		 * 에디터를 불러와서 기존의 댓글 창을 없애고 에디터로 교체.
		 */
		onCommentUseEditorClick: function() {
			var $editorDOM = $(this).siblings('.editor:first');
			var $content = null;
			var content = null;
			var isCommentWrite = $editorDOM.find('.comment_write:first').length;
			// 새 댓글 달기: document_srl만 필요
			var document_srl = $(this).attr('document_srl');
			// Simple Editor 에서 Editor 로 넘어가기
			if (isCommentWrite) {
				// 원래 내용 유지시키기
				content = $editorDOM.find('.comment_write:first').val();
				var tmp = content.split('\n');
				content = tmp.join('<br/>');
				
				// 에디터 불러오기
				var ref = {
						upload_target_srl:0,
						document_srl:document_srl,
						comment_srl:0,
						parent_srl:0
				};
				$xw.functions.call_editor($editorDOM, ref, 'FULL', content, $xw.CALL_TYPE.NEW_COMM);
				
				// 스크롤 이동
				var position = $editorDOM.offset()
				$('html, body').animate({scrollTop:position.top - 100}, 400);
				
				// 버튼 없애기
				$(this).hide();
			}
			else {
				return false;
			}
		},
		
		
		/**
		 * 댓글의 "삭제"을 클릭했을 때 삭제 확인 창을 띄우기 comm_delete
		 */
		onCommentDeleteClick: function(event) {
			// 먼저 #popup_menu_area body에 추가시키기
			$('#popup_menu_area').remove();
			$('body').append("<div id='popup_menu_area' style='display:none;z-index:999;'></div>");
			
			var comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
			var document_srl = $xw.comFunc.getDocumentSrlOfComment($(this));
			
			// confirm 창 더미 복사하고 알맞은 comment_srl 값 기록하기
			var $delDummy = $('.dummies:first .delete_confirm').clone(true);
			$delDummy.find('.delete_confirm_yes').attr('comment_srl', comment_srl).attr('document_srl', document_srl);
			
			// popup menu 출력
			var params = new Array();
			var ret_obj = new Array();
			ret_obj['menus'] = null;
			params['menu_id'] = 'xewall';
			params['page_x'] = event.pageX;
			params['page_y'] = event.pageY;
			XE.loaded_popup_menus['xewall'] = $delDummy.html();
			XE.displayPopupMenu(ret_obj, null, params);
			
			// 이벤트 추가 => 진짜로 삭제 누르면 서버에 삭제 요청을 보낼 수 있도록 이벤트 추가시킨다.
			$('#popup_menu_area .delete_confirm_yes').unbind('click');
			$('#popup_menu_area .delete_confirm_yes').click(XewallEventHandler.onCommentGoDeleteClick);
			return false;
		},
		
		/**
		 * 댓글의 삭제 확인 창에서 진짜 "삭제"를 눌렀을 때 서버에 삭제 요청을 보낸다.
		 */
		onCommentGoDeleteClick: function() {
			var comment_srl = $(this).attr('comment_srl');
			var document_srl = $(this).attr('document_srl');
			var myCall = new MyMethodCall('xewall', 'procXewallDeleteComment');
			myCall.addElement('comment_srl', comment_srl);
			myCall.callAjax(function(data) {
				// 사라지는 효과를 보이도록 한다.
				$('.comment_srl_' + comment_srl).hide('slide', {direction:'up'}, 500, function() {
					// 재로딩이 아닌 해당 댓글을 삭제하는 것으로 한다.
					$('.comment_srl_' + comment_srl).remove();
				});
			}, function() {
				
			}, false);
		},
		
		/**
		 * 댓글의 추천을 눌렀을 경우 서버에 추천 요청을 보낸다.
		 */
		onCommentVoteUp: function() {
			var comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
			var myCall = new MyMethodCall();
			myCall.setModule('xewall').setAct('procXewallVoteComment').addElement('target_srl', comment_srl);
			myCall.callAjax(function(data, textStatus, xhr) {
				$xw.functions.refreshComment(comment_srl, false);
			}, function(xhr, textStatus) {
				
			}, true);
		},
		
		/**
		 * 댓글의 비추를 눌렀을 경우 서버에 비추 요청을 보낸다.
		 */
		onCommentVoteDown: function() {
			var comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
			var myCall = new MyMethodCall();
			myCall.setModule('xewall').setAct('procXewallBlameComment').addElement('target_srl', comment_srl);
			myCall.callAjax(function(data, textStatus, xhr) {
				$xw.functions.refreshComment(comment_srl, false);
			}, function(xhr, textStatus) {
				
			}, true);
		},
		
		/**
		 * 댓글의 수정을 눌렀을 때 수정 창을 보여준다.
		 */
		onCommentModify: function() {
			var comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
			var parent_srl = $xw.comFunc.getParentSrlOfComment($(this));
			var document_srl = $xw.comFunc.getDocumentSrlOfComment($(this));
			var $editorDOM = $('.comment_srl_' + comment_srl).find('.editor:first');
			var content = '';
			
			// 수정 전의 content 불러오기
			var mc = new MyMethodCall('xewall', 'getXewallComment');
			
			mc.addElement('comment_srl', comment_srl);
			mc.addElement('include_content', 'true');
			mc.callAjax(function(data) {
				var error = parseInt($(data).find('error').text());
				var message = $(data).find('message').text();
				if (error) {
					$xw.functions.showLogMsg(message);
					return;
				}
				content = $(data).find('content').text();
			}, function(xhr, textStatus) {
				$xw.functions.showLogMsg(textStatus);
			}, false);
			
			// 댓글의 수정 document_srl, comment_srl, parent_srl 이 필요. parent_srl = 0, upload_target_srl = comment_srl
			var ref = {
					upload_target_srl: comment_srl,
					document_srl: document_srl,
					comment_srl: comment_srl,
					parent_srl: parent_srl
			};
			var call_type = $xw.CALL_TYPE.MOD_COMM;
			if (parent_srl) {
				call_type = $xw.CALL_TYPE.MOD_CCOMM;
			}
			$xw.functions.call_editor($editorDOM, ref, 'FULL', content, call_type);
			
			$editorDOM.show();
			$editorDOM.siblings('.comm_summary').hide();
			$editorDOM.siblings('.comm_content').hide();
			$editorDOM.siblings('.comm_see_summary').hide();
		},

		/**
		 * 댓글 수정창에서 "수청"을 눌렀을 경우 에디터의 내용을 서버에 보내어 댓글을 수정시킨다.
		 */
		onCommentGoModify: function() {
			var $editorDOM = $(this).parent();
			var document_srl = $xw.comFunc.getDocumentSrlOfComment($(this));
			var comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
			
			// 내용 얻기
			var editor_seq = $editorDOM.children('form:first').attr('editor_sequence');
			var content = window.editorGetContent(editor_seq);
			
			// 내용 얻은게 없으면 취소
			if (!content) return;
			
			// 게시 버튼 비활성화
			$(this).unbind('click');
			var $that = $(this);
			
			var myCall = new MyMethodCall('xewall', 'procXewallInsertComment');
			myCall.addElement('xe_mid', xewall.mid);
			myCall.addElement('comment_srl', comment_srl);
			myCall.addElement('document_srl', document_srl);
			myCall.addCDATAElement('content', content);
			myCall.callAjax(function(data, textStatus, xhr) {
				// 에러일 경우 메시지 표시 후 종료
				var error = parseInt($(data).find('error:first').text());
				var message = $(data).find('message:first').text();
				if (error) {
					$xw.functions.showLogMsg(message);
					return;
				}
				
				// 수정된 내용을 Document에 반영한다.
				var comment = new XewallComment();
				comment.setCommentObj($(data).find('comment:first'));
				var $domObj = $('.comment_srl_' + comment_srl);
				comment.setInfoToDomObj($domObj);
				
				// comCache에 수정내용 업데이트
				$xw.comCache[comment.comment_srl] = comment.last_update;
				
				// 자동 스크롤
				var position = $('.comment_srl_' + comment_srl).offset();
				$('html, body').animate({scrollTop:position.top - 100}, 400);
				
			}, function(xhr, textStatus) {
				
				// 에러 메지시 띄우기
				$xw.functions.showLogMsg('Ajax call Error : ' + textStatus);
				
			}, false);
			
			$editorDOM.siblings('.comm_summary').hide();
			$editorDOM.siblings('.comm_content').show();
			$editorDOM.siblings('.comm_see_summary').show();
			$editorDOM.hide();
			
			// 게시 버튼 다시 활성화
			$that.bind('click', XewallEventHandler.onCommentGoModify);
			
		},

		/**
		 * 댓글 수정창에서 취소를 눌렀을 경우 에디터를 숨기고 summary와 content를 보이도록 한다.
		 */
		onComentCancelModify: function() {
			// 확인 창으로 확인하기
			if (!confirm(xewall_lang.confirm_cancel)) return;
			
			var $editorDOM = $(this).parent();
			$editorDOM.siblings('.comm_summary').hide();
			$editorDOM.siblings('.comm_content').show();
			$editorDOM.siblings('.comm_see_summary').show();
			$editorDOM.hide('slide', {direction:'up'}, 1000);
			
			// "에디터 사용" 버튼 보이기
			$(this).siblings('.use_editor').show();
			
			// 자동 스크롤
			var comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
			var position = $('.comment_srl_' + comment_srl).offset();
			$('html, body').animate({scrollTop:position.top - 100}, 400);
		},

		/**
		 * 댓글에 "댓글달기" 버튼을 눌렀을 때 댓글 달기 창을 보여주도록 한다.
		 */
		onComentReply: function() {
			var $comm_reply_box = $(this).parent().siblings('.comm_reply_box');
			// 댓글 달기 창 보였다가 가렸다가 토글하기
			if ($comm_reply_box.css('display') == 'none') {
				var $editorDOM = $comm_reply_box.children('.editor:first');
				var document_srl = $xw.comFunc.getDocumentSrlOfComment($(this));
				var comment_srl = $xw.comFunc.getCommentSrlOfComment($(this));
				var upload_target_srl = 0;
				var editor_type = 'SIMPLE';
				var content = '';
				$comm_reply_box.fadeIn();
				// 새 대댓글 달기: document_srl, parent_srl 필요. upload_target_srl = 0
				var ref = {
						upload_target_srl:0,
						document_srl: document_srl,
						comment_srl:0,
						parent_srl: comment_srl
				};
				$xw.functions.call_editor($editorDOM, ref, editor_type, content, $xw.CALL_TYPE.NEW_CCOMM);
			} else {
				$comm_reply_box.fadeOut();
				// "에디터 사용" 버튼 보이기
				$comm_reply_box.children('.editor:first').children('.use_editor:first').show();
			}
		}, 

		/**
		 * 댓글 달기 창에서 취소를 눌렀을 때 에디터를 가린다.
		 */
		onComentReplyCancelModify: function() {
			var $comm_reply_box = $(this).parent().parent();
			$comm_reply_box.fadeOut();
			// "에디터 사용" 버튼 다시 보이기
			$(this).siblings('.use_editor').show();
		},

		/**
		 * 댓글 달기 창에서 "에디터 사용"을 눌렀을 때 FULL 에디터를 불러오고 버튼 없애기
		 */
		onCommentReplyUseEditor: function() {
			var $editorDOM = $(this).parent();
			var document_srl = $editorDOM.find('input[name="document_srl"]:first').val();
			var comment_srl = $editorDOM.find('input[name="comment_srl"]:first').val();
			var parent_srl = $editorDOM.find('input[name="parent_srl"]:first').val();
			var ref = {
					document_srl:document_srl,
					comment_srl:comment_srl,
					parent_srl:parent_srl,
					upload_target_srl:comment_srl
			};
			var editor_type = "FULL";
			
			var editorSeq = $editorDOM.children('form:first').attr('editor_sequence');
			var content = editorGetContent(editorSeq);
			
			$xw.functions.call_editor($editorDOM, ref, editor_type, content, $xw.CALL_TYPE.NEW_CCOMM);
			
			// 자동 스크롤 하기
			var position = $editorDOM.offset()
			$('html, body').animate({scrollTop:position.top - 100}, 400);
			
			// "에디터 사용" 버튼 제거
			$(this).hide();
		},

		/**
		 * 대댓글 달기 창에서 "전송"을 눌렀을 때 에디터의 내용을 서버에 전송하고 댓글 창 리프레쉬 시킨다.
		 */
		onCommentReplyGoModify: function() {
			// 필요 정보 얻기.
			var $editorDOM = $(this).parent();
			var document_srl = $editorDOM.find('input[name="document_srl"]:first').val();
			var comment_srl = $editorDOM.find('input[name="comment_srl"]:first').val();
			var parent_srl = $editorDOM.find('input[name="parent_srl"]:first').val();
			
			var $that = $(this);
			
			// 내용 얻기
			var editor_seq = $editorDOM.children('form').attr('editor_sequence');
			var content = window.editorGetContent(editor_seq);
			
			// 보낼 내용이 없으면 취소
			if (!content) return;
			
			// 게시버튼 비활성화
			$(this).unbind('click');
			
			// 요청.
			var myCall = new MyMethodCall('xewall', 'procXewallInsertComment');
			myCall.addElement('is_new', 'true');
			myCall.addElement('document_srl', document_srl);
			myCall.addElement('comment_srl', comment_srl);
			myCall.addElement('parent_srl', parent_srl);
			myCall.addCDATAElement('content', content);
			myCall.callAjax(function(data, textStatus, xhr) {
				// 사용된 에디터 초기화
				$xw.functions.initializeEditor($editorDOM);
				
				// 에러인지 아닌지 확인
				var error = parseInt($(data).find('error:first').text());
				var message = $(data).find('message:first').text();
				if (error) {
					$xw.functions.showLogMsg(message);
					return;
				}
				
				// 새로 삽입 
				var comment = new XewallComment();
				comment.setCommentObj($(data).find('comment:first'));
				var $domObj = $('.comment_ori').clone(true);
				comment.setInfoToDomObj($domObj);
				$xw.functions.insertComment2Document($domObj, document_srl, 'sort');
			}, function(xhr, textStatus) {
				// 에러 메지시 띄우기
				$xw.functions.showLogMsg(textStatus);
			}, false);
			
			// 게시버튼 다시 활성화
			$that.bind('click', XewallEventHandler.onCommentReplyGoModify);
			
			// 수정 창 가리기
			$('.comment_srl_' + parent_srl).find('.comm_reply_box').hide();
			
			// 자동 스크롤
			var position = $('.comment_srl_' + comment_srl).offset();
			$('html, body').animate({scrollTop:position.top - 100}, 400);
		},

		/**
		 * 게시판을 선택했을 때 (버튼으로 표현된 게시판을 눌렀을 때)
		 */
		onBoardListClick: function(evt) {
			var ALL_BOARD = 1; // 게시판 목록 버튼
			var MY_SETTING = 2; // 설정 버튼
			var REFRESH = 3; // 새로고침 버튼
			
			// 클릭된 게시판의 module_srl 파악
			var module_srl = parseInt($(this).attr('value'));
			if (!module_srl) {
				module_srl = $(this).parents('.document:first').attr('module_srl');
			}
			
			// 만약 설정 버튼이라면 실행하지 않고 링크 타고 가기.
			if (module_srl == MY_SETTING || module_srl == REFRESH) {
				return true;
			}
			
			// 기다려 주세요... 아이콘 보이기
			$('.loading').show();
			
			// 스크롤 이벤트 언바인드 시키기 (로딩 도중 다음 페이지가 로딩 되지 않도록 한다..)
			$(window).unbind('scroll');
			// 전역변수 default_listen 설정
			if (module_srl == ALL_BOARD) { // 게시판 목록을 눌렀을 때
				$xw.default_listen = $xw.default_listen_init;
				$xw.functions.setCategoryList(null);
				$xw.functions.setHeaderFooterText(null);
			}
			// Shift, Control, Meta key를 눌러 다중 선택을 하고자 했을 때
			else if (evt.shiftKey || evt.ctrlKey || evt.metaKey) {
				//var tmpSet = new Array();
				var tmpArr = $xw.default_listen + '';
				tmpArr = tmpArr.split(',');
				
				if ($.inArray(module_srl + '', tmpArr) < 0)
					tmpArr.push(module_srl);
				
				$xw.default_listen = tmpArr.join(',');
			}
			else { // 개별 게시판을 선택한 것이라면
				$xw.default_listen = module_srl;
				// 클릭된 게시판을 .default_listen_array 에 적용시킨다.
				$('.default_listen_array').children().each(function() {
					if (module_srl == this.value) {
						$(this).attr('selected', 'selected');
					} else {
						$(this).removeAttr('selected');
					}
				});
				// #board_category의 내용 업데이트 한다.
				$xw.functions.setCategoryList(module_srl);
				
				// 각 게시판의 머릿말과 꼬릿말을 출력한다.
				$xw.functions.setHeaderFooterText(module_srl);
			}
			
			// 페이지 초기화
			$xw.page = 1;
			
			// documentList 변수 초기화 TODO 생각하기: 이 변수 계속 사용할 것인지??? 괜히 더 복잡해지는 것 같다.
			documentList = new Array();
			
			$('.document').remove(); // HTML 요소들 제거
			$xw.docCache = new Array(); // 캐시 초기화
			
			// 재로딩
			$xw.functions.refreshDocumentList($xw.default_listen, $xw.page, xewall.list_count_doc);
			
			// 클릭된 버튼의 색깔 토글 시키기
			// 모든 li에 대해서...
			// 게시판 버튼들의 색깔도 관리자가 맞춰놓은 색으로 바꿔주기
			$('li.default_listen_array, li.my_module_list').each(function() {
				if (module_srl == $(this).attr('value')) { // 선택된 것이라면 선택 색으로 바꿔주기
					$(this).css('background-color', 'white');
					$(this).children('a').css('border-color', '#6d6d6d');
				}
				else { // 선택된 것이 아니라면
					$(this).css('background-color', '#' + xewall.colors[$(this).attr('value')]);
					$(this).children('a').css('border-color', 'silver');
				}
			});
			
			// <a> 태그의 내용이 실행되지 않도록 막기
			return false;
		},
		dummy: 0
	};	
});