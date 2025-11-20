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
//print_r($_SESSION['rename']);

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
	<td><?php echo TextToKanma($resDataArr[2]);?></td>
</tr>
<tr>
	<th>ピックアップ</th>
	<td><?php echo $resDataArr[9] == 1 ? 'あり':'なし';?></td>
</tr>
<tr>
	<th>エリア</th>
	<td><?php echo TextToKanma($area_num[$resDataArr[10]]);?></td>
</tr>
<?php if(!empty($categoryArr)){ ?>
<tr>
	<th>カテゴリ</th>
	<td><?php echo TextToKanma($categoryArr[$resDataArr[3]]);?></td>
</tr>
<?php } ?>
<tr>
	<th>ブランド</th>
	<td><?php echo TextToKanma($categoryArr_brand[$resDataArr[13]]);?></td>
</tr>
<tr>
	<th>リンク先</th>
	<td><?php echo TextToKanma($resDataArr[4]);?></td>
</tr>
<?php
/*
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
foreach($extensionList as $val){
	$upFilePath = $img_updir.'/'.$id.'-0link_file.'.$val;			
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
?>
*/
?>
</table>

<style>
.local_kiji{}
.local_kiji div:nth-child(n+2){
	margin-top: 1em;
	padding-top: 1em;
	border-top: dashed 1px #CCC;
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
<?php if(false){ ?>
<tr>
	<th>写真</th>
	<td class="local_kiji">
	<?php
	if(!is_array($commentArr[8])){$commentArr[8]=array($commentArr[8]);}
	foreach($commentArr[8] as $k => $v){
		//余分な空白・改行削除
		$v=trim($v);
		switch($v){
			/*
			case 'T':
			if($k>0){
				echo '<hr>'.chr(10);
			}
			echo '<div class="kiji_T">'.COMMENT_SET(9).'</div>'.chr(10);
			break;
			*/
			case 'P':
			echo '<div class="kiji_P">'.IMG_THUMB('photo').'</div>'.chr(10);
			break;
			/*
			case 'W':
			echo '<div class="kiji_W">'.COMMENT_SET(6).'</div>'.chr(10);
			break;
			*/
		}
	}
	?>
	</td>
</tr>
<?php }//if(false) ?>
<tr>
	<th>写真</th>
	<td><?php
	echo TextToKanma($categoryArr_photo[$resDataArr[11]]);
	?><div style="height: 0.5em;"></div><?php
	switch($categoryArr_photo[$resDataArr[11]]){
		case '仮画像':
		?><img src="../../../images/content/search/p-default.jpg"><?php
		break;
		case 'アップロード':
		echo IMG_THUMB('photo').chr(10);
		break;
		case '直リンク':
		echo TextToKanma($resDataArr[12]).'<div style="height: 0.5em;"></div><img src="'.TextToKanma($resDataArr[12]).'" style="max-width:50%;">';
		break;
	}
	?></td>
</tr>
<tr>
	<th>本文</th>
	<td><?php echo COMMENT_SET(6); ?></td>
</tr>
</table>

<?php if(false){ ?>
</div>
</body>
</html>
<?php } ?>