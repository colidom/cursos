<?php
include_once './includes/header.php';
?>

<?php
$frutas = array('manzana', 'naranja', 'melón', 'uvas');
$frutas2 = ['manzana', 'naranja', 'melón', 'uvas'];

array_push($frutas, 'pera');
array_push($frutas, 'mango');

echo "<pre>";
var_dump($frutas2);
echo "</pre>";

?>