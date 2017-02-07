/*
 * Packages needed
 */
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

/*
 * Paths
 */
var assetsPath = './resources/assets/',
    publicPath = './public/';

/*
 * Default Task
 */
gulp.task('default', [
    'app-css',
    'app-js',
]);

/*
 * App Stylesheet
 */
gulp.task('app-css', function () {
    return gulp.src(assetsPath+'sass/app.scss')
        .pipe(sass({
            outputStyle: 'nested',
            precison: 3,
            includePaths: [
                './node_modules/bootstrap-sass/assets/stylesheets',
            ]
        }).on('error', sass.logError))
        .pipe(cleanCSS({ advanced : true }))
        .pipe(gulp.dest(publicPath+'css/'));
});

/*
 * App Javascript
 */
gulp.task('app-js', function () {
    // returns a Node.js stream, but no handling of error messages
    return gulp.src([
        'node_modules/vue/dist/vue.js',
        'node_modules/masonry-layout/dist/masonry.pkgd.min.js',
        assetsPath +'js/app.js',
    ])
        .pipe(uglify())
        .pipe(concat('app.min.js'))
        .pipe(gulp.dest(publicPath + 'js/'));
});