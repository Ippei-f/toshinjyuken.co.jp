<?php
$p_type = 'LP';
$kaisou = '../';
$p_title = 'LP-￥0';
$dir = 'img/';
require $kaisou . "temp_php/basic.php";

//LP用パラメータ
include 'parts/data-param.php';

require $kaisou . "system/function/cms-load.php";
require $kaisou . "system/function/func-price.php"; //物件情報の分解用

$recaptcha_url = '../recaptcha/';

//フォームセットアップ
require_once 'parts/form/setup.php';

//メール定型文
$sendtext_arr = array(
	'送信タイトル' => '---' . $comp_data['HP名'] . ' ' . $link_list['LP-￥0'][1] . '---',
	'返信タイトル' => 'お問い合わせありがとうございます ---' . $comp_data['HP名'] . '---',
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
		$local_bukken_arr['エリア'][$v] = $k;
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
		if (!isset($sysdata[22]) || empty(trim($sysdata[22]))) {
			//階層未設定の場合、名前から判別
			$sysdata[22] = strpos($sysdata[2], '平屋') !== false ? 1 : 2;
		}
		if ($sysdata[22] != 1) {
			continue;
		} //平屋じゃないのも除外
		if (!isset($sysdata[23]) || ($sysdata[23] != 1)) {
			continue;
		} //ルームオーダー可でないものも除外
		$k2 = $local_bukken_arr['エリア'][$sysdata[18]];
		$local_bukken_arr[$k2][] = $sysdata[2];
		if (isset($_GET['id']) && $_GET['id'] == $sysdata[0]) {
			$local_bukken_id[0] = $k2;
			$local_bukken_id[1] = $sysdata[2];
			$a = $form_arr['ご希望のエリア'];
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
	//print_r($local_bukken_def);
	//print_r($local_bukken_arr);

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
		})(window, document, "clarity", "script", "q4jvxn168k");
	</script>
	<title><?php echo $temp_title; ?></title>
	<link href="../css/common.css" rel="stylesheet" type="text/css">
	<link href="../css/halforder.css" rel="stylesheet" type="text/css" />
	<link href="../css/search.css" rel="stylesheet" type="text/css">
	<link href="../css/contact.css" rel="stylesheet" type="text/css">
	<link href="style.css<?php echo '?' . date('Ymd'); ?>" rel="stylesheet" type="text/css">
	<?php echo $temp_java; ?>
	<link href="../js/slick/slick.css" rel="stylesheet" type="text/css">
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

<body class="borderbox HO-page">
	<?php echo $temp_pagetop; ?>
	<div align="center">
		<!-- * -->
		<?php echo $temp_header; ?>

		<section class="HO-kv">
			<div class="HO-kv__badge">
				<img src="../images/halforder/kv-badge.svg" alt="INTERIOR SELECT / HALF ORDER" />
			</div>
			<h1 class="HO-kv__catch">
				<img class="pc-only" src="../images/halforder/kv-catch.svg" alt="分譲住宅に選ぶ自由を。" />
				<img class="sp-only" src="../images/halforder/sp/kv-catch.svg" alt="分譲住宅に選ぶ自由を。" />
			</h1>
		</section>

		<section class="HO-intro">
			<div class="HO-intro-inner">
				<div class="HO-intro-header">
					<h2 class="HO-intro__ttl">
						これから家を買うなら、<br class="sp-only" /><strong>“<span>選</span><span>べ</span><span>る</span>分譲住宅”</strong>
					</h2>
					<div class="HO-intro__txt-1">外観や間取りまで叶う<br class="sp-only" />「ハーフオーダー」で、</div>
					<div class="HO-intro__txt-2">理想の住まいを、<br />自分らしくデザインしましょう！</div>
					<div class="HO-intro__btn">
						<a href="#HO-birthhistory">誕生ヒストリーはこちら</a>
					</div>
				</div>
				<ul class="HO-intro__list">
					<li class="HO-intro__item">
						<div class="img">
							<div class="img">
								<img src="../images/halforder/intro-halforder.jpg" alt="" />
							</div>
							<div class="badge">
								<img src="../images/halforder/intro-halforder-badge.svg" alt="HALF ORDER" />
							</div>
						</div>
						<div class="txt">
							<h3 class="ttl">“内観と外観デザイン”を両方セレクト</h3>
							<div class="body">
								<p>
									注文住宅のような自由度と、分譲住宅のコストパフォーマンスを兼ね備えた「いいとこどり」がハーフオーダーの魅力。<br />
									今はまだ真っ白な空間だからこそ、間取りや外観も、あなたの理想に合わせてプランニングできます。
								</p>
							</div>
							<div class="btn">
								<a href="https://www.toshinjyuken.co.jp/teishaku-portal/search.php" target="_blank">物件はこちら</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</section>

		<section class="HO-movie">
			<div class="HO-movie-inner">
				<h2 class="HO-flow__ttl">動画で詳しく解説</h2>
				<div class="HO-movie__movie">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/9UJrtOiI2ug?si=Z_ydXDbuvCUPDnwk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</div>
			</div>
		</section>

		<section class="HO-flow">
			<div class="HO-flow-inner">
				<h2 class="HO-flow__ttl">ご入居までの流れ</h2>
				<div class="HO-flow__figure">
					<img src="../images/halforder/flow.svg" alt="ご入居までの流れ" />
				</div>
			</div>
		</section>

		<section class="HO-halforder">
			<div class="HO-halforder-inner">
				<h2 class="HO-halforder__ttl">
					<div class="badge"><img src="../images/halforder/halforder-ttl-badge.svg" alt="ハーフオーダー" /></div>
				</h2>
				<div class="HO-halforder-header">
					<div class="ttl">外観と内装が選べる</div>
					<ul>
						<li class="col3">外壁</li>
						<li class="col3">玄関ドア</li>
						<li class="col3">外構</li>
						<li class="col5">壁</li>
						<li class="col5">床</li>
						<li class="col5">設備</li>
						<li class="col5">建具</li>
						<li class="col5">間取り</li>
					</ul>
				</div>
				<div class="HO-halforder__ttl-2">
					<h3 class="jp">
						<span>内観と組み合わせて<br class="sp-only" />オーダーできる外観Style</span>
					</h3>
				</div>
				<div class="HO-halforder__gallery">
					<div class="HO-halforder__gallery-main">
						<ul class="HO-halforder__gallery-main__list">
							<li class="HO-halforder__gallery-main__item exterior">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-1.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">01</div>
									<div class="ttl">
										<div class="en manrope"><strong>Japanese Modern</strong> Style</div>
										<h4 class="jp">和モダンスタイル</h4>
									</div>
								</div>
							</li>
							<li class="HO-halforder__gallery-main__item exterior">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-2.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">02</div>
									<div class="ttl">
										<div class="en manrope"><strong>Natural Black</strong> Style</div>
										<h4 class="jp">ナチュラルブラックスタイル</h4>
									</div>
								</div>
							</li>
							<li class="HO-halforder__gallery-main__item exterior">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-3.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">03</div>
									<div class="ttl">
										<div class="en manrope"><strong>Simple</strong> Style</div>
										<h4 class="jp">シンプルスタイル</h4>
									</div>
								</div>
							</li>
							<li class="HO-halforder__gallery-main__item exterior">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-4.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">04</div>
									<div class="ttl">
										<div class="en manrope"><strong>Monotone </strong> Style</div>
										<h4 class="jp">モノトーンスタイル</h4>
									</div>
								</div>
							</li>
							<li class="HO-halforder__gallery-main__item exterior">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-5.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">05</div>
									<div class="ttl">
										<div class="en manrope"><strong>California </strong> Style</div>
										<h4 class="jp">カリフォルニアスタイル</h4>
									</div>
								</div>
							</li>
						</ul>
						<div class="HO-halforder__gallery__note">
							※05 カリフォルニアスタイルのみ別途追加費用となります。<br />
							※間取りタイプによってお選びいただけるスタイルが異なります。
						</div>
					</div>
					<div class="HO-halforder__gallery-sub">
						<ul class="HO-halforder__gallery-sub__list">
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-1.jpg" alt="" />
								</div>
								<div class="number manrope">01</div>
							</li>
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-2.jpg" alt="" />
								</div>
								<div class="number manrope">02</div>
							</li>
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-3.jpg" alt="" />
								</div>
								<div class="number manrope">03</div>
							</li>
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-4.jpg" alt="" />
								</div>
								<div class="number manrope">04</div>
							</li>
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/halforder-gallery-5.jpg" alt="" />
								</div>
								<div class="number manrope">05</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="HO-halforder__ttl-2">
					<h3 class="jp"><span>内観プラン</span></h3>
					<div class="en manrope"><strong>Basic</strong> Style</div>
				</div>
				<div class="HO-halforder__gallery">
					<div class="HO-halforder__gallery-main">
						<ul class="HO-halforder__gallery-main__list">
							<li class="HO-halforder__gallery-main__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-1.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">01</div>
									<div class="ttl">
										<div class="en manrope"><strong>Hotel Like</strong> Style</div>
										<h4 class="jp">ホテルライクスタイル</h4>
									</div>
								</div>
							</li>
							<li class="HO-halforder__gallery-main__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-2.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">02</div>
									<div class="ttl">
										<div class="en manrope"><strong>Natural Botanical</strong> Style</div>
										<h4 class="jp">ナチュラルボタニカルスタイル</h4>
									</div>
								</div>
							</li>
							<li class="HO-halforder__gallery-main__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-3.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">03</div>
									<div class="ttl">
										<div class="en manrope"><strong>Modern</strong> Style</div>
										<h4 class="jp">モダンスタイル</h4>
									</div>
								</div>
							</li>
							<li class="HO-halforder__gallery-main__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-4.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">04</div>
									<div class="ttl">
										<div class="en manrope"><strong>California</strong> Style</div>
										<h4 class="jp">カリフォルニアスタイル</h4>
									</div>
								</div>
							</li>
							<li class="HO-halforder__gallery-main__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-5.jpg" alt="" />
								</div>
								<div class="txt">
									<div class="number manrope">05</div>
									<div class="ttl">
										<div class="en manrope"><strong>Grayish</strong> Style</div>
										<h4 class="jp">グレイッシュスタイル</h4>
									</div>
								</div>
							</li>
						</ul>
						<div class="HO-halforder__gallery__note">※間取りタイプによってお選びいただけるスタイルが異なります。</div>
					</div>
					<div class="HO-halforder__gallery-sub">
						<ul class="HO-halforder__gallery-sub__list">
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-1.jpg" alt="" />
								</div>
								<div class="number manrope">01</div>
							</li>
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-2.jpg" alt="" />
								</div>
								<div class="number manrope">02</div>
							</li>
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-3.jpg" alt="" />
								</div>
								<div class="number manrope">03</div>
							</li>
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-4.jpg" alt="" />
								</div>
								<div class="number manrope">04</div>
							</li>
							<li class="HO-halforder__gallery-sub__item">
								<div class="img">
									<img src="../images/halforder/interiorselect-gallery-5.jpg" alt="" />
								</div>
								<div class="number manrope">05</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="premium">
					<div class="HO-halforder__ttl-2">
						<h3 class="jp"><span>もっと素材にこだわりたい方</span></h3>
						<div class="en manrope"><strong>Premium</strong> Style</div>
						<div class="note">※追加料金となります。詳しくはお問い合わせください</div>
					</div>
					<ul class="premium__list">
						<li class="premium__item modal__trigger" data-target="modal_1">
							<div class="img">
								<img src="../images/halforder/interiorselect-premium-luxury.jpg" alt="" />
							</div>
							<div class="txt">
								<div class="ttl">
									<div class="en manrope"><strong>Luxury</strong> Style</div>
									<h4 class="jp">ラグジュアリースタイル</h4>
								</div>
							</div>
						</li>
						<li class="premium__item modal__trigger" data-target="modal_2">
							<div class="img">
								<img src="../images/halforder/interiorselect-premium-natural.jpg" alt="" />
							</div>
							<div class="txt">
								<div class="ttl">
									<div class="en manrope"><strong>Natural</strong> Style</div>
									<h4 class="jp">ナチュラルスタイル</h4>
								</div>
							</div>
						</li>
						<li class="premium__item modal__trigger" data-target="modal_3">
							<div class="img">
								<img src="../images/halforder/interiorselect-premium-frenchmodern.jpg" alt="" />
							</div>
							<div class="txt">
								<div class="ttl">
									<div class="en manrope"><strong>French Modern</strong> Style</div>
									<h4 class="jp">フレンチモダンスタイル</h4>
								</div>
							</div>
						</li>
					</ul>

					<!--.modal-area-->
					<div class="modal-area">
						<div id="modal_1" class="modal__wrapper">
							<div class="modal__layer"></div>
							<div class="modal__container">
								<div class="modal__inner">
									<!-- モーダル内のコンテンツ -->
									<div class="modal__content">
										<div class="img">
											<img src="../images/halforder/interiorselect-premium-luxury.jpg" alt="" />
										</div>
										<div class="txt">
											<div class="ttl">
												<div class="en manrope"><strong>Luxury</strong> Style</div>
												<h4 class="jp">ラグジュアリースタイル</h4>
											</div>
											<div class="body">
												<p>セラミック調フローリングとブラックでまとめたキッチン・扉が高級感を演出。天然石風エコカラットやコンクリート調壁に間接照明が映え、光と影が織りなすドラマチックな空間に。</p>
											</div>
										</div>
									</div>
									<!-- / モーダル内のコンテンツ -->
									<!-- モーダルを閉じるボタン -->
									<div class="modal__close">
										<img src="../images/halforder/modal-close.svg" alt="Close" />
									</div>
									<!-- / モーダルを閉じるボタン -->
								</div>
							</div>
						</div>

						<div id="modal_2" class="modal__wrapper">
							<div class="modal__layer"></div>
							<div class="modal__container">
								<div class="modal__inner">
									<!-- モーダル内のコンテンツ -->
									<div class="modal__content">
										<div class="img">
											<img src="../images/halforder/interiorselect-premium-natural.jpg" alt="" />
										</div>
										<div class="txt">
											<div class="ttl">
												<div class="en manrope"><strong>Natural</strong> Style</div>
												<h4 class="jp">ナチュラルスタイル</h4>
											</div>
											<div class="body">
												<p>本物の木の質感を楽しめる突板で床と天井を仕上げ、扉も同色で統一。焼き物を表現した陶連子調のエコカラットがアクセントとなり、柔らかな照明が住まい全体を包み込む心地よい空間に。</p>
											</div>
										</div>
									</div>
									<!-- / モーダル内のコンテンツ -->
									<!-- モーダルを閉じるボタン -->
									<div class="modal__close">
										<img src="../images/halforder/modal-close.svg" alt="Close" />
									</div>
									<!-- / モーダルを閉じるボタン -->
								</div>
							</div>
						</div>

						<div id="modal_3" class="modal__wrapper">
							<div class="modal__layer"></div>
							<div class="modal__container">
								<div class="modal__inner">
									<!-- モーダル内のコンテンツ -->
									<div class="modal__content">
										<div class="img">
											<img src="../images/halforder/interiorselect-premium-frenchmodern.jpg" alt="" />
										</div>
										<div class="txt">
											<div class="ttl">
												<div class="en manrope"><strong>French Modern</strong> Style</div>
												<h4 class="jp">フレンチモダンスタイル</h4>
											</div>
											<div class="body">
												<p>床とキッチンをウォルナットで統一し、落ち着いた重厚感を演出。ホワイトの扉やモールディングが華やかさを添え、室内用窓のデコマドで光とデザインが調和する上品な空間に。</p>
											</div>
										</div>
									</div>
									<!-- / モーダル内のコンテンツ -->
									<!-- モーダルを閉じるボタン -->
									<div class="modal__close">
										<img src="../images/halforder/modal-close.svg" alt="Close" />
									</div>
									<!-- / モーダルを閉じるボタン -->
								</div>
							</div>
						</div>
					</div>
					<!--/.modal-area-->
				</div>

				<div class="option">
					<h3 class="option__ttl">設備オプションもカスタマイズできます</h3>
					<ul class="option__list">
						<li class="option__item">
							<div class="img">
								<img src="../images/halforder/interiorselect-option-1.jpg" alt="" />
							</div>
							<div class="txt">スマートキー</div>
						</li>
						<li class="option__item">
							<div class="img">
								<img src="../images/halforder/interiorselect-option-2.jpg" alt="" />
							</div>
							<div class="txt">宅配BOX</div>
						</li>
						<li class="option__item">
							<div class="img">
								<img src="../images/halforder/interiorselect-option-3.jpg" alt="" />
							</div>
							<div class="txt">ウッドデッキ</div>
						</li>
						<li class="option__item">
							<div class="img">
								<img src="../images/halforder/interiorselect-option-4.jpg" alt="" />
							</div>
							<div class="txt">幹太くん</div>
						</li>
						<li class="option__item">
							<div class="img">
								<img src="../images/halforder/interiorselect-option-5.jpg" alt="" />
							</div>
							<div class="txt">タンクレストイレ</div>
						</li>
						<li class="option__item">
							<div class="img">
								<img src="../images/halforder/interiorselect-option-6.jpg" alt="" />
							</div>
							<div class="txt">IHコンロ</div>
						</li>
						<li class="option__item">
							<div class="img">
								<img src="../images/halforder/interiorselect-option-7.jpg" alt="" />
							</div>
							<div class="txt">カップボード</div>
						</li>
					</ul>
					<div class="option__note">※写真はすべてイメージです</div>
				</div>
				<div class="bukken-btn">
					<a href="https://www.toshinjyuken.co.jp/teishaku-portal/search.php" target="_blank">ハーフオーダーの物件はこちら</a>
				</div>
			</div>
		</section>

		<section class="HO-memberregistration">
			<div class="HO-memberregistration-inner">
				<h2 class="HO-memberregistration__ttl"><span>最新情報をいち早くお届け</span></h2>
				<div class="c-btn">
					<a href="../member.php">会員登録<span class="arrow"><img src="../images/halforder/arrow-right.svg" alt="" /></span></a>
				</div>
			</div>
		</section>

		<section id="HO-birthhistory" class="HO-birthhistory">
			<div class="HO-birthhistory-bg">
				<img src="../images/halforder/birthhistory-bg.jpg" class="parallax-img" data-rellax-speed="-2" alt="" />
			</div>
			<div class="HO-birthhistory-inner">
				<h2 class="HO-birthhistory__ttl">誕生ヒストリー</h2>
				<div class="HO-birthhistory__body">
					<p>
						分譲住宅と聞くと、“決まったものを買うだけ”と思われがちです。<br />
						しかし実際には、「壁紙を選びたい」「間取りにこだわりたい」というお客様の声を多くいただきます。
					</p>

					<p>
						そこで私たちは、24,000棟に及ぶ実績と自社工場による高い生産力を生かし、<br />
						建売の安心価格やスピードはそのままに、“自分らしさ”を叶える新しい家づくりを実現しました。
					</p>

					<p>
						<strong>内装を選べる「インテリアセレクト」、外観と内装を選べる「ハーフオーダー」</strong>。<br />
						分譲住宅でも、暮らしに合わせて自分らしい家をつくる。<br />
						それが、私たちの“選べる分譲住宅”です。
					</p>
				</div>
			</div>
		</section>

		<section class="HO-voice">
			<div class="HO-voice-inner">
				<h2 class="HO-voice__ttl">ハーフオーダーで購入されたお客様</h2>

				<ul class="HO-voice__list">
					<li class="HO-voice__item">
						<div class="img">
							<img src="../images/halforder/voice-1.jpg" alt="" />
						</div>
						<div class="txt">
							<div class="data">岡崎市　S様／ご家族構成：ご夫婦、愛猫</div>
							<h3 class="voice">早期契約のおかげで、注文住宅レベルのこだわりを実現できました</h3>
						</div>
						<div class="btn">
							<a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=28" target="_blank">詳しく見る</a>
						</div>
					</li>
					<li class="HO-voice__item">
						<div class="img">
							<img src="../images/halforder/voice-2.jpg" alt="" />
						</div>
						<div class="txt">
							<div class="data">犬山市　O様／ご家族構成：ご夫婦、長女、長男、愛猫</div>
							<h3 class="voice">家族の気配がいつもそばにある、平屋という選択</h3>
						</div>
						<div class="btn">
							<a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=41" target="_blank">詳しく見る</a>
						</div>
					</li>
					<li class="HO-voice__item">
						<div class="img">
							<img src="../images/halforder/voice-3.jpg" alt="" />
						</div>
						<div class="txt">
							<div class="data">東郷町　I様／ご家族構成：ご夫婦</div>
							<h3 class="voice">建売でも、ここまで希望が叶うなんて思っていませんでした</h3>
						</div>
						<div class="btn">
							<a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=43" target="_blank">詳しく見る</a>
						</div>
					</li>
					<li class="HO-voice__item">
						<div class="img">
							<img src="../images/halforder/voice-4.jpg" alt="" />
						</div>
						<div class="txt">
							<div class="data">岩倉市　T様／ご家族構成：ご夫婦</div>
							<h3 class="voice">ハーフオーダーの自由度が、バリアフリーにも役立ちました</h3>
						</div>
						<div class="btn">
							<a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=45" target="_blank">詳しく見る</a>
						</div>
					</li>
				</ul>
			</div>
		</section>

		<section class="HO-eco">
			<div class="HO-eco-inner">
				<h2 class="HO-eco__ttl">環境にもやさしい住まいづくり</h2>
				<ul class="HO-eco__list">
					<li class="HO-eco__item">
						<div class="img">
							<img src="../images/halforder/eco-1.jpg" alt="" />
						</div>
						<div class="txt">
							<h3 class="ttl">国産材の4.3倍2×4住宅</h3>
							<div class="body">
								<p>東新住建独自の4.3倍2×4パネルの一部に、国産材を利用しています。元々、2×4工法は北米で発達した工法であるため、輸入材の使用量がほぼ100％となっています。その中に国産材を採り入れる事で、日本の森を守る活動を積極的に行っています。</p>
							</div>
						</div>
					</li>
					<li class="HO-eco__item">
						<div class="img">
							<img src="../images/halforder/eco-2.jpg" alt="" />
						</div>
						<div class="txt">
							<h3 class="ttl">太陽光パネル</h3>
							<div class="body">
								<p>太陽光発電は発電時にCO2を排出しない、環境にやさしい発電方法です。太陽光発電の導入はCO2の削減につながるだけでなく、限られた地球の資源の節約にも貢献できます。</p>
							</div>
						</div>
					</li>
					<li class="HO-eco__item">
						<div class="img">
							<img src="../images/halforder/eco-3.jpg" alt="" />
						</div>
						<div class="txt">
							<h3 class="ttl">地中熱利用</h3>
							<div class="body">
								<p>地中温度は1年中変化がないため、外気温度と比べると夏は涼しく、冬は暖かくなります。この地下熱を利用するため、地下5mにパイプを埋めて家に地熱を取りこみ冷暖房の効率をアップ。エコでクリーンなエネルギーでお部屋を快適にします。</p>
								<p class="note">
									※土地の形状によりできない場合があります。<br />
									※一部対象外の物件がございます。
								</p>
							</div>
						</div>
					</li>
				</ul>
				<div class="HO-eco__btn">
					<a href="https://www.toshinjyuken.co.jp/kodate/structure.php" target="_blank">東新住建の家づくりについて</a>
				</div>
			</div>
		</section>

		<h2 class="lp-subt bg_LP_R"><span>ハーフオーダーで</span><span>自分らしい暮らしを始めよう！</span></h2>
		<?php
		//ピックアップ
		include 'parts/temp_pickup.php';
		?>

		<!-- parallax -->
		<script>
			(function() {
				const el = document.querySelector(".HO-birthhistory-bg .parallax-img");
				if (!el) return;

				const speed = 0.35; // 動きの強さ（0.1〜0.4くらいで調整）
				let rectTop = 0,
					height = 0; // セクション位置キャッシュ

				function measure() {
					const wrap = el.parentElement;
					const r = wrap.getBoundingClientRect();
					// ページ基準の top を得る
					rectTop = window.pageYOffset + r.top;
					height = r.height;
				}

				function render() {
					const scrollY = window.pageYOffset;
					// セクションに入った量に応じて移動
					const progress = scrollY - rectTop;
					const translate = progress * speed; // 下方向にゆっくり
					el.style.transform = "translate3d(0," + translate + "px,0)";
				}

				function onScroll() {
					render();
				}

				function onResize() {
					measure();
					render();
				}

				window.addEventListener("load", () => {
					measure();
					render();
				});
				window.addEventListener("resize", onResize, {
					passive: true
				});
				window.addEventListener("scroll", onScroll, {
					passive: true
				});
			})();
		</script>

		<link rel="stylesheet" type="text/css" href="../css/slick.css" />
		<link rel="stylesheet" type="text/css" href="../css/slick-theme.css" />
		<script type="text/javascript" src="../js/slick.min.js"></script>

		<script>
			$(".HO-halforder__gallery-main__list").slick({
				autoplay: true,
				arrows: false,
				fade: true,
				asNavFor: ".HO-halforder__gallery-sub__list",
			});
			$(".HO-halforder__gallery-sub__list").slick({
				slidesToShow: 20,
				asNavFor: ".HO-halforder__gallery-main__list",
				focusOnSelect: true,
				variableWidth: true, // スライド幅の自動計算を無効
			});

			$(".HO-voice__list").slick({
				slidesToShow: 2,
				slidesToScroll: 1,
				centerMode: true,
				centerPadding: "20%",
				autoplay: true,
				autoplaySpeed: 3000,
				speed: 1000,
				infinite: true,
				responsive: [{
					breakpoint: 1000, // 999px以下のサイズに適用
					settings: {
						slidesToShow: 1,
						centerMode: false,
					},
				}, ],
			});
		</script>

		<script>
			// 変数に要素を入れる
			var trigger = $(".modal__trigger"),
				wrapper = $(".modal__wrapper"),
				layer = $(".modal__layer"),
				container = $(".modal__container"),
				close = $(".modal__close");

			// 『モーダルを開くボタン』をクリックしたら、『モーダル本体』を表示
			$(trigger).click(function() {
				var target = $(this).data("target");
				var modal = document.getElementById(target);
				$(modal).fadeIn(400);

				// スクロール位置を戻す
				$(container).scrollTop(0);

				// サイトのスクロールを禁止にする
				$("html, body").css("overflow", "hidden");
			});

			// 『背景』と『モーダルを閉じるボタン』をクリックしたら、『モーダル本体』を非表示
			$(layer)
				.add(close)
				.click(function() {
					$(wrapper).fadeOut(400);

					// サイトのスクロール禁止を解除する
					$("html, body").removeAttr("style");
				});
		</script>

		<?php echo $temp_bottom_bnr2; ?>
		<?php echo $temp_footer; ?>
		<!-- * -->
	</div>
	<?php echo $temp_bodyend; ?>
</body>

</html>