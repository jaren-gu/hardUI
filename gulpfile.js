var gulp = require('gulp')
var jshint = require('gulp-jshint')
var sass = require('gulp-sass')
var concat = require('gulp-concat')
var uglify = require('gulp-uglify')
var rename = require('gulp-rename')

/**
 *  check scripts
 *  检查脚本
 */
gulp.task('lint', function () {
    gulp.src('./js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
})

/**
 * compile sass
 *  编译 sass
 */
gulp.task('sass', function () {
    gulp.src('./scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('./css'))
})

/**
 * compress scripts
 * 合并脚本
 */
gulp.task('scripts', function () {
    gulp.src('./js/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('./dist'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist'))
})

/**
 *  default task
 *  默认任务
 */
gulp.task('default', function () {
    gulp.run('lint', 'sass', 'scripts')

    // watching the files
    gulp.watch('./js/*.js', function () {
        gulp.run('lint', 'sass', 'scripts')
    })
})