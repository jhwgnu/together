<?php
/**
 * @class  xewallAdminController
 * @author 바람꽃 (wndflwr@gmail.com)
 * @brief  xewall 모듈의 admin controller class
 **/

class xewallAdminController extends xewall {
	
	public $DEFAULT_CONFIG = null;
	
	/**
	 * 초기화
	 **/
	function init() {
		if (is_null($this->DEFAULT_CONFIG)) {
			$this->DEFAULT_CONFIG->MODULE_INFO->module_category = 0;
			$this->DEFAULT_CONFIG->MODULE_INFO->layour_srl = 0;
			$this->DEFAULT_CONFIG->MODULE_INFO->use_mobile = 'N';
			$this->DEFAULT_CONFIG->MODULE_INFO->mlayour_srl = 0;
			$this->DEFAULT_CONFIG->MODULE_INFO->skin = '/USE_DEFAULT/';
			$this->DEFAULT_CONFIG->MODULE_INFO->mskin = '/USE_DEFAULT/';
			$this->DEFAULT_CONFIG->MODULE_INFO->browser_title = 'Default browser';
			$this->DEFAULT_CONFIG->MODULE_INFO->open_rss = 'N';
			$this->DEFAULT_CONFIG->MODULE_INFO->header_text = '';
			$this->DEFAULT_CONFIG->MODULE_INFO->footer_text = '';
			
			$this->DEFAULT_CONFIG->FEED_CONFIG->str_available_module_list = '';
			$this->DEFAULT_CONFIG->FEED_CONFIG->str_default_module_list = '';
			$this->DEFAULT_CONFIG->FEED_CONFIG->str_available_module_list_color_code = '';
			$this->DEFAULT_CONFIG->FEED_CONFIG->str_default_module_list_color_code = '';
			
			$this->DEFAULT_CONFIG->NAVI_CONFIG->doc_sort_index = 'document_srl';
			$this->DEFAULT_CONFIG->NAVI_CONFIG->doc_order_type = 'asc';
			$this->DEFAULT_CONFIG->NAVI_CONFIG->doc_list_count = 20;
			
			$this->DEFAULT_CONFIG->EDIT_CONFIG->allow_fileupload = 'N';
			$this->DEFAULT_CONFIG->EDIT_CONFIG->enable_autosave = 'N';
			$this->DEFAULT_CONFIG->EDIT_CONFIG->enable_default_component = 'Y';
			$this->DEFAULT_CONFIG->EDIT_CONFIG->enable_component = 'N';
			$this->DEFAULT_CONFIG->EDIT_CONFIG->resizable = 'N';
			$this->DEFAULT_CONFIG->EDIT_CONFIG->disable_html = 'N';
			$this->DEFAULT_CONFIG->EDIT_CONFIG->height = '95';
			$this->DEFAULT_CONFIG->EDIT_CONFIG->editor_skin = 'xpresseditor';
			
			$this->DEFAULT_CONFIG->ACT_CONFIG->user_user_board = 'N';
			$this->DEFAULT_CONFIG->ACT_CONFIG->comments_display_policy = 'display_none';
			$this->DEFAULT_CONFIG->ACT_CONFIG->comments_display_policy_amount = '5';
			$this->DEFAULT_CONFIG->ACT_CONFIG->refresh_rate = 30;
			$this->DEFAULT_CONFIG->ACT_CONFIG->doc_summary = 500;
			$this->DEFAULT_CONFIG->ACT_CONFIG->doc_more = '(more...)';
			$this->DEFAULT_CONFIG->ACT_CONFIG->com_summary = 500;
			$this->DEFAULT_CONFIG->ACT_CONFIG->com_more = '(more...)';
		}
	}

	/**
	 * 모듈 새로 생성 또는 수정
	 */
	function procXewallAdminInsertModule() {
		// 모듈 관련 정보 받기
		$module_info = $this->getModuleInfoFromInsertPage();
		$feed_config = $this->getFeedConfigInfoFromInsertPage();
		$navi_config = $this->getNavigationConfigFromInsertPage();
		$edit_config = $this->getEditorConfigFromInsertPage();
		$act_config = $this->getActionConfigFromInsertPage();
		
		// feed_config, navi_config, edit_config, act_config를 모두 module_info에 합친다.
		$this->mergeObject($feed_config, $module_info);
		$this->mergeObject($navi_config, $module_info);
		$this->mergeObject($edit_config, $module_info);
		$this->mergeObject($act_config, $module_info);
		
		// 모듈 삽입/업데이트
		$oModuleController = &getController('module');
		if ($module_info->module_srl) {
			$this->cleanXewallFavourite($feed_config, $module_info);
			$output = $oModuleController->updateModule($module_info);
		}
		else {
			$output = $oModuleController->insertModule($module_info);
		}
		
		// redirect url
		$default_redirect_url = getNotEncodedUrl('', 'module', 'admin', 'act', 'dispXewallAdminModuleList'); 
		if ($output->toBool()) {
			if (!$module_info->module_srl) // 새로 생성시에는 dispXewalAdminModuleList로 가야한다.
				$this->setRedirectUrl(getNotEncodedUrl('', 'module', 'admin', 'act', 'dispXewallAdminModuleList'));
			else // 수정시에는 현재 페이지에 머무르도록 한다.
				$this->setRedirectUrl(Context::get('success_return_url') ? Context::get('success_return_url') : $default_redirect_url);
		} else {
			$this->setRedirectUrl(Context::get('error_return_url') ? Context::get('error_return_url') : $default_redirect_url);
		}
		return $output;
	}
	
	/**
	 * feed 에 수정이 있다면 기존의 xewall_favourite 테이블 정리
	 */
	private function cleanXewallFavourite($feedConfig, $moduleInfo) {
		// 기존 모듈 정보
		$oModuleModel = &getModel('module');
		$originalModuleInfo = $oModuleModel->getModuleInfoByModuleSrl($moduleInfo->module_srl);
		
		// available_module_list 나 default_module_list 에서 빠진 module 이 있다면 xewall_favourite 에서 기존에 등록된 favourite 리스트들을 정리한다
		$newAvailable = explode(',', $feedConfig->str_available_module_list);
		$originalAvailable = explode(',', $originalModuleInfo->str_available_module_list);
		$availableRemoved = array_diff($originalAvailable, $newAvailable);
		
		$newDefault = explode(',', $feedConfig->str_default_module_list);
		$originalDefault = explode(',', $originalModuleInfo->str_default_module_list);
		$defaultRemoved = array_diff($originalDefault, $newDefault);
		
		$combinedRemoved = array_merge($availableRemoved, $defaultRemoved);
		
		if (count($combinedRemoved) > 0) {
			$this->deleteFavouriteByModuleSrlArray($combinedRemoved);
		}
	}
	
	private function deleteFavouriteByModuleSrlArray($moduleSrlArray) {
		$args->target_srl = $moduleSrlArray;
		return executeQueryArray('xewall.deleteFavourite', $args);
	}

	/**
	 * 설정 정보 중에서 비어있는 정보는 $this->DEFAULT_CONFIG 에 설정되어있는 기본 정보로 대체한다.
	 * $category는 ['MODULE_INFO', 'FEED_CONFIG', 'NAVI_CONFIG', 'EDIT_CONFIG', 'ACT_CONFIG'] 중 하나.
	 */
	private function fillOutDefaultConfigValue($config_info, $category) {
		$CATEGORY_LIST = array('MODULE_INFO', 'FEED_CONFIG', 'NAVI_CONFIG', 'EDIT_CONFIG', 'ACT_CONFIG');
		if (!in_array($category, $CATEGORY_LIST)) {
			return null;
		}
		// $this->DEFAULT_CONFIG가 초기화 되어있는지 확인. 안되어 있으면 초기화
		foreach ($config_info as $key => $val) {
			if (is_null($this->DEFAULT_CONFIG->{$category}->{$key}))
				continue;
			if (is_null($val)) {
				$config_info->{$key} = $this->DEFAULT_CONFIG->{$category}->{$key};
			}
		}
		return $config_info;
	}
	
	/**
	 * 모듈 관련 설정 정보를 받아서 없는 정보는 기본 정보로 세팅해 준다.
	 */
	private function getModuleInfoFromInsertPage() {
		$module_info = Context::gets('module_srl', 'module', 'module_category',
				'layout_srl', 'use_mobile', 'mlayout_srl', 'module_mid', 'skin', 'mskin',
				'browser_title', 'description', 'is_default', 'open_rss', 'header_text',
				'footer_text');
		$module_info->mid = $module_info->module_mid;
		return $this->fillOutDefaultConfigValue($module_info, 'MODULE_INFO');
	}
	
	/**
	 * 피드 설정 정보를 받아 없는 정보는 기본 정보를 세팅해 준다.
	 */
	private function getFeedConfigInfoFromInsertPage() {
		$feed_config_info = Context::gets('str_available_module_list', 'str_default_module_list',
				'str_available_module_list_color_code', 'str_default_module_list_color_code');
		return $this->fillOutDefaultConfigValue($feed_config_info, 'FEED_CONFIG');
	}
	
	/**
	 * 네비게이션 설정 정보를 받아 없는 정보는 기본 정보로 세팅해 준다.
	 */
	private function getNavigationConfigFromInsertPage() {
		$navi_config = Context::gets('doc_sort_index', 'doc_order_type', 'doc_list_count');
		return $this->fillOutDefaultConfigValue($navi_config, 'NAVI_CONFIG');
	}
	
	/**
	 * 에디터 설정 정보를 받아 없는 정보는 기본 정보로 세팅해 준다.
	 */
	private function getEditorConfigFromInsertPage() {
		$editor_config = Context::gets('allow_fileupload', 'enable_autosave',
				'enable_default_component', 'enable_component', 'resizable', 'disable_html',
				'height', 'editor_skin');
		return $this->fillOutDefaultConfigValue($editor_config, 'EDIT_CONFIG');
	}
	
	/**
	 * 동작 설정 정보를 받아 없는 정보는 기본 정보로 세팅해 준다.
	 */
	private function getActionConfigFromInsertPage() {
		$act_config = Context::gets('use_user_board', 'comments_display_policy',
				'comments_display_policy_amount', 'refresh_rate', 'doc_summary',
				'doc_more', 'com_summary', 'com_more');
		return $this->fillOutDefaultConfigValue($act_config, 'ACT_CONFIG');
	}
	
	/**
	 * stdClas형식의 object를 합친다.
	 */
	private function mergeObject($obj, &$into) {
		foreach ($obj as $key => $val) {
			$into->{$key} = $val;
		}
	}
	
	/**
	 * DB 초기화
	 * 구버전 테이블들을 모두 삭제하고 새로 설치.
	 */
	function procXewallAdminInitDB() {
		$oDB = DB::getInstance();
		 
		$oDB->dropTable('xewall_favourite');
		$oDB->dropTable('xewall_favourite_config');
		
		$this->setRedirectUrl(getNotEncodedUrl('', 'module', 'admin'));
	}
}
?>
