// Objetos
const productName = "Monitor 20 pulgadas";
const price = 300;
const stock = true;

const product = {
    productName : "Monitor 20 pulgadas",
    price : 300,
    stock : true
}
// Acceso a datos
// Forma 1
console.log(product);
/*
console.log(product.productName);
console.log(product.price);
console.log(product.stock);

// Forma 2
console.log(product['price']);

// Bucle
for (p in product){
    console.log(p);
}
 */
// Agregar propiedad
product.image = 'image.jpg';
console.log(product);

// Eliminar propiedad
delete product.stock;
console.log(product);
