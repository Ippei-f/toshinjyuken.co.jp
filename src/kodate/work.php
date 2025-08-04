<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'images/content/xxxx/';
$p_title='施工事例';
require $kaisou."temp_php/basic.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
<style>
.local_btn{
	display: block;
	width: 18.75em;
	max-width: 100%;
	margin: auto;
	margin-bottom: 4.5em;
}
</style>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php echo PAN(array($p_title)); ?>
<?php echo PAGE_TITLE($p_title); ?>
<!-- *** -->
<div class="content_box">
<div>Instagramにて施工事例を公開しています。</div>
<div class="textC" style="padding-top: 3em; padding-bottom: 6em;">
<a href="<?php echo $link_list['insta'][0]; ?>" class="local_btn"><img src="images/content/work/btn-insta.svg"></a>
<?php echo EFFECT_BTN('TOP','トップに戻る'); ?>
</div>
</div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>