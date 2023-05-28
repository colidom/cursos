<?php
include_once './includes/header.php';
?>

<?php

$frutas = array('manzana', 'naranja', 'melón', 'uvas');
echo "Número frutas: " . count($frutas);

echo "</br>";

$nombre_usuario = "               colidom          ";
echo "Mi nombre usuario es: " . $nombre_usuario;
echo "</br>";
echo "Mi nombre usuario en mayúsculas es: " . strtoupper($nombre_usuario);
echo "</br>";
trim($nombre_usuario);
echo "Mi nombre usuario en mayúsculas es: " . ($nombre_usuario);

echo "</br>";

$password = '          password         ';
if (strlen(trim($password)) < 10) {
  echo "La contraseña es muy débil";
} else {
  echo "La contraseña es muy fuerte";
}
