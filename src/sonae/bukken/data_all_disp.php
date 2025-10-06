<?php
ini_set('display_errors', 0);
//$file = 'data.csv';
$fp = fopen($file, 'r');
$obj = array();
$keys = null;


// ------------------------------
// ページング処理用の変数
// 例 $pageID = 1のとき
//    csvデータを1-10件(ヘッダー除く)を取得する
//
//    $pageID = 2のとき
//    csvデータを11-20件(ヘッダー除く)を取得する
// ------------------------------
// 1ページで表示件数する
$disp = 12;

// ページ番号の設定
if (!intval($_REQUEST["page"]))
{
    $_REQUEST["page"]= 1;
}

// 取得するレコードの開始と終了
$start = (intval($_REQUEST["page"])-1 ) * $disp + 1;
$end   = intval($_REQUEST["page"])* $disp;

// レコードカウント変数
$count = 0;



while ($data = fgetcsv($fp, 1000,",")) {

    foreach ($data as &$value) {
        $value = nl2br($value);
    }
    unset($value);



    if ($keys === null) {
        $keys = $data;
    } else {


        $count++;
        if ($start <= $count && $count <= $end)
        {
            $obj[] = array_combine($keys, $data);
        }
    }
}

// ------------------------------
// 最大ページ数を算出
// ※list.phpでページングする際に必要
// ------------------------------
$_REQUEST["max_page"] = ceil($count / $disp);



#echo "<pre>";
#print_r($obj);
#echo "</pre>";

?>
