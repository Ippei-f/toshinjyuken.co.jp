<?php
$p_type = 'bho';
$kaisou = '';
$dir = $kaisou . 'images/content/bunjohalforder/';
$p_title = '「インテリアセレクト」&「ハーフオーダー」';
require $kaisou . "temp_php/basic.php";

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <?php echo $temp_meta; ?>
    <title><?php echo $temp_title; ?></title>
    <link href="css/common.css" rel="stylesheet" type="text/css">
    <link href="css/bunjohalforder.css" rel="stylesheet" type="text/css" />
    <?php
    //バナーシステム2023年度ver読み込み
    $toushin_bnr_url = $kaisou . '../recaptcha/';
    require $toushin_bnr_url . 'func-common-bnr-setup2023.php';
    ?>
    <?php echo $temp_java; ?>
</head>

<body class="borderbox BHO-page">
    <?php echo $temp_pagetop; ?>
    <div align="center">
        <!-- * -->
        <?php echo $temp_header; ?>
        <!-- ** -->

        <?php echo $temp_fix_nav; ?>

        <!-- *** -->

        <section class="BHO-kv">
            <h1 class="BHO-kv__badge">
                <img src="images/bunjohalforder/kv-badge.svg" alt="ハーフオーダー" />
            </h1>
        </section>

        <section class="BHO-intro2604">
            <div class="BHO-intro2604-inner">
                <div class="BHO-intro2604-flex">
                    <div class="BHO-intro2604-flex-img">
                        <img src="images/bunjohalforder/intro-yume.png" alt="夢" />
                    </div>
                    <div class="BHO-intro2604-flex-text">
                        <h2 class="BHO-intro2604-flex-text__title">
                            注文住宅より<span>気楽</span>に<br />
                            もっと<span>シンプル</span>に。
                        </h2>
                        <div class="BHO-intro2604-flex-text__lead">
                            <p>
                                土地探しや打合せの負担を抑えながら、<br />
                                外観や内装、間取りを自分らしくデザイン。<br />
                                「ハーフオーダー」で理想の住まいを叶えます
                            </p>
                        </div>
                    </div>
                </div>
                <div class="BHO-intro2604__btn">
                    <a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA,%E3%83%8F%E3%83%BC%E3%83%95%E3%82%AA%E3%83%BC%E3%83%80%E3%83%BC" target="_blank">
                        <span class="label">ハーフオーダーの物件はこちら</span>
                        <span class="arrow"></span>
                    </a>
                </div>
            </div>
        </section>

        <section class="BHO-intro02">
            <div class="BHO-intro02-flex">
                <div class="BHO-intro02__img-1">
                    <img src="images/bunjohalforder/intro02-1.jpg" alt="" />
                </div>
                <div class="BHO-intro02__text">
                    <h2 class="BHO-intro02__title">『外観』と『内装』両方オーダー可能</h2>
                    <div class="BHO-intro02__badge">
                        <img src="images/bunjohalforder/intro02-badge.svg" alt="ハーフオーダー" />
                    </div>
                    <div class="BHO-intro02__body">
                        <p>
                            注文住宅のような自由度と、分譲住宅のコストパフォーマンスを兼ね備えた「いいとこどり」がハーフオーダーの魅力。<br />
                            今はまだ真っ白な空間だからこそ、外観・内装・間取りまで、あなたの理想に合わせてプランニングできます。
                        </p>
                    </div>
                    <div class="BHO-intro02__img-2">
                        <img src="images/bunjohalforder/intro02-2.jpg" alt="" />
                    </div>
                    <div class="BHO-intro02__img-3">
                        <img src="images/bunjohalforder/intro02-3.jpg" alt="" />
                    </div>
                </div>
            </div>
        </section>

        <section class="BHO-flow">
            <div class="BHO-flow-inner">
                <h2 class="BHO-flow__ttl">ご入居までの流れ</h2>
                <div class="BHO-flow__figure">
                    <img src="images/bunjohalforder/flow.svg" alt="ご入居までの流れ" />
                </div>
                <div class="c-btn">
                    <a href="<?php echo $link_list['お問い合わせ'][0]; ?>">
                        <span class="label">資料請求・お問い合わせ</span>
                        <span class="arrow"></span>
                    </a>
                </div>
            </div>
        </section>

        <section class="BHO-step">
            <div class="BHO-step-inner">
                <h2 class="BHO-step__title">
                    注文住宅と分譲住宅の「いいとこ取り」。 <br />
                    家族の"好き"をカタチにする、<br class="sp-only" />ハーフオーダーの家。
                </h2>
                <div class="BHO-step-inner-2">
                    <div class="BHO-step-unit step-1">
                        <div class="BHO-step-unit-header">
                            <div class="BHO-step-unit-header__badge"><span class="label">STEP</span><span class="num">1</span></div>
                            <h3 class="BHO-step-unit-header__title">
                                <div class="BHO-step-unit-header__title-inner">土地<span>選び</span></div>
                            </h3>
                        </div>
                        <div class="BHO-step-unit-cont">
                            <div class="BHO-intro2604__btn">
                                <a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA,%E3%83%8F%E3%83%BC%E3%83%95%E3%82%AA%E3%83%BC%E3%83%80%E3%83%BC" target="_blank">
                                    <span class="label">ハーフオーダーの物件はこちら</span>
                                    <span class="arrow"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="BHO-step-unit step-2">
                        <div class="BHO-step-unit-header">
                            <div class="BHO-step-unit-header__badge"><span class="label">STEP</span><span class="num">2</span></div>
                            <h3 class="BHO-step-unit-header__title">
                                <div class="BHO-step-unit-header__title-inner">間取りを<span>設計</span></div>
                            </h3>
                        </div>
                        <div class="BHO-step-unit-cont">
                            <img src="images/bunjohalforder/steps-plan-1.svg" alt="基本プラン" />
                        </div>
                    </div>
                    <div class="BHO-step-unit">
                        <div class="BHO-step-unit-cont">
                            <img src="images/bunjohalforder/steps-example.svg" alt="例えばこんなお客様のご要望に" />
                        </div>
                    </div>
                    <div class="BHO-step-unit">
                        <div class="BHO-step-unit-cont">
                            <img src="images/bunjohalforder/steps-plan-2.svg" alt="カスタムプラン" />
                        </div>
                    </div>
                    <div class="BHO-step-unit step-3">
                        <div class="BHO-step-unit-header">
                            <div class="BHO-step-unit-header__badge"><span class="label">STEP</span><span class="num">3</span></div>
                            <h3 class="BHO-step-unit-header__title">
                                <div class="BHO-step-unit-header__title-inner">外観・内装デザインを<span>設計</span></div>
                            </h3>
                        </div>
                        <div class="BHO-step-unit-cont">
                            <div class="body">
                                外観・内装は、<br />
                                それぞれ<span>厳選したプラン</span>から<br />
                                お選びいただけます。
                            </div>
                            <div class="note">※ベースプランをもとに、オプションで自由度を高めることも可能です。</div>
                        </div>
                    </div>
                    <div class="choose">
                        <h3 class="choose__title">選べる<span>外観</span></h3>
                        <ul class="choose__list slider">
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-exterior-1.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">01</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>Simple</strong> Style</div>
                                            <h4 class="jp">シンプルスタイル</h4>
                                        </div>
                                    </div>
                                    <div class="choose__item-text-cont">
                                        <ul>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-1-parts-1.jpg" alt="" />
                                                </div>
                                                <div class="text">ベースサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-1-parts-2.jpg" alt="" />
                                                </div>
                                                <div class="text">アクセントサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-1-parts-3.jpg" alt="" />
                                                </div>
                                                <div class="text">玄関ドア</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-exterior-2.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">02</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>Black Modern</strong> Style</div>
                                            <h4 class="jp">ブラックモダンスタイル</h4>
                                        </div>
                                    </div>
                                    <div class="choose__item-text-cont">
                                        <ul>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-2-parts-1.jpg" alt="" />
                                                </div>
                                                <div class="text">ベースサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-2-parts-2.jpg" alt="" />
                                                </div>
                                                <div class="text">アクセントサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-2-parts-3.jpg" alt="" />
                                                </div>
                                                <div class="text">玄関ドア</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-exterior-3.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">03</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>Natural Black</strong> Style</div>
                                            <h4 class="jp">ナチュラルブラックスタイル</h4>
                                        </div>
                                    </div>
                                    <div class="choose__item-text-cont">
                                        <ul>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-3-parts-1.jpg" alt="" />
                                                </div>
                                                <div class="text">ベースサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-3-parts-2.jpg" alt="" />
                                                </div>
                                                <div class="text">アクセントサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-3-parts-3.jpg" alt="" />
                                                </div>
                                                <div class="text">玄関ドア</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-exterior-4.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">04</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>Natural Wood</strong> Style</div>
                                            <h4 class="jp">ナチュラルウッドスタイル</h4>
                                        </div>
                                    </div>
                                    <div class="choose__item-text-cont">
                                        <ul>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-4-parts-1.jpg" alt="" />
                                                </div>
                                                <div class="text">ベースサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-4-parts-2.jpg" alt="" />
                                                </div>
                                                <div class="text">アクセントサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-4-parts-3.jpg" alt="" />
                                                </div>
                                                <div class="text">玄関ドア</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-exterior-5.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">05</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>California</strong> Style</div>
                                            <h4 class="jp">カリフォルニアスタイル</h4>
                                        </div>
                                    </div>
                                    <div class="choose__item-text-cont">
                                        <ul>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-5-parts-1.jpg" alt="" />
                                                </div>
                                                <div class="text">ベースサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-5-parts-2.jpg" alt="" />
                                                </div>
                                                <div class="text">アクセントサイディング</div>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <img src="images/bunjohalforder/steps-exterior-5-parts-3.jpg" alt="" />
                                                </div>
                                                <div class="text">玄関ドア</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="choose__list-thumbnail thumbnail">
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-exterior-1.jpg" alt="" />
                                </div>
                                <div class="number manrope">01</div>
                            </li>
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-exterior-2.jpg" alt="" />
                                </div>
                                <div class="number manrope">02</div>
                            </li>
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-exterior-3.jpg" alt="" />
                                </div>
                                <div class="number manrope">03</div>
                            </li>
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-exterior-4.jpg" alt="" />
                                </div>
                                <div class="number manrope">04</div>
                            </li>
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-exterior-5.jpg" alt="" />
                                </div>
                                <div class="number manrope">05</div>
                            </li>
                        </ul>
                    </div>
                    <div class="choose">
                        <h3 class="choose__title">選べる<span>内装</span></h3>
                        <ul class="choose__list slider2">
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-interior-1.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">

                                    <ul class="parts-list">
                                        <li>壁</li>
                                        <li>床</li>
                                        <li>設備</li>
                                        <li>建具</li>
                                    </ul>

                                    <div class="choose__item-text-header">
                                        <div class="number manrope">01</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>Hotel Like</strong> Style</div>
                                            <h4 class="jp">ホテルライクスタイル</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-interior-2.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <ul class="parts-list">
                                        <li>壁</li>
                                        <li>床</li>
                                        <li>設備</li>
                                        <li>建具</li>
                                    </ul>
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">02</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>Modern</strong> Style</div>
                                            <h4 class="jp">モダンスタイル</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-interior-3.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <ul class="parts-list">
                                        <li>壁</li>
                                        <li>床</li>
                                        <li>設備</li>
                                        <li>建具</li>
                                    </ul>
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">03</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>Greige</strong> Style</div>
                                            <h4 class="jp">グレージュスタイル</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-interior-4.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <ul class="parts-list">
                                        <li>壁</li>
                                        <li>床</li>
                                        <li>設備</li>
                                        <li>建具</li>
                                    </ul>
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">04</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>Botanical</strong> Style</div>
                                            <h4 class="jp">ボタニカルスタイル</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="choose__item">
                                <div class="choose__item-img">
                                    <img src="images/bunjohalforder/steps-interior-5.jpg" alt="" />
                                </div>
                                <div class="choose__item-text">
                                    <ul class="parts-list">
                                        <li>壁</li>
                                        <li>床</li>
                                        <li>設備</li>
                                        <li>建具</li>
                                    </ul>
                                    <div class="choose__item-text-header">
                                        <div class="number manrope">05</div>
                                        <div class="title">
                                            <div class="en manrope"><strong>California</strong> Style</div>
                                            <h4 class="jp">カリフォルニアスタイル</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="choose__list-thumbnail thumbnail2">
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-interior-1.jpg" alt="" />
                                </div>
                                <div class="number manrope">01</div>
                            </li>
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-interior-2.jpg" alt="" />
                                </div>
                                <div class="number manrope">02</div>
                            </li>
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-interior-3.jpg" alt="" />
                                </div>
                                <div class="number manrope">03</div>
                            </li>
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-interior-4.jpg" alt="" />
                                </div>
                                <div class="number manrope">04</div>
                            </li>
                            <li class="choose__item-thumbnail">
                                <div class="img">
                                    <img src="images/bunjohalforder/steps-interior-5.jpg" alt="" />
                                </div>
                                <div class="number manrope">05</div>
                            </li>
                        </ul>
                        <div class="option">
                            <h4 class="option__title">設備オプションも<br class="sp-only" />カスタマイズできます</h4>
                            <ul class="option__list">
                                <li class="option__item">
                                    <div class="img">
                                        <img src="images/bunjohalforder/steps-interior-parts-1.jpg" alt="" />
                                    </div>
                                    <div class="text">スマートキー</div>
                                </li>
                                <li class="option__item">
                                    <div class="img">
                                        <img src="images/bunjohalforder/steps-interior-parts-2.jpg" alt="" />
                                    </div>
                                    <div class="text">宅配BOX</div>
                                </li>
                                <li class="option__item">
                                    <div class="img">
                                        <img src="images/bunjohalforder/steps-interior-parts-3.jpg" alt="" />
                                    </div>
                                    <div class="text">ウッドデッキ</div>
                                </li>
                                <li class="option__item">
                                    <div class="img">
                                        <img src="images/bunjohalforder/steps-interior-parts-4.jpg" alt="" />
                                    </div>
                                    <div class="text">幹太くん</div>
                                </li>
                                <li class="option__item">
                                    <div class="img">
                                        <img src="images/bunjohalforder/steps-interior-parts-5.jpg" alt="" />
                                    </div>
                                    <div class="text">タンクレストイレ</div>
                                </li>
                                <li class="option__item">
                                    <div class="img">
                                        <img src="images/bunjohalforder/steps-interior-parts-6.jpg" alt="" />
                                    </div>
                                    <div class="text">IHコンロ</div>
                                </li>
                                <li class="option__item">
                                    <div class="img">
                                        <img src="images/bunjohalforder/steps-interior-parts-7.jpg" alt="" />
                                    </div>
                                    <div class="text">カップボード</div>
                                </li>
                            </ul>
                            <div class="option__note">※写真はすべてイメージです</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
        <section class="BHO-report">
            <div class="BHO-report-inner">
                <a href="">
                    <div class="BHO-report__text">
                        <h2 class="BHO-report__title">実邸REPORT</h2>
                        <div class="BHO-report__body">
                            <p>お客様の希望と、作り手のこだわりから、お引渡し、お引越しまで「理想の住まい」が出来上がるまでの実際の流れをご覧いただけます。</p>
                        </div>
                    </div>
                    <div class="BHO-report__img">
                        <ul>
                            <li>
                                <img src="images/bunjohalforder/report-1.jpg" alt="" />
                            </li>
                            <li>
                                <img src="images/bunjohalforder/report-2.jpg" alt="" />
                            </li>
                            <li>
                                <img src="images/bunjohalforder/report-3.jpg" alt="" />
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
        </section>
-->

        <section class="BHO-memberregistration">
            <div class="BHO-memberregistration-inner">
                <h2 class="BHO-memberregistration__ttl"><span>最新情報をいち早くお届け</span></h2>
                <div class="c-btn blue">
                    <a href="member.php">
                        <span class="label">会員登録</span>
                        <span class="arrow"></span>
                    </a>
                </div>
            </div>
        </section>

        <section class="BHO-voice">
            <div class="BHO-voice-inner">
                <h2 class="BHO-voice__ttl">
                    <span>ハーフオーダーで<br class="sp-only" />購入されたお客様</span>
                </h2>

                <ul class="BHO-voice__list">

                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-5.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="voice">二人暮らしの１LDKが、一軒家を考えるきっかけに</h3>
                            <div class="data">岐阜県　T様／ご家族構成：ご夫婦</div>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=52" target="_blank">詳しく見る</a>
                        </div>
                    </li>

                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-6.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="voice">マンションでは、叶えられなかった猫と犬との暮らし</h3>
                            <div class="data">豊田市　M様／ご家族構成：お母さま、<br>
                                ご長男、お祖母さま、愛猫9匹、愛犬1匹
                            </div>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=45" target="_blank">詳しく見る</a>
                        </div>
                    </li>




                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-2.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="voice">子育ても家事もラクに。共働き家族が選んだ“家事ラク”間取り</h3>
                            <div class="data">犬山市　O様／ご家族構成：ご夫婦、長女、長男、愛猫</div>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=36" target="_blank">詳しく見る</a>
                        </div>
                    </li>
                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-3.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="voice">注文住宅は予算オーバー。それでも理想の造作洗面台が叶いました</h3>
                            <div class="data">東郷町　I様／ご家族構成：ご夫婦</div>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=37" target="_blank">詳しく見る</a>
                        </div>
                    </li>
                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-4.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="voice">ハーフオーダーの自由度が、バリアフリーにも役立ちました</h3>
                            <div class="data">岩倉市　T様／ご家族構成：ご夫婦</div>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=38" target="_blank">詳しく見る</a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="BHO-eco">
            <div class="BHO-eco-inner">
                <h2 class="BHO-eco__ttl">自然と安心に寄り添う<br class="sp-only" />住まいづくり</h2>
                <ul class="BHO-eco__list">
                    <li class="BHO-eco__item">
                        <div class="img">
                            <img src="images/bunjohalforder/eco-1.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="ttl">独自技術 4.3倍 2×4工法</h3>
                            <div class="body">
                                <p>強い衝撃を壁・天井・床の6面全体で受け止めバランス良く吸収するため、水平・垂直、両方向からの力に優れた強さを発揮する2×4工法をさらに進化させた壁量4.3倍パネルを開発。従来の1.4倍以上の耐力アップを実現しました。</p>
                            </div>
                        </div>
                    </li>
                    <li class="BHO-eco__item">
                        <div class="img">
                            <img src="images/bunjohalforder/eco-2.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="ttl">国産材の利用</h3>
                            <div class="body">
                                <p>東新住建独自の4.3倍2×4パネルの一部に、国産材を利用しています。元々、2×4工法は北米で発達した工法であるため、輸入材の使用量がほぼ100％となっています。その中に国産材を採り入れる事で、日本の森を守る活動を積極的に行っています。</p>
                            </div>
                        </div>
                    </li>
                    <li class="BHO-eco__item">
                        <div class="img">
                            <img src="images/bunjohalforder/eco-3.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="ttl">太陽光パネル</h3>
                            <div class="body">
                                <p>太陽光発電は発電時にCO2を排出しない、環境にやさしい発電方法です。太陽光発電の導入はCO2の削減につながるだけでなく、限られた地球の資源の節約にも貢献できます。</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="BHO-eco__btn">
                    <a href="<?php echo $link_list['家づくり'][0]; ?>">東新住建の家づくりについて</a>
                </div>
            </div>
        </section>

        <section class="BHO-history">
            <div class="BHO-history-inner">
                <h2 class="BHO-history__title">History</h2>
                <div class="BHO-history__figure">
                    <img src="images/bunjohalforder/history.svg" alt="" />
                </div>
                <div class="c-btn">
                    <a href="<?php echo $link_list['お問い合わせ'][0]; ?>">
                        <span class="label">資料請求・お問い合わせ</span>
                        <span class="arrow"></span>
                    </a>
                </div>

                <div class="BHO-intro2604__btn">
                    <a href="https://www.toshinjyuken.co.jp/kodate/search.php?search=%E3%83%95%E3%82%A7%E3%83%BC%E3%82%BA,%E3%83%8F%E3%83%BC%E3%83%95%E3%82%AA%E3%83%BC%E3%83%80%E3%83%BC" target="_blank">
                        <span class="label">ハーフオーダーの物件はこちら</span>
                        <span class="arrow"></span>
                    </a>
                </div>
            </div>
        </section>

        <!-- parallax -->
        <script>
            (function() {
                const el = document.querySelector(".BHO-birthhistory-bg .parallax-img");
                if (!el) return;

                const speed = 0.35; // 動きの強さ（0.1〜0.4くらいで調整）
                let rectTop = 0,
                    height = 0; // セクション位置キャッシュ

                function measure() {
                    const wrap = el.parentElement;
                    const r = wrap.getBoundingClientRect();
                    // ページ基準の top を得る
                    rectTop = window.pageYOffset + r.top;
                    height = r.height;
                }

                function render() {
                    const scrollY = window.pageYOffset;
                    // セクションに入った量に応じて移動
                    const progress = scrollY - rectTop;
                    const translate = progress * speed; // 下方向にゆっくり
                    el.style.transform = "translate3d(0," + translate + "px,0)";
                }

                function onScroll() {
                    render();
                }

                function onResize() {
                    measure();
                    render();
                }

                window.addEventListener("load", () => {
                    measure();
                    render();
                });
                window.addEventListener("resize", onResize, {
                    passive: true
                });
                window.addEventListener("scroll", onScroll, {
                    passive: true
                });
            })();
        </script>

        <link rel="stylesheet" type="text/css" href="css/slick.css" />
        <link rel="stylesheet" type="text/css" href="css/slick-theme.css" />
        <script type="text/javascript" src="js/slick.min.js"></script>

        <script>
            $(".slider").slick({
                arrows: false,
                fade: true,
                asNavFor: ".thumbnail",
            });
            $(".thumbnail").slick({
                slidesToShow: 20,
                asNavFor: ".slider",
                focusOnSelect: true,
            });
            $(".slider2").slick({
                arrows: false,
                fade: true,
                asNavFor: ".thumbnail2",
            });
            $(".thumbnail2").slick({
                slidesToShow: 20,
                asNavFor: ".slider2",
                focusOnSelect: true,
            });

            $(window).on("load", function() {
                var $voiceSlider = $(".BHO-voice__list");

                if ($voiceSlider.length && !$voiceSlider.hasClass("slick-initialized")) {
                    $voiceSlider.slick({
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: "20%",
                        autoplay: true,
                        autoplaySpeed: 3000,
                        speed: 1000,
                        infinite: true,
                        responsive: [{
                            breakpoint: 1000,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                centerMode: false,
                                centerPadding: "0px"
                            }
                        }]
                    });
                }

                setTimeout(function() {
                    $voiceSlider.slick("setPosition");
                }, 300);
            });
        </script>

        <script>
            // 変数に要素を入れる
            var trigger = $(".modal__trigger"),
                wrapper = $(".modal__wrapper"),
                layer = $(".modal__layer"),
                container = $(".modal__container"),
                close = $(".modal__close");

            // 『モーダルを開くボタン』をクリックしたら、『モーダル本体』を表示
            $(trigger).click(function() {
                var target = $(this).data("target");
                var modal = document.getElementById(target);
                $(modal).fadeIn(400);

                // スクロール位置を戻す
                $(container).scrollTop(0);

                // サイトのスクロールを禁止にする
                $("html, body").css("overflow", "hidden");
            });

            // 『背景』と『モーダルを閉じるボタン』をクリックしたら、『モーダル本体』を非表示
            $(layer)
                .add(close)
                .click(function() {
                    $(wrapper).fadeOut(400);

                    // サイトのスクロール禁止を解除する
                    $("html, body").removeAttr("style");
                });
        </script>



        <?php echo $temp_footer; ?>
        <!-- * -->
    </div>
    <?php echo $temp_bodyend; ?>
</body>

</html>