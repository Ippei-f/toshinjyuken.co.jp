<?php
//<meta charset="utf-8">
//ini_set('display_errors', "On");
//print_r($_SERVER);
//print_r($_REQUEST);
//exit;

//「SATROI」SATORI送信（cURL）2019.02.04 *+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+
if($_SERVER['SERVER_NAME'] == "localhost"){
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
		$kaiinn_memo .= "●ご入居予定人数".chr(10)."大人：".$_REQUEST['nyuukyo1-0']."人".chr(10)."子供：".$_REQUEST['nyuukyo1-1']."人".chr(10);
		$kaiinn_memo .= "●ご希望エリア：".$_REQUEST['kibouarea-0'].chr(10);
		if($_REQUEST['kibouarea-1'] != ""){
			$kaiinn_memo .= "　第二希望：".$_REQUEST['kibouarea-1'].chr(10);
		}
		if($_REQUEST['kibouarea-2'] != ""){
			$kaiinn_memo .= "　第三希望：".$_REQUEST['kibouarea-2'].chr(10);
		}
		$kaiinn_memo .= chr(10).$_REQUEST['msg'];
		break;
	case 'お問い合わせ':
//		$toiawase_memo ='【'.$p_title.' 追加分】'.chr(10).'↓'.chr(10).chr(10);
		//●ご入居予定人数
		$toiawase_memo .= "●ご入居予定人数".chr(10)."大人：".$_REQUEST['nyuukyo1-0']."人".chr(10)."子供：".$_REQUEST['nyuukyo1-1']."人".chr(10);
		//●ご職業：会社員[job]
		if($_REQUEST['job_set'] != ""){
			$toiawase_memo .= "●ご職業：".$_REQUEST['job_set'].chr(10);
		}
		//●ご希望物件名
//		$toiawase_memo .= "●ご希望物件名：".$_REQUEST['toi_bukken1'].chr(10);
		//●お問い合わせ内容
		if($_REQUEST['nai_cb_set'] != ""){
			$toiawase_memo .= "●お問い合わせ内容：".$_REQUEST['nai_cb_set'].chr(10);
		}

		$toiawase_memo .= chr(10).$_REQUEST['msg'];
		break;
}

//echo $memo;
//exit();

// 渡したいパラメータ
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

//    'customer[custom:seibetsu]' => '',
//    'customer[custom:seinengappi]' => '',
    'customer[custom:kaiinn_memo]' => $kaiinn_memo,
    'customer[custom:toiawase_memo]' => $toiawase_memo,
    'customer[custom:Raijou]' => $_REQUEST['yoyaku_set'].(($_REQUEST['yoyaku_set']!='')?'（ご来場希望日時：'.$_REQUEST['kengakubi_date'].'）':''),
    'customer[append_tags]' => 'sodatsu'
);
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