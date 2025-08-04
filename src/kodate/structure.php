<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'images/content/structure/';
$dir2=$kaisou.'images/content/merit-kawaranai/';
$p_title='家づくり';
require $kaisou."temp_php/basic.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/content.css" rel="stylesheet" type="text/css">
<link href="css/top.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
<style>
.con_maint{border-top:none;}
.con_maint.c0 .catch br{display: none;}
.con_maint.c0 .catch img{width:936px; margin: auto;}
.con_maint.c0 .text{font-size: 110%;}
.con_maint.c1{
	background-color: #738DA0;
	color:#FFF;
	padding-top: 60px;
	padding-bottom: 50px;
}
.con_maint.c1 .catch{font-size: 200%;}
@media screen and (max-width: 999px) {
	.con_maint.c0 .catch img{width:366px;}
	.con_maint.c1{
		padding-left: 1em;
		padding-right: 1em;
	}
	.con_maint.c1 .catch{font-size: 160%;text-align: left;}
	.con_maint.c1 .text br{display: none;}
}

.local_subt01{
	margin-top: 90px;
	margin-bottom: 45px;
}
.local_subt01 img:nth-child(1){
	border: solid 1px #738DA0;
	width:316px;
}
.local_subt01 img:nth-child(2){
	margin-top: 20px;
	width:772px;
}
.local_subt01 img:nth-child(3){margin-top: 1em;}

.local_sonae{
	width:260px;
	margin: auto;
	margin-bottom: 2em;
}
.local_sonae_title{
	font-size: 200%;
	line-height: 150%;
}
.local_sonae_blue{
	background-color: #738DA0;
	color: #FFF;
	width:1200px;
	max-width: 100%;
	margin: 1em auto;
	font-size: 300%;
	font-weight: bold;
	line-height: 150%;
	letter-spacing: 0.25em;
	padding-left: 0.25em;
}
@media screen and (max-width: 999px) {
	.local_sonae_title{font-size: 140%;}
	.local_sonae_blue{font-size: 200%;}
}


.local_col2{
	width:1200px;
	max-width: 100%;
	margin: auto;
	margin-top: 3em;
}
.local_col2 li:nth-of-type(1){text-align: left;}
@media screen and (min-width: 1000px) {
	.local_col2 li:nth-of-type(1){
		float: left;
		width:50%;
	}
	.local_col2 li:nth-of-type(2){
		float: right;
		max-width: 48%;
	}
	.local_col2.ratio_4_6 li:nth-of-type(1){width:41.6667%;}
	.local_col2.ratio_4_6 li:nth-of-type(2){max-width: 56.3333%;}
}
@media screen and (max-width: 999px) {
	.local_col2 li:nth-of-type(1){}
	.local_col2 li:nth-of-type(2){margin-top: 2em;}
}
.local_col2 .point{
	width:80px;
	display: inline-block;
	vertical-align: top;
	margin-right: 1em;
}
.local_col2 h4{
	font-size: 175%;
	line-height: 133%;
	display: inline-block;
}
.local_col2 .text{
	line-height: 175%;
	margin-top: 1em;
}
.local_col2 .photo{}
@media screen and (min-width: 1000px) {
	.local_col2 .photo{margin-left: auto;}
}
@media screen and (max-width: 999px) {
	.local_col2 .point{
		width:18%;
		margin-right: 4%;
	}
	.local_col2 h4{
		font-size: 150%;
		/* max-width: 78%; */
	}
	.local_col2 .photo{width: 100%!important;}
}
.local_col2 .add{margin-top: 1em;}
.local_col2 .a1_1{}
@media screen and (min-width: 1000px) {
	.local_col2 .a1_1{width:365px; margin-right: auto;}
}

.local_data{
	width:1200px;
	max-width: 100%;
	margin: auto;
	margin-top: 3em;
	text-align: left;
}
.local_data img{height:2em;}
.local_data span{display: block;font-weight: bold;}
@media screen and (min-width: 1000px) {
	.local_data img{float: left;}
	.local_data span{
		float: right;
		padding-top: 1em;
		font-size: 150%;
		line-height: 0;
	}
}
@media screen and (max-width: 999px) {
	.local_data img{height:1.75em;}
	.local_data span{
		padding-top: 0.75em;
		font-size: 120%;
		line-height: 150%;
	}
}

.local_end{
	color:#F53402;
	font-size: 200%;
	line-height: 150%;
	font-weight: bold;
	border-bottom: solid 0.33em #F53402;
	margin-bottom: 0.5em;
}
@media screen and (max-width: 999px) {
	.local_end{
		text-align: left;
		font-size: 150%;
		padding-bottom: 0.25em;
	}
}

.sonae3{}
.sonae3 .local_sonae_blue{
	width: auto;
	font-size: 250%;
	line-height: 175%;
	margin-bottom: 0;
}
.sonae3 h3{
	font-size: 400%;
	line-height: 100%;
	color: #738DA0;
}
.sonae3 .catch{
	font-size: 250%;
	line-height: 100%;
	font-weight: bold;
	padding-top: 30px;
}
.sonae3 .flex{display: flex;}
.sonae3 .box1{margin-top: 40px;}
.sonae3 .box2{margin-top: 75px;margin-bottom: 60px;}
.sonae3 .box2 li{}
.sonae3 .box2 li img{width:100%;}
.sonae3 .box2 li > *:nth-child(1){
	background-color: #EE1B09;
	color:#FFF;
	font-weight: bold;
	font-size: 110%;
	line-height: 100%;
	padding: 0.66em 0;
}
.sonae3 .box2 li > *:nth-child(2){
	margin-bottom: 1em;
}
.sonae3 .t1{
	background-color: #FFF;
	color:#EE1B09;
	border:solid 3px #EE1B09;
	font-size: 200%;
	line-height: 100%;
	display: inline-block;
	padding: 0.25em 0.5em;
	margin-bottom: 40px;
}
.sonae3 .t2{
	font-weight: bold;
	font-size: 200%;
	line-height: 133%;
	margin-bottom: 1em;
}
.sonae3 .box3{
	margin-top: 40px;
	margin-bottom: 65px;
}
.sonae3 .box3 img{width:100%;}
.sonae3 .box4{margin-bottom:100px;}
.sonae3 .box4 img{width:100%;}
.sonae3 .box5{margin-bottom:35px;}
.sonae3 .box6{font-weight: bold;margin-bottom: 65px;}
.sonae3 .box6 img{width:100%;margin-bottom: 0.75em;}
.sonae3 .box6 + .btn_bgLtoR{
	background-color: transparent;
	border-width:2px;
}
.sonae3 .box6 + .btn_bgLtoR > * > span{
	padding: 0.75em 1em;
	color:#000;
}
.sonae3 .box6 + .btn_bgLtoR:hover > * > span{color:#FFF;}
.sonae3 .box6 + .btn_bgLtoR > * > svg polyline{stroke: #000;}
.sonae3 .box6 + .btn_bgLtoR:hover > * > svg polyline{stroke: #FFF;}

@media screen and (min-width: 1000px) {
	.sonae3 .box1 > *:nth-child(1){width:51%;}
	.sonae3 .box1 > *:nth-child(2){width:49%;padding: 2% 3% 0;}
	.sonae3 .box1 > *:nth-child(2) > *:nth-child(1){width:390px;}
	.sonae3 .box1 > *:nth-child(2) > *:nth-child(2){width:500px;margin: 1em 0;}
	.sonae3 .box1 > *:nth-child(2) > *:nth-child(3){width:450px;}
	.sonae3 .box2 li{width:22%;}
	.sonae3 .box2 li:nth-child(n+2){margin-left: 4%;}
	.sonae3 .box3 img{width:33%;}
	.sonae3 .box3 img:nth-child(n+2){margin-left: 0.5%;}
	.sonae3 .box4 > *:nth-child(1){width:500px;}
	.sonae3 .box4 > *:nth-child(2){width:140px;margin-left: 30px;margin-right: 80px;}
	.sonae3 .box4 > *:nth-child(3){width:550px;text-align: left;}
	.sonae3 .box6 li{width:15%;}
	.sonae3 .box6 li:nth-child(n+2){margin-left: 2%;}
}
@media screen and (max-width: 999px) {
	.sonae3 .local_sonae_blue{
		font-size: 175%;
		line-height: 125%;
		padding: 0.33em 0;
	}
	.sonae3 h3{font-size: 240%;}
	.sonae3 .catch{font-size: 200%;line-height: 125%;}
	.sonae3 .box1{flex-flow: column;}
	.sonae3 .box1 img{width:100%;}
	.sonae3 .box1 > *:nth-child(1){margin-bottom: 2em;}
	.sonae3 .box1 > *:nth-child(2) > *:nth-child(2){margin: 1em 0;}
	.sonae3 .box2{flex-flow: column;}
	.sonae3 .box2 li:nth-child(n+2){margin-top: 2em;}
	.sonae3 .t1,
	.sonae3 .t2{font-size: 175%;}
	.sonae3 .box3{
		flex-flow: column;
		/*flex-wrap: wrap;*/
	}
	.sonae3 .box3 img:nth-child(n+2){margin-top: 1em;}
	.sonae3 .box4{flex-flow: column;}
	.sonae3 .box4 > *:nth-child(n+2){margin-top: 2em;}
	.sonae3 .box6{flex-wrap: wrap;}
	.sonae3 .box6 li{width:48%;}
	.sonae3 .box6 li:nth-child(2n+2){margin-left: 4%;}
	.sonae3 .box6 li:nth-child(n+3){margin-top: 1em;}
}
</style>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php echo PAN(array($p_title)); ?>
<?php echo PAGE_TITLE($p_title); ?>
<!-- *** -->
<div class="content_box"><div class="W1300 Wmax100per mgnAuto">
<?php echo MAINPIC($dir); ?>
<?php echo CONTENT_MAINTITLE(''
,MAINPIC($dir,array('mainpic'=>'catch-t.svg'))
,'木の香りや肌触りは、わたしたちに不思議な心地よさや癒やしを与えてくれます。
自然が持つ無限大の可能性を引き出す、東新住建の家づくり。
'.NUMBER_COMMA($comp_data['数値']['累計棟数']).'棟の建築実績ノウハウが、お客様の想いを具現化します。'
,'c0'
); ?>
</div></div>
<!-- *** -->
<div class="content_box" style="min-height: 0;"><div class="W1300 Wmax100per mgnAuto">
<div class="local_subt01">
<img src="images/content/structure/subt1-1.svg">
<?php echo MAINPIC($dir,array('mainpic'=>'subt1-2.svg')); ?>
</div>
</div></div>
<?php echo CONTENT_MAINTITLE(''
,'東海地方で家を購入する前に、<br class="pc_br_del">知っていただきたいこと'
,'東新住建は住宅メーカーとして過去に経験した大きな地震で多くのことを学び、そして実証をしてきました。
2×4工法の耐震性能を証明した阪神大震災。地盤改良技術の効果と必要性を実証した東日本大震災。
液状化のリスクを抱える東海地方では、こうした教訓が生かされた家を選ぶことが大切です。'
,'c1'
); ?>
<?php
function LOCAL_PIC($img,$type=1,$c=''){
	global $dir2;
	$url=$dir2.$img;
	switch($type){
		case 1:
			list($w,$h)=getimagesize($url);
			$s=' style="width:'.($w/2).'px;"';	
			echo '<img src="'.$url.'" class="photo"'.$s.'>';
		break;
		case 2:
			$url_sp=str_replace('.','-sp.',$url);
			if($c!=''){$c=' '.$c;}
			echo '<img src="'.$url.'" class="mgnAuto sp_vanish'.$c.'">';
			echo '<img src="'.$url_sp.'" class="mgnAuto pc_vanish'.$c.'">';
		break;
	}
}
?>
<!-- sonae1 -->
<div class="content_box" style="background-color: #F4F4F4;"><div class="W1300 Wmax100per mgnAuto" style="padding-top: 3em;">
<img src="images/content/merit-kawaranai/sonae1.svg" class="local_sonae" style="width:260px;">
<h4 class="local_sonae_title">どんなに強い家でも、<br>地盤が弱ければ意味がありません</h4>
<div class="local_sonae_blue">地盤改良</div>
<?php echo MAINPIC($dir2,array('mainpic'=>'sonae-pic1.jpg')); ?>
</div></div>

<div class="content_box"><div class="W1300 Wmax100per mgnAuto">
<ul class="local_col2">
<li><img src="images/content/merit-kawaranai/point1.svg" class="point"><h4>地震で本当に怖いのは、<br>根こそぎ倒れる液状化</h4>
<div class="text">1964年に発生した新潟地震においても多発した液状化。地下水位の高い砂地盤が地震によって液体のようになる現象で、建物の損傷が少なくても杭ごとひっくり返るため甚大な被害となります。この液状化はどのような土地でも起こるわけでなく、一定の条件があります。</div>
<img src="images/content/merit-kawaranai/add1-1.svg" class="add a1_1">
</li>
<li><?php echo LOCAL_PIC('p1-1.jpg'); ?></li>
<div class="clear"></div>
</ul>
<div style="margin-top: 3em;">
<?php echo LOCAL_PIC('p1-1b.png',2); ?>
</div>
<ul class="local_col2">
<li><img src="images/content/merit-kawaranai/point2.svg" class="point"><h4>愛知県の地盤は要注意。<br>だからこそ地盤対策が<br class="pc_vanish">必須です</h4>
<div class="text">液状化の危険性が高い愛知県は、住宅を建設する際に事前の対策を講じておくことを推奨しています。下記の地域で住宅を検討している方は、地盤強化が適切になされているか、事前の確認が必要です。</div>
<?php echo LOCAL_PIC('add1-2.svg',2,'add'); ?>
</li>
<li><?php echo LOCAL_PIC('p1-2.png'); ?></li>
<div class="clear"></div>
</ul>
<div class="top_search" style="padding: 3em 0;"><div class="btnbox num1"><?php
//物件一覧ボタン用配列
$top_bukken_btn=array
('t'=>'物件一覧はこちらから'
,'a'=>array('class'=>'colO pc_br_del','arrow'=>true)
);
echo EFFECT_BTN('物件検索',$top_bukken_btn['t'],$top_bukken_btn['a']);
?></div></div>
<div>
<?php echo LOCAL_PIC('tec1.png',2); ?>
</div>
<?php
function LOCAL_TITLE_DATA($str){
	echo '<div class="local_data"><img src="images/content/merit-kawaranai/data.svg"><span>'.$str.'</span><div class="clear"></div></div>';
}
?>
<?php LOCAL_TITLE_DATA('東日本大震災における砕石パイル工法施工物件の調査より'); ?>
<div style="margin-top: 1em;">
<?php echo LOCAL_PIC('pt1-1.png',2); ?>
</div>
<ul class="local_col2 ratio_4_6">
<li><h4>人と環境にやさしい最先端の<br>省エネルギー地盤改良技術。</h4>
<div class="text">水はけのよい砕石を地面に空けた縦穴に詰めてパイルを形成する「砕石パイル工法」は、大地震による被害で最も多い地盤の液状化に威力を発揮します。パイル形成時の加圧作業により軟弱な土壌もしっかりと締め固められ、何十本もの摩擦抵抗の高い丈夫な砕石柱が建物の基礎を支えます。</div>
</li>
<li><?php echo LOCAL_PIC('pt1-2.jpg'); ?></li>
<div class="clear"></div>
</ul>
<div style="margin-top: 3em;">
<?php echo LOCAL_PIC('pt1-3.png',2); ?>
</div>
<div style="margin-top: 3em;">
<?php echo LOCAL_PIC('pt1-4.png',2); ?>
</div>
<div class="W1200 Wmax100per mgnAuto" style="margin-top: 3em;">
<div class="local_end">ただ耐震性能が高いだけでは、<br class="pc_vanish">本当の地震対策とは言えません</div>
<div class="textL LH175">どんなに頑丈な家を建てても、地盤がグラグラのままでは有事を乗り切ることはできません。地震や液状化に耐えうるだけの地盤の強さが約束されてはじめて、その上に家を建てることができるのです。砕石パイル工法による地盤改良は東日本大震災時に液状化被害を最小限に抑える効果が実証された確かな技術です。東新住建は、安心の上に安心を積み重ねる家づくりを実践しています。</div>
</div>

<div class="top_search" style="padding: 3em 0 0;"><div class="btnbox num1"><?php
echo EFFECT_BTN('物件検索',$top_bukken_btn['t'],$top_bukken_btn['a']);
?></div></div>

</div></div>
<!-- sonae2 -->
<div class="content_box" style="background-color: #F4F4F4; margin-top: 4em;"><div class="W1300 Wmax100per mgnAuto" style="padding-top: 3em;">
<img src="images/content/merit-kawaranai/sonae2.svg" class="local_sonae" style="width:260px;">
<h4 class="local_sonae_title">大震災でも倒壊・半壊ゼロ。<br>強さが実証された2×4工法</h4>
<div class="local_sonae_blue">建物への地震対策</div>
<?php echo MAINPIC($dir2,array('mainpic'=>'sonae-pic2.jpg')); ?>
</div></div>
<div class="content_box"><div class="W1300 Wmax100per mgnAuto">
<ul class="local_col2">
<li><h4>甚大な被害の中、<br>強さを示した2×4工法</h4>
<div class="text">全壊10.1万棟、半壊・一部損壊28.9万棟以上。大惨事を引き起こした1995年1月の阪神・淡路大震災ですが、2×4工法では全壊・半壊はゼロ。2011年の東日本大震災でも津波による被害を除けば98％が当面の暮らしに支障がないという結果が出ています。</div>
</li>
<li><?php echo LOCAL_PIC('p2-1.jpg'); ?></li>
<div class="clear"></div>
</ul>
<?php LOCAL_TITLE_DATA('阪神・淡路大震災における2×4工法の被害調査結果より'); ?>
<div class="W1200 Wmax100per mgnAuto" style="margin-top: 1em;">
<?php echo LOCAL_PIC('p2-1d.svg',2); ?>
</div>
<style>
.caution_tec2 .caution{
	font-size:0.8rem;
	position: absolute;
	margin: auto;
	top:27%;
	bottom:0;
	left:57%;
	right:0;
}
@media screen and (max-width: 999px) {
	.caution_tec2 .caution{
		font-size: 0.7rem;
		top:21%;
		bottom:0;
		left:0;
		right:0;
	}
}
</style>
<div class="caution_tec2" style="margin-top: 3em; position: relative;">
<?php echo LOCAL_PIC('tec2.png',2); ?>
<div class="caution col_FFF">※一部対象外の物件もございます</div>
</div>
<ul class="local_col2 ratio_4_6">
<li><h4>地震に強い2×4工法の<br>耐震性能を40％高めました。</h4>
<div class="text">東新住建は、2×4パネルをさらに進化させた従来より耐力を約140％に高めた「壁量4.3倍」パネルを開発。高品質ステンレス釘の採用や、釘ピッチをより密にした仕様など、様々な工夫により耐振性能を向上させました。この新工法では、従来の「壁量3.0倍」から、「壁量4.3倍」にすることで1.4倍以上の耐力アップを実現しました。
<img src="images/content/merit-kawaranai/pt2-1.svg" class="add"></div>
</li>
<li><?php echo LOCAL_PIC('pt2-2.jpg'); ?></li>
<div class="clear"></div>
</ul>
<?php
/*
<?php LOCAL_TITLE_DATA('制振装置もプラスしてさらなる安心を'); ?>
<div style="margin-top: 1em;">
<?php echo LOCAL_PIC('pt2-3.jpg',2); ?>
</div>
*/
?>
<ul class="local_col2 ratio_4_6">
<li><h4>2×4パネルはすべて<br>専属工場生産</h4>
<div class="text">柱や梁の代わりに、均一サイズの角材と合板を接合して作られるパネルで、壁、床、天井、屋根などを構築する2×4工法。その強さは、パネル自体の品質に支えられています。東新住建は本社が位置する稲沢市に自社パネル工場を建設。徹底した品質管理のもと、高品質なパネルを安定供給できる体制を整えています。
<img src="images/content/structure/2023/pt2-2.svg" class="add"></div>
</li>
<li><?php echo LOCAL_PIC('pt2-4.jpg'); ?></li>
<div class="clear"></div>
</ul>
<div class="bg_FFF_gray W1200 Wmax100per mgnAuto" style="border: solid 1px #888; padding: 2em;margin-top: 3em; font-size: 80%;">
<ul class="local_col2 ratio_4_6" style="margin-top: 0;">
<li><h4>東新住建は2×4工法を<br class="pc_vanish">いち早く導入。<br>自社社屋でトライアルし、<br class="pc_vanish">その強さを実証。</h4>
<div class="text">日本の家づくりは伝統的な木造軸組工法が主流でしたが、東新住建は当初から地震に絶対的な強さを持つ2×4住宅に着目。アメリカから技術者を招聘し、本格的な技術導入を開始しました。「お客様の家をつくる前に、まず自分たちで試そう」と、2×4工法により本社社屋を建築。いまも東新住建では、この社屋がそのまま技術力の証明になっています。</div>
</li>
<li><?php echo LOCAL_PIC('pt2-5.png'); ?></li>
<div class="clear"></div>
</ul>
</div>
<div class="W1200 Wmax100per mgnAuto" style="margin-top: 3em;">
<div class="local_end">地震に耐える+衝撃を吸収する。2つの考え方を融合した地震対策</div>
<div class="textL LH175">筋交いや強固なパネルなどでがっちりと固めた耐震構造の家は地震の揺れを抑えることができますが、建物自体には衝撃のダメージが蓄積されてしまいます。そこで東新住建は地震の揺れを吸収して衝撃を和らげる制振装置を耐震構造の家に装着することで、建物の損傷を軽減し、高い耐震性能を長期間にわたって維持することを可能にしました。</div>
</div>

<div class="top_search" style="padding: 3em 0;"><div class="btnbox num1"><?php
echo EFFECT_BTN('物件検索',$top_bukken_btn['t'],$top_bukken_btn['a']);
?></div></div>

</div></div>
<!-- sonae3 -->
<div class="sonae3">
<div class="local_sonae_blue pc_br_del">サスティナブルな<br>循環型社会をめざして</div>
<div class="content_box" style="background-color: #F4F4F4;"><div class="W1300 Wmax100per mgnAuto" style="padding-top: 60px; padding-bottom: 45px;">
<h3>環境共生住宅の普及</h3>
<div class="catch pc_br_del">自然エネルギー活用と<br>地球環境への貢献</div>
</div></div>
<div class="content_box"><div class="W1200 Wmax100per mgnAuto" style="padding-top: 45px;">
<div class="textL LH175">東新住建は創業時から自然素材である木の持つ力を最大限に活かした家づくりを展開しています。木造住宅は、そこに住むひとの暮らしと健康を守るだけでなく、建物そのものが二酸化炭素を吸収し、温暖化防止に貢献するエコ住宅です。</div>
<div class="flex box1">
<div><img src="images/content/structure/p3-1.jpg"></div>
<div>
<img src="images/content/structure/p3-2-t.svg">
<img src="images/content/structure/p3-2.png">
<div class="textL LH175">2015年9月の国連サミットで採択されたもので、「Sustainable Development Goals（持続可能な開発目標）」の略称です。国連加盟193か国が2016年から2030年の15年間で達成するために掲げた目標です。</div>
</div>
</div>
<style>
.local_sdgs_bnr{
	display: flex;
	justify-content: center;
	margin-top: 3em;
}
</style>
<div class="local_sdgs_bnr"><a href="<?php echo $link_list['SDGs'][0]; ?>"><img src="images/top/bnr/bnr-sdgs.svg"></a></div>
<ul class="flex box2">
<li><div>環境共生住宅の開発</div><img src="images/content/structure/p3-3-1.jpg"><div class="textL LH175">ウイルスやアレルギーから守る自然換気システムを採用した、人と環境に優しい環境共生住宅の開発しています。</div></li>
<li><div>国産木材の活用</div><img src="images/content/structure/p3-3-2.jpg"><div class="textL LH175">H26年より全棟に国産材2×4を標準使用。国の重要課題である国産材の普及に貢献し、これまでに約2,000棟建築しています。</div></li>
<li><div>地元の天然資源の活用</div><img src="images/content/structure/p3-3-3.jpg"><div class="textL LH175">「砕石パイル工法」で使用しているのは、地元の天然石。セメントを使用しない地球環境に優しい技術です。</div></li>
<li><div>自然エネルギーの活用</div><img src="images/content/structure/p3-3-4.jpg"><div class="textL LH175">大容量の太陽光発電パネルを搭載可能にした専用設計のビッグルーフ。エネルギーを自給自足するライフスタイルの提案をおこなっています。</div></li>
</ul>
</div></div>
<?php
/*
<div class="content_box" style="background-color: #DADADA;"><div class="W1200 Wmax100per mgnAuto" style="padding-top: 45px; padding-bottom: 45px;">
<div class="t1">早期成約でプチ自由設計</div>
<div class="t2 pc_br_del">完成前の物件は、間取りや<br>設備をオーダー可能</div>
<img src="images/content/structure/skeleton.svg" style="width:438px;margin-bottom: 30px;">
<div class="textL LH175">物件の着工前にご成約いただければ、間取りや内装設備がオーダー可能になります。部屋の雰囲気や気分を大きく左右するフローリングや壁紙・ドアなどの内装部分と、暮らしやすさに直結するキッチンやバスなどの設備を自由にセレクトできます。まるで注文住宅のように、どんな空間も思いのままに実現可能です。</div>
<div class="flex box3">
<img src="images/content/structure/p3-4-1.jpg">
<img src="images/content/structure/p3-4-2.jpg">
<img src="images/content/structure/p3-4-3.jpg">
</div>
<div class="flex box4">
<div><?php echo MAINPIC($dir,array('mainpic'=>'p3-5-1.svg')); ?></div>
<div><?php echo MAINPIC($dir,array('mainpic'=>'p3-5-2.svg')); ?></div>
<div>
<div class="t2"><?php echo WORD_BR('内装の自由度が高い
スケルトンインフィル構造'); ?></div>
<div class="textL LH175">東新住建の家は、柱・梁・床といった構造躯体（スケルトン）を強固に作ることで、内側の間取りや内装（インフィル）を柔軟に入れ替えたり変更することが可能になるスケルトンインフィル構造を採用。ライフスタイルの変化に対応した長寿命住宅を実現しています。</div>
</div>
</div>
<div class="box5 textC">
<div class="t2"><?php echo WORD_BR('コーディネートされた<br class="pc_vanish">インテリアスタイルを、
お好みに応じて<br class="pc_vanish">お選びいただけます'); ?></div>
<div class="LH175 sp_textL"><?php echo WORD_BR('理想の住まいを手軽に実現する3つのインテリアスタイルをご用意しています。
内装や設備の豊富なカラーセレクト＆コーディネートで、自分たちだけのこだわりの空間がつくれます。'); ?></div>
</div>
<ul class="flex box6 W1000 Wmax100per">
<li><img src="images/content/structure/p3-6-1.png">フローリング</li>
<li><img src="images/content/structure/p3-6-2.png">室内ドア</li>
<li><img src="images/content/structure/p3-6-3.png">壁</li>
<li><img src="images/content/structure/p3-6-4.png">キッチン</li>
<li><img src="images/content/structure/p3-6-5.png">バス</li>
<li><img src="images/content/structure/p3-6-6.png">洗面化粧台</li>
</ul>
<?php echo EFFECT_BTN('インテリア',$link_list['インテリア'][1].'について',array('arrow'=>true,'style'=>'width:20em;')); ?>
</div></div>
*/
?>
<div class="content_box"><div class="W1300 Wmax100per mgnAuto">
<div class="top_search" style="padding:0;"><div class="btnbox num1"><?php
echo EFFECT_BTN('物件検索',$top_bukken_btn['t'],$top_bukken_btn['a']);
?></div></div>
</div></div>
</div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>