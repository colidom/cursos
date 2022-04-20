const cart = [
    { name: 'Monitor 20 pulgadas', price: 500 },
    { name: 'Telecisión 75 pulgadas', price: 1850 },
    { name: 'Tablet', price: 180 },
    { name: 'Auriculares', price: 70 },
    { name: 'Teléfono', price: 200 },
    { name: 'Portátil', price: 900 },
    { name: 'Ratón', price: 40 },
];

/* forEach */
cart.forEach(function(product) {  // Forma normal
    console.log(product);
})

const array1 = cart.forEach(product => { console.log(product)}); // Arrow function

/* Map */
const array2 = cart.map(product => product.name); // Arrow function


console.log(array1); // Undefined
console.log(array2);
