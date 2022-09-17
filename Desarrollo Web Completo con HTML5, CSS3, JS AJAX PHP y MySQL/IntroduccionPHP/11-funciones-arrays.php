<?php include 'includes/header.php';

// in_array - buscar elementos en un array
$carrito = ['Tablet', 'Ordenador',  'Televisión'];

var_dump(in_array('Tablet', $carrito));
var_dump(in_array('Auriculares', $carrito));

// Ordenar elementos de un array
$numeros = array(1, 3, 4, 1, 2, 5);
sort($numeros); // De menor a mayor
rsort($numeros); // De mayor a menor

echo "<pre>";
var_dump($numeros);
echo "</pre>";

// Ordenar elementos de un array asociativo
$cliente = [
    'saldo' => 200,
    'tipo' => 'Premium',
    'nombre' => 'Colidom'
];

echo "<pre>";
var_dump($cliente);
echo "</pre>";

asort($cliente); // Ordena por valores (orden alfabético)
arsort($cliente); // Ordena por valores (orden alfabético al revez, luego números)
ksort($cliente); // Ordena por clave (orden alfabético)
krsort($cliente); // Ordena por clave (orden alfabético al revez)

echo "<pre>";
var_dump($cliente);
echo "</pre>";

include 'includes/footer.php';
