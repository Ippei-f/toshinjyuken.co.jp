<?php
//<meta charset="utf-8">

$parts=array
('gallery1'=>array
 						('form'=>'<span class="dpIB label sort">見出し</span><input type="text" size="40" name="data[gallery_text][]" /><input type="hidden" name="data[gallery_type][]" value="T" />'
						,'btn' =>'▲ 見出し追加'
						,'class'=>'bg_title'
						)
,'gallery2'=>array
 						('form'=>'<span class="dpIB label T sort">写真</span><span class="dpIB">'.FILEFORM_TEMP('gallery').'<div><input type="text" size="40" name="data[gallery_text][]" /><input type="hidden" name="data[gallery_type][]" value="P" /></div></span>'
						,'btn' =>'▲ 写真追加'
						)
);
?>
<table class="borderTable01">
<tr>
	<th colspan="2">ギャラリー</th>
</tr>
<tr>
<th>物件情報・周辺情報</th>
<td>
<div class="padbox gallery addbox sorttable">
<p class="bg_title big" style="margin-top: 0;"><span class="dpIB label"></span>物件情報<input type="hidden" name="data[gallery_type][]" value="物件情報"></p>
<?php
/*
print_r($commentArr[11]);
echo '<p></p>';
print_r($commentArr[12]);
echo '<p></p>';
print_r($upFilePath['gallery']);
*/
$str='';
if(empty($_GET['id'])){
	$commentArr[11]=array('物件情報','P','P','周辺情報','T','P','P');//初期設定
}
foreach($commentArr[11] as $k => $v){
	if($k<1){continue;}
	switch($v){
		case 'T':
		$a=$parts['gallery1'];
		$a['form']=str_replace($rep='name="data[gallery_text][]"',$rep.' value="'.COMMENT_SET(12).'"',$a['form']);
		$str.=MAKE_INPUT($a);
		break;
		case 'P':
		$a=FILEFORM_REMAKE('gallery',$parts['gallery2']);
		$a['form']=str_replace($rep='name="data[gallery_text][]"',$rep.' value="'.COMMENT_SET(12).'"',$a['form']);
		$str.=MAKE_INPUT($a);
		break;
		default://大見出し
		$str.='
		<div class="bg_title big">
		'.ADDBTN($parts,'bef').'
		<span class="dpIB label sort"></span>'.$v.'<input type="hidden" name="data[gallery_type][]" value="'.$v.'"></div>';
	}
}
echo $str;
?>
</div><?php echo ADDBTN($parts); ?></td>
</tr>
</table>
<?php echo ADDBTN_JQ($parts); ?>