<?php
//<meta charset="utf-8">
?>
<table class="borderTable01"><tr>
	<th>動画</th>
	<td>
	<div>動画URL：<input type="text" size="40" name="data[movie_url]" value="<?php echo TextToKanma($resDataArr[21]);?>" placeholder="https://www.youtube.com/embed/○○○○○"></div>
	<div style="margin-top: 0.5em;">※動画部分の縦横比は自動的に横10：縦6の比率になります。</div>
	<?php
	//<div>動画比率：<input type="text" size="10" name="data[movie_size][]" value=""></div>
	?>	
	</td>
</tr></table>