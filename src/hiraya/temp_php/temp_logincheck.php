<?php
//<meta charset="utf-8">

//◆閲覧制限
session_start();
switch($p_limit){
	case 'soldout':
	header('Location:'.$link_list['物件情報'][0]);
	exit();
	break;
	case 'memberonly'://会員限定（会員登録がOKでないと一覧に戻される）
	if($_POST['login_check']=='on'){
		$flag=true;
		switch($_POST['login_id']){
			case $comp_data['login_id']:
				if($_POST['login_pw']!=$comp_data['login_pw']){$flag=false;}
			break;
			default:$flag=false;
		}
		if($flag){$_SESSION['member']='ok';}
	}
	if(!isset($_SESSION['member'])){
		header('Location:'.$link_list['物件情報'][0]);
    exit();
	}
	break;
	default:
	//通常ページ（保存したパスワードを破棄）
	//if(isset($_SESSION['member'])){unset($_SESSION['member']);}
	//if(isset($_SESSION['login_id'])){unset($_SESSION['login_id']);}
	//if(isset($_SESSION['login_pw'])){unset($_SESSION['login_pw']);}
}
?>