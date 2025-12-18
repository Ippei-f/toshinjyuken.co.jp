<?php
//<meta charset="utf-8">
?>
<tr><?php // class="cate_onoff c1" ?>
<th>直リンクURL</th>
<td><input type="text" name="data[url]" size="40" value="<?php echo TextToKanma($resDataArr[4]);?>" /><br />
リンクの開き方：
<input type="radio" name="data[window]" value="1"<?php echo ($resDataArr[5] == 1) ? ' checked="checked"' : '';?> /> 同一ウインドウ　 
<input type="radio" name="data[window]" value="2"<?php echo ($resDataArr[5] == 2) ? ' checked="checked"' : '';?> /> 別ウインドウ
<br />（タイトルから直接リンクしますので詳細ページは無効になります）</td>
</tr>
<tr><?php // class="cate_onoff c1" ?>
<th>直リンクファイル<br />（<?php echo $maxbyte; ?>以内）
<?php	
foreach($extensionList as $val){
	$upFilePath_linkfile = $img_updir.'/'.$resDataArr[0].'-0link_file.'.$val;
	if(file_exists($upFilePath_linkfile)){
		echo "<br />現在のファイル<br /><a target=\"_blank\" href=\"{$upFilePath_linkfile}\">リンクファイル</a>";
		echo '　<input type="checkbox" name="link_file_del['.$upFilePath_linkfile.']" value="true"> 削除';
		break;
	}
}
?>
</th>
<td>
<input type="file" name="data[link_file][]"><br />
（タイトルからファイルに直接リンクしますので詳細ページは無効になります）<br />
※<?php echo $permissionExtension;?>のみ。縮小はされません。
</td>
</tr>