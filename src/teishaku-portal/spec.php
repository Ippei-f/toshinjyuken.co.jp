<?php
$p_type = 'content';
$kaisou = '';
$p_title = '';
$dir = $kaisou . 'images/content/spec/';
require $kaisou . "temp_php/basic.php";
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
		.local_obi {
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 250%;
			line-height: 100%;
			background-color: #EEEFE7;
			padding: 0.5em 0;
			letter-spacing: 0.25em;
			margin-bottom: 100px;
		}

		.local_obi~.local_obi {
			margin-top: 100px;
		}

		.local_obi img {
			height: 1em;
		}

		.local_obi img:nth-of-type(1) {
			margin-right: 0.5em;
		}

		.local_obi img:nth-of-type(2) {
			margin-left: 0.25em;
			transform: scaleX(-1);
		}

		.local_flex {
			text-align: left;
		}

		.local_flex li {
			display: flex;
			justify-content: space-between;
		}

		.local_flex li:nth-child(n+2) {
			margin-top: 100px;
		}

		.local_flex h3 {
			background-color: #E1EBE1;
			color: #04A786;
			font-size: 125%;
			line-height: 125%;
			padding: 0.25em 0.75em;
		}

		.local_flex h3 span {
			margin-right: 0.5em;
		}

		.local_flex h4 {
			font-size: 125%;
			line-height: 150%;
			margin: 1em 0;
		}

		.local_flex .hoshou {
			background-color: #B4A363;
			color: #FFF;
			font-size: 125%;
			line-height: 100%;
			padding: 0.25em 0.5em;
			margin-top: 1em;
		}

		.local_flex .photo2_2 {
			font-size: 60%;
			line-height: 125%;
			display: flex;
			justify-content: space-between;
		}

		.local_flex .photo2_2 img {
			margin-bottom: 0.5em;
		}

		.local_flex .photo2_3 {
			display: flex;
			width: 490px;
			max-width: 100%;
		}

		@media screen and (min-width: 1000px) {
			.local_flex li.reverse {
				flex-direction: row-reverse;
			}

			.local_flex li>* {
				flex-grow: 1;
			}

			.local_flex li>*:nth-child(1) {
				width: 550px;
				max-width: 550px;
			}

			.local_flex li:not(.reverse)>*:nth-child(2) {
				margin-left: 4%;
			}

			.local_flex li.reverse>*:nth-child(2) {
				margin-right: 4%;
			}

			.local_flex li:not(.reverse)>*:nth-child(2)>* {
				margin-left: auto;
			}

			.local_flex li.reverse>*:nth-child(2)>* {
				margin-right: auto;
			}

			.local_flex .photo2_2 {
				max-width: 540px;
			}

			.local_flex .photo2_2 span {
				flex-grow: 1;
			}

			.local_flex .photo2_2 span:nth-child(1) {
				width: 50%;
				margin-right: 12px;
			}

			.local_flex .photo2_2 span:nth-child(2) {
				width: 50%;
			}
		}

		@media screen and (max-width: 999px) {
			.local_obi {
				font-size: 30px;
				margin-bottom: 40px;
			}

			.local_obi~.local_obi {
				margin-top: 60px;
			}

			.local_flex li {
				flex-direction: column;
			}

			.local_flex li:nth-child(n+2) {
				margin-top: 30px;
			}

			.local_flex li>*:nth-child(2) {
				margin-top: 1.5em;
			}

			.local_flex li>*:nth-child(2)>* {
				margin: auto;
			}

			.local_flex .photo2_2 {
				flex-direction: column;
			}

			.local_flex .photo2_2 span {
				margin: auto;
			}

			.local_flex .photo2_2 span:nth-child(2) {
				margin-top: 2em;
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
		<?php echo CONTENT_TOPIMG(); ?>
		<?php echo CONTENT_SUBT_MINI('SPEC', '- 工法・構造 -'); ?>
		<?php echo CONTENT_PAD(30, 0); ?>
		<!-- *** -->
		<?php
		function LOCAL_H2($str)
		{
			echo '<h2 class="local_obi"><img src="images/content/spec/obi-kakko.svg">' . $str . '<img src="images/content/spec/obi-kakko.svg"></h2>' . chr(10);
		}
		function LOCAL_H3($str1, $str2 = '', $str3 = '')
		{
			echo '<h3><span class="font_gothic">■</span>' . $str1 . '</h3>' . chr(10);
			if ($str2 != '') {
				echo '<h4>' . WORD_BR($str2) . '</h4>' . chr(10);
			}
			if ($str3 != '') {
				echo '<div class="LH200">' . WORD_BR($str3) . '</div>' . chr(10);
			}
		}
		?>
		<?php LOCAL_H2('耐震構造'); ?>
		<div class="content_box">
			<div class="Wbase W1200">
				<ul class="local_flex">
					<li class="reverse">
						<div>
							<?php LOCAL_H3(
								'2×4工法',
								'地震に対して強い抵抗力を備える
耐震工法',
								'東新住建は末永く安心して暮らしていただくため、耐震・耐火性など優れた特性をもつ「2×4（ツーバイフォー）工法」を採用しています。2×4工法は、地震の衝撃を天井・壁・床の6面全体でバランス良く吸収するため水平・垂直、両方からの力に優れた強さを発揮します。'
							); ?>
							<span class="hoshou">建物保証10年</span>
						</div>
						<div><img src="images/content/spec/p1-1.png" style="width:479px;"></div>
					</li>
					<li>
						<div>
							<?php LOCAL_H3(
								'強固なモノコック構造',
								'「2×4工法」の特色は
6面体構造の強さ',
								'「面構造」を基本にしたツーバイフォー住宅は、6面体ができあがると、家全体が強いモノコック構造（一体構造）となります。地震や台風などの力を建物全体で受け止め、荷重を一点に集中させることなく全体に分散させることで、外力に対して抜群の強さを発揮します。'
							); ?>
						</div>
						<div><img src="images/content/spec/p1-2.png" style="width:493px;"></div>
					</li>
					<li class="reverse">
						<div>
							<?php LOCAL_H3(
								'大震災を耐えた工法',
								'阪神地震で2×4の強さを証明',
								'1995年1月、阪神エリア襲ったを巨大地震。半壊や一部損壊した住宅は28.9万棟以上。そんな中、2×4工法の住宅では「96.8％が生活に支障なし。全壊・半壊はゼロ」という結果に。以来日本の家づくりには、必須の建築工法となり、東新住建は独自ノウハウを活かしこの2×4工法に磨きをかけています。'
							); ?>
						</div>
						<div><img src="images/content/spec/p1-3.jpg" style="width:455px;"></div>
					</li>
				</ul>
			</div>
		</div>
		<!-- *** -->
		<?php LOCAL_H2('独自の地盤改良'); ?>
		<div class="content_box">
			<div class="Wbase W1200">
				<ul class="local_flex">
					<li>
						<div>
							<?php LOCAL_H3(
								'砕石パイル工法',
								'液状化を阻止する
東新住建独自の地盤改良技術',
								'砕石パイル工法は、水はけのよい砕石を地面に空けた縦穴に詰めてパイルを形成うことで地盤を強化する工法です。パイル形成時の加圧作業により軟弱な土壌もしっかりと踏み固められ、何十本もの摩擦抵抗の高い丈夫な砕石柱が建物の基礎を支えます。'
							); ?>
						</div>
						<div><img src="images/content/spec/p2-1.png" style="width:552px;"></div>
					</li>
					<li class="reverse">
						<div>
							<?php LOCAL_H3(
								'ドレーン効果',
								'水圧を逃がす効果で液状化を阻止',
								'砕石パイルには水圧を逃がす効果（ドレーン効果）があります。何十本ものパイルの排水効果は絶大で、さらに砕石パイルを造る段階で、その周辺地盤も強く締め固められ液状化の起りにくい状態になっています。'
							); ?>
						</div>
						<div>
							<div class="photo2_2">
								<span><img src="images/content/spec/p2-2-1.png" style="width:264px;">液状化の水圧で水が地表に噴き出し地盤沈下を起こす。</span><span><img src="images/content/spec/p2-2-2.png" style="width:264px;">下部から湧き出した水が砕石パイルに吸収される。</span>
							</div>
						</div>
					</li>
					<li>
						<div>
							<?php LOCAL_H3(
								'環境保全にも対応',
								'地元の採石場を活用した地産地消の技術',
								'材料は天然石のみで、コンクリート基礎杭や薬剤などの廃棄物も出ないエコ技術です。地元犬山市で採石を行うことで、地産地消の体制をつくっています。'
							); ?>
						</div>
						<div>
							<div class="photo2_3">
								<img src="images/content/spec/p2-3-1.jpg"><img src="images/content/spec/p2-3-2.jpg">
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- *** -->
		<?php LOCAL_H2('頑丈な基礎'); ?>
		<div class="content_box">
			<div class="Wbase W1200">
				<ul class="local_flex">
					<li>
						<div>
							<?php LOCAL_H3(
								'ベタ基礎',
								'基準値を超える、
頑丈な鉄筋コンクリートベタ基礎',
								'東新住建の住宅基礎は全て独自開発のベタ基礎。建物下すべてに太い鉄筋を縦横に張り巡らせ、床面全体を厚さ15cmの鉄筋コンクリートで覆う強固な基礎形状です。また基礎全体の防湿シート施工もおこない、地面からの湿気とシロアリの通り道をシャットアウトします。'
							); ?>
						</div>
						<div><img src="images/content/spec/p3-1.jpg" style="width: 594px;"></div>
					</li>
					<li class="reverse">
						<div>
							<?php LOCAL_H3(
								'布基礎との比較',
								'建物を支える「ベタ基礎」と<br class="pc_vanish">地耐力の関係',
								'一般的な木造住宅の基礎は大きく「布基礎」と「ベタ基礎」に分けられます。「布基礎」は建物の軸組に沿って設けられる、古くからある基礎形状です。しっかりとした地盤でないと使えません。それに比べ「ベタ基礎」はやや弱い地盤でも設けることができます。'
							); ?>
						</div>
						<div><img src="images/content/spec/p3-2.png" style="width: 514px;"></div>
					</li>
				</ul>
			</div>
		</div>
		<!-- *** -->
		<?php LOCAL_H2('環 境 配 慮'); ?>
		<div class="content_box">
			<div class="Wbase W1200">
				<ul class="local_flex">
					<li class="reverse">
						<div>
							<?php LOCAL_H3(
								'国産材の4.3倍2×4住宅',
								'東新住建独自のサステナブル2×4工法',
								'東新住建独自の4.3倍2×4パネルの一部に、国産材を利用しています。元々、2×4工法は北米で発達した工法であるため、輸入材の使用量がほぼ100％となっています。その中に国産材を採り入れる事で、日本の森を守る活動を積極的に行っています。'
							); ?>
						</div>
						<div><img src="images/content/spec/p4-1.jpg" style="width: 591px;"></div>
					</li>
					<li>
						<div>
							<?php LOCAL_H3(
								'太陽光パネル',
								'省エネルギーとCO2削減を実現',
								'太陽光発電は発電時にCO2を排出しない、環境にやさしい発電方法です。太陽光発電の導入はCO2の削減につながるだけでなく、限られた地球の資源の節約にも貢献できます。'
							); ?>
						</div>
						<div><img src="images/content/spec/p4-2.jpg" style="width: 591px;"></div>
					</li>
					<li class="reverse">
						<div>
							<?php LOCAL_H3(
								'地中熱利用',
								'ゼロエネルギーで冷暖房効率を向上',
								'地中温度は1年中変化がないため、外気温度と比べると夏は涼しく、冬は暖かくなります。この地下熱を利用するため、地下5mにパイプを埋めて家に地熱を取りこみ冷暖房の効率をアップ。エコでクリーンなエネルギーでお部屋を快適にします。'
							); ?>
						</div>
						<div><img src="images/content/spec/p4-3.jpg" style="width: 468px;"></div>
					</li>
				</ul>
			</div>
		</div>
		<?php echo CONTENT_PAD(60, 'sp/2'); ?>
		<!-- *** -->
		<div class="content_box">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(50, 'sp/2'); ?>
				<?php echo EFFECT_BTN('物件一覧', 'すべての物件を見る'); ?>
				<?php echo CONTENT_PAD(60, 'sp/2'); ?>
				<?php echo TOP_MENU_BNR(array(1, 3)); ?>
				<?php echo CONTENT_PAD(60, 'sp/2'); ?>
			</div>
		</div>
		<!-- ** -->
		<?php echo $temp_footer; ?>
		<!-- * -->
	</div>
	<?php echo $temp_bodyend; ?>
</body>

</html>