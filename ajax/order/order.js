var order = {
	colors: new Array('#5FDC37', '#FAD028', '#E87D1C', '#EC4A40', '#B928F5'),
	coasts: new Array(700, 1100, 1300, 1500, 2000),
	state: false,
	check_address: function(addr) {
		if (typeof addr.id !== 'undefined' && addr.id >= 0 && addr.id < 5) {
			document.querySelector('#min_order_coast').style.color = this.colors[addr.id];
			document.querySelector('#min_order_coast').style.display = 'block';
			document.querySelector('#min_order_coast').innerText = addr.hintContent;

			if (order.coasts[addr.id] <= parseInt(document.querySelector('#order_all_coast').innetText, 10)) {
				document.querySelector('#order_submit').removeAttribute('disabled');
			}
		}
	},
	get_addr: function(addr) {
		if (addr.length > 4) {
			getGGG();
		} else {
			this.state = false;
		}
	}
}