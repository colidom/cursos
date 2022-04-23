// POO

// Object Literal
const PRODUCT = {
  name: "Tablet",
  price: 500,
};

// Object constructor
function Customer(name, surname) {
  this.name = name;
  this.surname = surname;
}

Customer.prototype.formatCustomer = function () {
  return `El cliente ${this.name} ${this.surname}`;
};

function Product(name, price) {
  this.name = name;
  this.price = price;
}

// Crear funciones que solo se utilizan en un objeto en específico
Product.prototype.formatProduct = function () {
  return `El producto ${this.name} tiene un precio de ${this.price}€`;
};

const product2 = new Product("Monitor Curvo de 49", 800);
const product3 = new Product("Monitor QHD 35", 300);
const customer = new Customer("Carlos", "Oliva");

console.log(product2);
console.log(customer);
console.log(product2.formatProduct());
console.log(product3.formatProduct());
console.log(customer.formatCustomer());
/* console.log(formatProduct(product2)); */
