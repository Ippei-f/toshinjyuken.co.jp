<!--<?php if (!is_home() && !is_front_page()) : ?>-->
<?php if (!is_page(array('form', 'thanks', 'session', 'job', 'job_test'))) : ?>
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
<?php endif; ?>
<!--<?php endif; ?>-->
<?php if (!is_front_page()): ?>
  </div>
<?php endif; ?>
</main>

<footer>
  <div class="info">
    <div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" alt="東新住建" width="166" height="32" /></div>
    <p class="tel"><?php date_default_timezone_set('Asia/Tokyo'); ?>
      <?php if (date('Y-m-d H:i:s') < '2022-09-26 00:00:00') : ?>
        <a href="tel:0587234651">TEL.0587-23-4651</a><?php else: ?><a href="tel:0120941077">TEL.0120-941-077</a><?php endif ?><br class="sp">
      <strong>(人事直通)</strong><br>
      【営業時間】9時〜18時 　【定休日】土日祝
    </p>
    <address>
      <span class="bold">＜JPオフィス＞</span><br>
      〒450-6321 名古屋市中村区名駅1-1-1 JPタワー名古屋21階（名古屋駅前支店）<br>
      <span class="bold">＜本社＞</span><br>
      〒492-8628 愛知県稲沢市高御堂一丁目3-18(稲沢本店)<br><br>
    </address>
    <p>宅地建物取引業免許：国土交通大臣（4）7873号<br>
      特定建設業許可：愛知県知事許可（特－4）第61271号<br>
      （公社）愛知県宅地建物取引業協会会員　東海不動産取引協議会加盟</p>
  </div>
  <nav class="fnavi">
    <ul>
      <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
      <li><a href="<?php echo home_url(); ?>/news/">NEWS</a></li>
      <li><a href="<?php echo home_url(); ?>/crew/">社員紹介</a></li>
      <li><a href="<?php echo home_url(); ?>/compass/">行動指針・事業紹介</a></li>
      <li><a href="<?php echo home_url(); ?>/discovery/">事業戦略</a></li>
      <li><a href="https://www.toshinjyuken.co.jp/sdgs/" target="_blank" rel="noopener noreferrer">SDGs</a></li>
      <li><a href="<?php echo home_url(); ?>/job/">募集要項</a></li>
      <li><a href="<?php echo home_url(); ?>/form/">エントリー</a></li>
      <li><a href="https://www.tson.co.jp/" target="_blank" rel="noopener noreferrer">グループ会社[株式会社 TSON]</a></li>
      <?php
      /*
<li><a href="https://tson-funding.jp/" target="_blank" rel="noopener noreferrer">関連会社</a></li>
*/
      ?>
    </ul>
  </nav>
  <p class="copy">Copyright (C) TOSHIN JYUKEN All Rights Reserved.</p>
</footer>
</div><!--id="container">-->

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
<?php if (is_front_page()): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollify.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/easings.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>
<?php else: ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/pages.js"></script>
<?php endif; ?>
<?php if (is_page('crew')) : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modaal.min.js"></script>
<?php endif; ?>
<?php if (!is_home()) : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scrollreveal.min.js"></script>
  <script>
    ScrollReveal().reveal('.front', {
      delay: 300,
      duration: 1600,
      origin: 'front',
      reset: false,
      mobile: true
    });
  </script>
<?php endif; ?>
<?php if (is_page('job')) : ?>
  <script type="text/javascript">
    $(window).scroll(function() {
      const documentHeight = $(document).height();
      const windowHeight = $(window).height();
      const fadeOutPoint = documentHeight - windowHeight - 50; // 50は最下部からの距離
      const scrollAmount = $(window).scrollTop();
      if (scrollAmount >= fadeOutPoint) {
        $('.floating-banner').fadeOut(300); // フェードアウトの速度
      } else {
        $('.floating-banner').fadeIn(300); // フェードインの速度
      }
    });
  </script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>