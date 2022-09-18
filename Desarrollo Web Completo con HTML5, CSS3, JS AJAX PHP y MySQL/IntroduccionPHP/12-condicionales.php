<?php include 'includes/header.php';

$autenticado = false;
$admin = false;

if ($autenticado || $admin) {
    echo "Usuario autenticado correctamente!";
} else {
    echo "Usuario no autenticado!";
}

// if anidados
$cliente = [
    'nombre' => 'Colidom',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'Premium'
    ]
];

echo"</br>";

if (!empty($cliente)) {
    echo "El array de cliente no está vacío";
    echo"</br>";
    if ($cliente['saldo'] > 0 ) {
        echo "El saldo del cliente es {$cliente['saldo']}€";
    } else {
        echo "No queda saldo!!!";
    }
} else {
    echo "El array de cliente  está vacío";
}

echo"</br>";

// elseif
if ($cliente['saldo'] > 0){
    echo "El cliente tiene saldo";
} elseif ($cliente['informacion']['tipo'] === 'Premium') {
    echo "El cliente es Premium";
} else {
    echo "No hay cliente definido, o no tiene saldo o no es Premium";
}

echo"</br>";

$tecnología = 'PHP';

switch ($tecnología) {
    case 'PHP':
        echo "PHP, un excelente lenguaje!!!";
        break;

    case 'JavaScript':
        echo "Genial, el lenguaje de la web.";
        break;

    case 'HTML':
        echo "Emmmm...";
        break;

    default:
        echo "Algún lenguaje que no se cual es.";
        break;
}

include 'includes/footer.php';
