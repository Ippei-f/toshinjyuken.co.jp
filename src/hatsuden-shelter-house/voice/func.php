<?php
//<meta charset="utf-8">

function VOICE_BOX($data){
	global $dir,$voice_id_02d,$voice_rep;
	$res='';
	$flag=array('notitle'=>true);
	foreach($data as $k => $v){
		if(!is_array($v)){continue;}
		switch($v[0]){
			//-----------
			case 'title':
			$res.='<h4>'.WORD_BR($v[1]).'</h4>'.chr(10);
			unset($flag['notitle']);
			break;
			//-----------
			case 'pic':
			$pic=$dir.$voice_id_02d.'/'.$v[1];
			if(file_exists($pic)){
				$pic_WH=getimagesize($pic);
				$float='floatR_pc';
				if(isset($v[2])){
					$float='float'.$v[2].'_pc';
				}
				$res.='<img src="'.$pic.'" class="'.$float.'" width="'.($pic_WH[0]/2).'">'.chr(10);
			}
			break;
			//-----------
			case 'pic-set':
			$res.='<div class="pic_flex">'.chr(10);
			unset($v[0]);
			foreach($v as $v2){
				$pic=$dir.$voice_id_02d.'/'.$v2;
				if(file_exists($pic)){
					$pic_WH=getimagesize($pic);
					$res.='<img src="'.$pic.'" width="'.($pic_WH[0]/2).'" style="max-width:'.($pic_WH[0]/20).'%;">'.chr(10);
				}
			}
			$res.='</div>'.chr(10);
			break;
			//-----------
			case 'text':
			if(isset($voice_rep)){
				foreach($voice_rep as $v2){
					$v[1]=str_replace($v2,'<span class="name">'.$v2.'</span>',$v[1]);
				}
			}
			$res.='<div class="text">'.WORD_BR($v[1]).'</div>'.chr(10);
			break;
			//-----------
			case 'clear':
			$res.='<div class="clear"></div>'.chr(10);
			break;
		}
	}
	echo '<div class="voice_box">
'.$res.'<div class="clear"></div>
</div>'.chr(10);
}
?>
