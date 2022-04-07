const paymentMethod = "Card1";

switch(paymentMethod) {
    case 'Card':
        console.log("Has pagado con tarjeta");
        break;
    case 'Cash':
        console.log("Has pagado en metálico");
        break;
    default:
        console.log("Método de pago no permitido");
        break;
}