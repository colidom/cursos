<?php include 'includes/header.php';

$host = 'localhost';
$db = "bienesraices_crud";
$user = 'colidom';
$pass = 'Mysql2021';

// Conectar a la DB con PDO
$db = new PDO('mysql:host=$host;dbname=$db', $user, $pass);

// Creamos el query
$query = "SELECT titulo FROM propiedades";

// Lo ejecutamos
$stmt->execute();

// Obtener los resultados
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Iterar los resultados
foreach($resultado as $propiedad):
    echo $propiedad['titulo'];
    echo "</br>";
    echo $propiedad['imagen'];
    echo "</br>";
endforeach;

include 'includes/footer.php';