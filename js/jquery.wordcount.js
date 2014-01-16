/*
 * 	Character Count Plugin - jQuery plugin
 * 	Dynamic character count for text areas and input fields
 *	written by Alen Grakalic	
 *	http://cssglobe.com/
 *
 *	Copyright (c) 2009 Alen Grakalic (http://cssglobe.com)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */
 
(function($) {

	$.fn.charCount = function(options){
	  
		// default configuration properties
		var defaults = {	
			allowed: 140,		
			warning: 25,
			css: '',
			counterElement: 'div',
			cssWarning: 'warning',
			cssExceeded: 'exceeded',
			counterText: 'Chars left:'
		}; 
			
		var options = $.extend(defaults, options); 
		
		function calculate(obj){
			var count = $(obj).val().length;
			var available = options.allowed - count;
			if(available <= options.warning && available >= 0){
				$(obj).next().addClass(options.cssWarning);
			} else {
				$(obj).next().removeClass(options.cssWarning);
			}
			if(available < 0){
				$(obj).next().addClass(options.cssExceeded);
			} else {
				$(obj).next().removeClass(options.cssExceeded);
			}
			$(obj).next().html(options.counterText + available);
			
			 		$("#box_chars_left").html(''+ available +'');
		};
				
		this.each(function() {  			
		
 		//$(this).after('<'+ options.counterElement +' class=" texto_12  counter_tit" style="border:1px solid #ccc;float:right;width:50px;display:inline-block;">  '+ options.counterText +'</'+ options.counterElement +'>');
			

		 
			calculate(this);
			$(this).keyup(function(){calculate(this)});
			$(this).change(function(){calculate(this)});
		});
	  
	};

})(jQuery);