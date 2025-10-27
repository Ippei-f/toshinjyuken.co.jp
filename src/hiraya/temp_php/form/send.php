<?php
//<meta charset="utf-8">

function SEND_WORD($k,$v){
	$str='';
	if(is_numeric($k)){$k='other';}//キーが数値の時はその他に属する
	switch($k){
		case '名前漢字':
		case '名前フリ':
		$add=array();
		foreach($v as $k2 => $v2){
			if(empty($_REQUEST[$v2])){$_REQUEST[$v2]='';}
			$add[]=$_REQUEST[$v2];
		}
		$add = implode(" ",$add);
		$str=SEND_WORD_TITLE($v[0]).$add.chr(10);
		break;
		case '住所':
		if(empty($_REQUEST[$v[1].'_set'])){$_REQUEST[$v[1].'_set']='';}
		if(empty($_REQUEST[$v[3]])){$_REQUEST[$v[3]]='';}
		if(empty($_REQUEST[$v[4]])){$_REQUEST[$v[4]]='';}
		$str=SEND_WORD_TITLE($k)."
〒 ".$_REQUEST[$v[1].'_set']."
".$_REQUEST[$v[3]].$_REQUEST[$v[4]].chr(10);
		break;
		case 'ご希望学区':
		if(empty($_REQUEST[$v[1]])){$_REQUEST[$v[1]]='';}
		$str=SEND_WORD_TITLE($v[0]).$_REQUEST[$v[1]].chr(10);
		/*
		if(empty($_REQUEST[$v[1]])){$_REQUEST[$v[1]]='';}
		if(empty($_REQUEST[$v[2]])){$_REQUEST[$v[2]]='';}
		$str=SEND_WORD_TITLE($v[0]).chr(10).'小学校 … '.$_REQUEST[$v[1]].chr(10).'中学校 … '.$_REQUEST[$v[2]].chr(10);
		*/
		break;
		case 'メール':
		if(empty($_REQUEST[$v[1]])){$_REQUEST[$v[1]]='';}
		$str=SEND_WORD_TITLE($v[0]).$_REQUEST[$v[1]].chr(10);
		break;
		case '問合物件名':
		case '物件名':
		if(empty($_REQUEST[$v[1].'1'])){$_REQUEST[$v[1].'1']='';}
		if(empty($_REQUEST[$v[1].'2'])){$_REQUEST[$v[1].'2']='';}
		$str=SEND_WORD_TITLE($v[0]).$_REQUEST[$v[1].'1'].' '.$_REQUEST[$v[1].'2'].chr(10);
		break;
		case '電話番号':
		case '職業':
		case '職業-配偶者':
		case '問合内容CB':
		case '来場予約':
		case 'ご予算':
		case '購入予定時期':
		case 'ご希望のお住まい':
		case '土地':
		case '希望内容':
		//--- 以下 特殊枠 ---
		case 'アンケートに答える':
		case '事前アンケート':
		case '検討開始時期':
		case 'ご本人様実家':
		case '配偶者様実家':
		case '現在のお住まい':
		case '返済中のローン':
		case 'お気軽試算計画表':
		case 'アンケート来訪時':
		if(empty($_REQUEST[$v[1].'_set'])){$_REQUEST[$v[1].'_set']='';}
		$str=SEND_WORD_TITLE($v[0]).$_REQUEST[$v[1].'_set'].chr(10);
		/*
		if (isset($_REQUEST[$val[1]]) && is_array($_REQUEST[$val[1]])){$con = implode("、",$_REQUEST[$val[1]]);}
		$str=SEND_WORD_TITLE($val[0]).$con.chr(10);
		*/
		break;
		case '希望見学日':
		if($_REQUEST['yoyaku_set']!='予約しない'){
		$str=SEND_WORD_TITLE($v[0]);
		/*
		if(empty($_REQUEST[$v[1].'_set'])){$_REQUEST[$v[1].'_set']=''.chr(10);}
		$str.=$_REQUEST[$v[1].'_set'];
		*/
		if(empty($_REQUEST[$v[1].'_date'])){$_REQUEST[$v[1].'_date']='';}
		$str.=$_REQUEST[$v[1].'_date'].chr(10);
		}
		break;
		case 'ご希望エリア':
		for($i=0;$i<3;$i++){
			if(empty($_REQUEST[$v[1].'-'.$i])){$_REQUEST[$v[1].'-'.$i]='';}
		}		
		$str=SEND_WORD_TITLE($v[0])
.(($_REQUEST[$v[1].'-0']!='')?chr(10).'第一希望：'.$_REQUEST[$v[1].'-0']:'')
.(($_REQUEST[$v[1].'-1']!='')?chr(10).'第二希望：'.$_REQUEST[$v[1].'-1']:'')
.(($_REQUEST[$v[1].'-2']!='')?chr(10).'第三希望：'.$_REQUEST[$v[1].'-2']:'')
.chr(10);
		/*
		if(empty($_REQUEST[$v[1].'_set'])){$_REQUEST[$v[1].'_set']='';}
		$str=SEND_WORD_TITLE($v[0]).chr(10).$_REQUEST[$v[1].'_set'].chr(10);
		*/
		break;
		case '内容':
		case 'アンケートその他':
		if(empty($_REQUEST[$v[1]])){$_REQUEST[$v[1]]='';}
		$str=SEND_WORD_TITLE($v[0]).chr(10).$_REQUEST[$v[1]].chr(10);
		break;
		case 'ご入居予定人数':
		for($i=0;$i<=1;$i++){
			if(empty($_REQUEST[$v[1].'-'.$i])){$_REQUEST[$v[1].'-'.$i]='';}
		}		
		$str=SEND_WORD_TITLE($v[0])
.(($_REQUEST[$v[1].'-0']>0)?chr(10).'大人：'.$_REQUEST[$v[1].'-0'].'人':'')
.(($_REQUEST[$v[1].'-1']>0)?chr(10).'子供：'.$_REQUEST[$v[1].'-1'].'人':'')
.chr(10);
		break;
		case '入居予定の家族構成':
		for($i=0;$i<=6;$i++){
			if(empty($_REQUEST[$v[1].'-'.$i])){$_REQUEST[$v[1].'-'.$i]='';}
		}		
		$str=SEND_WORD_TITLE($v[0]).chr(10).$_REQUEST[$v[1].'-0'].'名'
.(($_REQUEST[$v[1].'-1']!='')?chr(10).'配偶者様：'.$_REQUEST[$v[1].'-1'].'歳':'')
.(($_REQUEST[$v[1].'-2']!='')?chr(10).'　お子様：'.$_REQUEST[$v[1].'-2'].'歳':'')
.(($_REQUEST[$v[1].'-3']!='')?chr(10).'　お子様：'.$_REQUEST[$v[1].'-3'].'歳':'')
.(($_REQUEST[$v[1].'-4']!='')?chr(10).'　お子様：'.$_REQUEST[$v[1].'-4'].'歳':'')
.(($_REQUEST[$v[1].'-5']!='')?chr(10).'ご両親様：'.$_REQUEST[$v[1].'-5'].'歳':'')
.(($_REQUEST[$v[1].'-6']!='')?chr(10).'ご両親様：'.$_REQUEST[$v[1].'-6'].'歳':'')
.chr(10);
		break;
		case '自己資金':
		if(empty($_REQUEST[$v[1]])){$_REQUEST[$v[1]]='';}
		$str=SEND_WORD_TITLE($v[0]).$_REQUEST[$v[1]].'万円位'.chr(10);
		break;
	}
	return $str;
}
function SEND_WORD_TITLE($t){
	return  chr(10)."●".str_replace(array('*','＊'),'',$t)."：";
}
?>

