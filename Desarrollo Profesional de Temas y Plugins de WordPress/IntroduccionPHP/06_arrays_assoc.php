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

echo "Estudiante: ";
echo $estudiante['nombre'] . " " . $estudiante['apellido']  . " " . $estudiante['pais'];
echo "<pre>";
var_dump($estudiante);
echo "</pre>";
