<?php
//<meta charset="utf-8">
?>
<tr>
	<th>タイトル</th>
	<td><textarea name="data[title]" rows="3" cols="60"><?php echo TextToKanma($resDataArr[2]); ?></textarea></td>
</tr>
<?php
/*
//ボツ
<tr>
	<th>CASE番号</th>
	<td><input type="number" name="data[case]" value="<?php echo $resDataArr[8]; ?>" style="width:5em; padding: 0.25em; text-align: right;" /></td>
</tr>
*/
?>
<?php require 'temp_php/mod/10-category.php'; ?>
<tr>
	<th>住所・名前</th>
	<td><input type="text" size="10" name="data[name][]" value="<?php echo COMMENT_SET(9); ?>" placeholder="＊＊市" />　
	<input type="text" size="5" name="data[name][]" value="<?php echo COMMENT_SET(9); ?>" placeholder="＊" /> 様</td>
</tr>
<tr>
	<th>ご家族構成</th>
	<td><input type="text" size="40" name="data[name][]" value="<?php echo COMMENT_SET(9); ?>" placeholder="＊＊＊、＊＊＊、＊＊＊" /></td>
</tr>
<?php
/*
<tr>
	<th>住所</th>
	<td><input type="text" size="40" name="data[comment][]" value="<?php echo COMMENT_SET(6); ?>" /></td>
</tr>
<tr>
	<th>交通</th>
	<td><textarea name="data[comment][]" rows="5" cols="60"><?php echo COMMENT_SET(6); ?></textarea></td>
</tr>
*/
?>
<?php //require 'temp_php/mod/11-chokulink.php'; ?>