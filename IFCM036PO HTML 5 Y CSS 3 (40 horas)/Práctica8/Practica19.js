/* Seleccionar elementos */
var elemento = document.getElementById("content");
var option1 = document.getElementById("option-1");
var option2 = document.getElementById("option-2");
var option3 = document.getElementById("option-3");

/* Añadir manejadores de evento utilizando el método toggle de la propiedad classList */
/* El método toggle de la propiedad classList añade o quita la clase
   indicada en función de si el elemento la tiene aplicada o no.
*/
option1.addEventListener("change", function () {
        elemento.classList.toggle("border");
}, false);