<?php
session_start();
$dir=array();
$dir['system']='system/';
$dir['summary']=$dir['system'].'summary/';
include $dir['system'].'secret/cms_now.php';//現在時刻・ページ
include $dir['system'].'secret/cms_param.php';//配列
include $dir['system'].'secret/record_read.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php
/*
<!--#include virtual="./common/include/gtm-head.php" -->
*/
include './common/include/gtm-head.php';
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>土地を持たない不動産投資｜SONAE</title>
    <meta name="description" content="SONAEは土地を持たずにはじめられる新築・築浅メゾネット1棟アパート投資。定期借地を活用し、利回り10％超を実現。低リスク・高収益の新しい不動産投資スタイル。" />

    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/style.css">

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200;300;400;500;600;700;900&family=Passion+One:wght@300;400;700;800;900&display=swap" rel="stylesheet">

    <!--swiper-->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <script src="common/js/parallax.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/simple-parallax-js@5.6.2/dist/simpleParallax.min.js"></script>

    <!-- タブレット最適化表示用 -->
    <script>
        var d=window.document;
        if(
            navigator.userAgent.indexOf('iPhone')>-1||navigator.userAgent.indexOf('iPod')>0||navigator.userAgent.indexOf('Android')>0
        )
            d.write('<meta id="vp" name="viewport" content="width=device-width; initial-scale=1;">');
        else if(
            navigator.userAgent.indexOf('iPad')>-1||navigator.userAgent.indexOf('macintosh')>-1 && 'ontouchend' in document||navigator.userAgent.indexOf('Android')>0&&navigator.userAgent.indexOf('Mobile')==-1
        )
            d.write('<meta name="viewport" content="width=1300, maximum-scale=1, user-scalable=yes"><link rel="stylesheet" type="text/css" href="../common/css/ipad.css" media="all">');
    </script>
    
    <script>
    if (screen.width > 767){
        //var Android = document.getElementById('vp');
        //Android.setAttribute('content','width=1200');
    
        var metalist = document.getElementsByTagName('meta');
        for(var i = 0; i < metalist.length; i++) {
            var name = metalist[i].getAttribute('name');
            if(name && name.toLowerCase() === 'viewport') {
                metalist[i].setAttribute('content', 'width=1300');
                break;
            }
        }
    }
    </script>
</head>
<body>
<?php
/*
<!--#include virtual="./common/include/header.php" -->
*/
include './common/include/header.php';
?>

    <script>//bodyに各ページ固有のclassを設定
        document.addEventListener('DOMContentLoaded', function () {
            document.body.classList.add('page-home');
        });
    </script>

    <section class="homeCont" id="fv">
        <h1 class="title">
            
            <div class="titleObj">
                <picture class="pict">
                    <img src="images/home/fv-catch.svg" alt="モテる投資？いや、持たない投資。">
                </picture>
            </div>
            <div class="titleObj">
                <picture class="pict">
                    <source srcset="images/home/fv-title.svg" media="(min-width:768px)" />
                    <img src="images/home/fv-title-sp.svg" alt="土地を持たない、新しい不動産投資" />
                </picture>
            </div>
            <div class="titleObj">
                <picture class="pict logo">
                    <img src="images/home/fv-logo.svg" alt="SONAE">
                </picture>
            </div>
            <p class="fukidashi pict">
                <img src="images/home/fv-fukidashi.svg" alt="賢く相続税対策!">
            </p>
        </h1>

        <div class="checkTopics">
            <div class="topic">
                <div class="box"></div>
                <div class="cont" fw="700"><span class="">新築・築浅</span>物件</div>
            </div>
            <div class="topic">
                <div class="box"></div>
                <div class="cont" fw="700">高利回り<span class="passion" fw="500">10<font>%</font></span>以上</div>
            </div>
            <div class="topic">
                <div class="box"></div>
                <div class="cont" fw="700">満室運用中<br class="spOnly">（高入居率<span class="passion" fw="500">97.7<font>%</font></span>）</div>
            </div>
        </div><!--checkTopics-->


<!------------------------------------------------------------->

        <!-- Slider -->
        <div class="swiper uriBox">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper uriList">
            <!-- Slides -->
            <div class="swiper-slide topic">
                <p class="pict"><img src="images/home/uri-teisyak.svg" alt="定期借地No.1"></p>
                <p class="cap">※定期借地権付戸建て住宅供給実績</p>
            </div>

            <p class="by pict pcOnly"><img src="images/home/uri-by.svg" alt="×"></p>
            
            <div class="swiper-slide topic">
                <p class="pict"><img src="images/home/uri-mesonet.svg" alt="メゾネット賃貸No.1"></p>
                <p class="cap">※メゾネット賃貸全国累計13,000戸</p>
            </div>

            <p class="by pict pcOnly"><img src="images/home/uri-by.svg" alt="×"></p>
            
            <div class="swiper-slide topic">
                <p class="pict"><img src="images/home/uri-AImarke.svg" alt="不動産AIマーケティング"></p>
                <p class="cap">※官公庁・金融機関・シンクタンク採用</p>
            </div>
        </div><!--uriList-->

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar uriScrollbar"></div>
        </div>

        <script>//スマホ時に横スクロールを真ん中にするためだけのスライダ（憤怒）
            const swiperSlides = document.getElementsByClassName("uriBox");
            const breakPoint = 767; // ブレークポイントを設定
            let swiper;
            let swiperBool;

            window.addEventListener(
            "load",
            () => {
                if (breakPoint < window.innerWidth) {
                    swiperBool = false;
                } else {
                    createSwiper();
                    swiperBool = true;
                    tateSwiper();
                    swiperBool = true;
                }
            },
            false
            );

            window.addEventListener(
            "resize",
            () => {
                if (breakPoint < window.innerWidth && swiperBool) {
                    swiper.destroy(false, true);
                    swiperBool = false;
                } else if (breakPoint >= window.innerWidth && !swiperBool) {
                    createSwiper();
                    swiperBool = true;
                    tateSwiper();
                    swiperBool = true;
                }
            },
            false
            );

            //ウリスライダ
            const createSwiper = () => {
                swiper = new Swiper(".uriBox", {
                    loop: false,
                    slidesPerView: 2,
                    spaceBetween: 40,
                    initialSlide: 1, //1番目は'0'
                    centeredSlides:true, 
                    
                    // And if we need scrollbar
                    scrollbar: {
                        el: '.uriScrollbar',
                    }
                });
            };

            //NO.1スライダ
            const tateSwiper = () => {
                swiper = new Swiper(".tateBlock", {
                    loop: false,
                    slidesPerView: 2,
                    spaceBetween: 20,
                    initialSlide: 1, //1番目は'0'
                    centeredSlides:true, 
                    
                    // And if we need scrollbar
                    scrollbar: {
                        el: '.tateScrollbar',
                    }
                });
            };
        </script>

<!------------------------------------------------------------->
              

        <div class="container">
            <div class="swiper homeImases">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <p class="pict"><img src="images/home/slide/sample-home-01.jpg" alt=""></p>
                    </div>
                    <div class="swiper-slide">
                        <p class="pict"><img src="images/home/slide/sample-home-02.jpg" alt=""></p>
                    </div>
                    <div class="swiper-slide">
                        <p class="pict"><img src="images/home/slide/sample-home-03.jpg" alt=""></p>
                    </div>
                    <div class="swiper-slide">
                        <p class="pict"><img src="images/home/slide/sample-home-04.jpg" alt=""></p>
                    </div>
                    <div class="swiper-slide">
                        <p class="pict"><img src="images/home/slide/sample-home-05.jpg" alt=""></p>
                    </div>
                    <div class="swiper-slide">
                        <p class="pict"><img src="images/home/slide/sample-home-06.jpg" alt=""></p>
                    </div>
                </div><!--swiper-wrapper-->
            </div><!--swiper-->
        </div><!--container-->

        <a href="property.php" class="alterBtn">すべての物件を見る</a>

        <div class="illustBlock">
            <div class="illustBox female pict">
                <img src="images/home/fv-cloud-fe.png" alt="" class="person">
                <img src="images/home/fv-cloud-fe_cash.svg" alt="" class="cash">
            </div>

            <div class="illustBox male pict">
                <img src="images/home/fv-cloud-m.png" alt="" class="person">
                <img src="images/home/fv-cloud-m_cash.svg" alt="" class="cash">
            </div>

            <picture class="bgDia left pict">
                <source srcset="images/home/fv-bg_daia-left.svg" media="(min-width:768px)" />
                <img src="images/home/fv-bg_daia-left-sp.svg" alt="sp.jpg" />
            </picture>
            <picture class="bgDia right pict">
                <source srcset="images/home/fv-bg_daia-right.svg" media="(min-width:768px)" />
                <img src="images/home/fv-bg_daia-right-sp.svg" alt="sp.jpg" />
            </picture>
        </div><!--illustBlock-->
    </section><!--fv-->

    <section class="homeCont" id="bnrSec">
        <div class="container">
            <div class="swiper bnrSlider">
                <div class="swiper-wrapper">
                    <a href="zoom/contact.php" class="swiper-slide">
                        <p class="pict"><img src="images/home/bnr-zoom.svg" alt="Zoomで何でも相談！"></p>
                    </a>
                    <a href="contents.html" class="swiper-slide ">
                        <p class="pict"><img src="images/home/bnr-line.svg" alt="LINEで先取り！"></p>
                    </a>
                    <a href="membership/contact.php" class="swiper-slide ">
                        <p class="pict"><img src="images/home/bnr-secret.svg" alt="会員登録でシークレット物件閲覧可能になります。"></p>
                    </a>
                    
                </div><!--swiper-wrapper-->

            </div><!--bnrSlider-->
            <!-- If we need pagination -->
            <div class="swiper-pagination bnrSlider-pages"></div>
        </div><!--container-->
    </section><!--bnrSec-->

    <section class="homeCont" id="strongSec">
        <div class="contBlock yokinZone">
            <div class="contBox fadeInObj">
                <div class="pict fukidashi">
                    <img src="images/home/yokin-fukidashi.svg" alt="5,000万円以上の現預金がある方">
                </div>
                <div class="moji" fw="700">
                    <span class="grayText">現金のまま</span>では、<br>多額の納税負担に！
                </div>
                <div class="yokareto">
                    <p class="pict illust">
                        <img src="images/home/yokin-illust.svg" alt="良かれと思って残したのに...">
                    </p>
                    <p class="pict yajirushi">
                        <img src="images/home/yokin-100per.svg" alt="100%課税対象に">
                    </p>
                </div><!--yokareto-->
                <div class="moji" fw="700">
                    <span class="passion hoso" fw="300">SONAE</span> なら、<br>評価額を最大<span class="passion">60<font>%オフ！</font></span>
                </div>
            </div>
            
            <div class="contBox matome fadeInObj">
                <p class="pict illust"><img src="images/home/yokin-illust-good.svg" alt="Good!"></p>
                <p class="text" fw="700">
                    さあ、<span class="passion hoso" fw="300">SONAE</span> でかしこく節税し、<br class="pcOnly">毎月の安定収益を確保しましょう！
                </p>
            </div><!--matome-->
            
        </div><!--contBlock-->
        
    </section><!--strongSec-->

    <section class="homeCont" id="threePoints">
        <h2 class="sectionHeader pict fadeInObj">
            <img src="images/home/strongpoint-title.svg" alt="SONAE3つの強み">
        </h2>
        <div class="contBlock">
            <div class="innerWrapper">
                <div class="data fadeInObj fromRight">
                    <p class="text-01">土地の取得費用を抑えて</p>
										<div style="margin-bottom: -1em;"><div class="enhancedText" style="position: relative; top: -0.25em;">“<span class="passion karashiText">利回り<font class="strong">10</font>%</span>を<br class="spOnly"><font class="spacer spOnly">&ensp;</font>実現”<font class="spacer spOnly">&ensp;</font>
                    </div></div>
                    <div class="contBox">
                        <p class="header" fw="700">収益を生む建物だけに集中投資</p>
                        <p class="text">
                            土地を購入しないため、初期投資が抑えられ、10％以上の高い利回りが得られます。
                        </p>
                    </div>
                    <a href="return.html" class="btn">詳しくはこちら</a>
                </div><!--data-->
                <div class="illust fadeInObj">
                    <p class="pict">
                        <img src="images/home/strongpoint-illust-01.png" alt="利回り10％以上" loading="lazy">
                    </p>
                </div>
            </div><!--innerWrapper-->
        </div><!--contBlock-->

        <div class="contBlock">
            <div class="innerWrapper">
                <div class="data fadeInObj fromRight">
                    <p class="text-01">定期借地の活用で</p>
                    <div style="margin-bottom: 1em;"><div class="enhancedText" style="position: relative; top: 0.25em;">“<span class="karashiText">相続税</span>評価を<font class="spacer">&ensp;</font><br><font class="spacer">&ensp;</font><span class="passion"><font class="strong">60</font>%</span>大幅減”</div></div>
                    <div class="contBox">
                        <p class="header" fw="700">資産効率を最大化する仕組み</p>
                        <p class="text">
                            土地を持たないことで、相続税や固定資産税の負担が大幅に軽減され、資産運用が効率的です。
                        </p>
                    </div>
                    <a href="strategy.html" class="btn">詳しくはこちら</a>
                </div><!--data-->
                <div class="illust fadeInObj">
                    <p class="pict">
                        <img src="images/home/strongpoint-illust-02.png" alt="相続税評価60％オフ" loading="lazy">
                    </p>
                </div>
            </div>
            
        </div><!--contBlock-->

        <div class="contBlock">
            <div class="innerWrapper">
                <div class="data fadeInObj fromRight">
                    <p class="text-01">希少なメゾネット型で</p>
                    <div class="enhancedText">
                        “脅威の<font class="spacer spOnly">&ensp;</font><br class="spOnly"><font class="spacer spOnly">&ensp;</font><span class="passion karashiText"><font class="strong">97.7</font>%入居率</span>”
                    </div>
                    <div class="contBox">
                        <p class="header" fw="700">30年以上、13,000戸の実績ベース</p>
                        <p class="text">
                            希少性の高さと明確なターゲット選定で高い入居率を誇るメゾネット物件は、再販を見据えたスムーズな資産整理が可能です。
                        </p>
                    </div>
                    <a href="features.html" class="btn">詳しくはこちら</a>
                </div><!--data-->
                <div class="illust fadeInObj">
                    <p class="pict">
                        <img src="images/home/strongpoint-illust-03.png" alt="入居率97.7%" loading="lazy">
                    </p>
                </div>
            </div>
        </div><!--contBlock-->
    </section><!--threePoints-->

    <section class="homeCont" id="perthSec">
        <!-- <div class="innerWrapper" data-parallax="scroll" data-position="center" data-image-src="images/home/perth-img.jpg"> -->
        <div class="innerWrapper">
            
             <div class="paraBG" style="position: absolute; top:0; left:0; width:100%; height:100%; text-align: center;">
                <img src="images/home/perth-img.jpg" alt="" class="js-parallax" style="width:78%;">
             </div>
             
            <div class="bgBox"></div>
            <div class="contBox">
                <p class="header pict">
                    <img src="images/home/perse-header.svg" alt="SONAEは、1・2階併用型のメゾネット賃貸に限定">
                </p>
                <p class="text">
                    戸建て感覚のメゾネット賃貸は、ライフスタイルの変化に対応しやすく、ファミリー層に長く選ばれ続けています。
                </p>
            </div>
        </div><!--innerWrapper-->
    </section><!--perthSec-->
    <style>
        .parallax-mirror{
            transform:scale(1.5);
        }
    </style>

    <section class="homeCont" id="propertySec">
        <div class="contBlock upper">
            <div class="innerWrapper fadeInObj">
                <h2 class="secHeader">
                    <p class="main pict"><img src="common/images/title-property.svg" alt="PROPERTY"></p>
                    <p class="sub">収益物件</p>
                </h2>
            
                <div class="contBox cardSlider swiper">
                    <ul class="cardList swiper-wrapper clearfix">
<?php
$fn=$dir['summary'].'data/list.txt';
$fdata=RECORD_R_DATA($fn);
$fdata=RECORD_R_LISTDATA($fdata);
shuffle($fdata);
$a=array();
//print_r($fdata);
$cnt=0;
$max=4;
foreach($fdata as $v){
	if(RECORD_TIMER_LIMIT($v)){continue;}//タイマー（trueで非表示）
	$b=$v;//リストの情報
	//if(strpos($cms_param['状態'][$v[1]][0],'限定')===false){
	if($v[1]!=2){
		/*
				会員限定以外は以下の情報も含める
				・所在地（優先度：一覧用 > 通常）
				・物件種別
				・土地権利
				・販売価格
				・想定年間収入
				・表面利回り
		*/
		$fn=$dir['summary'].'data/edit/id-'.sprintf('%03d',$v[0]).'.txt';
		$fdata_dt=RECORD_R_DATA($fn);
		$fdata_dt=RECORD_R_EDITDATA($fdata_dt);
		//print_r($fdata_dt);
		$fdata_dt['想定年間収入']=$fdata_dt['物件詳細']['想定年間収入'];
		if(isset($fdata_dt['所在地一覧用'])&&!empty($fdata_dt['所在地一覧用'])){
			$fdata_dt['所在地']=$fdata_dt['所在地一覧用'];
		}
		$k=array
		('所在地'
		,'物件種別'
		,'土地権利'
		,'販売価格'
		,'想定年間収入'
		,'表面利回り'
		);
		foreach($k as $kv){
			$b[$kv]=$fdata_dt[$kv];
		}
	}
	$a[]=$b;	
	$cnt++;
	if($cnt>=$max){break;}//ループ終了
}
$fdata=$a;

function LOCAL_CARD_LIST($a,$type=''){
	global $dir;
	$a['詳細ページ']='summary/detail.php?id='.$a[0];
	switch($a[1]){
		case 1://公開
		echo '<li class="card '.$type.' swiper-slide clearfix">
<div class="front">'.PHP_EOL;
		if(!empty($a['表面利回り'])){
			$b=explode('.',$a['表面利回り']);
			if(empty($b[0])){$b[0]=0;}
			if(!isset($b[1])||empty($b[1])){$b[1]=0;}
			echo '	<div class="numBox"><p class="num"><span class="strong">'.$b[0].'</span>.<span class="few">'.sprintf('%02d',$b[1]).'</span>%</p></div>'.PHP_EOL;
			
			$a['表面利回り'].='%';//↓のリスト用
		}
		if(!empty($a['所在地'])){echo '	<p class="address">'.$a['所在地'].'</p>'.PHP_EOL;}
		echo '</div>
<div class="back">'.PHP_EOL;
		$a['外観']=glob($dir['summary'].'upload/id'.sprintf('%03d',$a[0]).'-*');
		$a['外観']=!empty($a['外観'])?'<img src="'.$a['外観'][0].'" alt="'.$a['所在地'].'">':'';
		if(!empty($a['販売価格'])&&is_numeric($a['販売価格'])){
			$a['販売価格']='¥'.number_format($a['販売価格']);
		}
		if(!empty($a['想定年間収入'])&&is_numeric($a['想定年間収入'])){
			$a['想定年間収入']='¥'.number_format($a['想定年間収入']);
		}
		echo '	<p class="pict">'.$a['外観'].'</p>
	<div class="data">
		<ul class="dataList normal">
			<li class="topic"><p class="header">所在地</p><p class="cont">'.$a['所在地'].'</p></li>
			<li class="topic"><p class="header">物件種別</p><p class="cont">'.$a['物件種別'].'</p></li>
			<li class="topic"><p class="header">土地権利</p><p class="cont">'.$a['土地権利'].'</p></li>
			<li class="topic"><p class="header">販売価格</p><p class="cont">'.$a['販売価格'].'</p></li>
		</ul>
		<p class="bar"></p>
		<ul class="dataList rimawari">
			<li class="topic"><p class="header">想定年間収入</p><p class="cont">'.$a['想定年間収入'].'</p></li>
			<li class="topic"><p class="header">表面利回り</p><p class="cont">'.$a['表面利回り'].'</p></li>
		</ul>
		<a href="'.$a['詳細ページ'].'" class="btn">より詳しく知る</a>
	</div>
</div>
</li>'.PHP_EOL;
		break;
		case 2://会員限定
		echo '<li class="card secret swiper-slide clearfix">
<div class="front"></div>
<div class="back"><a href="'.$a['詳細ページ'].'"></a></div>
</li>'.PHP_EOL;
		/*  onclick="return false;" */
		break;
	}
}
//print_r($fdata[1]);
$b=array
(1=>'teisyaku'
,2=>'shoyuu'
);
foreach($fdata as $a){
	LOCAL_CARD_LIST($a,$b[$a[6]]);
}
/*
                        <li class="card secret swiper-slide clearfix">
                            <div class="front">
                                
                            </div><!--front-->
                            <div class="back">
                                <a href="summary/ownership018.html">
                                    <p class="pict">
                                        
                                    </p>
                                    <div class="data">
                                        
                                    </div><!--data-->
                                </a>
                            </div><!--back-->
                        </li>
                        
                        <li class="card teisyaku swiper-slide clearfix">
                            <div class="front">
                                <div class="numBox">
                                    <p class="num"><span class="strong">10</span>.<span class="few">08</span>%</p>
                                </div>   
                                <p class="address">愛知県豊田市京町</p>
                            </div><!--front-->
                            <div class="back">
                                <p class="pict">
                                    <img src="images/summary/fixed-term_land003/photo001.jpg" alt="">
                                </p>
                                <div class="data">
                                    <ul class="dataList normal">
                                        <li class="topic">
                                            <p class="header">所在地</p>
                                            <p class="cont">愛知県豊田市京町</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">物件種別</p>
                                            <p class="cont">メゾネット1棟3戸</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">土地権利</p>
                                            <p class="cont">一般定期借地権</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">販売価格</p>
                                            <p class="cont">¥39,500,000</p>
                                        </li>
                                    </ul>
                                    <p class="bar"></p>
                                    <ul class="dataList rimawari">
                                        <li class="topic">
                                            <p class="header">想定年間収入</p>
                                            <p class="cont">¥3,984,000</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">表面利回り</p>
                                            <p class="cont">10.08%</p>
                                        </li>
                                    </ul>
                                    <a href="summary/fixed-term_land003.html" class="btn">より詳しく知る</a>
                                </div><!--data-->
                            </div><!--back-->
                        </li>
                        
                        <li class="card teisyaku swiper-slide clearfix">
                            <div class="front">
                                <div class="numBox">
                                    <p class="num"><span class="strong">10</span>.<span class="few">51</span>%</p>
                                </div>   
                                <p class="address">愛知県一宮市北浦町</p>
                            </div><!--front-->
                            <div class="back">
                                <p class="pict">
                                    <img src="images/summary/fixed-term_land002/photo004.jpg" alt="">
                                </p>
                                <div class="data">
                                    <ul class="dataList normal">
                                        <li class="topic">
                                            <p class="header">所在地</p>
                                            <p class="cont">愛知県一宮市北浦町</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">物件種別</p>
                                            <p class="cont">メゾネット1棟4戸</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">土地権利</p>
                                            <p class="cont">一般定期借地権</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">販売価格</p>
                                            <p class="cont">¥39,200,000</p>
                                        </li>
                                    </ul>
                                    <p class="bar"></p>
                                    <ul class="dataList rimawari">
                                        <li class="topic">
                                            <p class="header">想定年間収入</p>
                                            <p class="cont">¥4,120,000</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">表面利回り</p>
                                            <p class="cont">10.51%</p>
                                        </li>
                                    </ul>
                                    <a href="summary/fixed-term_land002.html" class="btn">より詳しく知る</a>
                                </div><!--data-->
                            </div><!--back-->
                        </li>

                        <li class="card teisyaku swiper-slide clearfix">
                            <div class="front">
                                <div class="numBox">
                                    <p class="num"><span class="strong">10</span>.<span class="few">00</span>%</p>
                                </div>   
                                <p class="address">愛知県稲沢市石橋</p>
                            </div><!--front-->
                            <div class="back">
                                <p class="pict">
                                    <img src="images/summary/fixed-term_land008/photo001.jpg" alt="">
                                </p>
                                <div class="data">
                                    <ul class="dataList normal">
                                        <li class="topic">
                                            <p class="header">所在地</p>
                                            <p class="cont">愛知県稲沢市石橋</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">物件種別</p>
                                            <p class="cont">メゾネット1棟3戸</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">土地権利</p>
                                            <p class="cont">一般定期借地権</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">販売価格</p>
                                            <p class="cont">¥26,650,000</p>
                                        </li>
                                    </ul>
                                    <p class="bar"></p>
                                    <ul class="dataList rimawari">
                                        <li class="topic">
                                            <p class="header">想定年間収入</p>
                                            <p class="cont">¥2,665,200</p>
                                        </li>
                                        <li class="topic">
                                            <p class="header">表面利回り</p>
                                            <p class="cont">10.00%</p>
                                        </li>
                                    </ul>
                                    <a href="summary/fixed-term_land008.html" class="btn">より詳しく知る</a>
                                </div><!--data-->
                            </div><!--back-->
                        </li>
*/
?>
                    </ul>
                </div><!--cardBox-->
                <a href="property.php" class="btn">すべての物件を見る</a>
            </div><!--innerWrapper-->
        </div><!--contBlock-->
        <div class="contBlock under">
            <div class="innerWrapper fadeInObj">
                <div class="header">
                    <p class="mark pict">
                        <img src="common/images/mark-secret.svg" alt="">
                    </p>
                    <p class="passion">SONAE<br>MENBERSHIP</p>
                </div>
                <p class="title" fw="700">登録無料。<br class="spOnly">シークレット物件を<br class="spOnly">閲覧できるメンバーシップ</p>
                <div class="setsumei">
                    <p class="header" fw="700">
                        <span class="passion" fw="300">SONAE</span>&ensp;メンバーシップ限定物件のご案内について
                    </p>
                    <p class="text">
                        SONAEメンバーシップにご登録いただくと、キャンペーンなどのお得な情報を定期的にお届けするとともに、会員様限定のシークレット物件情報にもアクセスいただけます。ご登録は、お問い合わせフォームよりお手続きいただけます。
                    </p>
                </div><!--setsumei-->
                <a href="membership/contact.php" class="btn joinMemberBtn">会員登録はこちらから</a>
            </div><!--innerWrapper-->
        </div><!--under-->
    </section><!--propertySec-->

    <section class="homeSec" id="appealSec">
        <div class="swiper movieSlider fadeInObj" style="display:none;">
            <div class="swiper-wrapper">
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
                <div class="movieCase swiper-slide"></div>
            </div><!--swiper-wrapper-->
            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div><!--movieSlider-->

        <h2 class="secHeader fadeInObj">
            <span class="passion">SONAE</span>&ensp;は、“定期借地を活用した新しいスタイルの不動産投資”です
        </h2>
        <div class="contBlock jissekiBlock fadeInObj">
            <div class="header">
                <picture class="main pict">
                    <source srcset="images/home/appeal-header.svg" media="(min-width:768px)" />
                    <img src="images/home/appeal-header-sp.svg" alt="定期借地の運輸実績No.1" />
          </picture>
                <p class="sub" fw="700">32年間で1,000棟を超える実績</p>
            </div>

            <!-- <div class="tateBlock">
                <div class="tateBox">
                    <p class="tate pict">
                        <img src="images/home/jisseki-tate-1000.png" alt="供給実績1,000棟">
                    </p>
                    <p class="tate pict">
                        <img src="images/home/jisseki-tate-ist.png" alt="住宅供給実績全国1位">
                    </p>
                    <p class="tate pict">
                        <img src="images/home/jisseki-tate-32.png" alt="定期借地権事業32年">
                    </p>
                </div>
            </div> -->
            <!--tateBlock-->
            
            

<!------------------------------------------------------------->

        <!-- Slider main container -->
        <div class="swiper tateBlock">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper tateBox">
                <!-- Slides -->
                <div class="swiper-slide tate pict">
                    <img src="images/home/jisseki-tate-1000.png" alt="供給実績1,000棟">
                </div>
                <div class="swiper-slide tate pict">
                    <img src="images/home/jisseki-tate-ist.png" alt="住宅供給実績全国1位">
                </div>
                <div class="swiper-slide tate pict">
                    <img src="images/home/jisseki-tate-32.png" alt="定期借地権事業32年">
                </div>
            </div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar tateScrollbar"></div>
        </div><!--tateBlock-->

<!------------------------------------------------------------->




            <p class="text">
                SONAEを運営する東新住建は定期借地権付き住宅販売全国No.1。32年間で1000棟の販売・供給実績があります。定期借地権（借地借家法）が施行された平成4年から扱いを開始し、購入者様・地主様の双方をサポートしています。
            </p>
        </div>

        <div class="contBlock fadeInObj" id="infoBlock">
            <h2 class="secHeader">
                <p class="main pict"><img src="common/images/title-info.svg" alt="INFORMATION"></p>
                <p class="sub">更新情報</p>
            </h2>

            <div class="infoBox">
                <ul class="infoList">
<?php
include $dir['system'].'secret/cms_param-info.php';//配列
$fn=$dir['system'].'info/data/list.txt';
$fdata=RECORD_R_DATA($fn);
$fdata=RECORD_R_LISTDATA($fdata);
$a=$b=array();
//print_r($fdata);
foreach($fdata as $v){
	if(RECORD_TIMER_LIMIT($v)){continue;}//タイマー（trueで非表示）
	$b[0][]=$v[0];//ID
	$b[1][]=strtotime($v[2]);//情報登録日
	$a[]=$v;
}
$fdata=$a;
//ソート：登録日 > ID
array_multisort($b[1],SORT_DESC,SORT_NUMERIC,$b[0],SORT_ASC,SORT_NUMERIC,$fdata);
//print_r($fdata);
$page=array();
//$page['now']=(isset($_GET['p'])&&is_numeric($_GET['p'])&&($_GET['p']>0))?$_GET['p']:1;
$page['max']=5;//1ページあたりの記事数
$page['ttl']=1;//総ページ数
if(is_numeric($page['max'])&&($page['max']>0)){
	//$page['ttl']=ceil(count($fdata)/$page['max']);//総ページ数（小数切り上げ）
	$a=array();
	foreach($fdata as $k => $v){
		//$n=floor($k/$page['max'])+1;//小数切り捨て
		//if($n!=$page['now']){continue;}
		$a[]=$v;
		if($k >= ($page['max']-1)){break;}
	}
	$fdata=$a;
}
//print_r($fdata);

foreach($fdata as $v){
	$v['cate']=$cms_param['カテゴリ'][$v[6]];
	$v['new'][]=$v['cate'][1];
	if($nowdate['Ymd-stt'] - $newmark['*His'] <= strtotime($v[2])){
		$v['new'][]='new';
	}
	echo '<li class="topic '.implode(' ',$v['new']).'"><a href="info-detail.php?id='.$v[0].'">
<p class="date passion">'.$v[2].'</p>
<p class="icon cate '.$v['cate'][1].'"></p>
<p class="title">'.$v[7].'</p>
</a></li>'.PHP_EOL;
}
/*
                        <li class="topic news new"><a href="info-detail.html">
                            <p class="date passion">2025-00-00</p>
                            <p class="icon cate news"></p>
                            <p class="title">お知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトル</p>
                        </a></li>
                        <li class="topic seminar"><a href="info-detail.html">
                            <p class="date passion">2025-00-00</p>
                            <p class="icon cate seminar"></p>
                            <div class="title">
                                お知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトル
                            </div>
                        </a></li>
                        <li class="topic other"><a href="info-detail.html">
                            <p class="date passion">2025-00-00</p>
                            <p class="icon cate news"></p>
                            <p class="title">お知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトル</p>
                        </a></li>
                        <li class="topic news"><a href="info-detail.html">
                            <p class="date passion">2025-00-00</p>
                            <p class="icon cate news"></p>
                            <p class="title">お知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトルお知らせタイトル</p>
                        </a></li>
*/
?>
                    </ul>
                <a href="info.php" class="btn">一覧を見る</a>
            </div>
        </div><!--infoBlock-->
    </section><!--appealSec-->

<?php
//ログインボックス
include $dir['system'].'secret/login_pass_member.php';
include $dir['system'].'parts/member_login.php';

/*
<!--#include virtual="./common/include/footer.php" -->
*/
include './common/include/footer.php';
?>
    
    <script>//swiper
        //家の外観スライダ
        const initSwiper = () => { 
            const homeImages = new Swiper('.homeImases', {
                loop: true, // ループ有効
                slidesPerView: 2, // 一度に表示する枚数
                spaceBetween: 10,
                speed: 6000, // ループの時間
                allowTouchMove: false, // スワイプ無効
                autoplay: {
                    delay: 0, // 途切れなくループ
                },
                breakpoints:{
                    768:{ slidesPerView: 5 },
                }
            });
        };
 

        window.addEventListener('load', function(){
            initSwiper(); // ページ読み込み後に初期化
        });

        //バナースライダ
        const homeBnrSlider = new Swiper('.bnrSlider', {
            loop: true, 
            slidesPerView: 1.15, // 一度に表示する枚数
            spaceBetween: 10,
            centeredSlides:true, 
            speed: 800, // ループの時間
            initialSlide: 0, //1番目は'0'
            // autoplay:{
            //     delay: 3000, // 3秒後に次のスライド
            // },
            pagination: {
                el: '.bnrSlider-pages',
                clickable: true,
            },
            breakpoints:{
                    768:{
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
            }
        });

        //動画スライダ
        const movieSwiper = new Swiper('.movieSlider', {
            // Optional parameters
            loop: false,
            slidesPerView: 1.25, // 一度に表示する枚数
            spaceBetween: 20,
            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,    // ドラッグ操作を可能にする
            },
            breakpoints:{
                768:{
                    slidesPerView: 6,
                },
            }
            
        });

        //カードスライダ
        if (window.matchMedia('(max-width: 768px)').matches) {
            const cardSwiper = new Swiper('.cardSlider', {
                // Optional parameters
                loop: false,
                slidesPerView: 1.5, // 一度に表示する枚数
                spaceBetween: 40,
                centeredSlides:true, 
            });
        };
    </script>

    <script>//スクロールアクション
        window.addEventListener('scroll', function() {
            const fadeInObj = document.querySelectorAll('.fadeInObj');
            
            fadeInObj.forEach((element, index) => {
                const position = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;

                if (position < screenPosition) {
                    element.classList.add('visible');
                }
            });
        });
    </script>

    <script>
        window.onload = function() {
            setTimeout('show()',1500);
        }/*2秒後に描きスクリプト起動*/

        function show() {
            const target = document.getElementById('fv');
            target.classList.add('fvAnimeGo');
            
            // document.getElementById('gg0').style.display = 'none’; //loading表示を非表示化
            // document.getElementById('gg').style.display = 'block’; //本体のdisplayをblockに変換
        }
    </script>

    <script>//simpleparallax
        document.addEventListener("DOMContentLoaded", function () {
            const elem = document.querySelector(".js-parallax");
            if (elem !== null) {
                let target = document.getElementsByClassName("js-parallax");
                let parallaxConfig = {
                delay: 0, // スクロール止めてから動く秒数
                orientation: "up", // 動く方向
                scale: 1.5, // 動く大きさ
                };
                const parallax_instance = new simpleParallax(target, parallaxConfig);
            }
        });
    </script>

</body>
</html>