<?php
//<meta charset="utf-8">

$parts=array
('kukaku1'=>array
 						('form'=>'<span class="dpIB label sort">区画</span><font class="dpB"><span class="dpIB label">タイプ名</span><input type="text" size="20" name="data[kukaku_text][]" placeholder="○type" value=""/><span style="color:#F00;">（空白で項目非表示）</span></font><font class="dpB"><span class="dpIB label">VR見学ボタン</span><input type="text" size="40" name="data[kukaku_vr][]" value="" />（URL入力時にボタン表示）</font><font class="dpB" style="padding: 0.5em 0;"><span class="dpIB label">アウトレット</span><input type="hidden" name="data[kukaku_outlet][]" value="0" /><input type="checkbox" name="data[kukaku_outlet][]" value="1" style="vertical-align: bottom;"/>（チェックでWEB限定アウトレットボタン表示）</font><font class="dpB"><span class="dpIB label T">敷地・延床面積</span><textarea name="data[kukaku_text][]" rows="3" cols="30"></textarea></font><font class="dpB"><span class="dpIB label">販売価格</span><input type="text" size="10" name="data[kukaku_text][]" value="" /> 万円</font><font class="dpB"><span class="dpIB label">フリーワード</span><input type="text" size="40" name="data[kukaku_text][]" value="" /></font><font class="dpB"><span class="dpIB label">間取り</span>'.FILEFORM_TEMP('kukaku').'</font>'
						,'btn' =>'▲ 区画追加'
						)
);
?>
<table class="borderTable01">
<tr>
	<th colspan="2">販売区画</th>
</tr>
<tr>
	<th>区画図</th>
	<td><?php echo IMG_THUMB('kukaku'); ?></td>
</tr>
<tr>
	<th rowspan="2">各タイプ情報</th>
	<td><div class="padbox kukaku addbox sorttable">
	<?php
	if(empty($_GET['id'])){
		$arr=array('A','B','C','D');//初期設定
		foreach($arr as $k => $v){
			$arr[$k]=$v.'type';
		}
	}
	else{
		$arr=array();
		$cnt=65;
		for($i=0;$i<count($commentArr[9]);$i+=4){
			//$arr[]=$commentArr[9][$i];
			$arr[]='&#'.$cnt.'type';//7ビット文字表記
			$cnt++;
		}
	}
	//print_r($arr);
	//print_r($commentArr[20]);
	foreach($arr as $k => $v){
	$cmt=array(COMMENT_SET(9),COMMENT_SET(9),COMMENT_SET(9),COMMENT_SET(9),COMMENT_SET(10),CHECKBOX_ONOFF(20));
	$img=IMG_THUMB('kukaku');
	//if(!empty($_GET['id'])&&($cmt[0]=='')){continue;}	
	?>
	<div>
	<span class="dpIB label sort">区画</span>
	<font class="dpB"><span class="dpIB label">タイプ名</span><input type="text" size="20" name="data[kukaku_text][]" placeholder="<?php echo $v; ?>" value="<?php echo $cmt[0]; ?>"/><span style="color:#F00;">（空白で項目非表示）</span></font>
	<font class="dpB"><span class="dpIB label">VR見学ボタン</span><input type="text" size="40" name="data[kukaku_vr][]" value="<?php echo $cmt[4]; ?>" />（URL入力時にボタン表示）</font>
	<font class="dpB" style="padding: 0.5em 0;"><span class="dpIB label">アウトレット</span><?php echo $cmt[5]; ?>（チェックでWEB限定アウトレットボタン表示）</font>
	<font class="dpB"><span class="dpIB label T">敷地・延床面積</span><textarea name="data[kukaku_text][]" rows="3" cols="30"><?php echo $cmt[1]; ?></textarea></font>
	<font class="dpB"><span class="dpIB label">販売価格</span><input type="text" size="10" name="data[kukaku_text][]" value="<?php echo $cmt[2]; ?>" /> 万円</font>
	<font class="dpB"><span class="dpIB label">フリーワード</span><input type="text" size="40" name="data[kukaku_text][]" value="<?php echo $cmt[3]; ?>" /></font>
	<font class="dpB"><span class="dpIB label">間取り</span><?php echo $img; ?></font>
	<?php echo MAKE_BTN('del','削除'); ?>
	</div>
	<?php
		}
	?>
	<?php if(isset($id)){ ?>
	</div>
	</td>
</tr>
<tr>
	<td>
	<div style="background-color: aliceblue; padding: 0.25em 0.5em; margin-bottom: 1em;">新規区画（登録後再編集時に区画を並び替えることができるようになります。）</div>
	<div class="padbox kukaku addbox sorttable">
	<?php } ?>
	</div>
	<?php echo ADDBTN($parts); ?>
	</td>
</tr>
</table>
<?php echo ADDBTN_JQ($parts); ?>