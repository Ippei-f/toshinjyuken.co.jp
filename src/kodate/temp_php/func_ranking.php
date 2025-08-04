<?php
//<meta charset="utf-8">

function RANKING_ACCESS($str){
	$str='<span>'.$str.'</span>';
	$str=str_replace(array("（"),'</span><span>（',$str);
	$str=str_replace(array("）"),'）</span><span>',$str);
	$str=str_replace(array("、"),'、</span><span>',$str);
	$str=str_replace(array("・"),'・</span><span>',$str);
	$str=str_replace(array("<br>","<br />"),"</span><br><span>",$str);
	$str=str_replace(array("　")," ",$str);
	$str=str_replace(chr(10),"",$str);
	return $str;
}

function RANKING_PRICE($arr){
	$min='-';
	//print_r($arr);
	for($i=0;$i<count($arr);$i+=4){		
		$arr[$i]=WORD_SPACEDEL($arr[$i]);
		if($arr[$i]==''){continue;}
		$arr[$i+2]=WORD_SPACEDEL($arr[$i+2]);
		//print_r($arr[$i+2].','.$min.'/');
		if(is_numeric($arr[$i+2])){
			switch(true){
				case ($min=='-'):
				case ($arr[$i+2]<$min):
				$min=$arr[$i+2];
			}
		}	
	}
	if(is_numeric($min)){
		$min=number_format($min);//.'万円 ～'
	}
	return $min;
}

function RANKING_PHASE($arr){
	global $v;
	$res=array();
	switch($arr){
		case 1:
		//$res['photo']='images/content/search/phase1.svg';
		$res['photo']='images/content/search/2025/phase-member.svg';//2025/05/28ver
		$res['size']='bg_contain';
		$res['login']=' login_window" onclick="return false;';
		break;
		default:
		$res['photo']=$v['order'][0];
		$res['size']='bg_cover';
		$res['login']='';
	}
	return $res;
}
?>