var basketAjax = {
	callback: {
		add: function(param) {
			let response = eval("(" + param.responseText + ")");

			let word = ' позиций';
			if (response.all[0] == 1) word = ' позиция'
				else if (response.all[0] > 1 && response.all[0] < 5) word = ' позиции';

			document.querySelector('#header_basket_all_count').innerText = response.all[0];
			document.querySelector('#header_basket_all_count').style.display = 'block';
			document.querySelector('#product_count_' + response.id).value = response.count;
			document.querySelector('#product_coast_' + response.id).innerText = response.coast * response.count + ' руб.';
			document.querySelector('#all_coast').innerText = response.all[1];
			document.querySelector('#all_count').innerText = response.all[0];
			document.querySelector('#all_count_word').innerText = word;
		},
		remove: function(param) {
			let response = eval("(" + param.responseText + ")");

			let word = ' позиций';
			if (response.all[0] == 1) word = ' позиция'
				else if (response.all[0] > 1 && response.all[0] < 5) word = ' позиции';

			document.querySelector('#all_coast').innerText = response.all[1];
			document.querySelector('#all_count').innerText = response.all[0];
			document.querySelector('#header_basket_all_count').innerText = response.all[0];
			document.querySelector('#all_count_word').innerText = word;

			document.querySelector('#basket_row_item_' + response.id).remove();

			if (response.all[0] === 0) document.querySelector('#header_basket_all_count').style.display = 'none';
		},
		delete: function(param) {
			let response = eval("(" + param.responseText + ")");

			let word = ' позиций';
			if (response.all[0] == 1) word = ' позиция'
				else if (response.all[0] > 1 && response.all[0] < 5) word = ' позиции';

			document.querySelector('#header_basket_all_count').innerText = response.all[0];
			document.querySelector('#header_basket_all_count').style.display = 'block';
			document.querySelector('#product_count_' + response.id).value = response.count;
			document.querySelector('#product_coast_' + response.id).innerText = response.coast * response.count + ' руб.';
			document.querySelector('#all_coast').innerText = response.all[1];
			document.querySelector('#all_count').innerText = response.all[0];
			document.querySelector('#all_count_word').innerText = word;
		}
	},
	changeButton: function(item) {
		document.querySelector('#add_cart_btn_' + item).style.display = 'none';
		document.querySelector('#ok_cart_btn_' + item).style.display = 'inline';
	},
	add_to_cart: function(item) {
		let xhr = ajax.ini();
		ajax.send(xhr, 'post', '/ajax/basket/basket.php', 'add_basket_item=' + item, basketAjax.callback.add);
	},
	remove_from_cart: function(item) {
		let xhr = ajax.ini();
		ajax.send(xhr, 'post', '/ajax/basket/basket.php', 'remove_from_cart=' + item, basketAjax.callback.remove);
	},
	delete_basket_item: function(item) {
		let xhr = ajax.ini();
		ajax.send(xhr, 'post', '/ajax/basket/basket.php', 'del_basket_item=' + item, basketAjax.callback.delete);
	},
	top_cart: {
		show: function() {
			let el = document.querySelector("#shop_cart_content");
			el.style.opacity = "1";
			el.style.margin = "0px";

			let xhr = ajax.ini();
			ajax.send(xhr, 'post', '/ajax/basket/top_cart.php', '', basketAjax.top_cart.constr);

			document.querySelector("#shop_cart").setAttribute('onclick', 'basketAjax.top_cart.hide();');
		},
		constr: function(param) {
			let response = eval("(" + param.responseText + ")");
			let el = document.querySelector('#top_cart_content');
			for (let i = 1; i < response.length; i++) {
				let div = document.createElement('div'); // Родитель
				div.setAttribute('class', 'item clearfix');
				let a = document.createElement('a'); //up
				a.setAttribute('onclick', 'return false;');
				var img = document.createElement('img'); //up
				img.setAttribute('src', '/upload/catalog/' + response[i].id + '.jpg');
				var div2 = document.createElement('div'); //down
				div2.setAttribute('class', 'item_desc');
				var a2 = document.createElement('a');  //down
				a2.setAttribute('onclick', 'return false;');
				a2.innerText = response[i].name;
				var span = document.createElement('span'); //down
				span.setAttribute('class', 'item_price');
				span.innerText = response[i].coast + 'р';
				var span2 = document.createElement('span'); //down
				span2.setAttribute('class', 'item_quantity');
				span2.innerText = 'x ' + response[i].count;
				div2.appendChild(a2).appendChild(span).appendChild(span2);
				div.appendChild(a.appendChild(img));
				el.appendChild(div).appendChild(div2);
			}
			
			if (typeof response[0] === null) document.querySelector('#top_cart_all_coast').innerText = '0р';
				else document.querySelector('#top_cart_all_coast').innerText = response[0] + 'р';
		},
		hide: function(){
			document.querySelector('#top_cart_content').innerHTML = '';

			let el = document.querySelector("#shop_cart_content");
			el.style.opacity = "0";
			el.style.margin = "-10000px 0 0";

			document.querySelector("#shop_cart").setAttribute('onclick', 'basketAjax.top_cart.show();');
		}
	}
}