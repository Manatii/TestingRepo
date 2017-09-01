

var widget180699 = {};
widget180699.scriptUrl = "http://api.content-ad.net/Scripts/widget2.aspx?id=0ef5f677-71a1-40c1-8844-6a0da0883ebd&d=YW55dGNoLmNvbQ%3D%3D&wid=180699&cb=1503022670097&ver=1.2.13";

widget180699.readCookie = function (name) {
    var nameWithEqual = name + "=";
    var params = document.cookie.split(';');
    for(var i = 0; i < params.length; i++) {
        var nameValuePair = params[i];
        while (nameValuePair.charAt(0) == ' ') nameValuePair = nameValuePair.substring(1, nameValuePair.length);
        if (nameValuePair.indexOf(nameWithEqual) == 0) return nameValuePair.substring(nameWithEqual.length, nameValuePair.length);
    }
    return null;
};

widget180699.updateSourceCookie = function (name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (30*60*1000));
    document.cookie = name + "=" + value + ";path=/;expires=" + d.toUTCString();
};

widget180699.params = (function () {
    var result = {}, queryString = widget180699.scriptUrl.substring(widget180699.scriptUrl.indexOf("id=")), re = /([^&=]+)=([^&]*)/g, m;
    while (m = re.exec(queryString)) {
        result[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }

    var scriptUrlFromDomain = widget180699.scriptUrl.substr(widget180699.scriptUrl.indexOf("://") + 3);
    var server = scriptUrlFromDomain.substr(0, scriptUrlFromDomain.indexOf("/"));
    var url = result["url"] ? decodeURIComponent(result["url"]) : decodeURIComponent(window.location);
    
    result["lazyLoad"] = (result["lazyLoad"] == true ? true : false);
    result["server"] = (result["test"] == true ? "test." + server : server);
    result["title"] = (result["title"] ? result["title"] : encodeURI(escape(document.title)));
    result["url"] = encodeURIComponent(url);

    if (result["pre"] != undefined) {
        result["pre"] = encodeURIComponent(result["pre"]);
    }

    if (result["clientId"] === undefined && result["clientId2"] === undefined) {
        var pageParams = {}, pageQueryString = url.substring(url.indexOf("?")+1), pm;
	    while (pm = re.exec(pageQueryString)) {
	        pageParams[decodeURIComponent(pm[1])] = decodeURIComponent(pm[2]);
	    }
	    
	    var source = widget180699.readCookie("source");
	    var campaign = widget180699.readCookie("campaign");
        if (pageParams["utm_source"] !== undefined && pageParams["utm_source"] !== "") {
            if (pageParams["utm_source"] !== source) {
                widget180699.updateSourceCookie("source", pageParams["utm_source"]);
            }
            result["clientId"] = pageParams["utm_source"];
        } else if (source !== null && source !== "") {
            result["clientId"] = source;
        }

        if (pageParams["utm_campaign"] !== undefined && pageParams["utm_campaign"] !== "") {
            if (pageParams["utm_campaign"] !== campaign) {
                widget180699.updateSourceCookie("campaign", pageParams["utm_campaign"]);
            }
            result["clientId2"] = pageParams["utm_campaign"];
        } else if (campaign !== null && campaign !== "") {
            result["clientId2"] = campaign;
        }
    }
    return result;
} ());

widget180699.paramList = [];
for (var key in widget180699.params) {
    widget180699.paramList.push(key + '=' + widget180699.params[key]);
}

widget180699.widgetUrl = (location.protocol === 'https:' ? 'https:' : 'http:') + "//" + widget180699.params.server + "/GetWidget.aspx?" + widget180699.paramList.join('&');
widget180699.isLoaded = false;

widget180699.init = function (widgetId, widgetUrl, lazyLoad, loadMultiple) {
    if (typeof (window["contentAd" + widgetId]) == 'undefined') {
        if (!widget180699.isLoaded) {
            widget180699.isLoaded = true;
            if (lazyLoad) {
                (function () {
                    function asyncLoad() {
                        var s = document.createElement('script');
                        s.type = 'text/javascript';
                        s.async = true;
                        s.src = widgetUrl;
                        var x = document.getElementsByTagName('script')[0];
                        x.parentNode.insertBefore(s, x);
                    }
                    if (window.attachEvent)
                        window.attachEvent('onload', asyncLoad);
                    else
                        window.addEventListener('load', asyncLoad, false);
                })();
            } else {
                (function () {
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = widgetUrl;
                    var x = document.getElementsByTagName('script')[0];
                    x.parentNode.insertBefore(s, x);
                })();
            }
        }
        setTimeout(function () { widget180699.init(widgetId, widgetUrl, lazyLoad, loadMultiple) }, 50);
    } else {
        var content = window["contentAd" + widgetId]();
        var container = document.getElementById("contentad" + widgetId);
        var newDiv = document.createElement("div");
        newDiv.innerHTML = content;
        if (container === undefined || container === null) {
            var scripts = document.getElementsByTagName("script");
		    for (var i = 0; i < scripts.length; i++) {
			    if (scripts[i].innerHTML !== undefined && scripts[i].innerHTML.toLowerCase().indexOf("0ef5f677-71a1-40c1-8844-6a0da0883ebd") !== -1) {
			        scripts[i].parentNode.insertBefore(newDiv, scripts[i]);
			    }
	        }
        } else {            
            container.parentNode.insertBefore(newDiv, container);
        }
        
        if (typeof (window["initJQuery" + widgetId]) != 'undefined') {
            window["initJQuery" + widgetId]();
        }
        if (loadMultiple) {
            window["contentAd" + widgetId] = undefined;
        }
        if (widget180699.isUnitEnabled()) {
            widget180699.unitTimeout = 0;
            widget180699.unitLoader = function() {
                if (widget180699.unitTimeout >= 60000) {
                    return;
                }
                
                if (typeof (window[widget180699.unitNamespace()]) != 'undefined' && typeof (window[widget180699.unitNamespace()].render) != 'undefined') {
                    widget180699.content = window[widget180699.unitNamespace()].render();
                    widget180699.container = document.createElement("div");
                    widget180699.container.innerHTML = widget180699.content;
                    if (widget180699.unitPlacement() === 'top') {
                        newDiv.parentNode.insertBefore(widget180699.container, newDiv);
                    } else {
                        newDiv.parentNode.insertBefore(widget180699.container, newDiv.nextSibling);
                    }
                    
                    if (typeof (window[widget180699.unitNamespace()].initScript) != 'undefined') {
                        window[widget180699.unitNamespace()].initScript();
                    }
                    
                    if (typeof (window[widget180699.unitNamespace()].impressionHandler) != 'undefined') {
                        window[widget180699.unitNamespace()].impressionHandler();
                    }
                } else {
                    setTimeout(function () { widget180699.unitTimeout += 50; widget180699.unitLoader() }, 50);
                }
            };
            widget180699.unitLoader();
        }
        
        if (typeof (window["widget" + widgetId]) != 'undefined' && typeof (window["widget" + widgetId].customPlacement) != 'undefined') {
            if (typeof (window["widget" + widgetId].renderCustomStyleAndHtml) != 'undefined') {
	            widget180699.customContent = window["widget" + widgetId].renderCustomStyleAndHtml();
	            widget180699.customContainer = document.createElement("div");
	            widget180699.customContainer.innerHTML = widget180699.customContent;
	            
	            if (window["widget" + widgetId].customPlacement() === 'top') {
	                newDiv.parentNode.insertBefore(widget180699.customContainer, newDiv);
	            } else {
	                newDiv.parentNode.insertBefore(widget180699.customContainer, newDiv.nextSibling);
	            }
            }
            
            if (typeof (window["widget" + widgetId].renderCustomScript) != 'undefined') {
                widget180699.customScript = window["widget" + widgetId].renderCustomScript();
                widget180699.customScriptTag = document.createElement("script");
                widget180699.customScriptTag.innerHTML = widget180699.customScript;
                
                widget180699.documentWrite = document.write;
                widget180699.customScriptOutput = document.createElement("div");
                widget180699.customScriptOutput.innerHTML = '';
				document.write = function(line) {
				    widget180699.customScriptOutput.innerHTML += line;
				}
				
                if (window["widget" + widgetId].customPlacement() === 'top') {
                    newDiv.parentNode.insertBefore(widget180699.customScriptTag, newDiv);
                    newDiv.parentNode.insertBefore(widget180699.customScriptOutput, newDiv);
                } else {
                    if (typeof (window["widget" + widgetId].renderCustomStyleAndHtml) != 'undefined') {
                        newDiv.parentNode.insertBefore(widget180699.customScriptTag, newDiv.nextSibling.nextSibling);
                        newDiv.parentNode.insertBefore(widget180699.customScriptOutput, newDiv.nextSibling.nextSibling);
                    } else {
                        newDiv.parentNode.insertBefore(widget180699.customScriptTag, newDiv.nextSibling);
                        newDiv.parentNode.insertBefore(widget180699.customScriptOutput, newDiv.nextSibling);
                    }                
                }
                
                document.write = widget180699.documentWrite;
            }
        }
    }
};

widget180699.updatePopCookie = function () {
    if (document.cookie.indexOf("popdays") == -1) {
        var d = new Date();
        if (widget180699.params.exitPopExpireDays === undefined) {
            widget180699.params.exitPopExpireDays = 0;
            d.setTime(d.getTime() + (30*60*1000));
        } else {
            d.setTime(d.getTime() + (widget180699.params.exitPopExpireDays*24*60*60*1000));
        }
        document.cookie = "popdays=" + widget180699.params.exitPopExpireDays + ";path=/;expires=" + d.toUTCString();

        widget180699.init(widget180699.params.wid, widget180699.widgetUrl, widget180699.params.lazyLoad, widget180699.params.loadMultiple);
    } else {
        if (widget180699.params.exitPopExpireDays > 0 && widget180699.readCookie("popdays") != widget180699.params.exitPopExpireDays) {
            var d = new Date();
            d.setTime(d.getTime() + (widget180699.params.exitPopExpireDays*24*60*60*1000));
            document.cookie = "popdays=" + widget180699.params.exitPopExpireDays + ";path=/;expires=" + d.toUTCString();
        } else if (widget180699.params.exitPopExpireDays <= 0) {
            document.cookie = "popdays=-1;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
            widget180699.init(widget180699.params.wid, widget180699.widgetUrl, widget180699.params.lazyLoad, widget180699.params.loadMultiple);
        } else if (widget180699.params.exitPopExpireDays === undefined && widget180699.readCookie("popdays") > 0) {
            var d = new Date();
            d.setTime(d.getTime() + (30*60*1000));
            document.cookie = "popdays=0;path=/;expires=" + d.toUTCString();
        }
    }
};

widget180699.scrollChange = function () {
    var totalHeight, currentScroll, visibleHeight;
      
    if (document.documentElement.scrollTop) {
        currentScroll = document.documentElement.scrollTop;
    } else { 
        currentScroll = document.body.scrollTop;
    }
      
    totalHeight = document.body.offsetHeight;
    visibleHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    var tempScroll = currentScroll + visibleHeight;
    var atEndOfPage = totalHeight <= tempScroll + (totalHeight * 0.10);
    var isScrollingUp = tempScroll < widget180699.lowestScroll;
    var hasScrolledDown = widget180699.lowestScroll > 100;
    
    if (widget180699.lowestScroll === undefined || tempScroll > widget180699.lowestScroll) {
        widget180699.lowestScroll = tempScroll;
    }

    if ((atEndOfPage || (hasScrolledDown && isScrollingUp)) && !widget180699.isLoaded) {
        widget180699.updatePopCookie();
    }
};

widget180699.mouseCoordinates = function (e) {
    var tempX = 0, tempY = 0;

    if (!e) var e = window.event;
    tempX = e.clientX;
    tempY = e.clientY;
        
    if (tempX < 0) tempX = 0;
    if (tempY < 0) tempY = 0;
    
    if (widget180699.lowestY === undefined || tempY > widget180699.lowestY) {
        widget180699.lowestY = tempY;
    }
    
    if (tempY <= 20 && tempY < widget180699.lowestY && widget180699.lowestY > 100 && !widget180699.isLoaded) {
        widget180699.updatePopCookie();
    }
};

widget180699.exitPopMobile = false;
if (widget180699.params.exitPopMobile === 'true' || widget180699.params.exitPopMobile === '1') {
    widget180699.exitPopMobile = true;
    var touchEnabled = ('ontouchstart' in window) || (window.DocumentTouch && document instanceof DocumentTouch);
    var isMobile = false;
    if (navigator.userAgent !== undefined) {
        var userAgent = navigator.userAgent.toLowerCase();
        var iPhoneIndex = userAgent.indexOf("iphone");
        var iPadIndex = userAgent.indexOf("ipad");
        var isIPhone = (iPhoneIndex !== -1 && iPadIndex === -1) || (iPhoneIndex !== -1 && iPhoneIndex < iPadIndex);
        var isAndroid = userAgent.indexOf("android") !== -1 && userAgent.indexOf("mobile") !== -1;
        var isOtherMobile = userAgent.match(/^.*?(ipod|blackberry|mini|windows\\sce|palm|phone|mobile|smartphone|iemobile).*?$/) != null;
        isMobile = isIPhone || isAndroid || isOtherMobile;
    }
    
    if (touchEnabled && isMobile) {
        setInterval(widget180699.scrollChange, 50);
    }
}

widget180699.exitPop = false;
if (widget180699.params.exitPop === 'true' || widget180699.params.exitPop === '1') {
    widget180699.exitPop = true;
    if (widget180699.params.exitPopExpireDays === undefined && widget180699.readCookie("popdays") == 0) {
        var d = new Date();
        d.setTime(d.getTime() + (30*60*1000));
        document.cookie = "popdays=0;path=/;expires=" + d.toUTCString();
    }
    var isInternetExplorer = document.all ? true : false;
    if (!isInternetExplorer) document.captureEvents(Event.MOUSEMOVE);
    try {
        document.addEventListener('mousemove', widget180699.mouseCoordinates, false);
    } catch (e) {
        document.attachEvent('onmousemove', widget180699.mouseCoordinates);
    } finally {
        try {
            if (document.onmousemove) {
                var oldOnMouseMove = document.onmousemove;
                document.onmousemove = function(e) {
                    oldOnMouseMove(e);
                    widget180699.mouseCoordinates(e);
                };
            } else {
                document.onmousemove = function(e) {
                   widget180699.mouseCoordinates(e);
                };
            }
        } catch(e) {
        
        }
    }
} 

if (!widget180699.exitPop && !widget180699.exitPopMobile) {
    widget180699.init(widget180699.params.wid, widget180699.widgetUrl, widget180699.params.lazyLoad, widget180699.params.loadMultiple);
}