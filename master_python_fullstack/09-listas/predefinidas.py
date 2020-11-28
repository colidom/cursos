"""
Métodos y funciones predefinidas para manejar listas
"""
cantantes = [ '2pac', 'Drake', 'Bud Bunny', 'Julio Iglesias']
numeros = [1 ,2 ,5, 8, 3, 4]

# print(numeros)
numeros.sort() # Métodos para ordenar números de menor a mayor
print(numeros)

# Añdir elementos
cantantes.append("Natos y Waor")
cantantes.insert(1, "David Bisval")
# print(cantantes)

# Eliminar elementos
cantantes.pop(1)
cantantes.remove("Bud Bunny")

# print(cantantes)

# Dar la vuelta
numeros.reverse()
print(numeros)

# Buscar dentro de una lista
print('Drake' in cantantes)

# Contar elementos
print(cantantes)
print(len(cantantes))

# Cuántas veces aparece un elemento
print(numeros)
numeros.append(8)
print(numeros.count(8))
print(numeros)

# Conseguir indice
print(cantantes)
print(cantantes.index("Drake"))

# Unir listas
cantantes.extend(numeros)
print(cantantes)