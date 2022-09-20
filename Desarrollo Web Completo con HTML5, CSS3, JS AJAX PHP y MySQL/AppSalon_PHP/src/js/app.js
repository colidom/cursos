let pagina = 1;

const cita = {
    nombre: '',
    fecha: '',
    hora: '',
    servicios: []
}
document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    mostrarSeccion(); // Muestra una sección 

    cambiarSeccion(); // Cambia la página actual con los tabs
    paginaSiguiente(); // Pagina Siguiente del paginador
    paginaAnterior(); // Pagina anterior del paginador
    mostrarServicios();// Consulta la API
    botonesPaginador(); // Muestra u oculta los botones del paginador

    // Validacion y almacenar cita
    nombreCita();
    deshabilitarFechaAnterior();
    seleccionarDiaCita();
    seleccionarHoraCita();

    // Resumen de la cita con servicios y datos
    mostrarResumen();
}
function mostrarSeccion() {
    const seccionAnterior = document.querySelector('.mostrar-seccion');
    if(seccionAnterior) {
        seccionAnterior.classList.remove('mostrar-seccion');
    }
    const seccionNueva = document.querySelector(`#paso-${pagina}`);
    seccionNueva.classList.add('mostrar-seccion');

    // Resalta el Tab Actual
    const tabAnterior = document.querySelector('.actual');
    if(tabAnterior) {
        tabAnterior.classList.remove('actual');
    }

    // Resalta la primera opción de la navegación
    const tab = document.querySelector(`[data-tab="${pagina}"]`);
    tab.classList.add('actual');
}


function cambiarSeccion() {
   const enlaces = document.querySelectorAll('.tabs button');
   enlaces.forEach( enlace => {
        enlace.addEventListener('click', function(e) {
                e.preventDefault();
                // Conocer a que le dimos click..
                //  console.log(this.dataset.tab);
                // console.log( e.target.dataset.tab);
                const paso = parseInt( e.target.dataset.tab);
                // console.log(paso);

                if(paso === 1) {
                    pagina = 1;
                } else if( paso === 2) {
                    pagina = 2;
                } else if (paso === 3) {
                    pagina = 3;
                    mostrarResumen();
                }
                botonesPaginador();
        });
   })
}

async function mostrarServicios() {
    try {

        const url = 'http://localhost:3000/servicios.php';

        const resultado = await fetch(url);
  
        const db = await resultado.json();
        console.log(db);

        // const { servicios} = db;

        db.forEach( servicio => {

            const { id, nombre, precio } = servicio;

            const nombreServicio = document.createElement('P');
            nombreServicio.classList.add('nombre-servicio');
            nombreServicio.textContent = nombre;

            const precioServicio = document.createElement('P');
            precioServicio.classList.add('precio-servicio');
            precioServicio.innerHTML = `$ ${precio}`;
            
            const servicioDiv = document.createElement('DIV');
            servicioDiv.classList.add('servicio');
            servicioDiv.dataset.idServicio = id;
            servicioDiv.onclick = seleccionarServicio;

            // Inyectar a ServicioDiv
            servicioDiv.appendChild(nombreServicio);
            servicioDiv.appendChild(precioServicio);

            document.querySelector('#servicios').appendChild(servicioDiv)
        });

        
    } catch (error) {
        console.log(error)
    }
}

function seleccionarServicio(e) {
    let servicio;

    if(e.target.tagName === 'P') {
        servicio = e.target.parentElement;
    } else {
       servicio = e.target;
    }
    if(servicio.classList.contains('seleccionado')) {
        servicio.classList.remove('seleccionado') // El Usuario eliminó el servicio
        const id = parseInt( servicio.dataset.idServicio );
        eliminarServicio(id);
    } else {
        servicio.classList.add('seleccionado'); // El usuario seleccionó un servicio
        let servicioObj = {
            id: parseInt( servicio.dataset.idServicio ),
            nombre: servicio.firstElementChild.textContent,
            precio: servicio.firstElementChild.nextElementSibling.textContent
        }; 
        // console.log(servicioObj);

        agregarServicio(servicioObj); 
    }
}

function agregarServicio(servicioObj) {
    const { servicios } = cita;
    cita.servicios = [...servicios,  servicioObj];
    console.log(cita);
}

function eliminarServicio(id) {
    // console.log('EL id es ', id);

    const { servicios } = cita;

    // const nuevoArray = servicios.filter( servicio => servicio.id !== id );
    cita.servicios = servicios.filter( servicio => servicio.id !== id );
    
    console.log(cita);
}

function paginaSiguiente() {
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', function() {
        pagina++;
        botonesPaginador();
    });
}

function paginaAnterior() {
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', function() {
        pagina--;
        botonesPaginador();
    });
}

function botonesPaginador() {
    const paginaAnterior = document.querySelector('#anterior');
    const paginaSiguiente = document.querySelector('#siguiente');
    if(pagina === 1) {
        paginaAnterior.classList.add('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    } else if(pagina === 3) {
        paginaSiguiente.classList.add('ocultar');
        paginaAnterior.classList.remove('ocultar');
        mostrarResumen(); 
    } else if(pagina < 1 || pagina > 3) {
        return;
    } else {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }

    mostrarSeccion(); // Muestra la nueva sección 

}

function nombreCita() {
    const nombreInput = document.querySelector('#nombre');
    nombreInput.addEventListener('input', e => {
        const nombreTexto = e.target.value.trim(); 
        if( nombreTexto === '') {
            mostrarAlerta( 'Fines de Semana no permitidos', 'error');
        } else {
            // TODO: Añadirlo al objeto
            cita.nombre = nombreTexto;
        }

    })
}

function deshabilitarFechaAnterior() {
    const inputFecha = document.querySelector('#fecha');

    const ahora = new Date();

    const year = ahora.getFullYear();
    const mes = ahora.getMonth() + 1;
    const dia = ahora.getDate() + 1;

    // Formato deseado...   2020-11-20
    const fechaDeshabilitar =`${year}-${mes}-${dia}`;

    inputFecha.min = fechaDeshabilitar;
}

function seleccionarDiaCita() {
    const inputFecha = document.querySelector('#fecha');
    inputFecha.addEventListener('input', function(e) {
        const dia = new Date(e.target.value).getUTCDay(); // getUTCDay nos retorna el día de la semana de 0 a 6 siendo 0 domingo
        console.log(dia);

        if([6,0].includes(dia)){ // 6,0 Deshabilita los sábados y domingos, 0 solo el domingo
            e.preventDefault();
            mostrarAlerta( 'Fines de Semana no permitidos', 'error', inputFecha);
        } else {
            cita.fecha = e.target.value;
        }
    })
}

function seleccionarHoraCita() {
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input', function(e) {
        const horaCita = e.target.value;
        const hora = horaCita.split(':');
        if(hora[0] < 10 || hora[0] > 18) {
            mostrarAlerta('Hora no válida', 'error', inputHora );
            setTimeout(() => {
                e.target.value = '';
            }, 3000);
        } else {
            cita.hora = e.target.value;
        }
    })
}

function mostrarAlerta( mensaje, tipo = null, elemento = null ) {

    // Si la alerta existe no crear una nueva
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia) {
        return;
    }

    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');

    if(tipo === 'error') {
        alerta.classList.add('error')
    } else {
        alerta.classList.add('exito');
    }

    const formulario = document.querySelector('.formulario');
    formulario.appendChild(alerta);

    setTimeout( () => {
        alerta.remove();

        if( elemento ) {
            elemento.value = '';
        }
    }, 3000);
}

function mostrarResumen() {

    const { nombre, fecha, hora, servicios } = cita;
    const resumenDiv = document.querySelector('.contenido-resumen');

    // Limpiar el resumen en caso de ser necesario
    while(resumenDiv.firstChild) {
        resumenDiv.removeChild(resumenDiv.firstChild); 
    }


    if(Object.values(cita).includes('') || servicios.length === 0) {
        const noServicios = document.createElement('P');
        noServicios.textContent = 'Faltan Datos de Servicios, Hora, Fecha o Nombre';
        noServicios.classList.add('invalidar-cita');
        resumenDiv.appendChild(noServicios);

        return;
    } 

    // Agrega el Nombre al HTML
    const nombreCita = document.createElement('P');
    nombreCita.innerHTML = `<span>Nombre:</span> ${nombre}`;

    // Agrega la fecha al HTML
    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span>Fecha:</span> ${fecha}`;

    // aGREGA LA hORA
    const horaCita = document.createElement('P');
    horaCita.innerHTML = `<span>Hora:</span> ${hora}`;

    const serviciosCita = document.createElement('DIV');
    serviciosCita.classList.add('resumen-servicios');

    if(servicios.length > 0 ) {
        
        const headingServicios = document.createElement('H3');
        headingServicios.textContent = 'Resumen de Servicios';
        serviciosCita.appendChild(headingServicios);
        
        servicios.forEach( servicio => {

            const contenedorServicio = document.createElement('DIV');
            contenedorServicio.classList.add('contenedor-servicio');

            const textoServicio = document.createElement('P');
            textoServicio.textContent = servicio.nombre;

            const precioServicio = document.createElement('P');
            precioServicio.innerHTML = `<span>Precio:</span> ${servicio.precio}`;

            contenedorServicio.appendChild(textoServicio);
            contenedorServicio.appendChild(precioServicio);

            serviciosCita.appendChild(contenedorServicio);
        });


        // Total a pagar
    }

    // añadir al HTML
    resumenDiv.appendChild(nombreCita);
    resumenDiv.appendChild(fechaCita);
    resumenDiv.appendChild(horaCita);
    resumenDiv.appendChild(serviciosCita);

    // Crear el botón para la cita

    const botonReservar = document.createElement('button');
    botonReservar.classList.add('btn', 'btn-block');
    botonReservar.textContent = 'RESERVAR CITA';

    resumenDiv.appendChild(botonReservar);

}