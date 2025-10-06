$(function(){

	var menu = $('#slideSideMenu'); // スライドインするメニューを指定
	var menuBtn = $('#btnMenu'); // メニューボタンを指定
	var closeBtn = $('#btnClose'); // 閉じるボタンを指定
	var menuBg = $('#slideSideMenuBg'); // メニュー領域外
	var body = $(document.body);     
	var menuWidth = menu.outerWidth();

	// メニューボタン以外をクリックした時の動き
	menuBg.click(function(){
		body.removeClass('open');
		menu.animate({'right' : -menuWidth }, 'fast');
		menuBg.fadeOut('normal');
	});

	// メニューボタンをクリックした時の動き
	menuBtn.click(function(e){
		e.stopPropagation();
		// body に open クラスを付与する
		body.toggleClass('open');
		if(body.hasClass('open')){
			// open クラスが body についていたらメニューをスライドインする
			menu.animate({'right' : 0 }, 'fast');
			menuBg.fadeIn('normal');
		} else {
			// open クラスが body についていなかったらスライドアウトする
			menu.animate({'right' : -menuWidth }, 'fast');
			menuBg.fadeOut('normal');
		}             
	});
	
	// 閉じるボタンをクリックした時の動き
	closeBtn.click(function(e){
		e.stopPropagation();
		// body に open クラスを付与する
		body.toggleClass('open');
		if(body.hasClass('open')){
			// open クラスが body についていたらメニューをスライドインする
			menu.animate({'right' : 0 }, 'fast');
			menuBg.fadeIn('normal');
		} else {
			// open クラスが body についていなかったらスライドアウトする
			menu.animate({'right' : -menuWidth }, 'fast');
			menuBg.fadeOut('normal');
		}             
	});
	
});

