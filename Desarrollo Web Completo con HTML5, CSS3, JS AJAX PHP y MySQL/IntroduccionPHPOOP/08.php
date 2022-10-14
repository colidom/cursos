<?php include 'includes/header.php';

require 'vendor/autoload.php';

use App\Clientes;
use App\Detalles;

$clientes = new Clientes();
echo "<br>";
$detalles = new Detalles();


include 'includes/footer.php';