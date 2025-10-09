<?php
$p_type = 'content';
$kaisou = '';
$dir = $kaisou . 'images/content/xxxx/';
$p_title = '物件検索';
require $kaisou . "temp_php/basic.php";

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
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/top.css" rel="stylesheet" type="text/css">
	<link href="css/search2025.css<?php echo $rand; ?>" rel="stylesheet" type="text/css">
	<?php
	//バナーシステム2023年度ver読み込み
	$toushin_bnr_url = $kaisou . '../recaptcha/';
	require $toushin_bnr_url . 'func-common-bnr-setup2023.php';
	?>
	<?php echo $temp_java; ?>
</head>

<body class="borderbox">
	<?php echo $temp_pagetop; ?>
	<div align="center">
		<!-- * -->
		<?php echo $temp_header; ?>
		<!-- ** -->
		<?php echo PAN(array($p_title)); ?>
		<?php echo PAGE_TITLE($p_title); ?>
		<div class="sp_vanish" style="margin-top: -2em;"></div>
		<?php
		//バナーシステム2023ver
		echo TOUSHIN_COMMON_BNR_2023('家/物件一覧');
		/*
<div class="pc_br_del fontP175 sp_fontP100 LH150">新着物件ぞくぞく完成！<br>東新住建の新築一戸建て</div>
*/
		?>
		<!-- map -->
		<?php
		/*
//※2024/11/27…MAP一時封印
<div class="top_map">
<div class="title W1200 Wmax100per mgnAuto bg_78A col_FFF">東新住建の家　物件MAP</div>
<?php
require $kaisou."temp_php/temp_map.php";
?>
<div id="map" class="textL W1200 Wmax100per mgnAuto" style="height:600px;"></div>
</div>
*/
		?>
		<!-- map -->
		<div class="sp_vanish" style="height:2em;"></div>
		<div class="pc_vanish" style="height:1.5em;"></div>
		<!-- *** -->
		<main class="search_list2025">
			<div class="Wbase">
				<section class="inner">
					<?php
					if (isset($_GET['search'])) {
						$_REQUEST['submit_search'] = true;
						$a = explode('｜', $_GET['search']);
						if (!is_array($a)) {
							$a = array($a);
						}
						foreach ($a as $v) {
							$v = explode(',', $v);
							switch ($v[0]) {
								case 'エリア':
									$_REQUEST['エリア'] = array($v[1] . '-全選択');
									break;
								default:
									$_REQUEST[$v[0]] = array($v[1]);
							}
						}
						//print_r($a);
					}
					if (isset($_GET['brand'])) {
						$a = explode(',', trim($_GET['brand']));
						if (!is_array($a)) {
							$a = array($a);
						}
						$b = array();
						foreach ($a as $v) {
							$b[] = $area_list_2025['ブランド'][$v][0];
						}
						$_REQUEST['ブランド'] = $b;
					}
					$search_res = array();
					if (isset($_REQUEST['submit_search'])) {
						//print_r($_REQUEST);
						if (isset($_REQUEST['エリア'])) {
							$arr = $_REQUEST['エリア'];
							$search_res['エリア'] = explode('-', $arr[0]);
							$search_res['エリア'][1] = array($search_res['エリア'][1]);
							unset($arr[0]);
							foreach ($arr as $v) {
								$search_res['エリア'][1][] = str_replace($search_res['エリア'][0] . '-', '', $v);
							}
						}
						$arr = array('ブランド', 'フェーズ', 'その他');
						foreach ($arr as $v) {
							$search_res[$v] = isset($_REQUEST[$v]) ? $_REQUEST[$v] : array();
						}
						//print_r($search_res);
					}
					$sysdata_pu = array();
					$area_cnt = array(); //エリアカウント（2025/06/13追加
					foreach ($sysdata_proto as $key => $sysdata) {
						if (CMS_OPEN()) {
							continue;
						}
						CMS_DATA_REPLACE();
						/*
	echo '<!-- ';
	print_r($sysdata[23]);
	echo ' -->';
	*/
						if (!is_array($sysdata[23])) {
							$sysdata[23] = array(trim($sysdata[23]));
						}
						if (isset($_REQUEST['ブランド'])) {
							$check = '｜' . implode('｜', $_REQUEST['ブランド']) . '｜';
							$flag = true;
							foreach ($sysdata[23] as $v) {
								if (strpos($check, $area_list_2025['ブランド'][$v][0]) !== false) {
									$flag = false;
									break;
								}
							}
							if ($flag) {
								continue;
							}
							//if(strpos($check,$area_list_2025['ブランド'][$sysdata[23]][0])===false){continue;}
						}

						if (!is_array($sysdata[3])) {
							$sysdata[3] = array(trim($sysdata[3]));
						}
						if (isset($_REQUEST['フェーズ'])) {
							//OR検索（1つでも条件を満たせばtrue）
							$check = '｜' . implode('｜', $_REQUEST['フェーズ']) . '｜';
							$flag = true;
							foreach ($sysdata[3] as $v) {
								if (strpos($check, $area_list_2025['フェーズ'][$v]) !== false) {
									$flag = false;
									break;
								}
							}
							if ($flag) {
								continue;
							}
							//if(strpos($check,$area_list_2025['フェーズ'][$sysdata[3]])===false){continue;}
						}
						if (isset($_REQUEST['その他'])) {
							$check = '｜' . implode('｜', $_REQUEST['その他']) . '｜';
							if (!is_array($sysdata[24])) {
								$sysdata[24] = array(trim($sysdata[24]));
							}
							$flag = true;
							foreach ($sysdata[24] as $v) {
								if (strpos($check, $area_list_2025['その他'][$v]) !== false) {
									$flag = false;
									break;
								}
							}
							if ($flag) {
								continue;
							}
						}
						$a = array();
						$a['日付'] = $sysdata[1]; //日付
						$a['タイトル'] = $sysdata[2]; //タイトル
						$a['ブランド'] = $sysdata[23];
						$a['フェーズ'] = $sysdata[3];
						$a['その他カテゴリ'] = $sysdata[24];
						$a['所在地']['略'] = $sysdata[6][0]; //所在地簡略
						//所在地・交通
						$sysdata[6][3] = explode('<br />', $sysdata[6][3]);
						$k = '';
						foreach ($sysdata[6][3] as $v) {
							$v = explode('　', $v);
							$v[0] = trim($v[0]);
							if (trim($v[0]) != '') {
								if ($k == '交通') {
									break;
								}
								$k = $v[0];
							}
							switch ($v[0]) {
								case '所在地':
								case '住所':
									$a['所在地']['正'] = $v[1];
									break;
								case '交通':
									$a['交通'][] = $v[1];
							}
						}
						if (empty($a['交通']) && (trim($sysdata[6][1]) != '')) {
							$a['交通'][] = trim($sysdata[6][1]);
						}
						$a['タイプ'] = $sysdata[9]; //タイプ面積・価格
						//print_r($a['タイプ']);
						//$a['エリア']['旧']=$sysdata[17];//旧エリア

						//専用サムネイルを読み込む
						$a['写真'] = glob('system/search/upload-resize/order' . $sysdata[0] . '.*');
						$a['写真'] = !empty($a['写真']) ? $a['写真'][0] : '';

						//CMS_IMGSET($sysdata[0],array('fn'=>'order','s'=>false));
						//$a['写真']=file_exists($sysdata['order-num'][4])?$sysdata['order-num'][4]:$sysdata['order'][0];//写真

						$area_db = $area_list_2025['エリア'][$sysdata[17]];
						//エリア番号そのまま取得及びサブエリア判別
						$area_num = $sysdata[17];
						$check = implode('｜', $a['所在地']);
						//print_r($sysdata[18]);
						if (!empty($sysdata[18]) && (strpos($sysdata[18], '※') === false)) {
							//サブエリア指定あり
							$a['サブエリア'] = $sysdata[18];
						} else {
							//サブエリア指定無し
							foreach ($area_db[1] as $v) {
								if (strpos($check, $v) !== false) {
									$a['サブエリア'] = $v;
									break;
								}
							}
						}

						//エリアカウント
						$v = isset($a['サブエリア']) ? $a['サブエリア'] : '-';
						if (!isset($area_cnt[$area_db[0]][$v])) {
							$area_cnt[$area_db[0]][$v] = 0;
						}
						$area_cnt[$area_db[0]][$v]++;

						if (isset($_REQUEST['エリア'])) {
							//エリア・サブエリア絞り込み
							if (strpos($_REQUEST['エリア'][0], $area_db[0]) === false) {
								continue;
							} //エリア外は除外
							if (strpos($_REQUEST['エリア'][0], '全選択') === false) {
								if (!isset($a['サブエリア'])) {
									continue;
								} //サブエリア無しは除外
								$check = '｜' . implode('｜', $_REQUEST['エリア']) . '｜';
								if (strpos($check, $a['サブエリア']) === false) {
									continue;
								} //サブエリア外も除外
							}
						}
						$sysdata_pu[$area_num][$sysdata[0]] = $a;
					}
					//print_r($sysdata_pu);
					//print_r($area_cnt);

					//物件リスト出力
					foreach ($area_list_2025['エリア'] as $k => $v) {
						$data = array();
						if (isset($sysdata_pu[$k]) && !empty($sysdata_pu[$k])) {
							$data[$v[0]] = $sysdata_pu[$k];
						}
						unset($sysdata_pu[$k]);

						/*
	echo '<!-- ';
	print_r($_REQUEST);
	print_r($data);
	echo ' -->';
	*/
						foreach ($data as $k2 => $v2) {
							echo '<div class="area_title"><h2>' . $k2 . '</h2></div>
<ul>' . PHP_EOL;
							foreach ($v2 as $k3 => $v3) {
								$class = array();
								$v3['写真'] = file_exists($v3['写真']) ? '<img src="' . $v3['写真'] . '" class="photo" loading="lazy">' : '';
								$class['p'] = $v3['写真'] != '' ? '' : ' noimg';
								switch (true) {
									case !empty($v3['所在地']['略']):
										$v3['所在地'] = str_replace(' ', '', $v3['所在地']['略']);
										break;
									case isset($v3['所在地']['正']):
										$v3['所在地'] = $v3['所在地']['正'];
										break;
									default:
										$v3['所在地'] = '';
								}
								$v3['交通'] = isset($v3['交通']) ? '<div>' . implode('</div><div>', $v3['交通']) . '</div>' : '';
								$a = array();
								$max = count($v3['タイプ']);
								for ($i = 0; $i < $max; $i += 4) {
									$b = array();
									$b[] = $v3['タイプ'][$i];
									$b[] = $v3['タイプ'][$i + 2];
									if ($b[0] == '') {
										continue;
									} //タイプ不明はパスする
									if ($b[1] == '') {
										continue;
									} //価格無しもパス
									//if($b[0]==''){$b[0]='Atype';}
									//$v3['タイプ'][$n[1]]=str_replace(',','',$v3['タイプ'][$n[1]]);
									if (is_numeric($b[1])) {
										$b[1] = number_format($b[1]);
									}
									if ($b[1] != '') {
										$b[1] .= '万円';
									}
									$a[] = $b[0] . '：' . $b[1];
								}
								$v3['タイプ'] = !empty($a) ? '<div class="type"><span>' . implode('</span><span>', $a) . '</span></div>' : '';

								$t = '';
								if (!empty($v3['ブランド'])) {
									$check = isset($_REQUEST['ブランド']) ? '｜' . implode('｜', $_REQUEST['ブランド']) . '｜' : '';
									foreach ($v3['ブランド'] as $v4) {
										if ($check != '') {
											//ブランド検索がある場合は検索外のブランドを非表示にする
											if (strpos($check, $area_list_2025['ブランド'][$v4][0]) === false) {
												continue;
											}
										}
										if (isset($area_list_2025['ブランド'][$v4])) { /* &&($v4!=99) */
											$str = $area_list_2025['ブランド'][$v4];
											$str['col'] = isset($str['col']) ? ' style="background-color:' . $str['col'] . '"' : '';
											/*
						$str['link']=isset($str['link'])?' href="'.$link_list['東新住建-'.$str['link']][0].'"':'';
						'.$str['link'].'
						*/
											$t .= '<a class="b1"' . $str['col'] . '><span>' . $str[0] . '</span></a>';
										}
									}
								}
								$v3['ブランド'] = $t;

								$phase2025 = array();
								$phase2025['P'] = $phase2025['T'] = '';
								//print_r($v3['フェーズ']);
								if (!empty($v3['フェーズ'])) {
									$check = '｜' . implode('｜', $v3['フェーズ']) . '｜';
									switch (true) {
										case strpos($check, '｜1｜') !== false: //完成済み
											$phase2025['P'] = 1;
											break;
										case strpos($check, '｜2｜') !== false: //建設中
											$phase2025['P'] = 2;
											break;
										default:
											$phase2025['P'] = '-kengaku';
									}
									$phase2025['P'] = '<img src="images/content/search/2025/phase' . $phase2025['P'] . '.svg" class="add">';
								}
								if (strpos($check, '｜3｜') !== false) {
									$phase2025['T'] .= '<div class="b2">' . $area_list_2025['フェーズ'][3] . '</div>';
								}
								if (strpos($check, '｜4｜') !== false) {
									$phase2025['T'] .= '<div class="b2">' . $area_list_2025['フェーズ'][4] . '</div>';
								}
								/*
			switch($v3['フェーズ'][0]){
				case 1:
				case 2:
				//$phase2025['P']='<img src="images/content/search/2025/phase'.$v3['フェーズ'][0].'.svg" class="add">';
				break;
				case 3:
				case 4:
				$phase2025['T']='<div class="b2">'.$area_list_2025['フェーズ'][$v3['フェーズ'][0]].'</div>';
				$phase2025['P']='<img src="images/content/search/2025/phase-kengaku.svg" class="add">';
				break;
			}
			*/
								//print_r($v3['その他カテゴリ']);
								$t = $login_window = ''; //ログインチェックは先行情報がついているものに変更（2025/05/19~
								if (!empty($v3['その他カテゴリ'])) {
									if (!is_array($v3['その他カテゴリ'])) {
										$v3['その他カテゴリ'] = array($v3['その他カテゴリ']);
									}
									foreach ($v3['その他カテゴリ'] as $v4) {
										//print_r($area_list_2025['その他'][$v4]);
										if (isset($area_list_2025['その他'][$v4])) {
											$str = $area_list_2025['その他'][$v4];
											if ($str == '先行情報' && !isset($_SESSION['member'])) {
												$login_window = ' class="login_window" onclick="return false;"';
												$phase2025['P'] = '<img src="images/content/search/2025/phase-member.svg" class="add">'; //先行情報がついていれば専用のサムネイルに優先される
												$v3['写真'] = ''; //写真非公開
												$v3['ブランド'] = $phase2025['T'] = ''; //ブランド・フェーズアイコン非表示
												$v3['タイプ'] = ''; //価格非表示
												$t = ''; //その他カテゴリ非表示
												break; //その他カテゴリアイコン処理の強制終了
											} else {
												$t .= '<div>' . $str . '</div>'; //先行情報の場合はアイコンを表示しない
											}
										}
									}
								}
								$v3['その他カテゴリ'] = (!empty($t)) ? '<div class="other">' . $t . '</div>' : '';
								$v3['ブランド'] .= $phase2025['T'];
								if (!empty($v3['ブランド'])) {
									$v3['ブランド'] = '<div class="brand">' . $v3['ブランド'] . '</div>';
								}

								echo '<li>
<div class="p' . $class['p'] . '"><a href="' . $link_list['物件詳細'][0] . '?id=' . $k3 . '"' . $login_window . '>' . $v3['写真'] . $phase2025['P'] . '</a></div>
<div class="t">
' . $v3['ブランド'] . '
<h3>' . $v3['タイトル'] . '</h3>
<div class="addr">' . $v3['所在地'] . '</div>
<div class="access">' . $v3['交通'] . '</div>
' . $v3['タイプ'] . '
' . $v3['その他カテゴリ'] . '
</div>
</li>' . PHP_EOL;
							}
							echo '</ul>' . PHP_EOL;
						}
					}
					/*
<div class="area_title"><h2>xxxエリア</h2></div>
<ul>
<li>
<div class="p">p</div>
<div class="t">
<div class="brand"><div>logo</div><div>phase-34</div></div>
<h3>title</h3>
<div class="addr">addr</div>
<div class="access"></div>
<div class="type"><span>：</span></div>
<div class="other"></div>
</div>
</li>
</ul>
*/
					?>
				</section>
				<section class="menu">
					<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
						<div class="subt">現在の検索条件</div>
						<div class="gray search_res"><?php
														$a = '';
														if (!empty($search_res)) {
															$a = array();
															foreach ($search_res as $k => $v1) {
																if (!is_array($v1)) {
																	$a[] = $v1;
																	continue;
																}
																foreach ($v1 as $v2) {
																	if (!is_array($v2)) {
																		$a[] = $v2;
																		continue;
																	}
																	foreach ($v2 as $v3) {
																		$a[] = $v3;
																	}
																}
															}
															$a = implode('<br>', $a);
														}
														echo !empty($a) ? $a : '未設定';
														?></div>
						<div class="subt sp_vanish">検索条件を変更・追加</div>
						<?php
						//エリア限定
						function LOCAL_SEARCH_MENU1($t)
						{
							global $area_list_2025;
							$a = $area_list_2025[$t];
							echo '<div class="gray"><div class="subt">' . $t . '</div>
<dl>' . PHP_EOL;
							foreach ($a as $k => $v) {
								if (isset($v['分割'])) {
									LOCAL_SEARCH_MENU1_LIST($v[1], $t);
								} else {
									LOCAL_SEARCH_MENU1_LIST(array($v), $t);
								}
							}
							echo '</dl>
</div>' . PHP_EOL;
						}
						function LOCAL_SEARCH_MENU1_LIST($a, $t)
						{
							global $search_res, $area_cnt;
							$c = '[' . implode('][', $_REQUEST[$t]) . ']';
							//print_r($c);
							foreach ($a as $v) {
								if (!is_array($v)) {
									$v = array($v);
								}
								$add = array('', '');
								//print_r($v);
								//print_r($v[0].'=='.$search_res['エリア'][0]);
								if ($v[0] == $search_res['エリア'][0]) {
									$add = array(' class="on"', ' style="display:block;"');
								}
								echo '<dt' . $add[0] . '>' . str_replace('・', '･', $v[0]) . '<img src="images/content/search/2025/arrow-T.svg"></dt><dd' . $add[1] . '><div class="set">' . PHP_EOL;
								echo '<label><input type="checkbox" name="' . $t . '[]" ' . LOCAL_SEARCH_VALUE_CHECKED($v[0] . '-全選択', $c) . '>全て選択する</label>' . PHP_EOL;
								if (isset($v[1]) && is_array($v[1])) {
									foreach ($v[1] as $vv) {
										//print_r($area_cnt[$v[0]][$vv]);
										if (!isset($area_cnt[$v[0]][$vv]) || ($area_cnt[$v[0]][$vv] < 1)) {
											continue;
										} //1件もない所は省略（2025/06/13追加
										//$add=(!isset($area_cnt[$v[0]][$vv])||($area_cnt[$v[0]][$vv]<1))?' style="display:none;"':'';
										echo '<label><input type="checkbox" name="' . $t . '[]" ' . LOCAL_SEARCH_VALUE_CHECKED($v[0] . '-' . $vv, $c) . '>' . $vv . '</label>' . PHP_EOL;
									}
								}
								echo '</div></dd>' . PHP_EOL;
							}
						}
						function LOCAL_SEARCH_VALUE_CHECKED($v, $c)
						{
							return 'value="' . $v . '"' . (strpos($c, '[' . $v . ']') !== false ? ' checked' : '');
						}
						//エリア以外
						function LOCAL_SEARCH_MENU2($t, $add = '')
						{
							global $area_list_2025;
							$a = $area_list_2025[$t];
							$c = '[' . implode('][', $_REQUEST[$t]) . ']';
							$class = array('gray');
							if ($add != '') {
								$class[] = $add;
							}
							echo '<div class="' . implode(' ', $class) . '"><div class="subt">' . $t . '</div>
<div class="set">' . PHP_EOL;
							foreach ($a as $k => $v) {
								if (!is_array($v)) {
									$v = array($v);
								}
								echo '<label><input type="checkbox" name="' . $t . '[]" ' . LOCAL_SEARCH_VALUE_CHECKED($v[0], $c) . '>' . $v[0] . '</label>' . PHP_EOL;
							}
							echo '</div>
</div>' . PHP_EOL;
						}
						?>
						<div class="sp_pop">
							<div class="dark">
								<div class="frame"><img src="images/content/search/2025/close.svg" class="pc_vanish">
									<div class="scr">
										<?php
										LOCAL_SEARCH_MENU1('エリア');
										LOCAL_SEARCH_MENU2('ブランド');
										LOCAL_SEARCH_MENU2('フェーズ'); //,'type_single'
										LOCAL_SEARCH_MENU2('その他');
										?>
										<div class="submit">
											<label><input type="submit" name="submit_search" value="検索する"><img src="images/content/search/2025/arrow-R-W.svg"></label>
											<label><input type="button" value=" ">
												<div class="pc_br_del">
													<div>検索条件を<br>リセット</div>
												</div><img src="images/content/search/2025/arrow-R.svg">
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</section>
			</div>
		</main>
		<div class="sp_fixbtn">
			<div>検索条件を変更・追加<img src="images/common/arrow-bottom.svg"></div>
		</div>
		<script>
			$(document).ready(function() {
				LOCAL_SP_FIXBTN();
				LOCAL_SP_FIXBTN_FLAG();
			});
			$(window).load(function() {
				$(window).scroll(function() {
					LOCAL_SP_FIXBTN();
				});
				$(window).bind("resize load", function() {
					LOCAL_SP_FIXBTN_FLAG();
				});
				$('.sp_fixbtn > *').on('click', function() {
					$('.search_list2025 .sp_pop').fadeIn();
				});
				$('.search_list2025 .sp_pop .dark .frame > img[src*="close"]').on('click', function() {
					$('.search_list2025 .sp_pop').fadeOut();
				});
				$('.search_list2025 .menu dt').on('click', function() {
					if ($(this).hasClass('on')) {
						$(this).next('dd').slideUp();
						$(this).removeClass('on');
					} else {
						$(this).next('dd').slideDown();
						$(this).addClass('on');
					}
				});
				$('.search_list2025 .menu dd input').on('click', function() {
					var v = $(this).val();
					var f = v.indexOf('全選択') > -1;
					var i = $(this).parents('dd').index() + 1;
					//console.log(f);
					$(this).parents('dl').find('dd:not(:nth-child(' + i + ')) input').prop('checked', false); //枠外のチェックを外す
					if (f) {
						$(this).parents('dd').find('input:not([value*="全選択"])').prop('checked', !f);
					} else {
						$(this).parents('dd').find('input[value*="全選択"]').prop('checked', f);
					}
				});
				$('.search_list2025 .menu .submit label input[type="button"]').on('click', function() {
					$(this).parents('.scr').find('.gray input').prop('checked', false);
				});
				$('.search_list2025 .type_single input').on('click', function() {
					var i = $(this).parents('label').index() + 1;
					$(this).parents('.set').find('label:not(:nth-child(' + i + ')) input').prop('checked', false);
				});
			});

			function LOCAL_SP_FIXBTN() {
				if ($(window).scrollTop() + $(window).height() > $('.sp_fixbtn').offset().top + $('.sp_fixbtn > *').height()) {
					$('.sp_fixbtn.click_ok').addClass('static');
				} else {
					$('.sp_fixbtn').removeClass('static');
				}
			}

			function LOCAL_SP_FIXBTN_FLAG() {
				//if(window.matchMedia('(max-width:999px)').matches){}
				if (window.matchMedia('(min-width:1000px)').matches) {
					$('.search_list2025 .sp_pop').removeAttr('style');
				}
			}
		</script>
		<!-- ** -->
		<?php echo $temp_footer; ?>
		<!-- * -->
	</div>
	<?php
	//ログインボックス
	include $kaisou . "temp_php/temp_loginbox.php";
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