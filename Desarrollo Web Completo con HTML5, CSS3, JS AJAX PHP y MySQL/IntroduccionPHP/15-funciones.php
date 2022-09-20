<?php 
declare(strict_types = 1);
include 'includes/header.php';

function sumar(int $num1 = null, int $num2 = null) {
    echo $num1 + $num2;
}

/* sumar(12, "12"); */
sumar(12, 12);

include 'includes/footer.php';