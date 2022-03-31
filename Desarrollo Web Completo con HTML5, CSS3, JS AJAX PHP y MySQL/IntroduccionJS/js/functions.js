// Declaración de función
function add() {
    console.log(10 + 10);
}

add();

// Expresión de la función
const add2 = function (){
    console.log(3 + 3);
}
add2();

// IIFE
(function() {
    console.log('Esto es una función');
})();
