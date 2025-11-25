<?php
//<meta charset="utf-8">

//◆ PC・スマホ分岐 ◆
/*
$HUA=$_SERVER['HTTP_USER_AGENT'];
//iPhone Android 等 スマートフォン
if (preg_match("/iPhone/",$HUA) ||
    preg_match("/iPod/",$HUA) ||    preg_match("/Android/",$HUA)) {
		$PCbrowser=false;//スマホ仕様
}
else{$PCbrowser=true;//PC仕様
}
*/

//◆エラー表示設定
error_reporting(E_ERROR | E_PARSE);


//◆共通変数・配列

$dir_c =		$kaisou . 'images/common/';
$dir_t =		$kaisou . 'images/top/';
$dir_sns =	$kaisou . 'system/';

$t_blank = '" target="_blank';

$comp_data = array(
	'HP名'	=> '東新住建の家'
	//-----
	,
	'本社名' => '東新住建',
	'〒'		=> '492-8628',
	'住所'	 => '愛知県稲沢市高御堂一丁目3-18(稲沢本店)',
	'TEL'	 => '0800-170-5104'
	//-----
	,
	'MAIL' => array(
		'customersupport@toshinjyuken.co.jp',
		'info@toshinjyuken.co.jp'
		//,'maasa-katou@toshinjyuken.co.jp'
	)
	//,'MAIL'=>'mirror'//test
	,
	'MAIL-noreply' => 'customersupport@toshinjyuken.co.jp'
	//,'MAIL-noreply'=>'no-reply@toshinjyuken.co.jp'
	,
	'MAIL-sender' => 'customersupport@toshinjyuken.co.jp' //送信者固定
	//-----
	,
	'copy'	 => 'Copyright (C) TOSHIN JYUKEN All Rights Reserved.'
	//-----
	,
	'数値' => array(
		'累計棟数' => 24000
	)
);

$democheck = $_SERVER['SCRIPT_FILENAME'];
switch (true) {
	case (strpos($democheck, 'showa') !== false):
		$democheck = 'showa';
		$comp_data['MAIL'] = 'mirror'; //送信先ミラー化
		break;
	case (strpos($democheck, 'formdemo') !== false):
		$democheck = 'formdemo';
		break;
	/*
	//20201125に本サーバー化するため、デモではなくなる。
	case ($_SERVER['SERVER_ADDR']=='160.251.9.220'):
	$democheck='demoserver';
	$comp_data['MAIL']='mirror';//送信先ミラー化
	break;
	*/
	default:
		$democheck = '';
}


require $kaisou . "temp_php/data-link.php"; //リンク先の情報は別ファイルにまとめ

require $kaisou . "temp_php/data-svg.php"; //可変SVGの情報は別ファイルにまとめ

require $kaisou . "temp_php/data-area.php"; //エリア情報は別ファイルにまとめ

$temp_meta = '';
//グーグルタグマネージャー
if ($democheck == '') {
	$temp_meta .= "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PRRJRDR');</script>
<!-- End Google Tag Manager -->" . PHP_EOL;
	//IMタグ
	$temp_meta .= "<script type=\"text/javascript\">
 (function(w,d,s){
  var f=d.getElementsByTagName(s)[0],j=d.createElement(s);
  j.async=true;j.src='https://dmp.im-apps.net/js/1013764/0001/itm.js';
  f.parentNode.insertBefore(j, f);
 })(window,document,'script');
</script>" . PHP_EOL;
}
//キーワード
$temp_meta .= '<meta name="keywords" content="一軒家,物件情報,愛知県,名古屋市,岐阜県,家,新築,一戸建て,分譲住宅,建売,売り建て,売り土地,土地探し,分譲マンション,東新住建">
<meta name="description" content="愛知県・名古屋市・岐阜県で新築一戸建て、建売、分譲住宅の豊富な物件一覧はこちら。注文住宅と分譲住宅のメリットをあわせ持ち、内装オーダーできる広い家なので、土地探しにお困りの方もおまかせください。">' . PHP_EOL;
/*
<meta name="description" content="愛知県、名古屋市、岐阜県で新築一戸建て、建売、分譲住宅、駅近の土地探し、駅近の分譲マンション情報なら東新住建におまかせください。">
*/
if ($democheck != '') {
	$temp_meta .= '<!-- DEMOTYPE:' . $democheck . ' -->' . PHP_EOL;
	if (!is_array($comp_data['MAIL'])) {
		$temp_meta .= '<!-- MAIL:' . $comp_data['MAIL'] . ' -->' . PHP_EOL;
	}
	$temp_meta .= '<meta name="robots" content="noindex,nofollow">' . PHP_EOL; //◆◆◆デモページのみ検索拒否◆◆◆
}


//viewport
$HUA = $_SERVER['HTTP_USER_AGENT'];
switch (true) {
	case preg_match("/iPad/", $HUA):
		$temp_meta .= '<!-- viewport=iPad -->
	<meta name="viewport" content="width=1300px">' . chr(10);
		break;
	default:

		$temp_meta .= '<!-- viewport=normal -->
<meta name="viewport" content="width=device-width" />' . chr(10);
		/* $temp_meta.='<!-- viewport=normal -->
<meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
<meta name="viewport" content="width=414px,initial-scale=0.48" />'.chr(10); */
}

//◆タイトル
$temp_title = '愛知・岐阜の新築一戸建て｜' . $comp_data['HP名'];
//$temp_title=$comp_data['HP名'];


//◆JAVA
$temp_java = '<script src="' . $kaisou . 'js/jquery.v1.11.1.min.js" type="text/javascript"></script>
<script src="' . $kaisou . 'js/common.js" type="text/javascript"></script>' . chr(10);
//start Promolayer JS code
//~20230602差し替え
$temp_java .= '<!-- start Promolayer JS code--><script type="module" src="https://modules.promolayer.io/index.js" data-pluid="z8hsh4Gf3jZDTv5WX9uyqn1JdvO2" data-workspace="aDuOQM5TfZJUmgcFeYKR" crossorigin async></script><!-- end Promolayer JS code-->' . chr(10);
/*
$temp_java.='<!-- start Promolayer JS code-->
<script type="module" src="https://modules.promolayer.io/index.js" data-pluid="x599nGnQoUTcKWykmww9oz5Agj13" crossorigin async></script>
<!-- end Promolayer JS code-->'.chr(10);
*/

//◆グーグルマップJSファイル読み込み
$key = 'AIzaSyA_i_iJYycEUupc7WiJz4UsVS3QeryomzE';
$temp_googlemap_js = '<script src="' . $kaisou . 'js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=' . $key . '&callback=initMap"></script>' . chr(10);

//◆ページトップ
$temp_pagetop = '';
if ($democheck == '') {
	$temp_pagetop .= '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PRRJRDR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->' . PHP_EOL;
}
$temp_pagetop = '<a name="pt" id="pt"></a><div id="pagetop_btn"><a href="#pt" class="bg_cover bright"></a></div>' . PHP_EOL;


//◆ヘッダ
function HEADER_MENU_PC($arr = array())
{
	global $link_list;
	$str = '';
	foreach ($arr as $v) {
		$a = $link_list[$v];
		switch (true) {
			case isset($a['hmenu']):
				$t = $a['hmenu'];
				break;
			case isset($a['menu']):
				$t = $a['menu'];
				break;
			default:
				$t = $a[1];
		}
		$str .= '<td><a ' . (($a[0] != '') ? 'href="' . $a[0] . '"' : 'style="opacity: 0.5;"') . '><div class="text">' . $t . '</div></a></td>' . chr(10);
	}
	return $str;
}
function HEADER_MENU_SP2($arr = array())
{
	global $link_list;
	$str = '';
	foreach ($arr as $v) {
		$a = $link_list[$v];
		if (!empty($a['menu-en'])) {
			$a['en'] = $a['menu-en'];
		} else if (empty($a['en'])) {
			$a['en'] = $a[1];
		}
		if (!empty($a['menu'])) {
			$a['jp'] = $a['menu'];
		} else if (empty($a['jp'])) {
			$a['jp'] = $a[1];
		}

		$first = substr($a['en'], 0, 1);
		$second = substr($a['en'], 1);
		$a['en'] = '<b>' . $first . '</b>' . $second;

		$str .= '<li><a href="' . $a[0] . '">
<div class="en font_DINOT_L"><span>' . $a['en'] . '</span></div>
<div class="text">' . $a['jp'] . '</div>
</a></li>' . chr(10);
	}
	return $str;
}
function HEADER_SUBMENU($arr = array())
{
	global $dir_c, $link_list;
	$str = '';
	foreach ($arr as $k => $v) {
		if (!isset($v['text'])) {
			$v['text'] = $k;
		}
		$color = isset($v['color']) ? ' class="' . $v['color'] . '"' : '';
		$str .= '<td' . $color . '><a href="' . $link_list[$k][0] . '"><div class="icon"><img src="' . $dir_c . $v[0] . '.svg"></div><div class="text">' . $v['text'] . '</div></a></td>' . chr(10);
	}
	return $str;
}
function HEADER_SNSBTN()
{
	global $link_list, $dir_c, $p_type;
	$res = '<div class="btn_insta H_head">' . PHP_EOL;
	$a = array(
		'insta',
		'youtube',
		'LINE'
	);
	foreach ($a as $v) {
		$res .= '<a href="' . $link_list[$v][0] . '">';

		// ページ種別ごとの画像出し分け
		if ($p_type === 'index') {
			// TOP：SPは白、PCは黒の想定
			$res .= '<img src="' . $dir_c . 'icon-' . $v . '-W.svg" class="sp_vanish"><img src="' . $dir_c . 'icon-' . $v . '-K.svg" class="pc_vanish">';
		} elseif ($p_type === 'bho') {
			// bho専用：黒
			$res .= '<img src="' . $dir_c . 'icon-' . $v . '-K.svg">';
		} else {
			// 下層：通常
			$res .= '<img src="' . $dir_c . 'icon-' . $v . '.svg">';
		}

		$res .= '</a>' . PHP_EOL;
	}
	$res .= '</div>' . PHP_EOL;
	return $res;
}
$temp_header = '<header class="l-header">
				<div class="l-header-inner">
					<div class="l-header-flex">
						<div class="l-header__logo">
							<a href="index.php">
								<img src="images/common/logo-2025.svg" class="logo ver2025" title="東新住建の家" /></a>
						</div>
						<div class="l-header__sns">
							<ul>
								<li class="insta">
									<a href="https://www.instagram.com/toshinjyuken_no_ie/" target="_blank">
										<img src="images/common/icon-insta-gray.svg" />
									</a>
								</li>
								<li class="youtube">
									<a href="https://www.youtube.com/@toshinjyuken_house" target="_blank">
										<img src="images/common/icon-youtube-gray.svg" />
									</a>
								</li>
								<li class="line">
									<a href="https://lin.ee/v4vz5KD" target="_blank">
										<img src="images/common/icon-LINE-gray.svg" />
									</a>
								</li>
							</ul>
						</div>
					</div>
					<nav class="gnav sp_vanish">
						<ul class="gnav__list">
							<li class="gnav__item">
								<a href="search.php"><div class="text">物件情報</div></a>
							</li>
							<li class="gnav__item">
								<a href="index.php#brand"><div class="text">ブランドコンセプト</div></a>
							</li>
							<li class="gnav__item">
								<a href="structure.php"><div class="text">東新住建の家づくり</div></a>
							</li>
							<li class="gnav__item">
								<a href="qa.php"><div class="text">Q&A</div></a>
							</li>
							<li class="gnav__item">
								<a href="lifestyle.php"><div class="text">コラム</div></a>
							</li>
							<li class="gnav__item">
								<a href="voice.php"><div class="text">お客様の声</div></a>
							</li>
						</ul>
					</nav>
					<!--  -->
					<div class="menubtn pc_vanish">
						<div>
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>

					<!-- -->
					<div class="clear"></div>
					<div class="menu_sp font_sizebase">
						<div class="pad">
							<ul class="iconbtn LH125">
								<li class="W">
									<a href="search.php"
										><div class="icon"><img src="images/common/icon-search2.svg" /></div>
										<div class="text">物件情報</div></a
									>
								</li>
								<li class="O">
									<a href="member.php"
										><div class="icon"><img src="images/common/icon-member.svg" /></div>
										<div class="text">会員登録</div></a
									>
								</li>
							</ul>

							<ul class="menu_sp__list">
								<li>
									<a href="index.php#brand">ブランドコンセプト</a>
								</li>
								<li>
									<a href="bunjo-halforder.php"
										>インテリアセレクト<br />
										ハーフオーダー</a
									>
								</li>
								<li>
									<a href="structure.php">東新住建の家づくり</a>
								</li>
								<li>
									<a href="qa.php">Q & A</a>
								</li>
								<li>
									<a href="lifestyle.php">コラム</a>
								</li>
								<li>
									<a href="voice.php">お客様の声</a>
								</li>
								<li>
									<a href="news.php">NEWS</a>
								</li>
								<li>
									<a href="sdgs.php">SDGsへの取り組み</a>
								</li>
								<li class="w-100">
									<a href="contact.php">ご来場予約・お問い合わせ・資料請求</a>
								</li>
							</ul>
							<div class="menu_sp__sns">
								<ul>
									<li class="insta">
										<a href="https://www.instagram.com/toshinjyuken_no_ie/" target="_blank">
											<img src="images/common/icon-insta-gray2.svg" />
										</a>
									</li>
									<li class="youtube">
										<a href="https://www.youtube.com/@toshinjyuken_house" target="_blank">
											<img src="images/common/icon-youtube-gray2.svg" />
										</a>
									</li>
									<li class="line">
										<a href="https://lin.ee/v4vz5KD" target="_blank">
											<img src="images/common/icon-LINE-gray2.svg" />
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- -->
				</div>
			</header>';


//◆その他商品ラインナップ
function BOTTOMBNR_MENU($arr = array())
{
	global $dir_c, $link_list;
	$dir = $dir_c . 'bottom/2021/';
	$str = '';
	foreach ($arr as $n => $v) {
		if (!is_array($v)) {
			$v = array($v);
		}
		$k = $v[0];
		$str .= '<a href="' . $link_list[$k][0] . '"><div class="pic"><img src="' . $dir_c . 'clear-W228H217.png" style="background-image: url(' . $dir . 'p' . $n . '.jpg);"></div><div class="text" style="background-image: url(' . $dir . 'b' . $n . '.svg);"></div></a>' . chr(10);
		/*
		<img src="'.$dir.'n'.sprintf('%02d',$v[1]).'.svg" class="num">
		*/
	}
	return $str;
}

/*
//旧ver
$temp_bottom_bnr='<div class="bottom_bnr"><div class="W1000 Wmax100per mgnAuto">
<h3>ブランドラインナップ</h3>
<div class="flex bg_cover">
'.BOTTOMBNR_MENU(array
(8=>array('東新住建-発電シェルター','')
,7=>array('東新住建-平屋',30)
,6=>array('東新住建-テイシャク',20)
,3=>array('東新住建-そだつ',35)
,1=>array('東新住建-DUP',40)
//,2=>array('東新住建-樹流',3)
//,5=>array('東新住建-DUPHILLS',30)
//,4=>array('東新住建-風致',30)
)).'
</div>
</div></div>'.chr(10);
*/

/*　フッター各サイトへのリンクバナー
$temp_bottom_bnr = '<section class="brand_concept2025">
<div class="type_bottom"><div class="Wbase">
<h2><span>BRAND CONCEPT</span></h2>
<dl class="brand_list">' . PHP_EOL;
foreach ($link_list_brand_concept as $k => $v) {
	$temp_bottom_bnr .= '<dd><a href="' . $link_list['東新住建-' . $k][0] . '" class="photo"><img src="' . $kaisou . 'images/common/bottom/2025/bnr-' . $v['bnr'] . '.png"></a></dd>' . PHP_EOL;
}
$temp_bottom_bnr .= '</dl>
</div></div>
</section>' . PHP_EOL;
*/


//◆フッタ
function FOOTER_MENU($arr = array())
{
	global $dir_c, $link_list;
	$str = '';
	foreach ($arr as $arr2) {
		$str2 = '';
		//$lenmax=$len=0;
		foreach ($arr2 as $v) {
			$add = '';
			if ($link_list[$v][0] != '') {
				$add = 'href="' . $link_list[$v][0] . '"';
			} else {
				$add = 'style="color:rgba(255,255,255,0.5);"';
			}
			//$len=mb_strlen($link_list[$v][1],'UTF-8');
			//if($lenmax<$len){$lenmax=$len;}
			switch (true) {
				case (!empty($link_list[$v]['menu'])):
					$text = $link_list[$v]['menu'];
					break;
				case (!empty($link_list[$v]['fmenu'])):
					$text = $link_list[$v]['fmenu'];
					break;
				default:
					$text = $link_list[$v][1];
			}
			$str2 .= '<div><a ' . $add . '>' . $text . '<img src="' . $dir_c . 'foot-arrow.svg"><div class="clear"></div></a></div>';
		}
		// style="width:'.$lenmax.'em;"
		$str .= '<td>' . $str2 . '</td>';
	}
	return $str;
}
$temp_footer = '
<footer class="l-footer">
	<div class="l-footer-inner">
		<div class="l-footer-upper">
			<div class="l-footer-flex">

				<!-- ロゴ -->
				<div class="l-footer__logo">
					<a href="' . $link_list['TOP'][0] . '" class="logo"><img src="' . $dir_c . 'logo-2025.svg" /></a>
				</div>

				<!-- ナビメニュー -->
				<nav class="fnav">
					<ul class="fnav__list">
						<li class="fnav__item"><a href="' . $link_list['TOP'][0] . '">ホーム</a></li>
						<li class="fnav__item"><a href="' . $link_list['物件検索'][0] . '">物件情報</a></li>
						<li class="fnav__item"><a href="' . $link_list['NEWS'][0] . '">NEWS</a></li>
						<li class="fnav__item"><a href="structure.php">東新住建の家づくり</a></li>
					</ul>

					<ul class="fnav__list">
						<li class="fnav__item"><a href="' . $link_list['TOP'][0] . '#brand">ブランドコンセプト</a></li>
						<li class="fnav__item"><a href="bunjo-halforder.php" target="_blank">インテリアセレクト / ハーフオーダー</a></li>
						<li class="fnav__item"><a href="sdgs.php">SDGsへの取り組み</a></li>
						<li class="fnav__item"><a href="qa.php">Q&A</a></li>
					</ul>

					<ul class="fnav__list">
						<li class="fnav__item"><a href="voice.php">お客様の声</a></li>
						<li class="fnav__item"><a href="lifestyle.php">コラム</a></li>
						<li class="fnav__item"><a href="member.php">会員登録</a></li>
						<li class="fnav__item"><a href="' . $link_list['お問い合わせ'][0] . '">資料請求・お問い合わせ</a></li>
					</ul>
				</nav>

			</div>

			<!-- SNS -->
			<div class="l-footer__sns">
				<ul>
					<li class="insta"><a href="https://www.instagram.com/toshinjyuken_no_ie/" target="_blank"><img src="images/common/icon-insta-gray.svg" /></a></li>
					<li class="youtube"><a href="https://www.youtube.com/@toshinjyuken_house" target="_blank"><img src="images/common/icon-youtube-gray.svg" /></a></li>
					<li class="line"><a href="https://lin.ee/v4vz5KD" target="_blank"><img src="images/common/icon-LINE-gray.svg" /></a></li>
				</ul>
			</div>

		</div>

		<!-- 下段 -->
		<div class="l-footer-lower">
			<div class="l-footer__logo2">
				<a href="' . $link_list['東新住建'][0] . '" target="_blank" class="toushin"><img src="' . $dir_c . 'logo-toushin-2024-K.svg" /></a>
			</div>
			<div class="copyright">' . $comp_data['copy'] . '</div>
		</div>

	</div>
</footer>
<div id="pagebottom_btn"><a href="#pt"><img src="' . $dir_c . 'btn-submenu-pagetop.svg"></a></div>' . chr(10);
switch ($p_title) {
	case 'TOP':
	case 'お問い合わせ':
	case '会員登録':
		break;
	default:
		// $temp_footer = $temp_bottom_bnr . $temp_footer;
}


//◆body末尾
$temp_bodyend = '';
//SATORIタグ
$temp_bodyend .= '<script type="text/javascript" id="_-s-js-_" src="//satori.segs.jp/s.js?c=65abdfb0"></script>' . chr(10); //DUPと同じ

require $kaisou . "temp_php/temp-html.php"; //その他テンプレは別ファイルにまとめ


//◆関数
function WORD_BR($str, $flag = true)
{
	$rep = $flag ? '<br>' : '';
	return str_replace(array("\r\n", "\n", "\r"), $rep, $str);
}
function WORD_SPACEDEL($str)
{
	//全角スペース・半角スペース・タブ削除
	return str_replace(array("　", " ", "	"), '', $str);
}
function ANCHOR($name, $prm = array())
{
	$anc = '';
	if (!empty($prm['anc'])) { //PHP7.0対応
		if ($prm['anc'] != '') {
			$anc = $prm['anc'];
		}
	}
	if (is_numeric($name)) {
		$name = 'sec' . sprintf('%02d', $name);
	} //数値のみなら2ケタにする
	return '<div class="pos_rel"><a class="anchor" id="' . $anc . $name . '" name="' . $anc . $name . '"></a></div>' . chr(10);
}
function PAN($data, $prm = array())
{
	global $link_list;
	$link = '<a href="' . $link_list['TOP'][0] . '">' . $link_list['TOP'][1] . '</a>'; //最初はホーム
	$arrow = '<span class="arrow">&gt;</span>';
	foreach ($data as $k => $v) {
		$v = strip_tags($v); //余計なタグはすべて削除
		$a = array();
		if (!empty($link_list[$v])) { //PHP7.0対応
			$a = $link_list[$v];
		}
		//一部のキーワードに専用の記述
		switch (true) {
			case (empty($a[1])): //リストに存在しない場合は普通の文字
				$link .= $arrow . $v;
				break;
			default: //リンクあり
				$text = (!empty($a['p-title'])) ? $a['p-title'] : $a[1]; //p-title（ページタイトル専用テキスト）があればそれを優先
				if ($k < count($data) - 1) {
					$link .= $arrow . '<a' . ((!empty($a[0])) ? ' href="' . $a[0] . '"' : '') . '>' . $text . '</a>';
				} else {
					$link .= $arrow . $text;
				}
		}
	}
	$str = '<div class="pan LH100"><div>' . $link . '</div></div>' . chr(10);
	return $str;
}
function PAGE_TITLE($t, $add = '', $prm = array())
{
	global $link_list, $kaisou;
	if (empty($link_list[$t])) {
		$link_list[$t] = array();
	}
	$a = $link_list[$t];
	if (empty($a[1])) {
		$text = $t;
	} else {
		$text = (!empty($a['p-title'])) ? $a['p-title'] : $a[1];
	}
	if ($add != '') {
		$add = '<div>' . $add . '</div>';
	}
	$class = "textJ";
	if (!empty($prm['class'])) { //PHP7.0対応
		if ($prm['class'] != '') {
			$class = $prm['class'];
		}
	}
	$str = '<div class="p_title"><h2>' . $add . '<span class="' . $class . '">' . WORD_BR($text) . '</span></h2></div>' . chr(10);
	return $str;
}
function EFFECT_BTN($k, $text = '', $prm = array())
{
	global $link_list, $t_blank;
	if ($text == '') {
		$text = $link_list[$k][1];
	}
	$class = (!empty($prm['class'])) ? ' ' . $prm['class'] : '';
	$style = (!empty($prm['style'])) ? ' style="' . $prm['style'] . '"' : '';
	$arrow = (!empty($prm['arrow'])) ? SVG('arrow-btn') : '';
	$getprm = (!empty($prm['getparam'])) ? '?' . $prm['getparam'] : '';
	$getprm .= (!empty($prm['jump'])) ? '#' . $prm['jump'] : '';
	$getprm .= (!empty($prm['blank'])) ? $t_blank : '';

	if ($k != 'x') {
		$href = ' href="' . $link_list[$k][0] . $getprm . '"';
	} else {
		$href = '';
	}

	return '<a' . $href . ' class="btn_bgLtoR' . $class . '"' . $style . '><div><span>' . $text . '</span>' . $arrow . '</div></a>';
}
function MAINPIC($dir, $prm = array())
{
	global $kaisou, $dir_c;
	$res = '';
	$imgarr = array();
	if (!empty($prm['mainpic'])) {
		$imgarr = explode('.', $prm['mainpic']);
	} else {
		$imgarr[0] = 'mainpic';
		$imgarr[1] = 'jpg';
	}
	if (!empty($prm['class'])) {
		$class = $prm['class'];
	} else {
		$class = 'W100per';
	}
	$mainpic	= $dir . $imgarr[0] . '.' . $imgarr[1];
	$clearpic	= $kaisou . '' . $dir_c . 'clear';
	if (empty($prm['alt'])) {
		$prm['alt'] = '';
	}
	$alt = ($prm['alt'] != '') ? ' alt="' . $prm['alt'] . '"' : '';

	if (!empty($prm['clear'])) { //透明画像によるトリミング
		$img = 'url(' . $mainpic . ')';
		if (file_exists($url = ($dir . $imgarr[0] . '-t.png'))) {
			$img = 'url(' . $url . '),' . $img;
		}
		if (file_exists($url = ($clearpic . '-' . $prm['clear'] . '.png'))) {
			$clearpic = $url;
		} else {
			$clearpic .= '.png';
		}
		$res = '<img src="' . $clearpic . '" class="' . $class . '" style="background-image:' . $img . '"' . $alt . '>';
	} else { //静止画（２倍サイズの画像を半分に縮小可能
		$style = array('pc' => '', 'sp' => '');
		list($w, $h) = getimagesize($mainpic);
		switch (true) {
			case !empty($prm['w_x1']):
			case !empty($prm['w_x1_pc']):
				$style['pc'] = ' style="width:' . $w . 'px;"';
				break;
			case !empty($prm['w_half']):
			case !empty($prm['w_half_pc']):
				$style['pc'] = ' style="width:' . ($w / 2) . 'px;"';
				break;
			case !empty($prm['h_half']):
			case !empty($prm['h_half_pc']):
				$style['pc'] = ' style="height:' . ($h / 2) . 'px;"';
				break;
			case !empty($prm['wh_half']):
			case !empty($prm['wh_half_pc']):
				$style['pc'] = ' style="width:' . ($w / 2) . 'px;height:' . ($h / 2) . 'px;"';
				break;
		}
		if (file_exists($url = ($dir . $imgarr[0] . '-sp.' . $imgarr[1]))) {
			list($w, $h) = getimagesize($url);
			switch (true) {
				case !empty($prm['w_half']):
				case !empty($prm['w_half_sp']):
					$style['sp'] = ' style="width:' . ($w / 2) . 'px;"';
					break;
				case !empty($prm['h_half']):
				case !empty($prm['h_half_sp']):
					$style['sp'] = ' style="height:' . ($h / 2) . 'px;"';
					break;
				case !empty($prm['wh_half']):
				case !empty($prm['wh_half_sp']):
					$style['sp'] = ' style="width:' . ($w / 2) . 'px;height:' . ($h / 2) . 'px;"';
					break;
			}
			$res = '<img src="' . $mainpic . '" class="' . $class . ' sp_vanish"' . $style['pc'] . $alt . '>
<img src="' . $url . '" class="' . $class . ' pc_vanish"' . $style['sp'] . $alt . '>';
		} else {
			$res = '<img src="' . $mainpic . '" class="' . $class . '"' . $style['pc'] . $alt . '>';
		}
	}
	return $res . chr(10);
}
function CONTENT_MAINTITLE($t1, $t2, $t3, $add = '')
{
	$t1 = ($t1 != '') ? '<h3>' . $t1 . '</h3>' : '';
	$add = ($add != '') ? ' ' . $add : '';
	return '<div class="con_maint' . $add . '">
' . $t1 . '
<div class="catch">' . WORD_BR($t2) . '</div>
<div class="text">' . WORD_BR($t3) . '</div>
</div>' . chr(10);
}
function CONTENT_READMORE($data)
{
	global $link_list, $kaisou;
	$res = '<div class="con_readmorebox">' . chr(10);
	foreach ($data as $k => $v) {
		$link = ($link_list[$v['link']][0] != '') ? $link_list[$v['link']][0] : $v['link'];
		$cate = ($v['cate'] != '') ? '<span>' . $v['cate'] . '</span>' : '';
		$res .= '<a href="' . $link . '"><span class="kado"></span>
<div class="cate">' . $cate . '</div>
<div class="title">' . $k . '</div>
<div class="text">' . $v['text'] . '</div>
<img src="images/common/readmore-w.svg" class="readmore">
</a>' . chr(10);
	}
	$res .= '<div class="clear"></div>
</div>' . chr(10);
	return $res;
}
function NUMBER_COMMA($n)
{
	return is_numeric($n) ? number_format($n) : $n;
}

//PHP7.0対応関数
function ARR_EMPTY_CHECK($a = array(), $k = '', $def = '')
{
	//配列が空（未定義）の時、指定の変数（配列）を格納
	if (empty($a[$k])) {
		$a[$k] = $def;
	}
	return $a[$k];
}
