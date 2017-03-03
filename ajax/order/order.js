var order = {
	state: false,
	check_address: function(addr) {
		console.log(addr);
	},
	get_addr: function(addr) {
		if (addr.length > 4) {
			getGGG();
		} else {
			this.state = false;
		}
	}
}