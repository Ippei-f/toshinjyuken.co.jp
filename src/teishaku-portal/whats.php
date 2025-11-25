<?php
$p_type='content';
$kaisou='';
$p_title='定期借地';
$dir=$kaisou.'images/content/whats/';
require $kaisou."temp_php/basic.php";

require $kaisou."temp_php/temp_topparts.php";//TOPと定期借地共通部分
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/top.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
<style>
.local_flex1{
	display: flex;
	justify-content: space-between;
	text-align: left;
}
.local_flex1 li{flex-grow: 1;}
.local_flex1 li h3{
	display: flex;
	align-items: flex-start;
	font-size: 100%;
	margin-bottom: 2em;
}
.local_flex1 li h3 span:nth-child(1){
	width:55px;
	min-width: 55px;
}
.local_flex1 li h3 span:nth-child(1) > *{width:100%;}
.local_flex1 li h3 span:nth-child(2){
	font-size: 250%;
	line-height: 125%;
	margin-left: 0.5em;
	margin-top: -0.125em;
}
.local_flex1 li b{color:#FF7800;}
.local_flex1 li:nth-child(2) img{margin-top: 1em;}
.local_flex2{
	display: flex;
	justify-content: space-between;
	align-items: flex-end;
	padding: 25px;
}
.local_flex3,
.local_flex3 ul li{
	display: flex;
	justify-content: space-between;
	align-items:flex-start;
}
.local_flex3 ul{
	width:490px;
	max-width: 100%;
	text-align: left;
}
.local_flex3 ul li:nth-child(n+2){margin-top: 40px;}
.local_flex3 ul li > *:nth-child(1){
	width:40px;
	min-width: 40px;
}
.local_flex3 ul li > *:nth-child(2){
	font-size: 200%;
	font-weight: bold;
	line-height: 150%;
	flex-grow: 1;
	padding-left: 0.75em;
}
.local_flex3 ul li > *:nth-child(2) b{
	font-size: 150%;
	line-height: 125%;
	color:#B7A663;
}
.local_flex3 ul li > *:nth-child(2) div{
	font-size: 50%;
	font-weight: normal;
	line-height: 150%;
}
.whats_catch{}
.whats_catch h3 span{
	background-color: #04AA89;
	color:#FFF;
	font-size: 125%;
	line-height: 125%;
	padding: 0.25em 1.25em;
}
.local_flex4{
	display: flex;
	align-items: flex-end;
	justify-content: center;
}
.local_flex4 li{
	width: 230px;
	position: relative;
}
.local_flex4 li span{
	position: absolute;
	bottom: 0;
	left:0;
	right:0;
	margin: auto;
}
@media screen and (min-width: 1000px) {
	.local_flex1 li{width:530px;}
	.local_flex1 li:nth-child(2){margin-left: 1.851851852%;}
	.local_flex1 li:nth-child(2) img{
		margin-left: 2em;
		margin-right: auto;
	}
	.local_flex4 li:nth-child(n+2){margin-left: 25px;}
}
@media screen and (max-width: 999px) {
	.local_flex1{flex-direction: column;}
	.local_flex1 li h3{margin-bottom: 1em;}
	.local_flex1 li h3 span:nth-child(1){
		width:40px;
		min-width: 40px;
	}
	.local_flex1 li h3 span:nth-child(2){font-size: 200%;}
	.local_flex1 li:nth-child(2){margin-top: 2em;}
	.local_flex1 li:nth-child(2) img{margin-left: auto;margin-right: auto;}
	.local_flex2{flex-direction: column;}
	.local_flex2 img{width:100%!important;}
	.local_flex2 img:nth-child(2){margin-top: 25px;}
	.local_flex3{flex-direction: column;}
	.local_flex3 ul{margin-top: 40px;}
	.local_flex3 ul li > *:nth-child(1){
		width:30px;
		min-width: 30px;
	}
	.local_flex3 ul li > *:nth-child(2){font-size: 150%;}
	.local_flex4{
		align-items: center;
    flex-direction: column;
	}
	.local_flex4 li:nth-child(n+2){margin-top: 25px;}
	.local_flex4 ~ .sp_green{color: #04AA89;}
}
</style>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php echo CONTENT_TOPIMG(); ?>
<?php echo CONTENT_SUBT_MINI('WHAT’S TEISYAKU','- 定期借地とは -'); ?>
<?php echo CONTENT_PAD(30,0); ?>
<!-- *** -->
<div class="content_box"><h2 class="subt_deco"><div class="fontP300 sp_fontP130">なぜそんなに安く、戸建に住めるの？</div></h2></div>
<?php echo CONTENT_PAD(30,'sp/2'); ?>
<div class="Wbase W1200 pos_rel">
<div class="pos_abs W100per" style="top:0;left:0; background-color: rgba(56,148,198,0.53); mix-blend-mode: multiply; height:100%;"></div>
<img src="images/content/whats/himitsu-1.svg" class="W100per pos_abs" style="top:0;left:0;">
<img src="images/content/whats/himitsu-2.jpg" class="W100per">
</div>
<div class="content_box">
<?php echo CONTENT_PAD(50,'sp/2'); ?>
<h2 class="subt_deco"><div class="fontP200 sp_fontP150">
<div class="sp_vanish"><span class="beta"><div style="padding-bottom: 0.25em;">広々<span class="fontP125">4</span>LDK、駐車場<span class="fontP125">2～4</span>台、太陽光発電付き<span class="fontP075">の一戸建の場合</span></div><div></div></span></div>
<div class="pc_vanish">
<span class="beta"><div style="padding-bottom: 0.25em;">広々<span class="fontP125">4</span>LDK、駐車場<span class="fontP125">2</span>台、</span></div><div></div></span>
<?php echo CONTENT_PAD(10); ?>
<span class="beta"><div style="padding-bottom: 0.25em;">太陽光発電付き<span class="fontP075">の一戸建の場合</span></div><div></div></span>
</div>
</div></h2>
<?php echo CONTENT_PAD(80,'sp/2'); ?>
<div class="Wbase W1080">
<ul class="local_flex1">
<li>
<h3 class="col_04A"><span><img src="images/content/whats/num-A1.svg"></span><span>建物だけを買い、<br>土地は借りる。</span></h3>
<div class="fontP125 sp_fontP100 LH150"><?php echo WORD_BR('通常、<b>戸建住宅には土地価格が含まれます</b>が、
建物と土地を切り分けて購入する画期的な方法です。

50年間、その土地を自由に使える、という考え方。その間に貸すこともできるので、暮らしの変化にも柔軟に対応。50年後は更地にして返還します。'); ?></div>
</li>
<li>
<div><strong>●定期借地住宅購入のしくみ</strong></div>
<img src="images/content/whats/p-1-1.svg" style="width: 426px;">
</li>
</ul>
<?php echo CONTENT_PAD(110,'sp/2'); ?>
<ul class="local_flex1">
<li>
<h3 class="col_04A"><span><img src="images/content/whats/num-A2.svg"></span><span>土地の賃料は<br>売電収入で相殺。</span></h3>
<div class="fontP125 sp_fontP100 LH150"><?php
echo WORD_BR('平屋建てなので、2階建てに比べて屋根が大きく
大容量の太陽光パネルを設置できます。
太陽光発電の売電収入を土地の賃料（地代）に
充てることで、<b>実質の土地負担額が軽減</b>できます。

土地を確保するために必要な費用負担が減り、建物にお金をかけられます。');
?></div>
</li>
<li>
<div><strong>●「太陽光発電／土地代軽減」のしくみ</strong></div>
<div class="fontP075" style="margin-top: 0.75em;">太陽光発電8.3kW標準搭載</div>
<img src="images/content/whats/p-1-2.svg" style="width: 487.5px;">
</li>
</ul>
</div>
<?php echo CONTENT_PAD(30); ?>
<img src="images/content/whats/arrow.svg" class="mgnAuto" style="width: 122px;">
<?php echo CONTENT_PAD(30); ?>
<div class="Wbase W1200">
<div class="LH125 col_F70 font_bold sp_fontP070"><span class="fontP300">建物価格と<br class="pc_vanish">少しの土地代負担だけで</span><span class="fontP225">購入できる!だから安い!</span></div>
<div class="font_bold fontP125 sp_fontP100 LH125 sp_LH150 sp_textL pc_br_del" style="margin-top: 0.5em;">住宅ローンの負担を軽減。4LDKの一戸建に<br>いまお住まいの賃貸住宅より、お安く住めます。</div>
<?php echo CONTENT_PAD(40,'sp/2'); ?>
<div class="bg_EEE_green">
<div class="Wbase W800 local_flex2"><img src="images/content/whats/loan-1.svg?202505" style="width: 324px;"><img src="images/content/whats/loan-2.svg?202505" style="width: 402px;"></div>
</div>
<div class="fontP075 LH200 textL" style="margin-top: 1em;"><?php echo WORD_BR('※1 1kWあたり16円（税込）で売電を行った場合で試算。この売電量・日射量は当該地域における気象データを元に予測計算された予想量であり、お客様のシステムの発電量を保証するものではありません。日射量の値はNEDO日射量データベースを使用しています。売電価格は国の保証により変更する場合があります。詳細については係員にお尋ね下さい。
※2 借入金額には敷金100万円、権利金50万円を含みます。返済例は、三井住友銀行 住宅ローン1.225%（変動金利）を利用した場合です。金利は通年優遇を利用した場合で、優遇は条件を満たした方のみに適用されます。また、融資額は年収、その他の条件により異なります。※その他に事務手数料等の諸費用が必要となります。また保証料・火災保険料・担保設定費用が別途必要です。※返済例は2025年4月現在のもので、実際は融資実行時の金利が適用されます。※申し込みにあたり融資審査が必要となります。年収等諸条件により住宅ローンがご利用いただけない場合もございます。'); ?></div>
<?php echo CONTENT_PAD(110,'sp/2'); ?>
</div>
</div>
<!-- 定期借地vs土地付き -->
<?php echo TOP_SUBT_TEMP(1); ?>
<div class="content_box"><div class="Wbase W1200">
<?php echo CONTENT_PAD(70,'sp/2'); ?>
<?php TOP_TEMP(1); ?>
<?php echo CONTENT_PAD(60,'sp/2'); ?>
</div></div>
<!-- *** -->
<?php echo CONTENT_PAD(70,'sp/2'); ?>
<h2 class="top_subt_obi o2 pc_br_del">定期借地とは</h2>
<?php echo CONTENT_PAD(60,'sp/2'); ?>
<div class="content_box"><div class="Wbase W980">
<div class="local_flex3">
<img src="images/content/whats/p-2.jpg" width="433px;">
<ul>
<li><img src="images/content/whats/num-B1.svg"><div style="margin-top: -0.5em;">土地を<b>50</b>年分借りる<div>※50年以上の期間を定めます</div></div></li>
<li><img src="images/content/whats/num-B2.svg"><div style="margin-top: -0.125em;">敷金と毎月の地代を支払う</div></li>
<li><img src="images/content/whats/num-B3.svg"><div style="margin-top: -0.125em;">期間満了後、更地に戻して<br><b>返還</b>する<div>※敷金は全額戻ってきます</div></div></li>
</ul>
</div>
<?php echo CONTENT_PAD(40,'sp/2'); ?>
<div class="fontP125 sp_fontP100 LH200 textL"><?php echo WORD_BR('定期借地権は、平成4年8月に施行された「借地借家法」により誕生しました。当初に定められる契約期間で借地関係が終了し、その後の更新はありません。この制度によって地主様は、安心して土地を貸せるようになり、敷金と毎月の地代を得ることができます。一方、借主、つまりマイホームの購入者は、土地を購入する必要がないため、少ない負担でマイホームを取得することができ、地主様、借主様双方にメリットを生む合理的なしくみと言えます。また、住宅、宅地政策上も適正利用とされ、特に借主様に「お買い得に良い家を購入できる」「土地代を豊かな暮らしに活用できる」というメリットのある方法です。'); ?></div>
<?php echo CONTENT_PAD(60,'sp/2'); ?>
</div></div>
<!-- *** -->
<div class="top_slider bg_EEE_green"><?php
echo CONTENT_PAD(30,'sp/2');
TOP_TEMP(2);
echo CONTENT_PAD(60,'sp/2');
?></div>
<?php
/*
<div class="content_box bg_EEE_green whats_catch">
<?php echo CONTENT_PAD(40); ?>
<h3><span>定期借地権付き住宅販売</span></h3>
<?php echo CONTENT_PAD(30); ?>
<?php
echo '<ul class="local_flex4 fontP075 LH100">
<li>'.file_get_contents($kaisou.'images/top/catch-2-1.svg').'<span>※1</span></li>
<li>'.file_get_contents($kaisou.'images/top/catch-2-2.svg').'<span>※2</span></li>
<li>'.file_get_contents($kaisou.'images/top/catch-2-3.svg').'</li>
</ul>'.chr(10);
?>
<?php echo CONTENT_PAD(30); ?>
<div class="fontP075 sp_LH200">※1 公益財団法人 日本住宅総合センター調べ（2020年度）<?php echo PAD_BR(); ?>※2 2020年度時点定期借地権付住宅累計供給実績</div>
<?php echo CONTENT_PAD(30); ?>
<img src="images/content/whats/no1-pc.svg" class="mgnAuto sp_vanish">
<img src="images/content/whats/no1-sp.svg" class="mgnAuto pc_vanish" style="width:383px;">
<div class="LH200 sp_textL" style="margin-top: 0.5em;"><?php echo WORD_BR('東新住建のテイシャクは定期借地権付き住宅販売全国No.1。30年間で1,000棟の販売・供給実績があります。
定期借地権（借地借家法）が施行された平成4年から扱いを開始し、購入者様・地主様の双方をサポートしています。'); ?></div>
<?php echo CONTENT_PAD(40); ?>
</div>
*/
?>
<!-- *** -->
<div class="content_box"><div class="Wbase W1200">
<?php echo CONTENT_PAD(60,'sp/2'); ?>
<?php echo EFFECT_BTN('物件一覧','すべての物件を見る'); ?>
<?php echo CONTENT_PAD(60,'sp/2'); ?>
<?php echo TOP_MENU_BNR(array(2,3)); ?>
<?php echo CONTENT_PAD(60,'sp/2'); ?>
</div></div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>