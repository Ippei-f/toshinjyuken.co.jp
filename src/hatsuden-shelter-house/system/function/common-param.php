<?php
//<meta charset="utf-8">

//共通パラメータ
function COMMON_PARAM($k,$n=''){
	$res='';
	switch($k){
		case 'weekArray'://曜日の配列（日本語、英語など自由です。順番は変更不可）
			$res=array('日','月','火','水','木','金','土');
		break;
		case 'upfile'://画像ファイル種別
			$res=array('photo');//「_s」をつけるとサムネイルを作らない
		break;
		case 'dbDataStructure'://登録データ（カラム順の変更厳禁。追加の場合は末尾に）
			//「@」がついたものは配列で管理
			$res=array('id','up_ymd','title','category','url','window','comment@','public_flag'
	
		, 8=>'set_type@'//セットタイプ
		, 9=>'pickup'		//ピックアップ
		,10=>'area'			//エリア
		,11=>'photo_type'//画像タイプ
		,12=>'photo_url'//画像URL
		,13=>'brand'		//ブランド
		//,11=>'label@'		//ラベル
			);
		break;
		case 'search_cate':
			$res=array
			(1=>array('会員限定'							,'phase-member.svg')
			,2=>array('プロジェクト進行中'		 ,'phase-project.svg')
			,3=>array('随時見学イベント受付中','phase-const.svg')
			,4=>array('モデルハウス公開中'		 ,'phase-model.svg')
			,99=>array('その他','')
			);
		break;
		case 'search_photo_type':
		$res=array
		(1=>'仮画像'
		,2=>'アップロード'
		,3=>'直リンク'
		);
		break;
		case 'search_brand':
		$res=array
		(0=>array('','非表示')
		,1=>array('B_dup'			,'DUP')
		,2=>array('B_kodate'	,'東新住建の家')
		,3=>array('B_sodatsu'	,'そだつ')
		,4=>array('B_teishaku','テイシャク')
		,5=>array('B_hiraya'	,'HIRAYA')
		);
		break;
		/*
		case 'search_label':
		$res=array
		(''=>''
		);
		break;
		*/
	}
	if($n!==''){
		foreach($res as $k => $v){
			$res[$k]=$v[$n];
		}
	}
	return $res;
}
?>