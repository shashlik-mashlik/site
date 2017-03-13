/*
 * jQuery mouseGallerySlide v1.1.0 
 *
 * Copyright (c) 2008 Taranets Aleksey
 * www: markup-javascript.com
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 */

jQuery.fn.mouseGallerySlide = function(_options){
	// defaults options	
	var _options = jQuery.extend({
		scrollElParent: 'ul',
		scrollEl: 'li'
	},_options);

	return this.each(function(){
		var _this = $(this);

		var _gWidth = _this.outerWidth();
		var _scrollElParent = jQuery(_options.scrollElParent,_this);
		var _scrollEl = jQuery(_options.scrollEl,_this);
		var _liWidth = _scrollEl.outerWidth(true);
		var _liSum = _scrollEl.length * _liWidth;
		
		var _sec = (_liSum - _gWidth) * 30;
		
		var _maxMargin = _liSum;
		var _posHolder = _this.offset();
		var _width = _this.outerWidth();
		var _height = _this.outerHeight();
		
		var _chapter = _gWidth/12;
		var _speed = 0
		var _direction = 2;
		var _timerOut = false;
		
		var _cloneList = _scrollEl.clone();
		_scrollElParent.append(_cloneList);
		_scrollElParent
		
		jQuery(document).resize(function(){
			_posHolder = _this.offset();
		});
		
		$(document).mousemove(function(e){
			if (e.pageX > _posHolder.left && e.pageX < (_posHolder.left + _width) && e.pageY > _posHolder.top && e.pageY < (_posHolder.top + _height))
				//mouseOverMove(e);
				_scrollElParent.stop();
			else //_scrollElParent.stop();
			mouseOverMove(e);
		});

		$(document).ready(function() {_speed = 2; _direction = 3; animateEl();});
		
		function mouseOverMove(e) {
			for (var i=0; i <= 12; i++) {
				if ((_chapter*i) > (e.pageX - _posHolder.left)) {
					switch(i){
						case 1: _speed = 3;break
						case 2:	_speed = 2;break
						case 3: _speed = 2;break
						case 4: _speed = 2;break
						case 12: _speed = 3;break
						case 11: _speed = 2;break
						case 10: _speed = 2;break
						case 9: _speed = 2;break
						default:_speed = 2;
					}
_direction = 3;					
					//if (i <= 5) _direction = 1;
					//else if (i >= 7) _direction = 3;
					//break;
				}
			}
			animateEl();
		}
		
		function animateEl() {
			if (_timerOut) clearTimeout(_timerOut);
			_scrollElParent.stop();
			var _curMargin = parseInt(_scrollElParent.css('marginLeft'));
			
			if (_direction == 1) {
				var k = -_curMargin/_maxMargin;
				_scrollElParent.stop()
					.animate(
						{marginLeft:0},
						{easing:'linear',duration:(_sec/_speed)*k, complete:function(){
							_scrollElParent.css({'marginLeft':-(_maxMargin)});
							_timerOut = setTimeout(function(){animateEl()},15)
						}}
					);
			}
			if (_direction == 3) {
				var k = (_maxMargin + _curMargin)/_maxMargin;
				_scrollElParent.stop()
					.animate(
						{marginLeft:-_maxMargin},
						{easing:'linear',duration:(_sec/_speed)*k, complete:function(){
							_scrollElParent.css({'marginLeft':0});
							_timerOut = setTimeout(function(){animateEl()},15)
						}}
					);
			}
		}
	});
}



	