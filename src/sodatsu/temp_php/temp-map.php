<?php
//<meta charset="utf-8">
?>
<div id="map" class="map_box">
<?php
foreach(CMS_SETUP('search') as $key => $sysdata){
	if($sysdata[3]==999){continue;}//完売物件は載せない
	if(CMS_OPEN($sysdata)){continue;}
	CMS_DATA_REPLACE();
	//print_r($sysdata);
	if(!is_array($sysdata[13])){$sysdata[13]=array($sysdata[13]);}
	$map=str_replace(array('!2d','!3d','!2m3'),'@',$sysdata[13][0]);
	$map=explode('@',$map);
	if(($sysdata[13][1]!='')&&is_numeric($sysdata[13][1])){$map[2]=$sysdata[13][1];}//緯度指定
	if(($sysdata[13][2]!='')&&is_numeric($sysdata[13][2])){$map[1]=$sysdata[13][2];}//経度指定
	if($map[1]==''){continue;}//座標なしも載せない
	if($map[2]==''){continue;}
	$map=array
	('ID'=>$sysdata[0]
	,'物件名'=>$sysdata[2]
	,'経度'=>$map[1]
	,'緯度'=>$map[2]
	,'最寄駅'=>$sysdata[6][1]
	,'会員限定'=>($sysdata[3]==1)?' login_window" onclick="return false;':''
	);
	$map_arr[]=$map;
}
//print_r($map_arr);

//MAPセッティング
$map_set=array();
$map_set['経度']=$map_set['緯度']=0;
//$map_center=(isset($_GET['map'])&&($_GET['map']=='center'));
$map_center=true;//センターフラグ
if($map_center){
	$map_set+=array
	('経度上限'=>-999
	,'経度下限'=>999
	,'緯度上限'=>-99
	,'緯度下限'=>99
	);
}
//print_r($map_arr);
foreach($map_arr as $k => $v){
	$v['物件名']='<b>'.$v['物件名'].'</b>';
	if($v['最寄駅']!=''){
		//$v['最寄駅']=str_replace(array("、","／","/"),'<br>',$v['最寄駅']);
		$v['最寄駅']=str_replace(array("　"),' ',$v['最寄駅']);
		$v['物件名'].='<div>'.$v['最寄駅'].'</div>';
	}
	if($v['会員限定']!=''){
		$v['物件名'].='<span class="kaiin">会員限定</span>';
	}
	$map_set['情報'][]="{name:'<a href=\"".$link_list['物件詳細'][0]."?id=".$v['ID']."\" class=\"".$v['会員限定']."\">".$v['物件名']."</a>',
		lng:".$v['経度'].",
		lat:".$v['緯度'].",
		icon:'images/common/mapicon.png'
	}";
	if($map_center){
		if($v['経度']>$map_set['経度上限']){
			$map_set['経度上限']=$v['経度'];
		}
		if($v['経度']<$map_set['経度下限']){
			$map_set['経度下限']=$v['経度'];
		}
		if($v['緯度']>$map_set['緯度上限']){
			$map_set['緯度上限']=$v['緯度'];
		}
		if($v['緯度']<$map_set['緯度下限']){
			$map_set['緯度下限']=$v['緯度'];
		}
	}
	else{
		$map_set['経度']+=$v['経度'];
		$map_set['緯度']+=$v['緯度'];
	}
	unset($map_arr[$k]);//済んだものから空にしていく。
}
unset($map_arr);//完全削除
//print_r(count($map_set['情報']));
if($map_center){
	$map_set['経度']=($map_set['経度上限']+$map_set['経度下限'])/2;
	$map_set['緯度']=0.033+($map_set['緯度上限']+$map_set['緯度下限'])/2;//ピンの高さの分下にずれる
}
else{
	$map_set['経度']/=count($map_set['情報']);
	$map_set['緯度']/=count($map_set['情報']);
}
//print_r($map_set);
?>
</div>