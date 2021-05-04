<h2>Ejercicio 3</h2>
<?php
/*Imprimir por pantalla la tabla de multiplicar
de un número pasado por parámetro GET por la url*/

$numero = $_GET["numero"];

if(isset($_GET["numero"]) && is_numeric($_GET["numero"])){
    $numero = $_GET["numero"];
}else{
    $numero = 5; // defecto
    echo "<p>Número por defecto</p>";
}

echo "<h2>Tabla de multiplicar de ".$numero."</h2>";

for($i =1; $i <= 10; $i++){
    echo $i." x ".$numero." = ".($i * $numero."<br/>");
}

?>