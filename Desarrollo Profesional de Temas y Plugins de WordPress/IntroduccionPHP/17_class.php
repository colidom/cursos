<?php
include_once './includes/header.php';
?>

<?php

class Cliente
{
    public $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function mostrar_nombre()
    {
        echo "El nombre es: {$this->nombre}";
    }
}

# Instanciar clase
$cliente = new Cliente("colidom");

echo "<pre>";
$cliente->mostrar_nombre();
echo "</pre>";
