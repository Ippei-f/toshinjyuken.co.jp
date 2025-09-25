// JavaScript Document
$(function() {
  $.scrollify({
    section:'.fullscreen', //対象要素を指定
    easing: "easeOutExpo", // イージングを指定
    scrollSpeed: 1100, // スクロール時の速度
    updateHash: false, // スクロール時アドレスバーのURLを更新
    setHeights:false,
    interstitialSection:'footer',
    overflowScroll: true,
    standardScrollElements:'#about',
    before: function(i,panels) {
      var ref = panels[i].attr("data-section-name");
      
      if(ref==="ideal") {
      $(".linewrap").find(".line").css({ height: "0", });
      $(".linewrap").addClass("show2");
      }
      if(ref==="crew") {
      $(".linewrap").find(".line").css({ height: "15.5%", });
      }
      if(ref==="compass") {
      $(".linewrap").find(".line").css({ height: "40.5%", });
      }
      if(ref==="discovery") {
      $(".linewrap").find(".line").css({ height: "63.5%", });
      }
      if(ref==="sdgs") {
      $(".linewrap").find(".line").css({ height: "87.5%", });
      }
      if(ref==="recruit") {
      $(".linewrap").find(".line").css({ height: "100%", });
      }
    },
  });
});  


//動画切り替え
$(function(){
    $('.fullscreen').each(function(i, elem){
        var contentsPOS = $(elem).offset().top;
        $(window).on('load scroll resize', function(){
            var winHeight = $(window).height();
            var scrollTop = $(window).scrollTop();
            var showClass = 'show';
            var timing = winHeight / 2;
            if (scrollTop >= contentsPOS - winHeight + timing) {
              $(elem).addClass(showClass);
            } else {
              $(elem).removeClass(showClass);
            }
        });
    });
});

//スムーズスクロール
$(function () {
  $('a[href^="#"]').click(function () {
    var position = 0;
    var speed = 200;
    $("html, body").animate({
      scrollTop: position
    }, speed, "swing");
    return false;
  });
});


//スマホフローティングバナー表示
$(function(){
  var timer;
  
  $(window).scroll(function() {
    $(".floating").removeClass('active');
    clearTimeout(timer);
    timer = setTimeout(function() {
      if($(this).scrollTop()) {
        $(".floating").addClass('active');
      }else{
        $(".floating").removeClass('active');
      }
    }, 0);
  });
});
