/**
 * @auth wndflwr@gmail.com (바람꽃)
 * comment object
 * modules/comments/item.php 참조
 */
function XewallComment() {
	this.isAccessible = false;
	this.isGranted = false;
	this.isEditable = false;
	this.isSecret = false;
	this.useNotify = false;
	this.permanent_url = false;
	this.profile_image = false;
	this.summary = null;
	this.comment_srl = 0;
	this.module_srl = 0;
	this.document_srl = 0;
	this.parent_srl = -1;
	this.is_secret = null;
	this.content = null;
	this.voted_count = null;
	this.blamed_count = null;
	this.notify_message = null;
	this.user_id = null;
	this.user_name = null;
	this.nick_name = null;
	this.member_srl = 0;
	this.email_address = null;
	this.homepage = null;
	this.uploaded_count = null;
	this.regdate = null;
	this.last_update = null;
	this.ipaddress = null;
	this.list_order = null;
	this.depth = null;
	this.thumbnail = null;
}

/**
 * @function setCommentObj
 * @param doc: jQuery DOM object
 * @brief jQuery DOM object를 받아서 해당 객체에 적용시킨다.
 */
XewallComment.prototype.setCommentObj = function(doc) {
	this.isAccessible = Boolean(parseInt(doc.children("isAccessible").text()));
	this.isGranted = Boolean(parseInt(doc.children("isGranted").text()));
	this.isEditable = Boolean(parseInt(doc.children("isEditable").text()));
	this.isSecret = Boolean(parseInt(doc.children("isSecret").text()));
	this.useNotify = Boolean(parseInt(doc.children("useNotify").text()));
	this.permanent_url = doc.children("permanent_url").text();
	this.profile_image = doc.children("profile_image").text();
	this.summary = doc.children("summary").text();
	this.comment_srl = parseInt(doc.children("comment_srl").text());
	this.module_srl = parseInt(doc.children("module_srl").text());
	this.document_srl = parseInt(doc.children("document_srl").text());
	this.parent_srl = parseInt(doc.children("parent_srl").text());
	this.is_secret = doc.children("is_secret").text();
	this.content = doc.children("content").text();
	this.voted_count = parseInt(doc.children("voted_count").text());
	this.blamed_count = parseInt(doc.children("blamed_count").text());
	this.notify_message = doc.children("notify_message").text();
	this.user_id = doc.children("user_id").text();
	this.user_name = doc.children("user_name").text();
	this.nick_name = doc.children("nick_name").text();
	this.member_srl = parseInt(doc.children("member_srl").text());
	this.email_address = doc.children("email_address").text();
	this.homepage = doc.children("homepage").text();
	this.uploaded_count = parseInt(doc.children("uploaded_count").text());
	this.regdate = doc.children("regdate").text();
	this.last_update = doc.children("last_update").text();
	this.ipaddress = doc.children("ipaddress").text();
	if (doc.children("depth").text().length === 0)
		this.depth = 0;
	else
		this.depth = parseInt(doc.children("depth").text());
	this.thumbnail = doc.children("thumbnail").text();
};


/**
 * @function setInfoToDomObj
 * @param domObj: jQuery DOM object.
 * @brief HTML DOM을 받아서 현 객체의 모든 정보를 DOM HTML에 넣기
 */
XewallComment.prototype.setInfoToDomObj = function($domObj) {
	$domObj.attr("module_srl", this.module_srl).attr("document_srl", this.document_srl)
			.attr("comment_srl", this.comment_srl).attr("parent_srl", this.parent_srl)
			.attr("regdate", this.regdate).attr('depth', this.depth);
	
	$domObj.css("display", "block");
	$domObj.addClass("parent_srl_" + this.parent_srl);
	$domObj.addClass("comment_srl_" + this.comment_srl).addClass("comment").removeClass("comment_ori");
	$domObj.find(".comm_reg_date")
			.text(this.regdate.substr(0, 4) + "-" + this.regdate.substr(4, 2) + "-" + this.regdate.substr(6, 2))
			.attr("title", this.regdate.substr(8, 2) + ":" + this.regdate.substr(10, 2) + ":" + this.regdate.substr(12, 2));
	$domObj.find(".blamed_count_num").text(Math.abs(this.blamed_count));
	$domObj.find(".voted_count_num").text(this.voted_count);
	$domObj.find(".comm_nick_name").addClass("member_" + this.member_srl).text(this.nick_name);
	$domObj.find(".comm_content").html(this.content);
	$domObj.find(".comm_ip").text(this.ipaddress);
	$domObj.find(".comm_last_update").text(this.last_update);
	$domObj.find('.comm_thumbnail').find('img').attr('src', this.thumbnail);
	// 프로파일 이미지
	if (!this.profile_image) {
		$domObj.find(".comm_profile_image").attr("src", "./modules/xewall/skins/default/img/anonymous.jpg");
	} else {
		$domObj.find(".comm_profile_image").attr("src", this.profile_image);
	}
	// content, summary 적용
	$domObj.find(".comm_content").html(this.content);
	$domObj.find(".comm_summary > .summary").html(this.summary);
	
	// depth 가 0인 경우만 "댓글달기" 버튼을 보이도록 한다. -> 이것 역시 policy 문제... 다중 depth를 표현할 것인가...?
	if (this.depth) {
		$domObj.css("margin-top", 0);
		$domObj.css("margin-left", (20 * this.depth) + "px");
	}
	
	// isEditable일때만 "수정", "삭제" 버튼 보이기
	if (!this.isEditable) {
		$domObj.find(".comm_modify").hide();
		$domObj.find(".comm_modify + .comm_division:first").hide();
		$domObj.find(".comm_delete").hide();
		$domObj.find(".comm_delete + .comm_division:first").hide();
	}
};