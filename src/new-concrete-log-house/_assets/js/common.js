$(document).ready(function(){
	/*
	FOOTBTN_FIXED();
	*/
});
$(window).load(function(){

	//滑らかページ内リンク
	$("a[href^=#]").click(function() {    
    var target = $(this.hash);//移動先となる要素を取得
		var speed = 300;//"fast"
    if (!target.length){
			$("html,body").animate({scrollTop: 0},speed,"swing");
		}
		else{
			$("html,body").animate({scrollTop:target.offset().top},speed,"swing");
		}
    window.history.pushState(null,null,this.hash);//ハッシュ書き換え
    return false;
  });
	
	//スマホメニュー
	/*
	$(window).bind("resize load",function(){
		if($(this).width()>=1000){
			//SP→PC時のメニュー表示リセット
			$("header").removeClass('active');
			//$("header .accbox").hide();
			// $(".menubtn span:nth-of-type(2)").css("opacity",1);
		}
	});
	*/
	$("header .menubtn").click(function(){
		if(!$("header").hasClass('active')){
			//$(this).addClass('active');
			$("header").addClass('active');
			//$("header .accbox").slideDown();
		}
		else{
			//$(this).removeClass('active');
			$("header").removeClass('active');
			//$("header .accbox").slideUp();
		}
  });
	$("header .accbox a").click(function(){
		$("header").removeClass('active');
		//$("header .accbox").slideUp();
	});
	
	//スマホフッタメニュー
	/*
	$("footer .menu .btn").click(function(){
		if(!$(this).parent().parent().hasClass('active')){
			$(this).parent().parent().addClass('active');
			$(this).parent().parent().children('.link2').slideDown();
		}
		else{
			$(this).parent().parent().removeClass('active');
			$(this).parent().parent().children('.link2').slideUp();
		}
  });
	*/
	
	//スマホhover
	$("a").on("touchstart", function(){
    $(this).addClass("hover");
	}).on("touchend", function(){
    $(this).removeClass("hover");
	});
	
	//フッタボタン追従
	/*
	$(window).scroll(function(){
		FOOTBTN_FIXED();
	});
	*/
	
	/*
	その他
	$('.btn').on('click', function(){
	});
	*/
	
});