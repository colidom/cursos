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

echo "<h1>Hola! " . $estudiante['nombre'] . " </h1>";
?>

<h1>Hola! <?php echo $estudiante['nombre']; ?></h1>