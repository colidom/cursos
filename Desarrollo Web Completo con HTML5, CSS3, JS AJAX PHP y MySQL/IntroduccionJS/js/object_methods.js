//"user strict" // Modo estricto, genera error ya que estamos añadiendo propiedad nueva a producto "congelado"
// Object Methods
const product = {
    productName : "Monitor 20 pulgadas",
    price : 300,
    stock : true
}

Object.freeze(product) // Evita que podamos modificar el objeto js

product.image = 'imagen.png';
console.log(product);

console.log(Object.isFrozen(product)); // Saber si el objeto está "congelado"
