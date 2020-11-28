"""
Ejercicio 9. Hacer un programa que pida números al usuario indefinidamente hasta meter el número 111
"""

# Mi ejemplo
print("### Mi ejemplo ###")
while True:
    numero = int(input("Por favor introduzca un número: "))

    if numero != 111:
        print(numero)
    else:
        print("Hasta luego!")
        break
print("\n")

# Ejemplo profesor
print("### Ejemplo del profesor ###")
contador = 1
while contador < 100:
    numero = int(input("Introduce un número: "))

    if numero == 111:
        break
    else:
        print(f"Has introducido el {numero}")