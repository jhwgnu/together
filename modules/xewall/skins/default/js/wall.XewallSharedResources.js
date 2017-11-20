/**
 * xewall에서 사용하는 모든 자바스크립트들이 공유하는 메모리
 */
var $xw = {
		// 함수
		functions: null, // functions
		comFunc: null, // common functions
		eventHandler: null, // eventHandler
		
		// 변수
		default_listen: null,
		default_listen_init: null,
		page: null,
		
		docCache: [],
		comCache: [],
		
		// 상수
		CALL_TYPE : {
			NEW_DOC : 0,	// 새로운 문서 만들 때
			MOD_DOC : 1,	// 문서 수정할 때
			NEW_COMM : 2,	// 새로운 댓글 만들 때
			MOD_COMM : 3,	// 댓글 수정할 때
			NEW_CCOMM : 4,	// 새로운 대댓글 만들 때
			MOD_CCOMM : 5	// 대댓글 수정할 때
		}
};