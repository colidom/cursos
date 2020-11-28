"""
Ejercicio 1. Hacer un programa que tenga una lista
de 8 números enteros y haga lo siguiente:
- Recorrer la lista y mostrarla
- Hacer función que recorra listas de números y devuelva un string
- Ordenarla y mostrarla
- Mostrar su longitud
- Buscar algún elemento(pedir al usuario por teclado)
"""
# Mi solución
print("***** Mi solución *****")
numeros =[1, 2, 7, 8, 10, 8, 3, 6]

# Ordenar los números
print("### Ordenamos de mayor a menor ####")
numeros.sort()
print(numeros)

# Longitud de los números
print("\n### Longitud ####")
print(len(numeros))

# Definimos la función para recorrer la lista
def recorreLista(numeros):
    cadena = ""
    for n in numeros:
        cadena += str(n)
        cadena += "\n"
    return cadena

print("\nRecorremos la lista con la función: ")
print(recorreLista(numeros))

# Preguntamos al usuario si quiere buscar un número concreto en la lista
"""
option = input("Desea buscar un número en la lista: ")

if option == "si":
    num = int(input("Introduzca el número: "))
    if num in numeros:
        print(f"El número introducido existe en la posición '{numeros.index(num)}' de la lista!")
    else:
        print("El número introducido no existe en la lista!")
else:
    print("Comprobación de existencia de número en la lista ¡DESCARTADA!")
"""

# Solución del profesor
print("\n***** Solución del profesor *****")
numeros2 = [13, 64, 52, 73, 21, 7, 91, 63]

# Crear una función que recorra la lista y devuelva string
def mostrarLista(lista):
    resultado = ''

    for elemento in lista:
        resultado += "Elemento: " + str(elemento)
        resultado += "\n"
    
    return resultado

# Recorrer y mostrar
print("###### Recorrer y mostrar #######")
print(mostrarLista(numeros2))

# Ordenar y mostrar
print("###### Ordenar y mostrar #######")
numeros2.sort()
print(mostrarLista(numeros2))

# Mostrar longitud
print("###### Mostrar longitud #######")
print(len(numeros2))

# Búsqueda en la lista
try:
    print("###### Búsqueda en la lista #######")
    busqueda = int(input("Introduce el número: "))

    comprobar = isinstance(busqueda, int)
    while not comprobar or busqueda <= 0:
        busqueda = int(input("Introduce el número: "))
    else:
        print(f"Has introducido el {busqueda}")

    print(f"###### Buscar en la lista el número {busqueda} #######")

    search = numeros.index(busqueda)
    print(f"El número buscado existe en la lista, es el índice: {search}")
except:
    print(f"El número '{busqueda}' no está en la lista, lo siento")
