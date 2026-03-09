<?php get_header(); ?>

<section class="page-header">
    <div class="sect-inner">
        <h2 class="page-header__ttl">
            <span class="en">ENGLISH_TITLE</span>
            <span class="jp"><?php the_title(); ?></span>
        </h2>
        <div class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="home"><a href="<?php echo home_url(); ?>/">ホーム</a><span class="arrow">＞</span></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</section>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>