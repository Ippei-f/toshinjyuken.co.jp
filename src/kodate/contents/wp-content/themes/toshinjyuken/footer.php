		<!-- /ここから FOOTER -->

		<div class="footer-contact">
			<div class="footer-contact-flex">
				<div class="tel">
					<div class="txt">お電話でのお問い合わせはこちら</div>
					<div class="number">
						<a href="tel:0800-170-5104"><img src="<?php echo esc_url(KODATE_ASSETS); ?>images/top/bnr/bnr-tel-gray.svg" /></a>
					</div>
					<div class="time">営業時間／10:00～18:00　定休日／水曜日</div>
				</div>
				<div class="line">
					<div class="txt">LINEでのお問合せはこちら</div>
					<div class="bnr">
						<a href="https://lin.ee/v4vz5KD" target="_blank">
							<img src="<?php echo esc_url(KODATE_ASSETS); ?>images/contact/line-bnr.svg" alt="LINE公式アカウント" />
						</a>
					</div>
				</div>
			</div>

			<div class="top_search">
				<div class="btnbox num1">
					<a href="../contact.php" class="btn_bgLtoR colO pc_br_del">
						<div>
							<span>資料請求・お問い合わせ</span><svg xmlns="http://www.w3.org/2000/svg" class="arrow-btn" viewBox="0 0 21.77 11.86">
								<defs>
									<style>
										.arrow-btn_1,
										.arrow-btn_2 {
											fill: none;
										}

										.arrow-btn_1 {
											stroke-miterlimit: 10;
										}
									</style>
								</defs>
								<polyline class="arrow-btn_1" points="0 5.43 20 5.43 11.88 0.43" />
								<rect class="arrow-btn_2" width="21.77" height="11.86" />
							</svg>
						</div>
					</a>
				</div>
			</div>
		</div>

		<!-- ** -->

		<footer class="l-footer">
			<div class="l-footer-inner">
				<div class="l-footer-upper">
					<div class="l-footer-flex">
						<!-- ロゴ -->
						<div class="l-footer__logo">
							<a href="../index.php" class="logo"><img src="<?php echo esc_url(KODATE_ASSETS); ?>images/common/logo-2025.svg" /></a>
						</div>

						<!-- ナビメニュー -->
						<nav class="fnav">
							<ul class="fnav__list">
								<li class="fnav__item"><a href="../index.php">ホーム</a></li>
								<li class="fnav__item"><a href="../search.php">物件情報</a></li>
								<li class="fnav__item"><a href="../news.php">NEWS</a></li>
								<li class="fnav__item"><a href="../structure.php">東新住建の家づくり</a></li>
							</ul>

							<ul class="fnav__list">
								<li class="fnav__item"><a href="../index.php#brand">ブランドコンセプト</a></li>
								<li class="fnav__item"><a href="../bunjo-halforder.php" target="_blank">インテリアセレクト / ハーフオーダー</a></li>
								<li class="fnav__item"><a href="../sdgs.php">SDGsへの取り組み</a></li>
								<li class="fnav__item"><a href="../qa.php">Q&A</a></li>
							</ul>

							<ul class="fnav__list">
								<li class="fnav__item"><a href="../voice.php">お客様の声</a></li>
								<li class="fnav__item"><a href="../lifestyle.php">コラム</a></li>
								<li class="fnav__item"><a href="../member.php">会員登録</a></li>
								<li class="fnav__item"><a href="../contact.php">資料請求・お問い合わせ</a></li>
							</ul>
						</nav>
					</div>

					<!-- SNS -->
					<div class="l-footer__sns">
						<ul>
							<li class="insta">
								<a href="https://www.instagram.com/toshinjyuken_no_ie/" target="_blank"><img src="<?php echo esc_url(KODATE_ASSETS); ?>images/common/icon-insta-gray.svg" /></a>
							</li>
							<li class="youtube">
								<a href="https://www.youtube.com/@toshinjyuken_house" target="_blank"><img src="<?php echo esc_url(KODATE_ASSETS); ?>images/common/icon-youtube-gray.svg" /></a>
							</li>
							<li class="line">
								<a href="https://lin.ee/v4vz5KD" target="_blank"><img src="<?php echo esc_url(KODATE_ASSETS); ?>images/common/icon-LINE-gray.svg" /></a>
							</li>
						</ul>
					</div>
				</div>

				<!-- 下段 -->
				<div class="l-footer-lower">
					<div class="l-footer__logo2">
						<a href="https://www.toshinjyuken.co.jp/" target="_blank" target="_blank" class="toushin"><img src="<?php echo esc_url(KODATE_ASSETS); ?>images/common/logo-toushin-2024-K.svg" /></a>
					</div>
					<div class="copyright">Copyright (C) TOSHIN JYUKEN All Rights Reserved.</div>
				</div>
			</div>
		</footer>
		<div id="pagebottom_btn">
			<a href="#pt"><img src="<?php echo esc_url(KODATE_ASSETS); ?>images/common/btn-submenu-pagetop.svg" /></a>
		</div>
		<!-- * -->
		</div>

		<?php wp_footer(); ?>

		<script>
			document.addEventListener("DOMContentLoaded", function() {
				const modal = document.getElementById("galleryModal");
				const modalImage = document.getElementById("modalImage");
				const modalIcon = document.getElementById("modalIcon");
				const modalText = document.getElementById("modalText");
				const modalCurrent = document.getElementById("modalCurrent");
				const modalTotal = document.getElementById("modalTotal");

				const prevBtn = document.querySelector(".modal__prev");
				const nextBtn = document.querySelector(".modal__next");
				const closeBtn = document.querySelector(".modal__close");
				const openButtons = Array.from(document.querySelectorAll(".openModal"));
				const overlay = document.querySelector(".modal__overlay");

				if (!modal || !modalImage || !modalIcon || !modalText || !modalCurrent || !modalTotal) return;
				if (!prevBtn || !nextBtn || !closeBtn || openButtons.length === 0) return;

				const items = openButtons.map((btn, index) => {
					const thumbImage = btn.querySelector(".img img");
					const iconImage = btn.querySelector(".icon img");

					return {
						image: btn.dataset.image || "",
						icon: btn.dataset.icon || "",
						iconClass: btn.dataset.iconClass || iconImage?.className || "",
						text: btn.dataset.text || "",
						alt: thumbImage?.alt || "",
						index: index,
					};
				});

				let currentIndex = 0;

				function updateModal(index) {
					const item = items[index];
					if (!item) return;

					currentIndex = index;

					// 画像
					modalImage.src = item.image;
					modalImage.alt = item.alt;

					// アイコン画像
					modalIcon.src = item.icon;
					modalIcon.alt = "";

					// modalIcon の class を付け替え
					// idは消さず、classだけ初期化したいので className を空にする
					modalIcon.className = "";

					if (item.iconClass) {
						item.iconClass
							.split(" ")
							.filter(Boolean)
							.forEach(function(cls) {
								modalIcon.classList.add(cls);
							});
					}

					// テキスト
					modalText.textContent = item.text;

					// 件数表示
					modalCurrent.textContent = index + 1;
					modalTotal.textContent = items.length;

					// ボタン制御
					prevBtn.disabled = index === 0;
					nextBtn.disabled = index === items.length - 1;
				}

				function openModal(index) {
					updateModal(index);
					modal.classList.add("is-active");
					modal.setAttribute("aria-hidden", "false");
					document.body.style.overflow = "hidden";
				}

				function closeModal() {
					modal.classList.remove("is-active");
					modal.setAttribute("aria-hidden", "true");
					document.body.style.overflow = "";
				}

				openButtons.forEach(function(btn, index) {
					btn.addEventListener("click", function(e) {
						e.preventDefault();
						openModal(index);
					});
				});

				prevBtn.addEventListener("click", function() {
					if (currentIndex > 0) {
						updateModal(currentIndex - 1);
					}
				});

				nextBtn.addEventListener("click", function() {
					if (currentIndex < items.length - 1) {
						updateModal(currentIndex + 1);
					}
				});

				closeBtn.addEventListener("click", closeModal);

				if (overlay) {
					overlay.addEventListener("click", closeModal);
				}

				modal.addEventListener("click", function(e) {
					if (e.target === modal) {
						closeModal();
					}
				});

				document.addEventListener("keydown", function(e) {
					if (!modal.classList.contains("is-active")) return;

					if (e.key === "Escape") {
						closeModal();
					}

					if (e.key === "ArrowLeft" && currentIndex > 0) {
						updateModal(currentIndex - 1);
					}

					if (e.key === "ArrowRight" && currentIndex < items.length - 1) {
						updateModal(currentIndex + 1);
					}
				});
			});
		</script>

		</body>

		</html>