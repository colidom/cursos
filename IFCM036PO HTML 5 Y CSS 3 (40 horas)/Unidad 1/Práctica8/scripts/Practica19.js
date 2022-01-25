/* Seleccionar elementos */
var elemento = document.getElementById("content");
var option1 = document.getElementById("option-1");
var option2 = document.getElementById("option-2");
var option3 = document.getElementById("option-3");

/* Añadir manejadores de evento */
/* El método toggle de la propiedad classList añade o quita la clase
   indicada en función de si el elemento la tiene aplicada o no.
*/
option1.addEventListener("change", function () {
        elemento.classList.toggle("border");
}, false);

option2.addEventListener("change", function () {
        elemento.classList.toggle("twoColumns");
        if (this.checked) {
            option3.disabled = false;
        } else {
            option3.disabled = true;
        }
}, false);

option3.addEventListener("change", function () {
        elemento.classList.toggle("columnsSeparator");
}, false);