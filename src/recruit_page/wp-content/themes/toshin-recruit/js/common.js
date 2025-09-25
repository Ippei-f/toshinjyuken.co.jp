// JavaScript Document

//header
$(function() {
  var $win = $(window),
      $nav = $('header'),
      navHeight = $nav.outerHeight() + 100,
      fixedClass = 'bg';

  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > navHeight ) {
      $nav.addClass(fixedClass);
    } else {
      $nav.removeClass(fixedClass);
    }
  });
});

//ドロワーメニュー
$(function() {
	$('.menu').click(function() {
		$('body').toggleClass('open');
		if ($('body').hasClass('open')) {
          $('html').css('overflow','hidden');
        } else {
          $('html').css('overflow','scroll');
        }    
    });
});