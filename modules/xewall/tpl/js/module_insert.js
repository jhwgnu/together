(function($) {
	/**
	 * sortable1, 2, 3의 아이디를 가지는 각 ul들의 아이템의 module_srl을 콤마(,)로 연결시켜 돌려준다.
	 */
	var serializeModuleListByComma = function(ulElementId) {
		strModuleList = '';
		$('#' + ulElementId).children().each(function() {
			strModuleList = strModuleList + $(this).attr('module_srl') + ',';
		});
		console.log(strModuleList);
		if (strModuleList.length === 0 )
			return '';
		else
			return strModuleList.substr(0, strModuleList.length - 1);
	};
	
	/**
	 * sortable1, 2, 3의 아이디를 가지는 각 ul들의 아이템의 color-code를 콤마(,)로 연결시켜 돌려준다.
	 */
	var serializeModuleListColorCodeByComma = function(ulElementId) {
		strModuleListColorCode = '';
		$('#' + ulElementId).children().each(function() {
			strModuleListColorCode = strModuleListColorCode + $(this).attr('color-code') + ',';
		});
		console.log(strModuleListColorCode);
		if (strModuleListColorCode.length === 0)
			return '';
		else
			return strModuleListColorCode.substr(0, strModuleListColorCode.length - 1);
	};
	
	/**
	 * 모듈을 마우스로 각각의 분류로 옮겼을 때
	 * str_available_module_list와 str_default_module_list를 업데이트 해준다.
	 */
	var arrangeHiddenInput = function() {
		$('#str_available_module_list').val(serializeModuleListByComma('sortable2'));
		$('#str_available_module_list_color_code').val(serializeModuleListColorCodeByComma('sortable2'));
		$('#str_default_module_list').val(serializeModuleListByComma('sortable3'));
		$('#str_default_module_list_color_code').val(serializeModuleListColorCodeByComma('sortable3'));
	};
	
	/**
	 * 문서 로딩 다 되었을시 변수, 폼 초기화, 이벤트 할당
	 */
	$(document).ready(function() {
		
		// 각 게시판 아이템들의 색깔을 설정한다.
		$('.items').each(function() {
			$(this).css('background-color', '#' + $(this).attr('color-code'));
		});
		
		// 각 게시판 설정 버튼이 눌러졌을 때 색깔 설정 창 띄우기
		$('.items').spectrum({
			showPalette: true,
			palette: [
			          ['black', 'white', 'blanchedalmond'],
			          ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
			],
			move : function(color) {
				$(this).css('background-color', color.toHexString()).
						attr('color-code', color.toHexString().replace('#', ''));
				arrangeHiddenInput();
			}
		});
		
		// 각각의 게시판 아이템들이 마우스로 옮길 수 있도록 만든다.
		$("#sortable1, #sortable2, #sortable3").sortable({
            connectWith :  ".connectedSortable",
            cursor : "move",
            change : arrangeHiddenInput
        }).disableSelection();
	});
})(jQuery)