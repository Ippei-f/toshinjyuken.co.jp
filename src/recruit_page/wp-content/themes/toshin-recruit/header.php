<!doctype html>
<html lang="ja">

<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-K7Z9WB0EM8"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'G-K7Z9WB0EM8');
	</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-3NK5ZGJT89"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-3NK5ZGJT89');
	</script>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- VIEWPORT -->
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1">
	<meta name="format-detection" content="telephone=no">

	<!-- ICON -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/common/favicon.ico">
	<link rel="apple-touch-icon" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/common/apple-touch-icon.png">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
	<?php if (is_front_page()): ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css">
	<?php else: ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages.css">
	<?php endif; ?>
	<?php if (is_page('crew')) : ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/modaal.min.css">
	<?php endif; ?>

	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700&family=Noto+Serif+JP:wght@500;600&display=swap" rel="stylesheet">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-PRRJRDR');
	</script>
	<!-- End Google Tag Manager -->

	<?php wp_head(); ?>
</head>

<?php global $body_id;
if (is_page("job-2")): ?>

	<body id="Job" class="pages">
	<?php elseif (is_page("form-2")): ?>

		<body id="Form" class="pages">
		<?php elseif (is_page("crew-2")): ?>

			<body id="Crew" class="pages">
			<?php elseif (!empty($body_id)): ?>
				<body<?php echo " id=\"{$body_id}\""; ?> class="pages">
				<?php elseif (is_front_page()): ?>

					<body>
					<?php endif; ?>

					<!-- Google Tag Manager (noscript) -->
					<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PRRJRDR"
							height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
					<!-- End Google Tag Manager (noscript) -->

					<div id="container">
						<header>
							<?php if (is_front_page()): ?>
								<h1 class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo_head.svg" alt="住宅ベンチャー東新住建［公式採用サイト］" width="166" height="32" /></a></h1>
							<?php else: ?>
								<div class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo_head.svg" alt="住宅ベンチャー東新住建［公式採用サイト］" width="166" height="32" /></a></div>
							<?php endif; ?>
							<div class="menu"><span></span><span></span><span></span></div>
							<nav class="gnavi">
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
						</header>

						<?php if (is_front_page()): ?>
							<main id="contents">
							<?php else: ?>
								<main>
								<?php endif; ?>

								<?php if (!is_home() && !is_front_page()) : ?>
									<div class="overlay"></div>
								<?php endif; ?>