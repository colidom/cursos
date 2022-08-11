const { src, dest, watch } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const plumber = require("gulp-plumber");

function css(done) {
  src("src/scss/**/*.scss") // Identificar el archivo SASS
    .pipe(plumber()) // Evita que si hay errores se detenga el workflow
    .pipe(sass()) // Compilarlo
    .pipe(dest("build/css")); // Almacenarlo en el disco duro

  done(); // Callback que avisa a Gulp que llegamos al final de la ejecución
}

function dev(done) {
  watch("src/scss/**/*.scss", css);
  done();
}

exports.css = css;
exports.dev = dev;
