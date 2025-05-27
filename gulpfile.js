const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const sourcemaps = require("gulp-sourcemaps");
const browserSync = require("browser-sync").create();
const header = require("gulp-header");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
const concat = require("gulp-concat");

// WordPress-Header
const themeHeader = `/*
Theme Name: VDKG Theme
Description: Ein individuelles Child Theme basierend auf Hello Elementor. Enthält ein Gulp-Setup mit SCSS und JavaScript.
Author: Matthias Seidel
Author URI: https://www.doryo.de
Template: hello-elementor
Version: 1.0.0
Text Domain: vdkg-theme
License: GNU General Public License v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Tags: custom, responsive, modern, vite, scss, javascript
*/\n`;

// Pfade
const paths = {
  scssWatch: "./src/scss/**/*.scss",
  scssEntry: "./src/scss/styles.scss",
  js: "./src/js/**/*.js",
  cssOutput: "./wp-content/themes/vdkg-theme/",
  jsOutput: "./wp-content/themes/vdkg-theme/",
  php: "../wp-content/themes/**/*.php",
};

// SCSS kompilieren
function compileSCSS() {
  return gulp
    .src(paths.scssEntry)
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(header(themeHeader))
    .pipe(rename("style.css"))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest(paths.cssOutput))
    .pipe(browserSync.stream());
}

// JavaScript verarbeiten
function processJS() {
  return gulp
    .src(paths.js)
    .pipe(sourcemaps.init())
    .pipe(concat("app.js")) // Alle JS-Dateien zusammenführen
    .pipe(uglify()) // Minifizieren
    .pipe(sourcemaps.write(".")) // Source-Map erstellen
    .pipe(gulp.dest(paths.jsOutput)) // In das Theme-Root schreiben
    .pipe(browserSync.stream());
}

// BrowserSync starten
function serve() {
  browserSync.init({
    proxy: "http://localhost:8000", // WordPress local dev URL
    open: false,
    port: 5173,
  });

  // Dateien beobachten
  gulp.watch(paths.scssWatch, compileSCSS);
  gulp.watch(paths.js, processJS);
  gulp.watch(paths.php).on("change", browserSync.reload);
}

// Standard-Task
exports.default = gulp.series(gulp.parallel(compileSCSS, processJS), serve);