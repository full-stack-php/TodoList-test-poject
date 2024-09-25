// Source
var srccss = './resources/assets/css/';
var srcjs = './resources/assets/js/';

// Public compiled
var pubcatalog = './public/assets/';

var pubtpl = 'resources/views/';
var pubcss = pubcatalog + '/css/';
var pubjs = pubcatalog + '/';

// requires
var gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
var browserSync = require('browser-sync').create();
var path = require('path');
var minifyCSS = require('gulp-minify-css');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var minify = require('gulp-minify');
var browserify = require('gulp-browserify');
var order = require('gulp-order');
var replace = require('gulp-replace');
var uglify = require('gulp-uglify');
var dotenv = require('dotenv');
var {exit} = require("browser-sync");

dotenv.config();
// Динамический импорт gulp-autoprefixer
async function loadAutoprefixer() {
    return (await import('gulp-autoprefixer')).default;
}

var hostName = process.env.APP_URL;

// Tasks
gulp.task('dev', function () {
    browserSync.init({
        proxy: hostName,
        port: 3000,
        notify: false,
        open: true,
        ui: false
    });

    gulp.watch(srccss + '**/*.scss', gulp.parallel(['dev-sass'])).on('change', browserSync.reload);
    gulp.watch(srcjs + '**/*.js', gulp.parallel(['min-js'])).on('change', browserSync.reload);
    gulp.watch(pubtpl + '*.blade.php').on('change', browserSync.reload);
});

// Minify JS
gulp.task('min-js', function () {
    return gulp.src([srcjs + '*.js'])
        .pipe(minify({
            noSource: true
        }))
        .pipe(concat('main.js'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(pubjs));
});

// Minify CSS
gulp.task('min-css', async function () {
    const autoprefixCSS = await loadAutoprefixer();

    return gulp.src([pubcss + '*.css'])
        .pipe(concat('style.css'))
        .pipe(autoprefixCSS())
        .pipe(minifyCSS())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(pubcss));
});

// SCSS build dev
gulp.task('dev-sass', async function () {
    const autoprefixCSS = await loadAutoprefixer();

    return gulp.src([srccss + 'style.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixCSS())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(pubcss));
});

// SCSS build production
gulp.task('pub-sass', async function () {
    const autoprefixCSS = await loadAutoprefixer();

    return gulp.src([srccss + 'style.scss'])
        .pipe(sass.sync({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(pubcss));
});

gulp.task('min-all', gulp.parallel('min-css', 'min-js'));
