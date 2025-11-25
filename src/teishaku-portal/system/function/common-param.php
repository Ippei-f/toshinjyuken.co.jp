<?php
//<meta charset="utf-8">

//共通パラメータ
function COMMON_PARAM($k){
	$res='';
	switch($k){
		case 'weekArray'://曜日の配列（日本語、英語など自由です。順番は変更不可）
			$res=array('日','月','火','水','木','金','土');
		break;
		case 'upfile'://画像ファイル種別
			$res=array('main','kukaku','gallery');//「-s」をつけるとサムネイルを作らない
		break;
		case 'upfile-news'://画像ファイル種別
			$res=array('upfile','news');//「-s」をつけるとサムネイルを作らない
		break;
		case 'upfile-life'://画像ファイル種別
			$res=array('upfile','naiyou');//「-s」をつけるとサムネイルを作らない
		break;
		case 'dbDataStructure'://登録データ（カラム順の変更厳禁。追加の場合は末尾に）
			$res=array('id','up_ymd','title','category','url','window','comment','public_flag'
	, 8=>'gallery_type'		//ギャラリー・項目タイプ
	, 9=>'gallery_text'		//ギャラリー・テキスト
	,10=>'newmark'				//NEWマーク
	,11=>'jouhou_text'		//物件情報・テキスト
	,12=>'price_text'			//金額・テキスト
	,13=>'kukaku_type'		//区画・項目タイプ
	,14=>'kukaku_text'		//区画・テキスト
	,15=>'access_map'			//アクセス・埋め込みマップ
	,16=>'access_text'		//アクセス・テキスト
	,17=>'gaiyou_text'		//物件概要・テキスト
	,18=>'area1'					//エリア
	,19=>'pickup'					//ピックアップ
	,20=>'kukaku_text2'		//区画・テキスト（追加分）
	,21=>'price_keisan'		//金額・計算用
	,22=>'floor'					//階層
	,23=>'room_order'			//ルームオーダー
	,24=>'mainpic_prm'		//コメント下写真関連
	/*
	,21=>'movie_url'			//★ルームツアー・動画URL
	*/
			);
		break;
		case 'dbDataStructure-news'://登録データ（カラム順の変更厳禁。追加の場合は末尾に）
			$res=array('id','up_ymd','title','category','url','window','comment','public_flag'
	, 8=>'news_subcate'	//ニュースサブカテゴリ（未使用）
	, 9=>'news_text'		//記事内容・文章全般
	,10=>'news_type'		//記事内容・タイプ
	,11=>'news_newmark'	//NEWマーク
			);
		break;
		case 'dbDataStructure-life'://登録データ（カラム順の変更厳禁。追加の場合は末尾に）
			$res=array('id','up_ymd','title','category','url','window','comment','public_flag'
	
	, 8=>'naiyou_text'		//記事内容・文章全般
	, 9=>'naiyou_type'		//記事内容・タイプ
	//▼2020/12/17追加
	,10=>'imgsize_f'	//画像サイズ指定・有効フラグ
	,11=>'imgsize_n'	//画像サイズ指定・横幅
			);
		break;
		
		case 'order_count':
			$res=array
			('3ヵ月'=>'3 month'
			,'2ヵ月'=>'2 month'
			,'1ヵ月'=>'1 month'
			,'3週間'=>'3 week'
			,'2週間'=>'2 week'
			,'1週間'=>'1 week'
			,'5日'=>'5 day'
			,'4日'=>'4 day'
			,'3日'=>'3 day'
			,'2日'=>'2 day'
			,'1日'=>'1 day'
			);
			//date('Y-m-d', strtotime('+1 month'));
		break;
		case 'area':
		require '../../../temp_php/data-area.php';
		$res=$area_list;
		break;
		case 'phases':
			$res=array
			(1=>'会員限定'
			/*
			,2=>'オーダー受付中'//販売開始
			,3=>'イベント受付中'//外観完成
			,4=>'モデルハウス公開'
			*/
			,5=>'プロジェクト進行中'
			,99=>'一般公開'
			,999=>'完売物件'
			);
		break;
		case 'news_cate':
			$res=array
			(1=>'INFO'//'インフォーメーション'
			,2=>'ブログ'
			,3=>'コラム'
			);
		break;
		case 'search_floor':
			$res=array
			(1=>'平屋'
			,2=>'2階建て'
			);
		break;
		case 'mainpic_prm':
			$res=array
			(1=>'サムネイル'
			,2=>'ギャラリー最上部写真'
			,99=>'無し'
			);
		break;
		/*
		case 'news_page_cate':
			$res=array
			(1=>'見学会／イベント情報'
			,2=>'更新情報'
			,3=>'アドバイザーNEWS'
			);
		break;
		*/
	}
	return $res;
}
?>