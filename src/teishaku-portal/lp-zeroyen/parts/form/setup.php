<?php
//<meta charset="utf-8">

$k=0;
$form_arr=array();

$form_arr+=array
('名前漢字'=>array('お名前（漢字）*'		 ,'姓'	 =>'name_k1','名'	=>'name_k2','type'=>'name')
,'メール'	=>array('メールアドレス*','mail')//,'mail_c'
,'ご希望の物件'=>array('*','kibouB','type'=>'radio','select'=>array('ご希望の物件がある','ご希望の物件がない'))
,'ご希望のエリア'=>array('','kibouA_','select1'=>array(),'select2'=>array(),'type'=>'bukken')
,'希望スタイルL'=>array('【外観】ご希望のスタイル*','kibou1','type'=>'radio','select'=>array())
,'希望スタイルR'=>array('【インテリア】ご希望のスタイル*','kibou2','type'=>'radio','select'=>array())
,'同意'=>array('「個人情報保護方針」への同意*','doui','select'=>array('同意する')
						 	,'caution'=>'※下記をお読みいただき、個人情報の取扱いについてご確認ください。')
);

?>