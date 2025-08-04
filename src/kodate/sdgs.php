<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'images/content/sdgs/';
$p_title='SDGs';
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
.local_mainpic .text{
	position: absolute;
	bottom:1rem;
	right:1.5rem;
	font-size: 10px;
	color:#FFF;
}
@media screen and (max-width: 999px) {
	.local_mainpic .text{
		margin: auto;
		left:0;
		right:0;
    bottom: 1em;
	}
}
.local_catch{
	padding-top: 70px;
	padding-bottom: 80px;
}
.local_catch img[src*="toushin"]{width:186px;}
.local_catch img[src*="sdgs"]{width:504px;margin-top: 20px;}
.local_catch > div{
	margin-top: 40px;
	line-height: 200%;
}
@media screen and (max-width: 999px) {
	.local_catch{
		padding-top: 35px;
		padding-bottom: 40px;
	}
	.local_catch img[src*="toushin"]{width:94px;}
	.local_catch img[src*="sdgs"]{width:252px;margin-top: 10px;}
	.local_catch > div{
		text-align: left;
		margin-top: 30px;
	}
}
.local_sdgs{
	padding-top: 65px;
	padding-bottom: 70px;
}
.local_sdgs .subt{
	display: flex;
	justify-content: space-between;
	align-items: flex-end;
	border-bottom: solid 2px #738DA0;
	padding-bottom: 1em;
}
.local_sdgs .subt h3{font-size: 175%;}
.local_sdgs .subt img[src*="sdgs"]{width:374px;}
.local_sdgs .subt + div{margin-top: 1.5em;}
.local_sdgs .icon{
	display: flex;
	flex-wrap: wrap;
	margin-right: -1.5%;
	margin-bottom: -1.5%;
	margin-top: 2em;
}
.local_sdgs .icon li{
	width:14%;
	flex-grow: 1;
	margin-right: 1.5%;
	margin-bottom: 1.5%;
}
.local_sdgs .icon img{width:100%;}
@media screen and (max-width: 999px) {
	.local_sdgs{
		padding-top: 40px;
		padding-bottom: 40px;
	}
	.local_sdgs .subt img[src*="sdgs"]{width:190px;}
	.local_sdgs .subt + div{margin-top: 0.75em;}
	.local_sdgs .icon{margin-top: 1em;}
}
.local_subt_beta{
	background-color: #738DA0;
	color:#FFF;	
	font-size: 200%;
	line-height: 150%;
	padding-top: 0.5em;
	padding-bottom: 0.5em;
	text-align: center;
}
.local_subt_beta.content_box{}
.local_subt_beta:not(.content_box){}
@media screen and (max-width: 999px) {
	.local_subt_beta{
		font-size: 150%;
		padding: 0.5em;
	}
	.local_sdgs_list .local_subt_beta{text-align: left;}
}
.local_sdgs_list{
	padding-top: 75px;
	padding-bottom: 135px;
}
.local_sdgs_list ul{margin-top: 70px;}
.local_sdgs_list ul li{
	display: flex;
	justify-content: space-between;
}
.local_sdgs_list ul li:nth-child(n+2){margin-top: 110px;}
.local_sdgs_list ul li .text{text-align: left;}
.local_sdgs_list ul li .text .num_title{display: flex;}
.local_sdgs_list ul li .text .num_title div{
	margin-right: 18px;
	padding-right: 30px;
	border-right: solid 1px #738DA0;
}
.local_sdgs_list ul li .text .num_title img{
	width:auto;
	height:74px;
}
.local_sdgs_list ul li .text .num_title h4{
	display: flex;
	align-items: center;
	font-size: 175%;
	line-height: 150%;
	margin: -0.5em 0;
}
.local_sdgs_list ul li .text .t_set{margin-top: 40px;}
.local_sdgs_list ul li .text .t_set h5{
	color: #738DA0;
	font-size: 125%;
}
.local_sdgs_list ul li .text .t_set h5 div{font-size: 80%;}
.local_sdgs_list ul li .text .t_set h5 + div{margin-top: 0.75em;}
.local_sdgs_list ul li .text .icon{margin-top: 20px;}
.local_sdgs_list ul li .text .icon h5{
	color: #738DA0;
	font-size: 100%;
}
.local_sdgs_list ul li .text .icon h5 + div{
	margin-right: -9px;
	display: flex;
	flex-wrap: wrap;
}
.local_sdgs_list ul li .text .icon img{
	width:80px;
	margin-right: 7px;
	margin-top: 7px;
}
.local_sdgs_list ul li .photo{
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
.local_sdgs_list ul li.num03 .photo img[src*="-1"]{margin-right: auto;}
.local_sdgs_list ul li.num03 .photo img[src*="-2"]{margin-left: auto;}
@media screen and (min-width: 1000px) {
	.local_sdgs_list ul li .text{
		margin-right: 10px;
		width:600px;
		min-width: 600px;
	}
	.local_sdgs_list ul li.num03 .photo{
    flex-grow: 1;
		max-width: 520px;
	}
	.local_sdgs_list ul li.num03 .photo img[src*="-2"]{margin-top: 20px;}
}
@media screen and (max-width: 999px) {
	.local_sdgs_list{
		padding-top: 40px;
		padding-bottom: 100px;
	}
	.local_sdgs_list ul{margin-top: 40px;}
	.local_sdgs_list ul li{flex-direction: column;}
	.local_sdgs_list ul li .text .num_title{
		flex-direction: column;
		align-items: flex-start;
	}
	.local_sdgs_list ul li .text .num_title div{margin-right: auto;}
	.local_sdgs_list ul li .text .num_title h4{
		font-size: 150%;
		margin: 0.75em 0 0;
	}
	.local_sdgs_list ul li .text .t_set{margin-top: 20px;}
	.local_sdgs_list ul li .text .icon h5 + div{margin-right: -6px;}
	.local_sdgs_list ul li .text .icon img{width:90px;}
	.local_sdgs_list ul li .photo{margin-top: 30px;}
	.local_sdgs_list ul li:nth-child(n+2){margin-top: 65px;}
	.local_sdgs_list ul li.num03 .photo img{width:265px;}
	.local_sdgs_list ul li.num03 .photo img[src*="-2"]{margin-top: 15px;}
}
.local_forest{
	background-image: url(images/content/sdgs/bg.jpg);
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	padding-top: 40px;
	padding-bottom: 40px;
	text-align: center;
}
.local_forest h4{
	font-size: 175%;
	line-height: 150%;
}
.local_forest h4 + div{
	max-width: 1000px;
	text-align: left;
	line-height: 175%;
	margin: auto;
	margin-top: 30px;
}
.local_forest img{
	margin: auto;
	margin-top: 40px;
}
.local_forest img + div{
	font-size: 75%;
	line-height: 150%;
	margin-top: 1em;
}
@media screen and (max-width: 999px) {
	.local_forest{
		padding-top: 20px;
		padding-bottom: 20px;
	}
	.local_forest h4{font-size: 150%;}
	.local_forest h4 + div{margin-top: 15px;}
	.local_forest img{margin-top: 20px;}
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
<div class="content_box"><div class="W1300 Wmax100per mgnAuto pos_rel local_mainpic">
<img src="images/top/bg-mainpic-2023.jpg">
<div class="text">愛知万博2005で東新住建が発表したサスティナブル住宅のコンセプトモデル</div>
</div></div>
<!-- *** -->
<div class="content_box local_catch">
<img src="images/common/logo-toushin-2024-K.svg">
<img src="images/common/logo-sdgs.svg">
<div><?php echo WORD_BR('東新住建のコーポレートスローガンは「ほしいものを、つくります」です。
人々の暮らし、家族構成や価値観は時代とともに多様化しています。
その中で「社会課題や環境問題」に真摯に向き合い、多様化する問題を解決する商品を磨き続け
企業のあり方を考え続けることで
持続的な成長と社会貢献を実現してまいります。'); ?></div>
</div>
<!-- *** -->
<div class="content_box bg_FFF_gray local_sdgs"><div class="W1000 Wmax100per mgnAuto">
<div class="subt"><h3>SDGsとは</h3><img src="images/common/logo-sdgs.svg"></div>
<div class="textL LH200"><?php echo WORD_BR('SDGsとは､「Sustainable Development Goals（持続可能な開発目標）」の略称で､世界中のすべての人々が幸せに暮らすことができる社会を作るために､2015年9月に国連サミットで採択された国際社会共通の目標です。2030年までに達成すべく「17の目標」と」「169のターゲット（具体目標）｣で構成されています。'); ?></div>
<ul class="icon">
<?php
for($i=1;$i<=17;$i++){
	echo '<li><img src="images/content/sdgs/icon/SDGs-'.sprintf('%02d',$i).'.svg"></li>'.chr(10);
}
?>
<li><img src="images/content/sdgs/icon/SDGs-mark.svg"></li>
</ul>
</div></div>
<!-- *** -->
<div class="content_box local_sdgs_list"><div class="W1200 Wmax100per mgnAuto">
<h3 class="local_subt_beta">東新住建は以下5つのテーマを通じて、SDGsの達成に取り組んでいます。</h3>
<ul>
<?php
$arr=array
(1=>array
 ('title'	=>'木にこだわり住まいも
生態系の一つと考えた家づくり'
 ,'subt'	=>'一貫した全棟木造へのこだわり'
 ,'text'	=>'東新住建が扱う物件は、「木造住宅」に限定しています。木造住宅は大気中のCO2を軽減し、環境を整える都市の森。標準的な住宅１棟分のCO2炭素貯蔵量は森林400㎡に匹敵すると言われています。木を使うことで、山林は間引きされ新しい木々が芽生えることでCO2を多く吸収していきます。健全な山林は多くの雨水を蓄え､浄化された水を川から海へと運び、その水が蒸発してまた雨となって降り注ぐ。それが多くの生物の命を支える源となっていく｢循環型社会｣に貢献することを目標としています。こうした考えに基づき、住まいも生態系の一つと考えた家づくりを行っています。また、木はフィトンチッドと呼ばれる微細な物質を発しています。この物質は､住む人の健康を維持し、癒しと安らぎの効果を与えることがわかっており住む人の健康に寄与しています。'
 ,'icon'	=>array(3,6,11,12,13,14,15)
 ,'photo'	=>array('p01.png')
 )
//--------
,2=>array
 ('title'	=>'国産材を利用した住まいづくりで
日本の森林を再生する'
 ,'subt'	=>'国産材利用の推進'
 ,'text'	=>'東新住建は創業以来46年間木造にこだわり、国産材の利用した住まいづくりを推進しています。建築する住まいに国産材を利用することで、安定した木材需要を生み出し衰退しつつある林業をサポートし、日本の森の循環に貢献しています。'
 ,'icon'	=>array(9,11,12,13,15)
 ,'photo'	=>array('p02.jpg')
 )
//--------
,3=>array
 ('title'	=>'多様化する社会に対応する家づくり'
 ,'subt'	=>'豊富な商品ラインナップ'
 ,'text'	=>'東新住建の住まいは2×4工法で建てられ、構造上の柱や壁を居室空間からなくすことで、将来的に間取りが可変しやすくなっています。また、東新住建グループの管理により、住み替え・貸し出しも可能。それは「ライフステージに合わせて家も変化していく」という考えに基づいているからです。
家族構成も時代とともに多様化してきました。ひとり親・DINKs・LGBTQ+・おひとり様などの少人数世帯など、それぞれが持つ住宅選択における課題を「手の届く価格帯」や「専門アドバイザーによるトータルサポート」などで解決いたします。
さらに、低予算でバリアフリーの平屋住宅に住める「テイシャク」や戸建てマンションの「DUPレジデンス」など、豊富な商品ラインナップで多様化する社会に対応する家づくりを提供しています。'
 ,'icon'	=>array(1,3,5,8,10,11)
 ,'photo'	=>array('p03-1.jpg','p03-2.jpg')
 )
//--------
,4=>array
 ('title'	=>'安心・安全な家づくり'
 ,'subt'	=>'廃棄物がなく液状化に強い地盤改良・2×4工法'
 ,'text'	=>'東新住建では、地盤改良に主に｢天然砕石パイル｣を利用しています。この工法は液状化に強く、地震からご家族と住まいを守ります。さらに、この工法は環境汚染を起こさず100％リサイクル可能な天然石を利用するもので廃棄物を排出しない環境にやさしい地盤改良です。また全住宅が「木造2×4工法」で建築されており、一般的に地震に強い工法です。火災にも強く、一般的な在来工法に比べて火災保険料が40％OFFとなり、火災への強さを証明しています。'
 ,'icon'	=>array(3,6,11,12,13)
 ,'photo'	=>array('p04.png')
 )
//--------
,5=>array
 ('title'	=>'クリーンエネルギーを活用し、
環境にも家計にもやさしい住まい'
 ,'subt'	=>'大容量太陽光発電搭載住宅・土地0円ハウス・樹流'
 ,'text'	=>'東新住建では大容量太陽光発電を、分譲住宅に搭載し供給しております。10kW太陽光発電が住宅に搭載された場合、年間で約1000kWhを発電し、CO2の吸収量は杉の木395本分にもなります。太陽光発電が20年間稼動すると考えると約7900本の植樹効果を生み出します。また、太陽光発電で発電した電気は売電も自家消費もでき、蓄電池を設置することで発電量が少ない時間帯の電気を補うなど、電気代の節約にもなります。定期借地権を利用した土地0円ハウスでは、太陽光発電の売電収入で地代を支払える仕組みで幅広い世帯に住宅取得の間口を広げています。
さらに、B.B.D（バイオブレスダクト）の家「樹流」に使用している循環科学研究所が開発したスーパーセルロースファイバーは、自然循環できる環境に優しい素材であり、断熱効果が高く軽量な建材として壁材などへの応用が期待されています。
東新住建は、暮らしと環境を同時に守るため、住まいも生態系の一つと考えた家づくりを追求しています。'
 ,'icon'	=>array(1,3,6,7,12,13)
 ,'photo'	=>array('p05.jpg')
 )
//--------
);
foreach($arr as $k => $v){
	echo '<li class="num'.sprintf('%02d',$k).'">
<div class="text">
<div class="num_title"><div><img src="images/content/sdgs/num/'.sprintf('%02d',$k).'.svg"></div><h4>'.WORD_BR($v['title']).'</h4></div>
<div class="t_set LH175">
<h5><div>価値の提供：</div>'.$v['subt'].'</h5>
<div>'.WORD_BR($v['text']).'</div>
</div>
<div class="icon">
<h5>対応番号</h5>
<div>';
	foreach($v['icon'] as $v2){
		echo '<img src="images/content/sdgs/icon/SDGs-'.sprintf('%02d',$v2).'.svg">';
	}
	echo '</div>
</div>
</div>
<div class="photo">';
	foreach($v['photo'] as $v2){
		echo '<img src="images/content/sdgs/'.$v2.'">';
	}
	echo '</div>
</li>'.chr(10);
}
?>
</ul>
</div></div>
<!-- *** -->
<h3 class="local_subt_beta pc_br_del">創業から変わらぬ姿勢。<br>“循環・共生” への取り組み。</h3>
<div class="content_box local_forest">
<h4 class="pc_br_del">2005年の愛知万博では<br>環境共生型スタイルを提案。</h4>
<div>「自然の叡智」をテーマに開催された2005年の愛・地球博。私たちはその瀬戸会場入り口に、ウェルカムハウスを出展。縄文の昔から日本人が実践してきた自然と共生するライフスタイルを具現化しました。住まいを生態系のひとつと考え、「水・光・風・土・木」の5要素が有機的に調和する環境をつくるのが私たちの理想です。この出展はその第一歩として未来への布石となりました。</div>
<img src="images/content/sdgs/p-bottom.jpg">
<div>愛知万博2005で東新住建が発表した<br>
サスティナブル住宅のコンセプトモデル</div>
</div>
<!-- *** -->
<div class="content_box"><div class="W1300 Wmax100per mgnAuto">
<div class="top_search" style="padding:70px 0;"><div class="btnbox num1"><?php
echo EFFECT_BTN('物件検索','物件一覧を見る',array('class'=>'colO pc_br_del','arrow'=>true));
?></div></div>
</div></div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>