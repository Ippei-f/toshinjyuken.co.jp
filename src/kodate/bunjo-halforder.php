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
        <!-- *** -->

        <section class="BHO-kv">
            <div class="BHO-kv__badge">
                <img src="images/bunjohalforder/kv-badge.svg" alt="INTERIOR SELECT / HALF ORDER" />
            </div>
            <h1 class="BHO-kv__catch">
                <img class="pc-only" src="images/bunjohalforder/kv-catch.svg" alt="分譲住宅に選ぶ自由を。" />
                <img class="sp-only" src="images/bunjohalforder/sp/kv-catch.svg" alt="分譲住宅に選ぶ自由を。" />
            </h1>
        </section>

        <section class="BHO-intro">
            <div class="BHO-intro-inner">
                <div class="BHO-intro-header">
                    <h2 class="BHO-intro__ttl">
                        これから家を買うなら、<br class="sp-only" /><strong>“<span>選</span><span>べ</span><span>る</span>分譲住宅”</strong>
                    </h2>
                    <div class="BHO-intro__txt-1">
                        内装を選べる<strong>「インテリアセレクト」、</strong><br />
                        外観や間取りまで叶う<strong>「ハーフオーダー」。</strong>
                    </div>
                    <div class="BHO-intro__txt-2">理想の住まいを、<br class="sp-only" />自分らしくデザインしましょう！</div>
                </div>
                <ul class="BHO-intro__list">
                    <li class="BHO-intro__item">
                        <div class="img">
                            <div class="img">
                                <img src="images/bunjohalforder/intro-interiorselect.jpg" alt="" />
                            </div>
                            <div class="badge">
                                <img src="images/bunjohalforder/intro-interiorselect-badge.svg" alt="INTERIOR SELECT" />
                            </div>
                        </div>
                        <div class="txt">
                            <h3 class="ttl">“内観デザイン”をセレクト</h3>
                            <div class="body">
                                <p>お好みの内観スタイルから自由にセレクト可能。建物の外側（外観や構造部分）は完成済みのため、ご入居スムーズに進められます。注文住宅のような時間や手間をかけずに、”自分らしい暮らし”をかなえられます。</p>
                            </div>
                            <div class="btn">
                                <a
                                    href="https://www.toshinjyuken.co.jp/kodate/search.php?search=フェーズ,インテリアセレクト
"
                                    target="_blank">物件はこちら</a>
                            </div>
                        </div>
                    </li>
                    <li class="BHO-intro__item">
                        <div class="img">
                            <div class="img">
                                <img src="images/bunjohalforder/intro-halforder.jpg" alt="" />
                            </div>
                            <div class="badge">
                                <img src="images/bunjohalforder/intro-halforder-badge.svg" alt="HALF ORDER" />
                            </div>
                        </div>
                        <div class="txt">
                            <h3 class="ttl">“内観と外観デザイン”を両方セレクト</h3>
                            <div class="body">
                                <p>
                                    注文住宅のような自由度と、分譲住宅のコストパフォーマンスを兼ね備えた「いいとこどり」がハーフオーダーの魅力。<br />
                                    今はまだ真っ白な空間だからこそ、間取りや外観も、あなたの理想に合わせてプランニングできます。
                                </p>
                            </div>
                            <div class="btn">
                                <a
                                    href="https://www.toshinjyuken.co.jp/kodate/search.php?search=フェーズ,ハーフオーダー
"
                                    target="_blank">物件はこちら</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="BHO-intro__note">※各物件ごとに「インテリアセレクト」か「ハーフオーダー」が設定されています</div>
            </div>
        </section>

        <section class="BHO-flow">
            <div class="BHO-flow-inner">
                <h2 class="BHO-flow__ttl">ご入居までの流れ</h2>
                <div class="BHO-flow__figure">
                    <img src="images/bunjohalforder/flow.svg" alt="ご入居までの流れ" />
                </div>
                <div class="c-btn">
                    <a href="<?php echo $link_list['お問い合わせ'][0]; ?>">資料請求・お問い合わせ<span class="arrow"><img src="images/bunjohalforder/arrow-right.svg" alt="" /></span></a>
                </div>
            </div>
        </section>

        <section class="BHO-interiorselect">
            <div class="BHO-interiorselect-inner">
                <h2 class="BHO-interiorselect__ttl">
                    <div class="badge"><img src="images/bunjohalforder/interiorselect-ttl-badge.svg" alt="インテリアセレクト" /></div>
                    <div class="txt">※ハーフオーダーにはインテリアセレクトが含まれます</div>
                </h2>
                <div class="BHO-interiorselect__ttl-2">
                    <h3 class="jp"><span>基本プラン</span></h3>
                    <div class="en manrope"><strong>Basic</strong> Style</div>
                </div>
                <div class="BHO-interiorselect__gallery">
                    <div class="BHO-interiorselect__gallery-main">
                        <ul class="BHO-interiorselect__gallery-main__list">
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-1.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">01</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>Hotel Like</strong> Style</div>
                                        <h4 class="jp">ホテルライクスタイル</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-2.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">02</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>Natural Botanical</strong> Style</div>
                                        <h4 class="jp">ナチュラルボタニカルスタイル</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-3.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">03</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>Modern</strong> Style</div>
                                        <h4 class="jp">モダンスタイル</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-4.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">04</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>California</strong> Style</div>
                                        <h4 class="jp">カリフォルニアスタイル</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-5.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">05</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>Grayish</strong> Style</div>
                                        <h4 class="jp">グレイッシュスタイル</h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="BHO-interiorselect__gallery__note">※間取りタイプによってお選びいただけるスタイルが異なります。</div>
                    </div>
                    <div class="BHO-interiorselect__gallery-sub">
                        <ul class="BHO-interiorselect__gallery-sub__list">
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-1.jpg" alt="" />
                                </div>
                                <div class="number manrope">01</div>
                            </li>
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-2.jpg" alt="" />
                                </div>
                                <div class="number manrope">02</div>
                            </li>
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-3.jpg" alt="" />
                                </div>
                                <div class="number manrope">03</div>
                            </li>
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-4.jpg" alt="" />
                                </div>
                                <div class="number manrope">04</div>
                            </li>
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/interiorselect-gallery-5.jpg" alt="" />
                                </div>
                                <div class="number manrope">05</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="premium">
                    <div class="BHO-interiorselect__ttl-2">
                        <h3 class="jp"><span>もっと素材にこだわりたい方</span></h3>
                        <div class="en manrope"><strong>Premium</strong> Style</div>
                        <div class="note">※追加料金となります。詳しくはお問い合わせください</div>
                    </div>
                    <ul class="premium__list">
                        <li class="premium__item modal__trigger" data-target="modal_1">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-premium-luxury.jpg" alt="" />
                            </div>
                            <div class="txt">
                                <div class="ttl">
                                    <div class="en manrope"><strong>Luxury</strong> Style</div>
                                    <h4 class="jp">ラグジュアリースタイル</h4>
                                </div>
                            </div>
                        </li>
                        <li class="premium__item modal__trigger" data-target="modal_2">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-premium-natural.jpg" alt="" />
                            </div>
                            <div class="txt">
                                <div class="ttl">
                                    <div class="en manrope"><strong>Natural</strong> Style</div>
                                    <h4 class="jp">ナチュラルスタイル</h4>
                                </div>
                            </div>
                        </li>
                        <li class="premium__item modal__trigger" data-target="modal_3">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-premium-frenchmodern.jpg" alt="" />
                            </div>
                            <div class="txt">
                                <div class="ttl">
                                    <div class="en manrope"><strong>French Modern</strong> Style</div>
                                    <h4 class="jp">フレンチモダンスタイル</h4>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!--.modal-area-->
                    <div class="modal-area">
                        <div id="modal_1" class="modal__wrapper">
                            <div class="modal__layer"></div>
                            <div class="modal__container">
                                <div class="modal__inner">
                                    <!-- モーダル内のコンテンツ -->
                                    <div class="modal__content">
                                        <div class="img">
                                            <img src="images/bunjohalforder/interiorselect-premium-luxury.jpg" alt="" />
                                        </div>
                                        <div class="txt">
                                            <div class="ttl">
                                                <div class="en manrope"><strong>Luxury</strong> Style</div>
                                                <h4 class="jp">ラグジュアリースタイル</h4>
                                            </div>
                                            <div class="body">
                                                <p>セラミック調フローリングとブラックでまとめたキッチン・扉が高級感を演出。天然石風エコカラットやコンクリート調壁に間接照明が映え、光と影が織りなすドラマチックな空間に。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / モーダル内のコンテンツ -->
                                    <!-- モーダルを閉じるボタン -->
                                    <div class="modal__close">
                                        <img src="images/bunjohalforder/modal-close.svg" alt="Close" />
                                    </div>
                                    <!-- / モーダルを閉じるボタン -->
                                </div>
                            </div>
                        </div>

                        <div id="modal_2" class="modal__wrapper">
                            <div class="modal__layer"></div>
                            <div class="modal__container">
                                <div class="modal__inner">
                                    <!-- モーダル内のコンテンツ -->
                                    <div class="modal__content">
                                        <div class="img">
                                            <img src="images/bunjohalforder/interiorselect-premium-natural.jpg" alt="" />
                                        </div>
                                        <div class="txt">
                                            <div class="ttl">
                                                <div class="en manrope"><strong>Natural</strong> Style</div>
                                                <h4 class="jp">ナチュラルスタイル</h4>
                                            </div>
                                            <div class="body">
                                                <p>本物の木の質感を楽しめる突板で床と天井を仕上げ、扉も同色で統一。焼き物を表現した陶連子調のエコカラットがアクセントとなり、柔らかな照明が住まい全体を包み込む心地よい空間に。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / モーダル内のコンテンツ -->
                                    <!-- モーダルを閉じるボタン -->
                                    <div class="modal__close">
                                        <img src="images/bunjohalforder/modal-close.svg" alt="Close" />
                                    </div>
                                    <!-- / モーダルを閉じるボタン -->
                                </div>
                            </div>
                        </div>

                        <div id="modal_3" class="modal__wrapper">
                            <div class="modal__layer"></div>
                            <div class="modal__container">
                                <div class="modal__inner">
                                    <!-- モーダル内のコンテンツ -->
                                    <div class="modal__content">
                                        <div class="img">
                                            <img src="images/bunjohalforder/interiorselect-premium-frenchmodern.jpg" alt="" />
                                        </div>
                                        <div class="txt">
                                            <div class="ttl">
                                                <div class="en manrope"><strong>French Modern</strong> Style</div>
                                                <h4 class="jp">フレンチモダンスタイル</h4>
                                            </div>
                                            <div class="body">
                                                <p>床とキッチンをウォルナットで統一し、落ち着いた重厚感を演出。ホワイトの扉やモールディングが華やかさを添え、室内用窓のデコマドで光とデザインが調和する上品な空間に。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / モーダル内のコンテンツ -->
                                    <!-- モーダルを閉じるボタン -->
                                    <div class="modal__close">
                                        <img src="images/bunjohalforder/modal-close.svg" alt="Close" />
                                    </div>
                                    <!-- / モーダルを閉じるボタン -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.modal-area-->
                </div>

                <div class="option">
                    <h3 class="option__ttl">設備オプションもカスタマイズできます</h3>
                    <ul class="option__list">
                        <li class="option__item">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-option-1.jpg" alt="" />
                            </div>
                            <div class="txt">スマートキー</div>
                        </li>
                        <li class="option__item">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-option-2.jpg" alt="" />
                            </div>
                            <div class="txt">宅配BOX</div>
                        </li>
                        <li class="option__item">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-option-3.jpg" alt="" />
                            </div>
                            <div class="txt">ウッドデッキ</div>
                        </li>
                        <li class="option__item">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-option-4.jpg" alt="" />
                            </div>
                            <div class="txt">幹太くん</div>
                        </li>
                        <li class="option__item">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-option-5.jpg" alt="" />
                            </div>
                            <div class="txt">タンクレストイレ</div>
                        </li>
                        <li class="option__item">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-option-6.jpg" alt="" />
                            </div>
                            <div class="txt">IHコンロ</div>
                        </li>
                        <li class="option__item">
                            <div class="img">
                                <img src="images/bunjohalforder/interiorselect-option-7.jpg" alt="" />
                            </div>
                            <div class="txt">カップボード</div>
                        </li>
                    </ul>
                    <div class="option__note">※写真はすべてイメージです</div>
                </div>

                <div class="bukken-btn">
                    <a
                        href="https://www.toshinjyuken.co.jp/kodate/search.php?search=フェーズ,インテリアセレクト
"
                        target="_blank">インテリアセレクトの物件はこちら</a>
                </div>
            </div>
        </section>

        <section class="BHO-halforder">
            <div class="BHO-halforder-inner">
                <h2 class="BHO-interiorselect__ttl">
                    <div class="badge"><img src="images/bunjohalforder/halforder-ttl-badge.svg" alt="ハーフオーダー" /></div>
                </h2>
                <div class="BHO-halforder__ttl-2">
                    <h3 class="jp">
                        <span>内観と組み合わせて<br class="sp-only" />オーダーできる外観Style</span>
                    </h3>
                </div>
                <div class="BHO-interiorselect__gallery">
                    <div class="BHO-interiorselect__gallery-main">
                        <ul class="BHO-interiorselect__gallery-main__list">
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-1.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">01</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>Japanese Modern</strong> Style</div>
                                        <h4 class="jp">和モダンスタイル</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-2.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">02</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>Natural Black</strong> Style</div>
                                        <h4 class="jp">ナチュラルブラックスタイル</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-3.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">03</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>Simple</strong> Style</div>
                                        <h4 class="jp">シンプルスタイル</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-4.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">04</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>Monotone </strong> Style</div>
                                        <h4 class="jp">モノトーンスタイル</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="BHO-interiorselect__gallery-main__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-5.jpg" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="number manrope">05</div>
                                    <div class="ttl">
                                        <div class="en manrope"><strong>California </strong> Style</div>
                                        <h4 class="jp">カリフォルニアスタイル</h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="BHO-interiorselect__gallery_note">
                            ※05 カリフォルニアスタイルのみ別途追加費用となります。<br />
                            ※間取りタイプによってお選びいただけるスタイルが異なります。
                        </div>
                    </div>
                    <div class="BHO-interiorselect__gallery-sub">
                        <ul class="BHO-interiorselect__gallery-sub__list">
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-1.jpg" alt="" />
                                </div>
                                <div class="number manrope">01</div>
                            </li>
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-2.jpg" alt="" />
                                </div>
                                <div class="number manrope">02</div>
                            </li>
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-3.jpg" alt="" />
                                </div>
                                <div class="number manrope">03</div>
                            </li>
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-4.jpg" alt="" />
                                </div>
                                <div class="number manrope">04</div>
                            </li>
                            <li class="BHO-interiorselect__gallery-sub__item">
                                <div class="img">
                                    <img src="images/bunjohalforder/halforder-gallery-5.jpg" alt="" />
                                </div>
                                <div class="number manrope">05</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bukken-btn">
                    <a
                        href="https://www.toshinjyuken.co.jp/kodate/search.php?search=フェーズ,ハーフオーダー
"
                        target="_blank">ハーフオーダーの物件はこちら</a>
                </div>
            </div>
        </section>

        <section class="BHO-voice">
            <div class="BHO-voice-inner">
                <h2 class="BHO-voice__ttl">インテリアセレクト・ハーフオーダーで購入されたお客様</h2>

                <ul class="BHO-voice__list">
                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-1.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <div class="data">岡崎市　S様／ご家族構成：ご夫婦、愛猫</div>
                            <h3 class="voice">早期契約のおかげで、注文住宅レベルのこだわりを実現できました</h3>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=28" target="_blank">詳しく見る</a>
                        </div>
                    </li>
                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-2.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <div class="data">犬山市　O様／ご家族構成：ご夫婦、長女、長男、愛猫</div>
                            <h3 class="voice">家族の気配がいつもそばにある、平屋という選択</h3>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=41" target="_blank">詳しく見る</a>
                        </div>
                    </li>
                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-3.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <div class="data">東郷町　I様／ご家族構成：ご夫婦</div>
                            <h3 class="voice">建売でも、ここまで希望が叶うなんて思っていませんでした</h3>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=43" target="_blank">詳しく見る</a>
                        </div>
                    </li>
                    <li class="BHO-voice__item">
                        <div class="img">
                            <img src="images/bunjohalforder/voice-4.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <div class="data">岩倉市　T様／ご家族構成：ご夫婦</div>
                            <h3 class="voice">ハーフオーダーの自由度が、バリアフリーにも役立ちました</h3>
                        </div>
                        <div class="btn">
                            <a href="https://www.toshinjyuken.co.jp/kodate/voice-detail.php?case=45" target="_blank">詳しく見る</a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="BHO-eco">
            <div class="BHO-eco-inner">
                <h2 class="BHO-eco__ttl">環境にもやさしい住まいづくり</h2>
                <ul class="BHO-eco__list">
                    <li class="BHO-eco__item">
                        <div class="img">
                            <img src="images/bunjohalforder/eco-1.jpg" alt="" />
                        </div>
                        <div class="txt">
                            <h3 class="ttl">国産材の4.3倍2×4住宅</h3>
                            <div class="body">
                                <p>東新住建独自の4.3倍2×4パネルの一部に、国産材を利用しています。元々、2×4工法は北米で発達した工法であるため、輸入材の使用量がほぼ100％となっています。その中に国産材を採り入れる事で、日本の森を守る活動を積極的に行っています。</p>
                            </div>
                        </div>
                    </li>
                    <li class="BHO-eco__item">
                        <div class="img">
                            <img src="images/bunjohalforder/eco-2.jpg" alt="" />
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

        <div class="c-btn">
            <a href="<?php echo $link_list['お問い合わせ'][0]; ?>">資料請求・お問い合わせ<span class="arrow"><img src="images/bunjohalforder/arrow-right.svg" alt="" /></span></a>
        </div>

        <link rel="stylesheet" type="text/css" href="css/slick.css" />
        <link rel="stylesheet" type="text/css" href="css/slick-theme.css" />
        <script type="text/javascript" src="js/slick.min.js"></script>

        <script>
            $(".BHO-interiorselect__gallery-main__list").slick({
                autoplay: true,
                arrows: false,
                fade: true,
                asNavFor: ".BHO-interiorselect__gallery-sub__list",
            });
            $(".BHO-interiorselect__gallery-sub__list").slick({
                slidesToShow: 20,
                asNavFor: ".BHO-interiorselect__gallery-main__list",
                focusOnSelect: true,
                variableWidth: true, // スライド幅の自動計算を無効
            });

            $(".BHO-voice__list").slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: "20%",
                autoplay: true,
                autoplaySpeed: 3000,
                speed: 1000,
                infinite: true,
                responsive: [{
                    breakpoint: 1000, // 999px以下のサイズに適用
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                    },
                }, ],
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