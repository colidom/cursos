# UT2-A6: Búscalo en el diccionario!

La actividad consiste en hacer varios programas Python:

## Programa1

El programa debe cumplir con las siguientes especificaciones:

1. Leer una cadena por teclado. Ojo! La cadena se debe pasar con dobles comillas "".
2. Hacer una función para contar cuántas apariciones hay de cada palabra, utilizando un diccionario como estructura de datos.
3. El diccionario se llamará `summary` y tendrá como *claves* cada una de las palabras de la cadena, y como *valores* el número de repeticiones.
3. La función debe tener la siguiente definición:

    ```python
    def count_words(sentence):
        summary = {}
        ...
        return summary
    ```

4. Cuando se reciba el resultado de la función, hay que mostrar el diccionario de una forma "organizada" (ver ejemplo).

### Modo de uso

```console
$> python program1.py "vamos a ver si repito algo que vamos que repito todo"
vamos: 2
a: 1
ver: 1
si: 1
repito: 2
algo: 1
que: 2
todo: 1
```

## Programa2

El programa debe cumplir con las siguientes especificaciones:

1. Hacer una función que muestre un menú con 4 opciones:

    1. Mostrar lista de contactos. `show_contacts(phone_book)`
    2. Añadir contacto (nombre y teléfono). `add_contact(phone_book, name, phone)`
    3. Borrar contacto (nombre). `remove_contact(phone_book, name)`
    4. Salir.

2. `phone_book` será un diccionario. Las claves del diccionario serán los nombres de las personas y los valores serán los teléfonos. Esta variable hay que definirla al comienzo de la función `menu`.
3. La función `show_contacts(phone_book)` debe mostrar la agenda telefónica de la siguiente manera:

    ```
    Alicia: 645617432
    Manuel: 691854321
    Pepe: 676298911
    Zeben: 699812345
    ```

4. Antes de llamar a la función `add_contact(phone_book, name, phone)` hay que pedir al usuario por teclado (`input`) que introduzca el nombre y el teléfono del nuevo contacto, y luego pasarlo como argumentos a nuestra función. Esta función no retorna nada. La función debe mostrar un error si el nombre ya existe.
5. Antes de llamar a la función `remove_contact(phone_book, name)` hay que pedir al usuario por teclado (`input`) que introduzca el nombre del contacto que queremos borrar, y luego pasarlo como argumentos a nuestra función. Esta función no retorna nada. La función debe mostrar un error si el nombre no existe.

## Información a entregar

Se deberá entregar la *url* al commit en el repositorio privado *GitHub* de la asignatura *IMW*, apuntando a la carpeta que contiene los ficheros de código Python. La *url* debe tener la siguiente estructura:

```
https://github.com/<usuario>/imw/blob/<id del commit>/<ut>/<actividad>/
```

> ⚠️ Al subir la *url*, es importante crear un enlace. Es decir, poner un `href` a la *url* anterior, y no pegar el texto tal cual.
