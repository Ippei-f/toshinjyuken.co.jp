<?php

//$folder = 'フォルダー';
$file = '../../data.csv';

$fp = fopen($file, 'r');
$keys = null;

while ($data = fgetcsv($fp, 1000,",")) {
	if ($keys === null) {
		$keys = $data;
	} elseif ($data[2] == $folder) {
		$obj = array_combine($keys, $data);
		break;
	} else {
		continue;
	}
}

foreach ($obj as $key => &$value) {
	$value = nl2br($value);
}
unset($value);


//echo "<pre>";
//print_r($obj);
//echo "</pre>";





?>
