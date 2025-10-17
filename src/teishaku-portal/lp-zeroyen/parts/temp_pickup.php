<?php
//<meta charset="utf-8">
?>
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