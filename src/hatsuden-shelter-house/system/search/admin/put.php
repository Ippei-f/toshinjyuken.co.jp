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

	//トークンチェック（CSRF対策）
	if(empty($_SESSION['token']) || ($_SESSION['token'] !== $_POST['token'])){
		exit('ページ遷移エラー(トークン)');
	}
	//トークン破棄
	$_SESSION['token'] = '';

	$mode = (isset($_POST['data']['mode'])) ? strToCommonReplace($_POST['data']['mode']) : exit('ページ遷移エラー');
	
	//日付を連結
	$_POST['data']['up_ymd'] = date('Y-m-d',strtotime($_POST['data']['up_y'].'-'.$_POST['data']['up_m'].'-'.$_POST['data']['up_d']));
	
	//IDをセット
	if($mode == 'shinki'){
		$_POST['data']['id'] = getAutoIncreNum($file_path);//AUTO INCREMENT値取得（DBなら楽やのにな～
	}
	
	//cleditor不使用時は改行タグに変更
foreach($comment_name_arr as $v){
	$commentArr = array();
	if(isset($_POST['data'][$v])){
		if($useEditer == 0){
			foreach($_POST['data'][$v] as $val){
				$commentArr[] = nl2br($val);
			}
		}
		else{//エディタ使用時も改行タグのみの場合には空とみなして空にする
			foreach($_POST['data'][$v] as $val){
				if($val == '<br>' || $val == '<br />'){
					$commentArr[] = '';
				}else{
					$commentArr[] = $val;
				}
			}
		}
	}	
	$_POST['data'][$v] = $commentArr;
}//foreach($comment_name_arr as $v)

//$_POST['data']['title'] = nl2br($_POST['data']['title']);//タイトル入力欄がテキストエリアの時
	
	//登録データ（カラム順の変更現金。追加の場合は末尾に）
	
	$data = array();
	foreach($dbDataStructure as $dbDataStructureVal){
		$data[$dbDataStructureVal] = '';
		if(isset($_POST['data'][$dbDataStructureVal])){
			if(is_array($_POST['data'][$dbDataStructureVal])){
				foreach($_POST['data'][$dbDataStructureVal] as $vv){
					$data[$dbDataStructureVal] .= ($vv != '') ? strToCommonReplace($vv).$dataSeparateStr : $dataSeparateStr;
				}
				$data[$dbDataStructureVal] = rtrim($data[$dbDataStructureVal],$dataSeparateStr);
			}
			else{
				$data[$dbDataStructureVal] = strToCommonReplace($_POST['data'][$dbDataStructureVal]);
			}
		}
	}
	
	$lines = file($file_path);
	$fp = fopen($file_path, "r+b") or die("ファイルオープンエラー");
	
	$writeData = '';
	foreach($data as $val){
		$writeData .= $val. ",";
	}
	$writeData .= "\n";
  
	// 俳他的ロック
	if (flock($fp, LOCK_EX)) {
		ftruncate($fp,0);
		rewind($fp);
		
		// 書き込み
		if($mode == "shinki"){
			fwrite($fp, $writeData);
			$messe= "登録完了しました。";
			
			foreach($lines as $val){
				fwrite($fp, $val);
			}
		}
		elseif($mode == "update"){
			foreach($lines as $val){
				$lines_array = explode(",",$val);
				if($lines_array[0] != $data['id']){
					 fwrite($fp, $val);
				}else{
					fwrite($fp, $writeData);
					$messe= "編集処理完了しました！ ";
				}
			}
		}
	}
	fflush($fp);
	flock($fp, LOCK_UN);
	fclose($fp);
	
		
	//リンクファイル処理link_file　縮小せずに保存
	if(isset($_FILES["data"]["tmp_name"]['link_file'])){
		foreach($_FILES["data"]["tmp_name"]['link_file'] as $key => $val){
			if(is_uploaded_file($_FILES["data"]["tmp_name"]['link_file'][$key])){
				//サイズチェック
				if ($_FILES["data"]["size"]['link_file'][$key] < $maxImgSize) {
				
					$extensionArr = explode('.',$_FILES['data']["name"]["link_file"][$key]);
					$extension = end($extensionArr);
					$extension = strtolower($extension);
					
					if(!in_array($extension,$extensionList)){
						$extension_error = '許可されていない拡張子です<br />';
						exit('<center><span style="color:red;font-size:16px;">【許可されていない拡張子です】<br />記事自体はすでに投稿（編集の場合には変更）されています<br /><a href="./">戻る&gt;&gt;</a></span></center>');
					}
					
					//ファイル名を指定
					$fileName = $data['id'].'-'.$key.'link_file';
					
					$fileNameNormal = $fileName.'.'.$extension;
					
					//拡張子違いのファイルを削除
					foreach($extensionList as $extensionListval){
						$deleteFilePathNormal = $img_updir.'/'.$fileName.'.'.$extensionListval;
						if(file_exists($deleteFilePathNormal)) unlink($deleteFilePathNormal);
					}
					
					$filePathNormal = $img_updir.'/'.$fileNameNormal;//ファイルパスを指定（画像以外）					
					move_uploaded_file($_FILES['data']['tmp_name']['link_file'][$key],$filePathNormal);
					@chmod($filePathNormal, 0666);
		
				}else{
					exit('ファイルサイズオーバーです。<br />記事自体はすでに投稿（編集の場合には変更）されていますので、事前に画像を縮小されるなどいただいてから再編集にてあらためて登録下さい。<a href="./">戻る</a>');
				}
			}
		}
	}
	
//本文とセットのアップファイル処理
require_once 'include/put-image.php';//差分ファイルに記述
		
//画像削除処理
foreach($upfile_arr as $k){
	if($mode == 'update' && isset($_POST[$k."_del"])){
		foreach($_POST[$k."_del"] as $key => $val){
			if(!empty($val)){
				
				$tmpPath = str_replace($img_updir,'',$val);
				$imgDelPathS = $img_updir.str_replace('.','s.',$tmpPath);//サムネイル削除
				$imgDelPathL = $val;
				
				if(file_exists($imgDelPathS)){
					if(!unlink($imgDelPathS)) exit('s削除エラー');
				}
				if(file_exists($imgDelPathL)){
					if(!unlink($imgDelPathL)) exit('削除エラー');
				}
			}
		}
	}
}//foreach($upfile_arr as $k)

//リンクファイル削除
if($mode == 'update' && isset($_POST["link_file_del"])){
	foreach($_POST["link_file_del"] as $key => $val){
		if($val == 'true' && !empty($key)){
			$res = (file_exists($key)) ? unlink($key) : '';
		}
	}
}

//バックアップ作成と削除
if($backup_copy=='1' && $mode == "shinki"){
	backup_gen($file_path);//バックアップ作成
	$backup_del_res = backup_del($file_path);//指定月以前のバックアップファイルの削除
}

//登録完了で再送信防止のリダイレクト
header("Location: ./complete.php?id={$data['id']}");
exit();
?>