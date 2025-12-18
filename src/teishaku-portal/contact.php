<?php
$p_type='content';
$kaisou='';
$p_title='問合';
$dir=$kaisou.'images/content/contact/';
require $kaisou."temp_php/basic.php";

$recaptcha_url='../recaptcha/';
require_once $kaisou.$recaptcha_url.'form/common_select_arr.php';//共通配列読み込み

//フォームのセット（テンプレ読み込み）
require_once $kaisou.$recaptcha_url.'form/set/setup-contact.php';

//$_GET配列・PHP7.0対応
$get_arr=$_GET;
if($get_arr==''){$get_arr=array();}
if(!isset($get_arr['id'])){$get_arr['id']='';}
if(!isset($get_arr['btn'])){$get_arr['btn']='';}
if(!isset($get_arr['send'])){$get_arr['send']='';}
if(!isset($get_arr['input'])){$get_arr['input']='';}

//メール定型文
$sendtext_arr=array
('送信タイトル'=>'---'.$comp_data['HP名'].' お問い合わせ---'
,'返信タイトル'=>'お問い合わせありがとうございます ---'.$comp_data['HP名'].'---'
,'返信下追加文'=>''/*※ご来場予約の事前アンケートにお答えいただいた方には、
　会場にてQUOカード1,000円分をお渡しします。*/
,'サンクスURL' =>'contact-thanks.php'
);

require $kaisou.$recaptcha_url."form/form.php";//2023ver

//CMS読み込み
require $kaisou."temp_php/data-area.php";//エリア情報読み込み
$local_bukken_def=array('── 物件名 ──'=>'');
$local_bukken_arr=array();
$local_bukken_arr['エリア']=array('── 全体エリア ──'=>'');
$local_bukken_id=array();
foreach($area_list as $k => $v){
	$local_bukken_arr['エリア'][$v]=$k;
}
$dir_sys= $kaisou.'system/';
require $dir_sys.'function/cms-load.php';//軽量版
$sysdata_proto=CMS_SETUP('search');
foreach($sysdata_proto as $key => $sysdata){
	if(CMS_OPEN($sysdata)){continue;}
	if($sysdata[3]==999){continue;}//完売物件も除外
	CMS_DATA_REPLACE();
	$k2=$local_bukken_arr['エリア'][$sysdata[18]];
	$local_bukken_arr[$k2][]=$sysdata[2];
	if(isset($_GET['id'])&&$_GET['id']==$sysdata[0]){
		$local_bukken_id[0]=$k2;
		$local_bukken_id[1]=$sysdata[2];
		$a=$form_arr_2023['お問い合わせの項目'];
		$_REQUEST[$a[1]]=$a['select'][0];
	}
}
foreach($local_bukken_arr as $k => $v){
	if($k=='エリア'){continue;}
	asort($local_bukken_arr[$k]);//昇順
	$local_bukken_arr[$k]=$local_bukken_def+$local_bukken_arr[$k];
}
//print_r($local_bukken_arr);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/contact.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
<?php
//ギミック読み込み
require_once $kaisou.$recaptcha_url.'form/set/gimmick-contact.php';
?>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php
echo PAN(array($p_title));
echo CONTENT_PAGE_TITLE('来場予約・お問合せ・資料請求',$comp_data['HP名']);
?>
<!-- *** -->
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post" class="<?php echo ($step==3)?'conf':''; ?>">
<div class="content_box"><div class="contact_box">
<?php
switch($step){
	case 4://送信完了
	echo FORM_STEP(3);
	echo '<div class="textC LH175 fontP150 sp_fontP140" style="padding-top:90px; padding-bottom:100px;">'.WORD_BR('お問い合わせ内容を送信しました。
ありがとうございました。').'</div>
<div class="textC">'.EFFECT_BTN('TOP','トップに戻る').'</div>'.chr(10);
	break;
	case 3://送信確認
	echo FORM_STEP(2);
	//echo FORM_CAUTION();
	echo FORM_HIDDEN();
	echo FORM_SET_MAKE();
	echo FORM_HIDDEN_ADD('page_back',$_SERVER["SCRIPT_NAME"],'');
	echo SUBMIT_SET(SUBMIT_BTN('sm_send','送信する').SUBMIT_BTN('sm_back','戻る'));
	break;
	default://入力
	
	//2023年度追加分入力テンプレート
	require_once $kaisou.$recaptcha_url.'form/set/input-contact.php';
	
	echo FORM_SET_MAKE();
	require_once $kaisou.$recaptcha_url.'form/set/temp_privacy.php';//2023ver
	RECAPTCHA_CHECK();//recaptchaチェック表示
	echo SUBMIT_SET(SUBMIT_BTN('sm_conf','入力内容確認').SUBMIT_BTN('reset'));
}
?>
</div></div>
</form>
<?php echo CONTENT_PAD(120,'sp/2'); ?>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>