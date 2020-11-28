"""
 Una variable es un contenedor de información
 que dentro guardará un dato, se pueden crear
 muchas variables y que cada una tenga un texto distinto
"""

# Crear variables y asignarles un valor
texto = "Master en Python"
texto2 = "con Víctor Robles"
numero = 45
decimal = 6.7

# Mostar valor de las variables
print(texto)
print(texto2)
print(numero)
print(decimal)

print("---------------------")

# Sustituir el valor de algunas variables /reasignando valores 
numero = 77
decimal = 8.9

print(numero)
print(decimal)

print("---------------------")

# Concatenación
nombre = "Víctor"
apellidos = "Robles"
web = "victorroblesweb.es"

print(nombre + " " + apellidos + " - " + web)
print(f"{nombre} {apellidos} - {web} ")
print("Hola me llamo {} {} y mi web es: {}".format(nombre, apellidos, web))

print(nombre, apellidos, web)
