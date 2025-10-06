
<div id="newsNav" class="margin_top10">
<?php


foreach(glob('*.html') as $file){ //htmlファイルのパスを全て取得
	if (preg_match("/_test/", $file)) {  
		continue;
	} 
		$file_list[] = $file; //配列に格納		
}

//rsort($file_list); //降順に並べ替え
sort($file_list); //昇順に並べ替え

$myFile = basename($_SERVER['PHP_SELF']);//現在のファイル名

$num = array_search($myFile, $file_list);

if ($num != 0){
	echo "<a href='".$file_list[$num-1]."'>≪ 前へ</a> ";
}

echo "｜<strong>".($num+1)."</strong> / ".count($file_list)."｜";


if ($num == count($file_list)-1){
	echo "<a href='".$file_list[0]."'> 最初へ戻る ≫</a>";
} else {
	echo "<a href='".$file_list[$num+1]."'> 次へ ≫</a>";
}





?>

</div>
