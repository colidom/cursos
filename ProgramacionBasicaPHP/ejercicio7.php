<h2>Ejercicio 7</h2>
<?php
/*Crear un array llamado meses y que almacene el 
nombre de los doce meses del año 

Recorrerlo con FOR para mostrar por pantall los
doce meses */

$meses = array(
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre");

foreach($meses as $mes) {
    echo $mes."<br/>";
}

?>