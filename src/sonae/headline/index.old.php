
<ul>
<?php
// phpQueryの読み込み
require_once(dirname(__FILE__)."/phpQuery-onefile.php");

// HTMLデータを取得する
$HTMLData = file_get_contents('http://the-syakuya.bluebox.co.jp/co_event.html');
$HTMLData = mb_convert_encoding($HTMLData, 'HTML-ENTITIES', 'UTF-8');

// HTMLをオブジェクトとして扱う
$phpQueryObj = phpQuery::newDocument($HTMLData);


foreach($phpQueryObj['.ttl_box'] as $val) {

  // pq()メソッドでオブジェクトとして再設定しつつさらに下ってhrefを取得
  $title = pq($val)->find('a')->text();
  $url = pq($val)->find('a')->attr('href');

  echo '<li class="title"><a href="http://the-syakuya.bluebox.co.jp/'.$url.'" target="_blank">'.$title.'</a></li>';
	echo "\n";

}

?>
</ul>
			
