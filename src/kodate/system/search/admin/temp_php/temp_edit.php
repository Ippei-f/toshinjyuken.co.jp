<?php
//<meta charset="utf-8">

//挿入するhtmlを定義
$tempHTML = <<<EOF

<tr class="lines'+arInput+'">
<th>本文</th>
<td><textarea name="data[comment][]"{$cleditorClass} rows="5" cols="60"></textarea></td>
<td rowspan="2" style="vertical-align:middle"><input type="button" onclick="delLine('+arInput+'); return false;" value=" × 削除 " class="addAndDelBtn" /></td>
</tr>
<tr class="lines'+arInput+'">
<th>ファイル（{$maxbyte}以内）</th>
<td><input type="file" name="data[upfile][]" /></td>
</tr>

EOF;
$tempHTML = str_replace(array("\n","\r",'"'),array('','','\"'),$tempHTML);
?>
<script type="text/javascript">
//ソート解禁
/*
$(window).load(function () {
	$('.sorttable').sortable({
			revert: true,
			items: 'tr',
      handle: '.sort',
	});
	$('.sorttable').disableSelection();
});
*/
var arInput = <?php echo ($com_id!='')?$countComment:1;?>; //初期化
function addInput() {
	arInput ++;
	if(arInput <= <?php echo $maxCommentCount;?>){
		$("#lineList").append('<?php echo $tempHTML;?>\n');
		cleditorExe();
	}else{
		$('#addBtn').prop('disabled',true);
	}
}
function delLine(str) { //削除処理
	if (confirm("<?php echo ($com_id!='')?'このセットを削除してよろしいですか？画像も削除されます。':'このセットを削除してよろしいですか？';?>")) {
		//画像削除用にhidden要素をセット
		<?php if($com_id!=''){ ?>
		var filePath = $("tr.lines"+str+' input[type="checkbox"]').val();
		$("#lineList").append('<input type="hidden" name="upfile_del[]" value="'+filePath+'" />');
		<?php } ?>
		$("tr.lines"+str).fadeOut('fast', function() { $(this).remove(); });
	} else {
		alert("キャンセルしました");
	}
}
</script>