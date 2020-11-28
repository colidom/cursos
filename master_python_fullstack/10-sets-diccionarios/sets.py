"""
SET es un tipo de dato, para tener una coleccion de valores,
pero no tiene ni indice ni orden
"""

personas = {
    "Victor",
    "Manolo",
    "Francisco"
}
personas.add("Paco")
personas.remove("Francisco")

print(type(personas))
print(personas)
