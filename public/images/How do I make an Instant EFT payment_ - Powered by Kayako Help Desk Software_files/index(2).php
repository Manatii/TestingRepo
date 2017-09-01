//===============================
// Kayako LiveResponse
// Copyright (c) 2001-2017

// http://www.kayako.com
// License: http://www.kayako.com/license.txt
//===============================

var sessionid_zbzw94r7 = "Q0JNAp0Bridff34627ca512ec9e16c0f4f04a1695e80a7036a3ydOXMCiERQmLPI1WeyTqXK4Je";
var geoip_zbzw94r7 = new Array();

var hasnotes_zbzw94r7 = "0";
var isnewsession_zbzw94r7 = "1";
var repeatvisit_zbzw94r7 = "1";
var lastvisittimeline_zbzw94r7 = "0";
var lastchattimeline_zbzw94r7 = "0";
var isfirsttime_zbzw94r7 = 1;
var timer_zbzw94r7 = 0;
var imagefetch_zbzw94r7 = 19;
var updateurl_zbzw94r7 = "";
var screenHeight_zbzw94r7 = window.screen.availHeight;
var screenWidth_zbzw94r7 = window.screen.availWidth;
var colorDepth_zbzw94r7 = window.screen.colorDepth;
var timeNow = new Date();
var referrer = escape(document.referrer);
var windows_zbzw94r7, mac_zbzw94r7, linux_zbzw94r7;
var ie_zbzw94r7, op_zbzw94r7, moz_zbzw94r7, misc_zbzw94r7, browsercode_zbzw94r7, browsername_zbzw94r7, browserversion_zbzw94r7, operatingsys_zbzw94r7;
var dom_zbzw94r7, ienew, ie4_zbzw94r7, ie5_zbzw94r7, ie6_zbzw94r7, ie7_zbzw94r7, ie8_zbzw94r7, moz_rv_zbzw94r7, moz_rv_sub_zbzw94r7, ie5mac, ie5xwin, opnu_zbzw94r7, op4, op5_zbzw94r7, op6_zbzw94r7, op7_zbzw94r7, op8_zbzw94r7, op9_zbzw94r7, op10_zbzw94r7, saf_zbzw94r7, konq_zbzw94r7, chrome_zbzw94r7, ch1_zbzw94r7, ch2_zbzw94r7, ch3_zbzw94r7;
var appName_zbzw94r7, appVersion_zbzw94r7, userAgent_zbzw94r7;
var appName_zbzw94r7 = navigator.appName;
var appVersion_zbzw94r7 = navigator.appVersion;
var userAgent_zbzw94r7 = navigator.userAgent;
var dombrowser = "default";
var isChatRunning_zbzw94r7 = 0;
var title = document.title;
var proactiveImageUse_zbzw94r7 = new Image();
windows_zbzw94r7 = (appVersion_zbzw94r7.indexOf('Win') != -1);
mac_zbzw94r7 = (appVersion_zbzw94r7.indexOf('Mac') != -1);
linux_zbzw94r7 = (appVersion_zbzw94r7.indexOf('Linux') != -1);
if (!document.layers) {
	dom_zbzw94r7 = (document.getElementById ) ? document.getElementById : false;
} else {
	dom_zbzw94r7 = false;
}
var myWidth = 0, myHeight = 0;
if( typeof( window.innerWidth ) == 'number' ) {
	//Non-IE
	myWidth = window.innerWidth;
	myHeight = window.innerHeight;
} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
	//IE 6+ in 'standards compliant mode'
	myWidth = document.documentElement.clientWidth;
	myHeight = document.documentElement.clientHeight;
} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
	//IE 4 compatible
	myWidth = document.body.clientWidth;
	myHeight = document.body.clientHeight;
}
winH = myHeight;
winW = myWidth;
misc_zbzw94r7 = (appVersion_zbzw94r7.substring(0,1) < 4);
op_zbzw94r7 = (userAgent_zbzw94r7.indexOf('Opera') != -1);
moz_zbzw94r7 = (userAgent_zbzw94r7.indexOf('Gecko') != -1);
chrome_zbzw94r7=(userAgent_zbzw94r7.indexOf('Chrome') != -1);
if (document.all) {
	ie_zbzw94r7 = (document.all && !op_zbzw94r7);
}
saf_zbzw94r7=(userAgent_zbzw94r7.indexOf('Safari') != -1);
konq_zbzw94r7=(userAgent_zbzw94r7.indexOf('Konqueror') != -1);

if (op_zbzw94r7) {
	op_pos = userAgent_zbzw94r7.indexOf('Opera');
	opnu_zbzw94r7 = userAgent_zbzw94r7.substr((op_pos+6),4);
	op5_zbzw94r7 = (opnu_zbzw94r7.substring(0,1) == 5);
	op6_zbzw94r7 = (opnu_zbzw94r7.substring(0,1) == 6);
	op7_zbzw94r7 = (opnu_zbzw94r7.substring(0,1) == 7);
	op8_zbzw94r7 = (opnu_zbzw94r7.substring(0,1) == 8);
	op9_zbzw94r7 = (opnu_zbzw94r7.substring(0,1) == 9);
	op10_zbzw94r7 = (opnu_zbzw94r7.substring(0,2) == 10);
} else if (chrome_zbzw94r7) {
	chrome_pos = userAgent_zbzw94r7.indexOf('Chrome');
	chnu = userAgent_zbzw94r7.substr((chrome_pos+7),4);
	ch1_zbzw94r7 = (chnu.substring(0,1) == 1);
	ch2_zbzw94r7 = (chnu.substring(0,1) == 2);
	ch3_zbzw94r7 = (chnu.substring(0,1) == 3);
} else if (moz_zbzw94r7){
	rv_pos = userAgent_zbzw94r7.indexOf('rv');
	moz_rv_zbzw94r7 = userAgent_zbzw94r7.substr((rv_pos+3),3);
	moz_rv_sub_zbzw94r7 = userAgent_zbzw94r7.substr((rv_pos+7),1);
	if (moz_rv_sub_zbzw94r7 == ' ' || isNaN(moz_rv_sub_zbzw94r7)) {
		moz_rv_sub_zbzw94r7='';
	}
	moz_rv_zbzw94r7 = moz_rv_zbzw94r7 + moz_rv_sub_zbzw94r7;
} else if (ie_zbzw94r7){
	ie_pos = userAgent_zbzw94r7.indexOf('MSIE');
	ienu = userAgent_zbzw94r7.substr((ie_pos+5),3);
	ie4_zbzw94r7 = (!dom_zbzw94r7);
	ie5_zbzw94r7 = (ienu.substring(0,1) == 5);
	ie6_zbzw94r7 = (ienu.substring(0,1) == 6);
	ie7_zbzw94r7 = (ienu.substring(0,1) == 7);
	ie8_zbzw94r7 = (ienu.substring(0,1) == 8);
}

if (konq_zbzw94r7) {
	browsercode_zbzw94r7 = "KO";
	browserversion_zbzw94r7 = appVersion_zbzw94r7;
	browsername_zbzw94r7 = "Konqueror";
} else if (chrome_zbzw94r7) {
	browsercode_zbzw94r7 = "CH";
	if (ch1_zbzw94r7) {
		browserversion_zbzw94r7 = "1";
	} else if (ch2_zbzw94r7) {
		browserversion_zbzw94r7 = "2";
	} else if (ch3_zbzw94r7) {
		browserversion_zbzw94r7 = "3";
	}

	browsername_zbzw94r7 = "Google Chrome";
} else if (saf_zbzw94r7) {
	browsercode_zbzw94r7 = "SF";
	browserversion_zbzw94r7 = appVersion_zbzw94r7;
	browsername_zbzw94r7 = "Safari";
} else if (op_zbzw94r7) {
	browsercode_zbzw94r7 = "OP";
	if (op5_zbzw94r7) {
		browserversion_zbzw94r7 = "5";
	} else if (op6_zbzw94r7) {
		browserversion_zbzw94r7 = "6";
	} else if (op7_zbzw94r7) {
		browserversion_zbzw94r7 = "7";
	} else if (op8_zbzw94r7) {
		browserversion_zbzw94r7 = "8";
	} else if (op9_zbzw94r7) {
		browserversion_zbzw94r7 = "9";
	} else if (op10_zbzw94r7) {
		browserversion_zbzw94r7 = "10";
	} else {
		browserversion_zbzw94r7 = appVersion_zbzw94r7;
	}
	browsername_zbzw94r7 = "Opera";
} else if (moz_zbzw94r7) {
	browsercode_zbzw94r7 = "MO";
	browserversion_zbzw94r7 = appVersion_zbzw94r7;
	browsername_zbzw94r7 = "Firefox";
} else if (ie_zbzw94r7) {
	browsercode_zbzw94r7 = "IE";
	if (ie4_zbzw94r7) {
		browserversion_zbzw94r7 = "4";
	} else if (ie5_zbzw94r7) {
		browserversion_zbzw94r7 = "5";
	} else if (ie6_zbzw94r7) {
		browserversion_zbzw94r7 = "6";
	} else if (ie7_zbzw94r7) {
		browserversion_zbzw94r7 = "7";
	} else if (ie8_zbzw94r7) {
		browserversion_zbzw94r7 = "8";
	} else {
		browserversion_zbzw94r7 = appVersion_zbzw94r7;
	}
	browsername_zbzw94r7 = "Internet Explorer";
}

if (windows_zbzw94r7) {
	operatingsys_zbzw94r7 = "Windows";
} else if (linux_zbzw94r7) {
	operatingsys_zbzw94r7 = "Linux";
} else if (mac_zbzw94r7) {
	operatingsys_zbzw94r7 = "Mac";
} else {
	operatingsys_zbzw94r7 = "Unkown";
}

if (document.getElementById)
{
	dombrowser = "default";
} else if (document.layers) {
	dombrowser = "NS4";
} else if (document.all) {
	dombrowser = "IE4";
}

var proactiveX = 20;
var proactiveXStep = 1;
var proactiveDelayTime = 100;

var proactiveY = 0;
var proactiveOffsetHeight=0;
var proactiveYStep = 0;
var proactiveAnimate = false;

function browserObject_zbzw94r7(objid)
{
	if (dombrowser == "default")
	{
		return document.getElementById(objid);
	} else if (dombrowser == "NS4") {
		return document.layers[objid];
	} else if (dombrowser == "IE4") {
		return document.all[objid];
	}
}

function doRand_zbzw94r7()
{
	var num;
	now=new Date();
	num=(now.getSeconds());
	num=num+1;
	return num;
}

function getCookie_zbzw94r7(name) {
	var crumb = document.cookie;
	var index = crumb.indexOf(name + "=");
	if (index == -1) return null;
	index = crumb.indexOf("=", index) + 1;
	var endstr = crumb.indexOf(";", index);
	if (endstr == -1) endstr = crumb.length;
	return unescape(crumb.substring(index, endstr));
}

function deleteCookie_zbzw94r7(name) {
	var expiry = new Date();
	document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT" +  "; path=/";
}

function elapsedTime_zbzw94r7()
{
	if (typeof _elapsedTimeStatusIndicator == 'undefined') {
		_elapsedTimeStatusIndicator = 'zbzw94r7';
	} else if (typeof _elapsedTimeStatusIndicator == 'string' && _elapsedTimeStatusIndicator != 'zbzw94r7') {

		return;
	}


	if (timer_zbzw94r7 < 3600)
	{
		timer_zbzw94r7++;
		imagefetch_zbzw94r7++;

		if (imagefetch_zbzw94r7 > 19) {
			imagefetch_zbzw94r7 = 0;
			doStatusLoop_zbzw94r7();
		}

					setTimeout("elapsedTime_zbzw94r7();", 1000);
		
	}
}


var Base64_zbzw94r7 = {
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;

		input = Base64_zbzw94r7._utf8_encode(input);

		while (i < input.length) {

			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);

			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;

			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}

			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

		}

		return output;
	},

	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	}
}

function doStatusLoop_zbzw94r7() {
	date1 = new Date();
	var _finalPageTitle=Base64_zbzw94r7.encode(title);

	var _finalWindowLocation = encodeURIComponent(decodeURIComponent(window.location));
	var _referrerURL = encodeURIComponent(decodeURIComponent(document.referrer));
	updateurl_zbzw94r7 = "https://support.payfast.co.za/visitor/index.php?/LiveChat/VisitorUpdate/UpdateFootprint/_time="+date1.getTime()+"/_randomNumber="+doRand_zbzw94r7()+"/_url="+_finalWindowLocation+"/_isFirstTime="+encodeURIComponent(isfirsttime_zbzw94r7)+"/_sessionID="+encodeURIComponent(sessionid_zbzw94r7)+"/_referrer="+_referrerURL+"/_resolution="+encodeURIComponent(screenWidth_zbzw94r7+"x"+screenHeight_zbzw94r7)+"/_colorDepth="+encodeURIComponent(colorDepth_zbzw94r7)+"/_platform="+encodeURIComponent(navigator.platform)+"/_appVersion="+encodeURIComponent(navigator.appVersion)+"/_appName="+encodeURIComponent(navigator.appName)+"/_browserCode="+encodeURIComponent(browsercode_zbzw94r7)+"/_browserVersion="+encodeURIComponent(browserversion_zbzw94r7)+"/_browserName="+encodeURIComponent(browsername_zbzw94r7)+"/_operatingSys="+encodeURIComponent(operatingsys_zbzw94r7)+"/_pageTitle="+encodeURIComponent(_finalPageTitle)+"/_hasNotes="+encodeURIComponent(hasnotes_zbzw94r7)+"/_repeatVisit="+encodeURIComponent(repeatvisit_zbzw94r7)+"/_lastVisitTimeline="+encodeURIComponent(lastvisittimeline_zbzw94r7)+"/_lastChatTimeline="+encodeURIComponent(lastchattimeline_zbzw94r7)+"/_isNewSession="+encodeURIComponent(isnewsession_zbzw94r7);

	proactiveImageUse_zbzw94r7 = new Image();
	proactiveImageUse_zbzw94r7.onload = imageLoaded_zbzw94r7;
	proactiveImageUse_zbzw94r7.src = updateurl_zbzw94r7;

	isfirsttime_zbzw94r7 = 0;
}

function startChat_zbzw94r7(proactive)
{
	isChatRunning_zbzw94r7 = 1;

	docWidth = (winW-599)/2;
	docHeight = (winH-679)/2;

		_chatWindowURL = 'https://support.payfast.co.za/visitor/index.php?/LiveChat/Chat/Request/_sessionID=' + sessionid_zbzw94r7 + '/_proactive=' + proactive + '/_filterDepartmentID=2/_randomNumber=' + doRand_zbzw94r7() + '/_fullName=/_email=/_promptType=chat';
	


	chatwindow = window.open(_chatWindowURL,"customerchat"+doRand_zbzw94r7(), "toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=yes,resizable=1,width=599,height=679,left="+docWidth+",top="+docHeight);

	hideProactiveChatData_zbzw94r7();
}

function imageLoaded_zbzw94r7() {
	if (!proactiveImageUse_zbzw94r7)
	{
		return;
	}
	proactiveAction = proactiveImageUse_zbzw94r7.width;

	if (proactiveAction == 3)
	{
		doProactiveInline_zbzw94r7();
	} else if (proactiveAction == 4) {
		displayProactiveChatData_zbzw94r7();
	}
}

function writeInlineRequestData_zbzw94r7()
{
	docWidth = (winW-600)/2;
	docHeight = (winH-680)/2;

	var divData = '';
	divData += "<div style=\"FLOAT: left; WIDTH: 600px; BACKGROUND: #FFFFFF; BORDER: SOLID 1px #bcb5a6;\"><iframe width=\"600\" height=\"680\" scrolling=\"auto\" frameborder=\"0\" src=\"\" name=\"inlinechatframe\" id=\"inlinechatframe\">ERROR: No IFRAME Support Detected</iframe></div><div style=\"FLOAT: left; MARGIN-LEFT: -8px; MARGIN-TOP: -8px;\"><a href=\"javascript: closeInlineProactiveRequest_zbzw94r7();\"><img src=\"https://support.payfast.co.za/__swift/themes/client/images/icon_close.png\" border=\"0\" align=\"absmiddle\" /></a></div>";


	var inlineChatElement = document.createElement("div");
	inlineChatElement.style.position = 'absolute';
	inlineChatElement.style.display = 'none';
	inlineChatElement.style.float = 'left';
	inlineChatElement.style.top = docHeight+'px';
	inlineChatElement.style.left = docWidth+'px';
	inlineChatElement.style.zIndex = 500;

	if (inlineChatElement.style.overflow) {
		inlineChatElement.style.overflow = 'none';
	}

	inlineChatElement.id = 'inlinechatdiv';
	inlineChatElement.innerHTML = divData;

	var proactiveChatContainer = document.getElementById('proactivechatcontainer' + swiftuniqueid);
	proactiveChatContainer.appendChild(inlineChatElement);
}

function writeProactiveRequestData_zbzw94r7()
{
	docWidth = (winW-450)/2;
	docHeight = (winH-400)/2;

	var divData = '';
	divData += "<div style=\"FLOAT: left; WIDTH: 500px; BACKGROUND: #FFFFFF URL(\'https://support.payfast.co.za/__swift/themes/client/images/mainbackground.gif\') REPEAT; BORDER: SOLID 1px #bcb5a6;\"><div style=\"BACKGROUND: #FFFFFF URL(\'https://support.payfast.co.za/__swift/themes/client/images/icon_proactiveuserbackground.gif\') NO-REPEAT bottom left; BORDER: SOLID 1px #bcb5a6; MARGIN: 8px;\"><div style=\"TEXT-ALIGN: center;\"><img src=\"https://support.payfast.co.za/__swift/files/file_ghkfqnlapi10hnn.png\" border=\"0\" align=\"absmiddle\" /></div><HR align=\"center\" style=\"WIDTH: 80%; BORDER: none; COLOR: #bcb5a6; BACKGROUND-COLOR: #bcb5a6; HEIGHT: 1px; MARGIN-TOP: 10px; MARGIN-BOTTOM: 3px;\" /><div style=\"PADDING-LEFT: 120px; TEXT-ALIGN: left; MARGIN-TOP: 30px; HEIGHT: 60px; OVERFLOW: hidden; FONT: 45px Trebuchet MS, Georgia, Verdana, Arial, Helvetica; COLOR: #333333;\">Can I help you?</div><div style=\"PADDING-LEFT: 120px; VERTICAL-ALIGN: top; MARGIN-TOP: 0px; PADDING-TOP: 0px; HEIGHT: 200px; FONT: 18pt Trebuchet MS, Georgia, Verdana, Arial, Helvetica; COLOR: #776849;\">Our team is ready to assist you. Click &quot;Chat Now&quot; to be connected to one instantly.<br /><div style=\"PADDING-TOP: 30px; PADDING-LEFT: 80px; TEXT-ALIGN: center;\"><div style=\"BORDER: SOLID 0 #FFFFFF; TEXT-ALIGN: center; BACKGROUND: URL(https://support.payfast.co.za/__swift/themes/client/images/proactivebutton.gif) no-repeat; HEIGHT: 37px; WIDTH: 135px; COLOR: #000000; FONT-WEIGHT: bold; FONT-FAMILY: Trebuchet MS, Georgia, Helvetica, Verdana, Tahoma; FONT-SIZE: 16px; MARGIN: 0px; PADDING-TOP: 6px; PADDING-BOTTOM: 15px; VERTICAL-ALIGN: middle; CURSOR: pointer;\" onmouseover=\"this.style.color=\'red\';\" onmouseout=\"this.style.color=\'#000000\'\" onclick=\"javascript:doProactiveRequest_zbzw94r7();\">Chat Now</div></div></div></div></div><div style=\"FLOAT: left; MARGIN-LEFT: -8px; MARGIN-TOP: -8px;\"><a href=\"javascript:closeProactiveRequest_zbzw94r7();\"><img src=\"https://support.payfast.co.za/__swift/themes/client/images/icon_close.png\" border=\"0\" align=\"absmiddle\" /></a></div>";


	var proactiveElement = document.createElement("div");
	proactiveElement.style.position = 'absolute';
	proactiveElement.style.display = 'none';
	proactiveElement.style.float = 'left';
	proactiveElement.style.top = docHeight+'px';
	proactiveElement.style.left = docWidth+'px';
	proactiveElement.style.zIndex = 500;

	if (proactiveElement.style.overflow) {
		proactiveElement.style.overflow = 'none';
	}

	proactiveElement.id = 'proactivechatdiv';
	proactiveElement.innerHTML = divData;

	var proactiveChatContainer = document.getElementById('proactivechatcontainer' + swiftuniqueid);
	proactiveChatContainer.appendChild(proactiveElement);
}

function displayProactiveChatData_zbzw94r7()
{
	if (proactiveAnimate == true) {
		return false;
	}

	writeObj = browserObject_zbzw94r7("proactivechatdiv");
	if (writeObj)
	{
		docWidth = (winW-450)/2;
		docHeight = (winH-400)/2;
		proactiveY = docHeight;
		writeObj.top = docWidth;
		writeObj.left = docHeight;
		proactiveAnimate = true;
	}

	showDisplay_zbzw94r7("proactivechatdiv");

		animateProactiveDiv_zbzw94r7();
	
}

function displayInlineChatData_zbzw94r7()
{
	writeObj = browserObject_zbzw94r7("inlinechatdiv");
	if (writeObj)
	{
		docWidth = (winW-600)/2;
		docHeight = (winH-680)/2;
		proactiveY = docHeight;
		writeObj.top = docHeight;
		writeObj.left = docWidth;

		acceptProactive = new Image();
		acceptProactive.src = "https://support.payfast.co.za/visitor/index.php?/LiveChat/VisitorUpdate/AcceptProactive/_randomNumber="+doRand_zbzw94r7()+"/_sessionID="+sessionid_zbzw94r7;

		inlineChatFrameObj = browserObject_zbzw94r7("inlinechatframe");
		_iframeURL = 'https://support.payfast.co.za/visitor/index.php?/LiveChat/Chat/StartInline/_sessionID=Q0JNAp0Bridff34627ca512ec9e16c0f4f04a1695e80a7036a3ydOXMCiERQmLPI1WeyTqXK4Je/_proactive=1/_filterDepartmentID=2/_fullName=/_email=/_inline=1/';
		if (inlineChatFrameObj && inlineChatFrameObj.src != _iframeURL && writeObj.style.display == 'none') {
			inlineChatFrameObj.src = _iframeURL;
		}
	}

	showDisplay_zbzw94r7("inlinechatdiv");
}

function hideProactiveChatData_zbzw94r7()
{
	hideDisplay_zbzw94r7("proactivechatdiv");
	hideDisplay_zbzw94r7("inlinechatdiv");
}

function doProactiveInline_zbzw94r7()
{
	displayInlineChatData_zbzw94r7();
}

function doProactiveRequest_zbzw94r7()
{
	acceptProactive = new Image();
	acceptProactive.src = "https://support.payfast.co.za/visitor/index.php?/LiveChat/VisitorUpdate/AcceptProactive/_randomNumber="+doRand_zbzw94r7()+"/_sessionID="+sessionid_zbzw94r7;

	startChat_zbzw94r7("4");
}

function closeProactiveRequest_zbzw94r7()
{
	rejectProactive = new Image();
	date1 = new Date();
	proactiveAnimate = false;
	rejectProactive.src = "https://support.payfast.co.za/visitor/index.php?/LiveChat/VisitorUpdate/ResetProactive/_time="+date1.getTime()+"/_randomNumber="+doRand_zbzw94r7()+"/_sessionID="+sessionid_zbzw94r7;

	hideProactiveChatData_zbzw94r7();
}

function closeInlineProactiveRequest_zbzw94r7()
{
	rejectProactive = new Image();
	date1 = new Date();
	rejectProactive.src = "https://support.payfast.co.za/visitor/index.php?/LiveChat/VisitorUpdate/ResetProactive/_time="+date1.getTime()+"/_randomNumber="+doRand_zbzw94r7()+"/_sessionID="+sessionid_zbzw94r7;

	document.getElementById('inlinechatframe').contentWindow.postMessage('CloseProactiveChat', '*');
	//	window.frames.inlinechatframe.CloseProactiveChat();
}

function closeInlineProactiveRequest2_zbzw94r7()
{
	var bodyElement = document.getElementsByTagName('body');
	if (bodyElement[0])
	{
		var inlineDivElement = browserObject_zbzw94r7('inlinechatdiv');
		if (inlineDivElement) {
			var _parentNode = inlineDivElement.parentNode;
			_parentNode.removeChild(inlineDivElement);
		}
	}
}

	window.onmessage = function(e){
	if (e.data == 'CloseProactiveChat') {
	closeInlineProactiveRequest2_zbzw94r7();
	}
	};

function switchDisplay_zbzw94r7(objid)
{
	result = browserObject_zbzw94r7(objid);
	if (!result)
	{
		return;
	}

	if (result.style.display == "none")
	{
		result.style.display = "block";
	} else {
		result.style.display = "none";
	}
}

function hideDisplay_zbzw94r7(objid)
{
	result = browserObject_zbzw94r7(objid);
	if (!result)
	{
		return;
	}

	result.style.display = "none";
}

function showDisplay_zbzw94r7(objid)
{
	result = browserObject_zbzw94r7(objid);
	if (!result)
	{
		return;
	}

	result.style.display = "block";
}

function updateProactivePosition_zbzw94r7()
{
	writeObj = browserObject_zbzw94r7("proactivechatdiv");
	writeObjInline = browserObject_zbzw94r7("inlinechatdiv");

	docHeight = (winH-412)/2;
	docHeightInline = (winH-680)/2;

	finalTopValue = docHeight + document.body.scrollTop;
	if (finalTopValue < 0) {
		finalTopValue = 10;
	}

	finalTopValueInline = docHeightInline + document.body.scrollTop;
	if (finalTopValueInline < 0) {
		finalTopValueInline = 10;
	}

	if (writeObj) {
		writeObj.style.top = finalTopValue + "px";
	}

	if (writeObjInline) {
		writeObjInline.style.top = finalTopValueInline + "px";
	}
}

function animateProactiveDiv_zbzw94r7()
{
	writeObj = browserObject_zbzw94r7("proactivechatdiv");

	if (!writeObj) {
		return false;
	}

	if(proactiveYStep == 0){proactiveY = proactiveY-proactiveXStep;} else {proactiveY = proactiveY+proactiveXStep;}

	proactiveOffsetHeight = writeObj.offsetHeight;
	if(proactiveY < 0){proactiveYStep = 1; proactiveY=0; }
	if(proactiveY >= (myHeight - proactiveOffsetHeight)){proactiveYStep=0; proactiveY=(myHeight-proactiveOffsetHeight);}

	finalTopValue = proactiveY+document.body.scrollTop;
	if (finalTopValue < 0) {
		finalTopValue = 10;
	}

	writeObj.style.top = finalTopValue+"px";

	if (proactiveAnimate) {
		setTimeout('animateProactiveDiv_zbzw94r7()', proactiveDelayTime);
	}
}

	writeProactiveRequestData_zbzw94r7(); writeInlineRequestData_zbzw94r7();


elapsedTime_zbzw94r7();

var oldEvtScroll = window.onscroll; window.onscroll = function() { if (oldEvtScroll) { updateProactivePosition_zbzw94r7(); } }

var swifttagdiv=document.createElement("div");swifttagdiv.innerHTML = "<style type=\"text/css\">#kayako_sitebadgebg:hover {	background-color: #bec0c5 !important;}#kayako_sitebadgebg {	background-color: #a2a4ac;	border-color: #bec0c5 #717378 #717378 #717378 !important;}</style><script type=\"text/javascript\">function openHelp(){       }</script><div id=\"kayako_sitebadgecontainer\" title=\"PayFast Support\" onclick=\"javascript:  window.open( \'https://www.payfast.co.za/support/index.php?/Tickets/Submit\', \'_blank\' );\" style=\"background: transparent none repeat scroll 0 0; bottom: 0; cursor:pointer; height: 101px; left: 0; line-height: normal; margin: 0; padding: 0; position: fixed; top: 35% !important; z-index: 4000000000 !important;\">	<div id=\"kayako_sitebadgeholder\">				<div id=\"kayako_sitebadgebg\" id=\"kayako_sitebadgebg\" style=\"background-color: #198c19; border-color: #bec0c5 #717378 #717378 #717378 !important; background-image: URL(\'https://www.payfast.co.za/images/badge_help_white.png\'); background-repeat: no-repeat;background-position: 0px -4px; -moz-border-radius: 0 1em 1em 0 !important; border-radius: 0 1em 1em 0 !important; -webkit-border-radius: 0 1em 1em 0 !important; border-style: outset outset outset none !important; border-width: 1px 1px 1px medium !important; height: 101px !important; left: 0 !important; margin: 0 !important; opacity: 0.90 !important; padding: 0 !important; position: absolute !important; top: 0 !important; width: 30px !important; z-index: 19999 !important;\"></div>	</div></div>";document.getElementById("swifttagdatacontainer00znpq3dch").appendChild(swifttagdiv);