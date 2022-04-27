// Clases
class Product {
    constructor(name, price) {
        this.name = name;
        this.price = price;
    }

    formatProduct() {
        return `El producto ${this.name} tiene un precio de ${this.price}€`;
    }

    getProductPrice() {
        return `El precio del producto ${this.name} es: ${this.price}€`;
    }
}

const product1 = new Product('Monitor Curvo de 49', 800);
const product2 = new Product('Monitor QHD 35', 300);
const product3 = new Product('Televisión QHD 85', 900);

// Herencia
class Book extends Product {
    /* constructor(name, price, isbn) { Este código se hereda de la clase Product
        this.name = name;
        this.price = price;
        this.isbn = isbn;
    } */
    constructor(name, price, isbn) {
        super(name, price); // Se accede al constructor de la clase heredada
        this.isbn = isbn;
    }

    getBookPrice() {
        return this.price + '€';
    }
}

book1 = new Book('JavaScript la Revolución', 45, '2232323452352387387423');

console.log(book1.getBookPrice());
console.log(book1.formatProduct());
