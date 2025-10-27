<?php
//<meta charset="utf-8">
function TOP_SUBT($str,$add=''){
	if($add!=''){$add=' '.$add;}
	if(strpos($str,'//')!==false){
		/*
		$str=str_replace(array("//"),array("</span><span>"),$str);
		$str='<span>'.$str.'</span>';
		*/
		$str=str_replace(array("//"),array("<div></div>"),$str);
	}
	return '<h2 class="top_subt font_min col_000"><div>
<div class="text'.$add.'">'.$str.'</div>
<div class="beta"></div>
</div></h2>';
}
function TOP_TABLE($type,$data){
	if(!is_array($data)){$data=array($data);}
	$res='<table border="0" cellpadding="0" cellspacing="0" class="sp_tblbreak top_tbl T'.$type.'"><tr>'.chr(10);
	foreach($data	as $k => $v){
		if($k>0){$res.='<td class="pad"></td>'.chr(10);}
		$res.='<td class="box'.($k+1).'">'.$v.'</td>'.chr(10);
	}
	$res.='</tr></table>'.chr(10);
	return $res;
}
function TOP_IMG($fn){
	global $dir;
	$arr=array('svg','png','jpg');
	$img='';
	foreach($arr as $e){
		$img=$dir.'p/'.$fn.'.'.$e;
		if(file_exists($img)){break;}
	}
	if($img!=''){
		$class=str_replace(array("p","-"),array("P0","0"),$fn);
		$img_sp=str_replace(array("."),array("-sp."),$img);
		if(file_exists($img_sp)){
			$img='<img src="'.$img.'" class="'.$class.' sp_vanish"><img src="'.$img_sp.'" class="'.$class.' pc_vanish">';
		}
		else{
			$img='<img src="'.$img.'" class="'.$class.'">';
		}
	}
	return $img;
}
?>