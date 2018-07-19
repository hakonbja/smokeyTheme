'use strict';

//Load plugins
  var gulp    = require('gulp'),
      sass    = require('gulp-sass'),
      browserSync = require('browser-sync').create(),
      //gulpIf = require('gulp-if')
      cssnano = require('gulp-cssnano'),
      cache = require('gulp-cache');



//Supported browsers for cssnano Autoprefix
var supported = [
  'last 2 versions',
  'safari >= 8',
  'ie >= 10',
  'ff >= 20',
  'ios 6',
  'android 4'
];

//Basic gulp task
gulp.task('task-name', ['array of tasks to complete before "task-name" runs'], function() {
  // Stuff here
});

//Compiles SASS into CSS
gulp.task('sass', function() {
  return gulp.src("assets/css/style.scss")
    .pipe(sass())
    .pipe(cssnano({
      autoprefixer: {browsers: supported, add: true}
    }))
    .pipe(gulp.dest(""))
    .pipe(browserSync.stream());
});

gulp.task('clearCache', function() {
  cache.clearAll()
});

gulp.task('serve', function() {
  browserSync.init({
    proxy: "http://localhost/smokeyfeet/",
    browser: "chrome"
  });
  gulp.watch("assets/css/*.scss", ['sass', 'clearCache']);
  gulp.watch('*.php').on('change', browserSync.reload);
  gulp.watch("assets/js/**/*.js").on('change', browserSync.reload);
  gulp.clearCache;
});



gulp.task('default', ['serve']);
