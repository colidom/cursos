// For loop
/* for(let i = 0; i < 10; i++) {
    console.log(i);
} */

for(let i = 0; i < 10; i++) {
    if(i % 2 === 0) {
        console.log("Par");
    } else {
        console.log("Impar");
    }
}

// While loop

let i = 1; // Valor inicial

while (i <= 100 ) { // Condición
    if (i % 2 == 0) {
        console.log(`El número ${i} es PAR`);
    } else {
        console.log(`El número ${i} es IMPAR`);
    }
    i++; // Incremento
}

// Do while loop
let j = 0;
do {
    console.log(j);
    j++;
} while (j < 10);
