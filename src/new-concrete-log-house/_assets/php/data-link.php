<?php
//<meta charset="utf-8">
$link_parts=array('./');
$link_parts['blank']='" target="_blank';
$link_parts['noref']='" rel="noopener noreferrer';

$link_list=array
('TOP'=>array($link_parts[0])
//===========
,'外部:お客様の声'=>array('../kodate/voice.php?brand=99','お客様の声')
//===========
//,'外部:アサプリ'		=>array('https://www.asapri.co.jp/'							,'株式会社アサプリ')
//,'外部:アサすま'		=>array('https://www.mie.asasuma.jp/'						,'アサすま！三重')
//,'外部:ポスティング'=>array('https://www.asapri.co.jp/posting-web/'	,'ポスティングアイテムWeb版')
);

foreach($link_list as $k => $v){
	if(strpos($k,'外部:')!==false){
		$link_list[$k][0].=$link_parts['blank'].$link_parts['noref'];
	}
}
?>