""" Difusión o Broadcasting en NumPy
La capacidad de difusión de NumPy es una característica notable que simplifica las operaciones 
entre matrices de diferentes formas. Amplía automáticamente las dimensiones de las matrices más 
pequeñas para que coincidan con las de las más grandes, lo que le permite realizar operaciones 
de elemento a elemento sin bucles explícitos. Sin embargo, esta flexibilidad también puede dar 
lugar a errores inesperados si no se tienen en cuenta las reglas que rigen la difusión.

Errores potenciales de la difusión

- Formas incompatibles: La difusión funciona sin problemas cuando las dimensiones finales de 
las matrices son iguales o una de ellas es 1. Si no se cumplen estas condiciones, se producirá 
un error en ValueError. Considere el siguiente ejemplo: """

import numpy as np

arr1 = np.array([[1, 2, 3],
                 [4, 5, 6]])  # Shape: (2, 3)
arr2 = np.array([10, 20])     # Shape: (2,)

result = arr1 + arr2  # ValueError: operands could not be broadcast together with shapes (2,3) (2,)

arr2_reshaped = arr2.reshape(2, 1)  # Shape: (2, 1)

# arr2_reshaped to 2 rows, 1 column:
#[[10]
# [20]]
print(arr2_reshaped) 

result = arr1 + arr2_reshaped # Successful

# First row of arr1 gets 10 added to each value
# second row of arr1 gets 20 added to each value
print(result)
# [[11 12 13]
#  [24 25 26]]