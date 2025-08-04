<?php
//<meta charset="utf-8">

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
?>