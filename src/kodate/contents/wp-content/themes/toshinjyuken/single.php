<?php get_header(); ?>

<section class="page-header single-gallery-header">
    <div class="sect-inner">
        <h2 class="page-header__ttl"><?php the_title(); ?></h2>
        <div class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="home"><a href="https://www.toshinjyuken.co.jp/kodate/">ホーム</a><span class="arrow">＞</span></li>
                <li class="home"><a href="<?php echo home_url(); ?>/">ギャラリー</a><span class="arrow">＞</span></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</section>

<section class="single-gallery">
    <div class="sect-inner">
        <ul class="single-gallery__list">
            <?php if (have_rows('gallery')) : ?>
                <?php $i = 1; ?>
                <?php while (have_rows('gallery')) : the_row();
                    // vars
                    $gallery_img = get_sub_field('gallery_img');
                    $gallery_txt = get_sub_field('gallery_txt');
                    $gallery_icon = get_sub_field('gallery_icon');
                ?>
                    <li class="single-gallery__item">
                        <button
                            class="openModal"
                            data-image="<?php echo $gallery_img['url']; ?>"
                            data-icon="<?php if ($gallery_icon == 'icon-1'): ?><?php echo get_template_directory_uri(); ?>/assets/images/gallery/people-icon-1.svg<?php elseif ($gallery_icon == 'icon-2'): ?><?php echo get_template_directory_uri(); ?>/assets/images/gallery/people-icon-2.svg<?php elseif ($gallery_icon == 'icon-3'): ?><?php echo get_template_directory_uri(); ?>/assets/images/gallery/people-icon-3.svg<?php elseif ($gallery_icon == 'icon-4'): ?><?php echo get_template_directory_uri(); ?>/assets/images/gallery/people-icon-4.svg<?php else: ?><?php endif; ?>"
                            data-text="<?php echo $gallery_txt; ?>">
                            <div class="img">
                                <img src="<?php echo $gallery_img['url']; ?>" alt="<?php echo $gallery_img['alt'] ?>" />
                            </div>
                            <div class="txt">
                                <?php if ($gallery_icon == 'icon-1'): ?>
                                    <div class="icon">
                                        <img class="icon-1" src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/people-icon-1.svg" alt="" />
                                    </div>
                                <?php elseif ($gallery_icon == 'icon-2'): ?>
                                    <div class="icon">
                                        <img class="icon-2" src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/people-icon-2.svg" alt="" />
                                    </div>
                                <?php elseif ($gallery_icon == 'icon-3'): ?>
                                    <div class="icon">
                                        <img class="icon-3" src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/people-icon-3.svg" alt="" />
                                    </div>
                                <?php elseif ($gallery_icon == 'icon-4'): ?>
                                    <div class="icon">
                                        <img class="icon-4" src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/people-icon-4.svg" alt="" />
                                    </div>
                                    <?php else: ?><?php endif; ?>
                                    <div class="body"><?php echo $gallery_txt; ?></div>
                            </div>
                        </button>
                    </li>
                    <?php $i++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
</section>

<div class="modal" id="galleryModal" aria-hidden="true">
    <div class="modal__overlay"></div>

    <div class="modal__inner">
        <div class="modal__image">
            <img id="modalImage" src="" />
        </div>

        <div class="modal__nav">
            <div class="modal__prev" type="button" aria-label="前へ"></div>
            <div class="modal__next" type="button" aria-label="次へ"></div>
            <span class="modal__count">
                <span id="modalCurrent">1</span> /
                <span id="modalTotal">11</span>
            </span>
            <div class="modal__close">×</div>
        </div>

        <div class="modal__textArea">
            <div class="modal__icon">
                <img id="modalIcon" src="" />
            </div>
            <div class="modal__text" id="modalText"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>