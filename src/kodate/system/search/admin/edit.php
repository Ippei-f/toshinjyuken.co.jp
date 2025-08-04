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
<?php
/*
<tr>
	<th>タイトル</th>
	<td><input type="text" size="40" name="data[title]" value="<?php echo TextToKanma($resDataArr[2]);?>" /></td>
</tr>
<?php if(!empty($categoryArr)){ ?>
<tr>
	<th>カテゴリ</th>
	<td>
	<?php
	foreach($categoryArr as $categoryKey => $categoryVal){
		$checkedFlag = '';
		if((isset($resDataArr[3]) && $resDataArr[3] == $categoryKey) || (!isset($resDataArr[3]) && $categoryKey == 0)){
			$checkedFlag = ' checked="checked"';
		}
	?>
	<input type="radio" size="50" name="data[category]" value="<?php echo $categoryKey;?>"<?php echo $checkedFlag;?> /> <?php echo $categoryVal;?> 　
	<?php
		}
	?>
	</td>
</tr>
<?php } ?> 
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
	<th>直リンクファイル（<?php echo $maxbyte; ?>以内）
<?php	
	foreach($extensionList as $val){
		$upFilePath = $img_updir.'/'.$resDataArr[0].'-'.$i.'link_file.'.$val;
		if(file_exists($upFilePath)){
			echo "<br />現在のファイル<br /><a target=\"_blank\" href=\"{$upFilePath}\">リンクファイル</a>";
			echo '　<input type="checkbox" name="link_file_del['.$upFilePath.']" value="true"> 削除';
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
*/
?>
</table>    

<?php require 'temp_php/mod/02-comment.php'; ?>

<?php require 'temp_php/mod/03-order.php'; ?>

<?php require 'temp_php/mod/04-kukaku.php'; ?>

<?php require 'temp_php/mod/05-gallery.php'; ?>

<?php require 'temp_php/mod/11-movie.php'; ?>

<?php require 'temp_php/mod/06-gaiyou.php'; ?>

<?php require 'temp_php/mod/07-access.php'; ?>

<?php require 'temp_php/mod/08-banner.php'; ?>

<?php require 'temp_php/mod/09-near.php'; ?>

<?php
/*
<h3>本文入力・ファイルアップロード（ファイル合計：<?php echo $maxbyte; ?>以内）</h3>
<?php 
$countComment = count($commentArr);
?>

<p>※写真は自動で縮小、保存されます。（縦横比を維持したまま横写真は幅<?php echo $imgWidthHeight;?>px、縦写真は高さ<?php echo $imgWidthHeight;?>pxに）※設定ファイルで変更可<br />
※<?php echo $permissionExtension;?>のみ （アニメーションGIFは不可）
<?php // echo $detailText;?>

<?php
$com_id=$id;
require 'temp_php/temp_edit.php';
?>
<table id="lineList" class="borderTable01">
<tbody>
<?php 
for($i=0;$i<=$maxCommentCount;$i++){
	
	//ファイル存在判定と存在したらセット
	$upfileTag = '';
	foreach($extensionList as $val){
		$upFilePath = $img_updir.'/'.$resDataArr[0].'-'.$i.'.'.$val;
		if(file_exists($upFilePath)){
			
			$upfileTag .= "<br />現在のファイル<br />";
			
			if($val == 'jpg' || $val == 'png' || $val == 'gif'){
				$upfileTag .= "<img src=\"{$upFilePath}?".uniqid()."\" width=\"100\">\n";
			}else{
				$upfileTag .= "<a href=\"{$upFilePath}\" target=\"_blank\">アップファイル</a>\n";
			}
			$upfileTag .= '<br /><span id="upfile_del'.($i + 1).'"><input type="checkbox" name="upfile_del[]" value="'.$upFilePath.'" /></span> 削除';
			break;
		}
	}

	if(!empty($commentArr[$i]) || !empty($upfileTag)){
		
		//cleditor不使用時は改行コードに変更
		if($useEditer == 0 && !empty($commentArr[$i])){
			$commentArr[$i] = brToBrcode($commentArr[$i]);
		}
?>
<tr class="lines<?php echo $i + 1;?>">
<th>本文</th>
<td><textarea name="data[comment][]"<?php echo $cleditorClass;?> rows="5" cols="60"><?php echo (!empty($commentArr[$i])) ? TextToKanma($commentArr[$i]) : '';?></textarea></td>
<td rowspan="2" style="vertical-align:middle"><input type="button" onclick="delLine(<?php echo $i + 1;?>); return false;" value=" × 削除 " /></td>
</tr>
<tr class="lines<?php echo $i + 1;?>">
<th>ファイル<?php echo $upfileTag;?><input type="hidden" name="upfile_name[]" value="<?php echo (!empty($upfileTag)) ? $upFilePath : '';?>" /></th>
<td><input type="file" name="data[upfile][]" /></td>
</tr>
<?php 
	} 
}
?>   
</tbody>
</table>

<p class="taC mb20"><input type="button" onclick="addInput()" value="　アップファイル、本文入力欄のセットを追加　" class="addAndDelBtn submitBtn" id="addBtn" /></p>
*/
?>

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