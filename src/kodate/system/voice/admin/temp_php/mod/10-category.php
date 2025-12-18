<?php
//<meta charset="utf-8">
?>
<?php
if(count($categoryArr)>0){
?>
<tr>
	<th>ブランド</th>
	<td><?php
	INPUT_CATEGORY($categoryArr['brand'],3);//,array('onclick'=>'T_CHANGE')
	?></td>
</tr>
<?php
}
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
		echo '<span class="dpIB" style="margin-right:1em;"><input type="radio" size="50" name="data['.$name.']" value="'.$k.'"'.$checkedFlag.$onclick.'/> '.$v.'</span>';
		// onclick="T_CHANGE('.$k.');"
	}
}
?>