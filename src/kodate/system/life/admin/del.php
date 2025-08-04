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
	
	$id = (!empty($_GET['id'])) ? h($_GET['id']) : exit('パラメータがありません');//IDをセット
	
	if(isset($_POST['del_submit'])){
		
		//トークンチェック（CSRF対策）
		if(empty($_SESSION['token']) || ($_SESSION['token'] !== $_POST['token'])){
			exit('ページ遷移エラー(トークン)');
		}
		//トークン破棄
		$_SESSION['token'] = '';
		
		$id = (!empty($_POST['id'])) ? h($_POST['id']) : exit('パラメータがありません');	
		if(!is_num($id)) exit;
		
		$lines = file($file_path);
		$fp = fopen($file_path, "r+b") or die("ファイルオープンエラー");
		
		// 俳他的ロック
		if (flock($fp, LOCK_EX)) {
			ftruncate($fp,0);
			rewind($fp);
			foreach($lines as $val){
				$lines_array = explode(",",$val);
				if($lines_array[0] != $id){
				  fwrite($fp, $val);
				}
			}
		}
		  
		fflush($fp);
		flock($fp, LOCK_UN);
		fclose($fp);
	
		//リンクファイル削除
		for($i=0;$i<$linklFileCount;$i++){
			foreach($extensionList as $val){
				$upFilePath = $img_updir.'/'.$id.'-'.$i.'link_file.'.$val;
				if(file_exists($upFilePath)){
					unlink($upFilePath);
					break;
					
				}
			}
		}
		
	//アップファイル削除
	foreach($upfile_arr as $k){
		for($i=0;$i<$maxCommentCount;$i++){
			foreach($extensionList as $val){
				$upFilePath = $img_updir.'/'.$k.$id.'-'.$i.'.'.$val;
				$upFilePathThumb = $img_updir.'/'.$k.$id.'-'.$i.'s.'.$val;
				
				if(file_exists($upFilePath)){
					unlink($upFilePath);
				}
				if(file_exists($upFilePathThumb)){
					unlink($upFilePathThumb);
				}
			}
		}
	}//foreach($upfile_arr as $k)
		
	
	}else{
		$resDataArr = ID2Data($file_path,$id);
		if(!empty($resDataArr[1])) $up_ymd_array = explode("-",$resDataArr[1]);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $pagetitle; ?>　データ削除</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="./js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="./js/common.js"></script>
</head>
<body>
<div id="container">
<div id="logoutBtn" class="linkBtn"><a href="?logout=true">ログアウト</a></div>
<div id="toPage" class="linkBtn"><a href="./">一覧へ</a></div>
  <h1><?php echo $pagetitle; ?>　データ削除</h1>

<?php if(isset($_POST['del_submit'])){ ?>
<?php if(!empty($messe)) echo $messe; ?>
<p class="col19 big taC">削除が完了しました。</p> 
<?php }else{ ?>

<form method="post" action="">
<?php
//トークンセット
$token = sha1(uniqid(mt_rand(), true));
$_SESSION['token'] = $token;
?>
<input type="hidden" name="token" value="<?php echo $token;//トークン発行?>" />
<p class="taC">このデータを削除するにはクリックしてください。</p>
<p class="taC"><input type="submit" name="del_submit" value="　このデータを削除する" class="submitBtn" /></p>
<input type="hidden" name="id" value="<?php echo $id;?>" />
</form>
<?php
require 'temp_php/temp_result.php';
?>
<p class="pagetop linkBtn taR"><a href="#container">PAGE TOP▲</a></p>
<?php } ?>
</div> 
</body>
</html>