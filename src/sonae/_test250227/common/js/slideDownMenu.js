$(function(){
	$('#globalNav ul li ul').hide();
	$('#globalNav ul li').hover(function(){
		$(this).find('ul:not(:animated)').slideDown('fast');
	},function(){
		$(this).find('ul').slideUp('fast');
	})
})
