<?php
//<meta charset="utf-8">
function KEY_CONV($k){
	//一部の文字はキーに使えないので変換
	$k=str_replace(' ','_',$k);
	return $k;
}
function FORM_INPUT($k,$type='',$prm=array()){
	global $set_data;
	if($type==''){$type='text';}
	if(!isset($prm['name'])){$prm['name']=$k;}
	if(strpos($prm['name'],'[]')!==false){
		$prm['name2']=str_replace('[]','',$prm['name']);
		$prm['name']=str_replace('[]','['.$k.']',$prm['name']);
	}
	if(!isset($prm['value'])){$prm['value']='';}
	if($prm['value']==''){
		switch(true){
			case isset($prm['name2']):
			$prm['name-kv']=KEY_CONV($prm['name2']);
			break;
			default:
			$prm['name-kv']=KEY_CONV($prm['name']);
		}
		if(isset($set_data[$prm['name-kv']])){
			$prm['value']=$set_data[$prm['name-kv']];
		}
		//print_r($prm);
	}
	if(is_array($prm['value'])&&isset($prm['value'][$k])){
		//配列型の場合はその配列内のデータを参照する（2025/07/07
		$prm['value']=$prm['value'][$k];
	}
	$prm['other']=isset($prm['other'])?' '.$prm['other']:'';
	$dt=isset($prm['dt'])?'<br>'.$prm['dt']:'';
	$dd='';
	switch($type){
		case 'textarea':
		$dd='<textarea name="'.$prm['name'].'"'.$prm['other'].'>'.$prm['value'].'</textarea>';
		break;
		case 'editor':
		$dd='<div class="editor">
<div class="menu">
<select class="tag_select">
<option value="">※ メニュー ※</option>
<option value="h2">見出し(h2)</option>
<option value="h3">見出し(h3)</option>
<option value="h4">見出し(h4)</option>
<option value="b">太字</option>
<option value="font">色のみ</option>
<option>リンク</option>
<option>画像タグ</option>
</select>

<div class="c1_set"><div>
<font color="#FF0000"></font>
<font color="#FFFF00"></font>
<font color="#00FF00"></font>
<font color="#00FFFF"></font>
<font color="#0000FF"></font>
<font color="#FF00FF"></font>
<input type="color" class="c1">
</div></div>

<div class="n1_set"><div>
<font n="12"><span>小</span></font>
<font n="16"><span>中</span></font>
<font n="20"><span>大</span></font>
<font n=""><span></span></font>
<input type="number" class="n1">
<span>px</span>
</div></div>

<input type="text" class="t1">

<div class="n2_set"><div>
<font><span>←</span></font>
<span>画像番号</span>
<input type="number" class="n2" min="1" max="10">
</div></div>


<input type="text" class="t2">

<select class="s1">
<option value="">揃え指定無し</option>
<option value="left">左揃え</option>
<option value="center">中央揃え</option>
<option value="right">右揃え</option>
<option value="justyfy">左～両端揃え</option>
</select>


<input type="button" value="▼ 最後尾に挿入">
</div>
<div class="edit">
<textarea name="'.$prm['name'].'"'.$prm['other'].' placeholder="ここにテキストやHTMLタグを入力">'.$prm['value'].'</textarea>
<div class="preview"></div>
</div>
</div>';
		break;
		case 'radio':
		global $cms_param;
		$dd='<div class="check_set">'.PHP_EOL;
		if(isset($cms_param[$k])){
			$def=isset($prm['def'])?$prm['def']:1;
			$def=isset($set_data[$prm['name']])?$set_data[$prm['name']]:$def;
			foreach($cms_param[$k] as $pk => $pv){
				$add=($pk==$def)?' checked':'';
				$dd.='<label><input type="radio" name="'.$prm['name'].'" value="'.$pk.'"'.$add.'>'.$pv[0].'</label>'.PHP_EOL;
			}
		}
		$dd.='</div>';
		break;
		default:
		if(($prm['value']=='')&&isset($prm['def'])){
			$prm['value']=$prm['def'];
		}
		$dd='<input type="'.$type.'" name="'.$prm['name'].'" value="'.$prm['value'].'"'.$prm['other'].'>'.PHP_EOL;
	}
	if(isset($prm['text'])){$dd.=$prm['text'];}
	echo '<dl><dt>'.$k.$dt.'</dt><dd>'.$dd.'</dd></dl>'.PHP_EOL;
}
function FORM_FILE($fn,$max=1){
	global $set_data;
	$dir='upload/';
	$a=glob($dir.'id'.sprintf('%03d',$set_data['ID']).'-'.$fn.'*');
	echo '<ul class="file_set">'.PHP_EOL;
	for($i=0;$i<$max;$i++){
		$img=array();
		$img['value']='';
		if(!empty($a[$i])){
			$img['value']=file_exists($a[$i])?$a[$i]:'';
		}
		$img['img']='';
		switch(true){
			case strpos($img['value'],'.pdf')!==false:
			$img['img']='<a href="'.$img['value'].'" target="_blank"><img src="../assets/icon/icon-pdf.png"></a>';
			break;
			case !empty($img['value']):
			$img['img']='<img src="'.$img['value'].'">';
			break;
		}
		$img['del']=($img['value']!='')?'<input type="button" value="削除">':'';
		echo '<li><div class="thumb">'.$img['img'].'</div><input type="file" name="'.$fn.'[]"><input type="hidden" name="file['.$fn.'][]" value="'.$img['value'].'">'.$img['del'].'</li>'.PHP_EOL;
	}
	echo '</ul>';
/*
<ul class="file_set">
<li><div class="img"></div><input type="file" name="photo[]"><input type="hidden" name="file[photo][]" value=""></li>
<li><div class="img"></div><input type="file" name="photo[]"><input type="hidden" name="file[photo][]" value=""></li>
</ul>
*/

}
?>