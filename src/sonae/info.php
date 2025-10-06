<?php
$dir=array();
$dir['system']='system/';
include $dir['system'].'secret/cms_now.php';//現在時刻・ページ
include $dir['system'].'secret/cms_param-info.php';//配列
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
    <title>更新情報|土地を持たない不動産投資｜SONAE</title>
    <meta name="description" content="SONAEは土地を持たずにはじめられる新築・築浅メゾネット1棟アパート投資。定期借地を活用し、利回り10％超を実現。低リスク・高収益の新しい不動産投資スタイル。" />

    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/style.css">
    <link rel="stylesheet" href="common/css/style-info.css"><!-- 調整版 -->

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200;300;400;500;600;700;900&family=Passion+One:wght@400;700;900&display=swap" rel="stylesheet">

    <!--swiper-->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


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
            document.body.classList.add('page-info', 'underPage');
        });
    </script>

<?php
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
$page['now']=(isset($_GET['p'])&&is_numeric($_GET['p'])&&($_GET['p']>0))?$_GET['p']:1;
$page['max']=5;//1ページあたりの記事数
$page['ttl']=1;//総ページ数
if(is_numeric($page['max'])&&($page['max']>0)){
	$page['ttl']=ceil(count($fdata)/$page['max']);//総ページ数（小数切り上げ）
	$a=array();
	foreach($fdata as $k => $v){
		$n=floor($k/$page['max'])+1;//小数切り捨て
		if($n!=$page['now']){continue;}
		$a[]=$v;
	}
	$fdata=$a;
}
//print_r($fdata);
?>
    <div class="contentWrapper">
        <section class="" id="pageHeadSec">
            <div class="contBlock headerBlock">
                <div class="innerWrapper">
                    <h2 class="secHeader">
                        <p class="sub">更新情報</p>
                        <p class="main pict"><img src="common/images/title-info.svg" alt="INFORMATION"></p>
                    </h2>
<?php
/*
カテゴリボタン（ボツ？）

                    <div class="cateListCase customScrollBar xLine layoff">
                        <ul class="cateList">
                            <li class="topic active" id="cat-all">すべて</li>
                            <li class="topic" id="cat-news">お知らせ</li>
                            <li class="topic" id="cat-seminar">セミナー・見学会</li>
                            <li class="topic" id="cat-other">カテゴリ3</li>
                            <li class="topic" id="cat-other">カテゴリ4</li>
                        </ul>
                    </div>
*/
?>
                </div><!--innerWrapper-->
            </div><!--contBlock-->
        </section><!--pageHeadSec-->

<?php
/*
アーカイブ（ボツ）

        <div class="archiveColumn layoff">
            <div class="contBox categoryBox">
                <p class="header passion">CATEGORY</p>
                <ul>
                    <li class="topic" id="cat-all-"><a href="#">すべて</a></li>
                    <li class="topic" id="cat-news-"><a href="#">お知らせ</a></li>
                    <li class="topic" id="cat-seminar-"><a href="#">セミナー・見学会情報</a></li>
                    <li class="topic" id="cat-other-"><a href="#">カテゴリ3</a></li>
                    <li class="topic" id="cat-other-"><a href="#">カテゴリ4</a></li>
                </ul>
            </div>

            <div class="contBox archiveBox">
                <p class="header passion">ARCHIVE</p>
                <ul>
                    <li class="topic"><a href="#">すべて</a></li>
                    <li class="topic"><a href="#">2025年04月（3）</a></li>
                    <li class="topic"><a href="#">2025年03月（3）</a></li>
                    <li class="topic"><a href="#">2025年02月（3）</a></li>
                    <li class="topic"><a href="#">2025年01月（3）</a></li>
                    <li class="topic"><a href="#">2024年12月（3）</a></li>
                </ul>
            </div>
            
        </div><!--archiveColumn-->
*/
?>
        <div class="listColumn">
            <div class="contBlock cat-all" id="infoBlock">
    
                <div class="infoBox">
                    <ul class="infoList">
<?php
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

<?php
//2ページ以上で表示
if($page['ttl']>1){
	echo '<div class="paging">'.PHP_EOL;
	echo '<a class="arrow prev" href="?p='.($page['now']>1?$page['now']-1:1).'"></a>'.PHP_EOL;
	/*
	if($page['now']>1){
		echo '<a class="arrow prev" href="?p='.($page['now']-1).'"></a>'.PHP_EOL;
	}
	*/
	for($i=1;$i<=$page['ttl'];$i++){
		if($page['now']!=$i){
			echo '<a class="page" title="ページ '.$i.'" href="?p='.$i.'">'.$i.'</a>'.PHP_EOL;
		}
		else{
			echo '<span class="page current">'.$i.'</span>';
		}		
	}
	echo '<a class="arrow nex" href="?p='.($page['now']<$page['ttl']?$page['now']+1:$page['ttl']).'"></a>';
	/*
	if($page['now']<$page['ttl']){
		echo '<a class="arrow nex" href="?p='.($page['now']+1).'"></a>';
	}
	*/
	echo '</div>'.PHP_EOL;
}
/*
                    <!-- 擬似ページング -->
                    <div class="paging">
                        <a class="arrow prev" href="#"></a>
                        <span  class="page current">1</span>
                        <a class="page" title="ページ 2" href="#">2</a>
                        <a class="page" title="ページ 3" href="#">3</a>
                        <a class="page" title="ページ 4" href="#">4</a>
                        <a class="page" title="ページ 5" href="#/">5</a>
                        <a class="arrow nex" href="#"></a>
                    </div>
                    <!-- 擬似ページング -->
*/
?>
                </div>
            </div><!--infoBlock-->
        </div><!--listColumn-->
    </div><!--contentWrapper-->

<?php
/*
<!--#include virtual="./common/include/footer.php" -->
*/
include './common/include/footer.php';
?>
    <script>//カテゴリ選択（擬似）
        const topicElements = document.querySelectorAll('.cateList .topic');

        topicElements.forEach(topic => {
            topic.addEventListener('click', function() {
                // すべての topic 要素から 'active' クラスを削除
                topicElements.forEach(el => {
                    el.classList.remove('active');
                });
                // クリックされた要素に 'active' クラスを付与
                this.classList.add('active');

                // #infoBlock のクラスをクリア
                infoBlock.className = '';
                // active クラスがついた要素の id を #infoBlock にクラスとして付与
                if (this.classList.contains('active')) {
                    infoBlock.classList.add(this.id);
                }
            });
        });
    </script>


</body>
</html>