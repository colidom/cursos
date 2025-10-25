"""Tu tarea:
Escribir el código Python necesario para tomar una lista de números como entrada y
devolver una nueva lista que contenga sólo los números únicos de la lista original,
manteniendo su orden original, y luego imprimir el resultado.
"""

# Values provided (do not change)
array = [1, 2, 2, 3, 1, 4, 5, 3]

# The following line will need to change to only store unique values
unique_set = set(array)

# List conversion and print provided (do not change)
unique_array = list(unique_set)
print(unique_array)
