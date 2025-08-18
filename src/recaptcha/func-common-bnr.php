<?php
//<meta charset="utf-8">
/*

東新住建のブランドが多くなってきたので、そろそろファイル一つで管理できるようにする

↓コピペして差分ファイルを読み込む
$toushin_bnr_type='';
require $kaisou.(($democheck=='')?'../recaptcha/':'../toushin-recaptcha/').'func-common-bnr.php';
*/
require_once $toushin_bnr_url.'func-common-bnr-func.php';

//共通バナーデータベース
$toushin_bnr_arr=array
(''//空白
//--------------------
,'20230301'=>array
	('url'=>''
	,'bnr600'=>'bnr_hiraya-california~20230301.jpg'
	,'date'=>'YmdH'
	,'s'=>2023030100
	,'e'=>2023040107
	)
/*
//--------------------
,'20230113-out'=>array
	('url'=>''
	,'bnr500'=>'bnr-20230113-B.jpg'
	,'bnr882'=>'bnr-20230113-A.jpg'
	,'date'=>'YmdH'
	,'s'=>2023011300
	,'e'=>2023020607
	)
//--------------------
,'20230113'=>array
	('url'=>''
	,'bnr500'=>'bnr-20230113-C.jpg'
	,'bnr882'=>'bnr-20230113-D.jpg'
	,'date'=>'YmdH'
	,'s'=>2023011300
	,'e'=>2023020607
	)
*/
//--------------------
);
unset($toushin_bnr_arr[0]);//空白削除

switch($toushin_bnr_type){
//------------------
case '東新住建の家・TOP':
?>
<ul class="top_bnrbox_2021">
<?php
/*
$toushin_bnr_arr['20230113']['url']='news.php?id=69';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230113'],'882');
*/
?>
<div style="width:100%;margin:0;"></div>
<li><a href="news.php?id=41"><img src="images/top/bnr/bnr-weekday.jpg"></a></li>
<?php //echo TOUSHIN_COMMON_BNR_SET(500); ?>
</ul>
<?php
break;
//------------------
case '東新住建の家・物件検索':
?>
<style>
.top_bnrbox_2021{
	display: flex;
	flex-direction: column;
	align-items: center;
}
.top_bnrbox_2021 li:last-child{margin-bottom: 3em;}
<?php
/*
.top_bnrbox_2021 img[src*="bnr-2022sumaihaku"]{width:350px;}
*/
?>
</style>
<ul class="content_box top_bnrbox_2021" style="min-height: 0;">
<?php
/*
$toushin_bnr_arr['2022sumaihaku']['url']='news.php?id=60';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['2022sumaihaku'],'882-v2');
*/
?>
</ul>
<?php
break;
//------------------
case 'そだつプロジェクト・TOP':
echo TOUSHIN_COMMON_MOVIE_BNR(array
('movie'=>'QnJLQKL2Jdk'
,'bnr'=>'bnr-20220613movie.png'
,'bnr-text1'=>array('bnr-20220613movie-text1.svg','w'=>424)
));
?>
<style>
.top_bnrbox_2021.W441{width:922px;}
.top_bnrbox_2021.W441 a{width:441px;}
</style>
<ul class="top_bnrbox_2021 W441">
<li><a href="https://www.toshinjyuken.co.jp/sodatsu/lgbtq/" target="_blank"><img src="images/top/so/bnr-lgbt.jpg"></a></li>
<li><a href="https://www.toshinjyuken.co.jp/sodatsu/chuuko-hikaku/" target="_blank"><img src="images/top/so/bnr-chuko.jpg"></a></li>
<div style="width:100%;margin:0;"></div>
<?php
/*
$toushin_bnr_arr['20230113']['url']='news.php?id=65';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230113'],'882');
*/
?>
<?php //echo TOUSHIN_COMMON_BNR_SET(441); ?>
</ul>
<?php
break;
//------------------
case 'そだつプロジェクト・物件情報':
?>
<style>
.top_bnrbox_2021{}
.top_bnrbox_2021 li:nth-child(1){margin-top: 0;}
.top_bnrbox_2021 li:last-child{margin-bottom: 3em;}
@media screen and (min-width: 1000px) {
	.top_bnrbox_2021 li:first-child{margin-top: -3em;}
}
</style>
<div class="content_box"><ul class="top_bnrbox_2021">
<?php
/*
$toushin_bnr_arr['2022sumaihaku']['url']='news.php?id=58';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['2022sumaihaku'],882);
*/
?>
</ul></div>
<?php
break;
//------------------
case 'そだつプロジェクト・LGBT・上部':
?>
<style>
.top_bnrbox_2023{}
.top_bnrbox_2023 li{
	display: flex;
	justify-content: center;
}
.top_bnrbox_2023 li:last-child{margin-bottom: 3em;}
.top_bnrbox_2023 li img{max-width: 100%;}
@media screen and (max-width: 999px) {
	.top_bnrbox_2023 li:last-child{margin-bottom: 1em;}
}
</style>
<div class="content_box"><ul class="top_bnrbox_2023">
<?php
/*
$toushin_bnr_arr['20230113']['url']='../news.php?id=65';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230113'],'882');
*/
?>
</ul></div>
<?php
break;
//------------------
case 'そだつプロジェクト・LGBT':
echo TOUSHIN_COMMON_MOVIE_BNR(array
('movie'=>'QnJLQKL2Jdk'
,'bnr'=>'bnr-20220613movie.png'
,'bnr-text1'=>array('bnr-20220613movie-text1.svg','w'=>424)
,'bnr-text2'=>array('bnr-20220613movie-text2a.svg','w'=>748)
));
?>
<ul style="margin-top: 1em;">
<li><a href="/sodatsu/voice.php">
<img src="../../recaptcha/bnr/bnr-sodatsu-voice-ver2.png" class="pcOnly" style="max-width: 100%;">
<img src="../../recaptcha/bnr/bnr-sodatsu-voice-ver2-sp.png" class="spOnly" style="max-width: 100%;"></a>
</li>
</ul>
<?php
break;
//------------------
case 'そだつプロジェクト・中古':
//echo TOUSHIN_COMMON_BNR_SET(441,'中古');
?>
<style>
.top_bnrbox_2023{margin-top: 3em;}
.top_bnrbox_2023 li{
	display: flex;
	justify-content: center;
}
.top_bnrbox_2023 li:last-child{margin-bottom: 3em;}
.top_bnrbox_2023 li img{max-width: 100%;}
@media screen and (max-width: 999px) {
	.top_bnrbox_2023 li:last-child{margin-bottom: 1em;}
}
</style>
<div class="content_box"><ul class="top_bnrbox_2023">
<?php
/*
$toushin_bnr_arr['20230113']['url']='../news.php?id=65';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230113'],'882');
*/
?>
</ul></div>
<?php
break;
//------------------
case 'そだつプロジェクト・中古-MOVIE':
echo TOUSHIN_COMMON_MOVIE_BNR(array
('movie'=>'QnJLQKL2Jdk'
,'bnr'=>'bnr-20220613movie.png'
,'bnr-text1'=>array('bnr-20220613movie-text1.svg','w'=>424)
,'bnr-text2'=>array('bnr-20220613movie-text2b.svg','w'=>748)
));
?>
<ul style="margin-top: 1em;">
<li><a href="/sodatsu/voice.php">
<img src="../../recaptcha/bnr/bnr-sodatsu-voice-ver2.png" class="pcOnly" style="max-width: 100%;">
<img src="../../recaptcha/bnr/bnr-sodatsu-voice-ver2-sp.png" class="spOnly" style="max-width: 100%;"></a>
</li>
</ul>
<?php
break;
//------------------
case 'DUPHILLS・TOP':
?>
<ul class="top_bnrbox_2021">
<?php
/*
$toushin_bnr_arr['2022sumaihaku']['url']='news.php?id=29';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['2022sumaihaku'],'882-v2');
*/
?>
<div style="width:100%;margin:0;"></div>
<li><a href="news.php?id=9"><img src="images/top/bnr/bnr-weekday.jpg"></a></li>
<?php //echo TOUSHIN_COMMON_BNR_SET(500); ?>
</ul>
<?php
break;
//------------------
case 'DUPHILLS・物件情報':
?>
<ul class="top_bnrbox_2021">
<?php
/*
$toushin_bnr_arr['2022sumaihaku']['url']='news.php?id=29';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['2022sumaihaku'],882);
*/
?>
</ul>
<?php
break;
//------------------
case 'テイシャク・TOPスライダー直下':
?>
<style>
.top_bnrbox_teishaku li{
	display: flex;
	justify-content: center;
	align-items: center;
}
.top_bnrbox_teishaku li:nth-child(n+2){margin-top: 20px;}
.top_bnrbox_teishaku li a{display: block;}
.top_bnrbox_teishaku li img[src*="bnr-2022sumaihaku"]{width: 500px;}
.top_bnrbox_teishaku li.bnr20221209{margin-top: 10px; flex-wrap: wrap;}
.top_bnrbox_teishaku li.bnr20221209 a{margin: 10px;}
.top_bnrbox_teishaku li.bnr20221209 a img{width:auto;height:150px;}
</style>
<ul class="content_box top_bnrbox_teishaku">
<?php
/*
$toushin_bnr_arr['20230113-out']['url']='news.php?id=43';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230113-out'],'500');
*/
$toushin_bnr_arr['20230301']['url']='news.php?id=43';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230301'],'600');
?>
<div style="width:100%;margin:0;"></div>
<li class="bnr20221209">
<a href="news.php?id=38" class="bnr20221209"><img src="../recaptcha/bnr/bnr-20221209-ichinomiya.svg"></a>
<a href="news.php?id=39" class="bnr20221209"><img src="../recaptcha/bnr/bnr-20221209-kiyosu.svg"></a>
</li>
</ul>
<?php
break;
//------------------
case 'テイシャク・TOP':
?>
<ul class="content_box top_bnrbox_teishaku">
<li><a href="<?php echo $link_list['外部-無人で物件見学'][0]; ?>"><img src="images/bnr/bnr-mujin.jpg"></a></li>
<?php //echo TOUSHIN_COMMON_BNR_SET(441); ?>
</ul>
<?php
break;
//------------------
case 'テイシャク・物件情報':
?>
<style>
.top_bnrbox_teishaku li{
	display: flex;
	justify-content: center;
	align-items: center;
}
.top_bnrbox_teishaku li:nth-child(n+2){margin-top: 20px;}
.top_bnrbox_teishaku li a{display: block;}
.top_bnrbox_teishaku li img[src*="bnr-2022sumaihaku"]{width: 441px;}
</style>
<ul class="content_box top_bnrbox_teishaku">
<?php
/*
$toushin_bnr_arr['2022sumaihaku']['url']='news.php?id=35';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['2022sumaihaku'],'882-teishaku');
*/
?>
</ul>
<?php
break;
//------------------
case '平屋・TOP':
?>
<style>
.top_bnrbox_hiraya{}
.top_bnrbox_hiraya li{
	display: flex;
	justify-content: center;
	align-items: center;
}
.top_bnrbox_hiraya li:nth-child(n+2){margin-top: 20px;}
.top_bnrbox_hiraya li:last-child{margin-bottom: 70px;}
.top_bnrbox_hiraya li a{display: block;}
.top_bnrbox_hiraya li img[src*="bnr-2022sumaihaku"]{width: 500px;}
@media screen and (max-width: 999px) {
	.top_bnrbox_hiraya li:last-child{margin-bottom: 40px;}
}
</style>
<ul class="content_box top_bnrbox_hiraya">
<?php
$toushin_bnr_arr['20230301']['url']='news.php?id=29';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230301'],'600');
/*
$toushin_bnr_arr['20230113-out']['url']='news.php?id=29';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230113-out'],'882');
$toushin_bnr_arr['20230113']['url']='news.php?id=24';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['20230113'],'882');
*/
?>
</ul>
<?php
break;
//------------------
case '平屋・物件情報':
?>
<style>
.top_bnrbox_hiraya{}
.top_bnrbox_hiraya li{
	display: flex;
	justify-content: center;
	align-items: center;
}
.top_bnrbox_hiraya li:nth-child(n+2){margin-top: 20px;}
.top_bnrbox_hiraya li:last-child{margin-bottom: 70px;}
.top_bnrbox_hiraya li a{display: block;}
.top_bnrbox_hiraya li img[src*="bnr-2022sumaihaku"]{width: 500px;}
@media screen and (max-width: 999px) {
	.top_bnrbox_hiraya li:last-child{margin-bottom: 40px;}
}
</style>
<ul class="top_bnrbox_hiraya">
<?php
/*
$toushin_bnr_arr['2022sumaihaku']['url']='news.php?id=15';
echo TOUSHIN_COMMON_BNR($toushin_bnr_arr['2022sumaihaku'],882);
*/
?>
</ul>
<?php
break;
//------------------
}
?>