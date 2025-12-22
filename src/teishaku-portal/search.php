<?php
$p_type = 'content';
$kaisou = '';
$p_title = '物件一覧';
$dir = $kaisou . 'images/content/search/';
require $kaisou . "temp_php/basic.php";

require $kaisou . "system/function/cms-load.php";
require $kaisou . "system/function/func-price.php"; //物件情報の分解用
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
		<?php echo CONTENT_TOPIMG(); ?>
		<?php echo CONTENT_SUBT_MINI('HOUSING INFO', '- 物件情報 -'); ?>
		<!-- *** -->
		<div class="content_box bg_EEE_green">
			<?php echo CONTENT_PAD(30, 'sp/2'); ?>
			<div class="LH125 sp_fontP075 sp_LH200">※一般非公開の物件の閲覧には会員登録が必要です。<?php echo PAD_BR(); ?>＞＞＞<a href="<?php echo $link_list['会員登録'][0] ?>" class="col_05B">会員登録はこちらから</a></div>
			<?php echo CONTENT_PAD(30, 'sp/2'); ?>
		</div>
		<!-- *** -->
		<script>
			$(document).ready(function() {
				areabtn = $('.s_list_areabtn');
				LOCAL_JUMPBTN();
				$('.s_list_areabtn').height($('.s_list_areabtn > *').outerHeight());
			});
			$(window).load(function() {
				$(window).scroll(function() {
					LOCAL_JUMPBTN();
				});
				$(window).bind("resize load", function() {
					$('.s_list_areabtn').height($('.s_list_areabtn > *').outerHeight());
				});
				$('.local_motto').on('click', function() {
					/*
					$(this).parent().removeClass('local_limit');
					$(this).hide();
					*/
					$(this).parent().find('ul li:nth-child(n+7)').slideDown();
					$(this).slideUp();
				});
				$('.s_list_areabtn .onoff > div:nth-of-type(1)').on('click', function() {
					var obj = $(this).parent();
					if (obj.hasClass('open')) {
						obj.removeClass('open');
					} else {
						obj.addClass('open');
					}
				});
				$('.s_list_areabtn .onoff a').on('click', function() {
					$(this).parents('.onoff').removeClass('open');
				});
			});

			function LOCAL_JUMPBTN() {
				st1 = areabtn.offset().top;
				st2 = $('header').offset().top + $('body > div > .H_head').height();
				if (st1 > st2) {
					areabtn.removeClass('fixed');
				} else {
					areabtn.addClass('fixed');
				}
			}
		</script>
		<div class="s_list_areabtn">
			<?php
			$search_floor = COMMON_PARAM('search_floor');
			$str = '<div>' . chr(10);
			//$cnt=1;
			foreach ($area_list as $k => $v) {
				$str .= '<div class="onoff"><div>' . $k . '<span>▼</span></div><div>' . chr(10);
				foreach ($search_floor as $k2 => $v2) {
					$str .= '<a href="#area' . $v . '-' . $k2 . '">' . $v2 . '</a>' . chr(10);
				}
				$str .= '</div></div>' . chr(10);
				//$cnt++;
			}
			$str .= '</div>' . chr(10);
			echo $str;
			?>
		</div>
		<!-- *** -->
		<?php
		//バナーシステム2023ver
		echo TOUSHIN_COMMON_BNR_2023('テイシャク/物件一覧');
		?>
		<!-- *** -->
		<div class="content_box">
			<div class="Wbase W1200">
				<?php
				$search_arr = array();
				foreach (CMS_SETUP('search') as $key => $sysdata) {
					if (CMS_OPEN($sysdata)) {
						continue;
					}
					CMS_DATA_REPLACE();
					CMS_IMGSET($sysdata[0]);
					//データ分別・格納処理
					switch (true) {
						case ($sysdata[3] == 999): //完売物件
							$sysdata[18] = $sysdata[3];
							break;
						case ($sysdata[18] == ''): //未分類
							$sysdata[18] = 0;
							break;
					}
					if (!isset($sysdata[22]) || empty(trim($sysdata[22]))) {
						//階層未設定の場合、名前から判別
						$sysdata[22] = strpos($sysdata[2], '平屋') !== false ? 1 : 2;
					}
					$search_arr[$sysdata[18]][$sysdata[22]][] = $sysdata;
				}
				foreach ($area_list as $k => $v) {
					foreach ($search_floor as $k2 => $v2) {
						echo '<div class="s_list_anchor">' . ANCHOR('area' . $v . '-' . $k2) . '</div>
<h2 class="s_list_areatitle">' . $k . ' [' . $v2 . ']</h2>' . chr(10);
						if (!isset($search_arr[$v][$k2]) || count($search_arr[$v][$k2]) < 1) {
							echo '<div class="comingsoon">Coming Soon</div>';
							continue;
						}
						echo '<div class="s_list_bukken-wrap">
<ul class="s_list_bukken col3">' . chr(10);
						foreach ($search_arr[$v][$k2] as $bukkensuu => $sysdata) {
							//物件概要データ取得
							$bukken_data = SEARCH_PRICE($sysdata[17][0] ?? '');
							//物件リストテンプレ
							require $kaisou . "temp_php/search/temp-bukken-list.php";
						}
						echo '</ul>' . chr(10);


						echo '</div>' . chr(10);
					} //foreach($cate_floor as $k2 => $v2)
				}
				?>

			</div>
		</div>
		<!-- *** -->
		<div class="content_box">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(50, 'sp/2'); ?>
				<?php echo TOP_MENU_BNR(); ?>
				<?php echo CONTENT_PAD(75, 60); ?>
			</div>
		</div>
		<!-- ** -->
		<!-- ** -->
		<?php echo $temp_footer; ?>
		<!-- * -->
	</div>
	<?php
	//ログインボックス
	require $kaisou . "temp_php/temp_loginbox.php";
	?>
	<?php echo $temp_bodyend; ?>
</body>

</html>