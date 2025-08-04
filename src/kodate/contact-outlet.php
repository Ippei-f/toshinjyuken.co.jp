<?php
$p_type='content';
$kaisou='';
$dir=$kaisou.'images/content/xxxx/';
$p_title='お問い合わせ-アウトレット';
require $kaisou."temp_php/basic.php";

//フォームのセット
$form_arr=array
('hr'//----------
,'希望内容'=>array('ご希望内容*','kibou_cb','select'=>array
																						('無人対応モデルルーム見学予約'
																						,'購入申し込み'
																						)
																					,'caution'=>'<div class="font_bold fontP130 LH100" style="color:#F63402;">★購入申し込みで仲介手数料50%OFF</div>'
																					)
,'hr'//----------
,'物件名'			 =>array('*','bukken','select1'=>array
																		('── 全体エリア ──'=>''
																		)
																		,'select2'=>array
																		('── 物件名 ──'=>''
																		)
																	)
,'div=>acobox aco1'//----------
,'希望見学日'	 =>array('ご希望見学日*','kengakubi','caution'=>'※ご来場希望日はお申し込みの24時間後以降のお時間でご予約ください。')
,'/div'//----------
,'hr'//----------
,'名前漢字'			=>array('お名前（漢字）*'		,'姓'	=>'name_k1','名'	 =>'name_k2')
,'名前フリ'			=>array('お名前（フリガナ）*','セイ'=>'name_f1','メイ'=>'name_f2')
,'hr'//----------
,'住所'					=>array('*','pos1','pos2','addr1','addr2')
,'hr'//----------
,'メール'			 =>array('メールアドレス*','mail','mail_c')
,'hr'//----------
,'電話番号'			=>array('お電話番号','tel1','tel2','tel3')
,'hr'//----------
,'職業'					=>array('ご職業','job'	,'select'=>array
																				('会社員'
																				,'公務員'
																				,'自営業'
																				,'その他'
																				))
,'hr'//----------
/*
,'問合内容CB'=>array('お問い合わせ内容','nai_cb'	,'select'=>array
																									('詳しい話が聞きたい'
																									,'資料が欲しい'
																									,'オンライン相談希望'
																									))
,'div=>acobox aco1'//----------
,'問合物件名'=>array('お問い合わせ物件名*','toi_bukken'	,'select1'=>array
																												('── 全体エリア ──'=>''
																												)
																												,'select2'=>array
																												('── 物件名 ──'=>''
																												)
																											)
,'/div'//----------
,'hr'//----------
,'来場予約'			=>array('現地ご来場予約','yoyaku','select'=>array('予約する'),'non'=>'予約しない'
								,'caution'=>'※ご来場予約に関して、東新住建ならびに販売会社BBホームの担当者よりご連絡差し上げます。')
,'div=>acobox aco2'//----------
,'物件名'			 =>array('*','bukken')
,'希望見学日'	 =>array('ご希望見学日*','kengakubi','caution'=>'※ご来場希望日はお申し込みの24時間後以降のお時間でご予約ください。')
,'アンケートに答える'=>array('','anke_kotaeru','select'=>array('アンケートに答える'),'non'=>'答えない')
,'/div'//----------
,'gray-s'//------
,'div=>acobox aco3'//----------
,'事前アンケート'=>array('物件を知ったキッカケ','anke_jizen','select'=>array
																									('新聞折込チラシ'
																									,'ポストインチラシ'
																									,'スーモ'
																									,'ホームズ'
																									,'アットホーム'
																									,'BBホームHP'
																									,'東新住建HP'
																									,'現地看板'
																									,'ダイレクトメール'
																									,array('知人の紹介','紹介者')
																									,'その他'
																									))
,'hr'//----------
,'検討開始時期'=>array('*','anke_kentou','select1'=>array('──'=>''
																									 			,'始めたばかり'
																									 			,'1ヶ月前から'
																									 			,'3ヶ月前から'
																									 			,'6ヶ月前から'
																									 			,'1年以上前から'
																												))
,'hr'//----------
,'ご本人様実家'			=>array('*','jikka_1')
,'hr'//----------
,'配偶者様実家'			=>array('','jikka_2')
,'hr'//----------
,'現在のお住まい'	=>array('*','now_osumai','select'=>array
																					 ('賃貸住宅'
																					 ,'分譲マンション'
																					 ,'社宅'
																					 ,'持家（本人）'
																					 ,'持家（家族）'
																					 ))
,'hr'//----------
,'入居予定の家族構成'=>array('','family')
,'hr'//----------
,'職業-配偶者'=>array('お勤め先（配偶者様）','job2','select'=>array
																									 ('会社員'
																									 ,'公務員'
																									 ,'自営業'
																									 ,'その他'
																									 ))
,'hr'//----------
,'自己資金'=>array('*','money')
,'hr'//----------
,'返済中のローン'=>array('*','loan','select1'=>array('──'=>''
																									 	,'なし'
																									 	,'マイカーローン有、カードローン有'
																									 	,'マイカーローン有'
																									 	,'カードローン有'
																										))
,'hr'//----------
,'お気軽試算計画表'=>array('','okigaru','select'=>array('お気軽試算計画表をもらう（※アンケート内容より当日書面にてお渡しします）'))
,'hr'//----------
,'アンケート来訪時'=>array('来訪時に聞きたいこと','anke_kikitai','select'=>array
																																('住宅ローン事前審査について'
																																,'耐震構造について'
																																,'太陽光発電について'
																																,'建物商品について'
																																))
//,'hr'//----------
//,'アンケートその他'=>array('その他ご質問','anke_sonota')
,'H=>2em'//----------
,'/div'//----------
,'gray-e'//------
*/
,'内容'					=>array('お問い合わせ内容'	,'msg')
,'hr'//----------
,'同意'					=>array('「個人情報保護方針」への同意*'	,'doui','select'=>array('同意する')
								,'caution'=>'※下記をお読みいただき、個人情報の取扱いについてご確認ください。')
//----------
//,''							=>array('---*'	,'')
);

//$_GET配列・PHP7.0対応
$get_arr=$_GET;
if($get_arr==''){$get_arr=array();}
if(empty($get_arr['id'])){$get_arr['id']='';}
if(empty($get_arr['btn'])){$get_arr['btn']='';}
if(empty($get_arr['send'])){$get_arr['send']='';}
if(empty($get_arr['input'])){$get_arr['input']='';}

//共通セレクト項目
$area1=$area2=array();
$cnt=1;
$arr=array('select1','select2');
foreach($area_list as $k1 => $v1){
	$form_arr['物件名'][$arr[0]][]=$k1;
	$area1[$cnt]=$k1;
	$area2[$cnt]=$v1;
	$cnt++;
}

//メール定型文
$sendtext_arr=array
('送信タイトル'=>'---'.$comp_data['HP名'].' WEB限定アウトレット無人対応見学・購入申し込み---'
,'返信タイトル'=>'WEB限定アウトレット無人対応見学・購入申し込みありがとうございます ---'.$comp_data['HP名'].'---'
,'返信下追加文'=>''
 /*
 ※ご来場予約の事前アンケートにお答えいただいた方には、
　会場にてQUOカード1,000円分をお渡しします。
 */
,'サンクスURL' =>''
);

require $kaisou."temp_php/form/form.php";

//CMS読み込み
$jq_bukkenlist=$jq_bukkenlist_all=array();
$dir_sys= $kaisou.'system/search/';
require $dir_sys.'function/cms-load.php';//軽量版
foreach($sysdata_proto as $key => $sysdata){
	if(CMS_OPEN()){continue;}
	
	//ここではアウトレットに１つでもチェックされている区画のある物件のみ選択できるようにする
	//print_r('/'.$sysdata[20]);
	if(strpos($sysdata[20],'1')===false){
		continue;
	}
	
	CMS_DATA_REPLACE();
	$form_arr['物件名'][$arr[1]][]=$sysdata[2];
	$jq_bukkenlist[$area1[$sysdata[17]]][]=$sysdata[2];
	for($i=0;$i<count($sysdata[9]);$i+=4){
		$sysdata[9][$i]=WORD_SPACEDEL($sysdata[9][$i]);
		//$form_arr['物件名'][$arr[2]][]=$sysdata[9][$i];
	}
	if(($step<3)&&($get_arr['id']==$sysdata[0])){
		$_REQUEST[$form_arr['物件名'][1].'1']=$area1[$sysdata[17]];
		$_REQUEST[$form_arr['物件名'][1].'2']=$sysdata[2];
		//$_REQUEST[$form_arr['物件名'][1].'3']=$get_arr['type'];
	}
}
//$form_arr['物件名'][$arr[2]]=array_unique($form_arr['物件名'][$arr[2]]);//重複削除
asort($form_arr['物件名'][$arr[1]]);//昇順
foreach($jq_bukkenlist as $k => $v){
	asort($jq_bukkenlist[$k]);//昇順
}
$jq_bukkenlist_all=$form_arr['物件名'][$arr[1]];
/*
foreach($arr as $v){
	$form_arr['物件名'][$v]=$form_arr['問合物件名'][$v];
}

if($step<3){
	$flag=false;
	switch($get_arr['btn']){
		case 'yoyaku':
		$_REQUEST[$form_arr['来場予約'][1]]=array('予約する');
		$flag=true;
		break;
		case 'shiryou':
		$_REQUEST[$form_arr['問合内容CB'][1]]=array('資料が欲しい');
		$flag=true;
		break;
	}
	if($flag){
		//シンクロ
		$_REQUEST[$form_arr['物件名'][1].'1']=$_REQUEST[$form_arr['問合物件名'][1].'1'];
		$_REQUEST[$form_arr['物件名'][1].'2']=$_REQUEST[$form_arr['問合物件名'][1].'2'];
		//$_REQUEST[$form_arr['物件名'][1].'3']=$_REQUEST[$form_arr['問合物件名'][1].'3'];
	}
}
*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php echo $temp_meta; ?>
<title><?php echo $temp_title; ?></title>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/contact.css" rel="stylesheet" type="text/css">
<?php echo $temp_java; ?>
<style>
.bg_FFF_gray .content_box{
	min-height: 0;
}
.acobox.aco1{display: block;}
<?php
if($step==3){
	if(!empty($_REQUEST[$form_arr['問合内容CB'][1]])){
?>
.acobox.aco1{display: block;}
<?php
	}
	/*
	if($_REQUEST[$form_arr['来場予約'][1]][0]=='予約する'){
?>
.acobox.aco2{display: block;}
<?php
	}
	if($_REQUEST[$form_arr['アンケートに答える'][1]][0]=='アンケートに答える'){
?>
.acobox.aco3{display: block;}
<?php
	}
	*/
}
?>
</style>
<script>
$(window).load(function(){
	var objarr = new Array();
	objarr[0]=Array('input[name="kibou_cb"]','.acobox.aco1',Array('無人対応モデルルーム見学予約'));
	FORM_ACO(objarr[0],'show');
	$(objarr[0][0]).change(function(){
			FORM_ACO(objarr[0],'slide');
	});
	<?php
	$arr=array('物件名');
	foreach($arr as $k){
		$v=$form_arr[$k][1];
	?>
	$('select[name="<?php echo $v; ?>1"]').change(function(){
		v=$(this).val();
		FORM_BUKKEN_CHANGE('select[name="<?php echo $v; ?>2"]',v);
	});
	<?php
	}
	?>
});
function FORM_ACO(arr,type){
	var flag=false;
	$(arr[0]+':checked').each(function(i,e){
		if($.inArray($(e).val(),arr[2]) >= 0){
			flag=true;
		}
	});
	switch(type){
		case 'slide':
		if(flag){$(arr[1]).slideDown();}
		else{$(arr[1]).slideUp();}
		break;
		default:
		if(flag){$(arr[1]).show();}
	}
}
function FORM_BUKKEN_CHANGE(obj,v){
	$(obj).empty();
	str='<option value="">── 物件名 ──</option>';
	switch(v){
		<?php
		foreach($area1 as $k){
			$str='';
			echo "case '".$k."':".chr(10);
			if(empty($jq_bukkenlist[$k])){$jq_bukkenlist[$k]=array();}
			if(count($jq_bukkenlist[$k])>0){
				foreach($jq_bukkenlist[$k] as $v){
					$str.='<option>'.$v.'</option>';
				}
			}
			echo "str+='".$str."';";
			echo "break;".chr(10);
		}
		?>
		default:
		<?php
		$str='';
		foreach($jq_bukkenlist_all as $v){
			if(empty($v)){continue;}
			$str.='<option>'.$v.'</option>';
		}
		echo "str+='".$str."';";
		?>
	}
	$(obj).prepend(str);
	//$('.test').text(str);
}
</script>
<?php
/*

	objarr[1]=Array('input[name="yoyaku[]"]'			,'.acobox.aco2',Array('予約する'));
	objarr[2]=Array('input[name="anke_kotaeru[]"]','.acobox.aco3',Array('アンケートに答える'));
	
	FORM_ACO(objarr[1],'show');
	FORM_ACO(objarr[2],'show');
	$(objarr[1][0]).change(function(){
			FORM_ACO(objarr[1],'slide');
	});
	$(objarr[2][0]).change(function(){
			FORM_ACO(objarr[2],'slide');
	});

*/
?>
</head>

<body class="borderbox">
<?php echo $temp_pagetop; ?>
<div align="center">
<!-- * -->
<?php echo $temp_header; ?>
<!-- ** -->
<?php echo PAN(array($p_title)); ?>
<?php echo PAGE_TITLE($p_title/*,$comp_data['HP名']*/,'',array('class'=>'textC')); ?>
<!-- *** -->
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post" class="<?php echo ($step==3)?'conf':''; ?>">
<div class="content_box">
<div class="contact_box">
<?php
//<div class="test"></div>
//print_r($jq_bukkenlist);
?>
<?php
switch($step){
	case 4://送信完了
	echo FORM_STEP(3);
	echo '<div class="textC LH175 fontP150 sp_fontP140" style="padding-top:90px; padding-bottom:100px;">'.WORD_BR('お問い合わせ内容を送信しました。
ありがとうございました。').'</div>
<div class="textC">'.EFFECT_BTN('TOP','トップに戻る').'</div>'.chr(10);
	break;
	case 3://送信確認
	echo FORM_STEP(2);
	//echo FORM_CAUTION();
	echo FORM_HIDDEN();
	echo FORM_SET_MAKE();
	echo FORM_HIDDEN_ADD('page_back',$_SERVER["SCRIPT_NAME"],'');
	echo SUBMIT_SET(SUBMIT_BTN('sm_send','送信する').SUBMIT_BTN('sm_back','戻る'));
	break;
	default://入力
	echo FORM_STEP();
	echo FORM_CAUTION();
	echo FORM_SET_MAKE();
	require $kaisou."temp_php/temp_privacy.php";//プライバシーポリシーテンプレ呼び出し
	RECAPTCHA_CHECK();//recaptchaチェック表示
	echo SUBMIT_SET(SUBMIT_BTN('sm_conf','入力内容確認').SUBMIT_BTN('reset'));
}
?>
</div>
</div>
</form>
<div style="height:90px;"></div>
<!-- ** -->
<?php echo $temp_footer; ?>
<!-- * -->
</div>
<?php echo $temp_bodyend; ?>
</body>
</html>