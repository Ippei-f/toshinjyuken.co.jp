<?php
//<meta charset="utf-8">
/*
		新着用
*/
$cms_param=array
('状態'=>array
 (1=>array('公開')
 //,2=>array('メンバーシップ限定','略'=>'会員限定')
 ,3=>array('非公開')
 )
//==============
,'カテゴリ'=>array
 ( 1=>array('お知らせ'				,'news')
 , 2=>array('セミナー・見学会','seminar','略'=>'セミナー')
 ,99=>array('その他'					 ,'other')
 )
);
$cms_list_data=array
('ID'
,'状態'
,'情報登録日'
,'情報更新日'
,'公開開始日時'
,'公開終了日時'
,'カテゴリ'
,'タイトル'
);

//現在日時数値化
$nowdate['Ymd-stt']=strtotime(date('Y-m-d'));

$newmark=array(14);//現在日時-指定日数 <= 登録日でNEW
$newmark['*His']=$newmark[0] * 24 * 60 * 60;//計算用「指定日数 × 時間 × 分 × 秒」
?>