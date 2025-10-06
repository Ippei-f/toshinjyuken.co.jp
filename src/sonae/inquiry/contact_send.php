<?php
require_once("./always_include.php");

//メール送信用に文字コードを設定する
mb_language("Japanese");
mb_internal_encoding(PUB_MAIL_CHARSET);

//POST送信されてきた値をセッションに格納しておく（エラー画面表示用）
foreach ($arrBfContactForm as $key => $value)
{
	$session->add("BF_CONTACT_FORM_". $arrBfContactForm[$key]["name"]. "_VALUE", $arrBfContactForm[$key]["value"]);
}

//reCAPTCHA有無を判定
if (PUB_RE_CAPTCHA)
{
	//GoogleAPI呼び出し先
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	//API送信用データ
	$data = array(
		'secret' => PUB_RE_CAPTCHA_SECRET_KEY,
		'response' => $strReCaptchaResponse,
		'remoteip' => $_SERVER['REMOTE_ADDR'],
	);
	$url .= '?' . http_build_query($data);
	$header = Array(
		'Content-Type: application/x-www-form-urlencoded',
	);
	$options = array('http' =>
		array(
			'method' => 'GET',
			'header'  => implode("\r\n", $header),
			'ignore_errors' => true
		)
	);
	$apiResponse = file_get_contents($url, false, stream_context_create($options));
	$jsonData = json_decode($apiResponse, TRUE);
	if($jsonData['success'] !== TRUE) {
		//認証失敗時の処理をここに書く
		$session->add("BF_CONTACT_FORM_ERROR_MSG", "認証に失敗しました、もしくは不正な操作が行われた可能性があります。");
		header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
		exit;
	}
}

//メール送信先が取得できなかった場合
if ($arrBfContactForm["email"]["value"] == "") {
	$session->add("BF_CONTACT_FORM_ERROR_MSG", "不正な操作が行われた可能性があります。");
	header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
	exit;
}

//////////////////
//入力チェック
//////////////////

//c4のメールアドレス一致チェック用（最初見つかったc3を格納）
$firstC3 = "";

foreach ($arrBfContactForm as $key => $value)
{
	//////////////////////////
	//共通の入力チェック
	//////////////////////////
	
	//改行なしで493文字以上入力すると文字化けするためエラー
	$arrLineChar = explode("\n", $arrBfContactForm[$key]["value"]);
	if (is_array($arrLineChar)) {
		for ($i=0; $i<count($arrLineChar); $i++) {
			if (mb_strlen($arrLineChar[$i]) > 401) {
				$session->add("BF_CONTACT_FORM_ERROR_MSG", "1行に400文字以上入力できません。");
				header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
				exit;
			}
		}
	}
	
	//半角で4096文字を超える場合
	if (mb_strwidth($arrBfContactForm[$key]["value"]) > 4096) {
		$session->add("BF_CONTACT_FORM_ERROR_MSG", "全角2048文字、半角4096文字以内で入力してください。");
		header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
		exit;
	}
	
	//チェックボックスのグループが設定されている場合
	if (is_array($arrBfContactChkLists)) {
		//グループの個数回繰り返す
		for ($i = 0; $i < count($arrBfContactChkLists); $i++) {
			//各グループ内でのチェックされているチェックボックスの個数
			$intCheckCount = 0;
			
			//各グループ内でチェックボックスの個数回繰り返す
			for ($j = 0; $j < count($arrBfContactChkLists[$i]); $j++) {
				//チェックされているかの判定
				if ($arrBfContactForm[$arrBfContactChkLists[$i][$j]]["value"] != "") {
					//チェックされている場合、カウントを+1
					$intCheckCount++;
				}
			}
			
			//カウントが0の場合エラー
			if ($intCheckCount == 0) {
				$session->add("BF_CONTACT_FORM_ERROR_MSG", "１つ以上チェックが必須のチェックボックスが未選択です。");
				header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
				exit;
			}
		}
	}
	
	//添付ファイル
	if (file_exists($arrBfContactForm[$key]["value"])) {
		//ファイル情報取得
		$arrFileInfo = pathinfo($arrBfContactForm[$key]["value"]);
		
		//拡張子チェック
		if (!strstr("・" . PUB_UPFILE_EXTENSION . "・", "・" . $arrFileInfo["extension"] . "・")) {
			$session->add("BF_CONTACT_FORM_ERROR_MSG", "利用できない拡張子です。※対応拡張子「" . PUB_UPFILE_EXTENSION . "」のみ");
			header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
			exit;
		}
		
		//ファイル容量チェック
		if (filesize($arrBfContactForm[$key]["value"]) > PUB_UPFILE_SIZE) {
			$session->add("BF_CONTACT_FORM_ERROR_MSG", "添付ファイル容量が大きすぎます。※最大「" . PUB_UPFILE_SIZE_NAME . "」まで");
			header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
			exit;
		}
		
		//空ファイルチェック
		if (filesize($arrBfContactForm[$key]["value"]) == 0) {
			$session->add("BF_CONTACT_FORM_ERROR_MSG", "空のファイルは添付できません。");
			header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
			exit;
		}
		
		//「{空}.{拡張子}」のファイル名チェック
		if ($arrFileInfo["filename"] == "") {
			$session->add("BF_CONTACT_FORM_ERROR_MSG", "ファイル名が空のファイルは添付できません。");
			header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
			exit;
		}
		
		//ファイル名長さチェック
		if (mb_strwidth($arrFileInfo["basename"]) > 64) {
			$session->add("BF_CONTACT_FORM_ERROR_MSG", "ファイル名が全角32文字、半角64文字を超えるファイルは登録できません。");
			header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
			exit;
		}
	}
	
	//////////////////////////
	//c1～c8の入力チェック
	//////////////////////////
	
	if(isset($arrBfContactForm[$key]["check"])){
		//設定されているc1～c8を配列に分割
		$arrInputCheck = explode(" ", $arrBfContactForm[$key]["check"]);
		
		//設定されている場合
		if (is_array($arrInputCheck)) {
			//設定されている個数回繰り返す
			for ($i = 0; $i < count($arrInputCheck); $i++) {
				switch ($arrInputCheck[$i]) {
					case "c1" :
						//未入力チェック
						if ($arrBfContactForm[$key]["value"] == "") {
							$session->add("BF_CONTACT_FORM_ERROR_MSG", $arrBfContactForm[$key]["title"] . "を入力してください。");
							header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
							exit;
						}
						break;
					
					case "c2" :
						//全角カナチェック（全角数値、全角空白、「ー」は許可する）
						if (!empty($arrBfContactForm[$key]["value"])) {
							if (!preg_match('/^[ァ-ヴー　０-９]+$/u', $arrBfContactForm[$key]["value"])) {
								$session->add("BF_CONTACT_FORM_ERROR_MSG", $arrBfContactForm[$key]["title"] . "は全角カナで入力してください。");
								header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
								exit;
							}
						}
						break;
					
					case "c3" :
						//メールアドレスチェック
						if (!empty($arrBfContactForm[$key]["value"])) {
							if (!preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i', $arrBfContactForm[$key]["value"])) {
								$session->add("BF_CONTACT_FORM_ERROR_MSG", "メールアドレスを正しく入力してください。");
								header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
								exit;
							}
							
							//最初見つかったc3の場合
							if ($firstC3 == "") {
								//変数で保持
								$firstC3 = $arrBfContactForm[$key]["value"];
							}
						}
						break;
					
					case "c4" :
						//メールアドレス一致チェック
						if ($arrBfContactForm[$key]["value"] != $firstC3) {
							$session->add("BF_CONTACT_FORM_ERROR_MSG", "メールアドレスが一致していません。");
							header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
							exit;
						}
						break;
					
					case "c5" :
						//郵便番号チェック
						if (!empty($arrBfContactForm[$key]["value"])) {
							if (
								!preg_match('/^[0-9]{3}-[0-9]{4}$/', $arrBfContactForm[$key]["value"])
								&&
								!preg_match('/^[0-9]{7}$/', $arrBfContactForm[$key]["value"])
							) {
								$session->add("BF_CONTACT_FORM_ERROR_MSG", "郵便番号を正しく入力してください。");
								header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
								exit;
							}
						}
						break;
					
					case "c6" :
						//半角数字＋ハイフン（-）チェック
						if (!empty($arrBfContactForm[$key]["value"])) {
							if (!preg_match('/^[0-9\-]+$/', $arrBfContactForm[$key]["value"])) {
								$session->add("BF_CONTACT_FORM_ERROR_MSG", $arrBfContactForm[$key]["title"] . "は半角数字で入力してください。");
								header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
								exit;
							}
						}
						break;
					
					case "c7" :
						//チェックボックス未チェックの場合はエラー
						if ($arrBfContactForm[$key]["value"] == "") {
							$session->add("BF_CONTACT_FORM_ERROR_MSG", $arrBfContactForm[$key]["title"] . "をチェックしてください。");
							header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
							exit;
						}
						break;
					
					case "c8" :
						//チェックボックス未チェックの場合はエラー
						if (!empty($arrBfContactForm[$key]["value"])) {
							if (PUB_AVALIABLE_URL_NUM != "-1") {
								if (preg_match_all('/https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/', $arrBfContactForm[$key]["value"], $arrMatch)) {
									if (count($arrMatch[0]) > PUB_AVALIABLE_URL_NUM) {
										if (PUB_AVALIABLE_URL_NUM == "0") {
											$session->add("BF_CONTACT_FORM_ERROR_MSG", $arrBfContactForm[$key]["title"] . "にURLを含めることは出来ません。");
										} else {
											$session->add("BF_CONTACT_FORM_ERROR_MSG", $arrBfContactForm[$key]["title"] . "に含めることが可能なURLの数は" . PUB_AVALIABLE_URL_NUM . "個までです。");
										}
										header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
										exit;
									}
								}
							}
						}
						break;
				}
			}
		}
	}
}


//お問い合わせ№の採番
$otoiawase_no = "";
//お問い合わせ№の桁数が1以上の場合、採番処理を行う
if (PUB_PADDING != "0") {
	//採番テキストファイルがない場合は作成する
	if (!file_exists(PUB_NUMBERING_PATH)) {
		touch(PUB_NUMBERING_PATH);
	}
	
	//ファイルを読み込み/書き込みモードでオープンする
	$fp = fopen(PUB_NUMBERING_PATH, "r+");
	//ファイルをロックする
	flock($fp, LOCK_EX);
	
	//ファイルを1行ずつ読み込む
	$num = fgets($fp);				//1行目：連番
	$year = fgets($fp);				//2行目：年または年月
	
	//ファイルに数字以外が入力されている場合
	if (!preg_match('/^[0-9]*$/', $num) || !preg_match('/^[0-9]*$/', $year)) {
		$session->add("BF_CONTACT_FORM_ERROR_MSG", "「" . PUB_NUMBERING_PATH . "」に不正な値が登録されています。");
		header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
		exit;
	}
	
	//int型にキャスト
	$num = (int)$num;
	
	//1:連番
	if (PUB_NUMBERING_FORMAT == "1") {
		$num = $num + 1;
		//採番方法が変更された場合、連番を1にリセット
		if ($year != "") {
			$num = 1;
			$year = "";
		}
		$otoiawase_no = str_pad($num, PUB_PADDING, 0, STR_PAD_LEFT);
	//2:年＋連番
	} else if (PUB_NUMBERING_FORMAT == "2") {
		//年が替わっている、または採番方法が変更された場合、年を更新し連番を1にリセット
		if ($year != date('Y')) {
			$year = date('Y');
			$num = 1;
		} else {
			$num = $num + 1;
		}
		$otoiawase_no = $year.str_pad($num, PUB_PADDING, 0, STR_PAD_LEFT);
	//3:年月＋連番
	} else if (PUB_NUMBERING_FORMAT == "3") {
		//年月が替わっている、または採番方法が変更された場合、年月を更新し連番を1にリセット
		if ($year != date('Ym')) {
			$year = date('Ym');
			$num = 1;
		} else {
			$num = $num + 1;
		}
		$otoiawase_no = $year.str_pad($num, PUB_PADDING, 0, STR_PAD_LEFT);
	}
	
	//設定されている桁数の上限以上の連番が発行された場合（メール送信は続行）
	if (strlen($num) > PUB_PADDING) {
		$otoiawase_no = "発行上限エラー";
	}
	
	//新たに採番した連番をテキストファイルに書き込む
	ftruncate($fp,0);					//ファイルサイズを0にする
	fseek($fp, 0);						//ポインタをファイルの先頭に移動
	fwrite($fp,$num."\n".$year);		//書き込み処理
	flock($fp, LOCK_UN);				//ロック解除
	fclose($fp);
}

//***********************************************************************************************
//お問い合わせ通知メールの送信

//添付ファイルの存在確認
$flgFileContact = false;
if(PUB_UPFILE_CONTACT_MAIL == "1"){
	foreach ($arrBfContactForm as $key => $value){
		if(file_exists($arrBfContactForm[$key]["value"])){
			$flgFileContact = true;
		}
	}
}

//Fromの設定
//フォームの入力値「{お名前}<{メールアドレス}>」
if (PUB_FROM_TYPE == "0") {
	if ($arrBfContactForm["name"]["value"] == "") {
		$from = $arrBfContactForm["email"]["value"];
	} else {
		$from = mb_encode_mimeheader($arrBfContactForm["name"]["value"], "UTF-8", "B"). "<". $arrBfContactForm["email"]["value"]. ">";
	}
//「PUB_MAIL_FROM_NAME<PUB_MAIL_FROM_ADDRESS>」
} else if (PUB_FROM_TYPE == "1") {
	if (PUB_MAIL_FROM_NAME == "") {
		$from = PUB_MAIL_FROM_ADDRESS;
	} else {
		$from = mb_encode_mimeheader(PUB_MAIL_FROM_NAME, "UTF-8", "B"). "<". PUB_MAIL_FROM_ADDRESS. ">";
	}
}

//Toの設定
$to = PUB_MAIL_TO_ADDRESS;

//ヘッダー設定
if($flgFileContact){
	$header = "Content-Type: multipart/mixed; charset=\"UTF-8\"; boundary=\"__BOUNDARY__\"\n";
} else {
	$header = "Content-Type: multipart/alternative; charset=\"UTF-8\"; boundary=\"__BOUNDARY__\"\n";
}
$header .= "Content-Transfer-Encoding: 8bit\n";
$header .= "Return-Path: " . $to . " \n";
$header .= "From: " . $from ." \n";
$header .= "Sender: " . $from ." \n";
$header .= "Reply-To: " . $to . " \n";
//Ccの作成
if (PUB_MAIL_TO_ADDRESS_CC != "") {
	$header .= "Cc: ". PUB_MAIL_TO_ADDRESS_CC . "\n";
}

//Bccの作成
if (PUB_MAIL_TO_ADDRESS_BCC != "") {
	$header .= "Bcc: ". PUB_MAIL_TO_ADDRESS_BCC . "\n";
}

//件名の作成
$title = PUB_CONTACT_MAIL_TITLE;
$title = str_replace("###otoiawase_no###", $otoiawase_no, $title);

foreach ($arrBfContactForm as $key => $value)
{
	$title = str_replace("###". $arrBfContactForm[$key]["name"]. "###", $arrBfContactForm[$key]["value"], $title);
}

//本文の作成
$content = "--__BOUNDARY__\n";
$content .= "Content-Type: text/plain; charset=\"UTF-8\"\n";
$content .= "Content-Transfer-Encoding: 8bit\n";
$content .= "\n";
$content .= PUB_CONTACT_MAIL_BODY;
$content .= "\n";

//お問い合わせ№を変換
$content = str_replace("###otoiawase_no###", $otoiawase_no, $content);
foreach ($arrBfContactForm as $key => $value)
{
	$content = str_replace("###". $arrBfContactForm[$key]["name"]. "###", $arrBfContactForm[$key]["value"], $content);
}

//添付ファイルの設定(添付ファイル用処理)
if(PUB_UPFILE_CONTACT_MAIL == "1" and $flgFileContact){
	foreach ($arrBfContactForm as $key => $value){
		if(file_exists($arrBfContactForm[$key]["value"])){
			$file = mb_encode_mimeheader(pathinfo($arrBfContactForm[$key]["value"], PATHINFO_BASENAME), "UTF-8", "B");
			$file_path = $arrBfContactForm[$key]["value"];
			$content .= "--__BOUNDARY__\n";
			$content .= "Content-Type: application/octet-stream; name=\"{$file}\"\n";
			$content .= "Content-Disposition: attachment; filename=\"{$file}\"\n";
			$content .= "Content-Transfer-Encoding: base64\n";
			$content .= "\n";
			$content .= chunk_split(base64_encode(file_get_contents($file_path)));
		}
	}
}

$content .= "--__BOUNDARY__--";

if (PUB_ENVELOPE_MAIL_ADDRESS != "") {
	//エンベロープFromありでメールを送信する
	if (!mb_send_mail($to, $title, $content, $header, "-f".PUB_ENVELOPE_MAIL_ADDRESS))
	{
		$session->add("BF_CONTACT_FORM_ERROR_MSG", "お問い合わせ通知メールの送信に失敗しました。");
		header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
		exit;
	}
} else {
	//エンベロープFromなしでメールを送信する
	if (!mb_send_mail($to, $title, $content, $header))
	{
		$session->add("BF_CONTACT_FORM_ERROR_MSG", "お問い合わせ通知メールの送信に失敗しました。");
		header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
		exit;
	}
}
//***********************************************************************************************

//***********************************************************************************************
//サンキューメールの送信

//添付ファイルの存在確認
$flgFileThankyou = false;
if(PUB_UPFILE_THANKS_MAIL == "1"){
	foreach ($arrBfContactForm as $key => $value){
		if(file_exists($arrBfContactForm[$key]["value"])){
			$flgFileThankyou = true;
		}
	}
}

//Fromの作成
if (PUB_MAIL_FROM_NAME == "") {
	$from = PUB_MAIL_FROM_ADDRESS;
} else {
	$from = mb_encode_mimeheader(PUB_MAIL_FROM_NAME). "<". PUB_MAIL_FROM_ADDRESS. ">";
}

//Toの作成
$to = $arrBfContactForm["email"]["value"];

//ヘッダー設定
if($flgFileThankyou){
	$header = "Content-Type: multipart/mixed; charset=\"UTF-8\"; boundary=\"__BOUNDARY__\"\n";
} else {
	$header = "Content-Type: multipart/alternative; charset=\"UTF-8\"; boundary=\"__BOUNDARY__\"\n";
}
$header .= "Content-Transfer-Encoding: 8bit\n";
$header .= "Return-Path: " . $to . " \n";
$header .= "From: " . $from ." \n";
$header .= "Sender: " . $from ." \n";
//$header .= "Reply-To: " . $to . " \n";//2023/01/23
$header .= "Reply-To: " . $from . " \n";

//件名の作成
$title = PUB_THANKS_MAIL_TITLE;
$title = str_replace("###otoiawase_no###", $otoiawase_no, $title);
foreach ($arrBfContactForm as $key => $value)
{
	$title = str_replace("###". $arrBfContactForm[$key]["name"]. "###", $arrBfContactForm[$key]["value"], $title);
}

//本文の作成
$content = "--__BOUNDARY__\n";
$content .= "Content-Type: text/plain; charset=\"UTF-8\"\n";
$content .= "Content-Transfer-Encoding: 8bit\n";
$content .= "\n";
$content .= PUB_THANKS_MAIL_BODY;
$content .= "\n";
//お問い合わせ№を変換
$content = str_replace("###otoiawase_no###", $otoiawase_no, $content);

foreach ($arrBfContactForm as $key => $value)
{
	$content = str_replace("###". $arrBfContactForm[$key]["name"]. "###", $arrBfContactForm[$key]["value"], $content);
}

//添付ファイルの設定(添付ファイル用処理)
if(PUB_UPFILE_THANKS_MAIL == "1" and $flgFileThankyou){
	foreach ($arrBfContactForm as $key => $value){
		if(file_exists($arrBfContactForm[$key]["value"])){
			$file = mb_encode_mimeheader(pathinfo($arrBfContactForm[$key]["value"], PATHINFO_BASENAME), "UTF-8", "B");
			$file_path = $arrBfContactForm[$key]["value"];
			$content .= "--__BOUNDARY__\n";
			$content .= "Content-Type: application/octet-stream; name=\"{$file}\"\n";
			$content .= "Content-Disposition: attachment; filename=\"{$file}\"\n";
			$content .= "Content-Transfer-Encoding: base64\n";
			$content .= "\n";
			$content .= chunk_split(base64_encode(file_get_contents($file_path)));
		}
	}
}

$content .= "--__BOUNDARY__--";

if (PUB_ENVELOPE_MAIL_ADDRESS != "") {
	//エンベロープFromありでメールを送信する
	if (!mb_send_mail($to, $title, $content, $header, "-f".PUB_ENVELOPE_MAIL_ADDRESS))
	{
		$session->add("BF_CONTACT_FORM_ERROR_MSG", "サンキューメールの送信に失敗しました。");
		header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
		exit;
	}
} else {
	//エンベロープFromなしでメールを送信する
	if (!mb_send_mail($to, $title, $content, $header))
	{
		$session->add("BF_CONTACT_FORM_ERROR_MSG", "サンキューメールの送信に失敗しました。");
		header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
		exit;
	}
}

//***********************************************************************************************

//正常終了時は指定のページに遷移する（デフォルトは完了画面）
header( "Location:". PUB_MAIL_SEND_END_URL);
exit ;
?>
