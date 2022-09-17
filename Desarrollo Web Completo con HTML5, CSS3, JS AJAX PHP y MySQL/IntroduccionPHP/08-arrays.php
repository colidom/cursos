<?php include 'includes/header.php';

// Forma 1 para declarar un array
$carrito = array();
// Forma 2 para declarar un array
$carrito = ['Tablet', 'Televisión', 'Ordenador'];

// Acceder a los elementos de un array
echo $carrito[1];

// Añadir un nuevo elemento al array en la posición 3 (índice)
$carrito[3] = 'Nuevo producto...';

// Añadir un elemento nuevo al final del array
array_push($carrito, 'Auriculares');
// Añadir un elemento nuevo al principio del array
array_unshift($carrito, 'Smartwatch');

// Util para ver los contenidos de un Array
echo "<pre>";
var_dump($carrito);
echo "</pre>";

$clientes = array('Cliente1', 'Cliente2', 'Cliente3');
// Util para ver los contenidos de un Array
echo "<pre>";
var_dump($clientes);
echo "</pre>";
echo $clientes[1];

include 'includes/footer.php';
