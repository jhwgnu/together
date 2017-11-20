/**
 * @file MyMethodCall.js
 * @author 바람꽃 (wndflwr@gmail.com)
 * @brief XE에게 ajax 요청을 보낸다. 요청을 보내기 전 반드시 setModule()과 setAct()를 사용해
 * 요청을 보낼 서버의 모듈과 act를 지정하도록 한다.
 * 필요한 변수들은 addElement로 넣고 CDATA 형식의 데이터는 addCDATAElement()를 사용하도록 하자.
 * @returns this
 */
function MyMethodCall(module, act) {
	this.module = module;
	this.act = act;
	this.params = new Array();
	this.CDATAparam = new Array();
	return this;
}

MyMethodCall.prototype.setModule = function(moduleName) {
	this.module = moduleName;
	return this;
};

MyMethodCall.prototype.setAct = function(actName) {
	this.act = actName;
	return this;
};

MyMethodCall.prototype.addElement = function(tagName, value) {
	if (tagName != "module" && tagName != "act") {
		this.params[tagName] = value;
	}
	return this;
}

MyMethodCall.prototype.addCDATAElement = function(tagName, value) {
	if (tagName != "module" && tagName != "act") {
		this.CDATAparam[tagName] = value;
	}
	return this;
}

MyMethodCall.prototype.callAjax = function(callback_success, callback_error, async, method, timeout) {
	// TODO: 먼저 act와 module 항목이 차있는지 확인한다.
	if (async == null)
		async = true;
	else
		async = false;
	
	var opt = {};
	
	// method 의 기본 값은 POST
	if (!method) {
		opt['method'] = 'POST';
	} else {
		opt['method'] = method;
	}
	// timeout은 기본값으로 10초
	if (!timeout) {
		opt['timeout'] = 10000;
	} else {
		opt['timeout'] = timeout;
	}
	
	// string을 만들어서 보낸다.
	var url = 'index.php?module=' + this.module + '&act=' + this.act;
	var sendString = "<?xml version='1.0' encoding='utf-8'?>";
	sendString += "<methodCall>";
	sendString += "<params>";
	sendString += "<module>";
	sendString += this.module;
	sendString += "</module>";
	sendString += "<act>";
	sendString += this.act;
	sendString += "</act>";
	for (var i in this.params) {
		if (i == 'indexOf') continue;
		sendString += "<" + i + ">";
		sendString += this.params[i];
		sendString += "</" + i + ">";
		url += '&' + i + "=" + this.params[i];
	}
	for (var i in this.CDATAparam) {
		if (i == 'indexOf') continue;
		sendString += "<" + i + "><![CDATA[";
		sendString += this.CDATAparam[i];
		sendString += "]]></" + i + ">";
	}
	sendString += "</params>";
	sendString += "</methodCall>";
	
	jQuery.ajax({
		url: url,
		type: opt['method'],
		timeout: opt['timeout'],
		dataType: 'xml',
		data: sendString,
		async:async,
		contentType: 'text/plain',
		success: callback_success,
		error: callback_error
	});
	return this;
}