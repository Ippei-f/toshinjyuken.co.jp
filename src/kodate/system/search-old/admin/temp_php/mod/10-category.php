<?php
//<meta charset="utf-8">
?>
<tr>
	<th>エリア</th>
	<td><?php
	INPUT_CATEGORY($categoryArr_area[1],17);//,array('onclick'=>'T_CHANGE')
/*
<select name="data[area1]" class="" style="height:2em;">
<option value="">--- 未選択 ---</option>
<?php
foreach($arr1 as $k => $v){
	$selected=($k==$resDataArr[17]?' selected="selected"':'');
	echo '<option'.$selected.'>'.$v.'</option>'.chr(10);
}
?>
</select>
*/
?>
</td>
</tr>
<tr>
	<th>フェイズ</th>
	<td><?php
	INPUT_CATEGORY($categoryArr,3);//,array('onclick'=>'T_CHANGE')
	?></td>
</tr>
<?php
function INPUT_CATEGORY($list,$num,$prm=array()){
	global $dbDataStructure,$resDataArr;
	$name=$dbDataStructure[$num];
	$select=(!empty($_GET['id']))?$resDataArr[$num]:'';
	foreach($list as $k => $v){
		$checkedFlag = '';
		if($select==''){
			$select=$_POST[$name];
		}
		$defnum=(!empty($prm['defnum']))?$prm['defnum']:1;
		if((isset($select) && $select == $k) || (!isset($select) && $k == $defnum)){
			$checkedFlag = ' checked="checked"';
		}
		$onclick=(!empty($prm['onclick']))?' onclick="'.$prm['onclick'].'('.$k.');"':'';
		echo '<span class="dpIB" style="margin-right:1em;"><input type="radio" size="50" name="data['.$name.']" value="'.$k.'"'.$checkedFlag.$onclick.'/> '.$v.'</span>';
	}
}
?>