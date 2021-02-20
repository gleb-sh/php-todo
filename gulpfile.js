const { src, dest, parallel, watch} = require('gulp')

const concat        = require('gulp-concat')
const uglify        = require('gulp-uglify-es').default
const sass          = require('gulp-sass')
const autoprefixer  = require('gulp-autoprefixer')
const cleanсss      = require('gulp-clean-css')

// javascript

function scripts() {
    return src([
        'resources/js/app.js'
    ])
    .pipe(concat('app.min.js'))
    .pipe(uglify())
    .pipe(dest('public/js/'))
}

// scss

function styles() {
    return src([
        'resources/scss/style.scss'
    ])
    .pipe(sass())
    .pipe(concat('style.min.css'))
    .pipe(autoprefixer({
        overrideBrowserslist : ['last 10 versions'],
        grid:true
    }))
    .pipe(cleanсss( ({
        level: { 1: {specialComments: 0 } },
        //format: 'beautify'
    }) ))
    .pipe(dest('public/css/'))
}

// watching

function startwatch() {
    watch(
        'resource/**/*.scss', styles)
    watch([
        'resource/**/*.js',
        '!public/**/*.min.js',
    ],scripts)
    watch(
        'public/**/*.html'
    )
}

// tasks

exports.scripts     = scripts;
exports.styles      = styles;

exports.default     = parallel(scripts, styles, startwatch);