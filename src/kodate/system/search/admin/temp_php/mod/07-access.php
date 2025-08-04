<?php
//<meta charset="utf-8">

$parts=array
('access'=>array
 						('form'=>'<span class="dpIB label T"><input type="text" size="10" name="data[access_text][]" value="" style="margin-top: 0;"/></span><textarea name="data[comment][]" rows="5" cols="60"></textarea><span class="sort"></span>'
						,'btn' =>'▲ 項目追加'
						)
);
?>
<table class="borderTable01">
<tr>
	<th colspan="2">アクセス・周辺環境</th>
</tr>
<tr>
	<th>座標</th>
	<td><div class="padbox">
	<div><span class="dpIB label">緯度</span><input type="text" size="20" name="data[access_text][]" value="<?php echo COMMENT_SET(13); ?>" /></div>
	<div><span class="dpIB label">経度</span><input type="text" size="20" name="data[access_text][]" value="<?php echo COMMENT_SET(13); ?>" /></div>
	</div>
	<div style="padding-top:0.5em; font-size:90%;">※緯度・経度は	Geocoding（<a href="https://www.geocoding.jp/api/" target="_blank" style="font-size:inherit; color:#00F;">https://www.geocoding.jp/api/</a>）のページで取得できます。<br />
※緯度・経度どちらかが空白だと非表示になります。<!--<br />
※吹き出しの中には物件名が自動的に挿入されます。--></div></td>
</tr>
<tr>
	<th>周辺情報</th>
	<td><div class="padbox access addbox sorttable">
	<?php
$str='';
$max=count($commentArr[13]);
if($max<3){$max=3;}
//$max=(empty($_GET['id']))?3:count($commentArr[13]);
for($i=2;$i<$max;$i++){
	$a=$parts['access'];
	$a['form']=str_replace($rep='name="data[access_text][]"',$rep.' value="'.COMMENT_SET(13).'"',$a['form']);
	$a['form']=str_replace($rep='</textarea>',COMMENT_SET(6).$rep,$a['form']);
	$str.=MAKE_INPUT($a);
}
echo $str;
	?>
	</div><?php echo ADDBTN($parts); ?></td>
</tr>
</table>
<?php echo ADDBTN_JQ($parts) ?>