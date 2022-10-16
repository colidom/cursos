<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>
        <main class="contenedor seccion contenido-centrado">
            <h1>Guía para la decoración de tu hogar</h1>

            <picture>
                <source srcset="build/img/destacada2.webp" type="image/webp">
                <source srcset="build/img/destacada2.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
            </picture>

            <p class="informacion-meta">Escrito el: <span>27/09/2022</span> por: <span>Colidom</span></p>

            <div class="resumen-propiedad">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam ducimus voluptate praesentium voluptatibus esse est molestias, quasi excepturi repudiandae aliquam animi, harum officia vitae, cupiditate architecto. Eaque excepturi maiores nobis?</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam a nostrum neque tempore, repudiandae aut ea fugiat dolores delectus debitis quae optio facere aliquid minus dolore repellat perspiciatis animi. Obcaecati.</p>
            </div>
        </main>


<?php 
    incluirTemplate('footer');
?>
