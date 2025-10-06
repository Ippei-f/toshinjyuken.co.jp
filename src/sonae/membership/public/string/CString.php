<?php
/**
 * 汎用(チェック・変換)クラス
 *
 * 使用例
 * それぞれのメソッドを参照
 *
 * @author katade-naoki
 * @access public
 */
class CString {

	/**
	 * @var string エラーメッセージ
	 */
	var $errMsg;


	/**
	 * コンストラクタ
	 * プロパティーの初期化及び設定
	 * @access public
	 */
	function __construct() {

		$this->errMsg = "";

	}


	/**
	 * エラーメッセージを設定する
	 * @param string $m_errmsg エラーメッセージ
	 * @return void
	 * @access public
	 */
	function setErrMsg($m_errmsg) {
		$this->errMsg = $m_errmsg;
	}


	/**
	 * エラーメッセージを取得する
	 * @return string エラーメッセージ
	 * @access public
	 */
	function getErrMsg() {
		return $this->errMsg;
	}


	/**
	 * 日付の書式及び妥当性チェック
	 * 使用例
	 * include_once 'string/CString.php';
	 * $cstr = new CString();
	 * if ($cstr->chk_date("2000/01/01")) {
	 * 		echo "OK";
	 * } else {
	 * 		echo "NG";
	 * }
	 *
	 * @param string $date 日付
	 * @param string $sep 日付の区切り文字(デフォルト:-/ .)
	 * @return bool 正しい時(True)、不正な時(False)
	 * @access public
	 */
	function chk_date($date, $sep="-/ .") {

		if (preg_match("{^([0-9]+)[$sep]([0-9]+)[$sep]([0-9]+)$}", $date, $date_array)) {
			return checkdate($date_array[2], $date_array[3], $date_array[1]);
		}

		return false;

	}

	/**
	 * SQL文字列をエスケープする
	 * @param string $query SQL文字列
	 * @return string エスケープされた文字列
	 * @see addslashes
	 * @access public
	 */
	function escape_sql($query) {

		if (!get_magic_quotes_gpc()) {
			//「備」等にて文字化け発生する
			//文字コードがSJISの場合は要注意
			$query = addslashes($query);
			//$query = str_replace("'", "''", $query);
		}

		return $query;

	}

	/**
	 * 空白（0バイト文字列 or 半角空白）を「$nbsp;」にエスケープする
	 * @param string $space 文字列
	 * @return string エスケープされた文字列
	 * @see str_replace
	 * @access public
	 */
	function escape_nbsp($space) {

		if ($space == "") $space = "&nbsp;";

		$space = str_replace(" ", "&nbsp;", $space); 

		return $space;

	}

}
?>
