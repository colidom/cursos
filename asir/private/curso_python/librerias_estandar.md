# Algunos Módulos de la librería estándar
=======================================================================

Optimización de rendimiento
-----------------------------------------------------------------------

Para algunos usuarios de Python el rendimiento es una preocupación
fnudamental, y están interesados es poder medir la diferencia
de rendimiento entre opciones alternativas. Python proporciona
varias maneras de poder resolver estas preguntas, siendo una de las
más sencillas el módulo ``timeit``.

pero antes, un consejo:

    **La optimización prematura es la raíz de todo mal**

    Donald Knuth "Structured Programming with go to Statements".


Hay que entender que sin medidas precisas y globales del rendimiento
de la aplicación, no debemos optimizar. Hay optimizaciones triviales,
como por  ejemplo no concatenar cadenas de texto (mejor ir
añadiendolas a una lista y usar ``join()`` para obtener la cadena de
texto final), pero a no ser que sean realmente obvias, las
optimizaciones deben esperar hasta que podamos medir el desempeño en
un contexto global. La herramienta que realiza estas medidas se
conocen como *profiler*.

El peligro de optimizar sin este conocimiento es que no sabemos
que parte del código es la que realmente demanda nuestros esfuerzos
de mejora. Podemos acabar complicando una parte del código
que, en realidad, solo es responsable del 1% del tiempo de ejecución.
Eso significa que si consiguieramos, por ejemplo, optimizar esa parte
del código para que vaya el doble de rápido (Una optimización del
200%, realmente  impresionaante y nada habitual) el resultado neto
seria una mejora de un 0.005% en el rendimiento total. De hecho, si
consiguieramos una mejora espectacular, que ese código se ejecute en,
digamos, 0.001 nanosegundos, aun así, la mejora en el redimiento total
nunca superará el 1%. A cambio, tenemos software más complejo, más
difícil de leer y con mayor capacidad potencial de errores.


timeit
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

timeit permite obtener una medida fiable de los los tiempos de ejecución
de un fragmento de código Python.

Vimos en su día que había dos formas de intercambiar
los valores de dos variables, usando una variable auxiliar
o usando el mecanismo de empaquetado de tuplas::

    >>> # Usando una variable auxiliar
    >>> a = 7; b = 12
    >>> temp = a; a = b; b = temp
    >>>
    >>> # Usando tuplas
    >>> a = 7; b = 12
    >>> a, b = b, a

Pero ¿cuál será más rápida? Usando el módulo ``timeit`` podemos
salir de dudas::

    >>> from timeit import Timer
    >>> Timer('t=a; a=b; b=t', 'a=7; b=12').timeit()
    0.0470120906829834
    >>> Timer('a,b = b,a', 'a=7; b=12').timeit()
    0.04259920120239258

El intercambio por medio de tuplas es -ligeramente- más rápido.


profile
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Los módulos ``profile`` y ``pstats`` son más avanzados que ``timeit``. Además
de medir tiempos de ejecución, nos darán herramienta para poder identificar
las secciones críticas, es decir, nos permiten identificar aquellas partes
del código que mas tiempo/ciclos de CPU consumen, de forma que podemos
concentrarnos es optimizar las partes adecuadas.

Los módulos ``profile`` y ``cProfile`` (``cProfile`` es simplemente
una version de ``profile`` escrita en C para  mejorar su rendimiento) nos
dan un medio para recolectar y analizar estadísticas acerca del
consumo del procesador que hace nuestro código Python.

El método más directo de analisis en el módulo ``profile`` es la
función ``run()``. Acepta como parámetro una cadena de texto
con código fuente Python y crea un informe del tiempo gastado en
cada una de las diferentes líneas de código, a medida que se
ejecutan las sentencias.

Nuestra primera versión recursiva de Fibonacci nos será muy útil
para comprobar el uso de estas herramientas, ya que su rendimiento
se puede mejorar significativamente.

.. literalinclude:: ../ejemplos/profile_01.py
    :language: python
    :lines: 9-28

El informe estandar muestra primero una línea de resumen y luego
un listado de detalle para cada una de las funciones ejecutadas::

  [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765]
  ()
           57356 function calls (66 primitive calls) in 0.376 seconds

     Ordered by: standard name

     ncalls  tottime  percall  cumtime  percall filename:lineno(function)
         21    0.000    0.000    0.000    0.000 :0(append)
         20    0.000    0.000    0.000    0.000 :0(extend)
          1    0.000    0.000    0.000    0.000 :0(setprofile)
          1    0.000    0.000    0.376    0.376 <string>:1(<module>)
          1    0.000    0.000    0.376    0.376 profile:0(print(fib_seq(20)); print())
          0    0.000             0.000          profile:0(profiler)
   57291/21    0.376    0.000    0.376    0.018 profile_01.py:11(fib)
       21/1    0.000    0.000    0.376    0.376 profile_01.py:21(fib_seq)

Esta primera versión se toma 57.356 llamadas a diferentes funciones,
tomando en total su ejecución más o menos un tercio de segundo.  El
hecho de que solo haya 66 llamadas primitivas indica que el resto, es
decir, la mayor parte de las llamadas, son llamadas recursivas. Los
detalles sobre como se gasta el tiempo en cada función vienen dados
por los siguientes valores, correspondientes a las columnas del
informe: Número de llamadas (``ncalls``), el tiempo total gastado en
la función (``tottime``), el tiempo medio consumido por cada llamada
(``percall = ncalls/tottime``), el tiempo acumuado (``cumtime``) y la
proporción entre tiempo acumulado y llamadas a primitivas.

Cuando hay dos números en la primera columna, indica que la llamada es
recursiva. El primer número es el total de llamadas y el segundo el
número de ellas que no son primitivas (Es decir, que se invocaron
recursivamente). Por tanto, cuando una función no es recursiva, ambos
números tienen que ser iguales.

Vemos claramente que la mayor parte del tiempo, 0,376 segundos, se ha
gastado en llamadas a la función ``fib``. Si añadimos un decorador de
tipo :term:memoize eliminaríamos la mayoría de esas llamadas, con lo
que parece que podriamos obtener una mejora de rendimiento notable:

.. literalinclude:: ../ejemplos/profile_02.py
    :language: python
    :lines: 9-45

Efectivamante, como recordamos el valor de fibbonaci en cada nivel,
evitamos la mayoría de las llamadas recursivas, y el número de
llamadas descienda hasta 145, mientras que el tiempo total baja a
0.004 segundos::

    [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765]
    ()
             145 function calls (87 primitive calls) in 0.004 seconds

       Ordered by: standard name

       ncalls  tottime  percall  cumtime  percall filename:lineno(function)
           21    0.000    0.000    0.000    0.000 :0(append)
           20    0.000    0.000    0.000    0.000 :0(extend)
            1    0.000    0.000    0.000    0.000 :0(setprofile)
            1    0.000    0.000    0.004    0.004 <string>:1(<module>)
            1    0.000    0.000    0.004    0.004 profile:0(print(fib_seq(20)); print())
            0    0.000             0.000          profile:0(profiler)
        59/21    0.000    0.000    0.004    0.000 profile_02.py:19(__call__)
           21    0.004    0.000    0.004    0.000 profile_02.py:26(fib)
         21/1    0.000    0.000    0.004    0.004 profile_02.py:37(fib_seq)


Si el código que queremos probar requiere numerosas
varibles,  la cadena de texto con las inicializaciones puede ser
incomoda. Podemos, en cambio, definir un
contexto que almacene esas variables, y usar ``runctx`` en vez de
``run``. en el siguiente ejemplo, el valor de ``n`` se toma directamente
del contexto que hemos pasado como tercer parámetro.::


    import profile
    from profile_fibonacci_memoized import fib, fib_seq

    if __name__ == ’__main__’:
        profile.runctx(’print fib_seq(n); print’, globals(), {’n’:20})


pstats: Almacenando y trabajando con estadísiticas
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Podemos ejecutar una análisis con ``profile`` y almacenarlo en un
fichero, en vez de imprimirlo, para eso indicamos el nombre del
fichero en la llamada a ``run|runctx``. Con la clase ``Stats``,
definida en el módulo ``pstats``, podemos recuperar la información
deesos ficheros y formatearla de diferentes maneras. También podemos
combiar varios conjuntos de resultados

La clase Stats nos permite reordenar y analizar los datos
de rendimiento capturados por ``profile``. Por ejemplo, podemos
ordenar los resultados por orden de tiempo acumulado, y luego
listar solo las 10 primeras de la lista, que nos daría unos
buenos candidatos para optimizar::

    import profile
    import pstats
    import re

    profile.run('re.compile("foo|bar")', 'profile_pruebas_re')
    p = pstats.Stats('profile_pruebas_re')
    p.sort_stats('cumulative')
    p.print_stats(10)


Debugging: Búsqueda de errores
-----------------------------------------------------------------------

Varios módulos nos ayudan a encontrar los errores en el programa. Los
más importantes son ``logging``, ``traceback``, ``pdb`` y ``trace``.

logging
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

El módulo ``logging`` define un sistema flexible y homogeneo
para añadir un sistema de registro de eventos o :term:log a
nuestras aplicaciones o librerías. Crear un log es relativamente
fácil, pero la ventaja de usar el API definido en las
librerías estándar es que todos los módulos pueden participar
en un log común, de forma que podamos integrar nuestros mensajes
con los de otros módulos de terceros.

El módulo define una serie de funciones habituales es sistemas
de *logging*: ``debug()``, ``info()``, ``warning()``, ``error()`` y ``critical()``. Cada función tiene un uso dependiendo de la gravedad del
mensaje a emitir; estos niveles, de menor a mayor severidad,
se describen en la siguiente tabla:

======== ===============================================
Nivel    A usar para
======== ===============================================
DEBUG    Información muy detallada, normalmente de
         interes sólo para diagnosticar problemas
         y encontrar errores.

INFO     Confirmación de que las cosas están funcionando
         como deben.

WARNING  Una indicación de que ha pasado algo extraño, o
         en previsión de algún problema futuro (Por
         ejemplo, "No queda mucho espacio libre en
         disco"). El programa sigue funcionando con
         normalidad.

ERROR    Debido a un problema más grave, el programa
         no has sido capaz de realizar una parte
         de su trabajo.

CRITICAL Un error muy grave, indica que el programa es
         incapaz de continuar ejecutándose.
======== ===============================================

Un ejemplo muy sencillo::

    import logging
    logging.warning('¡Cuidado!') # el mensaje sale por pantall
    logging.info('Mira que te lo dije...') # este no aparecerá

Si ejecutamos este código, veremos que solo se imprime
el primer mensaje::

    WARNING:root:¡Cuidado!

Esto es porque el nivel por defecto es ``WARNING``, es decir, que solo
se emiten los mensajes de ese nivel o superior. La idea de usar
niveles es precisamente para poder centrarnos en los mensajes que nos
afectan en un determinado momento.

El mensaje impreso incluye el nivel y la descripción que
incluimos en la llamada. También incluye una referencia
a ``root``, que se explicará más tarde. El formato del
mensaje también es modificable, si queremos.

Lo más habitual es crear el log usando un ficharo de texto::

    import logging
    logging.basicConfig(filename='ejemplo.log', level=logging.DEBUG)
    logging.debug('Este mensaje debería ir al log')
    logging.info('Y este')
    logging.warning('Y este también')

Si abrimos el fichero deberíamos ver::

    DEBUG:root:Este mensaje debería ir al log
    INFO:root:Y este
    WARNING:root:Y este también

Al configurar el nivel como ``DEBUG`` vemos que se han grabado todos
los mensajes. Si subieramos a ``ERROR``, no aparecería ninguno.

El formato por defecto es ``severity:logger name:message``. Podemos
cambiar también el formato de los mensajes, usando el parámetro
``format`` en la llamada a ``basicConfig``::

     import logging

    logging.basicConfig(
        filename='ejemplo.log',
        level=logging.DEBUG,
        format='%(asctime)s - %(name)s - %(levelname)s - %(message)s'
        )

Podemos definir distintas instancias de loggers (las funciones que
hemos visto hasta ahora usan el logger por defecto, de nombre
``root``), y usar sus nombres para organizarlos en una jerarquía,
usando puntos ``.`` como separadores, de forma similar a como
organizamos los paquetes. Los nombres pueden ser lo que queramos, pero
es una práctica habitual usar como nombre el del módulo::

    import logging
    logger = logging.getLogger(__name__)

De esta forma el nombre del logger refleja la estructura de paquetes
y módulos que estemos usando, y es muy sencillo de usar.

Tambien podemos usar diferentes gestionadores para notificarnos,
aparte de la consola y el fichero de textos, tenemos notificacines vía
sockets, datagramas UDP, por correo, envios a un demonio syslog,  a un
buffer en memoria y, por supuesto, la posibilidad de crear nuestros
propios manejadores.

traceback
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Este módulo nos permite extraer, formatear e imprimir
la traza de ejecución (El "camino" que ha seguido el programa
hasta llegar a un determinado punto). Esta traza es la misma que
se muestra cuando se eleva una excepción y nadie la captura.
Es muy util cuando se quieren mostrar estas trazas y mensajes
de error de forma controlada, por ejempo es lo que hace iPython
para mostrar mensajes de error con coloreado de sintaxis e
información adicional.

El módulo trabaja con objetos de tipo ``traceback``, que son los
objetos que podemos encontrar en ``sys.last_traceback``, o devueltos
en tercer lugar en la tupla que retorna la función ``sys.exc_info()``.

Algunos métodos utiles en este módulo son:

    traceback.print_exc([limit[, file]])

        Esta llamada obtiene la traza actual y la imprime
        en pantalla (o en un fichero, si se especifica),
        usando el mismo formato que usaría
        por defecto Python si la excepción no se captura.

    traceback.format_exc([limit])

        Es como ``print_exc()``, pero devuelve una cadena
        de texto en vez de imprimirla.

pdb
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

El módulo ``pdb`` define un debugger interactivo     para programas
Python. Soporta *breakpoints* y *breakpoints* condicionales,
ejecución paso a paso, inspección de la traza, listado del
codigo fuente y evaluación de código Python arbitrario en el
contexto del programa. Tambien puede ser llamada bajo el
control del programa.

Podemos invocarlo desde la línea de comandos con::

    $ pdb <script.py>

Cuando se sjecuta el debugger, el prompt cambia a ``(Pdb)``. Podemos
consultar una breve ayuda pulsando ``help``. Los comandos más útiles
puende ser:

    h(elp)

        Sin argumentosm imprime la lista de posibles
        ordener. Si la pasamos una orden como
        parámetro, ampliará la información sobre
        el mismo.

    w(here)

        Imprime la traza, con la actuividad más reciente al final.
        Una flecha indica en entorno actual

    s(tep)

        Ejecuta la línea actual, parandose en la primera
        ocasión que pueda: O bien en la primera línea
        de una función que se ha llamado o en la siguiente
        línea.

    n(ext)

        Continua la ejecución hasta que se alcanza la siguiente
        línea en el bloque actual  o retorne de una función. La
        diferencia con ``step`` es que ``step`` entrará dentro
        del cuerpo de una función, mientras que next la ejecutará
        y seguirá hasta la siguiente línea.

    r(eturn)

        Ejecuta el resto de la función y retorna.

    c(ont(inue))

        Continua la ejecución. Solo se para si encuentra un
        *breakpoint* o si termina el programa.

    l(ist) [first[, last]]

        Lista el código fuente.


Podemos usar el debugger desde dentro del programa; lo habitual es
ejecuta la siguiente línea antes de llegar al código problemático::

    import pdb; pdb.set_trace()

Esto arrancará en modo debugger justo en esa línea. A partir de hay se
puede avanzar a traves del código con ``s`` o ``n``, o seguir la
ejecucion con ``c``.

Hay muchas más ordenes y usos disponibles. Consulta la documentación
oficial de Python para ver todos las opciones.

De uso general
-----------------------------------------------------------------------

Expresiones regulares (re)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Este módulo permite trabajar con expresiones regulares. Una expresión
regular viene a definir por un conjunto de cadenas, que cumplen
ciertas condiciones. Si una cadena de texto pertenece al conjunto de
posibles cadenas definidas por la expresión, se dice que *casan* o que
ha habido una coincidencia (*match*).

Las expresiones regulares se crean combinando expresiones regulares
más pequeñas (o primitivas). La cadena que define una expresión
regular puede incluir caractereres normales o especiales. Los
caracteres normales solo casan consigo mismo. Por ejemplo, la
expresion regulas ``a`` solo casaria con una ``a``. Los especiales,
como ``|`` o ``.``, tienen otros significados;  o bien definen
conjuntos de caracteres o modifican a las expresiones regulares
adyacentes.

Algunos caracteres especiales son:

    ``.``

        Punto. casa con cualquier caracter.

    ``^``

        Casa con el principio de una string

    ``$``

        Casa con el final de una string

    ``*``

        Afecta a la re anterior. Casa con cualquier
        repetición (incluyendo el cero, es decir, ninguna)
        de la re. ``ab*`` casará con las cadenas ``a``,
        ``ab``, ``abb``, ``abbb``, ...

    ``+``

        Afecta a la re anterior. Casa con una o más repeticiones
        de la re anterior. ``ab+`` casará con las cadenas
        ``ab``, ``abb``, ``abbb``, ..., pero no con ``a``.

    ``?``

        Afecta a la re anterior. Casa con una o ninguna vez
        el patrón. ``ab?`` casará con ``a`` o con  ``ab``.

    ``{m}``

        Afecta a la re anterior. Casa con exactamente ``n``
        repeticiones del patron anterior. ``a{6}`` casará
        con ``aaaaaa``.

    ``{m,n}``

        Afecta a la re anterior. Casa con entre ``m`` y ``n``
        repeticiones del patron anterior. ``a{3:5}`` casará
        con ``aaa``, ``aaaa`` o ``aaaa``

    ``\``

        Normalmente "escapa" el significado del
        caracter a continuación, permitiendo asi incluir caracteres
        como ``{`` o ``*`` literales.

    ``|``

        Alernancia entre dos patrons: A|B significa que casa con
        cuanlquir cadena que case con A o con B. Se pueden usar
        multiples patrones separados con ``|``. ``a|b|c`` casa
        con ``a``, ``b`` o ``c``.

    ``[]``

        Sirve para indicar un conjunto de caracteres. En un conjunto:

            Los caracteres se pueden listar individualmente, como
            por ejemplo, ``[abc]``, que casa con el caracter
            ``a``, con ``b`` o con ``c``.

            También se pueden espcificar rangos de caracteres, usado
            el guión para separar los límites, por ejemplo ``[a-z]``
            casa con cualquier letra minúsucula, ``[0-9]`` casa con
            cualquier dígito.

            Los caracteres especiales pierden su significado
            dentro de los corchetes, no hace falta escaparlos.

            Se puede definir el complemento del conjunto incluyendo
            como primer caracter ``^``: ``[^5]`` casa con cualquier
            caracter, excepto el el cinco.



El uso de expresiones regulares es tremendamente potente y complejo, y
hay varios libros dedicados al tema. 

Ejercicio: Expresiones regulares para encontrar matrículas de coche.

Veamos el siguiente ejemplo, que busca matrículas de vehículos en un
determinado texto, tal y como se describen en el sistema de
matriculación vigente actualmente en España:

    El 18 de septiembre del año 2000 entró en vigor el nuevo sistema
    de matriculación en españa, introduciendo matrículas que constan
    de cuatro dígitos y tres letras consonantes, suprimiéndose las
    cinco vocales, y las letras Ñ, Q, CH y LL. [...] Si el vehículo es
    histórico, y se ha matriculado con una placa de nuevo formato,
    aparece primero una letra H en la placa.

El siguiente código lista las matrículas encontradas en el texto:

.. literalinclude:: ../ejemplos/expreg.py
    :lines: 9-19

os: Acceso a llamadas del sistema operativo
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Este módulo da acceso a llamadas del sistema operativo. A nivel de
diseño, las llamadas que funcionana en todos los sistemas usan y
devuelven la misma interfaz, independiente del S.O. Por ejemplo, la
función ``stat`` devuelve información sobre un fichero en el mismo
formato, independientemente de la plataforma.

Las funciones que solo están disponibles para un determinado sistema
operativo estan en submódulos aparte.

El submodulo os.path (cargado automáticamente) incluye funciones
de ayuda para trabajar con rutas de archivos.

Algunas de las funciones de este módulo son:

    os.name¶

        El nombre del sistema operativo sobre el que se está
        ejecutando python. Actualmente existen los siguientes nombres
        posibles: 'posix', 'nt', 'os2', 'ce', 'java', 'riscos'.

    os.environ

        Un diccionario que contiene las variables de entorno definidas
        en el sistema operativa. Los valores se obtiene la primera vez
        que se importa el modulo, por lo que no reflejan cambios
        hechos después, a no ser que se fuerze la recarga del módulo

    os.walk(top, topdown=True, onerror=None, followlinks=False)

        Devuelve un iterador que nos permite examinar todo  un sistema
        de archivos. Para cada directorio y subdirectorio en la raiz
        (indicada por ``top``), incluyendo la propia raiz, el iterador
        devuelte una tupla de tres elementos (``dirpath``,
        ``dirnames``, ``filenames``). ``dirpath`` es una cadena de
        texto, la ruta del direcotorio. ``dirnames`` es una lista con
        los nombres de los subdirectorios dentro de ``dirpath``
        (excluyendo los nombres especiales ``.`` y ``..``).
        ``filenames`` es una lista de nombres de los ficheros que no
        son directorio en ``dirpath``. En cualquier momento podemos
        tener una ruta absoluta a un archivo ``f`` en ``filenames``
        haciendo ``os.path.join(top, dirpath, f)``.

    os.path.getsize(path)

        devuelve el tamaño, en bytes, del fichero

    os.path.getmtime(path)

        devuelve el tiempo de la ultima modificación
        del archivo. El valor es en tiempo unix: el número de segundos
        desde la medianoche UTC del 1 de enero de 1970.
        Vease módulo ``time``.

    os.path.splitext(path)

        devuelve una tupla de dos elementos (``root``, ``ext``). En la
        primera posición va la ruta completa del fichero, sin
        extensión, y en la segunda va la extension, de forma que
        ``path == root + ext``.


Ejercicio: Calcular cuanto ocupan todos los ficheros de tipo PDF en un
determinado directorio, incluyendo sus subdirectorios, si los
hubiera. Listar los nombres absolutos, es decir, incluyendo la ruta
desde la raiz.

sys: configuración específica del sistema
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Este módulo porporciona acceso a algunas variables usadas o mantenidas
por el propio interprete de Python. Siempre está disponible:

    sys.argv

        la lista de argumentos pasados al script de python.
        En la posicion o (sys.argv[0]) siempre va el nombre
        del script (depende del S.O. subyacente si incluye
        el nombre completo, incluyendo la ruta, o no).

     sys.exc_info()

        Esta función devuelve una tupla de tres valores  con
        información sobre el error que está siendo tratado: Tipo de la
        excepcion, valor de la  misma y traza de ejecución. Podemos
        usarla en una clausula ``except`` para obtener más información
        del error. Si se llama cuando no hay ninguan excepción
        enmarcha, devuelve una tupla de tres valores ``None``.

    sys.path

        Una lista de cadenas de texto que especifican las rutas
        de búsqueda para los módulos y paquetes de  python.

    sys.platform

        Un identificador de la version de Python en ejecución

Ejercicio: Modificar el ejercicio anterior para que busque
ficheros con una extension que determinaremos nosotros, como
un argumento del script.


El módulo difflib: Buscar las diferencias entre secuencias
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Este módulo proporciona clases y funciones que nos permite
comparar secuencias. Se puede usar, por ejemplo, para
compara ficheros, considerados como secuencias de líneas,
o textos, considerados como secuencias de caracteres. Las
diferencias se pueden analizar e imprimir en diferentes
formatos, incluyendo HTML y parches.

La clase ``difflib.SequenceMatcher`` permite comparar cualquier tipo
de secuencia. El algoritmo que usa intenta conseguir la subcadena más
largas de coincidencias consecutivas. A partir de ahi se aplica
recursivamente tanto a la derecha com a la izquierda de dicha
subcadena. No produce secuencias de ediciones mínimas, pero son
más comprensibles para los humanos.

Ejercicio: Dada una secuencia de lineas de texto, encontrar
la más parecia a un texto original.


El módulo collections: Otras estructuras de datos
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Este módulo implemente ciertos contendores
especializados a partir de los básicos: dicionarios,
listas, conjunto y tuplas.

    ``namedtuple``

        Tuplas cuyo contenido puede ser accedido
        tanto por posición como por nombre.

    ``deque``

        Una doble lista encadenada especializada en realizar
        operaciones de añadir o quitar de los extremos con
        gran rapidez.

    ``Counter``

        Un diccionarios especializado en llevar cuentas; asocia
        a cada clave un contador y tienen métodos adicionales
        para este tipo de estructura de datos. Es equivalente
        en otros lengajes al concepto de ``multisets``.

    ``OrderedDict``

        Una subclase del diccionario que recuerda el orden en
        que se han añadido sus elementos.

    ``defaultdict``

        Una subclase del diccionario que llama a una función
        definida por nosotros cuando no encuentra una clave.

random
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Este módulo implementa generadores de números pseudo-aleatorios
para distintas distribucines. Para enteros, podemos hacer
una selección uniforme dentro de un rango; para secuencias, una
selección uniforme de un elemento. Podemos reordenar al azar
-barajar- una secuencia y obtener una muestra al azar.
También podemos trabajar con distribucions uniformes, normales
(Gauss), logaritmica normal, exponencial negativa, y distribuciones
gamma y beta.

Casi todas las funciones dependen de la función básica ``random()``, que
genera un numero al azar en el intervalo semiabierto [0.0, 1.0).

    ``random.seed([x])``

        Inicializa el generador de números con un determinado valor.
        Si se omite, se usa un valor obtenido a partir de la fecha y
        hora actual

    ``random.random()``

        Devuelve un número al azar en coma flotante en el intervalo
        [0.0, 1.0).

    ``random.randint(a, b)``

        Genera un entero N al azar tal que a <= N <= b.


    ``random.choice(seq)``

        Devuelve un elemento al azar de los perteneciente a la secuencia
        ``seq`` Si ``seq`` está vacio, eleva una excepción ``IndexError``.

    ``random.shuffle(x[, random])``

        Baraja la secuencia (internamente, es decir, no genera una
        nueva secuencia). El argumento opcional ``random`` es una
        función sin argumentos que devuelve un número en coma flotante
        en el intervalo [0.0, 1.0); por defecto es la función
        ``random()``.


    ``random.gauss(mu, sigma)``

        Distribución normal o de Gauss. ``mu`` es la media, ``sigma``
        es la desviación estandar.


Trabajar con fechas y tiempos: time y datetime
-----------------------------------------------------------------------

time
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Esté modulo proporciona funciones para trabajar con tiempos y fechas.
La mayoría de las funciones realizan llamadas al S.O. subyacente.

Algunas consideraciones y terminología:

  * UTC es el tiempo coordinado Universal, anteriormente
    conocido como GMT o Hora de Greenwich (El acrónimo UTC
    es un comprimiso entre el inglés y el francés)

  * DST es el ajuste de horario de verano (*Daylight Saving Time*)
    una modificacion de la zona horaria, normalmente de una
    hora, que se realiza durante parte del año. las reglas
    de los DST son, en la práctica, pura magia (dependen de
    las leyes locales) y pueden cambiar de año a año,

Los valores de tiempo devueltos por ``gmtime()``, ``localtime()`` y
``strptime()``, y aceptados por ``asctime()``, ``mktime()`` y
``strftime()`` son tuplas (En realidad, ``namedtuple``) de 9 enteros:
año, mes, dia, horas, minutos, segundos, día de la semana, día dentro
del año y un indicador de si se aplica o no el horario de verano.

Algunas funciones definidas en este módulo:

    ``time.time()``

        Devuelve el tiempo en segundos, en forma de número de coma
        flotante.


    ``time.gmtime([secs])``

        Convierte  un tiempo en segundos en una tupla de nueve elementos,
        en los cuales el flag final es siempre 0. Si no se indica
        el tiempo , se tomará el momento actual.

    ``time.localtime([secs])``

        Como ``gmtime()``, pero convertido a tiempo local. El indicador
        final se pone a uno si en ese momento estaba activo el horario de
        verano.

    ``time.mktime(t)``

        La inversa de ``localtime()``. Su argumento es
        una tupla de 9 elementos (Como el flag final es obligatorio,
        se puede poner -1 para indicar que no lo sabemos). Devuelve
        un número de segundos unix.

    ``time.sleep(secs)``

        Suspender la ejecución del programa durante el tiempo en segundos
        indicado como parámetro.

Ejercicio: Averiguar el día de la semana en que nacieron -O cualquier
otra fecha que les interese-.

datetime
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

El módulo ``datetime`` continua donde lo deja ``time``. Proporciona
clases para trabajar con fechas y tiempos, soportando por
ejemplo aritmética de fechas.

La clase ``datetime`` sirva para trabajar con fechas y horas. Para
trabajar con estos objetos hay que saber que podemos tener derivar dos
tipos distintos de fechas/horas a partir de esta clase: las fechas
absolutas o relativas.

Una fecha absoluta dispone de toda la información necesaria para poder
determinar, sin ninguna ambigüedad, su valor. Sabe por tanto en que
zona horaría está y, lo que es más complicado, si está activo o  no el
horario de verano. El horario de verano es un acuerdo político,
administrado por cada país, por lo que suele ser cambiante, difícil
de entender y, en general, caótico. La ventaja de este tipo de
fecha/hora es que no está sujeta a interpretación.

Una fecha relativa, por el contrario, no tienen toda la información
necesaria para que su valor sea indiscutible, lo que dificulta, por
ejemplo, hacer comparaciones. Determinar si una fecha relativa está
referida al Tiempo Coordinado Universal (UTC), la fecha y hora local
o la fecha y hora en alguna otra zona horaria depende por entero del
programa, de la misma forma que es responsabilidad del programa
determinar si un número representa metros, micras o litros. Las
fechas/tiempo locales son fáciles de entender y de usar, pero tenemos
que pagar el coste que supone ignorar ciertos aspectos  de la
realidad.

Los tipos disponibles en este módulo son:

    ``class datetime.date``

        Una fecha local, que asume que el
        :term:`Calendario Gregoriano` siempre ha estado y siempre
        estará vigente. Tiene los atributos: ``year``,
        ``month`` y ``day``.

    ``class datetime.time``

        Una marca de tiempo ideal, no sujeta a ninguna fecha
        en particular, y que asume que cada día tiene exactamente
        24*60*60 segundos. Tiene los atributos: ``hour``, ``minute``,
        ``second``, ``microsecond`` y ``tzinfo``.

    ``class datetime.datetime``

        Combinación de fecha y hora, con los atributos: ``year``,
        ``month``, ``day``, ``hour``, ``minute``,
        ``second``, ``microsecond`` y ``tzinfo``

    ``class datetime.timedelta``

        Representa una duración: La diferencia entre dos objetos de
        tipo ``date`` o ``datetime``.

Estos tipos de datos son todos inmutables.


Módulos para trabajar con ficheros xml y csv
-----------------------------------------------------------------------

xml
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Los diferentes módulos de Python para trabajar con ficheros XML están
agrupados en el paquete ``xml``. Las dos formas más habituales de
trabajar con un fichero XML son DOM (:term:`Document Object Model`) y
SAX (:term:`Simple API for XML`). Ambas están disponibles en los
módulos ``xml.dom`` y ``xml.sax`` respectivamente. Usando el modelo
DOM tenemos acceso a todo el árbol de una sola vez, lo que puede ser
costoso en terminos de almacenamiento en memoría. Con SAX procesamos
el árbol paso a paso, respondiendo ante ciertos eventos, a medida que
se van abriendo y cerrando los nodos. Con esta segunda forma perdemos
cierta flexibilidad pero no tenemos el problema del almacenamiento
completo del árbol en memoria.

XML es un formato de datos jerárquico, con lo que la forma maás
habitual de representarlo es un árbol. Para eso se definen las clases
``ElementTree``, que representa todo el documento XML a tratar, y
``Element``, que representa a un nodo dentro del árbol. Las
interacciones con el documento como un todo, como por ejemplo leerlo o
guardarlo en un fichero en disco, se hacen normalmente a nivel de
``ElementTree``. Las interacciones con un elemento XML o sus
subelementos se realizan en el nivel de ``Element``.

Usaremos para explicar estos módulos el siguiente documento XML:

.. literalinclude:: ../ejemplos/country_data.xml
    :language: xml

Lo más básico es importar y leer estos datos desde un fichero.
Lo podemos hacer con el siguiente código::

    import xml.etree.ElementTree as ET
    tree = ET.parse('country_data.xml')
    root = tree.getroot()

O también podemos leer los datos a partir de una variable
de tipo string:

    root = ET.fromstring(country_data_as_string)

Como ``root`` es un elemento (un objeto de la clase ``Element``),
tiene una etiqueta (``tag``) y un conjunto de atributos, en forma de
diccionario::

    >>> root.tag
    'data'
    >>> root.attrib
    {}
    >>>

Tambien tiene una serie de hijos, sobre los que podemos
iterar::

    >>> for child in root:
    ...   print(child.tag, child.attrib)
    ...
    country {'name': 'Liechtenstein'}
    country {'name': 'Singapore'}
    country {'name': 'Panama'}
    >>>

También podemos acceder a los hijos usando índices::

    >>> root[0][1].text
    '2008'
    >>>

La clase ``Element`` define una serie de método que nos ayudan a
recorrer recursivamente todo el subárbol que haya debajo de él (Sus
hijos, nietos, etc...). Por ejemplo, el método ``iter()``::

    >>> for neighbor in root.iter('neighbor'):
    ...   print(neighbor.attrib)
    ...
    {'name': 'Austria', 'direction': 'E'}
    {'name': 'Switzerland', 'direction': 'W'}
    {'name': 'Malaysia', 'direction': 'N'}
    {'name': 'Costa Rica', 'direction': 'W'}
    {'name': 'Colombia', 'direction': 'E'}
    >>>

El método ``Element.findall()`` localiza sólo los elementos de una
determinada etiqueta que son hijos directos del nodo actual. El método
``Element.find()`` encuentra el primer hijo que cumpla esta misma
condición. Con ``Element.text`` podemos acceder al contenido textual
del elemento, y con ``Element.get`` podemos acceder a los valores de
sus atributos::

    >>> for country in root.findall('country'):
    ...   rank = country.find('rank').text
    ...   name = country.get('name')
    ...   print(name, rank)
    ...
    Liechtenstein 1
    Singapore 4
    Panama 68
    >>>

Se pueden hacer operaciones de búsqueda aun más sofisticadas
usando Xpath_.

csv
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

El formato de fichero llamado :term:CSV (*Comma Separated Values* o
Valores separados por comas) es uno de los más habitualmente usados
para el intercambio de información de hojas de cálculo o bases de
datos. A pesar de eso, no hay ningún estandar ni norma escrita, así
que el formato esta definido de forma más o menosinformal por
el conjunto de aplicaciones que pueden leerlo o escribirlo.

Esta carencia de estandares provoca que haya multiples, variadas y
pequeñas diferencias entre los datos producidos o consumidos por
diferentes aplicaciones. Por esta razón, trabajar con distinto
ficheros CVS provinientes de distintas fuentes suele dar más de un
dolor de cabeza. A pesar de estas divergencias (empezando por que
caracter usar como separador de campos), es posible escribir un módulo
que pueda maniputar de forma eficiente estos datos, ocultado al
programador los detalles específicos de leer o escribir estos
ficheros,

El módulo csv permite escribir y leer estos archivos. El programador
puede especificar, por ejemplo, "escribe este archivo en el formato
preferido por excel", o "lee este fichero como fuera de excel, pero
usando el carácter ``:`` como separador de campos". También nos
permite definir nuestros propios formatos de uso particular, que el
módulo denomina "dialectos".

Las funciones ``reader()`` y ``writer()`` leen y escriben secuencias.

Un ejemplo sencillo de lectura::

    import csv
    with open('some.csv', 'r') as f:
        reader = csv.reader(f)
        for row in reader:
            print row

Y uno de escritura::

    import csv
    datos = [
        ('Leonardo', 'Azul', 1452),
        ('Raphael', 'Rojo', 1483),
        ('Michelangelo', 'Naranja', 1475),
        ('Donatello', 'Violeta', 1386),
        ]
    with open('some.csv', 'wb') as f:
        writer = csv.writer(f)
        writer.writerows(datos)


Módulos para trabajar con ficheros comprimidos
-----------------------------------------------------------------------

zipfile — Soporte para archivos ZIP
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

El archivo ZIP es un formato estándar de archivado y compresión de
archivos. Este módulo proporciona mecanismos para crear, leer,
escribir, modificar y listar archivos ZIP. Soporta trabajar con
ficheros ZIP cifrados, pero por el momento no puede crearlos. El
descifrado es particularmente lento, porque no está implementado en C.

La función ``is_zipfile()`` devuelve un booleno indicando si el
fichero que se le pasa como parámetro es un archivo ZIP o no.

La clase ``ZipFile`` nos permite trabajar directamente con un archivo
ZIP. Tiene métodos para obtener información sobre los ficheros
contenidos en el archivo, así como para añadir nuevos ficheros a un
archivo.

Por ejemplo, para leer los nombres de los ficheros contenidos
deontr de un archivo ZIP, podemos hacer::

    import zipfile

    zf = zipfile.ZipFile('example.zip', 'r')
    print zf.namelist()

gzip - Soporte para ficheros gzip
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

El módulo ``gzip`` nos proporciona los medios para comprimir o
descomprimir ficheros igual que lo hacen los programas unix ``gzip`` y
``gunzip``. Al contrario que con el formato ZIP,  el formato gzip solo
permite comprimir y descomprimir un fichero, porque no tiene capacidad
de archivado (Es decir, la posibilidad de añadir varios ficheros
dentro del archivo).

El módulo ``gzip`` proporciona la clase ``GzipFile``, que imita a un
objeto de tipo ``file`` de Python. Los objetos instanciados de esta
clase leen y escriben ficheros con el formato gzip. La compresión y
descompresión es realizada automáticamente, por lo que el programandor
puede trabajar con el fichero como si fuera un fichero normal.

Un ejemplo  de como leer un fichero comprimido::

    import gzip
    f = gzip.open('file.txt.gz', 'rb')
    file_content = f.read()
    f.close()

Como crear un fichero comprimido con gzip::

    import gzip
    content = "Lots of content here"
    f = gzip.open('file.txt.gz', 'wb')
    f.write(content)
    f.close()

Como comprimir un fichero ya existente:

    import gzip
    f_in = open('file.txt', 'rb')
    f_out = gzip.open('file.txt.gz', 'wb')
    f_out.writelines(f_in)
    f_out.close()
    f_in.close()

Internet
-----------------------------------------------------------------------

urllib2 — Librería para abrir URLs
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. Note:: Diferencias entre Python 2.x / Python 3.x

    El módulo ``urllib2`` ha sido dividido en dos en Python 3.x:
    ``urllib.request`` y ``urllib.error``. La herramienta ``2to3``
    adapta automáticamente estos imports.

Este módulo nos permite abrir y trabajar con direcciones de internet
(URLs). La función más usada del módulo es la siguiente::

    urllib2.urlopen(url[, data][, timeout])

Que abre la url indicada, dandonos un objeto similar a un fichero.

En el parámetro opcional ``data`` podemos incluir información
adicional  que requieren ciertas peticiones web, especialmente
``POST``. Si se incluye, ``data`` debe estar formateada con el
estándar  ``application/x-www-form-urlencoded``, algo que podemos
conseguir usando la función ``urllib2.urlencode()``, que acepta como
parámetro un  diccionario o una secuencia de parejas (2-tuplas), y
deveulve una string en dicho formato.

El otro parámetro opcional, ``timeout``, indica el tiempo en segundos
que debemos esperar antes de descartar por imposible una conexión.

El objeto devuelto, además de comportarse como un archivo, dispone de
tres métodos adicionales:

    ``geturl()``

        Devuelve la URL del recurso recuperado. Esto se utiliza
        noprmalmente para determinar si ha habido alguna clase de
        recirección.

    ``info()``

        Devuelve la meta-información sobre el recurso solicitado, como
        las cabeceras, en forma de una instancia de la clase
        ``mimetools.Message``.

    ``getcode()``

        Devuelve el código de estado del protocolo HTTP de la
        respuesta.

Ejemplo: Salvar una página de Internet en un fichero local::

    import urllib2

    url = 'http://www.python.org/'
    f = urllib2.urlopen(url)
    with open('python.html', 'w') as salida:
        for linea in f.readlines():
            salida.write(linea)
    f.close()

smtplib — cliente de protocolo SMTP
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

El módulo ``smtplib`` define un cliente del protocolo :term:SMTP
(*Simple Mail TRansfer Protocol*), que puede ser usado para enviar
correo  electrónico a cualquier ordenador en Internet que esté
ejecutando un demonio SMTP o ESMTP.

El siguiente ejemplo compone un mensaje, ayudándose de la clase
``Message`` definido en ``email.message``. Las variables
``gmail_user`` y ``gmail_password`` están definidas en el código, lo
que quizá no sea la mejor de las ideas posibles. Una vez creado el
mensaje, se realiza la conexión al servidor de correo, que en este
caso es el de Google Mail. La conexión en este caso es un poco más
complicada de lo que sería con un servidor SMTP local, en la que la
seguridad a lo mejor es un poco más laxa:

.. literalinclude:: ../ejemplos/enviar_correo.py
    :lines: 9-31

Aunque el formato de los mensajes es realmente sencillo, usar la clase
``Message`` nos permite incluir de forma rápida y sencilla
funcionalidades más elaboradas, como anexar ficheros o enviar
múltiples versiones del mismo contenido.


SimpleHTTPServer — Simple HTTP request handler
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. Note:: Diferencias entre Python 2.x / Python 3.x

    En Python3.x el módulo SimpleHTTPServer ha sido asimilado
    por ``http.server``. La herramienta ``2to3`` adapta
    automáticamente estos imports.

Este módulo define una serie de clases que nos permiten  implementar
nuestros propios servidores web. La clase SimpleHTTPRequestHandler
(Definida en el módulo ``SimpleHTTPServer`` en Python 2.x y en
``http.server`` en Python 3.x) es un servidor de ejemplo básico que
sirve los ficheros del directorio donde se ha ejecutado, mapeando la
estrucura de directorios como páginas web.

La mayor parte del trabajo, como analizar las peticiones, por ejemplo,
lo hace la clase de la que deriva, ``BaseHTTPServer``, la clase de
ejemplo solo tienen que sobreescribir los métodos ``do_GET()`` y
``do_HEAD()``.

El siguiente programa usa la clase de ejemplo para arrancar un
servidor web básico, escuchando en la máquina local y en el puerto
8000::

    import SimpleHTTPServer
    import SocketServer

    PORT = 8000

    Handler = SimpleHTTPServer.SimpleHTTPRequestHandler
    httpd = SocketServer.TCPServer(("", PORT), Handler)
    print("serving at port", PORT)
    httpd.serve_forever()

Pero puede ser aun más fácil, usando la opcion ``-m`` en el 
interprete para que ejecute el módulo como si fuera
el programa principal, y opcionalmente indicando el número de
puerto al que se vincula el servidor.

Para Python 2.x::

    $ python -m SimpleHTTPServer 8000

Para Python 3.x::

    $ python3 -m http.server 8000


hashlib - hashes y códigos de verificación e integridad
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

El módulo ``hashlib`` define una interfaz común a una serie de
algoritmos conocidos como *funciones de hash criptográficos* o
*funciones resumen*: SHA1, SHA224, SHA256,  SHA384 y SHA512, así como
el algoritmo MD5 de RSA (Definido como estándar en el RFC 1321).

Su uso en muy sencillo: Por ejemplo, usamos ``md5()`` para crear un
objeto. A partir de ahi, podemos ir actualizando los datos sobre los
que se tienen que hacer el *hash* con sucesivas llamadas a su método
``update()``. Hacer una serie de llamadas sucesivas con partes del
texto es equivalente a hacer un solo ``update()`` con todo el texto
concatenado en un único valor; en otras palabras::

    m.update(a); m.update(b)

es equivalente a::

    m.update(a+b)

Durante cualquier momento del proceso se puede pedir el código de
*hash*. Por ejemplo, para obtener el *hash* criptográfico de la frase
"Su teoría es descabellada, pero no lo suficente para ser correcta.",
podemos hacer:

.. literalinclude:: ../ejemplos/hash_md5.py
    :lines: 9-18

El código obtenido depende de los datos suministrados, de forma que
cualquier alteración, por mínima que sea, en el texto original,
provocará una alteración enorme en el código de salida. Por ejemplo,
veamos como cambia el resultado simplemente cambiando una coma de lugar
[#]_::

    >>> from hashlib import md5
    >>> print(md5('Perdón imposible, ejecutar prisionero').hexdigest())
    eafd88022b53be13af86520a6a221024
    >>> print(md5('Perdón, imposible ejecutar prisionero').hexdigest())
    2b4360dbca5fd7b7b5df3fc4af7bab24


.. rubric:: Footnotes


.. [#] Lo que conduce a un problema llamado "fuga de memoria" (*memory
    leaks*): un error de software que ocurre cuando un bloque de memoria
    reservada no es liberada en un programa de computación, habitualmente porque se pierden todas las referencias a esa área de memoria
    antes de haberse liberado. Dependiendo de la cantidad de memoria
    perdida y el tiempo que el programa siga en ejecución, este problema
    puede llevar al agotamiento de la memoria disponible en la
    computadora.

.. [#] El ejemplo se basa en una anécdota apócrifa atribuida al 
    emperador Carlos V, de la que circulan varias versiones. Ésta es 
    una de ellas:

    Estando el rey en el teatro, le recordaron que tenía que decidir
    si indultaba o no a un condenado a muerte, decisión que había
    aplazado en su última audiencia, pero que ahora corría prisa, pues
    la ejecución estaba prevista para el día siguiente. Como
    respuesta, escribió en un billete: "Perdón imposible ejecutar al
    reo". El secretario que llevaba el papel se dió cuenta de que la
    vida del prisionero estaba en sus manos, y dependía de dónde se
    añadiese la coma que, evidentemente, faltaba. Si se decía "Perdón
    imposible, ejecutar al reo", el condenado era hombre muerto, pero
    si se escribía "Perdón, imposible ejecutar al reo", se salvaba.

.. _XPath: http://en.wikipedia.org/wiki/XPath
