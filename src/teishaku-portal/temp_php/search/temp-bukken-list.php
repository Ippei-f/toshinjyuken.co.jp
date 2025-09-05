<?php
//<meta charset="utf-8">

//画像・リンク設定
$add=array
('href'	=>''
,'class'=>''
,'kaiin'=>''
,'bg'		=>''
,'new'	=>''
);
if($sysdata[3]!=999){
	$prm_name=explode('【',$sysdata[2]);
	$prm_name=$prm_name[0];
	$prm_name=str_replace(array("　"," ","平屋の暮らし","コンパクトハウス"),'',$prm_name);
	$add['href']=' href="'.$link_list['物件詳細'][0].'?id='.$sysdata[0].'&name='.$prm_name.'"';
	if($sysdata[3]==1){
		//会員
		$add['kaiin']=' class="kaiin"';
		$add['class']=' login_window" onclick="return false;';
	}
	if(file_exists($sysdata['main'][0])){
		$add['bg']=' style="background-image: url('.$sysdata['main'][0].');"';
	}
	if($sysdata[10]==1){
		$add['new']='<div class="newmark"></div>';
	}
}
else{
	//完売
	$add['class']=' soldout';
}
$img='<a class="pos_rel bg_cover pic'.$add['class'].'"'.$add['bg'].$add['href'].'><img src="'.$kaisou.'images/common/clear-W360H240.png"'.$add['kaiin'].'>'.$add['new'].'</a>';

//物件情報データ追加取得
$bukken_data['価格-万']=($bukken_data['価格-万']!='')?number_format($bukken_data['価格-万']):'-';
$bukken_data['月額']=$sysdata[12][0];
$bukken_data['月額']=mb_convert_kana($bukken_data['月額'],'a','UTF-8');//全角英数を半角英数に変換
$bukken_data['月額']=str_replace(array(","),'',$bukken_data['月額']);
$bukken_data['月額-万']=($bukken_data['月額']/10000);
$bukken_data['月額-万']=($bukken_data['月額-万']!='')?number_format($bukken_data['月額-万'],1):'-';

//階層・ルームオーダー
$add_floor='';
if(!isset($pu_limit['floor'])){
	$add_floor='<span>'.$search_floor[$sysdata[22]].'</span>';
	if(!isset($sysdata[23])){$sysdata[23]=0;}
	if(($sysdata[22]==1)&&($sysdata[23]==1)){
		$add_floor.='<span class="ro">ハーフオーダー</span>';
	}
	$add_floor='<div class="floor">'.$add_floor.'</div>';
}

echo '<li>
'.$img.'
'.$add_floor.'
<h3>'.$sysdata[2].'</h3>
<div class="flex1"><span><span class="textJ">交通</span></span><span>'.$bukken_data['最寄駅'].'</span></div>
<div class="flex1"><span><span class="textJ">所在地</span></span><span>'.$bukken_data['所在地'].'</span></div>
<div class="flex2 LH100" style="text-align: right;"><span><span>'.$bukken_data['価格-万'].'</span>万円'.(isset($bukken_data['価格～'])?' ～':'').'（税込）</span></div>
</li>'.chr(10);
/*
<div class="flex1"><span><span class="textJ">総額</span></span><span>'.$bukken_data['価格-万'].'<span>万円（税込）</span></span></div>
<div class="flex2 LH100"><span>月々<span>'.$bukken_data['月額-万'].'</span>万円 ～</span>　<span>'.$bukken_data['価格-万'].'<span>万円（税込）</span></span></div>
*/
?>