"""
Ejercicio 7. Hacer un programa que muestre todos los números impares
entre dos números que decida el usuario.
"""
n1 = int(input("Introduzca el primer número: "))
n2 = int(input("Introduzca el segundo número: "))

if n1 < n2:

    for n in range(n1 ,n2 + 1):
        if n%2 == 0:
            print(f"{n} es PAR")
        else:
            print(f"{n} es IMPAR")
else:
    print("El número 1 debe ser mayor al número 2")
