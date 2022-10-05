<?php
    $resultado = $_GET['resultado'] ?? null;
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de bienes Raíces</h1>
        <?php if(intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif; ?>
            <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
        <a href="/admin/propiedades/actualizar.php" class="boton boton-verde">Actualizar propiedad</a>
        <a href="/admin/propiedades/borrar.php" class="boton boton-verde">Borrar propiedad</a>
    
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa en el monte</td>
                    <td><img src="/imagenes/0ea6f6f376046518aa392a3bc814f179.jpg" class="imagen-tabla"></td>
                    <td>75.000€</td>
                    <td>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="#" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

<?php 
    incluirTemplate('footer');
?>
