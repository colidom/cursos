// Estructuras de control
const points = 1000;

/* if (points == 1000) { // == que sea el mismo valos y === comprueba además el tipo de dato
    console.log("Si los puntos son 1000");
} else {
    console.log("No es igual");
}

if (points !== 1000) { // == que sea el mismo valos y === comprueba además el tipo de dato
    console.log("No es igual");
} else {
    console.log("Si los puntos son 1000");
}
 
const cash = 1000;
const cart = 800;

if (cash > cart) {
    console.log("El usuario puede pagar");
} else {
    console.log("Fondos insuficientes");
}
*/

const rol = "ADMINISTRADOR"

if (rol === "ADMINISTRADOR") {
    console.log("Acceso a todo el sistema");
} else if ( rol === "EDITOR") {
    console.log("Eres etitorm puedes entrar pero no admiistrar el sitio");
} else {
    console.log("No tienes acceso");
}
