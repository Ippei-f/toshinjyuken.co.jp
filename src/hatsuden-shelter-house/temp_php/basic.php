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
$SPbrowser = '';
$HUA = $_SERVER['HTTP_USER_AGENT'];
switch (true) {
	case (preg_match("/iPhone/", $HUA)):
		$SPbrowser = 'iPhone'; //アイフォン
		break;
	case (preg_match("/Android/", $HUA)):
		$SPbrowser = 'Android'; //アンドロイド
		break;
}

//◆エラー表示設定
error_reporting(E_ERROR | E_PARSE);


//◆共通変数・配列

$dir_c =		$kaisou . 'images/common/';
$dir_t =		$kaisou . 'images/top/';
$dir_sns =	$kaisou . 'system/';

$t_blank = '" target="_blank';

$comp_data = array(
	'HP名'	=> '東新住建・発電シェルターハウス'
	//-----
	,
	'本社名' => '東新住建',
	'〒'		=> '492-8628',
	'住所'	 => '愛知県稲沢市高御堂一丁目3-18(稲沢本店)',
	'TEL'	 => '0800-170-5104'
	//-----
	//,'MAIL'=>'mirror'//test

	,
	'MAIL' => array(
		'info@toshinjyuken.co.jp',
		'dup@toshinjyuken.co.jp'
		//,'customersupport@toshinjyuken.co.jp'
	),
	'MAIL-noreply' => 'info@toshinjyuken.co.jp',
	'MAIL-sender' => 'info@toshinjyuken.co.jp' //送信者固定
	//-----
	,
	'login_id' => 'toshin-hatsuden',
	'login_pw' => 'toshin-hatsuden'
	//-----
	,
	'copy'	 => 'Copyright (C) TOSHIN JYUKEN All Rights Reserved.'
);

$democheck = $_SERVER['SCRIPT_FILENAME'];
switch (true) {
	case (strpos($democheck, 'showa') !== false):
		$democheck = 'showa';
		$comp_data['MAIL'] = 'mirror'; //送信先ミラー化
		break;
	/*
	case (strpos($democheck,'formdemo')!==false):
	$democheck='formdemo';
	break;
	//20201125に本サーバー化するため、デモではなくなる。
	case ($_SERVER['SERVER_ADDR']=='160.251.9.220'):
	$democheck='demoserver';
	$comp_data['MAIL']='mirror';//送信先ミラー化
	break;
	*/
	default:
		$democheck = '';
}

//建築許可番号読み込み
$comp_data['建築許可番号'] = file_get_contents($kaisou . "../recaptcha/common-kyoka.txt");
if ($comp_data['建築許可番号'] == '') {
	//読み込み失敗時の保険
	$comp_data['建築許可番号'] = file_get_contents("https://www.toshinjyuken.co.jp/recaptcha/common-kyoka.txt"); //絶対参照
}
$comp_data['建築許可番号'] = str_replace(array("\r\n", "\n", "\r", '
'), chr(10), $comp_data['建築許可番号']);
$comp_data['建築許可番号'] = str_replace(chr(10) . chr(10), chr(10), $comp_data['建築許可番号']);
$comp_data['建築許可番号'] = explode(chr(10), $comp_data['建築許可番号']);
//$comp_data['建築許可番号']=array_filter($comp_data['建築許可番号']);//空白削除
//$comp_data['建築許可番号']=array_values($comp_data['建築許可番号']);//キー連番
//print_r($comp_data['建築許可番号']);
/*
$comp_data['建築許可番号']=array
('宅地建物取引業免許：国土交通大臣（3）7873号'
,'特定建設業許可：愛知県知事許可（特-4）第61271号'
,'（公社）愛知県宅地建物取引業協会会員'
,'東海不動産取引協議会加盟'
);
*/

require $kaisou . "temp_php/data-link.php"; //リンク先の情報は別ファイルにまとめ

require $kaisou . "temp_php/data-area.php"; //エリア情報は別ファイルにまとめ

$temp_meta = '';
//グーグルタグマネージャー
$temp_meta .= "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PRRJRDR');</script>
<!-- End Google Tag Manager -->";
//IMタグ
$temp_meta .= "<script type=\"text/javascript\">
 (function(w,d,s){
  var f=d.getElementsByTagName(s)[0],j=d.createElement(s);
  j.async=true;j.src='https://dmp.im-apps.net/js/1013764/0001/itm.js';
  f.parentNode.insertBefore(j, f);
 })(window,document,'script');
</script>" . chr(10);
//キーワード
$temp_meta .= '<meta name="keywords" content="">
<meta name="description" content="地震に強い4.3倍2×4工法に太陽光発電システムを標準装備。現代の家族観やライフスタイルに合わせた次世代のコンパクトな暮らしにマッチする次世代PV住宅。2,000万円台～。">' . chr(10);
/*
1000組が感動！月々5万円台から買える、これからのかぞくにぴったりな次世代のPV住宅「発電シェルターハウス」
*/
if ($democheck != '') {
	$temp_meta .= '<!-- DEMOTYPE:' . $democheck . ' -->' . chr(10);
	if (!is_array($comp_data['MAIL'])) {
		$temp_meta .= '<!-- MAIL:' . $comp_data['MAIL'] . ' -->' . chr(10);
	}
	$temp_meta .= '<meta name="robots" content="noindex,nofollow">' . chr(10); //◆◆◆デモページのみ検索拒否◆◆◆
}

//viewport
$HUA = $_SERVER['HTTP_USER_AGENT'];
switch (true) {
	case preg_match("/iPad/", $HUA):
		$temp_meta .= '<!-- viewport=iPad -->
	<meta name="viewport" content="width=1336px">' . chr(10);
		break;
	default:

		$temp_meta .= '<!-- viewport=normal -->
<meta name="viewport" content="width=device-width" />' . chr(10);
		/* $temp_meta.='<!-- viewport=normal -->
<meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
<meta name="viewport" content="width=414px,initial-scale=0.48" />'.chr(10); */
}

//◆タイトル
//$temp_title=$comp_data['HP名'];//~2024/01/19
$temp_title = '東新住建/家族と家計を守る発電シェルターハウス';

//◆JAVA
$temp_java = '<script src="' . $kaisou . 'js/jquery.v1.11.1.min.js" type="text/javascript"></script>
<script src="' . $kaisou . 'js/common.js" type="text/javascript"></script>' . chr(10);
//start Promolayer JS code
$temp_java .= '<!-- start Promolayer JS code --><script type="module" src="https://modules.promolayer.io/index.js" data-pluid="z8hsh4Gf3jZDTv5WX9uyqn1JdvO2" data-workspace="aDuOQM5TfZJUmgcFeYKR" crossorigin async></script><!-- end Promolayer JS code -->' . chr(10);


//◆ページトップ
$temp_pagetop = '';
//グーグルタグマネージャー
$temp_pagetop .= '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PRRJRDR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->' . chr(10);
//PAGETOP
$temp_pagetop .= '<a name="pt" id="pt"></a>' . chr(10);
/*
<div id="pagetop_btn"><a href="#pt" class="bg_cover bright"></a></div>
*/


//◆ヘッダ
$add = ($nowpage_name != 'index') ? '<div class="logo"><a href="' . $link_list['東新住建'][0] . '"><img src="images/common/logo-2024.svg"></a></div>' : '';
$temp_header = '<div class="H_head"></div>
<header><div class="H_head">' . $add . '
<div class="menubtn"><div>
<span></span>
<span></span>
<span></span>
</div></div>
<div class="accbox">
<a href="' . $link_list['TOP'][0] . '">' . $link_list['TOP'][1] . '</a>
<a href="' . $link_list['物件'][0] . '">' . $link_list['物件'][1] . '</a>
<a href="' . $link_list['客声'][0] . '">' . $link_list['客声'][1] . '</a>
<a href="' . $link_list['安さ'][0] . '">' . $link_list['安さ'][1] . '</a>
<a href="' . $link_list['問合'][0] . '">' . $link_list['問合'][1] . '</a>
</div>
</div></header>
<div class="rmenu">
<a href="' . $link_list['物件'][0] . '"><div><img src="images/common/icon-house.svg">物件一覧</div></a>
<a href="' . $link_list['問合'][0] . '"><div><img src="images/common/icon-mail.svg">お問い合わせ</div></a>
<a href="#pt"><img src="images/common/pagetop.svg"></a>
</div>' . chr(10);
/*
function HF_MENU($data){
	global $link_list;
	$res='';
	foreach($data as $k){
		$res.='<li><a href="'.$link_list[$k][0].'">'.$link_list[$k][1].'</a></li>'.chr(10);
	}
	return $res;
}
function PC_RIGHT_MENU($data){
	global $link_list;
	$res='';
	foreach($data as $k){
		$a=$link_list[$k];
		$text=isset($a['rmenu'])?$a['rmenu']:$a[1];
		$text=str_replace('//','</span><span>',$text);
		$res.='<a href="'.$a[0].'"><span>'.$text.'</span></a>'.chr(10);
	}
	return $res;
}
$temp_header='<div class="H_head"></div>
<header><div class="Wbase W1300 pos_rel H_head">
<div class="menubtn"><div>
<span></span>
<span></span>
<span></span>
</div></div>
<a href="'.$link_list['TOP'][0].'" class="logo" title="'.$comp_data['HP名'].'">'.file_get_contents($kaisou.'images/common/logo.svg').'</a>
</div>
<div class="accbox"><div>
<a href="'.$link_list['見学資料'][0].'" class="btn num1"><span>'.$link_list['見学資料'][1].'</span></a>
<ul>
'.HF_MENU(array
('TOP'
,'物件情報'
,'定期借地'
,'工法構造'
,'NEWS'
,'会員登録'
,'問合'
)).'
</ul>
'.($toushin='<a href="'.$link_list['東新住建'][0].'" class="toushin" title="'.$comp_data['本社名'].'"><img src="'.$kaisou.'images/common/logo-toushin.svg"></a>').'
</div></div>
</header>
<div class="pc_r_bnr pos_head sp_vanish">
<div class="H_head"></div>
'.PC_RIGHT_MENU(array
('物件情報'
,'見学資料'
,'会員登録'
)).'
</div>'.chr(10);
unset($btn);
*/

//◆物件検索
$temp_area_set = '<div class="Wbase sp_W330 area_set">' . chr(10);
foreach ($area_list as $k => $v) {
	$t = isset($v[1]) ? WORD_BR($v[1]) : '';
	$class = (mb_strlen($k) < 4) ? ' class="ls"' : '';
	$jump = ($nowpage_name != 'search') ? $link_list['物件'][0] : '';
	$a_class = array();
	if ((isset($v[2]) && $v[2] == 'half')) {
		$a_class[] = 'half';
	}
	$temp_area_set .= '<a href="' . $jump . $v[0] . '" class="' . implode(' ', $a_class) . '"><b' . $class . '>' . $k . '</b>' . $t . '</a>' . chr(10);
}
$temp_area_set .= '</div>' . chr(10);
$temp_box_search = '<div class="box_search">
<h2><img src="images/common/icon-search.svg"><span>物件検索</span></h2>
' . $temp_area_set . '
<div class="c_ovalbtn"><a href="' . $link_list['物件'][0] . '"><span>すべての物件はこちら<img src="images/common/arrow-btn-oval.svg"></span></a></div>
</div>' . chr(10);

//◆六角フレーム(中身を[0]と[1]で囲う)
$temp_frame_rokkaku = array(
	'<div class="frame_rokkaku"><div><img src="images/common/frame-rokkaku-cut.svg"><div></div></div><div class="inner">' . chr(10),
	'</div><div><div></div><img src="images/common/frame-rokkaku-cut.svg"></div></div>' . chr(10)
);

//◆フッタ
//リンクバナーはテイシャクと同じプログラムを使用
function BOTTOMBNR_MENU($arr = array())
{
	global $dir_c, $kaisou, $link_list;
	$dir = $kaisou . '../teishaku-portal/images/bnr/toushin2022/';
	$str = '';
	foreach ($arr as $n => $v) {
		if (!is_array($v)) {
			$v = array($v);
		}
		$k = $v[0];
		if (isset($v['dir'])) {
			switch ($v['dir']) {
				case 'kodate':
					$v['dir'] = $kaisou . '../kodate/images/common/bottom/2021/';
					break;
			}
		} else {
			$v['dir'] = $dir;
		}
		$img = (!isset($v['img'])) ? $v['dir'] . 'p' . $n . '.jpg' : $kaisou . 'images/bnr/brand/' . $v['img'];
		$img = '<img src="' . $dir_c . 'clear-W160H153.png" style="background-image: url(' . $img . ');">';
		//$img.='<img src="'.$dir.'n'.sprintf('%02d',$v[1]).'.svg" class="num">';
		$str .= '<a href="' . $link_list[$k][0] . '"><div class="pic">' . $img . '</div><div class="text" style="background-image: url(' . $v['dir'] . 'b' . $n . '.svg);"></div></a>' . chr(10);
	}
	return $str;
}
$temp_footer = '<div class="bottom_brandsite"><div class="Wbase W720">
<div class="flex bg_cover">
' . BOTTOMBNR_MENU(array(
	8 => array('東新住建-家', 'img' => 'p8.jpg')
	//,7=>array('東新住建-平屋')
	//,1=>array('東新住建-DUP')
	//,3=>array('東新住建-そだつ')//,'img'=>'p3.jpg'
	//,9=>array('東新住建-ALC','dir'=>'kodate')
)) . '
</div>
</div></div>' . chr(10);
$temp_footer .= '<footer><div class="Wbase W720">
<div class="f_menu">
<div>
<div class="logo"><a href="' . $link_list['東新住建'][0] . '"><img src="images/common/logo-2024.svg"></a></div>
<div class="info">' . WORD_BR('〒' . $comp_data['〒'] . '
' . $comp_data['住所'] . '
TEL.' . $comp_data['TEL']) . '</div>
</div>
<div>
<div class="tel">
<div class="font_hiragino">お問合せ・資料請求はこちら</div>
<a href="tel:' . $comp_data['TEL'] . '" title="' . $comp_data['TEL'] . '"><img src="images/common/tel.svg"></a>
</div>
<div class="kyoka">' . WORD_BR($comp_data['建築許可番号'][0] . '【PCPAD-SPBR】' . $comp_data['建築許可番号'][1] . '
' . $comp_data['建築許可番号'][2] . '【PCPAD-SPBR】' . $comp_data['建築許可番号'][3]) . '</div>
</div>
</div>
<div class="copy font_hiragino">Copyright (C) TOSHIN JYUKEN All Rights Reserved.</div>
</div></footer>' . chr(10);


//◆グーグルマップJSファイル読み込み
/*
$key='AIzaSyBlfj2BEkfH0hODugXPK9BLWDA1h857Ayg';
$temp_googlemap_js='<script src="'.$kaisou.'js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key='.$key.'&callback=initMap"></script>'.chr(10);
*/


//◆body末尾
$temp_bodyend = '';
//SATORIタグ（本アップ時に解禁）
//$temp_bodyend.='<script type="text/javascript" id="_-s-js-_" src="//satori.segs.jp/s.js?c=65abdfb0"></script>'.chr(10);//DUPと同じ


//◆関数
function WORD_BR($str, $flag = true)
{
	$rep = $flag ? '<br>' : '';
	if (strpos($str, '【PCBR】') !== false) {
		$str = str_replace('【PCBR】', '<div class="sp_vanish"></div>', $str);
	}
	if (strpos($str, '【PCPAD-SPBR】') !== false) {
		$str = str_replace('【PCPAD-SPBR】', '<span class="sp_vanish">　</span><div class="pc_vanish"></div>', $str);
	}
	if (strpos($str, '【SPBR】') !== false) {
		$str = str_replace('【SPBR】', '<div class="pc_vanish"></div>', $str);
	}
	return str_replace(array("\r\n", "\n", "\r"), $rep, $str);
}
function WORD_SPACEDEL($str)
{
	//全角スペース・半角スペース・タブ削除
	return str_replace(array("　", " ", "	"), '', $str);
}
function PAD_BR($pad = '1em')
{
	return '<span class="sp_vanish" style="width:' . $pad . ';"></span><br class="pc_vanish">';
}
function RUBY_TAG($t1, $t2, $firefox = true)
{
	$add = $firefox ? '' : ' class="fox_none"';
	return '<ruby' . $add . '><rb>' . $t1 . '</rb><rp>（</rp><rt>' . $t2 . '</rt><rp>）</rp></ruby>';
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
/*
function PAN($data,$prm=array()){
	global $link_list;	
	$link='<a href="'.$link_list['TOP'][0].'">'.$link_list['TOP'][1].'</a>';//最初はホーム
	$arrow='<span class="arrow">&gt;</span>';	
	foreach($data as $k => $v){
		$v=strip_tags($v);//余計なタグはすべて削除
		$a=array();
		if(!empty($link_list[$v])){//PHP7.0対応
			$a=$link_list[$v];
		}		
		//一部のキーワードに専用の記述
		switch(true){
			case (empty($a[1]))://リストに存在しない場合は普通の文字
			$v=str_replace(array("＞"),$arrow,$v);
			$link.=$arrow.$v;
			break;
			default://リンクあり
			$text=(!empty($a['p-title']))?$a['p-title']:$a[1];//p-title（ページタイトル専用テキスト）があればそれを優先
			if($k<count($data)-1){
				$link.=$arrow.'<a'.((!empty($a[0]))?' href="'.$a[0].'"':'').'>'.$text.'</a>';
			}
			else{
				$link.=$arrow.$text;
			}
		}
	}
	$str='<div class="content_box pan LH125"><div>'.$link.'</div></div>'.chr(10);
	return $str;
}
*/
/*
function CONTENT_PAGE_TITLE($t){
	global $link_list,$kaisou;
	$a=isset($link_list[$t])?$link_list[$t]:array();
	$text=isset($a[1])?(isset($a['p-title'])?$a['p-title']:$a[1]):$t;
	$str='<div class="p_title"><h1>'.WORD_BR($text).'</h1></div>'.chr(10);
	return $str;
}
function CONTENT_PAGE_MAINPIC($t=''){
	global $kaisou,$dir;
	$bg=file_exists($t)?' style="background-image: url('.$t.');"':'';
	return '<div class="p_mainpic"'.$bg.'></div>'.chr(10);
}
function CONTENT_PAGE_SUBT($t=''){
	return '<div class="p_subt"><h2>'.$t.'</h2></div>'.chr(10);
}
*/
function EFFECT_BTN($k, $text = '', $prm = array())
{
	global $link_list, $t_blank;
	if ($text == '') {
		$text = $link_list[$k][1];
	}
	if (!isset($prm['arrow'])) {
		$prm['arrow'] = true;
	} //矢印はtrueがデフォルト
	$class = (!empty($prm['class'])) ? ' ' . $prm['class'] : '';
	$style = (!empty($prm['style'])) ? ' style="' . $prm['style'] . '"' : '';
	$arrow = (!empty($prm['arrow'])) ? COMMON_SVG('arrow-btn') : '';
	$getprm = (!empty($prm['getparam'])) ? '?' . $prm['getparam'] : '';
	$getprm .= (!empty($prm['jump'])) ? '#' . $prm['jump'] : '';
	$getprm .= (!empty($prm['blank'])) ? $t_blank : '';

	if ($k != 'x') {
		$url = (isset($link_list[$k])) ? $link_list[$k][0] : $k;
		$href = ' href="' . $url . $getprm . '"';
	} else {
		$href = '';
	}

	return '<a' . $href . ' class="btn_bgLtoR' . $class . '"' . $style . '><div class="border"></div><div><span>' . $text . '</span>' . $arrow . '</div></a>';
}
function COMMON_SVG($svg)
{
	global $kaisou;
	return file_get_contents($kaisou . 'images/common/' . $svg . '.svg');
}
function CONTENT_PAD($pad, $pad_sp = '')
{
	$res = '';
	switch (true) {
		case ($pad_sp === 0):
			$res = '<div class="sp_vanish" style="height:' . $pad . 'px"></div>';
			break;
		case (is_numeric($pad_sp)):
			$res = '<div class="sp_vanish" style="height:' . $pad . 'px"></div><div class="pc_vanish" style="height:' . $pad_sp . 'px"></div>';
			break;
		case ($pad_sp == 'sp/2'):
			$res = '<div class="sp_vanish" style="height:' . $pad . 'px"></div><div class="pc_vanish" style="height:' . ($pad / 2) . 'px"></div>';
			break;
		default:
			$res = '<div style="height:' . $pad . 'px"></div>';
	}
	return $res;
}
/*
function BNR_MENU($data=array()){
	global $link_list,$kaisou;
	foreach($data as $k => $v){
		if(!isset($link_list[$v])){unset($data[$k]);}//ないものは削除
	}
	$cnt=count($data);
	$res='<div class="content_box"><div class="Wbase"><div class="bnr_menu btn'.$cnt.'">'.chr(10);
	foreach($data as $k){
		$a=$link_list[$k];
		if(!is_array($a['bnrmenu'])){$a['bnrmenu']=array($a['bnrmenu']);}
		$text=isset($a['bnrmenu'][1])?$a['bnrmenu'][1]:$a[1];
		$res.='<a href="'.$a[0].'"><div><div class="bg_cover" style="background-image: url('.$kaisou.'images/common/bnrmenu-'.$a['bnrmenu'][0].'.jpg);"></div><div><span>'.$text.'</span></div></div></a>'.chr(10);
	}
	$res.='</div></div></div>'.chr(10);
	return $res;
}
*/

//PHP7.0対応関数
function ARR_EMPTY_CHECK($a = array(), $k = '', $def = '')
{
	//配列が空（未定義）の時、指定の変数（配列）を格納
	if (empty($a[$k])) {
		$a[$k] = $def;
	}
	return $a[$k];
}
