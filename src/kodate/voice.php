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
.voice_list{
	padding-bottom: min(135px,max(70px,13.5vw));
	text-align: justify;
	gap:35px 3.5%;
	display: flex;
	flex-wrap: wrap;
}
.voice_list li{width:310px;max-width: 31%;}
.voice_list li a{display: block;}
.voice_list li .p{height:220px; display:flex;}
.voice_list li .p.noimg{background-color: #CCC;}
.voice_list li .p img{width:100%; height:100%; object-fit:cover;}
.voice_list li .cb{margin-top: 15px; min-height: 20px; display:flex; justify-content:space-between; align-items:center;}
.voice_list li .cb .case{font-size: 14px;font-weight: 700;line-height: 1em;}
.voice_list li .cb .brand{
	font-size: 11px;font-weight: 700;line-height: 1em;padding: 0 0.5em;
	min-width: 11em;min-height:20px;display: flex;justify-content:center; align-items:center;
	background-color: #000;color: #FFF;
}
.voice_list li .t1{
	margin: 5px 0;
	border-top: solid 1px #231815;
	border-bottom: solid 1px #231815;
	font-size: 16px;font-weight: 700;line-height: calc(1em * 21 / 16);
	padding: 0.5em 0;
}
.voice_list li .t2{
	display: flex; justify-content:space-between;
	font-size: 12px;
}
@media screen and (max-width: 999px) {
	.voice_list{max-width: 655px;gap: 35px calc(1% * 35 / 6.55);}
	.voice_list li{max-width: calc(1% * 310 / 6.55);}
}
@media screen and (max-width: 699px) {
	.voice_list{max-width: 380px; gap: 50px;flex-direction: column;}
	.voice_list li{width:100%;max-width: 100%;}
	.voice_list li .p{height:270px;}
}
.local_search{
	background-color: #f0f0f0;
	padding: 0 20px;
	font-size: 1.5em;
	margin-bottom: 3.5em;
}
.local_search h3{
	font-size: 18px;
	padding-top: 30px;
	padding-bottom: 15px;
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
}
.local_search h3 svg{width:20px;}
.local_search h3 svg *{
	fill: none;
	stroke: #999;
	stroke-linecap: round;
	stroke-linejoin: round;
}
.local_search .acc{
	border-top: solid 1px #dadada;
	padding-top: 15px;
}
.local_search .set,
.local_search .submit{
	padding-bottom: 25px;
	display: flex;
	justify-content: center;
}
.local_search label{display: flex;align-items: center;}
.local_search label input{margin: 0;}
.local_search .set{
	font-size: 16px;
	gap: 0.5em 1em;
	flex-wrap: wrap;
}
.local_search .set label input{
	font-size: 1em;
	margin-right: 0.25em;
	width: 1.25em;
	height: 1.25em;
}
.local_search .set img{width:auto;height:43px;}
.local_search .submit label{
	position: relative;
	cursor: pointer;
}
.local_search .submit label input{
	background-color: var(--color-orange);
	color: #FFF;
	font-size: 15px;
	border: none;
	width: 200px;
	max-width: 100%;
	height: 40px;
	padding: 0;
	padding-right: 1em;
	line-height: 1em;
	cursor: pointer;
}
.local_search .submit label img{
	font-size: 6px;
	width: auto;
	height: 1em;
	margin-bottom: 0.5em;
	position: absolute;
	right: 1em;
}
@media screen and (min-width: 1000px) {
	.local_search h3 svg{display: none;}
}
@media screen and (max-width: 999px) {
	.local_search{margin-bottom: 1.5em;}
	.local_search h3{
		padding-top: 15px;
		cursor: pointer;
	}
	.local_search h3 svg{
		position: absolute;
		margin-right: -15em;
	}
	.local_search h3:not(.on) svg{transform: scaleY(-1);}
	.local_search .set{gap: 0.25em 0;}
	.local_search .set label{
		flex-grow: 1;
		width: max(180px,30%);
	}
	.local_search .set img{height:40px;}
	.local_search .acc{display: none;}
}
</style>
<script>
$(window).load(function(){
	$(window).bind("resize load",function(){
		LOCAL_SP_FIXBTN_FLAG();
	});
	$('.local_search h3').on('click', function(){
		if(window.matchMedia('(max-width:999px)').matches){
			if($(this).hasClass('on')){
				$(this).next('.acc').slideUp();
				$(this).removeClass('on');
			}
			else{
				$(this).next('.acc').slideDown();
				$(this).addClass('on');
			}
		}
	});
});
function LOCAL_SP_FIXBTN_FLAG(){
	//if(window.matchMedia('(max-width:999px)').matches){}
	if(window.matchMedia('(min-width:1000px)').matches){
		$('.local_search .acc').removeAttr('style');
		$('.local_search h3').removeClass('on');
	}
}
</script>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php echo PAN(array($p_title)); ?>
<?php echo PAGE_TITLE($p_title); ?>
<!-- *** -->
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" class="local_search"><div class="Wbase">
<h3><div>ブランドで絞り込む</div><?php echo file_get_contents($kaisou.'images/content/search/2025/arrow-base.svg'); ?></h3>
<div class="acc">
<div class="set">
<?php
$sysdata_prm=array();
$sysdata_prm['search-brand']='';
if(isset($_REQUEST['brand'])){
	if(is_array($_REQUEST['brand'])){
		$_REQUEST['brand']=implode(',',$_REQUEST['brand']);
	}
	$flag=false;
	$sysdata_prm['other-check']=explode(',',trim($_REQUEST['brand']));//コンマ付きも再度配列化
	foreach($sysdata_prm['other-check'] as $k){
		if(isset($area_list_2025sub['ブランド・voice'][$k])){
			$flag=true;
			break;
		}
	}	
	$sysdata_prm['search-brand']=','.$_REQUEST['brand'].',';
}
foreach($area_list_2025['ブランド'] as $k => $v){
	$img='images/content/search/2025/logo-'.$v[1].'.svg';
	$img=file_exists($img)?'<img src="'.$img.'" alt="'.$v[0].'">':$v[0];
	$add=(($sysdata_prm['search-brand']!='')&&(strpos($sysdata_prm['search-brand'],','.$k.',')!==false))?' checked':'';
	if($k==99){
		//その他の場合は追加ブランドも検索対象にする
		if($flag){$add=' checked';}
	}
	echo '<label><input type="checkbox" name="brand[]" value="'.$k.'"'.$add.'>'.$img.'</label>';
}
?>
</div>
<div class="submit">
<label><input type="submit" name="submit_search" value="絞り込む"><img src="images/content/search/2025/arrow-R-W.svg"></label>
</div>
</div>
<?php
/*
print_r($sysdata_prm['other-check']);
print_r($_REQUEST['brand']);
*/
?>
</div></form>
<!-- *** -->
<div class="content_box">
<ul class="Wbase voice_list">
<?php
//print_r($sysdata_proto);
$categoryArr=array();
//$categoryArr['brand'] = COMMON_PARAM('brand');
$categoryArr['brand'] = $area_list_2025['ブランド']+$area_list_2025sub['ブランド・voice'];
ksort($categoryArr['brand']);
$sysdata_prm['count']=count($sysdata_proto);
foreach($sysdata_proto as $key => $sysdata){
	$sysdata['case']=$sysdata_prm['count'];
	$sysdata_prm['count']--;
	$flag=false;
	if(($sysdata_prm['search-brand']!='')&&(strpos($sysdata_prm['search-brand'],','.$sysdata[3].',')===false)){
		$flag=true;
		if(strpos($sysdata_prm['search-brand'],',99,')!==false){
			//その他の場合は追加ブランドも検索対象にする
			if(isset($area_list_2025sub['ブランド・voice'][$sysdata[3]])){
				$flag=false;
			}
		}
	}//ブランド絞り込み
	if($flag){continue;}
	if(CMS_OPEN()){continue;}	
	CMS_DATA_REPLACE();
	CMS_IMGSET($sysdata[0],array('upfile'=>'voice'));
	$sysdata_prm['data'][]=$sysdata;//一旦保存
}
foreach($sysdata_prm['data'] as $k => $v){
	$add=array();
	$add['image']=isset($v['photo-num'][0])?'<img src="'.$v['photo-num'][0].'">':'';
	$add['noimg']=empty($add['image'])?' noimg':'';
	$add['brand']=$categoryArr['brand'][$v[3]];
	$add['bg']=isset($add['brand']['col'])?' style="background-color:'.$add['brand']['col'].'"':'';
	$add['brand']=($add['brand'][0]!='その他')?'<div class="brand"'.$add['bg'].'>'.$add['brand'][0].'</div>':'';
	if($v[9][1]!=''){$v[9][1].='様';}
	$add['name'][0]=array($v[9][0],$v[9][1]);
	$add['name'][0]=implode('　',array_filter($add['name'][0]));	
	$add['name'][1]=($v[9][2]!='')?'ご家族構成：'.$v[9][2]:'';
	$add['name']=implode('／',array_filter($add['name']));
	//'.print_r($v,true).'
	echo '<li><a href="voice-detail.php?case='.$v['case'].'">
<div class="p'.$add['noimg'].'">'.$add['image'].'</div>
<div class="cb"><div class="case">CASE'.$v['case'].'</div>'.$add['brand'].'</div>
<div class="t1">'.$v[2].'</div>
<div class="t2"><div class="name">'.$add['name'].'</div><div class="arrow">≫</div></div>
</a></li>'.PHP_EOL;
}
unset($sysdata_prm);
unset($add);
?>
</ul>
</div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>