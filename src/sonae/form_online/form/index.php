<?php
header( 'Content-Type: text/html; charset=utf-8' );
//error_reporting(E_ALL | E_STRICT);

//設定ファイル
include 'config.php';

//----------------------------------------------------------------------
//関数定義
//----------------------------------------------------------------------
function h( $str ) {
	return htmlspecialchars( $str, ENT_QUOTES, 'UTF-8' );
}

function sanitize( $arr ) {
	if ( is_array( $arr ) ) {
		return array_map( 'sanitize', $arr );
	}
	return str_replace( '\0', '', $arr ); //NULLバイト除去
}

//----------------------------------------------------------------------
//各種チェック
//----------------------------------------------------------------------

//POSTデータのサニタイズ
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
	$_POST = sanitize( $_POST );
}

$errorFlag = 0;
$errMsg = '';

//必須設定項目のチェック
if ( $hissuCheck === 1 ) {
	foreach ( $hissuItemKey as $key ) {
		if ( empty( $_POST[ $key ] ) ) {
			$errMsg .= '<p class="errMsg">「' . $key . '」は必須入力項目です。</p>';
			$errorFlag = 1;
		}
	}
}

//メールアドレスの書式チェック
if ( !empty( $_POST[ $postMailKey ] ) ) {
	if ( filter_var( $_POST[ $postMailKey ], FILTER_VALIDATE_EMAIL ) === false ) {
		$errMsg .= '<p class="errMsg">「' . $postMailKey . '」の書式が不自然なようですのでご確認下さい。</p>';
		$errorFlag = 1;
	}
}

//メールの2重チェック
if ( !empty( $_POST[ $postMailKey ] ) && !empty( $_POST[ $postMailKey2 ] ) ) {
	if ( trim( $_POST[ $postMailKey ] ) !== trim( $_POST[ $postMailKey2 ] ) ) {
		$errMsg .= '<p class="errMsg">「' . $postMailKey . '」と「' . $postMailKey2 . '」が一致しません。</p>';
		$errorFlag = 1;
	}
}

//送信フラグのチェック
$sendFlag = 0;
if ( !empty( $_POST[ 'confirm_submit' ] ) && $_POST[ 'confirm_submit' ] == 'confirm_submit' ) {
	$sendFlag = 1;
}

//----------------------------------------------------------------------
//送信内容
//----------------------------------------------------------------------

//入力項目
$postItem = '';
foreach ( $_POST as $key => $val ) {
	$out = is_array( $val ) ? implode( ',', $val ) : $val;
	if ( $out != 'confirm_submit' && $key != 'httpReferer' ) {
		$postItem .= '【 ' . $key . ' 】 ' . $out . "\n";
	}
}

//差出人名
$postName = !empty( $_POST[ $postNameKey ] ) ? $_POST[ $postNameKey ] : '匿名';

//差出人メールアドレス
$postMail = !empty( $_POST[ $postMailKey ] ) ? $_POST[ $postMailKey ] : '';

//送信日時
$postDate = date( 'Y/m/d (D) H:i:s', time() ) ? : '不明';

//送信者のIPアドレス
$postIpAddress = $_SERVER[ 'REMOTE_ADDR' ] ? : '不明';

//送信者のホスト名
$postHostName = getHostByAddr( $_SERVER[ 'REMOTE_ADDR' ] ) ? : '不明';

//送信ページのURL
if ( !empty( $_POST[ 'httpReferer' ] ) ) {
	$postSendPage = $_POST[ 'httpReferer' ];
} elseif ( !empty( $_SERVER[ 'HTTP_REFERER' ] ) ) {
	$postSendPage = $_SERVER[ 'HTTP_REFERER' ];
} else {
	$postSendPage = '不明';
}

//メール内容
include 'mail_reply.php';
include 'mail_admin.php';

//----------------------------------------------------------------------
//画面表示＆メール送信
//----------------------------------------------------------------------

if ( $errorFlag == 1 ) { //エラーページ表示
	include 'page_error.php';
	exit;

} elseif ( $confirmDsp == 1 && $sendFlag == 0 ) { //送信確認ページ表示
	include 'page_confirm.php';
	exit;

} else { //メール送信＆サンクスページ表示

	//管理者宛メール
	$header = 'From: ' . $adminMail_from . "\n";
	$header .= 'Reply-To: ' . ( $postMail ? : $adminMail ) . "\n";
	if ( !empty( $bccMail ) ) {
		$header .= 'Bcc: ' . $bccMail . "\n";
	}
	$header .= 'Content-Type: text/plain; charset=UTF-8' . "\n";
	mb_language( 'uni' );
	mb_internal_encoding( 'UTF-8' );
	mb_send_mail( $adminMail, $subject, $body, $header, '-f' . $adminMail_from );

	//差出人宛メール（返信）
	if ( $reply == 1 && !empty( $postMail ) ) {
		$reHeader = 'From: ' . ( empty( $siteName ) ? $adminMail_from : mb_encode_mimeheader( $siteName ) . ' <' . $adminMail_from . '>' ) . "\n";
		$reHeader .= 'Reply-To: ' . $adminMail . "\n";
		$reHeader .= 'Content-Type: text/plain; charset=UTF-8' . "\n";
		mb_send_mail( $postMail, $reSubject, $reBody, $reHeader, '-f' . $adminMail_from );
	}

	//サンクスページ表示
	header( 'Location: thanks.php' );
	exit;
}

?>
