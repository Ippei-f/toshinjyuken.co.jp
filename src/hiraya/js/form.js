// JavaScript Document

$(window).load(function(){

//validationEngine設定
$("form").validationEngine();

//必須項目初期化
$(".required").each(function(){
	INPUTEND($(this),"form");
});
$(".required").focus(function(){
	$(this).removeClass("err_bg");
	$(this).parent().find(".formError").remove();
});
/*
$("input[value=自動住所入力]").click(function(){
	$('select[name=addr1]').removeClass("err_bg");
	$('select[name=addr1]').parent().find(".formError").remove();
});
*/

//必須項目入力後処理
//$(".required").change(function(){
/*
errstop=false;
*/
$(".required").blur(function(){
	INPUTEND($(this),"form");
});
/*
$("input[type=file]").focus(function(){
	$(this).removeClass("err_bg");
	$(this).parent().find(".formError").remove();
});
*/

});//$(window).load(function(){})

//入力後処理関数
function INPUTEND(obj,type){
	flag=false;
	if(obj.parent().find(".formError").length){
		obj.addClass("err_bg");
		flag=true;
	}
	else if(obj.val()==""){
		obj.addClass("err_bg");
		flag=true;
	}
	/*
	else{
		obj.removeClass("err_bg");
	}
	*/
	return flag;//エラーがONの時true
}