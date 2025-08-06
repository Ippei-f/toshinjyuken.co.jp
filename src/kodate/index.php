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
		<div class="top_mainpic ver2024">
			<img src="images/top/bg-mainpic-2024.jpg">
			<img src="images/top/bg-mainpic-catch-2023.svg" class="sp_vanish">
			<img src="images/top/bg-mainpic-catch-2023-sp.svg" class="pc_vanish">
		</div>
		<?php
		/*
<div class="top_sdgs"><div>
<div><a href="<?php echo $link_list['SDGs'][0]; ?>"><img src="images/top/bnr/bnr-sdgs.svg" style="width:350px;"></a></div>
</div></div>
*/
		?>
		<!-- *** -->
		<section class="top_catch bg_FFF_gray">
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

		<div class="top_bnr_50th">
			<a href="https://www.toshinjyuken.co.jp/kodate/news.php?id=177" target="_blank">
				<img src="images/top/bnr-50th-1.jpg" alt="おかげさま来年7月で50周年カウントダウンフェア" />
			</a>
		</div>


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
					<div class="LH200 style_br">東新住建は1976年の創業以来、累計<?php echo $top_catch_num['累計']; ?>棟を超える豊富な実績から得た企業力をもとに、
						従来のファミリー層向け住宅だけではなく
						多様化するライフスタイルや家族構成に寄り添うさまざまな商品ラインナップをご用意。
						私たちは、他の住宅メーカーが取り組んだことのない、戸建住宅の常識を超えたオンリーワン事業を展開しています。</div>
					<dl class="brand_list">
						<?php
						$arr = array(
							'家' => array(
								'bnr' => 'ie',
								'text' => '「木の家のプロフェッショナル」として累計' . $top_catch_num['累計'] . '棟の住まいを手がける東新住建。自然が持つ無限大の可能性を引き出し、強さと心地よさを両立させた永住品質にこだわり、地震に強い木造2×4住宅をお届けするとともに、豊かな自然を未来へ引き継ぐ環境共生住宅の普及を行っています。',
								'pagelink' => array($link_list['家づくり'][0], '東新住建の家づくり'),
								'brand' => 99
							)
						);
						$arr += $link_list_brand_concept;
						$k = 'テイシャク';
						$arr2 = $arr[$k];
						$arr2['name'] = $k;
						unset($arr[$k]);
						foreach ($arr as $k => $v) {
							$url = array();
							$url[] = isset($link_list['東新住建-' . $k]) ? $link_list['東新住建-' . $k][0] : '';
							switch (true) {
								case isset($v['search']):
									$url[] = str_replace($t_blank, $v['search'] . $t_blank, $url[0]) . '" rel="noopener noreferrer';
									break;
								case isset($v['brand']):
									//$url[]='search.php?brand='.$v['brand'];
									$url[] = 'search.php?search=ブランド,' . $area_list_2025['ブランド'][$v['brand']][0];
									break;
								default:
									$url[] = '';
							}
							if ($url[1] != '') {
								$url[1] = '<a href="' . $url[1] . '" class="btn_bgLtoR"><div><span>物件一覧<img src="images/common/arrow-btn.svg"></span></div></a>';
							}
							if (isset($v['pagelink'])) {
								$url[2] = '<a href="' . $v['pagelink'][0] . '" class="btn_bgLtoR"><div><span>' . $v['pagelink'][1] . '<img src="images/common/arrow-btn.svg"></span></div></a>';
							} else {
								$url[2] = '<a href="' . $url[0] . '" rel="noopener noreferrer" class="btn_bgLtoR"><div><span>ブランドサイト<img src="images/common/arrow-btn.svg"></span></div></a>';
							}
							echo '<dd>
<a href="' . $url[0] . '" rel="noopener noreferrer" class="photo"><img src="images/common/bottom/2025/bnr-' . $v['bnr'] . '.png"></a>
<div class="text style_br">' . $v['text'] . '</div>
<div class="link">
' . $url[2] . '
' . $url[1] . '
</div>
</dd>' . PHP_EOL;
						}
						?>
					</dl>
				</div>
			</div>
			<!-- brand_concept -->
			<div class="halforder">
				<div class="Wbase">
					<h2>分譲住宅に、選ぶ自由を。</h2>
					<div class="catch">東新住建の「ハーフオーダー」&amp;「インテリアセレクト」</div>
					<dl class="brand_list">
						<?php
						$arr = array(
							'ハーフオーダー'		=> array(
								'bnr' => 'ie-ho',
								'text' => '「追加費用なし」で「外観」と「インテリア」をセレクト！
25通りの組み合わせから、好みのスタイルをお選びいただけます。注文住宅のような自由度と分譲住宅のパフォーマンス性の高さ、両方を兼ね備えた「いいとこどり」の住まいを、手の届きやすい価格でお届けします。',
								'pagelink' => array('https://www.toshinjyuken.co.jp/hiraya/lp-harforder/', '詳しくはこちら'),
								'phase' => 3
							),
							'インテリアセレクト' => array(
								'bnr' => 'ie-is',
								'text' => '毎日の暮らしを彩る内観デザインを自分らしくセレクト。外観や間取りはプロにお任せなので安心 。
お好きなインテリアスタイルからお選びいただくだけで理想のお住まいがカタチになります。',
								'phase' => 4
							)
						);
						foreach ($arr as $k => $v) {
							$url = array();
							$url[] = 'search.php?search=フェーズ,' . $area_list_2025['フェーズ'][$v['phase']];
							$url[1] = '<a href="' . $url[0] . '" class="btn_bgLtoR"><div><span>物件一覧<img src="images/common/arrow-btn.svg"></span></div></a>';
							$url[2] = isset($v['pagelink']) ? '<a href="' . $v['pagelink'][0] . $t_blank . '" rel="noopener noreferrer" class="btn_bgLtoR"><div><span>' . $v['pagelink'][1] . '<img src="images/common/arrow-btn.svg"></span></div></a>' : '';
							echo '<dd>
<a href="' . $url[0] . '" class="photo"><img src="images/common/bottom/2025/bnr-' . $v['bnr'] . '.jpg"></a>
<h3 class="text">' . $k . '</h3>
<div class="text style_br">' . $v['text'] . '</div>
<div class="link">
' . $url[2] . '
' . $url[1] . '
</div>
</dd>' . PHP_EOL;
						}
						?>
					</dl>

				</div>
			</div>
			<!-- brand_concept -->
			<div class="teishaku">
				<div class="Wbase">
					<div class="zonkoku1"><img src="images/top/zenkoku1.svg">
						<div><span>土地は持たずに平屋を買う</span><span>“テイシャク”という第3の選択肢</span></div>
					</div>
					<dl class="brand_list">
						<?php
						$v = $arr2;
						$url = array();
						$url[] = $link_list['東新住建-' . $v['name']][0];
						$url[] = isset($v['search'])
							? '<a href="' . str_replace($t_blank, $v['search'] . $t_blank, $url[0]) . '" rel="noopener noreferrer" class="btn_bgLtoR"><div><span>物件一覧<img src="images/common/arrow-btn.svg"></span></div></a>'
							: '';
						echo '<dd><a href="' . $url[0] . '" class="photo"><img src="images/common/bottom/2025/bnr-' . $v['bnr'] . '.png"></a></dd>
<dd class="w510">
<div class="text style_br">' . $v['text'] . '</div>
<div class="link">
<a href="' . $url[0] . '" rel="noopener noreferrer" class="btn_bgLtoR"><div><span>ブランドサイト<img src="images/common/arrow-btn.svg"></span></div></a>
' . $url[1] . '
</div>
</dd>' . PHP_EOL;
						?>
					</dl>
				</div>
			</div>
			<!-- brand_concept -->
		</section>
		<!-- *** -->
		<div class="top_menu">
			<div class="dark">
				<div class="pad bnr1">
					<?php
					$arr = array(
						'家づくり'
						//'コンセプト'
						//,'施工事例'
						//,'お客様の声'
						,
						'SDGs',
						'Q&A'
					);
					foreach ($arr as $v) {
						$a = $link_list[$v];
						if (empty($a['en'])) {
							$a['en'] = $a[1];
						}
						if (empty($a['jp'])) {
							$a['jp'] = $a[1];
						}
						$first = substr($a['en'], 0, 1);
						$second = substr($a['en'], 1);
						$a['en'] = '<b>' . $first . '</b>' . $second;
						echo '<a href="' . $a[0] . '" class="btn_textLtoC"><div>
<div><span class="font_DINOT_L first_' . $first . '">' . $a['en'] . '</span></div>
<div><span>' . $a['jp'] . '</span></div>
</div><div class="arrow"><img src="images/top/arrow-topbnr.svg"></div></a>' . chr(10);
					}
					?>
				</div>
				<div class="pad bnr2"><a href="<?php echo $link_list['お客様の声'][0]; ?>" alt="お客様の声" class="vanish_branch">
						<img src="images/top/bnr/bnr-voice2025-pc.svg">
						<div class="bnr_photo sp_vanish">
							<img src="images/top/bnr/bnr-voice2025-p1-pc.jpg">
							<img src="images/top/bnr/bnr-voice2025-p2-pc.jpg">
							<img src="images/top/bnr/bnr-voice2025-p3-pc.jpg">
							<img src="images/top/bnr/bnr-voice2025-p4-pc.jpg">
							<img src="images/top/bnr/bnr-voice2025-p5-pc.jpg">
							<img src="images/top/bnr/bnr-voice2025-p6-pc.jpg">
						</div>
						<img src="images/top/bnr/bnr-voice2025-sp.jpg">
					</a></div>
			</div>
		</div>
		<!-- *** -->
		<div class="top_search" style="padding-bottom: 5em;">
			<div class="btnbox num1">
				<?php
				echo EFFECT_BTN('物件検索', $top_bukken_btn['t'], $top_bukken_btn['a']);
				?>
			</div>
		</div>
		<!-- *** -->
		<div class="bg_FFF_gray" style="padding-bottom: 2.5em;"></div>
		<div class="top_slide bg_FFF_gray">
			<div class="wideslider borderbox">
				<ul class="ws">
					<?php
					$str = '';
					$cnt = 0;
					foreach ($top_slide_arr as $k => $v) {
						$flag = true;
						if (isset($v['date'])) {
							$now = date($v['date']);
							//開始日判定
							if (isset($v['s'])) {
								if ($now < $v['s']) {
									$flag = false;
								}
							}
							//終了日判定
							if (isset($v['e'])) {
								if ($now >= $v['e']) {
									$flag = false;
								}
							}
						}
						if ($flag) {
							if ($v['url'] != '') {
								if (strpos($v['url'], '@') !== false) {
									$v['url'] = str_replace('@', $kaisou, $v['url']);
								}
								if (strpos($v['url'], '://') !== false) {
									$v['url'] .= '" target="_blank';
								}
								$v['url'] = ' href="' . $v['url'] . '"';
							}
							if (strpos($v['bnr'], '@') !== false) {
								$v['bnr'] = str_replace('@', $kaisou, $v['bnr']);
							} else {
								$v['bnr'] = $toushin_bnr_url . 'bnr/' . $v['bnr'];
							}
							$str .= '<li class="ws"><img src="images/common/clear.png" class="base"/><a' . $v['url'] . ' class="box"><img src="' . $v['bnr'] . '"></a></li>' . chr(10);
							$cnt++;
						}
					}
					switch (true) {
						case ($cnt < 2):
							$res = $str . $str . $str . $str;
							break;
						case ($cnt < 3):
							$res = $str . $str;
							break;
						default:
							$res = $str;
					}
					echo $res;
					?>
				</ul>
			</div>
		</div>
		<!-- *** -->
		<div class="top_catch">
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
		<style>
			.top_bnr_tel_line {
				padding: 30px 50px;
				background-color: #E9EDF0;
				display: flex;
				flex-direction: column;
				align-items: center;
			}

			.top_bnr_tel_line>* {
				max-width: 100%;
			}

			.top_bnr_tel_line a {
				display: block;
			}

			.top_bnr_tel_line a img {
				width: 100%;
			}

			.top_bnr_tel_line>.top_search {
				padding: 0;
				width: 100%;
			}

			.top_bnr_tel_line .tt {
				font-size: min(25px, max(20px, 2.5vw));
				font-weight: 700;
				line-height: 1em;
				margin: 1em 0;
			}

			.top_bnr_tel_line .tel {
				width: min(395px, max(351px, calc(1vw * 351 / 3.75)));
				text-align: right;
				font-size: min(13px, max(11px, 1.3vw));
				line-height: 1.5em;
				margin-bottom: 1em;
			}

			.top_bnr_tel_line .line {
				width: min(375px, max(325px, calc(1vw * 325 / 3.75)));
			}

			@media screen and (max-width: 999px) {
				.top_bnr_tel_line {
					padding: 30px 1em;
				}
			}
		</style>
		<div class="top_bnr_tel_line">
			<div class="top_search">
				<div class="btnbox num1">
					<?php
					echo EFFECT_BTN('お問い合わせ', '資料請求・お問い合わせ', array('class' => 'colO pc_br_del', 'arrow' => true));
					/*
<a href="<?php echo $link_list['会員登録'][0]; ?>"><img src="images/top/bnr/bnr1.png"></a>
*/
					?>
				</div>
			</div>
			<div class="tt">電話・LINEでの<br class="pc_vanish">資料請求・お問い合わせはこちら</div>
			<div class="tel"><a href="tel:0800-170-5104"><img src="images/top/bnr/bnr-tel.svg"></a>営業時間／10:00～18:00　定休日／水曜日</div>
			<div class="line"><a href="https://lin.ee/v4vz5KD" target="_blank"><img src="images/top/bnr/bnr-line.svg"></a></div>
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