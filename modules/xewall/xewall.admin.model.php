<?php
/**
 * @class  xewallAdminModel
 * @author 바람꽃 (wndflwr@gmail.com)
 * @brief  xewall 모듈의 admin model class
 **/

class xewallAdminModel extends xewall {

	/**
	 * @brief 초기화
	 *
	 * board 모듈은 일반 사용과 관리자용으로 나누어진다.\n
	 **/
	function init() {
	}
	
	/**
	 * @function getXewallAdminTest
	 * @brief 테스트
	 */
	function getXewallAdminTest() {
		$test = Context::get('test');
	}
}
?>
