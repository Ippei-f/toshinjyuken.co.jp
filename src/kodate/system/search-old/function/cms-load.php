<?php
//<meta charset="utf-8">

//システム読み込み・軽量版
$file_path = $dir_sys.'data/data.dat';
$img_updir = $dir_sys.'upload/';

$r1=file_get_contents($file_path);
$r1=str_replace(array("\n","\r"),'
',$r1);
$r2=explode('
',$r1);
$sysdata_proto=$index1=$index2=array();
foreach($r2 as $k => $v){
	$sysdata_proto[$k]=explode(',',$v);//コンマ区切り
	if(count($sysdata_proto[$k])<2){//無効データ削除（PHP7.0対応）
		unset($sysdata_proto[$k]);
		continue;
	}
	$sysdata_proto[$k][0]=str_replace(array("　"," ","	",chr(10)),'',$sysdata_proto[$k][0]);//IDの空白撤去	
	$index1[$k]=$sysdata_proto[$k][0];
	$index2[$k]=strtotime($sysdata_proto[$k][1]);
}
//使用済み大容量配列削除
unset($r1);
unset($r2);
//日付＞IDの順にソート
array_multisort($index2,SORT_DESC,SORT_NUMERIC,$index1,SORT_ASC,SORT_NUMERIC,$sysdata_proto);

//共通変数読み込み
require $kaisou.'system/search/function/common-param.php';
/*
$lineup_arr	=COMMON_PARAM('lineup_arr');
$weekArray	=COMMON_PARAM('weekArray');
*/

function CMS_OPEN(){
	global $sysdata;
	//プレビュー時は全表示（PHP7.0対応ver）
	$flag=true;
	if(!empty($_POST['preview'])){
		if($_POST['preview']==1){
			$flag=false;
		}
	}
	//公開開始日・公開終了日
	$settime=str_replace('-','',$sysdata[1]);//.sprintf('%02d',$sysdata[19])
	/*
	$settime.=is_numeric($sysdata[23])?sprintf('%02d',$sysdata[23]):'00';
	$arr=explode('＜＞',$sysdata[17]);
	$str='';
	foreach($arr as $v){
		$str.=sprintf('%02d',$v);
	}
	$endtime=$str.sprintf('%02d',$sysdata[20]);
	$endtime.=is_numeric($sysdata[24])?sprintf('%02d',$sysdata[24]):'00';
	*/
	
	//除外処理
	if($flag){	
		switch(true){
			case ($sysdata[7]!=1)://非公開
			case (date('Ymd')<$settime)://公開前
			//case ($sysdata[16]==1)&&(date('YmdHi')>=$endtime)://公開終了
			break;
			default:
			$flag=false;
		}
	}
	else{
		//プレビューモードの時、公開終了したものは除外
		switch(true){
			case ($sysdata[0]=='')://空白ID
			case ($_POST['pre_time']<$settime)://公開前
			//case ($sysdata[16]==1)&&($_POST['pre_time']>=$endtime)://公開終了
			$flag=true;
			break;
			default:
		}
	}
	return $flag;
}
function CMS_OPEN_FREE($a=array()){
	//プレビュー時は全表示（PHP7.0対応ver）
	$flag=true;
	if(!empty($_POST['preview'])){
		if($_POST['preview']==1){
			$flag=false;
		}
	}
	
	//公開開始日・公開終了日
	$settime=str_replace('-','',$a[1]);
	
	//除外処理
	if($flag){	
		switch(true){
			case ($a[7]!=1)://非公開
			case (date('Ymd')<$settime)://公開前
			//case ($sysdata[16]==1)&&(date('YmdHi')>=$endtime)://公開終了
			break;
			default:
			$flag=false;
		}
	}
	else{
		//プレビューモードの時、公開終了したものは除外
		switch(true){
			case ($a[0]=='')://空白ID
			case ($_POST['pre_time']<$settime)://公開前
			//case ($sysdata[16]==1)&&($_POST['pre_time']>=$endtime)://公開終了
			$flag=true;
			break;
			default:
		}
	}
	return $flag;
}

function CMS_IMGSET($id='',$prm=array()){/**/
	/*
			フォルダ内のファイルをプログラムで数える最新型（画像が多くなるほど重くなる！？
	*/
	global $img_updir,$sysdata;
	$upfile_key='upfile';
	if(!empty($prm['upfile'])){
		$upfile_key.='-'.$prm['upfile'];
	}
	$upfile_arr=COMMON_PARAM($upfile_key);
	$files = glob($img_updir.'{*.jpg,*.png,*.gif}',GLOB_BRACE);//特定の拡張子のみ収集
	if($id==''){
		$id=($_GET['id']!='')?$_GET['id']:0;
	}	
	foreach($files as $file){
		//[id]-以外は使わないのでスルー
		if(strpos($file,$id.'-')!==false){
			$fnum=str_replace(array("."),'-',$file);
			$fnum=explode('-',$fnum);
			$fnum=$fnum[1];		
			foreach($upfile_arr as $v){
				if(strpos($file,$v.$id.'-')!==false){
					if(strpos($file,'s.')!==false){
						//サムネ
						$sysdata[$v.'-s'][]=$file;
					}
					else{
						//通常サイズ
						$sysdata[$v][]=$file;
						$sysdata[$v.'-num'][$fnum]=$file;
					}
				}//if(strpos($file,$v.$id)!==false)
			}//foreach($upfile_arr as $v)	
		}//if(strpos($file,$id.'-')!==false)
	}//foreach($files as $file)	
	
	//自然数に並び替え
	foreach($upfile_arr as $v){
		$arr1=array($v,$v.'-s');
		foreach($arr1 as $k){
			if(empty($sysdata[$k])){continue;}
			natsort($sysdata[$k]);
			$arr2=array();
			foreach($sysdata[$k] as $v2){
				$arr2[]=$v2;
			}
			$sysdata[$k]=$arr2;
		}
	}//foreach($upfile_arr as $v)	
}
/*
function CMS_IMGSET($arr,$loop,$thumb=false){
	global $img_updir,$sysdata;
	$extensionList=array('jpg','png','gif');
	foreach($arr as $k){
		for($i=0;$i<$loop;$i++){
			foreach($extensionList as $e){
				$url=array($img_updir.$k.$sysdata[0].'-'.$i);
				$url[1]=$url[0].'.'.$e;
				if(file_exists($url[1])){
					$sysdata[$k.'_path'][$i]=$url[1];
					if($thumb==true){
						$sysdata[$k.'_path_thumb'][$i]=$url[0].'s.'.$e;
					}
					break;
				}
			}
		}
	}
}
*/
function CMS_DATA_REPLACE(){
	global $sysdata;
	$separate=array('＜＞');
	foreach($sysdata as $k => $v){
		$sysdata[$k]=str_replace("__kanma__",",",$v);
		//配列化
		if(strpos($v,$separate[0])!==false){
			$sysdata[$k]=explode($separate[0],$sysdata[$k]);
		}
	}
}
function CMS_DATA_REPLACE_FREE($a=array()){
	$separate=array('＜＞');
	foreach($a as $k => $v){
		$a[$k]=str_replace("__kanma__",",",$v);
		//配列化
		if(strpos($v,$separate[0])!==false){
			$a[$k]=explode($separate[0],$a[$k]);
		}
	}
	return $a;
}
?>