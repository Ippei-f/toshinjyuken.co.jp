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
	
	if(!empty($resDataArr[1])) $up_ymd_array = explode("-",$resDataArr[1]);
//----------------------------------------------------------------------
//  ページ独自処理 (END)
//----------------------------------------------------------------------
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $pagetitle; ?>　登録完了画面</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="./js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="./js/common.js"></script>
</head>
<body>
<div id="container">
<div id="logoutBtn" class="linkBtn"><a href="?logout=true">ログアウト</a></div>
<div id="toPage" class="linkBtn"><a href="./">一覧へ</a></div>
<h1><?php echo $pagetitle; ?>　登録完了画面</h1>
  
<h3 style="font-size:20px"><font color="red">以下の内容で登録が完了しました</font></h3>
<?php
require 'temp_php/temp_result.php';

//このタイミングで物件一覧用のサムネイルを作成する。
$resize=array();
$resize['BASE-IMG']['glob']=glob('../upload/order'.$id.'-{*.jpg,*.png,*.gif}',GLOB_BRACE);
$resize['BASE-IMG'][0]='';
foreach($resize['BASE-IMG']['glob'] as $v){
	if(strpos($v,'-4.')!==false){
		$resize['BASE-IMG'][4]=$v;
	}
	else if(strpos($v,'-0.')!==false){
		$resize['BASE-IMG'][0]=$v;
	}
}
$resize['BASE-IMG']=isset($resize['BASE-IMG'][4])?$resize['BASE-IMG'][4]:$resize['BASE-IMG'][0];//写真
if($resize['BASE-IMG']!=''){
	$resize['RESIZE-IMG']=str_replace('-','.',$resize['BASE-IMG']);
	$resize['RESIZE-IMG']=explode('.',$resize['RESIZE-IMG']);
	unset($resize['RESIZE-IMG'][count($resize['RESIZE-IMG'])-2]);
	$resize['RESIZE-IMG']=implode('.',$resize['RESIZE-IMG']);
	$resize['RESIZE-IMG']=str_replace('/upload/','/upload-resize/',$resize['RESIZE-IMG']);
	list($resize['BASE-W'],$resize['BASE-H'],$resize['TYPE'])=getimagesize($resize['BASE-IMG']);
	switch($resize['TYPE']){
		case IMAGETYPE_JPEG:
		$resize['BASE-IMG']=imagecreatefromjpeg($resize['BASE-IMG']);
		break;
		case IMAGETYPE_PNG:
		$resize['BASE-IMG']=imagecreatefrompng($resize['BASE-IMG']);
		break;
		case IMAGETYPE_GIF:
		$resize['BASE-IMG']=imagecreatefromgif($resize['BASE-IMG']);
		break;
		default://未対応
	}
	$resize+=array('MIN-W'=>285,'MIN-H'=>250,'*'=>2);
	$resize['DIV']=$resize['BASE-W']/$resize['MIN-W'];
	$resize['RESIZE-H']=ceil($resize['BASE-H']/$resize['DIV']);
	if($resize['RESIZE-H']<$resize['MIN-H']){
		$resize['DIV']=$resize['BASE-H']/$resize['MIN-H'];
		$resize['RESIZE-W']=ceil($resize['BASE-W']/$resize['DIV'])*$resize['*'];
		$resize['RESIZE-H']=$resize['MIN-H']*$resize['*'];
	}
	else{
		$resize['RESIZE-W']=$resize['MIN-W']*$resize['*'];
		$resize['RESIZE-H']*=$resize['*'];
	}
	$resize['CANVAS']=imagecreatetruecolor($resize['RESIZE-W'],$resize['RESIZE-H']);
	imagecopyresampled($resize['CANVAS'],$resize['BASE-IMG'],0,0,0,0,$resize['RESIZE-W'],$resize['RESIZE-H'],$resize['BASE-W'],$resize['BASE-H']);
	switch($resize['TYPE']){
		case IMAGETYPE_JPEG:
		imagejpeg($resize['CANVAS'],$resize['RESIZE-IMG']);
		break;
		case IMAGETYPE_PNG:
		imagepng($resize['CANVAS'],$resize['RESIZE-IMG'],9);
		break;
		case IMAGETYPE_GIF:
		imagegif($resize['CANVAS'],$resize['RESIZE-IMG']);
		break;
	}
	imagedestroy($resize['CANVAS']);
	//print_r($resize);
}
else{
	$resize['DEL']=glob('../upload-resize/order'.$id.'.*');
	if(!empty($resize['DEL'])){
		foreach($resize['DEL'] as $v){
			//古いサムネイル削除
			unlink($v);
		}
	}
}
unset($resize);
?>
<p class="pagetop linkBtn taR"><a href="#container">PAGE TOP▲</a></p>

</div>
</body>
</html>