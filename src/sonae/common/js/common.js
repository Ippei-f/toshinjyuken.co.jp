//hbgBtn
const hbgBtn = document.getElementById('hbgBtn');

hbgBtn.addEventListener('click',()=>{
    document.body.classList.toggle('open');
});


//ヘッダ-スクロール形態変化
$(function () {
    $(window).on("scroll", function () {
        const sliderHeight = $('header').height();
        const windowWidth = $(window).width();
        
        if (windowWidth <= 767) {
            if (50 < $(this).scrollTop()) {
                $('header').addClass('headerColorScroll');
              } else {
                $('header').removeClass('headerColorScroll');
              }
        } else {
            if (sliderHeight + 50 < $(this).scrollTop()) {
                $('header').addClass('headerColorScroll');
              } else {
                $('header').removeClass('headerColorScroll');
              }
        }
    });
  });
    
//スマホ-ボトムメニュー
$(function(){
    if (window.matchMedia( "(max-width: 768px)" ).matches) {
        $(window).on("scroll", function(){ //スクロール中に判断する
            //$('#floatNav').stop(); //アニメーションしている場合、アニメーションを強制停止
            $('#spBottomBtns').css('display', 'none').delay(800).slideDown('500');
            //スクロール中は非表示にして、500ミリ秒遅らせて再び表示
        });
    }else {

    }
});
