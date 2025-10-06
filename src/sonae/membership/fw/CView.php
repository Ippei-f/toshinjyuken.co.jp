<?php
/**
 * ビュークラス
 * @author katade-naoki
 * @access private
 */
class pubView {

	/**
	 * @var object Request Object(リクエストデータが格納されているオブジェクト)
	 * @access private
	 */
	var $request = null;

	/**
	 * @var object Result Object(リザルトデータが格納されているオブジェクト)
	 * @access private
	 */
	var $result = null;


	/**
	 * Request Objectを設定する
	 * @param object $request Request Object
	 * @return void
	 * @access public
	 */
	function setRequest($request) {
		$this->request = $request->params;
	}


	/**
	 * Result Objectを設定する
	 * @param object $result Result Object
	 * @return void
	 * @access public
	 */
	function setResult($result) {
		$this->result = $result;
	}


	/**
	 * コンストラクタ
	 * プロパティーの初期化
	 * @access private
	 */
	function __construct($request, $result) {

		$this->request = $request->params;
		$this->result = $result;

	}

	/**
	 * 空白（0バイト文字列 or 半角空白）を「$nbsp;」にエスケープする
	 * @param string $space 文字列
	 * @return string エスケープされた文字列
	 * @access public
	 */
	function escape_nbsp($space) {
		//汎用クラス（チェック・変換）
		$cstr = new CString();
		return $cstr->escape_nbsp($space);
	}

	/**
	 * 改行コード（\n）を「<br>」にエスケープする
	 * @param string $space 文字列
	 * @return string エスケープされた文字列
	 * @access public
	 */
	function escape_cr($space) {
		return str_replace("\n", "<br>", $space);
	}

	/**
	 * 特殊文字をHTMLエンティティに変換する（表示用）
	 * @param string $value 変換する文字列
	 * @return string 変換された文字列
	 * @access public
	 */
	function encode_html($value)
	{
		//汎用クラス（チェック・変換）
		$cstr = new CString();

		$regex = 
        '`https?+:(?://(?:(?:[-.0-9_a-z~]|%[0-9a-f][0-9a-f]' .
        '|[!$&-,:;=])*+@)?+(?:\[(?:(?:[0-9a-f]{1,4}:){6}(?:' .
        '[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:\d|[1-9]\d|1\d{2}|2' .
        '[0-4]\d|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25' .
        '[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])\.(?' .
        ':\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5]))|::(?:[0-9a-f' .
        ']{1,4}:){5}(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:\d|[1' .
        '-9]\d|1\d{2}|2[0-4]\d|25[0-5])\.(?:\d|[1-9]\d|1\d{' .
        '2}|2[0-4]\d|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\\' .
        'd|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])' .
        ')|(?:[0-9a-f]{1,4})?+::(?:[0-9a-f]{1,4}:){4}(?:[0-' .
        '9a-f]{1,4}:[0-9a-f]{1,4}|(?:\d|[1-9]\d|1\d{2}|2[0-' .
        '4]\d|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-' .
        '5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])\.(?:\d' .
        '|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5]))|(?:(?:[0-9a-f]{' .
        '1,4}:)?+[0-9a-f]{1,4})?+::(?:[0-9a-f]{1,4}:){3}(?:' .
        '[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:\d|[1-9]\d|1\d{2}|2' .
        '[0-4]\d|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25' .
        '[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])\.(?' .
        ':\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5]))|(?:(?:[0-9a-' .
        'f]{1,4}:){0,2}[0-9a-f]{1,4})?+::(?:[0-9a-f]{1,4}:)' .
        '{2}(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:\d|[1-9]\d|1\\' .
        'd{2}|2[0-4]\d|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4' .
        ']\d|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5' .
        '])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5]))|(?:(?:' .
        '[0-9a-f]{1,4}:){0,3}[0-9a-f]{1,4})?+::[0-9a-f]{1,4' .
        '}:(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:\d|[1-9]\d|1\d' .
        '{2}|2[0-4]\d|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]' .
        '\d|25[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5]' .
        ')\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5]))|(?:(?:[' .
        '0-9a-f]{1,4}:){0,4}[0-9a-f]{1,4})?+::(?:[0-9a-f]{1' .
        ',4}:[0-9a-f]{1,4}|(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25' .
        '[0-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])\.(?' .
        ':\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])\.(?:\d|[1-9]\\' .
        'd|1\d{2}|2[0-4]\d|25[0-5]))|(?:(?:[0-9a-f]{1,4}:){' .
        '0,5}[0-9a-f]{1,4})?+::[0-9a-f]{1,4}|(?:(?:[0-9a-f]' .
        '{1,4}:){0,6}[0-9a-f]{1,4})?+::|v[0-9a-f]++\.[!$&-.' .
        '0-;=_a-z~]++)\]|(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0' .
        '-5])\.(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])\.(?:\\' .
        'd|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])\.(?:\d|[1-9]\d|' .
        '1\d{2}|2[0-4]\d|25[0-5])|(?:[-.0-9_a-z~]|%[0-9a-f]' .
        '[0-9a-f]|[!$&-,;=])*+)(?::\d*+)?+(?:/(?:[-.0-9_a-z' .
        '~]|%[0-9a-f][0-9a-f]|[!$&-,:;=@])*+)*+|/(?:(?:[-.0' .
        '-9_a-z~]|%[0-9a-f][0-9a-f]|[!$&-,:;=@])++(?:/(?:[-' .
        '.0-9_a-z~]|%[0-9a-f][0-9a-f]|[!$&-,:;=@])*+)*+)?+|' .
        '(?:[-.0-9_a-z~]|%[0-9a-f][0-9a-f]|[!$&-,:;=@])++(?' .
        ':/(?:[-.0-9_a-z~]|%[0-9a-f][0-9a-f]|[!$&-,:;=@])*+' .
        ')*+)?+(?:\?+(?:[-.0-9_a-z~]|%[0-9a-f][0-9a-f]|[!$&' .
        '-,/:;=?+@])*+)?+(?:#(?:[-.0-9_a-z~]|%[0-9a-f][0-9a' .
        '-f]|[!$&-,/:;=?+@])*+)?+`i'
    ;
		$replacement = '<a href="$0" target="_blank" rel="noopener noreferrer">$0</a>';
		$flags = ENT_COMPAT | ENT_HTML401;
		$value = htmlspecialchars($value,$flags,PUB_CHARSET);
		
		//送信内容確認画面ではURLのリンクを無効とする(Ver4.9)
		//$value = preg_replace($regex, $replacement,$value);
		
		return $value;
	}

	/**
	 * 特殊文字をHTMLエンティティに変換する（入力ボックス用）
	 * @param string $value 変換する文字列
	 * @return string 変換された文字列
	 * @access public
	 */
	function encode_input($value) {

		//汎用クラス（チェック・変換）
		$cstr = new CString();

		$flags = ENT_COMPAT | ENT_HTML401;
		return htmlspecialchars($value,$flags,PUB_CHARSET);
	}

	/**
	 * URLエンコードする
	 * @param string $url URL
	 * @return string エンコードされたURL
	 * @access public
	 */
	function encode_url($url) {
		return rawurlencode($url);
	}
}
?>
