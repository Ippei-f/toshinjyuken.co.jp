<?php
//<meta charset="utf-8">

//print_r($_POST);
/*
echo '<br>';
print_r($_FILES);
*/
if(isset($_POST['submit'])){

	//バックアップ・削除ファイルの整理
	$files=glob('data/bu/*');
	$deldate=strtotime(date('Y-m-d')." -3 month");//3ヶ月前を算出
	foreach($files as $v){
		if(file_exists($v)){
			$filedate=filemtime($v);
			if($filedate<=$deldate){
				unlink($v);//古いファイルを削除
			}
		}
	}
	$files=glob('data/del/*');
	$deldate=strtotime(date('Y-m-d')." -1 week");//1週間前を算出
	foreach($files as $v){
		if(file_exists($v)){
			$filedate=filemtime($v);
			if($filedate<=$deldate){
				unlink($v);//古いファイルを削除
			}
		}
	}
	

	switch($_POST['submit']){
		case '登録・更新':
//登録・更新=========================

	$post_file=array();
	$post_file['post']=$_POST['file'];
	unset($_POST['submit']);
	unset($_POST['file']);
	if(isset($_POST['del'])){
		$post_file['del']=$_POST['del'];
		unset($_POST['del']);
	}
	
	//記録する（一覧用）
	$t=array();
	foreach($cms_list_data as $k){
		$t[]=RECORD_CONV_TEXT($_POST[$k],'W');
	}
	$fn='data/list.txt';	
	$fn_new=str_replace('data/','data/bu/',$fn).'-bu'.date('Ymd');
	if(!file_exists($fn_new)){
		copy($fn,$fn_new);//バックアップがなければ保存
	}
		
	$fdata=RECORD_R_DATA($fn);
	if(strpos($fdata,'$'.$t[0].'@')!==false){
		//更新（同じIDの行を更新）
		$fdata2=explode('$',trim($fdata));
		unset($fdata2[0]);
		foreach($fdata2 as $v){
			if(strpos('$'.$v,'$'.$t[0].'@')!==false){				
				$fdata=str_replace('$'.$v,'$'.implode('@',$t).PHP_EOL,$fdata);
				break;
			}
		}
	}
	else{
		//新規（そのまま上に重ねるだけ）
		$fdata='$'.implode('@',$t).PHP_EOL.$fdata;
	}	
	file_put_contents($fn,$fdata,LOCK_EX);//書き出し
		
	//記録する（詳細用）
	$fn='data/edit/id-'.sprintf('%03d',$_POST['ID']).'.txt';
	@chmod($fn,0666);//属性
	$fn_new=str_replace('data/edit/','data/bu/',$fn).'-bu'.date('Ymd');
	if(!file_exists($fn_new)){
		copy($fn,$fn_new);//バックアップがなければ保存
	}
	
	$t=array();
	foreach($_POST as $k => $v){
		if(!is_array($v)){
			//通常書き込み
			$t[]=$k.','.RECORD_CONV_TEXT($v,'W');
		}
		else{
			//配列書き込み
			$t2=array();
			foreach($v as $vk => $vv){
				$t2[]=$vk.','.RECORD_CONV_TEXT($vv,'W');
			}
			$t[]=$k.'='.implode('=',$t2);
		}
	}
	$fdata=implode('@',$t);
	echo '<br>';
	//print_r($fn);
	//print_r($fdata);
	file_put_contents($fn,$fdata,LOCK_EX);//書き出し
	
	//記録する（画像用）
	if(isset($post_file['del'])){
		//削除処理が先
		foreach($post_file['del'] as $v){
			//unlink($v);
			$fn_new=str_replace('upload/','data/del/',$v).'-del'.date('Ymd');
			rename($v,$fn_new);//念のため
		}
	}
	if(isset($_FILES)&&!empty($_FILES)){
		//$fn='../../images/summary/id-'.sprintf('%03d',$_POST['ID']).'/';
		/*
		//困った時のフォルダ内ファイル削除
		if(is_dir($fn)){
			$a=glob($fn.'*');
			foreach($a as $v){
				unlink($v);
			}
			rmdir($fn);
		}
		*/
		/*
		if(!is_dir($fn)){
			//階層がなければ階層作成
			mkdir($fn,0777,true);//デフォルト属性,0777
		}
		$post_file['glob']=glob($fn.'*');
		print_r($post_file);
		$cnt=1;
		foreach($_FILES as $k => $v){
			print_r($k);
			print_r($v);
			foreach($v["tmp_name"] as $vk => $vv){
				//print_r($vv);
				$fn2=explode('.',$v["name"][$vk]);
				$fn2=$fn.$k.sprintf('%03d',$vk+1).'.'.end($fn2);
				move_uploaded_file($vv,$fn2);
				@chmod($fn2,0666);
			}
		}
		*/
		//一からフォルダを作成する方法は不具合の元なので「upload」フォルダ内に入れる
		$fn='upload/id'.sprintf('%03d',$_POST['ID']).'-';
		$post_file['glob']=glob($fn.'*');
		//print_r($post_file);
		foreach($_FILES as $k => $v){
			//print_r($k);
			//print_r($v);
			foreach($v["tmp_name"] as $vk => $vv){
				//print_r($vv);
				$fn2=explode('.',$v["name"][$vk]);				
				$fn2=$fn.$k.sprintf('%03d',$vk+1).'.'.end($fn2);
				move_uploaded_file($vv,$fn2);
				@chmod($fn2,0666);
			}
		}
	}
	
	//リザルト画面に飛ばす
	//header("Location: result.php?id=".$_POST['ID'].");
	header("Location: top.php");
	exit();

//登録・更新=========================
		break;
		case '削除':
//削除=========================
	
	//print_r($_REQUEST);
	
	//一覧削除（バックアップを残す）
	$fn='data/list.txt';
	$fn_new=str_replace('data/','data/bu/',$fn).'-bu'.date('Ymd');
	copy($fn,$fn_new);//念のため
	
	$fdata=RECORD_R_DATA($fn);
	if(strpos($fdata,'$'.$_REQUEST['id'].'@')!==false){
		//更新（同じIDの行を更新）
		$fdata2=explode('$',trim($fdata));
		unset($fdata2[0]);
		foreach($fdata2 as $v){
			if(strpos('$'.$v,'$'.$_REQUEST['id'].'@')!==false){
				$fdata=str_replace('$'.$v,'',$fdata);//指定の部分だけ削除
				break;
			}
		}
		file_put_contents($fn,$fdata,LOCK_EX);//書き出し
	}
	
	//詳細削除（リネーム→移動）
	$fn='data/edit/id-'.sprintf('%03d',$_REQUEST['id']).'.txt';
	$fn_new=str_replace('data/edit/','data/del/',$fn).'-del'.date('Ymd');
	rename($fn,$fn_new);//念のため
	
	//画像削除（リネーム→移動）
	$fn='upload/id'.sprintf('%03d',$_REQUEST['id']).'-';
	$fn=glob($fn.'*');
	foreach($fn as $v){
		$fn_new=str_replace('upload/','data/del/',$v).'-del'.date('Ymd');
		rename($v,$fn_new);//念のため
	}
	header("Location: top.php");
	exit();

//削除=========================
		break;
	}
}
/*
if(isset($_POST['submit'])&&($_POST['submit']=='登録・更新')){
}
*/

$set_data=array();
$set_type=isset($_REQUEST['id'])&&is_numeric($_REQUEST['id']);
if($set_type){
	//編集
	$set_data['ID']=$_REQUEST['id'];
	$fn='data/edit/id-'.sprintf('%03d',$set_data['ID']).'.txt';
	$fdata=RECORD_R_DATA($fn);
	if(strpos($fdata,'@'.PHP_EOL)!==false){
		$fdata=str_replace('@'.PHP_EOL,'@',$fdata);//手動作成データの改行外し
		$fdata=str_replace('='.PHP_EOL,'=',$fdata);
		$fdata=str_replace(','.PHP_EOL,',',$fdata);
	}
	$set_data+=RECORD_R_EDITDATA($fdata);	
	//print_r($set_data);
}
else{
	//新規作成
	$fn='data/list.txt';
	$fdata=RECORD_R_DATA($fn);
	$set_data['ID']=1;
	if(strpos($fdata,'$')!==false){
		//ID取得…常に最上部が最新IDである事が前提
		$max=explode('$',$fdata);
		$max=explode('@',$max[1]);
		//print_r($max);
		$set_data['ID']=intval($max[0])+1;
	}
}
?>