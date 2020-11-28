<?php
$salario = (float)($_POST["salario"]);
$edad = (int)($_POST["edad"]);
$nombre = $_POST["nombre"];
if ($salario > 1000 and $salario <= 2000) {
  if ($edad > 45) {
    $salario = $salario + ($salario * 3 / 100);
  }
  elseif ($edad <= 45)  {
    $salario = $salario + ($salario * 10 / 100);
  }

}
elseif ($salario < 1000) {
  if ($edad < 30) {
    $salario = 1100;
  }
  elseif ($edad > 30 and $salario < 45) {
    $salario = $salario + ($salario * 3 / 100);
  }
  elseif ($edad > 45) {
    $salario = $salario + ($salario * 15 / 100);
  }

}
echo "El salario de $nombre ha sido actualizado a: $salario";
 ?>
