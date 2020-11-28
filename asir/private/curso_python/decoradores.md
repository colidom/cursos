# Decoradores

Como deciamos en la sección de programación funcional, las funciones
en Python son objetos de primera clase, es decir, son objetos
como cualquier otro: Pueden tener atributos, se pueden pasar
como parámetros, tienen una identidad, etc...

Hemos visto ya, con las funciones `map` y `filter`, por ejemplo,
el paso de una función como parámetro. Algo que no hemos visto
hasta ahora es que una función devuelva como resultado otra función.
Parece un poco raro, pero si lo pensamos, no hay nada extraño. Veamos
un ejemplo trivial:

    >>> def dame_una_funcion_incremento(inc):
    ...     def funcion_a_retornar(x):
    ...         return x + inc
    ...     return funcion_a_retornar
    ...
    >>> inc3 = dame_una_funcion_incremento(3)
    >>> inc3(6)
    9
    >>> inc47 = dame_una_funcion_incremento(47)
    >>> inc47(3)
    50

Así, `dame_una_funcion_incremento` es una función que devuelve
otra función. Sabiendo que esto es posible, veamos la definición
de decorador:

    Un decorador es una función que acepta como parámetro
    una función, y devuelve otra función, que normalmente
    sustituirá a la original.

El uso de decoradores se enfoca a resolver el siguiente problema:
Tenemos un conjunto de funciones, y queremos que todas ellas hagan una
nueva cosa, algo por lo general ajeno al propio comportamiento de la
función, pero que queremos que todas lo hagan por igual. En otras
palabras, queremos añadir una funcionalidad horizontal. El ejemplo
clásico es añadir información de auditoria a las funciones.

Supongamos que tenemos un conjunto de funciones `a()`, `b()`,...,
`z()`, cada una de ellas con sus propios parámetros,
comportamientos, particularidades, etc... Y queremos ahora, con el
mínimo trabajo posible, que cada función escriba en un fichero log
común cuando empieza a trabajar y cuanto termina.

La primera opción es sencilla, pero trabajosa: reescribir cada una de
las funciones de forma que, por ejemplo, la función `a()` pasa de:

    def a():
        # código de a

a:

    def a():
        with open('/tmp/log.txt', 'a') as log:
            log.write('Empieza la función a\n')
        # codigo de a
        with open('/tmp/log.txt', 'a') as log:
            log.write('Acaba la función a\n')

Y así con todas las funciones. Los problemas de este enfoque son:

 * Hay que reescribir un montón de código

 * Hay muchísimo código repetido (Todas esas escrituras al log)

 * El tamaño del código aumenta bastante

 * La lógica de todas las funciones queda difuminada
   con todas las llamadas al log, que no son parte
   del problema que soluciona `a()`

 * Si hubiera que cambiar la información del log, por ejemplo,
   para incluir la fecha y hora, tendriamos que volver a
   modificar todas las funciones

.. sidebar: Código fuente

    Se puede ver el código de este ejemplo en `ejemplos/decoradores.py`

El decorador intenta solucionar estos problemas. Lo que hace un
decorador normalmente es coger la función original (En nuestro caso,
las funciones `a()`, `b()`,..., `z()`), modificarlas y
sustituirlas, de forma que ahora, cuando se llama a `a()`, se
invoca en realidad a nuestra versión modificada, que a su vez invocará
(o no, según el caso) a la `a()` original.

Para el ejemplo de log, primero creamos una función decoradora, que
llamaramos `logged` en un derroche de originalidad. Para
simplificar, en vez de escribir a un fichero log nos limitaremos a
hacer dos prints, uno antes de que empieze la función y otro después:

.. literalinclude:: ../ejemplos/decoradores.py
    :language: python
    :lines: 9-15

Ahora podemos sustituir, pongamos por ejemplo, la funcion `b()`
por su version decorada, haciendo:

.. literalinclude:: ../ejemplos/decoradores.py
    :language: python
    :lines: 20-22

O podemos usar el simbolo `@` y la siguiente sintaxis, que  hacen
exactamente lo mismo (En este caso , para la funcion `c()`:

.. literalinclude:: ../ejemplos/decoradores.py
    :language: python
    :lines: 24-26

Con los decoradores hemos resuelto los problemas anteriores. Hay que
tocar el código de cada función, si, pero el cambio es mínimo: añadir
el decorador con el simbolo `@`. El código no se repite. No hay
aumento apreciable de tamaño del mismo y el código interno de las
funciones `a()`, `b()`,..., `z()` no se ve perturbado por la
funcionalidad del log. Además, podemos añadir nuevas características a
las funciones "logeadas" modificando solo una cosa: el decorador
`logged`.

