<?php
$p_type = 'index';
$kaisou = '';
$p_title = '';
require $kaisou . "temp_php/basic.php";

require $kaisou . "system/function/cms-load.php";
require $kaisou . "system/function/func-price.php"; //物件情報の分解用
/*
require $kaisou."temp_php/temp_topparts.php";//TOPと定期借地共通部分
*/
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
	<link href="css/lifestyle.css" rel="stylesheet" type="text/css">
	<?php
	//バナーシステム2023年度ver読み込み
	$toushin_bnr_url = $kaisou . '../recaptcha/';
	require $toushin_bnr_url . 'func-common-bnr-setup2023.php';
	?>
	<?php echo $temp_java; ?>
	<script src="js/wideslider/wideslider.js" type="text/javascript"></script>
	<link href="js/wideslider/wideslider.css" rel="stylesheet" type="text/css">
	<script>
		$(window).load(function() {
			$(".wideslider").addClass('loadend');
			$(window).bind("resize load", function() {
				WIDESLIDER_TEXT_HEIGHT();
			});
			$('.pagination a').on('click', function() {});
		});

		function WIDESLIDER_TEXT_HEIGHT() {
			h = 0;
			$(".wideslider .content_box .text div").each(function(i) {
				if (h < $(this).height()) {
					h = $(this).height();
				}
			});
			$('.wideslider .content_box .text').height(h);
		}

		function WIDESLIDER_TEXT_CHANGE() {
			$('.pagination a').each(function(i) {
				if ($(this).hasClass('active')) {
					$(".wideslider .content_box .text div:nth-child(" + (i + 1) + ")").fadeIn();
				} else {
					$(".wideslider .content_box .text div:nth-child(" + (i + 1) + ")").fadeOut();
				}
			});
		}
	</script>
</head>

<body class="borderbox">
	<?php echo $temp_pagetop; ?>
	<div align="center">
		<!-- * -->
		<?php echo $temp_header; ?>
		<!-- ** -->
		<div class="top_slider">
			<div class="wideslider borderbox">
				<?php
				$clear_img = 'clear-W2600H1600.png';
				echo '<img src="images/common/' . $clear_img . '" class="mgnAuto sp_vanish">';
				?>
				<ul class="ws">
					<?php
					$nowdate = date('Ymd');
					$arr = array(
						'' //空白
						,
						'images/slide/s01.jpg',
						'images/slide/s202505-01.jpg',
						'images/slide/s202505-02.jpg'
					);
					/*
if($nowdate<=20230331){
	$arr[]='images/slide/hiraya-california~20230331.jpg';
}
*/
					unset($arr[0]); //空白削除
					$css = array('', '');
					foreach ($arr as $k => $v) {
						echo '<li class="ws"><img src="images/common/' . $clear_img . '" class="base bg_cover num' . $k . '"></li>' . chr(10);
						$str = array('.wideslider ul.ws li.ws img.num' . $k . '{background-image:url(', ');}');
						$css[0] .= $str[0] . $v . $str[1] . chr(10);
						$v2 = str_replace('.', '-sp.', $v);
						if (file_exists($v2)) {
							$css[1] .= $str[0] . $v2 . $str[1] . chr(10);
						}
					}
					?>
				</ul>
				<style>
					<?php echo $css[0]; ?>@media screen and (max-width: 999px) {
						.wideslider ul.ws li.ws img.num1 {
							background-position: center bottom !important;
						}

						<?php echo $css[1]; ?>
					}
				</style>
				<div class="catch">
					<div class="c1"><?php
									echo '<img src="images/top/slide-catch-202209V.svg" title="平屋回帰">';
									//<img src="images/top/slide-catch.svg" title="平屋で、二人暮らし。">
									?></div>
				</div>
			</div>
		</div>
		<!-- *** -->
		<div class="top_sec01 content_box">
			<div class="Wbase W1200">
				<?php
				//バナーシステム2023ver
				echo TOUSHIN_COMMON_BNR_2023('平屋/TOP');
				?>
				<?php echo CONTENT_PAD(70, 40); ?>
				<h2 class="v202209"><?php echo WORD_BR('平屋実績No.1
【平屋限定スペシャルサイト】'); ?></h2>
				<?php
				/*
echo EFFECT_BTN('物件情報','すべての物件を見る',array('class'=>'colB border2'));
echo CONTENT_PAD(70,40);
*/
				?>
				<div class="LH175 sp_fontP080"><?php echo WORD_BR('いつの時代も心にやすらぎを与えてくれる、平屋。
過ごしやすさを追求した古き良き伝統がそこにはある。
誰もが心の奥から感じる、懐かしさという安心。
人も 暮らしも 平屋に帰ろう。'); ?></div>
				<?php
				//バナーシステム2023ver
				echo TOUSHIN_COMMON_BNR_2023('平屋/TOP・おすすめ上');
				?>
			</div>
		</div>

		<!-- *** -->
		<?php
		//物件リスト初期化
		$search_arr = array();
		foreach (CMS_SETUP('search') as $key => $sysdata) {
			if (CMS_OPEN($sysdata)) {
				continue;
			}
			if ($sysdata[3] == 999) {
				continue;
			} //完売
			CMS_DATA_REPLACE();
			CMS_IMGSET($sysdata[0]);
			$pu = ($sysdata[19] == 1) ? 0 : 1; //0と1反転
			$search_arr[$pu][] = $sysdata;
		}
		ksort($search_arr); //キーの昇順で並び替え
		$a = array();
		foreach ($search_arr as $v) { //ピックアップを前にして再格納
			foreach ($v as $v2) {
				$a[] = $v2;
			}
		}
		$search_arr = $a;
		unset($a); //要らないので削除

		function TOP_RECOMMEND_SET($addclass = false)
		{

			return false; //非表示

			global $link_list, $search_arr, $kaisou, $max, $cnt;
		?>
			<div class="top_sec02 pc_content_box<?php echo $addclass ? ' first' : ''; ?>">
				<div class="Wbase W1200">
					<div class="top_subt">
						<div class="en">RECOMMEND</div>
						<h2>おすすめの物件</h2>
					</div>
					<div class="sp_slide_set">
						<div class="arrow L"><img src="images/content/search/arrow-slide.svg"></div>
						<div class="sp_slide_mode">
							<ul class="s_list_bukken col4">
								<?php
								$cnt = 0;
								foreach ($search_arr as $key => $sysdata) {
									//物件情報データ取得
									$bukken_data = SEARCH_PRICE($sysdata[11][0]);
									//物件リストテンプレ
									require $kaisou . "temp_php/search/temp-bukken-list.php";
									$cnt++;
									if ($cnt >= $max) {
										break;
									}
								}
								?>
							</ul>
						</div>
						<div class="arrow R"><img src="images/content/search/arrow-slide.svg"></div>
					</div>
					<?php echo EFFECT_BTN('物件情報', 'すべての物件を見る', array('class' => 'colB border2')); ?>
				</div>
			</div>
		<?php
		}

		$max = 4;
		TOP_RECOMMEND_SET(true); //物件スライダー表示
		?>
		<script>
			$(window).load(function() {
				scr = false;
				cnt = 0;
				len = $('.first .sp_slide_mode ul li').length;
				$('.sp_slide_set').each(function() {
					obj = $(this);
					SEARCH_SLIDE_SCR(obj);
				});
				$('.sp_slide_mode').on('touchstart mousedown', function() {
					cnt = 0;
				});
				$('.sp_slide_mode').on('touchend mouseup', function() {
					cnt = 1;
					obj = $(this).parents('.sp_slide_set');
					SEARCH_SLIDE_BTN(0, obj);
				});
				$('.sp_slide_mode').scroll(function() {
					scr = true;
					obj = $(this).parents('.sp_slide_set');
					SEARCH_SLIDE_SCR(obj);
				});
				$(".sp_slide_set .arrow.L img").click(function() {
					obj = $(this).parents('.sp_slide_set');
					SEARCH_SLIDE_BTN(-1, obj);
				});
				$(".sp_slide_set .arrow.R img").click(function() {
					obj = $(this).parents('.sp_slide_set');
					SEARCH_SLIDE_BTN(1, obj);
				});
				/*
				var loop= function(){
					if(!scr){
						if(cnt>0){
							cnt--;
							//$('.test').html(cnt);
							if(cnt==0){
								SEARCH_SLIDE_BTN(0);
							}
						}
					}
					scr=false;
					setTimeout(loop,50);
				};
				loop();
				*/
			});

			function SEARCH_SLIDE_WIDTH(obj) {
				//return $('.sp_slide_mode').width();//横幅リセット
				return obj.find('.sp_slide_mode').width(); //横幅リセット
			}

			function SEARCH_SLIDE_BTN(add, obj) {
				var w = SEARCH_SLIDE_WIDTH(obj);
				var p1 = Math.floor(obj.find('.sp_slide_mode ul').position().left);
				if (add != 0) {
					num = (Math.floor(-p1 / w) + add + len) % len;
				} else {
					num = (Math.round(-p1 / w) + len) % len;
				}
				//$('.test').html(num+'/'+(-p1)+'/'+w+'/'+(-p1/w)+'/'+len);
				//$('.sp_slide_mode').scrollLeft(num*w);
				obj.find('.sp_slide_mode').animate({
					scrollLeft: num * w
				}, 250, "swing", function() {
					//$(this).dequeue();
				});
			}

			function SEARCH_SLIDE_SCR(obj) {
				var w = SEARCH_SLIDE_WIDTH(obj);
				var p2 = Math.floor(obj.find('.sp_slide_mode ul').position().left);
				num = Math.round(-p2 / w) % len;
				//$('.test').html(num+'/'+(-p2/w)+'/'+len);
				obj.find(".arrow").removeClass('off');
				if (num <= 0) {
					obj.find(".arrow.L").addClass('off');
				}
				if (num >= (len - 1)) {
					obj.find(".arrow.R").addClass('off');
				}
			}
		</script>
		<style>
			@media screen and (max-width: 999px) {
				.sp_slide_mode>.s_list_bukken {
					<?php echo 'width:' . ($cnt * 100) . '%;'; ?>
				}
			}
		</style>
		<!-- *** -->


		<?php
		//LPバナー
		include '../teishaku-portal/lp-zeroyen/parts/data-param.php'; //パラメータ
		$data_param_lp_zeroyen['type_hiraya'] = true;
		include $data_param_lp_zeroyen['dir'] . 'parts/bnr_top.php'; //バナー
		?>
		<style>
			.top_lp_box_202503 .content_box {
				background-color: transparent;
			}

			.top_bnr_zeroyen_set a::before {
				border-color: #525a6f;
			}

			.top_movie .set {
				display: flex;
				flex-direction: column;
				align-items: center;
				padding-top: 60px;
				padding-bottom: 0;
				width: 100%;
				max-width: 800px;
				margin: auto;
			}

			.top_movie .set .movie {
				position: relative;
				width: 100%;
				padding-top: 56.25%;
			}

			.top_movie .set .movie iframe {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
			}
		</style>
		<div class="top_sec01 content_box">
			<div class="Wbase W1200">
				<?php
				/*
ボツ
<style>
.bnr_halforder{
	display: flex;
	justify-content: center;
	align-items: center;
}
.bnr_halforder a{
	display: flex;
	background-color: #FFF;
}
</style>
<div class="bnr_halforder vanish_branch"><a href="lp-harforder/">
<img src="lp-harforder/bnr/halforder-pc.webp" style="width:808px;">
<img src="lp-harforder/bnr/halforder-sp.webp" style="width:380px;">
</a></div>
<?php echo CONTENT_PAD(60,40); ?>
*/
				?>
				<!-- 1block -->
				<div class="news_set" style="margin-top: 0;">
					<div class="title">
						<h3>NEWS</h3>
						<div class="font_yugo">お知らせ</div>
					</div>
					<ul class="font_yugo">
						<?php
						$arr = array();
						$cnt = 0;
						foreach (CMS_SETUP('news') as $key => $sysdata) {
							if (CMS_OPEN($sysdata)) {
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
							$nm = ($sysdata[11] == 1) ? '<span>NEW!</span>' : '';
							$str = $sysdata[2];
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
									//$str='<a>'.$str.'</a>';
							}
							echo '<li><div>' . date('Y.m.d', strtotime($sysdata[1])) . $nm . '</div><div>' . $str . '</div></li>' . chr(10);
							$cnt++;
							if ($cnt >= 5) {
								break;
							}
						}
						?>
					</ul>
					<div class="btn font_yugo"><a href="<?php echo $link_list['NEWS'][0]; ?>">LIST</a></div>
				</div>
				<?php
				echo CONTENT_PAD(50, 35);
				//バナーシステム2023ver
				echo TOUSHIN_COMMON_BNR_2023('平屋/TOP・新着下');
				echo CONTENT_PAD(50, 35);
				?>
				<?php
				/*
<h2><?php echo WORD_BR('懐かしさと新しさが調和する、【SPBR】東新住建の平屋建て'); ?></h2>
*/
				?>
				<div class="arrow">CONCEPT<img src="images/top/arrow-scroll.svg"></div>
				<!-- 1block -->
				<?php
				function TOP_SUBT_SET($data)
				{
					$w3 = isset($data['w3']) ? ' class="w3"' : '';
					$ver = isset($data['ver']) ? '-' . $data['ver'] : '';
					return '<div class="subt_set">
<h3' . $w3 . '><img src="images/top/tategaki-' . sprintf('%02d', $data['num']) . $ver . '.svg" alt="' . $data['title'] . '"></h3>
<div>' . WORD_BR($data['text']) . '</div>
</div>' . chr(10);
				}
				?>
				<div><?php echo TOP_SUBT_SET(array(
							'num' => 1,
							'title' => '暮らしやすさと開放感',
							'text' => '日常から解き放たれた安らぎがいつでもそばに。
ずっと、私を満足させてくれる家、「HIRAYA」。'
						)); ?></div>
				<div class="photo_set1 bg_cover">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<!-- 1block -->
				<div class="top_element"><img src="images/top/element5.svg"></div>
				<div class="photo_set2 num2 bg_cover">
					<div><?php echo TOP_SUBT_SET(array(
								'num' => 2,
								'title' => '四季の移ろいを五感で味わう',
								'text' => '春は花咲き、夏は葉を広げ、秋は色づき、冬は日差す。
空と大地が近くに感じられる。
自然を感じることは、人の心にゆとりを与えてくれる。
深呼吸するだけで… ほら、自然とひとつになれる。'
							)); ?></div>
					<div class="photo">
						<img src="images/top/p6-1.jpg">
						<img src="images/top/p6-2.jpg">
					</div>
				</div>
				<!-- 1block -->
				<div class="photo_set2 num3 bg_cover">
					<div><?php echo TOP_SUBT_SET(array(
								'num' => 3,
								'title' => '内と外を隔てない曖昧さを愉しむ',
								'w3' => true,
								'text' => 'リビング窓の向こうには
生活スペースが途切れることなく続くウッドデッキ。
広い庭もその先の広い空も、
すべてが生活の一部に感じられる。'
							)); ?></div>
					<div class="photo"><img src="images/top/p3-1.jpg"></div>
				</div>
				<!-- 1block -->
				<?php
				/*
<div class="photo_set2 num4 bg_cover">
<div><?php echo TOP_SUBT_SET(array
('num'=>4
,'title'=>'自然の力を感じ取る'
,'text'=>'2階建ての家よりも空と大地が近くに感じられるHIRAYA。
広い空と太陽の日差しは明るい気持ちにさせてくれる。
暖かい大地は落ち着きを与えてくれる。
もっと感性が豊かになれば、きっと暮らしにゆとりが生まれそう。'
)); ?></div>
<div class="photo">
<img src="images/top/p4-1.jpg">
<img src="images/top/p4-2.jpg">
</div>
</div>
*/
				?>
				<!-- 1block -->
				<div class="photo_set2 num5 bg_cover">
					<div><?php echo TOP_SUBT_SET(array(
								'num' => 5,
								'ver' => 202209,
								'title' => '感じる気配繋がる家族'
								//,'w3'=>true
								,
								'text' => 'フラットな暮らしでワンフロアにすべてが
あるからこそ分かる、家族の暮らし。
嬉しいことも、楽しいことも、困ったことも、驚きも。
すぐ近くで感じられるから、会話も笑顔もたくさんあふれる。'
							)); ?></div>
					<div class="photo"><img src="images/top/p5-1.jpg"></div>
				</div>
				<!-- 1block -->
				<?php
				/*
<div class="photo_set2 num6 bg_cover">
<div><?php echo TOP_SUBT_SET(array
('num'=>6
,'title'=>'広大な空のもと、光と風に包まれる'
,'text'=>'木造にこだわる「HIRAYA」は
そこに佇む大きなひとつの木。
通り抜ける風も、差し込む日差しも、
すべてが心地よい。'
)); ?></div>
<div class="photo">
<img src="images/top/p6-1.jpg">
<img src="images/top/p6-2.jpg">
</div>
</div>
*/
				?>
			</div>
		</div>
		<!-- *** -->
		<?php
		TOP_RECOMMEND_SET(); //物件スライダー表示
		?>
		<!-- *** -->
		<style>
			.bnr_voice,
			.bnr_voice a {
				max-width: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.bnr_voice a {
				position: relative;
				width: 700px;
				height: min(265px, max(130px, calc(1vw * 130 / 3.75)));
				border: solid 1px #525a70;
				background-image: url(images/bnr/2025/bnr_voice-photo.jpg);
				background-position: center center;
				background-repeat: no-repeat;
				background-size: cover;
			}

			.bnr_voice img {
				object-fit: cover;
			}

			.bnr_voice a>* {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
			}

			.bnr_voice .frame {
				border: solid min(8px, max(4px, calc(1vw * 4 / 3.75))) #FFF;
			}
		</style>
		<div class="bnr_voice content_box"><a href="<?php echo $link_list['お客様の声'][0]; ?>">
				<div class="frame"></div>
				<div class="vanish_branch">
					<img src="images/bnr/2025/bnr_voice-pc.svg">
					<img src="images/bnr/2025/bnr_voice-sp.svg">
				</div>
			</a></div>
		<!-- *** -->
		<div class="top_sec03 content_box">
			<div class="Wbase W1200">
				<div class="top_subt">
					<div class="en">COLUMN</div>
					<h2>コラム</h2>
				</div>
				<ul class="LS_list">
					<?php
					$max = 4;
					$cnt = 0;
					foreach (CMS_SETUP('life') as $key => $sysdata) {
						if (CMS_OPEN($sysdata)) {
							continue;
						}
						CMS_DATA_REPLACE();
						CMS_IMGSET($sysdata[0], array('upfile' => 'life'));
						//print_r($sysdata);
						if (!is_array($sysdata[6])) {
							$sysdata[6] = array($sysdata[6], '');
						}
						$text = ($sysdata[6][1] != '') ? $sysdata[6][1] : $sysdata[6][0];
						echo '<li><a href="' . $link_list['コラム'][0] . '?id=' . $sysdata[0] . $t_blank . '"><img src="images/common/clear-W270H170.png" class="W100per bg_cover" style="background-image: url(' . $sysdata['upfile'][0] . ');"><div class="pad">' . $text . '</div></a></li>';
						/*
	<div class="title">'.$sysdata[2].'</div>
	*/
						$cnt++;
						if ($cnt >= $max) {
							break;
						}
					}
					?>
				</ul>
				<?php echo EFFECT_BTN('コラム', 'すべての記事を見る'); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="top_sec04 content_box">
			<div class="Wbase W1200">
				<h2><?php echo WORD_BR('憧れの平屋暮らしを【SPBR】もっと身近に。'); ?></h2>
				<div class="text"><?php echo WORD_BR('空間の広さだけでなく、心のゆとりを感じさせる住まい。
それが日本の平屋。
東新住建がこれからの新しい住まい方を
ご提案いたします。'); ?></div>
				<?php //echo EFFECT_BTN('TOP','さらに詳しく見る',array('class'=>'colW')); 
				?>

			</div>
		</div>
		<!-- *** -->

		<!--
		<div class="top_sec05 content_box bg_FFF">
			<div class="Wbase W1200">
				<div class="text"><?php echo WORD_BR('オンライン予約で、気軽に。【SPBR】「無人でモデルハウス見学」'); ?></div>
				<?php echo EFFECT_BTN('外部-無人で物件見学', 'さらに詳しく見る'); ?>
			</div>
		</div>
		-->

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
<!-- CHATBOX -->
<script>(function(){
var w=window,d=document;
var s="https://app.chatplus.jp/cp.js";
d["__cp_d"]="https://app.chatplus.jp";
d["__cp_c"]="0c1f9137_5";
var a=d.createElement("script"), m=d.getElementsByTagName("script")[0];
a.async=true,a.src=s,m.parentNode.insertBefore(a,m);})();</script>
*/
	?>
</body>

</html>