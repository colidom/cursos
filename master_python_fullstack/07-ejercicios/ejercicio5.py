"""
Ejercicio 5. Hacer un programa que muestre todos los números entre 
dos números que diga el usuario.
"""
numero1 = int(input("Introduce el primer número: "))
numero2 = int(input("Introduce el segundo número: "))

if numero1 < numero2:
    for contador in range(numero1, (numero2 + 1)):
        print(contador)
else:
    print(f"El numero 1 debe ser menor al numero 2")
