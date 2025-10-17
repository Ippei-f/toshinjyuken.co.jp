<?php
$p_type='content';
$kaisou='../';
$p_title='';
$temp_footer_option=array
('movie'=>false
,'bnr'=>false
);
$dir='img/';
require $kaisou."temp_php/basic.php";

//セッション開放
session_start();
$_SESSION = array();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "q9jko9zyqi");
</script>
<title><?php echo $temp_title; ?></title>
<link href="../css/common.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<main class="LP font_yugo LH100<?php echo ($step>=3)?' conf':''; ?>">
<!-- ** -->
<!-- *** -->
<?php echo ANCHOR('contact'); ?>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>#contact" method="post" class="<?php echo ($step==3)?'conf':''; ?>">
<section class="lp_form content_box"><div class="Wbase W1200">
<?php
echo '<div class="textC LH175 fontP150 sp_fontP140" style="padding-top:90px; padding-bottom:100px;">'.WORD_BR('お問い合わせ内容を送信しました。
ありがとうございました。').'</div>
<div class="textC">'.EFFECT_BTN('TOP','トップに戻る').'</div>'.chr(10);
?>
</div></section>
</form>
<?php echo CONTENT_PAD(100,50); ?>
<!-- *** -->
<!-- ** -->
</main>
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>