/* Asinc Await */

function downloadNewCustomers() {
    return new Promise((resolve) => {
        console.log('Descargando clientes... espere...');

        setTimeout(() => {
            resolve('Los clientes se han descargado');
        }, 5000);
    });
}

function downloadLastOrders() {
    return new Promise((resolve) => {
        console.log('Descargando pedidos... espere...');

        setTimeout(() => {
            resolve('Los pedidos se han descargado');
        }, 3000);
    });
}

async function app() {
    try {
        /*const customers = await downloadNewCustomers();
        const orders = await downloadLastOrders();
        console.log(customers);
        console.log(orders); */
        const result = await Promise.all([
            downloadNewCustomers(),
            downloadLastOrders()
        ]);
        console.log(result[0]);
        console.log(result[1]);
    } catch (error) {
        console.log(error);
    }
}

app();
