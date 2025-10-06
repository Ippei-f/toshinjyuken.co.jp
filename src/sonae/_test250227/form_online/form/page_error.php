<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5ZMSHR7');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "q9muz1rfb0");
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>入力エラー画面</title>
<link href="page.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../common/js/base.js"></script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5ZMSHR7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<p>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</p>
<div id="msgBox">
  <?php echo $errMsg; ?>
</div>
<p>うまく送信できない場合は　<a href="mailto:<?php echo $adminMail ?>"><?php echo $adminMail ?></a>　よりご連絡下さい。</p>
<input type="button" value=" 前画面に戻る " onclick="history.back()" />
</body>
</html>
