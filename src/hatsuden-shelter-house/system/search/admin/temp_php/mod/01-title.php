<?php
//<meta charset="utf-8">
?>
<tr>
	<th>タイトル</th>
	<td><input type="text" size="40" name="data[title]" value="<?php echo $resDataArr[2]; ?>" /></td>
</tr>
<tr>
	<th>ピックアップ</th>
	<td><input type="hidden" name="data[pickup]" value="0" />
	<input type="checkbox" name="data[pickup]" value="1"<?php echo ($resDataArr[9] == 1) ? ' checked="checked"' : '';?>/>
	（チェックで PICKUP に表示します）</td>
</tr>
<?php require 'temp_php/mod/10-category.php'; ?>
<tr>
	<th>リンク先</th>
	<td><input type="text" size="80" name="data[url]" value="<?php echo TextToKanma($resDataArr[4]);?>" /></td>
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