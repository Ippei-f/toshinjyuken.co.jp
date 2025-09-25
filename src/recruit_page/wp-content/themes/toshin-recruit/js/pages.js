// JavaScript Document

/*----------------------------------------
アンカーリンク ヘッダー固定分
----------------------------------------*/

$(function () {
    var headerHight = 80;
    $('a[href^="#"]').click(function () {
      var href = $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      var position = target.offset().top - headerHight;
      $("html, body").animate({ scrollTop: position }, 800, "swing");
      return false;
    });
  });

/*----------------------------------------
タブアコーディオン切り替え
----------------------------------------*/
$(function() {
  //スマホで見た時
  if (window.matchMedia( '(max-width: 834px)' ).matches) {
    $(".panel .content").hide();
	$(".panel .ttl").on("click", function() {
		$(this).next('div').slideToggle();
		$(this).toggleClass('is-active');
	});
  //PCで見た時
  } else {
	$('.tabmenu > ul > li:first-child').addClass('is-active');
	$('.tabmenu > ul + .panel').addClass('is-show');
    $('.tabmenu li').click(function(){
        const group = $(this).parents('.tabmenu'); 
        group.find('.is-active').removeClass('is-active');
        $(this).addClass('is-active');
        group.find('.is-show').removeClass('is-show');
        const index = $(this).index();
        group.find(".panel").eq(index).addClass('is-show');
    });
 };
});

/*----------------------------------------
スマホタブレットでhoverの動き無効化
----------------------------------------*/
var touch = 'ontouchstart' in document.documentElement || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
if(touch) {
  try {
    for (var si in document.styleSheets) {
      var styleSheet = document.styleSheets[si];
      if (!styleSheet.rules) continue;
      for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
        if (!styleSheet.rules[ri].selectorText) continue;
        if (styleSheet.rules[ri].selectorText.match(':hover')) {
          styleSheet.deleteRule(ri);
        }
      }
    }
  } catch (ex) {}
}


/*----------------------------------------
動画のモーダル
----------------------------------------*/
$(function(){
$(".video-open").modaal({
	type: 'video',
	overlay_close:true,//モーダル背景クリック時に閉じるか
	background: '#000000', // 背景色
	overlay_opacity:0.8, // 透過具合
	before_open:function(){// モーダルが開く前に行う動作
		$('html').css('overflow-y','hidden');/*縦スクロールバーを出さない*/
	},
	after_close:function(){// モーダルが閉じた後に行う動作
		$('html').css('overflow-y','scroll');/*縦スクロールバーを出す*/
	}
});
});

/*----------------------------------------
kvオーバーレイ
----------------------------------------*/
$(function() {
	setTimeout(function(){
		$('.overlay img').fadeIn(1600);
	},500); //0.5秒後にロゴをフェードイン
	setTimeout(function(){
		$('.overlay').fadeOut(1600);
	},100); //2.5秒後にロゴ含め真っ白背景をフェードアウト
});


/*----------------------------------------
mwwpform 確認画面後、リセットリセット効かせる
----------------------------------------*/
$('#Reset').on('click' , function() {
	location.reload();
});