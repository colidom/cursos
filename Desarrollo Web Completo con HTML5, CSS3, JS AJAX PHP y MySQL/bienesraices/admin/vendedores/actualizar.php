<?php

require '../../includes/app.php';
use App\Vendedor;
estaAutenticado();

// Validar que sea un ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

// Obtener el array del vendedor desde la db
$vendedor = Vendedor::find($id);

// Array con mensajes de errores
$errores = Vendedor::getErrores();

// Ejecutar el código después de que el usuario envíe el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Asignar los valores
    $args = $_POST['vendedor'];
    // Sincronizar objeto en memoria con lo introducido por el usuario
    $vendedor->sincronizar($args);
    // Validación
    $errores = $vendedor->validar();
    
    if (!$errores) {
        $vendedor->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>
        <input type="submit" value="Guardar cambios" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>