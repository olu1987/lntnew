// Include gulp
var gulp = require('gulp');
// Include plugins
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sass = require('gulp-sass');

// Concatenate JS Files
gulp.task('scripts', function() {
    return gulp.src(['js/*.js','js/accessories/*.js','js/prints/*.js'])
        .pipe(concat('main.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('build/js'));
});


gulp.task('sass', function () {
    return gulp.src('./sass/**/*.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('build/css'));
});

gulp.task('watch', function () {
    // Watch .js files
    gulp.watch(['js/*.js','js/accessories/*.js','js/prints/*.js'], ['scripts']);
    // Watch .scss files
    gulp.watch('sass/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['scripts','sass','watch']);
