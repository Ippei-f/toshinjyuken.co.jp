<?php
//<meta charset="utf-8">
?>
<tr>
	<th>タイトル</th>
	<td><input type="text" size="40" name="data[title]" value="<?php echo $resDataArr[2]; ?>" /></td>
</tr>
<tr>
	<th>NEWマーク</th>
	<td><input type="hidden" name="data[news_newmark]" value="0" />
	<input type="checkbox" name="data[news_newmark]" value="1"<?php
$nowpage=$_SERVER['SCRIPT_NAME'];
switch(true){
	case (strpos($nowpage,'regist.php')!==false):
	echo ' checked="checked"';//新規登録なのでNEWマーク表示はデフォルト
	break;
	case (strpos($nowpage,'edit.php')!==false):
	echo ($resDataArr[11] == 1) ? ' checked="checked"' : '';
	break;
}
?> />
	（チェックで「NEWマーク」を表示します）</td>
</tr>
<?php require 'temp_php/mod/10-category.php'; ?>
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