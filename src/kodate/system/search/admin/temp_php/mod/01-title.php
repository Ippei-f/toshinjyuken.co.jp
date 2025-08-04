<?php
//<meta charset="utf-8">
?>
<tr>
	<th>物件名</th>
	<td><?php /* <span class="dpIB label">スケルトンオーダー</span> */ ?><input type="text" size="40" name="data[title]" placeholder="○○市△△" value="<?php echo $resDataArr[2]; ?>"/></td>
</tr>
<tr>
	<th>サブタイトル</th>
	<td><?php /*<span class="dpIB label">物件名上部：</span>*/ ?><input type="text" size="40" name="data[title_sub][]" value="<?php echo COMMENT_SET(19); ?>" /> ※物件名の上部に表記されます
	<?php /*<hr>*/ ?></td>
</tr>
<?php require 'temp_php/mod/10-category.php'; ?>
<tr>
	<th>住所</th>
	<td><input type="text" size="40" name="data[comment][]" value="<?php echo COMMENT_SET(6); ?>" /></td>
</tr>
<tr>
	<th>交通</th>
	<td><textarea name="data[comment][]" rows="5" cols="60"><?php echo COMMENT_SET(6); ?></textarea></td>
</tr>