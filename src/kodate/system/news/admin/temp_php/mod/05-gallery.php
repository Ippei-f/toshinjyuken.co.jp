<?php
//<meta charset="utf-8">

$parts=array
('gallery1'=>array
 						('form'=>'<span class="dpIB label sort">見出し</span><input type="text" size="40" name="data[gallery_text][]" /><input type="hidden" name="data[gallery_type][]" value="T" />'
						,'btn' =>'▲ 見出し追加'
						,'class'=>'bg_title'
						)
,'gallery2'=>array
 						('form'=>'<span class="dpIB label T sort">写真</span><span class="dpIB"><input type="file" name="data[gallery][]" /><div><input type="text" size="40" name="data[gallery_text][]" /><input type="hidden" name="data[gallery_type][]" value="P" /></div></span>'
						,'btn' =>'▲ 写真追加'
						)
);
?>
<table class="borderTable01">
<tr>
	<th colspan="2">ギャラリー</th>
</tr>
<?php
$str='';
if(empty($_GET['id'])){
	$commentArr[11]=array('物件情報','T','P','P','周辺情報','T','P','P');//初期設定
}
foreach($commentArr[11] as $k => $v){
	switch($v){
		case 'T':
		$a=$parts['gallery1'];
		$a['form']=str_replace($rep='name="data[gallery_text][]"',$rep.' value="'.COMMENT_SET(12).'"',$a['form']);
		$str.=MAKE_INPUT($a);
		break;
		case 'P':
		$a=$parts['gallery2'];
		$a['form']=str_replace('<input type="file" name="data[gallery][]" />',IMG_THUMB('gallery'),$a['form']);
		$a['form']=str_replace($rep='name="data[gallery_text][]"',$rep.' value="'.COMMENT_SET(12).'"',$a['form']);
		$str.=MAKE_INPUT($a);
		break;
		default:
		if($k>0){
			$str.='</div>'.ADDBTN($parts).'</td></tr>'.chr(10);
		}
		$str.='<tr>
	<th>'.$v.'<input type="hidden" name="data[gallery_type][]" value="'.$v.'" /></th>
	<td><div class="padbox gallery addbox sorttable">'.chr(10);
	}
}
$str.='</div>'.ADDBTN($parts).'</td></tr>'.chr(10);
echo $str;
?>
</table>
<?php echo ADDBTN_JQ($parts) ?>