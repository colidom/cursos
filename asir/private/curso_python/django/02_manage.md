Tareas administrativas y de mantenimiento con manage.py
=======================================================================

Opciones generales de manage.py [0%]
-----------------------------------------------------------------------

Acceso a la shell de Python [0%]
-----------------------------------------------------------------------

La orden **shell**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Operaciones de gestión de la base de datos
-----------------------------------------------------------------------

La orden **flush**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **dbshell**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **sql**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **sqlall**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **sqlclear**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **sqlcustom**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **sqlflush**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **sqlindexes**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **sqlsequencereset**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **syncdb**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **inspectdb**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Ordenes de Internacionalización [0%]
-----------------------------------------------------------------------

La orden **makemessages**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **compilemessages**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Exportar e importar datos de la base de datos [70%]
-----------------------------------------------------------------------

A la hora de exportar o importar datos de la base de datos, cada gestor
incluye su propios mecanismos o utilidades, pero ``manage.py`` proporciona
también dos opciones muy interesantes: ``dumpdata`` y ``loaddata``.

En determinadas ocasiones, puede ser preferible usar las órdenes ``dumpdata``
y ``loaddata`` del ``manage.py``, en vez de los mecanismos específicos de
exportación o importación del gestor de base de datos. Django usa un formato
neutral para los datos, que no es sql, sino json_ (*JavaScript Object
Notation*), y lo que hacen es usar los mecanismos de django para instanciar
los modelos con los datos indicados y salvarlos. Eso es muy conveniente,
porque django comprueba antes de salvar si esos datos están o no en la base de
datos, y hace un ``UPDATE`` o un ``INSERT`` según corresponda.

Otra posibilidad que ofrece este mecanismo es el de usarlo para realizar
migraciones desde una base de datos a otra. Por ejemplo, podemos hacer un
``dumpdata`` de una base de datos MySql,y utilizar el fichero resultante para
importar los datos en una base de datos PostgreSQL. Como el formato es neutro,
no tenemos que lidiar con las pequeñas pero a menudo enojosas diferencias
entre los diferentes dialectos SQL, y ganamos el beneficio de poder realizar
la rutinas de exportación e importación las veces que deseemos sin
preocuparnos, ya que el ORM de Django se preocupará de realizar en la base de
datos la operación de inserción o actualización que corresponda. Además, al
ser ficheros de texto, podemos utilizar las numerosas utilidades que hay ya
desarrolladas para trabajar con ellos:  grep, awk, scripts de python, etc,
para corregir, modificar o analizar los  datos a nuestro antojo antes de
importarlos.

En cualquier caso, no se un mecanismo recomendable para realizar copias de
seguridad, pera eso siempre es mejor usar las herramientas que cada gestor de
bases de datos nos suministre; son muchos más eficientes, nos proporcionan 
muchas más posibilidades y se integran mejor con los sistemas de copia de
seguridad centralizados.

La orden **dumpdata**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Con ``dumpdata`` podemos conseguir un volcado de todos los datos definidos en
la base de datos, o más normalmente, todos los datos correspondientes a una
determinada aplicación. Como la salida es siempre por la salida estándar, es
decir, la pantalla, lo normal es redirigir la salida con el operador ">" hacia
un fichero. Por ejemplo, si queremos realizar un volcado de todos los datos
definidos por los modelos de la aplicación ``shield``, la orden sería::

    manage.py dumpdata shield

Pero si queremos que este volcado se almacene en un fichero, digamos
``shield.json``, en vez de que aparezca por pantalla, la orden sería::

    manage.py dumpdata shield > shield.json

La salida está pensada para ser consumida con ``loaddata``, por lo que no se
molesta en hacerla legible para los humanos. Podemos usar la opción ``--indent
4`` para que se indente el json resultante (usando 4 espacios para cada nivel)
y sea más fácil de leer::

    manage.py dumpdata --indent 4 shield

También podemos especificar uno o varios modelos de la aplicación, si solo
queremos exportar ese subconjunto. Por ejemplo, para exportar solo los datos
de las tablas correspondientes a los modelos *Heroe* y *Poder*, la orden 
sería::

    manage.py dumpdata shield.Heroe shield.Poder

Con la opcion ``--exclude`` podemos filtrar en sentido contrario, es decir, 
lo queremos todo excepto una determinada aplicación o modelo. Por ejemplo, 
para exportar todas las tablas de shield excepto la del modelo 
*Avistamiento*, la orden sería::

    manage.py dumpdata --exclude shield.Avistamiento shield

Aunque la opción por defecto es exportar o importar los datos en formato json,
también es posible usar xml y yaml_ (*YAML Ain't Markup Language*), usando la
opcion ``--format``. Evidentemente, si exportamos, por ejemplo, en yaml,
deberemos realizar la importación en yaml también. Por ejemplo, para exportar
las tablas de shield usando xml, la orden sería:

    manage.py dumpdata --format xml shield


La orden **loaddata**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Test unitarios [0%]
-----------------------------------------------------------------------

test

testserver

Ordenes añadidas por las aplicaciones incluidas por defecto [33%]
-----------------------------------------------------------------------

La orden **changepassword**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Esta orden solo estará disponible si no hemos quitado la aplicación de 
autentificación de Django, ``django.contrib.auth`` de nuestro proyecto. 
La orden nos permite cambiar la contraseña de cualquier usuario. Para evitar
errores, se nos preguntará la nueva contraseña dos veces, y solo
realizará el cambio si ambas coinciden. por ejemplo, si hemos
añadido un usuario con login ``admin`` y queremos cambiarle la
contraseña. la orden sería:

    manage.py changepassword admin

La orden **createsuperuser**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Esta orden solo estará disponible si no hemos quitado la aplicación de
autentificación de Django, ``django.contrib.auth``, de nuestro proyecto. La
orden nos permite crear un nuevo usuario de tipo superusuario o administrador,
es decir, un usuario que tiene por defecto todos los permisos posibles.
Normalmente este usuario se crea cuando hacemos por primera vez un ``syncdb``,
pero puede ser útil repetirla si nos hemos olvidado del los datos que pusimos
entonces, o si necesitamos otro usuario de este tipo.

La orden nos preguntará por el login del usuario, su contraseña y una
dirección de correo electrónico. Podemos usar los parámetros ``--username`` y
``--email`` para indicarle estos datos por adelantado y que no nos lo
pregunte. Por ejemplo, para añadir el superusuario con login ``nickfury``,
dirección de correo electronico ``nfury@shield.mil`` la orden sería:

    manage.py createsuperuser --username nickfury --email nfury@shield.mil

Solo se nos preguntara por la contraseña, porque hemos sido previsores e 
incluido los demás datos. Para evitar errores, se nos preguntará la 
contraseña dos veces, y solo realizará la operación si ambas coinciden.

La orden **findstatic**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La orden **collectstatic**
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


.. _json: http://www.json.org/

.. _yaml: http://www.yaml.org/
