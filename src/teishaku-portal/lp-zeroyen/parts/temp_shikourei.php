<?php
//<meta charset="utf-8">
?>
<style>
.box_shikourei > *{padding: 60px 0;}
.box_shikourei ul{
	margin-top: min(60px,max(30px,6vw));
	gap: 30px 0;
	display: flex;
	justify-content: space-between;
}
.box_shikourei ul li{
	gap:1em;
	display: flex;
	flex-direction: column;
	align-items: center;
}
@media screen and (min-width: 1000px) {
	.box_shikourei ul li{width:31.2%;}
}
@media screen and (max-width: 999px) {
	.box_shikourei ul{flex-direction: column;}
}
</style>
<div class="box_shikourei content_box"><div class="Wbase">
<h2><div>施工例</div></h2>
<ul>
<?php
$arr=array
('01'=>'豊田市 M様'
,'02'=>'岡崎市 N様'
,'03'=>'岩倉市 S様'
);
foreach($arr as $k => $v){
	echo '<li><img src="'.$data_param_lp_zeroyen['dir'].'img/20250315/shikourei-p'.$k.'.jpg">'.$v.'</li>'.PHP_EOL;
}
?>
</ul>
</div></div>