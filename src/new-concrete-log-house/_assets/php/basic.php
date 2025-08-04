<?php
//<meta charset="utf-8">

//差分PHP
//include_once $kaisou.'_assets/php/data-comp.php';
include_once $kaisou.'_assets/php/data-link.php';
//include_once $kaisou.'_assets/php/func.php';
include_once $kaisou.'../kodate/temp_php/data-area.php';//東新住建の家・エリアデータ

$democheck=$_SERVER['SCRIPT_FILENAME'];
switch(true){
	case (strpos($democheck,'showa')!==false):
	$democheck='showa';
	break;
	default:
	$democheck='';
}

function TEMP_META(){
	global $kaisou,$democheck;
	if($democheck==''){
		//公開
?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PRRJRDR');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "rmxpcdk6jj");
</script>
<?php
	}
	else{
		//昭和デモ
?>
<meta name="robots" content="noindex,nofollow">
<?php
	}
?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="keywords" content="稲沢市,豊田市,分譲住宅,ALC外壁,旭化成建材,耐久性,断熱性,防音性,耐火性,耐震性,木地仕上げ">
<meta name="description" content="ALCコンクリートは60年間張り替えが不要で永く美しい外観を保ちます。優れた耐熱・保温・遮音性能で快適な住空間を生み出し、断熱材いらずで木地仕上げの温もり溢れる内壁を実現します。">
<?php
/*
<!-- ▼OGPの設定も今後は入れていく（2022/09/29） -->
<meta property="og:url" content=" ページの URL" />
<meta property="og:type" content=" ページの種類" />
<meta property="og:title" content=" ページの タイトル" />
<meta property="og:description" content=" ページの説明文" />
<meta property="og:site_name" content="サイト名" />
<meta property="og:image" content=" サムネイル画像の URL" /><!-- imageは画像サイズを1200px×630pxにすると最適な表示がされます。 -->
<!-- ▼ファビコンの場所も以下に固定（2022/09/29） -->
<link rel="icon" href="/favicon.ico" sizes="any"><!-- レガシーブラウザ用のfavicon.ico -->
<link rel="icon" href="/icon.svg" type="image/svg+xml"><!-- モダンブラウザ用のSVGアイコン -->
<link rel="apple-touch-icon" href="/apple-touch-icon.png"><!-- Appleデバイス用の180×180のPNGアイコン -->
*/
?>
<title>東新住建/強さと温もり、両方を叶えるALCコンクリートログハウス</title>
<?php
	$rand='?'.rand();
	echo '<link href="'.$kaisou.'_assets/css/common.css'.$rand.'" rel="stylesheet" type="text/css">'.PHP_EOL;
	echo '<link href="'.$kaisou.'_assets/css/kodate.css'.$rand.'" rel="stylesheet" type="text/css">'.PHP_EOL;
	echo '<script src="'.$kaisou.'_assets/js/jquery.v1.11.1.min.js" type="text/javascript"></script>'.PHP_EOL;
	echo '<script src="'.$kaisou.'_assets/js/common.js'.$rand.'" type="text/javascript"></script>'.PHP_EOL;
}

function TEMP_PAGETOP(){
global $democheck;
	if($democheck==''){
		//公開
		?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PRRJRDR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<?php
	}
}

function TEMP_HEADER(){
/*
ヘッダーの基本構造は発電シェルターと同じ
*/
global $area_list_2025,$link_list;
?>
<header><div class="H_head">
<div class="menubtn"><div>
<span></span>
<span></span>
<span></span>
</div></div>
<div class="accbox">
<a href="#">TOP</a>
<a href="../kodate/search.php?search=ブランド,<?php echo $area_list_2025['ブランド'][5][0]; ?>">物件一覧</a>
<a href="#alc">ALCコンクリートの特徴</a>
<?php /*<a href="../kodate/voice.php?brand=5,21">お客様の声</a>*/ ?>
<a href="<?php echo $link_list['外部:お客様の声'][0]; ?>">お客様の声</a>
<a href="../kodate/contact.php" target="_blank">お問い合わせ</a>
</div>
</div></header>
<div class="rmenu">
<?php /*<a href="search.php"><div><img src="images/common/icon-house.svg">物件一覧</div></a>*/ ?>
<a href="../kodate/contact.php" target="_blank"><div class="sp_vanish">お問い合わせ</div><div class="pc_vanish">見学予約・資料請求</div></a>
<a href="#"><img src="../hatsuden-shelter-house/images/common/pagetop.svg"></a>
</div>
<div class="H_head"></div>
<?php
}

function TEMP_FOOTER(){
/*
フッターは東新住建の家と同じ
*/
?>
<section class="top_bnr_tel_line">
<div class="tt">電話・LINEでのお問い合わせはこちら</div>
<div class="tel"><a href="tel:0800-170-5104"><img src="../kodate/images/top/bnr/bnr-tel.svg"></a>営業時間／10:00～18:00　定休日／水曜日</div>
<div class="line"><a href="https://lin.ee/v4vz5KD" target="_blank"><img src="../kodate/images/top/bnr/bnr-line.svg"></a></div>
</section>
<footer>
<div class="fmenu"><div class="Wbase">
<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak W100per"><tbody><tr>
<td class="logoset">
<a href="../kodate/index.php" class="logo"><img src="../kodate/images/common/logo-2021-W.svg"></a>
<a href="../kodate/contact.php" class="contact">資料請求・お問い合わせ</a>
<a href="tel:0800-170-5104" class="tel"><img src="../kodate/images/common/foot-tel.svg"></a>
</td>
<td class="menuset">
<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak"><tbody><tr>
<td>
<div><a href="../kodate/index.php">ホーム<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
<div><a href="../kodate/search.php">物件検索<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
<div><a href="../kodate/news.php">NEWS<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
<div><a href="../kodate/structure.php">東新住建の家づくり<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
</td>
<td>
<div><a href="../kodate/index.php#brand">ブランドコンセプト<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
<div><a href="../kodate/sdgs.php">SDGsへの取り組み<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
<div><a href="../kodate/qa.php">Q&amp;A<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
<?php /* <div><a href="../kodate/voice.php">お客様の声<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div> */ ?>
</td>
<td>
<div><a href="../kodate/member.php">会員登録<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
<div><a href="../kodate/lifestyle.php">コラム<img src="../kodate/images/common/foot-arrow.svg"><div class="clear"></div></a></div>
</td>
</tr></tbody></table>
</td>
</tr></tbody></table>
<hr>
<a href="https://www.toshinjyuken.co.jp/" target="_blank" class="toushin"><img src="../kodate/images/common/logo-toushin-2024.svg"></a>
<div class="toushin_addr">〒492-8628 愛知県稲沢市高御堂一丁目3-18(稲沢本店)</div>
</div></div>
<div class="copy">Copyright (C) TOSHIN JYUKEN All Rights Reserved.</div>
</footer>
<?php
}

function TEMP_BODYEND(){
?><?php
}

function IMG_TAG($fn,$add='',$rf=false){
	global $kaisou;
	$res='<img src="'.$kaisou.'_assets/img/'.$fn.'" '.$add.'>';
	if($rf){return $res;}
	else{echo $res;}
}
function IMG_TAG_PCSP($fn,$add='',$rf=true){
	global $kaisou;
	$fn=array($fn);
	$fn['PC']=str_replace('.','-pc.',$fn[0]);
	$fn['SP']=str_replace('.','-sp.',$fn[0]);
	$res='<div class="vanish_branch">
<img src="'.$kaisou.'_assets/img/'.$fn['PC'].'" '.$add.'>
<img src="'.$kaisou.'_assets/img/'.$fn['SP'].'" '.$add.'>
</div>'.PHP_EOL;
	if($rf){return $res;}
	else{echo $res;}
}
function IMG_TAG_PCSP_NOWRAP($fn,$add=''){
	global $kaisou;
	$fn=array($fn);
	$fn['PC']=str_replace('.','-pc.',$fn[0]);
	$fn['SP']=str_replace('.','-sp.',$fn[0]);
	$res='<img src="'.$kaisou.'_assets/img/'.$fn['PC'].'" '.$add.'><img src="'.$kaisou.'_assets/img/'.$fn['SP'].'" '.$add.'>';
	return $res;
}
/*
<picture>を使えばPCとSPで読み込む画像を分岐することが出来る。（関数作成予定）

<picture><source media="(max-width:999px)" srcset="assets/xxx-sp.jpg"/><img src="assets/xxx-pc.jpg" alt=""/></picture>
*/
function ANCHOR($name,$prm=array()){
	$anc='';
	if(!empty($prm['anc'])){//PHP7.0対応
		if($prm['anc']!=''){
			$anc=$prm['anc'];
		}
	}
	if(is_numeric($name)){$name='sec'.sprintf('%02d',$name);}//数値のみなら2ケタにする
	return '<div class="anchor"><a id="'.$anc.$name.'" name="'.$anc.$name.'"></a></div>'.chr(10);
}
?>