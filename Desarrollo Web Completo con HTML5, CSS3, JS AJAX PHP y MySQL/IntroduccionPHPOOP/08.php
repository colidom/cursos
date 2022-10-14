<?php include 'includes/header.php';

// Autoload de Classes
function mi_autoload($clase) {
    require __DIR__ . '/clases/' . $clase .'.php';
}

spl_autoload_register('mi_autoload');

$clientes = new Clientes();
echo "<br>";
$detalles = new Detalles();


include 'includes/footer.php';