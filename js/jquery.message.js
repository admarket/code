/*!
 * jQuery Message Plugin (with Transition Definitions)
 * Examples and documentation at: http://eadmarket.com/
 * Copyright (c) 2012-2013  China.Ren.
 * Version: 1.0.2 (19-OCT-2013)
 * Dual licensed under the MIT and GPL licenses.
 * http://jquery.malsup.com/license.html
 * Requires: jQuery v1.3.1 or later
 */
$.msg=function(txt,style,obj,delay){
	var container=$('#jquery-beauty-msg');
	if(container.length<=0){
		$("body").append('<div style="clear:both;"></div><div id="jquery-beauty-msg"></div>');
		container=$('#jquery-beauty-msg');
	}
	var containerStyle='color:#e1282b;font-family:"微软雅黑";font-weight:bold;font-size:20px;text-shadow:5px 5px 10px #bbb;'
			+'text-align:center;margin:0;padding-top:20%;width:100%;word-break:break-all;z-index:100000;';
	
	if(obj!="undefined"&&obj!=null){
		containerStyle+='position:relative;top:'+$(obj).attr('top')+';left:'+$(obj).attr('left')+';';
	}
	else{
		containerStyle+='position:fixed;top:0;left:0;';
		$(container).attr('style',containerStyle+style);
		$(container).html(txt);
		$(container).fadeIn(300,function(){
		$(container).animate({fontSize:'40px'},'300');
		$(container).delay(1000).fadeOut();
	});
	}
	
	
}