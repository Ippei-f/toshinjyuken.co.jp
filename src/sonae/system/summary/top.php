<?php
session_start();
require '../secret/login_check.php';

include '../secret/cms_now.php';//現在時刻・ページ
include '../secret/cms_param.php';//配列

include '../secret/record_read.php';//読み込み関数
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include '../secret/parts_meta.php'; ?>
</head>

<body id="<?php echo $nowpage_db['type']; ?>">
<?php include '../secret/parts_head.php'; ?>
<main>
<h2>物件一覧</h2>

<table class="top_list">
<thead><tr>
<td>ID</td>
<td style="width: 5em;">状態</td>
<td style="width: 11em;">日付</td>
<td style="width: 8em;">カテゴリ</td>
<td style="width: 6em;">外観</td>
<td>物件名</td>
<td>ボタン</td>
</tr></thead>
<tbody>
<?php
$fn='data/list.txt';
$fdata=RECORD_R_DATA($fn);
$fdata=RECORD_R_LISTDATA($fdata);
foreach($fdata as $k => $v){
	$t=array();
	$t['状態']=$cms_param['状態'][$v[1]];
	$t['状態']=isset($t['状態']['略'])?$t['状態']['略']:$t['状態'][0];
	$t['日付']=array();
	if($v[2]!=''){$t['日付'][]='登録：'.date('Y/m/d',strtotime($v[2]));}
	if($v[3]!=''){$t['日付'][]='更新：'.date('Y/m/d',strtotime($v[3]));}
	if($v[4]!=''){$t['日付'][]='開始：'.date('Y/m/d H:i',strtotime($v[4]));}
	if($v[5]!=''){$t['日付'][]='終了：'.date('Y/m/d H:i',strtotime($v[5]));}
	$t['日付']=implode('<br>',$t['日付']);
	$t['カテゴリ']=$cms_param['カテゴリ'][$v[6]][0];
	$t['外観']=glob('upload/id'.sprintf('%03d',$v[0]).'-*');
	$t['外観']=!empty($t['外観'])?'<img src="'.$t['外観'][0].'">':'';
	echo '<tr>
<th>'.$v[0].'</th>
<td class="font_mini"><div>'.$t['状態'].'</div></td>
<td class="font_mini"><div>'.$t['日付'].'</div></td>
<td class="font_mini"><div>'.$t['カテゴリ'].'</div></td>
<td class="thumb">'.$t['外観'].'</td>
<td>'.$v[7].'</td>
<td class="btn"><a href="edit.php?id='.$v[0].'">編集</a><a href="result.php?id='.$v[0].'&type=del">削除</a></td>
</tr>'.PHP_EOL;
	/*
	<form>複製</form>
	*/
}
?>
</tbody>
</table>
<?php
/*
<div class="top_list">
<dl><dd>ID</dd><dd>状態</dd></dl>
<?php
$fn='data/list.txt';
$fdata=RECORD_R_DATA($fn);
$fdata=RECORD_R_LISTDATA($fdata);
//print_r($fdata);
foreach($fdata as $k => $v){
	$t=array();
	foreach($v as $vk => $vv){
		$t[]=$vv;
	}
	echo '<dl><dd>'.implode('</dd><dd>',$t).'</dd><dd class="btn"><a href="edit.php?id='.$v[0].'">編集</a><a href="result.php?id='.$v[0].'&type=del">削除</a></dd></dl>'.PHP_EOL;
}
?>
</div>

<div class="top_list">
<dl><dd>ssss</dd><dd>ssss</dd></dl>
<dl><dd>ID</dd><dd>状態</dd><dd>更新日時</dd><dd>定期借地権物件/所有権物件</dd><dd>画像</dd><dd>所在地</dd><dd>物件種別</dd><dd>土地権利</dd><dd>販売価格</dd><dd>想定年間収入</dd><dd>表面利回り</dd><dd><a href="edit.php?id=1">編集</a><a href="result.php?id=1&type=del">削除</a></dd></dl>
</div>
*/
?>
</main>
<?php include '../secret/parts_foot.php'; ?>
</body>
</html>