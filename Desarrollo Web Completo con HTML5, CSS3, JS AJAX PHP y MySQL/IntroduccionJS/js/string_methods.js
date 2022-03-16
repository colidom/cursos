const tweet = 'Aprendiendo JavaScript con el curso de Desarrollo Web Completo';
const product = 'Monitor HD';

console.log(tweet.length);
console.log(product);

// IndexOf (retorna la posición)
console.log(tweet.indexOf('JavaScript'));
console.log(product.indexOf('Tablet')); // -1 indica que no ha encontrado esa palabra en el string

// Includes (returna booleano)
console.log(tweet.includes('JavaScript'));
console.log(product.includes('Tablet')); 
