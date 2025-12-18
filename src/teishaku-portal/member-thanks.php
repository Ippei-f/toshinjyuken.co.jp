<?php
$p_type='content';
$kaisou='';
$p_title='会員登録';
$dir=$kaisou.'images/content/contact/';
require $kaisou."temp_php/basic.php";
require $kaisou."temp_php/form/parts.php";
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
<?php
echo PAN(array($p_title));
echo CONTENT_PAGE_TITLE($p_title,$comp_data['HP名']);
?>
<!-- *** -->
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<div class="content_box"><div class="contact_box"><div class="Wbase W800">
<?php
echo FORM_STEP(3);
echo '<div class="textC LH175 fontP150 sp_fontP140" style="padding-top:90px; padding-bottom:100px;">'.WORD_BR('お問い合わせ内容を送信しました。
ありがとうございました。').'</div>
<div class="textC">'.EFFECT_BTN('TOP','トップに戻る').'</div>'.chr(10);
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