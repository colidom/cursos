# UT6-A1: Introducción a PHP

Para varios ejercicios se necesita utilizar la función `mt_rand`, la cual recibe dos números y retorna, como resultado, un número aleatorio entre el primero y el segundo. Por ejemplo, `mt_rand(10, 20)` devuelve un número aleatorio entre 10 y 20 (ambos incluidos).

## Ejercicio1: Imagen aleatoria

Crea una página PHP que muestre de forma aleatoria dos imágenes. Es decir, se muestra una u otra de forma aleatoria e impredecible.

## Ejercicio2: Cálculo de salario

Lee el nombre, los apellidos, el salario (número con decimales) y la edad de una persona (un número) en un formulario. Recoge los datos y con ellos calcula un nuevo salario para esa persona en base a esta situación:

- Si el salario es mayor de 2000 euros, no cambiará.
- Si el salario está entre 1000 y 2000:
    + Si además la edad es mayor de 45 años, se sube un 3%.
    + Si la edad es menor de 45 o igual, se sube un 10%.
- Si el salario es menor de 1000:
    + Los menores de 30 años cobrarán, a partir de ahora, exactamente 1100 euros.
    + De 30 a 45 años, sube un 3%.
    + A los mayores de 45 años, sube un 15%.

## Ejercicio3: Saber si hay número

Crea un formulario que lea un número, después un mensaje nos indicará si era realmente o no un número y, si es un número, si tenía decimales. Se podrá hacer uso de la función `is_numeric()` que recibe un argumento y dice si es un número.

## Ejercicio4: Fondo aleatorio

Crea una página PHP que ponga de fondo un color aleatorio. Para ello recuerda que en CSS el color de fondo se puede realizar mediante la función `rgb()` a la que se le pasan tres números del 0 al 255, el primero es el nivel de rojo, el segundo el de verde y el tercero el de azul.

## Ejercicio5: Asteriscos

Crea un formulario en el que se pida un número entero positivo. Después, haz que la página escriba tantos asteriscos (*en la misma página*) como el número que haya escrito. Si se escribe 5, se mostrarán 5 asteriscos.

Utiliza el método `GET` para enviar el número.

## Ejercicio6: Creación de tabla

Crea un formulario que pida dos números (filas y columnas). Ambos tienen que valer 1 ó más, de no ser así se indica el error. El resultado será una tabla (se mostrará en la misma página del formulario) con el tamaño indicado.

## Ficheros a entregar

Se deberá subir un único fichero comprimido (.zip) con el código PHP de los diferentes ejercicios.
