<?php
//<meta charset="utf-8">

//現在時刻
date_default_timezone_set('Asia/Tokyo');//タイムゾーン
$nowdate=array();
$nowdate['Ymd']=date('Ymd');
$nowdate['YmdHi']=$nowdate['Ymd'].date('Hi');
//print_r($nowdate);

//現在ページ
$nowpage=$_SERVER['SCRIPT_NAME'];
if(strpos($nowpage,'/system/')!==false){
	switch(true){
		case strpos($nowpage,'/summary/')!==false:
		$nowpage_db=array
		('title'=>'物件CMS'
		,'type'=>'summary'
		);
		break;
		case strpos($nowpage,'/info/')!==false:
		$nowpage_db=array
		('title'=>'新着CMS'
		,'type'=>'info'
		);
		break;
	}
}
$nowpage=explode('/',$nowpage);
$nowpage=explode('.',end($nowpage));
$nowpage=$nowpage[0];
//print_r($nowpage);
?>