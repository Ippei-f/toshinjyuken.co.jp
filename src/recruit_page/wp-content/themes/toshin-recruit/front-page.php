<?php
get_header(); ?>

<!--<main id="contents">-->
<div class="floating">
    <ul>
      <li><a href="<?php echo home_url(); ?>/job/#New_graduate">新&nbsp;卒&nbsp;採&nbsp;用</a></li>
      <li><a href="<?php echo home_url(); ?>/job/#Career">キャリア採用</a></li>
      <li><a href="#top"><img src="<?php echo get_template_directory_uri(); ?>/images/top/img_page_top.png" alt="PAGE TOP"/></a></li>
    </ul>
</div>
    <section id="mainvisual" class="fullscreen">
      <div class="video">
        <video webkit-playsinline playsinline muted autoplay loop>
          <source src="<?php echo get_template_directory_uri(); ?>/images/top/top_movie01.mp4">
        </video>
      </div>
      <p class="ttl"><strong>Innovation</strong>を起こす<br>
          <strong>only&nbsp;1&nbsp;</strong>企業へ。</p>
      <ul>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/top/ic_main01.svg" alt=""><br>創業<?php echo floor((date('Ymd')-19750819)/10000); ?>年目</li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/top/ic_main02.svg" alt=""><br>24,000棟の<br>
        実績</li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/top/ic_main03.svg" alt=""><br>全国No.1事業の<br>
拡大</li>
      </ul>
      <p>scroll<br>
      <svg width="24.41" height="45.85" viewBox="0 0 24.41 45.85"><polygon class="cls-1" points="24.41 0 12.21 12.21 0 0 24.41 0"/><polygon class="cls-1" points="24.41 16.82 12.21 29.03 0 16.82 24.41 16.82"/><polygon class="cls-1" points="24.41 33.64 12.21 45.85 0 33.64 24.41 33.64"/></svg>
      </p>
    </section>
    <section id="about" class="fullscreen">
      <div class="video">
        <video webkit-playsinline playsinline muted autoplay loop>
          <source src="<?php echo get_template_directory_uri(); ?>/images/top/top_movie02.mp4">
        </video>
      </div>
        
        <p class="ttl"><strong>創造</strong>と<strong>想像</strong>の<strong>旅へ。</strong></p>
        <p>たくさんの夢や希望、<br>
          ときに野望を乗せてブルーオーシャンを突き進む<br>
          東新住建という一隻の船。<br><br>
          目の前に広がる大海原から<br>
          何を見つけ出し、どう磨き上げるか<br>
          東新住建はこれまでの住宅のありかたを再定義し<br>
          新たな価値を想像し、創造する<br>
          その視点・実現力は唯一無二。</p>
        <div class="news">
          <h2>News</h2>
          <?php
			$my_query = new WP_Query(
			array(
			'paged' => $paged,
			'post_type'      => 'post',
			'posts_per_page' => 3,
			)
			);
          ?>
			
          <?php if ( $my_query ->have_posts()): ?>
          <dl>
          <?php while ( $my_query ->have_posts()) : $my_query ->the_post();
						$category = get_the_category();
						$cat_name = $category[0]->cat_name; ?>
            <dt><?php the_time('Y/m/d'); ?></dt>
            <dd><a href="<?php echo home_url(); ?>/news/<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></dd>
			<?php endwhile;?>  
          </dl>
          <?php endif; ?>
        </div>
        <div class="btn"><a href="<?php echo home_url(); ?>/news/">More</a></div>
<!--        <div class="online"><a href="<?php echo home_url(); ?>/session/">2024年度新卒採用 オンライン説明会開催</a></div>-->
    </section>
    <div class="linewrap">
    <section id="ideal" class="fullscreen" data-section-name="ideal">
      <div class="video">
        <video webkit-playsinline playsinline muted autoplay loop>
          <source src="<?php echo get_template_directory_uri(); ?>/images/top/top_movie03.mp4">
        </video>
      </div>
      <p class="ttl">「ほしいものを、つくります」</p>
      <p>そのスローガンのもと、理想を追求し進み続ける<br>
        東新住建の大航海。<br>
        その航跡を一緒にたどってみましょう。</p>
    </section>
    <section id="crew" class="fullscreen" data-section-name="crew">
      <div class="img">
      <picture>
      <source media="(max-width:960px)" srcset="<?php echo get_template_directory_uri(); ?>/images/top/img_crew_sp.jpg">
        <img src="<?php echo get_template_directory_uri(); ?>/images/top/img_crew.jpg" alt="" width="735" height="450"/>
      </picture>
      </div>
<a href="<?php echo home_url(); ?>/crew/">
      <h2>社員紹介</h2>
      <p>遙かなる旅路を<br class="tabhide">ともにする仲間たち</p>
</a>
    </section>
    <section id="compass" class="fullscreen" data-section-name="compass">
      <div class="img">
      <picture>
      <source media="(max-width:960px)" srcset="<?php echo get_template_directory_uri(); ?>/images/top/img_compass_sp.jpg">
        <img src="<?php echo get_template_directory_uri(); ?>/images/top/img_compass.jpg" alt="" width="735" height="450"/>
      </picture>
      </div>
<a href="<?php echo home_url(); ?>/compass/">
      <h2>行動指針・事業紹介</h2>
      <p>チームをひとつにする羅針盤</p>
</a>
    </section>
    <section id="discovery" class="fullscreen" data-section-name="discovery">
      <div class="img">
      <picture>
      <source media="(max-width:960px)" srcset="<?php echo get_template_directory_uri(); ?>/images/top/img_discovery_sp.jpg">
        <img src="<?php echo get_template_directory_uri(); ?>/images/top/img_discovery.jpg" alt="" width="735" height="450"/>
      </picture>
      </div>
<a href="<?php echo home_url(); ?>/discovery/">
      <h2>事業戦略</h2>
      <p>独自に開拓したニーズや市場</p>
</a>
    </section>
    <section id="sdgs" class="fullscreen" data-section-name="sdgs">
      <div class="img">
      <picture>
      <source media="(max-width:960px)" srcset="<?php echo get_template_directory_uri(); ?>/images/top/img_sdgs_sp.jpg">
        <img src="<?php echo get_template_directory_uri(); ?>/images/top/img_sdgs.jpg" alt="" width="735" height="450"/>
      </picture>
      </div>
<a href="https://www.toshinjyuken.co.jp/sdgs/" target="_blank">
      <h2>持続可能化社会への取り組み</h2>
      <p>次世代へのバトンリレー。<br>
        住宅ベンチャーとして<br class="tabhide">果たすべき役割</p>
</a>
    </section>
    <div class="scroll">
        <div class="line"></div>
      </div>
    </div>
    <section id="recruit" class="fullscreen" data-section-name="recruit">
      <div class="video">
        <video webkit-playsinline playsinline muted autoplay loop>
          <source src="<?php echo get_template_directory_uri(); ?>/images/top/top_movie04.mp4">
        </video>
      </div>
      <p class="ttl">この先は、<br class="tab">まだ誰も知らない新世界。</p>
      <p>どんな想いも、動き出さなければ形にならない。<br>
        ひとりで向かう未来より<br>
        仲間と一緒なら、もっと面白い未来に。</p>
      <p>まだ見たことのない世界へ、さあ、共に。</p>
      <ul>
        <li><a href="<?php echo home_url(); ?>/job/">募集要項</a></li>
        <li><a href="<?php echo home_url(); ?>/form/">ENTRY</a></li>
      </ul>
      <!--<div class="online"><a href="<?php echo home_url(); ?>/session/">2024年度新卒採用 オンライン説明会開催</a></div>-->
    </section>
<!--</main>-->

<?php get_footer(); ?>