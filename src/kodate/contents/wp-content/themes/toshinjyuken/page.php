<?php get_header(); ?>

<section class="page-ttl">
    <div class="sect-inner">
        <div class="c-ttl">
            <h1 class="jp"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<div class="breadcrumbs">
    <ul class="breadcrumbs-list">
        <li class="home"><a href="<?php echo home_url(); ?>/">ホーム</a><span class="arrow">></span></li>
        <li><?php the_title(); ?></li>
    </ul>
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
<?php endwhile;
endif; ?>

<!-- COMMON FOOTER -->

<?php get_footer(); ?>