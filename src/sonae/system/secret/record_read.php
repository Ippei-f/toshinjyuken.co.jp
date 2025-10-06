<?php
//<meta charset="utf-8">
/*
		$			大区切り
		&#36;	変換後の$
		@			中区切り
		&#64;	変換後の@
		=			小区切り
		&#61;	変換後の=
		,			見出し区切り
		&#44;	変換後の,
*/
$conv_text=array
('R'=>array('$','@','=',',')
,'W'=>array('&#36;','&#64;','&#61;','&#44;')
);
function RECORD_CONV_TEXT($t,$f='R'){
	global $conv_text;
	$a=($f=='W')?array('R','W'):array('W','R');
	//print_r($t);
	return str_replace($conv_text[$a[0]],$conv_text[$a[1]],$t);
}
function RECORD_R_DATA($fn){
	@chmod($fn,0666);//属性
	$fdata=file_get_contents($fn);//読み込み
	return mb_convert_encoding(trim($fdata),"UTF-8","auto");
}
function RECORD_R_LISTDATA($fdata,$id=''){
	$fdata=explode('$',trim($fdata));
	unset($fdata[0]);
	$t=array();
	foreach($fdata as $v){
		$v=explode('@',trim($v));
		if(is_numeric($id)){
			//ID指定
			if($v[0]!=$id){continue;}
			$t=$v;
			break;
		}
		//全取得
		switch($id){
			case 'ID'://IDキー
			$t[$v[0]]=$v;
			break;
			default://単純格納
			$t[]=$v;
		}
	}
	return RECORD_CONV_TEXT($t);
}
function RECORD_R_EDITDATA($fdata){
	$fdata=explode('@',$fdata);
	$t=array();
	foreach($fdata as $k => $v){
		if(strpos($v,'=')===false){
			//通常読み込み
			$v=explode(',',$v);
			$t[$v[0]]=RECORD_CONV_TEXT($v[1]);
		}
		else{
			//配列書き込み
			$t2=array();
			$v=explode('=',$v);
			$vk=$v[0];//大見出し
			unset($v[0]);			
			foreach($v as $vv){
				$vv=explode(',',$vv);
				$t2[$vv[0]]=RECORD_CONV_TEXT($vv[1]);
			}
			$t[$vk]=$t2;
		}
	}
	return $t;
}

/*
		↓公開ページ用
*/
function RECORD_TIMER_LIMIT($v){
	global $nowdate;
	$preview=isset($_POST['preview']);
	if(!$preview){
		//if(strpos($cms_param['状態'][$v[1]][0],'非')!==false){return true;}//非公開は除外
		if($v[1]==3){return true;}//非公開は除外
		$d='';
		switch(true){
			case !empty($v[4])://公開開始日時
			$d=$v[4];
			break;
			case !empty($v[2])://情報登録日
			$d=$v[2];
			break;
			case !empty($v[3])://情報更新日
			$d=$v[3];
			break;
		}
		if($d!=''){
			$d=date('YmdHi',strtotime($d));
			if($nowdate['YmdHi']<$d){return true;}//公開前
		}
		if(!empty($v[5])){
			$d=date('YmdHi',strtotime($v[5]));//公開終了日時
			if($nowdate['YmdHi']>=$d){return true;}//公開終了
		}
	}
	return false;
}
?>