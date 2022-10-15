<?php include 'includes/header.php';

// Conectar a la DB con Mysqli POO
$db = new mysqli('localhost', 'colidom', 'Mysql2021', 'bienesraices_crud');

// Creamos el query
$query = "SELECT titulo, imagen FROM propiedades";

// Lo preparamos
$stmt = $db->prepare($query);

// Lo ejecutamos
$stmt->execute();

// Creamos la variable
$stmt->bind_result($titulo, $imagen);

// Asignamos el resultado


// Imprimimos el resultado
while ($stmt->fetch()):
    var_dump($titulo);
    var_dump($imagen);
endwhile;

include 'includes/footer.php';