<?php
//<meta charset="utf-8">
/*
		会員限定ページを開いた時のログインチェック
*/

$member_prm=array();
switch(true){
	case isset($_SESSION['member-ID']):
	$member_prm['ID']=$_SESSION['member-ID'];
	break;
	case isset($_POST['member_id']):
	$member_prm['ID']=$_POST['member_id'];
	break;
}
switch(true){
	case isset($_SESSION['member-PW']):
	$member_prm['PW']=$_SESSION['member-PW'];
	break;
	case isset($_POST['member_pw']):
	$member_prm['PW']=$_POST['member_pw'];
	break;
}
switch(true){
	case !isset($member_check):
	case !isset($member_prm['ID']):
	case !isset($member_prm['PW']):
	case empty($member_prm['ID']):
	case empty($member_prm['PW']):
	case $member_prm['PW']!=$member_check[$member_prm['ID']]:
	$member_prm['err']=true;
	break;
}
//print_r($dir);
//print_r($member_prm);
if(isset($member_prm['err'])){
	header("Location: ".$dir['referer']);//戻り
	exit();
}
else if(isset($_POST['member_id'])){
	$_SESSION['member-ID']=$member_prm['ID'];
	$_SESSION['member-PW']=$member_prm['PW'];
}
?>