<?php
//do not touch area start
require_once("./always_include.php");
//do not touch area end
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
	<head>
<?php
/*
<!--#include virtual="../common/include/gtm-head.php" -->
*/
include '../common/include/gtm-head.php';
?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>オンライン面談受付|アパート経営【Sonae】東京・名古屋圏の不動産投資-東新住建</title>
		<meta name="description" content="新築でも10％以上の高利回りを実現、2,000万円台で新築1棟投資が可能。東京都、愛知県、名古屋市で投資用不動産の高利回り物件情報を公開中。不動産投資収益物件なら東新住建の土地を持たない収益重視型新築一棟投資『SONAE』にお任せください。" />
		
		<!-- do not touch area start -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script type="text/javascript" src="js/always_include.js"></script>
		<script type="text/javascript" src="js/bfcontact.js"></script>
		<script type="text/javascript" src="./setup.js"></script>
		<!-- do not touch area end -->

		<link rel="stylesheet" href="/sonae/common/css/reset.css">
		<link rel="stylesheet" href="/sonae/common/css/style.css">

		<!--font-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200;300;400;500;600;700;900&family=Passion+One:wght@400;700;900&display=swap" rel="stylesheet">

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

		<script>//bodyに各ページ固有のclassを設定
			document.addEventListener('DOMContentLoaded', function () {
				document.body.classList.add('page-inquiry', 'page-zoom', 'underPage');
			});
		</script>

		
		<div class="contentWrapper">

			<section class="" id="pageHeadSec">
				<div class="contBlock headerBlock">
					<div class="innerWrapper">
						<h2 class="secHeader">
							<p class="sub">オンライン面談受付</p>
							<p class="main pict"><img src="../common/images/title-zoom.svg" alt="INQUIRY" with="158px"></p>
						</h2>
					</div><!--innerWrapper-->
				</div><!--contBlock-->
			</section><!--pageHeadSec-->

			<section class="" id="sodanSec">
				<div class="wrapper">
					<div class="headerBlock">
						<figure class="pict">
							<img src="../images/zoom/zoomHeader.svg" alt="Zoomで何でも相談！オンライン面談受付">
						</figure>
					</div><!--headerBlock-->
					<div class="contBlock">
						<h3 class="header">
							どんなことでも気軽に相談できるオンライン面談
						</h3>
						<p class="text">
							ウェブ会議ツール『Zoom』を導入し、オンライン面談を行っております。<br>
							パソコンやスマートフォン、タブレットなどがあれば、どなたでも無料でご利用いただけます。<br>
							下記のフォームよりお申し込みください。
						</p>
						<ul>
							<li>・お客様のご希望に合わせてオンライン面談の日程を決定します</li>
							<li>・担当者よりZoomのURLをメールに送信します</li>
							<li>・予約日時になりましたら、URLへアクセスしてください</li>
						</ul>
					</div><!--contBlock-->
				</div><!--wrapper-->
					
			</section><!--sodanSec-->

			<p class="preText">
			下記フォームに必要事項をご記入の上送信してください。担当者より折返しご連絡いたします。
			</p>		

			<div class="formColumn">

				<form action="contact_confirm<?=PUB_SYSTEM_EXTENSION?>" method="post" enctype="multipart/form-data">
				<!-- 確認画面が不要な場合 -->
				<!-- <form action="contact_send.php" method="post"> -->

					
				<div class="inputBlock">

					<div class="formRow need" id="namaeRow">
						<p class="formTopicHeader">
							<!--名前-->
							<?= $arrBfContactForm["name"]["title"]?>
						</p>
						<div class="cont">
							<input type="text" class="<?= $arrBfContactForm["name"]["check"]?>" name="<?= $arrBfContactForm["name"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["name"]["value"])?>" placeholder="例）東新　太郎" />
								<div id="<?= $arrBfContactForm["name"]["name"]?>_er" style="color:red;"></div>
						</div>
					</div>

					<div class="formRow"  id="name-chkRow">
						<p class="formTopicHeader">ふりがな</p>
						<div class="cont">
							<input type="text" class="<?= $arrBfContactForm["name-kana"]["check"]?>" name="<?= $arrBfContactForm["name-kana"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["name-kana"]["value"])?>" placeholder="例）とうしん　たろう" />
								<div id="<?= $arrBfContactForm["name-kana"]["name"]?>_er" style="color:red;"></div>
						</div>
					</div>

					<div class="formRow need" id="emailRow">
						<p class="formTopicHeader">
							<!--メールアドレス-->
							<?= $arrBfContactForm["email"]["title"]?>
						</p>
						<div class="cont">
							<input type="text" class="<?= $arrBfContactForm["email"]["check"]?>" name="<?= $arrBfContactForm["email"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["email"]["value"])?>" placeholder="例）sample@co.jp"/>
							<div id="<?= $arrBfContactForm["email"]["name"]?>_er" style="color:red;"></div>
						</div>
					</div>

					<div class="formRow need" id="email-chkRow">
						<p class="formTopicHeader">
							<!--メールアドレス確認用-->
							<?= $arrBfContactForm["email_check"]["title"]?>
						</p>
						<div class="cont">
							<input type="text" class="<?= $arrBfContactForm["email_check"]["check"]?>" name="<?= $arrBfContactForm["email_check"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["email_check"]["value"])?>" placeholder="例）sample@co.jp" />
								<div id="<?= $arrBfContactForm["email_check"]["name"]?>_er" style="color:red;"></div>
							<p class="cap">確認のためにもう一度メールアドレスをご入力ください。</p>
						</div>
					</div>

					<div class="formRow need" id="namaeRow">
						<p class="formTopicHeader">
							<!--ご希望日-->
							<?= $arrBfContactForm["date"]["title"]?>
						</p>
						<div class="cont">
							<input type="text" class="<?= $arrBfContactForm["date"]["check"]?>" name="<?= $arrBfContactForm["date"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["date"]["value"])?>" placeholder="yyyy / mm / dd" required />
								<div id="<?= $arrBfContactForm["date"]["name"]?>_er" style="color:red;"></div>
						</div>
					</div>

					<div class="formRow need" id="namaeRow">
						<p class="formTopicHeader">
							<!--ご希望時間-->
							<?= $arrBfContactForm["select"]["title"]?>
						</p>
						<div class="cont">
							<label for="" class="selectBoxCase">
							<select class="<?= $arrBfContactForm["select"]["check"]?>" name="<?= $arrBfContactForm["select"]["name"]?>">
								<option value="" selected hidden disabled>選択してください</option>
								<option value="10:00"<?= ($arrBfContactForm["select"]["value"] == "10:00" ? " selected" : "")?>>10:00</option>
								<option value="11:00"<?= ($arrBfContactForm["select"]["value"] == "11:00" ? " selected" : "")?>>11:00</option>
								<option value="12:00"<?= ($arrBfContactForm["select"]["value"] == "12:00" ? " selected" : "")?>>12:00</option>
								<option value="13:00"<?= ($arrBfContactForm["select"]["value"] == "13:00" ? " selected" : "")?>>13:00</option>
								<option value="14:00"<?= ($arrBfContactForm["select"]["value"] == "14:00" ? " selected" : "")?>>14:00</option>
								<option value="15:00"<?= ($arrBfContactForm["select"]["value"] == "15:00" ? " selected" : "")?>>15:00</option>
								<option value="16:00"<?= ($arrBfContactForm["select"]["value"] == "16:00" ? " selected" : "")?>>16:00</option>
								<option value="17:00"<?= ($arrBfContactForm["select"]["value"] == "17:00" ? " selected" : "")?>>17:00</option>
								<option value="18:00"<?= ($arrBfContactForm["select"]["value"] == "18:00" ? " selected" : "")?>>18:00</option>
								<option value="19:00"<?= ($arrBfContactForm["select"]["value"] == "19:00" ? " selected" : "")?>>19:00</option>
								<option value="20:00"<?= ($arrBfContactForm["select"]["value"] == "20:00" ? " selected" : "")?>>20:00</option>
								<option value="21:00"<?= ($arrBfContactForm["select"]["value"] == "21:00" ? " selected" : "")?>>21:00</option>
							</select>
							</label><!--selectBoxCase-->
							
							<div id="<?= $arrBfContactForm["select"]["name"]?>_er" style="color:red;"></div>
						</div>
					</div>



					<div class="formRow" id="remarkRow">
						<p class="formTopicHeader">
							<!--備考欄-->
							<?= $arrBfContactForm["comment"]["title"]?>
						</p>
						<div class="cont">
							<textarea class="<?= $arrBfContactForm["comment"]["check"]?>" cols="30" rows="5" name="<?= $arrBfContactForm["comment"]["name"]?>" placeholder="例）〇月〇日〇時頃、現地見学希望です。"><?= $pubview->encode_input($arrBfContactForm["comment"]["value"])?></textarea>
								<!--div id="<?= $arrBfContactForm["comment"]["name"]?>_er" style="color:red;"></div-->
						</div>
					</div>
					</div><!--inputBlock-->


					<div class="formRow agreeBlock need">
						<p class="text">
							予め<a href="https://www.toshinjyuken.co.jp/corporate/privacy.html" target="_blank" class="linkText">個人情報保護方針</a>をお読みいただき、同意の上、お申込みください。
						</p>
						<div class="agreechk flexBox">
							<input type="checkbox" class="<?= $arrBfContactForm["agreechk"]["check"]?>" name="<?= $arrBfContactForm["agreechk"]["name"]?>" bchk="agreechk" value="個人情報保護方針について同意する">
							<p class="formTopicHeader">
								<!--個人情報保護方針について同意する-->
								<?= $arrBfContactForm["checkbox"]["title"]?>
							</p>
							<div id="<?= $arrBfContactForm["agreechk"]["name"]?>_er" style="color:red;"></div>
						</div>
					</div><!--agreeBlock-->

					<div class="noticeBlock">
						<p class="text">
							<span class="strong">フォーム送信後、自動返信メールを送信しています。</span>メールが届かない場合は以下の点をご確認ください。
						</p>
						<dl class="deciList">
							<li>
								<p class="num">1.</p>
								<div class="cont">
									<p class="header">迷惑メール（スパム）フォルダのほうもご確認ください。</p>
								</div>
							</li>
							<li>
								<p class="num">2.</p>
								<div class="cont">
									<p class="header">メールアドレスに間違いがないかご確認ください。</p>
								</div>
							</li>
							<li>
								<p class="num">3.</p>
								<div class="cont">
									<p class="header">迷惑メール設定をご確認ください。</p>
									<p class="text">
										docomo、au、softbankなど各キャリアのセキュリティ設定のためユーザー受信拒否と認識されているか、お客様が迷惑メール対策等でドメイン指定受信を設定されている場合、メールが届かないことがございます。<span class="strong">「toshinjyuken.co.jp」のドメインを受信できるように設定</span>をお願いいたします。
									</p>
								</div>
							</li>
						</dl>
						<p class="text pcOnly">上記、ご確認後なお自動返信メールが届かない場合は、お手数ですが <span class="strong">tel.0120-01-4898</span> までご連絡ください。</p>

					</div><!--noticeBlock-->

					<div id="error_message" style="text-align: center; color:red;"></div>
					<div style="text-align: center;">

						<!-- reCPATCHA only when used area start -->
						<div class="g-recaptcha" data-callback="clickReCaptcha" data-expired-callback="initReCaptcha" data-sitekey="<?= PUB_RE_CAPTCHA_KEY?>"></div>
						<input type="hidden" id="hid_recaptcha_flg" value="<?= PUB_RE_CAPTCHA?>" />
						<input type="hidden" id="hid_recaptcha_confirm" value="0" />
						<div id="recaptcha_er" style="color:red;"></div>
						<!-- reCPATCHA only when used area end -->

						<br />
						<br />
						
							<style>
								a#contact_submit{ margin:0 auto; }
							</style>
						
							<!-- 入力が完了していない状態に表示される（ID値は変更不可） -->
							<div id="required_confirm">必須項目が <span id="required_msg"></span> 件残っています</div>
							<!-- 入力が完了している状態に表示される（ID値は変更不可） -->
							<a href="javascript:void(0)" id="contact_submit" style="display:none;" >入力内容を確認する</a>
						
					</div>

					<div id="url_er" style="color:red;"></div>
					
					<!-- do not touch area start -->
					<input type="hidden" id="hid_input_check_flg" value="<?= PUB_INPUT_CHECK?>" />
					<input type="hidden" id="hid_upfile_extension" value="<?= PUB_UPFILE_EXTENSION?>" />
					<input type="hidden" id="hid_upfile_size" value="<?= PUB_UPFILE_SIZE?>" />
					<input type="hidden" id="hid_upfile_size_name" value="<?= PUB_UPFILE_SIZE_NAME?>" />
					<input type="hidden" id="hid_avaliable_url_num" value="<?= PUB_AVALIABLE_URL_NUM?>" />
					<!-- do not touch area end -->
				</form>

			</div><!--formColumn-->
		</div><!--contentWrapper-->

		<?php include('../common/include/footer.php'); ?>
	</body>
</html>
