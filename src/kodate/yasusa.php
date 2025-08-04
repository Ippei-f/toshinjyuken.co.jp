<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'images/content/xxxx/';
$p_title='安さ';
require $kaisou."temp_php/basic.php";
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
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap');
.yasusa_fuki{
	background-color: #F63402;
	color: #FFF;
	padding-top: 110px;
	padding-bottom: 120px;
	position: relative;
}
.yasusa_fuki::after{
	content: "";
	position: absolute;
	top: 100%;
	left: 0;
	right: 0;
	margin: auto;
	width: 0;
	border-style: solid;
	border-width: 30px 30px 0;
	border-color: #F63402 transparent;
}
.yasusa_fuki h2{
	display: flex;
	justify-content: center;
	align-items: center;
	font-size: 60px;
	font-weight: 900;
	line-height: 1em;
	font-family: 'Noto Sans JP', sans-serif;
}
.yasusa_fuki h2 font{color:#FFEE00;}
@media screen and (max-width: 999px) {
	.yasusa_fuki{
		padding: 30px 0;
	}
	.yasusa_fuki h2{
		font-size: 36px;
		line-height: 1.25em;
	}
}
.yasusa{
	font-family: 'Noto Sans JP', sans-serif;
	padding-bottom: 200px;
}
.yasusa h2{
	color:#DF1614;
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
	color:#DF1614;
	border-bottom: solid 2px #DF1614;
	padding-bottom: 0.5em;
	margin-bottom: 0.5em;
}
.yasusa h3 img{
	width: 43px;
	margin-right: 0.5em;
	margin-bottom: 0.25em;
}
.yasusa .btn_box{margin-top: 150px;}
.yasusa .btn_box .t{
	color:#DF1614;
	font-size: 25px;
	font-weight: 700;
	line-height: 1em;
}
.yasusa .btn_box .c_ovalbtn{
	display: flex;
	justify-content: center;
	margin-top: 20px;
}
.yasusa .btn_box .c_ovalbtn a{
	display: flex;
	justify-content: center;
	align-items: center;
	background-color: #F63402;
	color: #FFF;
	font-size: 28px;
	font-weight: 700;
	line-height: 1em;
	width: 770px;
	max-width: 100%;
	height: 70px;
	border-radius: 2em;
	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
}
.yasusa .btn_box .c_ovalbtn a span{
	margin-left: 0.5em;
	font-size: 80%;
}
@media screen and (max-width: 999px) {
	.yasusa{padding-bottom: 90px;}
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
	}
	.yasusa *[class*="flex"] > *:nth-of-type(n+2){margin-top: 20px;}	
	.yasusa h3{font-size: 23px;}
	.yasusa h3 img{width:35px;}
	.yasusa h3 + div{font-size: 12pt;}
	.yasusa .btn_box{margin-top: 110px;}
	.yasusa .btn_box .t{
		font-size: 17px;
		line-height: 1.25em;
	}
	.yasusa .btn_box .c_ovalbtn{margin-top: 15px;}
	.yasusa .btn_box .c_ovalbtn a{
		font-size: 17px;
		height:35px;
	}
}
</style>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php
/*
		発電シェルターから物故抜き→改変
*/
?>
<div class="yasusa_fuki pc_br_del">
<h2><div><font>高</font>品質・<font>低</font>コストの<br>秘密</div></h2>
</div>
<!-- *** -->
<div class="content_box">
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
<h3><img src="../hatsuden-shelter-house/images/top/yasusa-n'.$k.'.svg"><div class="col_R">'.WORD_BR($v[0]).'</div></h3>
<div class="LH175">
'.WORD_BR($v[1]).'</div>
</div>
<div><img src="images/content/yasusa/yasusa-p'.$k.'.png"></div>
</div>'.chr(10);
}
?>
<div class="btn_box">
<div class="t pc_br_del">これだけでは実現できない<br>高品質低価格の秘密がまだまだあります。</div>
<div class="c_ovalbtn pc_br_del"><a href="<?php echo $link_list['お問い合わせ'][0]; ?>">詳しくは担当スタッフへお尋ねください<span>▶︎▶︎</span></a></div>
</div>
</div>
</div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>