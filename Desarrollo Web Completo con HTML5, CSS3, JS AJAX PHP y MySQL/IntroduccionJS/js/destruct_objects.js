// Objetos
const product = {
    productName : "Monitor 20 pulgadas",
    price : 300,
    stock : true
}

// Forma anterior
/* const productPrice = product.price;
const productName = product.productName; */

/* console.log(productPrice);
console.log(productName); */

// Forma nueva (Destructing)
const {price, productName} = product;

console.log(price);
console.log(productName);
