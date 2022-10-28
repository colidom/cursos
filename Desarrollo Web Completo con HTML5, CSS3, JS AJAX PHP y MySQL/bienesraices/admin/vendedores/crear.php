<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

// Array con mensajes de errores
$errores = Vendedor::getErrores();

// Ejecutar el código después de que el usuario envíe el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    // Validar que no haya campos vacíos
    $errores = $vendedor->validar();

    // No hay errores
    if (empty($errores)) {
        $vendedor->guardar();
    }

}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Registrar Vendedor</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>
        <input type="submit" value="Registrar vendedor" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>