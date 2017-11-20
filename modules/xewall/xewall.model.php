<?php
/**
 * @class  xewallModel
 * @author 바람꽃 (wndflwr@gmail.com)
 * @brief  xewall 모듈의 Model class
 **/

class xewallModel extends xewall {
	/**
	 * @brief 초기화
	 **/
	function init() {
		require_once('modules/comment/comment.item.php');
		$response_type = strtoupper(Context::get('response_type'));
		// 기본 response를 xml로 던진다.
		if ($response_type == "JSON")
			Context::setRequestMethod('JSON');
		else
			Context::setRequestMethod('XMLRPC');
	}
	

	function getXewallTest() {
	}
	
	/**
	 * @function getXewallDocumentList
	 * @brief 문서 목록을 불러온다.
	 */
	function getXewallDocumentList() {
		// 목록을 구하기 위한 대상 모듈/ 페이지 수/ 목록 수/ 페이지 목록 수에 대한 옵션 설정
		$args->module_srl = Context::get('module_srl');
		$args->page = Context::get('page');
		$args->list_count = Context::get('list_count');
		$args->sort_index = Context::get('sort_index');
		$args->page_count = Context::get('page_count');
		$args->order_type = 'asc';
		$args->division = -2100000000;
		$args->last_division = 0;
		
		$queryColumnList = array('document_srl');
		$columnList = array('document_srl', 'module_srl', 'category_srl', 'lang_code', 'is_notice', 'title', 'content', 'readed_count', 'voted_count', 'blamed_count', 'comment_count', 'uploaded_count', 'user_id', 'user_name', 'nick_name', 'member_srl', 'regdate', 'last_update', 'last_updater', 'ipaddress', 'status', 'comment_status');
		$moduleColumnList = array('module_srl', 'module', 'mid', 'browser_title');
		
		$output = executeQueryArray('xewall.getDocumentList', $args, $queryColumnList);
		
		if (!$output->toBool())
			return $output;
		$logged_info = Context::get('logged_info');
		$oDocumentModel = &getModel('document');
		$oModuleModel = &getModel('module');
		$oModuleAdminModel = &getAdminModel('module');
		$documentList = array();
		
		$module_config = $oModuleModel->getModuleConfig('xewall');
		if (!$module_config->doc_summary) $module_config->doc_summary = 500;
		if (!$module_config->doc_more) $module_config->doc_more = ' (more...)';
		
		foreach ($output->data as $key => $val) {
			$documentItem = $oDocumentModel->getDocument($val->document_srl, false, false, $columnList);
			// 권한이 없거나, 존재하지 않거나, 비밀글일 경우 정보 표시하지 않는다.
			$module_info = $oModuleModel->getModuleInfoByModuleSrl($documentItem->get('module_srl'), $moduleColumnList);
			$grant = $oModuleModel->getGrant($module_info, $logged_info);
			if (!$grant->view || !$documentItem->isExists() || $documentItem->isSecret()) {
				continue;
			}
			// 카테고리(분류)가 있다면 추가시켜주기
			if ($documentItem->get('category_srl')) {
				$category_list = $oDocumentModel->getCategoryList($documentItem->get('module_srl'));
				$documentList[$key]['category'] = $category_list[$documentItem->get('category_srl')]->title;
			}
			// documentItem의 isGranted 못 믿겠다. 직접 만들기
			if ($documentItem->get('member_srl') == $logged_info->member_srl || $logged_info->is_admin == 'Y')
				$documentList[$key]['isGranted'] = 1;
			else 
				$documentList[$key]['isGranted'] = 0;
			$documentList[$key]['isAccessible'] = (integer)$documentItem->isAccessible();
			$documentList[$key]['isEditable'] = (integer)$documentItem->isEditable();
			$documentList[$key]['ipaddress'] = $documentItem->getIpAddress();
			$documentList[$key]['summary'] = $this->getSummary($documentItem->getContent(false, false), $module_config->doc_summary, $module_config->doc_more);
			$documentList[$key]['user_name'] = $documentItem->getUserName();
			$documentList[$key]['user_id'] = $documentItem->getUserID();
			$documentList[$key]['nick_name'] = $documentItem->getNickName();
			$documentList[$key]['title'] = $documentItem->getTitleText();
			$documentList[$key]['permanent_url'] = $documentItem->getPermanentUrl();
			$documentList[$key]['profile_image'] = $documentItem->getProfileImage();
			$documentList[$key]['extraImages'] = $documentItem->getExtraImages();
			if ($documentList[$key]['profile_image'] == '')
				$documentList[$key]['profile_image'] = $this->module_path.'skins/default/img/anonymous.jpg';
			if ($documentItem->thumbnailExists()) {
				$documentList[$key]['thumbnailExists'] = 1;
				$documentList[$key]['thumbnail'] = $documentItem->getThumbnail();
			} else {
				$documentList[$key]['thumbnailExists'] = 0;
			}
			if (substr($module_info->browser_title, 0, 12) == '$user_lang->') {
				$tmp = $oModuleAdminModel->getLangCode(0, $module_info->browser_title);
				$documentList[$key]['browser_title'] = $tmp[Context::getLangType()];
			} else {
				$documentList[$key]['browser_title'] = $module_info->browser_title;
			}
			unset($documentItem->variables['content']);
			unset($documentItem->variables['title']);
			unset($documentItem->variables['ipaddress']);
			unset($documentItem->variables['user_name']);
			unset($documentItem->variables['nick_name']);
			unset($documentItem->variables['user_id']);
			foreach ($documentItem->variables as $k => $v) {
				$documentList[$key][$k] = $documentItem->get($k);
			}
		}
		$this->add('documentList', $documentList);
		$this->add('page', $args->page);
		
		return;
	}
	
	/**
	 * @function getXewallDocument
	 * @param document_srl[int]
	 * @brief getXewallDocumentList가 문서의 목록을 가지고 왔다면
	 * getXewallDocument는 하나의 문서 객체를 받아서 리턴한다.
	 * 시간 나면 getXewallDocumentList를 getXewallDocument를 이용하여 구현하도록 한다.
	 */
	function getXewallDocument() {
		$document_srl = Context::get('document_srl');
		if (Context::get('include_content') == 'true') {
			$include_content = true;
		}
		elseif (Context::get('include_content') == 'false') {
			$include_content = false;
		} else {
			$include_content = false;
		}
		$output = $this->_getXewallDocument($document_srl, $include_content);
		$this->add('document', $output->variables);
	}
	
	/**
	 * @function _getXewallDocument
	 * @brief getXewallDocument의 core함수
	 * 다른 모듈에서도 쓸 수 있도록 여지를 남기기
	 */
	function _getXewallDocument($document_srl, $include_content = false) {
		$oModuleModel = &getModel('module');
		$oModuleAdminModel = &getAdminModel('module');
		
		$columnList = array('document_srl', 'module_srl', 'category_srl', 'lang_code', 'is_notice', 'title', 'content', 'readed_count', 'voted_count', 'blamed_count', 'comment_count', 'uploaded_count', 'user_id', 'user_name', 'nick_name', 'member_srl', 'regdate', 'last_update', 'last_updater', 'ipaddress', 'status', 'comment_status');
		$logged_info = Context::get('logged_info');
		$oDocumentModel = &getModel('document');
		$moduleColumnList = array('module', 'mid', 'module_srl', 'browser_title');
		$output = new Object();
		$is_admin = false;
		
		$module_config = $oModuleModel->getModuleConfig('xewall');
		if (!$module_config->doc_summary) $module_config->doc_summary = 500;
		if (!$module_config->doc_more) $module_config->doc_more = ' (more...)';
		
		if ($logged_info->is_admin == 'Y') $is_admin = true;
		$documentItem = $oDocumentModel->getDocument($document_srl, $is_admin, false, $columnList);
		
		// 권한 검사
		if (!$documentItem->isAccessible() || !$documentItem->isExists() || $documentItem->isSecret()) {
			return new Object(-1, 'msg_not_permitted');
		}
		
		// content를 불러오는 거라면 readed_count 올리기
		if ($include_content) {
			$documentItem->updateReadedCount();
		}
		
		// 카테고리(분류)가 있다면 추가시켜주기
		if ($documentItem->get('category_srl')) {
			$category_list = $oDocumentModel->getCategoryList($documentItem->get('module_srl'));
			$output->add('category', $category_list[$documentItem->get('category_srl')]->title);
		}
		
		// isGranted 못 믿겠음.
		if ($logged_info->member_srl == $documentItem->get('member_srl') || $logged_info->is_admin == 'Y')
			$output->add('isGranted', 1);
		else
			$output->add('isGranted', 0);
		//$output->add('isGranted', (integer)$documentItem->isGranted());
		$output->add('isAccessible', (integer)$documentItem->isAccessible());
		$output->add('isEditable', (integer)$documentItem->isEditable());
		$output->add('ipaddress', $documentItem->getIpAddress());
		$output->add('summary', $this->getSummary($documentItem->getContent(false, false), $module_config->doc_summary, $module_config->doc_more));
		$output->add('title', $documentItem->getTitleText());
		$output->add('user_name', $documentItem->getUserName());
		$output->add('user_id', $documentItem->getUserID());
		$output->add('nick_name', $documentItem->getNickName());
		$output->add('permanent_url', $documentItem->getPermanentUrl());
		$output->add('profile_image', $documentItem->getProfileImage());
		$output->add('extraImages', $documentItem->getExtraImages());
		if ($output->get('profile_image') == '')
			$output->add('profile_image', $this->module_path.'skins/default/img/anonymous.jpg');
		if ($documentItem->thumbnailExists()) {
			$output->add('thumbnailExists', 1);
			$output->add('thumbnail', $documentItem->getThumbnail());
		} else {
			$output->add('thumbnailExists', 0);
		}
		if ($include_content) {
			$output->add('content', $documentItem->getContent(false, false, false, true, false));
		}
		
		$module_info = $oModuleModel->getModuleInfoByModuleSrl($documentItem->get('module_srl'), $moduleColumnList);
		if (substr($module_info->browser_title, 0, 12) == '$user_lang->') {
			$tmp = $oModuleAdminModel->getLangCode(0, $module_info->browser_title);
			$output->add('browser_title', $tmp[Context::getLangType()]);
		} else {
			$output->add('browser_title', $module_info->browser_title);
		}
		unset($documentItem->variables['content']);
		unset($documentItem->variables['title']);
		unset($documentItem->variables['ipaddress']);
		unset($documentItem->variables['user_name']);
		unset($documentItem->variables['nick_name']);
		unset($documentItem->variables['user_id']);
		
		foreach ($documentItem->variables as $k => $v) {
			$output->add($k, $documentItem->get($k));
		}
		
		return $output;
	}

	
	/**
	 * @function getXewallDocumentContent
	 * @param[int] document_srl
	 * @brief document_srl을 받아서 해당 document의 content를 받는다.
	 */
	function getXewallDocumentContent() {
		$document_srl = Context::get('document_srl');
		$oDocumentModel = &getModel('document');
		$logged_info = Context::get('logged_info');
		$columnList = array('document_srl', 'content', 'category_srl', 'title');
		$oDocument = $oDocumentModel->getDocument($document_srl, $logged_info->is_admin, false, $columnList);
		$this->add('content', $oDocument->getContent(false, false, false, false, false));
		$this->add('title', $oDocument->getTitleText());
		$this->add('category_srl', $oDocument->get('category_srl'));
		return;
	}
	
	
	/**
	 * @function getXewallNextSequence
	 * @brief 단순히 getNextSequence() 함수 결과 값을 돌려준다.
	 * TODO(생각해 보기): 단순히 이 함수를 메크로 등을 사용해서 무한으로 부르는 해킹 수법이 있을수도 있다. 막는 방법 강구해보기
	 */
	function getXewallNextSequence() {
		$sequence = getNextSequence();
		$this->add('sequence', $sequence);
	}
	
	
	/**
	 * @function getXewallEditor
	 * @param[string] editor_type = SIMPLE || FULL
	 * @param[int] document_srl
	 * @param[int] editor_sequence
	 * @brief module_srl을 받아서 해당 모듈에 글을 쓸 수 있는 모듈을 생성한다.
	 * document_srl이 존재할 경우 수정작업
	 */
	function getXewallEditor() {
		$editor_type = Context::get('editor_type');
		$call_type = Context::get('call_type');
		$option = null;
		$option->editor_sequence = Context::get('editor_sequence');
		if (!$option->editor_sequence || $option->editor_sequence == 0) {
			$option->editor_sequence = getNextSequence();
		}
		$option->upload_target_srl = $option->editor_sequence;
		$oEditorModel = &getModel('editor');
		
		// primary_key_name을 정한다.
		if ((int)$call_type == 0 || (int)$call_type == 1) {
			$option->primary_key_name = 'document_srl';
		} else {
			$option->primary_key_name = 'comment_srl';
		}
		// 풀 에디터를 불러올 경우
		if ($editor_type == 'FULL') {
			$oModuleModel = &getModel('module');
			$config = $oModuleModel->getModuleInfoByModuleSrl(Context::get('module_srl'));
			$option->content_key_name = 'content';
			$option->allow_fileupload = $config->allow_fileupload == 'Y' ? true : false;
			$option->enable_autosave = $config->enable_autosave == 'Y' ? true : false;
			$option->enable_default_component = $config->enable_default_component == 'Y' ? true : false;
			$option->enable_component = $config->enable_component == 'Y' ? true : false;
			$option->resizable = $config->resizable == 'Y' ? true : false;
			$option->disable_html = $config->disable_html == 'Y' ? true : false;
			$option->height = $config->height;
			$option->skin = $config->editor_skin;
			//$option->colorset = $config->colorset;
			$editor = $oEditorModel->getEditor($option->editor_sequence, $option);
		}
		// 간단한 에디터를 불러올 경우
		else {
			$option->skin = 'xpresseditor';
			$option->content_style = 'default';
			$option->content_key_name = 'content';
			$option->allow_fileupload = false;
			$option->enable_autosave = false;
			$option->enable_default_component = false;
			$option->enable_component = false;
			$option->resizable = false;
			$option->disable_html = true;
			$option->height = 60;
			$option->colorset = "white_text_nohtml";
			$editor = $oEditorModel->getEditor($option->editor_sequence, $option);
		}
		// CDATA 태그 문자열 제거
		$editor = str_replace("//<![CDATA[", "", $editor);
		$editor = str_replace("//]]>", "", $editor);
		$this->add('editor', $editor);

		$this->add('upload_target_srl', $option->editor_sequence);
		
		// TODO dreditor 에 대한 대응도 마련한다.
	}

	/**
	 * @function getMyListen
	 * @brief 사용자가 듣고자 설정한 게시판의 리스트를 불러온다.
	 * @return Array()
	 */
	function getMyListen() {
		$logged_info = Context::get('logged_info');
		
		// 로그인 하지 않았으면 취소
		if (!$logged_info) {
			return array();
		}
		
		$args->member_srl = $logged_info->member_srl;
		$output = executeQueryArray('xewall.getFavouriteOfMe', $args);
		
		$listenList = array();
		$oModuleModel = &getModel('module');
		foreach ($output->data as $key => $val) {
			$listenList[$val->target_srl] = $oModuleModel->getModuleInfoByModuleSrl($val->target_srl);
		}
		return $listenList;
	}
	
	
	/**
	 * @function getXewallUpdateList
	 * @brief 최근 문서목록을 불러온다. 리턴되는 값은 document_srl, last_update이다.
	 * sort_index와 order_type, list_count 들은 추후 관리자 페이지에서 설정할 수 있도록 한다.
	 */
	function getXewallUpdateList() {
		$args->sort_index = 'list_order';
		$args->order = 'asc';
		$args->page = 1;
		$args->list_count = Context::get('list_count');
		$args->module_srl = Context::get('module_srl');
		// 최적의 속도를 위해서 원래의 쿼리 대신 새 쿼리를 만들어서 사용
		$output = executeQueryArray('xewall.getDocumentUpdateList', $args);
		if ($output->error) return $output;
		$this->add('update_list', $output->data);
	}
	
	/**
	 * XE에서 기본 제공하는 comment.model.php의 getCommentList 함수는 댓글을 reverse로 불러올 수 없다.
	 * 그래서 뒤에서부터 댓글을 불러오는 imitation을 제작
	 * CacheControl지원하기
	 * @param int $document_srl
	 * @param int $page
	 * @param bool $is_admin
	 * @param int $count
	 * @return object
	 */
	private function getReverseCommentList($document_srl, $page = 0, $is_admin = false, $count = 0) {
		if (!isset($document_srl)) {
			return;
		}
		// cache controll
		$oCacheHandler = CacheHandler::getInstance("object");
		if ($oCacheHandler->isSupport()) {
			$object_key = "object:" . $document_srl . "_" . $page . "_" . ($is_admin ? "Y" : "N") . "_" . $count;
			$cache_key = $oCacheHandler->getGroupKey("commentList_" . $document_srl, $object_key);
			$output = $oCacheHandler->get($cache_key);
		}
		if ($output) {
			return $output;
		}
		// get the number of comments on the document module
		$oDocumentModel = &getModel("document");
		$columnList = array("document_srl", "module_srl", "comment_count");
		$oDocument = $oDocumentModel->getDocument($document_srl, false, true, $columnList);
		
		// return if no doc exists.
		if (!$oDocument->isExists()) {
			return;
		}
		
		// return if no comment exists
		if ($oDocument->getCommentCount() < 1) {
			return;
		}
		
		// get a list of comments
		$module_srl = $oDocument->get("module_srl");
		
		$oCommentModel = &getModel("comment");
		
		if ($count == 0) {
			$comment_config = $oCommentModel->getCommentConfig($module_srl);
			$comment_count = $comment_config->comment_count;
			if (!$comment_count) {
				$comment_count = 50;
			}
		} else {
			$comment_count = $count;
		}
		
		$args = new stdClass();
		$args->document_srl = $document_srl;
		$args->list_count = $comment_count;
		$args->page = $page;
		$args->page_count = 10;
		
		// check if module is using validation system (관리자 승인 후 댓글 공개라면)
		$oCommentController = &getController("comment");
		$using_validation = $oCommentController->isModuleUsingPublishValidation($module_srl);
		if ($using_validation) {
			$args->status = 1;
		}
		$output = executeQueryArray("xewall.getCommentPageListReversed", $args); // 댓글을 역순으로 들고온다.
		
		// returns if error
		if (!$output->toBool()) {
			return;
		}
		
		// insert data into CommentPageList table if the number of results is different from stored comments
		if (!$output->data) {
			$oCommentModel->fixCommentList($oDocument->get("module_srl"), $document_srl);
			$output = executeQueryArray("xewall.getCommentPageListReversed", $args);
			if (!$output->toBool()) {
				return;
			}
		}
		// insert into cache
		if ($oCacheHandler->isSupport()) {
			$oCacheHandler->put($cache_key, $output);
		}
		return $output;
	}
	
	
	/**
	 * @function getXewallCommentList
	 * @param document_srl[int]
	 * @param page[int] 댓글이 페이징 될 때 페이지
	 * @param count[int] 댓글의 list_count
	 * @brief 해당 document_srl의 댓글들의 리스트들을 불러온다.
	 */
	function getXewallCommentList() {
		// request 값 받기
		$document_srl = Context::get('document_srl');
		$page = Context::get('page');
		$count = Context::get('count');
		$logged_info = Context::get('logged_info');
		
		// 필요한 값이 없으면 취소
		if (!$document_srl) {
			$this->setError(-1);
			$this->setMessage('msg_invalid_request');
			return;
		}
		
		// 필요한 객체 선언
		$oModuleModel = &getModel('module');
		
		// 권한 확인, 권한이 없으면 취소
		$module_info = $oModuleModel->getModuleInfoByDocumentSrl($document_srl);
		$grant = $oModuleModel->getGrant($module_info, $logged_info);
		if (!$grant->view) return new Object(-1, 'msg_not_permitted');
		unset($module_info);
		
		$is_admin = false;
		if ($logged_info->is_admin == 'Y') $is_admin = true;
		
		if (!$page) $page = 1;
		if (!$count) $count = 10;
		
		// 해당 문서에 달린 모든 댓글 불러오기
		$comments = $this->getReverseCommentList($document_srl, $page, $is_admin, $count);
		
		// 문서가 존재하지 않으면 null 이 돌아오고 댓글이 있으면 query Object() 가 돌아온다.
		if (!$comments) {
			$this->setError(-1);
			$this->setMessage('msg_invalid_request');
			return;
		}
		// 에러가 있다면 취소
		if ($comments->error) {
			$this->setError($comments->error);
			$this->setMessage($comments->message);
			return;
		}
		
		// 댓글 정리해서 보내기
		foreach ($comments->data as $key => $val) {
			
			// 해당 리스트의 comment객체를 xewall에서 쓸 Array 객체로 정리해서 불러오기
			$comment = $this->_getComment($val->comment_srl);
			$comment['depth'] = $val->depth;
			$comment['parent_srl'] = $val->parent_srl;
			
			// 데이터 
			$commentList[$key] = $comment;
			unset($comment);
		}
		
		$this->add('comments', $commentList);
		
		// pagivigation info
		$this->add('page_navigation', get_object_vars($comments->page_navigation));
	}
	
	
	private function getCommentThumbnail($comment) {
		
	}
	
	
	
	/**
	 * @function getXewallComment
	 * @brief 댓글 하나의 정보를 불러온다.
	 * @param[int] $comment_srl
	 * @param[boolean] $include_content : true 이면 content 내용까지 같이 보내기
	 */
	function getXewallComment() {
		
		// request 값 받기
		$comment_srl = Context::get('comment_srl');
		$logged_info = Context::get('logged_info');
		
		// boolean 변수 정리
		if (Context::get('include_content') == 'true') {
			$include_content = true;
		} elseif (Context::get('include_content') == 'false') {
			$include_content = false;
		} else {
			$include_content = false;
		}
		if ($logged_info->is_admin != 'N')
		$logged_info->is_admin = true;
		else
		$logged_info->is_admin = false;
		
		// 필요 객체 선언
		$oModuleModel = &getModel('module');
		
		// commentItem을 xewall에 맞는 Array() 객체로 변환해서 받아온다.
		$comment = $this->_getComment($comment_srl);
		
		// $include_content 여부...
		if (!$include_content) unset($comment['content']);
		
		$this->add('comment', $comment);
	}
	
	
	/**
	 * @function _getComment
	 * @brief comment 객체를 받아서 xewall에서 쓰기 알맞은 객체로 바꿔 들고오기
	 * @param [int] $comment_srl
	 * @param [boolean] $include_content
	 * @param [boolean] $is_admin
	 * @param [boolean] $get_depth : true 일 경우 depth를 추가적으로 구해오기
	 * @return Array
	 */
	function _getComment($comment_srl, $include_content = false, $is_admin = false, $get_depth = false) {
		// 필요 객체 선언
		$oCommentModel = &getModel('comment');
		
		// comment 객체 얻기
		$oComment = $oCommentModel->getComment($comment_srl, $is_admin);
		
		// 확인 작업
		if (!$oComment->isExists()) return null;
		
		// 설정 값 받아오기
		$oModuleModel = &getModel('module');
		$module_config = $oModuleModel->getModuleConfig('xewall');
		if (!$module_config->com_summary) $module_config->com_summary = 500;
		if (!$module_config->com_more) $module_config->com_more = ' (more...)';
		
		// 필요한 내용들 넣기
		$a = &$oComment->variables; // alias. copy by reference.
		$a['isAccessible'] = (int)$oComment->isAccessible();
		$a['isGranted'] = (int)$oComment->isGranted();
		$a['isEditable'] = (int)$oComment->isEditable();
		// 비밀글이면 내용 지우기
		if ($oComment->isSecret()) {
			$a['isSecret'] = 1;
			$a['content'] = "secret";
			$a['user_id'] = "secret";
			$a['nick_name'] = "secret";
			$a['member_srl'] = 0;
			$a['email_address'] = "secret@secret.com";
			$a['homepage'] = "www.secret.com";
			$a['ipaddress'] = "from somewhere";
		} else {
			$a['isSecret'] = 0;
			$a['content'] = $oComment->getContent(false, false, false);
		}
		$a['useNotify'] = (int)$oComment->useNotify();
		$a['permanent_url'] = $oComment->getPermanentUrl();
		$a['profile_image'] = $oComment->getProfileImage();
		$a['summary'] = $this->getSummary($oComment->getContent(false, false), $module_config->com_summary, $module_config->com_more);
		$a['thumbnail'] = $oComment->getThumbnail();
		
		// 댓글을 추가적으로 구해야 할 경우
		if ($get_depth) {
			$args->comment_srl = $comment_srl;
			$output = executeQueryArray('xewall.getCommentDepth', $args);
			$a['depth'] = $output->data[0]->depth;
		}
		
		// 보안 문제이슈
		$a['user_id'] = $oComment->getUserID();
		$a['user_name'] = $oComment->getUserName();
		$a['nick_name'] = $oComment->getNickName();
		
		// 필요 없는 내용들 지우기
		unset($a['password']);
		
		// copy by value
		$output = $oComment->variables;
		
		unset($oComment);
		
		return $output;
	}
	
	
	
	
	/**
	 * @function getXewallCategoryList
	 * @brief module_srl을 받아서 해당 게시판의 분류 리스트들을 받아온다.
	 */
	function getXewallCategoryList() {
		$module_srl = Context::get('module_srl');
		if (!$module_srl) {
			$this->setError(-1);
			$this->setMessage('msg_invalid_request');
			return false;
		}
		$oDocumentModel = &getModel('document');
		$category_list = $oDocumentModel->getCategoryList($module_srl);
		$this->add('category_list', $category_list);
		$this->add('document_srl', Context::get('document_srl'));
		$this->add('category_srl', Context::get('category_srl'));
	}
	
	
	/**
	 * @function getXewallHeaderFooterText
	 * @brief 각 모듈의 머릿말과 꼬릿말을 불러온다.
	 */
	function getXewallHeaderFooterText() {
		$module_srl = Context::get('module_srl');
		if (!$module_srl) {
			$this->setError(-1);
			$this->setMessage('msg_invalid_request');
			return;
		}
		$oModuleModel = &getModel('module');
		$module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl);
		$this->add('header_text', $module_info->header_text);
		$this->add('footer_text', $module_info->footer_text);
	}
	
	
	/**
	 * @function getSummary
	 * @brief 기존의 document.item.php -> getSummary를 나름 수정했음.
	 * 기존과 다른 점은 엔터키 등을 whitespace 가 아닌 <br/>로 대체한다.
	 * TODO 10줄 이상이면 자르기
	 */
	private function getSummary($content, $str_size = 50, $tail = '(more...)') {
		// For a newlink, inert a <br/>
		$content = preg_replace('!(<br[\s]*/{0,1}>[\s]*)+!is', "&nl;", $content);
		// Replace tags such as </p> , </div> , </li> and others to a <br/>
		$content = str_replace(array('</p>', '</div>', '</li>'), "&nl;", $content);
		// Remove Tags
		$content = preg_replace('!<([^>]*?)>!is','', $content);
		// Replace < , >, "
		$content = str_replace(array('&lt;','&gt;','&quot;','&nbsp;'), array('<','>','"',' '), $content);
		// Delete  a series of whitespaces
		$content = preg_replace('/ ( +)/is', ' ', $content);
		// delete a series of <br/>s to one <br/>
		//$content = preg_replace('/ (&NewLine;+)/is', '<br/>', $content);
		
		// Truncate string
		$content = trim(cut_str($content, $str_size, $tail));
		// Replace back < , <, "
		$content = str_replace(array('<','>','"'),array('&lt;','&gt;','&quot;'), $content);
		// 최성원이 정규식 짬.
		$content = preg_replace('/(&nl;(\s*))+/', '<br/>', $content);
		return $content;
	}
	
	
	/**
	 * 피드들 리스트 불러오기
	 */
	public function getFeedConfigInfo($module_srl) {
		// XE에 존재하는 모든 게시판 불러오기
		$args->modules = "'bodex','beluxe','board'";
		$board_list = executeQueryArray('xewall.getModulesByModuleName', $args);
		
		// 모듈설정정보를 불러와 사용자들이 무조건 듣도록 지정한 게시판들과 사용자들이 선택할 수 있는 게시판 리스트들을 불러온다.
		$oModuleModel = &getModel('module');
		$module_extra_vars = $oModuleModel->getModuleExtraVars(str_replace(',', '', $module_srl));
		$default_module_list = $module_extra_vars[$module_srl]->str_default_module_list;
		$available_module_list = $module_extra_vars[$module_srl]->str_available_module_list;
		$default_module_list = explode(',', $default_module_list);
		$available_module_list = explode(',', $available_module_list);
		
		// $board_list에서 $available_module_list 와 $default_module_list로 데이터 옮기기
		$arrBoardList = array();
		$arrAvaList = array();
		$arrDefList = array();
		foreach ($board_list->data as $key => $val) {
			if (in_array($val->module_srl, $available_module_list)) {
				$arrAvaList[$val->module_srl] = $val;
				unset($board_list->data[$key]);
			}
			if (in_array($val->module_srl, $default_module_list)) {
				$arrDefList[$val->module_srl] = $val;
				unset($board_list->data[$key]);
			}
		}
		
		foreach ($board_list->data as $key => $val) {
			$arrBoardList[$val->module_srl] = $val;
		}
		
		// 결과를 한 곳에 모아서 리턴하기
		$output = array();
		$output['module_list'] = $arrBoardList;
		$output['default_module_list'] = $arrDefList;
		$output['available_module_list'] = $arrAvaList;
		return $output;
	}
	
	
	/**
	 * $module_info 에서 각 모듈의 색상정보를 얻어온다.
	 */
	public function getModuleColorCodeFromModuleInfo($module_info) {
		$available_module_list = explode(",", $module_info->str_available_module_list);
		$available_module_colors = explode(",", $module_info->str_available_module_list_color_code);
		$default_module_list = explode(",", $module_info->str_default_module_list);
		$default_module_colors = explode(",", $module_info->str_default_module_list_color_code);
	
		$xewall_color_config = array();
		foreach ($available_module_list as $index => $module) {
			$xewall_color_config[$module] = $available_module_colors[$index];
		}
		foreach ($default_module_list as $index => $module) {
			$xewall_color_config[$module] = $default_module_colors[$index];
		}
		return $xewall_color_config;
	}
}
?>
