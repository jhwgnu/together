<?php
/**
 * @class  xewallController
 * @author 바람꽃 (wndflwr@gmail.com)
 * @brief  xewall 모듈의 Controller class
 **/

class xewallController extends xewall {

	/**
	 * @brief 초기화
	 **/
	function init() {
	}

	/**
	 * @function procXewallUpdateReadedCount
	 * @param[int] document_srl
	 * @brief 해당하는 document_srl을 가지는 문서에 대하여 조회수를 증가시킨다.
	 */
	function procXewallUpdateReadedCount() {
		$document_srl = Context::get('document_srl');
		$oDocumentModel = &getModel('document');
		$columnList = array('document_srl', 'member_srl', 'ipaddress', 'readed_count');
		$logged_info = Context::get('logged_info');
		$oDocument = $oDocumentModel->getDocument($document_srl, $logged_info->is_admin, false, $columnList);
		$oDocument->updateReadedCount();
	}

	/**
	 * @function procXewallVoteUp
	 * @param[int] target_srl
	 * @brief 해당하는 document_srl의 문서에 추천을 한다.
	 * 만약 사용자가 이 문서에 이미 추천을 했다면 추천 취소
	 */
	function procXewallDocumentVoteUp() {
		$oDocumentController = &getController('document');
		$output = $oDocumentController->procDocumentVoteUp();
		return $output;
	}

	/**
	 * @function procXewallVoteDown
	 * @param[int] target_srl
	 * @brief 해당하는 document_srl의 문서에 비추한다.
	 */
	function procXewallDocumentVoteDown() {
		$args->document_srl = Context::get('target_srl');
		$oDocumentController = &getController('document');
		$output = $oDocumentController->procDocumentVoteDown();
		return $output;
	}

	/**
	 * @function procXewallInsertDocument
	 * @brief 문서 입력 / 수정;  반드시 XMLRPC로 보내주세요.
	 * 그리고 comment_status는 왠만하면 ALLOW로 설정해 줍시다.
	 * @param[int] $module_srl
	 * @param[string] content
	 * @param[string] title
	 * @param[string] comment_status = 'ALLOW'
	 * @param[string] status = 'PUBLIC'
	 * @param[string] allow_trackback = 'N'
	 * @param[string] notify_message = 'N'
	 * @param[int] category_srl
	 */
	function procXewallInsertDocument() {
		$logged_info = Context::get('logged_info');
		// XMLRPC가 아닐 경우 취소
		if (Context::getRequestMethod() != 'XMLRPC') {
			return new Object(-1, 'msg_invalid_request');
		}
		// 글작성시 필요한 변수를 세팅
		$obj = Context::getRequestVars();

		// module_srl이 안넘어 왔다면 취소
		if (!$obj->module_srl) {
			return new Object(-1, 'msg_invalid_module_srl');
		}
		// 타이틀이나 내용이 없다면 기본 값으로 넣기
		if (!$obj->title) $obj->title = 'Untitled';
		if (!$obj->content) $obj->content = $obj->title;

		// 글을 작성하려는 게시판의 모듈 정보 얻어오기
		$oModuleModel = &getModel('module');
		$module_info = $oModuleModel->getModuleInfoByModuleSrl($obj->module_srl);
		if (!$module_info) {
			return new Object(-1, 'msg_invalid_module_srl');
		}
		// 권한(grant) 확인
		$grant = $oModuleModel->getGrant($module_info, $logged_info);
		if (!$grant->write_document) {
			return new Object(-1, 'msg_not_permitted');
		}
		// 게시될 게시물에 대한 세부적인 사항들 설정
		if ($obj->is_notice!='Y' || !$grant->manager) $obj->is_notice = 'N';
		if (!$obj->comment_status) $obj->comment_status = 'ALLOW';
		if (!$obj->status) $obj->status = 'PUBLIC';
		if (!$obj->allow_trackback) $obj->allow_trackback = 'N';
		if (!$obj->notify_message) $obj->notify_message = 'N';
		if (!$obj->allow_comment) $obj->allow_comment = 'Y';
		$obj->commentStatus = $obj->comment_status;
		settype($obj->title, "string");
		// 관리자가 아니라면 게시글 색상/굵기 제거
		if(!$grant->manager) {
			unset($obj->title_color);
			unset($obj->title_bold);
		}
		// document module의 model, controller 객체 생성
		$oDocumentModel = &getModel('document');
		$oDocumentController = &getController('document');

		// 이미 존재하는 글인지 체크
		$oDocument = $oDocumentModel->getDocument($obj->document_srl, $grant->manager);
		// 익명 설정일 경우 여러가지 요소를 미리 제거 (알림용 정보들 제거)
		$bAnonymous = false;
		if($module_info->use_anonymous == 'Y') {
			$obj->password = Context::get('password');
			$obj->notify_message = 'N';
			$module_info->admin_mail = '';
			$obj->member_srl = -1 * $logged_info->member_srl;
			$obj->email_address = $obj->homepage = $obj->user_id = '';
			$obj->user_name = $obj->nick_name = 'anonymous';
			$bAnonymous = true;
			$oDocument->add('member_srl', $obj->member_srl);
		}
		$output = $this->insertDocument($obj, $oDocument, $oDocumentController, $bAnonymous, $module_info);
		if ($output->error == -1) return $output; // 오류 발생시 멈춤
		$this->deleteAutoSavedDocument($oModuleModel); // 에디터 자동저장 내역 삭제
		$this->add('document_srl', $obj->document_srl);
		
		// 성공 메세지 등록
		$this->setMessage($output->result_msg);
	}

	private function insertDocument($obj, $oDocument, $oDocumentController, $bAnonymous, $module_info) {
		// 이미 존재하는 경우 수정
		if($oDocument->isExists() && $oDocument->document_srl == $obj->document_srl) {
			if(!$oDocument->isGranted()) {
				return new Object(-1,'msg_not_permitted');
			}
			$output = $oDocumentController->updateDocument($oDocument, $obj);
			$output->result_msg = 'success_updated';
			return $output;
		}
		// 그렇지 않으면 신규 등록
		else {
			$output = $oDocumentController->insertDocument($obj, $bAnonymous);
			$obj->document_srl = $output->get('document_srl');
			// 문제가 없고 모듈 설정에 관리자 메일이 등록되어 있으면 메일 발송
			if($output->toBool() && $module_info->admin_mail) {
				$this->sendDocumentSuccessMail($obj, $module_info);
			}
			$output->result_msg = 'success_registed';
			return $output;
		}
	}

	private function sendDocumentSuccessMail($obj, $module_info) {
		$oMail = new Mail();
		$oMail->setTitle($obj->title);
		$oMail->setContent(sprintf("From : <a href=\"%s\">%s</a><br/>\r\n%s", getFullUrl('', 'document_srl', $obj->document_srl), getFullUrl('', 'document_srl', $obj->document_srl), $obj->content));
		$oMail->setSender($obj->user_name, $obj->email_address);
		$target_mail = explode(',', $module_info->admin_mail);
		for ($i = 0; $i < count($target_mail); $i++) {
			$email_address = trim($target_mail[$i]);
			if (!$email_address) continue;
			$oMail->setReceiptor($email_address, $email_address);
			$oMail->send();
		}
	}

	private function deleteAutoSavedDocument($oModuleModel) {
		$xewall_module_info = $oModuleModel->getModuleInfoByMid(Context::get('xe_mid'));
		if ($xewall_module_info->enable_autosave != 'Y') {
			return;
		}
		$current_module_srl = Context::get('module_srl');
		Context::set('module_srl', $xewall_module_info->module_srl);
		
		$oEditorController = &getController('editor');
		$oEditorController->deleteSavedDoc();
	
		Context::set('moduel_srl', $current_module_srl);
	}

	/**
	 * @function procXewallInsertComment
	 * @brief 댓글을 삽입한다.
	 * 상당부분을 board.controller.php => procBoardInsertComment()에서 들고왔습니다.
	 */
	function procXewallInsertComment() {
		// 데이터 받기
		$obj = Context::gets('is_new', 'document_srl', 'comment_srl', 'parent_srl', 'content');
		// docuemnt_srl이 없을 경우 취소
		if (!$obj->document_srl) return new Object(-1, 'msg_invalid_request');
		$logged_info = Context::get('logged_info');
		// 댓글을 쓰는 사용자 정보 입력
		$obj->user_name = $logged_info->user_name;
		$obj->nick_name = $logged_info->nick_name;
		$obj->user_id = $logged_info->user_id;
		$obj->email_address = $logged_info->email_address;
		// 권한 체크
		$oModuleModel = &getModel('module');
		$module_info = $oModuleModel->getModuleInfoByDocumentSrl($obj->document_srl);
		// 해당 모듈 정보가 존재하지 않을 경우 취소
		if (!$module_info) return new Object(-1, 'msg_module_not_exists');
		// 권한 얻기
		$grant = $oModuleModel->getGrant($module_info, $logged_info);
		// 권한 체크
		if (!$grant->write_comment) return new Object(-1, 'msg_not_permitted');
		// $obj->module_srl 추가시키기
		$obj->module_srl = $module_info->module_srl;
		// 원글이 존재하는지 체크
		$oDocumentModel = &getModel('document');
		$oDocument = $oDocumentModel->getDocument($obj->document_srl);
		if (!$oDocument->isExists()) return new Object(-1, 'msg_not_permitted');
		// 익명일 경우
		$bAnonymous = false;
		if ($module_info->use_anonymous == 'Y') {
			$obj->notify_message = 'N';
			$module_info->admin_mail = '';
			$obj->member_srl = -1 * $logged_info->member_srl;
			$obj->email_address = $obj->homepage = $obj->user_id = '';
			$obj->user_name = $obj->nick_name = 'anonymous';
			$bAnonymous = true;
		}
		// 본격적으로 댓글 삽입할 준비
		$oCommentModel = &getModel('comment');
		$oCommentController = &getController('comment');
		$output = null;
		// 신규입력시
		if ($obj->is_new == 'true') {
			$output = $this->insertComment($oCommentController, $oCommentModel, $obj, $bAnonymous, $module_info, $oDocument);
		}
		else {
			$output = $this->updateComment($oCommentController, $oCommentModel, $obj, $grant);
		}
		if ($output->error == -1) {
			return $output;
		}
		
		$this->deleteAutoSavedDocument($oModuleModel);
		
		// 업데이트가 완료되었으면 해당 업데이트된 comment정보를 돌려준다.
		$oXewallModel = &getModel('xewall');
		$is_admin = false;
		if ($logged_info->is_admin == 'Y') $is_admin = true;
		$comment = $oXewallModel->_getComment($obj->comment_srl, true, $is_admin, true);
		$this->add('comment', $comment);
	}

	private function updateComment($oCommentController, $oCommentModel, $obj, $grant) {
		$comment = $oCommentModel->getComment($obj->comment_srl, $grant->manager);
		// 업데이트 권한 체크
		if (!$comment->isGranted()) {
			return new Object(-1, 'msg_not_permitted');
		}
		$obj->parent_srl = $comment_parent_srl;
		$output = $oCommentController->updateComment($obj, $grant->manager);
		return $output;
	}

	private function insertComment($oCommentController, $oCommentModel, $obj, $bAnonymous, $module_info, $oDocument) {
		// parent_srl이 있을 경우 부모 댓글이 존재하는지 확인한다.
		if ($obj->parent_srl) {
			// parent_comment 가 존재하는지 확인
			$parent_comment = $oCommentModel->getComment($obj->parent_srl);
			if (!$parent_comment->isExists()) {
				return new Object(-1, 'msg_invalid_request');
			}
			$output = $oCommentController->insertComment($obj, $bAnonymous);
		}
		// parent_srl이 없을 경우 그냥 댓글
		else {
			$output = $oCommentController->insertComment($obj, $bAnonymous);
		}
		// 입력 성공하면 메일 발송. (board.controller=>procBoardInsertComment() 그대로 들고옴)
		if($output->toBool() && $module_info->admin_mail) {
			$this->sendCommentSuccessMail($oDocument, $obj, $module_info);
		}
		return $output;
	}

	private function sendCommentSuccessMail($oDocument, $obj, $module_info) {
		$oMail = new Mail();
		$oMail->setTitle($oDocument->getTitleText());
		$oMail->setContent(sprintf("From : <a href=\"%s#comment_%d\">%s#comment_%d</a><br/>\r\n%s", getFullUrl('','document_srl',$obj->document_srl),$obj->comment_srl, getFullUrl('','document_srl',$obj->document_srl), $obj->comment_srl, $obj->content));
		$oMail->setSender($obj->user_name, $obj->email_address);
		$target_mail = explode(',',$module_info->admin_mail);
		for ($i = 0 ; $i < count($target_mail); $i++) {
			$email_address = trim($target_mail[$i]);
			if (!$email_address) continue;
			$oMail->setReceiptor($email_address, $email_address);
			$oMail->send();
		}
	}

	/**
	 * @function procXewallDeleteDocument()
	 * @brief 문서를 삭제한다.
	 */
	function procXewallDeleteDocument() {
		$document_srl = Context::get('document_srl');
		if (!$document_srl) return new Object(-1, 'msg_invalid_document_srl');
		$logged_info = Context::get('logged_info');
		$oDocumentController = &getController('document');
		$output = $oDocumentController->deleteDocument($document_srl);
		unset($output->variables);
		return $output;
	}

	/**
	 * @function procXewallDeleteComment
	 * @brief 댓글을 삭제한다.
	 */
	function procXewallDeleteComment() {
		$comment_srl = Context::get('comment_srl');
		$logged_info = Context::get('logged_info');
		$is_admin = false;
		if ($logged_info->is_admin == 'Y')
			$is_admin = true;
		else
			$is_admin = false;
		$oCommentController = &getController('comment');
		// 댓글 삭제. 사실은 휴지통으로 옮기기.
		$output = $oCommentController->deleteComment($comment_srl, $is_admin, true);
		return $output;
	}
	
	
	/**
	 * @function procXewallVoteComment
	 * @param[int] target_srl
	 * @brief target_srl을 받아서 해당하는 댓글에게 추천을 한다.
	 */
	function procXewallVoteComment() {
		$oCommentController = &getController('comment');
		$output = $oCommentController->procCommentVoteUp();
		return $output;
	}
	
	
	/**
	 * @function procXewallBlameComment
	 * @param[int] target_srl
	 * @brief target_srl을 받아서 해당하는 댓글에게 비추를 때림
	 * Enter description here ...
	 */
	function procXewallBlameComment() {
		$oCommentController = &getController('comment');
		$output = $oCommentController->procCommentVoteDown();
		return $output;
	}

	/**
	 * 개인 사용자가 xe 담벼락 받아보기
	 */
	function procXewallInsertMyFavourite() {
		$logged_info = Context::get('logged_info');
		$args->target_srl = Context::get('module_srl');
		$args->type = "U";
		$args->member_srl = $logged_info->member_srl;
		$output = executeQuery('xewall.insertFavourite', $args);
		$this->setError($output->error);
		$this->setMessage($output->message);
		return;
	}

	/**
	 * 개인 사용자가 xe 담벼락 받아보기
	 */
	function procXewallDeleteMyFavourite() {
		$logged_info = Context::get('logged_info');
		$args->member_srl = $logged_info->member_srl;
		$args->target_srl = Context::get('target_srl');
		$output = executeQuery('xewall.deleteFavourite', $args);
		$this->setError($output->error);
		$this->setMessage($output->message);
		return;
	}
}
?>
