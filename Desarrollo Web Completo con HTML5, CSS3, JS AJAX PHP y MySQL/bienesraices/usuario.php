<?php 

// Importar la conexión con la DB
require 'includes/config/database.php';
$db = conectarDB();
// Crear un email y password
$email = "colidom@outlook.com";
$password = "123456";

// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '${password}'); ";

echo $query;
// Agregarlo a la DB
mysqli_query($db, $query);
