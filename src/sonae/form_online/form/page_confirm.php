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
<!-- Google Tag Manager 2025/03/25追加 --> 
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PRRJRDR');</script> 
<!-- End Google Tag Manager -->
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "q9muz1rfb0");
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>送信確認画面</title>
<link href="page.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../common/js/base.js"></script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5ZMSHR7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<p>以下の内容で間違いがなければ、「送信する」ボタンを押してください。</p>
<form action="<?php echo $fileName; ?>" method="post" enctype="multipart/form-data">
  <div id="msgBox">
    <table border="0" cellpadding="0" cellspacing="0">
<?php
foreach($_POST as $key=>$val) {
	$out = '';
	if(is_array($val)){
		foreach($val as $item){ 
			$out .= $item . ','; 
		}
		if(substr($out,strlen($out) - 1,1) == ',') { 
			$out = substr($out, 0 ,strlen($out) - 1); 
		}
	}
	else { 
		$out = $val; 
	}//チェックボックス（配列）追記ここまで
	if(get_magic_quotes_gpc()) { 
		$out = stripslashes($out); 
	}
	$out = h($out);
	$out=nl2br($out);//※追記 改行コードを<br>タグに変換
	$key = h($key);
	print("<tr>\n");
	print("<td nowrap=\"nowrap\" class=\"l_Cel\">$key</td>\n");
	print("<td>$out ");
	$out=str_replace("<br />","",$out);//※追記 メール送信時には<br />タグを削除
	$out=str_replace("<br>","",$out);//※追記 メール送信時には<br>タグを削除
	print("<input type=\"hidden\" name=\"$key\" value=\"$out\">");
	print("</td>\n");
	print("</tr>\n");
}
?>
    </table>
  </div>
  <input type="hidden" name="confirm_submit" value="confirm_submit" />
  <input type="hidden" name="httpReferer" value="<?php echo $_SERVER['HTTP_REFERER'] ;?>" />
  <input type="submit" value="　送信する　" />
  <input type="button" value="前画面に戻る" onclick="history.back()" />
</form>
</body>
</html>
