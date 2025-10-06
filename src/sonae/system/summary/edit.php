<?php
session_start();
require '../secret/login_check.php';

include '../secret/cms_now.php';//現在時刻・ページ
include '../secret/cms_param.php';//配列

include '../secret/record_read.php';//読み込み関数
include '../secret/record_edit.php';//記録
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
<h2>編集画面</h2>
<form action="" method="post" enctype="multipart/form-data">
<?php
include '../secret/func_edit.php';//関数
?>
<div class="dt_list">
<?php
FORM_INPUT('ID','hidden',array('text'=>$set_data['ID']));
FORM_INPUT('状態','radio');
FORM_INPUT('情報登録日','date',array('value'=>$set_type?$set_data['情報登録日']:date('Y-m-d')));
FORM_INPUT('情報更新日','date',array('value'=>$set_type?$set_data['情報更新日']:''));
FORM_INPUT('公開開始日時','datetime-local',array('text'=>'（空白で未設定）'));
FORM_INPUT('公開終了日時','datetime-local',array('text'=>'（空白で未設定）'));
FORM_INPUT('カテゴリ','radio');
FORM_INPUT('物件種別','text',array('other'=>'class="W100per"'));
FORM_INPUT('物件名','text',array('other'=>'class="W100per"'));
?>
</div>
<?php
/*
$fn='upload/';
$a=glob($fn.'id'.sprintf('%03d',$set_data['ID']).'-*');
print_r($a);
*/
?>
<div class="dt_list">
<dl><dt style="width:auto;">スライダー画像<br>（最上部の画像がサムネイルになります）</dt><dd><?php
FORM_FILE('photo',16);
?></dd></dl>
</div>
<div class="dt_list">
<?php
FORM_INPUT('販売価格','number',array('text'=>' 円'));
FORM_INPUT('表面利回り','number',array('text'=>' ％','other'=>'step="any"'));
FORM_INPUT('所在地','text',array('other'=>'class="W100per"'));
FORM_INPUT('所在地（一覧用）','text',array('name'=>'所在地一覧用','text'=>'（空白で「所在地」と同じ）'));
FORM_INPUT('土地権利');
FORM_INPUT('棟数 / 戸数');
FORM_INPUT('築年月','month');
FORM_INPUT('PRポイント','textarea');
?>
</div>
<div class="dt_list">
<?php
FORM_INPUT('GOOGLEMAP','textarea');
?>
</div>
<div class="dt_list">
<?php
$a=array();
$a[]=array('name'=>'物件詳細[]');
$a[]=array('name'=>'物件詳細[]','text'=>'上記と同様');
FORM_INPUT('物件名','hidden',$a[1]);
FORM_INPUT('所在地','hidden',$a[1]);
FORM_INPUT('交通','text',array('name'=>'物件詳細[]','other'=>'class="W100per"'));
?>
</div>
<div class="dt_list mgnTtume">
<?php
FORM_INPUT('販売価格','hidden',$a[1]);
FORM_INPUT('表面利回り','hidden',$a[1]);
FORM_INPUT('想定年間収入','number',array('name'=>'物件詳細[]','text'=>' 円　<span>（ <input type="number" k="yen_mon" value="" step="any"> 円/月）</span>'));
FORM_INPUT('築年月','hidden',$a[1]);
FORM_INPUT('土地権利','hidden',$a[1]);
FORM_INPUT('土地面積','text',$a[0]);
FORM_INPUT('私道負担面積','text',$a[0]);
FORM_INPUT('建物面積','text',$a[0]);
FORM_INPUT('間取り','text',$a[0]);
FORM_INPUT('階数','text',$a[0]);
FORM_INPUT('駐車場','text',$a[0]);
FORM_INPUT('建ぺい率','text',$a[0]);
FORM_INPUT('容積率','text',$a[0]);
FORM_INPUT('接道状況','text',$a[0]);
FORM_INPUT('地目','text',$a[0]);
FORM_INPUT('都市計画区域','text',$a[0]);
FORM_INPUT('用途地域','text',$a[0]);
FORM_INPUT('国土法届出','text',$a[0]);
FORM_INPUT('取引態様','text',$a[0]);
FORM_INPUT('現況','text',$a[0]);
FORM_INPUT('引渡可能年月','text',$a[0]);
FORM_INPUT('建築確認番号','text',$a[0]);
FORM_INPUT('管理番号','text',$a[0]);
FORM_INPUT('情報更新日','hidden',$a[1]);
FORM_INPUT('情報登録日','hidden',$a[1]);
FORM_INPUT('注意事項','text',$a[0]);
?>
</div>
<div class="btn_record"><input type="submit" name="submit" value="登録・更新"></div>
</form>
<script>
$(window).load(function(){
	LOCAL_SHUUNYUU1();
	$('input[name="物件詳細[想定年間収入]"]').on('change',function(){
		LOCAL_SHUUNYUU1();
	});
	$('input[k="yen_mon"]').on('change',function(){
		LOCAL_SHUUNYUU2();
	});
	//画像プレビュー
	$('input[type="file"]').on('change',function(){
		FORM_FILE_PREVIEW(this);
	});
	$('input[type="button"][value="削除"]').on('click',function(){
		FORM_FILE_DEL(this);
	});
});
function LOCAL_SHUUNYUU1(){
	v=$('input[name="物件詳細[想定年間収入]"]').val();
	$('input[k="yen_mon"]').val(v/12);
	//console.log(1);
}
function LOCAL_SHUUNYUU2(){
	v=$('input[k="yen_mon"]').val();
	$('input[name="物件詳細[想定年間収入]"]').val(v*12);
	//console.log(2);
}
function FORM_FILE_PREVIEW(e){
	//console.log(e.files);
	if(e.files[0]!=null){
		var fr = new FileReader();
		fr.readAsDataURL(e.files[0]);
		fr.onload = function(){
			var res = '<img src="'+fr.result+'">';
			$(e).parent().find('.thumb').html(res);
		}
	}
	else{
		$(e).parent().find('.thumb').html('');
		$(e).val('');
	}
}
function FORM_FILE_DEL(e){
	conf="このセットを削除してよろしいですか？";
	var del_v = $(e).parent().find('input[type="hidden"]').val();
	if(del_v!=''){
		conf+="アップロードファイルも削除されます。";
	}
	if(confirm(conf)){
		//del_n=$(e).parent().find('input[type="hidden"]').attr('name');
		//del_n='del_'+del_n;
		//console.log(del_n);
		$(e).parents('dd').append('<input type="hidden" name="del[]" value="'+del_v+'">');
		$(e).parents('li').fadeOut('fast',function(){$(e).parents('li').remove();});
	}
}
</script>
</main>
<?php include '../secret/parts_foot.php'; ?>
</body>
</html>