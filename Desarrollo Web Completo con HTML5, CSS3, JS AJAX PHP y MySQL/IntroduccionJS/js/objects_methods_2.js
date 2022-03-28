//Array methods
const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

const cart = [
  { name: "Monitor 20 pulgadas", price: 500 },
  { name: "Televisión 50 pulgadas", price: 700 },
  { name: "Tablet", price: 300 },
  { name: "Auriculares", price: 200 },
  { name: "Teclado", price: 50 },
  { name: "Teléfono Móvil", price: 500 },
  { name: "Portatil", price: 800 },
];

// forEach
months.forEach(function (month) {
  if (month == "March") {
    console.log("Marzo si existe");
  }
});

// Includes
let result = months.includes("March");

// Some ideal para arreglo de objetos
const result2 = cart.some(function (product) {
  return product.name === "Tablet";
});
console.log(result2);

/* Lo mismo pero con arrow function */
const result3 = cart.some((product) => product.name === "Tablet");
console.log(result3);

// Reducer
result = cart.reduce(function (total, product) {
  return total + product.price;
}, 0);

console.log(result);

// Filter
result = cart.filter(function (product) {
  return product.price > 400;
});

console.log(result);
