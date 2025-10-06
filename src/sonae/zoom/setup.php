<?php
//***************************************************************************
//サイトに設置する時に必ず設定が必要なもの Start

//reCAPTCHA有無フラグ（1：有、0：無）
define('PUB_RE_CAPTCHA', '1');
//reCAPTHA用キー
define('PUB_RE_CAPTCHA_KEY',		'6Le0pSsrAAAAADrgVwVR8PipO1fO35pPMhto_q4l');
//reCAPTHA用シークレットキー
define('PUB_RE_CAPTCHA_SECRET_KEY', '6Le0pSsrAAAAAGtOz8aTcx6ssu3nR250VwNmhrq9');

//メール送信者
define('PUB_MAIL_FROM_NAME',		'東新住建 アパート経営【Sonae】 オンライン面談受付');
define('PUB_MAIL_FROM_ADDRESS',		'support@toshinjyuken.co.jp');

//From設定（0:フォームの入力値「{お名前}<{メールアドレス}>」、1:「PUB_MAIL_FROM_NAME<PUB_MAIL_FROM_ADDRESS>」）
define('PUB_FROM_TYPE',		'0');

//お問い合わせ通知メール送信先（複数指定する場合はカンマ区切りで指定可）
define('PUB_MAIL_TO_ADDRESS',		'support@toshinjyuken.co.jp', 'info@toshinjyuken.co.jp');
//define('PUB_MAIL_TO_ADDRESS',		'nakanishi@birth.ne.jp');
define('PUB_MAIL_TO_ADDRESS_CC',	'');
define('PUB_MAIL_TO_ADDRESS_BCC',	'');

//ファイルアップロード用一時フォルダのディレクトリ
define('PUB_DIR_UPFILE', './tmp');

//お問い合わせ№採番用テキストのディレクトリ
define('PUB_NUMBERING_PATH', './numbering.txt');

//お問い合わせ№の桁数（0の場合は採番処理を行わない）
define('PUB_PADDING', '5');

//お問い合わせ№の採番方法（1:連番、2:年＋連番、3:年月＋連番）
define('PUB_NUMBERING_FORMAT', '1');

//エンベロープFromメールアドレス（未使用時は''）
define('PUB_ENVELOPE_MAIL_ADDRESS',		'support@toshinjyuken.co.jp');

//送信日時の取得
$strMailSendDateTime = date("Y/m/d H:i:s");	//←送信日時のフォーマットを変更する場合はここを調整

//本文中に入力できるURLの数（0の場合は入力不可、-1の場合は制限を行わない）
define('PUB_AVALIABLE_URL_NUM', '3');

//---------------------------------------------------------------------------
//お問い合わせ通知メール用フォーマット

//タイトル
$strContactMailTitle = "###txt_name### 様よりオンライン面談のお申し込みがありました。";

//本文
$strContactMailBody = <<<EOT
SONAE LPよりオンライン面談のお申し込みがありました。
メールの内容は以下となります。

送信日時：{$strMailSendDateTime}


お名前：###txt_name### （###txt_name-kana###）

メールアドレス：###txt_email###

ご希望日：###date_day###

ご希望時間：###sel_select###

備考：###txta_comment###

EOT;
//---------------------------------------------------------------------------
//お問い合わせNo：###otoiawase_no###



//---------------------------------------------------------------------------
//サンキューメール用フォーマット

//タイトル
$strThanksMailTitle = "###txt_name### 様、オンライン面談へのお申し込みありがとうございます。";

//本文
$strThanksMailBody = <<<EOT
この度は、東新住建【SONE】にオンライン面談へお申し込みいただき誠にありがとうございます。
本メールは、お客さまのお問い合わせの受付が、以下の内容で完了しましたことをお知らせするものです。


送信日時：{$strMailSendDateTime}


お名前：###txt_name### （###txt_name-kana###）

メールアドレス：###txt_email###

ご希望日：###date_day###

ご希望時間：###sel_select###

備考：###txta_comment###

------------------------------------------
※このメールは東新住建・SONAEより自動的に配信されています。ご返信いただいても
お答えできませんのでご了承ください。

EOT;
//---------------------------------------------------------------------------

//サイトに設置する時に必ず設定が必要なもの End
//***************************************************************************

//リアルタイム入力チェック有無フラグ（1：有、0：無）
define('PUB_INPUT_CHECK', '1');

//お問い合わせフォームの拡張子(トップページ等の拡張子)
define('PUB_SYSTEM_EXTENSION', '.php');

//メール送信確認画面から戻るボタンを押した時の遷移先
define('PUB_MAIL_CONFIRM_RETURN_URL', './inquiry' . PUB_SYSTEM_EXTENSION);

//メール送信完了画面
define('PUB_MAIL_SEND_END_URL', './contact_send_end.html');

//添付ファイルの拡張子制限
define('PUB_UPFILE_EXTENSION', 'gif・png・jpg・jpeg・txt・pdf・csv・doc・docx・xls・xlsx・ppt・pptx');

//添付ファイルの容量制限
define('PUB_UPFILE_SIZE', '2048');

//添付ファイルの容量制限(エラー表示用)
define('PUB_UPFILE_SIZE_NAME', '2KB');

//添付ファイル お問い合わせ通知メールへの添付有無（1：有、0：無）
define('PUB_UPFILE_CONTACT_MAIL', '1');

//添付ファイル サンキューメールへの添付有無（1：有、0：無）
define('PUB_UPFILE_THANKS_MAIL', '0');

//入力フォームの項目とname値の設定
//※項目名を変更する場合は"title"の値を変更して下さい。
//※不要な項目はhtmlファイル側で削除して下さい。
//※新しい項目を追加したい場合は同じような形式でここに追加し、各画面のHTML要素を作成して下さい。
//　【フォーマット】
//　$arrBfContactForm["自由設定"]["title"] =	"お問い合わせフォームの項目名を設定";
//　$arrBfContactForm["自由設定"]["name"] =		"お問い合わせフォームのinput要素のname値を設定";
//　$arrBfContactForm["自由設定"]["check"] =	"お問い合わせフォームのinput要素の対象入力チェックを設定（複数指定する場合は半角ブランクで繋ぐ）";

$arrBfContactForm["title"]["title"] =			"件名";
$arrBfContactForm["title"]["name"] =			"txt_title";
$arrBfContactForm["title"]["check"] =			"";

$arrBfContactForm["name"]["title"] =			"名前";
$arrBfContactForm["name"]["name"] =				"txt_name";
$arrBfContactForm["name"]["check"] =			"c1 c8";

$arrBfContactForm["name-kana"]["title"] =		"ふりがな";
$arrBfContactForm["name-kana"]["name"] =		"txt_name-kana";
$arrBfContactForm["name-kana"]["check"] =		"c8";

$arrBfContactForm["email"]["title"] =			"メールアドレス";
$arrBfContactForm["email"]["name"] =			"txt_email";
$arrBfContactForm["email"]["check"] =			"c1 c3";

$arrBfContactForm["email_check"]["title"] =		"メールアドレス確認用";
$arrBfContactForm["email_check"]["name"] =		"txt_email_check";
$arrBfContactForm["email_check"]["check"] =		"c1 c4";

$arrBfContactForm["email_select"]["title"] =	"メールアドレス（選択）";
$arrBfContactForm["email_select"]["name"] =		"txt_email_select";
$arrBfContactForm["email_select"]["check"] =	"";

$arrBfContactForm["tel"]["title"] =				"電話番号";
$arrBfContactForm["tel"]["name"] =				"txt_tel";
$arrBfContactForm["tel"]["check"] =				"c6";

$arrBfContactForm["postal"]["title"] =			"郵便番号";
$arrBfContactForm["postal"]["name"] =			"txt_postal";
$arrBfContactForm["postal"]["check"] =			"c5";

$arrBfContactForm["address"]["title"] =			"住所";
$arrBfContactForm["address"]["name"] =			"txt_address";
$arrBfContactForm["address"]["check"] =			"";

$arrBfContactForm["comment"]["title"] =			"備考欄";
$arrBfContactForm["comment"]["name"] =			"txta_comment";
$arrBfContactForm["comment"]["check"] =			"";

$arrBfContactForm["agreechk"]["title"] =		" 個人情報保護方針について同意する";
$arrBfContactForm["agreechk"]["name"] =			"agreechk_checkbox";
$arrBfContactForm["agreechk"]["check"] =		"c1";

$arrBfContactForm["select"]["title"] =			"ご希望時間";
$arrBfContactForm["select"]["name"] =			"sel_select";
$arrBfContactForm["select"]["check"] =			"c1";

$arrBfContactForm["radio"]["title"] =			"ラジオボタン";
$arrBfContactForm["radio"]["name"] =			"rad_radio";
$arrBfContactForm["radio"]["check"] =			"";

$arrBfContactForm["checkbox"]["title"] =		"チェックボックス";
$arrBfContactForm["checkbox"]["name"] =			"chk_checkbox";
$arrBfContactForm["checkbox"]["check"] =		"";

$arrBfContactForm["file"]["title"] =			"添付ファイル";
$arrBfContactForm["file"]["name"] =				"file_attach";
$arrBfContactForm["file"]["check"] =			"";

$arrBfContactForm["date"]["title"] =			"ご希望日";
$arrBfContactForm["date"]["name"] =				"date_day";
$arrBfContactForm["date"]["check"] =			"c1 c8";


//メール用フォーマットを再定義する
define('PUB_CONTACT_MAIL_TITLE', $strContactMailTitle);
define('PUB_CONTACT_MAIL_BODY', $strContactMailBody);
define('PUB_THANKS_MAIL_TITLE', $strThanksMailTitle);
define('PUB_THANKS_MAIL_BODY', $strThanksMailBody);

//文字コード
define('PUB_CHARSET', 'UTF-8');
define('PUB_MAIL_CHARSET',	'UTF-8');

//オリジナル属性「bchk」を指定したチェックボックスのグループ
$arrBfContactChkLists = array(
	array("agreechk"),
//	array("checkbox4", "checkbox5")
);

?>
