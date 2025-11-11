<?php
//<meta charset="utf-8">

/*
<h3>テキスト入力・画像アップロード（ファイル合計：<?php echo $maxbyte; ?>以内）</h3>
<p>※写真は自動で縮小、保存されます。（縦横比を維持したまま横写真は幅<?php echo $imgWidthHeight;?>px、縦写真は高さ<?php echo $imgWidthHeight;?>pxに）<!--※設定ファイルで変更可--><br />
※<?php echo $permissionExtension;?>のみ （アニメーションGIFは不可）</p>
*/
?>

<table class="borderTable01">
<tr>
	<th>ページTOP写真<br />
	（横<?php echo $imgWidthHeight; ?>×縦570px）</th>
	<td><?php echo IMG_THUMB('upfile'); /*<input type="file" name="data[upfile][]" />*/ ?></td>
</tr>
<tr>
	<th>大見出し</th>
	<td><textarea name="data[comment][]" rows="5" cols="60"><?php echo COMMENT_SET(6); ?></textarea></td>
</tr>
<tr>
	<th>一覧用見出し<div style="font-size: 85%;">（空白で大見出しの入力内容を使用）</div></th>
	<td><textarea name="data[comment][]" rows="3" cols="40"><?php echo COMMENT_SET(6); ?></textarea></td>
</tr>
</table>