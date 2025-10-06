<?php
session_start();
require '../secret/login_check.php';

include '../secret/cms_now.php';//現在時刻・ページ
include '../secret/cms_param-info.php';//配列（新着用）

include '../secret/record_read.php';//読み込み関数
include '../secret/record_edit.php';//記録
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include '../secret/parts_meta.php'; ?>
</head>

<body id="<?php echo $nowpage_db['type']; ?>">
<?php include '../secret/parts_head.php'; ?>
<?php include '../secret/parts_result.php'; ?>
<?php include '../secret/parts_foot.php'; ?>
</body>
</html>