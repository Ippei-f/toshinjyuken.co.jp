<?php
//<meta charset="utf-8">
?>
<main>
<?php
//print_r($set_data);
$result_type=isset($_GET['type'])?$_GET['type']:'normal';
switch($result_type){
	case 'del':
?>
<div class="result_msg">以下のデータを削除しますか？</div>
<?php
	break;
}
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="dt_list">
<?php
foreach($set_data as $k => $v){
	switch($k){
		case '状態':
		case 'カテゴリ':
		$v=$cms_param[$k][$v][0];
		break;
		case '公開開始日時':
		case '公開終了日時':
		if($v!=''){
			$v=date('Y-m-d　H:i',strtotime($v));
		}
		break;
	}
	if(is_array($v)){
		$a=array();
		foreach($v as $vk => $vv){
			$a[]='<div class="sub">'.$vk.' … '.$vv.'</div>';
		}
		$v=implode(PHP_EOL,$a);
	}
	echo '<dl><dt>'.$k.'</dt><dd>'.$v.'</dd></dl>'.PHP_EOL;
}

?>
</div>
<?php
switch($result_type){
	case 'del':
?>
<div class="btn_record"><input type="submit" name="submit" value="削除"></div>
<?php
	break;
}
?>
</form>
</main>