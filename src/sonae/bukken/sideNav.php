<?php

$file = '../data.csv';
include '../data_all.php';

foreach ($obj as $value){
	
//	echo "<pre>";
//	print_r($value);
//	echo "</pre>";

	if ($value['表示'] == '表示'){
?>

<li><a href="../<?php echo $value['フォルダ']; ?>/top.html"><?php echo $value['物件名']; ?></a></li>


<?php
	}

}

?>



