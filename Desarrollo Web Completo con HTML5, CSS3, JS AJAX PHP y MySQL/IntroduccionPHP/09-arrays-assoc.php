<?php include 'includes/header.php';

$cliente = [
    'nombre' => 'Colidom',
    'saldo'=> 200,
    'informacion' => [
        'tipo' => 'premium',
        'disponible' => 100
    ]
];

// Util para ver los contenidos de un Array
echo "<pre>";
var_dump($cliente);
echo "</pre>";

echo $cliente['nombre'] . ": ";
echo $cliente['informacion']['tipo'];

// Agregamos propiedad nueva (Si existe dicha propiedad, se sobreescribe)
$cliente['codigo'] = 12042309409234;

echo "<pre>";
var_dump($cliente);
echo "</pre>";

include 'includes/footer.php';
