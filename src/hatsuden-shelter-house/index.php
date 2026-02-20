<?php
$p_type = 'index';
$kaisou = '';
$p_title = '';
require $kaisou . "temp_php/basic.php";

//お客様の声セットアップ
$voice_id = isset($_GET['v']) ? $_GET['v'] : '';
//$voice_id=1;//1ページしかないのでいきなり表示
$voice_id_02d = is_numeric($voice_id) ? sprintf('%02d', $voice_id) : $voice_id;

require $kaisou . "voice/func.php";
require $kaisou . "voice/data.php";

//CMS読み込み
require $kaisou . "system/function/cms-load.php";
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php echo $temp_meta; ?>
	<title><?php echo $temp_title; ?></title>
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/top.css" rel="stylesheet" type="text/css">
	<link href="css/search.css" rel="stylesheet" type="text/css">
	<link href="voice/style.css" rel="stylesheet" type="text/css">
	<?php
	//バナーシステム2023年度ver読み込み
	$toushin_bnr_url = $kaisou . '../recaptcha/';
	require $toushin_bnr_url . 'func-common-bnr-setup2023.php';
	?>
	<?php echo $temp_java; ?>
	<style>
		body>div[align=center]>.H_head {
			display: none;
		}
	</style>
</head>

<body class="borderbox">
	<?php echo $temp_pagetop; ?>
	<div align="center">
		<!-- * -->
		<?php echo $temp_header; ?>
		<!-- ** -->
		<div class="top_mainpic">
			<div class="photo_box">
				<img src="images/top/mainpic-photo.jpg">
				<img src="images/common/logo-hatsuden.svg">
			</div>
			<?php
			/*
<div class="mainpic vanish_branch"><img src="images/top/mainpic-pc.svg" style="width:702px;"></div>
*/
			//バナーシステム2023ver
			echo TOUSHIN_COMMON_BNR_2023('発電/TOP-style');
			echo TOUSHIN_COMMON_BNR_2023('発電/TOP');
			?>


			<!--
			<div class="top_bnr_campaign">
				<a href="https://www.toshinjyuken.co.jp/kodate/news.php?id=185" target="_blank">
					<img src="images/top/bnr-sumaihaku-2025.JPG" alt="秋の住まい博2025" />
				</a>
			</div>
	-->



			<h3 class="fontS1" style="margin-bottom: 0.25em;">次世代PV住宅<br>発電シェルターハウスとは？</h3>
			<div class="LH175"><?php
								echo WORD_BR('現代の家族観やライフスタイルに合わせた<br class="pc_vanish">次世代のコンパクトな暮らしに、
太陽光発電システムを標準仕様とし
再生可能エネルギー源を活用するPV住宅です。
東新住建独自の4.3倍2×4工法による<br class="pc_vanish">高い耐震性と売電収入で
家族の安全と家計を守ります。');
								/*
<div class="LH175">現代の家族観やライフスタイルに合わせた<br class="pc_vanish">次世代のコンパクトな暮らしに、<br>
太陽光発電システムを標準仕様とし<br>
再生可能エネルギー源を活用するPV住宅です。
*/
								?></div>
			<div class="icon"><?php
								for ($i = 1; $i <= 6; $i++) {
									echo '<img src="images/top/catch-icon' . $i . '.svg" style="width:85px;">';
								}
								?></div>
			<?php
			echo TOUSHIN_COMMON_BNR_2023('発電/TOP・キャッチ下');
			?>
			<div class="btn_box">
				<div class="vanish_branch">
					<img src="images/top/catch-btntop-pc.svg" style="width:464px;">
					<img src="images/top/catch-btntop-sp.svg" style="width:288px;">
				</div>
				<div class="c_ovalbtn yellow"><a href="<?php echo $link_list['物件'][0]; ?>"><span>物件はこちら<img src="images/common/arrow-btn-oval-R.svg"></span></a></div>
			</div>

			<h3 class="fontS2">こんなお悩みはありませんか？</h3>
			<div class="vanish_branch">
				<img src="images/top/catch-nayami-pc.svg" style="width:822px;">
				<img src="images/top/catch-nayami-sp.svg" style="width:348px;">
			</div>
			<img src="images/top/catch-kaiketu.svg">
			<ul class="kaiketu_list Wbase">
				<?php
				$arr = array(
					1 => '太陽光パネル
約3kw標準搭載',
					2 => '地震に強い
4.3倍2×4工法',
					3 => '安定した
地盤補強'
				);
				foreach ($arr as $k => $v) {
					echo '<li><a href="#sec' . sprintf('%02d', $k) . '"><div class="num">' . $k . '</div><div class="text"><div>' . WORD_BR($v) . '</div></div><div class="arrow"></div></a></li>' . chr(10);
				}
				?>
			</ul>
			<img src="images/top/catch-price.svg">
			<div class="btn_box2"><a href="#yasusa" class="bg_Y col_R">安さの秘密はこちら！<span>▶︎</span></a></div>
			<img src="images/top/catch-sorega.svg">
			<div class="photo Wbase"><?php
										for ($i = 1; $i <= 3; $i++) {
											echo '<img src="images/top/catch-photo' . $i . '.jpg">';
										}
										?></div>
			<?php
			//バナーシステム2023ver
			echo TOUSHIN_COMMON_BNR_2023('発電/TOP');
			?>
		</div>
		<!-- *** -->
		<?php
		if (false) {
		?>
			<div class="top_pickup">
				<?php echo $temp_box_search; ?>
				<div class="box_pu">
					<img src="images/top/subt-pickup.svg">
					<div class="Wbase">
						<?php
						$cnt = 0;
						$img_phase = COMMON_PARAM('search_cate', 1);
						$dir_search = 'images/content/search/';
						$search_arr = array();
						foreach (CMS_SETUP('search') as $key => $sysdata) {
							if (CMS_OPEN($sysdata)) {
								continue;
							}
							if ($sysdata[9] < 1) {
								continue;
							} //ピックアップのみ表示
							CMS_DATA_REPLACE();
							CMS_IMGSET($sysdata[0]);
							//print_r($sysdata);
							$search_arr[] = $sysdata;
							$cnt++;
						}
						$class = '';
						switch (true) {
							case ($cnt > 3):
								$class = ' pc_scr';
								break;
							case ($cnt > 1):
								$class = ' sp_scr';
								break;
						}
						?>
						<div class="slide_set<?php echo $class; ?>">
							<div class="arrow L"><img src="images/common/arrow-slide.svg"></div>
							<div class="slide_mode">
								<ul class="search_list">
									<?php
									foreach ($search_arr as $key => $vv) {
										$img = $parts = array();
										//画像設定
										$img[] = ($img_phase[$vv[3]] != '') ? $dir_search . $img_phase[$vv[3]] : '';
										switch ($vv[3]) {
											case 1: //会員限定
											case 2: //プロジェクト進行中
												//背景色がつくので画像なし
												break;
											default:
												switch ($vv[11]) {
													case 1: //仮画像
														$img[] = $dir_search . 'p-default.jpg';
														break;
													case 2: //アップロード
														$img[] = $vv['photo-num'][0];
														break;
													case 3: //直リンク
														$img[] = $vv[12];
														break;
												}
												break;
										}
										$parts[0] = '<img src="images/common/clear.png"' . (file_exists($img[0]) ? ' class="bg_contain" style="background-image: url(' . $img[0] . ');"' : '') . '>';
										$parts[0] = '<a' . ($vv[4] != '' ? ' href="' . $vv[4] . $t_blank . '"' : '') . (isset($img[1]) ? ' class="bg_cover" style="background-image: url(' . $img[1] . ');"' : '') . '>' . $parts[0] . '</a>';
										//テキスト設定
										if (!is_array($vv[6])) {
											$vv[6] = array($vv[6]);
										}
										$vv[6][0] = trim($vv[6][0]);
										$vv[6][0] = str_replace('<br />', '<br>', $vv[6][0]);
										$vv[6][0] = str_replace('<br><br>', '</div>' . chr(10) . '<div class="text">', $vv[6][0]);
										//表示
										echo '<li>
' . $parts[0] . '
<h3>' . $vv[2] . '</h3>
<div class="text">' . $vv[6][0] . '</div>
<div class="clear"></div>
' . ($vv[4] != '' ? '<a href="' . $vv[4] . $t_blank . '" class="btn font_hiragino">▶︎物件詳細</a>' : '') . '
</li>';
									} //foreach($search_arr as $key => $vv)
									?>
								</ul>
							</div>
							<div class="arrow R"><img src="images/common/arrow-slide.svg"></div>
						</div>
					</div>
					<script src="js/pickup.js" type="text/javascript"></script>
					<style>
						<?php
						echo '.slide_set .search_list{width:' . (($cnt * 226) + ($cnt > 1 ? ($cnt - 1) * 61 : 0)) . 'px;}
@media screen and (max-width: 999px) {
	.slide_set .search_list{width:' . ($cnt * 225) . 'px;}
}';
						?>
					</style>
					<div class="c_ovalbtn"><a href="<?php echo $link_list['物件'][0]; ?>"><span>すべての物件はこちら<img src="images/common/arrow-btn-oval.svg"></span></a></div>
				</div>
			</div>
		<?php
		} //if(false)
		?>
		<!-- *** -->
		<div class="top_sec01">
			<img src="images/top/househa-R.svg">
			<img src="images/top/sec01.svg">
		</div>
		<?php
		function TOP_BOX_FUKI($n, $t)
		{
			$t = str_replace(array('[', ']'), array('<span>', '</span>'), $t);
			echo ANCHOR($n) . '
<div class="box_fuki num' . $n . '">
<img src="images/top/househa-W.svg">
<h2><img src="images/top/fuki-num' . $n . '.svg"><div class="pc_br_del">' . WORD_BR($t) . '</div></h2>
</div>' . chr(10);
		}
		TOP_BOX_FUKI(1, '[電気代]から
かぞくを守る！');
		?>
		<div class="top_sec01B">
			<img src="images/top/sec01B-ima.svg">
			<div class="fontS1 col_Dgray">太陽光発電が、<br>毎月の家計を助ける！</div>
			<div class="vanish_branch_onoff">
				<img src="images/top/sec01B-photo.jpg">
				<img src="images/top/sec01B-photo-sp.jpg">
			</div>
			<div class="Wbase W800">
				<img src="images/top/househa-R.svg">
				<img src="images/top/sec01B-tousai.svg">
				<div class="vanish_branch_onoff">
					<img src="images/top/sec01B-price.svg">
					<img src="images/top/sec01B-price-sp.svg">
				</div>
				<?php
				function TOP_CAUTION($t)
				{
					$t = str_replace(array("\r\n", "\n", "\r"), '※<br>', $t);
					$t = array_filter(explode('※', $t));
					$t = implode('</span><span>※', $t);
					$t = str_replace('<span>※<br></span>', '<br>', $t);
					echo '<div class="top_caution fontS7 textL Wbase sp_W330"><div><span>※' . $t . '</span></div></div>' . chr(10);
				}
				TOP_CAUTION('※3.3kW搭載の場合でのシミュレーション ※太陽光発電の自家消費の電気代＋売電収入※2025年売電単価15円／kWhで計算 
※3人家族、自家消費5割で算出※物件によって異なる場合があります');

				function TOP_AMAGIF()
				{
					/*
?>
<div class="vanish_branch_onoff">
<img src="images/top/sec01B-amagif.svg">
<img src="images/top/sec01B-amagif-sp.svg">
<div class="caution">※他特典との併用不可</div>
</div>
<img src="images/top/sec01B-amagif-fuki.svg">
<?php
*/
				}
				TOP_AMAGIF();
				?>
			</div>
		</div>
		<!-- *** -->
		<?php echo $temp_box_search; ?>
		<!-- *** -->
		<?php TOP_BOX_FUKI(2, '[地震]から
かぞくを守る！'); ?>
		<div class="top_sec02">
			<?php
			function TOP_SUBT_KAKKO($jp, $en)
			{
				echo '<div class="top_subt_kakko"><div class="L"></div>
<div class="text"><h2>' . $jp . '</h2><div class="en">' . mb_strtoupper($en) . '</div></div>
<div class="R"></div></div>' . chr(10);
			}
			TOP_SUBT_KAKKO('耐震構造', 'Seismic structure');
			?>
			<div class="vanish_branch_onoff">
				<img src="images/top/sec02-photo.jpg">
				<img src="images/top/sec02-photo-sp.jpg">
			</div>
			<div class="Wbase W720 flex1">
				<div>
					<h3 class="subt_underline fontS4">全壊10.1万棟、<br>半壊・一部損壊28.9万棟以上。</h3>
					<div class="LH175">
						大惨事を引き起こした阪神・淡路大震災ですが、
						<img src="images/top/sec02-zerotou.svg">
						2011年の東日本大震災でも津波による被害を除けば98％が当面の暮らしに支障がないという結果が出ています。<br>
						東新住建は末永く安心して暮らしていただくため、耐震・耐火性など優れた特性をもつ「2×4（ツーバイフォー）工法」を採用しています。2×4工法は、地震の衝撃を天井・壁・床の6面全体でバランス良く吸収するため水平・垂直、両方からの力に優れた強さを発揮します。
					</div>
				</div>
				<div class="LH175">
					<img src="images/top/sec02-hikaku.png">
					柱や梁を組み合わせる在来工法と違い、ツーバイフォー住宅は「面構造」を基本にしているため、6面体ができあがり、家全体が強いモノコック構造（一体構造）となります。<br>
					地震や台風などの力を建物全体で受け止め、荷重を一点に集中させることなく全体に分散させることで、外力に対して抜群の強さを発揮します。
				</div>
			</div>
			<img src="images/top/sec02-sarani.svg">
			<div class="Wbase dokuji bg_R vanish_branch_onoff">
				<img src="images/top/sec02-dokuji.svg">
				<img src="images/top/sec02-dokuji-sp.svg">
				<div>国土交通省大臣認可</div>
			</div>
			<div class="Wbase W720 flex2">
				<div>
					<h3 class="subt_underline fontS4">2×4パネルの壁量を4.3倍に強化</h3>
					<div class="LH175">
						東新住建は、2×4パネルをさらに進化させた従来より耐力を約140％に高めた「壁量4.3倍」パネルを開発。高品質ステンレス釘の採用や、釘ピッチをより密にした仕様など、様々な工夫により耐振性能を向上させました。この新工法では、従来の「壁量3.0倍」から、「壁量4.3倍」にすることで1.4倍以上の耐力アップを実現しました。
					</div>
				</div>
				<div><img src="images/top/sec02-up.svg"></div>
			</div>
			<div class="Wbase W720 sp_W330"><?php echo $temp_frame_rokkaku[0]; ?>
				<div class="flex3">
					<div>
						<h3 class="subt_memo fontS4"><img src="images/top/icon-memo.svg">
							<div>2×4パネルは<br>すべて専属工場生産</div>
						</h3>
						<img src="images/top/sec02-p02.jpg">
					</div>
					<div>
						<div class="LH175">柱や梁の代わりに、均一サイズの角材と合板を接合して作られるパネルで、壁、床、天井、屋根などを構築する2×4工法。その強さは、パネル自体の品質に支えられています。東新住建は本社が位置する稲沢市に自社パネル工場を建設。徹底した品質管理のもと、高品質なパネルを安定供給できる体制を整えています。</div>
						<div class="b_frame">
							<h3>
								<div>2014年より全棟に<br>国産材2×4を標準使用。</div><img src="images/top/icon-japan.svg">
							</h3>
							<div class="LH175 fontS7">国の重要課題である国産材の普及に貢献し、<br>これまでに約2,000棟建築しています。</div>
						</div>
					</div>
				</div>
				<?php echo $temp_frame_rokkaku[1]; ?>
			</div>
		</div>
		<!-- *** -->
		<?php echo $temp_box_search; ?>
		<!-- *** -->
		<?php TOP_BOX_FUKI(3, '[液状化]から
かぞくを守る！'); ?>
		<div class="top_sec03">
			<?php TOP_SUBT_KAKKO('頑丈な基礎', 'solid foundation'); ?>
			<div class="fontS1 col_Dgray">まずは全棟、地盤調査を実施。</div>
			<div class="fontS4">現場によって最適な改良を行い<br>頑丈な基礎を築きます。</div>
			<img src="images/top/sec03-maru.svg" style="width:330px;">
			<div class="fontS4 col_Dgray">通常の基礎作りはこの3つですが…</div>
			<div class="fontS1">東新住建はさらに！</div>
			<div class="plus"><img src="images/top/sec03-plus.svg"></div>
			<div class="vanish_branch">
				<img src="images/top/sec03-kouhou-pc.jpg">
				<img src="images/top/sec03-kouhou-sp.jpg">
			</div>
			<div class="Wbase W720 sp_W330 textLJ">
				<h3 class="subt_underline fontS4">地震対策でもっとも注意すべきは土地の液状化です。</h3>
				<div class="LH175">そこで自然石による杭を打ち込み、地盤沈下や建物の傾きを防ぐのが砕石パイル工法。東日本大震災でも効果が確かめられています。</div>
				<h3 class="subt_underline fontS4">液状化を阻止する東新住建独自の地盤改良技術</h3>
				<div class="LH175">砕石パイル工法は、水はけのよい砕石を地面に空けた縦穴に詰めてパイルを形成うことで地盤を強化する工法です。パイル形成時の加圧作業により軟弱な土壌もしっかりと踏み固められ、何十本もの摩擦抵抗の高い丈夫な砕石柱が建物の基礎を支えます。</div>
				<div class="vanish_branch">
					<img src="images/top/sec03-p1-pc.png">
					<img src="images/top/sec03-p1-sp.png">
				</div>
				<div class="flex">
					<?php echo $temp_frame_rokkaku[0]; ?>
					<h3 class="subt_memo fontS4"><img src="images/top/icon-memo.svg">
						<div>地元の採石場を活用。<br>地産地消の技術です。</div>
					</h3>
					<img src="images/top/sec03-p2-1.jpg">
					<div class="LH175">環境を汚さず、半永久的に効果が続く砕石パイル工法。材料は天然石のみで、コンクリート基礎杭や薬剤などの廃棄物も出ないエコ技術ですが、さらに私たちは地元犬山市で採石を行うことで、地産地消の体制をつくっています。</div>
					<?php echo $temp_frame_rokkaku[1]; ?>
					<?php echo $temp_frame_rokkaku[0]; ?>
					<h3 class="subt_memo fontS4"><img src="images/top/icon-memo.svg">
						<div>地盤20年保証</div>
					</h3>
					<img src="images/top/sec03-p2-2.jpg">
					<div class="LH175">お引き渡し後20年間、地盤調査や地盤補強工事の瑕疵により住宅が不同沈下した場合、事業者に対して保証する保険に加入しています。万が一の時も安心です。</div>
					<?php echo $temp_frame_rokkaku[1]; ?>
				</div>
			</div>
		</div>
		<!-- *** -->
		<?php echo $temp_box_search; ?>
		<!-- *** -->

		<?php //TOP_BOX_FUKI(4, '[コンパクト]な
		//間取りで
		//ムダのない暮らし'); 
		?>


		<div class="top_sec04">
			<img src="images/top/sec04-kandou.svg">
			<div class="fontS2 col_Dgray pc_br_del">発電シェルターハウスに<br>お住まいのお客様の声</div>
			<?php
			//リスト読み込み
			include_once $kaisou . "voice/temp-list.php";
			?>
		</div>
		<!-- *** -->
		<?php echo ANCHOR('yasusa'); ?>
		<div class="box_fuki sp_col">
			<h2>発電シェルターハウス<?php echo PAD_BR('0.25em'); ?><span class="col_Y" style="font-size: 1em;">安さの秘密！</span></h2>
		</div>
		<div class="top_sec02 yasusa">
			<?php
			$arr = array(
				1 => array('日々の暮らしにちょうどいい
徹底的にムダを省いた設計！', '近隣住宅との共有部分をカット、駐車場は必要な数を見極めてご用意。2人くらいにちょうどいい間取りを想定するなど、そこに住まう人の暮らしを想像し、「本当に必要か」見直しを繰り返したシンプルな設計により、大幅なコストダウンを実現しました。
'),
				2 => array('高い品質を保ちながら
コストを抑えて低価格を実現！', '東新住建は1998年に自社工場を設立し、パネル生産をいち早く内製化。すべての2×4パネルを専属工場で徹底管理し、高い品質を安定的に確保しています。また、大量生産によるスケールメリットで、建築資材を安定して調達できる体制を構築。市場の変動に左右されにくく、品質はそのままに建物コストを最小限に抑えることができます。
'),
				3 => array('創業50年の建築ノウハウが生む
“手に届く価格”の仕組み', '東新住建は1976年の創業以来、分譲住宅・注文住宅・請負建築など、幅広い土地活用に携わる中で、土地と建築に関する確かなノウハウを蓄積してきました。
その経験を活かし、良い土地を見極めて適正価格で確保できる体制を構築。市場の変動にも左右されにくく、安定した価格で土地を仕入れることができます。
その結果、住まい全体のコストを抑えながら、高品質な住まいを提供できています。
')
			);
			foreach ($arr as $k => $v) {
				echo '<div class="Wbase W720 flex1">
<div>
<h3 class="subt_underline fontS4"><img src="images/top/yasusa-n' . $k . '.svg"><div class="col_R">' . WORD_BR($v[0]) . '</div></h3>
<div class="LH175">
' . WORD_BR($v[1]) . '</div>
</div>
<div><img src="images/top/yasusa-p' . $k . '.png"></div>
</div>' . chr(10);
			}
			?>
			<div class="btn_box">
				<div class="c_ovalbtn yellow"><a href="<?php echo $link_list['問合'][0]; ?>"><span class="col_Dgray pc_br_del">詳しくは担当スタッフへ<br>お尋ねください<img src="images/common/arrow-btn-oval-R.svg"></span></a></div>
			</div>
		</div>
		<!-- *** -->
		<div class="box_fuki mini">
			<h2>よくあるご質問</h2>
		</div>
		<div class="top_qa textLJ">
			<div class="Wbase W720 sp_W330">
				<!-- qa -->
				<div class="frame_nocut">
					<div class="q fontS4"><img src="images/top/secQA-q.svg">頭金がありませんが、住宅ローンは組めますか？</div>
					<div class="a LH175"><img src="images/top/secQA-a.svg"><?php echo WORD_BR('家賃を払いながら、頭金を貯めるのは大変です。
頭金0円でも住宅ローンを貸してくれる金融機関がありますのでご案内いたします。'); ?></div>
				</div>
				<!-- qa -->
				<div class="frame_nocut">
					<div class="q fontS4"><img src="images/top/secQA-q.svg">地盤改良はどのようにしていますか？</div>
					<div class="a LH175"><img src="images/top/secQA-a.svg"><?php echo WORD_BR('地盤調査後、その土地にあった最適の工法で、しっかりと地盤改良を行います。
なかでも【砕石パイル工法】は地震の揺れや液状化に強く安心で、環境汚染もなく安全で、土地工事の省エネ化も実現する先端技術です。
当社の住まいは標準で地盤保証２０年になっております。
「地盤から考える家づくり」をモットーとしており、「地盤の強さ」+「建物の強さ」が「地震に対しての強さ」と考えております。

<a href="' . $link_list['外部-液状化'][0] . '" class="col_R">【液状化対抗地盤改良について】</a>'); ?></div>
				</div>
				<!-- qa -->
				<div class="frame_nocut">
					<div class="q fontS4"><img src="images/top/secQA-q.svg">途中で、買取単価が変わることってありますか？</div>
					<div class="a LH175"><img src="images/top/secQA-a.svg"><?php echo WORD_BR('固定価格買取制度では、決定した単価が買取期間中に変更されることは、基本的にはありません。同制度では「例外的なデフレやインフレが起こった場合のみ、単価変更の可能性がある」としています。（法第3条第8項）'); ?>
						<img src="images/top/secQA-baiden.svg">
					</div>
				</div>
				<!-- qa -->
				<div class="btn_box">
					<div class="c_ovalbtn yellow"><a href="https://www.toshinjyuken.co.jp/kodate/qa.php" target="_blank"><span class="col_Dgray pc_br_del">そのほか、<br>よくあるご質問はこちら<img src="images/common/arrow-btn-oval-R.svg"></span></a></div>
				</div>
			</div>
		</div>
		<!-- *** -->
		<?php echo $temp_box_search; ?>
		<!-- *** -->
		<div class="top_sec05">
			<img src="images/top/househa-R.svg">
			<img src="images/top/sec05-zokuzoku.svg">
			<div class="fontS2 col_Dgray">東新住建は<br class="pc_vanish">太陽光利用にいち早く着目。<br>世の中に先駆けて、<br class="pc_vanish">一般住宅へも採用しました。</div>
			<div class="Wbase W720">
				<ul class="history Wbase sp_W330">
					<?php
					$arr = array(
						2000 => array('国内初太陽光発電付き住宅への研究開発開始。
住宅用ソーラーシステムを発表。', '私たちはシロキ工業と提携し、太陽光発電と熱温水を一体化したシステム「ヘリオス」を発表。戸建住宅としては国内初の標準装備を実現し、業界から大きな注目を浴びました。このヘリオスは発電と給湯を複合したシステムで、お客さまにも十分な省エネ効果をもたらすとあって、ご好評をいただきました。'),
						2002 => array('環境共生型の大型タウン開発。', 'まだ太陽光発電そのものが珍しかったころ、私たちは大型タウン開発の分野でも、太陽光発電装置を搭載した住宅を建設しました。たとえば「ヒューマンネイチャー大垣緑園」では、太陽光発電とオール電化を組み合わせた省エネ住宅を設け、環境を守る多彩なトライアルを実践することで、自然共生の街の実現をめざしました。この試みは現在の事業にも引き継がれています。', '太陽光発電住宅を設置したヒューマンネイチャー大垣緑園'),
						2005 => array('愛知万博瀬戸会場にて「ウェルカムハウス」を建設。エコロジーハウスを提案。'),
						2011 => array('太陽光発電の家モデルハウス建築。スマートハウスの推進。'),
						2015 => array('独自の大容量発電住宅。
 「発電シェルターハウス」の誕生。', '', '10kWの大容量パネルを標準装備して業界を驚かせた発電シェルターハウス'),
						2017 => array('駅近で合理的な暮らし「DUP レジデンス」開発。', '駅近エリアに限定したコンパクトな住まいで、リーズナブルな価格とランニングコストの負担を抑えることで、ゆとりある快適かつ上質な都市生活を実現。お2人様ぐらいにちょうどいいサイズで、世代を問わず幅広いニーズに応える、新しいカタチの住まいです。'),
						2020 => array('「そだつプロジェクト」開発。', 'リーズナブルな価格帯と、「売れる」「貸せる」を前提にした設計で、いつでも誰でも「自分の家を持つこと」を可能にした新しい一戸建て。一生に一度のマイホームというこれまでの考え方を超えて、暮らしに合わせてカジュアルに購入や住み替えしやすいしくみをつくりました。'),
						2022 => array('分譲平屋限定スペシャルサイト「平屋回帰」公開。', '暮らし方や価値観の多様化が進む今、注目を集める「平屋」限定のスペシャルサイトを公開。
「平屋回帰」はリクルートより「2023年の住まいのトレンドキーワード」としても発表されました。')
					);
					foreach ($arr as $k => $v) {
						$img = glob("images/top/sec05-p" . $k . ".*");
						if (!empty($img)) {
							$img = '<div class="img"><img src="' . $img[0] . '">' . (isset($v[2]) && ($v[2] != '') ? '<div>' . $v[2] . '</div>' : '') . '</div>';
						} else {
							$img = '';
						}
						echo '<li>
<div class="year"><div class="fontS1">' . $k . '</div></div>
<div class="text LH175">
<div class="fontS5">' . WORD_BR($v[0]) . '</div>
' . (isset($v[1]) && ($v[1] != '') ? '<div>' . WORD_BR($v[1]) . '</div>' : '') . $img . '
</div>
</li>' . chr(10);
					}
					?>
				</ul>
				<div class="now textLJ Wbase sp_W330">
					<div class="year">2023</div>
					<div class="fontS5 font_weight900">たくさんのご家族から支持を得る<br class="pc_vanish">「DUP レジデンス」「そだつプロジェクト」<br class="pc_vanish">「平屋」に、<br class="sp_vanish">世に先駆けて蓄積してきた<br class="pc_vanish">太陽光発電のノウハウを組み合わせた</div>
					<div class="fontS2">「発電シェルターハウス仕様」<span class="col_Dgray">を発表！</span></div>
				</div>
				<img src="images/top/househa-R.svg">
				<img src="images/top/sec01.svg">
				<img src="images/top/sec05-plus.svg">
				<img src="images/top/catch-price.svg">
				<?php
				TOP_AMAGIF();
				?>
			</div>
		</div>
		<!-- *** -->
		<?php echo $temp_box_search; ?>
		<!-- ** -->
		<?php echo $temp_footer; ?>
		<!-- * -->
	</div>
	<?php echo $temp_bodyend; ?>
</body>

</html>