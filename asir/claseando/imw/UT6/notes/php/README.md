# PHP

Lenguaje para crear contenidos web en el lado del servidor.

## Ventajas de PHP

- Multiplataforma.
- Abierto y gratuito.
- Gran comunidad de usuarios.
- Extensiones.

## Activando la depuración de código

Si queremos que nuestro código PHP muestre los errores que tiene, es necesario activar un *flag* en el fichero `php.ini`. Para ello:

```console
root@hillvalley:~# vi /etc/php5/fpm/php.ini
```

Aproximadamente en la línea 466 buscar la siguiente sentencia:

`display_errors = Off`

Y modificarla por:

`display_errors = On`

A continuación guardar el fichero y recargar `php5-fpm`:

```console
root@hillvalley:~# /etc/init.d/php5-fpm reload
[ ok ] Reloading php5-fpm configuration (via systemctl): php5-fpm.service.
root@hillvalley:~#
```

> IMPORTANTE: Esto no se debe hacer de forma permanente en el servidor de producción, sólo en el **servidor de desarrollo**.

## Etiqueta `<?php ... ?>`

```html
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Probando PHP!!</title>
    </head>
    <body>
        <?php
            echo("Hola desde PHP!!");
        ?>
    </body>
</html>
```

> NOTA: En PHP, la **indentación** NO es importante! Y cada línea debe acabar con un **punto y coma** ";".

## Comentarios

```php
/* Soy un comentario
de varias líneas */

$x = 3;     // soy un comentario de una línea
$y = 5;     # soy un comentario de una línea con otra forma
```

## Variables

```php
$title = "Tutorial de PHP";
$expenses = 3.21;
$income = 2.45;
$profit = ($expenses - $income) * 0.6;
echo($profit);
```

### Saber si una variable está definida

```php
echo(isset($x));    // falso porque $x no se ha definido
$x = 12;
echo(isset($x));    // verdadero
```

### Interpolando cadenas

```php
$days = 15;
$text = "Faltan $days días para el verano";
echo($text);
```

### Variables booleanas

```php
$student = false;
$teacher = true;
echo($student);     // no imprime nada porque es falso
echo($teacher);     // imprime un "1" porque es verdadero
```

### Conversiones

```php
$x = "3.45";
$y = 2;
$z = (float)$x + $y;    // conversión de string a flotante
echo("$z <br>");

$x = 4;
$y = 2.67;
$z = $x + (int)$y;      // conversión de flotante a entero
echo($z);
```

## Constantes

Las constantes almacenan valores que no cambian en el tiempo.

```php
const PI = 3.141592;
echo(PI);       // ojo! las constantes no utilizan el símbolo $
```

## Operadores

### Aritméticos

**`+`** suma  
**`-`** resta  
**`*`** producto  
**`/`** división  
**`%`** módulo (resto)  

### Condicionales

**`<`** menor  
**`>`** mayor  
**`>=`** mayor o igual  
**`<=`** menor o igual  
**`==`** igual, devuelve verdadero si las dos expresiones que compara son iguales  
**`===`** equivalente, devuelve verdadero si las dos expresiones que compara son iguales y además del mismo tipo  
**`!=`** distinto  
**`!`** "no" lógico (NOT)  
**`and`** "y" lógico  
**`or`** "o" lógico

#### Ejemplos

```php
$age = 21;
$adult = $age >= 18;       // adult será verdadero
$under_age = !$adult;      // under_age será falso
```

```php
$driving_license = true;
$age = 20;
$can_drive = ($age >= 18) and $driving_license;     // verdadero
```

```php
$x = 32
$y = 18
$z = ($x == $y)
```

## Estructuras de control

### Sentencias condicionales

#### `if`

```php
$mark = 9;
$passed = 0;
$not_passed = 0;
if ($mark > 5) {
    echo("Aprobado");
    $passed++;
}
else {
    echo("Suspendido");
    $not_passed++;
}
echo("<br><br>");
echo("Aprobados: $passed<br>");
echo("Suspendidos: $not_passed");
```

> NOTA: Las expresiones en la condición deben tener siempre **paréntesis**.

#### `switch`

```php
$weekday = 1;
switch ($weekday) {
    case 1:
        $dayname = "Lunes";
        break;
    case 2:
        $dayname = "Martes";
        break;
    case 3:
        $dayname = "Miércoles";
        break;
    case 4:
        $dayname = "Jueves";
        break;
    case 5:
        $dayname = "Viernes";
        break;
    case 6:
        $dayname = "Sábado";
        break;
    case 7:
        $dayname = "Domingo";
        break;
    default:
        $dayname = "???";
}
echo($dayname);
```

### Bucles

#### `while`

```php
$i = 0;
while ($i < 100) {
    $i++;
    echo("$i<br>");
}
```

#### `for`

```php
for ($i=1; $i<=100; $i++) {
    echo("$i<br>");
}
```

## Uso de formularios


### Versión con 2 ficheros

Utilizaremos 2 ficheros para hacer la gestión de los formularios (aunque también se podría hacer todo en uno).

Veamos un ejemplo en el que tenemos:

- `form.php`: que muestra el formulario.
- `process.php`: que procesa el formulario.

#### `form.php`

```php
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Probando PHP!!</title>
    </head>
    <body>
        <form action="process.php" method="post">
            <label for="name">Nombre:</label>
            <input type="text" name="name"/><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password"/><br>
            <input type="submit" value="enviar"/>
        </form>
    </body>
</html>
```

#### `process.php`

```php
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Probando PHP!!</title>
    </head>
    <body>
        <?php
            $name = $_POST["name"];
            $password = $_POST["password"];
            if ($name == "admin" and $password == "1234") {
                echo("Credenciales correctas!");
            }
            else {
                echo("Datos incorrectos! <br>");
                echo("<a href='form.php'>Volver al formulario</a>");
            }
        ?>
    </body>
</html>
```

En el ejemplo se ha utilizado el método *POST* para enviar los datos, pero también podríamos haber usado el método *GET*. Para poder recibir los datos utilizaríamos la variable `$_GET[]`.

### Versión con 1 solo fichero

#### `form.php`

```php
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Probando PHP!!</title>
    </head>
    <body>
        <form action="form.php" method="get">
            <label for="msg">Mensaje:</label>
            <input type="text" name="msg"/><br>
            <input type="submit" value="echo!"/>
        </form>
        <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                echo("<p>$msg</p>");
            }
        ?>
    </body>
</html>
```

## Redirigir hacia otra página

```php
header("Location:http://www.google.es");
```
