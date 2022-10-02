<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium accusamus eos hic commodi sed, veritatis voluptatibus in est delectus a consectetur, at obcaecati maxime repudiandae tempora accusantium beatae distinctio alias.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum fuga porro ut dolores amet excepturi animi, dolorem saepe delectus ipsam ea minus corrupti id impedit natus ducimus doloribus voluptate nemo?</p>

            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" login="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos est voluptas reprehenderit, repellendus, et tenetur, ratione soluta beatae aliquam quidem pariatur? Necessitatibus nisi sit reiciendis mollitia magnam autem debitis nihil?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" login="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos est voluptas reprehenderit, repellendus, et tenetur, ratione soluta beatae aliquam quidem pariatur? Necessitatibus nisi sit reiciendis mollitia magnam autem debitis nihil?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" login="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos est voluptas reprehenderit, repellendus, et tenetur, ratione soluta beatae aliquam quidem pariatur? Necessitatibus nisi sit reiciendis mollitia magnam autem debitis nihil?</p>
            </div>
        </div>
    </section>

<?php 
    incluirTemplate('footer');
?>
