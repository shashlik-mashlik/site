var order = {
	state: false,
	check_address: function(addr) {
		console.log(addr.hintContent);
	},
	get_addr: function(addr) {
		if (addr.length > 4) {
			getGGG();
		} else {
			this.state = false;
		}
	}
}