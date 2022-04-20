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

cart.forEach(product => { console.log(product)}); // Arrow function

/* Map */
