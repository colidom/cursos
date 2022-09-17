<?php include 'includes/header.php';

$clientes = [];
$clientes2 = array();
$clientes3 = array('Carlos', 'Javier','Laura');
$clientes = [
    'nombre' => 'Colidom',
    'saldo' => 200
];

// Empty - Comprueba si un array está vacío
var_dump(empty($clientes));
var_dump(empty($clientes2));
var_dump(empty($clientes3));

// Isset - Comprueba si un array está creado o una propiedad está definida
echo "</br>";
var_dump(isset($clientes4));
var_dump(isset($clientes));
var_dump(isset($clientes2));
var_dump(isset($clientes3));

echo "</br>";
// Isset - Permite comprobar si una propiedad de un array asociativo existe
var_dump(isset($clientes['nombre']));
var_dump(isset($clientes['codigo']));

include 'includes/footer.php';
