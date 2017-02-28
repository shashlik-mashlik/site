/*
AJAX
var func = function() {<...>};
var req = ajax.ini();
ajax.send(req, 'post', 'index.php', 'test=true&pep=kek', func);
*/
var ajax = {
	ini: function() {
 		let xhr = false;
 		xhr = new XMLHttpRequest();
 		if (!xhr) return alert('Невозможно создать AJAX запрос');
 		return xhr;
 	},
 	send: function(xhr, method, action, args, handler) {
 		xhr.onreadystatechange = function() {
 			if (xhr.readyState == 4 && xhr.status == 200) {
 				handler(xhr);
 			}
 		}

 		if (method.toLowerCase() == 'get' && args.length > 0) action += '?' + args;
 		xhr.open(method, action, true);

 		if (method.toLowerCase() == 'post') {
 			xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=utf-8");
 		}
 		xhr.send(args);
 	}
 }