<?php
$p_type = 'content';
$kaisou = '../';
$p_title = '';
$temp_footer_option = array(
	'movie' => false,
	'bnr' => false
);
//$dir=$kaisou.'images/content/'.$nowpage_name.'/';

//LP用パラメータ
include '../../teishaku-portal/lp-zeroyen/parts/data-param.php';

$dir = 'img/';
$dir_teishaku = $data_param_lp_zeroyen['dir'] . $dir;
require $kaisou . "temp_php/basic.php";

$dir_sys = $kaisou . 'system/';
require $dir_sys . 'function/cms-load.php'; //軽量版
require $kaisou . "system/function/func-price.php"; //物件情報の分解用

$recaptcha_url = '../recaptcha/';
require_once $kaisou . $recaptcha_url . 'form/common_select_arr.php'; //共通配列読み込み

//フォームセットアップ
require_once 'parts/form/setup.php';

//メール定型文
$sendtext_arr = array(
	'送信タイトル' => '---' . $comp_data['HP名'] . ' ハーフオーダー平屋---',
	'返信タイトル' => 'お問い合わせありがとうございます ---' . $comp_data['HP名'] . ' ハーフオーダー平屋---',
	'返信下追加文' => '',
	'サンクスURL' => 'thanks.php'
);

require $kaisou . $recaptcha_url . "form/form.php"; //2023ver
require_once 'parts/form/parts.php'; //小分け関数

$mode_conf = ($step >= 3); //確認モードフラグ

if (!$mode_conf) { //確認モード

	//CMS読み込み

	require $kaisou . "temp_php/data-area.php"; //エリア情報読み込み
	$local_bukken_def = array('── 物件名 ──' => '');
	$local_bukken_arr = array();
	$local_bukken_arr['エリア'] = array('── 全体エリア ──' => '');
	$local_bukken_id = array();
	foreach ($area_list as $k => $v) {
		$local_bukken_arr['エリア'][] = $k;
	}
	$sysdata_proto = CMS_SETUP('search');

	foreach ($sysdata_proto as $key => $sysdata) {
		if (CMS_OPEN($sysdata)) {
			continue;
		}
		if ($sysdata[3] == 999) {
			continue;
		} //完売物件も除外
		CMS_DATA_REPLACE();
		$k2 = $local_bukken_arr['エリア'][$sysdata[18] - 1];
		$local_bukken_arr[$k2][] = $sysdata[2];
		if (isset($_GET['id']) && $_GET['id'] == $sysdata[0]) {
			$local_bukken_id[0] = $k2;
			$local_bukken_id[1] = $sysdata[2];
			$a = $form_arr_2023['お問い合わせの項目'];
			$_REQUEST[$a[1]] = $a['select'][0];
		}
	}
	foreach ($local_bukken_arr as $k => $v) {
		if ($k == 'エリア') {
			continue;
		}
		asort($local_bukken_arr[$k]); //昇順
		$local_bukken_arr[$k] = $local_bukken_def + $local_bukken_arr[$k];
	}
	$form_arr['ご希望のエリア']['select1'] = $local_bukken_arr['エリア'];
	$form_arr['ご希望のエリア']['select2'] = $local_bukken_def;

	/*
$lp_db_kumi=array
('L'=>array
 ('mainpic-L1'=>array('カリフォルニア','真っ白な外観に青い窓枠がアクセントになる外観')
 ,'kumi-L4a'	=>array('和モダン','和の風情とモダンなデザインが調和した外観')
 ,'mainpic-L4'=>array('ナチュラルブラック','シックな黒とナチュラルな木目が融合した外観')
 ,'kumi-L4b'	=>array('シンプル','白を基調にしたシンプルで上品な外観')
 ,'kumi-L4c'	=>array('モノトーン','白と黒のコントラストが際立つスタイリッシュな外観')
 )
,'R'=>array
 ('kumi-R1'		=>array('ホテルライク','ホテルのような優雅さと快適さを備えた心地の良い空間')
 ,'mainpic-R1'=>array('モダン','深みと重厚感が醸し出す上質な空間')
 ,'mainpic-R3'=>array('グレイッシュ','穏やかなグレージュが織りなす柔らかさと温もりを感じる空間')
 ,'mainpic-L2'=>array('ナチュラルボタニカル','緑が映える自然と調和した爽やかで安らぎの空間')
 ,'kumi-R2'		=>array('カリフォルニア','明るい白にカリフォルニアブルーをアクセント開放的で心地よい空間')
 //,'kumi-R3'		=>array('カリフォルニアブラック','白を基調にした空間に黒のアクセントが引き立つシックで落ち着いた空間')
 )
);
*/
	$lp_db_kumi = array(
		'L' => array(
			'kumi-L1'		=> array('カリフォルニア', '青い空に映える爽やかなブルーの外観')
			//,'mainpic-L1'=>array('カリフォルニアホワイト','真っ白な外観に青い窓枠がアクセントになる外観')
			,
			'kumi-L4a'	=> array('和モダン', '和の風情とモダンなデザインが調和した外観'),
			'mainpic-L4' => array('ナチュラルブラック', 'シックな黒とナチュラルな木目が融合した外観'),
			'kumi-L4b'	=> array('シンプル', '白を基調にしたシンプルで上品な外観'),
			'kumi-L4c'	=> array('モノトーン', '白と黒のコントラストが際立つスタイリッシュな外観')
		),
		'R' => array(
			'kumi-R1'		=> array('ホテルライク', 'ホテルのような優雅さと快適さを備えた心地の良い空間'),
			'mainpic-R1' => array('モダン', '深みと重厚感が醸し出す上質な空間'),
			'mainpic-R3' => array('グレイッシュ', '穏やかなグレージュが織りなす柔らかさと温もりを感じる空間'),
			'mainpic-L2' => array('ナチュラルボタニカル', '緑が映える自然と調和した爽やかで安らぎの空間')
			//,'kumi-R2'		=>array('カリフォルニア','明るい白にカリフォルニアブルーをアクセント開放的で心地よい空間')
			,
			'kumi-R3'		=> array('カリフォルニア', '白を基調にした空間に黒のアクセントが引き立つシックで落ち着いた空間')
		)
	);
	$lp_db_oxo = count($lp_db_kumi['L']) * count($lp_db_kumi['R']);
} //if(!$mode_conf)
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php echo $temp_meta; ?>
	<script type="text/javascript">
		(function(c, l, a, r, i, t, y) {
			c[a] = c[a] || function() {
				(c[a].q = c[a].q || []).push(arguments)
			};
			t = l.createElement(r);
			t.async = 1;
			t.src = "https://www.clarity.ms/tag/" + i;
			y = l.getElementsByTagName(r)[0];
			y.parentNode.insertBefore(t, y);
		})(window, document, "clarity", "script", "q9jko9zyqi");
	</script>
	<title><?php echo $temp_title; ?></title>
	<link href="../css/common.css" rel="stylesheet" type="text/css">
	<link href="../css/top.css" rel="stylesheet" type="text/css">
	<link href="../css/search.css" rel="stylesheet" type="text/css">
	<link href="../css/contact.css" rel="stylesheet" type="text/css">
	<link href="style.css<?php echo '?' . rand(); ?>" rel="stylesheet" type="text/css">
	<link href="halforder-common.css<?php echo '?' . rand(); ?>" rel="stylesheet" type="text/css">
	<?php echo $temp_java; ?>
	<link href="../js/slick/slick.css" rel="stylesheet" type="text/css">
	<link href="../js/slick/slick-theme.css" rel="stylesheet" type="text/css" />
	<script src="../js/slick/slick.js" type="text/javascript"></script>
	<script>
		$(window).load(function() {
			<?php
			$v = $form_arr['ご希望のエリア'][1];
			?>
			$('select[name="<?php echo $v; ?>1"]').change(function() {
				v = $(this).val();
				FORM_BUKKEN_CHANGE('select[name="<?php echo $v; ?>2"]', v);
			});
		});

		function FORM_BUKKEN_CHANGE(obj, v) {
			$(obj).empty();
			str = '<option value="">── 物件名 ──</option>';
			switch (v) {
				<?php
				foreach ($local_bukken_arr['エリア'] as $k => $v) {
					if (!is_numeric($k)) {
						continue;
					}
					$str = '';
					echo "case '" . $v . "':" . chr(10);
					foreach ($local_bukken_arr[$v] as $vk => $vv) {
						if (!is_numeric($vk)) {
							continue;
						}
						$str .= '<option>' . $vv . '</option>';
					}
					echo "str+='" . $str . "';";
					echo "break;" . chr(10);
				}
				?>
				default:
			}
			$(obj).prepend(str);
		}
	</script>
</head>

<body class="borderbox">
	<?php echo $temp_pagetop; ?>
	<div align="center">
		<!-- * -->
		<?php echo $temp_header; ?>
		<!-- ** -->
		<main class="LP LH100">

			<!-- YUMENOHIRAYA 単独部分 -->
			<section id="fv" class="">
				<div class="innerBlock">

					<div id="yumeBox">
						<p class="pict" id="yume"><img src="img/yume.png" alt="夢"></p>
						<p class="pict" id="ymenohiraya"><img src="img/yumeno-hiraya.svg" alt="YUMENO HIRAYA"></p>
					</div><!--yumeBox-->

					<div class="mainImage">
						<p class="pict">
							<img src="img/mainImage.webp" alt="イメージ">
						</p>
					</div><!--mainImage-->


				</div><!--innerBlock-->
			</section><!--fv-->
			<!-- YUMENOHIRAYA 単独部分 -->
			<?php
			//TOP画像（テイシャク・平屋共通）
			include 'parts/temp_mainpic.php';

			?>
			<?php
			if (!$mode_conf) { //確認モード
			?>

				<!--
				<section class="contSec PU" id="PU">
					<div class="innerBlock">
						<div class="PU-header">
							<div class="en">PICK UP!</div>
							<h2 class="jp">おすすめ物件</h2>
						</div>

						<?php
						// 物件リスト初期化
						$search_arr = array();

						// CMSデータ取得
						foreach (CMS_SETUP('search') as $key => $sysdata) {

							// 公開チェック
							if (CMS_OPEN($sysdata)) continue;

							// 完売除外
							if ($sysdata[3] == 999) continue;

							CMS_DATA_REPLACE();
							CMS_IMGSET($sysdata[0]);

							// ▼ ブランド = 平屋回帰（1）
							if (!is_array($sysdata[23])) $sysdata[23] = array(trim($sysdata[23]));
							if (!in_array(1, $sysdata[23])) continue;

							// ▼ フェーズ = ハーフオーダー（3）
							if (!is_array($sysdata[3])) $sysdata[3] = array(trim($sysdata[3]));
							if (!in_array(3, $sysdata[3])) continue;

							// ▼ 条件を満たした物件だけ格納
							$search_arr[] = $sysdata;
						}

						// ▼ 公開日（sysdata[1]）で降順（新しい順）
						usort($search_arr, function ($a, $b) {
							return strtotime($b[1]) - strtotime($a[1]);
						});

						// ▼ 最新4件に絞る
						$search_arr = array_slice($search_arr, 0, 4);
						?>

						<ul class="PU__list">
							<?php foreach ($flat as $sysdata): ?>
								<?php
								// 一覧テンプレ用の価格データ取得
								$bukken_data = SEARCH_PRICE($sysdata[11][0]);

								// 物件カードテンプレート（画像・タイトル・交通・所在地・価格すべて完成形）
								require $kaisou . "temp_php/search/temp-bukken-list.php";

								$cnt++;
								if ($cnt >= $max) break;
								?>
							<?php endforeach; ?>
						</ul>


						<div class="btn">
							<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=ブランド,平屋回帰｜フェーズ,ハーフオーダー" target="_blank" class="btn_bgLtoR colB border2">
								<div class="border"></div>
								<div>
									<span>すべての物件を見る</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.306 11.657">
										<polyline class="cls-1" points="0 6.157 22.868 6.157 15.585 0.392"></polyline>
									</svg>
								</div>
							</a>
						</div>
					</div>
				</section>
							-->
				<script>
					function checkBreakPoint() {
						w = $(window).width();
						if (w <= 999) {
							// スマホ向け（999px以下のとき）
							$(".PU__list").not(".slick-initialized").slick({
								autoplay: true,
							});
						} else {
							// PC向け
							$(".PU__list.slick-initialized").slick("unslick");
						}
					}
					// ウインドウがリサイズする度にチェック
					$(window).resize(function() {
						checkBreakPoint();
					});
					// 初回チェック
					checkBreakPoint();
				</script>

				<!-- *** -->
				<section class="contSec" id="catchSec">
					<div class="innerBlock">
						<?php
						/*
		<h1>
			<p class="main">ハーフオーダー平屋</p>
			<p class="sub">手に届きやすい価格で実現！</p>
		</h1>
		<div class="urineBox">
			<p class="gaku">3,780</p>
			<div class="fuzoku">
				<div class="tanni">万円</div>
				<div class="kara"><span class="tax">(税込)</span>〜</div>
			</div><!--fuzoku-->
		</div><!--urineBox-->

		<div class="urineComment">
			<p class="text">外構費用・ライフライン引込工事費など全て含みます！</p>
		</div><!--urineComment-->
*/
						?>
						<div class="lp_movie">
							<?php /* <div class="t">テイシャクについて動画でカンタン解説！</div> */ ?>
							<div class="m"><iframe src="//www.youtube.com/embed/9UJrtOiI2ug?si=v8sNDXTv21LUz-2J&rel=0" frameborder="0" allowfullscreen=""></iframe></div>
						</div>
					</div>
				</section>
				<!-- *** -->
				<?php
				/*
<style>
.box_shikourei h2{
	display: flex;
	justify-content: center;
}
.box_shikourei h2 div{
	padding-bottom: 0.25em;
	border-bottom: solid 2px #525a70;
}
</style>
*/
				//施工例（2025/07/11廃止
				//include $data_param_lp_zeroyen['dir'].'parts/temp_shikourei.php';
				?>
				<style>
					.local_voice_set {
						margin-top: 40px;
						margin-bottom: 50px;
						max-width: 860px;
						gap: 50px;
						display: flex;
						justify-content: space-between;
					}

					.local_voice_set>* {
						width: 378px;
						max-width: 100%;
					}

					.local_voice_set .p {
						width: 100%;
						height: 245px;
						display: flex;
					}

					.local_voice_set .p img {
						width: 100%;
						height: 100%;
						object-fit: cover;
					}

					.local_voice_set .t1 {
						font-size: 20px;
						line-height: 1.5em;
						padding: 0.75em 0;
						text-align: justify;
					}

					.local_voice_set .t2 {
						color: var(--sumiiro);
						border-bottom: solid 1px var(--sumiiro);
						text-align: justify;
						font-size: 14px;
						padding-bottom: 0.75em;
						display: flex;
						justify-content: space-between;
					}

					@media screen and (max-width: 999px) {
						.local_voice_set {
							max-width: 100%;
							flex-direction: column;
							align-items: center;
						}
					}
				</style>
				<h2 class="lp-subt bg_LP_2 secHeader">ハーフオーダー平屋を選んだ<br class="spOnly">お客様の声</h2>
				<div class="content_box">
					<ul class="local_voice_set Wbase">

						<li><a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=28">
								<div class="p"><img src="https://www.toshinjyuken.co.jp/kodate/system/voice/upload/photo2-0.jpg"></div>
								<div class="t1 font_yugo">早期契約のおかげで、注文住宅レベルのこだわりを実現できました</div>
								<div class="t2 font_yugo">
									<div class="name">岡崎市　S様／ご家族構成：ご夫婦、愛猫</div>
									<div class="arrow">≫</div>
								</div>
							</a></li>

						<li><a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=41">
								<div class="p"><img src="https://www.toshinjyuken.co.jp/kodate/system/voice/upload/photo43-0.jpg"></div>
								<div class="t1 font_yugo">家族の気配がいつもそばにある、平屋という選択</div>
								<div class="t2 font_yugo">
									<div class="name">犬山市　O様／ご家族構成：ご夫婦、長女、長男、愛猫</div>
									<div class="arrow">≫</div>
								</div>
							</a></li>
					</ul>
				</div>

				<?php
				function LOCAL_BTN($link, $text, $prm = array())
				{
					$wrap = array('', '');
					if (isset($prm['wrap'])) {
						$wrap = array('<div class="' . $prm['wrap'] . '">', '</div>');
					}
					echo $wrap[0] . '<div class="linkBtn"><a href="' . $link . '">
<span class="font_yugo font_bold">' . $text . '</span>
<svg class="arrow_btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.45 10.79"><polyline points="0 5.39 20 5.39 13.63 0.39"></polyline></svg>
</a></div>' . $wrap[1] . PHP_EOL;
				}
				LOCAL_BTN('https://www.toshinjyuken.co.jp/kodate/voice.php?brand=1', 'お客様の声をすべて見る', array('wrap' => 'linkBtn_wrap content_box'));
				?>
				<div style="height:min(100px,20vw);"></div>
				<!-- *** -->




			<?php
			} //if(!$mode_conf)
			?>


			<div class="bnr-harforder">
				<a href="https://www.toshinjyuken.co.jp/kodate/bunjo-halforder.php" target="_blank">
					<span class="bnr-harforder__logo">
						<img src="img/bnr-harforder-logo.svg" alt="インテリアセレクト／ハーフオーダー" />
					</span>
					<span class="bnr-harforder__txt">ハーフオーダーについて詳しくはこちら<span class="arrow"><svg class="arrow_btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.45 10.79">
								<polyline points="0 5.39 20 5.39 13.63 0.39"></polyline>
							</svg></span></span>
				</a>
			</div>
		</main>
		<!-- ** -->
		<?php echo $temp_footer; ?>
		<!-- * -->
	</div>
	<?php echo $temp_bodyend; ?>
</body>

</html>