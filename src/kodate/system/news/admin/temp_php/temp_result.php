<?php if(false){ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="container">
<?php } ?>

<?php
$type_edit=false;
require 'temp_php/temp_arrayset.php';
?>
  <table class="borderTable01">
    <tr>
      <th>登録年月日</th>
      <td align="left"><?php echo "$up_ymd_array[0] 年 $up_ymd_array[1] 月 $up_ymd_array[2] 日 \n";?></td>
      </tr>
  <tr>
	<th style="width:20%">公開・非公開</th><td><?php echo $resDataArr[7] == 1 ? '公開':'非公開';?></td>
  </tr>
<tr>
	<th>タイトル</th>
	<td><?php echo $resDataArr[2]; ?></td>
</tr>
<tr>
	<th>NEWマーク</th>
	<td><?php echo $resDataArr[11] == 1 ? '表示 … <span class="newMark">NEW!</span>':'非表示';?></td>
</tr>
<tr>
	<th>カテゴリ</th>
	<td><?php echo TextToKanma($categoryArr[$resDataArr[3]]);?></td>
</tr>
<?php
/*
<tr>
	<th>エリア</th>
	<td><?php echo TextToKanma($categoryArr_area[1][$resDataArr[17]]);?></td>
</tr>

<tr>
	<th>住所</th>
	<td><?php echo COMMENT_SET(6); ?></td>
</tr>
<tr>
	<th>交通</th>
	<td><?php echo COMMENT_SET(6); ?></td>
</tr>
*/

if($resDataArr[3]==1){
?>
<tr>
	<th>NEWSカテゴリ</th>
	<td><?php echo TextToKanma($categoryArr_news[$resDataArr[8]]);?></td>
</tr>
<tr>
	<th>直リンクURL</th>
	<td><?php echo (!empty($resDataArr[4])) ? '<a href="'.$resDataArr[4].'" target="_blank">'.$resDataArr[4].'</a>' : '';
		if(!empty($resDataArr[4])){
			echo '<br />リンクの開き方：';
			echo ($resDataArr[5] == 1) ? '同一ウインドウ' : '別ウインドウ';
		}
		?>
	</td>
</tr>
<?php 
	for($i=0;$i<$linklFileCount;$i++){
		foreach($extensionList as $val){
			$upFilePath = $img_updir.'/'.$id.'-'.$i.'link_file.'.$val;
			
			if(file_exists($upFilePath)){
?>
<tr>
	<th>直リンクファイル</th>
	<td><a href="<?php echo $upFilePath;?>" target="_blank">リンクファイル</a></td>
</tr>
<?php				
			break;
			}
		}
	}

}//if($resDataArr[3]==1)
?>
</table>

<?php if($resDataArr[3]==1){ ?>
<style>
.local_kiji{}
.local_kiji div:nth-child(n+2){
	margin-top: 1em;
}
.local_kiji .kiji_T{
	color:#738DA0;
	border-left: solid 0.5em #738DA0;
	background-color: #F4F5F5;
	padding: 0.25em 0.5em;
	font-weight: bold;
}
</style>
<table class="borderTable01">
<tr>
	<th>記事内容</th>
	<td class="local_kiji">
	<?php
	foreach($commentArr[10] as $k => $v){
		switch($v){
			/*
			case 'T':
			if($k>0){
				echo '<hr>'.chr(10);
			}
			echo '<div class="kiji_T">'.COMMENT_SET(9).'</div>'.chr(10);
			break;
			*/
			case 'W':
			echo '<div class="kiji_W">'.COMMENT_SET(9).'</div>'.chr(10);
			break;
			case 'P':
			echo '<div class="kiji_P">'.IMG_THUMB('news').'</div>'.chr(10);
			break;
		}
	}
	?>
	</td>
</tr>
</table>
<?php } ?>
<?php if($resDataArr[3]==2){ ?>
<table class="borderTable01">
<tr>
	<th>ランキング</th>
	<td>
	1位…<?php echo COMMENT_SET(6); ?>
	<hr>
	2位…<?php echo COMMENT_SET(6); ?>
	<hr>
	3位…<?php echo COMMENT_SET(6); ?>
	<hr>
	4位…<?php echo COMMENT_SET(6); ?>
	<hr>
	5位…<?php echo COMMENT_SET(6); ?>
	</td>
</tr>
</table>
<?php } ?>

<?php
/*
<table class="borderTable01">
<tr>
	<th>コメント</th>
	<td><?php echo COMMENT_SET(6); ?></td>
</tr>
</table>

<table class="borderTable01">
<tr>
	<th colspan="2">メインビジュアル</th>
</tr>
<tr>
	<th>カウントダウン</th>
	<td><?php
	echo $resDataArr[8];
	if($resDataArr[8]!=''){
		$arr=COMMON_PARAM('order_count');
		echo '（終了日：'.date('Y 年 m 月 d 日',strtotime($up_ymd_array[0].'-'.$up_ymd_array[1].'-'.$up_ymd_array[2].' +'.$arr[$resDataArr[8]])).'）';
	}
	?></td>
</tr>
<tr>
	<th>写真</th>
	<td><?php
	$arr=array('大','小1','小2','小3');
	foreach($arr as $k => $v){
		if($k>0){echo '<hr>';}
		echo '<span class="dpIB label">写真：'.$v.'</span>'.IMG_THUMB('order').chr(10);
	}
	?>
	<div style="height: 0.5em;"></div></td>
</tr>
</table>

<table class="borderTable01">
<tr>
	<th colspan="2">販売区画</th>
</tr>
<tr>
	<th>区画図</th>
	<td><?php echo IMG_THUMB('kukaku'); ?></td>
</tr>
<tr>
	<th>各タイプ情報</th>
	<td>
	<?php
	$arr=array('A','B','C','D','E','F','G','H','I','J');
	foreach($arr as $k => $v){
		$img=IMG_THUMB('kukaku');
		$cmt=array(COMMENT_SET(9),COMMENT_SET(9),COMMENT_SET(9),COMMENT_SET(9));
		if($cmt[0]!=''){
	?>
	<div class="padbox kukaku dotline">
	<div><span class="dpIB label">タイプ名</span><?php echo $cmt[0]; ?></div>
	<div><span class="dpIB label">VR見学ボタン</span><?php echo ($commentArr[10][$k]!='')?'<a href="'.$commentArr[10][$k].'" target="_blank">'.$commentArr[10][$k].'</a>':'非表示'; ?></div>
	<div><span class="dpIB label T">敷地・延床面積</span><span class="dpIB"><?php echo $cmt[1]; ?></span></div>
	<div><span class="dpIB label">販売価格</span><?php echo number_format($cmt[2]); ?> 万円</div>
	<div><span class="dpIB label">フリーワード</span><?php echo $cmt[3]; ?></div>
	<div><span class="dpIB label">間取り</span><?php echo $img; ?></div>
	</div>
	<?php
			}
		}
	?>
	<div style="height: 0.5em;"></div>
	</td>
</tr>
</table>

<table class="borderTable01">
<tr>
	<th colspan="2">ギャラリー</th>
</tr>
<?php
$str='';
foreach($commentArr[11] as $k => $v){
	switch($v){
		case 'T':
		$cmt=COMMENT_SET(12);
		if($cmt!=''){
			$str.='<div class="bg_title">'.$cmt.'</div>';
		}
		break;
		case 'P':		
		$img=IMG_THUMB('gallery');
		$cmt=COMMENT_SET(12);
		if((strip_tags($img).$cmt)!=''){
			$str.='<div>'.$img.'<div>'.$cmt.'</div></div>';
		}
		break;
		default:
		if($k>0){
			$str.='</div></td></tr>'.chr(10);
		}
		$str.='<tr>
	<th>'.$v.'</th>
	<td><div class="padbox gallery addbox sorttable">'.chr(10);
	}
}
$str.='</div></td></tr>'.chr(10);
echo $str;
?>
</table>

<table class="borderTable01">
<tr>
	<th>物件概要</th>
	<td><?php echo COMMENT_SET(6); ?></td>
</tr>
<tr>
	<th>販売会社</th>
	<td>
	<div style="font-size: 110%; line-height: 150%;"><?php echo COMMENT_SET(6); ?></div>
	<div style="font-size: 90%; line-height: 150%;"><?php echo COMMENT_SET(6); ?></div>
	</td>
</tr>
</table>

<table class="borderTable01">
<tr>
	<th colspan="2">アクセス・周辺環境</th>
</tr>
<tr>
	<th>座標</th>
	<td><div class="padbox">
	<div><span class="dpIB label">緯度</span><?php echo COMMENT_SET(13); ?></div>
	<div><span class="dpIB label">経度</span><?php echo COMMENT_SET(13); ?></div>
	</div></td>
</tr>
<tr>
	<th>周辺情報</th>
	<td><div class="padbox access addbox sorttable">
	<?php
$str='';
$max=count($commentArr[13]);
for($i=2;$i<$max;$i++){
	$str.='<div><span class="dpIB label T" style="font-size: 100%;">'.COMMENT_SET(13).'</span><span class="dpIB">'.COMMENT_SET(6).'</span></div>'.chr(10);
}
echo $str;
	?>
	</div></td>
</tr>
</table>

<table class="borderTable01">
<tr>
	<th>バナー</th>
	<td><div class="padbox banner addbox sorttable">
	<?php
$str='';
$max=count($commentArr[14]);
for($i=0;$i<$max;$i++){
	$img=IMG_THUMB('banner');
	$cmt=array(COMMENT_SET(14),COMMENT_SET(15));
	if(strip_tags($img)!=''){
		$str.='<div>'.$img.'<div>'.$cmt[0].'…'.$cmt[1].'</div></div>';
	}
}
echo $str;
	?>
	</div></td>
</tr>
</table>

<table class="borderTable01">
<tr>
	<th>周辺の物件</th>
	<td><div class="padbox near"><?php echo COMMENT_SET(16); ?></div></td>
</tr>
</table>
*/
?>




<?php if(false){ ?>
</div>
</body>
</html>
<?php } ?>