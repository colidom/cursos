<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo __s($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo __s($propiedad->precio);?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" name="imagen">

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="descripcion"><?php echo __s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="0" max="10" value="<?php echo __s($propiedad->habitaciones) ;?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="0" max="10" value="<?php echo __s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="0" max="10" value="<?php echo __s($propiedad->estacionamiento) ;?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="vendedorId">
        <option selected disabled></option>
        <?php while($vendedor = mysqli_fetch_assoc($resultado) ) : ?>
            <option <?php echo $vendedorId == $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo __s($propiedad->vendedor['id']); ?>"><?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']; ?></option>
        <?php endwhile; ?>
    </select>
</fieldset>