async function getEmproyees() {
    const file = 'employees.json';

    /*     fetch(file)
        .then((result) => result.json())

        .then((data) => {
            // console.log(data.employees)

            const { employees } = data;
            console.log(employees);

            /* employees.forEach((employee) => {
                console.log(employee.id);
                console.log(employee.name);
                console.log(employee.position);
            }); 
        }); */
    const result = await fetch(file);
    const data = await result.json();
    console.log(data);
}

getEmproyees();
