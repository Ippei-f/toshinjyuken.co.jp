<?php
/**
 * Template Name: サンクスページ
 */
$page = get_post( get_the_ID() );
$body_id = 'Form';
get_header(); ?>


<!--<div id="Contents">-->

<?php if(have_posts()) : while(have_posts()) : the_post();?>
<?php the_content(); ?>
<?php endwhile; endif; ?>

<!--</div>-->
<?php get_footer();