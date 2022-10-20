<?php

use App\Propiedad;

    require '../../includes/app.php';

    estaAutenticado();

    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }

    // Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Consulta para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Array con mensajes de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el código después de que el usuario envíe el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Asignar los atributos
        $args = $_POST['propiedad'];
    
        $propiedad->sincronizar($args);

        $errores = $propiedad->validar();

        if (empty($errores)) {
            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            /* Subida de archivos */
            if ($imagen['name']) {
                // Eliminar la imagen previa
                unlink($carpetaImagenes . $propiedad['imagen']);
                // Generar un nombre único
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg" ;
                // Subir imagen
                move_uploaded_file( $imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            } else {
                $nombreImagen = $propiedad['imagen'];
            }

            // Insertar en la base de datos
            $query = "UPDATE propiedades SET titulo = '${titulo}', imagen = '${nombreImagen}', precio = '${precio}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id}";
    
            // echo $query;
    
            $resultado = mysqli_query($db, $query);
    
            if ($resultado) {
                // Redireccionamos al usuario tras insertar el registro en DB
                header("Location: /admin?resultado=2");
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?> 
        <a href="/admin" class="boton boton-verde">Volver</a>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>
