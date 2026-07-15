const browsersync = require("browser-sync").create();
const gulp = require("gulp");
const phpConnect = require("gulp-connect-php");
const sass = require("gulp-sass")(require("sass"));
const sourcemaps = require("gulp-sourcemaps");

const paths = {
	main: {
		scssEntry: "src/kodate/contents/wp-content/themes/toshinjyuken/assets/scss/index.scss",
		scssWatch: "src/kodate/contents/wp-content/themes/toshinjyuken/assets/scss/**/*.scss",
		cssDest: "src/kodate/contents/wp-content/themes/toshinjyuken/assets/css",
	},

	halforder: {
		scssEntry: "src/kodate/halforder/assets/scss/index.scss",
		scssWatch: "src/kodate/halforder/assets/scss/**/*.scss",
		cssDest: "src/kodate/halforder/assets/css",
	},

	reloadFiles: ["src/**/*.php", "src/**/*.html", "src/**/*.js", "src/**/*.css"],
};

function cssMain() {
	return gulp.src(paths.main.scssEntry).pipe(sourcemaps.init()).pipe(sass().on("error", sass.logError)).pipe(sourcemaps.write("../maps")).pipe(gulp.dest(paths.main.cssDest)).pipe(browsersync.stream());
}

function cssHalforder() {
	return gulp.src(paths.halforder.scssEntry).pipe(sourcemaps.init()).pipe(sass().on("error", sass.logError)).pipe(sourcemaps.write("../maps")).pipe(gulp.dest(paths.halforder.cssDest)).pipe(browsersync.stream());
}

const css = gulp.parallel(cssMain, cssHalforder);

function connectsync(done) {
	phpConnect.server(
		{
			port: 8000,
			keepalive: true,
			base: "src",
		},
		function () {
			browsersync.init({
				proxy: "127.0.0.1:8000",
				notify: false,
			});

			done();
		},
	);
}

function browserSyncReload(done) {
	browsersync.reload();
	done();
}

function watchFiles() {
	gulp.watch(paths.reloadFiles, browserSyncReload);
	gulp.watch(paths.main.scssWatch, cssMain);
	gulp.watch(paths.halforder.scssWatch, cssHalforder);
}

const dev = gulp.parallel(connectsync, watchFiles);

exports.css = css;
exports.default = dev;
