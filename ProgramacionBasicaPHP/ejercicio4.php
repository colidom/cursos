<h2>Ejercicio 4</h2>
<?php
/*Escribe un programa que multiplique los 
20 primeros números naritales. Utiliza el bucle while*/

$numero = 1;
$contador = 2;

while($contador <= 20){
    $numero *= $contador;
    // echo $numero."<br/>";
    $contador++;

}
echo "El resultado es ".$numero;

?>