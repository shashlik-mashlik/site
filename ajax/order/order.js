var order = {
	colors: new Array('#5FDC37', '#FAD028', '#E87D1C', '#EC4A40', '#B928F5'),
	state: false,
	check_address: function(addr) {
		if (typeof addr.id !== 'undefined' && addr.id >= 0 && addr.id < 5) {
			document.querySelector('#min_order_coast').style.color = this.colors[addr.id];
			document.querySelector('#min_order_coast').style.display = 'block';
			document.querySelector('#min_order_coast').innerText = addr.hintContent;
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