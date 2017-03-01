var basketAjax = {
	callback: {
		add: function(param) {
			let response = eval("(" + param.responseText + ")");

			let word = 'позиций';
			if (response.all[0] == 1) word = 'позиция'
				elseif (response.all[0] > 1 && response.all[0] < 5) word = 'позиции';

			document.querySelector('#product_count_' + response.id).value = response.count;
			document.querySelector('#product_coast_' + response.id).value = response.coast;
			document.querySelector('#all_coast').innerText = response.all[1];
			document.querySelector('#all_count').innerText = response.all[0];
			document.querySelector('#all_count_word').innerText = word;
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