<?php

//$file = 'data.csv';
$fp = fopen($file, 'r');
$obj = array();
$keys = null;
while ($data = fgetcsv($fp, 1000,",")) {

	foreach ($data as &$value) {
		$value = nl2br($value);
	}
	unset($value);

	if ($keys === null) {
		$keys = $data;
	} else {
		$obj[] = array_combine($keys, $data);
	}
}

#echo "<pre>";
#print_r($obj);
#echo "</pre>";

?>
