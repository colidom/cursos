"""
Ejercicio 2. Escribir un script que nos muestre por pantalla
todos los números pares del 1 al 120
"""

# Mi ejemplo
print("### Mi ejemplo ###")
for i in range(2, 11, 2):
    print(i)

print("###  Ejemplo del profesor ###")
# Ejemplo del profesor
contador = 1

for contador in range(1, 11):
    if contador % 2 == 0:
        print(contador)
