/* Asinc Await */

function downloadNewCustomers() {
    return new Promise((resolve) => {
        console.log('Descargando clientes... espere...');

        setTimeout(() => {
            resolve('Los clientes se han descargado');
        }, 5000);
    });
}

async function app() {
    try {
        const result = await downloadNewCustomers();
        console.log(result);
    } catch (error) {
        console.log(error);
    }
}

app();

console.log('Este código no se bloquea');
