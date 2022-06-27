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
links[0].classList.remove('navegacion__enlace');

//getElementById
const heading2 = document.getElementById('heading');
console.log(heading2);
