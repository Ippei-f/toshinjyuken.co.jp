<?php
//<meta charset="utf-8">
?>
<script src="//code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script type="text/javascript">
//ソート解禁
$(window).load(function () {
	
	cleditorExe();

	$(".validateForm").submit(function(){
		if($('input[name="data[title]"]').val() == ''){
			alert('物件名を入力して下さい');
			return false;
		}else{
			return true;	
		}
	});
	
	$('.sorttable').sortable({
			revert: true,
			items: 'div',
      handle: '.sort',
	});
	$('.sorttable').disableSelection();
	
	<?php
	/*
	$(".del").click(function(){
		if (confirm("<?php echo ($_GET['id']!='')?'このセットを削除してよろしいですか？画像も削除されます。':'このセットを削除してよろしいですか？';?>")) {
			//画像削除用にhidden要素をセット
			<?php if($_GET['id']!=''){ ?>
			var filePath = $(this).parent().children('.pic input[type="checkbox"]').val();
			$(this).parent().parent().append('<input type="hidden" name="upfile_del[]" value="'+filePath+'" />');
			<?php } ?>
			$(this).parent().fadeOut('fast', function() { $(this).remove(); });
		}
		else {
			alert("キャンセルしました");
		}
	});
	*/
	?>	
});

function DEL_FORM(obj) { //削除処理
	conf="このセットを削除してよろしいですか？";
	<?php if($_GET['id']!=''){ ?>
	var delname = $(obj).parent().find('.delname').val();
	if(delname === void 0){
		delname='upfile_del';
	}
	else{
		conf+="画像も削除されます。";
	}
	<?php } ?>
	if (confirm(conf)) {
		//画像削除用にhidden要素をセット
		<?php if($_GET['id']!=''){ ?>
		var filePath = $(obj).parent().find('.label').children('input[type="hidden"]').val();
		if(filePath !== void 0){			
			//$('.del_test').text(filePath+'…'+delname);
			$(obj).parent().parent().append('<input type="hidden" name="'+delname+'[]" value="'+filePath+'" />');
		}
		<?php } ?>
		$(obj).parent().fadeOut('fast', function() {$(obj).parent().remove(); });
	}
	else {
		alert("キャンセルしました");
	}
}
</script>