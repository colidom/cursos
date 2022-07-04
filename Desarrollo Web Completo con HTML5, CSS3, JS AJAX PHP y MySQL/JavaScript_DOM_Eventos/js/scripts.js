// querySelector
const heading = document.querySelector('.header__texto  h2'); // Retorna 0 o 1 elementos
heading.textContent = 'Nuevo heading';
heading.classList.add('nueva-clase');
console.log(heading);

// querySelectorAll
const links = document.querySelectorAll('.navegacion a');
console.log(links);
links[0].textContent = 'Nuevo texto para Enlace';
links[0].classList.add('nueva-clase');
/* links[0].classList.remove('navegacion__enlace'); */

//getElementById
const heading2 = document.getElementById('heading');
console.log(heading2);

// Generar un nuevo enlace
const newLink = document.createElement('A');

// Agregar el href
newLink.href = 'index.html';

// Agregar el texto
newLink.textContent = 'Tienda';

// Agregar la clase
newLink.classList.add('navegacion__enlace');

// Agregarlo al documento
const navegation = document.querySelector('.navegacion');
navegation.appendChild(newLink);

console.log(newLink);

// Eventos
console.log(1);

window.addEventListener('load', function () {
    // load espera a que el JS y los archivos que dependen del html estén listos
    console.log(2);
});

window.addEventListener('load', print);

window.onload = function () {
    console.log(3);
};

document.addEventListener('DOMContentLoaded', function () {
    // Solo espera que se cargue el HTML, no espera por la carga de css o img
    console.log(4);
});

console.log(5);

function print() {
    console.log('function');
}

window.onscroll = function () {
    console.log('Scrolling...');
};

// Seleccionar elementos y asociarles un evento
const btnEnviar = document.querySelector('.boton--primario');
btnEnviar.addEventListener('click', function (event) {
    console.log(event);
    event.preventDefault();
    console.log('Enviando formulario');
});

// Eventos de los Input y Textarea
const data = {
    nombre: '',
    email: '',
    mensaje: ''
};

const nameInput = document.querySelector('#nombre');
const emailInput = document.querySelector('#email');
const messageInput = document.querySelector('#mensaje');
const form = document.querySelector('.formulario');

nameInput.addEventListener('input', readText);
emailInput.addEventListener('input', readText);
messageInput.addEventListener('input', readText);

// El evento de Submit
formulario.addEventListener('submit', function (event) {
    event.preventDefault();
    console.log('Enviando el formulario');
});

function readText(event) {
    /* console.log(event.target.value); */
    data[event.target.id] = event.target.value;

    console.log(data);
}
