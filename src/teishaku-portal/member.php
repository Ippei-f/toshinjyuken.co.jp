<?php
$p_type='content';
$kaisou='';
$p_title='会員登録';
$dir=$kaisou.'images/content/contact/';
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
,'返信ヘッダ文'=>'この度は、会員登録をいただき誠にありがとうございます。
本メールは、お客さまの会員登録が、下記の内容で完了しましたことをお知らせするものです。
会員登録をしていただきますと、
新着物件を優先的にご案内させていただいたり、会員様限定ページをご覧いただくことができます。
会員様限定ページへのアクセスに必要なログインID及びパスワードを下記にてお知らせいたします。
──────────
ログインID：'.$comp_data['login_id'].'
パスワード：'.$comp_data['login_pw'].'
──────────
※IDとパスワードは同じになります'
,'返信下追加文'=>''
,'サンクスURL' =>'member-thanks.php'
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
<style>
.bg_member_only{
	background-color: #E9E5DC;
	padding-top: 50px;
	padding-bottom: 50px;
}
.bg_member_only .flex{
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.bg_member_only .flex h3{
	border: solid 1px #B7A663;
	color:#B7A663;
	padding: 1em 1.5em;
	font-size: 100%;
	line-height: 100%;
}
.bg_member_only .flex .text{
	font-size: 112.5%;
	line-height: 200%;
	text-align: left;
}
.bg_member_only .white{
	margin-top: 30px;
	background-color: #FFF;
	padding: 1em;
}
.bg_member_only .white span{
	text-align: left;
	line-height: 150%;
}
@media screen and (max-width: 999px) {
	.bg_member_only{
		padding-top: 40px;
		padding-bottom: 40px;
	}
	.bg_member_only .flex{flex-direction: column;}
	.bg_member_only .flex .text{margin-top: 1em;}
	.bg_member_only .white{margin-top: 1em;}
}
</style>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php
echo PAN(array($p_title));
echo CONTENT_PAGE_TITLE($p_title,$comp_data['HP名']);
?>
<!-- *** -->
<?php
if($step<=2){
?>
<div class="content_box bg_member_only"><div class="Wbase W800">
<div class="flex">
<h3 class="font_min"><?php echo mb_convert_kana('MEMBERS ONLY','A','UTF-8'); ?></h3>
<div class="text sp_br_del"><?php echo WORD_BR('東新住建の家の会員登録をしていただきますと、
ご希望エリアの新着物件を優先的にご案内させていただいたり、
会員様限定ページをご覧いただくことができます。
完全無料でご利用いただけますので、ぜひご登録ください。'); ?></div>
</div>
<div class="white sp_br_del"><span><?php echo WORD_BR('※フォームを送信後に、会員様限定ページへのアクセスに必要な
IDとパスワードをメールにてお送りさせていただきます。'); ?></span></div>
</div></div>
<?php echo CONTENT_PAD(75,40); ?>
<?php
}
?>
<!-- *** -->
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post" class="<?php echo ($step==3)?'conf':''; ?>">
<div class="content_box"><div class="contact_box"><div class="Wbase W800">
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
</div></div></div>
</form>
<?php echo CONTENT_PAD(120,'sp/2'); ?>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>