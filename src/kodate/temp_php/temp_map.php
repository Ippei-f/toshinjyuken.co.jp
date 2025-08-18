<?php
//<meta charset="utf-8">
//print_r($sysdata_proto);
$mapset='';
$map_center_lat=0;
$map_center_lng=0;
$map_center=array
('min-緯度'=>99
,'max-緯度'=>-99
,'min-経度'=>999
,'max-経度'=>-999
);
$cnt=0;

foreach($sysdata_proto as $key => $sysdata_map){
	$sysdata_map=CMS_DATA_REPLACE_FREE($sysdata_map);
	//print_r($sysdata_map);
	if(CMS_OPEN_FREE($sysdata_map)){continue;}
	//if($sysdata['soldout']>0){continue;/*完売物件は表示しない*/}
	if(empty($sysdata_map[13][0])){continue;}//座標なしはスルー
	if(empty($sysdata_map[13][1])){continue;}//座標なしはスルー
	$sysdata_map[13][0]=str_replace(array('　',' ','	'),"",$sysdata_map[13][0]);
	$sysdata_map[13][1]=str_replace(array('　',' ','	'),"",$sysdata_map[13][1]);
	if($sysdata_map[13][0]==''){continue;}//座標なしはスルー
	if($sysdata_map[13][1]==''){continue;}
	
	if($mapset!=''){$mapset.=',';}
	/*
	if(($sysdata['modelroom']>0)||($sysdata['categoryNum2']>0)){
		$link=$link_list['物件情報詳細'].'?id='.$sysdata['id'].'&place=/'.$sysdata['roma'].'/';
	}
	else{
		$link=$link_list['物件情報'].'#info_'.$sysdata['roma'];
	}
	*/
	
	$sysdata_map[2]=str_replace("[","【",$sysdata_map[2]);
	$sysdata_map[2]=str_replace("]","】",$sysdata_map[2]);
	
	$mapset.="{name:'<a href=\"".$link_list['物件詳細'][0]."?id=".$sysdata_map[0]."\"><div class=\"font_bold\">".$sysdata_map[2]."</div>".$sysdata_map[6][1]."</a>',
		lat:".$sysdata_map[13][0].",
		lng:".$sysdata_map[13][1].",
		icon:'images/common/map-pin.png'
	}";
	
	/*
	if($sysdata_map[13][0]!=''){
		$map_center_lat+=$sysdata_map[13][0];
		$map_center_lng+=$sysdata_map[13][1];
		$cnt++;
	}
	*/
	if($map_center['min-緯度']>$sysdata_map[13][0]){$map_center['min-緯度']=$sysdata_map[13][0];}
	if($map_center['max-緯度']<$sysdata_map[13][0]){$map_center['max-緯度']=$sysdata_map[13][0];}
	if($map_center['min-経度']>$sysdata_map[13][1]){$map_center['min-経度']=$sysdata_map[13][1];}
	if($map_center['max-経度']<$sysdata_map[13][1]){$map_center['max-経度']=$sysdata_map[13][1];}
}
/*
$map_center_lat/=$cnt;
$map_center_lng/=$cnt;
*/
$map_center_lat=($map_center['min-緯度']+$map_center['max-緯度'])/2;
$map_center_lat+=0.025;//ピンの高さの分下にずれる
$map_center_lng=($map_center['min-経度']+$map_center['max-経度'])/2;
//print_r($sysdata_proto);
//print_r($sysdata_map);
?>