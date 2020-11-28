"""
Ejercicio 8. ¿Cuánto es el X por ciento de X número?
                            20% de 150
"""

numero = int(input("Introduce un número: "))
porcentaje = int(input(f"¿Que porcentaje quieres sacar de {numero}?: "))

operacion = (numero * (porcentaje/100))

print(f"El {porcentaje}% de {numero} es: {operacion}")
