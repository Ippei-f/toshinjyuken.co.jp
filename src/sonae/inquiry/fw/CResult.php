<?php
/**
 * リザルトクラス
 * @author katade-naoki
 * @access public
 */
class pubResult {

	/**
	 * @var array 値を格納する配列
	 * @access private
	 */
	var $data = array();


	/**
	 * リザルトデータを格納する
	 * @param string $name 名前
	 * @param string $data データ
	 * @return void
	 * @access public
	 */
	function add($name, $data) {
		$this->data[$name] = $data;
	}

	/**
	 * リザルトデータを取得する
	 * @param string $name 名前
	 * @return void
	 * @access public
	 */
	function get($name) {
		if (array_key_exists($name, $this->data)) {
			return $this->data[$name];
		} else {
			return null;
		}
	}

}
?>
