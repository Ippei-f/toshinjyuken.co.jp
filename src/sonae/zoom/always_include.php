<?php
//バースお問い合わせフォーム共通プログラム PHP版 Ver1.0

//セッションを保存する時間をブラウザを閉じる迄に設定
ini_set("session.cookie_lifetime", "0");
//セッションを破棄する迄の時間を1Hに設定
ini_set("session.gc_maxlifetime", "3600");
//スクリプトタイムアウトを1分30秒に設定
ini_set("max_execution_time",90);

//ini_set("display_errors", 0); 
//ini_set("display_startup_errors", 0); 
// NoticeやDeprecated含めて全部のエラーがほしい 
error_reporting(E_ALL); 

require_once("setup.php");

require_once("./fw/CSession.php");
require_once("./fw/CRequest.php");
require_once("./fw/CResult.php");
require_once("./fw/CView.php");

require_once './public/string/CString.php';

//セッションをスタートさせる
session_cache_limiter("nocache");
//session_cache_limiter("private");
//session_cache_limiter("private_no_expire");
session_start();

$session = new pubSession();
$request = new pubRequest();
$result = new pubResult();
$pubview = new pubView($request, $result);

//header("Content-type: text/html;charset=". PUB_CHARSET); 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//header("Cache-Control: no-store, no-cache, must-revalidate");
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache");

//デフォルトタイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');		//本番環境のphp4.4.7は未対応

//(添付ファイル用処理)現在の日付より2日～10日前のファイルを削除
for($i = 2; $i <= 10 ;$i++){
	$strPath = PUB_DIR_UPFILE . "/" . date('Ymd', strtotime("-" . $i . " day"));
	if(file_exists($strPath)){
		@rmdir($strPath);
	}
}

//POST送信される値をここで取得する（画面数、POST送信される項目数が少ない為）
foreach ($arrBfContactForm as $key => $value)
{
	//value取得
	$arrBfContactForm[$key]["value"] = $request->get($arrBfContactForm[$key]["name"]);
	
	//(添付ファイル用処理)ファイルがある場合
	if(isset($_FILES[$arrBfContactForm[$key]["name"]]['tmp_name']) && is_uploaded_file($_FILES[$arrBfContactForm[$key]["name"]]['tmp_name'])){
		//指定ディレクトリが存在しない場合、ディレクトリを作成(./tmp/YYYYMMDD)
		$strPath = PUB_DIR_UPFILE . "/" . date('Ymd');
		if(!file_exists($strPath)){
			if(!@mkdir($strPath, 0777)){
				//ディレクトリ作成に失敗した場合
				$session->add("BF_CONTACT_FORM_ERROR_MSG", "添付ファイルの取得または添付ファイル用ディレクトリの作成に失敗しました。");
				header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
				exit;
			}
		}
		@chmod($strPath, 0777);
		
		//指定ディレクトリが存在しない場合、ディレクトリを作成(./tmp/YYYYMMDD/HHiiss_XXXXXXXXXX)
		//※添付ファイルが複数件ある場合でも、同一ファイル名の別ファイルも送信できるよう、毎回異なるフォルダへ格納する
		$strPath .= "/" . date('His') . "_" . substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10);
		if(!file_exists($strPath)){
			if(!@mkdir($strPath, 0777)){
				//ディレクトリ作成に失敗した場合
				$session->add("BF_CONTACT_FORM_ERROR_MSG", "添付ファイルの取得または添付ファイル用フォルダの作成に失敗しました。");
				header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
				exit;
			}
		}
		@chmod($strPath, 0777);
		
		//添付ファイル名取得
		$strFile = $_FILES[$arrBfContactForm[$key]["name"]]['name'];
		
		//指定ディレクトリ + 添付ファイル名
		$strPathFile = $strPath . "/" . $strFile;
		
		//一時ファイル(テンポラリ)名取得
		$strTemp = $_FILES[$arrBfContactForm[$key]["name"]]['tmp_name'];
		
		//指定ディレクトリへ添付ファイルを移動
		if(!@move_uploaded_file($strTemp, $strPathFile)){
			//ファイル移動に失敗した場合
			$session->add("BF_CONTACT_FORM_ERROR_MSG", "添付ファイルの取得に失敗しました。");
			header( "Location: ./contact_error" . PUB_SYSTEM_EXTENSION );
			exit;
		}
		@chmod($strPathFile, 0777);
		
		//添付ファイル用のvalueを取得
		$arrBfContactForm[$key]["value"] = $strPathFile;
	}
}

//添付ファイル用文字コード設定(添付ファイルの日本語名称の文字化け対応)(pathinfo(■, PATHINFO_BASENAME)　で日本語が消える場合があるため)
setlocale(LC_ALL, 'ja_JP.UTF-8');

//reCAPTCHA
$strReCaptchaResponse = "";		//reCPATCHA
if ($request->check("g-recaptcha-response")) {
	$strReCaptchaResponse = $request->get("g-recaptcha-response");
}
?>
