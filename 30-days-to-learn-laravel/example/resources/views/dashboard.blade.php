<x-layout title="Dashboard">
    <x-slot name="heading">
        Dashboard
    </x-slot>

    <div id="accordion" class="w-full max-w-3xl mx-auto mt-8" data-accordion="collapse">
        <!-- Sección 1: Cuadro de Mandos -->
        <div class="border rounded-lg shadow-sm mb-4">
            <h2 id="accordion-heading-1">
                <button type="button" class="flex items-center justify-between w-full p-4 text-lg font-medium text-gray-800 bg-gray-100 rounded-t-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        data-accordion-target="#accordion-body-1" aria-expanded="true" aria-controls="accordion-body-1">
                    <span>Cuadro de Mandos</span>
                    <svg class="w-5 h-5 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-body-1" class="p-4 bg-white border-t" aria-labelledby="accordion-heading-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Indicadores clave -->
                    <div class="p-4 bg-blue-100 border border-blue-300 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-blue-800">Tickets Abiertos</h3>
                        <p class="text-2xl font-bold text-blue-900">15</p>
                        <p class="text-sm text-blue-700">Actualizado hace 10 minutos</p>
                    </div>
                    <div class="p-4 bg-green-100 border border-green-300 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-green-800">Sistemas Online</h3>
                        <p class="text-2xl font-bold text-green-900">98%</p>
                        <p class="text-sm text-green-700">Última revisión: hoy</p>
                    </div>
                    <div class="p-4 bg-yellow-100 border border-yellow-300 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-yellow-800">Tareas Pendientes</h3>
                        <p class="text-2xl font-bold text-yellow-900">7</p>
                        <p class="text-sm text-yellow-700">Revisar a lo largo del día</p>
                    </div>

                    <!-- Accesos rápidos -->
                    <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg shadow col-span-1 sm:col-span-2">
                        <h3 class="text-lg font-semibold text-gray-800">Accesos Rápidos</h3>
                        <div class="flex flex-wrap mt-2 gap-2">
                            <a href="/monitoring" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Monitorización</a>
                            <a href="/tasks" class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">Tareas</a>
                            <a href="/incidents" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">Incidencias</a>
                            <a href="/reports" class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 rounded-lg hover:bg-yellow-700">Reportes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sección 2: Accesos -->
        <div class="border rounded-lg shadow-sm mb-4">
            <h2 id="accordion-heading-2">
                <button type="button" class="flex items-center justify-between w-full p-4 text-lg font-medium text-gray-800 bg-gray-100 rounded-t-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        data-accordion-target="#accordion-body-2" aria-expanded="false" aria-controls="accordion-body-2">
                    <span>Accesos</span>
                    <svg class="w-5 h-5 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-body-2" class="p-4 bg-white border-t hidden" aria-labelledby="accordion-heading-2">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Credencial con Mostrar/Ocultar y Copiar -->
                    <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-800">Servidor de Producción</h3>
                        <p class="text-gray-700"><strong>Usuario:</strong> admin</p>
                        <div class="flex items-center gap-2 mt-2">
                            <p class="text-gray-700"><strong>Contraseña:</strong>
                                <span id="password" class="text-gray-900">******</span>
                            </p>
                            <button id="togglePassword" class="text-gray-500 hover:text-gray-700" aria-label="Mostrar contraseña">
                                <!-- Icono de ojo para mostrar -->
                                <svg id="showIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <!-- Icono de ojo tachado para ocultar -->
                                <svg id="hideIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                            <button id="copyPassword" class="text-gray-500 hover:text-gray-700" aria-label="Copiar contraseña">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                                </svg>
                            </button>
                        </div>
                        <p class="text-gray-700 mt-2"><strong>URL:</strong> <a href="https://example.com" class="text-blue-500 hover:underline">https://example.com</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección 3: TODO -->
        <div class="border rounded-lg shadow-sm mb-4">
            <h2 id="accordion-heading-3">
                <button type="button" class="flex items-center justify-between w-full p-4 text-lg font-medium text-gray-800 bg-gray-100 rounded-t-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        data-accordion-target="#accordion-body-3" aria-expanded="false" aria-controls="accordion-body-3">
                    <span>TODO</span>
                    <svg class="w-5 h-5 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-body-3" class="p-4 bg-white border-t hidden" aria-labelledby="accordion-heading-3">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <!-- Tareas por estado -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Por Hacer</h3>
                        <ul class="space-y-2">
                            <li class="p-2 bg-gray-100 border border-gray-300 rounded shadow">
                                <p class="text-gray-700">Actualizar servidor de desarrollo.</p>
                                <div class="flex gap-2 mt-2">
                                    <button class="px-2 py-1 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Mover a Done</button>
                                    <button class="px-2 py-1 text-sm font-medium text-white bg-yellow-600 rounded hover:bg-yellow-700">Bloquear</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Bloqueadas</h3>
                        <ul class="space-y-2">
                            <li class="p-2 bg-yellow-100 border border-yellow-300 rounded shadow">
                                <p class="text-yellow-800">Esperando acceso a la base de datos.</p>
                                <div class="flex gap-2 mt-2">
                                    <button class="px-2 py-1 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-700">Desbloquear</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Hechas</h3>
                        <ul class="space-y-2">
                            <li class="p-2 bg-green-100 border border-green-300 rounded shadow">
                                <p class="text-green-800">Configurar monitorización básica.</p>
                                <div class="flex gap-2 mt-2">
                                    <button class="px-2 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">Eliminar</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>

<script>
    // Script para alternar las secciones del acordeón
    document.querySelectorAll('[data-accordion-target]').forEach(button => {
        button.addEventListener('click', () => {
            const target = document.querySelector(button.getAttribute('data-accordion-target'));
            const expanded = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', !expanded);
            target.classList.toggle('hidden');
        });
    });

    const passwordElement = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const showIcon = document.getElementById('showIcon');
    const hideIcon = document.getElementById('hideIcon');
    const copyPassword = document.getElementById('copyPassword');

    togglePassword.addEventListener('click', () => {
        if (passwordElement.textContent === '******') {
            passwordElement.textContent = 'mypassword123'; // Aquí pones la contraseña real
            showIcon.classList.add('hidden');
            hideIcon.classList.remove('hidden');
        } else {
            passwordElement.textContent = '******';
            hideIcon.classList.add('hidden');
            showIcon.classList.remove('hidden');
        }
    });

    copyPassword.addEventListener('click', () => {
        const password = passwordElement.textContent === '******' ? 'mypassword123' : passwordElement.textContent; // Contraseña real
        navigator.clipboard.writeText(password).then(() => {
            alert('Contraseña copiada al portapapeles');
        });
    });
</script>
