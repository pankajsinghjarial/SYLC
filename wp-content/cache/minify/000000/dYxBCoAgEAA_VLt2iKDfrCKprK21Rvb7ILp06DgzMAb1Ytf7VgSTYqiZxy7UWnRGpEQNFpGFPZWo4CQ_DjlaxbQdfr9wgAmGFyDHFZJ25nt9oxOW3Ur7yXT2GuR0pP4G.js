
/* html5.js */

/* 1  */ // Create new HTML5 elements ===================================================
/* 2  */ // -----------------------------------------------------------------------------
/* 3  */ // This script should load before any others. We want the new elements to be
/* 4  */ // parsed before pretty much anything happens.
/* 5  */ // Plus, IE does not behave otherwise. The cost of being progressive...
/* 6  */ // -----------------------------------------------------------------------------
/* 7  */ 
/* 8  */ document.createElement("article");
/* 9  */ document.createElement("aside");
/* 10 */ document.createElement("audio");
/* 11 */ document.createElement("canvas");
/* 12 */ document.createElement("command");
/* 13 */ document.createElement("datalist");
/* 14 */ document.createElement("details");
/* 15 */ document.createElement("embed");
/* 16 */ document.createElement("figcaption");
/* 17 */ document.createElement("figure");
/* 18 */ document.createElement("footer");
/* 19 */ document.createElement("header");
/* 20 */ document.createElement("hgroup");
/* 21 */ document.createElement("keygen");
/* 22 */ document.createElement("mark");
/* 23 */ document.createElement("meter");
/* 24 */ document.createElement("nav");
/* 25 */ document.createElement("output");
/* 26 */ document.createElement("progress");
/* 27 */ document.createElement("rp");
/* 28 */ document.createElement("rt");
/* 29 */ document.createElement("ruby");
/* 30 */ document.createElement("section");
/* 31 */ document.createElement("source");
/* 32 */ document.createElement("summary");
/* 33 */ document.createElement("time");
/* 34 */ document.createElement("video");

;
/* minify_52ba09d96f426a4c1ddd75328d59f5e3.js */

/* 1 */ /*! jQuery v1.7.1 jquery.com | jquery.org/license */
/* 2 */ (function(a,b){function cy(a){return f.isWindow(a)?a:a.nodeType===9?a.defaultView||a.parentWindow:!1}function cv(a){if(!ck[a]){var b=c.body,d=f("<"+a+">").appendTo(b),e=d.css("display");d.remove();if(e==="none"||e===""){cl||(cl=c.createElement("iframe"),cl.frameBorder=cl.width=cl.height=0),b.appendChild(cl);if(!cm||!cl.createElement)cm=(cl.contentWindow||cl.contentDocument).document,cm.write((c.compatMode==="CSS1Compat"?"<!doctype html>":"")+"<html><body>"),cm.close();d=cm.createElement(a),cm.body.appendChild(d),e=f.css(d,"display"),b.removeChild(cl)}ck[a]=e}return ck[a]}function cu(a,b){var c={};f.each(cq.concat.apply([],cq.slice(0,b)),function(){c[this]=a});return c}function ct(){cr=b}function cs(){setTimeout(ct,0);return cr=f.now()}function cj(){try{return new a.ActiveXObject("Microsoft.XMLHTTP")}catch(b){}}function ci(){try{return new a.XMLHttpRequest}catch(b){}}function cc(a,c){a.dataFilter&&(c=a.dataFilter(c,a.dataType));var d=a.dataTypes,e={},g,h,i=d.length,j,k=d[0],l,m,n,o,p;for(g=1;g<i;g++){if(g===1)for(h in a.converters)typeof h=="string"&&(e[h.toLowerCase()]=a.converters[h]);l=k,k=d[g];if(k==="*")k=l;else if(l!=="*"&&l!==k){m=l+" "+k,n=e[m]||e["* "+k];if(!n){p=b;for(o in e){j=o.split(" ");if(j[0]===l||j[0]==="*"){p=e[j[1]+" "+k];if(p){o=e[o],o===!0?n=p:p===!0&&(n=o);break}}}}!n&&!p&&f.error("No conversion from "+m.replace(" "," to ")),n!==!0&&(c=n?n(c):p(o(c)))}}return c}function cb(a,c,d){var e=a.contents,f=a.dataTypes,g=a.responseFields,h,i,j,k;for(i in g)i in d&&(c[g[i]]=d[i]);while(f[0]==="*")f.shift(),h===b&&(h=a.mimeType||c.getResponseHeader("content-type"));if(h)for(i in e)if(e[i]&&e[i].test(h)){f.unshift(i);break}if(f[0]in d)j=f[0];else{for(i in d){if(!f[0]||a.converters[i+" "+f[0]]){j=i;break}k||(k=i)}j=j||k}if(j){j!==f[0]&&f.unshift(j);return d[j]}}function ca(a,b,c,d){if(f.isArray(b))f.each(b,function(b,e){c||bE.test(a)?d(a,e):ca(a+"["+(typeof e=="object"||f.isArray(e)?b:"")+"]",e,c,d)});else if(!c&&b!=null&&typeof b=="object")for(var e in b)ca(a+"["+e+"]",b[e],c,d);else d(a,b)}function b_(a,c){var d,e,g=f.ajaxSettings.flatOptions||{};for(d in c)c[d]!==b&&((g[d]?a:e||(e={}))[d]=c[d]);e&&f.extend(!0,a,e)}function b$(a,c,d,e,f,g){f=f||c.dataTypes[0],g=g||{},g[f]=!0;var h=a[f],i=0,j=h?h.length:0,k=a===bT,l;for(;i<j&&(k||!l);i++)l=h[i](c,d,e),typeof l=="string"&&(!k||g[l]?l=b:(c.dataTypes.unshift(l),l=b$(a,c,d,e,l,g)));(k||!l)&&!g["*"]&&(l=b$(a,c,d,e,"*",g));return l}function bZ(a){return function(b,c){typeof b!="string"&&(c=b,b="*");if(f.isFunction(c)){var d=b.toLowerCase().split(bP),e=0,g=d.length,h,i,j;for(;e<g;e++)h=d[e],j=/^\+/.test(h),j&&(h=h.substr(1)||"*"),i=a[h]=a[h]||[],i[j?"unshift":"push"](c)}}}function bC(a,b,c){var d=b==="width"?a.offsetWidth:a.offsetHeight,e=b==="width"?bx:by,g=0,h=e.length;if(d>0){if(c!=="border")for(;g<h;g++)c||(d-=parseFloat(f.css(a,"padding"+e[g]))||0),c==="margin"?d+=parseFloat(f.css(a,c+e[g]))||0:d-=parseFloat(f.css(a,"border"+e[g]+"Width"))||0;return d+"px"}d=bz(a,b,b);if(d<0||d==null)d=a.style[b]||0;d=parseFloat(d)||0;if(c)for(;g<h;g++)d+=parseFloat(f.css(a,"padding"+e[g]))||0,c!=="padding"&&(d+=parseFloat(f.css(a,"border"+e[g]+"Width"))||0),c==="margin"&&(d+=parseFloat(f.css(a,c+e[g]))||0);return d+"px"}function bp(a,b){b.src?f.ajax({url:b.src,async:!1,dataType:"script"}):f.globalEval((b.text||b.textContent||b.innerHTML||"").replace(bf,"/*$0*/")),b.parentNode&&b.parentNode.removeChild(b)}function bo(a){var b=c.createElement("div");bh.appendChild(b),b.innerHTML=a.outerHTML;return b.firstChild}function bn(a){var b=(a.nodeName||"").toLowerCase();b==="input"?bm(a):b!=="script"&&typeof a.getElementsByTagName!="undefined"&&f.grep(a.getElementsByTagName("input"),bm)}function bm(a){if(a.type==="checkbox"||a.type==="radio")a.defaultChecked=a.checked}function bl(a){return typeof a.getElementsByTagName!="undefined"?a.getElementsByTagName("*"):typeof a.querySelectorAll!="undefined"?a.querySelectorAll("*"):[]}function bk(a,b){var c;if(b.nodeType===1){b.clearAttributes&&b.clearAttributes(),b.mergeAttributes&&b.mergeAttributes(a),c=b.nodeName.toLowerCase();if(c==="object")b.outerHTML=a.outerHTML;else if(c!=="input"||a.type!=="checkbox"&&a.type!=="radio"){if(c==="option")b.selected=a.defaultSelected;else if(c==="input"||c==="textarea")b.defaultValue=a.defaultValue}else a.checked&&(b.defaultChecked=b.checked=a.checked),b.value!==a.value&&(b.value=a.value);b.removeAttribute(f.expando)}}function bj(a,b){if(b.nodeType===1&&!!f.hasData(a)){var c,d,e,g=f._data(a),h=f._data(b,g),i=g.events;if(i){delete h.handle,h.events={};for(c in i)for(d=0,e=i[c].length;d<e;d++)f.event.add(b,c+(i[c][d].namespace?".":"")+i[c][d].namespace,i[c][d],i[c][d].data)}h.data&&(h.data=f.extend({},h.data))}}function bi(a,b){return f.nodeName(a,"table")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function U(a){var b=V.split("|"),c=a.createDocumentFragment();if(c.createElement)while(b.length)c.createElement(b.pop());return c}function T(a,b,c){b=b||0;if(f.isFunction(b))return f.grep(a,function(a,d){var e=!!b.call(a,d,a);return e===c});if(b.nodeType)return f.grep(a,function(a,d){return a===b===c});if(typeof b=="string"){var d=f.grep(a,function(a){return a.nodeType===1});if(O.test(b))return f.filter(b,d,!c);b=f.filter(b,d)}return f.grep(a,function(a,d){return f.inArray(a,b)>=0===c})}function S(a){return!a||!a.parentNode||a.parentNode.nodeType===11}function K(){return!0}function J(){return!1}function n(a,b,c){var d=b+"defer",e=b+"queue",g=b+"mark",h=f._data(a,d);h&&(c==="queue"||!f._data(a,e))&&(c==="mark"||!f._data(a,g))&&setTimeout(function(){!f._data(a,e)&&!f._data(a,g)&&(f.removeData(a,d,!0),h.fire())},0)}function m(a){for(var b in a){if(b==="data"&&f.isEmptyObject(a[b]))continue;if(b!=="toJSON")return!1}return!0}function l(a,c,d){if(d===b&&a.nodeType===1){var e="data-"+c.replace(k,"-$1").toLowerCase();d=a.getAttribute(e);if(typeof d=="string"){try{d=d==="true"?!0:d==="false"?!1:d==="null"?null:f.isNumeric(d)?parseFloat(d):j.test(d)?f.parseJSON(d):d}catch(g){}f.data(a,c,d)}else d=b}return d}function h(a){var b=g[a]={},c,d;a=a.split(/\s+/);for(c=0,d=a.length;c<d;c++)b[a[c]]=!0;return b}var c=a.document,d=a.navigator,e=a.location,f=function(){function J(){if(!e.isReady){try{c.documentElement.doScroll("left")}catch(a){setTimeout(J,1);return}e.ready()}}var e=function(a,b){return new e.fn.init(a,b,h)},f=a.jQuery,g=a.$,h,i=/^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,j=/\S/,k=/^\s+/,l=/\s+$/,m=/^<(\w+)\s*\/?>(?:<\/\1>)?$/,n=/^[\],:{}\s]*$/,o=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,p=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,q=/(?:^|:|,)(?:\s*\[)+/g,r=/(webkit)[ \/]([\w.]+)/,s=/(opera)(?:.*version)?[ \/]([\w.]+)/,t=/(msie) ([\w.]+)/,u=/(mozilla)(?:.*? rv:([\w.]+))?/,v=/-([a-z]|[0-9])/ig,w=/^-ms-/,x=function(a,b){return(b+"").toUpperCase()},y=d.userAgent,z,A,B,C=Object.prototype.toString,D=Object.prototype.hasOwnProperty,E=Array.prototype.push,F=Array.prototype.slice,G=String.prototype.trim,H=Array.prototype.indexOf,I={};e.fn=e.prototype={constructor:e,init:function(a,d,f){var g,h,j,k;if(!a)return this;if(a.nodeType){this.context=this[0]=a,this.length=1;return this}if(a==="body"&&!d&&c.body){this.context=c,this[0]=c.body,this.selector=a,this.length=1;return this}if(typeof a=="string"){a.charAt(0)!=="<"||a.charAt(a.length-1)!==">"||a.length<3?g=i.exec(a):g=[null,a,null];if(g&&(g[1]||!d)){if(g[1]){d=d instanceof e?d[0]:d,k=d?d.ownerDocument||d:c,j=m.exec(a),j?e.isPlainObject(d)?(a=[c.createElement(j[1])],e.fn.attr.call(a,d,!0)):a=[k.createElement(j[1])]:(j=e.buildFragment([g[1]],[k]),a=(j.cacheable?e.clone(j.fragment):j.fragment).childNodes);return e.merge(this,a)}h=c.getElementById(g[2]);if(h&&h.parentNode){if(h.id!==g[2])return f.find(a);this.length=1,this[0]=h}this.context=c,this.selector=a;return this}return!d||d.jquery?(d||f).find(a):this.constructor(d).find(a)}if(e.isFunction(a))return f.ready(a);a.selector!==b&&(this.selector=a.selector,this.context=a.context);return e.makeArray(a,this)},selector:"",jquery:"1.7.1",length:0,size:function(){return this.length},toArray:function(){return F.call(this,0)},get:function(a){return a==null?this.toArray():a<0?this[this.length+a]:this[a]},pushStack:function(a,b,c){var d=this.constructor();e.isArray(a)?E.apply(d,a):e.merge(d,a),d.prevObject=this,d.context=this.context,b==="find"?d.selector=this.selector+(this.selector?" ":"")+c:b&&(d.selector=this.selector+"."+b+"("+c+")");return d},each:function(a,b){return e.each(this,a,b)},ready:function(a){e.bindReady(),A.add(a);return this},eq:function(a){a=+a;return a===-1?this.slice(a):this.slice(a,a+1)},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},slice:function(){return this.pushStack(F.apply(this,arguments),"slice",F.call(arguments).join(","))},map:function(a){return this.pushStack(e.map(this,function(b,c){return a.call(b,c,b)}))},end:function(){return this.prevObject||this.constructor(null)},push:E,sort:[].sort,splice:[].splice},e.fn.init.prototype=e.fn,e.extend=e.fn.extend=function(){var a,c,d,f,g,h,i=arguments[0]||{},j=1,k=arguments.length,l=!1;typeof i=="boolean"&&(l=i,i=arguments[1]||{},j=2),typeof i!="object"&&!e.isFunction(i)&&(i={}),k===j&&(i=this,--j);for(;j<k;j++)if((a=arguments[j])!=null)for(c in a){d=i[c],f=a[c];if(i===f)continue;l&&f&&(e.isPlainObject(f)||(g=e.isArray(f)))?(g?(g=!1,h=d&&e.isArray(d)?d:[]):h=d&&e.isPlainObject(d)?d:{},i[c]=e.extend(l,h,f)):f!==b&&(i[c]=f)}return i},e.extend({noConflict:function(b){a.$===e&&(a.$=g),b&&a.jQuery===e&&(a.jQuery=f);return e},isReady:!1,readyWait:1,holdReady:function(a){a?e.readyWait++:e.ready(!0)},ready:function(a){if(a===!0&&!--e.readyWait||a!==!0&&!e.isReady){if(!c.body)return setTimeout(e.ready,1);e.isReady=!0;if(a!==!0&&--e.readyWait>0)return;A.fireWith(c,[e]),e.fn.trigger&&e(c).trigger("ready").off("ready")}},bindReady:function(){if(!A){A=e.Callbacks("once memory");if(c.readyState==="complete")return setTimeout(e.ready,1);if(c.addEventListener)c.addEventListener("DOMContentLoaded",B,!1),a.addEventListener("load",e.ready,!1);else if(c.attachEvent){c.attachEvent("onreadystatechange",B),a.attachEvent("onload",e.ready);var b=!1;try{b=a.frameElement==null}catch(d){}c.documentElement.doScroll&&b&&J()}}},isFunction:function(a){return e.type(a)==="function"},isArray:Array.isArray||function(a){return e.type(a)==="array"},isWindow:function(a){return a&&typeof a=="object"&&"setInterval"in a},isNumeric:function(a){return!isNaN(parseFloat(a))&&isFinite(a)},type:function(a){return a==null?String(a):I[C.call(a)]||"object"},isPlainObject:function(a){if(!a||e.type(a)!=="object"||a.nodeType||e.isWindow(a))return!1;try{if(a.constructor&&!D.call(a,"constructor")&&!D.call(a.constructor.prototype,"isPrototypeOf"))return!1}catch(c){return!1}var d;for(d in a);return d===b||D.call(a,d)},isEmptyObject:function(a){for(var b in a)return!1;return!0},error:function(a){throw new Error(a)},parseJSON:function(b){if(typeof b!="string"||!b)return null;b=e.trim(b);if(a.JSON&&a.JSON.parse)return a.JSON.parse(b);if(n.test(b.replace(o,"@").replace(p,"]").replace(q,"")))return(new Function("return "+b))();e.error("Invalid JSON: "+b)},parseXML:function(c){var d,f;try{a.DOMParser?(f=new DOMParser,d=f.parseFromString(c,"text/xml")):(d=new ActiveXObject("Microsoft.XMLDOM"),d.async="false",d.loadXML(c))}catch(g){d=b}(!d||!d.documentElement||d.getElementsByTagName("parsererror").length)&&e.error("Invalid XML: "+c);return d},noop:function(){},globalEval:function(b){b&&j.test(b)&&(a.execScript||function(b){a.eval.call(a,b)})(b)},camelCase:function(a){return a.replace(w,"ms-").replace(v,x)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toUpperCase()===b.toUpperCase()},each:function(a,c,d){var f,g=0,h=a.length,i=h===b||e.isFunction(a);if(d){if(i){for(f in a)if(c.apply(a[f],d)===!1)break}else for(;g<h;)if(c.apply(a[g++],d)===!1)break}else if(i){for(f in a)if(c.call(a[f],f,a[f])===!1)break}else for(;g<h;)if(c.call(a[g],g,a[g++])===!1)break;return a},trim:G?function(a){return a==null?"":G.call(a)}:function(a){return a==null?"":(a+"").replace(k,"").replace(l,"")},makeArray:function(a,b){var c=b||[];if(a!=null){var d=e.type(a);a.length==null||d==="string"||d==="function"||d==="regexp"||e.isWindow(a)?E.call(c,a):e.merge(c,a)}return c},inArray:function(a,b,c){var d;if(b){if(H)return H.call(b,a,c);d=b.length,c=c?c<0?Math.max(0,d+c):c:0;for(;c<d;c++)if(c in b&&b[c]===a)return c}return-1},merge:function(a,c){var d=a.length,e=0;if(typeof c.length=="number")for(var f=c.length;e<f;e++)a[d++]=c[e];else while(c[e]!==b)a[d++]=c[e++];a.length=d;return a},grep:function(a,b,c){var d=[],e;c=!!c;for(var f=0,g=a.length;f<g;f++)e=!!b(a[f],f),c!==e&&d.push(a[f]);return d},map:function(a,c,d){var f,g,h=[],i=0,j=a.length,k=a instanceof e||j!==b&&typeof j=="number"&&(j>0&&a[0]&&a[j-1]||j===0||e.isArray(a));if(k)for(;i<j;i++)f=c(a[i],i,d),f!=null&&(h[h.length]=f);else for(g in a)f=c(a[g],g,d),f!=null&&(h[h.length]=f);return h.concat.apply([],h)},guid:1,proxy:function(a,c){if(typeof c=="string"){var d=a[c];c=a,a=d}if(!e.isFunction(a))return b;var f=F.call(arguments,2),g=function(){return a.apply(c,f.concat(F.call(arguments)))};g.guid=a.guid=a.guid||g.guid||e.guid++;return g},access:function(a,c,d,f,g,h){var i=a.length;if(typeof c=="object"){for(var j in c)e.access(a,j,c[j],f,g,d);return a}if(d!==b){f=!h&&f&&e.isFunction(d);for(var k=0;k<i;k++)g(a[k],c,f?d.call(a[k],k,g(a[k],c)):d,h);return a}return i?g(a[0],c):b},now:function(){return(new Date).getTime()},uaMatch:function(a){a=a.toLowerCase();var b=r.exec(a)||s.exec(a)||t.exec(a)||a.indexOf("compatible")<0&&u.exec(a)||[];return{browser:b[1]||"",version:b[2]||"0"}},sub:function(){function a(b,c){return new a.fn.init(b,c)}e.extend(!0,a,this),a.superclass=this,a.fn=a.prototype=this(),a.fn.constructor=a,a.sub=this.sub,a.fn.init=function(d,f){f&&f instanceof e&&!(f instanceof a)&&(f=a(f));return e.fn.init.call(this,d,f,b)},a.fn.init.prototype=a.fn;var b=a(c);return a},browser:{}}),e.each("Boolean Number String Function Array Date RegExp Object".split(" "),function(a,b){I["[object "+b+"]"]=b.toLowerCase()}),z=e.uaMatch(y),z.browser&&(e.browser[z.browser]=!0,e.browser.version=z.version),e.browser.webkit&&(e.browser.safari=!0),j.test(" ")&&(k=/^[\s\xA0]+/,l=/[\s\xA0]+$/),h=e(c),c.addEventListener?B=function(){c.removeEventListener("DOMContentLoaded",B,!1),e.ready()}:c.attachEvent&&(B=function(){c.readyState==="complete"&&(c.detachEvent("onreadystatechange",B),e.ready())});return e}(),g={};f.Callbacks=function(a){a=a?g[a]||h(a):{};var c=[],d=[],e,i,j,k,l,m=function(b){var d,e,g,h,i;for(d=0,e=b.length;d<e;d++)g=b[d],h=f.type(g),h==="array"?m(g):h==="function"&&(!a.unique||!o.has(g))&&c.push(g)},n=function(b,f){f=f||[],e=!a.memory||[b,f],i=!0,l=j||0,j=0,k=c.length;for(;c&&l<k;l++)if(c[l].apply(b,f)===!1&&a.stopOnFalse){e=!0;break}i=!1,c&&(a.once?e===!0?o.disable():c=[]:d&&d.length&&(e=d.shift(),o.fireWith(e[0],e[1])))},o={add:function(){if(c){var a=c.length;m(arguments),i?k=c.length:e&&e!==!0&&(j=a,n(e[0],e[1]))}return this},remove:function(){if(c){var b=arguments,d=0,e=b.length;for(;d<e;d++)for(var f=0;f<c.length;f++)if(b[d]===c[f]){i&&f<=k&&(k--,f<=l&&l--),c.splice(f--,1);if(a.unique)break}}return this},has:function(a){if(c){var b=0,d=c.length;for(;b<d;b++)if(a===c[b])return!0}return!1},empty:function(){c=[];return this},disable:function(){c=d=e=b;return this},disabled:function(){return!c},lock:function(){d=b,(!e||e===!0)&&o.disable();return this},locked:function(){return!d},fireWith:function(b,c){d&&(i?a.once||d.push([b,c]):(!a.once||!e)&&n(b,c));return this},fire:function(){o.fireWith(this,arguments);return this},fired:function(){return!!e}};return o};var i=[].slice;f.extend({Deferred:function(a){var b=f.Callbacks("once memory"),c=f.Callbacks("once memory"),d=f.Callbacks("memory"),e="pending",g={resolve:b,reject:c,notify:d},h={done:b.add,fail:c.add,progress:d.add,state:function(){return e},isResolved:b.fired,isRejected:c.fired,then:function(a,b,c){i.done(a).fail(b).progress(c);return this},always:function(){i.done.apply(i,arguments).fail.apply(i,arguments);return this},pipe:function(a,b,c){return f.Deferred(function(d){f.each({done:[a,"resolve"],fail:[b,"reject"],progress:[c,"notify"]},function(a,b){var c=b[0],e=b[1],g;f.isFunction(c)?i[a](function(){g=c.apply(this,arguments),g&&f.isFunction(g.promise)?g.promise().then(d.resolve,d.reject,d.notify):d[e+"With"](this===i?d:this,[g])}):i[a](d[e])})}).promise()},promise:function(a){if(a==null)a=h;else for(var b in h)a[b]=h[b];return a}},i=h.promise({}),j;for(j in g)i[j]=g[j].fire,i[j+"With"]=g[j].fireWith;i.done(function(){e="resolved"},c.disable,d.lock).fail(function(){e="rejected"},b.disable,d.lock),a&&a.call(i,i);return i},when:function(a){function m(a){return function(b){e[a]=arguments.length>1?i.call(arguments,0):b,j.notifyWith(k,e)}}function l(a){return function(c){b[a]=arguments.length>1?i.call(arguments,0):c,--g||j.resolveWith(j,b)}}var b=i.call(arguments,0),c=0,d=b.length,e=Array(d),g=d,h=d,j=d<=1&&a&&f.isFunction(a.promise)?a:f.Deferred(),k=j.promise();if(d>1){for(;c<d;c++)b[c]&&b[c].promise&&f.isFunction(b[c].promise)?b[c].promise().then(l(c),j.reject,m(c)):--g;g||j.resolveWith(j,b)}else j!==a&&j.resolveWith(j,d?[a]:[]);return k}}),f.support=function(){var b,d,e,g,h,i,j,k,l,m,n,o,p,q=c.createElement("div"),r=c.documentElement;q.setAttribute("className","t"),q.innerHTML="   <link/><table></table><a href='/a' style='top:1px;float:left;opacity:.55;'>a</a><input type='checkbox'/>",d=q.getElementsByTagName("*"),e=q.getElementsByTagName("a")[0];if(!d||!d.length||!e)return{};g=c.createElement("select"),h=g.appendChild(c.createElement("option")),i=q.getElementsByTagName("input")[0],b={leadingWhitespace:q.firstChild.nodeType===3,tbody:!q.getElementsByTagName("tbody").length,htmlSerialize:!!q.getElementsByTagName("link").length,style:/top/.test(e.getAttribute("style")),hrefNormalized:e.getAttribute("href")==="/a",opacity:/^0.55/.test(e.style.opacity),cssFloat:!!e.style.cssFloat,checkOn:i.value==="on",optSelected:h.selected,getSetAttribute:q.className!=="t",enctype:!!c.createElement("form").enctype,html5Clone:c.createElement("nav").cloneNode(!0).outerHTML!=="<:nav></:nav>",submitBubbles:!0,changeBubbles:!0,focusinBubbles:!1,deleteExpando:!0,noCloneEvent:!0,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableMarginRight:!0},i.checked=!0,b.noCloneChecked=i.cloneNode(!0).checked,g.disabled=!0,b.optDisabled=!h.disabled;try{delete q.test}catch(s){b.deleteExpando=!1}!q.addEventListener&&q.attachEvent&&q.fireEvent&&(q.attachEvent("onclick",function(){b.noCloneEvent=!1}),q.cloneNode(!0).fireEvent("onclick")),i=c.createElement("input"),i.value="t",i.setAttribute("type","radio"),b.radioValue=i.value==="t",i.setAttribute("checked","checked"),q.appendChild(i),k=c.createDocumentFragment(),k.appendChild(q.lastChild),b.checkClone=k.cloneNode(!0).cloneNode(!0).lastChild.checked,b.appendChecked=i.checked,k.removeChild(i),k.appendChild(q),q.innerHTML="",a.getComputedStyle&&(j=c.createElement("div"),j.style.width="0",j.style.marginRight="0",q.style.width="2px",q.appendChild(j),b.reliableMarginRight=(parseInt((a.getComputedStyle(j,null)||{marginRight:0}).marginRight,10)||0)===0);if(q.attachEvent)for(o in{submit:1,change:1,focusin:1})n="on"+o,p=n in q,p||(q.setAttribute(n,"return;"),p=typeof q[n]=="function"),b[o+"Bubbles"]=p;k.removeChild(q),k=g=h=j=q=i=null,f(function(){var a,d,e,g,h,i,j,k,m,n,o,r=c.getElementsByTagName("body")[0];!r||(j=1,k="position:absolute;top:0;left:0;width:1px;height:1px;margin:0;",m="visibility:hidden;border:0;",n="style='"+k+"border:5px solid #000;padding:0;'",o="<div "+n+"><div></div></div>"+"<table "+n+" cellpadding='0' cellspacing='0'>"+"<tr><td></td></tr></table>",a=c.createElement("div"),a.style.cssText=m+"width:0;height:0;position:static;top:0;margin-top:"+j+"px",r.insertBefore(a,r.firstChild),q=c.createElement("div"),a.appendChild(q),q.innerHTML="<table><tr><td style='padding:0;border:0;display:none'></td><td>t</td></tr></table>",l=q.getElementsByTagName("td"),p=l[0].offsetHeight===0,l[0].style.display="",l[1].style.display="none",b.reliableHiddenOffsets=p&&l[0].offsetHeight===0,q.innerHTML="",q.style.width=q.style.paddingLeft="1px",f.boxModel=b.boxModel=q.offsetWidth===2,typeof q.style.zoom!="undefined"&&(q.style.display="inline",q.style.zoom=1,b.inlineBlockNeedsLayout=q.offsetWidth===2,q.style.display="",q.innerHTML="<div style='width:4px;'></div>",b.shrinkWrapBlocks=q.offsetWidth!==2),q.style.cssText=k+m,q.innerHTML=o,d=q.firstChild,e=d.firstChild,h=d.nextSibling.firstChild.firstChild,i={doesNotAddBorder:e.offsetTop!==5,doesAddBorderForTableAndCells:h.offsetTop===5},e.style.position="fixed",e.style.top="20px",i.fixedPosition=e.offsetTop===20||e.offsetTop===15,e.style.position=e.style.top="",d.style.overflow="hidden",d.style.position="relative",i.subtractsBorderForOverflowNotVisible=e.offsetTop===-5,i.doesNotIncludeMarginInBodyOffset=r.offsetTop!==j,r.removeChild(a),q=a=null,f.extend(b,i))});return b}();var j=/^(?:\{.*\}|\[.*\])$/,k=/([A-Z])/g;f.extend({cache:{},uuid:0,expando:"jQuery"+(f.fn.jquery+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(a){a=a.nodeType?f.cache[a[f.expando]]:a[f.expando];return!!a&&!m(a)},data:function(a,c,d,e){if(!!f.acceptData(a)){var g,h,i,j=f.expando,k=typeof c=="string",l=a.nodeType,m=l?f.cache:a,n=l?a[j]:a[j]&&j,o=c==="events";if((!n||!m[n]||!o&&!e&&!m[n].data)&&k&&d===b)return;n||(l?a[j]=n=++f.uuid:n=j),m[n]||(m[n]={},l||(m[n].toJSON=f.noop));if(typeof c=="object"||typeof c=="function")e?m[n]=f.extend(m[n],c):m[n].data=f.extend(m[n].data,c);g=h=m[n],e||(h.data||(h.data={}),h=h.data),d!==b&&(h[f.camelCase(c)]=d);if(o&&!h[c])return g.events;k?(i=h[c],i==null&&(i=h[f.camelCase(c)])):i=h;return i}},removeData:function(a,b,c){if(!!f.acceptData(a)){var d,e,g,h=f.expando,i=a.nodeType,j=i?f.cache:a,k=i?a[h]:h;if(!j[k])return;if(b){d=c?j[k]:j[k].data;if(d){f.isArray(b)||(b in d?b=[b]:(b=f.camelCase(b),b in d?b=[b]:b=b.split(" ")));for(e=0,g=b.length;e<g;e++)delete d[b[e]];if(!(c?m:f.isEmptyObject)(d))return}}if(!c){delete j[k].data;if(!m(j[k]))return}f.support.deleteExpando||!j.setInterval?delete j[k]:j[k]=null,i&&(f.support.deleteExpando?delete a[h]:a.removeAttribute?a.removeAttribute(h):a[h]=null)}},_data:function(a,b,c){return f.data(a,b,c,!0)},acceptData:function(a){if(a.nodeName){var b=f.noData[a.nodeName.toLowerCase()];if(b)return b!==!0&&a.getAttribute("classid")===b}return!0}}),f.fn.extend({data:function(a,c){var d,e,g,h=null;if(typeof a=="undefined"){if(this.length){h=f.data(this[0]);if(this[0].nodeType===1&&!f._data(this[0],"parsedAttrs")){e=this[0].attributes;for(var i=0,j=e.length;i<j;i++)g=e[i].name,g.indexOf("data-")===0&&(g=f.camelCase(g.substring(5)),l(this[0],g,h[g]));f._data(this[0],"parsedAttrs",!0)}}return h}if(typeof a=="object")return this.each(function(){f.data(this,a)});d=a.split("."),d[1]=d[1]?"."+d[1]:"";if(c===b){h=this.triggerHandler("getData"+d[1]+"!",[d[0]]),h===b&&this.length&&(h=f.data(this[0],a),h=l(this[0],a,h));return h===b&&d[1]?this.data(d[0]):h}return this.each(function(){var b=f(this),e=[d[0],c];b.triggerHandler("setData"+d[1]+"!",e),f.data(this,a,c),b.triggerHandler("changeData"+d[1]+"!",e)})},removeData:function(a){return this.each(function(){f.removeData(this,a)})}}),f.extend({_mark:function(a,b){a&&(b=(b||"fx")+"mark",f._data(a,b,(f._data(a,b)||0)+1))},_unmark:function(a,b,c){a!==!0&&(c=b,b=a,a=!1);if(b){c=c||"fx";var d=c+"mark",e=a?0:(f._data(b,d)||1)-1;e?f._data(b,d,e):(f.removeData(b,d,!0),n(b,c,"mark"))}},queue:function(a,b,c){var d;if(a){b=(b||"fx")+"queue",d=f._data(a,b),c&&(!d||f.isArray(c)?d=f._data(a,b,f.makeArray(c)):d.push(c));return d||[]}},dequeue:function(a,b){b=b||"fx";var c=f.queue(a,b),d=c.shift(),e={};d==="inprogress"&&(d=c.shift()),d&&(b==="fx"&&c.unshift("inprogress"),f._data(a,b+".run",e),d.call(a,function(){f.dequeue(a,b)},e)),c.length||(f.removeData(a,b+"queue "+b+".run",!0),n(a,b,"queue"))}}),f.fn.extend({queue:function(a,c){typeof a!="string"&&(c=a,a="fx");if(c===b)return f.queue(this[0],a);return this.each(function(){var b=f.queue(this,a,c);a==="fx"&&b[0]!=="inprogress"&&f.dequeue(this,a)})},dequeue:function(a){return this.each(function(){f.dequeue(this,a)})},delay:function(a,b){a=f.fx?f.fx.speeds[a]||a:a,b=b||"fx";return this.queue(b,function(b,c){var d=setTimeout(b,a);c.stop=function(){clearTimeout(d)}})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,c){function m(){--h||d.resolveWith(e,[e])}typeof a!="string"&&(c=a,a=b),a=a||"fx";var d=f.Deferred(),e=this,g=e.length,h=1,i=a+"defer",j=a+"queue",k=a+"mark",l;while(g--)if(l=f.data(e[g],i,b,!0)||(f.data(e[g],j,b,!0)||f.data(e[g],k,b,!0))&&f.data(e[g],i,f.Callbacks("once memory"),!0))h++,l.add(m);m();return d.promise()}});var o=/[\n\t\r]/g,p=/\s+/,q=/\r/g,r=/^(?:button|input)$/i,s=/^(?:button|input|object|select|textarea)$/i,t=/^a(?:rea)?$/i,u=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,v=f.support.getSetAttribute,w,x,y;f.fn.extend({attr:function(a,b){return f.access(this,a,b,!0,f.attr)},removeAttr:function(a){return this.each(function(){f.removeAttr(this,a)})},prop:function(a,b){return f.access(this,a,b,!0,f.prop)},removeProp:function(a){a=f.propFix[a]||a;return this.each(function(){try{this[a]=b,delete this[a]}catch(c){}})},addClass:function(a){var b,c,d,e,g,h,i;if(f.isFunction(a))return this.each(function(b){f(this).addClass(a.call(this,b,this.className))});if(a&&typeof a=="string"){b=a.split(p);for(c=0,d=this.length;c<d;c++){e=this[c];if(e.nodeType===1)if(!e.className&&b.length===1)e.className=a;else{g=" "+e.className+" ";for(h=0,i=b.length;h<i;h++)~g.indexOf(" "+b[h]+" ")||(g+=b[h]+" ");e.className=f.trim(g)}}}return this},removeClass:function(a){var c,d,e,g,h,i,j;if(f.isFunction(a))return this.each(function(b){f(this).removeClass(a.call(this,b,this.className))});if(a&&typeof a=="string"||a===b){c=(a||"").split(p);for(d=0,e=this.length;d<e;d++){g=this[d];if(g.nodeType===1&&g.className)if(a){h=(" "+g.className+" ").replace(o," ");for(i=0,j=c.length;i<j;i++)h=h.replace(" "+c[i]+" "," ");g.className=f.trim(h)}else g.className=""}}return this},toggleClass:function(a,b){var c=typeof a,d=typeof b=="boolean";if(f.isFunction(a))return this.each(function(c){f(this).toggleClass(a.call(this,c,this.className,b),b)});return this.each(function(){if(c==="string"){var e,g=0,h=f(this),i=b,j=a.split(p);while(e=j[g++])i=d?i:!h.hasClass(e),h[i?"addClass":"removeClass"](e)}else if(c==="undefined"||c==="boolean")this.className&&f._data(this,"__className__",this.className),this.className=this.className||a===!1?"":f._data(this,"__className__")||""})},hasClass:function(a){var b=" "+a+" ",c=0,d=this.length;for(;c<d;c++)if(this[c].nodeType===1&&(" "+this[c].className+" ").replace(o," ").indexOf(b)>-1)return!0;return!1},val:function(a){var c,d,e,g=this[0];{if(!!arguments.length){e=f.isFunction(a);return this.each(function(d){var g=f(this),h;if(this.nodeType===1){e?h=a.call(this,d,g.val()):h=a,h==null?h="":typeof h=="number"?h+="":f.isArray(h)&&(h=f.map(h,function(a){return a==null?"":a+""})),c=f.valHooks[this.nodeName.toLowerCase()]||f.valHooks[this.type];if(!c||!("set"in c)||c.set(this,h,"value")===b)this.value=h}})}if(g){c=f.valHooks[g.nodeName.toLowerCase()]||f.valHooks[g.type];if(c&&"get"in c&&(d=c.get(g,"value"))!==b)return d;d=g.value;return typeof d=="string"?d.replace(q,""):d==null?"":d}}}}),f.extend({valHooks:{option:{get:function(a){var b=a.attributes.value;return!b||b.specified?a.value:a.text}},select:{get:function(a){var b,c,d,e,g=a.selectedIndex,h=[],i=a.options,j=a.type==="select-one";if(g<0)return null;c=j?g:0,d=j?g+1:i.length;for(;c<d;c++){e=i[c];if(e.selected&&(f.support.optDisabled?!e.disabled:e.getAttribute("disabled")===null)&&(!e.parentNode.disabled||!f.nodeName(e.parentNode,"optgroup"))){b=f(e).val();if(j)return b;h.push(b)}}if(j&&!h.length&&i.length)return f(i[g]).val();return h},set:function(a,b){var c=f.makeArray(b);f(a).find("option").each(function(){this.selected=f.inArray(f(this).val(),c)>=0}),c.length||(a.selectedIndex=-1);return c}}},attrFn:{val:!0,css:!0,html:!0,text:!0,data:!0,width:!0,height:!0,offset:!0},attr:function(a,c,d,e){var g,h,i,j=a.nodeType;if(!!a&&j!==3&&j!==8&&j!==2){if(e&&c in f.attrFn)return f(a)[c](d);if(typeof a.getAttribute=="undefined")return f.prop(a,c,d);i=j!==1||!f.isXMLDoc(a),i&&(c=c.toLowerCase(),h=f.attrHooks[c]||(u.test(c)?x:w));if(d!==b){if(d===null){f.removeAttr(a,c);return}if(h&&"set"in h&&i&&(g=h.set(a,d,c))!==b)return g;a.setAttribute(c,""+d);return d}if(h&&"get"in h&&i&&(g=h.get(a,c))!==null)return g;g=a.getAttribute(c);return g===null?b:g}},removeAttr:function(a,b){var c,d,e,g,h=0;if(b&&a.nodeType===1){d=b.toLowerCase().split(p),g=d.length;for(;h<g;h++)e=d[h],e&&(c=f.propFix[e]||e,f.attr(a,e,""),a.removeAttribute(v?e:c),u.test(e)&&c in a&&(a[c]=!1))}},attrHooks:{type:{set:function(a,b){if(r.test(a.nodeName)&&a.parentNode)f.error("type property can't be changed");else if(!f.support.radioValue&&b==="radio"&&f.nodeName(a,"input")){var c=a.value;a.setAttribute("type",b),c&&(a.value=c);return b}}},value:{get:function(a,b){if(w&&f.nodeName(a,"button"))return w.get(a,b);return b in a?a.value:null},set:function(a,b,c){if(w&&f.nodeName(a,"button"))return w.set(a,b,c);a.value=b}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(a,c,d){var e,g,h,i=a.nodeType;if(!!a&&i!==3&&i!==8&&i!==2){h=i!==1||!f.isXMLDoc(a),h&&(c=f.propFix[c]||c,g=f.propHooks[c]);return d!==b?g&&"set"in g&&(e=g.set(a,d,c))!==b?e:a[c]=d:g&&"get"in g&&(e=g.get(a,c))!==null?e:a[c]}},propHooks:{tabIndex:{get:function(a){var c=a.getAttributeNode("tabindex");return c&&c.specified?parseInt(c.value,10):s.test(a.nodeName)||t.test(a.nodeName)&&a.href?0:b}}}}),f.attrHooks.tabindex=f.propHooks.tabIndex,x={get:function(a,c){var d,e=f.prop(a,c);return e===!0||typeof e!="boolean"&&(d=a.getAttributeNode(c))&&d.nodeValue!==!1?c.toLowerCase():b},set:function(a,b,c){var d;b===!1?f.removeAttr(a,c):(d=f.propFix[c]||c,d in a&&(a[d]=!0),a.setAttribute(c,c.toLowerCase()));return c}},v||(y={name:!0,id:!0},w=f.valHooks.button={get:function(a,c){var d;d=a.getAttributeNode(c);return d&&(y[c]?d.nodeValue!=="":d.specified)?d.nodeValue:b},set:function(a,b,d){var e=a.getAttributeNode(d);e||(e=c.createAttribute(d),a.setAttributeNode(e));return e.nodeValue=b+""}},f.attrHooks.tabindex.set=w.set,f.each(["width","height"],function(a,b){f.attrHooks[b]=f.extend(f.attrHooks[b],{set:function(a,c){if(c===""){a.setAttribute(b,"auto");return c}}})}),f.attrHooks.contenteditable={get:w.get,set:function(a,b,c){b===""&&(b="false"),w.set(a,b,c)}}),f.support.hrefNormalized||f.each(["href","src","width","height"],function(a,c){f.attrHooks[c]=f.extend(f.attrHooks[c],{get:function(a){var d=a.getAttribute(c,2);return d===null?b:d}})}),f.support.style||(f.attrHooks.style={get:function(a){return a.style.cssText.toLowerCase()||b},set:function(a,b){return a.style.cssText=""+b}}),f.support.optSelected||(f.propHooks.selected=f.extend(f.propHooks.selected,{get:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex);return null}})),f.support.enctype||(f.propFix.enctype="encoding"),f.support.checkOn||f.each(["radio","checkbox"],function(){f.valHooks[this]={get:function(a){return a.getAttribute("value")===null?"on":a.value}}}),f.each(["radio","checkbox"],function(){f.valHooks[this]=f.extend(f.valHooks[this],{set:function(a,b){if(f.isArray(b))return a.checked=f.inArray(f(a).val(),b)>=0}})});var z=/^(?:textarea|input|select)$/i,A=/^([^\.]*)?(?:\.(.+))?$/,B=/\bhover(\.\S+)?\b/,C=/^key/,D=/^(?:mouse|contextmenu)|click/,E=/^(?:focusinfocus|focusoutblur)$/,F=/^(\w*)(?:#([\w\-]+))?(?:\.([\w\-]+))?$/,G=function(a){var b=F.exec(a);b&&(b[1]=(b[1]||"").toLowerCase(),b[3]=b[3]&&new RegExp("(?:^|\\s)"+b[3]+"(?:\\s|$)"));return b},H=function(a,b){var c=a.attributes||{};return(!b[1]||a.nodeName.toLowerCase()===b[1])&&(!b[2]||(c.id||{}).value===b[2])&&(!b[3]||b[3].test((c["class"]||{}).value))},I=function(a){return f.event.special.hover?a:a.replace(B,"mouseenter$1 mouseleave$1")};
/* 3 */ f.event={add:function(a,c,d,e,g){var h,i,j,k,l,m,n,o,p,q,r,s;if(!(a.nodeType===3||a.nodeType===8||!c||!d||!(h=f._data(a)))){d.handler&&(p=d,d=p.handler),d.guid||(d.guid=f.guid++),j=h.events,j||(h.events=j={}),i=h.handle,i||(h.handle=i=function(a){return typeof f!="undefined"&&(!a||f.event.triggered!==a.type)?f.event.dispatch.apply(i.elem,arguments):b},i.elem=a),c=f.trim(I(c)).split(" ");for(k=0;k<c.length;k++){l=A.exec(c[k])||[],m=l[1],n=(l[2]||"").split(".").sort(),s=f.event.special[m]||{},m=(g?s.delegateType:s.bindType)||m,s=f.event.special[m]||{},o=f.extend({type:m,origType:l[1],data:e,handler:d,guid:d.guid,selector:g,quick:G(g),namespace:n.join(".")},p),r=j[m];if(!r){r=j[m]=[],r.delegateCount=0;if(!s.setup||s.setup.call(a,e,n,i)===!1)a.addEventListener?a.addEventListener(m,i,!1):a.attachEvent&&a.attachEvent("on"+m,i)}s.add&&(s.add.call(a,o),o.handler.guid||(o.handler.guid=d.guid)),g?r.splice(r.delegateCount++,0,o):r.push(o),f.event.global[m]=!0}a=null}},global:{},remove:function(a,b,c,d,e){var g=f.hasData(a)&&f._data(a),h,i,j,k,l,m,n,o,p,q,r,s;if(!!g&&!!(o=g.events)){b=f.trim(I(b||"")).split(" ");for(h=0;h<b.length;h++){i=A.exec(b[h])||[],j=k=i[1],l=i[2];if(!j){for(j in o)f.event.remove(a,j+b[h],c,d,!0);continue}p=f.event.special[j]||{},j=(d?p.delegateType:p.bindType)||j,r=o[j]||[],m=r.length,l=l?new RegExp("(^|\\.)"+l.split(".").sort().join("\\.(?:.*\\.)?")+"(\\.|$)"):null;for(n=0;n<r.length;n++)s=r[n],(e||k===s.origType)&&(!c||c.guid===s.guid)&&(!l||l.test(s.namespace))&&(!d||d===s.selector||d==="**"&&s.selector)&&(r.splice(n--,1),s.selector&&r.delegateCount--,p.remove&&p.remove.call(a,s));r.length===0&&m!==r.length&&((!p.teardown||p.teardown.call(a,l)===!1)&&f.removeEvent(a,j,g.handle),delete o[j])}f.isEmptyObject(o)&&(q=g.handle,q&&(q.elem=null),f.removeData(a,["events","handle"],!0))}},customEvent:{getData:!0,setData:!0,changeData:!0},trigger:function(c,d,e,g){if(!e||e.nodeType!==3&&e.nodeType!==8){var h=c.type||c,i=[],j,k,l,m,n,o,p,q,r,s;if(E.test(h+f.event.triggered))return;h.indexOf("!")>=0&&(h=h.slice(0,-1),k=!0),h.indexOf(".")>=0&&(i=h.split("."),h=i.shift(),i.sort());if((!e||f.event.customEvent[h])&&!f.event.global[h])return;c=typeof c=="object"?c[f.expando]?c:new f.Event(h,c):new f.Event(h),c.type=h,c.isTrigger=!0,c.exclusive=k,c.namespace=i.join("."),c.namespace_re=c.namespace?new RegExp("(^|\\.)"+i.join("\\.(?:.*\\.)?")+"(\\.|$)"):null,o=h.indexOf(":")<0?"on"+h:"";if(!e){j=f.cache;for(l in j)j[l].events&&j[l].events[h]&&f.event.trigger(c,d,j[l].handle.elem,!0);return}c.result=b,c.target||(c.target=e),d=d!=null?f.makeArray(d):[],d.unshift(c),p=f.event.special[h]||{};if(p.trigger&&p.trigger.apply(e,d)===!1)return;r=[[e,p.bindType||h]];if(!g&&!p.noBubble&&!f.isWindow(e)){s=p.delegateType||h,m=E.test(s+h)?e:e.parentNode,n=null;for(;m;m=m.parentNode)r.push([m,s]),n=m;n&&n===e.ownerDocument&&r.push([n.defaultView||n.parentWindow||a,s])}for(l=0;l<r.length&&!c.isPropagationStopped();l++)m=r[l][0],c.type=r[l][1],q=(f._data(m,"events")||{})[c.type]&&f._data(m,"handle"),q&&q.apply(m,d),q=o&&m[o],q&&f.acceptData(m)&&q.apply(m,d)===!1&&c.preventDefault();c.type=h,!g&&!c.isDefaultPrevented()&&(!p._default||p._default.apply(e.ownerDocument,d)===!1)&&(h!=="click"||!f.nodeName(e,"a"))&&f.acceptData(e)&&o&&e[h]&&(h!=="focus"&&h!=="blur"||c.target.offsetWidth!==0)&&!f.isWindow(e)&&(n=e[o],n&&(e[o]=null),f.event.triggered=h,e[h](),f.event.triggered=b,n&&(e[o]=n));return c.result}},dispatch:function(c){c=f.event.fix(c||a.event);var d=(f._data(this,"events")||{})[c.type]||[],e=d.delegateCount,g=[].slice.call(arguments,0),h=!c.exclusive&&!c.namespace,i=[],j,k,l,m,n,o,p,q,r,s,t;g[0]=c,c.delegateTarget=this;if(e&&!c.target.disabled&&(!c.button||c.type!=="click")){m=f(this),m.context=this.ownerDocument||this;for(l=c.target;l!=this;l=l.parentNode||this){o={},q=[],m[0]=l;for(j=0;j<e;j++)r=d[j],s=r.selector,o[s]===b&&(o[s]=r.quick?H(l,r.quick):m.is(s)),o[s]&&q.push(r);q.length&&i.push({elem:l,matches:q})}}d.length>e&&i.push({elem:this,matches:d.slice(e)});for(j=0;j<i.length&&!c.isPropagationStopped();j++){p=i[j],c.currentTarget=p.elem;for(k=0;k<p.matches.length&&!c.isImmediatePropagationStopped();k++){r=p.matches[k];if(h||!c.namespace&&!r.namespace||c.namespace_re&&c.namespace_re.test(r.namespace))c.data=r.data,c.handleObj=r,n=((f.event.special[r.origType]||{}).handle||r.handler).apply(p.elem,g),n!==b&&(c.result=n,n===!1&&(c.preventDefault(),c.stopPropagation()))}}return c.result},props:"attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(a,b){a.which==null&&(a.which=b.charCode!=null?b.charCode:b.keyCode);return a}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(a,d){var e,f,g,h=d.button,i=d.fromElement;a.pageX==null&&d.clientX!=null&&(e=a.target.ownerDocument||c,f=e.documentElement,g=e.body,a.pageX=d.clientX+(f&&f.scrollLeft||g&&g.scrollLeft||0)-(f&&f.clientLeft||g&&g.clientLeft||0),a.pageY=d.clientY+(f&&f.scrollTop||g&&g.scrollTop||0)-(f&&f.clientTop||g&&g.clientTop||0)),!a.relatedTarget&&i&&(a.relatedTarget=i===a.target?d.toElement:i),!a.which&&h!==b&&(a.which=h&1?1:h&2?3:h&4?2:0);return a}},fix:function(a){if(a[f.expando])return a;var d,e,g=a,h=f.event.fixHooks[a.type]||{},i=h.props?this.props.concat(h.props):this.props;a=f.Event(g);for(d=i.length;d;)e=i[--d],a[e]=g[e];a.target||(a.target=g.srcElement||c),a.target.nodeType===3&&(a.target=a.target.parentNode),a.metaKey===b&&(a.metaKey=a.ctrlKey);return h.filter?h.filter(a,g):a},special:{ready:{setup:f.bindReady},load:{noBubble:!0},focus:{delegateType:"focusin"},blur:{delegateType:"focusout"},beforeunload:{setup:function(a,b,c){f.isWindow(this)&&(this.onbeforeunload=c)},teardown:function(a,b){this.onbeforeunload===b&&(this.onbeforeunload=null)}}},simulate:function(a,b,c,d){var e=f.extend(new f.Event,c,{type:a,isSimulated:!0,originalEvent:{}});d?f.event.trigger(e,null,b):f.event.dispatch.call(b,e),e.isDefaultPrevented()&&c.preventDefault()}},f.event.handle=f.event.dispatch,f.removeEvent=c.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){a.detachEvent&&a.detachEvent("on"+b,c)},f.Event=function(a,b){if(!(this instanceof f.Event))return new f.Event(a,b);a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||a.returnValue===!1||a.getPreventDefault&&a.getPreventDefault()?K:J):this.type=a,b&&f.extend(this,b),this.timeStamp=a&&a.timeStamp||f.now(),this[f.expando]=!0},f.Event.prototype={preventDefault:function(){this.isDefaultPrevented=K;var a=this.originalEvent;!a||(a.preventDefault?a.preventDefault():a.returnValue=!1)},stopPropagation:function(){this.isPropagationStopped=K;var a=this.originalEvent;!a||(a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=K,this.stopPropagation()},isDefaultPrevented:J,isPropagationStopped:J,isImmediatePropagationStopped:J},f.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(a,b){f.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c=this,d=a.relatedTarget,e=a.handleObj,g=e.selector,h;if(!d||d!==c&&!f.contains(c,d))a.type=e.origType,h=e.handler.apply(this,arguments),a.type=b;return h}}}),f.support.submitBubbles||(f.event.special.submit={setup:function(){if(f.nodeName(this,"form"))return!1;f.event.add(this,"click._submit keypress._submit",function(a){var c=a.target,d=f.nodeName(c,"input")||f.nodeName(c,"button")?c.form:b;d&&!d._submit_attached&&(f.event.add(d,"submit._submit",function(a){this.parentNode&&!a.isTrigger&&f.event.simulate("submit",this.parentNode,a,!0)}),d._submit_attached=!0)})},teardown:function(){if(f.nodeName(this,"form"))return!1;f.event.remove(this,"._submit")}}),f.support.changeBubbles||(f.event.special.change={setup:function(){if(z.test(this.nodeName)){if(this.type==="checkbox"||this.type==="radio")f.event.add(this,"propertychange._change",function(a){a.originalEvent.propertyName==="checked"&&(this._just_changed=!0)}),f.event.add(this,"click._change",function(a){this._just_changed&&!a.isTrigger&&(this._just_changed=!1,f.event.simulate("change",this,a,!0))});return!1}f.event.add(this,"beforeactivate._change",function(a){var b=a.target;z.test(b.nodeName)&&!b._change_attached&&(f.event.add(b,"change._change",function(a){this.parentNode&&!a.isSimulated&&!a.isTrigger&&f.event.simulate("change",this.parentNode,a,!0)}),b._change_attached=!0)})},handle:function(a){var b=a.target;if(this!==b||a.isSimulated||a.isTrigger||b.type!=="radio"&&b.type!=="checkbox")return a.handleObj.handler.apply(this,arguments)},teardown:function(){f.event.remove(this,"._change");return z.test(this.nodeName)}}),f.support.focusinBubbles||f.each({focus:"focusin",blur:"focusout"},function(a,b){var d=0,e=function(a){f.event.simulate(b,a.target,f.event.fix(a),!0)};f.event.special[b]={setup:function(){d++===0&&c.addEventListener(a,e,!0)},teardown:function(){--d===0&&c.removeEventListener(a,e,!0)}}}),f.fn.extend({on:function(a,c,d,e,g){var h,i;if(typeof a=="object"){typeof c!="string"&&(d=c,c=b);for(i in a)this.on(i,c,d,a[i],g);return this}d==null&&e==null?(e=c,d=c=b):e==null&&(typeof c=="string"?(e=d,d=b):(e=d,d=c,c=b));if(e===!1)e=J;else if(!e)return this;g===1&&(h=e,e=function(a){f().off(a);return h.apply(this,arguments)},e.guid=h.guid||(h.guid=f.guid++));return this.each(function(){f.event.add(this,a,e,d,c)})},one:function(a,b,c,d){return this.on.call(this,a,b,c,d,1)},off:function(a,c,d){if(a&&a.preventDefault&&a.handleObj){var e=a.handleObj;f(a.delegateTarget).off(e.namespace?e.type+"."+e.namespace:e.type,e.selector,e.handler);return this}if(typeof a=="object"){for(var g in a)this.off(g,c,a[g]);return this}if(c===!1||typeof c=="function")d=c,c=b;d===!1&&(d=J);return this.each(function(){f.event.remove(this,a,d,c)})},bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},live:function(a,b,c){f(this.context).on(a,this.selector,b,c);return this},die:function(a,b){f(this.context).off(a,this.selector||"**",b);return this},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return arguments.length==1?this.off(a,"**"):this.off(b,a,c)},trigger:function(a,b){return this.each(function(){f.event.trigger(a,b,this)})},triggerHandler:function(a,b){if(this[0])return f.event.trigger(a,b,this[0],!0)},toggle:function(a){var b=arguments,c=a.guid||f.guid++,d=0,e=function(c){var e=(f._data(this,"lastToggle"+a.guid)||0)%d;f._data(this,"lastToggle"+a.guid,e+1),c.preventDefault();return b[e].apply(this,arguments)||!1};e.guid=c;while(d<b.length)b[d++].guid=c;return this.click(e)},hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}}),f.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(a,b){f.fn[b]=function(a,c){c==null&&(c=a,a=null);return arguments.length>0?this.on(b,null,a,c):this.trigger(b)},f.attrFn&&(f.attrFn[b]=!0),C.test(b)&&(f.event.fixHooks[b]=f.event.keyHooks),D.test(b)&&(f.event.fixHooks[b]=f.event.mouseHooks)}),function(){function x(a,b,c,e,f,g){for(var h=0,i=e.length;h<i;h++){var j=e[h];if(j){var k=!1;j=j[a];while(j){if(j[d]===c){k=e[j.sizset];break}if(j.nodeType===1){g||(j[d]=c,j.sizset=h);if(typeof b!="string"){if(j===b){k=!0;break}}else if(m.filter(b,[j]).length>0){k=j;break}}j=j[a]}e[h]=k}}}function w(a,b,c,e,f,g){for(var h=0,i=e.length;h<i;h++){var j=e[h];if(j){var k=!1;j=j[a];while(j){if(j[d]===c){k=e[j.sizset];break}j.nodeType===1&&!g&&(j[d]=c,j.sizset=h);if(j.nodeName.toLowerCase()===b){k=j;break}j=j[a]}e[h]=k}}}var a=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,d="sizcache"+(Math.random()+"").replace(".",""),e=0,g=Object.prototype.toString,h=!1,i=!0,j=/\\/g,k=/\r\n/g,l=/\W/;[0,0].sort(function(){i=!1;return 0});var m=function(b,d,e,f){e=e||[],d=d||c;var h=d;if(d.nodeType!==1&&d.nodeType!==9)return[];if(!b||typeof b!="string")return e;var i,j,k,l,n,q,r,t,u=!0,v=m.isXML(d),w=[],x=b;do{a.exec(""),i=a.exec(x);if(i){x=i[3],w.push(i[1]);if(i[2]){l=i[3];break}}}while(i);if(w.length>1&&p.exec(b))if(w.length===2&&o.relative[w[0]])j=y(w[0]+w[1],d,f);else{j=o.relative[w[0]]?[d]:m(w.shift(),d);while(w.length)b=w.shift(),o.relative[b]&&(b+=w.shift()),j=y(b,j,f)}else{!f&&w.length>1&&d.nodeType===9&&!v&&o.match.ID.test(w[0])&&!o.match.ID.test(w[w.length-1])&&(n=m.find(w.shift(),d,v),d=n.expr?m.filter(n.expr,n.set)[0]:n.set[0]);if(d){n=f?{expr:w.pop(),set:s(f)}:m.find(w.pop(),w.length===1&&(w[0]==="~"||w[0]==="+")&&d.parentNode?d.parentNode:d,v),j=n.expr?m.filter(n.expr,n.set):n.set,w.length>0?k=s(j):u=!1;while(w.length)q=w.pop(),r=q,o.relative[q]?r=w.pop():q="",r==null&&(r=d),o.relative[q](k,r,v)}else k=w=[]}k||(k=j),k||m.error(q||b);if(g.call(k)==="[object Array]")if(!u)e.push.apply(e,k);else if(d&&d.nodeType===1)for(t=0;k[t]!=null;t++)k[t]&&(k[t]===!0||k[t].nodeType===1&&m.contains(d,k[t]))&&e.push(j[t]);else for(t=0;k[t]!=null;t++)k[t]&&k[t].nodeType===1&&e.push(j[t]);else s(k,e);l&&(m(l,h,e,f),m.uniqueSort(e));return e};m.uniqueSort=function(a){if(u){h=i,a.sort(u);if(h)for(var b=1;b<a.length;b++)a[b]===a[b-1]&&a.splice(b--,1)}return a},m.matches=function(a,b){return m(a,null,null,b)},m.matchesSelector=function(a,b){return m(b,null,null,[a]).length>0},m.find=function(a,b,c){var d,e,f,g,h,i;if(!a)return[];for(e=0,f=o.order.length;e<f;e++){h=o.order[e];if(g=o.leftMatch[h].exec(a)){i=g[1],g.splice(1,1);if(i.substr(i.length-1)!=="\\"){g[1]=(g[1]||"").replace(j,""),d=o.find[h](g,b,c);if(d!=null){a=a.replace(o.match[h],"");break}}}}d||(d=typeof b.getElementsByTagName!="undefined"?b.getElementsByTagName("*"):[]);return{set:d,expr:a}},m.filter=function(a,c,d,e){var f,g,h,i,j,k,l,n,p,q=a,r=[],s=c,t=c&&c[0]&&m.isXML(c[0]);while(a&&c.length){for(h in o.filter)if((f=o.leftMatch[h].exec(a))!=null&&f[2]){k=o.filter[h],l=f[1],g=!1,f.splice(1,1);if(l.substr(l.length-1)==="\\")continue;s===r&&(r=[]);if(o.preFilter[h]){f=o.preFilter[h](f,s,d,r,e,t);if(!f)g=i=!0;else if(f===!0)continue}if(f)for(n=0;(j=s[n])!=null;n++)j&&(i=k(j,f,n,s),p=e^i,d&&i!=null?p?g=!0:s[n]=!1:p&&(r.push(j),g=!0));if(i!==b){d||(s=r),a=a.replace(o.match[h],"");if(!g)return[];break}}if(a===q)if(g==null)m.error(a);else break;q=a}return s},m.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)};var n=m.getText=function(a){var b,c,d=a.nodeType,e="";if(d){if(d===1||d===9){if(typeof a.textContent=="string")return a.textContent;if(typeof a.innerText=="string")return a.innerText.replace(k,"");for(a=a.firstChild;a;a=a.nextSibling)e+=n(a)}else if(d===3||d===4)return a.nodeValue}else for(b=0;c=a[b];b++)c.nodeType!==8&&(e+=n(c));return e},o=m.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/},leftMatch:{},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(a){return a.getAttribute("href")},type:function(a){return a.getAttribute("type")}},relative:{"+":function(a,b){var c=typeof b=="string",d=c&&!l.test(b),e=c&&!d;d&&(b=b.toLowerCase());for(var f=0,g=a.length,h;f<g;f++)if(h=a[f]){while((h=h.previousSibling)&&h.nodeType!==1);a[f]=e||h&&h.nodeName.toLowerCase()===b?h||!1:h===b}e&&m.filter(b,a,!0)},">":function(a,b){var c,d=typeof b=="string",e=0,f=a.length;if(d&&!l.test(b)){b=b.toLowerCase();for(;e<f;e++){c=a[e];if(c){var g=c.parentNode;a[e]=g.nodeName.toLowerCase()===b?g:!1}}}else{for(;e<f;e++)c=a[e],c&&(a[e]=d?c.parentNode:c.parentNode===b);d&&m.filter(b,a,!0)}},"":function(a,b,c){var d,f=e++,g=x;typeof b=="string"&&!l.test(b)&&(b=b.toLowerCase(),d=b,g=w),g("parentNode",b,f,a,d,c)},"~":function(a,b,c){var d,f=e++,g=x;typeof b=="string"&&!l.test(b)&&(b=b.toLowerCase(),d=b,g=w),g("previousSibling",b,f,a,d,c)}},find:{ID:function(a,b,c){if(typeof b.getElementById!="undefined"&&!c){var d=b.getElementById(a[1]);return d&&d.parentNode?[d]:[]}},NAME:function(a,b){if(typeof b.getElementsByName!="undefined"){var c=[],d=b.getElementsByName(a[1]);for(var e=0,f=d.length;e<f;e++)d[e].getAttribute("name")===a[1]&&c.push(d[e]);return c.length===0?null:c}},TAG:function(a,b){if(typeof b.getElementsByTagName!="undefined")return b.getElementsByTagName(a[1])}},preFilter:{CLASS:function(a,b,c,d,e,f){a=" "+a[1].replace(j,"")+" ";if(f)return a;for(var g=0,h;(h=b[g])!=null;g++)h&&(e^(h.className&&(" "+h.className+" ").replace(/[\t\n\r]/g," ").indexOf(a)>=0)?c||d.push(h):c&&(b[g]=!1));return!1},ID:function(a){return a[1].replace(j,"")},TAG:function(a,b){return a[1].replace(j,"").toLowerCase()},CHILD:function(a){if(a[1]==="nth"){a[2]||m.error(a[0]),a[2]=a[2].replace(/^\+|\s*/g,"");var b=/(-?)(\d*)(?:n([+\-]?\d*))?/.exec(a[2]==="even"&&"2n"||a[2]==="odd"&&"2n+1"||!/\D/.test(a[2])&&"0n+"+a[2]||a[2]);a[2]=b[1]+(b[2]||1)-0,a[3]=b[3]-0}else a[2]&&m.error(a[0]);a[0]=e++;return a},ATTR:function(a,b,c,d,e,f){var g=a[1]=a[1].replace(j,"");!f&&o.attrMap[g]&&(a[1]=o.attrMap[g]),a[4]=(a[4]||a[5]||"").replace(j,""),a[2]==="~="&&(a[4]=" "+a[4]+" ");return a},PSEUDO:function(b,c,d,e,f){if(b[1]==="not")if((a.exec(b[3])||"").length>1||/^\w/.test(b[3]))b[3]=m(b[3],null,null,c);else{var g=m.filter(b[3],c,d,!0^f);d||e.push.apply(e,g);return!1}else if(o.match.POS.test(b[0])||o.match.CHILD.test(b[0]))return!0;return b},POS:function(a){a.unshift(!0);return a}},filters:{enabled:function(a){return a.disabled===!1&&a.type!=="hidden"},disabled:function(a){return a.disabled===!0},checked:function(a){return a.checked===!0},selected:function(a){a.parentNode&&a.parentNode.selectedIndex;return a.selected===!0},parent:function(a){return!!a.firstChild},empty:function(a){return!a.firstChild},has:function(a,b,c){return!!m(c[3],a).length},header:function(a){return/h\d/i.test(a.nodeName)},text:function(a){var b=a.getAttribute("type"),c=a.type;return a.nodeName.toLowerCase()==="input"&&"text"===c&&(b===c||b===null)},radio:function(a){return a.nodeName.toLowerCase()==="input"&&"radio"===a.type},checkbox:function(a){return a.nodeName.toLowerCase()==="input"&&"checkbox"===a.type},file:function(a){return a.nodeName.toLowerCase()==="input"&&"file"===a.type},password:function(a){return a.nodeName.toLowerCase()==="input"&&"password"===a.type},submit:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"submit"===a.type},image:function(a){return a.nodeName.toLowerCase()==="input"&&"image"===a.type},reset:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"reset"===a.type},button:function(a){var b=a.nodeName.toLowerCase();return b==="input"&&"button"===a.type||b==="button"},input:function(a){return/input|select|textarea|button/i.test(a.nodeName)},focus:function(a){return a===a.ownerDocument.activeElement}},setFilters:{first:function(a,b){return b===0},last:function(a,b,c,d){return b===d.length-1},even:function(a,b){return b%2===0},odd:function(a,b){return b%2===1},lt:function(a,b,c){return b<c[3]-0},gt:function(a,b,c){return b>c[3]-0},nth:function(a,b,c){return c[3]-0===b},eq:function(a,b,c){return c[3]-0===b}},filter:{PSEUDO:function(a,b,c,d){var e=b[1],f=o.filters[e];if(f)return f(a,c,b,d);if(e==="contains")return(a.textContent||a.innerText||n([a])||"").indexOf(b[3])>=0;if(e==="not"){var g=b[3];for(var h=0,i=g.length;h<i;h++)if(g[h]===a)return!1;return!0}m.error(e)},CHILD:function(a,b){var c,e,f,g,h,i,j,k=b[1],l=a;switch(k){case"only":case"first":while(l=l.previousSibling)if(l.nodeType===1)return!1;if(k==="first")return!0;l=a;case"last":while(l=l.nextSibling)if(l.nodeType===1)return!1;return!0;case"nth":c=b[2],e=b[3];if(c===1&&e===0)return!0;f=b[0],g=a.parentNode;if(g&&(g[d]!==f||!a.nodeIndex)){i=0;for(l=g.firstChild;l;l=l.nextSibling)l.nodeType===1&&(l.nodeIndex=++i);g[d]=f}j=a.nodeIndex-e;return c===0?j===0:j%c===0&&j/c>=0}},ID:function(a,b){return a.nodeType===1&&a.getAttribute("id")===b},TAG:function(a,b){return b==="*"&&a.nodeType===1||!!a.nodeName&&a.nodeName.toLowerCase()===b},CLASS:function(a,b){return(" "+(a.className||a.getAttribute("class"))+" ").indexOf(b)>-1},ATTR:function(a,b){var c=b[1],d=m.attr?m.attr(a,c):o.attrHandle[c]?o.attrHandle[c](a):a[c]!=null?a[c]:a.getAttribute(c),e=d+"",f=b[2],g=b[4];return d==null?f==="!=":!f&&m.attr?d!=null:f==="="?e===g:f==="*="?e.indexOf(g)>=0:f==="~="?(" "+e+" ").indexOf(g)>=0:g?f==="!="?e!==g:f==="^="?e.indexOf(g)===0:f==="$="?e.substr(e.length-g.length)===g:f==="|="?e===g||e.substr(0,g.length+1)===g+"-":!1:e&&d!==!1},POS:function(a,b,c,d){var e=b[2],f=o.setFilters[e];if(f)return f(a,c,b,d)}}},p=o.match.POS,q=function(a,b){return"\\"+(b-0+1)};for(var r in o.match)o.match[r]=new RegExp(o.match[r].source+/(?![^\[]*\])(?![^\(]*\))/.source),o.leftMatch[r]=new RegExp(/(^(?:.|\r|\n)*?)/.source+o.match[r].source.replace(/\\(\d+)/g,q));var s=function(a,b){a=Array.prototype.slice.call(a,0);if(b){b.push.apply(b,a);return b}return a};try{Array.prototype.slice.call(c.documentElement.childNodes,0)[0].nodeType}catch(t){s=function(a,b){var c=0,d=b||[];if(g.call(a)==="[object Array]")Array.prototype.push.apply(d,a);else if(typeof a.length=="number")for(var e=a.length;c<e;c++)d.push(a[c]);else for(;a[c];c++)d.push(a[c]);return d}}var u,v;c.documentElement.compareDocumentPosition?u=function(a,b){if(a===b){h=!0;return 0}if(!a.compareDocumentPosition||!b.compareDocumentPosition)return a.compareDocumentPosition?-1:1;return a.compareDocumentPosition(b)&4?-1:1}:(u=function(a,b){if(a===b){h=!0;return 0}if(a.sourceIndex&&b.sourceIndex)return a.sourceIndex-b.sourceIndex;var c,d,e=[],f=[],g=a.parentNode,i=b.parentNode,j=g;if(g===i)return v(a,b);if(!g)return-1;if(!i)return 1;while(j)e.unshift(j),j=j.parentNode;j=i;while(j)f.unshift(j),j=j.parentNode;c=e.length,d=f.length;for(var k=0;k<c&&k<d;k++)if(e[k]!==f[k])return v(e[k],f[k]);return k===c?v(a,f[k],-1):v(e[k],b,1)},v=function(a,b,c){if(a===b)return c;var d=a.nextSibling;while(d){if(d===b)return-1;d=d.nextSibling}return 1}),function(){var a=c.createElement("div"),d="script"+(new Date).getTime(),e=c.documentElement;a.innerHTML="<a name='"+d+"'/>",e.insertBefore(a,e.firstChild),c.getElementById(d)&&(o.find.ID=function(a,c,d){if(typeof c.getElementById!="undefined"&&!d){var e=c.getElementById(a[1]);return e?e.id===a[1]||typeof e.getAttributeNode!="undefined"&&e.getAttributeNode("id").nodeValue===a[1]?[e]:b:[]}},o.filter.ID=function(a,b){var c=typeof a.getAttributeNode!="undefined"&&a.getAttributeNode("id");return a.nodeType===1&&c&&c.nodeValue===b}),e.removeChild(a),e=a=null}(),function(){var a=c.createElement("div");a.appendChild(c.createComment("")),a.getElementsByTagName("*").length>0&&(o.find.TAG=function(a,b){var c=b.getElementsByTagName(a[1]);if(a[1]==="*"){var d=[];for(var e=0;c[e];e++)c[e].nodeType===1&&d.push(c[e]);c=d}return c}),a.innerHTML="<a href='#'></a>",a.firstChild&&typeof a.firstChild.getAttribute!="undefined"&&a.firstChild.getAttribute("href")!=="#"&&(o.attrHandle.href=function(a){return a.getAttribute("href",2)}),a=null}(),c.querySelectorAll&&function(){var a=m,b=c.createElement("div"),d="__sizzle__";b.innerHTML="<p class='TEST'></p>";if(!b.querySelectorAll||b.querySelectorAll(".TEST").length!==0){m=function(b,e,f,g){e=e||c;if(!g&&!m.isXML(e)){var h=/^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(b);if(h&&(e.nodeType===1||e.nodeType===9)){if(h[1])return s(e.getElementsByTagName(b),f);if(h[2]&&o.find.CLASS&&e.getElementsByClassName)return s(e.getElementsByClassName(h[2]),f)}if(e.nodeType===9){if(b==="body"&&e.body)return s([e.body],f);if(h&&h[3]){var i=e.getElementById(h[3]);if(!i||!i.parentNode)return s([],f);if(i.id===h[3])return s([i],f)}try{return s(e.querySelectorAll(b),f)}catch(j){}}else if(e.nodeType===1&&e.nodeName.toLowerCase()!=="object"){var k=e,l=e.getAttribute("id"),n=l||d,p=e.parentNode,q=/^\s*[+~]/.test(b);l?n=n.replace(/'/g,"\\$&"):e.setAttribute("id",n),q&&p&&(e=e.parentNode);try{if(!q||p)return s(e.querySelectorAll("[id='"+n+"'] "+b),f)}catch(r){}finally{l||k.removeAttribute("id")}}}return a(b,e,f,g)};for(var e in a)m[e]=a[e];b=null}}(),function(){var a=c.documentElement,b=a.matchesSelector||a.mozMatchesSelector||a.webkitMatchesSelector||a.msMatchesSelector;if(b){var d=!b.call(c.createElement("div"),"div"),e=!1;try{b.call(c.documentElement,"[test!='']:sizzle")}catch(f){e=!0}m.matchesSelector=function(a,c){c=c.replace(/\=\s*([^'"\]]*)\s*\]/g,"='$1']");if(!m.isXML(a))try{if(e||!o.match.PSEUDO.test(c)&&!/!=/.test(c)){var f=b.call(a,c);if(f||!d||a.document&&a.document.nodeType!==11)return f}}catch(g){}return m(c,null,null,[a]).length>0}}}(),function(){var a=c.createElement("div");a.innerHTML="<div class='test e'></div><div class='test'></div>";if(!!a.getElementsByClassName&&a.getElementsByClassName("e").length!==0){a.lastChild.className="e";if(a.getElementsByClassName("e").length===1)return;o.order.splice(1,0,"CLASS"),o.find.CLASS=function(a,b,c){if(typeof b.getElementsByClassName!="undefined"&&!c)return b.getElementsByClassName(a[1])},a=null}}(),c.documentElement.contains?m.contains=function(a,b){return a!==b&&(a.contains?a.contains(b):!0)}:c.documentElement.compareDocumentPosition?m.contains=function(a,b){return!!(a.compareDocumentPosition(b)&16)}:m.contains=function(){return!1},m.isXML=function(a){var b=(a?a.ownerDocument||a:0).documentElement;return b?b.nodeName!=="HTML":!1};var y=function(a,b,c){var d,e=[],f="",g=b.nodeType?[b]:b;while(d=o.match.PSEUDO.exec(a))f+=d[0],a=a.replace(o.match.PSEUDO,"");a=o.relative[a]?a+"*":a;for(var h=0,i=g.length;h<i;h++)m(a,g[h],e,c);return m.filter(f,e)};m.attr=f.attr,m.selectors.attrMap={},f.find=m,f.expr=m.selectors,f.expr[":"]=f.expr.filters,f.unique=m.uniqueSort,f.text=m.getText,f.isXMLDoc=m.isXML,f.contains=m.contains}();var L=/Until$/,M=/^(?:parents|prevUntil|prevAll)/,N=/,/,O=/^.[^:#\[\.,]*$/,P=Array.prototype.slice,Q=f.expr.match.POS,R={children:!0,contents:!0,next:!0,prev:!0};f.fn.extend({find:function(a){var b=this,c,d;if(typeof a!="string")return f(a).filter(function(){for(c=0,d=b.length;c<d;c++)if(f.contains(b[c],this))return!0});var e=this.pushStack("","find",a),g,h,i;for(c=0,d=this.length;c<d;c++){g=e.length,f.find(a,this[c],e);if(c>0)for(h=g;h<e.length;h++)for(i=0;i<g;i++)if(e[i]===e[h]){e.splice(h--,1);break}}return e},has:function(a){var b=f(a);return this.filter(function(){for(var a=0,c=b.length;a<c;a++)if(f.contains(this,b[a]))return!0})},not:function(a){return this.pushStack(T(this,a,!1),"not",a)},filter:function(a){return this.pushStack(T(this,a,!0),"filter",a)},is:function(a){return!!a&&(typeof a=="string"?Q.test(a)?f(a,this.context).index(this[0])>=0:f.filter(a,this).length>0:this.filter(a).length>0)},closest:function(a,b){var c=[],d,e,g=this[0];if(f.isArray(a)){var h=1;while(g&&g.ownerDocument&&g!==b){for(d=0;d<a.length;d++)f(g).is(a[d])&&c.push({selector:a[d],elem:g,level:h});g=g.parentNode,h++}return c}var i=Q.test(a)||typeof a!="string"?f(a,b||this.context):0;for(d=0,e=this.length;d<e;d++){g=this[d];while(g){if(i?i.index(g)>-1:f.find.matchesSelector(g,a)){c.push(g);break}g=g.parentNode;if(!g||!g.ownerDocument||g===b||g.nodeType===11)break}}c=c.length>1?f.unique(c):c;return this.pushStack(c,"closest",a)},index:function(a){if(!a)return this[0]&&this[0].parentNode?this.prevAll().length:-1;if(typeof a=="string")return f.inArray(this[0],f(a));return f.inArray(a.jquery?a[0]:a,this)},add:function(a,b){var c=typeof a=="string"?f(a,b):f.makeArray(a&&a.nodeType?[a]:a),d=f.merge(this.get(),c);return this.pushStack(S(c[0])||S(d[0])?d:f.unique(d))},andSelf:function(){return this.add(this.prevObject)}}),f.each({parent:function(a){var b=a.parentNode;return b&&b.nodeType!==11?b:null},parents:function(a){return f.dir(a,"parentNode")},parentsUntil:function(a,b,c){return f.dir(a,"parentNode",c)},next:function(a){return f.nth(a,2,"nextSibling")},prev:function(a){return f.nth(a,2,"previousSibling")},nextAll:function(a){return f.dir(a,"nextSibling")},prevAll:function(a){return f.dir(a,"previousSibling")},nextUntil:function(a,b,c){return f.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return f.dir(a,"previousSibling",c)},siblings:function(a){return f.sibling(a.parentNode.firstChild,a)},children:function(a){return f.sibling(a.firstChild)},contents:function(a){return f.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:f.makeArray(a.childNodes)}},function(a,b){f.fn[a]=function(c,d){var e=f.map(this,b,c);L.test(a)||(d=c),d&&typeof d=="string"&&(e=f.filter(d,e)),e=this.length>1&&!R[a]?f.unique(e):e,(this.length>1||N.test(d))&&M.test(a)&&(e=e.reverse());return this.pushStack(e,a,P.call(arguments).join(","))}}),f.extend({filter:function(a,b,c){c&&(a=":not("+a+")");return b.length===1?f.find.matchesSelector(b[0],a)?[b[0]]:[]:f.find.matches(a,b)},dir:function(a,c,d){var e=[],g=a[c];while(g&&g.nodeType!==9&&(d===b||g.nodeType!==1||!f(g).is(d)))g.nodeType===1&&e.push(g),g=g[c];return e},nth:function(a,b,c,d){b=b||1;var e=0;for(;a;a=a[c])if(a.nodeType===1&&++e===b)break;return a},sibling:function(a,b){var c=[];for(;a;a=a.nextSibling)a.nodeType===1&&a!==b&&c.push(a);return c}});var V="abbr|article|aside|audio|canvas|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",W=/ jQuery\d+="(?:\d+|null)"/g,X=/^\s+/,Y=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,Z=/<([\w:]+)/,$=/<tbody/i,_=/<|&#?\w+;/,ba=/<(?:script|style)/i,bb=/<(?:script|object|embed|option|style)/i,bc=new RegExp("<(?:"+V+")","i"),bd=/checked\s*(?:[^=]|=\s*.checked.)/i,be=/\/(java|ecma)script/i,bf=/^\s*<!(?:\[CDATA\[|\-\-)/,bg={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],area:[1,"<map>","</map>"],_default:[0,"",""]},bh=U(c);bg.optgroup=bg.option,bg.tbody=bg.tfoot=bg.colgroup=bg.caption=bg.thead,bg.th=bg.td,f.support.htmlSerialize||(bg._default=[1,"div<div>","</div>"]),f.fn.extend({text:function(a){if(f.isFunction(a))return this.each(function(b){var c=f(this);c.text(a.call(this,b,c.text()))});if(typeof a!="object"&&a!==b)return this.empty().append((this[0]&&this[0].ownerDocument||c).createTextNode(a));return f.text(this)},wrapAll:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapAll(a.call(this,b))});if(this[0]){var b=f(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstChild&&a.firstChild.nodeType===1)a=a.firstChild;return a}).append(this)}return this},wrapInner:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapInner(a.call(this,b))});return this.each(function(){var b=f(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=f.isFunction(a);return this.each(function(c){f(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(){return this.parent().each(function(){f.nodeName(this,"body")||f(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.appendChild(a)})},prepend:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.insertBefore(a,this.firstChild)})},before:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this)});if(arguments.length){var a=f.clean(arguments);a.push.apply(a,this.toArray());return this.pushStack(a,"before",arguments)}},after:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this.nextSibling)});if(arguments.length){var a=this.pushStack(this,"after",arguments);a.push.apply(a,f.clean(arguments));return a}},remove:function(a,b){for(var c=0,d;(d=this[c])!=null;c++)if(!a||f.filter(a,[d]).length)!b&&d.nodeType===1&&(f.cleanData(d.getElementsByTagName("*")),f.cleanData([d])),d.parentNode&&d.parentNode.removeChild(d);return this},empty:function()
/* 4 */ {for(var a=0,b;(b=this[a])!=null;a++){b.nodeType===1&&f.cleanData(b.getElementsByTagName("*"));while(b.firstChild)b.removeChild(b.firstChild)}return this},clone:function(a,b){a=a==null?!1:a,b=b==null?a:b;return this.map(function(){return f.clone(this,a,b)})},html:function(a){if(a===b)return this[0]&&this[0].nodeType===1?this[0].innerHTML.replace(W,""):null;if(typeof a=="string"&&!ba.test(a)&&(f.support.leadingWhitespace||!X.test(a))&&!bg[(Z.exec(a)||["",""])[1].toLowerCase()]){a=a.replace(Y,"<$1></$2>");try{for(var c=0,d=this.length;c<d;c++)this[c].nodeType===1&&(f.cleanData(this[c].getElementsByTagName("*")),this[c].innerHTML=a)}catch(e){this.empty().append(a)}}else f.isFunction(a)?this.each(function(b){var c=f(this);c.html(a.call(this,b,c.html()))}):this.empty().append(a);return this},replaceWith:function(a){if(this[0]&&this[0].parentNode){if(f.isFunction(a))return this.each(function(b){var c=f(this),d=c.html();c.replaceWith(a.call(this,b,d))});typeof a!="string"&&(a=f(a).detach());return this.each(function(){var b=this.nextSibling,c=this.parentNode;f(this).remove(),b?f(b).before(a):f(c).append(a)})}return this.length?this.pushStack(f(f.isFunction(a)?a():a),"replaceWith",a):this},detach:function(a){return this.remove(a,!0)},domManip:function(a,c,d){var e,g,h,i,j=a[0],k=[];if(!f.support.checkClone&&arguments.length===3&&typeof j=="string"&&bd.test(j))return this.each(function(){f(this).domManip(a,c,d,!0)});if(f.isFunction(j))return this.each(function(e){var g=f(this);a[0]=j.call(this,e,c?g.html():b),g.domManip(a,c,d)});if(this[0]){i=j&&j.parentNode,f.support.parentNode&&i&&i.nodeType===11&&i.childNodes.length===this.length?e={fragment:i}:e=f.buildFragment(a,this,k),h=e.fragment,h.childNodes.length===1?g=h=h.firstChild:g=h.firstChild;if(g){c=c&&f.nodeName(g,"tr");for(var l=0,m=this.length,n=m-1;l<m;l++)d.call(c?bi(this[l],g):this[l],e.cacheable||m>1&&l<n?f.clone(h,!0,!0):h)}k.length&&f.each(k,bp)}return this}}),f.buildFragment=function(a,b,d){var e,g,h,i,j=a[0];b&&b[0]&&(i=b[0].ownerDocument||b[0]),i.createDocumentFragment||(i=c),a.length===1&&typeof j=="string"&&j.length<512&&i===c&&j.charAt(0)==="<"&&!bb.test(j)&&(f.support.checkClone||!bd.test(j))&&(f.support.html5Clone||!bc.test(j))&&(g=!0,h=f.fragments[j],h&&h!==1&&(e=h)),e||(e=i.createDocumentFragment(),f.clean(a,i,e,d)),g&&(f.fragments[j]=h?e:1);return{fragment:e,cacheable:g}},f.fragments={},f.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){f.fn[a]=function(c){var d=[],e=f(c),g=this.length===1&&this[0].parentNode;if(g&&g.nodeType===11&&g.childNodes.length===1&&e.length===1){e[b](this[0]);return this}for(var h=0,i=e.length;h<i;h++){var j=(h>0?this.clone(!0):this).get();f(e[h])[b](j),d=d.concat(j)}return this.pushStack(d,a,e.selector)}}),f.extend({clone:function(a,b,c){var d,e,g,h=f.support.html5Clone||!bc.test("<"+a.nodeName)?a.cloneNode(!0):bo(a);if((!f.support.noCloneEvent||!f.support.noCloneChecked)&&(a.nodeType===1||a.nodeType===11)&&!f.isXMLDoc(a)){bk(a,h),d=bl(a),e=bl(h);for(g=0;d[g];++g)e[g]&&bk(d[g],e[g])}if(b){bj(a,h);if(c){d=bl(a),e=bl(h);for(g=0;d[g];++g)bj(d[g],e[g])}}d=e=null;return h},clean:function(a,b,d,e){var g;b=b||c,typeof b.createElement=="undefined"&&(b=b.ownerDocument||b[0]&&b[0].ownerDocument||c);var h=[],i;for(var j=0,k;(k=a[j])!=null;j++){typeof k=="number"&&(k+="");if(!k)continue;if(typeof k=="string")if(!_.test(k))k=b.createTextNode(k);else{k=k.replace(Y,"<$1></$2>");var l=(Z.exec(k)||["",""])[1].toLowerCase(),m=bg[l]||bg._default,n=m[0],o=b.createElement("div");b===c?bh.appendChild(o):U(b).appendChild(o),o.innerHTML=m[1]+k+m[2];while(n--)o=o.lastChild;if(!f.support.tbody){var p=$.test(k),q=l==="table"&&!p?o.firstChild&&o.firstChild.childNodes:m[1]==="<table>"&&!p?o.childNodes:[];for(i=q.length-1;i>=0;--i)f.nodeName(q[i],"tbody")&&!q[i].childNodes.length&&q[i].parentNode.removeChild(q[i])}!f.support.leadingWhitespace&&X.test(k)&&o.insertBefore(b.createTextNode(X.exec(k)[0]),o.firstChild),k=o.childNodes}var r;if(!f.support.appendChecked)if(k[0]&&typeof (r=k.length)=="number")for(i=0;i<r;i++)bn(k[i]);else bn(k);k.nodeType?h.push(k):h=f.merge(h,k)}if(d){g=function(a){return!a.type||be.test(a.type)};for(j=0;h[j];j++)if(e&&f.nodeName(h[j],"script")&&(!h[j].type||h[j].type.toLowerCase()==="text/javascript"))e.push(h[j].parentNode?h[j].parentNode.removeChild(h[j]):h[j]);else{if(h[j].nodeType===1){var s=f.grep(h[j].getElementsByTagName("script"),g);h.splice.apply(h,[j+1,0].concat(s))}d.appendChild(h[j])}}return h},cleanData:function(a){var b,c,d=f.cache,e=f.event.special,g=f.support.deleteExpando;for(var h=0,i;(i=a[h])!=null;h++){if(i.nodeName&&f.noData[i.nodeName.toLowerCase()])continue;c=i[f.expando];if(c){b=d[c];if(b&&b.events){for(var j in b.events)e[j]?f.event.remove(i,j):f.removeEvent(i,j,b.handle);b.handle&&(b.handle.elem=null)}g?delete i[f.expando]:i.removeAttribute&&i.removeAttribute(f.expando),delete d[c]}}}});var bq=/alpha\([^)]*\)/i,br=/opacity=([^)]*)/,bs=/([A-Z]|^ms)/g,bt=/^-?\d+(?:px)?$/i,bu=/^-?\d/,bv=/^([\-+])=([\-+.\de]+)/,bw={position:"absolute",visibility:"hidden",display:"block"},bx=["Left","Right"],by=["Top","Bottom"],bz,bA,bB;f.fn.css=function(a,c){if(arguments.length===2&&c===b)return this;return f.access(this,a,c,!0,function(a,c,d){return d!==b?f.style(a,c,d):f.css(a,c)})},f.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=bz(a,"opacity","opacity");return c===""?"1":c}return a.style.opacity}}},cssNumber:{fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":f.support.cssFloat?"cssFloat":"styleFloat"},style:function(a,c,d,e){if(!!a&&a.nodeType!==3&&a.nodeType!==8&&!!a.style){var g,h,i=f.camelCase(c),j=a.style,k=f.cssHooks[i];c=f.cssProps[i]||i;if(d===b){if(k&&"get"in k&&(g=k.get(a,!1,e))!==b)return g;return j[c]}h=typeof d,h==="string"&&(g=bv.exec(d))&&(d=+(g[1]+1)*+g[2]+parseFloat(f.css(a,c)),h="number");if(d==null||h==="number"&&isNaN(d))return;h==="number"&&!f.cssNumber[i]&&(d+="px");if(!k||!("set"in k)||(d=k.set(a,d))!==b)try{j[c]=d}catch(l){}}},css:function(a,c,d){var e,g;c=f.camelCase(c),g=f.cssHooks[c],c=f.cssProps[c]||c,c==="cssFloat"&&(c="float");if(g&&"get"in g&&(e=g.get(a,!0,d))!==b)return e;if(bz)return bz(a,c)},swap:function(a,b,c){var d={};for(var e in b)d[e]=a.style[e],a.style[e]=b[e];c.call(a);for(e in b)a.style[e]=d[e]}}),f.curCSS=f.css,f.each(["height","width"],function(a,b){f.cssHooks[b]={get:function(a,c,d){var e;if(c){if(a.offsetWidth!==0)return bC(a,b,d);f.swap(a,bw,function(){e=bC(a,b,d)});return e}},set:function(a,b){if(!bt.test(b))return b;b=parseFloat(b);if(b>=0)return b+"px"}}}),f.support.opacity||(f.cssHooks.opacity={get:function(a,b){return br.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?parseFloat(RegExp.$1)/100+"":b?"1":""},set:function(a,b){var c=a.style,d=a.currentStyle,e=f.isNumeric(b)?"alpha(opacity="+b*100+")":"",g=d&&d.filter||c.filter||"";c.zoom=1;if(b>=1&&f.trim(g.replace(bq,""))===""){c.removeAttribute("filter");if(d&&!d.filter)return}c.filter=bq.test(g)?g.replace(bq,e):g+" "+e}}),f(function(){f.support.reliableMarginRight||(f.cssHooks.marginRight={get:function(a,b){var c;f.swap(a,{display:"inline-block"},function(){b?c=bz(a,"margin-right","marginRight"):c=a.style.marginRight});return c}})}),c.defaultView&&c.defaultView.getComputedStyle&&(bA=function(a,b){var c,d,e;b=b.replace(bs,"-$1").toLowerCase(),(d=a.ownerDocument.defaultView)&&(e=d.getComputedStyle(a,null))&&(c=e.getPropertyValue(b),c===""&&!f.contains(a.ownerDocument.documentElement,a)&&(c=f.style(a,b)));return c}),c.documentElement.currentStyle&&(bB=function(a,b){var c,d,e,f=a.currentStyle&&a.currentStyle[b],g=a.style;f===null&&g&&(e=g[b])&&(f=e),!bt.test(f)&&bu.test(f)&&(c=g.left,d=a.runtimeStyle&&a.runtimeStyle.left,d&&(a.runtimeStyle.left=a.currentStyle.left),g.left=b==="fontSize"?"1em":f||0,f=g.pixelLeft+"px",g.left=c,d&&(a.runtimeStyle.left=d));return f===""?"auto":f}),bz=bA||bB,f.expr&&f.expr.filters&&(f.expr.filters.hidden=function(a){var b=a.offsetWidth,c=a.offsetHeight;return b===0&&c===0||!f.support.reliableHiddenOffsets&&(a.style&&a.style.display||f.css(a,"display"))==="none"},f.expr.filters.visible=function(a){return!f.expr.filters.hidden(a)});var bD=/%20/g,bE=/\[\]$/,bF=/\r?\n/g,bG=/#.*$/,bH=/^(.*?):[ \t]*([^\r\n]*)\r?$/mg,bI=/^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,bJ=/^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,bK=/^(?:GET|HEAD)$/,bL=/^\/\//,bM=/\?/,bN=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,bO=/^(?:select|textarea)/i,bP=/\s+/,bQ=/([?&])_=[^&]*/,bR=/^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+))?)?/,bS=f.fn.load,bT={},bU={},bV,bW,bX=["*/"]+["*"];try{bV=e.href}catch(bY){bV=c.createElement("a"),bV.href="",bV=bV.href}bW=bR.exec(bV.toLowerCase())||[],f.fn.extend({load:function(a,c,d){if(typeof a!="string"&&bS)return bS.apply(this,arguments);if(!this.length)return this;var e=a.indexOf(" ");if(e>=0){var g=a.slice(e,a.length);a=a.slice(0,e)}var h="GET";c&&(f.isFunction(c)?(d=c,c=b):typeof c=="object"&&(c=f.param(c,f.ajaxSettings.traditional),h="POST"));var i=this;f.ajax({url:a,type:h,dataType:"html",data:c,complete:function(a,b,c){c=a.responseText,a.isResolved()&&(a.done(function(a){c=a}),i.html(g?f("<div>").append(c.replace(bN,"")).find(g):c)),d&&i.each(d,[c,b,a])}});return this},serialize:function(){return f.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?f.makeArray(this.elements):this}).filter(function(){return this.name&&!this.disabled&&(this.checked||bO.test(this.nodeName)||bI.test(this.type))}).map(function(a,b){var c=f(this).val();return c==null?null:f.isArray(c)?f.map(c,function(a,c){return{name:b.name,value:a.replace(bF,"\r\n")}}):{name:b.name,value:c.replace(bF,"\r\n")}}).get()}}),f.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(a,b){f.fn[b]=function(a){return this.on(b,a)}}),f.each(["get","post"],function(a,c){f[c]=function(a,d,e,g){f.isFunction(d)&&(g=g||e,e=d,d=b);return f.ajax({type:c,url:a,data:d,success:e,dataType:g})}}),f.extend({getScript:function(a,c){return f.get(a,b,c,"script")},getJSON:function(a,b,c){return f.get(a,b,c,"json")},ajaxSetup:function(a,b){b?b_(a,f.ajaxSettings):(b=a,a=f.ajaxSettings),b_(a,b);return a},ajaxSettings:{url:bV,isLocal:bJ.test(bW[1]),global:!0,type:"GET",contentType:"application/x-www-form-urlencoded",processData:!0,async:!0,accepts:{xml:"application/xml, text/xml",html:"text/html",text:"text/plain",json:"application/json, text/javascript","*":bX},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":a.String,"text html":!0,"text json":f.parseJSON,"text xml":f.parseXML},flatOptions:{context:!0,url:!0}},ajaxPrefilter:bZ(bT),ajaxTransport:bZ(bU),ajax:function(a,c){function w(a,c,l,m){if(s!==2){s=2,q&&clearTimeout(q),p=b,n=m||"",v.readyState=a>0?4:0;var o,r,u,w=c,x=l?cb(d,v,l):b,y,z;if(a>=200&&a<300||a===304){if(d.ifModified){if(y=v.getResponseHeader("Last-Modified"))f.lastModified[k]=y;if(z=v.getResponseHeader("Etag"))f.etag[k]=z}if(a===304)w="notmodified",o=!0;else try{r=cc(d,x),w="success",o=!0}catch(A){w="parsererror",u=A}}else{u=w;if(!w||a)w="error",a<0&&(a=0)}v.status=a,v.statusText=""+(c||w),o?h.resolveWith(e,[r,w,v]):h.rejectWith(e,[v,w,u]),v.statusCode(j),j=b,t&&g.trigger("ajax"+(o?"Success":"Error"),[v,d,o?r:u]),i.fireWith(e,[v,w]),t&&(g.trigger("ajaxComplete",[v,d]),--f.active||f.event.trigger("ajaxStop"))}}typeof a=="object"&&(c=a,a=b),c=c||{};var d=f.ajaxSetup({},c),e=d.context||d,g=e!==d&&(e.nodeType||e instanceof f)?f(e):f.event,h=f.Deferred(),i=f.Callbacks("once memory"),j=d.statusCode||{},k,l={},m={},n,o,p,q,r,s=0,t,u,v={readyState:0,setRequestHeader:function(a,b){if(!s){var c=a.toLowerCase();a=m[c]=m[c]||a,l[a]=b}return this},getAllResponseHeaders:function(){return s===2?n:null},getResponseHeader:function(a){var c;if(s===2){if(!o){o={};while(c=bH.exec(n))o[c[1].toLowerCase()]=c[2]}c=o[a.toLowerCase()]}return c===b?null:c},overrideMimeType:function(a){s||(d.mimeType=a);return this},abort:function(a){a=a||"abort",p&&p.abort(a),w(0,a);return this}};h.promise(v),v.success=v.done,v.error=v.fail,v.complete=i.add,v.statusCode=function(a){if(a){var b;if(s<2)for(b in a)j[b]=[j[b],a[b]];else b=a[v.status],v.then(b,b)}return this},d.url=((a||d.url)+"").replace(bG,"").replace(bL,bW[1]+"//"),d.dataTypes=f.trim(d.dataType||"*").toLowerCase().split(bP),d.crossDomain==null&&(r=bR.exec(d.url.toLowerCase()),d.crossDomain=!(!r||r[1]==bW[1]&&r[2]==bW[2]&&(r[3]||(r[1]==="http:"?80:443))==(bW[3]||(bW[1]==="http:"?80:443)))),d.data&&d.processData&&typeof d.data!="string"&&(d.data=f.param(d.data,d.traditional)),b$(bT,d,c,v);if(s===2)return!1;t=d.global,d.type=d.type.toUpperCase(),d.hasContent=!bK.test(d.type),t&&f.active++===0&&f.event.trigger("ajaxStart");if(!d.hasContent){d.data&&(d.url+=(bM.test(d.url)?"&":"?")+d.data,delete d.data),k=d.url;if(d.cache===!1){var x=f.now(),y=d.url.replace(bQ,"$1_="+x);d.url=y+(y===d.url?(bM.test(d.url)?"&":"?")+"_="+x:"")}}(d.data&&d.hasContent&&d.contentType!==!1||c.contentType)&&v.setRequestHeader("Content-Type",d.contentType),d.ifModified&&(k=k||d.url,f.lastModified[k]&&v.setRequestHeader("If-Modified-Since",f.lastModified[k]),f.etag[k]&&v.setRequestHeader("If-None-Match",f.etag[k])),v.setRequestHeader("Accept",d.dataTypes[0]&&d.accepts[d.dataTypes[0]]?d.accepts[d.dataTypes[0]]+(d.dataTypes[0]!=="*"?", "+bX+"; q=0.01":""):d.accepts["*"]);for(u in d.headers)v.setRequestHeader(u,d.headers[u]);if(d.beforeSend&&(d.beforeSend.call(e,v,d)===!1||s===2)){v.abort();return!1}for(u in{success:1,error:1,complete:1})v[u](d[u]);p=b$(bU,d,c,v);if(!p)w(-1,"No Transport");else{v.readyState=1,t&&g.trigger("ajaxSend",[v,d]),d.async&&d.timeout>0&&(q=setTimeout(function(){v.abort("timeout")},d.timeout));try{s=1,p.send(l,w)}catch(z){if(s<2)w(-1,z);else throw z}}return v},param:function(a,c){var d=[],e=function(a,b){b=f.isFunction(b)?b():b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};c===b&&(c=f.ajaxSettings.traditional);if(f.isArray(a)||a.jquery&&!f.isPlainObject(a))f.each(a,function(){e(this.name,this.value)});else for(var g in a)ca(g,a[g],c,e);return d.join("&").replace(bD,"+")}}),f.extend({active:0,lastModified:{},etag:{}});var cd=f.now(),ce=/(\=)\?(&|$)|\?\?/i;f.ajaxSetup({jsonp:"callback",jsonpCallback:function(){return f.expando+"_"+cd++}}),f.ajaxPrefilter("json jsonp",function(b,c,d){var e=b.contentType==="application/x-www-form-urlencoded"&&typeof b.data=="string";if(b.dataTypes[0]==="jsonp"||b.jsonp!==!1&&(ce.test(b.url)||e&&ce.test(b.data))){var g,h=b.jsonpCallback=f.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,i=a[h],j=b.url,k=b.data,l="$1"+h+"$2";b.jsonp!==!1&&(j=j.replace(ce,l),b.url===j&&(e&&(k=k.replace(ce,l)),b.data===k&&(j+=(/\?/.test(j)?"&":"?")+b.jsonp+"="+h))),b.url=j,b.data=k,a[h]=function(a){g=[a]},d.always(function(){a[h]=i,g&&f.isFunction(i)&&a[h](g[0])}),b.converters["script json"]=function(){g||f.error(h+" was not called");return g[0]},b.dataTypes[0]="json";return"script"}}),f.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/javascript|ecmascript/},converters:{"text script":function(a){f.globalEval(a);return a}}}),f.ajaxPrefilter("script",function(a){a.cache===b&&(a.cache=!1),a.crossDomain&&(a.type="GET",a.global=!1)}),f.ajaxTransport("script",function(a){if(a.crossDomain){var d,e=c.head||c.getElementsByTagName("head")[0]||c.documentElement;return{send:function(f,g){d=c.createElement("script"),d.async="async",a.scriptCharset&&(d.charset=a.scriptCharset),d.src=a.url,d.onload=d.onreadystatechange=function(a,c){if(c||!d.readyState||/loaded|complete/.test(d.readyState))d.onload=d.onreadystatechange=null,e&&d.parentNode&&e.removeChild(d),d=b,c||g(200,"success")},e.insertBefore(d,e.firstChild)},abort:function(){d&&d.onload(0,1)}}}});var cf=a.ActiveXObject?function(){for(var a in ch)ch[a](0,1)}:!1,cg=0,ch;f.ajaxSettings.xhr=a.ActiveXObject?function(){return!this.isLocal&&ci()||cj()}:ci,function(a){f.extend(f.support,{ajax:!!a,cors:!!a&&"withCredentials"in a})}(f.ajaxSettings.xhr()),f.support.ajax&&f.ajaxTransport(function(c){if(!c.crossDomain||f.support.cors){var d;return{send:function(e,g){var h=c.xhr(),i,j;c.username?h.open(c.type,c.url,c.async,c.username,c.password):h.open(c.type,c.url,c.async);if(c.xhrFields)for(j in c.xhrFields)h[j]=c.xhrFields[j];c.mimeType&&h.overrideMimeType&&h.overrideMimeType(c.mimeType),!c.crossDomain&&!e["X-Requested-With"]&&(e["X-Requested-With"]="XMLHttpRequest");try{for(j in e)h.setRequestHeader(j,e[j])}catch(k){}h.send(c.hasContent&&c.data||null),d=function(a,e){var j,k,l,m,n;try{if(d&&(e||h.readyState===4)){d=b,i&&(h.onreadystatechange=f.noop,cf&&delete ch[i]);if(e)h.readyState!==4&&h.abort();else{j=h.status,l=h.getAllResponseHeaders(),m={},n=h.responseXML,n&&n.documentElement&&(m.xml=n),m.text=h.responseText;try{k=h.statusText}catch(o){k=""}!j&&c.isLocal&&!c.crossDomain?j=m.text?200:404:j===1223&&(j=204)}}}catch(p){e||g(-1,p)}m&&g(j,k,m,l)},!c.async||h.readyState===4?d():(i=++cg,cf&&(ch||(ch={},f(a).unload(cf)),ch[i]=d),h.onreadystatechange=d)},abort:function(){d&&d(0,1)}}}});var ck={},cl,cm,cn=/^(?:toggle|show|hide)$/,co=/^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,cp,cq=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]],cr;f.fn.extend({show:function(a,b,c){var d,e;if(a||a===0)return this.animate(cu("show",3),a,b,c);for(var g=0,h=this.length;g<h;g++)d=this[g],d.style&&(e=d.style.display,!f._data(d,"olddisplay")&&e==="none"&&(e=d.style.display=""),e===""&&f.css(d,"display")==="none"&&f._data(d,"olddisplay",cv(d.nodeName)));for(g=0;g<h;g++){d=this[g];if(d.style){e=d.style.display;if(e===""||e==="none")d.style.display=f._data(d,"olddisplay")||""}}return this},hide:function(a,b,c){if(a||a===0)return this.animate(cu("hide",3),a,b,c);var d,e,g=0,h=this.length;for(;g<h;g++)d=this[g],d.style&&(e=f.css(d,"display"),e!=="none"&&!f._data(d,"olddisplay")&&f._data(d,"olddisplay",e));for(g=0;g<h;g++)this[g].style&&(this[g].style.display="none");return this},_toggle:f.fn.toggle,toggle:function(a,b,c){var d=typeof a=="boolean";f.isFunction(a)&&f.isFunction(b)?this._toggle.apply(this,arguments):a==null||d?this.each(function(){var b=d?a:f(this).is(":hidden");f(this)[b?"show":"hide"]()}):this.animate(cu("toggle",3),a,b,c);return this},fadeTo:function(a,b,c,d){return this.filter(":hidden").css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){function g(){e.queue===!1&&f._mark(this);var b=f.extend({},e),c=this.nodeType===1,d=c&&f(this).is(":hidden"),g,h,i,j,k,l,m,n,o;b.animatedProperties={};for(i in a){g=f.camelCase(i),i!==g&&(a[g]=a[i],delete a[i]),h=a[g],f.isArray(h)?(b.animatedProperties[g]=h[1],h=a[g]=h[0]):b.animatedProperties[g]=b.specialEasing&&b.specialEasing[g]||b.easing||"swing";if(h==="hide"&&d||h==="show"&&!d)return b.complete.call(this);c&&(g==="height"||g==="width")&&(b.overflow=[this.style.overflow,this.style.overflowX,this.style.overflowY],f.css(this,"display")==="inline"&&f.css(this,"float")==="none"&&(!f.support.inlineBlockNeedsLayout||cv(this.nodeName)==="inline"?this.style.display="inline-block":this.style.zoom=1))}b.overflow!=null&&(this.style.overflow="hidden");for(i in a)j=new f.fx(this,b,i),h=a[i],cn.test(h)?(o=f._data(this,"toggle"+i)||(h==="toggle"?d?"show":"hide":0),o?(f._data(this,"toggle"+i,o==="show"?"hide":"show"),j[o]()):j[h]()):(k=co.exec(h),l=j.cur(),k?(m=parseFloat(k[2]),n=k[3]||(f.cssNumber[i]?"":"px"),n!=="px"&&(f.style(this,i,(m||1)+n),l=(m||1)/j.cur()*l,f.style(this,i,l+n)),k[1]&&(m=(k[1]==="-="?-1:1)*m+l),j.custom(l,m,n)):j.custom(l,h,""));return!0}var e=f.speed(b,c,d);if(f.isEmptyObject(a))return this.each(e.complete,[!1]);a=f.extend({},a);return e.queue===!1?this.each(g):this.queue(e.queue,g)},stop:function(a,c,d){typeof a!="string"&&(d=c,c=a,a=b),c&&a!==!1&&this.queue(a||"fx",[]);return this.each(function(){function h(a,b,c){var e=b[c];f.removeData(a,c,!0),e.stop(d)}var b,c=!1,e=f.timers,g=f._data(this);d||f._unmark(!0,this);if(a==null)for(b in g)g[b]&&g[b].stop&&b.indexOf(".run")===b.length-4&&h(this,g,b);else g[b=a+".run"]&&g[b].stop&&h(this,g,b);for(b=e.length;b--;)e[b].elem===this&&(a==null||e[b].queue===a)&&(d?e[b](!0):e[b].saveState(),c=!0,e.splice(b,1));(!d||!c)&&f.dequeue(this,a)})}}),f.each({slideDown:cu("show",1),slideUp:cu("hide",1),slideToggle:cu("toggle",1),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){f.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),f.extend({speed:function(a,b,c){var d=a&&typeof a=="object"?f.extend({},a):{complete:c||!c&&b||f.isFunction(a)&&a,duration:a,easing:c&&b||b&&!f.isFunction(b)&&b};d.duration=f.fx.off?0:typeof d.duration=="number"?d.duration:d.duration in f.fx.speeds?f.fx.speeds[d.duration]:f.fx.speeds._default;if(d.queue==null||d.queue===!0)d.queue="fx";d.old=d.complete,d.complete=function(a){f.isFunction(d.old)&&d.old.call(this),d.queue?f.dequeue(this,d.queue):a!==!1&&f._unmark(this)};return d},easing:{linear:function(a,b,c,d){return c+d*a},swing:function(a,b,c,d){return(-Math.cos(a*Math.PI)/2+.5)*d+c}},timers:[],fx:function(a,b,c){this.options=b,this.elem=a,this.prop=c,b.orig=b.orig||{}}}),f.fx.prototype={update:function(){this.options.step&&this.options.step.call(this.elem,this.now,this),(f.fx.step[this.prop]||f.fx.step._default)(this)},cur:function(){if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==null))return this.elem[this.prop];var a,b=f.css(this.elem,this.prop);return isNaN(a=parseFloat(b))?!b||b==="auto"?0:b:a},custom:function(a,c,d){function h(a){return e.step(a)}var e=this,g=f.fx;this.startTime=cr||cs(),this.end=c,this.now=this.start=a,this.pos=this.state=0,this.unit=d||this.unit||(f.cssNumber[this.prop]?"":"px"),h.queue=this.options.queue,h.elem=this.elem,h.saveState=function(){e.options.hide&&f._data(e.elem,"fxshow"+e.prop)===b&&f._data(e.elem,"fxshow"+e.prop,e.start)},h()&&f.timers.push(h)&&!cp&&(cp=setInterval(g.tick,g.interval))},show:function(){var a=f._data(this.elem,"fxshow"+this.prop);this.options.orig[this.prop]=a||f.style(this.elem,this.prop),this.options.show=!0,a!==b?this.custom(this.cur(),a):this.custom(this.prop==="width"||this.prop==="height"?1:0,this.cur()),f(this.elem).show()},hide:function(){this.options.orig[this.prop]=f._data(this.elem,"fxshow"+this.prop)||f.style(this.elem,this.prop),this.options.hide=!0,this.custom(this.cur(),0)},step:function(a){var b,c,d,e=cr||cs(),g=!0,h=this.elem,i=this.options;if(a||e>=i.duration+this.startTime){this.now=this.end,this.pos=this.state=1,this.update(),i.animatedProperties[this.prop]=!0;for(b in i.animatedProperties)i.animatedProperties[b]!==!0&&(g=!1);if(g){i.overflow!=null&&!f.support.shrinkWrapBlocks&&f.each(["","X","Y"],function(a,b){h.style["overflow"+b]=i.overflow[a]}),i.hide&&f(h).hide();if(i.hide||i.show)for(b in i.animatedProperties)f.style(h,b,i.orig[b]),f.removeData(h,"fxshow"+b,!0),f.removeData(h,"toggle"+b,!0);d=i.complete,d&&(i.complete=!1,d.call(h))}return!1}i.duration==Infinity?this.now=e:(c=e-this.startTime,this.state=c/i.duration,this.pos=f.easing[i.animatedProperties[this.prop]](this.state,c,0,1,i.duration),this.now=this.start+(this.end-this.start)*this.pos),this.update();return!0}},f.extend(f.fx,{tick:function(){var a,b=f.timers,c=0;for(;c<b.length;c++)a=b[c],!a()&&b[c]===a&&b.splice(c--,1);b.length||f.fx.stop()},interval:13,stop:function(){clearInterval(cp),cp=null},speeds:{slow:600,fast:200,_default:400},step:{opacity:function(a){f.style(a.elem,"opacity",a.now)},_default:function(a){a.elem.style&&a.elem.style[a.prop]!=null?a.elem.style[a.prop]=a.now+a.unit:a.elem[a.prop]=a.now}}}),f.each(["width","height"],function(a,b){f.fx.step[b]=function(a){f.style(a.elem,b,Math.max(0,a.now)+a.unit)}}),f.expr&&f.expr.filters&&(f.expr.filters.animated=function(a){return f.grep(f.timers,function(b){return a===b.elem}).length});var cw=/^t(?:able|d|h)$/i,cx=/^(?:body|html)$/i;"getBoundingClientRect"in c.documentElement?f.fn.offset=function(a){var b=this[0],c;if(a)return this.each(function(b){f.offset.setOffset(this,a,b)});if(!b||!b.ownerDocument)return null;if(b===b.ownerDocument.body)return f.offset.bodyOffset(b);try{c=b.getBoundingClientRect()}catch(d){}var e=b.ownerDocument,g=e.documentElement;if(!c||!f.contains(g,b))return c?{top:c.top,left:c.left}:{top:0,left:0};var h=e.body,i=cy(e),j=g.clientTop||h.clientTop||0,k=g.clientLeft||h.clientLeft||0,l=i.pageYOffset||f.support.boxModel&&g.scrollTop||h.scrollTop,m=i.pageXOffset||f.support.boxModel&&g.scrollLeft||h.scrollLeft,n=c.top+l-j,o=c.left+m-k;return{top:n,left:o}}:f.fn.offset=function(a){var b=this[0];if(a)return this.each(function(b){f.offset.setOffset(this,a,b)});if(!b||!b.ownerDocument)return null;if(b===b.ownerDocument.body)return f.offset.bodyOffset(b);var c,d=b.offsetParent,e=b,g=b.ownerDocument,h=g.documentElement,i=g.body,j=g.defaultView,k=j?j.getComputedStyle(b,null):b.currentStyle,l=b.offsetTop,m=b.offsetLeft;while((b=b.parentNode)&&b!==i&&b!==h){if(f.support.fixedPosition&&k.position==="fixed")break;c=j?j.getComputedStyle(b,null):b.currentStyle,l-=b.scrollTop,m-=b.scrollLeft,b===d&&(l+=b.offsetTop,m+=b.offsetLeft,f.support.doesNotAddBorder&&(!f.support.doesAddBorderForTableAndCells||!cw.test(b.nodeName))&&(l+=parseFloat(c.borderTopWidth)||0,m+=parseFloat(c.borderLeftWidth)||0),e=d,d=b.offsetParent),f.support.subtractsBorderForOverflowNotVisible&&c.overflow!=="visible"&&(l+=parseFloat(c.borderTopWidth)||0,m+=parseFloat(c.borderLeftWidth)||0),k=c}if(k.position==="relative"||k.position==="static")l+=i.offsetTop,m+=i.offsetLeft;f.support.fixedPosition&&k.position==="fixed"&&(l+=Math.max(h.scrollTop,i.scrollTop),m+=Math.max(h.scrollLeft,i.scrollLeft));return{top:l,left:m}},f.offset={bodyOffset:function(a){var b=a.offsetTop,c=a.offsetLeft;f.support.doesNotIncludeMarginInBodyOffset&&(b+=parseFloat(f.css(a,"marginTop"))||0,c+=parseFloat(f.css(a,"marginLeft"))||0);return{top:b,left:c}},setOffset:function(a,b,c){var d=f.css(a,"position");d==="static"&&(a.style.position="relative");var e=f(a),g=e.offset(),h=f.css(a,"top"),i=f.css(a,"left"),j=(d==="absolute"||d==="fixed")&&f.inArray("auto",[h,i])>-1,k={},l={},m,n;j?(l=e.position(),m=l.top,n=l.left):(m=parseFloat(h)||0,n=parseFloat(i)||0),f.isFunction(b)&&(b=b.call(a,c,g)),b.top!=null&&(k.top=b.top-g.top+m),b.left!=null&&(k.left=b.left-g.left+n),"using"in b?b.using.call(a,k):e.css(k)}},f.fn.extend({position:function(){if(!this[0])return null;var a=this[0],b=this.offsetParent(),c=this.offset(),d=cx.test(b[0].nodeName)?{top:0,left:0}:b.offset();c.top-=parseFloat(f.css(a,"marginTop"))||0,c.left-=parseFloat(f.css(a,"marginLeft"))||0,d.top+=parseFloat(f.css(b[0],"borderTopWidth"))||0,d.left+=parseFloat(f.css(b[0],"borderLeftWidth"))||0;return{top:c.top-d.top,left:c.left-d.left}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||c.body;while(a&&!cx.test(a.nodeName)&&f.css(a,"position")==="static")a=a.offsetParent;return a})}}),f.each(["Left","Top"],function(a,c){var d="scroll"+c;f.fn[d]=function(c){var e,g;if(c===b){e=this[0];if(!e)return null;g=cy(e);return g?"pageXOffset"in g?g[a?"pageYOffset":"pageXOffset"]:f.support.boxModel&&g.document.documentElement[d]||g.document.body[d]:e[d]}return this.each(function(){g=cy(this),g?g.scrollTo(a?f(g).scrollLeft():c,a?c:f(g).scrollTop()):this[d]=c})}}),f.each(["Height","Width"],function(a,c){var d=c.toLowerCase();f.fn["inner"+c]=function(){var a=this[0];return a?a.style?parseFloat(f.css(a,d,"padding")):this[d]():null},f.fn["outer"+c]=function(a){var b=this[0];return b?b.style?parseFloat(f.css(b,d,a?"margin":"border")):this[d]():null},f.fn[d]=function(a){var e=this[0];if(!e)return a==null?null:this;if(f.isFunction(a))return this.each(function(b){var c=f(this);c[d](a.call(this,b,c[d]()))});if(f.isWindow(e)){var g=e.document.documentElement["client"+c],h=e.document.body;return e.document.compatMode==="CSS1Compat"&&g||h&&h["client"+c]||g}if(e.nodeType===9)return Math.max(e.documentElement["client"+c],e.body["scroll"+c],e.documentElement["scroll"+c],e.body["offset"+c],e.documentElement["offset"+c]);if(a===b){var i=f.css(e,d),j=parseFloat(i);return f.isNumeric(j)?j:i}return this.css(d,typeof a=="string"?a:a+"px")}}),a.jQuery=a.$=f,typeof define=="function"&&define.amd&&define.amd.jQuery&&define("jquery",[],function(){return f})})(window);

;
/* jquery.colorbox.js */

/* 1   */ // ColorBox v1.3.19.3 - jQuery lightbox plugin
/* 2   */ // (c) 2011 Jack Moore - jacklmoore.com
/* 3   */ // License: http://www.opensource.org/licenses/mit-license.php
/* 4   */ (function ($, document, window) {
/* 5   */ 	var
/* 6   */ 	// Default settings object.	
/* 7   */ 	// See http://jacklmoore.com/colorbox for details.
/* 8   */ 	defaults = {
/* 9   */ 		transition: "elastic",
/* 10  */ 		speed: 300,
/* 11  */ 		width: false,
/* 12  */ 		initialWidth: "600",
/* 13  */ 		innerWidth: false,
/* 14  */ 		maxWidth: false,
/* 15  */ 		height: false,
/* 16  */ 		initialHeight: "450",
/* 17  */ 		innerHeight: false,
/* 18  */ 		maxHeight: false,
/* 19  */ 		scalePhotos: true,
/* 20  */ 		scrolling: true,
/* 21  */ 		inline: false,
/* 22  */ 		html: false,
/* 23  */ 		iframe: false,
/* 24  */ 		fastIframe: true,
/* 25  */ 		photo: false,
/* 26  */ 		href: false,
/* 27  */ 		title: false,
/* 28  */ 		rel: false,
/* 29  */ 		opacity: 0.9,
/* 30  */ 		preloading: true,
/* 31  */ 
/* 32  */ 		current: "image {current} of {total}",
/* 33  */ 		previous: "previous",
/* 34  */ 		next: "next",
/* 35  */ 		close: "close",
/* 36  */ 		xhrError: "This content failed to load.",
/* 37  */ 		imgError: "This image failed to load.",
/* 38  */ 
/* 39  */ 		open: false,
/* 40  */ 		returnFocus: true,
/* 41  */ 		reposition: true,
/* 42  */ 		loop: true,
/* 43  */ 		slideshow: false,
/* 44  */ 		slideshowAuto: true,
/* 45  */ 		slideshowSpeed: 2500,
/* 46  */ 		slideshowStart: "start slideshow",
/* 47  */ 		slideshowStop: "stop slideshow",
/* 48  */ 		onOpen: false,
/* 49  */ 		onLoad: false,
/* 50  */ 		onComplete: false,

/* jquery.colorbox.js */

/* 51  */ 		onCleanup: false,
/* 52  */ 		onClosed: false,
/* 53  */ 		overlayClose: true,		
/* 54  */ 		escKey: true,
/* 55  */ 		arrowKey: true,
/* 56  */ 		top: false,
/* 57  */ 		bottom: false,
/* 58  */ 		left: false,
/* 59  */ 		right: false,
/* 60  */ 		fixed: false,
/* 61  */ 		data: undefined
/* 62  */ 	},
/* 63  */ 	
/* 64  */ 	// Abstracting the HTML and event identifiers for easy rebranding
/* 65  */ 	colorbox = 'colorbox',
/* 66  */ 	prefix = 'cbox',
/* 67  */ 	boxElement = prefix + 'Element',
/* 68  */ 	
/* 69  */ 	// Events	
/* 70  */ 	event_open = prefix + '_open',
/* 71  */ 	event_load = prefix + '_load',
/* 72  */ 	event_complete = prefix + '_complete',
/* 73  */ 	event_cleanup = prefix + '_cleanup',
/* 74  */ 	event_closed = prefix + '_closed',
/* 75  */ 	event_purge = prefix + '_purge',
/* 76  */ 	
/* 77  */ 	// Special Handling for IE
/* 78  */ 	isIE = !$.support.opacity && !$.support.style, // IE7 & IE8
/* 79  */ 	isIE6 = isIE && !window.XMLHttpRequest, // IE6
/* 80  */ 	event_ie6 = prefix + '_IE6',
/* 81  */ 
/* 82  */ 	// Cached jQuery Object Variables
/* 83  */ 	$overlay,
/* 84  */ 	$box,
/* 85  */ 	$wrap,
/* 86  */ 	$content,
/* 87  */ 	$topBorder,
/* 88  */ 	$leftBorder,
/* 89  */ 	$rightBorder,
/* 90  */ 	$bottomBorder,
/* 91  */ 	$related,
/* 92  */ 	$window,
/* 93  */ 	$loaded,
/* 94  */ 	$loadingBay,
/* 95  */ 	$loadingOverlay,
/* 96  */ 	$title,
/* 97  */ 	$current,
/* 98  */ 	$slideshow,
/* 99  */ 	$next,
/* 100 */ 	$prev,

/* jquery.colorbox.js */

/* 101 */ 	$close,
/* 102 */ 	$groupControls,
/* 103 */ 	
/* 104 */ 	// Variables for cached values or use across multiple functions
/* 105 */ 	settings,
/* 106 */ 	interfaceHeight,
/* 107 */ 	interfaceWidth,
/* 108 */ 	loadedHeight,
/* 109 */ 	loadedWidth,
/* 110 */ 	element,
/* 111 */ 	index,
/* 112 */ 	photo,
/* 113 */ 	open,
/* 114 */ 	active,
/* 115 */ 	closing,
/* 116 */ 	loadingTimer,
/* 117 */ 	publicMethod,
/* 118 */ 	div = "div",
/* 119 */ 	init;
/* 120 */ 
/* 121 */ 	// ****************
/* 122 */ 	// HELPER FUNCTIONS
/* 123 */ 	// ****************
/* 124 */ 	
/* 125 */ 	// Convience function for creating new jQuery objects
/* 126 */ 	function $tag(tag, id, css) {
/* 127 */ 		var element = document.createElement(tag);
/* 128 */ 
/* 129 */ 		if (id) {
/* 130 */ 			element.id = prefix + id;
/* 131 */ 		}
/* 132 */ 
/* 133 */ 		if (css) {
/* 134 */ 			element.style.cssText = css;
/* 135 */ 		}
/* 136 */ 
/* 137 */ 		return $(element);
/* 138 */ 	}
/* 139 */ 
/* 140 */ 	// Determine the next and previous members in a group.
/* 141 */ 	function getIndex(increment) {
/* 142 */ 		var 
/* 143 */ 		max = $related.length, 
/* 144 */ 		newIndex = (index + increment) % max;
/* 145 */ 		
/* 146 */ 		return (newIndex < 0) ? max + newIndex : newIndex;
/* 147 */ 	}
/* 148 */ 
/* 149 */ 	// Convert '%' and 'px' values to integers
/* 150 */ 	function setSize(size, dimension) {

/* jquery.colorbox.js */

/* 151 */ 		return Math.round((/%/.test(size) ? ((dimension === 'x' ? $window.width() : $window.height()) / 100) : 1) * parseInt(size, 10));
/* 152 */ 	}
/* 153 */ 	
/* 154 */ 	// Checks an href to see if it is a photo.
/* 155 */ 	// There is a force photo option (photo: true) for hrefs that cannot be matched by this regex.
/* 156 */ 	function isImage(url) {
/* 157 */ 		return settings.photo || /\.(gif|png|jpe?g|bmp|ico)((#|\?).*)?$/i.test(url);
/* 158 */ 	}
/* 159 */ 	
/* 160 */ 	// Assigns function results to their respective properties
/* 161 */ 	function makeSettings() {
/* 162 */ 		var i,
/* 163 */ 			data = $.data(element, colorbox);
/* 164 */ 		
/* 165 */ 		if (data == null) {
/* 166 */ 			settings = $.extend({}, defaults);
/* 167 */ 			if (console && console.log) {
/* 168 */ 				console.log('Error: cboxElement missing settings object')
/* 169 */ 			}
/* 170 */ 		} else {
/* 171 */ 			settings = $.extend({}, data);    		
/* 172 */ 		}
/* 173 */ 		
/* 174 */ 		for (i in settings) {
/* 175 */ 			if ($.isFunction(settings[i]) && i.slice(0, 2) !== 'on') { // checks to make sure the function isn't one of the callbacks, they will be handled at the appropriate time.
/* 176 */ 				settings[i] = settings[i].call(element);
/* 177 */ 			}
/* 178 */ 		}
/* 179 */ 		
/* 180 */ 		settings.rel = settings.rel || element.rel || 'nofollow';
/* 181 */ 		settings.href = settings.href || $(element).attr('href');
/* 182 */ 		settings.title = settings.title || element.title;
/* 183 */ 		
/* 184 */ 		if (typeof settings.href === "string") {
/* 185 */ 			settings.href = $.trim(settings.href);
/* 186 */ 		}
/* 187 */ 	}
/* 188 */ 
/* 189 */ 	function trigger(event, callback) {
/* 190 */ 		$.event.trigger(event);
/* 191 */ 		if (callback) {
/* 192 */ 			callback.call(element);
/* 193 */ 		}
/* 194 */ 	}
/* 195 */ 
/* 196 */ 	// Slideshow functionality
/* 197 */ 	function slideshow() {
/* 198 */ 		var
/* 199 */ 		timeOut,
/* 200 */ 		className = prefix + "Slideshow_",

/* jquery.colorbox.js */

/* 201 */ 		click = "click." + prefix,
/* 202 */ 		start,
/* 203 */ 		stop,
/* 204 */ 		clear;
/* 205 */ 		
/* 206 */ 		if (settings.slideshow && $related[1]) {
/* 207 */ 			start = function () {
/* 208 */ 				$slideshow
/* 209 */ 					.text(settings.slideshowStop)
/* 210 */ 					.unbind(click)
/* 211 */ 					.bind(event_complete, function () {
/* 212 */ 						if (settings.loop || $related[index + 1]) {
/* 213 */ 							timeOut = setTimeout(publicMethod.next, settings.slideshowSpeed);
/* 214 */ 						}
/* 215 */ 					})
/* 216 */ 					.bind(event_load, function () {
/* 217 */ 						clearTimeout(timeOut);
/* 218 */ 					})
/* 219 */ 					.one(click + ' ' + event_cleanup, stop);
/* 220 */ 				$box.removeClass(className + "off").addClass(className + "on");
/* 221 */ 				timeOut = setTimeout(publicMethod.next, settings.slideshowSpeed);
/* 222 */ 			};
/* 223 */ 			
/* 224 */ 			stop = function () {
/* 225 */ 				clearTimeout(timeOut);
/* 226 */ 				$slideshow
/* 227 */ 					.text(settings.slideshowStart)
/* 228 */ 					.unbind([event_complete, event_load, event_cleanup, click].join(' '))
/* 229 */ 					.one(click, function () {
/* 230 */ 						publicMethod.next();
/* 231 */ 						start();
/* 232 */ 					});
/* 233 */ 				$box.removeClass(className + "on").addClass(className + "off");
/* 234 */ 			};
/* 235 */ 			
/* 236 */ 			if (settings.slideshowAuto) {
/* 237 */ 				start();
/* 238 */ 			} else {
/* 239 */ 				stop();
/* 240 */ 			}
/* 241 */ 		} else {
/* 242 */ 			$box.removeClass(className + "off " + className + "on");
/* 243 */ 		}
/* 244 */ 	}
/* 245 */ 
/* 246 */ 	function launch(target) {
/* 247 */ 		if (!closing) {
/* 248 */ 			
/* 249 */ 			element = target;
/* 250 */ 			

/* jquery.colorbox.js */

/* 251 */ 			makeSettings();
/* 252 */ 			
/* 253 */ 			$related = $(element);
/* 254 */ 			
/* 255 */ 			index = 0;
/* 256 */ 			
/* 257 */ 			if (settings.rel !== 'nofollow') {
/* 258 */ 				$related = $('.' + boxElement).filter(function () {
/* 259 */ 					var data = $.data(this, colorbox), 
/* 260 */ 						relRelated;
/* 261 */ 
/* 262 */ 					if (data) {
/* 263 */ 						relRelated =  data.rel || this.rel;
/* 264 */ 					}
/* 265 */ 					
/* 266 */ 					return (relRelated === settings.rel);
/* 267 */ 				});
/* 268 */ 				index = $related.index(element);
/* 269 */ 				
/* 270 */ 				// Check direct calls to ColorBox.
/* 271 */ 				if (index === -1) {
/* 272 */ 					$related = $related.add(element);
/* 273 */ 					index = $related.length - 1;
/* 274 */ 				}
/* 275 */ 			}
/* 276 */ 			
/* 277 */ 			if (!open) {
/* 278 */ 				open = active = true; // Prevents the page-change action from queuing up if the visitor holds down the left or right keys.
/* 279 */ 				
/* 280 */ 				$box.show();
/* 281 */ 				
/* 282 */ 				if (settings.returnFocus) {
/* 283 */ 					$(element).blur().one(event_closed, function () {
/* 284 */ 						$(this).focus();
/* 285 */ 					});
/* 286 */ 				}
/* 287 */ 				
/* 288 */ 				// +settings.opacity avoids a problem in IE when using non-zero-prefixed-string-values, like '.5'
/* 289 */ 				$overlay.css({"opacity": +settings.opacity, "cursor": settings.overlayClose ? "pointer" : "auto"}).show();
/* 290 */ 				
/* 291 */ 				// Opens inital empty ColorBox prior to content being loaded.
/* 292 */ 				settings.w = setSize(settings.initialWidth, 'x');
/* 293 */ 				settings.h = setSize(settings.initialHeight, 'y');
/* 294 */ 				publicMethod.position();
/* 295 */ 				
/* 296 */ 				if (isIE6) {
/* 297 */ 					$window.bind('resize.' + event_ie6 + ' scroll.' + event_ie6, function () {
/* 298 */ 						$overlay.css({width: $window.width(), height: $window.height(), top: $window.scrollTop(), left: $window.scrollLeft()});
/* 299 */ 					}).trigger('resize.' + event_ie6);
/* 300 */ 				}

/* jquery.colorbox.js */

/* 301 */ 				
/* 302 */ 				trigger(event_open, settings.onOpen);
/* 303 */ 				
/* 304 */ 				$groupControls.add($title).hide();
/* 305 */ 				
/* 306 */ 				$close.html(settings.close).show();
/* 307 */ 			}
/* 308 */ 			
/* 309 */ 			publicMethod.load(true);
/* 310 */ 		}
/* 311 */ 	}
/* 312 */ 
/* 313 */ 	// ColorBox's markup needs to be added to the DOM prior to being called
/* 314 */ 	// so that the browser will go ahead and load the CSS background images.
/* 315 */ 	function appendHTML() {
/* 316 */ 		if (!$box && document.body) {
/* 317 */ 			init = false;
/* 318 */ 
/* 319 */ 			$window = $(window);
/* 320 */ 			$box = $tag(div).attr({id: colorbox, 'class': isIE ? prefix + (isIE6 ? 'IE6' : 'IE') : ''}).hide();
/* 321 */ 			$overlay = $tag(div, "Overlay", isIE6 ? 'position:absolute' : '').hide();
/* 322 */ 			$wrap = $tag(div, "Wrapper");
/* 323 */ 			$content = $tag(div, "Content").append(
/* 324 */ 				$loaded = $tag(div, "LoadedContent", 'width:0; height:0; overflow:hidden'),
/* 325 */ 				$loadingOverlay = $tag(div, "LoadingOverlay").add($tag(div, "LoadingGraphic")),
/* 326 */ 				$title = $tag(div, "Title"),
/* 327 */ 				$current = $tag(div, "Current"),
/* 328 */ 				$next = $tag(div, "Next"),
/* 329 */ 				$prev = $tag(div, "Previous"),
/* 330 */ 				$slideshow = $tag(div, "Slideshow").bind(event_open, slideshow),
/* 331 */ 				$close = $tag(div, "Close")
/* 332 */ 			);
/* 333 */ 			
/* 334 */ 			$wrap.append( // The 3x3 Grid that makes up ColorBox
/* 335 */ 				$tag(div).append(
/* 336 */ 					$tag(div, "TopLeft"),
/* 337 */ 					$topBorder = $tag(div, "TopCenter"),
/* 338 */ 					$tag(div, "TopRight")
/* 339 */ 				),
/* 340 */ 				$tag(div, false, 'clear:left').append(
/* 341 */ 					$leftBorder = $tag(div, "MiddleLeft"),
/* 342 */ 					$content,
/* 343 */ 					$rightBorder = $tag(div, "MiddleRight")
/* 344 */ 				),
/* 345 */ 				$tag(div, false, 'clear:left').append(
/* 346 */ 					$tag(div, "BottomLeft"),
/* 347 */ 					$bottomBorder = $tag(div, "BottomCenter"),
/* 348 */ 					$tag(div, "BottomRight")
/* 349 */ 				)
/* 350 */ 			).find('div div').css({'float': 'left'});

/* jquery.colorbox.js */

/* 351 */ 			
/* 352 */ 			$loadingBay = $tag(div, false, 'position:absolute; width:9999px; visibility:hidden; display:none');
/* 353 */ 			
/* 354 */ 			$groupControls = $next.add($prev).add($current).add($slideshow);
/* 355 */ 
/* 356 */ 			$(document.body).append($overlay, $box.append($wrap, $loadingBay));
/* 357 */ 		}
/* 358 */ 	}
/* 359 */ 
/* 360 */ 	// Add ColorBox's event bindings
/* 361 */ 	function addBindings() {
/* 362 */ 		if ($box) {
/* 363 */ 			if (!init) {
/* 364 */ 				init = true;
/* 365 */ 
/* 366 */ 				// Cache values needed for size calculations
/* 367 */ 				interfaceHeight = $topBorder.height() + $bottomBorder.height() + $content.outerHeight(true) - $content.height();//Subtraction needed for IE6
/* 368 */ 				interfaceWidth = $leftBorder.width() + $rightBorder.width() + $content.outerWidth(true) - $content.width();
/* 369 */ 				loadedHeight = $loaded.outerHeight(true);
/* 370 */ 				loadedWidth = $loaded.outerWidth(true);
/* 371 */ 				
/* 372 */ 				// Setting padding to remove the need to do size conversions during the animation step.
/* 373 */ 				$box.css({"padding-bottom": interfaceHeight, "padding-right": interfaceWidth});
/* 374 */ 
/* 375 */ 				// Anonymous functions here keep the public method from being cached, thereby allowing them to be redefined on the fly.
/* 376 */ 				$next.click(function () {
/* 377 */ 					publicMethod.next();
/* 378 */ 				});
/* 379 */ 				$prev.click(function () {
/* 380 */ 					publicMethod.prev();
/* 381 */ 				});
/* 382 */ 				$close.click(function () {
/* 383 */ 					publicMethod.close();
/* 384 */ 				});
/* 385 */ 				$overlay.click(function () {
/* 386 */ 					if (settings.overlayClose) {
/* 387 */ 						publicMethod.close();
/* 388 */ 					}
/* 389 */ 				});
/* 390 */ 				
/* 391 */ 				// Key Bindings
/* 392 */ 				$(document).bind('keydown.' + prefix, function (e) {
/* 393 */ 					var key = e.keyCode;
/* 394 */ 					if (open && settings.escKey && key === 27) {
/* 395 */ 						e.preventDefault();
/* 396 */ 						publicMethod.close();
/* 397 */ 					}
/* 398 */ 					if (open && settings.arrowKey && $related[1]) {
/* 399 */ 						if (key === 37) {
/* 400 */ 							e.preventDefault();

/* jquery.colorbox.js */

/* 401 */ 							$prev.click();
/* 402 */ 						} else if (key === 39) {
/* 403 */ 							e.preventDefault();
/* 404 */ 							$next.click();
/* 405 */ 						}
/* 406 */ 					}
/* 407 */ 				});
/* 408 */ 
/* 409 */ 				$('.' + boxElement, document).live('click', function (e) {
/* 410 */ 					// ignore non-left-mouse-clicks and clicks modified with ctrl / command, shift, or alt.
/* 411 */ 					// See: http://jacklmoore.com/notes/click-events/
/* 412 */ 					if (!(e.which > 1 || e.shiftKey || e.altKey || e.metaKey)) {
/* 413 */ 						e.preventDefault();
/* 414 */ 						launch(this);
/* 415 */ 					}
/* 416 */ 				});
/* 417 */ 			}
/* 418 */ 			return true;
/* 419 */ 		}
/* 420 */ 		return false;
/* 421 */ 	}
/* 422 */ 
/* 423 */ 	// Don't do anything if ColorBox already exists.
/* 424 */ 	if ($.colorbox) {
/* 425 */ 		return;
/* 426 */ 	}
/* 427 */ 
/* 428 */ 	// Append the HTML when the DOM loads
/* 429 */ 	$(appendHTML);
/* 430 */ 
/* 431 */ 
/* 432 */ 	// ****************
/* 433 */ 	// PUBLIC FUNCTIONS
/* 434 */ 	// Usage format: $.fn.colorbox.close();
/* 435 */ 	// Usage from within an iframe: parent.$.fn.colorbox.close();
/* 436 */ 	// ****************
/* 437 */ 	
/* 438 */ 	publicMethod = $.fn[colorbox] = $[colorbox] = function (options, callback) {
/* 439 */ 		var $this = this;
/* 440 */ 		
/* 441 */ 		options = options || {};
/* 442 */ 		
/* 443 */ 		appendHTML();
/* 444 */ 
/* 445 */ 		if (addBindings()) {
/* 446 */ 			if (!$this[0]) {
/* 447 */ 				if ($this.selector) { // if a selector was given and it didn't match any elements, go ahead and exit.
/* 448 */ 					return $this;
/* 449 */ 				}
/* 450 */ 				// if no selector was given (ie. $.colorbox()), create a temporary element to work with

/* jquery.colorbox.js */

/* 451 */ 				$this = $('<a/>');
/* 452 */ 				options.open = true; // assume an immediate open
/* 453 */ 			}
/* 454 */ 			
/* 455 */ 			if (callback) {
/* 456 */ 				options.onComplete = callback;
/* 457 */ 			}
/* 458 */ 			
/* 459 */ 			$this.each(function () {
/* 460 */ 				$.data(this, colorbox, $.extend({}, $.data(this, colorbox) || defaults, options));
/* 461 */ 			}).addClass(boxElement);
/* 462 */ 			
/* 463 */ 			if (($.isFunction(options.open) && options.open.call($this)) || options.open) {
/* 464 */ 				launch($this[0]);
/* 465 */ 			}
/* 466 */ 		}
/* 467 */ 		
/* 468 */ 		return $this;
/* 469 */ 	};
/* 470 */ 
/* 471 */ 	publicMethod.position = function (speed, loadedCallback) {
/* 472 */ 		var 
/* 473 */ 		top = 0, 
/* 474 */ 		left = 0, 
/* 475 */ 		offset = $box.offset(),
/* 476 */ 		scrollTop, 
/* 477 */ 		scrollLeft;
/* 478 */ 		
/* 479 */ 		$window.unbind('resize.' + prefix);
/* 480 */ 
/* 481 */ 		// remove the modal so that it doesn't influence the document width/height        
/* 482 */ 		$box.css({top: -9e4, left: -9e4});
/* 483 */ 
/* 484 */ 		scrollTop = $window.scrollTop();
/* 485 */ 		scrollLeft = $window.scrollLeft();
/* 486 */ 
/* 487 */ 		if (settings.fixed && !isIE6) {
/* 488 */ 			offset.top -= scrollTop;
/* 489 */ 			offset.left -= scrollLeft;
/* 490 */ 			$box.css({position: 'fixed'});
/* 491 */ 		} else {
/* 492 */ 			top = scrollTop;
/* 493 */ 			left = scrollLeft;
/* 494 */ 			$box.css({position: 'absolute'});
/* 495 */ 		}
/* 496 */ 
/* 497 */ 		// keeps the top and left positions within the browser's viewport.
/* 498 */ 		if (settings.right !== false) {
/* 499 */ 			left += Math.max($window.width() - settings.w - loadedWidth - interfaceWidth - setSize(settings.right, 'x'), 0);
/* 500 */ 		} else if (settings.left !== false) {

/* jquery.colorbox.js */

/* 501 */ 			left += setSize(settings.left, 'x');
/* 502 */ 		} else {
/* 503 */ 			left += Math.round(Math.max($window.width() - settings.w - loadedWidth - interfaceWidth, 0) / 2);
/* 504 */ 		}
/* 505 */ 		
/* 506 */ 		if (settings.bottom !== false) {
/* 507 */ 			top += Math.max($window.height() - settings.h - loadedHeight - interfaceHeight - setSize(settings.bottom, 'y'), 0);
/* 508 */ 		} else if (settings.top !== false) {
/* 509 */ 			top += setSize(settings.top, 'y');
/* 510 */ 		} else {
/* 511 */ 			top += Math.round(Math.max($window.height() - settings.h - loadedHeight - interfaceHeight, 0) / 2);
/* 512 */ 		}
/* 513 */ 
/* 514 */ 		$box.css({top: offset.top, left: offset.left});
/* 515 */ 
/* 516 */ 		// setting the speed to 0 to reduce the delay between same-sized content.
/* 517 */ 		speed = ($box.width() === settings.w + loadedWidth && $box.height() === settings.h + loadedHeight) ? 0 : speed || 0;
/* 518 */ 		
/* 519 */ 		// this gives the wrapper plenty of breathing room so it's floated contents can move around smoothly,
/* 520 */ 		// but it has to be shrank down around the size of div#colorbox when it's done.  If not,
/* 521 */ 		// it can invoke an obscure IE bug when using iframes.
/* 522 */ 		$wrap[0].style.width = $wrap[0].style.height = "9999px";
/* 523 */ 		
/* 524 */ 		function modalDimensions(that) {
/* 525 */ 			$topBorder[0].style.width = $bottomBorder[0].style.width = $content[0].style.width = that.style.width;
/* 526 */ 			$content[0].style.height = $leftBorder[0].style.height = $rightBorder[0].style.height = that.style.height;
/* 527 */ 		}
/* 528 */ 		
/* 529 */ 		$box.dequeue().animate({width: settings.w + loadedWidth, height: settings.h + loadedHeight, top: top, left: left}, {
/* 530 */ 			duration: speed,
/* 531 */ 			complete: function () {
/* 532 */ 				modalDimensions(this);
/* 533 */ 				
/* 534 */ 				active = false;
/* 535 */ 				
/* 536 */ 				// shrink the wrapper down to exactly the size of colorbox to avoid a bug in IE's iframe implementation.
/* 537 */ 				$wrap[0].style.width = (settings.w + loadedWidth + interfaceWidth) + "px";
/* 538 */ 				$wrap[0].style.height = (settings.h + loadedHeight + interfaceHeight) + "px";
/* 539 */ 				
/* 540 */ 				if (settings.reposition) {
/* 541 */ 					setTimeout(function () {  // small delay before binding onresize due to an IE8 bug.
/* 542 */ 						$window.bind('resize.' + prefix, publicMethod.position);
/* 543 */ 					}, 1);
/* 544 */ 				}
/* 545 */ 
/* 546 */ 				if (loadedCallback) {
/* 547 */ 					loadedCallback();
/* 548 */ 				}
/* 549 */ 			},
/* 550 */ 			step: function () {

/* jquery.colorbox.js */

/* 551 */ 				modalDimensions(this);
/* 552 */ 			}
/* 553 */ 		});
/* 554 */ 	};
/* 555 */ 
/* 556 */ 	publicMethod.resize = function (options) {
/* 557 */ 		if (open) {
/* 558 */ 			options = options || {};
/* 559 */ 			
/* 560 */ 			if (options.width) {
/* 561 */ 				settings.w = setSize(options.width, 'x') - loadedWidth - interfaceWidth;
/* 562 */ 			}
/* 563 */ 			if (options.innerWidth) {
/* 564 */ 				settings.w = setSize(options.innerWidth, 'x');
/* 565 */ 			}
/* 566 */ 			$loaded.css({width: settings.w});
/* 567 */ 			
/* 568 */ 			if (options.height) {
/* 569 */ 				settings.h = setSize(options.height, 'y') - loadedHeight - interfaceHeight;
/* 570 */ 			}
/* 571 */ 			if (options.innerHeight) {
/* 572 */ 				settings.h = setSize(options.innerHeight, 'y');
/* 573 */ 			}
/* 574 */ 			if (!options.innerHeight && !options.height) {
/* 575 */ 				$loaded.css({height: "auto"});
/* 576 */ 				settings.h = $loaded.height();
/* 577 */ 			}
/* 578 */ 			$loaded.css({height: settings.h});
/* 579 */ 			
/* 580 */ 			publicMethod.position(settings.transition === "none" ? 0 : settings.speed);
/* 581 */ 		}
/* 582 */ 	};
/* 583 */ 
/* 584 */ 	publicMethod.prep = function (object) {
/* 585 */ 		if (!open) {
/* 586 */ 			return;
/* 587 */ 		}
/* 588 */ 		
/* 589 */ 		var callback, speed = settings.transition === "none" ? 0 : settings.speed;
/* 590 */ 		
/* 591 */ 		$loaded.remove();
/* 592 */ 		$loaded = $tag(div, 'LoadedContent').append(object);
/* 593 */ 		
/* 594 */ 		function getWidth() {
/* 595 */ 			settings.w = settings.w || $loaded.width();
/* 596 */ 			settings.w = settings.mw && settings.mw < settings.w ? settings.mw : settings.w;
/* 597 */ 			return settings.w;
/* 598 */ 		}
/* 599 */ 		function getHeight() {
/* 600 */ 			settings.h = settings.h || $loaded.height();

/* jquery.colorbox.js */

/* 601 */ 			settings.h = settings.mh && settings.mh < settings.h ? settings.mh : settings.h;
/* 602 */ 			return settings.h;
/* 603 */ 		}
/* 604 */ 		
/* 605 */ 		$loaded.hide()
/* 606 */ 		.appendTo($loadingBay.show())// content has to be appended to the DOM for accurate size calculations.
/* 607 */ 		.css({width: getWidth(), overflow: settings.scrolling ? 'auto' : 'hidden'})
/* 608 */ 		.css({height: getHeight()})// sets the height independently from the width in case the new width influences the value of height.
/* 609 */ 		.prependTo($content);
/* 610 */ 		
/* 611 */ 		$loadingBay.hide();
/* 612 */ 		
/* 613 */ 		// floating the IMG removes the bottom line-height and fixed a problem where IE miscalculates the width of the parent element as 100% of the document width.
/* 614 */ 		//$(photo).css({'float': 'none', marginLeft: 'auto', marginRight: 'auto'});
/* 615 */ 		
/* 616 */ 		$(photo).css({'float': 'none'});
/* 617 */ 		
/* 618 */ 		// Hides SELECT elements in IE6 because they would otherwise sit on top of the overlay.
/* 619 */ 		if (isIE6) {
/* 620 */ 			$('select').not($box.find('select')).filter(function () {
/* 621 */ 				return this.style.visibility !== 'hidden';
/* 622 */ 			}).css({'visibility': 'hidden'}).one(event_cleanup, function () {
/* 623 */ 				this.style.visibility = 'inherit';
/* 624 */ 			});
/* 625 */ 		}
/* 626 */ 		
/* 627 */ 		callback = function () {
/* 628 */ 			var preload, 
/* 629 */ 				i, 
/* 630 */ 				total = $related.length, 
/* 631 */ 				iframe, 
/* 632 */ 				frameBorder = 'frameBorder', 
/* 633 */ 				allowTransparency = 'allowTransparency', 
/* 634 */ 				complete, 
/* 635 */ 				src, 
/* 636 */ 				img, 
/* 637 */ 				data;
/* 638 */ 			
/* 639 */ 			if (!open) {
/* 640 */ 				return;
/* 641 */ 			}
/* 642 */ 			
/* 643 */ 			function removeFilter() {
/* 644 */ 				if (isIE) {
/* 645 */ 					$box[0].style.removeAttribute('filter');
/* 646 */ 				}
/* 647 */ 			}
/* 648 */ 			
/* 649 */ 			complete = function () {
/* 650 */ 				clearTimeout(loadingTimer);

/* jquery.colorbox.js */

/* 651 */ 				$loadingOverlay.hide();
/* 652 */ 				trigger(event_complete, settings.onComplete);
/* 653 */ 			};
/* 654 */ 			
/* 655 */ 			if (isIE) {
/* 656 */ 				//This fadeIn helps the bicubic resampling to kick-in.
/* 657 */ 				if (photo) {
/* 658 */ 					$loaded.fadeIn(100);
/* 659 */ 				}
/* 660 */ 			}
/* 661 */ 			
/* 662 */ 			$title.html(settings.title).add($loaded).show();
/* 663 */ 			
/* 664 */ 			if (total > 1) { // handle grouping
/* 665 */ 				if (typeof settings.current === "string") {
/* 666 */ 					$current.html(settings.current.replace('{current}', index + 1).replace('{total}', total)).show();
/* 667 */ 				}
/* 668 */ 				
/* 669 */ 				$next[(settings.loop || index < total - 1) ? "show" : "hide"]().html(settings.next);
/* 670 */ 				$prev[(settings.loop || index) ? "show" : "hide"]().html(settings.previous);
/* 671 */ 				
/* 672 */ 				if (settings.slideshow) {
/* 673 */ 					$slideshow.show();
/* 674 */ 				}
/* 675 */ 				
/* 676 */ 				// Preloads images within a rel group
/* 677 */ 				if (settings.preloading) {
/* 678 */ 					preload = [
/* 679 */ 						getIndex(-1),
/* 680 */ 						getIndex(1)
/* 681 */ 					];
/* 682 */ 					while (i = $related[preload.pop()]) {
/* 683 */ 						data = $.data(i, colorbox);
/* 684 */ 						
/* 685 */ 						if (data && data.href) {
/* 686 */ 							src = data.href;
/* 687 */ 							if ($.isFunction(src)) {
/* 688 */ 								src = src.call(i);
/* 689 */ 							}
/* 690 */ 						} else {
/* 691 */ 							src = i.href;
/* 692 */ 						}
/* 693 */ 
/* 694 */ 						if (isImage(src)) {
/* 695 */ 							img = new Image();
/* 696 */ 							img.src = src;
/* 697 */ 						}
/* 698 */ 					}
/* 699 */ 				}
/* 700 */ 			} else {

/* jquery.colorbox.js */

/* 701 */ 				$groupControls.hide();
/* 702 */ 			}
/* 703 */ 			
/* 704 */ 			if (settings.iframe) {
/* 705 */ 				iframe = $tag('iframe')[0];
/* 706 */ 				
/* 707 */ 				if (frameBorder in iframe) {
/* 708 */ 					iframe[frameBorder] = 0;
/* 709 */ 				}
/* 710 */ 				if (allowTransparency in iframe) {
/* 711 */ 					iframe[allowTransparency] = "true";
/* 712 */ 				}
/* 713 */ 				// give the iframe a unique name to prevent caching
/* 714 */ 				iframe.name = prefix + (+new Date());
/* 715 */ 				if (settings.fastIframe) {
/* 716 */ 					complete();
/* 717 */ 				} else {
/* 718 */ 					$(iframe).one('load', complete);
/* 719 */ 				}
/* 720 */ 				iframe.src = settings.href;
/* 721 */ 				if (!settings.scrolling) {
/* 722 */ 					iframe.scrolling = "no";
/* 723 */ 				}
/* 724 */ 				$(iframe).addClass(prefix + 'Iframe').appendTo($loaded).one(event_purge, function () {
/* 725 */ 					iframe.src = "//about:blank";
/* 726 */ 				});
/* 727 */ 			} else {
/* 728 */ 				complete();
/* 729 */ 			}
/* 730 */ 			
/* 731 */ 			if (settings.transition === 'fade') {
/* 732 */ 				$box.fadeTo(speed, 1, removeFilter);
/* 733 */ 			} else {
/* 734 */ 				removeFilter();
/* 735 */ 			}
/* 736 */ 		};
/* 737 */ 		
/* 738 */ 		if (settings.transition === 'fade') {
/* 739 */ 			$box.fadeTo(speed, 0, function () {
/* 740 */ 				publicMethod.position(0, callback);
/* 741 */ 			});
/* 742 */ 		} else {
/* 743 */ 			publicMethod.position(speed, callback);
/* 744 */ 		}
/* 745 */ 	};
/* 746 */ 
/* 747 */ 	publicMethod.load = function (launched) {
/* 748 */ 		var href, setResize, prep = publicMethod.prep;
/* 749 */ 		
/* 750 */ 		active = true;

/* jquery.colorbox.js */

/* 751 */ 		
/* 752 */ 		photo = false;
/* 753 */ 		
/* 754 */ 		element = $related[index];
/* 755 */ 		
/* 756 */ 		if (!launched) {
/* 757 */ 			makeSettings();
/* 758 */ 		}
/* 759 */ 		
/* 760 */ 		trigger(event_purge);
/* 761 */ 		
/* 762 */ 		trigger(event_load, settings.onLoad);
/* 763 */ 		
/* 764 */ 		settings.h = settings.height ?
/* 765 */ 				setSize(settings.height, 'y') - loadedHeight - interfaceHeight :
/* 766 */ 				settings.innerHeight && setSize(settings.innerHeight, 'y');
/* 767 */ 		
/* 768 */ 		settings.w = settings.width ?
/* 769 */ 				setSize(settings.width, 'x') - loadedWidth - interfaceWidth :
/* 770 */ 				settings.innerWidth && setSize(settings.innerWidth, 'x');
/* 771 */ 		
/* 772 */ 		// Sets the minimum dimensions for use in image scaling
/* 773 */ 		settings.mw = settings.w;
/* 774 */ 		settings.mh = settings.h;
/* 775 */ 		
/* 776 */ 		// Re-evaluate the minimum width and height based on maxWidth and maxHeight values.
/* 777 */ 		// If the width or height exceed the maxWidth or maxHeight, use the maximum values instead.
/* 778 */ 		if (settings.maxWidth) {
/* 779 */ 			settings.mw = setSize(settings.maxWidth, 'x') - loadedWidth - interfaceWidth;
/* 780 */ 			settings.mw = settings.w && settings.w < settings.mw ? settings.w : settings.mw;
/* 781 */ 		}
/* 782 */ 		if (settings.maxHeight) {
/* 783 */ 			settings.mh = setSize(settings.maxHeight, 'y') - loadedHeight - interfaceHeight;
/* 784 */ 			settings.mh = settings.h && settings.h < settings.mh ? settings.h : settings.mh;
/* 785 */ 		}
/* 786 */ 		
/* 787 */ 		href = settings.href;
/* 788 */ 		
/* 789 */ 		loadingTimer = setTimeout(function () {
/* 790 */ 			$loadingOverlay.show();
/* 791 */ 		}, 100);
/* 792 */ 		
/* 793 */ 		if (settings.inline) {
/* 794 */ 			// Inserts an empty placeholder where inline content is being pulled from.
/* 795 */ 			// An event is bound to put inline content back when ColorBox closes or loads new content.
/* 796 */ 			$tag(div).hide().insertBefore($(href)[0]).one(event_purge, function () {
/* 797 */ 				$(this).replaceWith($loaded.children());
/* 798 */ 			});
/* 799 */ 			prep($(href));
/* 800 */ 		} else if (settings.iframe) {

/* jquery.colorbox.js */

/* 801 */ 			// IFrame element won't be added to the DOM until it is ready to be displayed,
/* 802 */ 			// to avoid problems with DOM-ready JS that might be trying to run in that iframe.
/* 803 */ 			prep(" ");
/* 804 */ 		} else if (settings.html) {
/* 805 */ 			prep(settings.html);
/* 806 */ 		} else if (isImage(href)) {
/* 807 */ 			$(photo = new Image())
/* 808 */ 			.addClass(prefix + 'Photo')
/* 809 */ 			.error(function () {
/* 810 */ 				settings.title = false;
/* 811 */ 				prep($tag(div, 'Error').html(settings.imgError));
/* 812 */ 			})
/* 813 */ 			.load(function () {
/* 814 */ 				var percent;
/* 815 */ 				photo.onload = null; //stops animated gifs from firing the onload repeatedly.
/* 816 */ 				
/* 817 */ 				if (settings.scalePhotos) {
/* 818 */ 					setResize = function () {
/* 819 */ 						photo.height -= photo.height * percent;
/* 820 */ 						photo.width -= photo.width * percent;	
/* 821 */ 					};
/* 822 */ 					if (settings.mw && photo.width > settings.mw) {
/* 823 */ 						percent = (photo.width - settings.mw) / photo.width;
/* 824 */ 						setResize();
/* 825 */ 					}
/* 826 */ 					if (settings.mh && photo.height > settings.mh) {
/* 827 */ 						percent = (photo.height - settings.mh) / photo.height;
/* 828 */ 						setResize();
/* 829 */ 					}
/* 830 */ 				}
/* 831 */ 				
/* 832 */ 				if (settings.h) {
/* 833 */ 					photo.style.marginTop = Math.max(settings.h - photo.height, 0) / 2 + 'px';
/* 834 */ 				}
/* 835 */ 				
/* 836 */ 				if ($related[1] && (settings.loop || $related[index + 1])) {
/* 837 */ 					photo.style.cursor = 'pointer';
/* 838 */ 					photo.onclick = function () {
/* 839 */ 						publicMethod.next();
/* 840 */ 					};
/* 841 */ 				}
/* 842 */ 				
/* 843 */ 				if (isIE) {
/* 844 */ 					photo.style.msInterpolationMode = 'bicubic';
/* 845 */ 				}
/* 846 */ 				
/* 847 */ 				setTimeout(function () { // A pause because Chrome will sometimes report a 0 by 0 size otherwise.
/* 848 */ 					prep(photo);
/* 849 */ 				}, 1);
/* 850 */ 			});

/* jquery.colorbox.js */

/* 851 */ 			
/* 852 */ 			setTimeout(function () { // A pause because Opera 10.6+ will sometimes not run the onload function otherwise.
/* 853 */ 				photo.src = href;
/* 854 */ 			}, 1);
/* 855 */ 		} else if (href) {
/* 856 */ 			$loadingBay.load(href, settings.data, function (data, status, xhr) {
/* 857 */ 				prep(status === 'error' ? $tag(div, 'Error').html(settings.xhrError) : $(this).contents());
/* 858 */ 			});
/* 859 */ 		}
/* 860 */ 	};
/* 861 */ 		
/* 862 */ 	// Navigates to the next page/image in a set.
/* 863 */ 	publicMethod.next = function () {
/* 864 */ 		if (!active && $related[1] && (settings.loop || $related[index + 1])) {
/* 865 */ 			index = getIndex(1);
/* 866 */ 			publicMethod.load();
/* 867 */ 		}
/* 868 */ 	};
/* 869 */ 	
/* 870 */ 	publicMethod.prev = function () {
/* 871 */ 		if (!active && $related[1] && (settings.loop || index)) {
/* 872 */ 			index = getIndex(-1);
/* 873 */ 			publicMethod.load();
/* 874 */ 		}
/* 875 */ 	};
/* 876 */ 
/* 877 */ 	// Note: to use this within an iframe use the following format: parent.$.fn.colorbox.close();
/* 878 */ 	publicMethod.close = function () {
/* 879 */ 		if (open && !closing) {
/* 880 */ 			
/* 881 */ 			closing = true;
/* 882 */ 			
/* 883 */ 			open = false;
/* 884 */ 			
/* 885 */ 			trigger(event_cleanup, settings.onCleanup);
/* 886 */ 			
/* 887 */ 			$window.unbind('.' + prefix + ' .' + event_ie6);
/* 888 */ 			
/* 889 */ 			$overlay.fadeTo(200, 0);
/* 890 */ 			
/* 891 */ 			$box.stop().fadeTo(300, 0, function () {
/* 892 */ 				 
/* 893 */ 				$box.add($overlay).css({'opacity': 1, cursor: 'auto'}).hide();
/* 894 */ 				
/* 895 */ 				trigger(event_purge);
/* 896 */ 				
/* 897 */ 				$loaded.remove();
/* 898 */ 				
/* 899 */ 				setTimeout(function () {
/* 900 */ 					closing = false;

/* jquery.colorbox.js */

/* 901 */ 					trigger(event_closed, settings.onClosed);
/* 902 */ 				}, 1);
/* 903 */ 			});
/* 904 */ 		}
/* 905 */ 	};
/* 906 */ 
/* 907 */ 	// Removes changes ColorBox made to the document, but does not remove the plugin
/* 908 */ 	// from jQuery.
/* 909 */ 	publicMethod.remove = function () {
/* 910 */ 		$([]).add($box).add($overlay).remove();
/* 911 */ 		$box = null;
/* 912 */ 		$('.' + boxElement)
/* 913 */ 			.removeData(colorbox)
/* 914 */ 			.removeClass(boxElement)
/* 915 */ 			.die();
/* 916 */ 	};
/* 917 */ 
/* 918 */ 	// A method for fetching the current element ColorBox is referencing.
/* 919 */ 	// returns a jQuery object.
/* 920 */ 	publicMethod.element = function () {
/* 921 */ 		return $(element);
/* 922 */ 	};
/* 923 */ 
/* 924 */ 	publicMethod.settings = defaults;
/* 925 */ 
/* 926 */ }(jQuery, document, this));

;
/* jquery.aw-showcase.js */

/* 1    */ /*
/* 2    *|  
/* 3    *| 	Awkward Showcase - jQuery plugin 
/* 4    *| 	http://www.jquery.com
/* 5    *| 	http://www.awkwardgroup.com/sandbox/awkward-showcase-a-jquery-plugin
/* 6    *| 	http://demo.awkwardgroup.com/showcase
/* 7    *| 	Version: 1.1.1
/* 8    *| 
/* 9    *| 	Copyright (C) 2011 Awkward Group (http://www.awkwardgroup.com)
/* 10   *| 	Licensed under Attribution-ShareAlike 3.0 Unported
/* 11   *| 	http://creativecommons.org/licenses/by-sa/3.0/
/* 12   *| 
/* 13   *| 	Markup example for jQuery("#showcase").awShowcase();
/* 14   *|  
/* 15   *| 	<div id="showcase" class="showcase">
/* 16   *| 		<!-- Each child div in #showcase represents a slide -->
/* 17   *| 		<div class="showcase-slide">
/* 18   *| 			<!-- Put the slide content in a div with the class .showcase-content -->
/* 19   *| 			<div class="showcase-content">
/* 20   *| 				<!-- If the slide contains multiple elements you should wrap them in a div with the class .showcase-content-wrapper. 
/* 21   *| 				We usually wrap even if there is only one element, because it looks better. :-) -->
/* 22   *| 				<div class="showcase-content-wrapper">
/* 23   *| 					<img src="images/01.jpg" alt="01" />
/* 24   *| 				</div>
/* 25   *| 			</div>
/* 26   *| 			<!-- Put the caption content in a div with the class .showcase-caption -->
/* 27   *| 			<div class="showcase-caption">
/* 28   *| 				The Caption
/* 29   *| 			</div>
/* 30   *| 			<!-- Put the tooltips in a div with the class .showcase-tooltips. -->
/* 31   *| 			<div class="showcase-tooltips">
/* 32   *| 				<!-- Each anchor in .showcase-tooltips represents a tooltip. The coords attribute represents the position of the tooltip. -->
/* 33   *| 				<a href="http://www.awkward.se" coords="634,130">
/* 34   *| 					<!-- The content of the anchor-tag is displayed in the tooltip. -->
/* 35   *| 					This is a tooltip that displays the anchor html in a nice way.
/* 36   *| 				</a>
/* 37   *| 				<a href="http://www.awkward.se" coords="356, 172">
/* 38   *| 					<!-- You can add multiple elements to the anchor-tag which are display in the tooltip. -->
/* 39   *| 					<img src="images/glasses.png" />
/* 40   *| 					<span style="display: block; font-weight: bold; padding: 3px 0 3px 0; text-align: center;">
/* 41   *| 						White Glasses: 500$
/* 42   *| 					</span>
/* 43   *| 				</a>
/* 44   *| 			</div>
/* 45   *| 		</div>
/* 46   *| 		<div class="showcase-slide">
/* 47   *| 			<div class="showcase-content">
/* 48   *| 				<div class="showcase-content-wrapper">
/* 49   *| 					Content...
/* 50   *| 				</div>

/* jquery.aw-showcase.js */

/* 51   *| 			</div>
/* 52   *| 		</div>
/* 53   *| 	</div>
/* 54   *| 
/* 55   *| */
/* 56   */ 
/* 57   */ (function(jQuery) {
/* 58   */ 
/* 59   */ 	jQuery.fn.awShowcase = function(options) {
/* 60   */ 	
/* 61   */ 		// Default configuration properties
/* 62   */ 		var defaults =
/* 63   */ 		{
/* 64   */ 			content_width:			700,
/* 65   */ 			content_height:			470,
/* 66   */ 			fit_to_parent:			false,
/* 67   */ 			auto:					false,
/* 68   */ 			interval:				3000,
/* 69   */ 			continuous:				false,
/* 70   */ 			loading:				true,
/* 71   */ 			tooltip_width:			200,
/* 72   */ 			tooltip_icon_width:		32,
/* 73   */ 			tooltip_icon_height:	32,
/* 74   */ 			tooltip_offsetx:		18,
/* 75   */ 			tooltip_offsety:		0,
/* 76   */ 			arrows:					true,
/* 77   */ 			buttons:				true,
/* 78   */ 			btn_numbers:			false,
/* 79   */ 			keybord_keys:			false,
/* 80   */ 			mousetrace:				false, /* Trace x and y coordinates for the mouse */
/* 81   */ 			pauseonover:			true,
/* 82   */ 			stoponclick:			true,
/* 83   */ 			transition:				'hslide', /* hslide / vslide / fade */
/* 84   */ 			transition_delay:		300,
/* 85   */ 			transition_speed:		500,
/* 86   */ 			show_caption:			'onload', /* onload / onhover / show */
/* 87   */ 			thumbnails:				false,
/* 88   */ 			thumbnails_position:	'outside-last', /* outside-last / outside-first / inside-last / inside-first */
/* 89   */ 			thumbnails_direction:	'vertical', /* vertical / horizontal */
/* 90   */ 			thumbnails_slidex:		0, /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
/* 91   */ 			dynamic_height:			false, /* For dynamic height to work in webkit you need to set the width and height of images in the source. Usually works to only set the dimension of the first slide in the showcase. */
/* 92   */ 			speed_change:			false, /* This prevents user from swithing more then one slide at once */
/* 93   */ 			viewline:				false, /* If set to true content_width, thumbnails, transition and dynamic_height will be disabled. As for dynamic height you need to set the width and height of images in the source. */
/* 94   */ 			fullscreen_width_x:		15,
/* 95   */ 			custom_function:		null
/* 96   */ 		};
/* 97   */ 
/* 98   */ 		// *****************
/* 99   */ 		// SET UP THE PLUGIN
/* 100  */ 		// *****************

/* jquery.aw-showcase.js */

/* 101  */ 		
/* 102  */ 		// Declare and set up some important variables
/* 103  */ 		options = jQuery.extend(defaults, options);
/* 104  */ 		var current_id = 0;
/* 105  */ 		var previous_id = 0;
/* 106  */ 		var break_loop = false;
/* 107  */ 		var pause_loop = false;
/* 108  */ 		var myInterval = null;
/* 109  */ 		var showcase = jQuery(this);
/* 110  */ 		var showcase_width = options.content_width;
/* 111  */ 		var animating = false;
/* 112  */ 		// Viewline specific variables
/* 113  */ 		var content_viewline_width = 10000;
/* 114  */ 		var animation_distance = 0;
/* 115  */ 		var old_animation_distance = 0;
/* 116  */ 		var remaining_width = 0;
/* 117  */ 		
/* 118  */ 		// Set up the content wrapper
/* 119  */ 		var content_container = jQuery(document.createElement('div'))
/* 120  */ 			.css('overflow', 'hidden')
/* 121  */ 			.css('position', 'relative')
/* 122  */ 			.addClass('showcase-content-container')
/* 123  */ 			.prependTo(showcase);
/* 124  */ 			
/* 125  */ 		// Set up the showcase for hundred percent width
/* 126  */ 		if (options.fit_to_parent)
/* 127  */ 		{
/* 128  */ 			showcase_width = jQuery(showcase).width() + options.fullscreen_width_x;
/* 129  */ 		}
/* 130  */ 		
/* 131  */ 		// Set up the showcase for Viewline Mayhem
/* 132  */ 		if (options.viewline)
/* 133  */ 		{
/* 134  */ 			options.thumbnails = false;
/* 135  */ 			options.dynamic_height = false;
/* 136  */ 			content_container.css('width', content_viewline_width);
/* 137  */ 			showcase.css('overflow', 'hidden');
/* 138  */ 			$('.showcase-arrow-previous').hide();
/* 139  */ 		}
/* 140  */ 		
/* 141  */ 		// Set up content and create the content and thumbnail array
/* 142  */ 		var contentArray = [];
/* 143  */ 		var thumbnailArray = [];
/* 144  */ 		var content_count = 0;
/* 145  */ 		showcase.children('.showcase-slide').each(function()
/* 146  */ 		{
/* 147  */ 			// Get content
/* 148  */ 			var object = jQuery(this);
/* 149  */ 			content_count++;
/* 150  */ 	

/* jquery.aw-showcase.js */

/* 151  */ 			// If thumbnails are activated
/* 152  */ 			if (options.thumbnails)
/* 153  */ 			{
/* 154  */ 				// Get thumbnail and put in array
/* 155  */ 				var thumb = object.find('.showcase-thumbnail');
/* 156  */ 				thumbnailArray.push(thumb);
/* 157  */ 				thumb.remove();
/* 158  */ 			}
/* 159  */ 			
/* 160  */ 			// Set content width and height
/* 161  */ 			var object_width = object.find('.showcase-content').children().width();
/* 162  */ 			var object_height = object.find('.showcase-content').children().height();
/* 163  */ 			
/* 164  */ 			// Add content html in array and remove it from DOM
/* 165  */ 			contentArray.push(object.html());
/* 166  */ 			object.remove();
/* 167  */ 			
/* 168  */ 			// Get correct content
/* 169  */ 			var new_object = getContent(content_count-1);
/* 170  */ 			if (options.viewline || content_count === 1) { content_container.append(new_object); } 
/* 171  */ 			
/* 172  */ 			// Viewline setup
/* 173  */ 			if (options.viewline)
/* 174  */ 			{
/* 175  */ 				new_object.css('position', 'relative');
/* 176  */ 				new_object.css('float', 'left');
/* 177  */ 				new_object.css('width', object_width);
/* 178  */ 			}
/* 179  */ 			
/* 180  */ 			// Set content and content container load height
/* 181  */ 			if (options.dynamic_height)
/* 182  */ 			{
/* 183  */ 				new_object.css('height', object_height);
/* 184  */ 				if (content_count === 1) { content_container.css('height', object_height); }
/* 185  */ 			}
/* 186  */ 			else
/* 187  */ 			{
/* 188  */ 				new_object.css('height', options.content_height);
/* 189  */ 				if (content_count === 1) { content_container.css('height', options.content_height); }
/* 190  */ 			}
/* 191  */ 			
/* 192  */ 			if (options.viewline || content_count === 1)
/* 193  */ 			{
/* 194  */ 				displayAnchors(new_object);
/* 195  */ 				displayCaption(new_object);
/* 196  */ 				
/* 197  */ 				if (options.show_caption === 'show')
/* 198  */ 				{
/* 199  */ 					jQuery(new_object).find('.showcase-caption').show();
/* 200  */ 				}

/* jquery.aw-showcase.js */

/* 201  */ 			}
/* 202  */ 		});
/* 203  */ 		
/* 204  */ 		// Declare and set up the thumbnail wrapper
/* 205  */ 		var thumb_wrapper;
/* 206  */ 		var thumbnailStretch = 0;
/* 207  */ 		var thumbnailsPerPage = 0;
/* 208  */ 		if (options.thumbnails)
/* 209  */ 		{
/* 210  */ 			// Create wrapper
/* 211  */ 			thumb_container = jQuery('<div />');
/* 212  */ 			thumb_restriction = jQuery('<div />');
/* 213  */ 			thumb_wrapper = jQuery('<div />');
/* 214  */ 			
/* 215  */ 			// Add content to thumbnail wrapper
/* 216  */ 			for (i = thumbnailArray.length-1; i >= 0; --i)
/* 217  */ 			{
/* 218  */ 				var thumbnail = jQuery(thumbnailArray[i]).css({'overflow' : 'hidden'});
/* 219  */ 				thumbnail.attr('id', 'showcase-thumbnail-' + i);
/* 220  */ 				thumbnail.addClass((i === 0) ? 'active' : '');
/* 221  */ 				thumbnail.click(function(a, b)
/* 222  */ 				{
/* 223  */ 					// This function is used to extract the correct i value on click
/* 224  */ 					return function()
/* 225  */ 					{
/* 226  */ 						// Disable auto change on click
/* 227  */ 						if (myInterval) { pause_loop = true; clearInterval(myInterval); }
/* 228  */ 						changeContent(a, b);
/* 229  */ 					};
/* 230  */ 				}(i, ''));	
/* 231  */ 				thumb_wrapper.prepend(thumbnail);
/* 232  */ 			}
/* 233  */ 			
/* 234  */ 			// Style and position thumbnail container and content wrapper
/* 235  */ 			// + insert thumbnail container
/* 236  */ 			if (options.thumbnails_position === 'outside-first' || options.thumbnails_position === 'outside-last')
/* 237  */ 			{
/* 238  */ 				if (options.thumbnails_direction !== 'horizontal')
/* 239  */ 				{
/* 240  */ 					/* outside & vertical */
/* 241  */ 					content_container.css('float', 'left');
/* 242  */ 					content_container.css('width', options.content_width);
/* 243  */ 					thumb_container.css('float', 'left');
/* 244  */ 					thumb_container.css('height', options.content_height);
/* 245  */ 				}
/* 246  */ 				else
/* 247  */ 				{
/* 248  */ 					/* outside & horizontal */
/* 249  */ 					jQuery(thumb_wrapper).find('.showcase-thumbnail').css('float', 'left');
/* 250  */ 					//jQuery(thumb_wrapper).append(jQuery('<div />').addClass('clear'));

/* jquery.aw-showcase.js */

/* 251  */ 				}
/* 252  */ 				
/* 253  */ 				if (options.thumbnails_position === 'outside-last')
/* 254  */ 				{
/* 255  */ 					/* outside-last */
/* 256  */ 					showcase.append(thumb_container);
/* 257  */ 					if (options.thumbnails_direction !== 'horizontal') { showcase.append(jQuery('<div />').addClass('clear')); }
/* 258  */ 				}
/* 259  */ 				else
/* 260  */ 				{
/* 261  */ 					/* outside-first */
/* 262  */ 					showcase.prepend(thumb_container);
/* 263  */ 					if (options.thumbnails_direction !== 'horizontal') { showcase.append(jQuery('<div />').addClass('clear')); }
/* 264  */ 				}
/* 265  */ 			}
/* 266  */ 			else
/* 267  */ 			{
/* 268  */ 				thumb_container.css({'position' : 'absolute', 'z-index' : 20});
/* 269  */ 				if (options.thumbnails_direction === 'horizontal') 
/* 270  */ 				{
/* 271  */ 					/* inside & horizontal */
/* 272  */ 					thumb_container.css({'left' : 0, 'right' : 0});
/* 273  */ 					jQuery(thumb_wrapper).find('.showcase-thumbnail').css('float', 'left');
/* 274  */ 					jQuery(thumb_wrapper).append(jQuery('<div />').addClass('clear'));
/* 275  */ 					
/* 276  */ 					/* inside first */
/* 277  */ 					if (options.thumbnails_position === 'inside-first') { thumb_container.css('top', 0); }
/* 278  */ 					/* inside last */
/* 279  */ 					else { thumb_container.css('bottom', 0); }
/* 280  */ 				}
/* 281  */ 				else 
/* 282  */ 				{
/* 283  */ 					/* inside & vertical */
/* 284  */ 					thumb_container.css({'top' : 0, 'bottom' : 0});
/* 285  */ 					/* inside first */
/* 286  */ 					if (options.thumbnails_position === 'inside-first') { thumb_container.css('left', 0); }
/* 287  */ 					/* inside last */
/* 288  */ 					else { thumb_container.css('right', 0); }
/* 289  */ 				}
/* 290  */ 				content_container.prepend(thumb_container);
/* 291  */ 			}
/* 292  */ 			
/* 293  */ 			// Add class and style to thumbnail container
/* 294  */ 			thumb_container.addClass('showcase-thumbnail-container');
/* 295  */ 			thumb_container.css('overflow', 'hidden');
/* 296  */ 			
/* 297  */ 			// Add class and style to thumbnail restriction
/* 298  */ 			thumb_restriction.addClass('showcase-thumbnail-restriction');
/* 299  */ 			thumb_restriction.css({'overflow' : 'hidden', 'position' : 'relative'});
/* 300  */ 			if (options.thumbnails_direction === 'horizontal') { thumb_restriction.css({'float' : 'left'}); }

/* jquery.aw-showcase.js */

/* 301  */ 			
/* 302  */ 			// Add class and style to thumbnail wrapper 
/* 303  */ 			thumb_wrapper.addClass('showcase-thumbnail-wrapper');
/* 304  */ 			if (options.thumbnails_direction === 'horizontal') { thumb_wrapper.addClass('showcase-thumbnail-wrapper-horizontal'); }
/* 305  */ 			else { thumb_wrapper.addClass('showcase-thumbnail-wrapper-vertical'); }
/* 306  */ 			thumb_wrapper.css('position', 'relative');
/* 307  */ 			
/* 308  */ 			// Append wrapper and restriction
/* 309  */ 			thumb_restriction.append(thumb_wrapper);
/* 310  */ 			thumb_container.append(thumb_restriction);
/* 311  */ 			
/* 312  */ 			// Add backward button
/* 313  */ 			var buttonBackward = jQuery('<div class="showcase-thumbnail-button-backward" />');
/* 314  */ 			if (options.thumbnails_direction !== 'horizontal')
/* 315  */ 			{
/* 316  */ 				buttonBackward.html('<span class="showcase-thumbnail-vertical"><span>Up</span></span>');
/* 317  */ 			}
/* 318  */ 			else
/* 319  */ 			{
/* 320  */ 				buttonBackward.css({'float' : 'left'});
/* 321  */ 				buttonBackward.html('<span class="showcase-thumbnail-horizontal"><span>Left</span></span>');
/* 322  */ 			}
/* 323  */ 			buttonBackward.click(function() { slideThumbnailWrapper('backward', false, true); });
/* 324  */ 			thumb_container.prepend(buttonBackward);
/* 325  */ 			
/* 326  */ 			// Add forward button
/* 327  */ 			var buttonForward = jQuery('<div class="showcase-thumbnail-button-forward" />');
/* 328  */ 			if (options.thumbnails_direction !== 'horizontal')
/* 329  */ 			{
/* 330  */ 				buttonForward.html('<span class="showcase-thumbnail-vertical"><span>Down</span></span>');
/* 331  */ 			}
/* 332  */ 			else
/* 333  */ 			{
/* 334  */ 				buttonForward.css({'float' : 'left'});
/* 335  */ 				buttonForward.html('<span class="showcase-thumbnail-horizontal"><span>Right</span></span>');
/* 336  */ 			}
/* 337  */ 			buttonForward.click(function() { slideThumbnailWrapper('forward', false, true); });
/* 338  */ 			thumb_container.append(buttonForward);
/* 339  */ 			
/* 340  */ 			// Set the number of thumbnails per page.
/* 341  */ 			var thumbnailVisibleStretch = 0;
/* 342  */ 			if (options.thumbnails_direction !== 'horizontal')
/* 343  */ 			{
/* 344  */ 				thumbnailVisibleStretch = getElementHeight(thumb_wrapper, false);
/* 345  */ 				thumbnailVisibleStretch += (getElementHeight(buttonBackward)) + (getElementHeight(buttonForward));
/* 346  */ 				while (thumbnailVisibleStretch < options.content_height)
/* 347  */ 				{
/* 348  */ 					thumbnailVisibleStretch += getElementHeight(jQuery(thumbnailArray[0]));
/* 349  */ 					thumbnailsPerPage++;
/* 350  */ 				}

/* jquery.aw-showcase.js */

/* 351  */ 			}
/* 352  */ 			else
/* 353  */ 			{
/* 354  */ 				thumbnailVisibleStretch = getElementWidth(thumb_wrapper, false);
/* 355  */ 				thumbnailVisibleStretch += (getElementWidth(buttonBackward)) + (getElementWidth(buttonForward));
/* 356  */ 				
/* 357  */ 				while (thumbnailVisibleStretch < showcase_width)
/* 358  */ 				{
/* 359  */ 					thumbnailVisibleStretch += getElementWidth(jQuery(thumbnailArray[0]));
/* 360  */ 					thumbnailsPerPage++;
/* 361  */ 				}
/* 362  */ 			}
/* 363  */ 			
/* 364  */ 			// Hide buttons if they're not necessary
/* 365  */ 			if (thumbnailsPerPage+1 > thumbnailArray.length)
/* 366  */ 			{
/* 367  */ 				if (options.thumbnails_direction !== 'horizontal')
/* 368  */ 				{
/* 369  */ 					thumb_restriction.css('margin-top', getElementHeight(buttonBackward));
/* 370  */ 				}
/* 371  */ 				else
/* 372  */ 				{
/* 373  */ 					thumb_restriction.css('margin-left', getElementWidth(buttonBackward));
/* 374  */ 				}
/* 375  */ 				buttonBackward.hide();
/* 376  */ 				buttonForward.hide();
/* 377  */ 			}
/* 378  */ 			
/* 379  */ 			// Set thumbnail restriction height or width
/* 380  */ 			if (options.thumbnails_direction !== 'horizontal')
/* 381  */ 			{
/* 382  */ 				var buttonsHeight = (getElementHeight(buttonBackward)) + (getElementHeight(buttonForward));
/* 383  */ 				thumb_restriction.css('height', options.content_height - buttonsHeight);
/* 384  */ 			}
/* 385  */ 			else
/* 386  */ 			{
/* 387  */ 				var buttonsWidth = (getElementWidth(buttonBackward)) + (getElementWidth(buttonForward));
/* 388  */ 				thumb_restriction.css('width',  showcase_width-buttonsWidth);
/* 389  */ 			}
/* 390  */ 			
/* 391  */ 			// Set thumbnail wrapper width
/* 392  */ 			if (options.thumbnails_direction === 'horizontal')
/* 393  */ 			{
/* 394  */ 				jQuery('.showcase-thumbnail').each(function() { thumbnailStretch += getElementWidth(jQuery(this)); });
/* 395  */ 				thumb_wrapper.css('width', thumbnailStretch);
/* 396  */ 			}
/* 397  */ 			else { jQuery('.showcase-thumbnail').each(function() { thumbnailStretch += getElementHeight(jQuery(this)); }); }
/* 398  */ 		}
/* 399  */ 		
/* 400  */ 		// Set showcase width and height

/* jquery.aw-showcase.js */

/* 401  */ 		if (options.thumbnails && options.thumbnails_position.indexOf("outside") !== -1 && options.thumbnails_direction !== 'horizontal' && !options.viewline)
/* 402  */ 		{
/* 403  */ 			showcase.css('width', showcase_width + getElementWidth(thumb_wrapper, true, false));
/* 404  */ 		}
/* 405  */ 		else if  (!options.fit_to_parent) { showcase.css('width', showcase_width); }
/* 406  */ 		
/* 407  */ 		// Turn on/off auto slide
/* 408  */ 		if (content_count > 1 && options.auto) { myInterval = window.setInterval(autoChange, options.interval); }
/* 409  */ 		
/* 410  */ 		// Pause auto on mouse over
/* 411  */ 		if (options.auto && options.pauseonover)
/* 412  */ 		{
/* 413  */ 			showcase.mouseenter(function() { break_loop = true; clearInterval(myInterval); });
/* 414  */ 			showcase.mouseleave(function()
/* 415  */ 			{
/* 416  */ 				if (!pause_loop)
/* 417  */ 				{
/* 418  */ 					break_loop = false; myInterval = window.setInterval(autoChange, options.interval);
/* 419  */ 				}
/* 420  */ 			});
/* 421  */ 		}
/* 422  */ 		
/* 423  */ 		// Adding navigation arrows
/* 424  */ 		if (options.arrows && content_count > 1)
/* 425  */ 		{
/* 426  */ 			// Left arrow
/* 427  */ 			jQuery(document.createElement('div'))
/* 428  */ 				.addClass('showcase-arrow-previous')
/* 429  */ 				.prependTo(showcase)
/* 430  */ 				.click(function() {
/* 431  */ 					// Disable auto change on click
/* 432  */ 					if (myInterval)
/* 433  */ 					{
/* 434  */ 						if (options.stoponclick) { pause_loop = true; }
/* 435  */ 						clearInterval(myInterval);
/* 436  */ 					}
/* 437  */ 					changeContent((current_id === 0) ? content_count-1 : parseInt(current_id)-1, 'previous');
/* 438  */ 				});
/* 439  */ 			// Right arrow
/* 440  */ 			jQuery(document.createElement('div'))
/* 441  */ 				.addClass('showcase-arrow-next')
/* 442  */ 				.prependTo(showcase)
/* 443  */ 				.click(function() {
/* 444  */ 					// Disable auto change on click
/* 445  */ 					if (myInterval)
/* 446  */ 					{
/* 447  */ 						if (options.stoponclick) { pause_loop = true; }
/* 448  */ 						clearInterval(myInterval);
/* 449  */ 					}
/* 450  */ 					changeContent(current_id+1, 'next');

/* jquery.aw-showcase.js */

/* 451  */ 				});
/* 452  */ 				
/* 453  */ 			if (options.viewline) { $('.showcase-arrow-previous').hide(); }
/* 454  */ 		}
/* 455  */ 		
/* 456  */ 		// Adding navigation buttons
/* 457  */ 		if (options.buttons && content_count > 1)
/* 458  */ 		{
/* 459  */ 			// Create button wrapper
/* 460  */ 			jQuery(document.createElement('div'))
/* 461  */ 				.css('clear', 'both')
/* 462  */ 				.addClass('showcase-button-wrapper')
/* 463  */ 				.appendTo(showcase);
/* 464  */ 			i = 0;
/* 465  */ 			// Add button for each content
/* 466  */ 			while (i < content_count)
/* 467  */ 			{
/* 468  */ 				jQuery(document.createElement('span'))
/* 469  */ 					.attr('id', 'showcase-navigation-button-' + i)
/* 470  */ 					.addClass((i === 0) ? 'active' : '')
/* 471  */ 					// Add numbers or unicode
/* 472  */ 					.html((options.btn_numbers) ? parseInt(i)+1 : '&#9679;')
/* 473  */ 					.click(function(a, b)
/* 474  */ 					{
/* 475  */ 						// This function is used to extract the correct i value on click
/* 476  */ 						return function()
/* 477  */ 						{
/* 478  */ 							// Disable auto change on click
/* 479  */ 							if (myInterval)
/* 480  */ 							{
/* 481  */ 								if (options.stoponclick) { pause_loop = true; }
/* 482  */ 								clearInterval(myInterval);
/* 483  */ 							}
/* 484  */ 							changeContent(a, b);
/* 485  */ 						};
/* 486  */ 					}(i, ''))
/* 487  */ 					.appendTo(jQuery(showcase).find('.showcase-button-wrapper'));
/* 488  */ 				i++;
/* 489  */ 			}
/* 490  */ 		}
/* 491  */ 		
/* 492  */ 		// Activating the keybord arrow keys
/* 493  */ 		if (options.keybord_keys)
/* 494  */ 		{
/* 495  */ 			jQuery(document).keydown(function(e)
/* 496  */ 			{
/* 497  */ 				// Disable auto change on click
/* 498  */ 				if (options.stoponclick) { pause_loop = true; }
/* 499  */ 				if (myInterval) clearInterval(myInterval);
/* 500  */ 				

/* jquery.aw-showcase.js */

/* 501  */ 				// Left arrow
/* 502  */ 				if (e.keyCode === 37) {
/* 503  */ 					changeContent((current_id === 0) ? content_count-1 : parseInt(current_id)-1, 'previous');
/* 504  */ 				}
/* 505  */ 				
/* 506  */ 				// Right arrow
/* 507  */ 				if (e.keyCode === 39) {
/* 508  */ 					changeContent((current_id === content_count-1) ? 0 : parseInt(current_id)+1, 'next');
/* 509  */ 				}
/* 510  */ 			});
/* 511  */ 		}
/* 512  */ 		
/* 513  */ 		
/* 514  */ 		// *************
/* 515  */ 		// THE FUNCTIONS
/* 516  */ 		// *************
/* 517  */ 		
/* 518  */ 		// Returns the specified content (by array id)
/* 519  */ 		function getContent(id) {
/* 520  */ 		
/* 521  */ 			var new_content = jQuery(document.createElement('div'))
/* 522  */ 				.attr('id', 'showcase-content-' + id)
/* 523  */ 				.css('overflow', 'hidden')
/* 524  */ 				.css('position', 'absolute')
/* 525  */ 				.addClass('showcase-content')
/* 526  */ 				.html(contentArray[id]);
/* 527  */ 			
/* 528  */ 			// Set content width
/* 529  */ 			if (!options.viewline) { new_content.css('width', options.content_width); }
/* 530  */ 			
/* 531  */ 			// Position the content wrapper if showcase width is set to hundred percent
/* 532  */ 			if (options.fit_to_parent && !options.viewline) { new_content.css('left', (showcase_width/2)-options.content_width/2); }
/* 533  */ 			
/* 534  */ 			return new_content;
/* 535  */ 		}
/* 536  */ 		
/* 537  */ 		// Function that runs when content is set to change automatically
/* 538  */ 		function autoChange() {
/* 539  */ 		
/* 540  */ 			// Set next content id
/* 541  */ 			var nextID = parseInt(current_id)+1;
/* 542  */ 			// If the next id is outside the array and continuous is set to true set the id to 0
/* 543  */ 			if (nextID === content_count && options.continuous) { nextID = 0; }
/* 544  */ 			// If continuous is set to false break the auto change
/* 545  */ 			else if (nextID === content_count && !options.continuous) { break_loop = true; clearInterval(myInterval); }
/* 546  */ 			// Don't change the content if the auto change is broken
/* 547  */ 			if (!break_loop) { changeContent(nextID, 'next'); }
/* 548  */ 		}
/* 549  */ 		
/* 550  */ 		// Changes the content (no explanation/comments needed :)

/* jquery.aw-showcase.js */

/* 551  */ 		function changeContent(id, direction) {
/* 552  */ 			
/* 553  */ 			// If the next content isn't the current content
/* 554  */ 			if (current_id !== id && !animating) {
/* 555  */ 				
/* 556  */ 				var obj;
/* 557  */ 				var obj2;
/* 558  */ 				var delay = 0;
/* 559  */ 				var i;
/* 560  */ 				
/* 561  */ 				// Set left/right position if showcase is set to full width
/* 562  */ 				var lrpos = (options.fit_to_parent) ? (showcase_width/2)-(options.content_width/2) : 0;
/* 563  */ 				
/* 564  */ 				// If we want to display the next content
/* 565  */ 				if ((id > current_id && direction !== 'previous') || direction === 'next') {
/* 566  */ 				
/* 567  */ 					if (options.viewline) {
/* 568  */ 						
/* 569  */ 						if (current_id < content_count-1) {
/* 570  */ 						
/* 571  */ 							// Prevent uggly transitions
/* 572  */ 							if (!options.speed_change) { animating = true; }
/* 573  */ 						
/* 574  */ 							// BugFix
/* 575  */ 							updateContentViewlineWidth();
/* 576  */ 								
/* 577  */ 							// Pause Autoplay
/* 578  */ 							if (options.pauseonover) { window.clearInterval(myInterval); }
/* 579  */ 							
/* 580  */ 							// First we check if the content will fill the screen after animation.
/* 581  */ 							remaining_width = 0;
/* 582  */ 							
/* 583  */ 							// Loop trough the content array to find out 
/* 584  */ 							// the total width for the content that remains.
/* 585  */ 							for (i=current_id+1, len=content_count; i<len; ++i)
/* 586  */ 							{
/* 587  */ 								obj = addedContentArray[i];
/* 588  */ 								remaining_width += obj.find('.showcase-content').children().width();
/* 589  */ 							}
/* 590  */ 							
/* 591  */ 							// If the remaining width is wider than the browser window.
/* 592  */ 							if (remaining_width > showcase_width)
/* 593  */ 							{
/* 594  */ 								old_animation_distance = animation_distance;
/* 595  */ 								animation_distance -= addedContentArray[current_id].find('.showcase-content').children().width();
/* 596  */ 							}
/* 597  */ 							else if ($('.showcase-arrow-next').is(':visible')) 
/* 598  */ 							{
/* 599  */ 								old_animation_distance = animation_distance;
/* 600  */ 								animation_distance = -(content_viewline_width - (remaining_width + (showcase_width - remaining_width)));

/* jquery.aw-showcase.js */

/* 601  */ 								$('.showcase-arrow-next').fadeOut(300);
/* 602  */ 							}
/* 603  */ 							
/* 604  */ 							content_container.animate({left: animation_distance + 'px'}, options.transition_speed, function() { animating = false; });
/* 605  */ 							
/* 606  */ 							// Change current content id (if content is finished)
/* 607  */ 							if ($('.showcase-arrow-next').is(':visible')) { current_id++; }
/* 608  */ 							
/* 609  */ 							$('.showcase-arrow-previous').fadeIn(300);
/* 610  */ 						}
/* 611  */ 					}
/* 612  */ 					else {
/* 613  */ 					
/* 614  */ 						// Prevent uggly transitions
/* 615  */ 						if (!options.speed_change) { animating = true; }
/* 616  */ 						
/* 617  */ 						// Get current and next content element
/* 618  */ 						obj = jQuery(showcase).find('#showcase-content-' + parseInt(current_id));
/* 619  */ 						obj2 = getContent(id);
/* 620  */ 						
/* 621  */ 						// Append next element and set height
/* 622  */ 						content_container.append(obj2);
/* 623  */ 						if (options.dynamic_height) { obj2.css('height', obj2.find('.showcase-content').children().height()); }
/* 624  */ 						else { obj2.css('height', options.content_height); }
/* 625  */ 						
/* 626  */ 						// Animate height first if next content is not as high
/* 627  */ 						if (obj.find('.showcase-content').children().height() > obj2.find('.showcase-content').children().height() && options.dynamic_height) {
/* 628  */ 						
/* 629  */ 							content_container.stop(true, true).animate({ height: obj2.find('.showcase-content').children().height() }, 200);
/* 630  */ 							delay = 100;
/* 631  */ 						}
/* 632  */ 						
/* 633  */ 						// Animate current element
/* 634  */ 						if (options.transition === 'hslide') {
/* 635  */ 						
/* 636  */ 							jQuery(obj).delay(delay).animate({ left: -(options.content_width) }, options.transition_speed+options.transition_delay, function() { obj.remove(); });
/* 637  */ 						}
/* 638  */ 						else if (options.transition === 'vslide') {
/* 639  */ 						
/* 640  */ 							jQuery(obj).delay(delay).animate({ top: -(options.content_height) }, options.transition_speed+options.transition_delay, function() { obj.remove(); });
/* 641  */ 						}
/* 642  */ 						else {
/* 643  */ 						
/* 644  */ 							jQuery(obj).delay(delay).fadeOut(options.transition_speed, function() { obj.remove(); });
/* 645  */ 						}
/* 646  */ 						
/* 647  */ 						// This will hide them, not display them :)
/* 648  */ 						displayAnchors(obj, true);
/* 649  */ 						displayCaption(obj, true);
/* 650  */ 						

/* jquery.aw-showcase.js */

/* 651  */ 						// Animate next element
/* 652  */ 						if (options.transition === 'hslide') {
/* 653  */ 						
/* 654  */ 							obj2.css('left', showcase_width);
/* 655  */ 							jQuery(obj2).delay(delay).animate({ left: lrpos }, options.transition_speed, function() {
/* 656  */ 									displayAnchors(obj2);
/* 657  */ 									displayCaption(obj2);
/* 658  */ 									afterAnimation(obj2);
/* 659  */ 								}
/* 660  */ 							);
/* 661  */ 						}
/* 662  */ 						else if (options.transition === 'vslide') {
/* 663  */ 						
/* 664  */ 							obj2.css('top', showcase.height());
/* 665  */ 							jQuery(obj2).delay(delay).animate({ top: '0px' }, options.transition_speed, function() {
/* 666  */ 									displayAnchors(obj2);
/* 667  */ 									displayCaption(obj2);
/* 668  */ 									afterAnimation(obj2);
/* 669  */ 								}
/* 670  */ 							);
/* 671  */ 						}
/* 672  */ 						else {
/* 673  */ 							
/* 674  */ 							obj2.css('left', lrpos);
/* 675  */ 							obj2.css('display', 'none');
/* 676  */ 							jQuery(obj2).delay(delay).fadeIn(options.transition_speed, function()
/* 677  */ 								{
/* 678  */ 									displayAnchors(obj2);
/* 679  */ 									displayCaption(obj2);
/* 680  */ 									afterAnimation(obj2);
/* 681  */ 								}
/* 682  */ 							);
/* 683  */ 						}
/* 684  */ 					}
/* 685  */ 				}
/* 686  */ 				// If we want to display the previous content
/* 687  */ 				else if (id < current_id || direction === 'previous') {
/* 688  */ 					
/* 689  */ 					if (options.viewline) {
/* 690  */ 					
/* 691  */ 						if (current_id !== 0) {
/* 692  */ 						
/* 693  */ 							// Prevent uggly transitions
/* 694  */ 							if (!options.speed_change) { animating = true; }
/* 695  */ 							
/* 696  */ 							// BugFix
/* 697  */ 							updateContentViewlineWidth();
/* 698  */ 							
/* 699  */ 							// Pause Autoplay
/* 700  */ 							if (options.pauseonover) { window.clearInterval(myInterval); }

/* jquery.aw-showcase.js */

/* 701  */ 							
/* 702  */ 							content_container.animate({left: old_animation_distance + 'px'}, options.transition_speed, function() { animating = false; });
/* 703  */ 							
/* 704  */ 							// Set animation distance
/* 705  */ 							animation_distance = old_animation_distance;
/* 706  */ 							
/* 707  */ 							// Change current content id
/* 708  */ 							current_id--;
/* 709  */ 							
/* 710  */ 							if (current_id === 0) { $('.showcase-arrow-previous').fadeOut(300); }
/* 711  */ 							
/* 712  */ 							// Set old distance
/* 713  */ 							old_id = current_id - 1;
/* 714  */ 							sub_width = jQuery(addedContentArray[old_id]).width();
/* 715  */ 							old_animation_distance = old_animation_distance + sub_width;
/* 716  */ 						}
/* 717  */ 						
/* 718  */ 						$('.showcase-arrow-next').fadeIn(300);
/* 719  */ 					}
/* 720  */ 					else {
/* 721  */ 					
/* 722  */ 						// Prevent uggly transitions
/* 723  */ 						if (!options.speed_change) { animating = true; }
/* 724  */ 						
/* 725  */ 						// Get current and next content element
/* 726  */ 						obj = jQuery(showcase).find('#showcase-content-' + parseInt(current_id));
/* 727  */ 						obj2 = getContent(id);
/* 728  */ 						
/* 729  */ 						// Append next element and set height
/* 730  */ 						content_container.append(obj2);
/* 731  */ 						if (options.dynamic_height) { obj2.css('height', obj2.find('.showcase-content').children().height()); }
/* 732  */ 						else { obj2.css('height', options.content_height); }
/* 733  */ 						
/* 734  */ 						// Animate height first if next content is not as high
/* 735  */ 						if (obj.find('.showcase-content').children().height() > obj2.find('.showcase-content').children().height() && options.dynamic_height) {
/* 736  */ 						
/* 737  */ 							content_container.stop(true, true).animate({ height: obj2.find('.showcase-content').children().height()}, 200);
/* 738  */ 							delay = 100;
/* 739  */ 						}
/* 740  */ 						
/* 741  */ 						// Animate current element
/* 742  */ 						if (options.transition === 'hslide') {
/* 743  */ 						
/* 744  */ 							jQuery(obj).delay(delay).animate({
/* 745  */ 								left: (showcase_width) + 'px'
/* 746  */ 								}, options.transition_speed+options.transition_delay, function() {
/* 747  */ 									displayAnchors(obj, true);
/* 748  */ 									displayCaption(obj, true);
/* 749  */ 									obj.remove();
/* 750  */ 							});

/* jquery.aw-showcase.js */

/* 751  */ 						}
/* 752  */ 						else if (options.transition === 'vslide') {
/* 753  */ 						
/* 754  */ 							jQuery(obj).delay(delay).animate({
/* 755  */ 								top: (options.content_height) + 'px'
/* 756  */ 								}, options.transition_speed+options.transition_delay, function(){
/* 757  */ 									displayAnchors(obj, true);
/* 758  */ 									displayCaption(obj, true);
/* 759  */ 									obj.remove();
/* 760  */ 							});
/* 761  */ 						}
/* 762  */ 						else {
/* 763  */ 						
/* 764  */ 							jQuery(obj).delay(delay).fadeOut(options.transition_speed, function() {
/* 765  */ 								displayAnchors(obj, true);
/* 766  */ 								displayCaption(obj, true);
/* 767  */ 								obj.remove();
/* 768  */ 							});
/* 769  */ 						}
/* 770  */ 						
/* 771  */ 						// Animate next element
/* 772  */ 						if (options.transition === 'hslide')
/* 773  */ 						{
/* 774  */ 							obj2.css('left', '-' + options.content_width + 'px');
/* 775  */ 							jQuery(obj2).delay(delay).animate({
/* 776  */ 								left: lrpos
/* 777  */ 								}, options.transition_speed, function() {
/* 778  */ 									displayAnchors(obj2);
/* 779  */ 									displayCaption(obj2);
/* 780  */ 									afterAnimation(obj2);
/* 781  */ 							});
/* 782  */ 						}
/* 783  */ 						else if (options.transition === 'vslide')
/* 784  */ 						{
/* 785  */ 							obj2.css('top', '-' +  showcase.height() + 'px');
/* 786  */ 							jQuery(obj2).delay(delay).animate({
/* 787  */ 								top: '0px'
/* 788  */ 								}, options.transition_speed, function() {
/* 789  */ 									displayAnchors(obj2);
/* 790  */ 									displayCaption(obj2);
/* 791  */ 									afterAnimation(obj2);
/* 792  */ 							});
/* 793  */ 						}
/* 794  */ 						else 
/* 795  */ 						{
/* 796  */ 							obj2.css('left', lrpos);
/* 797  */ 							obj2.css('display', 'none');	
/* 798  */ 							jQuery(obj2).delay(delay).fadeIn(options.transition_speed, function() {
/* 799  */ 								displayAnchors(obj2);
/* 800  */ 								displayCaption(obj2);

/* jquery.aw-showcase.js */

/* 801  */ 								afterAnimation(obj2);
/* 802  */ 							});
/* 803  */ 						}
/* 804  */ 						content_container.append(obj2);
/* 805  */ 					}
/* 806  */ 				}
/* 807  */ 				
/* 808  */ 				if(!options.viewline)
/* 809  */ 				{
/* 810  */ 					// Change previous and current content id
/* 811  */ 					previous_id = current_id;
/* 812  */ 					current_id = id;
/* 813  */ 							
/* 814  */ 					// Slide thumbnail wrapper
/* 815  */ 					if (options.thumbnails)
/* 816  */ 					{
/* 817  */ 						if ((current_id > previous_id && direction !== 'previous') || direction === 'next')
/* 818  */ 						{
/* 819  */ 							slideThumbnailWrapper('forward', true);
/* 820  */ 						}
/* 821  */ 						else if (current_id < previous_id || direction === 'previous')
/* 822  */ 						{
/* 823  */ 							slideThumbnailWrapper('backward', true);
/* 824  */ 						}
/* 825  */ 					}
/* 826  */ 					
/* 827  */ 					// Change click handlers for arrows
/* 828  */ 					if (options.arrows)
/* 829  */ 					{
/* 830  */ 						jQuery(showcase).find('.showcase-arrow-previous')
/* 831  */ 							.unbind('click')
/* 832  */ 							.click(function() {
/* 833  */ 								if (myInterval)
/* 834  */ 								{
/* 835  */ 									if (options.stoponclick) { pause_loop = true; }
/* 836  */ 									clearInterval(myInterval);
/* 837  */ 								}
/* 838  */ 								changeContent((current_id === 0) ? content_count-1 : parseInt(current_id)-1, 'previous');
/* 839  */ 							});
/* 840  */ 							jQuery(showcase).find('.showcase-arrow-next')
/* 841  */ 							.unbind('click')
/* 842  */ 							.click(function() {
/* 843  */ 								if (myInterval)
/* 844  */ 								{
/* 845  */ 									if (options.stoponclick) { pause_loop = true; }
/* 846  */ 									clearInterval(myInterval);
/* 847  */ 								}
/* 848  */ 								changeContent((current_id === content_count-1) ? 0 : parseInt(current_id)+1, 'next');
/* 849  */ 							});
/* 850  */ 					}

/* jquery.aw-showcase.js */

/* 851  */ 					
/* 852  */ 					// Change active class for thumbnails
/* 853  */ 					if (options.thumbnails)
/* 854  */ 					{
/* 855  */ 						i = 0;
/* 856  */ 						showcase.find('.showcase-thumbnail').each(function()
/* 857  */ 						{
/* 858  */ 							var object = jQuery(this);
/* 859  */ 							object.removeClass('active');
/* 860  */ 							if (i === current_id) { object.addClass('active'); }
/* 861  */ 							i++;
/* 862  */ 						});
/* 863  */ 					}
/* 864  */ 					
/* 865  */ 					// If caption is set to 'show'
/* 866  */ 					if (options.show_caption === 'show') { jQuery(obj2).find('.showcase-caption').show(); }
/* 867  */ 				}
/* 868  */ 				
/* 869  */ 				// Change active class for buttons
/* 870  */ 				if (options.buttons)
/* 871  */ 				{
/* 872  */ 					i = 0;
/* 873  */ 					showcase.find('.showcase-button-wrapper span').each(function()
/* 874  */ 					{
/* 875  */ 						var object = jQuery(this);
/* 876  */ 						object.removeClass('active');
/* 877  */ 						if (i === current_id) { object.addClass('active'); }
/* 878  */ 						i++;
/* 879  */ 					});
/* 880  */ 				}
/* 881  */ 					
/* 882  */ 				// A function that runs on content change, if it exists.
/* 883  */ 				if (typeof options.custom_function == 'function')
/* 884  */ 				{ 	
/* 885  */ 					options.custom_function();
/* 886  */ 				}
/* 887  */ 			}
/* 888  */ 		}
/* 889  */ 		
/* 890  */ 		function afterAnimation(obj)
/* 891  */ 		{
/* 892  */ 			if (options.dynamic_height) { content_container.stop(true, true).animate({ height: obj.find('.showcase-content').children().height() }, 200); }
/* 893  */ 			animating = false;
/* 894  */ 		}
/* 895  */ 		
/* 896  */ 		// Slide thumbnail wrapper
/* 897  */ 		var thumbnailSlidePosition = 0;
/* 898  */ 		function slideThumbnailWrapper(direction, check, backwardforward)
/* 899  */ 		{
/* 900  */ 			var doTheSlide = true;

/* jquery.aw-showcase.js */

/* 901  */ 			var thumbnailHeightOrWidth = getElementHeight(jQuery(thumb_wrapper).find('.showcase-thumbnail'));
/* 902  */ 			if (options.thumbnails_direction === 'horizontal')
/* 903  */ 			{
/* 904  */ 				thumbnailHeightOrWidth = getElementWidth(jQuery(thumb_wrapper).find('.showcase-thumbnail'));
/* 905  */ 			}
/* 906  */ 			var multiplySlidePosition = 1;
/* 907  */ 			
/* 908  */ 			// Set slide x
/* 909  */ 			if (options.thumbnails_slidex === 0) { options.thumbnails_slidex = thumbnailsPerPage; }
/* 910  */ 			
/* 911  */ 			// Check if we need to do the slide
/* 912  */ 			if (check)
/* 913  */ 			{
/* 914  */ 				var thumbnailSlidePositionCopy = thumbnailSlidePosition;
/* 915  */ 				var thumbnailsScrolled = 0;
/* 916  */ 				while (thumbnailSlidePositionCopy < 0)
/* 917  */ 				{
/* 918  */ 					if (options.thumbnails_direction === 'horizontal')
/* 919  */ 					{
/* 920  */ 						thumbnailSlidePositionCopy += getElementWidth(jQuery(thumbnailArray[0]));
/* 921  */ 					}
/* 922  */ 					else
/* 923  */ 					{
/* 924  */ 						thumbnailSlidePositionCopy += getElementHeight(jQuery(thumbnailArray[0]));
/* 925  */ 					}
/* 926  */ 					thumbnailsScrolled++;
/* 927  */ 				}
/* 928  */ 				
/* 929  */ 				var firstVisible = thumbnailsScrolled;
/* 930  */ 				var lastVisible = thumbnailsPerPage + thumbnailsScrolled -1;
/* 931  */ 				
/* 932  */ 				// Check if the next active thumbnail is outside the visible area
/* 933  */ 				if (current_id >= firstVisible && current_id <= lastVisible) { doTheSlide = false; }
/* 934  */ 				
/* 935  */ 				// If the next active thumbnail is far away..
/* 936  */ 				var distance;
/* 937  */ 				if ((current_id - lastVisible) > options.thumbnails_slidex)
/* 938  */ 				{
/* 939  */ 					distance = current_id - lastVisible;
/* 940  */ 					
/* 941  */ 					while (distance > options.thumbnails_slidex)
/* 942  */ 					{
/* 943  */ 						distance -= options.thumbnails_slidex;
/* 944  */ 						multiplySlidePosition++;
/* 945  */ 					}
/* 946  */ 				}
/* 947  */ 				else if ((firstVisible - current_id) > options.thumbnails_slidex)
/* 948  */ 				{
/* 949  */ 					distance =  firstVisible - current_id;
/* 950  */ 					

/* jquery.aw-showcase.js */

/* 951  */ 					while (distance > options.thumbnails_slidex)
/* 952  */ 					{
/* 953  */ 						distance -= options.thumbnails_slidex;
/* 954  */ 						multiplySlidePosition++;
/* 955  */ 					}
/* 956  */ 				}
/* 957  */ 				else { multiplySlidePosition = 1; }
/* 958  */ 			}
/* 959  */ 			
/* 960  */ 			if (direction === 'forward' && doTheSlide)
/* 961  */ 			{
/* 962  */ 				if (options.thumbnails_direction === 'vertical' && options.content_height < (thumbnailStretch + thumbnailSlidePosition))
/* 963  */ 				{
/* 964  */ 					thumbnailSlidePosition -= thumbnailHeightOrWidth * (options.thumbnails_slidex * multiplySlidePosition);
/* 965  */ 				}
/* 966  */ 				else if (options.thumbnails_direction === 'horizontal' && options.content_width < (thumbnailStretch + thumbnailSlidePosition))
/* 967  */ 				{
/* 968  */ 					thumbnailSlidePosition -= thumbnailHeightOrWidth * (options.thumbnails_slidex * multiplySlidePosition);
/* 969  */ 				}
/* 970  */ 				else if (current_id === 0)
/* 971  */ 				{
/* 972  */ 					if (!backwardforward) { thumbnailSlidePosition = 0; }
/* 973  */ 				}
/* 974  */ 				if (options.thumbnails_direction === 'horizontal') { thumb_wrapper.animate({ left: thumbnailSlidePosition }, 300); }
/* 975  */ 				else { thumb_wrapper.animate({ top: thumbnailSlidePosition }, 300); }
/* 976  */ 			}
/* 977  */ 			else if (doTheSlide)
/* 978  */ 			{
/* 979  */ 				if (thumbnailSlidePosition < 0)
/* 980  */ 				{
/* 981  */ 					thumbnailSlidePosition += thumbnailHeightOrWidth * (options.thumbnails_slidex * multiplySlidePosition);
/* 982  */ 				}
/* 983  */ 				else if (current_id === content_count-1)
/* 984  */ 				{
/* 985  */ 					if (!backwardforward)
/* 986  */ 					{
/* 987  */ 						thumbnailSlidePosition -= thumbnailHeightOrWidth * (options.thumbnails_slidex * multiplySlidePosition);
/* 988  */ 					}
/* 989  */ 				}
/* 990  */ 				else { thumbnailSlidePosition = 0; }
/* 991  */ 				if (options.thumbnails_direction === 'horizontal') { thumb_wrapper.animate({ left: thumbnailSlidePosition }, 300); }
/* 992  */ 				else { thumb_wrapper.animate({ top: thumbnailSlidePosition }, 300); }
/* 993  */ 			}
/* 994  */ 		}
/* 995  */ 		
/* 996  */ 		// Displays the caption
/* 997  */ 		function displayCaption(container, fadeOut)
/* 998  */ 		{
/* 999  */ 			var caption = container.find('.showcase-caption');
/* 1000 */ 			if (!fadeOut)

/* jquery.aw-showcase.js */

/* 1001 */ 			{
/* 1002 */ 				if (options.show_caption === 'onload') { caption.fadeIn(300); }
/* 1003 */ 				else if (options.show_caption === 'onhover')
/* 1004 */ 				{
/* 1005 */ 					jQuery(container).mouseenter(function()
/* 1006 */ 					{
/* 1007 */ 						caption.fadeIn(300);
/* 1008 */ 					});
/* 1009 */ 					
/* 1010 */ 					jQuery(container).mouseleave(function()
/* 1011 */ 					{
/* 1012 */ 						caption.stop(true, true).fadeOut(100);
/* 1013 */ 					});
/* 1014 */ 				}
/* 1015 */ 			}
/* 1016 */ 			else { caption.stop(true, true).fadeOut(300); }
/* 1017 */ 		}
/* 1018 */ 		
/* 1019 */ 		// Displays the anchors in the current slide
/* 1020 */ 		function displayAnchors(container, fadeOut)
/* 1021 */ 		{
/* 1022 */ 			// Get each anchor tooltip
/* 1023 */ 			container.find('.showcase-tooltips a').each(function()
/* 1024 */ 			{
/* 1025 */ 				if (!fadeOut)
/* 1026 */ 				{
/* 1027 */ 					// Get coordinates
/* 1028 */ 					var coords = jQuery(this).attr('coords');
/* 1029 */ 					coords = coords.split(',');
/* 1030 */ 					
/* 1031 */ 					// Style and position anchor
/* 1032 */ 					jQuery(this).addClass('showcase-plus-anchor');
/* 1033 */ 					jQuery(this).css('position', 'absolute');
/* 1034 */ 					jQuery(this).css('display', 'none');
/* 1035 */ 					jQuery(this).css('width', options.tooltip_icon_width);
/* 1036 */ 					jQuery(this).css('height', options.tooltip_icon_height);
/* 1037 */ 					jQuery(this).css('left', parseInt(coords[0]) - (parseInt(options.tooltip_icon_width)/2));
/* 1038 */ 					jQuery(this).css('top', parseInt(coords[1]) - (parseInt(options.tooltip_icon_height)/2));
/* 1039 */ 					var content = jQuery(this).html();
/* 1040 */ 					jQuery(this).mouseenter(function()
/* 1041 */ 					{
/* 1042 */ 						animateTooltip(container, coords[0], coords[1], content);
/* 1043 */ 					});
/* 1044 */ 					jQuery(this).mouseleave(function()
/* 1045 */ 					{
/* 1046 */ 						animateTooltip(container, coords[0], coords[1], content);
/* 1047 */ 					});
/* 1048 */ 					jQuery(this).html('');
/* 1049 */ 					jQuery(this).fadeIn(300);
/* 1050 */ 				}

/* jquery.aw-showcase.js */

/* 1051 */ 				else
/* 1052 */ 				{
/* 1053 */ 					jQuery(this).stop(true, true).fadeOut(300);
/* 1054 */ 				}
/* 1055 */ 			});
/* 1056 */ 		}
/* 1057 */ 		
/* 1058 */ 		// Controls the animation for the tooltips
/* 1059 */ 		var tooltip = null;
/* 1060 */ 		function animateTooltip(container, x, y, content)
/* 1061 */ 		{
/* 1062 */ 			// if tooltip is null (doesn't exsist)
/* 1063 */ 			if (tooltip === null)
/* 1064 */ 			{
/* 1065 */ 				// Create the tooltip
/* 1066 */ 				tooltip = jQuery(document.createElement('div'))
/* 1067 */ 					.addClass('showcase-tooltip')
/* 1068 */ 					.css('display', 'none')
/* 1069 */ 					.css('position', 'absolute')
/* 1070 */ 					.css('max-width', options.tooltip_width)
/* 1071 */ 					.html(content);
/* 1072 */ 				container.append(tooltip);
/* 1073 */ 				
/* 1074 */ 				// Position the tooltip (this is where we try not to display the tooltip outside the content wrapper)
/* 1075 */ 				var tooltip_paddingx = parseInt(tooltip.css('padding-right'))*2 + parseInt(tooltip.css('border-right-width'))*2;
/* 1076 */ 				var tooltip_paddingy = parseInt(tooltip.css('padding-bottom'))*2 + parseInt(tooltip.css('border-bottom-width'))*2;
/* 1077 */ 				lastx = parseInt(x) + tooltip.width() + tooltip_paddingx;
/* 1078 */ 				lasty = parseInt(y) + tooltip.height() + tooltip_paddingy;
/* 1079 */ 				
/* 1080 */ 				if (lastx < options.content_width)
/* 1081 */ 				{
/* 1082 */ 					tooltip.css('left', parseInt(x) + parseInt(options.tooltip_offsetx));
/* 1083 */ 				}
/* 1084 */ 				else
/* 1085 */ 				{
/* 1086 */ 					tooltip.css('left', (parseInt(x) - parseInt(options.tooltip_offsetx)) - (parseInt(tooltip.width()) + parseInt(options.tooltip_offsetx)));
/* 1087 */ 				}
/* 1088 */ 				
/* 1089 */ 				if (lasty < options.content_height)
/* 1090 */ 				{
/* 1091 */ 					tooltip.css('top', parseInt(y) + parseInt(options.tooltip_offsety));
/* 1092 */ 				}
/* 1093 */ 				else
/* 1094 */ 				{
/* 1095 */ 					tooltip.css('top', (parseInt(y) - parseInt(options.tooltip_offsety)) - (parseInt(tooltip.height()) + parseInt(tooltip_paddingy)));
/* 1096 */ 				}
/* 1097 */ 				
/* 1098 */ 				// Fade in the tooltip
/* 1099 */ 				tooltip.fadeIn(400);
/* 1100 */ 			}

/* jquery.aw-showcase.js */

/* 1101 */ 			else
/* 1102 */ 			{
/* 1103 */ 				// Fade out the tooltip
/* 1104 */ 				tooltip.fadeOut(400);
/* 1105 */ 				// Remove it from the DOM
/* 1106 */ 				tooltip.remove();
/* 1107 */ 				// And set the variable to null
/* 1108 */ 				tooltip = null;
/* 1109 */ 			}
/* 1110 */ 		}
/* 1111 */ 		
/* 1112 */ 		/* Returns the correct height for the element, including padding and borders. */
/* 1113 */ 		function getElementHeight(el, incHeight, incMargin, incPadding, incBorders)
/* 1114 */ 		{
/* 1115 */ 			incHeight = typeof(incHeight) !== 'undefined' ? incHeight : true;
/* 1116 */ 			incMargin = typeof(incMargin) !== 'undefined' ? incMargin : true;
/* 1117 */ 			incPadding = typeof(incPadding) !== 'undefined' ? incPadding : true;
/* 1118 */ 			incBorders = typeof(incBorders) !== 'undefined' ? incBorders : true;
/* 1119 */ 			var elHeight = (incHeight) ? jQuery((el)).height() : 0;
/* 1120 */ 			var elMargin = (incMargin) ? parseFloat(jQuery((el)).css('margin-top')) + parseFloat(jQuery(el).css('margin-bottom')) : 0;
/* 1121 */ 			var elPadding = (incPadding) ? parseFloat(jQuery((el)).css('padding-top')) + parseFloat(jQuery(el).css('padding-bottom')) : 0;
/* 1122 */ 			var elBorder = (incBorders) ? parseFloat(jQuery((el)).css('border-top-width')) + parseFloat(jQuery((el)).css('border-bottom-width')) : 0;
/* 1123 */ 			elHeight += elMargin + elPadding + elBorder;
/* 1124 */ 			return elHeight;
/* 1125 */ 		}
/* 1126 */ 		
/* 1127 */ 		/* Returns the correct width for the element, including width, margin, padding and borders. */
/* 1128 */ 		function getElementWidth(el, incWidth, incMargin, incPadding, incBorders)
/* 1129 */ 		{
/* 1130 */ 			incWidth = typeof(incWidth) !== 'undefined' ? incWidth : true;
/* 1131 */ 			incMargin = typeof(incMargin) !== 'undefined' ? incMargin : true;
/* 1132 */ 			incPadding = typeof(incPadding) !== 'undefined' ? incPadding : true;
/* 1133 */ 			incBorders = typeof(incBorders) !== 'undefined' ? incBorders : true;
/* 1134 */ 			var elWidth = (incWidth) ? jQuery((el)).width() : 0;
/* 1135 */ 			var elMargin = (incMargin) ? parseFloat(jQuery((el)).css('margin-left')) + parseFloat(jQuery(el).css('margin-right')) : 0;
/* 1136 */ 			var elPadding = (incPadding) ? parseFloat(jQuery((el)).css('padding-left')) + parseFloat(jQuery((el)).css('padding-right')) : 0;
/* 1137 */ 			var elBorder = (incBorders) ? parseFloat(jQuery((el)).css('border-left-width')) + parseFloat(jQuery((el)).css('border-right-width')) : 0;
/* 1138 */ 			elWidth += elMargin + elPadding + elBorder;
/* 1139 */ 			return elWidth;
/* 1140 */ 		}
/* 1141 */ 		
/* 1142 */ 		// Traces the mouse position (used for positioning anchors)
/* 1143 */ 		if (options.mousetrace)
/* 1144 */ 		{
/* 1145 */ 			// Create the div tha displays the coordinates
/* 1146 */ 			var mousetrace = jQuery(document.createElement('div'))
/* 1147 */ 				.css('position', 'absolute')
/* 1148 */ 				.css('top', '0')
/* 1149 */ 				.css('background-color', '#fff')
/* 1150 */ 				.css('color', '#000')

/* jquery.aw-showcase.js */

/* 1151 */ 				.css('padding', '3px 5px')
/* 1152 */ 				.css('x-index', '30')
/* 1153 */ 				.html('X: 0 Y: 0');
/* 1154 */ 			showcase.append(mousetrace);
/* 1155 */ 			var offset = showcase.offset();
/* 1156 */ 			
/* 1157 */ 			// Print the coordinates
/* 1158 */ 			content_container.mousemove(function(e){ mousetrace.html('X: ' + (e.pageX - offset.left)  + ' Y: ' + (e.pageY - offset.top)); });
/* 1159 */ 		}
/* 1160 */ 		
/* 1161 */ 		// Show all content on one page
/* 1162 */ 		$('#awOnePageButton').click(function showInOnePage()
/* 1163 */ 		{
/* 1164 */ 			if ($('.view-page').is(':visible'))
/* 1165 */ 			{
/* 1166 */ 				var temp_container = jQuery(document.createElement('div'));
/* 1167 */ 				temp_container.addClass('showcase-onepage');
/* 1168 */ 				showcase.before(temp_container);
/* 1169 */ 				
/* 1170 */ 				// Disable auto change on click
/* 1171 */ 				if (myInterval) { pause_loop = true; clearInterval(myInterval); }
/* 1172 */ 				
/* 1173 */ 				$(this).find('.view-page').hide();
/* 1174 */ 				$(this).find('.view-slide').show();
/* 1175 */ 				showcase.hide();
/* 1176 */ 			
/* 1177 */ 				$.each(contentArray, function(index, value)
/* 1178 */ 				{
/* 1179 */ 					obj = getContent(index);
/* 1180 */ 					obj.css('position', 'relative');
/* 1181 */ 					temp_container.append(obj);
/* 1182 */ 					
/* 1183 */ 					displayAnchors(obj);
/* 1184 */ 					displayCaption(obj);
/* 1185 */ 					
/* 1186 */ 					if (options.dynamic_height) { obj.css('height', obj.find('.showcase-content').children().height()); }
/* 1187 */ 					else { obj.css('height', options.content_height); }
/* 1188 */ 				});
/* 1189 */ 				
/* 1190 */ 				var clear = jQuery(document.createElement('div'));
/* 1191 */ 				clear.addClass('clear');
/* 1192 */ 				temp_container.append(clear);
/* 1193 */ 			}
/* 1194 */ 			else
/* 1195 */ 			{
/* 1196 */ 				$('.showcase-onepage').remove();
/* 1197 */ 				$(this).find('.view-page').show();
/* 1198 */ 				$(this).find('.view-slide').hide();
/* 1199 */ 				showcase.show();
/* 1200 */ 			}

/* jquery.aw-showcase.js */

/* 1201 */ 			
/* 1202 */ 			return false;
/* 1203 */ 		});
/* 1204 */ 		
/* 1205 */ 		// The correct width is returned when all content is fully loaded.
/* 1206 */ 		var addedContentArray = [];
/* 1207 */ 		function updateContentViewlineWidth()
/* 1208 */ 		{
/* 1209 */ 			content_viewline_width = 0;
/* 1210 */ 			content_container.children('div').each(function()
/* 1211 */ 			{
/* 1212 */ 				content_viewline_width += $(this).find('.showcase-content').children().width();
/* 1213 */ 				addedContentArray.push($(this));
/* 1214 */ 			});
/* 1215 */ 		}
/* 1216 */ 		
/* 1217 */ 		// Remove loading class
/* 1218 */ 		showcase.removeClass('showcase-load');
/* 1219 */ 	};
/* 1220 */ 
/* 1221 */ })(jQuery);
