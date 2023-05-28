<?php
include_once './includes/header.php';
?>
<?php

function saludar($nombre)
{
  echo "Hola {$nombre}! Bienvenidos al sitio web! </br>";
}

function sumar($n1 = 0, $n2 = 0)
{
  echo $n1 + $n2;
}

echo saludar("colidom");
echo saludar("carlos");
echo saludar("laura");

echo sumar(1, 20);
echo "</br>";
echo sumar(100);
