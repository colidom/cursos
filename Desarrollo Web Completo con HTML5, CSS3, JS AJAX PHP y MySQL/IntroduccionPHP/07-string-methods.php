<?php include 'includes/header.php';

$nombreCliente = "colidom";

// Conocer extensión de un string
echo strlen($nombreCliente);
echo "</br>";
var_dump($nombreCliente);
echo "</br>";

// Eliminar espacios en blanco
$texto = trim($nombreCliente);
echo strlen($texto);
echo "</br>";
var_dump($texto);
echo "</br>";

// Convertirlo a mayúsculas
echo strtoupper($texto);
echo "</br>";
// Convertirlo a mayúsculas
echo strtolower($texto);

$email1 = "correo@correo.com";
$email2 = "Correo@correo.com";

echo "</br>";
var_dump(strtolower($email1) === strtolower($mail2));

echo "</br>";
echo str_replace('colidom', 'modilco', $nombreCliente);

// Revisa si un string existe o no
echo "</br>";
echo strpos($nombreCliente, 'colidom');

// Concatenar strings
$tipoCliente = "Premium";
echo "</br>";
echo "El cliente " . $nombreCliente . " es " . $tipoCliente . ".";
echo "</br>";
echo "El cliente {$nombreCliente} es {$tipoCliente}.";

include 'includes/footer.php';
