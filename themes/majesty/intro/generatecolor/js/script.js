$(document).ready(function(){
	
	$('#download').click(function(e){
		var colors = new Array(
			$('#maincolor').val(),
			$('#btnbgover').val(),
			$('#btnbordercolor').val(),
			$('#linkpostmeta').val()
		);
		$.generateFile({
			filename	: 'color.css',
			content		: colors,
			script		: 'intro/generatecolor/download.php'
		});
		
		e.preventDefault();
	});
	
	$('#main-color').colpick({
		flat:true,
		layout:'full',
		colorScheme:'dark',
		color:'c59d5f',
		submit:0,
		onChange:function(hsb,hex,rgb,el,bySetColor) {
			$('#maincolor').val(hex);
		}
	});
	$('#btn-bg-over').colpick({
		flat:true,
		layout:'full',
		colorScheme:'dark',
		color:'b18540',
		submit:0,
		onChange:function(hsb,hex,rgb,el,bySetColor) {
			$('#btnbgover').val(hex);
		}
	});
	$('#btn-border-color').colpick({
		flat:true,
		layout:'full',
		colorScheme:'dark',
		color:'a97f3d',
		submit:0,
		onChange:function(hsb,hex,rgb,el,bySetColor) {
			$('#btnbordercolor').val(hex);
		}
	});
	$('#link-post-meta').colpick({
		flat:true,
		layout:'full',
		colorScheme:'dark',
		color:'ffffff',
		submit:0,
		onChange:function(hsb,hex,rgb,el,bySetColor) {
			$('#linkpostmeta').val(hex);
		}
	});
	/*$('#font-color').ColorPicker({
		color: '#c59d5f',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#fontcolor').val(hex);			
		}
	
	});
	

	
	$('#btn-color').ColorPicker({
		color: '#ffffff',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#btncolor').val(hex);			
		}
	
	});
	
	$('#btn-bg').ColorPicker({
		color: '#c59d5f',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#btnbg').val(hex);			
		}
	
	});
	
	$('#btn-border').ColorPicker({
		color: '#c59d5f',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#btnborder').val(hex);			
		}
	
	});
	
	$('#btn-bg-hover').ColorPicker({
		color: '#b18540',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#btnbghover').val(hex);			
		}
	
	});
	
	$('#btn-border-hover').ColorPicker({
		color: '#a97f3d',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#btnborderhover').val(hex);			
		}
	
	});
	
	$('#theme-el-bg').ColorPicker({
		color: '#c59d5f',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#themeelbg').val(hex);			
		}
	
	});
	
	
	$('#theme-pagenav-border').ColorPicker({
		color: '#c59d5f',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#themepagenavborder').val(hex);			
		}
	
	});
	
	$('#theme-menu-border').ColorPicker({
		color: '#c59d5f',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#thememenuborder').val(hex);			
		}
	
	});
	$('#theme-postmeta-hover').ColorPicker({
		color: '#c59d5f',
		flat: true,
		onChange: function(hsb, hex, rgb) {
			$('#colorpickerHolder div').css('backgroundColor', '#' + hex);
			$('#themepostmetahover').val(hex);			
		}
	
	});*/
});