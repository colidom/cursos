// Declaración de función
function add(n1 = 0, n2 = 0) {// n1 y n2 son parámetros
  console.log(n1 + n2);
}
add(1, 20); // Argumentos o valores realos
add(22, 20);
add(12, 120);

// Expresión de la función
const add2 = function (n1, n2) {
  console.log(n1 + n2);
};
add2(5, 10);
add2(511, 101);
