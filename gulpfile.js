var gulp = require('gulp')
var stylus = require('gulp-stylus')
var sourcemaps = require('gulp-sourcemaps')
var concat = require('gulp-concat')
var uglify = require('gulp-uglify')
var minify = require('gulp-minify')
var minifyCSS = require('gulp-minify-css')
var jsmin = require('gulp-jsmin')
var rename = require('gulp-rename')
var imagemin = require('gulp-imagemin')

gulp.task('default',['watch:all'])

gulp.task('watch:all',[
  'styles',
  'main:js',
  'auction:js',
  'snatchTreasure:js',
  'auction:js'
  ],function(){
    gulp.watch(['src/styl/main.styl',
                'src/styl/commonStyl/*.styl',
                'src/styl/privateStyl/*.styl'],
                function(){
                  gulp.start('styles')
                })

    gulp.watch(['src/js/vendor/core.js',
                'src/js/vendor/clipher-core.js',
                'src/js/vendor/enc-base64.js',
                'src/js/vendor/aes.js',
                'src/js/app.js'],function(){
                  gulp.start('main:js')
                })

    gulp.watch(['src/js/private/auction.js'],
                function(){
                  gulp.start('auction:js')
                })

    gulp.watch(['src/js/private/snatchTreasure.js'],
                function(){
                  gulp.start('snatchTreasure:js')
                })

  })

gulp.task('styles',function(){
  gulp.src(['src/styl/main.styl'])
    .pipe(stylus({'include css':true}))
    .pipe(minifyCSS({keepSpecialComments:1}))
    .pipe(gulp.dest('build/'))
})

gulp.task('main:js',function(){
  gulp.src(['src/js/vendor/core.js',
            'src/js/vendor/clipher-core.js',
            'src/js/vendor/enc-base64.js',
            'src/js/vendor/aes.js',
            'src/js/app.js'])
  .pipe(concat('main.js'))
  .pipe(jsmin())
  .pipe(rename({suffix:'.min'}))
  .pipe(gulp.dest('build'))
})

gulp.task('auction:js',function(){
  gulp.src(['src/js/private/auction.js'])
   .pipe(jsmin())
    .pipe(rename({suffix:'.min'}))
    .pipe(gulp.dest('build/js/'))
})

gulp.task('snatchTreasure:js',function(){
  gulp.src['src/js/private/snatchTreasure.js']
  .pipe(jsmin())
  .pipe(rename({suffix:'.min'}))
  .pipe(gulp.dest('build/js/'))
})