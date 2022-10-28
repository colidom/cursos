<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre vendedor" value="<?php echo __s($vendedor->nombre); ?>">
    
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido vendedor" value="<?php echo __s($vendedor->apellido); ?>">
    
</fieldset>

<fieldset>
    <legend>Información extra</legend>

    <label for="telefono">Telefono:</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Telefono del vendedor" value="<?php echo __s($vendedor->telefono); ?>">
    
</fieldset>