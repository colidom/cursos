const { src, dest, watch, parallel } = require('gulp');

// Css
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');

// Imagenes
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');

function css(done) {
    src('src/scss/**/*.scss') // Identificar el archivo SASS
        .pipe(plumber()) // Evita que si hay errores se detenga el workflow
        .pipe(sass()) // Compilarlo
        .pipe(dest('build/css')); // Almacenarlo en el disco duro

    done(); // Callback que avisa a Gulp que llegamos al final de la ejecución
}

function imagenes (done) {
    const opciones = {
        optimizationLevel: 3
    };

    src('src/img/**/*.{png, jpg}')
    .pipe(cache(imagemin(opciones)))
    .pipe(dest('build/img'))
    done()
}

function versionWebp(done) {
    const opciones = {
        quality: 50,
    };

    src('src/img/**/*.{png, jpg}')
    .pipe(webp(opciones))
    .pipe(dest('build/img'));
    done();
}

function dev(done) {
    watch('src/scss/**/*.scss', css);
    done();
}

exports.css = css;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.dev = parallel(imagenes, versionWebp, dev);
