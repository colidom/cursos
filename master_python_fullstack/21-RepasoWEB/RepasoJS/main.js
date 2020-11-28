// alert('Hola mundo!')

var nombre = "Carlos Oliva"
var altura = 180;
/*
var concatenacion = nombre + " " + altura;

var datos = document.getElementById("datos");
datos.innerHTML = concatenacion;

datos.innerHTML = `
    <h1>Soy la caja de datos</h1>
    <h2>Mi nombre es: ${nombre}</h2>
    <h3>Mido: ${altura} cm</h3>
`;

if (altura >= 180){
    datos.innerHTML += `<h1>Eres una persona ALTA</h2>`
}else{
    datos.innerHTML += `<h1>Eres una persona BAJITA</h2>`
}

for(var i = 2000; i<=2020; i++){
    //bloque de instrucciones
    datos.innerHTML += "<h2>Estamos en el año: "+i;
}
*/ 

function MuestraMiNombre(nombre, altura){
    var misDatos =  `
        <h1>Soy la caja de datos</h1>
        <h2>Mi nombre es: ${nombre}</h2>
        <h3>Mido: ${altura} cm</h3>
    `;

    return misDatos;
}

function imprimir(){
    var datos = document.getElementById("datos");
    datos.innerHTML = MuestraMiNombre("Carlos Oliva", 180);
}

imprimir();

var nombres = ['Carlos', 'Antonio', 'Joaquin']


document.write("<h1>Listado de nombres</h1>")
/*
for(i=0; i < nombres.length; i++){
    document.write(nombres[i] + '</br>');
}*/
nombres.forEach((nombre) => {
    document.write(nombre + '</br>');
});
