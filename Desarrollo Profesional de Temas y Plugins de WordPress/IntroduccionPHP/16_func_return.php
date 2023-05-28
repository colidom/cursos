<?php
include_once './includes/header.php';
?>

<?php

function calcular_total($cantidad = 0)
{
    $total = $cantidad * 1.07;
    return $total;
}

function pagar($total)
{
    $balance = 1000;

    if ($total > $balance) {
        echo "Saldo insuficiente!";
    } else {
        echo "Pago realizado correctamente!";
    }
}

echo calcular_total(20);
echo "</br>";
echo pagar(100);
