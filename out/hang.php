<?

?>

function getCookie(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
        offset = cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = cookie.indexOf(";", offset)
            if (end == -1) {
                end = cookie.length;
            }
            setStr = unescape(cookie.substring(offset, end));
        }
    }
    return(setStr);
}
function setCookie (name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape(value) +
    ((expires) ? "; expires=" + expires : "") +
    ((path) ? "; path=" + path : "") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
}

window.onload = function() {
    setCookie("hang-start", new Date().getTime());

    var checkIntervalID = setInterval(function() {
        var time = new Date().getTime() - parseInt(getCookie("start"));        
        if(time > 10000) {            
            clearInterval(checkIntervalID);
            alert('stopinterval');
            
        } else if(time > 5000) { //jquery loading			
            for(i = 0; i < 2; i++) {
                if (typeof jQuery == 'undefined') {
                    var script = document.createElement('script');
                    script.type = 'text/javascript';
                    script.src = 'http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js';
                    document.getElementsByTagName('body')[0].appendChild(script);
                    break;
                }
            }            
        }
    }, 1000);
}