<?php
//<meta charset="utf-8">

$parts=array
('banner'=>array
 						('form'=>'<span class="dpIB label sort">画像</span>'.FILEFORM_TEMP('banner').'<div></div><span class="dpIB label">リンク先</span><input type="text" size="40" name="data[banner_text][]" />[select]'
						,'btn' =>'▲ 項目追加'
						,'select_num'	=>15
						,'select_list'=>array('同一ウインドウ','別ウインドウ')
						)
);
?>
<table class="borderTable01">
<tr>
	<th>バナー</th>
	<td><div class="padbox banner addbox sorttable">
	<?php
$str='';
$max=count($commentArr[14]);
if($max<1){$max=1;}
//$max=(empty($_GET['id']))?1:count($commentArr[14]);
for($i=0;$i<$max;$i++){
	$a=FILEFORM_REMAKE('banner',$parts['banner']);
	$a['form']=str_replace($rep='name="data[banner_text][]"',$rep.' value="'.COMMENT_SET(14).'"',$a['form']);
	$a['form']=str_replace('[select]',SELECTBOX_SET($a['select_num'],$a['select_list'],true),$a['form']);
	$str.=MAKE_INPUT($a);
}
echo $str;
	?>
	</div><?php echo ADDBTN($parts); ?></td>
</tr>
</table>
<?php echo ADDBTN_JQ($parts) ?>