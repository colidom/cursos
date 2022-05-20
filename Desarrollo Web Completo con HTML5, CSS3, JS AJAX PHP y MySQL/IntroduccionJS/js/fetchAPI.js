function getEmproyees() {
    const file = 'employees.json';

    fetch(file)
        .then((result) => result.json())

        .then((data) => console.log(data));
}

getEmproyees();
