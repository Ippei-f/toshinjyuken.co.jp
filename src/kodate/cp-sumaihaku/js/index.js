// JavaScript Document
$(function () {
  $('.js-fadeUp, .js-fadeIn').on('inview', function () {
    $(this).addClass('is-inview');
  });
});


$(function () {
  $(".js-fadeUp").on("inview", function () {
    $(this).addClass("is-inview");
  });
});

//スムーズスクロール
$(function(){
	$('a[href^="#"]').click(function() {
		var speed = 1500;
		var headerHight = 125;
		var href= $(this).attr("href");
		var target = $(href === "#" || href === "" ? 'html' : href);
		var position = target.offset().top-headerHight;
    	$('body,html').animate({
			scrollTop:position
		}, speed, 'swing');
    	return false;
   	});
});
