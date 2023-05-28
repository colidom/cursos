<?php
include_once './includes/header.php';
?>

<?php

$num1 = 20;
$num2 = 20;

if ($num1 > $num2) {
    echo "El número 2 es mayor";
} else if ($num1 == $num2) {
    echo "Ambos números son iguales";
} else {
    echo "El número 1 es mayor";
}

?>