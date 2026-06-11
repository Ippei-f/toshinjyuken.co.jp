<?php
//<meta charset="utf-8">

//フォームのセット・2023年度追加分
$csa_k = ''; //共通配列用キー
$form_arr = array(
	'' //空白
	//=======================
	,
	'お問い合わせの項目' => array('*', 'koumoku', 'select' => array(
		'見学予約をする',
		'資料をもらう',
		array('その他', 'x', 'no_text' => true)
	), 'type' => 'check')
	//=======================
	,
	'div=>acobox" n="1,2' //----------
	,
	'お問い合わせ物件名 1' => array('お問い合わせ物件名*', 'toi_bukken1_', 'select1' => array(), 'select2' => array(), 'type' => 'bukken'),
	'/div' //----------
	//=======================
	,
	'名前漢字' => array('お名前（漢字）*', '姓'	 => 'name_k1', '名'	=> 'name_k2', 'type' => 'name')
	//,'名前フリ'=>array('お名前（フリガナ）*','セイ'=>'name_f1','メイ'=>'name_f2','type'=>'name')
	//=======================
	,
	'div=>acobox" n="1' //----------
	,
	'家族構成' => array('家族構成*', 'kazoku_otona', 'kazoku_kodomo', 'type' => 'kazoku_select'),
	'/div' //----------
	//=======================
	,
	'div=>acobox" n="2' //----------
	,
	'住所' => array('*', 'pos1', 'pos2', 'addr1', 'addr2'),
	'/div' //----------
	//=======================
	,
	'メール' => array('メールアドレス*', 'mail') //,'mail_c'
	//,'hr'//----------
	//=======================
	,
	'電話番号' => array('お電話番号', 'tel1', 'tel2', 'tel3', 'type' => 'tel')
	//----------
	//,''=>array('---*'	,'')
	//=======================
	,
	'div=>acobox" n="1' //----------
	,
	'希望見学日' => array('ご希望見学日*', 'kengakubi', 'caution' => WORD_BR('※ご来場希望日はお申し込みの24時間後以降のお時間でご予約ください。
※ご予約のキャンセルについては前日までにTELもしくはこちらのフォームよりお願いいたします。
※建物完成前のプロジェクトをお選びいただいた場合には、近隣の類似モデルハウスおよびご希望に応じて現地をご案内させていただきます。'), 'type' => 'date'),
	'/div' //----------
	//=======================
	,
	'内容' => array('その他の質問', 'msg', 'type' => 'textarea', 'placeholder' => '参考例：
・同じエリアで他の物件も見学できますか？
・シングルマザーですが、ローン審査が不安です。
・子どもの通学や治安等、周辺について教えて下さい。
・オンラインでの相談希望です。　等'),
	'hr' //----------
	//=======================
	,
	'同意' => array(
		'「個人情報保護方針」への同意*',
		'doui',
		'select' => array('同意する'),
		'caution' => '※下記をお読みいただき、個人情報の取扱いについてご確認ください。'
	)
	//----------
	//,''=>array('---*'	,'')
);
unset($form_arr[0]);

//フォームのセット・アンケート
/*
$form_anke_name='ご来場前アンケート';
$form_arr+=array
(($k++)=>'gray-s'//------
,($k++)=>'div=>acobox aco_'.$str//----------
,$form_anke_name=>array('物件を知ったキッカケ','anke_jizen','select'=>$form_common_select_arr['アンケート・キッカケ'],'type'=>'anke_first')
,($k++)=>'hr'//----------
,$csa_k='検討開始時期'=>array('*','anke_kentou','select1'=>$form_common_select_arr[$csa_k],'type'=>'select')
,($k++)=>'hr'//----------
,'ご入居予定人数'=>array('*','nyuukyo1','nyuukyo2')
,($k++)=>'hr'//----------
,$csa_k='職業'=>array('ご職業*','job','select'=>$form_common_select_arr[$csa_k],'type'=>'radio')
,($k++)=>'hr'//----------
,'ご本人様実家'=>array('*','jikka_1','type'=>'jikka')
,($k++)=>'hr'//----------
,'配偶者様実家'=>array('','jikka_2','type'=>'jikka')
,($k++)=>'hr'//----------
,$csa_k='現在のお住まい'=>array('*','now_osumai','select'=>$form_common_select_arr[$csa_k],'type'=>'radio')
,($k++)=>'hr'//----------
,'入居予定の家族構成'=>array('*','family')
,($k++)=>'hr'//----------
,'自己資金'=>array('*','money')
,($k++)=>'hr'//----------
,$csa_k='返済中のローン'=>array('*','loan','select1'=>$form_common_select_arr[$csa_k],'type'=>'select')
,($k++)=>'hr'//----------
,'お気軽試算計画表'=>array('','okigaru','select'=>array('お気軽試算計画表をもらう（※アンケート内容より当日書面にてお渡しします）'))
,($k++)=>'hr'//----------
,$csa_k='アンケート来訪時'=>array('来訪時に聞きたいこと','anke_kikitai','select'=>$form_common_select_arr[$csa_k],'type'=>'check')
,($k++)=>'H=>2em'//----------
,($k++)=>'/div'//----------
,($k++)=>'gray-e'//------
);
*/

//もう使わない
unset($form_common_select_arr);
unset($csa_k);

//送信時の除外項目削除(2025/05/12追加
switch (true) {
	case ($_REQUEST['sm_send'] != ''):
	case ($_REQUEST['sm_direct'] != ''):
		$check = is_array($_REQUEST['koumoku']) ? implode(',', $_REQUEST['koumoku']) : $_REQUEST['koumoku'];
		if (strpos($check, '見学') === false) {
			unset($form_arr['希望見学日']);
			unset($form_arr['家族構成']);
		}
		if (strpos($check, '資料') === false) {
			unset($form_arr['住所']);
		}
		/*
	foreach($form_arr as $k => $v){
		if(!isset($_REQUEST[$v[1]])){
			unset($form_arr[$k]);
		}
	}
	*/
}
/*
switch(true){
	case ($_REQUEST['sm_send']!=''):
	case ($_REQUEST['sm_direct']!=''):
	case ($_REQUEST['sm_conf']!=''):
	$form_arr=$form_arr_2023+$form_arr;
}
*/

/*
if($democheck=='showa'){
	//デモはミラーから↓の送信先に変更
	$comp_data['MAIL']=array
('maasa-katou@toshinjyuken.co.jp'
,'oowan@printer.co.jp'
);
}
*/
