// Spread operator
const product = {
    productName : "Monitor 20 pulgadas",
    price : 300,
    stock : true
}

const measures = {
    weight : '1kg',
    measure : '1m'
}

const newProduct = { ...product, ...measures};

console.log(product);
console.log(newProduct);
