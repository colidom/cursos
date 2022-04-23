// POO

// Object Literal
const PRODUCT = {
    name: 'Tablet',
    price: 500
}

// Object constructor
function Product(name, price) {
    this.name = name;
    this.price = price;
}

const product2 = new Product("Monitor Curvo de 49", 800);
const product3 = new Product("Monitor QHD 35", 300);

console.log(product2);
console.log(product3);
