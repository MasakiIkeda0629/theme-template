const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

// SCSSのコンパイルタスク
gulp.task('styles', function() {
    return gulp.src('src/scss/**/*.scss')  // SCSSファイルのパスを指定
        .pipe(sass().on('error', sass.logError))  // SCSSをコンパイル
        .pipe(cleanCSS())  // CSSを圧縮
        .pipe(rename({ suffix: '.min' }))  // minifiedファイル名に変更
        .pipe(gulp.dest('dist/css'));  // 出力先ディレクトリ
});

// 監視タスク
gulp.task('watch', function() {
    gulp.watch('src/scss/**/*.scss', gulp.series('styles'));  // SCSSファイルが変更されたらstylesタスクを実行
});

// デフォルトタスク
gulp.task('default', gulp.series('styles', 'watch'));
