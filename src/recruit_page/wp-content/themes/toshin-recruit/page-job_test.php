<?php
$page = get_post( get_the_ID() );
//$body_id = $post->post_name;
//$body_id = ucfirst($body_id);
$body_id = 'Job';
get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post();?>
<div id="Contents">
<!-- * -->
<div class="kv">
	<div class="h1_copy">
		<picture>
			<source media="(max-width:600px)" srcset="/recruit_page/wp-content/themes/toshin-recruit/images/job/h1_en_sp.svg" width="" height="">
			<img src="<?php echo do_shortcode('[gtdu]'); ?>/images/job/h1_en.svg" alt="job" width="756" height="140">
		</picture>
		<h1>募集要項</h1>
	</div>	
</div>
<ul class="topicpath">
	<li><a href="<?php echo do_shortcode('[home_url]'); ?>/">TOP</a></li>
	<li>募集要項</li>
</ul>
<!-- ** -->
<div class="wrapper">

<section class="intro front">
<div class="intro_img"><img src="<?php echo do_shortcode('[gtdu]'); ?>/images/job/h2_en.svg" alt="We can do it!"></div>
<h2>社会の、お客様の、<br class="sp">自分自身の<br>“ほしいもの”を探す旅へ。</h2>
<p>ほしいものを、つくります――この理念には3つの意味が込められています。<br>顧客のニーズをかなえること。まだ見えないウォンツを発見すること。<br>さらに、自分自身のビジョンを探し挑戦し続けること。<br>この3つの指針を社員全員が共有することで、<br>わたしたちは社会全体に向け、新たな価値を提供し続けています。</p>
</section>
<section class="btn_area max_area" data-overdirection="full">
<div class="wrapper btns">
<a href="#New_graduate">新卒採用</a>
<a href="#Career">キャリア採用</a>
</div>
</section>
<section class="kind">
<div class="intro front">
<h3>［仕事内容］</h3>
<p class="ttl">相手の望みをかなえることで、自分自身を成長させる。<br>これがすべての職場に共通の基本姿勢です。</p>
<p>言ってみれば、仕事とはすべて「人の要望に応える」行為です。<br>営業であれ、技術であれ、人は他者と向き合うことで磨かれ、<br>自分でも気が付かなかった新しい能力を目覚めさせていきます。<br>そんな自己成長の場を提供するのもわたしたちの役割です。</p>
</div>
<div class="flex front">
<div>
<div class="circle"><img src="<?php echo do_shortcode('[gtdu]'); ?>/images/job/job01.png" alt="営業"><p>営業</p></div>
<p class="kind_copy">一般的なアナログ式の営業方法ではなく、マーケティング活動×WEBを活用したセールス活動で反響のあるお客様を絞り込み、効率よく営業を行えることが特徴です。仲間と協力しながら成功体験を積み重ねることで、自然に成長できる土壌があります。</p>
</div>
<div>
<div class="circle"><img src="<?php echo do_shortcode('[gtdu]'); ?>/images/job/job02.png" alt="施工管理"><p>施工管理</p></div>
<p class="kind_copy">家が完成するまでの段取りをコントロールする指揮者のような仕事です。実際の工事は専門企業が行いますが、そのチームをひきいてスケジュールや施工品質を管理するのが施工管理者の役割。思い通りの家が完成した時の感慨は格別です。</p>
</div>
<div>
<div class="circle"><img src="<?php echo do_shortcode('[gtdu]'); ?>/images/job/job03.png" alt="設計"><p>設計</p></div>
<p class="kind_copy">オンリーワンの借地住宅、中部圏トップクラスの着工戸数を誇る分譲住宅、他社にないユニークな戸建てマンションなど、お客さまの要望に応じた多彩な住まいを生み出す仕事。社会の流れを先取りし、形に変えていくセンスが重要です。</p>
</div>
</div>
</section>
<!-- recruit_area -->
<section class="recruit_area max_area" data-overdirection="full"><div class="wrapper">


</div></section>
<!-- recruit_area -->
</div>
<!-- * -->
<?php the_content(); ?>
</div>
<?php endwhile; endif; ?>
<?php get_footer();