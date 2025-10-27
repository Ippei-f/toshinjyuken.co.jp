<?php
if(false){//requireで読み込む時は除外
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ログインボックス</title>
<link href="../css/common.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="Wmax1200 mgnLR50"><div class="detail_box font_meiryo" style="padding-top:0;">
<?php
}//-----------------------------------

//◆ログインボックス　※ログインしていない時に出現
if(!isset($_SESSION['member'])){
?>
<!-- login -->
<script>
$(window).load(function(){
	$(".login_box .bg_FFF").hover(
    function(){login_box_out=false;},
    function(){login_box_out=true;}
  );
	/*
	$(".login_window").click(function(){
		$(".login_box").fadeIn();
		$(".login_box form").prop("action",$(this).attr("href"));
	});
	*/
	//動的に生成したリンクでも会員ログインのポップアップを表示するようにする
	$(document).on("click",".login_window", function(){
		$(".login_box").fadeIn();
		$(".login_box form").prop("action",$(this).attr("href"));
	});
	$(".login_box").click(function(){
		if(login_box_out){$(".login_box").fadeOut();}
  });
	$(".login_box .closebtn").click(function(){
		$(".login_box").fadeOut();
	});
});
</script>
<div class="login_box"><div class="flex">
<div class="bg_FFF radius10 font_meiryo">
<img src="<?php echo $kaisou; ?>images/common/closebtn-k.svg" class="dpB closebtn">
<div class="part_top">
<?php
/*
<img src="<?php echo $kaisou; ?>images/common/logo.svg" class="dpB icon_members_only">
*/
echo '<div class="icon_members_only">'.file_get_contents($kaisou.'images/common/logo.svg').'</div>';
?>
<div class="LH175 fontP120 font_min login_text"><?php echo WORD_BR('こちらは<strong>会員限定ページ</strong>となります。
ログインID、パスワードをご入力ください。'); ?></div>
<form action="" method="post" class="mgnAuto">
<table border="0" cellpadding="0" cellspacing="0" class="W100per fontP120"><tr>
<td style="width:6em;">ログインID</td>
<td><input type="text" name="login_id" class="W100per LH150"></td>
</tr><tr>
<td>パスワード</td>
<td><input type="text" name="login_pw" class="W100per LH150"></td>
</tr></table>
<input type="hidden" name="login_check" value="on">
<div class="textC mgnT0_5em"><input class="login_btn" type="submit" name="login" value="ログイン"></div>
</form>
</div>

<div class="login_text2 mgnAuto radius10">
<div class="LH175 lb_text">
<div class="font_min">ログインID、パスワードをお持ちでない方は、下記より会員登録をお願いいたします。新着物件の優先的なご案内や、会員様限定ページをご覧いただくことができます。</div>
<a href="<?php echo $link_list['会員登録'][0] ;?>" class="login_member_btn font_bold textC"><?php echo WORD_BR('会員登録はこちらから'); ?></a>
</div></div>

<div class="clear"></div>
</div>
</div></div>
<!-- login -->
<?php
}

//-----------------------------------
if(false){//requireで読み込む時は除外
?>
</div></div>
</body>
</html>
<?php
}
?>