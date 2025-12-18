<?php
//<meta charset="utf-8">
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
	<th>各タイプ情報</th>
	<td>
	<?php
	$arr=array('A','B','C','D','E','F','G','H','I','J');
	foreach($arr as $k => $v){
	?>
	<div class="padbox kukaku dotline">
	<div><span class="dpIB label">タイプ名</span><input type="text" size="20" name="data[kukaku_text][]" placeholder="<?php echo $v; ?>type" value="<?php echo COMMENT_SET(9); ?>"/></div>
	<div><span class="dpIB label">VR見学ボタン</span><?php
	/*
	<?php echo CHECKBOX_ONOFF(10); ?>表示
	*/
	?><input type="text" size="40" name="data[kukaku_vr][]" value="<?php echo COMMENT_SET(10); ?>" />（URL入力時にボタン表示）</div>
	<div><span class="dpIB label T">敷地・延床面積</span><textarea name="data[kukaku_text][]" rows="3" cols="30"><?php echo COMMENT_SET(9); ?></textarea></div>
	<div><span class="dpIB label">販売価格</span><input type="text" size="10" name="data[kukaku_text][]" value="<?php echo COMMENT_SET(9); ?>" /> 万円</div>
	<div><span class="dpIB label">フリーワード</span><input type="text" size="40" name="data[kukaku_text][]" value="<?php echo COMMENT_SET(9); ?>" /></div>
	<div><span class="dpIB label">間取り</span><?php echo IMG_THUMB('kukaku'); ?></div>
	</div>
	<?php
		}
	?>
	<div style="height: 0.5em;"></div>
	</td>
</tr>
</table>