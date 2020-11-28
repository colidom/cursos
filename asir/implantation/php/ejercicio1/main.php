<!doctype html>
<html lang=es>
  <head>
    <title>Ejercicio 1: Imágen aleatoria</title>
  </head>
  <body>
    <?php
      $random = mt_rand(1,2);
      echo("<img src = '$random.png'");
     ?>
  </body>
</html>
