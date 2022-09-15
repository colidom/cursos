<?php include 'includes/header.php';

$numero1 = 20;
$numero2 = 30;
$numero3 = 40;
$numero4 = "50";

// Mayor que 
var_dump($numero1 > $numero2);
echo "</br>";

// Mayor o igual que (tipo dato identical)
var_dump($numero1 >= $numero2);
echo "</br>";

// Menor que 
var_dump($numero1 < $numero2);
echo "</br>";

// Menor o igual que (tipo dato identical)
var_dump($numero1 <= $numero2);
echo "</br>";

// Igual que 
var_dump($numero1 == $numero2);
echo "</br>";

// No igual que
var_dump($numero1 != $numero2);
echo "</br>";

// No igual que (tipo dato identical)
var_dump($numero1 !== $numero2);
echo "</br>";

// No igual que
var_dump($numero1 <> $numero2);
echo "</br>";



include 'includes/footer.php';
