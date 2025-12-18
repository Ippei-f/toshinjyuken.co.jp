<?php
//<meta charset="utf-8">
$commentArr=$cnum=$pnum=array();
if(!empty($resDataArr)){
//------------------------------
foreach($resDataArr as $k => $v){
	if(array_search($dbDataStructure[$k],$comment_name_arr)!==false){
		$cnum[$k]=0;
		$commentArr[$k] = explode($dataSeparateStr,$v);
		$commentArr[$k] = brToBrcode($commentArr[$k]);
		$commentArr[$k] = TextToKanma($commentArr[$k]);
	}
	else{
		$resDataArr[$k] = TextToKanma($v);
	}	
}
foreach($upfile_arr as $v){
	$pnum[$v]=0;
}

//画像サイズ変更タグ配列作成
$upsizeArr1='';
$a=$commentArr[10];
unset($a[0]);
foreach($a as $v){
	$upsizeArr1.=$v;
}
$upsizeArr1=explode('x',$upsizeArr1);
//------------------------------
$upfileTag=$upFilePath=array();
foreach($upfile_arr as $k){
	for($i=0;$i<=$maxCommentCount;$i++){
		//ファイル存在判定と存在したらセット
		foreach($extensionList as $val){
			$upFilePath['L'] = $img_updir.'/'.$k.$resDataArr[0].'-'.$i.'.'.$val;
			$upFilePath['S'] = $img_updir.'/'.$k.$resDataArr[0].'-'.$i.'s.'.$val;
			if(file_exists($upFilePath['L'])){
				if($val == 'jpg' || $val == 'png' || $val == 'gif'){
					$img=(file_exists($upFilePath['S']))?$upFilePath['S']:$upFilePath['L'];
					if($type_edit){
						$upfileTag[$k][$i] = '<img src="'.$img.'?'.uniqid().'" style="width:100px;">'.chr(10);
					}
					else{
						$upfileTag[$k][$i] = '<img src="'.$img.'?'.uniqid().'" style="max-width:100%;">'.chr(10);
					}
				}else{
					$upfileTag[$k][$i] = "<a href=\"{$upFilePath}\" target=\"_blank\">アップファイル</a>\n";
				}
				if($type_edit){
					$upfileTag[$k][$i] = /*"<br /><br />現在のファイル<br />".*/$upfileTag[$k][$i];
					$upfileTag[$k][$i] .= '<br /><span id="'.$k.'_del'.($i + 1).'"><input type="checkbox" name="'.$k.'_del[]" value="'.$upFilePath['L'].'" /></span> 削除';
					$upFilePath[$k][$i]=$upFilePath['L'];
				}
				break;
			}
		}
	}
}
//------------------------------
}
else{
	$resDataArr=array();
}

function IMG_THUMB($k1){
	global $upfileTag,$upFilePath,$pnum,$type_edit;
	$str='';
	$k2=$pnum[$k1];
	if($type_edit){
		if(!empty($_GET['id'])){
			if($upfileTag[$k1][$k2]!=''){
				$str.='<span class="dpIB label">'.$upfileTag[$k1][$k2].'</span>';
			}
			$str.='<input type="hidden" name="'.$k1.'_name[]" value="'.$upFilePath[$k1][$k2].'" />';
		}
		$str.='<input type="file" name="data['.$k1.'][]" />';//ファイルアップ用のフォーム
		$str.='<input type="hidden" class="delname" value="'.$k1.'_del">';//枠削除後の配列名
	}
	else{
		//確認画面用
		$str='<span class="dpIB label pic">'.$upfileTag[$k1][$k2].'</span>';
	}
	$pnum[$k1]++;
	return $str;
}
function FILEFORM_TEMP($k){
	return '<input type="hidden" name="'.$k.'_name[]" value=""><input type="file" name="data['.$k.'][]" />';
}
function FILEFORM_REMAKE($k,$a){
	$a['form']=str_replace('<input type="hidden" name="'.$k.'_name[]" value="">','',$a['form']);
	$a['form']=str_replace('<input type="file" name="data['.$k.'][]" />',IMG_THUMB($k),$a['form']);
	return $a;
}

function COMMENT_SET($k,$f=''){
	global $commentArr,$cnum,$type_edit;
	$str=$commentArr[$k][$cnum[$k]++];
	if(!$type_edit){
		$str=str_replace(chr(10),'<br>',$str);
	}
	if($f=='edit'){
		$str=str_replace(chr(10),'<br>',$str);
	}
	return $str;
}

function CHECKBOX_ONOFF($k){
	global $dbDataStructure,$commentArr,$cnum;
	$k2=$cnum[$k];
	$n='data['.$dbDataStructure[$k].']['.$k2.']';
	$c='';
	if($commentArr[$k][$k2]>0){
		$c=' checked="checked"';
	}
	$cnum[$k]++;
	return '<input type="hidden" name="'.$n.'" value="0" /><input type="checkbox" name="'.$n.'" value="1"'.$c.' style="vertical-align: bottom;"/>';
}

function SELECTBOX_SET($num,$arr,$flag=false){
	global $dbDataStructure,$commentArr,$cnum;
	$num2=($flag?$cnum[$num]++:'');
	$n='data['.$dbDataStructure[$num].'][]';	
	$str='<select name="'.$n.'" class="dpIB" style="height:2em; font-size:80%; margin-left:0.5em; vertical-align: 1px;">';
	foreach($arr as $v){
		$select='';
		if($num2!==''){
			$selected=($v==$commentArr[$num][$num2]?' selected="selected"':'');
		}
		$str.='<option'.$selected.'>'.$v.'</option>'.chr(10);
	}
	$str.='</select>';//<!-- '.$num2.':'.$commentArr[$num][$num2].' -->
	return $str;
}

function MAKE_INPUT($a){	
	if($a['class']!=''){$a['class']=' class="'.$a['class'].'"';}
	if($a['select_num']!=''){
		$select=str_replace(chr(10),'',SELECTBOX_SET($a['select_num'],$a['select_list']));
		$a['form']=str_replace('[select]',$select,$a['form']);
	}
	return '<div'.$a['class'].'>'.$a['form'].MAKE_BTN('del','削除').'</div>';
}
function MAKE_BTN($c,$v){
	$add='';
	if($v=='削除'){
		$add='DEL_FORM(this);';
	}
	return '<input type="button" class="'.$c.'" onclick="'.$add.'return false;" value="'.$v.'"/>';
}
function ADDBTN($a){
	$btn='';
	foreach($a as $k => $v){
		$btn.=MAKE_BTN($k,$v['btn']);
	}
	return '<div class="addbtn">'.$btn.'</div>';
}
function ADDBTN_JQ($a){
	$jq='';
	foreach($a as $k => $v){
		$jq.='$(".addbtn .'.$k.'").click(function(){
		$(this).parent().parent().children(\'.padbox\').append(\''.MAKE_INPUT($v).'\');
		cleditorExe();
	});'.chr(10);
	}
	return '<script type="text/javascript">
$(window).load(function(){
'.$jq.'
});
</script>'.chr(10);
}
?>