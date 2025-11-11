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
//----------------------------------------------------------------------
//  ページ独自処理 (START)
//----------------------------------------------------------------------

	$id = (!empty($_GET['id'])) ? h($_GET['id']) : exit('パラメータがありません');
	$resDataArr = ID2Data($file_path,$id);
	
	$token = sha1(uniqid(mt_rand(), true));
	$_SESSION['token'] = $token;//トークンセット
	
//----------------------------------------------------------------------
//  ページ独自処理 (END)
//----------------------------------------------------------------------
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $pagetitle; ?>　編集画面</title>
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
<div id="container">
<div id="logoutBtn" class="linkBtn"><a href="?logout=true">ログアウト</a></div>
<div id="toPage" class="linkBtn"><a href="./">一覧へ</a></div>
<h1><?php echo $pagetitle; ?>　編集画面</h1>

<?php $maxbyte=byte_format($maxImgSize, 2, true); ?>

<form method="post" action="put.php" enctype="multipart/form-data" class="validateForm">
<input type="hidden" name="token" value="<?php echo $token;//トークン発行?>" />
<input type="hidden" name="data[category]" value="" />

<?php
$type_edit=true;
require 'temp_php/temp_arrayset.php';
?>
<script>
/*
$(window).load(function(){
	T_CHANGE(<?php echo $resDataArr[3];?>);
});
*/
</script>

<div style="margin: 2em 0;">※一度にアップロードできるファイルサイズの合計は <?php echo $maxbyte; ?> までです。</div>

<table class="borderTable01">
<tr>
	<th><span class="yellow">登録年月日</span></th>
	<td><?php echo registYmdList($resDataArr[1]);//日付プルダウン表示?> ※未来の日付にした場合、設定日の0時～表示されます（表示予約機能）</td>
</tr>
<tr>
	<th> 公開・非公開</th>
	<td><input type="hidden" name="data[public_flag]" value="0" />
	<input type="checkbox" name="data[public_flag]" value="1"<?php echo ($resDataArr[7] == 1) ? ' checked="checked"' : '';?> />
	（チェックで「公開」になります）</td>
</tr>
<?php require 'temp_php/mod/01-title.php'; ?>
<tr>
	<th>直リンクURL</th>
	<td><input type="text" name="data[url]" size="40" value="<?php echo TextToKanma($resDataArr[4]);?>" /><br />
	リンクの開き方：
	<input type="radio" name="data[window]" value="1"<?php echo ($resDataArr[5] == 1) ? ' checked="checked"' : '';?> /> 同一ウインドウ　 
	<input type="radio" name="data[window]" value="2"<?php echo ($resDataArr[5] == 2) ? ' checked="checked"' : '';?> /> 別ウインドウ
	<br />（タイトルから直接リンクしますので詳細ページは無効になります）</td>
</tr>
<?php for($i=0;$i<$linklFileCount;$i++){ ?>
<tr>
	<th>直リンクファイル<br />（<?php echo $maxbyte; ?>以内）
<?php	
	foreach($extensionList as $val){
		$url = $img_updir.'/'.$resDataArr[0].'-'.$i.'link_file.'.$val;
		if(file_exists($url)){
			echo "<br />現在のファイル<br /><a target=\"_blank\" href=\"{$url}\">リンクファイル</a>";
			echo '　<input type="checkbox" name="link_file_del['.$url.']" value="true"> 削除';
			break;
		}
	}
?>
	</th>
	<td>
	<input type="file" name="data[link_file][]"><br />
	（タイトルからファイルに直接リンクしますので詳細ページは無効になります）<br />
	※<?php echo $permissionExtension;?>のみ。縮小はされません。
	</td>
</tr>
<?php } ?>
</table>

<?php // require 'temp_php/mod/02-ranking.php'; ?>
<?php require 'temp_php/mod/03-newspage.php'; ?>

<table class="borderTable01">
<tr>
<td colspan="2" align="center" valign="middle">アップロードと縮小処理を同時に行いますので、時間がかかることもありますが、そのままで待ってください。<br />
<br />
    <input type="hidden" name="data[id]" VALUE="<?php echo $id;?>">
    <input type="hidden" name="data[mode]" VALUE="update">
    <input type="submit" value="登録" class="submitBtn">
   </td>
    </tr>
  </table>
 </form>
 <p class="pagetop linkBtn taR"><a href="#container">PAGE TOP▲</a></p>
</div>
</body>
</html>