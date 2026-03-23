<?php
/*
Template Name: トップ（ホーム）ページ
*/
get_header(); ?>

<section class="page-header">
	<div class="sect-inner">
		<h2 class="page-header__ttl">
			<span class="en">GALLERY</span>
			<span class="jp">施工例</span>
		</h2>
		<div class="breadcrumbs">
			<ul class="breadcrumbs-list">
				<li class="home"><a href="https://www.toshinjyuken.co.jp/kodate/">ホーム</a><span class="arrow">＞</span></li>
				<li>施工事例</li>
			</ul>
		</div>
	</div>
</section>

<section class="gallery-sect">
	<div class="sect-inner">
		<ul class="gallery-sect__list">
			<?php
			$paged = max(1, get_query_var('paged'), get_query_var('page'));
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 12,
				'paged'          => $paged,
			);
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) :
				while ($the_query->have_posts()) : $the_query->the_post();
			?>
					<li class="gallery-sect__item">
						<a href="<?php the_permalink() ?>">
							<div class="txt"><?php the_title(); ?></div>
							<div class="img">
								<?php
								// まずはアイキャッチ画像
								if (has_post_thumbnail()) {
									the_post_thumbnail('large');
								} else {
									// ACF 繰り返しフィールド gallery の1行目の gallery_img を取得
									$gallery = get_field('gallery');

									if (! empty($gallery) && ! empty($gallery[0]['gallery_img'])) {
										$img = $gallery[0]['gallery_img'];

										// 画像フィールドの戻り値が「配列」の場合
										if (is_array($img)) {
											echo '<img src="' . esc_url($img['url']) . '" alt="' . esc_attr($img['alt']) . '">';
										}

										// 画像フィールドの戻り値が「ID」の場合
										elseif (is_numeric($img)) {
											echo wp_get_attachment_image($img, 'large');
										}

										// 画像フィールドの戻り値が「URL」の場合
										else {
											echo '<img src="' . esc_url($img) . '" alt="">';
										}
									}
								}
								?>
							</div>
						</a>
					</li>
			<?php endwhile;
			endif; ?>
		</ul>
		<div class="pagination">
			<?php
			if (function_exists('wp_pagenavi')) {
				wp_pagenavi(array('query' => $the_query));
			}
			?>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>
</section>

<?php get_footer(); ?>