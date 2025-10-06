<?php
//<meta charset="utf-8">

//再度開く時はログインボックス省略
$flag=false;
switch(true){
	case !isset($member_check):
	case !isset($_SESSION['member-ID']):
	case !isset($_SESSION['member-PW']):
	case $_SESSION['member-PW']!=$member_check[$_SESSION['member-ID']]:
	$flag=true;
}
if($flag){
?>
<style>
.cms_loginbox{
	display: none;
	position: relative;
	z-index: 10100;
}
.cms_loginbox .dark{
	background-color: rgba(0, 0, 0, 0.5);
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
}
.cms_loginbox .frame,
.cms_loginbox .frame .header,
.cms_loginbox .frame .in,
.cms_loginbox .frame .in > *{
	display: flex;
	flex-direction: column;
	justify-content: flex-start;
	align-items: center;
}
.cms_loginbox .frame .in > *{width:100%;}
.cms_loginbox .frame{
	position: relative;
	background-color: #FFF;
	width: 614px;
	max-width: 90%;
	max-height: calc(100% - 75px * 2);
	margin-bottom: -74px;
	border-radius: 20px;
	padding: 55px 25px;
	gap: 20px;
}
.cms_loginbox .frame .close{
	position: absolute;
	top: -74px;
	right: 0;
	width: 64px;
	height: 64px;
	cursor: pointer;
	display: flex;
	justify-content: center;
	align-items: center;
}
.cms_loginbox .frame .close::before,
.cms_loginbox .frame .close::after{
	content: '';
	display: block;
	position: absolute;
	width: 140%;
	margin: 0 -20%;
	border-top:solid 2px #FFF;
}
.cms_loginbox .frame .close::before{transform: rotate(45deg);}
.cms_loginbox .frame .close::after{transform: rotate(-45deg);}
.cms_loginbox .frame .header{gap:10px;}
.cms_loginbox .frame .header img{width:126px;}
.cms_loginbox .frame .header .passion{
	text-align: center;
	font-size: 20px;
	line-height: 1em;
	color: var(--karashiText);
}
.cms_loginbox .frame .overflow{
	overflow: auto;
	width:100%;
}
.cms_loginbox .frame .in{
	width:448px;
	max-width: 100%;
	margin: auto;
	font-size: 14px;
}
.cms_loginbox .frame .text{
	width: 100%;
	margin-bottom: 20px;
}
.cms_loginbox .frame .text > *{
	white-space: pre-wrap;
	max-width: 100%;
}
.cms_loginbox .frame form{
	gap:20px;
	margin-bottom: 40px;
}
.cms_loginbox .frame form dl{
	width: 100%;
	gap: 0.5em 0;
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	align-items: center;
}
.cms_loginbox .frame form dt{
	text-align: left;
	width: 6em;
	min-width: 6em;
}
.cms_loginbox .frame form dd{flex-grow: 1;}
.cms_loginbox .frame form dd input{
	display: block;
	width:100%;
	padding: 0.5em 1em;
	font-size: 1em;
	background-color: #EAEAEA;
}
.cms_loginbox .frame .f_member{
	background-color: #414141;
	border-radius: 1em;
	padding: 15px 20px 20px;
	gap: 20px;
}
.cms_loginbox .frame .f_member > div{
	text-align: justify;
	color:#FFF;
}
.cms_loginbox .frame .f_member > div strong{color: var(--karashiText);}
.cms_loginbox .frame .f_member > .joinMemberBtn{background-color: #FFF;}
</style>
<script>
$(function(){
	$('.card.secret a').on('click',function(){
		$('.cms_loginbox').fadeIn();
		$(".cms_loginbox form").prop("action",$(this).attr("href"));
		return false;
	});
	$(".cms_loginbox .close").on('click',function(){
		$(".cms_loginbox").fadeOut();
	});
});
</script>
<section class="cms_loginbox">
<div class="dark"><div class="frame">
<div class="close"></div>
<div class="header">
<p class="mark pict"><img src="common/images/mark-secret.svg" alt="SONAE MENBERSHIP"></p>
<p class="passion">SONAE<br>MENBERSHIP</p>
</div>
<div class="overflow"><div class="in">

<div class="text"><div>こちらは<strong>SONAEメンバーシップ限定ページ</strong>となります。
ログインID、パスワードをご入力ください</div></div>

<form action="" method="post">
<dl><dt>ログインID</dt><dd><input type="text" name="member_id"></dd></dl>
<dl><dt>パスワード</dt><dd><input type="password" name="member_pw"></dd></dl>
<input type="submit" name="login" value="ログイン" class="btn joinMemberBtn">
</form>

<div class="f_member"><div>ログインID、パスワードをお持ちでない方は、こちらから登録をお願いします。SONAEメンバーシップに登録をしていただきますと<strong>シークレット物件の閲覧や、新着物件を優先的にご案内するLINEサービス</strong>をご利用いただけます。</div>
<a href="membership/contact.php" class="btn joinMemberBtn">メンバーシップ登録はこちら</a>
</div>

</div></div>

</div></div>
</section>
<?php
}//if($flag)
?>