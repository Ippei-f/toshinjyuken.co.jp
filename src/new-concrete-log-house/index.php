<?php
$kaisou = '';
$p_title = 'TOP';
include $kaisou . '_assets/php/basic.php';
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php
	TEMP_META();
	$rand = '?' . rand();
	echo '<link href="' . $kaisou . '_assets/css/top.css' . $rand . '" rel="stylesheet" type="text/css">' . PHP_EOL;
	?>
	<link href="_assets/js/slick/slick.css" rel="stylesheet" type="text/css">
	<script src="_assets/js/slick/slick.js" type="text/javascript"></script>
</head>

<body class="borderbox">
	<?php TEMP_PAGETOP(); ?>
	<div align="center">
		<!-- * -->
		<?php TEMP_HEADER(); ?>
		<!-- ** -->
		<main>
			<section class="lp_head">
				<div class="Wbase">
					<a href="https://www.toshinjyuken.co.jp/" target="_blank"><img src="_assets/img/common/logo-toushin.svg" alt="東新住建"></a>
					<a><img src="_assets/img/common/logo-lp.png" alt="ヘーベル パワーボード　by Asahi Kasei"></a>
				</div>
			</section>

			<div class="top_bnr_50th">
				<a href="https://www.toshinjyuken.co.jp/kodate/news.php?id=177" target="_blank">
					<img src="_assets/img/top/bnr-50th-1.jpg" alt="おかげさま来年7月で50周年カウントダウンフェア" />
				</a>
			</div>

			<!-- *** -->
			<section class="top_sec01">
				<div class="Wbase">
					<div class="catch">
						<div>新たなる住宅への挑戦。</div>
					</div>
					<h1 class="logo"><img src="_assets/img/common/logo-NCLH.svg" alt="Newコンクリートログハウス"></h1>
				</div>
			</section>
			<!-- *** -->
			<?php
			function LOCAL_MODELHOUSE()
			{
				global $link_parts;
				$link = '../kodate/search';
				$blank = $link_parts['blank'] . $link_parts['noref'];
			?>
				<section class="top_modelhouse c_pad">
					<div class="Wbase" w="960">
						<?php echo IMG_TAG_PCSP('top/MH-title.svg'); ?>
						<div class="bnr">
							<?php
							echo '<a href="' . $link . '-detail.php?id=361' . $blank . '" class="ov_white">' . IMG_TAG_PCSP('top/MH-bnr1.jpg', 'alt="尾張地区 モデルハウス稲沢国府宮"') . '</a>' . PHP_EOL;
							echo '<a href="' . $link . '-detail.php?id=295' . $blank . '" class="ov_white">' . IMG_TAG_PCSP('top/MH-bnr2.jpg', 'alt="三河地区 モデルハウス豊田金谷町"') . '</a>' . PHP_EOL;
							//echo '<a href="'.$link.'.php?search=エリア,三河エリア'.$blank.'" class="ov_white">'.IMG_TAG_PCSP('top/MH-bnr2.jpg','alt="三河地区 モデルハウス豊田金谷町"').'</a>'.PHP_EOL;
							//｜ブランド,Newコンクリートログハウス
							?>
						</div>
					</div>
				</section>
			<?php
			}
			LOCAL_MODELHOUSE();
			?>
			<!-- *** -->
			<section class="top_sec02">

				<!-- Wbase -->
				<div class="Wbase">
					<div class="font_pw" style="font-size: min(25px,max(13px,calc(1vw * 13 / 3.75)));">私たちの家は、強く、長寿命で、家族を守る家。<br>自然素材にこだわり、五感に響く空間を創り上げます。<br><br>東新住建が家づくりで最も大切にしているのは、<br>お客様に永く住み続けていただくこと。<br><br>住み始めたその先の変化まで見据え、<br class="pc_vanish">安心の住まいをお届けします。</div>
					<?php echo ANCHOR('alc') ?>
					<div class="tokuchou">
						<h3 style="font-size: min(35px,max(15px,calc(1vw * 15 / 3.75)));">ALCコンクリートの４つの特徴</h3>
						<div class="icon">
							<img src="_assets/img/top/icon-strong.svg">
							<img src="_assets/img/top/icon-light.svg">
							<img src="_assets/img/top/icon-quiet.svg">
							<img src="_assets/img/top/icon-beauty.svg">
						</div>
					</div>
				</div>

				<!-- Wbase -->
				<div class="Wbase">
					<div class="subt"><img src="_assets/img/top/icon-strong.svg">
						<h2 class="font_pw">従来のコンクリートの約10倍！
							高度な断熱性能を実現。</h2>
					</div>
				</div>
				<div class="c_pad">
					<div class="Wbase">

						<div class="flex sp_gap15">
							<div order="2">ALCコンクリート外壁の厚みは37mm。その内部にはたくさんの気泡が形成されています。この空気の層が熱を通しにくい性質を生み出します。</div>
							<div order="1">
								<div class="flex2 vanish_branch" A1>
									<img src="_assets/img/top/sec02-A1-pc.jpg">
									<div class="pc_vanish"><img src="_assets/img/top/sec02-A1a-sp.jpg"></div>
									<div class="pc_vanish"><img src="_assets/img/top/sec02-A1b-sp.jpg"></div>
								</div>
							</div>
						</div>
						<div class="flex sp_gap15">
							<div order="2" class="t">抜群の断熱性で快適な暮らしを守ります。室内の空調効率が良いので省エネにも繋がります。<div class="flex2 sp_vanish" A2><img src="_assets/img/top/sec02-deco1.svg"><img src="_assets/img/top/sec02-deco2.svg"></div>
							</div>
							<div order="1"><?php echo IMG_TAG_PCSP('top/sec02-A2.jpg'); ?><div class="mini t pc_vanish">左の外壁材は外気によって内側まで冷やされているのに対し、右のALCコンクリートは熱を保っているのが分かります。</div>
							</div>
						</div>
						<h3 class="beta">火を寄せ付けない外壁。</h3>
						<div class="flex" A3>
							<div order="1" class="t">
								<div class="pc_vanish"><img src="_assets/img/top/sec02-A3-sp.png"></div>
								<div class="pc_vanish">
									<h4>驚きの耐火性を実現。</h4>
								</div>外壁が直接火にさらされても、内側は引火危険温度まで上がりにくく、類焼の危険性を減らせます。<div class="sp_vanish"><img src="_assets/img/top/sec02-A3-pc.png" class="mgn"></div>
							</div>
							<div order="2" tume>
								<div><img src="_assets/img/top/sec02-A4-pc.png"></div>
								<div class="mini t">図の条件には、風向きや風速など風の条件は含まれていません。目安としてご覧ください。一般に家屋火災は1000℃を超え、3ｍ離れた位置でも約840℃に達します。</div>
							</div>
						</div>
						<div class="movie">
							<?php
							$arr = array(
								1 => array('防火性を動画で解説', 'https://api01-platform.stream.co.jp/apiservice/plt3/NDAwOQ%3d%3d%23NDE%3d%23780%23438%230%2339E28099DC00%23O29mZjsxMDsxMA%3d%3d%23'),
								2 => array('防耐火実験を動画で解説', 'https://api01-platform.stream.co.jp/apiservice/plt3/NDAwOQ%3d%3d%23MTk%3d%23500%232d0%230%2333E28098DC00%23O29mZjsxMDsxMA%3d%3d%23')
							);
							foreach ($arr as $k => $v) {
								echo '<div><img src="_assets/img/top/sec02-movie-' . $k . '.svg" alt="' . $v[0] . '"><a href="' . $v[1] . $link_parts['blank'] . $link_parts['noref'] . '"><img src="_assets/img/top/sec02-movie-btn.svg"></a></div>' . PHP_EOL;
							}
							?>
						</div>
					</div>
				</div>

				<!-- Wbase -->
				<div class="Wbase">
					<div class="subt"><img src="_assets/img/top/icon-light.svg">
						<h2 class="font_pw">水に浮くほど軽い！<br class="sp_vanish">この軽さが<br class="pc_vanish">地震時の建物への負担を軽減。</h2>
					</div>
				</div>
				<div class="c_pad">
					<div class="Wbase">

						<div class="flex">
							<div order="1"><?php echo IMG_TAG_PCSP('top/sec02-B1.png'); ?><div class="t pc_vanish">※気乾比重0.6（水を１とした場合）</div>
								<div class="t">壁の質量が大きいほど、地震の際に家にかかる負担は大きくなります。水に浮くほどのALCコンクリートは、地震時の建物への負担を軽減します。また、揺れによる衝撃を目地で吸収する取付け構造なので、試験でも安全性が確認されています。</div>
							</div>
							<div order="2">
								<div class="flex2 vanish_branch" B2>
									<img src="_assets/img/top/sec02-B2-pc.jpg">
									<div class="pc_vanish"><img src="_assets/img/top/sec02-B2a-sp.jpg">
										<h4>面内変形性能試験</h4>
									</div>
									<div class="pc_vanish"><img src="_assets/img/top/sec02-B2b-sp.jpg">加力変形後の目地部詳細：加力により目地部にズレが生じているが、クラックの発生はない。</div>
								</div>
							</div>
						</div>
						<h3 class="beta">強烈な風にも耐える強度を誇ります。</h3>
						<div class="flex">
							<div order="2" class="sp_vanish"><img src="_assets/img/top/sec02-B3-pc.jpg"></div>
							<div order="1">
								<div class="flex2 vanish_branch" B3><img src="_assets/img/top/sec02-B3-sp.jpg"><img src="_assets/img/top/sec02-B4-pc.jpg"><img src="_assets/img/top/sec02-B4-sp.jpg"></div>
								<div class="t">パワーボード内のメタルラス網が強度を充分に補完して、基準風速38m/sにも耐えられる強度を保ちます。基準風速38m/sは瞬間風速57m/s相当。瞬間風速54m/sではトラックも横転する強風ですがそれ以上の風に耐えられる強度を保持します。</div>
							</div>
						</div>

					</div>
				</div>

				<!-- Wbase -->
				<div class="Wbase">
					<div class="subt"><img src="_assets/img/top/icon-quiet.svg">
						<h2 class="font_pw">駅ホームの防音壁に使用されるほど<br class="sp_vanish">優れた遮音性能。</h2>
					</div>
				</div>
				<div class="c_pad">
					<div class="Wbase">

						<div class="flex sp_gap15">
							<div class="t" order="2">駅のホームの防音壁としても用いられるほどの優れた遮音性能。自動車の騒音などを反射・吸収して住む人にストレスを与えません。生活音も漏らすことなくプライバシーを守ることができます。</div>
							<div order="1"><?php echo IMG_TAG_PCSP('top/sec02-C1.svg'); ?></div>
						</div>
						<div class="flex sp_gap15">
							<div class="t" order="2">
								<div class="pc_vanish">
									<h4>外壁材単体での遮音効果。</h4>※単体遮音性能は当社実験値です。
								</div>ALCコンクリート単体でも優れた遮音性を保ちます。一般的に音が10dB低減すると、半分の音量になったように感じると言われています。ALCコンクリートは単体でも約30dBの騒音を低減します。
							</div>
							<div order="1"><?php echo IMG_TAG_PCSP('top/sec02-C2.png'); ?></div>
						</div>

					</div>
				</div>


				<!-- Wbase -->
				<div class="Wbase">
					<div class="subt"><img src="_assets/img/top/icon-beauty.svg">
						<h2 class="font_pw">60年間張り替えが不要。
							永く美しい外観を保ちます。</h2>
					</div>
				</div>
				<div class="c_pad">
					<div class="Wbase">

						<div class="flex sp_gap15">
							<div order="1" w="317"><?php echo IMG_TAG_PCSP('top/sec02-D1.jpg'); ?></div>
							<div order="2" w="623">
								<div class="flex2 t" D2>ALCコンクリートの耐久年数は60年以上。経年劣化が非常に少ないため、大がかりな補修も必要なく、塗装を直すだけで輝きを取り戻すことができます。経済的にも環境にもやさしい外壁材です。<img src="_assets/img/top/sec02-deco2.svg" class="sp_vanish"></div>
								<div><img src="_assets/img/top/sec02-D2-pc.jpg" class="mgn"></div>
								<div class="mini t">※耐久性（年数）…塗り替えなどの適切なメンテナンスをもとに張り替え不要と推定される年数で、保証値ではありません。なお、塗り替えの時期は使用する塗装の種類によって異なります。</div>
								<div class="flex2 t" D3>トバモライトと呼ばれる自然界に存在する鉱物は、水や熱で化学変化を起こさない非常に安定した物質です。ALCコンクリートはトバモライトの結晶を内部に多数含むことで熱や酸化に強い構造となっています。<?php echo IMG_TAG_PCSP('top/sec02-D3.jpg', 'class="sp_border"'); ?></div>
							</div>
						</div>
						<h3 class="beta">地球環境にやさしい無機建材を使用。</h3>
						<div class="flex">
							<div order="1">
								<div><img src="_assets/img/top/sec02-D4-pc.jpg"></div>
								<div class="t">ALCコンクリートは、自然素材を使用した無機建材。シックハウス症候群の原因物質やアスベストは一切含みません。廃材から作られるリサイクル材料は、住環境や農業で使用される環境に優しい原料です。田畑の質の向上や家畜の飼育環境の改善にも利用されています。</div>
							</div>
							<div order="2" tume>
								<div><img src="_assets/img/top/sec02-D5-pc.jpg" class="mgn sp_border"></div>
								<div class="t">製造工程で出る端材や集塵粉、規格外品などをもう一度粉砕し、再生原材料としてリサイクルしています。それにより、原材料のムダを大幅に省き、自然素材を大切に製品化しています。</div>
							</div>
						</div>

						<?php
						function LOCAL_SLIDE_SET($data)
						{
							$data['photo-set'] = '';
							$data['photo-cnt'] = count($data['photo']);
							foreach ($data['photo'] as $v) {
								$data['next'] = $data['title'][0] . '-' . (($v % $data['photo-cnt']) + 1);
								$data['photo-set'] .= '<img src="_assets/img/slide/s' . $data['title'][0] . '-' . $v . '.jpg" next="' . $data['next'] . '">';
							}
							echo '<div class="slide_set" num="' . $data['title'][0] . '">
<div class="title" w1="' . $data['title'][2] . '" w2="' . $data['title'][3] . '">' . IMG_TAG_PCSP('slide/title' . $data['title'][0] . '.svg', 'alt="' . $data['title'][1] . '"') . '</div>
<div class="slick">' . $data['photo-set'] . '</div>
</div>' . PHP_EOL;
						?>
							<script>
								$(window).load(function() {
									$('.slide_set[num="<?php echo $data['title'][0]; ?>"] .slick').slick({
										autoplay: false,
										prevArrow: '<div class="slide-arrow prev-arrow"><img src="_assets/img/slide/arrow.svg"></div>',
										nextArrow: '<div class="slide-arrow next-arrow"><img src="_assets/img/slide/arrow.svg"></div>',
										dots: false,
										<?php
										/*
		centerMode:true,
		centerPadding:'0px',
		variableWidth: true,
		*/
										?>
										infinite: true,
										swipeToSlide: true,
										pauseOnFocus: false,
										<?php
										switch (true) {
											case ($data['photo-cnt'] <= 2):
										?>
												slidesToShow: 1,
											<?php
												break;
											case ($data['photo-cnt'] >= 3):
											?>
												slidesToShow: 3,
												responsive: [{
														breakpoint: 1000,
														settings: {
															slidesToShow: 2,
														}
													},
													{
														breakpoint: 640,
														settings: {
															slidesToShow: 1,
														}
													},
												]
										<?php
												break;
										}
										?>
									});
								});
							</script>
						<?php
						}
						LOCAL_SLIDE_SET(array(
							'title' => array(1, '当社施工事例', 202, 142),
							'photo' => array(1, 2, 3, 4, 5)
						));
						?>


						<div class="ribbon"><?php echo IMG_TAG_PCSP('top/ribbon.svg', 'alt="東新住建は、2016年より旭化成建材のALC外壁を採用。「快適」と「環境保全」を両立した家づくりを追求し続けています。"'); ?></div>

						<?php
						function LOCAL_VOICE_SET($num, $url, $alt)
						{
							/*
	echo '<div class="voice_set">
'.IMG_TAG_PCSP('top/voice-title.svg','alt="お客様の声"').'
<a href="../kodate/voice.php?brand='.$url.'" class="ov_white">'.IMG_TAG_PCSP('top/voice-bnr'.$num.'.png','alt="'.$alt.'"').'</a>
</div>'.PHP_EOL;
	*/
						}
						LOCAL_VOICE_SET(1, 5, '選んで良かった ALCコンクリートの外壁が選ばれる理由がここに！');
						?>

					</div>
				</div>
			</section>
			<!-- *** -->
			<section class="top_sec03 bg_wall">
				<div class="Wbase bg"></div>
				<div class="Wbase in">
					<h2>強さと温もり、両方を叶える家。</h2>
					<?php echo IMG_TAG_PCSP('top/sec03.webp'); ?>
				</div>
			</section>
			<!-- *** -->
			<section class="top_sec04 c_pad">
				<div class="Wbase">
					<div class="catch font_pw">外断熱だから実現できる
						ツーバイフォーの性能を備えながら
						木の温もりに包まれた木地仕上げの内壁</div>
					<div class="p_set">
						<div order="2">
							<div class="p1"><img src="_assets/img/top/sec04-1-1.jpg"><img src="_assets/img/top/sec04-1-2.jpg"></div>
							<div class="cap">剥き出しの木材に包まれた家は他にはないエコロジカルな空間を演出します。自由な発想で作り込める居住空間は、あなた色に染まることでしょう。</div>
						</div>
						<div class="p2" order="1"><img src="_assets/img/top/sec04-2.jpg"></div>
					</div>
					<?php
					LOCAL_SLIDE_SET(array(
						'title' => array(2, '木地仕上げの施工事例', 274, 147),
						'photo' => array(1, 2, 3, 4, 5)
					));
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

						.bnr_voice {
							padding-top: 40px;
						}

						.bnr_voice a {
							position: relative;
							width: min(510px, max(345px, calc(1vw * 345 / 3.75)));
							height: min(255px, max(172px, calc(1vw * 172 / 3.75)));
							background-color: #ea5902;
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
							display: grid;
							align-items: center;
						}

						.bnr_voice a>.frame {
							border: solid min(4px, max(2px, calc(1vw * 2 / 3.75))) #000;
						}

						.bnr_voice a>.frame img {
							margin: auto;
							margin-left: calc(1% * 90 / 5.02);
							width: calc(1% * 393 / 5.02);
							max-width: max(266px, calc(1vw * 266 / 3.75));
							max-height: max(142px, calc(1vw * 142 / 3.75));
						}

						.bnr_voice a>.frame+div img {
							height: 100%;
						}
					</style>
					<div class="bnr_voice content_box"><a href="<?php echo $link_list['外部:お客様の声'][0]; ?>">
							<div class="frame"><img src="_assets/img/bnr/bnr_voice-photo.jpg"></div>
							<div class="vanish_branch">
								<img src="_assets/img/bnr/bnr_voice-pc.svg">
								<img src="_assets/img/bnr/bnr_voice-sp.svg">
							</div>
						</a></div>
					<!-- *** -->
					<?php
					LOCAL_VOICE_SET(2, 21, '暮らして快適 木地仕上げの家が選ばれるにはわけがある！');
					?>
				</div>
			</section>
			<!-- *** -->
			<?php LOCAL_MODELHOUSE(); ?>
		</main>
		<script>
			jQuery(window).load(function() {
				var slide_img = $('.slide_set .slick .slick-slide img');
				slide_img.on('dragstart', function() {
					$(this).addClass('drag');
				});
				slide_img.on('mouseleave', function() {
					$(this).removeClass('drag');
				});
				slide_img.on('click', function() {
					if (!$(this).hasClass('drag')) {
						jQuery('.pop .frame').html($(this).clone());
						jQuery('.pop .frame img').removeAttr('style');
						jQuery('.pop .dark').fadeIn();
					}
					$(this).removeClass('drag');
				});
				jQuery('.pop .dark').on('click', function(e) {
					var target = e.target;
					var container = $('.frame').get(0);
					if (!$.contains(container, target)) {
						$(this).fadeOut();
					} else {
						next = $(this).find('img').attr('next');
						next = $('.slide_set .slick .slick-slide img[src*="s' + next + '"]').clone();
						//console.log(next);
						jQuery('.pop .frame').html(next);
						jQuery('.pop .frame img:nth-of-type(n+2)').remove();
						jQuery('.pop .frame img').removeAttr('style');
					}
				});
			});
		</script>
		<div class="pop">
			<div class="dark">
				<div class="flex">
					<div class="frame"><?php //echo ASSET_IMG('common/pop-close.svg'); 
										?></div>
				</div>
			</div>
		</div>
		<!-- ** -->
		<?php TEMP_FOOTER(); ?>
		<!-- * -->
	</div>
	<?php TEMP_BODYEND(); ?>
</body>

</html>