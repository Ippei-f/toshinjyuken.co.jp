<?php
	require_once('./include/admin_inc.php');
	require_once('./include/config.php');
	require_once('./include/admin_function.php');
//----------------------------------------------------------------------
//  ログイン認証処理 (START)
//----------------------------------------------------------------------
	session_start();
	authAdmin($userid,$password);
//----------------------------------------------------------------------
//  ログイン認証処理 (END)
//----------------------------------------------------------------------
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $pagetitle; ?>　新規登録</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="./js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="./js/common.js"></script>
<script type="text/javascript" src="./js/func-cate.js"></script>
<link rel="stylesheet" type="text/css" href="./js/editor/cleditor.css" />
<script type="text/javascript" src="./js/editor/cleditor.js"></script>
<script type="text/javascript" src="./js/editor/function.js"></script>
<?php require 'temp_php/temp_sort.php'; ?>
</head>
<body>
<div id="container" class="clearfix">
  <div id="logoutBtn" class="linkBtn"><a href="?logout=true">ログアウト</a></div>
  <div id="toPage" class="linkBtn"><a href="./">一覧へ</a></div>
  <h1><?php echo $pagetitle; ?>　新規登録</h1>
  <!--<h2>新規登録</h2>-->
  <form method="post" action="put.php" enctype="multipart/form-data" class="validateForm">
  
<?php
//トークンセット
$token = sha1(uniqid(mt_rand(), true));
$_SESSION['token'] = $token;

$maxbyte=byte_format($maxImgSize, 2, true);
?>
<input type="hidden" name="token" value="<?php echo $token;//トークン発行?>" />
<input type="hidden" name="data[category]" value="" />
<?php
if($_SESSION['cate']>0){
	$_POST['category']=$_SESSION['cate'];
	$num=$_SESSION['cate'];
}
else{
	$num=1;
}
?>
<script>
$(window).load(function(){
	T_CHANGE(<?php echo $num;?>);
});
</script>

<?php
$type_edit=true;
require 'temp_php/temp_arrayset.php';
?>

<div style="margin: 2em 0;">※一度にアップロードできるファイルサイズの合計は <?php echo $maxbyte; ?> までです。</div>

<table class="borderTable01">
<tr>
	<th>登録年月日</th>
	<td><?php echo registYmdList();//日付プルダウン表示?> ※未来の日付にした場合、設定日の0時～表示されます（表示予約機能）</td>
</tr>
<tr>
	<th> 公開・非公開</th>
	<td><input type="hidden" name="data[public_flag]" value="0" />
	<input type="checkbox" name="data[public_flag]" value="1" checked="checked" />
	（チェックで「公開」になります）</td>
</tr>
<?php require 'temp_php/mod/01-title.php'; ?>
<?php
/*
<tr class="cate_onoff c1">
	<th>直リンクURL</th>
	<td><input type="text" name="data[url]" size="40" value="" />
          <br />
          リンクの開き方：
          <input type="radio" name="data[window]" value="1" checked="checked" />
          同一ウインドウ　
          <input type="radio" name="data[window]" value="2" />
          別ウインドウ <br />
          （タイトルから直接リンクしますので詳細ページは無効になります）</td>
</tr>
<tr class="cate_onoff c1">
	<th>直リンクファイル<br />（<?php echo $maxbyte; ?>以内）</th>
	<td><input type="file" name="data[link_file][]" value="" /><br />
	（タイトルからファイルに直接リンクしますので詳細ページは無効になります）<br />
	※<?php echo $permissionExtension;?>のみ。縮小はされません。</td>
</tr>
*/
?>
</table>

<?php require 'temp_php/mod/02-pagetop.php'; ?>
<?php require 'temp_php/mod/03-naiyou.php'; ?>
<?php
/*
<?php require 'temp_php/mod/04-kukaku.php'; ?>
<?php require 'temp_php/mod/05-gallery.php'; ?>
<?php require 'temp_php/mod/06-gaiyou.php'; ?>
<?php require 'temp_php/mod/07-access.php'; ?>
<?php require 'temp_php/mod/08-banner.php'; ?>
<?php require 'temp_php/mod/09-near.php'; ?>
*/
?>

<table class="borderTable01">
<tfoot> 
      <tr>
        <td colspan="2" align="center" valign="middle">アップロードと縮小処理を同時に行いますので、時間がかかることもありますが、そのままで待ってください。<br />
          <br />
          <input type="hidden" name="data[mode]" value="shinki" />
          <input type="submit" value="登録" class="submitBtn" /></td>
      </tr>
      
</tfoot>      
</table>
    <br />
  </form>
 <p class="pagetop linkBtn taR"><a href="#container">PAGE TOP▲</a></p>
</div>
</body>
</html>