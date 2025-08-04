<?php
//<meta charset="utf-8">
?>
<table class="borderTable01">
<tr>
	<th>物件概要</th>
	<td><textarea name="data[comment][]" rows="10" cols="60"><?php echo COMMENT_SET(6); ?></textarea></td>
</tr>
<tr>
	<th>販売会社</th>
	<td>
	<span class="dpIB label T">文字：大</span><textarea name="data[comment][]" rows="3" cols="40"><?php echo COMMENT_SET(6); ?></textarea>
	<hr>
	<span class="dpIB label T">文字：小</span><textarea name="data[comment][]" rows="3" cols="40"><?php echo COMMENT_SET(6); ?></textarea>
	</td>
</tr>
<tr>
	<th>資料ダウンロード</th>
	<td>
	<?php
	$shiryou=array();
	if($resDataArr[0]!=''){
		$shiryou['file']=glob('../upload/shiryou/'.$resDataArr[0].'/*');
		if(file_exists($shiryou['file'][0])){
			$shiryou['name']=explode('/',$shiryou['file'][0]);
			$shiryou['name']=explode('.',end($shiryou['name']));
			echo '<span class="dpIB label"><a href="'.$shiryou['file'][0].'" target="_blank">アップファイル</a>
<br><span id="shiryou_del1"><input type="checkbox" name="shiryou_del[]" value="'.$shiryou['file'][0].'"></span> 削除</span>';
		}
	}
	?>	
	<input type="file" name="data[shiryou][]"><hr>
	<div><span class="dpIB label">ファイル名</span><input type="text" size="20" name="data[shiryou_fn]" value="<?php
	if(isset($shiryou['name'])){
		echo $shiryou['name'][0];
	}
	//echo TextToKanma($resDataArr[22]);
	?>" style="padding: 3px;" /> .(拡張子)
	<div style="font-size: 90%;margin-top: 0.5em;text-indent: -1em;padding-left: 1em;">※ファイル名として使用できる文字は<font color="red">半角英数字</font>・<font color="red">_（アンダーバー）</font>・<font color="red">-（ハイフン）</font>の3種類のみです。<br>それ以外の文字は自動削除されます。</div>
	<div style="font-size: 90%;margin-top: 0.5em;text-indent: -1em;padding-left: 1em;">※未入力でファイルをアップロードした場合、アップロードファイルの名前を使用します。<br>アップロードファイルの名前に上記の使用できる文字が一文字も無い場合はデフォルト名として「data」になります。</div>
	</div>
	</td>
</tr>

</table>