<?php
$p_type='content';
$kaisou='';
$p_title='QA';
$dir=$kaisou.'images/content/qa/';
require $kaisou."temp_php/basic.php";
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
.local_qa_set{text-align: left;}
.local_qa_set li{padding-top: 75px;}
.local_qa_set li > div:nth-child(1) .flex{display: flex;}
.local_qa_set li > div:nth-child(1) .flex > *{
	background-color: #EDEEE6;
	position: relative;
	padding: 30px 24px;
	display: flex;
	align-items: flex-start;
}
.local_qa_set li:nth-child(2n+1) > div:nth-child(1) .flex > *{margin-right: auto;}
.local_qa_set li:nth-child(2n+2) > div:nth-child(1) .flex > *{margin-left: auto;}
.local_qa_set li > div:nth-child(1) .flex .Q,
.local_qa_set li > div:nth-child(2) .flex .A{
	width: 30px;
	min-width: 30px;
}
.local_qa_set li > div:nth-child(1) .flex .text{
	font-size: 125%;
	font-weight: bold;
	line-height: 125%;
	padding-top: 2px;
	padding-left: 0.5em;
	flex-grow: 1;
}
.local_qa_set li > div:nth-child(1) .flex .arrow{
	width:29px;
	position: absolute;
	top: 100%;
}
.local_qa_set li:nth-child(2n+1) > div:nth-child(1) .flex .arrow{left: 55px;}
.local_qa_set li:nth-child(2n+2) > div:nth-child(1) .flex .arrow{right: 55px;transform: scaleX(-1);}
.local_qa_set li > div:nth-child(2){
	margin-top: 38px;
	background-color: #E0EAE0;
}
.local_qa_set li > div:nth-child(2) .flex{
	display: flex;
	align-items: flex-start;
	padding: 30px 0;
}
.local_qa_set li > div:nth-child(2) .flex .A{padding-top: 2px;}
.local_qa_set li > div:nth-child(2) .flex .text{
	line-height: 200%;
	padding-left: 30px;
	flex-grow: 1;
}
@media screen and (max-width: 999px) {
	.local_qa_set li{padding-top: 45px;}
	.local_qa_set li:nth-child(1){padding-top: 0;}
	.local_qa_set li > div:nth-child(1) .flex > *{
		width: 100%;
		padding: 20px 16px;
	}
	.local_qa_set li > div:nth-child(1) .flex .text{
		font-size: 100%;
		padding-top: 7px;
	}
	.local_qa_set li > div:nth-child(2){margin-top: 25px;}
	.local_qa_set li > div:nth-child(2) .flex .text{padding-left: 16px;}
}

.local_qa_modelcase{
	max-width: 1180px;
	margin-top: 120px;
	display: flex;
	flex-direction: column;
	align-items: center;
}
.local_qa_modelcase h3{
	color:#FFF;
	background-color: #159C76;
	width:100%;
	max-width: 550px;
	font-size: 225%;
	line-height: 175%;
	margin-bottom: 30px;
}
.local_qa_modelcase ul{
	width:100%;
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	margin-top: 40px;
}
.local_qa_modelcase ul img{width:100%;}
.local_qa_modelcase ul + div{
	border-top: solid 1px #000;
	border-bottom: solid 1px #000;
	margin-top: 80px;
	font-weight: bold;
	width:100%;
	padding: 1em 0;
}
@media screen and (min-width: 1000px) {
	.local_qa_modelcase h3 + div{font-size: 150%;}
	.local_qa_modelcase ul li{
		width:calc(100% * 580 / 1180);
	}
	.local_qa_modelcase ul li:nth-child(n+3){
		margin-top: calc(100% * 20 / 1180);
	}
}
@media screen and (max-width: 999px) {
	.local_qa_modelcase{
		width:700px;
		max-width: 100%;
		margin-top: 60px;
	}
	.local_qa_modelcase h3{
		max-width:100%;
		font-size: 125%;
		margin-bottom: 20px;
	}
	.local_qa_modelcase h3 + div{text-align: left;}
	.local_qa_modelcase ul{
		flex-direction: column;
    align-items: center;
		margin-top: 20px;
	}
	.local_qa_modelcase ul li{
		width:100%;
		max-width: 588px;
	}
	.local_qa_modelcase ul li:nth-child(n+2){margin-top:20px;}
	.local_qa_modelcase ul + div{margin-top: 40px;}
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
<?php echo CONTENT_SUBT_MINI('Q&A','- よくある質問 -'); ?>
<!-- *** -->
<ul class="local_qa_set">
<?php
$arr=array
(array('購入後、住まなくなったらどうなりますか？'
			,'<b>定期借地権の契約は50年以上ですが、途中で解約することもできます。</b>
また、定期借地権とともに建物を売却・譲渡することができます。
ほかにも、転勤などで長期不在にする場合などは、戸建賃貸にして賃料を得ることもできます。
東新住建グループ会社の株式会社ブルーボックスには賃貸管理事業があるので安心です。')
//-----
,array('定期借地権の相続はできますか？'
			,'定期借地権を結んだご本人様が亡くなったとしても、<b>残存期間内であれば相続することもできます。</b>')
//-----
,array('敷金とはなんですか？'
			,'契約期間中に地代の不払いや過去時の建物の解体等を担保するために、土地オーナーに預けるお金のことを言います。<b>期間満了後無利子で必ず全額返還されます。</b>そのために契約した土地には保証金返還請求権が設定されます。敷金の相場はおおよそ土地価格の10〜15%ほどです。')
//-----
,array('将来的な地代の値上がりは？'
			,'契約時に地代の改定方法をしっかりと確認してください。<b>一般的に3年毎に地代の見直しが行われます。</b>固定資産税や物価の変動によって多少の上下があるでしょう。')
//-----
,array('立て替えや増改築はできますか？'
			,'<b>契約上禁止されていなければ自由に行えます。</b>ただし、地主様へ通知は必要です。契約時に承諾料の有無を確認してください。あくまで用途は住居用に限られ、期間の延長はできません。')
//-----
,array('住宅ローンは利用できますか？'
			,'<b>できます。</b>敷金の支払いを含め、定期借地権付分譲住宅のローンを取り扱う金融機関も増えています。また、住宅支援機構も利用可能です。')
//-----
,array('オーナーが土地を手放してしまったら？'
			,'<b>契約後土地のオーナーが変わった場合でも、契約内容に変更はありません。</b>地代の支払先は変わりますが、敷金も新しいオーナーから返還されます。')
//-----
/*
,array('Q'
			,'A')
*/
);
foreach($arr as $v){
	echo '<li>
<div class="content_box"><div class="Wbase W1200 flex">
<div><div class="Q"><img src="images/content/qa/icon-Q.svg"></div><div class="text">'.WORD_BR($v[0]).'</div><img src="images/content/qa/arrow-Q.svg" class="arrow"></div>
</div></div>
<div class="content_box"><div class="Wbase W920 flex">
<div class="A"><img src="images/content/qa/icon-A.svg"></div><div class="text">'.WORD_BR($v[1]).'</div>
</div></div>
</li>';
}
?>
</ul>
<!-- *** -->
<div class="content_box"><div class="Wbase local_qa_modelcase">
<h3>購入後のモデルケース</h3>
<div class="LH150">定借は50年という縛りがありますが、途中で解約・売却・貸出なども可能です。</div>
<ul class="vanish_branch">
<?php
for($i=1;$i<=4;$i++){
	$n=sprintf('%02d',$i);
	echo '<li><img src="images/content/qa/case'.$n.'-pc.svg"><img src="images/content/qa/case'.$n.'-sp.svg"></li>'.chr(10);
}
?>
</ul>
<div>お気軽にお問い合わせください</div>
</div></div>
<!-- *** -->
<div class="content_box"><div class="Wbase W1200">
<?php echo CONTENT_PAD(80,'sp/2'); ?>
<?php echo EFFECT_BTN('物件一覧','すべての物件を見る'); ?>
<?php echo CONTENT_PAD(100,'sp/2'); ?>
<?php echo TOP_MENU_BNR(); ?>
<?php echo CONTENT_PAD(60,'sp/2'); ?>
</div></div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>