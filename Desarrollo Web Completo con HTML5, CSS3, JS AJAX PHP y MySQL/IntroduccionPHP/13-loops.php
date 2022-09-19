<?php include 'includes/header.php';

// While
$i = 0; // Inicializador

while ($i < 10) {
    echo $i . "</br>";
    $i++;
}

echo "</br>";

// Do while
$i = 0;

do {
    echo $i . "</br>";
    $i++;
} while ($i < 10);

echo "</br>";

// For loop
for($i = 0; $i < 10; $i++) {
    echo $i . "</br>";
}

echo "</br>";

/* 
* múltiplo de 3 imprimir Fizz
* múltiplo de 5 imprimir Buzz
* múltiplo de 3 y 5 imprimir FIZZBUZZ
*/
for($i = 1; $i < 100; $i++) {
    if ($i % 3 === 0 && $i % 5 === 0) {
        echo $i . "- FIZZBUZZ</br>";
    } elseif ($i % 3 === 0) {
        echo $i . "- Fizz</br>";
    } elseif ($i % 5 === 0) {
        echo $i . "- Buzz</br>";
    } else {
        echo $i . "</br>";
    }
}

// Diferente sintaxis permitida por PHP
for($i = 1; $i < 100; $i++):
    if ($i % 3 === 0 && $i % 5 === 0):
        echo $i . "- FIZZBUZZ</br>";
    elseif ($i % 3 === 0):
        echo $i . "- Fizz</br>";
    elseif ($i % 5 === 0):
        echo $i . "- Buzz</br>";
    else:
        echo $i . "</br>";
    endif;
endfor;

// For Each
$clientes = array('Colidom', 'Juan', 'Karen');
foreach ($clientes as $cliente ) {
    echo $cliente . "</br>";
}

// Lo mismo pero con for
for ($i = 0; $i < count($clientes); $i++) {
    echo $clientes[$i] . "</br>";
}

// Array asociativo
$cliente = [
    'nombre' => 'Colidom',
    'saldo' => 200,
    'tipo' => 'Premium'
];

// Iterar valores del array
foreach ($cliente as $valor ) {
    echo $valor . "</br>";
}

// Iterar key y valores del array
foreach ($cliente as $key => $valor ) {
    echo $key. ': '. $valor . "</br>";
}

include 'includes/footer.php';
