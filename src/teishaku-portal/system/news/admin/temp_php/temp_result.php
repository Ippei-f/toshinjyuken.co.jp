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

<tr>
	<th>NEWSカテゴリ</th>
	<td><?php echo TextToKanma($categoryArr_news[$resDataArr[8]]);?></td>
</tr>
*/
?>
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

?>
</table>

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

<?php if(false){ ?>
</div>
</body>
</html>
<?php } ?>