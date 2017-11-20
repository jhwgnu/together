/**
 * @auth wndflwr@gmail.com (바람꽃)
 * document object.
 * modules/documents/item.php 참조
 */
function XewallDocument() {
	this.isGranted = false;
	this.isAccessible = false;
	this.isEditable = false;
	this.document_srl = 0;
	this.module_srl = 0;
	this.category_srl = 0;
	this.category = null;
	this.lang_code = null;
	this.is_notice = false;
	this.title = null;
	this.summary = null;
	this.content = null;
	this.readed_count = null;
	this.voted_count = null;
	this.blamed_count = null;
	this.comment_count = null;
	this.uploaded_count = null;
	this.user_id = null;
	this.user_name = null;
	this.nick_name = null;
	this.member_srl = 0;
	this.regdate = null;
	this.regdateObj = null;
	this.last_update = null;
	this.last_updateObj = null;
	this.last_updater = null;
	this.ipaddress = null;
	this.status = null;
	this.comment_status = null;
	this.browser_title = null;
	this.profile_image = null;
	this.thumbnail = null;
	this.extraImages = null;
	this.comments = new Array();
	this.isEnableComment = null;
}


/**
 * @function setDocumentObj
 * @params doc: jQuery DOM object
 * @brief 서버에서 XML데이터를 받아서 이 객체에 정보 업데이트 한다.
 */
XewallDocument.prototype.setDocumentObj = function(doc) {
	if (parseInt(doc.children("isGranted").text()))
		this.isGranted = true;
	else
		this.isGranted = false;
	if (parseInt(doc.children("isAccessible").text()))
		this.isAccessible = true;
	else
		this.isAccessible = false;
	if (parseInt(doc.children("isEditable").text()) == 1)
		this.isEditable = true;
	else
		this.isEditable = false;
	this.document_srl = parseInt(doc.children("document_srl").text());
	this.module_srl = parseInt(doc.children("module_srl").text());
	this.category_srl = parseInt(doc.children("category_srl").text());
	if (this.category_srl != "") {
		this.category_srl = doc.children("category").text();
		this.category = doc.children("category").text();
	}
	this.lang_code = doc.children("lang_code").text();
	this.is_notice = doc.children("is_notice").text();
	if (doc.children("is_notice").text() == "Y")
		this.is_notice = true;
	else
		this.is_notice = false;
	this.title = doc.children("title").text();
	this.summary = doc.children("summary").text();
	this.readed_count = parseInt(doc.children("readed_count").text());
	this.voted_count = parseInt(doc.children("voted_count").text());
	this.blamed_count = parseInt(doc.children("blamed_count").text());
	this.comment_count = parseInt(doc.children("comment_count").text());
	this.uploaded_count = parseInt(doc.children("uploaded_count").text());
	this.user_id = doc.children("user_id").text();
	this.user_name = doc.children("user_name").text();
	this.nick_name = doc.children("nick_name").text();
	this.member_srl = parseInt(doc.children("member_srl").text());
	this.regdate = doc.children("regdate").text();
	this.last_update = doc.children("last_update").text();
	this.last_updater = doc.children("last_updater").text();
	this.ipaddress = doc.children("ipaddress").text();
	this.status = doc.children("status").text();
	this.comment_status = doc.children("comment_status").text();
	this.profile_image = doc.children("profile_image").text();
	if (doc.children("thumbnail").length) {
		this.thumbnail = doc.children("thumbnail").text();
	}
	this.browser_title = doc.children("browser_title").text();
	this.extraImages = doc.children("extraImages").text();
	// text로 된 extraImages 들을 이미지 아이콘(태그)으로 대치
	this.extraImages = XewallDocument.prototype.swapExtraImages(this.extraImages);
	// 시간->객체로 변환
	this.regdateObj = XewallDocument.prototype.getTimeObj(this.regdate);
	this.last_updateObj = XewallDocument.prototype.getTimeObj(this.last_update);
	// content를 받아왔다면 얻기
	if (doc.children("content").text()) {
		this.content = doc.children("content").text();
	}
};


/**
 * @function getTimeObj
 * @param[String] timeString 반드시 YYMMDDHHIISS 형식이어야 한다.
 * @brief XE에서 쓰는 YYMMDDHHIISS 형식을 자바스크립트의 Date() 오브젝트로 변환
 */
XewallDocument.prototype.getTimeObj = function(timeString) {
	var Y = parseInt(timeString.substring(0, 4));
	var M = parseInt(timeString.substring(4, 6));
	var D = parseInt(timeString.substring(6, 8));
	var H = parseInt(timeString.substring(8, 10));
	var I = parseInt(timeString.substring(10, 12));
	var S = parseInt(timeString.substring(12, 14));
	
	var date = new Date(Y, M, D, H, I, S);
	return date;
};


/**
 * @function swapExtraImages
 * @param[String] extraImagesString
 * @brief new, file, update ... 등과 같은 텍스트를 아이콘 모양의 이미지 태그로 바꿔준다. (replace)
 * [file, secret, new, update]
 */
XewallDocument.prototype.swapExtraImages = function(extraImagesString) {
	var result = extraImagesString;
	
	result = result.replace("file", "<img src=\"./modules/xewall/skins/default/img/file.gif\"/>");
	result = result.replace("secret", "<img src=\"./modules/xewall/skins/default/img/secret.gif\"/>");
	result = result.replace("image", "<img src=\"./modules/xewall/skins/default/img/image.gif\"/>");
	result = result.replace("movie", "<img src=\"./modules/xewall/skins/default/img/movie.gif\"/>");
	result = result.replace("new", "<img src=\"./modules/xewall/skins/default/img/new.gif\"/>");
	result = result.replace("update", "<img src=\"./modules/xewall/skins/default/img/update.gif\"/>");
	
	return result;
};


/**
 * HTML DOM 객체를 받아서 해당 DOM에 이 객체의 정보를 업데이트 한다.
 */
XewallDocument.prototype.setInfoToDomObj = function($domObj) {
	
	// 이 문서의 배경 색깔을 설정한다.
	$domObj.css("background-color", "#" + xewall.colors[this.module_srl]);
	$domObj.attr("document_srl", this.document_srl).attr("module_srl", this.module_srl)
			.attr("regdate", this.regdate).attr("last_update", this.last_update);
	
	$domObj.addClass("document_srl_" + this.document_srl);
	$domObj.find(".profile_image").attr("src", this.profile_image);
	$domObj.find(".user_name").text(this.user_name);
	$domObj.find(".nick_name").addClass("member_" + this.member_srl).text(this.nick_name);
	if (this.category_srl != "") {
		$domObj.find(".category").text(this.category).show();
	} else {
		$domObj.find(".category").text("").hide();
	}
	$domObj.find("span.title").text(this.title);
	$domObj.find(".summary_inner").html(this.summary);
	
	$domObj.find(".readed_count").text(this.readed_count);
	$domObj.find(".voted_count_num").text(this.voted_count);
	$domObj.find(".blamed_count_num").text(Math.abs(this.blamed_count));
	$domObj.find(".comment_count").text(this.comment_count);
	$domObj.find(".regdate").text(this.regdate.substr(0, 4) + "-" + this.regdate.substr(4, 2) + "-" + this.regdate.substr(6, 2))
			.attr("title", this.regdate.substr(8, 2) + ":" + this.regdate.substr(10, 2) + ":" + this.regdate.substr(12, 2));
	
	$domObj.find(".browser_title").text(this.browser_title);
	$domObj.find(".extraImages").html(this.extraImages);
	$domObj.find(".ipaddress").text(this.ipaddress);
	if (this.thumbnail) {
		$domObj.find(".thumbnail").children("img").attr("src", this.thumbnail);
		// 썸네일이 보이는 경우에만 보이고 보이지 않는 경우는 그냥 넘어가기
		if ($domObj.find(".thumbnail").css("display") != "none") {
			$domObj.find(".thumbnail").show();
		}
	} else {
		$domObj.find(".thumbnail").remove();
	}
	if (!this.isEditable) {
		$domObj.find(".delete_pre").remove();
		$domObj.find(".delete").remove();
		$domObj.find(".delete_confirm").remove();
		$domObj.find(".modify").remove();
		$domObj.find(".modify_form").remove();
	}
	if (!$domObj.find(".content").children().length && this.content)
		$domObj.find(".content").html(this.content);
};