<?php
/**
 * @class  xewallView
 * @author 바람꽃 (wndflwr@gmail.com)
 * @brief  xewall 모듈의 View class
 **/

class xewallView extends xewall {
	 
	/**
	 * @brief 초기화
	 * board 모듈은 일반 사용과 관리자용으로 나누어진다.\n
	 **/
	function init() {
		// 템블릿 경로 설정
		$template_path = sprintf("%sskins/%s/", $this->module_path, "default");
		$this->setTemplatePath($template_path);
	}
	
	
	/**
	 * @function dispXewallPersonalConfig
	 * @brief 개인 설정을 할 수 있는 창을 띄워준다.
	 */
	function dispXewallPersonalConfig() {
		
		$mid = Context::get('mid');
		if (!$mid) return new Obejct(-1, "msg_invalid_request");
		
		// 모듈 설정 값을 적용시키기
		$oModuleModel = &getModel('module');
		$module_info = $oModuleModel->getModuleInfoByMid($mid);
		if (!$module_info) return new Object(-1, "msg_invalid_request");
		$this->module_info = $module_info;
		ModuleModel::syncModuleToSite($module_info);
		
		// 로그인 안했으면 로그인 안한 페이지 보여주기
		$is_logged = Context::get('is_logged');
		$template_path = sprintf("%sskins/%s/", $this->module_path, "default");
		if (!$is_logged) {
			$this->setTemplatePath($template_path);
			$this->setTemplateFile('not_logged');
			return;
		}
		
		// 헤더 텍스트 적용 시키기
		Context::set('header', $module_info->header_text);
		
		// 브라우저 타이틀을 설정
		Context::setBrowserTitle($module_info->browser_title." - Personal Configuration");
		
		// 관리자가 사용자가 등록할 수 있도록 허용한 필수게시판 리스트를 불러오기
		$oXewallModel = &getModel('xewall');
		$oModuleAdminModel = &getAdminModel('module'); // 게시판 제목 번역을 위한 모델.
		
		$feedConfigInfo = $oXewallModel->getFeedConfigInfo($module_info->module_srl);
		
		// 각 게시판들의 메뉴 번역하기
		$this->translateMenuTitle($feedConfigInfo['default_module_list']);
		$this->translateMenuTitle($feedConfigInfo['available_module_list']);
		
		Context::set('available_module_list', $feedConfigInfo['available_module_list']);
		Context::set('def_module_info', $feedConfigInfo['default_module_list']);
		
		// 사용자가 듣기로 등록한 게시판 리스트를 불러오기.
		$my_module_list = $oXewallModel->getMyListen();
		Context::set('my_module_list', $my_module_list);
		
		$this->setTemplateFile('personalConfig');
	}
	
	/**
	 * @function dispXewallWall
	 * @brief 담벼락을 보여준다.
	 */
	function dispXewallWall() {
		// 모듈 설정정보 불러오기
		$oModuleModel = &getModel('module');
		$module_info = $oModuleModel->getModuleInfoByMid(Context::get('mid'));
		Context::set('module_info', $module_info);
		
		// 모듈의 기본적인 설정을 세팅한다. (로그인 하지 않은 녀석들도 적용되는 항목들)
		// 모듈 설정 값을 적용시키기
		$this->module_info = $module_info;
		ModuleModel::syncModuleToSite($module_info);
		
		// 브라우저 타이틀을 설정
		Context::setBrowserTitle($module_info->browser_title);
		
		$oModuleAdminModel = &getAdminModel('module'); // 다중언어로 되어있는 메뉴를 번역하기 위해서...
		$oXewallModel = &getModel('xewall');
		$feedConfigInfo = $oXewallModel->getFeedConfigInfo($module_info->module_srl);
		$this->translateMenuTitle($feedConfigInfo['default_module_list']);
		Context::set('def_module_info', $feedConfigInfo['default_module_list']);
		
		// 사용자가 듣기로 등록한 게시판 리스트를 불러오기.
		$my_module_list = $oXewallModel->getMyListen();
		$this->translateMenuTitle($my_module_list);
		Context::set('my_module_list', $my_module_list);
		
		// 콤마로 연결시켜서 넘기기
		$tmp = array();
		foreach ($feedConfigInfo['default_module_list'] as $val) // 기본으로(강제적으로?) 피드받는 게시판들
			$tmp[] = $val->module_srl;
		foreach ($my_module_list as $val)
			$tmp[] = $val->module_srl;
		Context::set('default_listen', implode(',', $tmp));
		
		Context::set('xewall_color_config', $oXewallModel->getModuleColorCodeFromModuleInfo($module_info));
		
		// BETA: 익스플로러에서 불러오는 경우 경고 메시지 보낸다.
		if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
			Context::set('msie', true);
		
		// 템플릿 파일 세팅
		$this->setTemplateFile('wall');
	}
	
	private function translateMenuTitle($module_list) {
		foreach ($module_list as $key => $val) {
			$module_list->{$key}->browser_title = $this->getMenuTranslation($val->browser_title);
		}
	}
	
	private function getMenuTranslation($title) {
		$oModuleAdminModel = &getAdminModel('module');
		if (substr($title, 0, 12) == '$user_lang->') {
			$ttmp = $oModuleAdminModel->getLangCode(0, $title);
			return $ttmp[Context::getLangType()];
		}
		return $title;
	}
}
?>