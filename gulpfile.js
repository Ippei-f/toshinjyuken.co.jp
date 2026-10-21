const { src, dest, watch, series, parallel } = require("gulp");
const browserSync = require("browser-sync").create();
const { spawnSync } = require("child_process");
const path = require("path");
const fs = require("fs");

/* ==================================================
 * 設定（プロジェクトごとにここだけ変更）
 * ================================================== */
const config = {
	// サーバーのドキュメントルート（例: "src"）
	baseDir: "src",

	// BrowserSync のポート（ブラウザで開くURL）
	port: 3000,

	// PHP 内蔵サーバーのポート
	phpPort: 8000,

	// PHP を使うか: true / false / "auto"（php コマンドがあれば使う）
	usePhp: "auto",

	// 変更を監視してリロードするファイル（baseDir からの相対パス）
	watch: ["**/*.{html,php,css,js,json,svg,png,jpg,jpeg,gif,webp}"],

	// 監視から除外するもの
	ignore: ["node_modules/**", ".git/**", "**/*.map"],

	// Sass を使う場合だけ追加（baseDir からの相対パス）
	sass: [
		{
			// メインテーマ（toshinjyuken）
			entry: "kodate/contents/wp-content/themes/toshinjyuken/assets/scss/index.scss",
			watch: "kodate/contents/wp-content/themes/toshinjyuken/assets/scss/**/*.scss",
			dest: "kodate/contents/wp-content/themes/toshinjyuken/assets/css",
		},
		{
			// ハーフオーダー
			entry: "kodate/halforder/assets/scss/index.scss",
			watch: "kodate/halforder/assets/scss/**/*.scss",
			dest: "kodate/halforder/assets/css",
		},
	],

	// ソースマップの出力先（css 出力先からの相対パス）
	sourcemapDir: "../maps",
};

/* ==================================================
 * Sass
 * ================================================== */
// エントリーファイルが存在しない設定は警告してスキップ（起動を止めない）
const sassTargets = config.sass.filter((item) => {
	const entryPath = path.join(config.baseDir, item.entry);
	if (fs.existsSync(entryPath)) return true;
	console.warn(`[sass] ${entryPath} が見つからないのでスキップしました`);
	return false;
});

const sassTasks = sassTargets.map((item, i) => {
	const sass = require("gulp-sass")(require("sass"));
	const sourcemaps = require("gulp-sourcemaps");

	const task = () =>
		src(path.join(config.baseDir, item.entry), { allowEmpty: true })
			.pipe(sourcemaps.init())
			.pipe(sass().on("error", sass.logError))
			.pipe(sourcemaps.write(config.sourcemapDir))
			.pipe(dest(path.join(config.baseDir, item.dest)))
			.pipe(browserSync.stream({ match: "**/*.css" }));

	task.displayName = `sass:${item.entry || i}`;
	return { task, watch: item.watch };
});

const css = sassTasks.length
	? parallel(...sassTasks.map((s) => s.task))
	: function css(done) {
			console.log("[sass] コンパイル対象がないのでスキップしました");
			done();
	  };

/* ==================================================
 * ローカルサーバー
 * ================================================== */
function hasPhp() {
	const result = spawnSync("php", ["-v"], { stdio: "ignore" });
	return result.status === 0;
}

function serve(done) {
	const usePhp = config.usePhp === "auto" ? hasPhp() : config.usePhp;

	if (usePhp) {
		const phpConnect = require("gulp-connect-php");
		phpConnect.server(
			{
				base: config.baseDir,
				port: config.phpPort,
				keepalive: true,
			},
			() => {
				browserSync.init({
					proxy: `127.0.0.1:${config.phpPort}`,
					port: config.port,
					notify: false,
				});
				console.log(`[server] PHP モードで起動しました（root: ${config.baseDir}）`);
				done();
			},
		);
	} else {
		browserSync.init(
			{
				server: { baseDir: config.baseDir, directory: true },
				port: config.port,
				notify: false,
			},
			() => {
				console.log(`[server] 静的サーバーで起動しました（root: ${config.baseDir}）`);
				done();
			},
		);
	}
}

/* ==================================================
 * 監視 & リロード
 * ================================================== */
function watchFiles(done) {
	const globs = [...config.watch, ...config.ignore.map((g) => "!" + g)];

	watch(globs, { cwd: config.baseDir }).on("all", (event, file) => {
		if (!["change", "add", "unlink"].includes(event)) return;

		if (file.endsWith(".css")) {
			// CSS はページを再読み込みせずに差し替え
			browserSync.reload("*.css");
		} else {
			browserSync.reload();
		}
	});

	sassTasks.forEach((s) => watch(s.watch, { cwd: config.baseDir }, s.task));

	done();
}

/* ==================================================
 * Exports
 * ================================================== */
exports.css = css;
exports.default = series(css, parallel(serve, watchFiles));
