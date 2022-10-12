<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <form action="" class="formulario">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Su Email" id="email">
            
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Su password" id="password">
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php 
    incluirTemplate('footer');
?>
