<?php
//<meta charset="utf-8">

//print_r($upfileTag);
$parts=array
(/*'P'=>array
 			('form'=>'<span class="dpIB label sort">写真</span>'.FILEFORM_TEMP('photo').'<input type="hidden" name="data[set_type][]" value="P" />'
			,'btn' =>'▲ 写真追加'
			)*/
/*
<div style="margin-top: 0.5em;"></div>キャプション：<input type="text" size="40" name="data[works_pcap][]" value="" />
*/
/*
,'W'=>array
 			('form'=>'<span class="dpIB label sort">文章</span><textarea name="data[comment][]"'.$cleditorClass.' rows="10" cols="60"></textarea><input type="hidden" name="data[set_type][]" value="W" />'
			,'btn' =>'▲ 文章追加'
			)
*/
);
?>
<table class="borderTable01">
<?php if(false){ ?>
<tr>
<th>写真</th>
<td><?php echo ADDBTN($parts,true); ?><div class="padbox bottom_p addbox sorttable"><?php
//print_r($commentArr[8]);
if(empty($_GET['id'])){$commentArr[8]=array('P');}
if(!is_array($commentArr[8])){$commentArr[8]=array($commentArr[8]);}

foreach($commentArr[8] as $k => $v){
	//余分な空白・改行削除
	$v=trim($v);
	//$v=str_replace(array('\n','\r',chr(10),chr(13)),'',$v);
	switch($v){
		/*
		case 'P':
		$a=FILEFORM_REMAKE('photo',$parts['P']);
		//$a['form']=str_replace($rep='data[works_pcap][]" value="',$rep.COMMENT_SET(10),$a['form']);//キャプション
		$str.=MAKE_INPUT($a);
		break;
		*/
		/*
		case 'W':
		$a=$parts['W'];
		$a['form']=str_replace($rep='</textarea>',COMMENT_SET(6,'edit').$rep,$a['form']);
		$a['class']='editbox';
		$str.=MAKE_INPUT($a);
		break;
		*/
	}
}
echo $str;
?>
</div><?php echo ADDBTN($parts); ?></td>
</tr>
<?php }//if(false) ?>
<tr>
<th>写真</th>
<td><?php
	INPUT_CATEGORY($categoryArr_photo,11);//,array('onclick'=>'T_CHANGE')
	?>
	<hr>
	アップロード：<?php echo IMG_THUMB('photo').chr(10); ?>
	<div style="height: 0.5em;"></div>
	直リンク：<input type="text" size="40" name="data[photo_url]" value="<?php echo TextToKanma($resDataArr[4]);?>" />
	<hr>
	<div style="font-size: 90%;">※カテゴリで「会員限定」または「プロジェクト進行中」を選択している場合は専用のサムネイルを表示します。</div>
</td>
</tr>
<tr>
	<th>本文</th>
	<td><textarea name="data[comment][]" rows="10" cols="60"><?php echo COMMENT_SET(6); ?></textarea></td>
</tr>
</table>
<?php
echo ADDBTN_JQ($parts); ?>