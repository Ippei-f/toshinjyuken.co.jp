<?php
//<meta charset="utf-8">
//print_r($resDataArr);

$parts=array
('news2'=>array
 						('form'=>'<span class="dpIB label T sort">文章</span><textarea name="data[news_text][]"'.$cleditorClass.' rows="5" cols="60"></textarea><input type="hidden" name="data[news_type][]" value="W" />'
						,'btn' =>'▲ 文章追加'
						)
,'news3'=>array
 						('form'=>'<span class="dpIB label sort">写真</span><span class="dpIB">'.FILEFORM_TEMP('news').'<div><input type="hidden" name="data[news_type][]" value="P" /></div></span>'
						,'btn' =>'▲ 写真追加'
						)
/*
'news1'=>array
 						('form'=>'<span class="dpIB label T sort">タイトル</span><textarea name="data[news_text][]" rows="3" cols="40"></textarea><input type="hidden" name="data[news_type][]" value="T" />'
						,'btn' =>'▲ タイトル追加'
						,'class'=>'bg_title'
						)
,'news2'=>array
 						('form'=>'<span class="dpIB label T sort">写真</span><span class="dpIB"><input type="file" name="data[news][]" /><div><input type="text" size="40" name="data[news_text][]" /><input type="hidden" name="data[news_type][]" value="P" /></div></span>'
						,'btn' =>'▲ 写真追加'
						)
*/
);
?>
<table class="borderTable01 cate_onoff c1">
<tr>
<th>記事内容</th>
<td><div class="padbox news addbox sorttable">
<?php
//print_r($upfileTag);
$str='';
if(empty($_GET['id'])){
	$commentArr[10]=array('T','W','P');//初期設定
}
if(!is_array($commentArr[10])){$commentArr[10]=array($commentArr[10]);}
foreach($commentArr[10] as $k => $v){
	switch($v){
		/*
		case 'T':
		$a=$parts['news1'];
		$a['form']=str_replace($rep='</textarea>',COMMENT_SET(8).$rep,$a['form']);
		$str.=MAKE_INPUT($a);
		break;
		*/
		case 'W':
		$a=$parts['news2'];
		$a['form']=str_replace($rep='</textarea>',COMMENT_SET(9,'edit').$rep,$a['form']);
		$a['class']='editbox';
		$str.=MAKE_INPUT($a);
		break;
		case 'P':
		$a=FILEFORM_REMAKE('news',$parts['news3']);
		$str.=MAKE_INPUT($a);
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