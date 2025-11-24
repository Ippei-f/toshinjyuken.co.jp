<?php
$p_type = 'index';
$kaisou = '';
$p_title = 'TOP';
require $kaisou . "temp_php/basic.php";
//$dir=$kaisou.'images/content/xxxx/';
$dir = $dir_t;

//CMS読み込み
$dir_sys = $kaisou . 'system/search/';
require $dir_sys . 'function/cms-load.php'; //軽量版

$rand = '?' . rand();
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php echo $temp_meta; ?>
	<title><?php echo $temp_title; ?></title>
	<link href="css/common.css<?php echo $rand; ?>" rel="stylesheet" type="text/css">
	<link href="css/top.css<?php echo $rand; ?>" rel="stylesheet" type="text/css">
	<link href="css/lifestyle.css" rel="stylesheet" type="text/css">
	<?php
	//バナーシステム2023年度ver読み込み
	$toushin_bnr_url = $kaisou . '../recaptcha/';
	require $toushin_bnr_url . 'func-common-bnr-setup2023.php';
	?>
	<?php echo $temp_java; ?>
	<script src="js/wideslider.js<?php echo $rand; ?>" type="text/javascript"></script>
	<link href="css/wideslider.css<?php echo $rand; ?>" rel="stylesheet" type="text/css">
	<style>
		.ws_link {
			bottom: 2em;
			right: 2em;
			z-index: 500;
			font-size: 100%;
			line-height: 100%;
		}

		@media screen and (max-width: 999px) {
			.ws_link {
				bottom: 1em;
				font-size: 90%;
			}
		}
	</style>
</head>

<body class="borderbox index_page">
	<?php echo $temp_pagetop; ?>
	<div align="center">
		<!-- * -->
		<?php echo $temp_header; ?>
		<!-- ** -->

		<div class="fix-nav">
			<ul>
				<li class="search">
					<a href="search.php">
						<div class="icon"><img src="images/common/icon-search.svg" /></div>
						<div class="text">物件情報</div>
					</a>
				</li>
				<li class="member">
					<a href="member.php">
						<div class="icon"><img src="images/common/icon-member.svg" /></div>
						<div class="text">会員登録</div>
					</a>
				</li>
				<li class="pagetop sp_vanish">
					<a href="#pt"><img src="images/common/btn-submenu-pagetop2.svg" /></a>
				</li>
			</ul>
		</div>

		<div class="index-kv">
			<ul class="index-kv__list">
				<li class="index-kv__item">
					<img class="sp_vanish" src="images/top/kv-slider-1.jpg" alt="" />
					<img class="pc_vanish" src="images/top/sp/kv-slider-1.jpg" alt="" />
				</li>
				<li class="index-kv__item">
					<a href="">
						<img class="sp_vanish" src="images/top/kv-slider-2.jpg" alt="" />
						<img class="pc_vanish" src="images/top/sp/kv-slider-2.jpg" alt="" />
					</a>
				</li>
				<li class="index-kv__item">
					<a href="">
						<img class="sp_vanish" src="images/top/kv-slider-3.jpg" alt="" />
						<img class="pc_vanish" src="images/top/sp/kv-slider-3.jpg" alt="" />
					</a>
				</li>
				<li class="index-kv__item">
					<img class="sp_vanish" src="images/top/kv-slider-4.jpg" alt="" />
					<img class="pc_vanish" src="images/top/sp/kv-slider-4.jpg" alt="" />
				</li>
			</ul>
		</div>

		<link rel="stylesheet" type="text/css" href="css/slick.css" />
		<link rel="stylesheet" type="text/css" href="css/slick-theme.css" />
		<script type="text/javascript" src="js/slick.min.js"></script>

		<script>
			$(function() {
				$(".index-kv__list").slick({
					autoplay: true,
					dots: true,
					arrows: false, // 矢印
				});
			});
		</script>

		<section class="top_catch">
			<?php
			/*
<h3 class="fontP175 LH150 pc_br_del" style="margin-bottom: 1em;"><?php echo WORD_BR('理想のカタチ、
理想の暮らしに出会える'); ?></h3>
*/
			?>
			<div class="LH200 pc_div_del sp_br_del sp_textL"><?php
																$top_catch_num = array();
																$top_catch_num['創業'] = floor((date('Ymd') - 19750414) / 10000);
																$top_catch_num['累計'] = NUMBER_COMMA($comp_data['数値']['累計棟数']);

																echo WORD_BR('東新住建の家は、創業' . $top_catch_num['創業'] . '年、累計' . $top_catch_num['累計'] . '棟の実績ノウハウを凝縮した、
強さと心地よさを両立させた永住品質の木造2×4住宅です。
暮らし方や家族構成に合わせたさまざまな商品ラインナップをご用意。
あなただけの、たったひとつの特別な一邸をお届けします。'); ?></div>
			<div style="height: 1em;"></div>
			<?php
			//バナーシステム2023ver
			echo TOUSHIN_COMMON_BNR_2023('家/TOP');
			echo TOUSHIN_COMMON_BNR_2023('家/TOP-slide'); //スライダーセットアップ
			?>
		</section>

		<!--
		<div class="top_bnr_campaign">
			<a href="https://www.toshinjyuken.co.jp/kodate/news.php?id=185" target="_blank">
				<img src="images/top/bnr-sumaihaku-2025.JPG" alt="秋の住まい博2025" />
			</a>
		</div>
	-->


		<!-- *** -->
		<?php
		//NEWS読み込み
		$dir_sys_news = $kaisou . 'system/news/';
		$img_updir = $dir_sys_news . 'upload/';
		$r1 = file_get_contents($dir_sys_news . 'data/data.dat');
		$r1 = str_replace(array("\n", "\r"), '
', $r1);
		$r2 = explode('
', $r1);
		$sysdata_proto_news = $index1 = $index2 = array();
		foreach ($r2 as $k => $v) {
			$sysdata_proto_news[$k] = explode(',', $v); //コンマ区切り
			if (count($sysdata_proto_news[$k]) < 2) { //無効データ削除（PHP7.0対応）
				unset($sysdata_proto_news[$k]);
				continue;
			}
			$sysdata_proto_news[$k][0] = str_replace(array("　", " ", "	", chr(10)), '', $sysdata_proto_news[$k][0]); //IDの空白撤去
			$index1[$k] = $sysdata_proto_news[$k][0];
			$index2[$k] = strtotime($sysdata_proto_news[$k][1]);
		}
		//使用済み大容量配列削除
		unset($r1);
		unset($r2);
		//日付＞IDの順にソート
		//array_multisort($index2,SORT_DESC,SORT_NUMERIC,$index1,SORT_ASC,SORT_NUMERIC,$sysdata_proto_news);
		array_multisort($index2, SORT_DESC, SORT_NUMERIC, $index1, SORT_DESC, SORT_NUMERIC, $sysdata_proto_news);
		//print_r($sysdata_proto_news);
		?>
		<?php
		/*
<!-- *** -->
//※2024/11/27…MAP一時封印
<div class="top_map">
<div class="title W1200 Wmax100per mgnAuto bg_78A col_FFF">東新住建の家　物件MAP</div>
<?php
//print_r($sysdata_proto);
require $kaisou."temp_php/temp_map.php";
?>
<div id="map" class="textL W1200 Wmax100per mgnAuto" style="height:600px;"></div>
</div>
*/
		?>
		<script>
			$(window).load(function() {
				$('.search_btn2025 dt').on('mouseover', function() {
					if (window.matchMedia('(min-width:1000px)').matches) {
						LOCAL_SEARCH_ON(this);
					}
				});
				/*
				$('.search_btn2025 dl').on('mouseout', function(){
					if(window.matchMedia('(min-width:1000px)').matches){
						e=$(this).find('dt');
						LOCAL_SEARCH_OFF(e);
					}
				});
				*/
				$('.search_btn2025 dt').on('click', function() {
					if ($(this).hasClass('on')) {
						LOCAL_SEARCH_OFF(this);
					} else {
						LOCAL_SEARCH_ON(this);
					}
				});
				$('.search_btn2025 dd a').on('click', function() {
					window.location.href = '<?php echo $link_list['物件検索'][0]; ?>?search=' + $(this).attr('prm');
				});
			});

			function LOCAL_SEARCH_OFF(e) {
				$(e).next('dd').slideUp().queue(function() {
					$(this).stop(true, false);
					$(this).dequeue();
				});
				$(e).removeClass('on');
			}

			function LOCAL_SEARCH_ON(e) {
				n = $(e).parents('dl').index() + 1;
				n = $('.search_btn2025 dl:not(:nth-of-type(' + n + ')) dt');
				n.next('dd').slideUp().queue(function() {
					$(this).stop(true, false);
					$(this).dequeue();
				});
				n.removeClass('on');
				//console.log(n);
				$(e).next('dd').slideDown().queue(function() {
					$(this).stop(true, false);
					$(this).dequeue();
				});
				$(e).addClass('on');
			}
		</script>

		<section class="top_search">
			<h2 class="top_search__ttl">
				<span class="icon"><img src="images/common/icon-search2.svg" alt="" /></span>
				<span class="label">物件を探す</span>
			</h2>
			<div class="search_btn2025 Wbase">
				<?php
				$local_text = array();
				$local_text['arrow'] = file_get_contents($kaisou . 'images/content/search/2025/arrow-base.svg');
				foreach ($area_list_2025 as $k => $v) {
					$local_text['dt'] = ($k != 'その他') ? 'から探す' : 'の検索項目';
					echo '<dl><dt>' . $k . $local_text['dt'] . $local_text['arrow'] . '</dt><dd><div>' . PHP_EOL;
					foreach ($v as $vk => $vv) {
						$local_text['prm'] = is_array($vv) ? $vv[0] : $vv;
						if ($k == 'ブランド') {
							$img = 'images/content/search/2025/logo-' . $vv[1] . '.svg';
							if (file_exists($img)) {
								$local_text['dd'] = '<img src="' . $img . '" alt="' . $vv[0] . '">';
							} else {
								$local_text['dd'] = isset($vv['top_text']) ? $vv['top_text'] : $vv[0];
							}
						} else {
							$local_text['dd'] = $local_text['prm'];
						}
						echo '<a prm="' . $k . ',' . $local_text['prm'] . '"><div>' . $local_text['dd'] . $local_text['arrow'] . '</div></a>' . PHP_EOL;
					}
					echo '</div></dd></dl>' . PHP_EOL;
				}
				/*
<dl><dt>ccccc</dt><dd><a>aaaaa</a></dd></dl>
*/
				?>
			</div>
			<?php
			/*
<div class="btnbox num2">
<?php
foreach($area_list_num as $k => $v){
	echo EFFECT_BTN('物件検索',$v,array('class'=>'colW','jump'=>'sec'.sprintf('%02d',$k)));
}
?>
<div class="clear"></div>
</div>
<div style="height: 2em;"></div>
*/
			?>
			<div class="btnbox num1">
				<?php
				//件数カウント
				/*
$cnt=0;
foreach($sysdata_proto as $key => $sysdata){
	if(CMS_OPEN()){continue;}
	if($sysdata['soldout']>0){continue;}//完売物件は表示しない
	$cnt++;
}
*/
				//物件一覧ボタン用配列
				/*
't'=>'約'.$cnt.'プロジェクト<font class="sp_vanish dpIB" style="width:0.5em;"></font><br>すべての物件を見る'
*/
				$top_bukken_btn = array(
					't' => 'すべての物件を見る',
					'a' => array('class' => 'colO pc_br_del', 'arrow' => true)
				);
				echo EFFECT_BTN('物件検索', $top_bukken_btn['t'], $top_bukken_btn['a']);
				?>
			</div>
		</section>
		<!-- *** -->
		<?php
		echo TOUSHIN_COMMON_BNR_2023('家/TOP-map下');
		/*
<ul class="top_bnrbox_2023" style="padding: 1em;">
<li><a href="yasusa.php"><img src="images/content/yasusa/bnr-yasusa.png"></a></li>
</ul>
*/
		?>
		<!-- *** -->
		<section class="top_news">
			<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak">
				<tr>
					<td class="title font_DINOT_L">
						<div>NEWS</div>
					</td>
					<td>
						<ul>
							<?php
							$arr = array();
							foreach ($sysdata_proto_news as $key => $sysdata) {
								if (CMS_OPEN()) {
									continue;
								}
								if ($sysdata[3] != 1) {
									continue;
								}
								//print_r($sysdata[0].'@');
								CMS_DATA_REPLACE();
								//CMS_IMGSET($sysdata[0]);
								//print_r($sysdata);
								$ext = array('jpg', 'gif', 'png', 'pdf', 'xlsx', 'xls', 'doc', 'docx', 'ppt', 'pptx');
								$upf = '';
								foreach ($ext as $v) {
									$url = $img_updir . $sysdata[0] . '-0link_file.' . $v;
									//print_r($url);
									if (file_exists($url)) {
										$upf = $url;
										break;
									}
								}
								//print_r($upf);
								//$d=date('Y/n/j',strtotime($sysdata[1]));
								$d = date('Y.m.d', strtotime($sysdata[1]));
								$str = ($sysdata[11] == 1) ? '<span class="newmark">NEW!</span>' : '';
								$str .= '<span>' . $sysdata[2] . '</span>';
								switch (true) {
									case ($upf != ''):
										$str = '<a href="' . $upf . '" target="_blank" class="col_06F">' . $str . '</a>';
										break;
									case ($sysdata[4] != ''):
										$str = '<a href="' . $sysdata[4] . '"' . (($sysdata[5] == 2) ? ' target="_blank"' : '') . ' class="col_06F">' . $str . '</a>';
										break;
									case ($link_list['NEWS'][0] != ''):
										$str = '<a href="' . $link_list['NEWS'][0] . '?id=' . $sysdata[0] . '" class="col_06F">' . $str . '</a>';
										break;
									default:
										$str = '<a>' . $str . '</a>';
								}
								$arr[] = array($d, $str);
							}

							$cnt = 0;
							foreach ($arr as $v) {
								//if($v==''){continue;}
								echo '<li><table border="0" cellpadding="0" cellspacing="0"><tr>
<td class="date"><div>' . $v[0] . '</div></td>
<td>' . $v[1] . '</td>
</tr></table></li>' . chr(10);
								$cnt++;
								if ($cnt >= 5) {
									break;
								}
							}
							// href="#"
							?>
						</ul>
					</td>
				</tr>
			</table>
			<a href="<?php echo $link_list['NEWS'][0]; ?>"><img src="images/common/arrow-bottom.svg"></a>
		</section>
		<!-- *** -->
		<?php echo ANCHOR('brand'); ?>
		<section class="brand_concept2025">
			<!-- brand_concept -->
			<div>
				<div class="Wbase">
					<h2><span>BRAND CONCEPT</span></h2>
					<div class="LH200 style_br">1976年創業以来、<?php echo $top_catch_num['累計']; ?>棟超の実績を持つ東新住建。<br>多様なライフスタイルに寄り添う豊富な商品ラインナップを展開し、<br>戸建住宅の常識を超えたオンリーワンの家づくりを追求しています。</div>
					<ul class="brand_concept2025__list">
						<li>
							<div class="img">
								<img src="images/common/bottom/2025/bnr-ie.png" />
							</div>
							<div class="txt">
								<h3 class="ttl">東新住建のベーシックライン</h3>
								<div class="body">
									<p>「木の家のプロフェッショナル」として<?php echo $top_catch_num['累計']; ?>棟の実績を誇る東新住建。強さと心地よさを兼ね備えた永住品質の2×4住宅をお届けします。</p>
								</div>
								<div class="btn">
									<ul>
										<li class="brand">
											<a href="">
												<span class="label">ブランドサイト</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
										<li class="bukken">
											<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%96%E3%83%A9%E3%83%B3%E3%83%89,%E6%9D%B1%E6%96%B0%E4%BD%8F%E5%BB%BA%E3%81%AE%E5%AE%B6" target="_blank">
												<span class="label">物件一覧</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<div class="img">
								<img src="images/common/bottom/2025/bnr-hiraya.png" />
							</div>
							<div class="txt">
								<h3 class="ttl">懐かしさに包まれる、心地よい平屋</h3>
								<div class="body">
									<p>東新住建の土地力が叶えた、ゆとりある平屋。手の届く価格で、心の奥にある“懐かしさという安心”を暮らしに。人も暮らしも平屋に帰ろう。</p>
								</div>
								<div class="btn">
									<ul>
										<li class="brand">
											<a href="https://www.toshinjyuken.co.jp/hiraya/" target="_blank">
												<span class="label">ブランドサイト</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
										<li class="bukken">
											<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%96%E3%83%A9%E3%83%B3%E3%83%89,%E5%B9%B3%E5%B1%8B%E5%9B%9E%E5%B8%B0" target="_blank">
												<span class="label">物件一覧</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<div class="img">
								<img src="images/common/bottom/2025/bnr-hatsuden.png" />
							</div>
							<div class="txt">
								<h3 class="ttl">太陽光パネル標準搭載の省エネ住宅</h3>
								<div class="body">
									<p>再生可能エネルギーを活用する次世代のPV住宅。独自の4.3倍2×4工法による高い耐震性と売電収入で、家族の安心と家計のゆとりを支えます。</p>
								</div>
								<div class="btn">
									<ul>
										<li class="brand">
											<a href="https://www.toshinjyuken.co.jp/hatsuden-shelter-house/" target="_blank">
												<span class="label">ブランドサイト</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
										<li class="bukken">
											<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%96%E3%83%A9%E3%83%B3%E3%83%89,%E7%99%BA%E9%9B%BB%E3%82%B7%E3%82%A7%E3%83%AB%E3%82%BF%E3%83%BC%E3%83%8F%E3%82%A6%E3%82%B9" target="_blank">
												<span class="label">物件一覧</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<div class="img">
								<img src="images/common/bottom/2025/bnr-sodatsu.png" />
							</div>
							<div class="txt">
								<h3 class="ttl">2人くらいにちょうどいいコンパクトタイプ</h3>
								<div class="body">
									<p>誰もが気軽に「自分の家」を持てる、コンパクトな一戸建て。
										一生に一度という常識を超え、多様な暮らしに合わせて柔軟に購入・住み替えができる新しい住まいのしくみ。</p>
								</div>
								<div class="btn">
									<ul>
										<li class="brand">
											<a href="https://www.toshinjyuken.co.jp/sodatsu/" target="_blank">
												<span class="label">ブランドサイト</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
										<li class="bukken">
											<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%96%E3%83%A9%E3%83%B3%E3%83%89,%E3%81%9D%E3%81%A0%E3%81%A4%E3%83%97%E3%83%AD%E3%82%B8%E3%82%A7%E3%82%AF%E3%83%88" target="_blank">
												<span class="label">物件一覧</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<div class="img">
								<img src="images/common/bottom/2025/bnr-dup.png" />
							</div>
							<div class="txt">
								<h3 class="ttl">管理費0円。駅近戸建てマンション</h3>
								<div class="body">
									<p>たった2家族のためのプライベートな1棟2戸メゾネット。駅近のコンパクトな住まいが、手の届く価格と低コストで上質な都市生活を叶えます。</p>
								</div>
								<div class="btn">
									<ul>
										<li class="brand">
											<a href="https://www.dup-m.jp/index.php" target="_blank">
												<span class="label">ブランドサイト</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
										<li class="bukken">
											<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%96%E3%83%A9%E3%83%B3%E3%83%89,DUP%E3%83%AC%E3%82%B8%E3%83%87%E3%83%B3%E3%82%B9" target="_blank">
												<span class="label">物件一覧</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<div class="img">
								<img src="images/common/bottom/2025/bnr-alc.png" />
							</div>
							<div class="txt">
								<h3 class="ttl">ALCコンクリート外壁と木地仕上げの家</h3>
								<div class="body">
									<p>力強い外壁に、やさしい木のぬくもり。暮らしに合わせて自由にカスタマイズしながら、いつまでも住み続けられる木の家が誕生しました。 </p>
								</div>
								<div class="btn">
									<ul>
										<li class="brand">
											<a href="https://www.toshinjyuken.co.jp/new-concrete-log-house/" target="_blank">
												<span class="label">ブランドサイト</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
										<li class="bukken">
											<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%96%E3%83%A9%E3%83%B3%E3%83%89,New%E3%82%B3%E3%83%B3%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%88%E3%83%AD%E3%82%B0%E3%83%8F%E3%82%A6%E3%82%B9" target="_blank">
												<span class="label">物件一覧</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>

					<!-- teishaku -->
					<div class="teishaku">
						<div class="zonkoku1">
							<img src="images/top/zenkoku1.svg" />
							<div><span>「土地は借りて、建物だけ買う」、そんなご提案も得意です</span></div>
						</div>
						<div class="teishaku-bnr">
							<div class="img">
								<img src="images/common/bottom/2025/bnr-teishaku.png" />
							</div>
							<div class="txt">
								<h3 class="ttl">東新住建のベーシックライン</h3>
								<div class="body">
									<p>「木の家のプロフェッショナル」として24,000棟の実績を誇る東新住建。強さと心地よさを兼ね備えた永住品質の2×4住宅をお届けします。</p>
								</div>
								<div class="btn">
									<ul>
										<li class="brand">
											<a href="https://www.toshinjyuken.co.jp/teishaku-portal/" target="_blank">
												<span class="label">ブランドサイト</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
										<li class="bukken">
											<a href="https://www.toshinjyuken.co.jp/teishaku-portal/search.php" target="_blank">
												<span class="label">物件一覧</span>
												<span class="arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
														<g>
															<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
														</g>
													</svg>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- teishaku -->

				</div>
			</div>
			<!-- brand_concept -->


		</section>
		<!-- *** -->

		<section class="index-halforder">
			<div class="Wbase">
				<h2 class="index-halforder__ttl">分譲住宅に、選ぶ自由を。</h2>
				<div class="index-halforder__catch">
					東新住建の<br class="sp-only" />
					<span class="is">インテリアセレクト</span> & <br class="sp-only" /><span class="ho">ハーフオーダー</span>
				</div>
				<div class="index-halforder__body">
					<p>
						東新住建の分譲住宅では、内装や間取りが選べる「インテリアセレクト」、<br />
						さらに外観まで選べる「ハーフオーダー」で、まるで注文住宅のような仕上がりを実現。<br />
						建売の手軽さと、注文住宅のこだわりを兼ね備えた新しい選択肢で、“自分らしさ”を叶える家づくりがここにあります。
					</p>
				</div>
				<ul class="index-halforder__list">
					<li class="is">
						<div class="img">
							<img src="images/common/bottom/2025/bnr-ie-is.jpg" />
						</div>
						<div class="txt">
							<div class="btn">
								<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA,%E3%82%A4%E3%83%B3%E3%83%86%E3%83%AA%E3%82%A2%E3%82%BB%E3%83%AC%E3%82%AF%E3%83%88" target="_blank">
									<span class="label">内装デザインや間取りが選べる<br />物件はこちら</span>
									<span class="arrow">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
											<g>
												<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
											</g>
										</svg> </span></a>
							</div>
						</div>
					</li>
					<li class="ho">
						<div class="img">
							<img src="images/common/bottom/2025/bnr-ie-ho.jpg" />
						</div>
						<div class="txt">
							<div class="btn">
								<a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA,%E3%83%8F%E3%83%BC%E3%83%95%E3%82%AA%E3%83%BC%E3%83%80%E3%83%BC" target="_blank">
									<span class="label">外観と内装の両方が選べる<br />物件はこちら</span>
									<span class="arrow">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.683 4.552">
											<g>
												<polyline class="cls-1" points="0 4.152 15.269 4.152 9.07 .341" />
											</g>
										</svg> </span></a>
							</div>
						</div>
					</li>
				</ul>
				<div class="index-halforder__bnr">
					<a href="./bunjo-halforder.php" target="_blank">
						<div class="img">
							<img class="pc-only" src="images/common/bottom/2025/bnr-ie-isho-img.jpg" />
							<img class="sp-only" src="images/common/bottom/2025/sp/bnr-ie-isho-img.jpg" />
						</div>
						<div class="pos-a">
							<div class="badge">
								<img src="images/common/bottom/2025/bnr-ie-isho-badge.svg" alt="" />
							</div>
							<div class="txt">
								<img class="pc-only" src="images/common/bottom/2025/bnr-ie-isho-txt.svg" alt="インテリアセレクト、ハーフオーダーについて詳しくはこちら" />
								<img class="sp-only" src="images/common/bottom/2025/sp/bnr-ie-isho-txt.svg" alt="インテリアセレクト、ハーフオーダーについて詳しくはこちら" />
							</div>
						</div>
					</a>
				</div>
			</div>
		</section>

		<div class="index-bottombnr">
			<div class="Wbase">
				<ul class="index-bottombnr__list">
					<li class="index-bottombnr__item">
						<a href="structure.php">
							<div class="img">
								<img src="images/top/bnr/bnr-structure.jpg" alt="" />
							</div>
							<div class="txt">
								<span class="line-1">耐震性能と環境性能に優れた木造住宅</span>
								<span class="line-2"><span>東新住建の家づくり</span></span>
							</div>
						</a>
					</li>
					<li class="index-bottombnr__item">
						<a href="qa.php">
							<div class="img">
								<img src="images/top/bnr/bnr-qa.jpg" alt="" />
							</div>
							<div class="txt">
								<span class="line-1">購入にあたってのよくあるご質問</span>
								<span class="line-2"><span>Q & A</span></span>
							</div>
						</a>
					</li>
					<li class="index-bottombnr__item">
						<a href="voice.php">
							<div class="img">
								<img src="images/top/bnr/bnr-voice.jpg" alt="" />
							</div>
							<div class="txt">
								<span class="line-1">実際にお住まいのオーナー様の喜びの声</span>
								<span class="line-2"><span>お客様の声</span></span>
							</div>
						</a>
					</li>
					<li class="index-bottombnr__item">
						<a href="sdgs.php">
							<div class="img">
								<img src="images/top/bnr/bnr-sdgs.jpg" alt="" />
							</div>
							<div class="txt">
								<span class="line-1">省エネルギーの循環型社会の実現に向けて</span>
								<span class="line-2"><span>SDGsへの取り組み</span></span>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<!-- *** -->
		<div class="top_catch top_lifestyletips">
			<h3 class="fontP200 sp_fontP170 LH150 font_thin col_F30" style="letter-spacing: 0.1em; margin-left: 0.1em;">LIFESTYLE TIPS</h3>
			<div class="LH200 pc_div_del" style="margin-bottom: 3em;">新生活に向けての物件選びや暮らしに役立つ情報をお届けします</div>
			<?php
			//LIFESTYLE読み込み
			$dir_sys_life = $kaisou . 'system/life/';

			$r1 = file_get_contents($dir_sys_life . 'data/data.dat');
			$r1 = str_replace(array("\n", "\r"), '
', $r1);
			$r2 = explode('
', $r1);
			$sysdata_proto_life = $index1 = $index2 = array();
			foreach ($r2 as $k => $v) {
				$sysdata_proto_life[$k] = explode(',', $v); //コンマ区切り
				if (count($sysdata_proto_life[$k]) < 2) { //無効データ削除（PHP7.0対応）
					unset($sysdata_proto_life[$k]);
					continue;
				}
				$sysdata_proto_life[$k][0] = str_replace(array("　", " ", "	", chr(10)), '', $sysdata_proto_life[$k][0]); //IDの空白撤去
				$index1[$k] = $sysdata_proto_life[$k][0];
				$index2[$k] = strtotime($sysdata_proto_life[$k][1]);
			}
			//日付＞IDの順にソート
			//array_multisort($index2,SORT_DESC,SORT_NUMERIC,$index1,SORT_ASC,SORT_NUMERIC,$sysdata_proto_life);
			array_multisort($index2, SORT_DESC, SORT_NUMERIC, $index1, SORT_DESC, SORT_NUMERIC, $sysdata_proto_life);

			$img_updir = $dir_sys_life . 'upload/';

			//print_r($sysdata_proto_life);
			?>
			<div class="Wmax100per mgnAuto fontP075 sp_fontP100" style="width:890px;">
				<ul class="LS_list">
					<?php
					$cnt = 1;
					foreach ($sysdata_proto_life as $key => $sysdata) {
						if (CMS_OPEN()) {
							continue;
						}
						//一部データ配列化
						CMS_DATA_REPLACE();
						CMS_IMGSET($sysdata[0], array('upfile' => 'life'));
						//print_r($sysdata);
						if (!is_array($sysdata[6])) {
							$sysdata[6] = array($sysdata[6], '');
						}
						$text = ($sysdata[6][1] != '') ? $sysdata[6][1] : $sysdata[6][0];
						echo '<li><a href="' . $link_list['ライフスタイル'][0] . '?id=' . $sysdata[0] . $t_blank . '"><img src="images/common/clear-W380H170.png" class="W100per bg_cover" style="background-image: url(' . $sysdata['upfile'][0] . ');"><div class="pad">' . $text . '<div class="title">' . $sysdata[2] . '</div></div></a></li>';
						$cnt++;
						if ($cnt > 6) {
							break;
						}
					}
					?>
					<div class="clear"></div>
				</ul>
			</div>
			<div class="Wmax100per" style="width: 16em; padding-top:4em;"><?php echo EFFECT_BTN('ライフスタイル', 'すべての記事', array('class' => 'W100per textL', 'arrow' => true, 'blank' => true)); ?></div>
		</div>
		<!-- *** -->


		<div class="footer-contact">
			<div class="footer-contact-flex">
				<div class="tel">
					<div class="txt">お電話でのお問い合わせはこちら</div>
					<div class="number">
						<a href="tel:0800-170-5104"><img src="images/top/bnr/bnr-tel-gray.svg" /></a>
					</div>
					<div class="time">営業時間／10:00～18:00　定休日／水曜日</div>
				</div>
				<div class="line">
					<div class="txt">LINEでのお問合せはこちら</div>
					<div class="bnr">
						<a href="https://lin.ee/v4vz5KD" target="_blank">
							<img src="images/contact/line-bnr.svg" alt="LINE公式アカウント" />
						</a>
					</div>
				</div>
			</div>

			<div class="top_search">
				<div class="btnbox num1">
					<a href="contact.php" class="btn_bgLtoR colO pc_br_del">
						<div>
							<span>資料請求・お問い合わせ</span><svg xmlns="http://www.w3.org/2000/svg" class="arrow-btn" viewBox="0 0 21.77 11.86">
								<defs>
									<style>
										.arrow-btn_1,
										.arrow-btn_2 {
											fill: none;
										}

										.arrow-btn_1 {
											stroke-miterlimit: 10;
										}
									</style>
								</defs>
								<polyline class="arrow-btn_1" points="0 5.43 20 5.43 11.88 0.43" />
								<rect class="arrow-btn_2" width="21.77" height="11.86" />
							</svg>
						</div>
					</a>
				</div>
			</div>
		</div>

		<!-- ** -->
		<?php echo $temp_footer; ?>
		<!-- * -->
	</div>
	<?php
	//ログインボックス
	require $kaisou . "temp_php/temp_loginbox.php";
	?>
	<?php echo $temp_bodyend; ?>
	<?php
	/*
//※2024/11/27…MAP一時封印
<script>
var markerData = [<?php echo $mapset; ?>];
var zoom=10;
var center_lat=<?php echo $map_center_lat; ?>;
var center_lng=<?php echo $map_center_lng; ?>;
</script>
<?php echo $temp_googlemap_js; ?>
*/
	?>
</body>

</html>