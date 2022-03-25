// Arreglos o Arrays
const numbers = [10, 20, 30, 40, 50];

console.log(numbers);
console.table(numbers);

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
console.table(months);
/*const arreglo = [
  "Hola",
  10,
  true,
  "si",
  null,
  { Nombre: "Juan", Trabajo: "Programador" },
  [1, 2, 3],
];
console.log(arreglo);

// Acceder a los valores d eun arreglo
console.log(numbers[0]);
console.log(numbers[1]);
console.log(numbers[2]);
console.log(numbers[3]);
console.log(numbers[4]);

// Conocer la extensión de un arreglo
console.log(months.length);

months.forEach(function (months) {
  console.log(months);
}); */
// Añade un valor a un arreglo, sin saber su longitud(se recomienda no modificar los arreglos)
numbers.push(60); // Al final de larreglo
numbers.unshift(-10, -20, -30, -5); // Al inicio del arreglo

console.table(numbers);
