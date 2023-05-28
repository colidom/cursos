<?php
include_once './includes/header.php';
?>

<?php
$frutas = array('manzana', 'naranja', 'melón', 'uvas');
$estudiante = array(
    'nombre' => 'Carlos',
    'apellido' => 'Oliva',
    'username' => 'colidom',
    'pais' => 'España',
    'edad' => 32,
    'sexo' => 'M'
);

echo "<pre>";
var_dump($frutas);
echo "</pre>";

echo "<pre>";
print_r($estudiante);
echo "</pre>";
