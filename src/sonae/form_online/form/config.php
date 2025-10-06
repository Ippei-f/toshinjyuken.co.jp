<?php

//【重要】チェックボックスを使用する場合、inputタグに記述するname属性の値を必ず配列の形に。
// 例）name="●●●●●[]"


$adminMail = "customer@toshinjyuken.co.jp"; // 管理者メールアドレス(複数指定する場合は「,」で区切る)

$adminMail_from = "info@toshinjyuken.co.jp"; // 迷惑メール対策

$bccMail = "info@toshinjyuken.co.jp"; // Bccメールアドレス(複数指定する場合は「,」で区切る)

$reply = 1; // 自動返信メール(送る=1, 送らない=0)

$siteName = "土地を持たない収益重視型新築一棟投資『SONAE』"; // 自動返信メールの送信者欄に表示される名前（文字化けする場合は空に）

$hissuCheck = 0; // 必須入力項目(ある=1, ない=0)

$hissuItemKey = array('aaa','bbb','ccc'); // 必須入力項目(name属性値を指定）

$siteTop = "../../"; //サイトのトップページのURL

$postNameKey = "お名前"; // 差出人名(name属性値を指定）

$postMailKey = "メールアドレス"; // 差出人メールアドレス(name属性値を指定）

$postMailKey2 = "メールアドレス(確認)"; // 2重チェック用メールアドレス(name属性値を指定）

$confirmDsp = 1; // 送信確認画面の表示(する=1, しない=0)

$fileName ="index.php"; // このPHPファイルの名前

?>
