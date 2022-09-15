<?php include 'includes/header.php';

$nombre = "colidom";
var_dump($nombre);

define('constante', 'Este es el valor de la constante');
var_dump(constante);

const constante2 = "Hola 2";
var_dump (constante2);

// Convención nombres variables
$nombreCliente = "Pedro";   // Más común en JS
$nombre_cliente = "Pedro"; // Más común en PHP

include 'includes/footer.php';
