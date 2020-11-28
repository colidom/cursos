from io import open
import pathlib

# Abrir archivo
ruta = str(pathlib.Path().absolute()) + "/fichero_texto.txt"
archivo = open(ruta, "a+")

# Escribir
# archivo.write("\n******Soy un texto metido desde Python ******")

# Cerrar archivo
archivo.close()

# Abrir archivo
ruta = str(pathlib.Path().absolute()) + "/fichero_texto.txt"
archivo_lectura = open(ruta, "r")

# Leer contenido
# contenido = archivo_lectura.read()
# print(contenido)

# Leer contenido y guardarlo en una lista
lista = archivo_lectura.readlines()

archivo_lectura.close()

for frase in lista:
    if frase.isnumeric:
        print("- "+ frase.upper())

# Copiar
import shutil

"""
ruta_original = str(pathlib.Path().absolute()) + "/fichero_texto.txt"
ruta_nueva = str(pathlib.Path().absolute()) + "/fichero_copiado.txt"
ruta_alternativa = str(pathlib.Path().absolute()) + "/copia/fichero_copiado.txt"

shutil.copyfile(ruta_original, ruta_alternativa)
"""

# Mover
"""
ruta_original = str(pathlib.Path().absolute()) + "/fichero_copiado.txt"
ruta_nueva = str(pathlib.Path().absolute()) + "/fichero_copiado_NUEVO.txt"

shutil.move(ruta_original, ruta_nueva)
"""

# Eliminar
"""
import os

ruta_nueva = str(pathlib.Path().absolute()) + "/fichero_copiado_NUEVO.txt"
os.remove(ruta_nueva)
"""
# Comprobar si existe
import os.path

# print(os.path.abspath("./"))
ruta_comprobar = os.path.abspath("./" )+ "/fichero_texto.txt"
print(ruta_comprobar)
if os.path.isfile(ruta_comprobar):
    print("El archivo existe")
else:
    print("El archivo no existe")
