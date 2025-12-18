<style>
table td{vertical-align: bottom;text-align: center;font-size: 12px;}
table img{width:5em;display: block;}
</style>

<table>
<tr><td>サムネイル</td><td>元１</td><td>元２（優先）</td></tr>
<?php
//<meta charset="utf-8">
$a=glob("../../search/upload-resize/order*");
//$a=glob("../upload/order*-{0.*,4.*}",GLOB_BRACE);
//print_r($a);
foreach($a as $k => $proto){
	$img=array();
	$img[]=$proto;
	$proto=explode('/',$proto);
	$proto=explode('.',end($proto));
	$proto=explode('r',$proto[0]);
	$b=glob("../upload/order".end($proto)."-{0.*,4.*}",GLOB_BRACE);
	//print_r($b);
	foreach($b as $bv){
		$img[]=$bv;
	}
	echo '<tr>';
	foreach($img as $v){
		echo '<td><img src="'.$v.'">'.$v.'</td>';
	}
	echo '</tr>'.PHP_EOL;
}
/*
<tr><td><img src=""></td><td></td><td></td></tr>*/
?>
</table>