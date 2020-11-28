# UT2-A5: Utilizando funciones

La actividad consiste en hacer un programa Python que procese un texto pasado por línea de comandos:

```python
import sys


def num_vowels(text):
    # ...
    return


def num_whitespaces(text):
    # ...
    return


def num_digits(text):
    # ...
    return


def num_words(text):
    # ...
    return


def reverse(text):
    # ...
    return


def length(text):
    # ...
    return


def halfs(text):
    # ...
    return


def upper_vowels(text):
    return


def sorted_by_words(text):
    # ...
    return


def length_of_words(text):
    # ...
    return


text = sys.argv[1]
print("Number of vowels:", num_vowels(text))
print("Number of whitespaces:", num_whitespaces(text))
print("Number of digits:", num_digits(text))
print("Number of words:", num_words(text))
print("Reverse of text:", reverse(text))
print("Length of text:", length(text))
print("Halfs of text:", halfs(text))
print("Text with uppercased vowels:", upper_vowels(text))
print("Sorted by words:", sorted_by_words(text))
print("Length of words:", length_of_words(text))
```

### Modo de uso

```console
$> python main.py "est0 es un ejempl0 p4r4 probar la actividad"
Number of vowels: 12
Number of whitespaces: 7
Number of digits: 4
Number of words: 8
Reverse of text: dadivitca al raborp 4r4p 0lpmeje nu se 0tse
Length of text: 43
Halfs of text: est0 es un ejempl0 p4 | r4 probar la actividad
Text with uppercased vowels: Est0 Es Un EjEmpl0 p4r4 prObAr lA ActIvIdAd
Sorted by words: actividad ejempl0 es est0 la p4r4 probar un
Lengths of words: 4 2 2 7 4 6 2 9
```

## Información a entregar

Se deberá entregar la *url* al commit en el repositorio privado *GitHub* de la asignatura *IMW*, apuntando al fichero que contiene el código Python. La *url* debe tener la siguiente estructura:

```
https://github.com/<usuario>/imw/blob/<id del commit>/<ut>/<actividad>/main.py
```

> ⚠️ Al subir la *url*, es importante crear un enlace. Es decir, poner un `href` a la *url* anterior, y no pegar el texto tal cual.
