<?php
//<meta charset="utf-8">
?>
<table class="borderTable01">
<tr>
	<th>周辺の物件</th>
	<td><div class="padbox near"><textarea name="data[near_text][]" class="dpIB" style="vertical-align: bottom;" rows="10" cols="40" placeholder="ID:1/名古屋市〇〇"><?php echo COMMENT_SET(16); ?></textarea>
	<span class="dpIB" style="vertical-align: bottom;">
	<select class="near_select" style="height:2em;">
	<option value="">--- 未選択 ---</option>
<?php
$getFormatDataArr = getLines2DspData($file_path,$img_updir,$config,'','',true);
foreach($getFormatDataArr as $key => $sysdata){
	echo '<option>ID:'.$sysdata['id'].'/'.$sysdata['title'].'</option>'.chr(10);
}
?>
	</select>
	<div class="addbtn" style=" margin-top: 0;"><input class="near_addbtn" type="button" onclick="return false;" value="← 挿入" style="margin-bottom: 0;"/></div>
	</span></div>
	<div style="padding-top:0.5em; font-size:90%;">※登録済みの物件を右側のセレクトフォームから選択し、挿入を押すことで<br>
　スライダーに周辺の物件を追加することができます。</div></td>
</tr>
</table>
<script type="text/javascript">
$(window).load(function () {
	$(".near_addbtn").click(function(){
		var near_t='.padbox.near textarea';
		var near_tv=$(near_t).val();
		var near_sv=$('.near_select').val();
		var add='';
		if(near_sv!=''){
			if(near_tv!=''){add='\n';}
			$(near_t).val(near_tv+add+near_sv);
		}
	});
});
</script>