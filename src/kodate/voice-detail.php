<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'images/content/voice/';
$p_title='お客様の声';
require $kaisou."temp_php/basic.php";

//CMS読み込み
$dir_sys= $kaisou.'system/voice/';
require $kaisou.'system/search/function/cms-load.php';//軽量版
array_multisort($index2,SORT_DESC,SORT_NUMERIC,$index1,SORT_DESC,SORT_NUMERIC,$sysdata_proto);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
<style>
.voice_dt{padding: min(110px,max(50px,11vw)) 0 min(150px,max(80px,15vw));}
.voice_dt > *:not(.back){text-align: justify;}
.voice_dt .cb{min-height: calc(1rem * 25 / 16); display:flex; justify-content:space-between; align-items:center;}
.voice_dt .cb .case{font-size: calc(1rem * 18 / 16);font-weight: 700;line-height: 1em;}
.voice_dt .cb .brand{
	font-size: calc(1rem * 13 / 16); font-weight: 700;line-height: 1em;padding: 0 0.5em;
	min-width: 11em; min-height: calc(1rem * 25 / 16);display: flex; justify-content:center; align-items:center;
	background-color: #000;color: #FFF;
}
.voice_dt .t{
	margin: 0.5em 0 0;
	border-top: solid 1px #231815;
	border-bottom: solid 1px #231815;
	padding: 1em 0;
}
.voice_dt .t h2{font-size: min(calc(1rem * 22 / 16),calc(1vw * 18 / 3.75));font-weight: 700;line-height: 1.5em;}
.voice_dt .t .name{font-size: calc(1rem * 14 / 16);margin-top: 0.5em;}
.voice_dt .set{
	padding: min(40px,max(25px,4vw)) 0 0;
	gap:1.25em;
	display: flex;
	flex-direction: column;
}
.voice_dt .set .T,
.voice_dt .set .W,
.voice_dt .set .W *{line-height: 1.75em;}
.voice_dt .set .T h3{font-size: max(18px,calc(1rem * 18 / 16));}
.voice_dt .set .W{margin: -0.375em 0;}
.voice_dt .back{padding: min(80px,max(40px,8vw)) 0 0;}
</style>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php
$pan=array($p_title);
$case_num=(isset($_GET['case'])&&is_numeric($_GET['case']))?$_GET['case']:'';
if($case_num!=''){
	$pan[]='CASE'.$case_num;
}
echo PAN($pan);
//echo PAGE_TITLE($p_title);
?>
<!-- *** -->
<div class="content_box">
<?php
if($case_num!=''){
	$categoryArr=array();
	//$categoryArr['brand'] = COMMON_PARAM('brand');
	$categoryArr['brand'] = $area_list_2025['ブランド']+$area_list_2025sub['ブランド・voice'];
	ksort($categoryArr['brand']);
	$sysdata_prm=array();
	foreach($sysdata_proto as $key => $sysdata){
		if(CMS_OPEN()){continue;}
		CMS_DATA_REPLACE();
		CMS_IMGSET($sysdata[0],array('upfile'=>'voice'));
		$sysdata_prm['data'][]=$sysdata;//一旦保存
	}
	$sysdata_prm['now']=count($sysdata_prm['data'])-$case_num;
	$v=$sysdata_prm['data'][$sysdata_prm['now']];
	//print_r($v);
	
	$add=array();
	$add['brand']=$categoryArr['brand'][$v[3]];
	$add['bg']=isset($add['brand']['col'])?' style="background-color:'.$add['brand']['col'].'"':'';
	$add['brand']=($add['brand'][0]!='その他')?'<div class="brand"'.$add['bg'].'>'.$add['brand'][0].'</div>':'';
	if($v[9][1]!=''){$v[9][1].='様';}
	$add['name'][0]=array($v[9][0],$v[9][1]);
	$add['name'][0]=implode('　',array_filter($add['name'][0]));	
	$add['name'][1]=($v[9][2]!='')?'ご家族構成：'.$v[9][2]:'';
	$add['name']=implode('／',array_filter($add['name']));
?>
<div class="Wbase voice_dt">
<div class="cb"><div class="case">CASE<?php echo $case_num; ?></div><?php echo $add['brand']; ?></div>
<div class="t">
<h2><?php echo $v[2]; ?></h2>
<div class="name"><?php echo $add['name']; ?></div>
</div>
<section class="set">
<?php
$add['cntP']=$add['cntT']=0;
foreach($v[8] as $vk => $vv){
	$add['set']='';
	switch($vv){
		case 'P':
		$add['set']='<img src="'.$v['photo-num'][$add['cntP']++].'">';
		break;
		case 'T':
		$add['set']='<h3>'.$v[6][$add['cntT']++].'</h3>';
		break;
		case 'W':
		$add['set']=$v[6][$add['cntT']++];
		break;
	}
	echo '<div class="'.$vv.'">'.$add['set'].'</div>';
}
?>
</section>
<div class="back"><?php
echo EFFECT_BTN('お客様の声','お客様の声 一覧に戻る',array('arrow'=>true,'class'=>'colW','style'=>'width:16em;text-align:left;'));
?></div>
</div>
<?php
unset($sysdata_prm);
unset($add);
}
?>
</div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>