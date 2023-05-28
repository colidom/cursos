<?php
include_once './includes/header.php';
?>

<?php

$frutas = array('manzana', 'naranja', 'melón', 'uvas');

echo "</br>***bucle for***</br>";
for ($i = 0; $i < count($frutas); $i++) {
  echo $frutas[$i] . "</br>";
}

echo "</br>***bucle while***</br>";
$i = 0;
while ($i < count($frutas)) {
  echo $frutas[$i] . "</br>";
  $i++;
}
