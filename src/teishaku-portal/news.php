<?php
$p_type='news';
$kaisou='';
$p_title='NEWS';
$dir=$kaisou.'images/content/news/';
require $kaisou."temp_php/basic.php";

require $kaisou."system/function/cms-load.php";

//$_GET配列・PHP7.0対応
$get_arr=$_GET;
if($get_arr==''){$get_arr=array();}
//print_r($get_arr);
if(empty($get_arr['id'])){$get_arr['id']='';}
if(empty($get_arr['c'])){$get_arr['c']='';}
if(empty($get_arr['d'])){$get_arr['d']='';}
if(empty($get_arr['p'])){$get_arr['p']='';}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/news.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php echo CONTENT_TOPIMG(); ?>
<?php echo PAN(array($p_title)); ?>
<!-- *** -->
<div class="content_box"><div class="Wbase W1160">
<?php
$news_arr=array();//ここに条件に当てはまる記事を格納していく。
$archive_arr=array();//アーカイブ記事数格納
$categoryArr=COMMON_PARAM('news_cate');//NEWSカテゴリ

$archive_cnt=-1;
$archive_now='';

$p_start=0;//記事の開始場所
$p_limit=10;//1ページあたりの最大記事表示数
$p_now=1;
$news_title='';
foreach(CMS_SETUP('news') as $key => $sysdata){
	if(CMS_OPEN($sysdata)){continue;}
	//直リンク・直リンクファイルありの時はパス
	if($sysdata[4]!=''){continue;}
	$ext=array('jpg','gif','png','pdf','xlsx','xls','doc','docx','ppt','pptx');
	$upf='';
	foreach($ext as $v){
		$url=$img_updir.$sysdata[0].'-0link_file.'.$v;
		//print_r($url);
		if(file_exists($url)){
			$upf=$url;
			break;
		}
	}
	if($upf!=''){continue;}
	
	//一部データ配列化
	CMS_DATA_REPLACE();
	
	//アーカイブリスト作成
	$arr=explode("-",$sysdata[1]);
	$date_param=$arr[0].$arr[1];//YYYYMM作成
	if($archive_now!=$date_param){
		$archive_now=$date_param;
		$archive_cnt++;
		$archive_arr[$archive_cnt]['表記']=$arr[0].'年'.$arr[1].'月';
		$archive_arr[$archive_cnt]['変数']=$date_param;
		$archive_arr[$archive_cnt]['個数']=1;
	}
	else{
		$archive_arr[$archive_cnt]['個数']++;
	}
	
	//ID指定がある場合、ID以外を除く
	if($get_arr['id']!=''){
		if($get_arr['id']!=$sysdata[0]){continue;}
		$news_title=$sysdata[2];//タイトル引用
	}
	
	//カテゴリ指定がある場合、カテゴリ以外を除く
	if($get_arr['c']!=''){
		if($get_arr['c']!=$sysdata[3]){continue;}
	}
	//日付指定がある場合、指定以外を除く
	if($get_arr['d']!=''){
		if($get_arr['d']!=$date_param){continue;}
	}
	
	//画像URLを配列に格納
	CMS_IMGSET($sysdata[0],array('upfile'=>'news'));	
	
	//echo '<li>'.$sysdata[2].'</li>';
	//リストに保存
	$news_arr[]=$sysdata;
}
//print_r($news_arr);
//print_r($archive_arr);

//
if($get_arr['id']!=''){
	//ID指定されていれば最優先
}
else{	
	if($get_arr['d']!=''){
		//日付取得
		$news_title.='ARCHIVE：'.intval($get_arr['d']/100).'年'.($get_arr['d']%100).'月';
	}
	if($get_arr['c']!=''){
		//カテゴリ取得
		if($news_title!=''){$news_title.=' / ';}
		$news_title.='CATEGORY：'.$categoryArr[$get_arr['c']];
	}
}


if($get_arr['p']!=''){
	//ページ指定
	if($get_arr['p']>=2){
		$p_now=$get_arr['p'];
		$p_start=($get_arr['p']-1)*$p_limit;
	}
}
$arr=array($p_start+$p_limit,count($news_arr));
$max=($arr[0]<$arr[1])?$arr[0]:$arr[1];


//スマホ版メニュー作成
$spmenu_select='<select class="news_select col_newscolor" name="page_category" onChange="location.href=value;">
<option value="#">CATEGORY</option>
<option value="'.$link_list['NEWS'][0].'">・全表示</option>'.chr(10);
for($i=1;$i<=count($categoryArr);$i++){
	$spmenu_select.='<option value="?c='.$i.'">・'.$categoryArr[$i].'</option>'.chr(10);
}
$spmenu_select.='</select>
<select class="news_select col_newscolor" name="page_archive" onChange="location.href=value;">
<option value="#">ARCHIVE</option>
<option value="'.$link_list['NEWS'][0].'">・全表示</option>'.chr(10);
for($i=0;$i<count($archive_arr);$i++){
	$spmenu_select.='<option value="?d='.$archive_arr[$i]['変数'].'">・'.$archive_arr[$i]['表記'].'（'.$archive_arr[$i]['個数'].'）</option>'.chr(10);
}
$spmenu_select.='</select>'.chr(10);
?>
<script>
$(document).ready(function(){
	if ($(this).scrollTop() > $('.pan').offset().top-$('header').height()) {
		$('header').addClass('w');
	}
});
$(window).load(function(){
	$(window).resize(function(){
		$('header').removeClass('fade');
	});
	$(window).scroll(function(){
		if ($(this).scrollTop() > $('.pan').offset().top-$('header').height()) {
			$('header').addClass('fade');
			$('header .logo').addClass('fade');
			$('header').addClass('w');
		}
		else{
			$('header').addClass('fade');
				$('header .logo').addClass('fade');
			$('header').removeClass('w');
		}
	});
});
$(window).load(function(){
	//スマホ版メニュー追従切り替え
	var sp_menuborder=$(".sp_menuborder").offset().top-$("body > div > .H_head").height();/*-$(".pan").height()*/
	if ($(this).scrollTop() >= sp_menuborder) {
		$(".sp_newsmenu").addClass("fixed");
		$(".sp_menupad").addClass("fixed");
	}
	$(window).scroll(function(){
		sp_menuborder=$(".sp_menuborder").offset().top-$("body > div > .H_head").height();/*-$(".pan").height()*/
  	if ($(this).scrollTop() >= sp_menuborder) {
			$(".sp_newsmenu").addClass("fixed");
			$(".sp_menupad").addClass("fixed");
		}
		else {
			$(".sp_newsmenu").removeClass("fixed");
			$(".sp_menupad").removeClass("fixed");
		}
	});
});
</script>
<?php /*<div style="height:1em;"></div>*/ ?>
<div class="sp_menupad sp_menuborder pc_vanish"></div>
<div class="sp_newsmenu newsmenu LH200 borderbox pc_vanish"><?php echo $spmenu_select; ?></div>
<?php /*<div style="height:1em;"></div>*/ ?>
<div style="padding-bottom:25px;">
<table border="0" cellpadding="0" cellspacing="0" class="W100per bg_BA6 col_FFF" style="min-height:50px;"><tr>
<th align="left" valign="middle" class="fontP120 LH150" style="padding:0.5em 1em;"><?php echo (($news_title!='')?$news_title:'全表示'); ?></th>
</tr></table>
</div>

<div class="newsbox">
<ul>
<?php
//NEWS表示
if($get_arr['id']!=''){
	//個別ページ用表示
	$v=$news_arr[0];
	$d=date('Y/n/j',strtotime($v[1]));
	if(!is_array($v[9])){$v[9]=array($v[9]);}
	echo '<li>
<div class="anchor"><a id="id'.$v[0].'" name="id'.$v[0].'"></a></div>
<table border="0" cellpadding="0" cellspacing="0" class="date"><tr>
<td align="left">'.$d.'</td>
<td align="right">'.$categoryArr[$v[8]].'</td>
</tr></table>
<h3>'.$v[2].'</h3><br>';
	$cntarr=array('W'=>0,'P'=>0);
	if(!is_array($v[10])){$v[10]=array($v[10]);}
	foreach($v[10] as $vk => $vv){
		switch($vv){
			case 'W':
			echo '<div class="kiji_W LH175">'.$v[9][$cntarr[$vv]++].'</div>'.chr(10);
			break;
			case 'P':
			if(!empty($v['news'][$cntarr[$vv]])){
				if(file_exists($v['news'][$cntarr[$vv]])){
					echo '<div class="kiji_P"><img src="'.$v['news'][$cntarr[$vv]].'"></div>'.chr(10);
				}
			}
			$cntarr[$vv]++;
			break;
		}
	}
	echo '</li>'.chr(10);
}
else{
	//一覧ページ用表示
	for($i=$p_start;$i<$max;$i++){
	//print_r($news_arr[$i]);
	$v=$news_arr[$i];
	$d=date('Y/n/j',strtotime($v[1]));
	if(!is_array($v[9])){
		$v[9]=array($v[9]);
	}
	/*
	echo '<li style="padding:1em 0;"><table border="0" cellpadding="0" cellspacing="0"><tr>
<td class="n_date"><div>'.$d.'　</div></td>
<td><a href="?id='.$v[0].'" class="dpIB">'.$v[2].'</a></td>
</tr></table></li>'.chr(10);
	*/
	echo '<!-- NEWS -->
<li>
<div class="anchor"><a id="id'.$v[0].'" name="id'.$v[0].'"></a></div>
<table border="0" cellpadding="0" cellspacing="0" class="date"><tr>
<td align="left">'.$d.'</td>
<td align="right">'.$categoryArr[$v[3]].'</td>
</tr></table>
<h3>'.$v[2].'</h3>';
		
		/* 半角と全角が混在するとうまく分断できないようなので、<br>で判断し、行数で分割するようにする */
		//$text=mb_strlen($v[9][0],"UTF-8");
		//$text=preg_replace("/^.{0,80}+\K/us",'@@@', $v[9][0]);
		//$text=mb_substr($v[9][0],0,80);
		$text=strip_tags($v[9][0]);
		$text=mb_strimwidth($text,0,80,"...","UTF-8");
		echo '<div class="text LH200">'.$text.'</div>';
		echo '<div class="textR LH100 dt_btn"><a href="?id='.$v[0].'" class="dpIB bg_BA6 col_FFF">記事を読む</a></div></li>'.chr(10);
	}
}


//何一つ掲載内容がない場合のみ表示
if(empty($news_arr)){
	echo '<li style="padding-top:1em;">※掲載内容はありません。</li>';
}
?>
</ul>
<?php
//ページャー
$p_max=ceil(count($news_arr)/$p_limit);
$p_range=4;
$r_min=(($p_now-$p_range)>1)?($p_now-$p_range):1;
$r_max=(($p_now+$p_range)<$p_max)?($p_now+$p_range):$p_max;
$add=(($get_arr['c']!='')?'c='.$get_arr['c'].'&':'').(($get_arr['d']!='')?'d='.$get_arr['d'].'&':'');
$end_L='';
$end_R='';

if($p_max>1){
	echo '<div class="pager LH100">'.chr(10);
	echo '<!-- $r_min:'.$r_min.' $r_max:'.$r_max.' -->'.chr(10);
	if($r_min>1){
		$end_L='<a href="'.$link_list['NEWS'][0].'?'.$add.'p=1">1</a>';
	}
	if($r_min>2){
		$end_L.='<span>…</span>';
		$r_min++;
	}
	if($r_max<$p_max){
		$end_R='<a href="'.$link_list['NEWS'][0].'?'.$add.'p='.$p_max.'">'.$p_max.'</a>';
	}
	if($r_max<($p_max-1)){
		$end_R='<span>…</span>'.$end_R;
		$r_max--;
	}
	if($end_L==''){
		$r_max+=$p_range-$p_now+2;
		if($r_max>$p_max){$r_max=$p_max;}
	}
	if($end_R==''){
		$r_min-=$p_range-($p_max-$p_now)+2;
		if($r_min<1){$r_min=1;}
	}
	
	if($p_now>1){
		echo '<a href="'.$link_list['NEWS'][0].'?'.$add.'p='.($p_now-1).'">&lt;</a>';
	}
	if($end_L!=''){
		echo $end_L;
	}
	for($i=$r_min;$i<=$r_max;$i++){
		if($i==$p_now){
			echo '<span class="bg_green">'.$i.'</span>';
		}
		else{
			echo '<a href="'.$link_list['NEWS'][0].'?'.$add.'p='.$i.'">'.$i.'</a>';
		}
	}
	if($end_R!=''){
		echo $end_R;
	}
	if($p_now<$p_max){
			echo '<a href="'.$link_list['NEWS'][0].'?'.$add.'p='.($p_now+1).'">&gt;</a>';
	}
	echo '</div>'.chr(10);
}
?>
</div>
<!-- **** -->
<div class="newsmenu LH200 sp_vanish">
<div class="col_newscolor">CATEGORY<?php /*カテゴリー*/ ?></div>
<ul>
<?php
echo '<li><a href="'.$link_list['NEWS'][0].'">・全表示</a></li>'.chr(10);
foreach($categoryArr as $k => $v){
	echo '<li><a href="?c='.$k.'">・'.$v.'</a></li>'.chr(10);
}
?></ul>
</div>
<!-- **** -->
<div class="newsmenu LH200 sp_vanish" style="clear:right;">
<div class="col_newscolor">ARCHIVE<?php /*アーカイブ*/ ?></div>
<ul>
<?php
echo '<li><a href="'.$link_list['NEWS'][0].'">・全表示</a></li>'.chr(10);
foreach($archive_arr as $k => $v){
	echo '<li><a href="?d='.$v['変数'].'">・'.$v['表記'].'（'.$v['個数'].'）</a></li>'.chr(10);
}
?></ul>
</div>
<!-- *** -->
<div class="clear"></div>
<?php echo CONTENT_PAD(90,'sp/2'); ?>
</div></div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>