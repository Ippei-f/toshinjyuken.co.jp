<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'images/content/lifestyle/';
$p_title='ライフスタイル';
$p_title2='LIFESTYLE TIPS';
require $kaisou."temp_php/basic.php";

//CMS読み込み
$dir_sys= $kaisou.'system/life/';
require $kaisou.'system/search/function/cms-load.php';//軽量版
array_multisort($index2,SORT_DESC,SORT_NUMERIC,$index1,SORT_DESC,SORT_NUMERIC,$sysdata_proto);

//$_GET配列・PHP7.0対応
$get_arr=$_GET;
if($get_arr==''){$get_arr=array();}
if(empty($get_arr['id'])){$get_arr['id']='';}
if(empty($get_arr['p'])){$get_arr['p']='';}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/lifestyle.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php echo PAN(array($p_title2)); ?>
<?php echo PAGE_TITLE($p_title2); ?>
<!-- *** -->
<div class="content_box"><div class="W1200 Wmax100per mgnAuto">
<?php 
if($get_arr['id']!=''){//詳細
foreach($sysdata_proto as $key => $sysdata){
	if($get_arr['id']!=$sysdata[0]){continue;}
	if(CMS_OPEN()){continue;}
	//一部データ配列化
	CMS_DATA_REPLACE();
	CMS_IMGSET($sysdata[0],array('upfile'=>'life'));
	$sysdata_dt=$sysdata;
	break;
}
//print_r($sysdata_dt);
?>
<div style="display: none;"><?php print_r($sysdata_dt); ?></div>
<div class="LS_detail">
<?php
$add='';
if(!file_exists($url=$sysdata_dt['upfile'][0])){
	$url='images/common/clear-W392H278.png';
	$add=' noimg';
}
echo '<img src="'.$url.'" class="W100per LSD_mainpic'.$add.'">';
if(!is_array($sysdata_dt[6])){$sysdata_dt[6]=array($sysdata_dt[6]);}
?>
<h3 class="LSD_title">【<?php echo $sysdata_dt[2]; ?>】</h3>
<div class="LSD_catch"><?php echo $sysdata_dt[6][0]; ?></div>
<?php
$t_cnt=$p_cnt=0;
//画像サイズ変更タグ配列作成
$upsizeArr1='';
$a=array();
if(!empty($sysdata_dt[10])){
	$a=$sysdata_dt[10];
	unset($a[0]);
}
foreach($a as $v){
	$upsizeArr1.=$v;
}
$upsizeArr1=explode('x',$upsizeArr1);

foreach($sysdata_dt[9] as $type){
	switch($type){
		case 'T':
		?>
		<h4 class="LSD_subt sp_br_del"><div><?php echo $sysdata_dt[8][$t_cnt++]; ?></div></h4>
		<?php
		break;
		case 'P':
		if(empty($sysdata_dt['naiyou-num'][$p_cnt])){$sysdata_dt['naiyou-num'][$p_cnt]='';}//PHP7.0対応
		$url=$sysdata_dt['naiyou-num'][$p_cnt];
		//echo $upsizeArr1[$p_cnt].'/'.$sysdata_dt[11][$p_cnt];
		if(file_exists($url)){
			$add='';
			if($upsizeArr1[$p_cnt]=='o'){
				if($sysdata_dt[11][$p_cnt]!=''){
					$add=' style="width:'.$sysdata_dt[11][$p_cnt].'px;"';
				}
			}
			echo '<img src="'.$url.'" class="LSD_photo"'.$add.'>';	
		}
		$p_cnt++;
		break;
		case 'W':
		?>
		<div class="LSD_text"><?php echo $sysdata_dt[8][$t_cnt++]; ?></div>
		<?php
		break;
	}
}
?>
</div>
<hr style="margin: 5em 0 3em;">
<div class="LSD_catch">その他の記事</div>
<?php
}

?>
<ul class="LS_list">
<?php
//print_r($sysdata_proto);
$LS_arr=array();//ここに条件に当てはまる記事を格納していく。
$p_start=0;//記事の開始場所
$p_limit=6;//1ページあたりの最大記事表示数
$p_now=1;


foreach($sysdata_proto as $key => $sysdata){
	if(CMS_OPEN()){continue;}
	if(($get_arr['id']!='')&&($get_arr['id']==$sysdata[0])){continue;}
	//一部データ配列化
	CMS_DATA_REPLACE();
	CMS_IMGSET($sysdata[0],array('upfile'=>'life'));
	//print_r($sysdata);
	if(!is_array($sysdata[6])){$sysdata[6]=array($sysdata[6],'');}
	$text=($sysdata[6][1]!='')?$sysdata[6][1]:$sysdata[6][0];
	$LS_arr[]='<li><a href="?id='.$sysdata[0].$t_blank.'"><img src="images/common/clear-W380H170.png" class="W100per bg_cover" style="background-image: url('.$sysdata['upfile'][0].');"><div class="pad">'.$text.'<div class="title">'.$sysdata[2].'</div></div></a></li>';
}

if($get_arr['id']){//詳細
	for($i=0;$i<$p_limit;$i++){
		if(empty($LS_arr[$i])){$LS_arr[$i]='';}//PHP7.0対応
		$v=$LS_arr[$i];
		if(strpos($v,'id='.$get_arr['id'])){
			$i--;
		}
		echo $v.chr(10);
	}
}
else{
	if($get_arr['p']!=''){
		//ページ指定
		if($get_arr['p']>=2){
			$p_now=$get_arr['p'];
			$p_start=($get_arr['p']-1)*$p_limit;
		}
	}
	$arr=array($p_start+$p_limit,count($LS_arr));
	$max=($arr[0]<$arr[1])?$arr[0]:$arr[1];
	
	for($i=$p_start;$i<$max;$i++){
		echo $LS_arr[$i].chr(10);
	}
}
?>
<div class="clear"></div>
</ul>
<?php
if($get_arr['id']){//詳細
?>
<div class="Wmax100per" style="width: 16em; padding: 4em 0;"><?php echo EFFECT_BTN('ライフスタイル','すべての記事',array('class'=>'W100per textL','arrow'=>true)); ?></div>
<?php
}
else{//一覧（ページャー表示）
?>
<div class="pagenavi" style="padding: 4em 0;">
<?php
$p_end=ceil(count($LS_arr)/$p_limit);
if($p_end!=1){
	$str='';
	if($p_now>1){
		$str.='<a class="p_arrow" rel="prev" href="?p='.($p_now-1).'">前へ <span class="dpIB rotation90">▼</span></a>';
		if(abs($p_now-1)>2){
			$str.=LOCAL_PAGER_PAD();
			$str.='<a class="p_num" title="Page 1" href="?p=1">1</a>';
		}
		if(abs($p_now-1)>3){
			$str.=LOCAL_PAGER_PAD();
			$str.=LOCAL_PAGER_PAD('・');
		}
	}
	for($i=1;$i<=$p_end;$i++){
		if(abs($i-$p_now)<=2){
			//選択ページから2ページ以内
			if($str!=''){
				$str.=LOCAL_PAGER_PAD();
			}
			if($i!=$p_now){
				$str.='<a class="p_num" title="Page '.$i.'" href="?p='.$i.'">'.$i.'</a>';
			}
			else{
				$str.='<span class="p_num current">'.$i.'</span>';
			}
		}
	}
	if($p_now<$p_end){
		if(abs($p_now-$p_end)>3){
			$str.=LOCAL_PAGER_PAD();
			$str.=LOCAL_PAGER_PAD('・');
		}
		if(abs($p_now-$p_end)>2){
			$str.=LOCAL_PAGER_PAD();
			$str.='<a class="p_num" title="Page '.$p_end.'" href="?p='.$p_end.'">'.$p_end.'</a>';
		}
		$str.=LOCAL_PAGER_PAD();
		$str.='<a class="p_arrow" rel="next" href="?p='.($p_now+1).'"><span class="dpIB rotation90">▲</span> 次へ</a>';
	}
	echo $str;
}
?>
</div>
<?php
}//一覧（ページャー表示）
?>
<?php
function LOCAL_PAGER_PAD($str=''){
	return '<span class="p_pad">'.$str.'</span>';
}
?>
</div></div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>