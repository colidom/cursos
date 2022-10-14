<?php include 'includes/header.php';

use App\Clientes;
use App\Detalles;

// Autoload de Classes
function mi_autoload($clase) {

    $partes = explode('\\', $clase);

    require __DIR__ . '/clases/' . $partes[1] .'.php';
}

spl_autoload_register('mi_autoload');

$clientes = new Clientes();
echo "<br>";
$detalles = new Detalles();


include 'includes/footer.php';