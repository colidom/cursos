<?php include 'includes/header.php';

$dsn = "mysql:host=localhost;dbname=bienesraices_crud";
$user = 'colidom';
$pass = 'Mysql2021';

// Conectar a la DB con PDO
$db = new PDO($dsn, $user, $pass);

// Creamos el query
$query = "SELECT titulo, imagen FROM propiedades";

// Lo preparamos
$stmt = $db->prepare($query);

// Lo ejecutamos
$stmt->execute();

// Obtener los resultados
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Iterar los resultados
foreach ($resultado as $propiedad) :
    echo $propiedad['titulo'];
    echo "</br>";
    echo $propiedad['imagen'];
    echo "</br>";
endforeach;

include 'includes/footer.php';
