<?php
//do not touch area start
require_once("./always_include.php");
//do not touch area end
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>エラー画面</title>
		<!-- do not touch area start -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="js/always_include.js"></script>
		<script type="text/javascript" src="js/bfcontact.js"></script>
		<script type="text/javascript">
			var arrBfContactChkLists = [];
			var PUB_MAIL_CONFIRM_RETURN_URL = "<?= PUB_MAIL_CONFIRM_RETURN_URL?>";
			var PUB_SYSTEM_EXTENSION = "<?=PUB_SYSTEM_EXTENSION?>";
		</script>
		<!-- do not touch area end -->
	</head>
	<body>
		<div>エラー内容：<?= $session->get("BF_CONTACT_FORM_ERROR_MSG");?></div>

		<div style="top:5px; text-align:center;">

			<form action="contact<?=PUB_SYSTEM_EXTENSION?>" method="post">
				<!-- do not touch area start -->
<?php	foreach ($arrBfContactForm as $key => $value) { ?>
				<input type="hidden" name="<?= $arrBfContactForm[$key]["name"]?>" value="<?= $pubview->encode_input($session->get("BF_CONTACT_FORM_". $arrBfContactForm[$key]["name"]. "_VALUE"))?>" />
<?php	} ?>
				<!-- do not touch area end -->


				<input type="button" value="お問い合わせフォームに戻る" onclick="returnContactForm();" />
			</form>

		</div>
	</body>
</html>
