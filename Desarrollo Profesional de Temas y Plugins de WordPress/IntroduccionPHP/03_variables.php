<?php
include_once './includes/header.php';
?>

<?php
$nombre = "Colidom";
$numero_favorito = 20;
$autenticado = true;

echo $nombre;
echo "</br>";
var_dump($nombre . ": " . $numero_favorito . " Auth: " . $autenticado);

?>