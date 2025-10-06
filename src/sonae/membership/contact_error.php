<?php
//do not touch area start
require_once("./always_include.php");
//do not touch area end
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>エラー画面|SONAE</title>
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

		<link rel="stylesheet" href="/sonae/common/css/reset.css">
		<link rel="stylesheet" href="/sonae/common/css/style.css">

		<!--font-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200;300;400;500;600;700;900&family=Passion+One:wght@400;700;900&display=swap" rel="stylesheet">

		<!--swiper-->
		<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
		/>
		<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


		<!-- タブレット最適化表示用 -->
		<script>
			var d=window.document;
			if(
				navigator.userAgent.indexOf('iPhone')>-1||navigator.userAgent.indexOf('iPod')>0||navigator.userAgent.indexOf('Android')>0
			)
				d.write('<meta id="vp" name="viewport" content="width=device-width; initial-scale=1;">');
			else if(
				navigator.userAgent.indexOf('iPad')>-1||navigator.userAgent.indexOf('macintosh')>-1 && 'ontouchend' in document||navigator.userAgent.indexOf('Android')>0&&navigator.userAgent.indexOf('Mobile')==-1
			)
				d.write('<meta name="viewport" content="width=1300, maximum-scale=1, user-scalable=yes"><link rel="stylesheet" type="text/css" href="../common/css/ipad.css" media="all">');
		</script>
		
		<script>
		if (screen.width > 767){
			//var Android = document.getElementById('vp');
			//Android.setAttribute('content','width=1200');
		
			var metalist = document.getElementsByTagName('meta');
			for(var i = 0; i < metalist.length; i++) {
				var name = metalist[i].getAttribute('name');
				if(name && name.toLowerCase() === 'viewport') {
					metalist[i].setAttribute('content', 'width=1300');
					break;
				}
			}
		}
		</script>
	</head>
	<body>

		<?php include('../common/include/header.php'); ?>

		<div class="contWrapper">

		
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

		</div><!--contWrapper-->

		<?php include('../common/include/footer.php'); ?>
	</body>
</html>
