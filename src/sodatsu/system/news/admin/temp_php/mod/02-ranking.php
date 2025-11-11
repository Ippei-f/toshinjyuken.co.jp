<?php
//<meta charset="utf-8">
?>
<table class="borderTable01">
<tr class="cate_onoff c2">
	<th>ランキング</th>
	<td><?php
	$file_path_search='../../search/data/data.dat';
	$getFormatDataArr_search = getLines2DspData($file_path_search,$img_updir,$config,'','',true);
?>
	1位…<?php echo RANKING_SELECT(); ?>
	<hr>
	2位…<?php echo RANKING_SELECT(); ?>
	<hr>
	3位…<?php echo RANKING_SELECT(); ?>
	<hr>
	4位…<?php echo RANKING_SELECT(); ?>
	<hr>
	5位…<?php echo RANKING_SELECT(); ?>
	</td>
</tr>
</table>
<?php
function RANKING_SELECT(){
	global $getFormatDataArr_search;
	$num=COMMENT_SET(6);
	$num=explode('/',$num);//$num[0]のみ使用
	$num=str_replace(array('ID:'),'',$num[0]);//数値のみにする
	$str='<select name="data[comment][]" class="near_select" style="height:2em;">
<option value="">--- 未選択 ---</option>'.chr(10);
	foreach($getFormatDataArr_search as $key => $sysdata){
		$selected=($num==$sysdata['id'])?' selected':'';
		$str.='<option'.$selected.'>ID:'.$sysdata['id'].'/'.$sysdata['title'].'</option>'.chr(10);
	}
	$str.='</select>'.chr(10);//<!-- num:'.$num.' -->
	return $str;
}
?>