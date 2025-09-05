<div class="sp_slide_set">
<div class="arrow L"><img src="<?php echo $kaisou; ?>images/content/search/arrow-slide.svg"></div>
<div class="sp_slide_mode">
<ul class="s_list_bukken col4">
<?php
//<meta charset="utf-8">
$search_arr=array();
$search_floor=COMMON_PARAM('search_floor');

foreach(CMS_SETUP('search') as $key => $sysdata){
	if(CMS_OPEN($sysdata)){continue;}
	if($sysdata[3]==999){continue;}//完売
	CMS_DATA_REPLACE();
	if(!isset($sysdata[22])||empty(trim($sysdata[22]))){
		//階層未設定の場合、名前から判別
		$sysdata[22]=strpos($sysdata[2],'平屋')!==false?1:2;
	}
	if(isset($pu_limit['floor'])){
		if($sysdata[22]!=$pu_limit['floor']){continue;}
	}
	if(isset($pu_limit['room_order'])){
		if(!isset($sysdata[23])){$sysdata[23]=0;}
		if($sysdata[23]!=$pu_limit['room_order']){continue;}//ルームオーダー可でないものも除外
	}
	CMS_IMGSET($sysdata[0]);
	$pu=($sysdata[19]==1)?0:1;//0と1反転
	$search_arr[$pu][]=$sysdata;
}
ksort($search_arr);//キーの昇順で並び替え
$a=array();
foreach($search_arr as $v){//ピックアップを前にして再格納
	foreach($v as $v2){
		$a[]=$v2;
	}
}
$search_arr=$a;
unset($a);//要らないので削除
$cnt=0;
foreach($search_arr as $key => $sysdata){
	//物件情報データ取得
	$bukken_data=SEARCH_PRICE($sysdata[11][0]);
	//物件リストテンプレ
	require $kaisou."temp_php/search/temp-bukken-list.php";
	$cnt++;
	if($cnt>=$max){break;}
}
?>
</ul>
</div>
<div class="arrow R"><img src="<?php echo $kaisou; ?>images/content/search/arrow-slide.svg"></div>
</div>
<div class="test"></div>
<script>
$(window).load(function(){
	scr=false;
	cnt=0;
	len=$('.sp_slide_set ul li').length;
	len_set=$('.sp_slide_set').length;
	if(len_set > 1){
		len/=len_set;
	}
	$('.sp_slide_set').each(function (i){
		$(this).addClass('num'+i);
		SEARCH_SLIDE_SCR($(this));
	});	
	<?php
	/*
	$('.sp_slide_mode').on('mousedown', function(){
	});
	*/
	?>	
	$('.sp_slide_set .sp_slide_mode').on('mouseup', function(){
		obj=$(this).parents('.sp_slide_set');
		SEARCH_SLIDE_BTN(0,obj);
	});
	<?php
	/*
	$('.sp_slide_set .sp_slide_mode').on('touchstart mousedown', function(){
		cnt=0;
	});
	$('.sp_slide_set .sp_slide_mode').on('touchend mouseup', function(){
		cnt=1;
	});
	*/
	?>	
	$('.sp_slide_set .sp_slide_mode').scroll(function(){
		scr=true;
		obj=$(this).parents('.sp_slide_set');
		SEARCH_SLIDE_SCR(obj);
	});
	$(".sp_slide_set .arrow.L img").click(function(){
		obj=$(this).parents('.sp_slide_set');
		SEARCH_SLIDE_BTN(-1,obj);
	});
	$(".sp_slide_set .arrow.R img").click(function(){
		obj=$(this).parents('.sp_slide_set');
		SEARCH_SLIDE_BTN(1,obj);
	});
	<?php
	/*
	var loop= function(){
		if(!scr){
			if(cnt>0){
				cnt--;
				<?php //$('.test').html(cnt); ?>
				if(cnt==0){
					$('.sp_slide_set').each(function (i){
						SEARCH_SLIDE_BTN(0,$(this));
					});
				}
			}
		}
		scr=false;
		setTimeout(loop,50);
	};
	loop();
	*/
	?>	
});
function SEARCH_SLIDE_WIDTH(obj){
	return obj.find('.sp_slide_mode').width();//横幅リセット
}
function SEARCH_SLIDE_BTN(add,obj){
	var w=SEARCH_SLIDE_WIDTH(obj);
	var p1=Math.floor(obj.find('.sp_slide_mode ul').position().left);
	if(add!=0){
		num=(Math.floor(-p1/w)+add+len)%len;
	}
	else{
		num=(Math.round(-p1/w)+len)%len;
	}
	<?php
	//$('.test').html(num+'/'+(-p1)+'/'+w+'/'+(-p1/w)+'/'+len);
	//$('.sp_slide_mode').scrollLeft(num*w);
	?>	
	obj.find('.sp_slide_mode').animate({scrollLeft:num*w},250,"swing",function(){<?php //$(this).dequeue(); ?>});
}
function SEARCH_SLIDE_SCR(obj){
	var w=SEARCH_SLIDE_WIDTH(obj);
	var p2=Math.floor(obj.find('.sp_slide_mode ul').position().left);
	num=Math.round(-p2/w)%len;
	<?php
	//$('.test').html(num+'/'+(-p2/w)+'/'+len);
	?>
	obj.find(".arrow").removeClass('off');
	if(num<=0){
		obj.find(".arrow.L").addClass('off');
	}
	if(num>=(len-1)){
		obj.find(".arrow.R").addClass('off');
	}
}
</script>
<style>
@media screen and (max-width: 999px) {
	.sp_slide_mode > .s_list_bukken{<?php echo 'width:'.($cnt*100).'%;'; ?>}
}
</style>