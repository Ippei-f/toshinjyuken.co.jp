<?php
//<meta charset="utf-8">
//print_r($upfileTag);
//print_r($upFilePath);

$parts=array
('naiyou1'=>array
 						('form'=>'<span class="dpIB label T sort">タイトル</span><textarea name="data[naiyou_text][]" rows="3" cols="40"></textarea><input type="hidden" name="data[naiyou_type][]" value="T" />'
						,'btn' =>'▲ タイトル追加'
						,'class'=>'bg_title'
						)
,'naiyou2'=>array
 						('form'=>'<span class="dpIB label T sort">文章</span><textarea name="data[naiyou_text][]"'.$cleditorClass.' rows="5" cols="60"></textarea><input type="hidden" name="data[naiyou_type][]" value="W" />'
						,'btn' =>'▲ 文章追加'
						,'class'=>'editbox'
						)
,'naiyou3'=>array
 						('form'=>'<span class="dpIB label sort">写真</span><span class="dpIB">'.FILEFORM_TEMP('naiyou').'<div><input type="hidden" name="data[naiyou_type][]" value="P" /></div></span><input type="hidden" name="data[imgsize_f][]" value="x" /><div style="padding: 1em 0;">サイズ指定：<input type="checkbox" name="data[imgsize_f][]" value="o" /> 有効 … <input type="number" name="data[imgsize_n][]" style="width:4em;" /> px（最大932pxまで）</div>'
						,'btn' =>'▲ 写真追加'
						)
/*
,'naiyou2'=>array
 						('form'=>'<span class="dpIB label T sort">写真</span><span class="dpIB"><input type="file" name="data[naiyou][]" /><div><input type="text" size="40" name="data[naiyou_text][]" /><input type="hidden" name="data[naiyou_type][]" value="P" /></div></span>'
						,'btn' =>'▲ 写真追加'
						)
*/
);

//print_r($upsizeArr1);
//print_r($commentArr[11]);
?>
<table class="borderTable01">
<tr>
	<th>記事内容<br>
（写真の横幅は最大932px）</th>
	<td><div class="padbox naiyou addbox sorttable">
<?php
$str='';
if(empty($_GET['id'])){
	$commentArr[9]=array('T','W','P');//初期設定
}
if(!is_array($commentArr[9])){$commentArr[9]=array($commentArr[9]);}
foreach($commentArr[9] as $k => $v){
	switch($v){
		case 'T':
		$a=$parts['naiyou1'];
		$a['form']=str_replace($rep='</textarea>',COMMENT_SET(8).$rep,$a['form']);
		$str.=MAKE_INPUT($a);
		break;
		case 'W':
		$a=$parts['naiyou2'];
		$a['form']=str_replace($rep='</textarea>',COMMENT_SET(8,'edit').$rep,$a['form']);
		$str.=MAKE_INPUT($a);
		break;
		case 'P':
		$a=FILEFORM_REMAKE('naiyou',$parts['naiyou3']);
		$checked=($upsizeArr1[$cnum[10]]=='o')?' checked="checked"':'';		
		$a['form']=str_replace($rep='name="data[imgsize_f][]" value="o"',$rep.$checked,$a['form']);
		$a['form']=str_replace($rep='name="data[imgsize_n][]"',$rep.' value="'.COMMENT_SET(11).'"',$a['form']);
		$str.=MAKE_INPUT($a);
		$cnum[10]++;
		break;
		/*
		case 'C':
		break;
		*/
	}
}
echo $str;
?>
</div>
<?php echo ADDBTN($parts); ?>
</td></tr>
</table>
<?php echo ADDBTN_JQ($parts); ?>