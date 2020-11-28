import sys
import math

a = input("Introduzca a: ")
a = int(sys.argv[1])
b = input("Introduzca b: ")
b = int(sys.argv[2])
c = input("Introduzca c: ")
c = int(sys.argv[3])

if a == 0:
    print ("solución: ", -c / b)

elif ((b ** 2) - (4 * a * c)) < 0:
    print ("La ecuación no tiene solución")

else:
    x1 = (-b + math.sqrt(b ** 2 - 4 * a * c)) / (2 * a)
    x2 = (-b - math.sqrt(b ** 2 - 4 * a * c)) / (2 * a)
    print ("Solución de x1: ", x1)
    print ("Solucion de x2: ", x2)
