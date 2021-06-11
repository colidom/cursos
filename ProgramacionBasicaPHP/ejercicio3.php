<h2>Ejercicio 3</h2>
<?php
/*Escribe un programa que imprima por pantalla 
los cradrados(el número multiplicado por sí mismo)
de los 30 primeros números naturales.

Modifica el ejercicio anterior para que muestre al
lado de cada cuadrado si es un número para o impar.
*/

for($i = 1; $i <= 30; $i++) {

    $cuadrado = $i * $i;

    echo "El cuadrado de ".$i.' es '.$cuadrado;

    if($cuadrado % 2 == 0){
        echo " es par";
    }else{
        echo " es impar";
    }

    echo "<br/>";
}
?>