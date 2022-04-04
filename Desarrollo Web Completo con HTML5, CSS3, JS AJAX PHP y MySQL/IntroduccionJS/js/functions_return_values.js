function sum(n1, n2) {
    return n1 + n2
}

const result = sum(2, 3);

console.log(result);

let total = 0;

function addCart(price) {
    return total += price;
}

function calculateVat(total) {
    return 1.15 * total;
}

total = addCart(200);
total = addCart(400);
total = addCart(600);

console.log(total);
const totalPayment = calculateVat(total);

console.log("El total a pagar con impuestos es de " + totalPayment + "€");
