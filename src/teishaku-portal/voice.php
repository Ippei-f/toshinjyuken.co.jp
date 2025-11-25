<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'voice/img/';
$p_title='お客様の声';
require $kaisou."temp_php/basic.php";

$voice_id=isset($_GET['v'])?$_GET['v']:'';
//$voice_id=1;//1ページしかないのでいきなり表示
$voice_id_02d=is_numeric($voice_id)?sprintf('%02d',$voice_id):$voice_id;

require $kaisou."voice/func.php";
require $kaisou."voice/data.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
<style>
<?php
if($voice_id!=''){
?>
.voice_title{
	background-color: #ECEEE4;
	color:#000;
	display: flex;
	padding: 5px 0;
	font-size: 100%;
	border-top:solid 1px rgba(35,24,21,0.25);
}
.voice_title *{line-height: 100%;}
.voice_title > *{
	display: flex;
	align-items: center;
	padding: 5px 0;
}
.voice_title > *:nth-child(1){
	width:100px;
	flex-direction: column;
	font-size: 150%;
	text-align: center;
}
.voice_title > *:nth-child(1) > div{font-size: 50%;margin-bottom: 0.25em;}
.voice_title > *:nth-child(2){
	font-size: 125%;
	line-height: 125%;
	padding-left: 1em;
	padding-right: 1em;
	text-align: left;
	border-left: solid 2px #FFF;
}
.voice_mainpic{
	display: flex;
	align-items: center;
}
.voice_mainpic > *{width:50%;}
.voice_mainpic > div{text-align: left;}
.voice_mainpic > div > h3{
	color:#314048;
	font-size: 125%;
	line-height: 100%;
	font-weight: normal;
	border-bottom: solid 1px rgba(35,24,21,0.25);
	padding-bottom: 0.5em;
	margin-bottom: 0.5em;
}
.voice_mainpic > div > div{
	font-size: 90%;
	line-height: 150%;
}
.voice_box{
	margin-top: 3em;
	text-align: left;
}
.voice_box h4{
	color:#04AA89;
	font-size: 125%;
	line-height: 150%;
	margin-bottom: 0.5em;
}
.voice_box .text{line-height: 200%;}
.voice_box .text .name{color:#FF7800;}
.voice_box .pic_flex{
	display: flex;
	justify-content: space-between;
	align-items: flex-end;
}
@media screen and (min-width: 1000px) {
	.voice_mainpic > div{padding-left: 5.3%;}
	.voice_box img{
		margin-bottom: 1em;
		transform: translateY(0.5em);
	}
	.voice_box img.floatR_pc{margin-left: 1em;}
	.voice_box img.floatL_pc{margin-right: 1em;}
	.voice_box .text + .pic_flex{margin-top: 1em;}
}
@media screen and (max-width: 999px) {
	.voice_title > *:nth-child(1){min-width: 2.5em;}
	.voice_mainpic{flex-direction: column;}
	.voice_mainpic > *{width:100%;}
	.voice_mainpic > div{
		display: flex;
		flex-direction: column;
		margin-top: 30px;
	}
	.voice_mainpic > div > div{font-size: 75%;}
	.voice_box{
		display: flex;
		flex-direction: column;
	}
	.voice_box h4{order:1;}
	.voice_box .text{order:2;}
	.voice_box img,
	.voice_box .pic_flex{order:3;}
	.voice_box img,
	.voice_box .pic_flex img{
		margin: 1.5em auto 0;
		max-width: 100%!important;
	}
	.voice_box .pic_flex{flex-direction: column;}
	.voice_box .clear{order: 4;}
}
.btn_bgLtoR.colW.pink .border{border: solid 1px #FF64A5;}
.btn_bgLtoR.colW.pink > *:before{background-color: #FF64A5;}
.btn_bgLtoR.colW.pink > * > span{color: #FF64A5;}
.btn_bgLtoR.colW.pink:hover > * > span{color: #FFF;}
<?php
}
else{
?>
.pan > div{border-bottom: none;}
.voice_p_title{
	display: flex;
	justify-content: center;
  align-items: center;
	height:255px;
	background-image: url(voice/img/list/bg-title.jpg);
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	font-size: 36px;
	line-height: 100%;
	color:#E4FD52;
}
/* .voice_p_title img{width:282px;} */
.voice_catch{
	padding: 40px 0;
	font-size: 87.5%;
	line-height: 200%;
}
.voice_list{
	display: flex;
	flex-wrap: wrap;
}
.voice_list > *{
	display: flex;
	flex-direction: column;
}
@media screen and (min-width: 1310px) {
	.voice_list > *{
		width:33%;
		margin-left: 0.5%;
	}
	.voice_list > *:nth-child(3n+1){margin-left: 0;}
	.voice_list > *:nth-child(n+4){margin-top: 0.5%;}
}
@media screen and (min-width: 1000px) and (max-width: 1309px) {
	.voice_list > *{
		width:49.75%;
		margin-left: 0.5%;
	}
	.voice_list > *:nth-child(2n+1){margin-left: 0;}
	.voice_list > *:nth-child(n+3){margin-top: 0.5%;}
}
@media screen and (max-width: 999px) {
	.voice_list > *{width:100%;}
	.voice_list > *:nth-child(n+2){margin-top: 0.5%;}
}
.voice_list > * img{
	width: 100%;
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
}
.voice_list > * .t1{
	display: flex;
	flex-grow: 1;
	background-color: #ECEEE4;
	padding: 5px 0;
}
.voice_list > * .t1 > *:nth-child(1){
	font-size: 200%;
	line-height: 100%;
	font-weight: bold;
	border-right:solid 1px rgba(35,24,21,0.3);
	padding: 5px 0;
	width:2.125em;
	min-width: 2.125em;
	display: flex;
	flex-direction: column;
	justify-content: center;
}
.voice_list > * .t1 > *:nth-child(1) > *{
	font-size: 33%;
	line-height: 125%;
}
.voice_list > * .t1 > *:nth-child(2){
	text-align: left;
	display: flex;
	flex-direction: column;
	justify-content: center;
	padding: 0 1em;
	font-size: 96%;
	line-height: 125%;
	color:#004ea3;
}
.voice_list > * .t2{
	flex-grow: 1;
	background-color: #FEFADA;
	text-align: left;
	padding: 0.5em 1em;
	font-size: 75%;
	line-height: 125%;
}
@media screen and (max-width: 999px) {
	.voice_list > * .t1 > *:nth-child(2){
		font-size: 92%;
		padding-right: 0.5em;
	}
}
<?php
}
?>
</style>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php
if($voice_id!=''){
//詳細
echo CONTENT_PAD(100,'sp/2');
echo CONTENT_SUBT_MINI($link_list[$p_title]['en'],'- '.$link_list[$p_title][1].' -');
echo CONTENT_PAD(60,'sp/2');
?>
<div class="content_box"><div class="Wbase W1200">
<?php
$case_num=isset($voice_data[$voice_id_02d]['仮番号'])?$voice_data[$voice_id_02d]['仮番号']:$voice_id;
echo '<h2 class="voice_title">
<div><div>CASE</div>'.$case_num.'</div>
<div>'.WORD_BR($voice_data[$voice_id_02d]['タイトル'],false).'</div>
</h2>'.chr(10);
?>
<div class="Wbase">
<?php
if($voice_data[$voice_id_02d]['家族構成']!=''){
	$voice_data[$voice_id_02d]['家族構成']='ご家族構成：'.$voice_data[$voice_id_02d]['家族構成'];
	if($voice_data[$voice_id_02d]['入居日']!=''){
		$voice_data[$voice_id_02d]['入居日']='（'.$voice_data[$voice_id_02d]['入居日'].'）';
	}
}
echo CONTENT_PAD(70,'sp/2');
echo '<div class="voice_mainpic">
<img src="voice/img/'.$voice_id_02d.'/mainpic.jpg">
<div>
<h3>'.$voice_data[$voice_id_02d]['住所名前'].'</h3>
<div>'.$voice_data[$voice_id_02d]['家族構成'].$voice_data[$voice_id_02d]['入居日'].'</div>
</div>
</div>'.chr(10);

//文章差分読み込み（無い場合はスルー）
include_once $kaisou."voice/".$voice_id_02d.".php";
?>
</div>
<?php echo CONTENT_PAD(100); ?>
<?php echo EFFECT_BTN('物件一覧','すべての物件を見る'/*,array('class'=>'colYG','arrow'=>true)*/); ?>
<?php echo CONTENT_PAD(100); ?>
</div></div>
<?php
}
else{
//一覧
?>
<h2 class="voice_p_title">お客様の声</h2>
<div class="content_box"><div class="Wbase W1200">
<div class="voice_catch sp_textL"><?php echo WORD_BR('東新住建のテイシャクをご購入いただいたお客様に、お引き渡し後にお話をお聞きしました。
なぜ東新住建のテイシャクを選んだのか、実際の住み心地はどうなのか、「リアルな声」をご紹介します。'); ?></div>
<div class="voice_list">
<?php
//配列を逆順にする
$voice_data=array_reverse($voice_data,true);

foreach($voice_data as $k => $v){
	$add=($v['家族構成']!='')?'／ご家族構成：':'';
	$n=is_numeric($k)?sprintf('%01d',$k):$k;
	$case_num=isset($v['仮番号'])?$v['仮番号']:$n;
	echo '<a href="'.$link_list['お客様の声'][0].'?v='.$n.'" title="CASE'.$case_num.'：'.WORD_BR($v['タイトル'],false).'">
<img src="images/common/clear-W396H250.png" style="background-image: url('.$kaisou.'voice/img/'.$k.'/mainpic.jpg);">
<div class="t1"><div><div>CASE</div>'.$case_num.'</div><div>'.WORD_BR($v['タイトル']).'</div></div>
<div class="t2">'.$v['住所名前'].$add.$v['家族構成'].'</div>
</a>'.chr(10);
}
?>
</div >
<?php echo CONTENT_PAD(100); ?>
</div></div>
<?php
}
?>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>