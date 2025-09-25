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
	<li>NEWS</li>
</ul>

<div class="wrapper">
<?php
//if(isset($_GET['test'])){
	echo '<!-- test -->';
	$get_cate=get_categories();//カテゴリー一覧取得
	$arr_cate=array('news'=>'お知らせ','event'=>'社内行事','blog'=>'社員ブログ');//カテゴリー配列（最初の3つは順番固定）
	foreach($get_cate as $v){
		$arr_cate[$v->slug]=$v->name;
	}
	//print_r($arr_cate);
?>
	<div class="cate_list">
	<div class="cate_pc">
	<h3>CATEGORY</h3>
	<ul>
	<?php
	//if(is_category()){echo '<li><a href="'.home_url().'/news/">全表示</a></li>';}
	echo '<li><a href="'.home_url().'/news/">全表示</a></li>';
	foreach($arr_cate as $k => $v){
		$add=is_category()&&is_category($k)?' class="now"':'';//カテゴリーページかつそのカテゴリーを選択しているか
		echo '<li><a href="'.home_url().'/category/'.$k.'/"'.$add.'>'.$v.'</a></li>';
	}
	?>
	</ul>
	</div>
	<form name="cate_sp"><select name="cate" onchange="if(document.cate_sp.cate.value){location.href=document.cate_sp.cate.value;}">
	<option value="">CATEGORY</option>
	<?php
	//if(is_category()){echo '<option value="'.home_url().'/news/">全表示</option>';}
	echo '<option value="'.home_url().'/news/">全表示</option>';
	foreach($arr_cate as $k => $v){
		$add=is_category()&&is_category($k)?' selected':'';//カテゴリーページかつそのカテゴリーを選択しているか
		echo '<option value="'.home_url().'/category/'.$k.'/"'.$add.'>'.$v.'</option>';
	}
	?>
	</select></form>
	</div>
<?php
//}//if(isset($_GET['test']))
?>
	<h2>新着情報一覧</h2>
	<?php
	$my_query = new WP_Query(
	  array(
		'paged' => $paged,
		'post_type'      => 'post',
		'posts_per_page' => 5,
	  )
	);
	?>
	<?php if ( $my_query ->have_posts()): while ( $my_query ->have_posts()) : $my_query ->the_post(); ?>
	<?php
	$now_cate=get_the_category();
	$now_cate=$now_cate[0];
	/*
	if(isset($_GET['test'])){
		//print_r($now_cate);
	}
	*/
	if(is_category()&&!is_category($now_cate->slug)){
		//カテゴリーページかつそのカテゴリー以外の場合、省略する。
		continue;
	}
	?>
	<ul>
		<li class="item">
			<p class="date"><?php the_time('Y/m/d'); if($now_cate->name!=''){echo '<span class="cate">・'.$now_cate->name.'</span>';} ?></p>
			<p class="ttl"><?php the_title(); ?></p>
			<p class="txt"><?php echo get_the_excerpt(); ?></p>
			<a href="<?php the_permalink() ?>" class="txt_link">記事を読む</a>
		</li>
	</ul>
	<?php endwhile; endif; ?>
	<div class="page_nav"><p><?php if(function_exists("wp_pagenavi")) wp_pagenavi(array('query' => $my_query)); ?></p></div>
</div>
	
<section class="join_us">
	<div class="join_us_inner front">
		<div class="copy"><img src="<?php echo get_template_directory_uri(); ?>/images/common/joinus_copy.svg" alt="join us!"></div>
		<p>さあ、ともに出発しよう！<br>エントリーはこちらから</p>
		<div class="flex">
			<a class="yoko" href="<?php echo home_url(); ?>/job/">募集要項</a>
			<a class="entry" href="<?php echo home_url(); ?>/form/">ENTRY</a>
		</div>
	</div>	
</section>
<?php get_footer(); ?>