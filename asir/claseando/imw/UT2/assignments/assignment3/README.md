# UT2-A3: Empezando a iterar

La actividad consiste en hacer varios programas Python:

## Programa 1

El programa debe cumplir con las siguientes especificaciones:

1. Leer un número (entero positivo) por línea de comandos.
2. Emitir un error si el número no es positivo, y salir del programa.
2. Determinar si el número introducido es *primo*.

> NOTA: Un número primo es aquel que sólo es divisible por 1 y por él mismo.
> 
> Ejemplo: 11 es primo, porque no es divisible ni por 2, ni por 3, ni por 4, ni por 5, ni por 6, ni por 7, ni por 8, ni por 9, ni por 10. Sólo es divisible por 1 y por 11.

### Modo de uso

```console
$> python program1.py 12
No es primo!
```

## Programa 2

El programa debe cumplir con las siguientes especificaciones:

1. Leer un número (entero positivo) por línea de comandos.
2. Emitir un error si el número no es positivo, y salir del programa.
2. Calcular la suma de los cuadrados de todos los números enteros desde 1 hasta el número introducido (inclusive).

> Si la entrada es $5$, la salida debe ser: $1^2 + 2^2 + 3^2 + 4^2 + 5^2 = 55$

### Modo de uso

```console
$> python program2.py 5
55
```

## Programa 3

El programa debe cumplir con las siguientes especificaciones:

1. Leer dos números (enteros positivos) por línea de comandos.
2. Emitir un error si los números no son positivos, y salir del programa.
3. Calcular el *máximo común divisor* `mcd` de los dos números introducidos. El `mcd` es el número más grande que divide exactamente a ambos números.

> Si la entrada es $a=24$ y $b=18$, el *máximo común divisor* de los dos números es $6$.

> También puedes consultar la página web http://es.calcuworld.com/calculadoras-matematicas/mcd/ para comprobar que tus resultados son correctos.

### Modo de uso

```console
$> python program3.py 24 18
6
```

## Programa 4

El programa debe cumplir con las siguientes especificaciones:

1. Leer un número (entero positivo) por línea de comandos.
2. Emitir un error si el número no es positivo, y salir del programa.
3. Calcular el factorial de todos los números desde 1 hasta el número introducido por teclado (inclusive).

> NOTA: El factorial de un número es la multiplicación de todos los números desde 1 hasta dicho número. Por ejemplo, el factorial de 6 será: $6! = 6 * 5 * 4 * 3 * 2 * 1 = 720$

```console
$> python program4.py 6
1! = 1
2! = 2
3! = 6
4! = 24
5! = 120
6! = 720
```

## Información a entregar

Se deberá entregar la *url* al commit en el repositorio privado *GitHub* de la asignatura *IMW*, apuntando a la carpeta que contiene los ficheros de código Python. La *url* debe tener la siguiente estructura:

```
https://github.com/<usuario>/imw/blob/<id del commit>/<ut>/<actividad>/
```

> ⚠️ Al subir la *url*, es importante crear un enlace. Es decir, poner un `href` a la *url* anterior, y no pegar el texto tal cual.
