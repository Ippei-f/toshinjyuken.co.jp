<?php
ini_set('display_errors', 0);
$file = 'bukken/data.csv';
include 'bukken/data_all.php';

$i = 0;
foreach ($obj as $value){

//	echo "<pre>";
//	print_r($value);
//	echo "</pre>";

  if ($value['表示'] == '表示'){
    if ($i<9){
		$price = number_format($value['価格'],2);
		$price = rtrim(rtrim($price,'0'),'.');
?>


<div class="c31">
	<div><a href="form_contact/form.html?bukken=<?php echo $value['フォルダ']; ?>">
		<h3><?php echo $value['物件名']; ?></h3>
		<p class="address">販売予定価格：<?php echo $value['価格']; ?></p>
		<div class="inBox">
			<div class="photo<?php if($value['パース'] == 'soon'){echo ' soon';} ?>"><img src="bukken/images/<?php echo $value['フォルダ']; ?>.jpg" /></div>
			<div class="summary">
				<p class="price"><span>年間予定収入</span><strong><?php echo $value['収入']; ?></strong></p>
				<p class="price"><span>予定利回り</span><strong><?php echo $value['利回り']; ?></strong></p>
			</div>
		</div>
		</a></div>
</div>

<?php
      $i++;
    }
  }

}

?>



