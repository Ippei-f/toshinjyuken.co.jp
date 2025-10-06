<?php
//<meta charset="utf-8">
?>
<header><h1>東新住建 そなえ <?php echo $nowpage_db['title']; ?></h1></header>
<?php
if($nowpage!='login'){
?>
<section class="btn_menu"><div>
<?php
switch($nowpage){
	case 'top':
?>
<a href="edit.php">新規登録</a>
<?php
	break;
	case 'edit':
	case 'result':
?>
<a href="top.php">戻る（中止）</a>
<?php
	break;
}
?>
<a href="login.php?prm=logout">ログアウト</a>
</div></section>
<?php
}
?>
