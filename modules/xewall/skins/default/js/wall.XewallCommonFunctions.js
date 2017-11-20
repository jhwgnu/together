var XewallCommonFunctions;

jQuery(function($) {
	XewallCommonFunctions = {
		
		getDocumentSrlOfDocument : function($subjectDom) {
			return $subjectDom.parents(".document:first").attr("document_srl");
		},
		
		getModuleSrlOfDocument : function($subjectDom) {
			return $subjectDom.parents(".document:first").attr("module_srl");
		},
		
		getModuleSrlOfComment : function($subjectDom) {
			return $subjectDom.parents(".comment:first").attr("module_srl");
		},
		
		getDocumentSrlOfComment : function($subjectDom) {
			return $subjectDom.parents(".comment:first").attr("document_srl");
		},
		
		getCommentSrlOfComment : function($subjectDom) {
			return $subjectDom.parents(".comment:first").attr("comment_srl");
		},
		
		getParentSrlOfComment : function($subjectDom) {
			return $subjectDom.parents(".comment:first").attr("parent_srl");
		},
		
		/**
		 * document_srl의 댓글창이 가려져 있는지 열려있는지 확인
		 */
		isCommentBoxVisible : function(document_srl) {
			var visible = $(".document_srl_" + document_srl).find(".comment_box").css("display");
			if (visible === "none") {
				return false;
			} else {
				return true;
			}
		},
		
		isCommentBoxNotVisible : function(document_srl) {
			return !$xw.comFunc.isCommentBoxVisible(document_srl);
		},
		
		showCommentBox : function(document_srl, scroll_to_last_comment) {
			var $commentBox = $('.document_srl_' + document_srl).find('.comment_box');
			$commentBox.show("slide", {direction:"up"}, 500, function() {
				if (scroll_to_last_comment) {
					var position = $commentBox.offset();
					var height = $commentBox.height();
					var balance = $(window).height() / 2;
					$('html, body').animate({scrollTop: position.top + height - balance}, 400);
				}
			});
		},
		
		hideCommentBox : function(document_srl) {
			$(".document_srl_" + document_srl).find(".comment_box").hide("slide", {direction:"up"}, 500, null);
		},
		
		showMorePage : function(document_srl) {
			$(".document_srl_" + document_srl).find(".more_page").show("slide", {direction:"down"}, 500, null);
		},
		
		hideMorePage : function(document_srl) {
			$(".document_srl_" + document_srl).find(".more_page").hide("slide", {direction:"up"}, 500, null);
		},
	};
});