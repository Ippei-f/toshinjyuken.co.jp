<?php
$p_type = 'content';
$kaisou = '';
$dir = $kaisou . 'images/content/xxxx/';
$p_title = '物件検索';
require $kaisou . "temp_php/basic.php";

//システム読み込み
$dir_sys = $kaisou . 'system/search/';
require $dir_sys . 'function/cms-load.php'; //軽量版

//プレビュー初期設定・PHP7.0対応ver
$preview_time = '';
$preview_flag = false;
if (!empty($_POST['preview'])) {
	if ($_POST['preview'] != 1) {
		if ($_GET['preview'] == 'true') {
			$_POST['preview'] = 1;
			$_POST['pre_time'] = !empty($_GET['date']) ? $_GET['date'] : date('YmdHi');
		}
	}
	$preview_flag = true;
	$preview_time = date('Y/m/d H:i', strtotime($_POST['pre_time']));
}

$sysdata = array('0');
if ($_GET['id'] != '') {
	foreach ($sysdata_proto as $key => $sysdata) {
		//指定のID以外除外
		if ($sysdata[0] != $_GET['id']) {
			continue;
		}
		if (CMS_OPEN()) {
			continue;
		}
		CMS_DATA_REPLACE();
		CMS_IMGSET();
		break;
	}
}

//販売済みチェック - 404エラー表示
if (!is_array($sysdata[3])) {
	$sysdata[3] = array($sysdata[3]);
}
$phase_check = '｜' . implode('｜', $sysdata[3]) . '｜';

//見積シミュレーションの住宅タイプ（data.dat フィールド[26]）の語彙。
//data-area.php の $area_list_2025sub（basic.php 経由でスコープ内）を単一の情報源とし、
//ここで数値をハードコードしない。タイプを増やしたときに導線だけ黙って出なくなるのを防ぐ。
//0（無し）は語彙には含まれるが対象外なので明示的に除く。
//キー参照なので '' も "\n" も想定外値も自動的に外れる（フェイルクローズ）。
$sim_types = $area_list_2025sub['見積シミュレーション'];
unset($sim_types[0]);

//フェーズはこの物件で1つに決まる。区画ループの中で毎回判定しないよう先に出す。
$sim_phase = (strpos($phase_check, '｜3｜') !== false);

/*
	区画配列のセルを1つ取り出す。＜＞ を含まない値は配列にならず文字列で来る
	（CMS_DATA_REPLACE は ＜＞ の有無だけを見る）ため、両方を受ける。
	put.php が末尾の空セルを rtrim するので、1区画の物件は必ず文字列になる。
	列数が26未満の古い行では $cell が未定義で渡るため null も受ける。
*/
function KUKAKU_CELL($cell, $index)
{
	if (is_array($cell)) {
		return isset($cell[$index]) ? trim((string)$cell[$index]) : '';
	}
	if ($cell === null) {
		return '';
	}
	//文字列は組0のみの値。他の組は未設定とみなす。
	return ($index === 0) ? trim((string)$cell) : '';
}

if (strpos($phase_check, '｜5｜') !== false) {
	header('HTTP/1.0 404 Not Found');
?>
	<!doctype html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,nofollow">
		<title>ページが見つかりません | <?php echo $sitename; ?></title>
		<link href="css/common.css" rel="stylesheet" type="text/css">
		<style>
			.error-page {
				text-align: center;
				padding: 100px 20px;
			}

			.error-page h1 {
				font-size: 48px;
				color: #ccc;
				margin-bottom: 20px;
			}

			.error-page p {
				font-size: 18px;
				color: #666;
				margin-bottom: 40px;
			}

			.error-page a {
				display: inline-block;
				padding: 15px 40px;
				background: #333;
				color: #fff;
				text-decoration: none;
			}

			.error-page a:hover {
				background: #555;
			}
		</style>
	</head>

	<body>
		<div class="error-page">
			<h1>404</h1>
			<p>お探しのページは見つかりませんでした。<br>この物件は販売を終了しました。</p>
			<a href="search.php">物件一覧に戻る</a>
		</div>
	</body>

	</html>
<?php
	exit;
}

//チェック（2025/05/19更新
//$p_limit='';
//print_r($sysdata[24]);
$sysdata[24] = trim($sysdata[24]);
if (!is_array($sysdata[24])) {
	$sysdata[24] = array($sysdata[24]);
}
$p_limit = '|' . implode('|', $sysdata[24]) . '|';
$p_limit = (strpos($p_limit, '|1|') !== false) ? 'memberonly' : '';
require $kaisou . "temp_php/temp_logincheck.php"; //ログインチェック
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php echo $temp_meta; ?>
	<?php
	if (!empty($_GET['preview'])) { //PHP7.0対応
		if ($_GET['preview'] == 'true') {
	?>
			<meta name="robots" content="noindex,nofollow"><!-- 検索エンジン拒否 -->
	<?php
		}
	}
	?>
	<title><?php echo $temp_title; ?><?php echo $preview_flag ? '〈プレビュー ' . $preview_time . '〉' : ''; ?></title>
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/loan.css" rel="stylesheet" type="text/css">
	<?php echo $temp_java; ?>
	<style>
		.local_title {
			padding: 70px 0;
			font-size: 150%;
			line-height: 100%;
			font-weight: normal;
		}

		.local_subtitle {
			text-align: center;
			padding-bottom: 1em;
			/*
	font-weight: bold;
	color:#738DA0;
	*/
		}

		.local_subtitle>* {
			font-size: 120%;
			line-height: 100%;
		}

		.local_top1 {}

		.local_top1 tr>* {
			text-align: center;
			vertical-align: middle;
		}

		.local_top1 tr>*:nth-child(2) {
			font-size: 150%;
			line-height: 100%;
			font-weight: bold;
		}

		.local_top1 tr>* .brand {
			margin-bottom: 0.5em;
			display: grid;
			justify-content: center;
			align-items: center;
		}

		.local_top1 tr>* .brand>* {
			background-color: #000;
			color: #FFF;
			font-size: 16px;
			font-weight: 700;
			line-height: 1em;
			padding: 0 0.5em;
			min-width: 11em;
			min-height: calc(1em * 30 / 16);
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.local_top2 {
			margin-top: 2em;
		}

		.local_top2 tr>* {
			text-align: left;
			vertical-align: top;
		}

		.local_top2 tr>*:nth-child(2) {
			font-size: 125%;
			font-weight: bold;
		}

		@media screen and (min-width: 1000px) {
			.local_top1 tr>*:nth-child(1) {
				padding-right: 1em;
			}

			.local_top2 tr>*:nth-child(1) {
				padding-top: 0.5em;
				padding-right: 0.5em;
			}
		}

		@media screen and (max-width: 999px) {
			.local_top1 tr>*:nth-child(1) {
				padding-bottom: 0.75em;
			}

			.local_top2 tr>*:nth-child(1) {
				padding-bottom: 0.5em;
			}
		}

		.local_mainpic {
			width: 800px;
			max-width: 100%;
			margin: auto;
		}

		.local_mainpic img {
			width: 100%;
		}

		.local_mainpic .picbox1>* {
			background-color: #738DA0;
			color: #FFF;
			vertical-align: middle;
			padding: 1em 0;
			line-height: 100%;
		}

		.local_mainpic .picbox1>*:nth-child(1) {
			font-size: 125%;
			font-weight: bold;
		}

		.local_mainpic .picbox1>*:nth-child(2) {}

		.local_mainpic .picbox1>*:nth-child(2) strong {
			font-size: 150%;
			display: inline-block;
			vertical-align: middle;
			padding: 0 0.25em;
		}

		@media screen and (min-width: 1000px) {
			.local_mainpic .picbox1>* {}

			.local_mainpic .picbox1>*:nth-child(1) {
				text-align: left;
				padding-left: 1em;
			}

			.local_mainpic .picbox1>*:nth-child(2) {
				text-align: right;
				padding-right: 1em;
			}

			.local_mainpic .picbox2>*>div {
				padding: 1% 0;
			}

			.local_mainpic .picbox2:last-child>*>div,
			.local_mainpic>* .picbox2:last-child>*>div {
				padding-bottom: 0;
			}

			.local_mainpic .picbox3 .pad {
				width: 1%;
			}
		}

		@media screen and (max-width: 999px) {
			.local_mainpic .picbox1>* {
				text-align: center;
			}

			.local_mainpic .picbox1>*:nth-child(1) {}

			.local_mainpic .picbox1>*:nth-child(2) {
				padding-top: 0;
			}

			.local_mainpic .picbox2,
			.local_mainpic .picbox3 td {
				margin-top: 1%;
			}
		}

		.local_kukakubox {
			border-top: solid 1px #888;
			padding-top: 80px;
			padding-bottom: 50px;
		}

		.local_kukakubox .kukaku_top {
			width: 100%;
			border-bottom: solid 4px #000;
		}

		.local_kukakubox .kukaku_top tr>* {
			text-align: left;
			vertical-align: middle;
		}

		.local_kukakubox .kukaku_top tr>*:nth-child(1) {
			font-size: 300%;
			font-weight: bold;
		}

		.local_kukakubox .kukaku_top tr>*:nth-child(2) {}

		.local_kukakubox .kukaku_top tr>*:nth-child(2) span {
			display: block;
			border-left: solid 1px #000;
			padding-left: 1em;
			height: 3em;
			position: relative;
		}

		.local_kukakubox .kukaku_top tr>*:nth-child(2) span img {
			height: 100%;
			float: left;
		}

		.local_kukakubox .kukaku_top tr>*:nth-child(2) span a:nth-child(2) img {
			margin-left: 0.5em;
		}

		.local_kukakubox .kukaku_top tr>*:nth-child(4)>div {
			margin-bottom: -0.75em;
		}

		.local_kukakubox .kukaku_top tr>*:nth-child(4)>strong {
			font-size: 175%;
		}

		.local_kukakubox .kukaku_top tr>*:nth-child(4)>strong span {
			font-size: 150%;
		}

		@media screen and (min-width: 1000px) {
			.local_kukakubox .kukaku_top tr>*:nth-child(1) {
				width: 6em;
			}

			.local_kukakubox .kukaku_top tr>*:nth-child(3) {
				width: 19em;
			}

			.local_kukakubox .kukaku_top tr>*:nth-child(4) {
				width: 12em;
			}
		}

		@media screen and (max-width: 999px) {
			.local_kukakubox .kukaku_top tr>*:nth-child(1) {
				float: left;
				width: 59%;
				font-size: 240%;
			}

			.local_kukakubox .kukaku_top tr>*:nth-child(2) {
				float: right;
				width: 40%;
			}

			.local_kukakubox .kukaku_top tr>*:nth-child(2) span {
				margin-top: 1.25em;
			}

			.local_kukakubox .kukaku_top tr>*:nth-child(3) {
				clear: both;
			}

			.local_kukakubox .kukaku_top tr>*:nth-child(4) {
				margin-top: 0.5em;
			}
		}

		.local_kukakubox .freetext {
			text-align: left;
			line-height: 150%;
			margin-top: 0.5em;
		}

		.local_kukakubox .photo {
			padding-top: 30px;
			padding-bottom: 60px;
		}

		.contactbtn {
			margin: auto;
		}

		.contactbtn .btnbox {
			width: 14.5em;
		}

		.contactbtn .pad {
			width: 1em;
		}

		@media screen and (max-width: 999px) {
			.contactbtn * {
				margin: auto;
			}

			.contactbtn .pad {
				height: 1em;
			}
		}

		.local_gal_select {
			padding-top: 1em;
			margin-bottom: 35px;
			width: 1000px;
			max-width: 100%;
			overflow: hidden;
		}

		.local_gal_select table {
			border-collapse: collapse;
			width: 100%;
			background-color: #FFF;
			border: solid 1px #000;
		}

		.local_gal_select tr>* {
			width: 50%;
		}

		.local_gal_select tr>*>div {
			height: 2em;
			text-align: center;
		}

		.local_gal_select tr>.detail_menu1 * {
			right: 0;
		}

		.local_gal_select tr>.detail_menu2 * {
			left: 0;
		}

		.local_gal_select tr>*>div.selected {
			color: #FFF;
		}

		/*
.local_gal_select tr > .detail_menu1 div.selected{background:linear-gradient(270deg ,transparent 50%,#F63402 50%);}
.local_gal_select tr > .detail_menu2 div.selected{background:linear-gradient(90deg ,transparent 50%,#F63402 50%);}
*/
		.local_gal_select tr>* .skew,
		.local_gal_select tr>* a {
			display: block;
			position: absolute;
			top: 0;
			width: 110%;
			width: -webkit-calc(100% + 2em);
			width: calc(100% + 2em);
			height: 100%;
			transform: skewX(-30deg);
		}

		.local_gal_select tr>*>div.selected .skew {
			background-color: #F63402;
		}

		.local_gal_select tr .detail_menu1 div.selected .skew {
			border-right: solid 1px #000;
		}

		.local_gal_select tr .detail_menu2 div.selected .skew {
			border-left: solid 1px #000;
		}

		.local_gal_select tr>*>div span {
			display: block;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
			height: 1em;
			z-index: 2;
		}

		.local_gal_select tr>* a {
			z-index: 3;
		}

		.local_gal_select .sideline {
			position: absolute;
			top: 0;
			width: 0;
			height: 100%;
			z-index: 5;
		}

		.local_gal_select tr>.detail_menu1 .sideline {
			left: -1px;
			right: auto;
			border-left: solid 1px #000;
		}

		.local_gal_select tr>.detail_menu2 .sideline {
			right: -1px;
			left: auto;
			border-right: solid 1px #000;
		}

		.local_gal_select .pos_abs {
			bottom: 100%;
			left: 0;
			right: 0;
			margin: auto;
			width: 1em;
			color: #000;
		}

		.local_gallerybox {
			width: 1000px;
			max-width: 100%;
			margin: auto;
		}

		.local_gallerybox .title {
			background-color: #F0F0F0;
			border-bottom: solid 1px #000;
			padding: 0.25em 0;
			clear: both;
		}

		.local_gallerybox .p_set {
			padding-top: 0.25em;
			padding-bottom: 70px;
		}

		.local_gallerybox .photo div {
			text-align: left;
			font-size: 80%;
			line-height: 125%;
			margin-top: 0.25em;
		}

		@media screen and (min-width: 1000px) {
			.local_gallerybox .photo {
				width: 49.5%;
				padding-top: 1%;
			}

			.local_gallerybox .photo.p1 {
				float: left;
				clear: both;
			}

			.local_gallerybox .photo.p2 {
				float: right;
			}

			.local_gallerybox .photo:nth-child(n+3) {
				margin-top: 1em;
			}
		}

		@media screen and (max-width: 999px) {
			.local_gallerybox .photo:nth-child(n+2) {
				margin-top: 1em;
			}
		}

		.local_gaiyoubox {
			padding: 0 1em;
		}

		.local_gaiyoubox table {
			width: 1000px;
			max-width: 100%;
			margin: auto;
			border-bottom: solid 1px #888;
		}

		.local_gaiyoubox tr>* {
			text-align: left;
			vertical-align: top;
		}

		.local_gaiyoubox tr>*:nth-child(1) div {
			min-height: 1em;
		}

		@media screen and (min-width: 1000px) {
			.local_gaiyoubox tr>*:nth-child(1) {
				width: 34%;
				padding-left: 14%;
			}

			.local_gaiyoubox * tr:last-child>* {
				padding-bottom: 1em;
			}
		}

		@media screen and (max-width: 999px) {
			.local_gaiyoubox * tr:last-child>*:last-child {
				padding-bottom: 1em;
			}
		}

		.local_shuuhenbox {
			padding: 0 1em;
			padding-top: 90px;
		}

		.local_shuuhenbox table {
			width: 1000px;
			max-width: 100%;
			margin: auto;
		}

		.local_shuuhenbox tr>* {
			padding: 1em 0;
			border-top: solid 1px #888;
			text-align: left;
			vertical-align: top;
		}

		.local_shuuhenbox * tr:nth-child(1)>* {
			padding-top: 0;
			border-top: none;
		}

		.local_shuuhenbox * tr:last-child>* {
			padding-bottom: 0;
		}

		@media screen and (min-width: 1000px) {
			.local_shuuhenbox tr>*:nth-child(1) {
				width: 34%;
				padding-left: 17%;
			}
		}

		@media screen and (max-width: 999px) {
			.local_shuuhenbox tr>*:nth-child(1) {
				padding-bottom: 0;
			}

			.local_shuuhenbox tr>*:nth-child(2) {
				padding-top: 0;
				border-top: none;
				/* word-break: keep-all; */
			}
		}

		.local_bnrbox {
			padding-top: 50px;
			padding-bottom: 100px;
			/* margin: -1em 0; */
		}

		.local_bnrbox>* {
			display: inline-block;
			margin: 5px;
			width: 500px;
			max-width: 90%;
		}

		.VRbox {
			padding-top: 4.375em;
			padding-bottom: 2em;
		}

		.VRbox h3 {
			font-size: 175%;
			line-height: 100%;
			margin-bottom: 0.75em;
		}

		.VRbox .VRbtn {
			margin-top: 1em;
		}

		/* 音声ガイドボタン。支給素材はキャプション「物件の特徴を音声で解説」と
		   赤いピルを含む1枚の画像なので、DOMには文字を持たせずaria-labelで名前を付ける。 */
		.voicebox {
			display: block;
			max-width: 356px;
		}

		.voicebox .voice_btn {
			display: block;
			width: 100%;
			padding: 0;
			border: none;
			background: none;
			line-height: 0;
			cursor: pointer;
		}

		/* 置き場所は区画表の2列目。そこは「span は仕切り線を持ち高さ3em、
		   中の img は高さいっぱいで float」という前提でCSSが書かれている
		   （VR・アウトレットの小さなSVG用。この上320行あたり）。
		   .voicebox も中の img もその span 用の指定を拾ってしまうため、
		   同じ限定度で打ち消す。短いセレクタでは負けて効かない。 */
		.local_kukakubox .kukaku_top tr>*:nth-child(2) span.voicebox {
			height: auto;
			padding-left: 0;
			border-left: none;
		}

		/* 支給は1x（357x123）。拡大するとぼけるので .voicebox の max-width で止め、
		   セル幅が狭いときは width:100% で縮める。float と height は上記 span img の
		   指定を打ち消すため、同じ限定度のここで一括して決める。 */
		.local_kukakubox .kukaku_top tr>*:nth-child(2) span .voice_btn img {
			display: block;
			float: none;
			width: 100%;
			height: auto;
		}

		/* PC。ボタンは見出し行の2列目に置く。幅はカンプのこの区画表そのものから採る。
		   カンプの区画表は罫線（表の border-bottom）が幅1374pxで引かれていて、
		   その中のボタンが356px＝25.9%。本文幅1000pxに当てて 259px とする。
		   ※文字幅の比から出すと書体差（カンプはアウトライン化）が混ざるので、
		     作図された罫線を基準にしている。
		   区画表は auto レイアウトで％指定が列幅の計算に効かないため px で固定する。
		   区画名の列は 6em（=288px）固定のままだと合計が本文幅を超え、表が全列を
		   縮めてしまう。すると面積・価格の列が音声ガイドの無い区画とズレる
		   （実測 644/948px → 681/962px）。音声ガイドがある区画に限り区画名を
		   文字幅まで詰めると、面積・価格は 644/948px のまま揃う。これはカンプが
		   置いている位置とも一致する。無い区画は 6em のまま触らない。
		   区画名は実データで最長9文字（II-A2type等）。そこまでは面積・価格の
		   折り返し行数は従来と同じで、はみ出しも起きない。 */
		@media screen and (min-width: 1000px) {
			.local_kukakubox .kukaku_top.has_voice tr>*:nth-child(1) {
				width: 1%;
				white-space: nowrap;
			}

			/* 2列目の外側 span は VR・アウトレットの小さなSVG用に height:3em（=48px）で
			   固定されている。ボタンは幅259pxのとき高さ89pxで収まらず、外すと
			   区切り線を40pxはみ出して本文に重なる。音声ガイドがある区画だけ
			   高さを内容任せにし、SVGの大きさは 3em のまま保つ。
			   仕切り線はカンプに無いので消す。 */
			.local_kukakubox .kukaku_top.has_voice tr>*:nth-child(2)>span {
				height: auto;
				border-left: none;
			}

			.local_kukakubox .kukaku_top.has_voice tr>*:nth-child(2)>span>a img {
				height: 3em;
			}

			.local_kukakubox .kukaku_top tr>*:nth-child(2) span.voicebox {
				width: 259px;
				/* 行の高さはこのボタンで決まる。余白が無いと下端が区切り線に
				   貼り付くので、カンプと同じくらいの余白を上下に持たせる。
				   margin は親の span と相殺して外に逃げるため padding で取る。 */
				margin: 0;
				padding-top: 20px;
				padding-bottom: 20px;
			}
		}

		/* SP。カンプではボタンは見出し行から出て、販売価格の下・区切り線（表の
		   border-bottom）の上にほぼ全幅で入る。再生JSが $(this).siblings('.voice_audio')
		   を読むため audio と同じ span から動かせないので、DOMは触らず表の下端に
		   絶対配置して見た目の順序だけ入れ替える。
		   2列目の外側 span は position:relative を持っていて包含ブロックを奪うので
		   static に戻す（内側の .voicebox だけを狙うと表が包含ブロックにならない）。
		   表に空ける高さは max-width:356px から決まる画像の最大高（356*245/712≒123px）
		   ＋カンプの上下の余白（上約24px・下約14px）。画像が縮んだ場合その分は
		   販売価格との間の余白になるだけで、下の区切り線には重ならない。 */
		@media screen and (max-width: 999px) {
			.local_kukakubox .kukaku_top.has_voice {
				position: relative;
				padding-bottom: 160px;
			}

			.local_kukakubox .kukaku_top.has_voice tr>*:nth-child(2)>span {
				position: static;
			}

			.local_kukakubox .kukaku_top.has_voice tr>*:nth-child(2) span.voicebox {
				position: absolute;
				left: 0;
				bottom: 14px;
				width: 100%;
				margin: 0;
			}
		}

		/* ハーフオーダーのバナー。カンプ（PC 1050x483 / SP 381x281）の実測比で組む。
		   写真の上に白帯を水平に敷き、帯の上下は写真がそのまま見える。
		   高さは padding-top の％で作り、中身は％指定だけで追従させる。
		   文字サイズはバナー幅に比例させたいので cqw を使う。
		   cqw 非対応ブラウザは直前のpx値（PC=幅1000px時 / SP=幅381px時）で動く。 */
		.halfbnr {
			display: block;
			position: relative;
			width: 100%;
			/* 親は W1000 なので実際は1000px止まり。ここを超える器に置くと
			   padding-top の％（=親幅基準）と max-width がずれるので注意。 */
			max-width: 1050px;
			margin: 40px auto 0;
			padding-top: 46.0%;
			/* 支給素材の拡張子が異なる場合はこの1行だけ変える */
			background: #dcdcdc url(images/content/search/detail/bnr-halforder-bg.jpg) no-repeat center / cover;
			color: #525A6E;
			text-decoration: none;
			container-type: inline-size;
		}

		.halfbnr::before {
			content: "";
			position: absolute;
			left: 0;
			right: 0;
			top: 18.84%;
			height: 62.42%;
			background: rgba(255, 255, 255, 0.8);
		}

		.halfbnr_logo {
			position: absolute;
			top: 28.72%;
			left: 32.70%;
			width: 34.60%;
			height: 9.10%;
			/* 支給素材の拡張子が異なる場合はこの1行だけ変える */
			background: url(images/content/search/detail/bnr-halforder-logo.png) no-repeat center / contain;
		}

		.halfbnr_lead {
			position: absolute;
			left: 0;
			right: 0;
			top: 44.27%;
			font-size: 25.9px;
			font-size: 2.59cqw;
			font-weight: 700;
			line-height: 1;
			letter-spacing: 0.07em;
			text-align: center;
			white-space: nowrap;
		}

		.halfbnr_btn {
			display: flex;
			position: absolute;
			top: 58.70%;
			left: 27.17%;
			align-items: center;
			justify-content: center;
			width: 45.67%;
			height: 16.98%;
			/* カンプのボタンは直角。丸みは付けない */
			border-radius: 0;
			background-color: #688097;
			color: #fff;
			font-size: 30px;
			font-size: 3.00cqw;
			font-weight: 700;
			line-height: 1;
			letter-spacing: 0;
			white-space: nowrap;
		}

		/* 矢印はボタン右端に絶対配置なので、ラベルの中央揃えは矢印の分だけ
		   右に余白を取ってから行う。取らないとラベルが矢印に重なる。 */
		.halfbnr_btn>span {
			padding-right: 18.6px;
			padding-right: 1.86cqw;
		}

		/* SVG('arrow-btn') は寸法も線色も持たず、サイトでは .btn_bgLtoR が
		   与えている（common.css:1032 / 1042）。バナーはそのクラスを持たないため
		   ここで同じ指定をする。無いと矢印が描画されず、押し出されたラベルが折り返す。
		   カンプでは矢印だけがボタン右端に寄るので、ラベルの中央揃えとは切り離す。 */
		.halfbnr_btn>svg {
			position: absolute;
			top: 50%;
			right: 2.20%;
			width: 34px;
			width: 3.42cqw;
			height: 19px;
			height: 1.86cqw;
			transform: translateY(-50%);
		}

		.halfbnr_btn>svg polyline {
			stroke: #fff;
		}

		@media screen and (max-width: 999px) {

			/* SPは別カット（横位置の違う写真）。帯も文字も配置が変わる。 */
			.halfbnr {
				max-width: 381px;
				margin-top: 24px;
				padding-top: 73.75%;
				/* 支給素材の拡張子が異なる場合はこの1行だけ変える */
				background-image: url(images/content/search/detail/bnr-halforder-bg-sp.jpg);
			}

			.halfbnr::before {
				top: 26.62%;
				height: 46.12%;
			}

			.halfbnr_logo {
				top: 30.61%;
				left: 21.52%;
				width: 56.96%;
				height: 9.20%;
			}

			/* SPはリードが2行。行送りも実測値に合わせる。 */
			.halfbnr_lead {
				top: 44.09%;
				font-size: 23.9px;
				font-size: 6.28cqw;
				letter-spacing: 0;
				line-height: 35px;
				line-height: 9.19cqw;
			}

			/* SPはボタンが白帯の外（写真の上）に出る。 */
			.halfbnr_btn {
				top: 80.96%;
				left: 25.59%;
				width: 48.56%;
				height: 11.39%;
				font-size: 13.9px;
				font-size: 3.65cqw;
			}

			.halfbnr_btn>span {
				padding-right: 18px;
				padding-right: 4.72cqw;
			}

			.halfbnr_btn>svg {
				right: 5.10%;
				width: 13px;
				width: 3.43cqw;
				height: 8px;
				height: 2.07cqw;
			}
		}
	</style>
	<?php
	//ローンJAVAスクリプト&関数
	require $kaisou . "temp_php/func_loan.php";
	?>
</head>

<body class="borderbox">
	<?php echo $temp_pagetop; ?>
	<div align="center">
		<!-- * -->
		<?php echo $temp_header; ?>
		<!-- ** -->

		<?php echo $temp_fix_nav; ?>

		<?php echo PAN(array($p_title, $sysdata[2])); ?>
		<?php echo PAGE_TITLE($p_title); ?>
		<!-- *** -->
		<div class="content_box">
			<?php
			if (!is_array($sysdata[19])) {
				$sysdata[19] = array($sysdata[19]);
			}
			if ($sysdata[19][0] != '') {
				echo '<div class="local_subtitle"><div>' . $sysdata[19][0] . '</div></div>';
			}
			?>
			<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak local_top1">
				<tr>
					<td class="logo im_vanish"><?php /*<img src="images/common/logo-2021.svg" class="dpIB" style="height:1.25em;">*/ ?></td>
					<td class="LH175">
						<?php
						$a = array();
						$a['ブランド'] = (!is_array($sysdata[23])) ? array(trim($sysdata[23])) : $sysdata[23];
						if (!empty($a['ブランド'])) {
							$t = '';
							foreach ($a['ブランド'] as $v4) {
								if (isset($area_list_2025['ブランド'][$v4])) {
									$str = $area_list_2025['ブランド'][$v4];
									$str['col'] = isset($str['col']) ? ' style="background-color:' . $str['col'] . '"' : '';
									$t .= '<span ' . $str['col'] . '>' . $str[0] . '</span>';
								}
							}
							echo '<div class="brand">' . $t . '</div>';
						}
						?>
						<?php echo $sysdata[2]; ?></td>
				</tr>
			</table>
			<div class="LH150" style="margin: 1em 0;"><?php echo $sysdata[6][0]; ?></div>
			<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak local_top2">
				<tr>
					<td>交通：</td>
					<td class="LH175"><?php echo $sysdata[6][1]; ?></td>
				</tr>
			</table>
			<div class="sp_textL LH150 local_edit_comment" style="padding: 100px 1em 50px;"><?php
																							$sysdata[6][2] = str_replace('../upload/', 'system/search/upload/', $sysdata[6][2]); //画像リンク変換
																							echo $sysdata[6][2];
																							?></div>
		</div>

		<style>
			.local_edit_comment a {
				display: inline-block;
			}

			.local_jump_menu {
				margin-bottom: 50px;
				padding: 1em;
			}

			.local_jump_menu a:hover {
				color: #F63402;
			}
		</style>
		<?php
		$sysdata[21] = str_replace(array("\r\n", "\n", "\r"), '', $sysdata[21]);
		function LOCAL_JUMP_MENU()
		{
			global $sysdata;
		?>
			<div class="bg_FFF_gray local_jump_menu"><a href="#pt">TOP</a>｜<a href="#kukaku">区画・間取り</a>｜<?php
																										if ($sysdata[21] != '') { ?><a href="#movie">動画</a>｜<?php }
																																							?><a href="#gallery">写真</a>｜<a href="#gaiyou">物件概要</a>｜<a href="#access">アクセス</a></div>
		<?php
		}

		LOCAL_JUMP_MENU();
		?>

		<!-- 写真↓ -->
		<div class="content_box bg_FFF_gray local_mainpic_bg">
			<table border="0" cellpadding="0" cellspacing="0" class="local_mainpic sp_tblbreak">
				<tr class="picbox1">
					<?php
					//2025ver
					$str = '';
					if (!is_array($sysdata[3])) {
						$sysdata[3] = array($sysdata[3]);
					}
					switch ($sysdata[3][0]) {
						case 1: //完成済み
							$str = 'モデルハウス公開中';
							break;
						case 2: //建築中	
							$str = '随時見学受付中';
							break;
						case 3: //ハーフオーダー
							$str = 'お好みの外観とインテリアをオーダー';
							break;
						case 4: //インテリアセレクト
							$str = '3つのインテリアスタイルからセレクト';
							break;
					}
					if (!empty($str)) {
						echo '<td colspan="5" style="text-align: center; padding-left:0;">' . $str . '</td>' . PHP_EOL;
					}

					/*
$sysdata[8]…廃止？

$arr=COMMON_PARAM('order_count');
$stt=array();
$stt[]=strtotime($sysdata[1].$arr[$sysdata[8]]);
$stt[]=strtotime($sysdata[1]);
$stt[]=strtotime(date('Y-m-d'));
$cd=floor(($stt[0]-$stt[2])/(60 * 60 * 24));//タイムスタンプの差を時×分×秒で割る
if($cd<0){$cd=0;}
echo '<!-- 　登録日：'.$sysdata[1].'/'.$stt[1].' -->';
echo '<!-- 　期限日：'.date('Y-m-d',$stt[0]).'/'.$stt[0].' -->';
echo '<!-- 日数換算：'.($stt[0]-$stt[1]).'=>'.sprintf('%02d',floor(($stt[0]-$stt[1])/(60 * 60 * 24))).' -->';
echo '<!-- 　　今日：'.date('Y-m-d').'/'.$stt[2].' -->';
echo '<!-- 　　残り：'.($stt[0]-$stt[2]).'=>'.sprintf('%02d',$cd).' -->';
*/
					?>
				</tr>
				<tr class="picbox2">
					<td colspan="5">
						<div><img src="images/common/clear-W800H530.png" class="bg_cover" style="background-image: url(<?php echo $sysdata['order'][0]; ?>);"></div>
					</td>
				</tr>
				<?php
				//外観写真小・PHP7.0対応
				$arr = array();
				for ($i = 1; $i <= 3; $i++) {
					if (!empty($sysdata['order-num'][$i])) {
						if (file_exists($sysdata['order-num'][$i])) {
							$arr[] = $sysdata['order-num'][$i];
						}
					}
				}
				if (count($arr) > 0) { //写真・小が一つでもあれば枠作成
				?>
					<tr class="picbox3">
						<td class="bg_cover" style="background-image: url(<?php echo $arr[0]; ?>);"><img src="images/common/clear-W800H530.png"></td>
						<?php
						for ($i = 1; $i <= 2; $i++) {
							$add1 = (empty($arr[$i])) ? ' sp_vanish' : '';
							$add2 = ($add1 == '') ? ' style="background-image: url(' . $arr[$i] . ');"' : '';
							echo '<td class="pad' . $add1 . '"></td>
<td class="bg_cover' . $add1 . '"' . $add2 . '><img src="images/common/clear-W800H530.png"></td>';
						}
						?>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
		<div class="content_box">
			<!-- 写真↑ -->

			<?php
			for ($i = 0; $i < count($sysdata[9]); $i += 4) {
				$sysdata[9][$i] = WORD_SPACEDEL($sysdata[9][$i]);
				//print_r($sysdata[9][$i]);
			}
			if (!is_array($sysdata[10])) {
				$sysdata[10] = array($sysdata[10]);
			}

			//print_r($sysdata[10]);
			$str = '';
			foreach ($sysdata[10] as $k => $v) {
				if ($sysdata[9][($k * 4)] == '') {
					continue;
				}
				if ($v != '') {
					$str .= '<div class="Wmax100per VRbtn" style="width:30em;">
		<a href="' . $v . '" class="btn_bgLtoR W100per textC colW"><div><span>' . $sysdata[9][($k * 4)] . '</span>' . SVG('arrow-btn') . '</div></a></div>' . chr(10);
				}
			}
			if ($str != '') {
			?>
				<div class="VRbox">
					<h3 class="col_F30">360°バーチャルモデルルーム公開中</h3>
					<div style="margin-bottom: 3em;">※一部実際と異なる箇所があります。</div>
					<?php echo $str; ?>
				</div>
			<?php } ?>

			<h3 class="local_title">販売区画</h3>
			<div class="Wmax100per mgnAuto" style="width:800px"><?php
																if (!empty($sysdata['kukaku-num'][0])) {
																	echo '<img src="' . $sysdata['kukaku-num'][0] . '"><div style="height:100px;"></div>';
																}
																?></div>


			<?php
			//<div style="height:50px;"></div>
			//お問い合わせボタン（区画前）
			//&type='.$sysdata[9][$i].'
			/*
$local_contactbtn='<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak contactbtn"><tr>
<td class="btnbox">'.EFFECT_BTN('お問い合わせ','来場予約',array('class'=>'W100per textC','arrow'=>true,'getparam'=>'id='.$_GET['id'].'&btn=yoyaku')).'</td>
<td class="pad" style="width:1em;"></td>
<td class="btnbox">'.EFFECT_BTN('お問い合わせ','資料請求',array('class'=>'W100per textC','arrow'=>true,'getparam'=>'id='.$_GET['id'].'&btn=shiryou')).'</td>
</tr></table>'.chr(10);
*/

			/*
//ボツ
<div class="local_fuki_20231211 LH150">
<div>＼<b class="col_F00">何でも聞ける！見学会、随時開催</b>／</div>
<div class="textL">物件はもちろん、気になる近隣施設や町内会情報、土地情報など、購入前に確認しておきたいことは、何でもお気軽にご相談ください。</div>
</div>
*/
			$local_contactbtn = '<div class="Wmax100per contactbtn" style="width:30em;">' . EFFECT_BTN('お問い合わせ', '来場予約・お問い合わせ', array('class' => 'W100per textC colO', 'style' => 'border-radius: 0;', 'arrow' => true, 'getparam' => 'id=' . $_GET['id'] . '&btn=yoyaku')) . '</div>' . chr(10);

			//echo $local_contactbtn;
			//<div style="height:50px;"></div>
			?>
			<style>
				.local_fuki_20231211 {
					display: flex;
					flex-direction: column;
					align-items: center;
					margin-bottom: 1em;
				}

				.local_fuki_20231211>*:nth-child(1) {
					font-size: 200%;
				}

				.local_fuki_20231211>*:nth-child(1) b {
					display: inline-block;
					margin: 0 0.5em;
				}

				.local_fuki_20231211>*:nth-child(2) {
					width: 100%;
					max-width: 34em;
					margin-top: 0.5em;
				}

				@media screen and (max-width: 999px) {
					.local_fuki_20231211>*:nth-child(1) {
						font-size: 125%;
					}
				}
			</style>



			<?php
			echo ANCHOR('kukaku');

			$cnt = $pcnt = 0;
			//print_r($sysdata);
			//print_r($sysdata[20]);
			for ($i = 0; $i < count($sysdata[9]); $i += 4) {
				$pcnt++;
				if ($sysdata[9][$i] == '') {
					$cnt++;
					continue;
				}
				//区画別の音声ガイド。$cnt は0起点。
				//間取り画像は「区画図」が番号0を使うため $pcnt（1起点）で、1つずれる。
				//CMS_IMGSET() の glob は jpg/png/gif 固定で mp3 を拾わないため直接判定する。
				//cms-load.php は他ページからも読まれる共通ファイルなので広げない。
				$voice_path   = $img_updir . 'voice' . $sysdata[0] . '-' . $cnt . '.mp3';
				$voice_exists = file_exists($voice_path);
				//この区画がシミュレーターの対象か。バナーとローン抑止の両方がこれ1つを見る。
				//条件を2か所に書くと、片方だけ直したときに両方出る／両方消える事故になる。
				//住宅タイプは区画ごと。$cnt は生の4セル組の番号（空欄区画も数える）で、
				//管理画面が保存する添字と一致する。units[] の位置ではない。
				$unit_simtype = KUKAKU_CELL($sysdata[26] ?? null, $cnt);
				$sim_unit     = ($sim_phase && isset($sim_types[$unit_simtype]));
			?>
				<div class="local_kukakubox">
					<div class="W1000 Wmax100per mgnAuto">
						<table border="0" cellpadding="0" cellspacing="0" class="kukaku_top LH175 sp_tblbreak<?php echo $voice_exists ? ' has_voice' : ''; ?>">
							<tr>
								<td><?php echo $sysdata[9][$i]; ?></td>
								<td><span><?php
											if (!empty($sysdata[10][$cnt])) { //PHP7.0対応
												if ($sysdata[10][$cnt] != '') {
													echo '<a href="' . $sysdata[10][$cnt] . '" target="_blank"><img src="images/content/search/detail/btn-vr-W70-202010.svg"></a>';
												}
											}
											if ($sysdata[20][$cnt] > 0) {
												echo '<a href="campaign-202009outlet.php' ./*$link_list['お問い合わせ-アウトレット'][0].*/ '" target="_blank"><img src="images/content/search/detail/btn-outlet.svg"></a>';
											}
											if ($voice_exists) {
												echo '<span class="voicebox">'
													//ボタンはキャプションごと画像1枚。文字がDOMに残らないので aria-label で名前を与える。
													. '<button type="button" class="voice_btn" aria-pressed="false" aria-label="物件の特徴を音声で解説 AI Voice Guide">'
													. '<img src="images/content/search/detail/btn-voice-guide.png" alt="" width="712" height="245">'
													. '</button>'
													. '<audio class="voice_audio" preload="none" src="' . htmlspecialchars($voice_path . '?' . filemtime($voice_path), ENT_QUOTES, 'UTF-8') . '"></audio>'
													. '</span>';
											}
											?><div class="clear"></div></span></td>
								<td><?php
									//PHP7.0対応
									$ik = $i + 1;
									if (!empty($sysdata[9][$ik])) {
										if (($t = $sysdata[9][$ik]) != '') {
											echo $t;
										}
									} else {
										$sysdata[9][$ik] = '';
									}
									?></td>
								<td>
									<div>販売価格（税込）</div><strong><span><?php
																		//PHP7.0対応
																		$ik = $i + 2;
																		if (!empty($sysdata[9][$ik])) {
																			if (($t = $sysdata[9][$ik]) != '') {
																				echo $t;
																			}
																		} else {
																			$sysdata[9][$ik] = '';
																		}
																		?></span>万円</strong>
								</td>
							</tr>
						</table>
						<div class="freetext"><?php
												//PHP7.0対応
												$ik = $i + 3;
												if (!empty($sysdata[9][$ik])) {
													if (($t = $sysdata[9][$ik]) != '') {
														echo $t;
													}
												} else {
													$sysdata[9][$ik] = '';
												}
												?></div>
						<div class="photo"><img src="<?php echo $sysdata['kukaku-num'][$pcnt]; ?>" class="W100per"></div>

						<?php
						//お問い合わせボタン（区画内）
						echo ($sysdata[20][$cnt] > 0) ? '<div class="Wmax100per contactbtn" style="width:30em;">' . EFFECT_BTN('お問い合わせ-アウトレット', '無人対応見学・購入申し込み', array('class' => 'W100per textC colB', 'arrow' => true, 'getparam' => 'id=' . $_GET['id'] . '&kukaku=' . $sysdata[9][$i])) . '</div>' . chr(10) : $local_contactbtn;

						//ハーフオーダー（フェーズ3）かつ住宅タイプ設定済みのみ：区画別見積シミュレーション導線。
						//リンク先の組み立ては従来のテキストボタンと同一。見た目だけバナーに変えている。
						if ($sim_unit) {
							$sim_url = 'halforder/contents/simulator/?id=' . htmlspecialchars(urlencode($sysdata[0]), ENT_QUOTES, 'UTF-8') . '&unit=' . htmlspecialchars(urlencode($sysdata[9][$i]), ENT_QUOTES, 'UTF-8');
							echo '<a href="' . $sim_url . '" class="halfbnr">'
								. '<span class="halfbnr_logo"></span>'
								. '<span class="halfbnr_lead">仕様やオプションを選んで<br class="pc_vanish">月々の支払額がわかる！</span>'
								. '<span class="halfbnr_btn"><span>見積りシミュレーション</span>' . SVG('arrow-btn') . '</span>'
								. '</a>';
						}

						//シミュレーター対象の区画ではバナーが導線になるためローンは出さない。
						//パネルはこのボタンからしか開かないので、両方を同じ条件で抑止する。
						if (!$sim_unit) {
							echo EFFECT_BTN('x', 'ローンシミュレーション', array('arrow' => true, 'class' => 'colW loan_btn" n="' . ($cnt + 1), 'style' => 'width:18em; margin-top:50px;'));
						}

						?>
					</div>
				</div>

				<!-- ▼ ローン -->
		</div>
		<?php if (!$sim_unit) { ?>
			<div class="bg_FFF_gray content_box loanbox lb<?php echo ($cnt + 1); ?>">
				<div class="W800 Wmax100per mgnAuto textL">
					<?php /* <div class="test"></div> */ ?>
					<?php
					/*
<h3><img src="images/content/search/detail/loan-step1.svg" class="loan_step">パッケージ内容をお選びください</h3>
<a class="linkbtn" href="<?php echo $link_list['インテリア'][0].$t_blank; ?>">インテリアパッケージについてはこちら</a>
<div class="clear"></div>
<div class="bg_FFF loan_step1">
<?php
switch($sysdata[3]){
	case 1:
	echo '<span class="sp_fontP090" style="color:#808080;">※ 完成物件のためパッケージは選択できません</span>
	<input type="checkbox" name="loan_input1" class="loan_input1" checked value="0" style="display:none;">';
	break;
	default:
	$arr=array
	(1=>array('ステラ ベーシック',0)
	,2=>array('ルナ ミディアム'	,180)
	,3=>array('ソーレ スペシャル',280)
	);
	foreach($arr as $k => $v){
		$add=($k<2)?' checked':'';
		echo '<span class="sp_br_del LH150 textR sp_textL"><input type="checkbox" name="loan_input1" class="LI loan_input1 cb_radio" value="'.$v[1].'"'.$add.'>'.WORD_BR($v[0].chr(10).'<span>（'.number_format($v[1]*10000).'円）</span>').'</span>';
	}
}
?>
</div>
<img src="images/content/search/detail/loan-arrow.svg" class="arrow">
*/
					?>
					<input type="checkbox" name="loan_input1" class="loan_input1" checked value="0" style="display:none;"><!-- JSエラー回避用 -->

					<h3><!--<img src="images/content/search/detail/loan-step2.svg" class="loan_step">-->必須項目をご入力の上、<br class="pc_vanish">「計算する」ボタンを押してください。</h3>
					<div class="clear"></div>
					<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak_limited W100per loan_step2">
						<tr>
							<td class="box">
								<div>
									<table border="0" cellpadding="0" cellspacing="0" class="LIbox2">
										<tr>
											<td>物件価格<?php $loan_prm['物件価格'] = $sysdata[9][$i + 2]; ?></td>
											<td><span class="fontP150" style="vertical-align: middle;"><?php echo number_format($loan_prm['物件価格']); ?></span> 万円<input type="hidden" name="loan_input2" class="loan_input2" value="<?php echo $loan_prm['物件価格']; ?>"></td>
										</tr>
									</table>

									<table border="0" cellpadding="0" cellspacing="0" class="LIbox2B">
										<tr>
											<td>＋諸費用<span class="aco_btn">諸費用について</span></td>
											<td><span class="fontP150" style="vertical-align: middle;"><?php echo number_format($loan_prm['諸費用']); ?></span> 万円<input type="hidden" name="loan_input2B" class="loan_input2B" value="<?php echo $loan_prm['諸費用']; ?>"></td>
										</tr>
									</table>
									<div class="aco_text"><?php echo WORD_BR('諸費用には、下記の費用が含まれます。
・印紙代（不動産売買契約書）
・印紙代（金銭消費賃借契約）
・建物表示登記料
・所有移転保存登録料
・抵当権設定料（ローン）
・火災保険料
・ローン保証料
・団体信用生命保険特約料
・融資手数料
・固定資産負担分
・仲介手数料
※概算費用見積の為、過不足が発生する可能性があります。
※実際の諸費用は、物件や借入条件等によって異なります。詳しくは販売スタッフまでご相談ください。'); ?></div>

									<table border="0" cellpadding="0" cellspacing="0" class="LIbox3">
										<tr>
											<td>－頭金</td>
											<td><input type="text" name="loan_input3" class="LI loan_input3 number_only" value="0"> 万円</td>
										</tr>
									</table>
								</div>
								<span class="bg_FFF_gray dpB" style="padding-top: 1%;"></span>
								<div>
									<table border="0" cellpadding="0" cellspacing="0" class="LIbox4">
										<tr>
											<td>＝借入額<?php $loan_prm['借入額'] = $loan_prm['物件価格'] + $loan_prm['諸費用']; ?></td>
											<td><span class="fontP200 LH100 loan_input4 font_bold"><?php echo number_format($loan_prm['借入額']); ?></span> 万円<input type="hidden" name="loan_input4" class="loan_input4" value="<?php echo $loan_prm['借入額']; ?>"></td>
										</tr>
									</table>
								</div>
							</td>
							<td class="pad"></td>
							<td class="box">
								<div>

									<table border="0" cellpadding="0" cellspacing="0" class="LIbox5">
										<tr>
											<td>
												<div><b>1回あたりボーナス時加算額</b></div>
												※ボーナスは年2回で計算
											</td>
											<td><input type="text" name="loan_input5" class="LI loan_input5 number_only" value="0"> 万円</td>
										</tr>
									</table>

									<table border="0" cellpadding="0" cellspacing="0" class="LIbox6 sp_tblbreak_limited">
										<tr>
											<td><b>金利</b></td>
											<td>
												<?php
												$arr = array(
													1 => array('変動金利（地方銀行など）', $loan_prm['変動金利'], '※お客様それぞれに合わせたプランを算出します。<br>※2026年8月時点。金利は金融機関・借入条件等により異なります。実際の適用金利は、審査結果等を踏まえて決定されます。詳しくは販売スタッフまでご相談ください。'),
													2 => array('固定金利（フラット35）', $loan_prm['固定金利'], '※借入額の1割分は金利' . $loan_prm['1割分金利'] . '％です。（月によって変動します）<br>※2026年8月時点。金利は金融機関・借入条件等により異なります。実際の適用金利は、審査結果等を踏まえて決定されます。詳しくは販売スタッフまでご相談ください。', 'month' => true)
													/*
1.35
*/
												);
												foreach ($arr as $k => $v) {
													$add = ($k < 2) ? ' checked' : '';
													$add2 = (!empty($v['month'])) ? 1 : 0;
													echo '<span><input type="checkbox" name="loan_input6" class="LI loan_input6 cb_radio" n="' . $k . '" value="' . $v[1] . '" month="' . $add2 . '"' . $add . '>' . $v[0] . '</span>';
												}
												?>
											</td>
											<td><span class="fontP200 LH100 loan_input6 font_bold"><?php echo $arr[1][1]; ?></span> %</td>
										</tr>
									</table>
									<?php
									foreach ($arr as $k => $v) {
										$add = ($k > 1) ? ' style="display:none;"' : '';
										echo '<div class="kinri k' . $k . ' fontP075 LH175 clear"' . $add . '>' . $v[2] . '</div>';
									}
									?>

									<table border="0" cellpadding="0" cellspacing="0" class="LIbox7">
										<tr>
											<td><b>借入期間</b></td>
											<td><select name="loan_input7" class="LI loan_input7">
													<?php
													for ($Li = $loan_prm['借入期間最大']; $Li > 0; $Li--) {
														echo '<option>' . $Li . '</option>';
													}
													//<input type="number" name="IP_price_kikan" min="1" max="35" value="1" style="width:3em;">
													?>
												</select><b> 年</b></td>
										</tr>
									</table>

								</div>
							</td>
						</tr>
					</table>
					<div style="height: 30px;"></div>
					<a class="simu_btn">計算する</a>

					<div class="loan_result">
						<img src="images/content/search/detail/loan-arrow.svg" class="arrow">
						<h4>シミュレーション結果</h4>
						<div class="frame">
							<table border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td><span>毎月返済額</span></td>
									<td><span class="res_price1">--,---</span>円</td>
								</tr>
							</table>
							<hr style="margin: auto;">
							<table border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td><span>ボーナス月返済額</span></td>
									<td><span class="res_price2">--,---</span>円</td>
								</tr>
							</table>
						</div>
						<div class="fontP075 LH175" style="margin-top: 0.75em;"><?php echo WORD_BR('※このシミュレーションは借入れを保証するものではありません。
※シミュレーション結果の金額は概算です。詳細なお見積もりは現地アドバイザーにご相談いただくか、フォームよりお問い合わせください。
※別途諸費用'); ?></div>
					</div>
					<?php
					//echo LOAN();
					//require $kaisou."temp_php/temp_loan.php";
					?>
				</div>
			</div>
		<?php } ?>
		<div class="content_box">
			<!-- ▲ ローン -->

		<?php
				$cnt++;
			}
		?>

		<?php
		//<div style="height:50px;"></div>
		//お問い合わせボタン（区画後）
		//echo $local_contactbtn;
		?>

		<?php
		if ($sysdata[21] != '') {
		?>
			<style>
				.movie_pad {
					padding: min(100px, max(50px, 10vw)) 0;
				}

				.movie_box {
					width: 800px;
					max-width: 100%;
					margin: auto;
				}

				.movie_box>div {
					padding-top: 60%;
				}

				.movie_box iframe {
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
				}
			</style>
			<div style="border-top: solid 1px #888;"></div>
			<?php
			echo ANCHOR('movie');
			/*
<h3 class="local_title">ルームツアー</h3>
<h3 class="local_title">動画</h3>
*/
			?>
			<div class="movie_pad">
				<div class="movie_box">
					<div class="pos_rel">
						<iframe src="<?php echo $sysdata[21]; ?>" class="dpB" frameborder="0" allowfullscreen=""></iframe>
					</div>
				</div>
			</div>
		<?php } ?>

		</div>
		<?php
		/*
<div style="border-top: solid 1px #888;"></div>
*/
		echo ANCHOR('gallery');
		LOCAL_JUMP_MENU();
		?>
		<div class="content_box">

			<?php
			//ギャラリー初期化

			$str = '';
			$cnt = $cnt_p = $cnt_p_check = $cnt_LR = $nowcate = 0;
			$gallery_cate = $gallery_img = array();

			/*
echo '<div style="display:none;">';
print_r($sysdata[11]);
echo '<div>　</div>';
print_r($sysdata[12]);
echo '<div>　</div>';
print_r($sysdata['gallery']);
echo '</div>';*/
			if (!is_array($sysdata[12])) {
				$sysdata[12] = array($sysdata[12]);
			}

			if (!empty($sysdata[11])) {
				foreach ($sysdata[11] as $k => $v) {
					//echo '<div style="display:none;">'.$v.'</div>';
					switch ($v) {
						case 'T':
							//写真タイトル
							if ($cnt_LR > 0) {
								$str .= '<div class="clear"></div></div>' . chr(10);
								$cnt_LR = 0;
							}
							if (empty($sysdata[12][$cnt])) {
								$sysdata[12][$cnt] = '';
							} //PP7.0対応
							$str .= '<div class="title">' . $sysdata[12][$cnt] . '</div>' . chr(10);
							$cnt++;
							break;
						case 'P':
							$flag = true; //PHP7.0対応
							switch (true) {
								case (empty($sysdata['gallery'][$cnt_p])):
								case (strpos($sysdata['gallery'][$cnt_p], 'y' . $sysdata[0] . '-' . $cnt_p_check) === false):
									$flag = false;
							}
							if (!$flag) {
								//番号ずれをスルーするようにする
								$cnt_p_check++;
								$cnt++;
							} else {
								$pic = $sysdata['gallery'][$cnt_p++];
								if ($cnt_LR < 1) {
									$str .= '<div class="p_set">' . chr(10);
								}
								$str .= '<div class="photo p' . (($cnt_LR % 2) + 1) . '"><span class="dpIB"><img src="' . $pic . '"><div>' . $sysdata[12][$cnt++] . '</div></span></div>';
								$gallery_img[$nowcate][] = $pic;
								$cnt_LR++;
								$cnt_p_check++;
							}
							break;
						default:
							//カテゴリ設定
							if ($cnt_LR > 0) {
								$str .= '<div class="clear"></div></div>' . chr(10);
								$cnt_LR = 0;
							}
							if (count($gallery_cate) > 0) {
								$str .= '</div>' . chr(10);
							}
							$gallery_cate[] = $nowcate = $v;
							$str .= '<div class="local_gallerybox gb' . count($gallery_cate) . '">';
					}
				}
			} //if(!empty($sysdata[11]))
			if ($cnt_LR > 0) {
				$str .= '<div class="clear"></div></div>' . chr(10);
			}
			$str .= '</div>' . chr(10);

			//周辺情報があって物件情報がなければfalse
			//print_r($gallery_img);
			$detail_photo_flag = true;
			if (!empty($gallery_img['周辺情報'][0])) { //PHP7.0対応
				if (file_exists($gallery_img['周辺情報'][0])) {
					$detail_photo_flag = file_exists($gallery_img['物件情報'][0]); //周辺情報があって物件情報がなければfalse
				}
			}

			function INFO_DT_PHOTOSWITCH($add = '')
			{
				global $detail_photo_flag, $step;
				if ($step != 3) {
					echo $add . '<div class="local_gal_select">
<table border="0" cellpadding="0" cellspacing="0" class="fontP110 LH100"><tr>
<td class="detail_menu1"><div class="pos_rel' . ($detail_photo_flag ? ' selected' : '') . '"><div class="skew"></div><span>物件情報</span><a href="#gallery"></a><div class="sideline"></div><div class="pos_abs">' . ($detail_photo_flag ? '・' : '') . '</div></div></td>
<td class="detail_menu2"><div class="pos_rel' . (!$detail_photo_flag ? ' selected' : '') . '"><div class="skew"></div><span>周辺情報</span><a href="#gallery"></a><div class="sideline"></div><div class="pos_abs">' . (!$detail_photo_flag ? '・' : '') . '</div></div></td>
</tr></table>
</div>' . chr(10);
				}
			}
			?>
			<script>
				$(window).load(function() {
					<?php if ($detail_photo_flag) { ?>
						$(".local_gallerybox.gb2").addClass("dpN");
					<?php } else { ?>
						$(".local_gallerybox.gb1").addClass("dpN");
					<?php } ?>

					$(".detail_menu1 a").click(function() {
						$(".detail_menu1 > div").addClass("selected");
						$(".detail_menu2 > div").removeClass("selected");
						$(".detail_menu1 .pos_abs").text("・");
						$(".detail_menu2 .pos_abs").text("");
						$(".local_gallerybox.gb1").removeClass("dpN");
						$(".local_gallerybox.gb2").addClass("dpN");
						return false;
					});
					$(".detail_menu2 a").click(function() {
						$(".detail_menu2 > div").addClass("selected");
						$(".detail_menu1 > div").removeClass("selected");
						$(".detail_menu1 .pos_abs").text("");
						$(".detail_menu2 .pos_abs").text("・");
						$(".local_gallerybox.gb2").removeClass("dpN");
						$(".local_gallerybox.gb1").addClass("dpN");
						return false;
					});
				});
			</script>
			<style>
				.local_gallerybox.gb2 {
					display: none;
				}
			</style>
			<?php
			//INFO_DT_PHOTOSWITCH();//廃止
			echo $str;
			//INFO_DT_PHOTOSWITCH();//廃止
			?>
			<div style="height:3em; border-bottom: solid 1px #888;"></div>
			<?php echo ANCHOR('gaiyou'); ?>
			<h3 class="local_title">物件概要</h3>
			<div class="local_gaiyoubox">
				<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak LH175">
					<?php
					/*
			【物件概要のテーブル生成手順】
			１：まずは全角スペース・タブを全て半角スペースに変換（物件概要内のスペースは全て半角に統一）
			２：改行タグで分割し、1行ずつ配列に収めていく
			３：半角スペースでさらに分割した配列を作成
			４：空白配列を削除
			５：$arr2[0]はそのまま$arr3[0]に格納
			６：$arr2[1]以降を$arr3[1]にまとめていく。
	*/
					//print_r($sysdata[6][3]);
					$arr = str_replace(array("　", "	"), ' ', $sysdata[6][3]);
					$arr = explode('<br />', $arr);
					//print_r($arr);
					foreach ($arr as $k => $v) {
						$arr2 = explode(' ', $v);
						$arr2 = array_filter($arr2, "strlen"); //空白配列削除
						//print_r($arr2);
						$arr3 = array('', '');
						foreach ($arr2 as $k => $v) {
							if ($k > 0) {
								//内容
								if ($arr3[1] != '') {
									$arr3[1] .= ' ';
								}
								$arr3[1] .= $v;
							} else {
								//見出し
								$arr3[0] = $v;
							}
						}
						//print_r($arr3);
					?>
						<tr>
							<td>
								<div><?php echo $arr3[0]; ?></div>
							</td>
							<td><?php echo $arr3[1]; ?></td>
						</tr>
					<?php
					}
					?>
				</table>
				<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak LH175" style="margin-top: 1em;">
					<tr>
						<td>販売会社</td>
						<td>
							<div><?php echo $sysdata[6][4]; ?></div>
							<div class="fontP075" style="word-break: keep-all;"><?php echo $sysdata[6][5]; ?></div>
						</td>
					</tr>
				</table>
			</div>

			<style>
				.shiryouDL_set {
					margin-top: 70px;
					margin-bottom: 70px;
					width: 30em;
					max-width: 100%;
					display: flex;
					justify-content: center;
					align-items: center;
				}

				.shiryouDL_set .btn_bgLtoR {
					background-color: #00A0E9;
					color: #FFF;
					border-color: #00A0E9;
					border-radius: 0;
				}

				.shiryouDL_set .btn_bgLtoR>*:before {
					background-color: #FFF;
				}

				.shiryouDL_set .btn_bgLtoR:hover>*>span {
					color: #00A0E9;
				}

				.shiryouDL_set .btn_bgLtoR:hover>*>svg polyline {
					stroke: #00A0E9;
				}
			</style>
			<div class="shiryouDL_set">
				<?php
				$shiryou = glob('system/search/upload/shiryou/' . $sysdata[0] . '/*');
				foreach ($shiryou as $v) {
					if (file_exists($v)) {
						echo '<a href="' . $v . '" target="_blank" class="btn_bgLtoR W100per textC"><div><span>資料のダウンロードはこちら</span>' . SVG('arrow-btn') . '</div></a>';
						break;
					}
				}
				?>
			</div>


			<?php echo ANCHOR('access'); ?>
			<h3 class="local_title">アクセス・周辺環境</h3>
			<div class="bg_FFF_gray W1200 Wmax100per mgnAuto">
				<?php
				/*
$mapset='';
$map_center_lat=0;
$map_center_lng=0;
$map_msg=0;
$map_arr=array();
*/
				$sysdata[2] = str_replace("[", "【", $sysdata[2]);
				$sysdata[2] = str_replace("]", "】", $sysdata[2]);
				$sysdata[13][0] = str_replace(array('　', ' ', '	'), "", $sysdata[13][0]);
				$sysdata[13][1] = str_replace(array('　', ' ', '	'), "", $sysdata[13][1]);

				$mapset = "{name:'" . $sysdata[2] . "',
	lat:" . $sysdata[13][0] . ",
	lng:" . $sysdata[13][1] . ",
	icon:'images/common/map-pin.png'
}";

				$map_center_lat = $sysdata[13][0];
				$map_center_lng = $sysdata[13][1];

				?>
				<script>
					$(window).load(function() {
						<?php if (empty($map_msg)) {
							$map_msg = '';
						} ?>
						infoWindow[<?php echo $map_msg; ?>].open(map, marker[<?php echo $map_msg; ?>]);
					});
				</script>
				<div id="map" class="textL step3_vanish" style="height:600px;"></div>
			</div>
			<div class="local_shuuhenbox">
				<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak LH175">
					<?php
					for ($i = 2; $i < count($sysdata[13]); $i++) {
					?>
						<tr>
							<td><?php echo $sysdata[13][$i]; ?></td>
							<td><?php echo $sysdata[6][$i + 4]; ?></td>
						</tr>
					<?php
					}
					?>
				</table>
			</div>

			<div style="height:50px;"></div>
			<?php
			//お問い合わせボタン
			echo $local_contactbtn;
			?>

			<div class="local_bnrbox Wmax1300">
				<?php
				if (!empty($sysdata['banner'])) {
					//print_r($sysdata[14]);
					if (!is_array($sysdata[14])) {
						$sysdata[14] = array($sysdata[14]);
					}
					if (!is_array($sysdata[15])) {
						$sysdata[15] = array($sysdata[15]);
					}
					foreach ($sysdata['banner'] as $k => $v) {
						$url = ($sysdata[15][$k] == '別ウインドウ') ? $t_blank : '';
						$url = ($sysdata[14][$k] != '') ? ' href="' . $sysdata[14][$k] . $url . '"' : '';
						echo '<a' . $url . '><img src="' . $v . '"></a>';
					}
				}
				?>
			</div>
			<?php
			//print_r($sysdata[16]);
			//print_r($sysdata_proto);
			//echo file_get_contents($file_path);
			?>
		</div>
		<div class="bg_FFF_gray content_box under_slidebox">
			<div class="top_ranking">
				<h3>周辺の物件</h3>
				<div class="r_slide">
					<script>
						$(window).load(function() {

							//初期化
							ranW = ranM = 0;
							time_cnt = 0;
							ranL = $('.top_ranking ul li').length;
							$('.top_ranking ul').attr('move', 0);
							SLIDE_RESIZE();

							//ウィンドウサイズ変更時
							$(window).bind("resize load", function() {
								time_cnt = 0;
								SLIDE_RESIZE();
							});

							//ボタン操作
							$('.top_ranking .prev').click(function() {
								time_cnt = 0;
								SLIDE_PREV();
							});
							$('.top_ranking .next').click(function() {
								time_cnt = 0;
								SLIDE_NEXT();
							});

						});

						function SLIDE_RESIZE() {
							setW = $('.top_ranking .r_slide').width();
							btnW = $('.top_ranking .btn.prev').width();
							setW = setW - (btnW * 2);
							$('.top_ranking .s_set').css('width', setW);
							ranW = $('.top_ranking .s_set').width();
							WinW = $(window).width();
							if (WinW >= 1000) {
								ranW = Math.floor(ranW / 3);
							}
							maxH = 0;
							$('.top_ranking ul li').each(function(i, val) {
								nowH = $(this).height();
								if (maxH < nowH) {
									maxH = nowH;
								}
							});
							$('.top_ranking .s_set').css('height', maxH);
							$('.top_ranking ul').css('width', ranW * (ranL + 1));
							$('.top_ranking ul li').css('width', ranW);
							if ($('.top_ranking ul').hasClass('few')) {
								ranM = 1;
							}
							SLIDE_MOVE();
						}

						function SLIDE_PREV() {
							ranM += 1;
							SLIDE_MOVE();
						}

						function SLIDE_NEXT() {
							ranM -= 1;
							SLIDE_MOVE();
						}

						function SLIDE_MOVE() {
							if (ranM > 0) {
								ranM = 0;
							} else {
								if (WinW >= 1000) {
									add = 3;
								} else {
									add = 1;
								}
								if (ranM < (-ranL + add)) {
									ranM = (-ranL + add);
								}
							}
							$('.top_ranking ul').removeClass('trans0s');
							$('.top_ranking ul').attr('move', ranM);
							$('.top_ranking ul').css('left', ranM * ranW);

							if ($('.top_ranking ul').hasClass('loop')) {
								//ループ処理
								loop = false;
								limit = $('.top_ranking ul').attr('limit');
								if (ranM > (-limit)) {
									ranM -= limit;
									loop = true;
								} else if ((ranM <= (-limit * 2))) {
									ranM -= (-limit);
									loop = true;
								}
								if (loop) {
									$('.top_ranking ul').delay(200).queue(function() {
										$(this).dequeue();
										$('.top_ranking ul').addClass('trans0s');
										$('.top_ranking ul').attr('move', ranM);
										$('.top_ranking ul').css('left', ranM * ranW);
									});
								}
							}
						}
					</script>
					<style>
						.top_ranking .r_slide li td .box3 {
							padding-top: 1.5em;
						}

						.top_ranking .r_slide li td .box3>span:nth-child(1) {
							width: 15em;
							font-weight: bold;
							padding-bottom: 0.5em;
							gap: 0.25em 1em;
							display: flex;
							flex-wrap: wrap;
						}

						.top_ranking .r_slide li td .box3>span:nth-child(1)>font {
							display: inline-block;
						}
					</style>
					<?php
					//リスト生成
					$data_shitei = array();
					$arr = explode('<br />', $sysdata[16]);
					//print_r($arr);
					foreach ($arr as $k => $v) {
						//ID指定がなければパス
						if (strpos($v, 'ID:') === false) {
							continue;
						}
						$v = explode('/', $v); //$v[0]のみ使用
						$v = str_replace(array('ID:'), '', $v[0]); //数値のみにする
						$data_shitei[$v] = 'o';
					}

					foreach ($sysdata_proto as $key => $sysdata) {
						//指定のID以外除外
						if (empty($data_shitei[$sysdata[0]])) {
							continue;
						}
						if (CMS_OPEN()) {
							continue;
						}
						CMS_DATA_REPLACE();
						CMS_IMGSET($sysdata[0]);
						$data_shitei[$sysdata[0]] = $sysdata;
					}
					//print_r($data_shitei);
					?>
					<div class="btn prev"><?php echo SVG('arrow-btn'); ?></div>
					<div class="s_set">
						<div class="pos_rel">
							<ul>
								<?php
								$cnt = 0;
								$str = '';
								/*
echo '<div style="display:none;">';
print_r($data_shitei);
echo '</div>';
*/
								require $kaisou . "temp_php/func_ranking.php";
								foreach ($data_shitei as $k => $v) {
									if (!is_array($v)) {
										continue;
									} //非公開は除外
									//販売済みは除外
									if (!is_array($v[3])) {
										$v[3] = array($v[3]);
									}
									$v3_check = '｜' . implode('｜', $v[3]) . '｜';
									if (strpos($v3_check, '｜5｜') !== false) {
										continue;
									}

									$rk_rewrite = array();
									$rk_rewrite[] = RANKING_ACCESS($v[6][0]);
									$rk_rewrite[] = RANKING_ACCESS($v[6][1]);
									$rk_rewrite[] = RANKING_PRICE($v[9]);

									if (!is_array($v[19])) {
										$v[19] = array($v[19]);
									}
									if (!is_array($v[24])) {
										$v[24] = array($v[24]);
									}

									//会員限定の判定変更（2025/06/25更新
									$check = '|' . implode('|', $v[24]) . '|';
									//print_r($check);
									$check = (strpos($check, '|1|') !== false) ? 1 : 0;
									$rk_phase = RANKING_PHASE($check);

									$v[2] = '<font>' . str_replace('　', '</font><font>', $v[2]) . '</font>'; //空白で折り返せるようにする

									$str .= '<li class="phase' . $check . '"><table border="0" cellpadding="0" cellspacing="0"><tr>
<td><div class="box1">' . $area_list_num[$v[17]] . '</div>
<a href="' . $link_list['物件詳細'][0] . '?id=' . $k . '" class="dpB' . $rk_phase['login'] . '"><img src="images/common/clear-W250H166.png" class="box2 ' . $rk_phase['size'] . '" style="background-image: url(' . $rk_phase['photo'] . ');"></a>
<div class="box3">' ./*<span><img src="images/common/clear-W28H44.png" class="bg_cover"><span>'.($cnt++).'</span></span>*/ '<span><div class="font_thin">' . $v[19][0] . '</div>' . $v[2] . '</span></div>
<div class="box4">' . WORD_BR($rk_rewrite[0] . chr(10) . $rk_rewrite[1]) . '<div class="clear"></div></div>
<div class="box5">' . $rk_rewrite[2] . '万円 ～</div></td>
</tr></table></li>' . chr(10);
									$cnt++;
								}
								//print_r($cnt);
								switch (true) {
									case ($cnt > 3): //4以上
										echo $str . $str . $str;
								?>
										<script>
											$(window).load(function() {
												$('.top_ranking ul').addClass('loop');
												$('.top_ranking ul').attr('limit', <?php echo $cnt; ?>);
												ranM -= <?php echo $cnt; ?>;
												SLIDE_MOVE();

												//自動ループ
												setInterval(function() {
													if (time_cnt >= 50) {
														time_cnt = 0;
														SLIDE_NEXT();
													} else {
														time_cnt++;
													}
													/*
													if((time_cnt>=50)&&(!touch)){
														SLIDE_NEXT();
														time_cnt=0;
													}
													else if(!touch){time_cnt++;}
													else{time_cnt=0;}
													*/
												}, 100);
											});
										</script>
									<?php
										break;
									case ($cnt > 0): //1～3
										echo $str;
									?>
										<script>
											$(window).load(function() {
												$('.top_ranking ul').addClass('few');
												$('.btn.prev').addClass('pc_vanish');
												$('.btn.next').addClass('pc_vanish');
												SLIDE_MOVE();
											});
										</script>
									<?php
										break;
									default: //無し
									?>
										<script>
											$(window).load(function() {
												$('.under_slidebox').addClass('im_vanish');
											});
										</script>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
					<div class="btn next"><?php echo SVG('arrow-btn'); ?></div>
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
	<script>
		var markerData = [<?php echo $mapset; ?>];
		var zoom = 15;
		var center_lat = <?php echo $map_center_lat; ?>;
		var center_lng = <?php echo $map_center_lng; ?>;
	</script>
	<?php echo $temp_googlemap_js; ?>
	<script>
		//画像の読み込みを待つ必要がない（位置も大きさも読まない）。ready で束ねて
		//写真の多い物件でもボタンが押せない時間を作らない。
		$(function() {

			$('.voice_btn').on('click', function() {
				var audio = $(this).siblings('.voice_audio')[0];
				//他区画の音声を止める（入れないと4区画ぶんが重なって鳴る）
				$('.voice_audio').not(audio).each(function() {
					this.pause();
					this.currentTime = 0;
				});
				if (audio.paused) {
					var p = audio.play();
					//読み込み失敗時に play() の Promise は reject する。
					//受けないとコンソールに uncaught rejection が残る。
					//状態の巻き戻しは下の error ハンドラが行う。
					if (p && p.catch) {
						p.catch(function() {});
					}
				} else {
					audio.pause();
				}
			});

			//状態は audio 自身のイベントで拾う（再生終了・他区画からの停止にも追従）。
			//error はバブルしないので $('.voice_audio') へ直接バインドすること。
			$('.voice_audio').on('play', function() {
				$(this).siblings('.voice_btn').attr('aria-pressed', 'true');
			}).on('pause error', function() {
				$(this).siblings('.voice_btn').attr('aria-pressed', 'false');
			});

		});
	</script>
</body>

</html>