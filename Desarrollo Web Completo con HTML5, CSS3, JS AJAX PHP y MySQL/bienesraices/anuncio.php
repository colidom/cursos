<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

        <main class="contenedor seccion contenido-centrado">
            <h1>Casa en Venta frente al bosque</h1>

            <picture>
                <source srcset="build/img/destacada.webp" type="image/webp">
                <source srcset="build/img/destacada.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">
            </picture>

            <div class="resumen-propiedad">
                <p class="precio">3.000.000€</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="dormitorio">
                        <p>4</p>
                    </li>
                </ul>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam ducimus voluptate praesentium voluptatibus esse est molestias, quasi excepturi repudiandae aliquam animi, harum officia vitae, cupiditate architecto. Eaque excepturi maiores nobis?</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam a nostrum neque tempore, repudiandae aut ea fugiat dolores delectus debitis quae optio facere aliquid minus dolore repellat perspiciatis animi. Obcaecati.</p>
                
            </div>
        </main>

<?php 
    incluirTemplate('footer');
?>
