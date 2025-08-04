<?php
//<meta charset="utf-8">
/*
		[0]:リンク先
		[1]:フルネーム
*/
$url=array();
$link_list=array
('TOP'					=>array($kaisou.'index.php'				,'ホーム')
,'TOP-ブランド'	=>array($kaisou.'index.php#brand'	,'ブランドコンセプト','en'=>'BRAND')
//---------------------------------------------------------------
,'NEWS'					=>array($kaisou.'news.php'		,'','jp'=>'ニュース')
,'物件検索'			=>array($kaisou.'search.php'	,'物件情報')
,'物件詳細'			=>array($kaisou.'search-detail.php'	,'')
,'特長'					=>array($kaisou.'merit.php'				,'スケルトンオーダーとは','en'=>'MERIT')
,'特長-災害'		=>array($kaisou.'merit-saigai.php','災害に強い家'	,'en'=>'MERIT')
,'特長-不変'		=>array($kaisou.'merit-kawaranai.php','変わらない価値','menu'=>'地盤改良 / 耐震工法'	,'en'=>'STRUCTURE')
,'家づくり'			=>array($kaisou.'structure.php','東新住建の家づくり','en'=>'STRUCTURE')
,'コンセプト'	 =>array($kaisou.'concept.php' ,'','en'=>'CONCEPT')
,'Q&A'					=>array($kaisou.'qa.php'			,'','jp'=>'よくある質問')
,'お客様の声'	 =>array($kaisou.'voice.php'	 ,'','en'=>"OWNER'S VOICE")//2025/04復活
,'会員登録'			=>array($kaisou.'member.php'	,'')
,'施工事例'			=>array($kaisou.'work.php'		,'','en'=>'WORKS')
,'インテリア'	 =>array($kaisou.'interior.php','インテリアスタイル','en'=>'INTERIOR')
,'ライフスタイル'=>array($kaisou.'lifestyle.php','','en'=>'LIFESTYLE','menu'=>'コラム','menu-en'=>'COLUMN')
,'SDGs'					=>array($kaisou.'sdgs.php'		,'SDGsへの取り組み','hmenu'=>'SDGs','en'=>'SDGs')
,'安さの秘密'	=>array($kaisou.'yasusa.php'		,'安さのヒミツ','en'=>'THE SECRET OF LOW PRICE')
//---------------------------------------------------------------
,'お問い合わせ'							=>array($kaisou.'contact.php'					,'資料請求・お問合せ'
														,'fmenu'=>'来場予約 / お問い合わせ'
														,'p-title'=>'ご来場予約・お問い合わせ・資料請求'
														,'en'=>'CONTACT')
,'お問い合わせ-アウトレット'=>array($kaisou.'contact-outlet.php'	,'WEB限定アウトレット
無人対応見学・購入申し込み')
//---------------------------------------------------------------
//,'insta'=>array('https://www.instagram.com/skeleton_order/?igshid=whfik72riucs'.$t_blank,'')
,'insta'	=>array('https://www.instagram.com/toshinjyuken_no_ie/'.$t_blank,'')
,'youtube'=>array('https://www.youtube.com/@toshinjyuken_house'.$t_blank,'')
,'LINE'		=>array('https://lin.ee/v4vz5KD'.$t_blank,'')
//---------------------------------------------------------------
,'東新住建'						=>array('https://www.toshinjyuken.co.jp/'.$t_blank,'')
,'東新住建-外壁材'		 =>array('https://www.toshinjyuken.co.jp/chumon/feature/quality.html'.$t_blank,'')
,'東新住建-歴史'			=>array('https://www.toshinjyuken.co.jp/corporate/history.html'.$t_blank,'')
,'東新住建-DUP'				=>array('https://www.dup-m.jp/'.$t_blank,'')
,'東新住建-DUPHILLS'	=>array('https://www.toshinjyuken.co.jp/dup-hills/'.$t_blank,'')
,'東新住建-学区'			=>array('https://www.toshinjyuken.co.jp/gakku-project/'.$t_blank,'')
,'東新住建-樹流'			=>array('https://www.toshinjyuken.co.jp/kiryu/'.$t_blank,'')
,'東新住建-そだつ'		 =>array('https://www.toshinjyuken.co.jp/sodatsu/'.$t_blank,'')
,'東新住建-風致'			=>array('https://www.toshinjyuken.co.jp/fuuchi-project/'.$t_blank,'')
,'東新住建-テイシャク'=>array('https://www.toshinjyuken.co.jp/teishaku-portal/'.$t_blank,'')
,'東新住建-平屋'			=>array('https://www.toshinjyuken.co.jp/hiraya/'.$t_blank,'')
,'東新住建-発電シェルター'=>array('https://www.toshinjyuken.co.jp/hatsuden-shelter-house/'.$t_blank,'')
,'東新住建-ALC'				=>array('https://www.toshinjyuken.co.jp/new-concrete-log-house/'.$t_blank,'')
//---------------------------------------------------------------
//,''=>array('#','')
);
//[1]が空白の時はkeyと同じ
foreach($link_list as $key => $val){
	if($val[1]==''){
		$link_list[$key][1]=$key;
		//$link_list[$key][1]=str_replace('&',' & ',$link_list[$key][1]);
	}
}

//◆BRAND CONCEPT
$link_list_brand_concept=array
('平屋'=>array
 ('bnr'=>'hiraya'
 ,'text'=>'誰もが心の奥から感じる、懐かしさという安心。
東新住建の高い「土地力」を活かした約60坪の物件や、ハーフオーダー対象物件では外観と内装をパターンの中からセレクトでき、まるで注文住宅のようなこだわりを実現。人も 暮らしも 平屋に帰ろう。'
 //,'search'=>'search.php'
 ,'brand'=>1
 )
//-----------------
,'発電シェルター'=>array
 ('bnr'=>'hatsuden'
 ,'text'=>'次世代のコンパクトで無駄のない暮らし。太陽光発電システムを標準仕様とし、再生可能エネルギー源を活用するPV住宅です。
東新住建独自の4.3倍2×4工法による高い耐震性と売電収入で、家族の安全と家計を守ります。'
 //,'search'=>'search.php' 
 ,'brand'=>2
 )
//-----------------
,'そだつ'=>array
 ('bnr'=>'sodatsu'
 ,'text'=>'いつでも誰でも「自分の家を持つこと」を可能にした新しい一戸建て。一生に一度のマイホームというこれまでの考え方を超えて、多様化する暮らしに合わせてカジュアルに購入や住み替えしやすいしくみをつくりました。これから育まれる「新・かぞく」にぴったりな住まいです。'
 //,'search'=>'search.php'
 ,'brand'=>3 
 )
//-----------------
,'DUP'=>array
 ('bnr'=>'dup'
 ,'text'=>'たった2家族だけのプライベート感溢れる、1棟2戸のメゾネットマンション。駅近エリアに限定したコンパクトな住まいは、リーズナブルな価格とランニングコストの負担を抑えることで、ゆとりある快適かつ上質な都市生活を実現します。'
 //,'search'=>'info.php'
 ,'brand'=>4
 )
//-----------------
,'ALC'=>array
 ('bnr'=>'alc'
 ,'text'=>'ALCコンクリートは60年間張り替えが不要で永く美しい外観を保ちます。優れた耐熱・保温・遮音性能で快適な住空間を生み出します。水に浮くほど軽いので地震時の建物への負担を軽減。断熱材いらずで木地仕上げの温もり溢れる内壁を実現します。'
 //,'search'=>'search.php'
 ,'brand'=>5
 ) 
//-----------------
,'テイシャク'=>array
 ('bnr'=>'teishaku'
 ,'text'=>'土地は借りて、建物だけを買うから、土地代にかける費用を抑えて豊かな暮らしに活用することができる「東新住建のテイシャク」。東新住建は、30年間で1,000棟の販売・供給実績を得て、定期借地権付き住宅販売シェア全国No.1の実績を誇ります。ハーフオーダー対象物件では外観と内装をパターンの中からセレクトでき、まるで注文住宅のようなこだわりを実現できます。'
 ,'search'=>'search.php')
);
?>