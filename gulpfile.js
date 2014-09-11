/*
 See dev dependencies https://gist.github.com/isimmons/8927890
 Compiles less to compressed css with autoprefixing
 Compiles coffee to javascript
 Livereloads on changes to coffee, less, and blade templates
 Runs PHPUnit tests
 Watches less, coffee, blade, and phpunit
 Default tasks less, coffee, phpunit, watch
 */

var gulp = require('gulp');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var less = require('gulp-less');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var autoprefix = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');
var phpunit = require('gulp-phpunit');//notify requires >= v 0.0.3
var imagemin = require('gulp-imagemin');
var phpspec = require('gulp-phpspec');
var run = require('gulp-run');

//CSS directories
var lessDir = 'app/assets/less';
var targetCSSDir = 'public/css';

//javascript directories
var jsDir = 'app/assets/js';
var targetJSDir = 'public/js';

var componentsDir = 'public/components';

// Tasks
/* less compile */
gulp.task('less', function() {
    return gulp.src(lessDir + '/main.less')
        .pipe(less({compress: true}).on('error', gutil.log))
        .pipe(autoprefix('last 10 versions'))
        .pipe(gulp.dest(targetCSSDir))
        .pipe(notify('CSS compiled, prefixed, and minified.'));
});

/* coffee compile */
gulp.task('js', function() {
    return gulp.src(jsDir + '/**/*.js')
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest(targetJSDir))
        .pipe(notify('JS compiled, prefixed, and minified.'));
});

gulp.task('images', function () {
    gulp.src('images-orig/*.{png,gif,jpg}')
        .pipe(imagemin())
        .pipe(gulp.dest('images/'));
});

gulp.task('js-libs', function() {
    var libs = [
        componentsDir + '/jquery/dist/jquery.js',
        componentsDir + '/bootstrap/dist/js/bootstrap.js'
    ]
    return gulp.src(libs)
        .pipe(concat('libs.js'))
        .pipe(uglify())
        .pipe(gulp.dest(targetJSDir))
});

gulp.task('test', function() {
   gulp.src('spec/**/*.php')
       .pipe(run('clear'))
       .pipe(phpspec('', { notify: true }))
       .on('error', notify.onError({
           title: 'Dangit',
           message: 'Your tests failed!',
           icon: __dirname + '/fail.png'
       }))
       .pipe(notify({
           title: 'Success',
           message: 'All tests have returned green!'
       }));
});

gulp.task('css-libs', function() {
    var libs = [
    ]
    return gulp.src(libs)
        .pipe(concat('libs.css'))
        .pipe(gulp.dest(targetCSSDir))
});

/* Watcher */
gulp.task('watch', function() {
    gulp.watch(lessDir + '/**/*.less', ['less']);
    gulp.watch(jsDir + '/**/*.js', ['js']);
    gulp.watch('images-orig/**', ['images']);
    gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
});

/* Default Task */
gulp.task('default', ['less', 'js-libs', 'css-libs', 'test', 'js', 'watch']);