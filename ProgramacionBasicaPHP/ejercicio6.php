<h2>Ejercicio 6</h2>
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

for($i = 0; $i < count($meses); $i++){
    echo $meses[$i]."<br/>";
}
?>