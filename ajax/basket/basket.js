var basketAjax = {
	callback: {
		add: function(param) {
			let response = eval("(" + param.responseText + ")");
			document.querySelector('#product_count_' + response.id).value = response.count;
			document.querySelector('#all_coast').innerText = response.all[1];
		},
		remove: function(param) {

		},
		delete: function(param) {

		}
	},
	add_to_cart: function(item) {
		let xhr = ajax.ini();
		ajax.send(xhr, 'post', '/ajax/basket/basket.php', 'add_basket_item=' + item, basketAjax.callback.add);
	}
}