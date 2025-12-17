<?php
$p_type = 'content';
$kaisou = '';
$p_title = '物件詳細';
$dir = $kaisou . 'images/content/search/';
require $kaisou . "temp_php/basic.php";

require $kaisou . "system/function/cms-load.php";
require $kaisou . "system/function/func-price.php"; //物件情報の分解用

// 文字入り金額を安全にフォーマット（例: "130万円" → 130）
function fmt_money($v, $suffix = ' 万円')
{
	// null 対策
	if ($v === null || $v === '') return '-';

	// 数字だけ抽出
	$num = preg_replace('/[^0-9.]/', '', $v);
	if ($num === '' || $num == 0) return '-';

	// 小数含む場合も安全に
	$num = (float)$num;

	// 整形して返す
	return number_format($num) . $suffix;
}

$sysdata = array(0);
if ($_GET['id'] != '') {
	foreach (CMS_SETUP('search') as $key => $sysdata) {
		//指定のID以外除外
		if ($sysdata[0] != $_GET['id']) {
			continue;
		}
		if (CMS_OPEN($sysdata)) {
			continue;
		}
		CMS_DATA_REPLACE();
		CMS_IMGSET($sysdata[0]);
		break;
	}
	//物件情報データ取得
	$bukken_data = SEARCH_PRICE($sysdata[11][0]);
	$arr = array(
		'価格' => $sysdata[21][0],
		'権利金' => $sysdata[21][1],
		'敷金' => $sysdata[21][2],
		'売電収入' => (- ($sysdata[12][8] * 10000)) //売電収入の分減算する
	);
	SEARCH_PRICE_SHITEI($arr);

	//敷金デフォルト値
	if (!isset($bukken_data['敷金'])) {
		$bukken_data['敷金-万'] = 100;
		$bukken_data['敷金'] = $bukken_data['敷金-万'] * 10000;
	}
}
$p_limit = '';
switch ($sysdata[3]) {
	case 1:
		$p_limit = 'memberonly';
		break;
	case 999:
		$p_limit = 'soldout';
		break;
}
require $kaisou . "temp_php/temp_logincheck.php"; //ログインチェック
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
	<?php echo $temp_java; ?>
	<script src="js/jquery.flexslider-min-custom.js" type="text/javascript"></script>
	<link href="css/flexslider.css" rel="stylesheet" type="text/css">
	<link href="css/flexslider-gallery.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		/*
$(window).load(function() {
	$('.flexslider').flexslider({
		animationLoop: true,
		animation: 'fade',
		pauseOnAction:true,
		pauseOnHover:false,
		touch:false,
		controlNav: true,
		directionNav: true,
		slideshow: true,
		slideshowSpeed:5000,
		animationSpeed:1000
	});
});
*/
	</script>
	<style>
		.bnr_halforder {
			display: block;
			max-width: 900px;
			margin: auto;
		}

		.s_detail_shousai>ul>li+.bnr_box {
			margin-top: 2em;
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
		<?php echo CONTENT_SUBT_MINI('HOUSING INFO', '- 物件情報 -'); ?>
		<!-- *** -->
		<div class="content_box bg_EDD s_detail_title">
			<h2><?php echo $sysdata[2]; ?></h2>
		</div>
		<div class="content_box s_detail_box1">
			<div class="Wbase W1200">
				<?php
				echo CONTENT_PAD(30, 'sp/2');

				//階層チェック
				if (!isset($sysdata[22]) || empty(trim($sysdata[22]))) {
					//階層未設定の場合、名前から判別
					$sysdata[22] = strpos($sysdata[2], '平屋') !== false ? 1 : 2;
				}

				function LOCAL_BNR_HALFORDER()
				{
					global $link_list;
					return '<div class="bnr_box"><a href="' . $link_list['LP-￥0'][0] . '" class="bnr_halforder"><img src="lp-zeroyen/bnr/bnr-halforder.webp" alt="' . $link_list['LP-￥0'][1] . '"></a></div>';
				}
				//ルームオーダー可の場合はバナー追加
				if (!isset($sysdata[23])) {
					$sysdata[23] = 0;
				}
				?>
				<div class="LH175 fontP115 sp_textL sp_fontP100"><?php
																	if (!is_array($sysdata[6])) {
																		$sysdata[6] = array($sysdata[6]);
																	}
																	echo WORD_BR($sysdata[6][0]); ?></div>
				<?php
				switch (true) {
					case !isset($sysdata[24]):
						$sysdata[24] = array(1, '');
						break;
					case !is_array($sysdata[24]):
						$sysdata[24] = array(trim($sysdata[24]), '');
						if (empty($sysdata[24][0]) || $sysdata[24][0] < 1) {
							$sysdata[24][0] = 1;
						}
						break;
					case !isset($sysdata[24][1]):
						$sysdata[24][1] = '';
				}
				//print_r($sysdata[24]);
				$arr = array();
				switch ($sysdata[24][0]) {
					case 1: //サムネイル
						$arr[] = $sysdata['main-num'][0];
						$arr[] = $sysdata[24][1];
						break;
					case 2: //ギャラリー
						if (!is_array($sysdata[8])) {
							$sysdata[8] = array($sysdata[8]);
						}
						foreach ($sysdata[8] as $k => $v) {
							if ($v == 'P') {
								$arr[] = $sysdata['gallery-num'][0];
								$arr[] = ($sysdata[24][1] != '') ? $sysdata[24][1] : $sysdata[9][$k];
								break;
							}
						}
						break;
				}
				if (!empty($arr)) {
					echo CONTENT_PAD(40, 'sp/2');
				?>
					<style>
						.gallery_slide {
							justify-content: center;
						}

						.gallery_slide .single {
							max-width: 622px;
						}

						.gallery_slide .single img {
							width: 100%;
						}

						.gallery_slide .single>div {
							line-height: 1.5em;
							margin-top: 0.75em;
						}
					</style>
					<div class="gallery_slide">
						<?php
						if (file_exists($arr[0])) {
							$arr[0] = '<img src="' . $arr[0] . '">';
						}
						if ($arr[1] != '') {
							$arr[1] = '<div>' . trim($arr[1]) . '</div>';
						}
						echo '<div class="single Wbase">' . $arr[0] . $arr[1] . '</div>';
						/*
<?php
//ギャラリースライド
$style_pc=$photo='';
$arr=$sysdata['gallery-num'];
if(!is_array($sysdata[8])){$sysdata[8]=array($sysdata[8]);}
$i=0;
foreach($sysdata[8] as $k => $v){
	switch($v){
		case 'T':
		break;
		case 'P':
		if(file_exists(($url=$arr[$i]))){
		$fname=explode('.',$arr[$i]);
		$style_pc.='.slide_p'.($i+1).',	.gallery_slide .flex-control-nav li:nth-child('.($i+1).') a{background-image:url('.$url.');}'.chr(10);
		//$style_sp.='.slide_p'.($i+1).'{background-image:url('.$dir.$fname[0].'-sp.'.$fname[1].');}'.chr(10);
		$text=$sysdata[9][$k];
		if($text!=''){$text='<div>'.$text.'</div>';}
		$photo.='<li><img src="images/common/clear-W624H408.png" class="slide_p'.($i+1).'">'.$text.'</li>'.chr(10);
		}
		$i++;
		break;
	}
}
?>
<style>
<?php echo $style_pc.chr(10); ?>
</style>
<div class="flexslider mgnAuto borderbox"><ul class="slides">
<?php echo $photo; ?>
</ul></div>
*/
						?>
					</div>
				<?php
				} //if(!empty($arr))
				?>
				<?php echo CONTENT_PAD(60, 'sp/2'); ?>
				<div class="prof">
					<ul class="LH175 sp_fontP087">
						<?php
						if (!is_array($sysdata[11])) {
							$sysdata[11] = array($sysdata[11]);
						}
						$arr = $sysdata[11][0];
						$arr = str_replace(array("<br />", "<br>"), '[区切]', $arr);
						$arr = explode('[区切]', $arr); //改行でデータを分ける
						foreach ($arr as $v) {
							if (strpos($v, '：') === false) {
								$v = array('', $v);
							} else {
								$v = explode('：', $v);
							}
							echo '<li><div class="term">' . $v[0] . '</div><div class="desc">' . $v[1] . '</div></li>' . chr(10);
						}
						?>
					</ul>
				</div>
				<?php echo CONTENT_PAD(70, 'sp/2'); ?>
			</div>
		</div>
		<!-- *** -->

		<div class="content_box bg_EEE_green">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(80, 'sp/2'); ?>
				<ul class="s_detail_bgW_set">
					<li>
						<h3>詳細情報</h3>
						<div class="s_detail_shousai">
							<?php
							$img = $sysdata['main-num'][1];
							if (!empty($img)) {
								if (file_exists($img)) {
									echo '<div class="kukakuzu">
<div class="frame"><img src="' . $img . '"></div>
<div class="LH150 sp_fontP087">※掲載の区画図は図面を基に描き起こした区画図面につき、実際のものとは異なります。</div>
</div>' . chr(10);
								}
							}
							?>
							<ul>
								<?php
								$arr = array();
								$cnt = $cnt2 = 0;
								foreach ($sysdata[14] as $v) {
									if ($v == '@@') {
										$cnt++;
										continue;
									}
									$arr[$cnt][] = $v;
								}
								if (!is_array($sysdata[13])) {
									$sysdata[13] = array($sysdata[13]);
								}
								if (!is_array($sysdata[20])) {
									$sysdata[20] = array($sysdata[20]);
								}
								foreach ($sysdata[13] as $k => $v) {
									$cnt = 0;
									$btn = $btn2 = $madorizu_img = '';
									if (!empty($arr[$k][8])) {
										$btn = '<a class="btn">ご成約済み</a>' . chr(10);
									} else {
										// 間取り図を画像表示
										if (file_exists($sysdata['kukaku-num'][$k])) {
											$madorizu_img = '<div class="madorizu">
<div class="frame"><img src="' . $sysdata['kukaku-num'][$k] . '"></div>
</div>' . chr(10);
										}
										if ($sysdata[20][$cnt2] != '') {
											$btn .= '<div class="btn_set"><a href="' . $sysdata[20][$cnt2] . $t_blank . '" class="btn mujin">無人見学の予約</a>' . chr(10) . '</div>';
											$btn2 = '<div class="btn_bottom"><a href="' . $link_list['外部-無人で物件見学'][0] . $t_blank . '">＞ 無人見学の詳しい内容についてはこちらから</a></div>' . chr(10);
										}
									}
									$cnt2++;
									echo '<li>
<h4>' . mb_convert_kana($arr[$k][0], 'A', 'UTF-8') . '</h4>
<ul class="LH175 sp_fontP087">
<li><div>販売価格</div><div><span style="font-size:1.25em">' . $arr[$k][3] . '</span> 万円</div></li>
<li><div>敷地面積</div><div>' . $arr[$k][1] . '</div></li>
<li><div>延床面積</div><div>' . $arr[$k][2] . '</div></li>
<li><div>土地代</div><div>' . $arr[$k][4] . ' 万円</div></li>
<li><div>敷金</div><div>' . $arr[$k][5] . ' 万円</div></li>
<li><div>権利金</div><div>' . $arr[$k][6] . ' 万円</div></li>
<li><div>駐車台数</div><div>' . $arr[$k][7] . ' 台</div></li>
</ul>
' . $madorizu_img  . $btn . $btn2 . '
</li>' . chr(10);
								}

								//ルームオーダーバナー
								if ($sysdata[23] == 1) {
									echo LOCAL_BNR_HALFORDER();
								}
								?>
							</ul>
						</div>
					</li>
				</ul>
				<?php echo $local_contactbtn; ?>
				<?php echo CONTENT_PAD(80, 'sp/2'); ?>
			</div>
		</div>

		<div class="content_box bg_EDD s_detail_title">
			<h3>この物件のお支払い例</h3>
		</div>
		<div class="content_box s_detail_box2">
			<div class="Wbase W960">
				<?php echo CONTENT_PAD(50, 'sp/2'); ?>
				<div class="Wbase W800 kakaku">
					<div><span>価格</span><span><?php
												$bukken_data['計'] = $bukken_data['価格'] + $bukken_data['権利金'] + $bukken_data['敷金'];
												$bukken_data['計-万'] = ($bukken_data['計'] / 10000);
												echo number_format($bukken_data['計-万']); ?></span><span>万円</span></div>
					<div><span>月々</span><span><?php
												$key = 0;
												$str = $sysdata[12][$key++];
												$str = mb_convert_kana($str, 'a', 'UTF-8'); //全角英数を半角英数に変換
												$str = str_replace(array(","), '', $str);
												$bukken_data['月額'] = $str;
												$bukken_data['月額-万'] = ($bukken_data['月額'] / 10000);
												echo number_format($str); ?></span><span>円/月</span></div>
				</div>
				<div class="atamakin">頭金 <?php echo $sysdata[12][$key++]; ?> 円<span class="sp_vanish" style="padding: 0 0.5em;">/</span><br class="pc_vanish">ボーナス払い <?php echo $sysdata[12][$key++]; ?> 円</div>
				<div class="LH175 textL">
					<b class="dpB sp_fontP087" style="margin-bottom: 1em;">借入条件：<?php echo $sysdata[12][$key++] . ' ' . $sysdata[12][$key++]; ?> ％、借入総額 <?php echo number_format($bukken_data['計-万']); ?> 万円、<span>借入期間 <?php
																																																						$str = $sysdata[12][$key++];
																																																						$str = mb_convert_kana($str, 'a', 'UTF-8'); //全角英数を半角英数に変換
																																																						$str = str_replace(array(","), '', $str);
																																																						$bukken_data['借入期間-万'] = $str;
																																																						echo $str; ?> 年</span></b>
					<div class="fontP087 sp_fontP075"><?php echo WORD_BR('※「価格」は建物+権利金・敷金を含んでいます。
※このシミュレーションは借入れを保証するものではありません。
※シミュレーション結果の金額は概算です。詳細なお見積もりはスタッフにご相談いただくか、フォームよりお問い合わせください。'); ?></div>
				</div>
				<?php echo CONTENT_PAD(50, 'sp/2'); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box bg_EDD s_detail_title">
			<h3>土地付き住宅との比較</h3>
		</div>
		<div class="content_box s_detail_box3">
			<div class="Wbase W960">
				<?php echo CONTENT_PAD(30, 25); ?>
				<div class="menseki">近隣の土地価格 <?php
												$str = $sysdata[12][$key++];
												$str = mb_convert_kana($str, 'a', 'UTF-8'); //全角英数を半角英数に変換
												$str = str_replace(array(","), '', $str);
												$bukken_data['近隣土地-万'] = $str;
												//$bukken_data['近隣土地']=$bukken_data['近隣土地-万']*10000;
												echo number_format($str); ?> 万円<?php echo PAD_BR(); ?>※物件と同等の敷地面積</div>
				<ul class="hikaku">
					<li>
						<div class="title teishaku">
							<div>東新住建のテイシャク</div>
						</div>
						<div class="price1">
							<div><span>建物</span><span><?php echo number_format($bukken_data['価格-万']); ?> 万円</span></div>
							<img src="images/content/search/plus.svg" class="plus">
							<div><span>敷金</span><span><?php echo fmt_money($bukken_data['敷金-万']); ?></span></div>
							<img src="images/content/search/plus.svg" class="plus">
							<div><span>権利金</span><span><?php echo fmt_money($bukken_data['権利金-万']); ?></span></div>
						</div>
						<div class="price2"><span>合計</span><span><span><?php echo number_format($bukken_data['計-万']); ?></span> 万円</span></div>
						<div class="price3">
							<?php
							//太陽光発電の売電収入
							$bukken_data['計-万'] = $bukken_data['月額-万'] + $bukken_data['土地代-万'] + $bukken_data['売電収入-万'];
							?>
							<div><span>毎月返済</span><span><?php echo number_format($bukken_data['月額-万'], 1); ?> 万円</span></div>
							<div><span>土地代 / 月</span><span><?php echo number_format($bukken_data['土地代-万'], 1); ?> 万円</span></div>
							<div class="bg_Y"><span style="text-align: left;">太陽光発電の<br class="pc_vanish">売電収入</span><span><?php echo number_format($bukken_data['売電収入-万'], 1); ?> 万円</span></div>
							<hr>
							<div><span>計</span><span><?php echo number_format($bukken_data['計-万'], 1); ?> 万円</span></div>
						</div>
					</li>
					<li>
						<div class="title tochi">
							<div>土地付き住宅</div>
						</div>
						<div class="price1">
							<div><span>建物</span><span><?php echo number_format($bukken_data['価格-万']); ?> 万円</span></div>
							<img src="images/content/search/plus.svg" class="plus">
							<div class="tochi"><span>土地</span><span><?php echo number_format($bukken_data['近隣土地-万']); ?> 万円</span></div>
						</div>
						<div class="price2"><span>合計</span><span><span><?php echo number_format($bukken_data['価格-万'] + $bukken_data['近隣土地-万']); ?></span> 万円</span></div>
						<div class="price3">
							<div><span>毎月返済</span><span><?php
														$str = $sysdata[12][$key++];
														$str = mb_convert_kana($str, 'a', 'UTF-8'); //全角英数を半角英数に変換
														$str = str_replace(array(","), '', $str);
														$bukken_data['毎月返済-万'] = $str;
														echo $str; ?> 万円</span></div>
							<div><span>土地代 / 月</span><span>0 万円</span></div>
							<div><span class="v_hidden">　<br class="pc_vanish">　</span></div>
							<hr>
							<div><span>計</span><span><?php echo $str; ?> 万円</span></div>
						</div>
					</li>
				</ul>
				<div class="keisen">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div class="sagaku">
					<div>差額 <?php
							$bukken_data['差額-万'] = $bukken_data['毎月返済-万'] - number_format($bukken_data['計-万'], 1);
							echo number_format($bukken_data['差額-万'], 1); ?> 万円 × <?php echo $bukken_data['借入期間-万'] * 12; ?> ヶ月（ <?php echo $bukken_data['借入期間-万']; ?> 年）</div>
				</div>
				<img src="images/content/search/arrow.svg" class="arrow">
				<div class="setsuyaku">東新住建のテイシャクは土地付き住宅より<span><span><?php
																		echo number_format(round($bukken_data['差額-万'], 1) * $bukken_data['借入期間-万'] * 12); ?></span> 万円節約</span></div>
				<?php
				/*
$str=$sysdata[12][$key++];
$str=mb_convert_kana($str,'a','UTF-8');//全角英数を半角英数に変換
$str=str_replace(array(","),'',$str);
if($str!=''){
	echo '<div class="solar pc_br_del">太陽光発電の売電収入<span class="col_F50">'.$str.'万円/月</span>で<br>毎月の土地代を相殺すればもっとお得！</div>'.chr(10);
}
*/
				$local_contactbtn = CONTENT_PAD(70, 'sp/2') . EFFECT_BTN('問合', '来場予約・お問い合わせ', array('getparam' => 'id=' . $_GET['id'], 'class' => 'colG fontP125 LH100')) . CONTENT_PAD(75, 'sp/2');
				echo $local_contactbtn;
				?>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box bg_EEE_green">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(55, 'sp/2'); ?>
				<ul class="s_detail_bgW_set">
					<!-- ギャラリー -->
					<style>
						.s_detail_bgW_set>li.local_gallery_2025ver {
							padding: max(30px, calc(1% * 40 / 12)) max(23px, calc(1% * 28 / 12)) 0;
							gap: 0 calc(1% * 34 / 11.44);
							display: flex;
							flex-wrap: wrap;
							justify-content: space-between;
						}

						.s_detail_bgW_set>li.local_gallery_2025ver h3 {
							flex-grow: 1;
							width: 100%;
							margin-bottom: max(20px, calc(1% * 30 / 11.44));
						}

						.s_detail_bgW_set>li.local_gallery_2025ver .p_box {
							flex-grow: 1;
							width: 40%;
							max-width: max(555px, calc(1% * 555 / 11.44));
							margin-bottom: max(40px, calc(1% * 50 / 11.44));
						}

						.s_detail_bgW_set>li.local_gallery_2025ver .p_box img {
							width: 100%;
						}

						.s_detail_bgW_set>li.local_gallery_2025ver .p_box>div {
							text-align: justify;
							font-size: calc(1em * 14 / 16);
							line-height: 1.5em;
							margin-top: 0.75em;
						}

						.s_detail_bgW_set>li.local_gallery_2025ver .p_box+h3 {
							margin-top: max(40px, calc(1% * 50 / 11.44));
						}

						@media screen and (max-width: 999px) {
							.s_detail_bgW_set>li.local_gallery_2025ver {
								flex-direction: column;
							}

							.s_detail_bgW_set>li.local_gallery_2025ver .p_box {
								width: 100%;
								max-width: none;
							}
						}
					</style>
					<li class="local_gallery_2025ver">
						<?php
						//print_r($sysdata['gallery-num']);
						$arr = $sysdata['gallery-num'];
						if (!is_array($sysdata[8])) {
							$sysdata[8] = array($sysdata[8]);
						}
						$i = 0;
						foreach ($sysdata[8] as $k => $v) {
							//見出しがない場合、最初に見出しを入れる
							if (($k == 0) && ($v == 'P')) {
								echo '<h3>ギャラリー</h3>' . chr(10);
							}
							$text = trim($sysdata[9][$k]);
							switch ($v) {
								case 'T':
									echo '<h3>' . $text . '</h3>' . chr(10);
									break;
								case 'P':
									echo '<div class="p_box"><img src="' . $sysdata['gallery-num'][$i++] . '"><div>' . $text . '</div></div>' . chr(10);
									break;
							}
						}
						?>
					</li>

					<li>
						<h3>周辺環境</h3>
						<div class="Wbase">
							<div class="LH125 textL"><?php echo $bukken_data['所在地']; ?></div>
							<div class="map"><?php echo $sysdata[15][0]; ?></div>
							<ul class="s_detail_shuuhen">
								<?php
								if (!is_array($sysdata[16])) {
									$sysdata[16] = array($sysdata[16]);
								}
								$arr = $sysdata[16][0];
								$arr = str_replace(array("<br />", "<br>"), '[区切]', $arr);
								$arr = explode('[区切]', $arr); //改行でデータを分ける
								$arr = array_filter($arr);
								$mid = count($arr) / 2;
								$step = 0;
								echo '<li>';
								foreach ($arr as $k => $v) {
									if ($step >= 2) {
										if ($v != '') {
											echo '<br>';
										}
									} else {
										if ($k >= $mid) {
											echo '</li>' . chr(10) . '<li>';
											$step = 2;
										} else if ($step == 1) {
											echo '<br>';
										} else {
											$step = 1;
										}
									}
									if ($v != '') {
										echo '●' . $v;
									}
								}
								echo '</li>' . chr(10);
								?>
							</ul>
						</div>
					</li>
					<li>
						<h3>物件概要</h3>
						<ul class="s_detail_bukken LH200">
							<?php
							if (!is_array($sysdata[17])) {
								$sysdata[17] = array($sysdata[17]);
							}
							$arr = $sysdata[17][0];
							$arr = str_replace(array("<br />", "<br>"), '[区切]', $arr);
							$arr = explode('[区切]', $arr); //改行でデータを分ける
							foreach ($arr as $v) {
								if (strpos($v, '：') === false) {
									$v = array('', $v);
								} else {
									$v = explode('：', $v);
								}
								echo '<li><div>' . $v[0] . '</div><div>' . $v[1] . '</div></li>' . chr(10);
							}
							?>
						</ul>
					</li>
				</ul>
				<?php echo $local_contactbtn; ?>
			</div>
		</div>



		<!-- *** -->
		<div class="content_box">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(75, 'sp/2'); ?>
				<?php echo EFFECT_BTN('物件一覧', '物件一覧に戻る'); ?>
				<?php echo CONTENT_PAD(85, 'sp/2'); ?>
				<?php echo TOP_MENU_BNR(array(1, 2)); ?>
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