<?php
//<meta charset="utf-8">
?>
<main>
<form action="top.php" method="post" class="loginbox">
<dl><dt>ログインID</dt><dd><input type="text" name="login_id"></dd></dl>
<dl><dt>パスワード</dt><dd><input type="password" name="login_pw"></dd></dl>
<input type="submit" value="ログイン">
<div class="prm">
<?php
if(isset($_REQUEST['prm'])){
	switch($_REQUEST['prm']){
		case 'err':
		echo '<div class="err">ID又はパスワードが違います</div>';
		break;
	}
}
?>
</div>
</form>
</main>