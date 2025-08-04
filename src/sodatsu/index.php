<?php
$p_type='index';
$kaisou='';
$p_title='TOP';
require $kaisou."temp_php/basic.php";
$dir=$dir_t;
$dir2=$dir.'so/';
require $kaisou."temp_php/func-top.php";
require $kaisou."system/function/cms-load.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/top.css" rel="stylesheet" type="text/css">
<link href="css/map.css" rel="stylesheet" type="text/css">
<link href="css/column.css" rel="stylesheet" type="text/css">
<?php
//バナーシステム2023年度ver読み込み
$toushin_bnr_url=$kaisou.'../recaptcha/';
require $toushin_bnr_url.'func-common-bnr-setup2023.php';
?>
<?php echo $temp_java; ?>
<script>
$(document).ready(function(){
	$(window).bind("resize load",function(){
		if ($(this).scrollTop() > $('.top_movie').height()-$('header').height()) {
			$('header').addClass('w');
		}
	});
});
$(window).load(function(){
	$(window).resize(function(){
		$('header').removeClass('fade');
	});
	$(window).scroll(function(){
		if ($(this).scrollTop() > $('.top_movie').height()-$('header').height()) {
			$('header').addClass('fade');
			$('header').addClass('w');
		}
		else{
			$('header').addClass('fade');
			$('header').removeClass('w');
		}
	});
});
</script>
<style>
body > div[align=center] > .H_head{display: none;}
</style>
</head>

<body class="borderbox index_page">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php
/*
<div class="content_box top_mainpic">
<h1><img class="title1" src="images/top/mainpic-title1.svg" alt="<?php echo $str='新・かぞくの皆さんを応援！'; ?>" title="<?php echo $str; ?>"></h1>
<?php
echo MAINPIC($dir,array('mainpic'=>'mainpic-chara.svg','class'=>'chara'));
?>
</div>
*/
?>
<div class="top_movie">
<video src="images/movie/top.mp4" class="W100per dpB" webkit-playsinline="" playsinline="" autoplay loop muted>
<p>動画を再生するにはvideoタグをサポートしたブラウザが必要です。</p>
</video>
<div class="ami"></div>
<img src="images/movie/catch.svg">
<img src="images/movie/scroll.svg">
</div>
<!-- *** -->
<div class="content_box top_catch">
<div class="Wbase W1300">
<div class="mgnAuto catch_img_2"><img src="images/top/catch0-2-link.svg"><a href="<?php echo $link_list['物件情報'][0] ?>"></a></div>
<div class="text sp_textL sp_br_del"><?php echo WORD_BR('『そだつ』は、いつでも誰でも「自分の家を持つこと」を可能にした新しい一戸建て。
一生に一度のマイホームというこれまでの考え方を超えて、
多様化する暮らしに合わせてカジュアルに購入や住み替えしやすいしくみをつくりました。
これから育まれる「新・かぞく」にぴったりな住まいです。'); ?></div>
<?php echo CONTENT_PAD(50,'sp/2'); ?>
<?php
//バナーシステム2023ver
echo TOUSHIN_COMMON_BNR_2023('そだつ/TOP');
?>
<?php echo CONTENT_PAD(50,'sp/2'); ?>
<?php
//「 キャンペーン開催中！！ 」物件ボタン
function TOP_BTN_BUKKEN_CAMPAIGN(){
	global $kaisou;
	//echo '<img src="'.$kaisou.'images/common/text-campaign.svg" class="mgnAuto" style="width: 572px; margin-bottom: 12px;">'.PHP_EOL;
	echo '<div style="font-size:min(32px,max(22px,3.2vw));font-weight:700;color:#e61f19;margin-bottom:24px;">キャンペーン開催中！！</div>'.PHP_EOL;
	echo EFFECT_BTN('物件情報','物件一覧はこちら',array('ver'=>2023,'arrow'=>true));
}
TOP_BTN_BUKKEN_CAMPAIGN();
?>
<?php echo CONTENT_PAD(90,'sp/2'); ?>
</div>
</div>
<!-- *** -->
<style>
.top_sec_20250331{}
.top_sec_20250331 .p{
	height: 745px;
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
}
.top_sec_20250331 .p .title{
	width:1120px;
	max-width: 90%;
	height:100%;
	margin: auto;
	padding-top: 50px;
	position: absolute;
	top:0;
}
.top_sec_20250331 .p img[src*="bg-"]{width:100%;height:100%;object-fit: cover;}
.top_sec_20250331 .p img[src*="title-"]{width:400px;margin-right: auto;}
.top_sec_20250331 .catch{background-color: #fff7fa;font-size: 24px;font-weight: 700;padding: 0.75em 0;}
.top_sec_20250331 .catch > div{font-size: 29px;}
.top_sec_20250331 .pad{padding: 30px 10px 50px;}
.top_sec_20250331 .merit{text-align: left;gap:30px 0;display: flex;flex-wrap: wrap;justify-content: space-between;}
.top_sec_20250331 .merit li{width:470px;max-width: 49%;}
.top_sec_20250331 .merit li .m1{padding-bottom: 10px;border-bottom: solid 2px #ff96a5; gap:13px;display: flex;align-items: center;}
.top_sec_20250331 .merit li .m1 .n{font-size: 13px;color: #ff96a5; display: flex;flex-direction: column;align-items: center;}
.top_sec_20250331 .merit li .m1 .n > div{font-size:calc(1em * 32 / 13);width:calc(1em * 52 / 32);height:calc(1em * 52 / 32);background-color: #ff96a5;color:#FFF;border-radius: 100%; display: flex;justify-content: center;align-items: center;}
.top_sec_20250331 .merit li .m1 .t{
	padding-top: 1em;
	font-size: 18px;
	font-weight: 700;
	display: flex;flex-wrap: wrap;align-items: center;
}
.top_sec_20250331 .merit li .m1 .t b{display: block;font-size: 1.5em;}
.top_sec_20250331 .merit li .m2{line-height: 2em;	padding: 0.5em 1em 0;}
@media screen and (max-width: 999px) {
	.top_sec_20250331 .p{height: auto;}
	.top_sec_20250331 img[src*="title-"]{object-fit: cover; object-position: center 60%; width: 370px; height: 210px;}
	.top_sec_20250331 .catch{font-size: 17px;padding: 2em 0;line-height: 1.5em;}
	.top_sec_20250331 .catch > div{font-size: 21px;line-height: 1.5em;}
	.top_sec_20250331 .pad{padding: 20px 10px 25px;}
	.top_sec_20250331 .merit{gap:25px 0;}
	.top_sec_20250331 .merit li{width:100%;max-width: 100%;}
	.top_sec_20250331 .merit li .m1 .n{font-size: 10px;}
	.top_sec_20250331 .merit li .m1 .t{font-size: 15px;}
	.top_sec_20250331 .merit li .m1 .t b{font-size: 20px;}
	.top_sec_20250331 .merit li .m2{font-size: 15px;}
}
</style>
<section class="top_sec_20250331 LH125">
<div class="p"><img src="images/top/20250331/bg-3LDK.jpg"><div class="title sp_vanish"><img src="images/top/20250331/title-3LDK.svg"></div></div>
<div class="title pc_vanish"><img src="images/top/20250331/title-3LDK.svg"></div>
<div class="catch">心にもお財布にもゆとりを
<div><span style="color:#ff64a5;">『そだつプロジェクト』</span>のメリット</div></div>
<div class="Wbase pad"><ul class="merit">
<?php
$arr=array
(array('コンパクトな動線で<b>家事がラクラク！</b>','そだつプロジェクトの家は手が行き届く「ちょうどいいサイズ感」が魅力。無駄のない設計で、快適な暮らしを応援します。')
,array('シンプルライフで<b>心にゆとりを。</b>','2人くらいにちょうどいいサイズの空間をご用意。余計なモノを手放したミニマルな暮らしで、本当に大切なモノに集中できます。')
,array('毎日の生活で持続できる<b>省エネ・サステナブルな暮らし。</b>','コンパクトな間取りは冷暖房効率がアップするため、無駄なエネルギー消費を抑えます。環境負荷を減らしながら豊かに暮らす「サステナブルな暮らし」を。')
,array('暮らしの変化に合わせ、<b>間取りを自由に変えられる！</b>','賃貸では壁に穴を空けることでさえ気を使いますが、『そだつ』なら、家族の成長や家族構成の変化に合わせて部屋数を増減させたりと、自由な住まいづくりを楽しむことができます。')
,array('<b>住宅そのものが確実な資産に！</b>もったいない家賃から解放されます。','家賃は払い続けても何も残りませんが、住宅ローンは支払った分の一部は将来的にそのまま自分の資産となります。そだつの場合、頭金不要で購入することが可能な価格帯であるため、いますぐ資産形成をはじめることができます。')
);
foreach($arr as $k => $v){
	echo '<li><div class="m1"><div class="n">メリット<div>'.($k+1).'</div></div><div class="t">'.$v[0].'</div></div><div class="m2">'.$v[1].'</div></li>';
}
?>
</ul></div>
</section>
<!-- *** -->
<div class="content_box bg_FFF_y top_news">
<div class="Wbase">
<?php echo CONTENT_PAD(45); ?>
<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak"><tr>
<td class="title"><div class="fontP175 LH100 font_bold">NEWS</div></td>
</tr><tr>
<td><ul>
<?php
$arr=array();
foreach(CMS_SETUP('news') as $key => $sysdata){
	if(CMS_OPEN($sysdata)){continue;}
	CMS_DATA_REPLACE();
	$ext=array('jpg','gif','png','pdf','xlsx','xls','doc','docx','ppt','pptx');
	$upf='';
	foreach($ext as $v){
		$url=$img_updir.$sysdata[0].'-0link_file.'.$v;
		if(file_exists($url)){
			$upf=$url;
			break;
		}
	}
	$d=date('Y/n/j',strtotime($sysdata[1]));
	$nm=($sysdata[11]==1)?'NEW':'';
	$str='<span>'.$sysdata[2].'</span>';
	switch(true){
		case ($upf!=''):
		$str='<a href="'.$upf.'" target="_blank" class="col_06F">'.$str.'</a>';
		break;
		case ($sysdata[4]!=''):
		$str='<a href="'.$sysdata[4].'"'.(($sysdata[5]==2)?' target="_blank"':'').' class="col_06F">'.$str.'</a>';
		break;
		case ($link_list['NEWS'][0]!=''):
		$str='<a href="'.$link_list['NEWS'][0].'?id='.$sysdata[0].'" class="col_06F">'.$str.'</a>';
		break;
		default:
		$str='<a>'.$str.'</a>';
	}
	$arr[]=array($d,$sysdata[3],$nm,$str);
}

$cnt=0;
$cate=COMMON_PARAM('news_cate');
foreach($arr as $v){
	$text='<td class="text" colspan="2">'.$v[3].'</td>';
	if($v[2]!=''){
		$text='<td class="newmark"><div><span>'.$v[2].'</span></div></td><td class="text">'.$v[3].'</td>';
	}
	echo '<li><table border="0" cellpadding="0" cellspacing="0"><tr>
<td class="date"><div>'.$v[0].'</div></td>
<td class="cate c'.$v[1].'"><div><span>'.$cate[$v[1]].'</span></div></td>
'.$text.'
</tr></table></li>'.chr(10);
	$cnt++;
	if($cnt>=5){break;}
}
?>
</ul></td>
</tr></table>
<?php echo CONTENT_PAD(30); ?>
<a href="<?php echo $link_list['NEWS'][0]; ?>" class="btn_list radius1em">MORE</a>
<?php echo CONTENT_PAD(50); ?>
</div>
</div>
<!-- *** -->
<?php
/*
//※2024/11/27…MAP一時封印

<div class="content_box">
<div class="Wbase W1120">
<?php echo TOP_SUBT('そだつプロジェクト<span class="sp_vanish"> </span><br class="pc_vanish">物件MAP','mini font_meiryo'); ?>
<?php echo CONTENT_PAD(30); ?>
<?php
//Googlemapテンプレート
require $kaisou."temp_php/temp-map.php";
?>
<?php echo CONTENT_PAD(0,30); ?>
</div>
</div>
*/
?>
<!-- *** -->
<?php echo ANCHOR('bukken'); ?>
<div class="content_box">
<div class="Wbase W1120">
<?php
if(false){

echo TOP_SUBT('物件情報','mini font_meiryo');

//「 ＼毎月ぞくぞく／ 」物件ボタン
function TOP_BTN_BUKKEN_ZOKUZOKU(){

	return false;//非表示化

/*
<img src="<?php echo $kaisou; ?>images/common/text-zokuzoku.svg" class="mgnAuto" style="width: 572px; margin-bottom: 12px;">
*/
echo EFFECT_BTN('物件情報','すべての物件を見る',array('ver'=>2023,'arrow'=>true));
}

//物件スライダーテンプレート
require $kaisou."temp_php/temp_bukkenslide.php";

}//if(false)

//バナーシステム2023ver
echo TOUSHIN_COMMON_BNR_2023('そだつ/TOP・物件情報下');
?>
<!-- 安さの秘密バナー -->
<?php
/*
<ul class="top_bnrbox_2023">
<li><a href="#yasusa"><img src="images/top/so/bnr-yasusa_W450H200.png"></a></li>
</ul>
*/
?>
<?php echo CONTENT_PAD(100); ?>
</div>
</div>
<!-- *** -->
<div class="content_box">
<div class="Wbase">
<h2 class="sodatsu_top_subt"><img src="images/top/so/title-A1.svg" alt="誰もが“すぐに”家を持てる！" class="mgnAuto" style="width:994px;"></h2>
<h3 class="sodatsu_top_subt"><img src="images/top/so/title-B1.svg" alt="資産がそだつ" class="mgnAuto" style="width:392px; max-width: 78.4%;"></h3>
<h4 class="sodatsu_top_subt"><span class="dpIB">マイホーム生活しながら<span class="sp_vanish">、</span></span><span class="dpIB">たくさん貯金ができる！</span></h4>
<div class="textL sp_br_del LH200"><?php echo WORD_BR('『そだつ』は、住まう人が住宅費の支払いに追われる生活ではなく、日々穏やかにゆとりのある暮らしを実現することを第一に考えています。賃貸よりも上質で快適な暮らしを送りながらも、毎月の支払いは頭金なしでも家賃と同等もしくはそれ以下の支払いになるような販売価格を実現。これによりマイホームという資産を手に入れながら、貯金にまで手が回るライフスタイルを送ることができます。'); ?></div>
<table border="0" cellpadding="0" cellspacing="0" class="sec01_tbl sp_tblbreak_limited"><tr>
<td><img src="images/top/so/sec01-1.svg"></td>
<td></td>
<td><img src="images/top/so/sec01-2.jpg"></td>
</tr></table>
<?php echo CONTENT_PAD(110,'sp/2'); ?>
<?php
//バナーシステム2023ver
echo TOUSHIN_COMMON_BNR_2023('そだつ/TOP・資産がそだつ下');
?>
<?php echo CONTENT_PAD(110,'sp/2'); ?>
<?php
/*
//2025/04/01削除
<!-- 安さの秘密 -->
<?php echo ANCHOR('yasusa'); ?>
<div class="Wbase">
<h4 class="Wbase W830 sodatsu_top_subt sec01_pink">高品質・低コストの秘密</h4>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap');
.yasusa{
	font-family: 'Noto Sans JP', sans-serif;
}
.yasusa h2{
	color:#FF64A5;
	font-size: 40px;
	font-weight: 900;
	line-height: 1em;
	margin-top: 75px;
	margin-bottom: 80px;
}
.yasusa *[class*="flex"]{
	display: flex;
	justify-content: space-between;
	text-align: justify;
	max-width: 1000px;
	margin-top: 75px;
}
.yasusa .flex1 > *{
	width: 460px;
	max-width: 100%;
}
.yasusa h3{
	display: flex;
	align-items: flex-end;
	font-size: 28px;
	font-weight: 900;
	line-height: 1.25em;
	color:#FF64A5;
	border-bottom: solid 2px #FF64A5;
	padding-bottom: 0.5em;
	margin-bottom: 0.5em;
}
.yasusa h3 img{
	width: 43px;
	margin-right: 0.5em;
	margin-bottom: 0.25em;
}
.yasusa .btn_box{margin-top: 100px;}
.yasusa .btn_box .t{
	color:#FF64A5;
	font-size: 25px;
	font-weight: 700;
	line-height: 1em;
}
.yasusa .btn_box .t + *{margin-top: 20px;}
.yasusa .btn_box .t + * a{
	width:100%;
	max-width: 770px;
}
.yasusa .btn_box .t + * a .text{
	padding: 1em 0;
}
.yasusa .btn_box .t + * a .t_arrow{
	margin-left: 0.5em;
	font-size: 80%;
}
@media screen and (max-width: 999px) {
	.yasusa h2{
		font-size: 32px;
		line-height: 1.25em;
		margin-top: 45px;
		margin-bottom: 40px;
	}
	.yasusa h2 + *[class*="flex"]{margin-top: 0;}
	.yasusa *[class*="flex"]{
		flex-direction: column;
    align-items: center;
		margin-top: 50px;
	}
	.yasusa *[class*="flex"] > *:nth-of-type(n+2){margin-top: 20px;}	
	.yasusa h3{font-size: 23px;}
	.yasusa h3 img{width:35px;}
	.yasusa h3 + div{font-size: 12pt;}
	.yasusa .btn_box{margin-top: 50px;}
	.yasusa .btn_box .t{
		font-size: 17px;
		line-height: 1.25em;
	}
	.yasusa .btn_box .t + *{margin-top: 15px;}
	.yasusa .btn_box .t + * a{font-size: 1rem;}
}
</style>
<div class="yasusa">
<h2 class="pc_br_del">新築相場の<br>6～7割の価格を実現！</h2>
<?php
$arr=array
(1=>array('日々の暮らしにちょうどいい
徹底的にムダを省いた設計！','近隣住宅との共有部分をカット、駐車場は必要な数を見極めて用意、2人くらいにちょうどいい間取りなど、「本当に必要か」見直しを繰り返したシンプルな設計により、大幅なコストダウンを実現しました。')
,2=>array('高い品質を保ちながら
コストを抑えて低価格を実現！','東新住建は分譲住宅だけではなく、注文住宅の設計・建築のほか建築請負も行う全国展開で年間約500棟を建設。建物に使用する2×4パネルはすべて専属工場で徹底した品質管理のもと生産しています。
数多くの需要に対応するスケールメリットで、市場の落ち込み等が起こった場合にも建築資材を安定的に調達することができ、高い品質を保ちながら建物にかけるコストを最低限に抑えることができます。')
,3=>array('人件費・広告費をカット！','オンライン販売に特化することで、チラシ等の広告費やセールスの人件費など販売にかかるコストを大幅に削減。これにより販売価格を抑えることが可能になりました。')
);
foreach($arr as $k => $v){
	echo '<div class="Wbase flex1">
<div>
<h3><img src="images/top/2023-yasusa/yasusa-n'.$k.'.svg"><div class="col_R">'.WORD_BR($v[0]).'</div></h3>
<div class="LH175">
'.WORD_BR($v[1]).'</div>
</div>
<div><img src="images/top/2023-yasusa/yasusa-p'.$k.'.png"></div>
</div>'.chr(10);
}
?>
<div class="btn_box">
<div class="t pc_br_del">これだけでは実現できない<br>高品質低価格の秘密がまだまだあります。</div>
<?php echo EFFECT_BTN('お問い合わせ','詳しくは担当スタッフへお尋ねください<span class="t_arrow">▶︎▶︎</span>',array('ver'=>2023)); ?>
</div>
</div>

</div>
<!-- 安さの秘密 -->
<?php echo CONTENT_PAD(110,'sp/2'); ?>
*/
?>
<div class="Wbase W830">
<h4 class="sodatsu_top_subt sec01_pink">賃貸に住むより、お金が貯まる！</h4>
<?php
echo CONTENT_PAD(70,'sp/2');
echo MAINPIC($dir2,array('mainpic'=>'sec01-3-2.svg','class'=>'W100per','alt'=>''));
?>
<?php echo CONTENT_PAD(120,'sp/2'); ?>
</div>
<!-- **** -->
<h3 class="sodatsu_top_subt"><img src="images/top/so/title-B2.svg" alt="暮らしがそだつ" class="mgnAuto" style="width:443px; max-width: 88.6%;"></h3>
<h4 class="sodatsu_top_subt">一生に一度のマイホームという考え方を覆します</h4>
<div class="textL sp_br_del LH200"><?php echo WORD_BR('『そだつ』は、一生に一度のマイホームという考え方を過去のものにします。日々成長し変化していく暮らしに合わせて、家自体もそのカタチを変えていくのが自然です。そだつは地震に強い2×4工法の構造を採用したり、スムーズな住み替えをサポートするため11,320戸、入居率97.7%（※2021年3月末時点）の管理実績を誇るBLUEBOX（東新住建グループ）がバックアップするなど、住まう人の人生に寄り添った提案をおこなっています。'); ?></div>
<?php echo CONTENT_PAD(50,'sp/2'); ?>
<div class="Wbase W850">
<?php
echo MAINPIC($dir2,array('mainpic'=>'sec02-1.svg','class'=>'','alt'=>''));
?>
</div>
<?php echo CONTENT_PAD(80,'sp/2'); ?>
<div class="Wbase W830"><h4 class="sodatsu_top_subt sec01_pink pc_br_del">『そだつ』が実現する暮らし（ライフステージ）</h4></div>
<div class="Wbase W980">
<?php
echo CONTENT_PAD(50,'sp/2');
echo MAINPIC($dir2,array('mainpic'=>'sec02-2-1.svg','class'=>'','alt'=>''));
echo CONTENT_PAD(50,'sp/2');
echo MAINPIC($dir2,array('mainpic'=>'sec02-2-2.svg','class'=>'','alt'=>''));
echo CONTENT_PAD(50,'sp/2');
echo MAINPIC($dir2,array('mainpic'=>'sec02-2-3.svg','class'=>'','alt'=>''));
?>
</div>
<?php echo CONTENT_PAD(60,'sp/2'); ?>
<div class="mgnAuto Wmax100per" style="width:920px;">
<?php
echo MAINPIC($dir2,array('mainpic'=>'sec02-3.svg','class'=>'mgnAuto','alt'=>''));
?>
</div>
</div>

<?php echo CONTENT_PAD(60,'sp/2');//▼お客様の声バナー ?>
<a href="<?php echo $link_list['お客様の声'][0]; ?>" class="top_bnr_voice_ver2" title="お客様の声">
<img src="images/content/voice/bnr/bnr-voice-ver2.png" class="sp_vanish">
<img src="images/content/voice/bnr/bnr-voice-ver2-sp.png" class="pc_vanish">
</a>
<?php //echo CONTENT_PAD(70,'sp/2'); ?>
<?php //TOP_BTN_BUKKEN_ZOKUZOKU(); ?>
<?php echo CONTENT_PAD(90,'sp/2'); ?>
<?php
//バナーシステム2023ver
echo TOUSHIN_COMMON_BNR_2023('そだつ/TOP・お客様の声下');
?>
<?php echo CONTENT_PAD(90,'sp/2'); ?>
</div>
<!-- *** -->
<div class="content_box bg_FFF_gray">
<div class="Wbase sec06">
<?php echo CONTENT_PAD(80,'sp/2'); ?>
<h3 class="sodatsu_top_subt"><img src="images/top/so/title-C2.svg" alt="『そだつ』はなぜ、購入しやすい？" class="mgnAuto" style="width:724px;"></h3>
<h4 class="sodatsu_top_subt"><span class="col_F6A">「売れる」・「貸せる」</span>が前提の一戸建て</h4>
<div class="floatL_pc w43p">
<div class="textL sp_br_del LH200"><?php echo WORD_BR('『そだつ』は、購入後のライフスタイルの自由度の高さも魅力のひとつです。手頃なサイズ感や価格設定が中古住宅市場や賃貸市場で大きなアドバンテージとなり、売りやすく貸しやすいのが特長です。
ずっと住みづけるのもよし、売るのも貸すのもよし、と柔軟性に富んだ合理的な選択ができます。'); ?></div>
</div>
<div class="floatR_pc w38p"><img src="images/top/so/sec06-p3.jpg" class="W100per"></div>
<div class="clear"></div>
<?php echo CONTENT_PAD(50,'sp/2'); ?>
</div>
<div class="Wbase W900">
<ul class="sec06_2">
<?php
$arr=array
(1=>array('p'=>310
				 ,'t1'=>'【売れる理由】'
				 ,'t2'=>'コンパクトサイズの戸建住宅を低価格で実現した『そだつ』は、賃貸からグレードアップしたいお客さまからの要望が高く、中古住宅市場でも人気です。'
				 ,'t3'=>array('再販売しやすい価格設定'
				 						 ,'人気のコンパクトサイズ')
				 )
,2=>array('p'=>304
				 ,'t1'=>'【貸せる理由】'
				 ,'t2'=>'戸建タイプの賃貸物件は希少性が高く賃貸市場では根強い人気があります。東新住建グループのBLUEBOXがご所有の物件の仲介斡旋と管理を引き受けします。家賃保証制度が充実しているため安心しておまかせいただけます。'
				 ,'t3'=>array('戸建タイプは希少性が高い'
				 						 ,'家賃保証制度も充実')
				 )
);
foreach($arr as $k => $v){
	echo '<li>
<div style="min-height: 250px;"><img src="images/top/so/sec06-p4-'.$k.'.svg" class="mgnAuto" style="width:'.$v['p'].'px;"></div>
<b class="dpB textL LH150 fontP200 col_F6A" style="margin-top: 0.5em;margin-left: -0.5em;">'.WORD_BR($v['t1']).'</b>
<div class="textL sp_br_del LH200 min11">'.WORD_BR($v['t2']).'</div>'.chr(10);
	foreach($v['t3'] as $v3){
		echo '<b class="dpB textL LH150 fontP150"><span class="col_F6A">・</span>'.$v3.'</b>'.chr(10);
	}
	echo '</li>'.chr(10);
}
?>
</ul>
<?php echo CONTENT_PAD(60,'sp/2'); ?>
<?php echo ANCHOR('gallery_2021'); ?>
<div class="top_gallery_2021 font_yugo">
<?php
/*
<div class="title">
<img src="images/top/2021-gallery/icon.svg">
<div class="LH150">
<div>「売れる、貸せる」を証明します！</div>
<a href="<?php echo $link_list['ギャラリー'][0]; ?>">ギャラリー北名古屋</a>に<br class="pc_vanish">お越しください
</div>
</div>
*/
?>
<ul class="white" style="margin-top: 0;">
<li><img src="images/top/2021-gallery/ikura.svg"></li>
<li>
<div class="LH150"><?php echo WORD_BR('ご検討中の物件の
簡単査定シミュレーションを
プレゼント！'); ?></div>
<ul><li>将来の売却価格</li><li>想定家賃</li></ul>
<div class="LH175">ご検討中の物件を賃貸で貸し出した場合の家賃や売価価格を事前にお調べすることが可能です。全国の7000万件以上の販売動向を蓄積するビッグデータを不動産AIを活用して分析し、適正な家賃査定額や売却時の価格を導きだします。</div>
<div class="LH150"><a href="<?php echo $link_list['お問い合わせ'][0]; ?>">来場予約・お問合せフォーム</a>より<br class="pc_vanish">お申し込みください</div>
</li>
</ul>
</div>
<?php echo CONTENT_PAD(50,'sp/2'); ?>
<hr>
<div class="sec06_3">
<img src="images/top/so/sec06-bluebox.svg">
<div class="textL sp_br_del LH200 fontP090"><?php echo WORD_BR('1985年の設立以来、賃貸仲介や不動産売買を中心に土地活用コンサルティングまで手掛ける不動産の総合企業です。現在は中部圏・関東圏に数多くの拠点を展開。不動産オーナーさまと入居者さまとの数多くの理想的なマッチングを実現しています。'); ?></div>
</div>
<hr>
<?php echo CONTENT_PAD(40,'sp/2'); ?>
<h4 class="sodatsu_top_subt col_F6A" style="margin-bottom: 0.5em;">売却時や住み替え時の不安を解消する4つのお約束</h4>
<ul class="sec06_4">
<?php
$arr=array
(1=>'買い取り代金は
一括してお支払い'
,2=>'人に知られず
スムーズに移行可能'
,3=>'将来的に再度購入する
こともできます'
,4=>'住宅ローンが
未完済でもOK'
);
foreach($arr as $k => $v){
	echo '<li><img src="images/top/so/sec06-num'.$k.'.svg">'.WORD_BR($v).'</li>'.chr(10);
}
?>
</ul>
<?php echo CONTENT_PAD(80,'sp/2'); ?>
</div>
</div>
<!-- *** -->
<?php
/*
//2025/04/01削除
<div class="bg_cover" style="background-image: url(images/top/so/sec03-bg.jpg);">
<?php
echo MAINPIC($dir2,array('mainpic'=>'sec03-mainpic.jpg','class'=>'','alt'=>''));
?>
<div class="content_box">
<?php echo CONTENT_PAD(80,'sp/2'); ?>
<div class="textC pc_br_del fontP150 font_bold LH200 sp_LH150"><?php echo WORD_BR('賃貸にはない<span class="col_F6A">『そだつ』</span>
のメリット'); ?></div>
<div class="Wbase">
<?php
$arr=array
(1=>array('t1'=>array(175=>'すぐに<span class="col_FA2">庭付きでゆとり</span>のある'
										 ,125=>'マイホーム生活を実現できる！')
				 ,'t2'=>'賃貸では探すことが困難な戸建物件に、毎月の家賃と同等の負担で「自分の家」として暮らすことができます。庭付きだから四季の移ろいを肌で感じたり、アウトドアを楽しんだりと、日々心を満たす充実した戸建て生活が送れます。'
				 ,'t3'=>array('自分の家だから気兼ねなく暮らせる'
				 						 ,'自分の部屋でのびのびできる'
										 ,'隣室との騒音問題から解放'
										 ,'庭いじりが楽しめる')
				 )
,2=>array('t1'=>array(125=>'暮らしの変化に合わせ、'
										 ,175=>'<span class="col_FA2">間取りを自由</span>に変えられる！')
				 ,'t2'=>'賃貸では壁に穴を空けることでさえ気を使いますが、『そだつ』なら、気分に合わせて壁紙や照明を変えてみたり、また家族の成長や家族構成の変化に合わせて部屋数を増減させたりと、自由な住まいづくりを楽しむことができます。'
				 ,'t3'=>array('購入時にオーダーを受付'
				 						 ,'暮らしに合わせて間取り変更可能')
				 )
,3=>array('t1'=>array(175=>'住宅そのものが<span class="col_FA2">確実な資産</span>に！'
										 ,125=>'もったいない家賃から解放されます。')
				 ,'t2'=>'家賃は払い続けても何も残りませんが、住宅ローンは支払った分の一部は将来的にそのまま自分の資産となります。そだつの場合、頭金不要で購入することが可能な価格帯であるため、いますぐ資産形成をはじめることができます。'
				 ,'t3'=>array('資産を築きながら生活できる'
				 						 ,'土地の資産価値は落ちにくい')
				 )
);

foreach($arr as $k => $v){
	echo '<div class="sec03_set">
<table border="0" cellpadding="0" cellspacing="0"><tr>
<td class="merit"><img src="images/top/so/sec03-merit'.$k.'.svg"></td>
<th class="LH150">'.chr(10);
	foreach($v['t1'] as $k1 => $v1){
		echo '<div class="fontP'.$k1.'">'.$v1.'</div>'.chr(10);
	}
	echo '</th>
</tr><tr>
<td colspan="2" class="text LH200">'.WORD_BR($v['t2']).'</td>
</tr></table>
<img src="images/top/so/sec03-p'.$k.'.jpg">
<ul>'.chr(10);
	foreach($v['t3'] as $k3 => $v3){
		echo '<li><span class="col_F6A">◎</span>'.$v3.'</li>'.chr(10);
	}
	echo '</ul>
</div>'.chr(10);
}
?>
</div>
<?php echo CONTENT_PAD(80,'sp/2'); ?>
</div>
</div>
*/
?>
<!-- *** -->
<div class="content_box">
<div class="Wbase W1120">
<?php echo CONTENT_PAD(110,'sp/2'); ?>
<h2 class="sodatsu_top_subt"><img src="images/top/so/title-A2.svg" alt="安心のブランド「東新住建の家」" class="mgnAuto" style="width:952px;"></h2>
<h4 class="sodatsu_top_subt pc_br_del">長く住み続けられる<br>高耐久・高品質な住まい</h4>
<ul class="sec05_list">
<?php
$arr=array
('1.png'=>array('国土交通省大臣認可
東新住建独自の「4.3倍2×4工法」'
							 ,'強い衝撃を壁・天井・床の6面全体で受け止めバランス良く吸収するため、水平・垂直、両方向からの力に優れた強さを発揮する2×4工法をさらに進化させた壁量4.3倍パネルを開発。
従来の1.4倍以上の耐力アップを実現しました。')
/*
'1.png'=>array('地震に負けないタフな構造
2×4工法'
							 ,'2×4工法は木材を用いる建築工法の１つで、もともとアメリカを中心に普及した工法です。強い衝撃を壁・天井・床の6面全体で受け止めバランス良く吸収するため、水平・垂直、両方向からの力に優れた強さを発揮します。')
*/
,'2.jpg'=>array('強い地盤をつくる
砕石パイル工法'
							 ,'地震対策でもっとも注意すべきは、土地の液状化です。そこで自然石による杭を打ち込み、地盤沈下や建物の傾きを防ぐのが砕石パイル工法。東日本大震災でも効果が確かめられています。
							 ※現場によって異なります。')
,'3.jpg'=>array('リラックス効果のある
自然素材の木の家'
							 ,'木の家の心地のよさの秘密。それは木の香り成分であるフィトンチッドには、心を落ち着かせる効果があるから。さまざまな実験により、血圧や脈拍の減少やストレスホルモンの分泌を低減する効果も認められています。')
/*
,'4.jpg'=>array('自然の力を最大限に生かす
環境共生の家'
							 ,'構造材には木材から、地盤強化には天然石から、さらにエネルギーには太陽光発電から。私たちの家づくりは自然の恵みを有効活用することで地球環境に優しい社会づくりへ貢献しています。')
*/
,'5.png'=>array('最新のエコ設備で家計を応援<img src="images/top/so/sec05-p5-logo.png">'
							 ,'エコジョーズとは、少ないガス量で効率よくお湯を沸かす省エネ性の高い給湯器のことです。お湯を沸かす時にでる高温の排気熱を再利用することで、熱効率の高い給湯を可能にしました。独自の排熱回収システムにより大気中へのムダな熱の放出を低減し、CO2排出量を削減、地球温暖化防止に貢献します。さらにガス自体の使用量も削減でき、家計を助けます。')
);
foreach($arr as $k => $v){
	echo '<li><table border="0" cellpadding="0" cellspacing="0">
<tr><td><div class="text">
<b class="LH150">'.WORD_BR($v[0]).'</b>
<div class="textL sp_br_del LH200">'.WORD_BR($v[1]).'</div>
</div></td></tr>
<tr><td class="pic"><img src="images/top/so/sec05-p'.$k.'"></td></tr>
</table></li>'.chr(10);
}
?>
</ul>
<?php echo CONTENT_PAD(90,'sp/2'); ?>
<a href="<?php echo $link_list['東新住建-暮らしを支える7つの安心'][0]; ?>" class="sec05_link">東新住建の家づくりについて、詳しくはこちら</a>
</div>
<?php echo CONTENT_PAD(90,'sp/2'); ?>
</div>
<!-- *** -->
<div class="content_box">
<div class="Wbase sec07">
<?php echo CONTENT_PAD(70,'sp/2'); ?>
<img src="images/top/so/sec07-line.svg">
<?php echo CONTENT_PAD(50,'sp/2'); ?>
<table border="0" cellpadding="0" cellspacing="0" class="W100per sp_tblbreak_limited"><tr>
<td rowspan="2" class="t1"><img src="images/top/so/sec07-column.png"></td>
<td rowspan="2" class="p1"></td>
<td colspan="3" class="t2"><b class="dpB textL LH150"><?php echo WORD_BR('コロナ禍で大きく変化した住まいへのニーズ。
賃貸では特に需要の高い戸建型コンパクトハウス'); ?></b></td>
</tr><tr>
<td class="t3"><div class="textL sp_br_del LH200 fontP090"><?php echo WORD_BR('長引くコロナ禍の暮らしのなかで、住まいに求められるニーズも大きく変化。多額の借り入れを行なうリスクの再認識だったり、テレワーク需要の拡大により必ずしも駅近の物件である必要がなくなったり、ストレスなく自宅で仕事ができたり庭でリフレッシュできる環境だったり。『そだつ』はこうしたニーズを確実にキャッチした、これからの生活に対応できる一戸建てです。'); ?></div></td>
<td class="p2"></td>
<td class="t4"><img src="images/top/so/sec07-p1.jpg"></td>
</tr></table>
<?php echo CONTENT_PAD(50,'sp/2'); ?>
<img src="images/top/so/sec07-line.svg">
</div>

<?php //echo CONTENT_PAD(110,'sp/2'); ?>
<?php //TOP_BTN_BUKKEN_ZOKUZOKU(); ?>
<?php echo CONTENT_PAD(90,'sp/2'); ?>
</div>
<!-- ** -->
<?php
$column_add='<div class="top_column content_box"><div class="Wbase">
<div class="subt"><div class="en">COLUMN</div><h2>コラム</h2></div>
<ul class="LS_list">'.chr(10);
$max=6;
$cnt=0;
foreach(CMS_SETUP('column') as $key => $sysdata){
	if(CMS_OPEN($sysdata)){continue;}
	CMS_DATA_REPLACE();
	CMS_IMGSET($sysdata[0],array('upfile'=>'column'));
	//print_r($sysdata);
	if(!is_array($sysdata[6])){$sysdata[6]=array($sysdata[6],'');}
	$text=($sysdata[6][1]!='')?$sysdata[6][1]:$sysdata[6][0];
	$column_add.='<li><a href="'.$link_list['コラム'][0].'?id='.$sysdata[0].$t_blank.'"><img src="images/common/clear-W300H190.png" class="W100per bg_cover" style="background-image: url('.$sysdata['upfile'][0].');"><div class="pad"><div class="title">'.$text.'</div><div class="btn">記事を見る　&gt</div></div></a></li>';
	$cnt++;
	if($cnt>=$max){break;}
}
$column_add.='</ul>
'.EFFECT_BTN('コラム','すべての記事を見る',array('ver'=>2023,'class'=>'colW andP','arrow'=>true)).'
</div></div>'.chr(10);
$temp_footer=str_replace($str='<div class="W1000 Wmax100per mgnAuto bottom_bnr">',$column_add.$str,$temp_footer);//ねじ込み
unset($column_add);
?>
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php
//ログインボックス
require $kaisou."temp_php/temp_loginbox.php";
?>
<?php echo $temp_bodyend; ?>
<?php
//Googlemapテンプレート・bodyend

//※2024/11/27…MAP一時封印
//require $kaisou."temp_php/temp-map-bodyend.php";
?>
<?php
/*
<!-- CHATBOX -->
<script>(function(){
var w=window,d=document;
var s="https://app.chatplus.jp/cp.js";
d["__cp_d"]="https://app.chatplus.jp";
d["__cp_c"]="0c1f9137_4";
var a=d.createElement("script"), m=d.getElementsByTagName("script")[0];
a.async=true,a.src=s,m.parentNode.insertBefore(a,m);})();</script>
*/
?>
</body>
</html>