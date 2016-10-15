'use strict'

var gulp = require('gulp')
var jshint = require('gulp-jshint')
var sass = require('gulp-sass')
var concat = require('gulp-concat')
var uglify = require('gulp-uglify')
var rename = require('gulp-rename')
var autoprefixer = require('gulp-autoprefixer')
var minicss = require('gulp-minify-css')

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
 * compress scripts
 * 合并脚本
 */
gulp.task('concatjs', function () {
    gulp.src('./js/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('./dist/js'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js'))
})

/**
 * compile sass
 *  编译 sass
 */
gulp.task('sass', function () {
    gulp.src('./scss/*.scss', { base: 'src' })
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(gulp.dest('./dist/css'))
        .pipe(concat('all.css'))
        .pipe(gulp.dest('./dist/css'))
        .pipe(minicss())
        .pipe(rename('all.min.css'))
        .pipe(gulp.dest('./dist/css'))
})

/**
 *  default task
 *  默认任务
 */
gulp.task('default', function () {
    gulp.run('lint', 'concatjs', 'sass')

    // watching the files
    gulp.watch('./js/*.js', function () {
        gulp.run('lint', 'concatjs')
    })

    gulp.watch('./scss/*.scss', function () {
        gulp.run('sass')
    })
})