<?php
session_start();
require '../secret/login_check.php';

include '../secret/cms_now.php';//現在時刻・ページ
include '../secret/cms_param-info.php';//配列（新着用）

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
FORM_INPUT('情報更新日','date',array('value'=>$set_type?date('Y-m-d'):''));
FORM_INPUT('公開開始日時','datetime-local',array('text'=>'（空白で未設定）'));
FORM_INPUT('公開終了日時','datetime-local',array('text'=>'（空白で未設定）'));
FORM_INPUT('カテゴリ','radio');
FORM_INPUT('タイトル','text',array('other'=>'class="W100per"'));
FORM_INPUT('本文','editor');
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
<dl><dt style="width:auto;">画像<br>（最上部の画像がサムネイルになります）</dt><dd><?php
FORM_FILE('photo',10);
?></dd></dl>
</div>
<div class="btn_record"><input type="submit" name="submit" value="登録・更新"></div>
</form>
<script>
$(window).load(function(){
	//エディター関連
	EDITOR_PREVIEW($('.editor textarea'));
	$('.editor textarea').on('keyup',function(){
		EDITOR_PREVIEW(this);
	});
	$('.editor .menu .tag_select').on('change',function(){
		EDITOR_SELECT(this);
	});
	$('.editor .menu input[type="button"]').on('click',function(){
		EDITOR_INSERT(this);
	});
	$('.editor .menu .c1_set font').on('click',function(){
		EDITOR_COLOR_PALETTE(this);
	});
	$('.editor .menu .n1_set font').on('click',function(){
		EDITOR_FONTSIZE(this);
	});
	$('.editor .menu .n2_set font').on('click',function(){
		EDITOR_IMGSIZE(this);
	});
	//画像プレビュー
	$('input[type="file"]').on('change',function(){
		FORM_FILE_PREVIEW(this);
	});
	$('input[type="button"][value="削除"]').on('click',function(){
		FORM_FILE_DEL(this);
	});
});
function EDITOR_PREVIEW(e){
	var res = $(e).val();
	$(e).parent().find('.preview').html(res);
}
function EDITOR_SELECT(e){
	var v = $(e).val();
	var t1 = '';
	//console.log(v);
	$(e).nextAll().hide();
	if(v!=''){
		$(e).parent().find('input[type="button"]').show();
	}
	
	switch(v){
		case '':
		break;
		default:
		$(e).parent().find('.c1_set').show();
		$(e).parent().find('.n1_set').show();
		$(e).parent().find('.n1').attr('min',10);
		$(e).parent().find('.n1').attr('max',100);
		$(e).parent().find('.n1').val('');
		$(e).parent().find('.t2').attr('placeholder','テキスト');
		$(e).parent().find('.t2').show();
		$(e).parent().find('.s1').show();
		break;
	}
	switch(v){
		case 'リンク':
		t1 = $(e).parent().find('.t1');
		t1.prop('type','text');
		t1.attr('placeholder','リンク先URL');
		t1.attr('size','60');
		t1.val('');
		t1.show();
		break;
		case '画像タグ':
		t1 = $(e).parent().find('.t1');
		t1.prop('type','text');
		t1.attr('placeholder','画像URL');
		t1.attr('size','30');
		t1.val('');
		t1.show();
		$(e).parent().find('.n2_set').show();
		$(e).parent().find('.n2').val(1);
		$(e).parent().find('.t2').attr('placeholder','キャプション');
		break;
	}
}
function EDITOR_INSERT(e){
	var v = $(e).parent().find('.tag_select').val();
	var tag = [];
	tag['attr'] = '';
	tag['style'] = '';
	tag['text'] = $(e).parent().find('.t2').val();
	tag['type'] = 'normal';
	switch(v){
		case ''://空白
		break;
		default://基本
		tag['tag'] = v;
		break;
		case 'リンク':
		tag['tag'] = 'a';
		tag['val'] = $(e).parent().find('.t1').val();
		if(tag['val']!=''){tag['attr'] += ' href="'+tag['val']+'" target="_blank"';}
		break;
		case '画像タグ':
		tag['tag'] = 'img';
		tag['val'] = $(e).parent().find('.t1').val();
		if(tag['val']!=''){
			tag['attr'] += ' src="'+tag['val']+'"';
		}
		tag['type'] = tag['tag'];
		break;
	}
	switch(tag['type']){
		case 'img':
		tag['tag']='<'+tag['tag']+tag['attr']+'>';
		if(tag['text']!=''){tag['tag'] += '<figcaption>'+tag['text']+'</figcaption>';}
		tag['tag']='<figure>'+tag['tag']+'</figure>';
		break;
		default:
		tag['val'] = $(e).parent().find('.c1').val();
		if(tag['val']!=''){tag['style'] += 'color:'+tag['val']+';';}
		tag['val'] = $(e).parent().find('.n1').val();
		if(tag['val']!=''){tag['style'] += 'font-size:'+tag['val']+'px;';}
		tag['val'] = $(e).parent().find('.s1').val();
		if(tag['val']!=''){tag['style'] += 'text-align:'+tag['val']+';';}
		if(tag['style']!=''){tag['attr'] += ' style="'+tag['style']+'"';}
		tag['tag']='<'+tag['tag']+tag['attr']+'>'+tag['text']+'</'+tag['tag']+'>';
	}
	//console.log(tag['tag']);
	tag['textarea']=$(e).parents('.editor').find('.edit textarea');
	tag['val'] = tag['textarea'].val();
	tag['val'] += tag['tag'];
	tag['textarea'].val(tag['val']);
	$(e).parents('.editor').find('.edit .preview').html(tag['val']);
}
function EDITOR_COLOR_PALETTE(e){
	var v = $(e).attr('color');
	$(e).parent().find('.c1').val(v);
}
function EDITOR_FONTSIZE(e){
	var v = $(e).attr('n');
	//console.log(v);
	$(e).parent().find('.n1').val(v);
}
function EDITOR_IMGSIZE(e){
	var prm = [];
	prm['num'] = $(e).parent().find('.n2').val();
	console.log(prm['num']);
	if(prm['num']!=''){
		prm['val'] = ('000'+prm['num']).slice(-3);//3ケタ
		prm['val'] = '<?php echo 'upload/id'.sprintf('%03d',$set_data['ID']).'-photo'; ?>'+prm['val']+'.';
		prm['search'] = $('input[type="hidden"][value*="'+prm['val']+'"]').val();
		if(prm['search']){prm['val'] = prm['search'];}
		else{
			prm['search'] = $('.file_set > li:nth-child('+prm['num']+') > input[type="file"]').val();
			if(prm['search']){
				prm['search'] = prm['search'].split('.');
				prm['val'] += prm['search'][1];
			}
		}
		//console.log(prm['search']);
		$(e).parents('.menu').find('.t1').val(prm['val']);
	}
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