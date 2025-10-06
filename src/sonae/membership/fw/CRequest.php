<?php
/**
 * リクエストクラス
 * @author katade-naoki
 * @access public
 */
class pubRequest {

	/**
	 * @var array 値を格納する配列
	 * @access private
	 */
	var $params = array();


	/**
	 * コンストラクタ
	 * プロパティーの初期化
	 * @access public
	 */
	function __construct() {
		//通常のリクエストパラメータも同様に扱えるように
		if(is_array($_REQUEST)) {
			foreach($_REQUEST as $name => $value) {
				$this->add($name, $value);
			}
		}
	}


	/**
	 * リクエストデータを格納する
	 * @param string $name 名前
	 * @param string $data データ
	 * @return void
	 * @access public
	 */
	function add($name, $data) {
		$this->params[$name] = $data;
	}

	/**
	 * リクエストデータを取得する
	 * @param string $name 名前
	 * @return void
	 * @access public
	 */
	function get($name) {
		if (array_key_exists($name, $this->params)) {
			return $this->params[$name];
		} else {
			return null;
		}
	}

	/**
	 * リクエストオブジェクトに特定のキーが定義されているかチェックする
	 * @param string $name 名前
	 * @return bool 存在すればTrueを返す
	 * @access public
	 */
	function check($name) {
		return array_key_exists($name, $this->params);
	}

}
?>
