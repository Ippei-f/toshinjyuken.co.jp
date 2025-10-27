<?php
//<meta charset="utf-8">
?>
<script>
var markerData = [<?php echo implode(',',$map_set['情報']); ?>];
var zoom=10;
var center_lng=<?php echo $map_set['経度']; ?>;
var center_lat=<?php echo $map_set['緯度']; ?>;
</script>
<?php echo $temp_googlemap_js; ?>