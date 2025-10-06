<?php

$file = '../bukken/data.csv';
include 'data_all.php';

foreach ($obj as $value){
	
//	echo "<pre>";
//	print_r($value);
//	echo "</pre>";

	if ($value['表示'] == '表示'){
?>



<label><input type="checkbox" name="物件[]" id="<?php echo $value['フォルダ']; ?>" value="<?php echo $value['物件名']; ?>"> <?php echo $value['物件名']; ?></label><br>



<?php
	}

}

?>
