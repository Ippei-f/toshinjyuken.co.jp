const browsersync = require("browser-sync").create();
const gulp = require("gulp");
const phpConnect = require("gulp-connect-php");
const sass = require("gulp-sass")(require("sass"));
const sourcemaps = require("gulp-sourcemaps");

const paths = {
	scssEntry: "src/kodate/contents/wp-content/themes/toshinjyuken/assets/scss/index.scss",
	scssWatch: "src/kodate/contents/wp-content/themes/toshinjyuken/assets/scss/**/*.scss",
	cssDest: "src/kodate/contents/wp-content/themes/toshinjyuken/assets/css",
	reloadFiles: ["src/**/*.php", "src/**/*.html", "src/**/*.js", "src/**/*.css"],
};

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

function css() {
	return gulp.src(paths.scssEntry).pipe(sourcemaps.init()).pipe(sass().on("error", sass.logError)).pipe(sourcemaps.write("../maps")).pipe(gulp.dest(paths.cssDest)).pipe(browsersync.stream());
}

function watchFiles() {
	gulp.watch(paths.reloadFiles, browserSyncReload);
	gulp.watch(paths.scssWatch, css);
}

const dev = gulp.parallel(connectsync, watchFiles);

exports.css = css;
exports.default = dev;
