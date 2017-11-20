<?php
/**
 * @class  xewall
 * @author 바람꽃 (wndflwr@gmail.com)
 * @brief  xewall 모듈의 high class
 **/

class xewall extends ModuleObject {
	
	//var $MODULE_NAME = 'xewall';
	
	/**
	 * @brief 설치시 추가 작업이 필요할시 구현
	 * 설치시 모듈 등록, 트리거 등록을 진행한다.
	 **/
	function moduleInstall() {
	}
	
	/**
	 * @brief 설치가 이상이 없는지 체크하는 method
	 **/
	function checkUpdate() {
	}
	
	/**
	 * @brief 업데이트 실행
	 **/
	function moduleUpdate() {
	}
	
	/**
	 * @brief 삭제시 동작
	 */
	function moduleUninstall() {
	}
	
	/**
	 * @brief 캐시 파일 재생성
	 */
	function recompileCache() {
	}
}
?>