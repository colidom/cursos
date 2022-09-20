<?php 
declare(strict_types = 1);
include 'includes/header.php';

function sumar(int $num1 = null, int $num2 = null) {
    echo $num1;
    echo $num1 + $num2;
}

/* sumar(12, "12"); */
sumar(num2: 12, num1: 22);
sumar(num1: 12, num2: 22);

include 'includes/footer.php';