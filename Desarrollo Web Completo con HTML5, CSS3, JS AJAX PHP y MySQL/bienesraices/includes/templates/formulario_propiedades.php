<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Título Propiedad" value="<?php echo __s($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo __s($propiedad->precio);?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png" name="imagen">

    <?php if($propiedad->imagen) { ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo __s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="0" max="10" value="<?php echo __s($propiedad->habitaciones) ;?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="0" max="10" value="<?php echo __s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="0" max="10" value="<?php echo __s($propiedad->estacionamiento) ;?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option selected disabled value="">-- Seleccione --</option>
        <?php foreach($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?> value="<?php echo __s($vendedor->id) ?>"> <?php  echo __s($vendedor->nombre) . " " . __s($vendedor->apellido); ?> </option>
        <?php }; ?>
    </select>
</fieldset>