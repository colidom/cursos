<head>
  <meta charset="utf-8"
  <title><h1>Ejercicio 4: Creación de tabla</h1></title>
</head>
<body>
  <form action="main.php" method="post">
    <label for="rows">¿Cuántas filas decea crear?</label>
    <input type="text" name="Filas"/></br>
    <label for="columns">¿Cuántas filas decea crear?</label>
    <input type="text" name="Columnas"/></br>
    <input type="submit" value="Enviar"/>
  </form>
  <?php
    $rows = (int)$_POST{'Filas'};
    $columns = (int)$_POST{'Columnas'};

    if ($rows < 1 or $columns < 1){
      echo ('<p>Error! Ha de haber, como mínimo, una fila y una columna!</p>');
    }
    else {
      echo ("<table border = '1px'<");
      for ($i=1;$i<=$rows;$i++){
        echo ('<tr>');
        for ($j=1;$j<=$columns;$j++){
          echo("<td>Columna $j</td>");
        }
        echo('</tr>');
      }
      echo('</table>');
    }
   ?>
</body>
