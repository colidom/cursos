<?php
include_once './includes/header.php';
?>

<?php

$estudiante = array(
  'nombre' => 'Carlos',
  'apellido' => 'Oliva',
  'username' => 'colidom',
  'pais' => 'España',
  'edad' => 32,
  'sexo' => 'M'
);

for ($i = 0; $i <= 100; $i++) {
  if ($i == 10) {
    echo "El número es 10 </br>";
    break;
  }
  echo "Número: " . $i . "</br>";
}
