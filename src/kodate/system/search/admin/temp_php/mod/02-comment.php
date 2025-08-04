<?php
//<meta charset="utf-8">

$parts=array
('comment'=>array
 						('form'=>'<span class="dpIB label sort">画像</span>'.FILEFORM_TEMP('cimg').'<input type="hidden" name="data[comment_img][]" value="P" />'
						,'btn' =>'▲ 項目追加'
						)
);
?>
<table class="borderTable01">
<tr>
	<th>コメント</th>
	<td class="box_comment"><textarea name="data[comment][]" rows="5" cols="60" class="cleditor"><?php
	echo str_replace(PHP_EOL,'<br>',COMMENT_SET(6));//WIN・MAC共通改行を<br>に変換
	?></textarea>
	<?php
	//<img draggable="false" src="../upload/comment401-0s.jpg?685b96d1a35e8" style="width:100px;">
	?>
<?php
if(isset($id)){
	$a=glob('../upload/cimg'.$id.'-*[!s].*');
	//print_r($a);
	if(!empty($a)){
?>
<div class="dropimg"><div>↑画像をドラッグで挿入できます</div><?php
//$rand=rand()%100;//データ節約
$rand=strtotime(date('Y-m-d H:i:s'))%100000;
foreach($a as $v){
	echo '<img src="'.$v.'?'.$rand.'">';
}
?></div>
<?php
	}//if(!empty($a))
}//if(isset($id))
?>
<style>
.dropimg{
	margin-top: 10px;
	border: dotted 1px #CCCCCC;
	padding: 10px;
	gap: 10px;
	display: flex;
	flex-wrap: wrap;
}
.dropimg > div{
	max-width: 4em;
	font-size: 0.9em;
	line-height: 1.5em;
}
.dropimg img{max-width: 100px;cursor: move;}
</style>
<script>
$(window).load(function(){
	$('.box_comment iframe').contents().find('head').append('<style>img{max-width: 100px;}</style>');
	$('.dropimg img').on('dragstart',function(e){
		//t=$(this).attr("src").split("?");
		e.originalEvent.dataTransfer.setData("text/plain",'<img src="'+$(this).attr("src")+'">');
	});
	$('.box_comment iframe').contents().on('drop',function(e){
		const data = e.originalEvent.dataTransfer.getData("text");
		//console.log(e.target);
		$(this).contents().find('body').append(data);
		//$(this).contents().find('body').appendChild(data);
		return false;
	});
});
</script>
</td>
</tr>
<tr>
	<th>コメント用埋め込み画像<div style="font-size: 0.9em;">（登録後、コメント欄で使用できるようになります）</div></th>
	<td><div class="padbox comment addbox">
	<?php
$str='';
$max=count($commentArr[25]);
if($max<1){$max=1;}
//$max=(empty($_GET['id']))?1:count($commentArr[14]);
for($i=0;$i<$max;$i++){
	$a=FILEFORM_REMAKE('cimg',$parts['comment']);
	$a['form']=str_replace($rep='<img',$rep.' draggable="false"',$a['form']);
	$str.=MAKE_INPUT($a);
}
echo $str;
	?>
	</div><?php echo ADDBTN($parts); ?></td>
</tr>
</table>
<?php echo ADDBTN_JQ($parts) ?>