<?php
//<meta charset="utf-8">
/*
		小分け関数
*/
function FORM_SET_MAKE_KOWAKE($k){
	global $form_arr,$hissu,$step;
	$v=$form_arr[$k];
	if(!is_numeric($k)){
		//項目関連
		$ttl=str_replace(array("＊","*"),',*',$v[0]);
		$ttl=explode(',',$ttl);
		if(!isset($ttl[1])){$ttl[1]='';}
		$hissu=$ttl[1];
		if(isset($v['type'])){
			$type=$v['type'];
			unset($v['type']);//タイプはもう使わない
		}
		else{$type=$k;}
		switch($type){
			//共通フォーム
			case 'name':
			case 'tel':
			case 'date':
			case 'textarea':
			case 'radio':
			case 'check':
			case 'select':
			case 'jikka':
			$str.=FORM_TITLE($ttl);
			$str.=FORM_PARTS($v,$type);
			$str.=FORM_INPUT_CAUTION($v);
			break;
			case 'bukken':
			$str.=FORM_TITLE($ttl);
			$str.=FORM_PARTS($v,'select',array('area-cnt'=>true));
			break;
			case 'メール':
			//ステップによって表示を変える
			$str.=FORM_TITLE(array($ttl[0].'（半角英数字）',$hissu));
			$str.=FORM_PARTS($v[1]);
			if(isset($v[2])&&$step<3){
				$str.=FORM_TITLE(array($ttl[0].'（確認用）（半角英数字）',$hissu));
				$str.=FORM_PARTS($v[2]);
			}
			break;
			case '同意':
			if($step<3){
				$str.=FORM_TITLE($ttl);
				$str.=FORM_PARTS($v,'check');
				$str.=FORM_INPUT_CAUTION($v);
			}	
			break;
		}
	}//if(!is_numeric($k))
	return $str;
}
function FORM_RADIO_KOWAKE($k,$n){
	global $form_arr;
	$hissu=strpos($form_arr[$k][0],'*')!==false?'*':'';
	$hissu_bu=$hissu;
	$str=$add=$class='';
	$name=$form_arr[$k][1];
	$v=$form_arr[$k]['select'][$n];
	if($hissu!=''){
		$class='required validate[required] '.$class;
		$class=str_replace(array("] ,"),',',$class);//特定の表記の時は合体させる
	}
	if($class!=''){
		$add.=' class="'.$class.'"';
	}
	$check=$textadd='';
	switch(true){
		case (!isset($_REQUEST[$name])):
		break;
		case ($v==$_REQUEST[$name]):
		$check=' checked';
		break;
	}
	if($v=='その他'){
		$hissu='';
		$textadd=FORM_TEXT($name.'_o');
		$hissu=$hissu_bu;
	}
	$str.='<div class="checkbox err_block"><input type="radio" name="'.$name.'" value="'.strip_tags($v).'"'.$check.$add.'>'.$v.$textadd.'</div>';
	return $str;
}
?>