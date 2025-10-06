<?php
session_start();
session_destroy();//セッション破棄

include '../secret/cms_now.php';//現在時刻・ページ
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include '../secret/parts_meta.php'; ?>
</head>

<body id="<?php echo $nowpage_db['type']; ?>">
<?php
include '../secret/parts_head.php';
include '../secret/parts_login.php';
?>
</body>
</html>