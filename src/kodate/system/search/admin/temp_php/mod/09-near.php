<?php
//<meta charset="utf-8">
?>
<table class="borderTable01">
<tr>
	<th>周辺の物件</th>
	<td><div class="padbox near"><textarea name="data[near_text][]" class="dpIB" style="vertical-align: bottom;" rows="10" cols="40" placeholder="ID:1/名古屋市〇〇"><?php echo COMMENT_SET(16); ?></textarea>
	<span class="dpIB" style="vertical-align: bottom;">
	<select class="near_select" style="height:2em;">
	<option value="">--- 未選択 ---</option>
<?php
/*
require 'temp_php/mod/09b-near-db.php';
$local_sort=array();
$keta=sprintf('%02d',strlen(count($sysdata_proto)));
foreach($sysdata_proto as $key => $sysdata){
	if($sysdata[7]!=1){continue;}
	if($resDataArr[0]==$sysdata[0]){continue;}//同一物件も除外
	$sysdata[13]=explode('＜＞',$sysdata[13]);
	$add='';
	$key=sprintf('%'.$keta.'d',$key);
	$res=KINRIN_DISTANCE($commentArr[13][0],$sysdata[13][0],$commentArr[13][1],$sysdata[13][1]);
	switch(true){
		case ($res['判定']<1):
		$key='B'.$key;
		break;
		default:
		$key='A'.sprintf('%08d',$res['距離:m']).'-'.$key;//距離計算可
		$add='（'.($res['距離:m']/1000).'km）';
	}
	$local_sort[$key]=array('ID:'.$sysdata[0].'/'.$sysdata[2],$add);
}
ksort($local_sort);
foreach($local_sort as $v){
	echo '<option value="'.$v[0].'">'.implode('',$v).'</option>'.chr(10);
}
*/
$getFormatDataArr = getLines2DspData($file_path,$img_updir,$config,'','',true);
foreach($getFormatDataArr as $key => $sysdata){
	echo '<option>ID:'.$sysdata['id'].'/'.$sysdata['title'].'</option>'.chr(10);
}
?>
	</select>
	<div class="addbtn" style=" margin-top: 0;"><input class="near_addbtn" type="button" onclick="return false;" value="← 挿入" style="margin-bottom: 0;"/></div>
	</span></div>
	<div style="padding-top:0.5em; font-size:90%;">※登録済みの物件を右側のセレクトフォームから選択し、挿入を押すことで<br>
　スライダーに周辺の物件を追加することができます。</div></td>
</tr>
</table>
<script type="text/javascript">
$(window).load(function () {
	$(".near_addbtn").click(function(){
		var near_t='.padbox.near textarea';
		var near_tv=$(near_t).val();
		var near_sv=$('.near_select').val();
		var add='';
		if(near_sv!=''){
			if(near_tv!=''){add='\n';}
			$(near_t).val(near_tv+add+near_sv);
		}
	});
});
</script>
<?php
function KINRIN_DISTANCE($i1,$i2,$k1,$k2){
/*
		$i1,$i2:緯度
		$k1,$k2:経度
*/
	$res=$prm=array();//計算結果保存用（$resは返り値として使用）
	//$prm['引数']=implode('/',array($i1,$i2,$k1,$k2));
	$res['判定']=($i1!='')&($i2!='')&($k1!='')&($k2!='');
	if($res['判定']){
		//固定数値
		/*
		$prm['地球離心率']=0.0818191910428157;//地球の離心率（0<e<1 楕円）
		$prm['地球赤道半径']=6378137;//単位：m、赤道半径=地球の長半径
		$prm['地球極半径']=$prm['地球赤道半径']*(1-pow($prm['地球離心率'],2));//単位：m、極半径=地球の短半径
		*/
		//計算可能判定であれば距離を求める
		$prm['緯度平均rad']=deg2rad(($i1+$i2)/2);
		$prm['緯度差rad']=deg2rad($i1-$i2);
		$prm['経度差rad']=deg2rad($k1-$k2);
		$prm['曲率']=1-0.00669438*pow(sin($prm['緯度平均rad']),2);//緯度平均ラジアンの値を使用
		//e^2（離心率eの2乗算）=0.00669438
		$prm['子午線曲率半径']=6335439.327/sqrt(pow($prm['曲率'],3));//子午線曲率半径
		//地球極半径=地球の赤道半径*(1-e^2)
		$prm['卯酉線曲率半径']=6378137/sqrt($prm['曲率']);//卯酉線曲率半径
		//地球の赤道半径=6378137m
		$prm['距離']=pow($prm['子午線曲率半径']*$prm['緯度差rad'],2)+pow($prm['卯酉線曲率半径']*cos($prm['緯度平均rad'])*$prm['経度差rad'],2);
		$prm['距離']=sqrt($prm['距離']);
		$res['距離:m']=round($prm['距離']);
	}
	/*
	echo '<!-- ';
	print_r($prm);
	echo ' -->';
	*/
	return $res;
}
?>