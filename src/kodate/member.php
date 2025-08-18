<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'images/content/member/';
$p_title='会員登録';
require $kaisou."temp_php/basic.php";

$recaptcha_url='../recaptcha/';

//フォームのセット（テンプレ読み込み）
require_once $kaisou.$recaptcha_url.'form/set/setup-member.php';

//$_GET配列・PHP7.0対応
$get_arr=$_GET;
if($get_arr==''){$get_arr=array();}
if(empty($get_arr['id'])){$get_arr['id']='';}
if(empty($get_arr['btn'])){$get_arr['btn']='';}
if(empty($get_arr['send'])){$get_arr['send']='';}
if(empty($get_arr['input'])){$get_arr['input']='';}

//メール定型文
$sendtext_arr=array
('送信タイトル'=>'---'.$comp_data['HP名'].' 会員登録---'
,'返信タイトル'=>'会員登録ありがとうございます ---'.$comp_data['HP名'].'---'
,'返信ヘッダ文'=>'この度は、'.$comp_data['HP名'].'会員登録をいただき誠にありがとうございます。
本メールは、お客さまの'.$comp_data['HP名'].'会員登録が、下記の内容で完了しましたことをお知らせするものです。
'.$comp_data['HP名'].'会員登録をしていただきますと、
新着物件を優先的にご案内させていただいたり、会員様限定ページをご覧いただくことができます。
会員様限定ページへのアクセスに必要なログインID及びパスワードを下記にてお知らせいたします。
──────────
ログインID：toshin2020
パスワード：toshin2020
──────────
※IDとパスワードは同じになります'
,'返信下追加文'=>''
,'サンクスURL' =>''
);

require $kaisou.$recaptcha_url."form/form.php";//2023ver
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
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php echo PAN(array($p_title)); ?>
<?php echo PAGE_TITLE($p_title,$comp_data['HP名']); ?>
<!-- *** -->
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post" class="<?php echo ($step==3)?'conf':''; ?>">
<?php
if($step<3){
//LINEバナー呼び出し
require '../recaptcha/form/set/parts-line.php';
?>
<div class="bg_F30" style="margin-bottom: 40px;"><div class="W1000 Wmax100per mgnAuto">
<style>
.mainpic_box{
	padding-top: 60px;
	padding-bottom: 50px;
	color:#FFF;
}
.mainpic_box > table{max-width: 90%;}
.mainpic_box > table img[src*=".svg"]{width:100%;}
.mainpic_box .frame{
	width:800px;
	max-width: 90%;
	margin: auto;
	margin-top: 60px;
	border: solid 1px #FFF;
	padding: 1em 0;
	font-size: 115%;
}
@media screen and (min-width: 1000px) {
	.mainpic_box > table{width:770px;margin: auto;}
	.mainpic_box tr > *{
		text-align: left;
		vertical-align: middle;
	}
	.mainpic_box tr td:nth-child(1){width:177px;}
	.mainpic_box tr td:nth-child(2){
		padding-left: 48px;
		font-size: 115%;
	}
}
@media screen and (max-width: 999px) {
	.mainpic_box tr td:nth-child(1){
		/* width:142px; */
		width: 38.115%;
		margin: auto;
	}
	.mainpic_box tr td:nth-child(2),
	.mainpic_box .frame{
		font-size: 105%;
		margin-top: 1.25em;
	}
}
</style>
<div class="mainpic_box LH200">
<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak_limited"><tr>
<td><img src="images/common/icon-members_only-W.svg"></td>
<td class="sp_br_del"><?php echo WORD_BR($comp_data['HP名'].'の会員登録をしていただきますと、
<b>ご希望エリアの新着物件を優先的に</b>ご案内させていただいたり、
<b>会員様限定ページ</b>をご覧いただくことができます。
完全無料でご利用いただけますので、ぜひご登録ください。') ?></td>
</tr></table>
<div class="frame"><?php echo WORD_BR('※会員登録いただいた後に、<br class="pc_vanish">会員様限定ページへの<br class="pc_vanish">アクセスに必要な<br class="sp_vanish">IDとパスワードを<br class="pc_vanish">メールにてお送りさせていただきます。') ?></div>
</div>
</div></div>
<?php
}//if($step<3)
?>
<div class="content_box">
<div class="contact_box">
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
	echo FORM_STEP();
	echo FORM_CAUTION();
	echo FORM_SET_MAKE();
	require_once $kaisou.$recaptcha_url.'form/set/temp_privacy.php';//2023ver
	RECAPTCHA_CHECK();//recaptchaチェック表示
	echo SUBMIT_SET(SUBMIT_BTN('sm_conf','入力内容確認').SUBMIT_BTN('reset'));
}
?>
</div>
</div>
</form>
<div style="height:90px;"></div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>