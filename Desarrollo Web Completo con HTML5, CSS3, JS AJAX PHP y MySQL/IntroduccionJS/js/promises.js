// Promises
// En los promises existen tres valores posibles:
// Pending: No se ha cumplido pero tampoco se ha rechazado.
// Fulfilled: Ya se cumplió.
// Rejected: Se ha rechazado o no se pudo cumplor.

const userAuthenticated = new Promise((resolve, reject) => {
    const auth = false;

    if (auth) {
        resolve('Usuario autenticado'); // El promise se cumple
    } else {
        reject('No se pudo iniciar sesión'); // El promise no se cumple
    }
});

userAuthenticated
    .then(function (result) {
        // Mostramos el mensaje del promise(Fulfilled)
        console.log(result);
    })
    .catch(function (error) {
        // Mostramos el mensaje del promise(Rejected)
        console.log(error);
    });

userAuthenticated
    // Mostramos el mensaje del promise(Fulfilled)
    .then((result) => console.log(result))
    // Mostramos el mensaje del promise(Rejected)
    .catch((error) => console.log(error));
