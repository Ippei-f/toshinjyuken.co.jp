<?php
/**
 * セッションクラス
 * @author katade-naoki
 * @access public
 */
class pubSession {

	/**
	 * セッションデータを格納する
	 * @param string $name セッション名
	 * @param string $data セッションデータ
	 * @return void
	 * @access public
	 */
	function add($name, $data) {
		$_SESSION[$name] = $data;
	}

	/**
	 * セッションデータを取得する
	 * @param string $name セッション名
	 * @return void
	 * @access public
	 */
	function get($name) {
		if (isset($_SESSION[$name])) {
			return $_SESSION[$name];
		} else {
			return null;
		}
	}

	/**
	 * セッションデータがセットされているかチェックする
	 * @param string $name セッション名
	 * @return bool 存在すればTrueを返す
	 * @access public
	 */
	function check($name) {
		return isset($_SESSION[$name]);
	}

}
?>
