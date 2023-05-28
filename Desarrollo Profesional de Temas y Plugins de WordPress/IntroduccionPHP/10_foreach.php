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

echo "***for convencional*** </br>";
for ($i = 0; $i < count($frutas); $i++) {
  echo $frutas[$i] . "</br>";
}

echo "</br>***foreach***</br>";
foreach ($frutas as $fruta) {
  echo $fruta . "</br>";
}

echo "</br>***foreach key => value*** </br>";
foreach ($estudiante as $clave => $valor) {
  echo $clave . ": " . $valor . "</br>";
}
