<?php
$body_id = 'News';
get_header(); ?>

<div id="Contents">
<div class="kv">
	<div class="h1_copy">
		<div><img src="<?php echo get_template_directory_uri(); ?>/images/news/h1_en.svg" alt="news" width="311" height="107"></div>
		<h1>新着情報</h1>
	</div>	
</div>
<ul class="topicpath">
	<li><a href="<?php echo home_url(); ?>/">TOP</a></li>
	<li><a href="<?php echo home_url(); ?>/news">NEWS</a></li>
	<li><?php the_title(); ?></li>
</ul>
<div class="wrapper">
	<h2><?php the_title(); ?></h2>
	<div class="item">
		<p class="date"><?php the_time('Y/m/d'); ?></p>
		<div class="txt"><?php the_content(); ?></div>
	</div>
</div>
	
<div class="post_link">
<div class="previous"><?php previous_post_link('%link', '前の記事'); ?></div>
<div class="list txt_link"><a href="<?php echo home_url(); ?>/news/">一覧に戻る</a></div>
<div class="next"><?php next_post_link('%link', '次の記事'); ?></div>
</div>
	
<?php get_footer(); ?>