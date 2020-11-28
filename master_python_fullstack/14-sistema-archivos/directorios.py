import os

# Crear carpeta

if not os.path.isdir("./mi_carpeta"):
    os.mkdir("./mi_carpeta")
    print("Creando carpeta...")
else:
    print("Ya existe el directorio!")


# Copiar
"""
import shutil

ruta_original = "./mi_carpeta"
ruta_nueva = "./mi_carpeta_copiada"

shutil.copytree(ruta_original, ruta_nueva)
"""

# Eliminar carpeta
"""
os.rmdir("./mi_carpeta_copiada")
"""
print("Contenido de mi carpeta: ")
contenido = os.listdir("./mi_carpeta")

for fichero in contenido:
    print(f"Fichero: {fichero}")
