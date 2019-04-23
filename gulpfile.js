/**
 * PROJECT : punkcoder
 * TIME    : 2019/3/8 15:07
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
const gulp = require('gulp');
const uglify = require('gulp-uglify');
const rename = require("gulp-rename");
let cleanCSS = require('gulp-clean-css');


function js()
{
    return gulp.src('assets/js/*.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/vendor/dist/js'));
}

function css()
{
    return gulp.src('assets/css/*.css')
        .pipe(cleanCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/vendor/dist/css'));
}

function watch()
{
    gulp.watch(['assets/js/*.js'], function(cb){
        js();
        cb();
    });

    gulp.watch(['assets/css/*.css'], function(cb){
        css();
        cb();
    });
}

exports.js = js;
exports.css = css;
exports.watch = watch;