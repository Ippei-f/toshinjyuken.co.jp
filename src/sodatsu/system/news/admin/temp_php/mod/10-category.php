<?php
//<meta charset="utf-8">
?>
<tr>
	<th>カテゴリ</th>
	<td><?php
	INPUT_CATEGORY($categoryArr,3);//,array('onclick'=>'T_CHANGE')
	?></td>
</tr>
<?php
/*
<tr class="cate_onoff c1">
	<th>NEWSカテゴリ</th>
	<td><?php
	INPUT_CATEGORY($categoryArr_news,8);//,array('onclick'=>'T_CHANGE')
	?></td>
</tr>
*/
?>
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
		echo '<span class="dpIB" style="margin-right:1em;"><input type="radio" size="50" name="data['.$name.']" value="'.$k.'"'.$checkedFlag.$onclick.'"/> '.$v.'</span>';
		// onclick="T_CHANGE('.$k.');
	}
}
?>