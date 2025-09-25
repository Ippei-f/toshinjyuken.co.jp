<?php
$body_id = 'News';
get_header(); ?>

<div id="Contents">
<div class="kv">
	<div class="h1_copy">
		<h1>404NOT FOUND...</h1>
	</div>	
</div>
<ul class="topicpath">
	<li><a href="<?php echo home_url(); ?>/">TOP</a></li>
	<li>404NOT FOUND</li>
</ul>
<div class="notfound wrapper">
	<p class="notfound_ttl">お探しのページが見つかりませんでした。</p>
	<p>URLが間違っているか、ページが存在しません。<br>トップページから再度アクセスしてください。</p>
</div>
	
<a class="back_link" href="<?php echo home_url(); ?>/">トップページへ戻る</a>

<?php get_footer(); ?>