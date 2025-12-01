<?php
$p_type = 'index';
$kaisou = '';
$p_title = '';
require $kaisou . "temp_php/basic.php";

require $kaisou . "system/function/cms-load.php";
require $kaisou . "system/function/func-price.php"; //物件情報の分解用

require $kaisou . "temp_php/temp_topparts.php"; //TOPと定期借地共通部分
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
	<script src="js/wideslider.js" type="text/javascript"></script>
	<link href="css/wideslider.css" rel="stylesheet" type="text/css">
	<style>
		.wideslider:not(.loadend) .wideslider_wrap {
			display: none;
		}
	</style>
	<script>
		$(window).load(function() {
			$(".wideslider").addClass('loadend');
			$(window).bind("resize load", function() {
				WIDESLIDER_TEXT_HEIGHT();
			});
			$('.pagination a').on('click', function() {
				//$('.test').text('change2');
				alert('!');
			});
			/*
			$('.pagination a').on('classChange',function(){
				//var a=$('.pagination .pn5').hasClass('active');
				//alert('pn5=');
				$('.top_slider .catch').addClass('test');
			});
			*/
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
		/*
		function WIDESLIDER_TEXT_CHANGE(){
			//$('.test').text('change');
			$('.pagination a').each(function (i){
				if($(this).hasClass('active')){
					$(".wideslider .content_box .text div:nth-child("+(i+1)+")").fadeIn();
				}
				else{
					$(".wideslider .content_box .text div:nth-child("+(i+1)+")").fadeOut();
				}
			});
		}
		*/
		function WIDESLIDER_CATCH_ONOFF() {
			var f = false;
			var c = $('.top_slider .mainList .mainActive').html();
			//alert(c.indexOf('s-0yen_select.jpg',0));
			if (c.indexOf('s-0yen_select.jpg', 0) > -1) {
				f = true;
			}
			if (f) {
				$('.top_slider .catch').fadeOut();
			} else {
				$('.top_slider .catch').fadeIn();
			}
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
				$clear_img = 'clear-W2600H1800.png';
				$clear_img_sp = 'clear-W828H780.png';
				echo '<img src="images/common/' . $clear_img . '" class="mgnAuto sp_vanish">
<img src="images/common/' . $clear_img_sp . '" class="mgnAuto pc_vanish">';
				?>
				<ul class="ws">
					<?php
					$nowdate = date('Ymd');
					$arr = array(
						'' //空白
						,
						'images/slide/s05.jpg'
						//,'/recaptcha/bnr/bnr-20230113-E.jpg'
						//,'images/slide/s01.jpg'
					);
					/*
if($nowdate<=20230331){
	$arr[]=array('images/slide/hiraya-california~20230331.jpg','B');
}
*/
					$arr[] = 'images/slide/s02.jpg';
					$arr[] = 'images/slide/s03.jpg';
					$arr[] = 'images/slide/s04.jpg';
					//$arr[]='images/slide/s-0yen_select.jpg';

					unset($arr[0]); //空白削除
					foreach ($arr as $v) {
						$add = '';
						if (is_array($v)) {
							$add = $v[1];
							$v = $v[0];
						}
						$v_sp = str_replace('.', '-sp.', $v);
						if (file_exists($v_sp)) {
							echo '<li class="ws"><img src="images/common/' . $clear_img . '" class="base bg_cover sp_vanish" style="background-image:url(' . $v . ');"><img src="images/common/' . $clear_img_sp . '" class="base bg_cover' . $add . ' pc_vanish" style="background-image:url(' . $v_sp . ');"></li>' . chr(10);
						} else {
							echo '<li class="ws"><img src="images/common/' . $clear_img . '" class="base bg_cover" style="background-image:url(' . $v . ');"></li>' . chr(10);
						}
					}
					?>
				</ul>
				<div class="catch">
					<div class="c1 v"><img src="images/top/catch-1V-20230410.svg" title="全国No.1 平屋の暮らし"></div>
				</div>
				<?php
				/*

*/
				?>
			</div>
		</div>
		<!-- *** -->
		<?php echo CONTENT_PAD(50); ?>
		<?php
		//バナーシステム2023ver
		echo TOUSHIN_COMMON_BNR_2023('テイシャク/TOP');
		?>
		<div class="content_box">
			<?php echo CONTENT_PAD(50); ?>
			<div class="vanish_branch">
				<img src="images/top/p-20220912A-pc.svg" style="width:858px;">
				<img src="images/top/p-20220912A-sp.svg" style="width:376px;">
			</div>
			<?php echo CONTENT_PAD(40, 30); ?>
			<?php echo EFFECT_BTN('定期借地', '定期借地とは？', array('class' => 'colB2', 'arrow' => true)); ?>
		</div>
		<!-- *** -->
		<style>
			.top_movie .set {
				display: flex;
				flex-direction: column;
				align-items: center;
				padding-top: 120px;
				padding-bottom: 50px;
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

			.top_movie .set img[src*="title."] {
				width: 768px;
				max-width: 97%;
				margin-bottom: 3%;
			}

			.top_movie .set img[src*="text."] {
				width: 608px;
				max-width: 77%;
				margin-top: 3.5%;
			}

			@media screen and (max-width: 999px) {
				.top_movie .set {
					padding-top: 60px;
					padding-bottom: 20px;
				}
			}
		</style>

		<!--
		<div class="top_bnr_campaign">
			<a href="https://www.toshinjyuken.co.jp/teishaku-portal/news.php?id=103" target="_blank">
				<img src="images/top/bnr-sumaihaku-2025.JPG" alt="秋の住まい博2025" />
			</a>
		</div>
		-->


		<div class="top_movie content_box">
			<div class="set">
				<img src="images/top/movie/title.svg">
				<div class="movie"><iframe src="//www.youtube.com/embed/V9Ex8J2MsmM?rel=0" frameborder="0" allowfullscreen=""></iframe></div>
				<img src="images/top/movie/text.svg">
			</div>
		</div>
		<?php
		//バナーシステム2023ver
		echo TOUSHIN_COMMON_BNR_2023('テイシャク/TOP・動画下');

		//LPバナー
		include 'lp-zeroyen/parts/data-param.php'; //パラメータ
		include 'lp-zeroyen/parts/bnr_top.php'; //バナー
		?>
		<!-- *** -->
		<div class="pc_content_box">
			<div class="Wbase W1200">
				<?php
				function SUBT_DECO($data)
				{
					//global $link_list;
					$res = '<h2 class="subt_deco">' . chr(10);
					foreach ($data as $v) {
						$add = (isset($v[2])) ? ' ' . $v[2] : '';
						switch ($v[0]) {
							case 'P150':
								$res .= '<div class="fontP150 sp_fontP100' . $add . '">' . $v[1] . '</div>' . chr(10);
								break;
							case 'P175':
								$res .= '<div class="fontP175 sp_fontP125' . $add . '">' . $v[1] . '</div>' . chr(10);
								break;
							case 'P250':
								$res .= '<div class="fontP250 sp_fontP150' . $add . '">' . $v[1] . '</div>' . chr(10);
								break;
							case 'PAD':
								$res .= CONTENT_PAD($v[1], $v[2]) . chr(10);
								break;
						}
					}
					$res .= '</h2>' . chr(10);
					return $res;
				}
				function SUBT_DECO_BETA($str)
				{
					return '<span class="beta"><div>' . $str . '</div><div></div></span>';
				}
				echo CONTENT_PAD(80, 'sp/2');
				?>
				<!-- **** -->
				<?php echo CONTENT_SUBT_MINI('PICK UP!', 'おすすめ物件'); ?>
				<?php echo CONTENT_PAD(35); ?>
				<?php
				//ピックアップ
				$max = 8;
				include $kaisou . "temp_php/search/temp-bukken-pickup.php";
				?>
				<?php echo CONTENT_PAD(60, 40); ?>
				<?php echo EFFECT_BTN('物件一覧', 'すべての物件を見る', array('class' => 'colB2', 'arrow' => true)); ?>
				<?php echo CONTENT_PAD(60, 45); ?>
				<!-- **** -->
			</div>
		</div>
		<!-- *** -->
		<div class="content_box bg_FFD">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(35); ?>
				<?php echo CONTENT_SUBT_MINI('INFORMATION', '最新情報'); ?>
				<?php echo CONTENT_PAD(30); ?>
				<ul class="top_news">
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
				<?php echo CONTENT_PAD(35); ?>
				<?php echo EFFECT_BTN('NEWS', 'すべてを表示する'); ?>
				<?php echo CONTENT_PAD(45); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(60, 35); ?>
				<?php
				//バナーシステム2023ver
				echo TOUSHIN_COMMON_BNR_2023('テイシャク/TOP・新着下');
				?>
				<?php echo CONTENT_PAD(60, 35); ?>
			</div>
		</div>
		<!-- 定期借地vs土地付き -->
		<?php echo TOP_SUBT_TEMP(1); ?>
		<div class="content_box">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(70, 'sp/2'); ?>
				<?php TOP_TEMP(1); ?>
				<?php echo CONTENT_PAD(30, 'sp/2'); ?>
				<?php echo EFFECT_BTN('定期借地', 'もっと詳しく', array('class' => 'colB2', 'arrow' => true)); ?>
				<?php echo CONTENT_PAD(100, 'sp/2'); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="top_slider"><?php TOP_TEMP(2); ?></div>
		<div class="content_box">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(60, 'sp/2'); ?>
				<?php echo TOP_MENU_BNR(); ?>
				<?php echo CONTENT_PAD(40); ?>
				<?php echo EFFECT_BTN('物件一覧', 'すべての物件を見る', array('class' => 'colB2', 'arrow' => true)); ?>
				<?php echo CONTENT_PAD(90, 'sp/2'); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box bg_DEF">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(70, 'sp/2'); ?>
				<h2 class="subt_deco">
					<div class="fontP200 sp_fontP125 pc_br_del sp_LH150">東新住建のテイシャク <span class="fontP150 blue">“6大メリット”</span></div>
				</h2>
				<?php echo CONTENT_PAD(50, 'sp/2'); ?>
				<ul class="top_sharing col3">
					<?php
					$arr = array(
						1 => array(
							'title' => '広い土地に住める',
							'text' => 'テイシャクは土地代金を気にせず開放的で広い土地に住むことも可能です。',
							'img-date' => '20220912'
						),
						2 => array(
							'title' => '同価格帯の物件よりも
ワンランク上の暮らし',
							'text' => '建物にお金をかけたり、土地価格の高い地域での生活が可能になります。',
							'img-date' => '20230410'
						),
						3 => array(
							'title' => '無理なく自分らしい
暮らしが見つかる',
							'text' => '浮いたお金を外構や家の設備など、好きな事に使うことができます。',
							'img-date' => '20220912'
						),
						4 => array(
							'title' => '余計な税金を
払わなくてよい',
							'text' => '借地のため土地の固定資産税や都市計画税が不要となります。',
							'img-date' => '20220912'
						),
						5 => array(
							'title' => '将来の心配事を軽減',
							'text' => '土地を所有しないため、将来の相続や処分する際の心配事がなくなります。',
							'img-date' => '20220912'
						),
						6 => array(
							'title' => 'ホームシェアリング
可能',
							'text' => '将来、住まなくなったとしても戸建賃貸として運用することが可能です。',
							'img-date' => '20220912'
						)
					);
					foreach ($arr as $k => $v) {
						$n = (isset($v['img-date']) ? $v['img-date'] . '-' : '') . $k;
						echo '<li>
<img src="images/top/p-sharing-' . $n . '.jpg" class="W100per">
<div class="pad">
<h3><div>' . WORD_BR($v['title']) . '</div></h3>
<div class="text">' . $v['text'] . '</div>
</div>
</li>' . chr(10);
						/*
<span>xxx</span>
*/
					}
					?>
				</ul>
				<?php echo LOCAL_BNR_ZEROYEN(); ?>
				<?php echo CONTENT_PAD(90, 'sp/2'); ?>
				<div class="top_life_flex1">
					<div><img src="images/top/life-stop-tochi.svg" class="W100per"></div>
					<h2 class="subt_deco">
						<div class="fontP225 sp_fontP150">約10年後には、</div>
						<?php echo CONTENT_PAD(5); ?>
						<div class="fontP275 sp_fontP175 pc_br_del"><span class="beta">
								<div>3軒に1軒が空き家になる</div>
								<div></div>
							</span><br>と予想され、</div>
						<?php echo CONTENT_PAD(10, 0); ?>
						<div class="fontP275 sp_fontP175 pc_br_del">土地があまる時代が<br>始まっています。</div>
					</h2>
				</div>
				<?php echo CONTENT_PAD(45); ?>
				<div class="top_life_flex2">
					<ul class="top_life_set">
						<li>
							<div class="icon"><img src="images/top/life-icon-1.svg"><img src="images/top/life-num-1.svg"></div><?php
																																$text = '<h3>土地の下落に対して金利や物価は上昇</h3>
<div class="text">将来的な土地価格の下落に対し、金利や物価の上昇傾向はすでに始まっています。<br>金利の上昇は住宅ローン金利の上昇につながります。</div>';
																																echo $text;
																																?>
						</li>
					</ul>
					<div class="LH150 textL sp_vanish">
						<?php echo $text; ?>
					</div>
				</div>
				<?php echo CONTENT_PAD(45, 40); ?>
				<ul class="top_life_set">
					<?php
					$arr = array(
						2 => array('人口の減少', '2009年をピークに人口の減少は加速化。今後の不動産需要への影響も不安視されています。'),
						3 => array('コンパクトシティの推進', '郊外に広がった産業や生活機能を一定の範囲内に集中させるコンパクトシティ構想。地方の土地の価値が失われていく可能性も。'),
						4 => array('生産緑地の2022年問題', '2022年に生産緑地の指定が解除されたことで、大量の宅地が放出されていて、土地の価格が下落しています。'),
						5 => array('団塊世代のリタイア', '人口の多くのボリュームを占める団塊世代。リタイア後は新たに引っ越ししたりマイホームを購入したりといった行動を起こす割合が低いため、不動産需要は減少するとい言われています。')
					);
					foreach ($arr as $k => $v) {
						echo '<li>
<div class="icon"><img src="images/top/life-icon-' . $k . '.svg"><img src="images/top/life-num-' . $k . '.svg"></div>
<h3>' . $v[0] . '</h3>
<div class="text">' . WORD_BR($v[1]) . '</div>
</li>' . chr(10);
					}
					?>
				</ul>
				<?php echo CONTENT_PAD(60); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box bg_FD0">
			<div class="Wbase W1200">
				<div class="top_life_flex3">
					<img src="images/top/life-kinri-1.svg">
					<div>
						<h3 class="col_04A pc_br_del">金利が1％変わると<br>返済額はこんなに違う！</h3>
						<img src="images/top/life-kinri-2.svg" class="W100per">
						<div class="textR sp_textL">※敷地面積60坪、土地代2,200万円、35年ローンの場合</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box bg_DEF">
			<div class="Wbase W900">
				<?php echo CONTENT_PAD(60); ?>
				<h2 class="subt_deco" style="color: #1E1E1E;">
					<div class="fontP200 sp_fontP175 pc_br_del sp_LH150"><span class="beta">
							<div>資産価値が</div>
							<div class="pc_vanish" style="height:8px;"></div>
						</span><br><span class="fontP150 blue beta" style="margin: 0 0.25em;">
							<div>下落し続ける土地</div>
							<div class="pc_vanish" style="height:8px;"></div>
						</span><br><span class="beta">
							<div>所有し続けますか？</div>
							<div class="pc_vanish" style="height:8px;"></div>
						</span></div>
				</h2>
				<hr class="sp_vanish" style="border-width:8px; border-color: #FFDA00;">
				<div class="font_bold LH100 fontP125" style="margin: 1.5em auto 1em;">＼ 土地は買わない テイシャクが解決！／</div>
				<?php echo EFFECT_BTN('物件一覧', 'すべての物件を見る', array('class' => 'colB2', 'arrow' => true)); ?>
				<?php echo CONTENT_PAD(55); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(80, 'sp/2'); ?>
				<h2 class="subt_deco top_subt_yorokobi">
					<div class="fontP225 sp_fontP200 va_middle"><span><img src="images/top/fuki-yorokobi.svg" style="width:134px;"></span><span>お客様のよろこびの声</span></div>
				</h2>
				<?php echo CONTENT_PAD(40, 30); ?>
				<ul class="top_yorokobi_set">
					<?php
					$arr = array(
						1 => array(
							'h3' => '土地購入代0円、
税金面もかなりお得',
							'h4' => 'マンションから平屋への住み替え',
							't' => '定期借地権付住宅は土地を借りて住むので、土地購入代は0円。他社の新築物件も見学しましたが、土地まで含めると1,000万〜2,000万ほど購入額が違ってきます。毎年払い続ける固定資産税のことも比較してみるとかなりお得ですよね。50年で返還という条件付きですが、50年後にまた今の土地を再契約することがあるかもしれないし、そういった意味でも定期借地権への対抗はあまりなかったです。',
							'n' => '春日井市 Y様（母・息子）'
						)
						//----------------
						,
						2 => array(
							'h3' => '「定期借地」という選択を、
これからの人生に',
							'h4' => '3階建てから平屋への住み替え',
							't' => '土地を借りて家を建てるという方法は聞いたことがありましたが、「定期借地権」という言葉は今回初めて知りました。私たちの場合、今まで住んでいた土地を売って、新しく住み替える土地は50年間使ったら返却することになります。保有する土地は無くなってしまいますが、娘も嫁いだことですし、娘本人からも前向きな意見をもらったので、土地や家を残す必要はないだろうと、将来的なことを踏まえて決断にいたりました。',
							'n' => '岩倉市 Y様（ご夫婦・愛犬1匹）'
						)
						//----------------
						,
						3 => array(
							'h3' => '見学から２週間で契約、とても満足しています',
							'h4' => 'マンションから平屋への住み替え',
							't' => '分譲マンションに住んで27年、様々な設備の修理代金が嵩むようになってました。チラシでたまたま物件を知り、見学からたった２週間で契約。休み日には、ウッドデッキで空を眺めたり、広い庭で友人を呼んでBBQを楽しんでいます。仕事の通勤圏内でありながら憧れだった暮らしが出来てとても満足しています。',
							'n' => '春日井市 I様（母・息子）'
						)
						//----------------
						/*
,4=>array('h3'=>'土地を所有しない定期借地権はむしろ好都合'
				 ,'h4'=>'マンションから平屋への住み替え'
				 ,'t'=>'住んでいたマンションが暮らしにくくなり、住宅情報サイトで知ったこの物件に直ぐに申し込みました。年齢も70歳ですし、子供も居ないし、自分達が暮らしていくには50年間借りられれば十分だと思い、土地を所有しない定期借地権はむしろ好都合。南庭に面した自分の部屋が明るくて気に入っています。'
				 ,'n'=>'一宮市 O様（ご夫婦）'
				 )
				 */
						//----------------
						,
						5 => array(
							'h3' => '自分の時間を存分に楽しく過ごすための家',
							'h4' => 'テイシャクは時代に合った仕組み',
							't' => '働きながら病気がちの母を介護することになり、それからほぼ十年間、介護生活は続きました。母を見送った後、物件を探し始め、たまたま東新住建のテイシャク物件を見つけました。土地はあくまで借りるだけ。最初はこの点に抵抗がありましたが、この住まいなら、だれかに負担をかける心配もなく、思い切り自分の人生を楽しめそうだと思い、購入を決断しました。',
							'n' => '愛知県N様（女性一人暮らし）'
						)
						//----------------
					);
					foreach ($arr as $k => $v) {
						echo '<li><h3 class="pc_br_del">' . WORD_BR($v['h3']) . '</h3>
<h4>' . $v['h4'] . '</h4>
<div class="flex">
<div class="text">' . WORD_BR($v['t']) . '</div>
<div class="photo"><img src="images/top/p-yorokobi-' . $k . '.jpg">' . $v['n'] . '</div>
</div></li>' . chr(10);
					}
					?>
				</ul>
				<?php echo CONTENT_PAD(55, 30); ?>
				<a href="<?php echo $link_list['お客様の声'][0]; ?>" class="vanish_branch">
					<img src="images/top/bnr-voice-B-pc.jpg" class="W100per">
					<img src="images/top/bnr-voice-B-sp.jpg" class="W100per">
				</a>
				<?php echo CONTENT_PAD(90, 25); ?>
				<div class="top_Bline_subt sp_fontP090">
					<h3>こんな人に選ばれています</h3>
				</div>
				<?php echo CONTENT_PAD(30, 'sp/2'); ?>
				<div class="vanish_branch">
					<img src="images/top/p-konnahito-pc.svg" style="width:1183px;">
					<img src="images/top/p-konnahito-sp.svg" style="width:357px;">
				</div>
				<?php echo CONTENT_PAD(40, 'sp/2'); ?>
				<div class="fontP150 LH150 col_555 font_bold"><?php
																$str = '<div class="pc_vanish"></div>';
																echo WORD_BR('シングルママ、DINKs、' . $str . 'シニアご夫婦、兄弟姉妹、' . $str . 'ペットとの暮らしなど、
あこがれの平屋で、' . $str . 'ゆとりある2人暮らしを。'); ?></div>
				<?php echo CONTENT_PAD(80); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box bg_DEF">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(90, 35); ?>
				<h2 class="subt_deco">
					<div class="fontP250 sp_fontP140 sp_LH150 col_04A">
						<span class="beta">
							<div>おふたりのライフワークに合わせた</div>
							<div></div>
						</span><?php echo CONTENT_PAD(10, 'sp/2'); ?><span class="beta">
							<div>フレキシブルで可変性のある間取り</div>
							<div></div>
						</span>
					</div>
				</h2>
				<?php echo CONTENT_PAD(125, 35); ?>
				<div class="vanish_branch">
					<img src="images/top/ofutari-life-B-pc.svg" class="mgnAuto" style="width:1152px;">
					<img src="images/top/ofutari-life-B-sp.svg" class="mgnAuto" style="width:360px;">
				</div>
				<?php echo CONTENT_PAD(90, 60); ?>
				<div class="fontP150 sp_fontP100 LH200 font_bold">
					<?php echo WORD_BR('「ゆったりと寛げるLDKがほしい」
「洋室を広くして多目的なフロアにしたい」など
完成物件の間取りを変えることができます'); ?>
				</div>
				<?php echo LOCAL_BNR_ZEROYEN(); ?>
				<?php echo CONTENT_PAD(60, 35); ?>
			</div>
		</div>
		<!-- *** -->
		<div class="content_box">
			<div class="Wbase W1200">
				<?php echo CONTENT_PAD(70, 'sp/2'); ?>
				<div class="subt_deco font_bold fontP175 sp_fontP125">
					<div>先行き不透明な時代の賢い選択。</div>
					<?php echo CONTENT_PAD(10, 'sp/2'); ?>
					<div>それが定期借地権付きの住宅です。</div>
				</div>
				<?php echo CONTENT_PAD(25); ?>
				<?php echo TELBOX(); ?>
				<?php echo CONTENT_PAD(60); ?>
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
</body>

</html>