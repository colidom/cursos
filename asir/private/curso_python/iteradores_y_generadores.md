# Iteradores y generadores

Los iteradores y generadores nos permite crear nuestras propias variables
iterables.

## Iteradores (_iterators_)

Como hemos visto ya en muchas ocasiones, la mayoría de los objetos de
tipo contenedor pueden ser usados dentro de un bloque `for`:

for element in [1, 2, 3]:
    print element
for element in (1, 2, 3):
    print element
for key in {'one':1, 'two':2}:
    print key
for char in "123":
    print char
for line in open("myfile.txt"):
    print line,

Lo que nos da un estilo limpio, conciso y fácil de leer. Este
mecanismo de iteración permea y unifica todo el lenguaje. La sentencia
`for` funciona internamente llamando a la función `iter()`,
pasándole como parámetro el contenedor. La función retorna un objeto
de tipo iterador, que se caracteriza por disponer de un método llamado
`next()`, que es responsable de hacer lo siguiente:

- Mientras queden valores en el contendor, `next()` nos devuelve
   cada uno de ello, unos tras otro, en cada invocación.

- Cuando ya no quedan más valores, `next()` eleva la excepción
   `StopIteration`, de forma que el bucle `for` sabe que ha llegado
   al final.

Quizá con el siguiente ejemplo se vea más claro:

    >>> s = 'abc'
    >>> it = iter(s)
    >>> it
    <iterator object at 0x00A1DB50>
    >>> it.next()
    'a'
    >>> it.next()
    'b'
    >>> it.next()
    'c'
    >>> it.next()
    Traceback (most recent call last):
      File "<stdin>", line 1, in ?
        it.next()
    StopIteration

Ahora que ya sabemos como funciona internamente el bucle `for`,
vemos que es fácil añadir a nuestras clase un comportamiento similar a
un contenedor, esto es, que sea iterable. Para ello debemos definir un
método con el nombre `__iter__()` que devuelva un objeto. Ese
objeto, el iterador, debe implementar un método `next()` que se
comporte como se describió anteriomente. Un caso habitual es cuando la
propia clase implementa  el método `next()`, en ese caso, el método
`__iter__()` simplemente devuelve `self`.

Vamos a implementar un objeto CuentaAtras de forma que sea iterable:

.. literalinclude:: ../ejemplos/iteradores_01.py
    :language: python
    :lines: 9-30

## Generadores (*Generators*)

Los Generadores son una forma sencilla y potente de crear iteradores.
Son exactamente como cualquier función, pero en vez de devolver el
resultado con `return`, lo devuelven con la sentencia `yield`.
Cada vez que se llama a `next()`, el generador continua a partir de
donde se quedó (Recuerda todo su estado: los valores de las variables
y que línea fue la última que se ejecutó). El siguiente es un
generador trivial:

    >>> def cuenta_atras(n):
    ...    while n >= 0:
    ...        yield n
    ...        n -= 1
    ...
    >>> for i in cuenta_atras(5): print(i)
    ...
    5
    4
    3
    2
    1
    0
    >>>

Cualquier cosa que se pueda hacer con generadores puede ser tambien
implementada mediante clases que implementen los métodos de los
iteradores que se describieron antes.

Lo cómodo de los generadores es que los métodos `__iter__()` y
`next()` se generan automáticamente. Otra ventaja es la capacidad
del generador de recordar todos los datos locales y el estado de
ejecución entre llamadas. Gracias a esto es normalmente más fácil de
escribir que su equivalente como clase. Además, cuando el generador
termina, eleva automáticamente una excepción de tipo
`StopIteration`. Con todas estas características, los generadores
son la forma más fácil de implementar un iterador.
