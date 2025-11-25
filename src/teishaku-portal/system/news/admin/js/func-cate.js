// JavaScript Document

function T_CHANGE(cate){
	$('.cate_onoff').addClass('im_vanish');
	$('.cate_onoff.c'+cate).removeClass('im_vanish');
	$('.cate_onoff_RV').removeClass('im_vanish');
	$('.cate_onoff_RV.c'+cate).addClass('im_vanish');
}
/*
function T_CHANGE_MAS(cate){
	$('.item_master').addClass('im_vanish_im');
	$('.item_master.im'+cate).removeClass('im_vanish_im');
}
*/