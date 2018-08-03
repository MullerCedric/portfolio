/* cm-portfolio - exercise for HEPL Technical College
 *
 * /gulpfile.js - Gulp tasks
 *
 * coded by MullerCedric
 */

var gulp = require("gulp"),
    images = require("gulp-image"),
    sass = require("gulp-sass"),
    autoprefixer = require("gulp-autoprefixer"),
    csso = require("gulp-csso"),
    babel = require("gulp-babel"),
    sourcemaps = require("gulp-sourcemaps");

// --- Task for images
gulp.task("images", function () {
    gulp.src("src/images/**")
        .pipe(images())
        .pipe(gulp.dest("assets/images"));
});

// --- Task for styles
gulp.task("css", function () {
    gulp.src("src/sass/**/*.scss")
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer())
        .pipe(csso())
        .pipe(gulp.dest("assets/css"));
});

// --- Task for js
gulp.task("js", function () {
    gulp.src("src/js/**/*.js")
        .pipe(sourcemaps.init())
        .pipe(babel())
        .on("error", function (oError) {
            console.error(oError);
            this.emit("end");
        })
        .pipe(sourcemaps.write())
        .pipe(gulp.dest("assets/js"));
});

// --- Task to transfert fonts (assets files aren't on github, so they need to be in the src folder)

gulp.task("fonts", function () {
    gulp.src("src/fonts/**")
        .pipe(gulp.dest("assets/fonts"));
});

// --- Watch tasks
gulp.task("watch", function () {
    gulp.watch("src/images/**", ["images"]);
    gulp.watch("src/sass/**/*.scss", ["css"]);
    gulp.watch("src/js/**/*.js", ["js"]);
    gulp.watch("src/fonts/**", ["fonts"]);
});

// --- Aliases
gulp.task("default", ["images", "css", "js", "fonts"]);
gulp.task("work", ["default", "watch"]);