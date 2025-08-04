<?php
//<meta charset="utf-8">
?>
<table class="borderTable01">
<tr>
	<th colspan="2">メインビジュアル<?php /*（写真：大が一覧に反映されます）*/ /* 内装オーダー */ ?></th>
</tr>
<tr>
	<th>カウントダウン</th>
	<td>
	<span class="dpIB label">登録年月日（公開日）から残り</span><select name="data[order_count]" class="" style="height:2em;">
<option value="">--- 未選択 ---</option>
<?php
$arr=COMMON_PARAM('order_count');
foreach($arr as $k => $v){
	$selected=($k==$resDataArr[8]?' selected="selected"':'');
	echo '<option'.$selected.'>'.$k.'</option>'.chr(10);
}
?>
</select></td>
</tr>
<tr>
	<th>写真</th>
	<td><?php
	$arr=array('大','小1','小2','小3','サムネイル');
	foreach($arr as $k => $v){
		if($k>0){echo '<hr>';}
		echo '<span class="dpIB label">写真：'.$v.'</span>'.IMG_THUMB('order').chr(10);
	}
	?>
	<div style="height: 0.5em;"></div></td>
</tr>
</table>