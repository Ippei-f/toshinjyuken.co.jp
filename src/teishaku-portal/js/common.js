// JavaScript Document

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
	$(window).bind("resize load",function(){
		/*
		if($(this).width()>=1000){
			//SP→PC時のメニュー表示リセット
			$(".menubtn > div").removeClass('active');
			$(".menubtn span:nth-of-type(2)").css("opacity",1);
		}
		*/
	});
	$("header .menubtn").click(function(){
		if(!$(this).hasClass('active')){
			$(this).addClass('active');
			$("header .accbox > *").slideDown();
		}
		else{
			$(this).removeClass('active');
			$("header .accbox > *").slideUp();
		}
  });
	$("header .accbox a").click(function(){
		$("header .menubtn").removeClass('active');
		$("header .accbox > *").slideUp();
		/*
		mb_obj.animate({opacity:1},"fast",function(){
			$(this).queue([]);	// queueを空にする
    	$(this).stop();		// アニメーション停止
		});
		*/
	});
	
	//スマホサブメニュー
	/*
	$("header .accbox .btn").click(function(){
		if(!$(this).parent().hasClass('active')){
			$(this).parent().addClass('active');
			$(this).parent().children('.acc').slideDown();
		}
		else{
			$(this).parent().removeClass('active');
			$(this).parent().children('.acc').slideUp();
		}
  });
	$("header .accbox .acc a").click(function(){
		$(this).parent().parent().removeClass('active');
		$(this).parent().slideUp();
	});
	*/
	
	//スマホhover
	$("a").on("touchstart", function(){
    $(this).addClass("hover");
	}).on("touchend", function(){
    $(this).removeClass("hover");
	});
	
	//ページトップボタン
	/*
	var pt_btn = $('#pagetop_btn a');	
	pt_btn.show();
  $(window).scroll(function(){
		if ($(this).scrollTop()+$(window).height()+$('#footer').height() > $("body").height()) {
    	pt_btn.removeClass('active');
		}
  	else if ($(this).scrollTop() > 100) {
			pt_btn.addClass('active');
		}
    else {
			pt_btn.removeClass('active');
		}
  });
	*/
	
	//スマホページトップ追従ボタン
	var pt_btn = $('#pagebottom_btn > *');
	$(window).scroll(function(){
		if($(this).scrollTop()+$(window).height()+$('footer').height() > $("body").height()) {
			pt_btn.fadeOut();
		}
		else{
			pt_btn.fadeIn();
		}
		/*
  	else if ($(this).scrollTop() > 100) {
			pt_btn.addClass('active');
		}
    else {
			pt_btn.removeClass('active');
		}
		*/
  });
	
	//フッタボタン追従
	/*
	FOOTBTN_FIXED();
	$(window).scroll(function(){
		FOOTBTN_FIXED();
	});
	*/
	
	//共通スクロールフェード
	/*
	delay=300;
	$(".fade_gimmick").each(function (i) {
    if((SCR_BASELINE() > $(this).offset().top)&&(!$(this).find('.motion').hasClass('show'))){
			$(this).find('.motion').addClass('show');
		}
  });
	$(".fade_chain .m1").each(function (i) {
  	if((SCR_BASELINE() > $(this).offset().top)&&(!$(this).find('.motion').hasClass('show'))){
			$(this).find('.motion').addClass('show');
			for(i=2;i<=8;i++){
				$(this).parents(".fade_chain").find('.m'+i+' .motion').delay(delay*(i-1)).queue(function(){
					$(this).addClass('show').dequeue();
    		});
			}
		}
  });
	$(window).scroll(function(){
		$(".fade_gimmick").each(function (i) {
      if((SCR_BASELINE() > $(this).offset().top)&&(!$(this).find('.motion').hasClass('show'))){
				$(this).find('.motion').addClass('show');
			}
    });
		$(".fade_chain .m1").each(function (i) {
      if((SCR_BASELINE() > $(this).offset().top)&&(!$(this).find('.motion').hasClass('show'))){
				$(this).find('.motion').addClass('show');
				for(i=2;i<=8;i++){
					$(this).parents(".fade_chain").find('.m'+i+' .motion').delay(delay*(i-1)).queue(function(){
						$(this).addClass('show').dequeue();
    			});
				}
			}
    });
	});
	*/

});

//スクロールフェード基準線関数
function SCR_BASELINE(per){
	win_height=$(window).height();
	if(per==null){per=85;}
	switch(per){
		case 'T':win_height=0;
		break;
		case 'B':
		break;
		default:win_height=win_height*per/100;
	}
	return $(window).scrollTop()+win_height;
}

//フッタボタン追従切り替え
/*
function FOOTBTN_FIXED(){
	var border=$("#footer").offset().top;
	var win_bottom=$(this).scrollTop()+$(window).height();
	//$(".f_btn .line").text(win_bottom+' '+border);
	if (win_bottom >= border) {
		$(".f_btn_set").removeClass("fixed");
	}
	else {
		$(".f_btn_set").addClass("fixed");
	}
}
*/

/*
		
	//PCポップアップ
	var pcpop_now=-1;
	var pcpop_out=true;
	var pcpop_flag=Array();//表示完了フラグ
	$("header .hmenu_pc td > div").each(function(){
		pcpop_flag[$(this).attr('num')]=false;
	});
	
	$("header .hmenu_pc td > div").hover(function() {
		pcpop_out=false;
		pcpop_select=$(this).attr('num');
		if(pcpop_now>-1){
			$("header .hmenu_pc td > div").each(function(){
				num=$(this).attr('num');
				if((pcpop_select!=num)&&(pcpop_flag[num])){
					PCPOP_SLIDEUP($(this),num);
				}
			});
		}
		POPOP_SLIDEDOWN($(this),pcpop_select);
		pcpop_now=$(this).attr('num');
	},function(){
		pcpop_out=true;
	});
	$("html,body").click(function(){
		if(pcpop_out){
			$("header .hmenu_pc td > div").each(function(){
				num=$(this).attr('num');
				PCPOP_SLIDEUP($(this),num);
			});
		}
	});
	
	function POPOP_SLIDEDOWN(obj,num){
		obj.css('z-index','1002');
		obj.find('.pop').slideDown(200,function(){
			$(this).find('div').animate({opacity:1},200,function(){
				pcpop_flag[num]=true;
				$(this).queue([]);// queueを空にする
    		$(this).stop();		// アニメーション停止
			});
		});
	}
	function PCPOP_SLIDEUP(obj,num){
		pcpop_flag[num]=false;
		obj.css('z-index','1001');
		obj.find('.pop > div').animate({opacity:0},200,function(){
			$(this).parent().slideUp(200,function(){
			});
		});
	}	
	
	//スマホフッタメニュー
	$("#footer .fmenu_sp li h3").click(function(){
		if($(this).parent().find(".accordion").css('overflow')!='hidden'){
			if($(this).parent().find(".accordion").css('display')!='none'){
				$(this).removeClass("open");
				$(this).parent().find(".accordion").slideUp("normal",function(){
					$(this).queue([]);	// queueを空にする
    			$(this).stop();		// アニメーション停止
				});
  		}
			else{
				$(this).addClass("open");
				$(this).parent().find(".accordion").slideDown("normal",function(){
					$(this).queue([]);	// queueを空にする
    			$(this).stop();		// アニメーション停止
				});
			}
		}
	});
*/