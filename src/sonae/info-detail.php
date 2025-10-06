<?php
$dir=array();
$dir['system']='system/';
$dir['cms']=$dir['system'].'info/';
$dir['referer']=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'info.php';
if(isset($_REQUEST['id'])&&is_numeric($_REQUEST['id'])){
	include $dir['system'].'secret/cms_now.php';//現在時刻・ページ
	include $dir['system'].'secret/cms_param-info.php';//配列
	include $dir['system'].'secret/record_read.php';
	$fn=$dir['cms'].'data/list.txt';
	$fdata=RECORD_R_DATA($fn);
	$fdata=RECORD_R_LISTDATA($fdata);
	$a=$b=array();
	//print_r($fdata);
	foreach($fdata as $v){
		if(RECORD_TIMER_LIMIT($v)){continue;}//タイマー（trueで非表示）
		$b[0][]=$v[0];//ID
		$b[1][]=strtotime($v[2]);//情報登録日
		$a[]=$v;
		if($v[0]==$_REQUEST['id']){$b['id']=$v[0];}
	}
	if(!isset($b['id'])){
		header("Location: ".$dir['referer']);//戻り
		exit();
	}
	$fdata=$a;
	//ソート：登録日 > ID
	array_multisort($b[1],SORT_DESC,SORT_NUMERIC,$b[0],SORT_ASC,SORT_NUMERIC,$fdata);
	//print_r($fdata);
	$fdata_list=$fdata;//前後判定用に保存
	
	$fn=$dir['cms'].'data/edit/id-'.sprintf('%03d',$_REQUEST['id']).'.txt';
	$fdata=RECORD_R_DATA($fn);
	$fdata=RECORD_R_EDITDATA($fdata);
}
else{
	header("Location: ".$dir['referer']);//戻り
	exit();
}
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
        <div class="articleColumn">
            <div class="contBlock cat-all" id="infoBlock">
                <div class="infoBox">
<?php
//print_r($fdata);
$v=array();
$v['cate']=$cms_param['カテゴリ'][$fdata['カテゴリ']];
$v['new'][]=$v['cate'][1];
if($nowdate['Ymd-stt'] - $newmark['*His'] <= strtotime($fdata['情報登録日'])){
	$v['new'][]='new';
}
echo '<div class="article '.implode(' ',$v['new']).'">
	<div class="header">
		<p class="date passion">'.$fdata['情報登録日'].'</p>
		<p class="icon cate"></p>
		<h1 class="title">'.$fdata['タイトル'].'</h1>
	</div><!--header-->
	<div class="cont">'.PHP_EOL;

$fdata['本文']=str_replace('src="upload/','src="'.$dir['cms'].'upload/',$fdata['本文']);
echo $fdata['本文'];

echo '	</div><!--cont-->
</div><!--article-->'.PHP_EOL;
/*
                    <div class="article news new">
                        <div class="header">
                            <p class="date passion">2025-00-00</p>
                                <p class="icon cate"></p>
                                <h1 class="title"></h1>
                        </div><!--header-->
                        <div class="cont">
                            <h2>見出し</h2>
                            <p>
                                本文本文本文本文本文本文本文本文本文本文本文本文本文<br>
                                本文本文本文本文本文本文本文本文
                            </p>
                            <p>
                                本文本文本文本文本文本文本文本文本文本文本文本文本文<br>
                                本文本文本文本文本文本文本文本文
                            </p>
                            <figure>
                                <img src="images/sample.jpg" alt="">
                                <figcaption>キャプション</figcaption>
                            </figure>

                            <figure>
                                <img src="images/sample-2.jpg" alt="">
                            </figure>
                        </div><!--cont-->
                    </div><!--article-->
*/
//print_r($fdata_list);
?>
                    <div class="fandr">
<?php
$now=0;
foreach($fdata_list as $k => $v){
	if($v[0]==$_REQUEST['id']){
		$now=$k;
		break;
	}
}
//print_r($now);

function LOCAL_PAGER($v){
	global $nowdate,$newmark;
	$v['cate']=$v['type'][0];
	$v['new'][]=$v['cate'][1];
	if($nowdate['Ymd-stt'] - $newmark['*His'] <= strtotime($v[2])){
		$v['new'][]='new';
	}
	$v['photo']=glob('system/info/upload/id'.sprintf('%03d',$v[0]).'-photo001*');
	switch(true){
		case empty($v['photo'])://画像が一つも無い
		case !file_exists($v['photo'][0]):
		$v['photo']='';
		break;
		default:
		$v['photo']='<p class="pict"><img src="'.$v['photo'][0].'" alt="'.$v[7].'"></p>';
	}
	echo '<a href="info-detail.php?id='.$v[0].'" class="post '.implode(' ',$v['new']).'">
	<p class="nav">'.$v['type'][1].'</p>
	'.$v['photo'].'
	<div class="titleBox">
		<p class="date passion">'.$v[2].'</p>
		<p class="title">'.$v[7].'</p>
	</div>
</a>'.PHP_EOL;
}
if($now>0){
	$v=$fdata_list[$now-1];
	$v['type']=array('prev','<span>&laquo;</span>前の投稿');
	LOCAL_PAGER($v);
}
else{
	echo '<a></a>';
}
if($now<count($fdata_list)-1){
	$v=$fdata_list[$now+1];
	$v['type']=array('nex','次の投稿<span>&raquo;</span>');
	LOCAL_PAGER($v);
}
/*
                        <a class="post prev new">
                            <p class="nav"><span>&laquo;</span>前の投稿</p>
                            <p class="pict">
                                <img src="images/summary/sample-house-01.jpg" alt="">
                            </p>
                            <div class="titleBox">
                                <p class="date passion">2025-00-00</p>
                                <p class="title">
                                    記事のタイトル記事のタイトル記事のタイトル記事のタイトル記事のタイトル記事のタイトル
                                </p>
                            </div>
                        </a>
                        <a class="post nex">
                            <p class="nav">次の投稿<span>&raquo;</span></p>
                            <p class="pict">
                                <img src="images/summary/sample-house-02.jpg" alt="">
                            </p>
                            <div class="titleBox">
                                <p class="date passion">2025-00-00</p>
                                <p class="title">
                                    記事のタイトル記事のタイトル記事のタイトル記事のタイトル記事のタイトル記事のタイトル
                                    記事のタイトル記事のタイトル記事のタイトル記事のタイトル記事のタイトル記事のタイトル
                                </p>
                            </div>
                        </a>
*/
?>
                    </div>
                </div>
            </div><!--infoBlock-->
        </div><!--articleColumn-->
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