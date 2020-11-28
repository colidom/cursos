"""
Modulos: Son funcionalidades ya hechas para reutilizar.

En Python hay muchos módulos, que los puedes consultar aquí:
https://docs.python.org/es/3/py-modindex.html

Podemos conseguir módulos que ya vienen en el lenguaje,
modulos en internet, y también podemos crear nuestros propios módulos.
"""
# Importar módulo propio
# import mimodulo
# Importamos una función concreta del módulo 
# from mimodulo import holaMundo
# importamos todas las funciones del módulo y  de esta forma podemos llamarlas directamente
from mimodulo import *

# print(mimodulo.holaMundo("Carlos Oliva Domínguez"))
# print(mimodulo.calculadora(3, 5, True))

print(holaMundo("Carlos Oliva Domínguez"))
print(calculadora(3, 5, True))

# Módulo fechas
import datetime

print(datetime.date.today())

fecha_completa = datetime.datetime.now()
print(fecha_completa)
print(fecha_completa.year)
print(fecha_completa.month)
print(fecha_completa.day)

fecha_personalizada = fecha_completa.strftime("%d/%m/%Y, %H:%M:%S")
print("Mi fecha personalizada", fecha_personalizada)

print(datetime.datetime.now().timestamp())

# Módulo matemáticas
import math

print("Raiz cuadrada de 10: ", math.sqrt(10))
print("Número PI: ", float(math.pi))
print("Redondear a la alza: ", math.ceil(6.56789))
print("Redondear a la baja: ", math.floor(6.56789))

# Módulo random
import random

print("Número aleatorio entre 15 y 67: ", random.randint(15, 67))
