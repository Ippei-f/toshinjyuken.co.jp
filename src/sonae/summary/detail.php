<?php
session_start();
$dir=array();
$dir['system']='../system/';
$dir['cms']=$dir['system'].'summary/';
$dir['referer']=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'../property.php';
if(isset($_REQUEST['id'])&&is_numeric($_REQUEST['id'])){
	include $dir['system'].'secret/cms_now.php';//現在時刻・ページ
	include $dir['system'].'secret/cms_param.php';//配列
	include $dir['system'].'secret/record_read.php';
	$fn=$dir['cms'].'data/list.txt';
	$fdata=RECORD_R_DATA($fn);
	$fdata=RECORD_R_LISTDATA($fdata,$_REQUEST['id']);//ID指定
	if(RECORD_TIMER_LIMIT($fdata)){
		header("Location: ".$dir['referer']);//戻り
		exit();
	}
	if($fdata[1]==2){
		//会員ページログインチェック
		include $dir['system'].'secret/login_pass_member.php';
		include $dir['system'].'secret/login_check_member.php';
	}
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
<!--#include virtual="../common/include/gtm-head.php" -->
*/
include '../common/include/gtm-head.php';
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件情報|土地を持たない不動産投資｜SONAE</title>
    <meta name="description" content="新築でも10％以上の高利回りを実現、2,000万円台で新築1棟投資が可能。東京都、愛知県、名古屋市で投資用不動産の高利回り物件情報を公開中。不動産投資収益物件なら東新住建の土地を持たない収益重視型新築一棟投資『SONAE』にお任せください。" />

    <link rel="stylesheet" href="../common/css/reset.css">
    <link rel="stylesheet" href="../common/css/style.css">

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
<!--#include virtual="../common/include/header.php" -->
*/
include '../common/include/header.php';
?>
    <script>//bodyに各ページ固有のclassを設定
        document.addEventListener('DOMContentLoaded', function () {
            document.body.classList.add('page-summary', 'underPage');
        });
    </script>

    <section class="" id="pageHeadSec">
        <div class="contBlock headerBlock">
            <div class="innerWrapper">
                <h2 class="secHeader">
                    <p class="sub">物件情報</p>
                    <p class="main pict"><img src="/sonae/common/images/title-summary.svg" alt="SUMMARY"></p>
                </h2>
            </div><!--innerWrapper-->
        </div><!--contBlock-->
    </section><!--pageHeadSec-->

    <div class="contentWrapper">
<?php
//print_r($fdata);
?>
        <section class="contInner" id="mainData">
            <div class="header">
                <p class="genre">
                    <span class="cate"><?php echo $cms_param['カテゴリ'][$fdata['カテゴリ']][0]; ?></span><span class="type"><?php echo $fdata['物件種別']; ?></span>
                </p>
                <h1 class="name"><?php echo $fdata['物件名']; ?></h1>
                <p class="catch">
                </p>
            </div><!--header-->
            <div class="pictBlock">
                <div class="swiper mainPict">
                    <div class="swiper-wrapper">
<?php
$fn=$dir['cms'].'upload/id'.sprintf('%03d',$fdata['ID']).'-';
$photo=glob($fn.'*');
//print_r($photo);
foreach($photo as $v){
	echo '<div class="swiper-slide housePic"><img src="'.$v.'" alt=""></div>'.PHP_EOL;
}
/*
                        <div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo001.jpg" alt="">
                        </div>
                        <div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo002.jpg" alt="">
                        </div>
                        <div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo003.jpg" alt="">
                        </div>
                        <div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo004.jpg" alt="">
                        </div>
                        <div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo005.jpg" alt="">
                        </div>
                        <div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo006.jpg" alt="">
                        </div>
						<div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo007.jpg" alt="">
                        </div>
						<div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo008.jpg" alt="">
                        </div>
						<div class="swiper-slide housePic">
                            <img src="../images/summary/fixed-term_land001/photo009.jpg" alt="">
                        </div>
*/
?>
                    </div>
                </div><!--swiper-->

                <div class="thumbBlock">
<?php
foreach($photo as $v){
	echo '<div class="thumbnail housePic"><img src="'.$v.'" alt=""></div>'.PHP_EOL;
}
/*
                    <div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo001.jpg" alt="">
                    </div>
                    <div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo002.jpg" alt="">
                    </div>
                    <div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo003.jpg" alt="">
                    </div>
                    <div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo004.jpg" alt="">
                    </div>
                    <div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo005.jpg" alt="">
                    </div>
                    <div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo006.jpg" alt="">
                    </div>
					<div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo007.jpg" alt="">
                    </div>
					<div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo008.jpg" alt="">
                    </div>
					<div class="thumbnail housePic">
                        <img src="../images/summary/fixed-term_land001/photo009.jpg" alt="">
                    </div>
*/
?>
                </div>
            </div><!--pictBlock-->
            
            <div class="dataBlock">
<?php
$arr=array
('販売価格'		=>array('money','text'=>'num','wrapL'=>"&yen;")
,'表面利回り' =>array('money'/*,'wrapL'=>"&yen;"*/,'wrapR'=>'%')
,'所在地'		 =>array('')
,'土地権利'		=>array('')
,'棟数 / 戸数'=>array('')
,'築年月'		 =>array('','text'=>'date-ym')
,'PRポイント'	=>array('pr')
);
foreach($arr as $k => $v){
	$text=(strpos($k,' ')!==false)?str_replace(' ','_',$k):$k;
	if(!empty($text)&&isset($fdata[$text])){
		$text=$fdata[$text];
	}
	else{continue;}//データベースに無いものはスルー
	if($v[0]=='pr' && empty($text)){continue;}//PRポイントは空白の場合はスルー
	$class=array();
	$class[0][]='topic';
	$class[1][]='inner';
	if($v[0]!=''){
		switch($v[0]){
			case 'money':
			$class[1][]='passion';
			break;
		}
		$class[0][]=$v[0];
	}
	if(!isset($v['text'])){$v['text']='default';}
	switch($v['text']){
		case 'num':
		if(is_numeric($text)){
			$text=number_format($text);
		}		
		break;
		case 'date-ym':
		if($text!=''){
			$text=date('Y年m月',strtotime($text));
		}		
		break;
	}
	if($text!=''){
		if(isset($v['wrapL'])){$text=$v['wrapL'].$text;}
		if(isset($v['wrapR'])){$text.=$v['wrapR'];}
	}
	echo '<div class="'.implode(' ',$class[0]).'">
	<p class="header">'.$k.'</p>
	<div class="cont"><p class="'.implode(' ',$class[1]).'">'.$text.'</p></div>
</div>'.PHP_EOL;
}
/*
                <div class="topic money">
                    <p class="header">販売価格</p>
                    <div class="cont"><p class="inner passion"><?php echo (!empty($fdata['販売価格'])&&is_numeric($fdata['販売価格']))?"\\".number_format($fdata['販売価格']):''; ?></p></div>
                </div>
                <div class="topic money">
                    <p class="header">表面利回り</p>
                    <div class="cont"><p class="inner passion"><?php echo (!empty($fdata['表面利回り']))?number_format($fdata['表面利回り']).'%':''; ?></p></div>
                </div>
                <div class="topic">
                    <p class="header">所在地</p>
                    <div class="cont"><p class="inner">愛知県名古屋市瑞穂区前田町一丁目34番、35番</p></div>
                </div>
                <div class="topic">
                    <p class="header">土地権利</p>
                    <div class="cont"><p class="inner">一般定期借地権</p></div>
                </div>
                <div class="topic">
                    <p class="header">棟数 / 戸数</p>
                    <div class="cont"><p class="inner">1棟/5戸</p></div>
                </div>
                <div class="topic">
                    <p class="header">築年月</p>
                    <div class="cont"><p class="inner">2018年06月</p></div>
                </div>
                <div class="topic pr">
                    <p class="header">PRポイント</p>
                    <div class="cont"><p class="inner"></p></div>
                </div>
*/
?>
            </div><!--dataBlock-->
						<?php
						$dir['contact']='../inquiry/contact.php';
						$dir['contact'].=($fdata['物件名']!='')?'?summary='.$fdata['物件名']:'';
						?>
            <a href="<?php echo $dir['contact']; ?>" class="btn inquiryBtn pcOnly">この物件へのお問い合わせ</a>
        </section><!--contInner-->

        <section class="contInner" id="subData">
            <div class="mapBlock">
                <div class="mapCase"><?php
								echo $fdata['GOOGLEMAP'];
								/*
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5487.937564870218!2d136.92837722178928!3d35.12800002395867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60037bb00c286c8f%3A0x3f7826d53fe75a2a!2z44OX44Op44OD44K144Og44Kz44O844OI5YmN55Sw55S6!5e0!3m2!1sja!2sjp!4v1746149018883!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								*/
								?></div>
                <p class="addData"><?php echo $fdata['所在地']; ?></p>
            </div><!--mapBlock-->

            <div class="detailBlock">
                <p class="title" id="detailOpen">物件詳細</p>
                <ul class="detailList">
<?php
//print_r($fdata['物件詳細']);
$arr=array
('物件名'			=>array('class'=>'long')
,'所在地'			=>array('class'=>'long')
,'交通'				 =>array('class'=>'long')
,'販売価格'		 =>array('text'=>'num','wrapL'=>"&yen;")
,'表面利回り'	=>array('wrapR'=>'%')
,'想定年間収入'=>array('text'=>'nenkan')
,'築年月'			=>array('text'=>'date-ym')
,'情報更新日'	=>array('text'=>'date-ymd')
,'情報登録日'	=>array('text'=>'date-ymd')
);
foreach($fdata['物件詳細'] as $k => $v){
	$class=array('topic');
	if(isset($fdata[$k])){$v=$fdata[$k];}//引用
	if(isset($arr[$k])){
		$a=$arr[$k];
		if(isset($a['class'])){$class[]='long';}
		if(!isset($a['text'])){$a['text']='default';}
		switch($a['text']){
			case 'num':
			if(is_numeric($v)){
				$v=number_format($v);
			}
			break;
			case 'nenkan':
			if(is_numeric($v)){
				$v=number_format($v).'円 ('.number_format($v/12).'円/月)';
			}
			break;
			case 'date-ym':
			if($v!=''){
				$v=date('Y年m月',strtotime($v));
			}			
			break;
			case 'date-ymd':
			if($v!=''){
				$v=date('Y/m/d',strtotime($v));
			}
			break;
		}
		if($v!=''){
			if(isset($a['wrapL'])){$v=$a['wrapL'].$v;}
			if(isset($a['wrapR'])){$v.=$a['wrapR'];}
		}
	}//if(isset($arr[$k]))
	if(empty($v)){$v='-';}
	echo '<li class="'.implode(' ',$class).'"><p class="header">'.$k.'</p><div class="cont">'.$v.'</div></li>'.PHP_EOL;
}//foreach($fdata['物件詳細'] as $k => $v)
/*
                    <li class="topic long">
                        <p class="header">物件名</p>
                        <div class="cont">プラッサムコート前田町</div>
                    </li>
                    <li class="topic long">
                        <p class="header">所在地</p>
                        <div class="cont">愛知県名古屋市瑞穂区前田町一丁目34番、35番</div>
                    </li>
                    <li class="topic long">
                        <p class="header">交通</p>
                        <div class="cont">地下鉄桜通線 瑞穂区役所駅 徒歩11分</div>
                    </li>
                    <li class="topic">
                        <p class="header">販売価格</p>
                        <div class="cont">¥68,000,000</div>
                    </li>
                    <li class="topic">
                        <p class="header">表面利回り</p>
                        <div class="cont">10.03%</div>
                    </li>
                    <li class="topic">
                        <p class="header">想定年間収入</p>
                        <div class="cont">6,823,608円(568,634円/月)</div>
                    </li>
                    <li class="topic">
                        <p class="header">築年月</p>
                        <div class="cont">2018年06月</div>
                    </li>
                    <li class="topic">
                        <p class="header">土地権利</p>
                        <div class="cont">一般定期借地権</div>
                    </li>
                    <li class="topic">
                        <p class="header">土地面積</p>
                        <div class="cont">441.99㎡（133.7坪）</div>
                    </li>
                    <li class="topic">
                        <p class="header">私道負担面積</p>
                        <div class="cont">-</div>
                    </li>
                    <li class="topic">
                        <p class="header">建物面積</p>
                        <div class="cont">335.59㎡</div>
                    </li>
                    <li class="topic">
                        <p class="header">間取り</p>
                        <div class="cont">2LDK×5戸(65.7㎡)</div>
                    </li>
                    <li class="topic">
                        <p class="header">階数</p>
                        <div class="cont">2階建て</div>
                    </li>
                    <li class="topic">
                        <p class="header">駐車場</p>
                        <div class="cont">有</div>
                    </li>
                    <li class="topic">
                        <p class="header">建ぺい率</p>
                        <div class="cont">70%</div>
                    </li>
                    <li class="topic">
                        <p class="header">容積率</p>
                        <div class="cont">200%</div>
                    </li>
                    <li class="topic">
                        <p class="header">接道状況</p>
                        <div class="cont">北 9ｍ、東 9ｍ</div>
                    </li>
                    <li class="topic">
                        <p class="header">地目</p>
                        <div class="cont">宅地</div>
                    </li>
                    <li class="topic">
                        <p class="header">都市計画区域</p>
                        <div class="cont">市街化区域</div>
                    </li>
                    <li class="topic">
                        <p class="header">用途地域</p>
                        <div class="cont">第一種中高層</div>
                    </li>
                    <li class="topic">
                        <p class="header">国土法届出</p>
                        <div class="cont">-</div>
                    </li>
                    <li class="topic">
                        <p class="header">取引態様</p>
                        <div class="cont">媒介</div>
                    </li>
                    <li class="topic">
                        <p class="header">現況</p>
                        <div class="cont">入居中</div>
                    </li>
                    <li class="topic">
                        <p class="header">引渡可能年月</p>
                        <div class="cont">要相談</div>
                    </li>
                    <li class="topic">
                        <p class="header">建築確認番号</p>
                        <div class="cont">-</div>
                    </li>
                    <li class="topic">
                        <p class="header">管理番号</p>
                        <div class="cont">-</div>
                    </li>
                    <li class="topic">
                        <p class="header">情報更新日</p>
                        <div class="cont">2025/03/09</div>
                    </li>
                    <li class="topic">
                        <p class="header">情報登録日</p>
                        <div class="cont">-</div>
                    </li>
                    <li class="topic">
                        <p class="header">注意事項</p>
                        <div class="cont">-</div>
                    </li>
*/
?>
                </ul>
            </div><!--detailBlock-->
            
            <a href="<?php echo $dir['contact']; ?>" class="btn inquiryBtn">この物件へのお問い合わせ</a>
        </section><!--contInner-->
    </div><!--contentWrapper-->

    <section class="bottomSec">
        <a href="../property.html" class="modoru">収益物件一覧に戻る</a>
    </section>

<?php
/*
<!--#include virtual="../common/include/footer.php" -->
*/
include '../common/include/footer.php';
?>
    <script>//swiper
        const thumb = document.querySelectorAll('.pictBlock .thumbnail');
        
        const switchThumb = (index) => {
            document.querySelector('.pictBlock .thumbnail-active').classList.remove('thumbnail-active');
            thumb[index].classList.add('thumbnail-active');
        }
        
        const mySwiper = new Swiper('.pictBlock .swiper', {
            on: {
                afterInit: (swiper) => {
                thumb[swiper.realIndex].classList.add('thumbnail-active');
                for (let i = 0; i < thumb.length; i++) {
                    thumb[i].onclick = () => {
                    swiper.slideTo(i);
                    };
                }
                },
                slideChange: (swiper) => {
                switchThumb(swiper.realIndex);
                },
            }
        });
    </script>

    
    <script>
        const bukkenDataOpen = document.getElementById('detailOpen');
        const subData = document.getElementById('subData');

        bukkenDataOpen.addEventListener('click',()=>{
            subData.classList.toggle('disclosure');
        });
    </script>
		
		<?php
		/*
		<!-- お問い合わせボタンに変数追加 -->
		<script src="../common/js/contact-prm.js" type="text/javascript"></script>		
		*/
		?>
</body>
</html>