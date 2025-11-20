<?php
//<meta charset="utf-8">
/*
		画像のアップロード部分のみ処理を隔離・入れ替え自由にする
*/

$renameArr=array();//リネーム用パス保存配列

//既存のアップロードファイルを番号を変えて仮置き
foreach($upfile_arr as $k){
	if($mode == 'update' && isset($_POST[$k.'_name'])){
		foreach($_POST[$k.'_name'] as $key => $val){
			if($val==''){continue;}
			$parts=explode('/',$val);
			$parts=$valS=end($parts);			
			$parts=str_replace('-','.',$parts);
			$parts=explode('.',$parts);
			$parts[0].='-'.$key;
			$newName=$img_updir.'/'.$parts[0].'x.'.$parts[2];
			rename($val,$newName);//リネーム
			$renameArr[]=$newName;
			$valS=$img_updir.'/'.str_replace('.','s.',$valS);
			if(file_exists($valS)){
				//サムネイルがあれば同時にリネーム
				$newName=$img_updir.'/'.$parts[0].'sx.'.$parts[2];
				rename($valS,$newName);//リネーム
				$renameArr[]=$newName;
			}
		}
	}
}
//$_SESSION['rename']=$renameArr;
//$_SESSION['extension']=array();

foreach($upfile_arr as $k){
$thumb_make=(strpos($k,'_s')!==false)?false:true;//サムネイル作成フラグ
	if(isset($_FILES["data"]["tmp_name"][$k])){
		foreach($_FILES["data"]["tmp_name"][$k] as $key => $val){
			if(is_uploaded_file($_FILES["data"]["tmp_name"][$k][$key])){
				//サイズチェック
				if ($_FILES["data"]["size"][$k][$key] < $maxImgSize) {
					//ファイルタイプを取得
					$extension=$flag_image='';
					$imgType = $_FILES['data']['type'][$k][$key];
					switch(true){
						//------
						//GIFファイルを読み込む
						case ($imgType == 'image/gif'):
						$extension=$flag_image='gif';
						$image = ImageCreateFromGIF($_FILES['data']['tmp_name'][$k][$key]);
						break;
						//------
						//PNGファイルを読み込む
						case ($imgType == 'image/png' || $imgType == 'image/x-png'):
						$extension=$flag_image='png';
						$image = ImageCreateFromPNG($_FILES['data']['tmp_name'][$k][$key]);
						break;
						//------
						//JPEGファイルを読み込む
						case ($imgType == 'image/jpeg' || $imgType == 'image/pjpeg'):
						$extension=$flag_image='jpg';
						$image = ImageCreateFromJPEG($_FILES['data']['tmp_name'][$k][$key]);
						//画像の回転（iPhoneの縦写真が横写真として保存されてしまう問題の対策）
						if(function_exists('exif_read_data') && function_exists('imagerotate')){
							$exif_datas = exif_read_data($_FILES['data']['tmp_name'][$k][$key]);
							if(isset($exif_datas['Orientation'])){
								switch($exif_datas['Orientation']){
									case 6:
									$image = imagerotate($image, 270, 0);
									break;
									case 3:
									$image = imagerotate($image, 180, 0);
									break;
								}
							}
						}
						break;
						//------
						//その他・不許可
						default:
						$extensionArr = explode('.',$_FILES['data']["name"][$k][$key]);
						$extension = end($extensionArr);
						$extension = strtolower($extension);
						if(!in_array($extension,$extensionList)){
							$extension_error = '許可されていない拡張子です<br />';
							exit('<center><span style="color:red;font-size:16px;">【許可されていない拡張子です】<br />記事自体はすでに投稿（編集の場合には変更）されています<br /><a href="./">戻る&gt;&gt;</a></span></center>');
						}
						//------
					}//switch(true)
					
					//ファイル名を指定
					$fileName = $k.$data['id'].'-'.$key;
					$fileName_option=array('L'=>'','S'=>'s');
					//拡張子違いのファイルを削除
					foreach($extensionList as $v1){
						foreach($fileName_option as $v2){
							$deleteFilePath=$img_updir.'/'.$fileName.$v2.'.'.$v1;
							if(file_exists($deleteFilePath)) unlink($deleteFilePath);
						}
					}					
					if($flag_image!=''){
						//読み込んだ画像のサイズ
						$width = ImageSX($image); //横幅（ピクセル）
						$height = ImageSY($image); //縦幅（ピクセル）
						/*
						$imgWidthHeight
						$imgWidthHeightThumb は config.phpで設定されている
						*/
						$check_WH=array();
						$check_WH['L']=is_array($imgWidthHeight)?$imgWidthHeight:array($imgWidthHeight,$imgWidthHeight);
						if($thumb_make){
							//サムネイル
							$check_WH['S']=is_array($imgWidthHeightThumb)?$imgWidthHeightThumb:array($imgWidthHeightThumb,$imgWidthHeightThumb);
						}						
						foreach($check_WH as $whk => $wh){
							//ファイルパスを指定
							$imgFilePath = $img_updir.'/'.$fileName.$fileName_option[$whk].'.'.$extension;
							
							if($width>$wh[0] or $height>$wh[1]){//指定サイズより大きい？
								if($height < $width){//横写真の場合の処理
									$new_width = $wh[0]; //幅指定px
									$rate = $new_width / $width; //縦横比を算出
									$new_height = $rate * $height;
								}
								else{//縦写真の場合の処理
									$new_height = $wh[1]; //高さ指定px
									$rate = $new_height / $height; //縦横比を算出
									$new_width = $rate * $width;
								}
								$new_image = ImageCreateTrueColor($new_width, $new_height);
								//透明png、gif対策
								switch($extension){
									case 'png':
									imagealphablending($new_image, false);//ブレンドモードを無効にする
									imagesavealpha($new_image, true);//完全なアルファチャネル情報を保存するフラグをonにする
									break;
									case 'gif':
									$alpha = imagecolortransparent($image);  // 元画像から透過色を取得する
									imagefill($new_image, 0, 0, $alpha);       // その色でキャンバスを塗りつぶす
									imagecolortransparent($new_image, $alpha); // 塗りつぶした色を透過色として指定する
									break;
								}
								ImageCopyResampled($new_image,$image,0,0,0,0,$new_width,$new_height,$width,$height);
								switch($extension){
									case 'jpg':
									if(!@is_int($img_quality)) $img_quality = 80;//画質に数字以外の無効な文字列が指定されていた場合のデフォルト値
									ImageJPEG($new_image,$imgFilePath, $img_quality); //3つ目の引数はクオリティー（0～100）
									break;
									case 'gif':
									ImageGIF($new_image, $imgFilePath);//環境によっては使えない
									break;
									case 'png':
									ImagePNG($new_image, $imgFilePath);
									break;
								}
							}
							else{
								//サイズの範囲内であればそのまま保存
								move_uploaded_file($_FILES['data']['tmp_name'][$k][$key],$imgFilePath);
							}
							@chmod($imgFilePath, 0666);
						}//foreach($check_WH as $wh)
						//メモリを解放
						imagedestroy ($image); //イメージIDの破棄
						imagedestroy ($new_image); //元イメージIDの破棄
					}
					//画像系以外の処理
					else{
						$imgFilePath = $img_updir.'/'.$fileName.'.'.$extension;//ファイルパスを指定
						move_uploaded_file($_FILES['data']['tmp_name'][$k][$key],$imgFilePath);
						@chmod($imgFilePath, 0666);
					}
				}else{
					//エラー
					exit('ファイルサイズオーバーです。<br />記事自体はすでに投稿（編集の場合には変更）されていますので、事前に画像を縮小されるなどいただいてから再編集にてあらためて登録下さい。<a href="./">戻る</a>');
				}
			}//if(is_uploaded_file($_FILES["data"]["tmp_name"]['upfile'][$key]))
		}//foreach($_FILES["data"]["tmp_name"]['upfile'] as $key => $val)
	}//if(isset($_FILES["data"]["tmp_name"]['upfile']))
}//foreach($upfile_arr as $k)

//仮置きしたファイルのファイル名を戻す
if($mode == 'update'){
	foreach($renameArr as $key => $val){
		if(file_exists($val)){
			$newName = str_replace('x.','.',$val);
			//アップロードファイルが存在する場合、上書きしないよう仮置きファイルを削除
			if(file_exists($newName)){
				unlink($val);//仮置きファイル削除
			}
			else{
				rename($val,$newName);//リネーム
			}
		}
	}//foreach($renameArr as $key => $val)
}//if($mode == 'update')
?>