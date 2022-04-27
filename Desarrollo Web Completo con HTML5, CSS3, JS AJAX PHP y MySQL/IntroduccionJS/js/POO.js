// Clases
class Product {
    constructor(name, price) {
        this.name = name;
        this.price = price;
    }

    formatProduct() {
        return `El producto ${this.name} tiene un precio de ${this.price}€`
    }

    getProductPrice() {
        return `El precio del producto ${this.name} es: ${this.price}€`
    }
}

const product1 = new Product('Monitor Curvo de 49', 800)
const product2 = new Product('Monitor QHD 35', 300)
const product3 = new Product('Televisión QHD 85', 900)

console.log(product1);
console.log(product2);
console.log(product3.getProductPrice());

