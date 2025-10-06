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
		<title>新規メンバーシップ登録|土地を持たない不動産投資｜SONAE</title>
		<meta name="description" content="SONAEは土地を持たずにはじめられる新築・築浅メゾネット1棟アパート投資。定期借地を活用し、利回り10％超を実現。低リスク・高収益の新しい不動産投資スタイル。" />
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
				document.body.classList.add('page-inquiry', 'page-membership', 'underPage');
			});
		</script>

		

		<div class="contentWrapper">
			<section class="" id="pageHeadSec">
				<div class="contBlock headerBlock">
					<div class="innerWrapper">
						<h2 class="secHeader">
							<p class="sub">新規メンバーシップ登録</p>
							<p class="main pict"><img src="../common/images/title-membership.svg" alt="MEMBERSHIP" with="263px"></p>
						</h2>

						<div class="secretBox">
							<p class="mark pict">
								<img src="../common/images/mark-secret.svg" alt="">
							</p>
							<p class="passion">SONAE<br>MENBERSHIP</p>
						</div><!--secretBox-->

						<p class="text">シークレット物件にアクセス可能なIDパスを即時発行</p>
					</div><!--innerWrapper-->
				</div><!--contBlock-->
			</section><!--pageHeadSec-->

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

						<div class="formRow need" id="phoneRow">
							<p class="formTopicHeader">
								<!--電話番号-->
								<?= $arrBfContactForm["tel"]["title"]?>
							</p>
							<div class="cont">
								<input type="text" class="<?= $arrBfContactForm["tel"]["check"]?>" name="<?= $arrBfContactForm["tel"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["tel"]["value"])?>" placeholder="例）09000110011" />
									<div id="<?= $arrBfContactForm["tel"]["name"]?>_er" style="color:red;"></div>
								<p class="cap">ハイフンなしで入力してください</p>
							</div>
						</div>

						<div class="formRow need" id="addressRow">
							<p class="formTopicHeader">
								<!--住所-->
								<?= $arrBfContactForm["address"]["title"]?>
							</p>
							<div class="cont zip">
								<div class="flex">
									〒
									<input type="text" class="<?= $arrBfContactForm["postal"]["check"]?>" maxlength="8" name="<?= $arrBfContactForm["postal"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["postal"]["value"])?>" onKeyUp="AjaxZip3.zip2addr(this, '', '<?= $arrBfContactForm["address"]["name"]?>', '<?= $arrBfContactForm["address"]["name"]?>', '', '', false);" placeholder="例）1010001" />
									<div id="<?= $arrBfContactForm["postal"]["name"]?>_er" style="color:red;"></div>
								</div>
								<p class="cap">ハイフンなしで入力してください</p>
							</div>
							<div class="cont">
								<input type="text" class="<?= $arrBfContactForm["address"]["check"]?>" name="<?= $arrBfContactForm["address"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["address"]["value"])?>"  placeholder="例）東京都〇〇〇区"/>
									<div id="<?= $arrBfContactForm["address"]["name"]?>_er" style="color:red;"></div>
							</div>
						</div>

						<div class="formRow need" id="jobsRow">
							<p class="formTopicHeader">
								<!--職業-->
								<?= $arrBfContactForm["jobs"]["title"]?>
							</p>
							<div class="cont">
								<label for="" class="selectBoxCase">
								<select class="<?= $arrBfContactForm["jobs"]["check"]?>" name="<?= $arrBfContactForm["jobs"]["name"]?>">
									<option value="" selected hidden disabled>選択してください</option>
									<option value="会社員"<?= ($arrBfContactForm["jobs"]["value"] == "会社員" ? " selected" : "")?>>会社員</option>
									<option value="会社役員"<?= ($arrBfContactForm["jobs"]["value"] == "会社役員" ? " selected" : "")?>>会社役員</option>
									<option value="会社経営者"<?= ($arrBfContactForm["jobs"]["value"] == "会社経営者" ? " selected" : "")?>>会社経営者</option>
									<option value="個人事業主"<?= ($arrBfContactForm["jobs"]["value"] == "個人事業主" ? " selected" : "")?>>個人事業主</option>
									<option value="専業主婦"<?= ($arrBfContactForm["jobs"]["value"] == "専業主婦" ? " selected" : "")?>>専業主婦</option>
									<option value="公務員"<?= ($arrBfContactForm["jobs"]["value"] == "公務員" ? " selected" : "")?>>公務員</option>
									<option value="専業大家"<?= ($arrBfContactForm["jobs"]["value"] == "専業大家" ? " selected" : "")?>>専業大家</option>
									<option value="学生"<?= ($arrBfContactForm["jobs"]["value"] == "学生" ? " selected" : "")?>>学生</option>
									<option value="パート・アルバイト"<?= ($arrBfContactForm["jobs"]["value"] == "パート・アルバイト" ? " selected" : "")?>>パート・アルバイト</option>
									<option value="その他"<?= ($arrBfContactForm["jobs"]["value"] == "その他" ? " selected" : "")?>>その他</option>
								</select>
								</label><!--selectBoxCase-->
								
								<div id="<?= $arrBfContactForm["jobs"]["name"]?>_er" style="color:red;"></div>
							</div>
						</div>

						<div class="formRow need" id="ageRow">
							<p class="formTopicHeader">
								<!--年齢-->
								<?= $arrBfContactForm["age"]["title"]?>
							</p>
							<div class="cont">
								<label for="" class="selectBoxCase">
								<select class="<?= $arrBfContactForm["age"]["check"]?>" name="<?= $arrBfContactForm["age"]["name"]?>">
									<option value="" selected hidden disabled>選択してください</option>
									<option value="20歳未満"<?= ($arrBfContactForm["age"]["value"] == "20歳未満" ? " selected" : "")?>>20歳未満</option>
									<option value="20代"<?= ($arrBfContactForm["age"]["value"] == "20代" ? " selected" : "")?>>20代</option>
									<option value="30代"<?= ($arrBfContactForm["age"]["value"] == "30代" ? " selected" : "")?>>30代</option>
									<option value="40代"<?= ($arrBfContactForm["age"]["value"] == "40代" ? " selected" : "")?>>40代</option>
									<option value="50代"<?= ($arrBfContactForm["age"]["value"] == "50代" ? " selected" : "")?>>50代</option>
									<option value="60代"<?= ($arrBfContactForm["age"]["value"] == "60代" ? " selected" : "")?>>60代</option>
									<option value="70代以上"<?= ($arrBfContactForm["age"]["value"] == "70代以上" ? " selected" : "")?>>70代以上</option>
								</select>
								</label><!--selectBoxCase-->
								
								<div id="<?= $arrBfContactForm["age"]["name"]?>_er" style="color:red;"></div>
							</div>
						</div>

						<div class="formRow need" id="incomeRow">
							<p class="formTopicHeader">
								<!--年収-->
								<?= $arrBfContactForm["income"]["title"]?>
							</p>
							<div class="cont">
								<label for="" class="selectBoxCase">
								<select class="<?= $arrBfContactForm["income"]["check"]?>" name="<?= $arrBfContactForm["income"]["name"]?>">
									<option value="" selected hidden disabled>選択してください</option>
									<option value="〜400万円"<?= ($arrBfContactForm["income"]["value"] == "〜400万円" ? " selected" : "")?>>〜400万円</option>
									<option value="〜600万円"<?= ($arrBfContactForm["income"]["value"] == "〜600万円" ? " selected" : "")?>>〜600万円</option>
									<option value="〜800万円"<?= ($arrBfContactForm["income"]["value"] == "〜800万円" ? " selected" : "")?>>〜800万円</option>
									<option value="〜1,000万円"<?= ($arrBfContactForm["income"]["value"] == "〜1,000万円" ? " selected" : "")?>>〜1,000万円</option>
									<option value="〜1,200万円"<?= ($arrBfContactForm["income"]["value"] == "〜1,200万円" ? " selected" : "")?>>〜1,200万円</option>
									<option value="〜1,400万円"<?= ($arrBfContactForm["income"]["value"] == "〜1,400万円" ? " selected" : "")?>>〜1,400万円</option>
									<option value="〜1,600万円"<?= ($arrBfContactForm["income"]["value"] == "〜1,600万円" ? " selected" : "")?>>〜1,600万円</option>
									<option value="〜1,800万円"<?= ($arrBfContactForm["income"]["value"] == "〜1,800万円" ? " selected" : "")?>>〜1,800万円</option>
									<option value="〜2,000万円"<?= ($arrBfContactForm["income"]["value"] == "〜2,000万円" ? " selected" : "")?>>〜2,000万円</option>
									<option value="〜3,000万円"<?= ($arrBfContactForm["income"]["value"] == "〜3,000万円" ? " selected" : "")?>>〜3,000万円</option>
									<option value="〜5,000万円"<?= ($arrBfContactForm["income"]["value"] == "〜5,000万円" ? " selected" : "")?>>〜5,000万円</option>
									<option value="1億円以上"<?= ($arrBfContactForm["income"]["value"] == "1億円以上" ? " selected" : "")?>>1億円以上</option>
								</select>
								</label><!--selectBoxCase-->
								
								<div id="<?= $arrBfContactForm["income"]["name"]?>_er" style="color:red;"></div>
							</div>
						</div>

						<div class="formRow need" id="fundsRow">
							<p class="formTopicHeader">
								<!--自己資金-->
								<?= $arrBfContactForm["funds"]["title"]?>
							</p>
							<div class="cont">
								<input type="text" class="<?= $arrBfContactForm["funds"]["check"]?> short" name="<?= $arrBfContactForm["funds"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["funds"]["value"])?>" />万円
									<div id="<?= $arrBfContactForm["funds"]["name"]?>_er" style="color:red;"></div>
							</div>
						</div>

						<div class="formRow need" id="budgetRow">
							<p class="formTopicHeader">
								<!--予算-->
								<?= $arrBfContactForm["budget"]["title"]?>
							</p>
							<div class="cont">
								<input type="text" class="<?= $arrBfContactForm["budget"]["check"]?> short" name="<?= $arrBfContactForm["budget"]["name"]?>" value="<?= $pubview->encode_input($arrBfContactForm["budget"]["value"])?>" />万円
									<div id="<?= $arrBfContactForm["budget"]["name"]?>_er" style="color:red;"></div>
							</div>
						</div>

						<div class="formRow need" id="estateRow">
							<p class="formTopicHeader">
								<!--保有不動産-->
								<?= $arrBfContactForm["estate"]["title"]?>
							</p>
							<div class="cont">
								<label for="" class="selectBoxCase">
								<select class="<?= $arrBfContactForm["estate"]["check"]?>" name="<?= $arrBfContactForm["estate"]["name"]?>">
									<option value="" selected hidden disabled>選択してください</option>
									<option value="なし"<?= ($arrBfContactForm["estate"]["value"] == "なし" ? " selected" : "")?>>なし</option>
									<option value="1件"<?= ($arrBfContactForm["estate"]["value"] == "1件" ? " selected" : "")?>>1件</option>
									<option value="2件"<?= ($arrBfContactForm["estate"]["value"] == "2件" ? " selected" : "")?>>2件</option>
									<option value="3件"<?= ($arrBfContactForm["estate"]["value"] == "3件" ? " selected" : "")?>>3件</option>
									<option value="4件"<?= ($arrBfContactForm["estate"]["value"] == "4件" ? " selected" : "")?>>4件</option>
									<option value="5件"<?= ($arrBfContactForm["estate"]["value"] == "5件" ? " selected" : "")?>>5件</option>
									<option value="6件"<?= ($arrBfContactForm["estate"]["value"] == "6件" ? " selected" : "")?>>6件</option>
									<option value="7件"<?= ($arrBfContactForm["estate"]["value"] == "7件" ? " selected" : "")?>>7件</option>
									<option value="8件"<?= ($arrBfContactForm["estate"]["value"] == "8件" ? " selected" : "")?>>8件</option>
									<option value="9件"<?= ($arrBfContactForm["estate"]["value"] == "9件" ? " selected" : "")?>>9件</option>
									<option value="10件以上"<?= ($arrBfContactForm["estate"]["value"] == "10件以上" ? " selected" : "")?>>10件以上</option>

								</select>
								</label><!--selectBoxCase-->
								
								<div id="<?= $arrBfContactForm["estate"]["name"]?>_er" style="color:red;"></div>
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
								<?= $arrBfContactForm["agreechk"]["title"]?>
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
							<a href="javascript:void(0)" id="contact_submit" style="display:none;">入力内容を確認する</a>
						
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
