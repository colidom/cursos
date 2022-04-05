// Arrow Functions - Funciones flecha
const sum = (n1, n2) => { // Forma 1
    console.log(n1 + n2);
}

const sub = (n1, n2) => console.log(n1 - n2); // Forma 2

sum(5, 10);
sub(5, 10);

const learning = (lenguaje) => {
    console.log("Aprendiendo " + lenguaje)
}

learning("JavaScript")

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

months.forEach(month => {
    if (month == 'March') {
        console.log("Marzo si existe");
    }
});
