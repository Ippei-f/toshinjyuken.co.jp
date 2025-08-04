<?php
//<meta charset="utf-8">
//ini_set('display_errors', "On");
//print_r($_SERVER);
//print_r($_REQUEST);
//exit;
//「SATROI」SATORI送信（cURL）2019.02.04 *+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+
if($_SERVER['SERVER_NAME'] == "localhost00"){
$c_url = 'http://localhost:88/json/index.php'; 
}else{
$c_url = 'https://api.satr.jp/api/v4/public/customer/upsert.json'; 
}
//電話・携帯判定
if(!preg_match('/(\d{3}-\d{4}-\d{4}|\d{11})/',$_REQUEST['tel1']."-".$_REQUEST['tel2']."-".$_REQUEST['tel3'])){
	$phone_number = $_REQUEST['tel1']."-".$_REQUEST['tel2']."-".$_REQUEST['tel3'];
}else{
	$mobile_phone_number = $_REQUEST['tel1']."-".$_REQUEST['tel2']."-".$_REQUEST['tel3'];
}

//その他メモに追加するもの
$kaiinn_memo = "";
$toiawase_memo = "";
switch($p_title){
	case '会員登録':
//		$kaiinn_memo ='【'.$p_title.' 追加分】'.chr(10).'↓'.chr(10).chr(10);
		//●ご入居予定人数
		$kaiinn_memo .= "●ご入居予定人数".chr(10)."大人：".$_REQUEST['nyuukyo1-0']."人".chr(10)."子供：".$_REQUEST['nyuukyo1-1']."人".chr(10);
		//●ご希望エリア
		$kaiinn_memo .= "●ご希望エリア：".$_REQUEST['kibouarea_set'].chr(10);
		$kaiinn_memo .= chr(10).$_REQUEST['msg'];
		break;
	case 'お問い合わせ':
//		$toiawase_memo ='【'.$p_title.' 追加分】'.chr(10).'↓'.chr(10).chr(10);
		//●ご入居予定人数
		$toiawase_memo .= "●ご入居予定人数".chr(10)."大人：".$_REQUEST['nyuukyo1-0']."人".chr(10)."子供：".$_REQUEST['nyuukyo1-1']."人".chr(10);
		//●ご職業：会社員[job_set]
		if($_REQUEST['job_set'] != ""){
			$toiawase_memo .= "●ご職業：".$_REQUEST['job_set'].chr(10);
		}
		//●お問い合わせ内容：-[nai_cb_set] 
		if(($_REQUEST['nai_cb_set'] != "")&&($_REQUEST['nai_cb_set'] != "-")){
			$toiawase_memo .= "●お問い合わせ内容：".$_REQUEST['nai_cb_set'].chr(10);
		}
		//●お問い合わせ物件名：尾張東エリア 小牧市東田中[toi_bukken_set]
		if(($_REQUEST['toi_bukken_set'] != "")&&($_REQUEST['toi_bukken_set'] != " ")){
			$toiawase_memo .= "●お問い合わせ物件名：".$_REQUEST['toi_bukken_set'].chr(10);
		}
/*
		//●現地ご来場予約：予約する[yoyaku_set]
		if($_REQUEST['yoyaku_set'] != ""){
			$toiawase_memo .= "●現地ご来場予約：".$_REQUEST['yoyaku_set'].chr(10);
		}
		//●物件名：尾張東エリア 小牧市東田中[bukken_set]
		if(($_REQUEST['bukken_set'] != "")&&($_REQUEST['bukken_set'] != " ")){
			$toiawase_memo .= "●物件名：".$_REQUEST['bukken_set'].chr(10);
		}

		//●ご希望見学日：7月 28日 11時[kengakubi_set]
		if(($_REQUEST['kengakubi_set'] != "")&&($_REQUEST['kengakubi_set'] != "-月 -日 -時")){
			$toiawase_memo .= "●ご希望見学日：".$_REQUEST['kengakubi_set'].chr(10);
			$kengakubi_set = $_REQUEST['kengakubi_set'];
		}
		//●アンケートに答える：アンケートに答える[anke_kotaeru_set]
		if($_REQUEST['anke_kotaeru_set'] != ""){
			$toiawase_memo .= "●アンケートに答える：".$_REQUEST['anke_kotaeru_set'].chr(10);
		}
		//●物件を知ったキッカケ：東新住建HP[anke_jizen_set] 
		if(($_REQUEST['anke_jizen_set'] != "")&&($_REQUEST['anke_jizen_set'] != "-")){
			$toiawase_memo .= "●物件を知ったキッカケ：".$_REQUEST['anke_jizen_set'].chr(10);
		}
		//●検討開始時期：始めたばかり[anke_kentou_set] 
		if($_REQUEST['anke_kentou_set'] != ""){
			$toiawase_memo .= "●検討開始時期：".$_REQUEST['anke_kentou_set'].chr(10);
		}
		//●ご本人様実家：小牧市本庄[jikka_1_set]
		if($_REQUEST['jikka_1_set'] != ""){
			$toiawase_memo .= "●ご本人様実家：".$_REQUEST['jikka_1_set'].chr(10);
		}
		//●配偶者様実家：[jikka_2_set]
		if($_REQUEST['jikka_2_set'] != ""){
			$toiawase_memo .= "●配偶者様実家：".$_REQUEST['jikka_2_set'].chr(10);
		}
		//●現在のお住まい：賃貸住宅[now_osumai_set]
		if($_REQUEST['now_osumai_set'] != ""){
			$toiawase_memo .= "●現在のお住まい：".$_REQUEST['now_osumai_set'].chr(10);
		}
		//●入居予定の家族構成：3名　配偶者様：29歳　お子様：0歳
		$kazoku_kousei = "";
		if($_REQUEST['family-0'] != ""){
			$kazoku_kousei .= $_REQUEST['family-0']."名";
		}
		if($_REQUEST['family-1'] != ""){
			$kazoku_kousei .= "　配偶者様：".$_REQUEST['family-1']."歳";
		}
		if($_REQUEST['family-2'] != ""){
			$kazoku_kousei .= "　お子様：".$_REQUEST['family-2']."歳";
		}
		if($_REQUEST['family-3'] != ""){
			$kazoku_kousei .= "　お子様：".$_REQUEST['family-3']."歳";
		}
		if($_REQUEST['family-4'] != ""){
			$kazoku_kousei .= "　お子様：".$_REQUEST['family-4']."歳";
		}
		if($_REQUEST['family-5'] != ""){
			$kazoku_kousei .= "　ご両親様： ".$_REQUEST['family-5']."歳";
		}
		if($_REQUEST['family-6'] != ""){
			$kazoku_kousei .= "　ご両親様：".$_REQUEST['family-6']."歳";
		}

		if($kazoku_kousei  != ""){
			$toiawase_memo .= "●入居予定の家族構成：".$kazoku_kousei.chr(10);
		}

		//●お勤め先（配偶者様）：公務員[job2_set] 
		if($_REQUEST['job2_set'] != ""){
			$toiawase_memo .= "●お勤め先（配偶者様）：".$_REQUEST['job2_set'].chr(10);
		}
		//●自己資金：200万円位
		if($_REQUEST['money'] != ""){
			$toiawase_memo .= "●自己資金：".$_REQUEST['money']."万円位".chr(10);
		}
		//●返済中のローン：なし[loan_set]
		if($_REQUEST['loan_set'] != ""){
			$toiawase_memo .= "●返済中のローン：".$_REQUEST['loan_set'].chr(10);
		}
		//●お気軽試算計画表：もらわない[okigaru_set]
		if($_REQUEST[''] != "okigaru_set"){
			$toiawase_memo .= "●お気軽試算計画表：".$_REQUEST['okigaru_set'].chr(10);
		}
		//●来訪時に聞きたいこと：耐震構造について、建物商品について[anke_kikitai_set]
		if(($_REQUEST['anke_kikitai_set'] != "")&&($_REQUEST['anke_kikitai_set'] != "-")){
			$toiawase_memo .= "●来訪時に聞きたいこと：".$_REQUEST['anke_kikitai_set'].chr(10);
		}
*/
		$toiawase_memo .= chr(10).$_REQUEST['msg'];
		break;
}

//echo $memo;
//exit();

// 渡したいパラメータ
switch($p_title){
	case '会員登録':
		$params = array(
		    'user_key' => '378fdb03f7456c4be842ff425707f8f9',
		    'user_secret' => 'b336e796079c1ee8ee605c1dd773769b',
		    'company_key' => '1ced76496e25c04c2615262b68e34277',
		    'company_secret' => '036ada153e6e382e8340ad2cc6427d69',
		    'customer[identity_type]' => 'email',
		    'customer[email]' => $_REQUEST['mail'],
		    'customer[collection_route]' => '['.$p_title.']'.$comp_data['HP名'],
		    'customer[collection_date]' => date("Y-m-d"),
		    'customer[last_name]' => $_REQUEST['name_k1'],
		    'customer[first_name]' => $_REQUEST['name_k2'],
		    'customer[delivery_permission]' => 'approval',
		//    'customer[custom:Seibetsu]' => '',
		//    'customer[custom:seinengappi]' => '',
		    'customer[custom:kaiinn_memo]' => $kaiinn_memo,
		    'customer[append_tags]' => 'kodate'
		);
		break;
	case 'お問い合わせ':
		$params = array(
		    'user_key' => '378fdb03f7456c4be842ff425707f8f9',
		    'user_secret' => 'b336e796079c1ee8ee605c1dd773769b',
		    'company_key' => '1ced76496e25c04c2615262b68e34277',
		    'company_secret' => '036ada153e6e382e8340ad2cc6427d69',
		    'customer[identity_type]' => 'email',
		    'customer[email]' => $_REQUEST['mail'],
		    'customer[collection_route]' => '['.$p_title.']'.$comp_data['HP名'],
		    'customer[collection_date]' => date("Y-m-d"),
		    'customer[last_name]' => $_REQUEST['name_k1'],
		    'customer[first_name]' => $_REQUEST['name_k2'],
		    'customer[last_name_reading]' => $_REQUEST['name_f1'],
		    'customer[first_name_reading]' => $_REQUEST['name_f2'],
		    'customer[phone_number]' => $phone_number,
		    'customer[mobile_phone_number]' => $mobile_phone_number,
		    'customer[address]' => $_REQUEST['addr1'],
		//    'customer[lead_company_name]' => '',
		//    'customer[memo]' => $memo,
		    'customer[delivery_permission]' => 'approval',
		    'customer[custom:Bukken]' => $_REQUEST['toi_bukken_set'],
		    'customer[custom:yubin]' => $_REQUEST['pos1_set'],
		    'customer[custom:banchi_mansyon]' => $_REQUEST['addr2'],
		    'customer[custom:yosan]' => $_REQUEST['budget_set'],
		//    'customer[custom:Seibetsu]' => '',
		//    'customer[custom:seinengappi]' => '',
		    'customer[custom:kaiinn_memo]' => $kaiinn_memo,
		    'customer[custom:toiawase_memo]' => $toiawase_memo,
		    'customer[custom:Raijou]' => $_REQUEST['yoyaku_set'].(($_REQUEST['yoyaku_set']!='')?'（物件名：'.$_REQUEST['bukken_set'].' ご来場希望日時：'.$_REQUEST['kengakubi_set'].'）':''),
		    'customer[append_tags]' => 'kodate'
		);
		break;
}
$curl = curl_init($c_url);
curl_setopt($curl, CURLOPT_POST, TRUE);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$result = json_decode($response, true);

$res = $result["status"] === 200 ? true : false;
$curl_res = "";
if($res === false){
	$curl_res = "&c=".$result["message"]["customer[hashcode]"]."-00";
	$send_naiyou = mb_convert_encoding("下記エラーによりSATORIに登録されていない可能性があります。".chr(10)."[".$result["status"]."]".$result["message"].chr(10),"JIS","utf8").$send_naiyou;
}else{
	$curl_res = "&c=".$result["message"]["customer[hashcode]"]."-00";
}
curl_close($curl);
//「SATORI」送信終了　*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+
?>