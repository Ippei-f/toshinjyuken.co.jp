$(function(){
  $('.effect').children().css({
		"opacity":"0",
		"transform": "translate(0px,100px)"
		});
  $(window).scroll(function (){
    $(".effect").each(function(){
      var imgPos = $(this).offset().top;    
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight/5){
        $(this).children().css({
					"opacity":"1",
					"transform": "none"
					});
      } else {
        $(this).children().css({
					"opacity":"0",
					"transform": "translate(0px,100px)"
				});
      }
    });
  });
});






//パララックス
/*
$(function () {
    var ua = navigator.userAgent;
    if (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
        // スマートフォン用コード
				$(window).scroll(function () {
					var scrollPosi = $(document).scrollTop();
					$('#topMainVisual').stop(true, true).animate({
						'background-position-y': +scrollPosi / 2 + 'px'
					}, 1000);
				});
    } else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) {
        // タブレット用コード
				$(window).scroll(function () {
					var scrollPosi = $(document).scrollTop();
					$('#topMainVisual').stop(true, true).animate({
						'background-position-y': +scrollPosi / 2 + 'px'
					}, 1000);
				});
    } else {
        // PC用コード
    }
})
*/