<?php
/**
 * @class  xewallAdminView
 * @author 바람꽃 (wndflwr@gmail.com)
 * @brief  xewall 모듈의 admin view class
 * 일부 기능에서는 개발 기간의 단축을 위해 XE의 board모듈을 심하게 참조했습니다.
 **/

class xewallAdminView extends xewall {

	/**
	 * 초기화.
	 */
	function init() {
		// 지금 module_srl이 존재하는지 확인
		$module_srl = Context::get('module_srl');
		if(!$module_srl && $this->module_srl) {
			$module_srl = $this->module_srl;
			Context::set('module_srl', $module_srl);
		}
		
		$oModuleModel = &getModel('module');
		
		// module_srl의 모듈 정보를 불러오기
		if($module_srl) {
			$module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl);
			if(!$module_info) {
				Context::set('module_srl','');
				$this->act = 'list';
			} else {
				ModuleModel::syncModuleToSite($module_info);
				$this->module_info = $module_info;
				$this->module_info->use_status = explode('|@|', $module_info->use_status);
				Context::set('module_info',$module_info);
			}
		}
		// xewall이 아니면 취소
		if($module_info && $module_info->module != 'xewall') return $this->stop("msg_invalid_request");
		
		// 모듈 카테고리 정보 얻기
		$module_category = $oModuleModel->getModuleCategories();
		Context::set('module_category', $module_category);
		
		// 보안
		$security = new Security();
		$security->encodeHTML('module_info.');
		$security->encodeHTML('module_category..');
		
		// 템플릿 경로 설정
		$this->setTemplatePath(sprintf("%stpl/",$this->module_path));
		
		// 정렬 옵션 설정
		foreach($this->order_target as $key)
			$order_target[$key] = Context::getLang($key);
		$order_target['list_order'] = Context::getLang('document_srl');
		$order_target['update_order'] = Context::getLang('last_update');
		Context::set('order_target', $order_target);
	}

	/**
	 * xewall 모듈들의 리스트 페이지를 출력한다.
	 */
	function dispXewallAdminModuleList() {
		// 불러올 xewall 모듈의 기본적인 정보 설정
		$args = new stdClass();
		$args->sort_index = "module_srl";
		$args->page = Context::get('page');
		$args->list_count = 20;
		$args->page_count = 10;
		$args->s_module_category_srl = Context::get('module_category_srl');

		$search_target = Context::get('search_target');
		$search_keyword = Context::get('search_keyword');

		switch ($search_target){
			case 'mid':
				$args->s_mid = $search_keyword;
				break;
			case 'browser_title':
				$args->s_browser_title = $search_keyword;
				break;
		}
		$output = executeQueryArray('xewall.getXewallList', $args);
		ModuleModel::syncModuleToSite($output->data);

		// 스킨 경로
		$oModuleModel = &getModel('module');
		$skin_list = $oModuleModel->getSkins($this->module_path);
		Context::set('skin_list',$skin_list);

		$mskin_list = $oModuleModel->getSkins($this->module_path, "m.skins");
		Context::set('mskin_list', $mskin_list);

		// 레이아웃 경로
		$oLayoutModel = &getModel('layout');
		$layout_list = $oLayoutModel->getLayoutList();
		Context::set('layout_list', $layout_list);

		$mobile_layout_list = $oLayoutModel->getLayoutList(0,"M");
		Context::set('mlayout_list', $mobile_layout_list);

		$oModuleAdminModel = &getAdminModel('module');
		$selected_manage_content = $oModuleAdminModel->getSelectedManageHTML($this->xml_info->grant);
		Context::set('selected_manage_content', $selected_manage_content);

		// 값 할당
		Context::set('total_count', $output->total_count);
		Context::set('total_page', $output->total_page);
		Context::set('page', $output->page);
		Context::set('xewall_list', $output->data);
		Context::set('page_navigation', $output->page_navigation);

		// 보안
		$security = new Security();
		$security->encodeHTML('board_list..browser_title','board_list..mid');
		$security->encodeHTML('skin_list..title','mskin_list..title');
		$security->encodeHTML('layout_list..title','layout_list..layout');
		$security->encodeHTML('mlayout_list..title','mlayout_list..layout');

		// 템플릿 파일 설정
		$this->setTemplatePath($this->module_path.'tpl');
		
		// 템플릿 파일 설정
		$this->setTemplateFile('module_list');
	}
	
	/**
	 * xewall 모듈 생성(수정)하는 페이지를 보여준다.
	 * 모듈 정보를 보는 기능도 한다.
	 */
	function dispXewallAdminModuleInsert() {
		// 모듈 정보 가져오기
		$oModuleModel = &getModel('module');
		$module_srl = Context::get('module_srl');
		$module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl);
		
		
		// 스킨 목록 가져오기
		$skin_list = $oModuleModel->getSkins($this->module_path);
		Context::set('skin_list',$skin_list);
		$mskin_list = $oModuleModel->getSkins($this->module_path, "m.skins");
		Context::set('mskin_list', $mskin_list);
		
		// 레이아웃 목록 가져오기
		$oLayoutModel = &getModel('layout');
		$layout_list = $oLayoutModel->getLayoutList();
		Context::set('layout_list', $layout_list);
		$mobile_layout_list = $oLayoutModel->getLayoutList(0,"M");
		Context::set('mlayout_list', $mobile_layout_list);
		
		// module_categories 정보 불러와서 뿌리기
		$oModuleModel = &getModel('module');
		$category_list = $oModuleModel->getModuleCategories();
		Context::set('category_list', $category_list);
		
		// 피드 설정 정보 불러와 뿌리기
		$oXewallModel = &getModel('xewall');
		$arr = $oXewallModel->getFeedConfigInfo($module_srl);
		Context::set('module_list', $arr['module_list']);
		Context::set('default_module_list', $arr['default_module_list']);
		Context::set('available_module_list', $arr['available_module_list']);
		
		// 각 게시판의 배경 색상 정보 불러오기
		Context::set('xewall_color_config', $oXewallModel->getModuleColorCodeFromModuleInfo($module_info));
		
		// 에디터 스킨 정보 불러오기
		Context::set('editor_skin_list', $this->getEditorSkinList());
		
		// 보안 // TODO 모든 Context::set() 조사해서 보안 강화할 부분 모두 강화하기
		$security = new Security();
		$security->encodeHTML('skin_list..title','mskin_list..title');
		$security->encodeHTML('layout_list..title','layout_list..layout');
		$security->encodeHTML('mlayout_list..title','mlayout_list..layout');
		
		// 템플릿 파일 설정
		$this->setTemplateFile('module_insert');
	}
	
	function dispXewallAdminInitDB() {
		
		// 템플릿 파일 설정
		$this->setTemplateFile('init_db');
	}
	
	/**
	 * 에디터의 스킨 리스트를 얻어온다.
	 * 
	 */
	private function getEditorSkinList() {
		// 에디터 스킨 정보 던지기
		$oEditorModel = &getModel('editor');
		$editorSkinList = $oEditorModel->getEditorSkinList();
		return $editorSkinList;
	}
}
?>
