"""
Ejercicio 4. Pedir dos números al usuario y hacer todas 
las operaciones básicas de una calculadora y mostrarlo por pantalla
"""

# Mi ejemplo
print("#### Mi ejemplo ####")
print("### Calculadora ###")
option = input("""¿Que decea hacer?: 
1. sumar
2. restar
3. dividir
4. multiplicar
5. salir
Su opción: """)

n1 = int(input("Introduzca el primer número: "))
n2 = int(input("Introduzca el segundo número: "))

if option == "1":
    print(f"La suma de {n1} + {n2} = {n1 + n2}") 

elif option == "2":
    print(f"La resta de {n1} - {n2} = {n1 - n2}")

elif option == "3":
    print(f"La división de {n1} / {n2} = {n1 / n2}")

if option == "4":
    print(f"La multiplicación de {n1} * {n2} = {n1 * n2}")

if option == "5":
    print("Hasta Luego!")

# Ejemplo del profesor
print("#### Ejemplo profesor ####")
numero1 = int(input("Introduce el primer número: "))
numero2 = int(input("Introduce el segundo número: "))

print("#### Calculadora ####")
print("Suma: " + str(numero1+numero2))
print("Resta: " + str(numero1-numero2))
print("Multiplicación: " + str(numero1*numero2))
print("División: " + str(numero1/numero2))
