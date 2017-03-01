var basketAjax = {
	callback: function(response) {
		console.log(response.responseText)
	},
	add_to_cart: function(item) {
		let xhr = ajax.ini();
		ajax.send(xhr, 'post', '/ajax/basket/basket.php', 'add_basket_item=' + item, basketAjax.callback);
	}
}