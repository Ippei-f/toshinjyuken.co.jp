<?php
//<meta charset="utf-8">
?>
<tr>
	<th>エリア<span style="font-size: 0.8em;">（2025ver）</span></th>
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
<th>サブエリア</th>
<td>
<script>
$(function(){
	AREA2025();
	$('input[name="data[area1]"]').on('change', function(){
		AREA2025();
	});
});
function AREA2025(){
	v=$('input[name="data[area1]"]:checked').val();
	//console.log(v);
	prm='';
	switch(v){
<?php
	foreach($categoryArr_area[1] as $k => $v){
		$v=$categoryArr_area['エリア'][$k][1];
		$str=array('※住所から引用');
		echo 'case "'.$k.'":'.PHP_EOL;
		foreach($v as $vv){
			$str[]=$vv;
		}
		//if(empty($str)){$str=array('※指定無し');}
		$str='prm="<option>'.implode('</option><option>',$str).'</option>";'.PHP_EOL;
		if(!empty($resDataArr[18])&&(strpos($resDataArr[18],'※')===false)){
			$str=str_replace('<option>'.$resDataArr[18],'<option selected>'.$resDataArr[18],$str);
		}
		echo $str.'break;'.PHP_EOL;
	}
?>
	}
	$('select[name="data[area2]"]').html(prm);
}
</script>
<select name="data[area2]"></select>
</td>
</tr>
<tr>
	<th>ブランド</th>
	<td><?php
	//INPUT_CATEGORY($categoryArr_area[2],23);//,array('onclick'=>'T_CHANGE')
	INPUT_CATEGORY_CB($categoryArr_area[2],23);
	?></td>
</tr>
<tr>
	<th>フェイズ<span style="font-size: 0.8em;">（2025ver）</span></th>
	<td><?php
	INPUT_CATEGORY($categoryArr,3);//,array('onclick'=>'T_CHANGE')
	?></td>
</tr>
<tr>
	<th>その他カテゴリ</th>
	<td><?php
	//INPUT_CATEGORY($categoryArr_area[3],24,array('defnum'=>0));//,array('onclick'=>'T_CHANGE')
	//print_r($commentArr[24]);
	INPUT_CATEGORY_CB($categoryArr_area['その他'],24);
	/*
	$check='|'.implode('|',$commentArr[24]).'|';
	foreach($categoryArr_area['その他'] as $k => $v){
		$add=(strpos($check,'|'.$k.'|')!==false)?' checked="checked"':'';
		echo '<span class="dpIB" style="margin-right:1em;"><input type="checkbox" size="50" name="data[other_cate][]" value="'.$k.'"'.$add.'> '.$v.'</span>';
	}
	*/
	/*
	<select name="data[other_cate]">
	<?php
	foreach($categoryArr_area[3] as $k => $v){
		echo '<option value="'.$k.'">'.$v.'</option>'.PHP_EOL;
	}
	?>
	</select>
	*/
	?>
	</td>
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
		$defnum=(isset($prm['defnum']))?$prm['defnum']:1;
		if((isset($select) && $select == $k) || (!isset($select) && $k == $defnum)){
			$checkedFlag = ' checked="checked"';
		}
		$onclick=(!empty($prm['onclick']))?' onclick="'.$prm['onclick'].'('.$k.');"':'';
		echo '<span class="dpIB" style="margin-right:1em;"><input type="radio" size="50" name="data['.$name.']" value="'.$k.'"'.$checkedFlag.$onclick.'/> '.$v.'</span>';
	}
}
function INPUT_CATEGORY_CB($list,$num,$prm=array()){
	global $dbDataStructure,$commentArr;
	$name=$dbDataStructure[$num];
	$check='|'.implode('|',$commentArr[$num]).'|';
	foreach($list as $k => $v){
		$add=(strpos($check,'|'.$k.'|')!==false)?' checked="checked"':'';
		echo '<span class="dpIB" style="margin-right:1em;"><input type="checkbox" size="50" name="data['.$name.'][]" value="'.$k.'"'.$add.'> '.$v.'</span>';
	}
}
?>