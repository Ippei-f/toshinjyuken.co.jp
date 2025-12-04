<?php
//<meta charset="utf-8">
/*
ボツ

<section class="pickup font_reset">
<?php echo CONTENT_SUBT_MINI('PICK UP!','おすすめ物件'); ?>
<?php echo CONTENT_PAD(35,20); ?>
<?php
//ピックアップ
$max=4;
$pu_limit=array('floor'=>1,'room_order'=>1);
include $kaisou."temp_php/search/temp-bukken-pickup.php";
?>
<?php echo CONTENT_PAD(60,40); ?>
<?php echo EFFECT_BTN('物件一覧','すべての物件を見る',array('class'=>'colB2','arrow'=>true)); ?>
</section>
*/

//物件リスト初期化
$search_arr = array();
foreach (CMS_SETUP('search') as $key => $sysdata) {
	if (CMS_OPEN($sysdata)) {
		continue;
	}
	if ($sysdata[3] == 999) {
		continue;
	} //完売
	CMS_DATA_REPLACE();
	CMS_IMGSET($sysdata[0]);
	$pu = ($sysdata[19] == 1) ? 0 : 1; //0と1反転
	$search_arr[$pu][] = $sysdata;
}
ksort($search_arr); //キーの昇順で並び替え
$a = array();
foreach ($search_arr as $v) { //ピックアップを前にして再格納
	foreach ($v as $v2) {
		$a[] = $v2;
	}
}
$search_arr = $a;
unset($a); //要らないので削除

function LOCAL_RECOMMEND_SET($addclass = false)
{
	global $link_list, $search_arr, $kaisou, $max, $cnt;
?>
	<div class="top_sec02 pc_content_box<?php echo $addclass ? ' first' : ''; ?>">
		<div class="Wbase W1200">
			<?php
			/*
<div class="top_subt"><div class="en">PICK UP</div><h2>おすすめの物件</h2></div>
*/
			?>
			<h2 class="subt_mini">
				<div class="font_min">ＰＩＣＫ ＵＰ！</div>
				<div style="margin-top: 0.75em; font-size: 0.75em; font-weight: 400;">おすすめ物件</div>
			</h2>
			<div class="sp_slide_set">
				<div class="arrow L"><img src="../images/content/search/arrow-slide.svg"></div>
				<div class="sp_slide_mode">
					<ul class="s_list_bukken col4">
						<?php
						$cnt = 0;
						foreach ($search_arr as $key => $sysdata) {
							//物件情報データ取得
							$bukken_data = SEARCH_PRICE($sysdata[11][0]);
							//物件リストテンプレ
							require $kaisou . "temp_php/search/temp-bukken-list.php";
							$cnt++;
							if ($cnt >= $max) {
								break;
							}
						}
						?>
					</ul>
				</div>
				<div class="arrow R"><img src="../images/content/search/arrow-slide.svg"></div>
			</div>
			<?php echo EFFECT_BTN('物件情報', 'すべての物件を見る', array('class' => 'colB border2')); ?>
		</div>
	</div>
<?php
}

$max = 4;
LOCAL_RECOMMEND_SET(true); //物件スライダー表示
?>
<script>
	$(window).load(function() {
		scr = false;
		cnt = 0;
		len = $('.first .sp_slide_mode ul li').length;
		$('.sp_slide_set').each(function() {
			obj = $(this);
			SEARCH_SLIDE_SCR(obj);
		});
		$('.sp_slide_mode').on('touchstart mousedown', function() {
			cnt = 0;
		});
		$('.sp_slide_mode').on('touchend mouseup', function() {
			cnt = 1;
			obj = $(this).parents('.sp_slide_set');
			SEARCH_SLIDE_BTN(0, obj);
		});
		$('.sp_slide_mode').scroll(function() {
			scr = true;
			obj = $(this).parents('.sp_slide_set');
			SEARCH_SLIDE_SCR(obj);
		});
		$(".sp_slide_set .arrow.L img").click(function() {
			obj = $(this).parents('.sp_slide_set');
			SEARCH_SLIDE_BTN(-1, obj);
		});
		$(".sp_slide_set .arrow.R img").click(function() {
			obj = $(this).parents('.sp_slide_set');
			SEARCH_SLIDE_BTN(1, obj);
		});
		/*
		var loop= function(){
			if(!scr){
				if(cnt>0){
					cnt--;
					//$('.test').html(cnt);
					if(cnt==0){
						SEARCH_SLIDE_BTN(0);
					}
				}
			}
			scr=false;
			setTimeout(loop,50);
		};
		loop();
		*/
	});

	function SEARCH_SLIDE_WIDTH(obj) {
		//return $('.sp_slide_mode').width();//横幅リセット
		return obj.find('.sp_slide_mode').width(); //横幅リセット
	}

	function SEARCH_SLIDE_BTN(add, obj) {
		var w = SEARCH_SLIDE_WIDTH(obj);
		var p1 = Math.floor(obj.find('.sp_slide_mode ul').position().left);
		if (add != 0) {
			num = (Math.floor(-p1 / w) + add + len) % len;
		} else {
			num = (Math.round(-p1 / w) + len) % len;
		}
		//$('.test').html(num+'/'+(-p1)+'/'+w+'/'+(-p1/w)+'/'+len);
		//$('.sp_slide_mode').scrollLeft(num*w);
		obj.find('.sp_slide_mode').animate({
			scrollLeft: num * w
		}, 250, "swing", function() {
			//$(this).dequeue();
		});
	}

	function SEARCH_SLIDE_SCR(obj) {
		var w = SEARCH_SLIDE_WIDTH(obj);
		var p2 = Math.floor(obj.find('.sp_slide_mode ul').position().left);
		num = Math.round(-p2 / w) % len;
		//$('.test').html(num+'/'+(-p2/w)+'/'+len);
		obj.find(".arrow").removeClass('off');
		if (num <= 0) {
			obj.find(".arrow.L").addClass('off');
		}
		if (num >= (len - 1)) {
			obj.find(".arrow.R").addClass('off');
		}
	}
</script>
<style>
	@media screen and (max-width: 999px) {
		.sp_slide_mode>.s_list_bukken {
			<?php echo 'width:' . ($cnt * 100) . '%;'; ?>
		}
	}
</style>