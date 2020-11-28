nombre = "Carlos Oliva"

# Funciones generales
print(nombre)
# Tipo de dato
print(type(nombre))

# Detectar el tipado 
comprobar = isinstance(nombre, str)
if comprobar:
    print("Esa variable es un string")
else:
    print("No es una cadena")

if not isinstance(nombre, float):
    print("La variable no es un numero con decimales")

# Limpiar espacios
frase = "    mi contenido    "

print("Frase original:", frase)
print("Frase limpia:", frase.strip())

# Eliminar variables
year = 2020
print(year)
del year
# print(year) # NameError: name 'year' is not defined

# Comprobar variable vacía
texto = " ff "

if len(texto) <= 0:
    print("La variable está vacía")
else:
    print("La variable tiene contenido: ", len(texto), "caracteres")

# Encontrar caracteres
frase = "La vida es bella"
print(frase.find("vida"))

# Reemplazar palabras en un string
nueva_frase = frase.replace("vida", "moto")
print(nueva_frase)

# Mayúsculas y minúsculas
print(nombre)
print(nombre.lower())
print(nombre.upper())
