// /js/mw-char-counter.js
document.addEventListener("DOMContentLoaded", () => {
	const selector = "textarea.js-charcount";
	const textareas = document.querySelectorAll(selector);

	textareas.forEach((ta) => {
		// 上限は data-max > maxlength > デフォルト300 の優先順
		const max = Number(ta.dataset.max) || Number(ta.getAttribute("maxlength")) || 300;

		// HTML 側に無ければ maxlength を付与（物理的に入力制限）
		if (!ta.hasAttribute("maxlength")) {
			ta.setAttribute("maxlength", String(max));
		}

		// カウンター要素を直後に挿入
		const counter = document.createElement("div");
		counter.className = "char-remaining";
		counter.setAttribute("aria-live", "polite");
		ta.insertAdjacentElement("afterend", counter);

		// 絵文字も考慮した文字数カウント
		const countChars = (s) => [...s].length;

		const update = () => {
			const used = countChars(ta.value);
			const remain = Math.max(0, max - used);
			counter.textContent = `残り ${remain} 文字（${used}/${max}）`;

			// 超過アラート（多重発火防止）
			if (used > max && !ta.dataset.over) {
				alert(`入力可能文字数（${max}文字）を超えています。`);
				ta.dataset.over = "1";
			}
			if (used <= max && ta.dataset.over) {
				delete ta.dataset.over;
			}
		};

		ta.addEventListener("input", update);

		// ▼ 追加：paste 時に長文チェック
		ta.addEventListener("paste", (event) => {
			const pasteText = event.clipboardData.getData("text");
			const current = [...ta.value].length;
			const pasteCount = [...pasteText].length;

			// 貼り付け後に max を超えるか？
			if (current + pasteCount > max) {
				alert(`入力可能文字数（${max}文字）を超えています。`);
				event.preventDefault(); // 貼り付け禁止
			}
		});

		update(); // 初期表示
	});

	/**
	 * ▼ MW WP Form の「確認画面へ進む」submit をチェック
	 */
	document.querySelectorAll("form.mw_wp_form").forEach((form) => {
		form.addEventListener("submit", (e) => {
			let hasError = false;

			textareas.forEach((ta) => {
				const max = Number(ta.dataset.max) || Number(ta.getAttribute("maxlength")) || 300;
				const used = [...ta.value].length;

				if (used > max) {
					hasError = true;
					alert(`「${ta.name}」は${max}文字以内で入力してください。`);
				}
			});

			if (hasError) {
				e.preventDefault();
				e.stopPropagation();
			}
		});
	});
});
