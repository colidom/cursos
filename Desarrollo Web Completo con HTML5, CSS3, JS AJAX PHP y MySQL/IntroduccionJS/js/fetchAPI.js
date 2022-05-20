function getEmproyees() {
    const file = 'employees.json';

    fetch(file)
        .then((result) => {
            return result.json();
        })
        .then((data) => {
            console.log(data);
        });
}

getEmproyees();
