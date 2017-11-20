jQuery(function($) {
	$(document).ready(function() {
		
		// 체크박스들을 눌렀을 때 설정들을 Ajax로 저장하도록 한다.
		// XE 담벼락에 받아보는 게시판들
		$('.check_available').click(function() {
			// 체크가 되었는지 안되었는지 확인
			var checked = $(this).is(':checked');
			
			var params = {module_srl:$(this).val(), target_srl:$(this).val()};
			var responses = [];
			
			// 체크가 된 상태라면 저장하기
			if (checked) {
				exec_xml('xewall', 'procXewallInsertMyFavourite', params, function(ret_obj) {
				}, responses);
			}
			// 체크가 안된 상태라면 지우기
			else {
				exec_xml('xewall', 'procXewallDeleteMyFavourite', params, function(ret_obj) {
				}, responses);
			}
		});
		
		// 취소를 눌렀을 때
		$('#cancel').click(function() {
			history.go(-1);
		});
	});
});